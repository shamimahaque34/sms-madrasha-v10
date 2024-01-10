@extends('backend.master')

@section('title')
{{isset($exam) ?'Update':'Create'}} Exam
@endsection



@section('body-title-section')
    @include('backend.includes.body-page-title-two',['parent'=>'Exam', 'child' =>'Create'])
@endsection

@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="card mt-3">
                <div class="card-header">
                    <h4 class="float-start">{{isset($exam) ?'Update':'Create'}} Hostel</h4>
                    <a href="{{ route('exams.index') }}" class="btn btn-success float-end">
                        Manage
                    </a>
                </div>
                <div class="card-body">
                    <div>
                        <form action="{{isset($exam) ? route('exams.update',$exam->id) : route('exams.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @if(isset($exam))
                                @method('put')
                            @endif

                            <div class="row mt-4 mb-4">

                                <div class="col-md-6">
                                    <label  class="form-label">
                                        Exam Title
                                        <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Your  Exam Title" data-bs-placement="right"></i>
                                    </label>
                                    <input type="text"  class="form-control" name="title" placeholder="" value="{{ $errors->any() ? old('title') : (isset($exam)? $exam->title :'')}}">
                                    @error('title')<span class="text-danger f-s-12">{{$errors->first('title')}}</span> @enderror
                                </div>


                                <div class="col-md-6 mb-4">
                                    <label  class="form-label">
                                        Display Title
                                        <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Your  Display Title" data-bs-placement="right"></i>
                                    </label>
                                    <input type="text"  class="form-control" name="display_title" placeholder="" value="{{ $errors->any() ? old('display_title') : (isset($exam)? $exam->display_title :'')}}">
                                    @error('display_title')<span class="text-danger f-s-12">{{$errors->first('display_title')}}</span> @enderror
                                </div>




                                <div class="col-md-6 mb-4">
                                    <label  class="form-label">
                                        Exam Code
                                        <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Your Exam Code" data-bs-placement="right"></i>
                                    </label>
                                    <input type="text"  class="form-control" name="exam_code" placeholder="" value="{{ $errors->any() ? old('exam_code') : (isset($exam)? $exam->exam_code :'')}}">
                                    @error('exam_code')<span class="text-danger f-s-12">{{$errors->first('exam_code')}}</span> @enderror
                                </div>
                                <div class="col-md-6 mb-4 position-relative" id="datepicker1">
                                    <label  class="form-label">
                                        Date
                                        <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Your Date " data-bs-placement="right"></i>
                                    </label>
                                    <input type="text" data-provide="datepicker" data-date-container="#datepicker1"  class="form-control" name="date" placeholder="" value="{{ $errors->any() ? old('date') : (isset($exam)? $exam->date :'')}}">
                                    @error('date')<span class="text-danger f-s-12">{{$errors->first('date')}}</span> @enderror
                                </div>
                                <div class="col-md-12 mb-4">
                                    <label for="" class="form-label">
                                        Note
                                        <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Your Note" data-bs-placement="right"></i>
                                    </label>
                                    <textarea name="note" id="editor" cols="20" rows="5" class="form-control" >{!!isset($exam)? $exam->note:''!!}</textarea>
                                    @error('note')<span class="text-danger f-s-12">{{$errors->first('note')}}</span> @enderror
                                </div>

                                <div class="col-md-4 mb-4">
                                    <label for="" class="">
                                        Publication Status
                                        <i class="dripicons-question f-s-12" data-bs-toggle="tooltip" data-bs-title="Set Syllabus Publication Status" data-bs-placement="right"></i>
                                    </label>
                                    <div>
                                        <input type="checkbox" id="switch2" name="status" {{ isset($exam) && $exam->status == 0 ? "" : "checked" }} data-switch="success"/>
                                        <label for="switch2" data-on-label="Yes" data-off-label="No"></label>
                                    </div>
                                    @error('status')<span class="text-danger f-s-12" >{{ $errors->first('status') }}</span> @enderror
                                </div>

                            </div>


                            <div class=" form-group row mt-4 row">
                                <input type="submit" value="{{isset($exam)?'Update ':'Add '}} Exam" class="btn btn-success col-md-4 mx-auto">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
