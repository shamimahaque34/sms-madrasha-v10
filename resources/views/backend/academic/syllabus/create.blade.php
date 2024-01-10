@extends('backend.master')

@section('title')
{{ isset($syllabus) ? 'Update' : 'Create' }} Syllabus
@endsection

@section('body-title-section')
    @include('backend.includes.body-page-title-two',['parent'=>'Syllabus', 'child' => 'Create'])
@endsection

@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="card mt-3">
                <div class="card-header">
                    <h4 class="float-start">{{ isset($syllabus) ? 'Update' : 'Create' }} Syllabus</h4>
                    <a href="{{ route('syllabuses.index') }}" class="btn btn-success float-end">
                        Manage
                    </a>

                </div>
                <div class="card-body">
                    <div>
                        <form action="{{ isset($syllabus) ? route('syllabuses.update', $syllabus->id) : route('syllabuses.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @if(isset($syllabus))
                                @method('put')
                            @endif

                            <div class="row mt-2">

                                <div class="col-md-6 mb-4">
                                    <label  class="form-label">Subject Name </label>
                                    <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Subject Name" data-bs-placement="right"></i>
                                    <select name="subject_id" class=" form-control " data-toggle="select" data-placeholder="Choose ...">
                                        <option value="">Select a Subject</option>
                                        @foreach($subjects as $subject)
                                            <option value="{{ $subject->id }}" {{$errors->any() ? (old('subject_id')) : (isset($syllabus) && $syllabus->subject_id == $subject->id ? 'selected' : '')}}> {{ $subject->subject_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('subject_id')<span class="text-danger f-s-12">{{ $errors->first('subject_id') }}</span> @enderror
                                </div>

                                <div class="col-md-6 mb-4">
                                    <label  class="form-label">Academic Year Name </label>
                                    <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Academic Year Name" data-bs-placement="right"></i>
                                    <select name="academic_year_id" class=" form-control " data-toggle="select" data-placeholder="Choose ...">
                                        <option value="">Select a Academic Year</option>
                                        @foreach($academicYears as $academicYear)
                                            <option value="{{ $academicYear->id }}" {{ $errors->any() ? (old('academic_year_id')) : (isset($syllabus) && $syllabus->academic_year_id == $academicYear->id ? 'selected' : '')}}> {{ \Illuminate\Support\Carbon::parse($academicYear->session_year_start)->format('Y').' - '.\Illuminate\Support\Carbon::parse($academicYear->session_year_end)->format('Y') }}</option>
                                        @endforeach
                                    </select>
                                    @error('academic_year_id')<span class="text-danger f-s-12">{{ $errors->first('academic_year_id') }}</span> @enderror
                                </div>

                                <div class="col-md-6 mb-4">
                                    <label  class="form-label">
                                        Title
                                        <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Title" data-bs-placement="right"></i>
                                    </label>
                                    <input type="text"  class="form-control" name="title" placeholder="" value="{{ $errors->any() ? old('title') : (isset($syllabus) ? $syllabus->title : '')}}">
                                    @error('title')<span class="text-danger f-s-12">{{ $errors->first('title') }}</span> @enderror
                                </div>

                                <div class="col-md-6 mb-4">
                                    <label class="form-label">
                                        File
                                        <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Your File" data-bs-placement="right"></i>
                                    </label><br>
                                    <input type="file"  class="form-control" name="file" placeholder="" value="{{ $errors->any() ? old('file') : (isset($syllabus) ? $syllabus->file : '')}}"/>
                                    @error('file')<span class="text-danger f-s-12">{{ $errors->first('file') }}</span> @enderror

                                </div>

                                <div class="col-md-6 mb-4">
                                    <label for="" class="form-label">
                                        Description
                                        <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Description" data-bs-placement="right"></i>
                                    </label>
                                    <textarea name="description" id="editor" cols="20" rows="5" class="form-control" >{!! $errors->any() ? (old('description')) : (isset($syllabus) ? $syllabus->description : '')!!}</textarea>
                                    @error('description')<span class="text-danger f-s-12">{{ $errors->first('description') }}</span> @enderror
                                </div>

                                <div class="col-md-6 mb-4">
                                    <label for="" class="form-label">
                                        Note
                                        <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Note" data-bs-placement="right"></i>
                                    </label>
                                    <textarea name="note" id="editor1" cols="20" rows="5" class="form-control" >{!! $errors->any() ? (old('note')) :(isset($syllabus)? $syllabus->note : '') !!}</textarea>
                                    @error('note')<span class="text-danger f-s-12">{{ $errors->first('note') }}</span> @enderror
                                </div>
                                <div class="col-md-4 mb-4">
                                    <label for="" class="">
                                        Publication Status
                                        <i class="dripicons-question f-s-12" data-bs-toggle="tooltip" data-bs-title="Set Syllabus Publication Status" data-bs-placement="right"></i>
                                    </label>
                                    <div>
                                        <input type="checkbox" id="switch2" name="status" {{ isset($syllabus) && $syllabus->status == 0 ? "" : "checked" }} data-switch="success"/>
                                        <label for="switch2" data-on-label="Yes" data-off-label="No"></label>
                                    </div>
                                    @error('status')<span class="text-danger f-s-12" >{{ $errors->first('status') }}</span> @enderror
                                </div>
                            </div>
                            <div class="text-center">
                                <input type="submit" class="btn btn-success" data-provide="typeahead" id="" value="{{ isset($syllabus) ? 'Update ' : 'Create ' }} Syllabus ">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <!-- ck Editor -->
    <script src="{{ asset('/') }}backend/assets/js/ckeditor/ckeditor.js"></script>

{{--    @if(isset($syllabus))--}}
        <script>
            // var quill = new Quill('#snow-editor');
            {{--quill.root.innerHTML    = '{!! $stuff->description !!}';--}}
            CKEDITOR.replace( 'editor' );
            CKEDITOR.replace( 'editor1' );
        </script>
{{--    @endif--}}
@endsection
