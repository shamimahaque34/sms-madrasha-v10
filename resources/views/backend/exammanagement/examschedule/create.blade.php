@extends('backend.master')

@section('title')
{{isset($examShedule) ?'Update':'Create'}} Exam Schedule
@endsection



@section('body-title-section')
    @include('backend.includes.body-page-title-two',['parent'=>'Exam Schedule', 'child' =>'Create'])
@endsection

@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="card mt-3">
                <div class="card-header">
                    <h4 class="float-start">{{isset($examShedule) ?'Update':'Create'}} Exam Schedule</h4>
                    <a href="{{ route('exam-schedules.index') }}" class="btn btn-success float-end">
                        Manage
                    </a>
                </div>
                <div class="card-body">
                    <div>
                        <form action="{{isset($examShedule) ? route('exam-schedules.update', $examShedule->id) : route('exam-schedules.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @if(isset($examShedule))
                                @method('put')
                            @endif

                            <div class="row mb-4">
                                <div class="col-md-4 mb-4">
                                    <label for="disabledTextInput" class="form-label">
                                        Academic Class Name
                                        <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Your Academic Class Name" data-bs-placement="right"></i>
                                    </label>
                                    <select name="academic_class_id" class="select2 form-control" data-toggle="select2" data-placeholder="Choose ...">
                                        <option value="">Select Academic Class</option>
                                        @foreach($academicClasses as  $academicClass)
                                            <option value="{{$academicClass->id}}" {{$errors->any() && old('academic_class_id')==$academicClass->id? ('selected'):(isset($examShedule) && $examShedule->academic_class_id==$academicClass->id? 'selected':'')}}> {{$academicClass->class_name}}</option>
                                        @endforeach
                                    </select>
                                    @error('academic_class_id')<span class="text-danger f-s-12">{{$errors->first('academic_class_id')}}</span> @enderror
                                </div>
                                <div class="col-md-4">
                                    <label for="disabledTextInput" class="form-label">
                                        Exam Name
                                        <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Your Exam Name" data-bs-placement="right"></i>
                                    </label>
                                    <select name="exam_id" class="select form-control select2" data-toggle="select2" data-placeholder="Select A Option">
                                        <option value="">Select A Option</option>
                                        @foreach($exams as $exam)
                                            <option value="{{$exam->id}}" {{$errors->any() && old('exam_id')==$exam->id? ('selected'):(isset($examShedule) && $examShedule->exam_id==$exam->id? 'selected':'')}}> {{$exam->title}}</option>
                                        @endforeach
                                    </select>
                                    @error('exam_id')<span class="text-danger f-s-12">{{$errors->first('exam_id')}}</span> @enderror
                                </div>
                                <div class="col-md-4 mb-4">
                                    <label for="disabledTextInput" class="form-label">
                                        Section Name
                                        <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Your Section Name" data-bs-placement="right"></i>
                                    </label>
                                    <select name="section_id" class="select form-control select2" data-toggle="select2"  data-placeholder="Select A Option">
                                        <option value="">Select A Option</option>
                                        @foreach($sections as  $section)
                                            <option value="{{$section->id}}" {{$errors->any() && old('section_id')==$section->id? ('selected'):(isset($examShedule) && $examShedule->section_id==$section->id? 'selected':'')}}> {{$section->section_name}}</option>
                                        @endforeach
                                    </select>
                                    @error('section_id')<span class="text-danger f-s-12">{{$errors->first('section_id')}}</span> @enderror
                                </div>
                                <div class="col-md-4 mb-4">
                                    <label for="disabledTextInput" class="form-label">
                                        Subject Name
                                        <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Your Subject Name" data-bs-placement="right"></i>
                                    </label>
                                    <select name="subject_id" class="select1 form-control select2" data-toggle="select2"  data-placeholder="Select A Option">
                                        <option value="">Select A Option</option>
                                        @foreach($subjects as  $subject)
                                            <option value="{{$subject->id}}" {{$errors->any() && old('subject_id')==$subject->id? ('selected'):(isset($examShedule) && $examShedule->subject_id==$subject->id? 'selected':'')}}> {{$subject->subject_name}}</option>
                                        @endforeach
                                    </select>
                                    @error('subject_id')<span class="text-danger f-s-12">{{$errors->first('subject_id')}}</span> @enderror
                                </div>



                                <div class="col-md-4 mb-4">
                                    <label for="disabledTextInput" class="form-label">
                                        Academic Year Name
                                        <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Your Academic Year Name" data-bs-placement="right"></i>
                                    </label>
                                    <select name="academic_year_id" class="select2 form-control" data-toggle="select2" data-placeholder="Select a Academic year">
                                        <option value="">Select a Academic year</option>
                                        @foreach($academicYears as  $academicYear)
                                            <option value="{{$academicYear->id}}" {{$errors->any() && old('academic_year_id')==$academicYear->id? ('selected'):(isset($examShedule) && $examShedule->academic_year_id==$academicYear->id? 'selected':'')}}> {{ \Illuminate\Support\Carbon::parse($academicYear->session_year_start)->format('Y') .' - '. \Illuminate\Support\Carbon::parse($academicYear->session_year_end)->format('Y') }}</option>
                                        @endforeach
                                    </select>
                                    @error('academic_year_id')<span class="text-danger f-s-12">{{$errors->first('academic_year_id')}}</span> @enderror
                                </div>


                                <div class="col-md-4 mb-4 position-relative" id="datepicker1">
                                    <label  class="form-label">
                                        Exam Date
                                        <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Your Exam Date " data-bs-placement="right"></i>
                                    </label>
                                    <input type="text" data-provide="datepicker" data-date-container="#datepicker1"  class="form-control" name="exam_date" placeholder="" value="{{ $errors->any() ? old('exam_date') : (isset($examShedule)? \Illuminate\Support\Carbon::parse($examShedule->exam_date)->format('Y-m-d') :'')}}">
                                    @error('exam_date')<span class="text-danger f-s-12">{{$errors->first('exam_date')}}</span> @enderror
                                </div>

                                <div class="col-md-4 mb-4 position-relative" id="">
                                    <label  class="form-label">
                                        Start Time
                                        <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Your Start Time " data-bs-placement="right"></i>
                                    </label>
                                    {{--                                                <input type="text" data-provide="datepicker" data-date-container="#datepicker3"  class="form-control" name="start_time" placeholder="" value="{{ $errors->any() ? old('start_time') : (isset($examShedule)? $examShedule->start_time :'')}}">--}}
                                    <div class="mb-0">
                                        {{--                                                    <label class="form-label">Specify a step for the minute field E.g. <code>data-minute-step="5"</code></label>--}}
                                        <div class="input-group" id="timepicker-input-group3">
                                            <input id="timepicker3" type="text" name="start_time" class="form-control" value="{{ $errors->any() ? old('start_time') : (isset($examShedule)? \Illuminate\Support\Carbon::parse($examShedule->start_time)->format('h:m') :'')}}">
                                            <span class="input-group-text"><i class="dripicons-clock"></i></span>
                                        </div>
                                    </div>
                                    @error('start_time')<span class="text-danger f-s-12">{{$errors->first('start_time')}}</span> @enderror
                                </div>
                                <div class="col-md-4 " id="">
                                    <label  class="form-label">
                                        End Time
                                        <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Your End Time " data-bs-placement="right"></i>
                                    </label>
                                    {{--                                                <input type="text" data-provide="datepicker" data-date-container="#datepicker2"  class="form-control" name="end_time" placeholder="" value="{{ $errors->any() ? old('end_time') : (isset($examShedule)? $examShedule->end_time :'')}}">--}}
                                    <div class="input-group position-relative" id="timepicker-input-group2">
                                        <input id="timepicker31" type="text" class="form-control" name="end_time" value="{{ $errors->any() ? old('end_time') : (isset($examShedule)? \Illuminate\Support\Carbon::parse($examShedule->end_time)->format('h:m') :'')}}">
                                        <span class="input-group-text"><i class="dripicons-clock"></i></span>
                                    </div>
                                    @error('end_time')<span class="text-danger f-s-12">{{$errors->first('end_time')}}</span> @enderror
                                </div>
                                <div class="col-md-4 " id="">
                                    <label  class="form-label">
                                        Room Number
                                        <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Your Room Number " data-bs-placement="right"></i>
                                    </label>
                                    {{--                                                <input type="text" data-provide="datepicker" data-date-container="#datepicker2"  class="form-control" name="end_time" placeholder="" value="{{ $errors->any() ? old('end_time') : (isset($examShedule)? $examShedule->end_time :'')}}">--}}
                                    <input type="text" class="form-control mb-1" name="room" value="{{ $errors->any() ? old('room') : (isset($examShedule) ? $examShedule->room : '') }}" placeholder="Room Number" >
                                    @error('room')<span class="text-danger f-s-12">{{$errors->first('room')}}</span> @enderror
                                </div>

                                <div class="col-md-12 mb-4">
                                    <label for="" class="form-label">
                                        Note
                                        <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Your Note" data-bs-placement="right"></i>
                                    </label>
                                    <textarea name="note" id="editor" cols="20" rows="5" class="form-control" >{!!isset($examShedule)? $examShedule->note:''!!}</textarea>
                                    @error('note')<span class="text-danger f-s-12">{{$errors->first('note')}}</span> @enderror
                                </div>

                                <div class="col-md-4 mb-4">
                                    <label for="" class="">
                                        Publication Status
                                        <i class="dripicons-question f-s-12" data-bs-toggle="tooltip" data-bs-title="Set Syllabus Publication Status" data-bs-placement="right"></i>
                                    </label>
                                    <div>
                                        <input type="checkbox" id="switch2" name="status" {{ isset($examShedule) && $examShedule->status == 0 ? "" : "checked" }} data-switch="success"/>
                                        <label for="switch2" data-on-label="Yes" data-off-label="No"></label>
                                    </div>
                                    @error('status')<span class="text-danger f-s-12" >{{ $errors->first('status') }}</span> @enderror
                                </div>

                            </div>

                            <div class=" form-group row mt-3 float-end ">
                                <input type="submit" value="{{isset($examShedule) ? 'Update':'Add'}} Exam Schedule" class="btn btn-success">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <link href="{{ asset('/') }}backend/assets/timepicker/src/css/timepicker.css" rel="stylesheet" type="text/css" />
    <script src="{{ asset('/') }}backend/assets/timepicker/src/js/timepicker.js"></script>
    <script>
        $(function () {
            $('#timepicker3').timepicker();
            $('#timepicker31').timepicker();
        })
    </script>
    <script>
        $(document).on('click', '#timepicker3.', function () {
            var leftAttrValue = $('.bootstrap-timepicker-widget').attr('style');
            var leftValue = leftAttrValue.match(/left:\s*([^;]+)/)[1];
            var topValue = leftAttrValue.match(/top:\s*([^;]+)/)[1];
            $('.bootstrap-timepicker-widget').css('cssText', 'left: '+leftValue+'!important; top: '+topValue+'!important;');
        });
    </script>
@endsection
