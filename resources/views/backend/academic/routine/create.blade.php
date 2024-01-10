@extends('backend.master')

@section('title')
{{ isset($routine) ? 'Update' : 'Create' }} Routine
@endsection

@section('body-title-section')
    @include('backend.includes.body-page-title-two',['parent'=>'Routine', 'child' => 'Create'])
@endsection

@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="card mt-3">
                <div class="card-header">
                    <h4 class="float-start">{{ isset($routine) ? 'Update' : 'Create' }} Routine</h4>
                    <a href="{{ route('routines.index') }}" class="btn btn-success float-end">
                        Manage
                    </a>

                </div>
                <div class="card-body">
                    <div>
                        <form action="{{ isset($routine) ? route('routines.update', $routine->id) : route('routines.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @if(isset($routine))
                                @method('put')
                            @endif

                            <div class="row mt-2">

                                <div class="col-md-6 mb-4">
                                    <label  class="form-label">Class Schedule </label>
                                    <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Class Schedule" data-bs-placement="right"></i>
                                    <select name="class_schedule_id" class="select2 form-control " data-toggle="select2" data-placeholder="Choose Class Schedule...">
                                        <option value="">Select a Class Schedule</option>
                                        @foreach($classSchedules as $classSchedule)
                                            <option value="{{ $classSchedule->id }}" {{ $errors->any() ? (old('class_schedule_id')) : (isset($routine) && $routine->class_schedule_id == $classSchedule->id ? 'selected' : '')}}> {{ $classSchedule->starting_time.' - '.$classSchedule->ending_time }}</option>
                                        @endforeach
                                    </select>
                                    @error('class_schedule_id')<span class="text-danger f-s-12">{{ $errors->first('class_schedule_id') }}</span> @enderror
                                </div>

                                <div class="col-md-6 mb-4">
                                    <label  class="form-label">Academic Year </label>
                                    <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Academic Year Name" data-bs-placement="right"></i>
                                    <select name="academic_year_id" class=" form-control " data-toggle="select2" data-placeholder="Choose Academic Year...">
                                        <option value="">Select a Academic Year</option>
                                        @foreach($academicYears as $academicYear)
                                            <option value="{{ $academicYear->id }}" {{ $errors->any() ? (old('academic_year_id')) : (isset($routine) && $routine->academic_year_id == $academicYear->id ? 'selected' : '')}}> {{ \Illuminate\Support\Carbon::parse($academicYear->session_year_start)->format('Y').' - '.\Illuminate\Support\Carbon::parse($academicYear->session_year_end)->format('Y') }}</option>
                                        @endforeach
                                    </select>
                                    @error('academic_class_id')<span class="text-danger f-s-12">{{ $errors->first('academic_class_id') }}</span> @enderror
                                </div>

                                <div class="col-md-6 mb-4">
                                    <label  class="form-label">Academic Class </label>
                                    <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Academic Class Name" data-bs-placement="right"></i>
                                    <select name="academic_class_id" class=" form-control " data-toggle="select2" data-placeholder="Choose Academic Class...">
                                        <option value="">Select a Academic Class</option>
                                        @foreach($academicClasses as $academicClass)
                                            <option value="{{ $academicClass->id }}" {{ $errors->any() ? (old('academic_class_id')) : (isset($routine) && $routine->academic_class_id == $academicClass->id ? 'selected' : '')}}> {{ $academicClass->class_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('academic_class_id')<span class="text-danger f-s-12">{{ $errors->first('academic_class_id') }}</span> @enderror
                                </div>

                                <div class="col-md-6 mb-4">
                                    <label  class="form-label">Section </label>
                                    <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Section Name" data-bs-placement="right"></i>
                                    <select name="section_id" class=" form-control " data-toggle="select2" data-placeholder="Choose Section...">
                                        <option value="">Select a Section</option>
                                        @foreach($sections as $section)
                                            <option value="{{ $section->id }}" {{$errors->any() ? (old('section_id')) : (isset($routine) && $routine->section_id == $routine->id ? 'selected' : '')}}> {{ $section->section_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('section_id')<span class="text-danger f-s-12">{{ $errors->first('section_id') }}</span> @enderror
                                </div>

                                <div class="col-md-6 mb-4">
                                    <label  class="form-label">Subject </label>
                                    <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Subject Name" data-bs-placement="right"></i>
                                    <select name="subject_id" class=" form-control " data-toggle="select2" data-placeholder="Choose Subject...">
                                        <option value="">Select a Subject</option>
                                        @foreach($subjects as $subject)
                                            <option value="{{ $subject->id }}" {{$errors->any() ? (old('subject_id')) : (isset($routine) && $routine->subject_id == $subject->id ? 'selected' : '')}}> {{ $subject->subject_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('subject_id')<span class="text-danger f-s-12">{{ $errors->first('subject_id') }}</span> @enderror
                                </div>

                                <div class="col-md-6 mb-4">
                                    <label  class="form-label">Teacher Name </label>
                                    <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Teacher Name" data-bs-placement="right"></i>
                                    <select name="teacher_id" class=" form-control " data-toggle="select2" data-placeholder="Choose Teacher...">
                                        <option value="">Select a Teacher</option>
                                        {{--                                                    <option value="22" {{ $errors->any() ? (old('teacher_id')) : (isset($routine) ? 'selected' : '')}} >Teacher</option>--}}
                                        @foreach($teachers as $teacher)
                                            <option value="{{$teacher->id}}" {{$errors->any() ? (old('teacher_id')) :(isset($routine) && $routine->teacher_id == $teacher->id ? 'selected' : '')}}> {{ $teacher->name_english }}</option>
                                        @endforeach
                                    </select>
                                    @error('teacher_id')<span class="text-danger f-s-12">{{ $errors->first('teacher_id') }}</span> @enderror
                                </div>

                                <div class="col-md-6 mb-4">
                                    <label  class="form-label">
                                        Day
                                        <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Day" data-bs-placement="right"></i>
                                    </label>
                                    {{--                                                <input type="text"  class="form-control" name="day" placeholder="" value="{{ $errors->any() ? old('day') : (isset($routine) ? $routine->day : '') }}">--}}
                                    <select name="day" id="" class="form-control select2" data-toggle="select2">
                                        <option value="" selected disabled>Select An Option</option>
                                        <option value="Saturday" {{ $errors->any() ? (old('day')) : (isset($routine) && $routine->day == 'Saturday' ? 'selected' : '') }}>Saturday</option>
                                        <option value="Sunday" {{ $errors->any() ? (old('day')) : (isset($routine) && $routine->day == 'Sunday' ? 'selected' : '') }}>Sunday</option>
                                        <option value="Monday" {{ $errors->any() ? (old('day')) : (isset($routine) && $routine->day == 'Monday' ? 'selected' : '') }}>Monday</option>
                                        <option value="Tuesday" {{ $errors->any() ? (old('day')) : (isset($routine) && $routine->day == 'Tuesday' ? 'selected' : '') }}>Tuesday</option>
                                        <option value="Wednesday" {{ $errors->any() ? (old('day')) : (isset($routine) && $routine->day == 'Wednesday' ? 'selected' : '') }}>Wednesday</option>
                                        <option value="Thursday" {{ $errors->any() ? (old('day')) : (isset($routine) && $routine->day == 'Thursday' ? 'selected' : '') }}>Thursday</option>
                                        <option value="Friday" disabled {{ $errors->any() ? (old('day')) : (isset($routine) && $routine->day == 'Friday' ? 'selected' : '') }}>Friday</option>
                                    </select>
                                    @error('day')<span class="text-danger f-s-12">{{ $errors->first('day') }}</span> @enderror
                                </div>


                                <div class="col-md-6 mb-4">
                                    <label  class="form-label">
                                        Room Number
                                        <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Room" data-bs-placement="right"></i>
                                    </label>
                                    <input type="text"   class="form-control" name="room" placeholder="" value="{{ $errors->any() ? old('room') : (isset($routine) ? $routine->room : '')}}">
                                    @error('room')<span class="text-danger f-s-12">{{ $errors->first('room') }}</span> @enderror
                                </div>



                                <div class="col-md-12 mb-4">
                                    <label for="" class="form-label">
                                        Note
                                        <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Note" data-bs-placement="right"></i>
                                    </label>
                                    <textarea name="note" id="editor" cols="20" rows="5" class="form-control" >{!! $errors->any() ? (old('note')) : (isset($routine) ? $routine->note : '') !!}</textarea>
                                    @error('note')<span class="text-danger f-s-12">{{ $errors->first('note') }}</span> @enderror
                                </div>
                                <div class="col-md-4 mb-4">
                                    <label for="" class="col-md-4">
                                        Status
                                        <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Your Status" data-bs-placement="right"></i><br>
                                    </label>

                                    <br/>
                                    <div class="d-inline">
                                        <input type="checkbox" {{ isset($routine) && $routine->status == 0 ? '' : 'checked' }} name="status" id="switch1"  data-switch="bool"/>
                                        <label for="switch1" data-on-label="On" data-off-label="Off"></label>
                                    </div>
                                    @error('status')<span class="text-danger f-s-12" >{{ $errors->first('status') }}</span> @enderror
                                </div>
                            </div>
                            <div class="text-center">
                                <input type="submit" class="btn btn-success" data-provide="typeahead" id="" value="{{ isset($routine) ? 'Update ' : 'Create ' }} Routine ">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
