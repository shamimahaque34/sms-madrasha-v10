@extends('backend.master')

@section('title')
{{isset($examGrade) ?'Update':'Create'}} Exam Grade
@endsection



@section('body-title-section')
    @include('backend.includes.body-page-title-two',['parent'=>'Exam Grade', 'child' =>'Create'])
@endsection

@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="card mt-3">
                <div class="card-header">
                    <h4 class="float-start">{{isset($examGrade) ?'Update':'Create'}} Exam Grade</h4>
                    <a href="{{ route('exam-grades.index') }}" class="btn btn-success float-end">
                        Manage
                    </a>
                </div>
                <div class="card-body">
                    <div>
                        <form action="{{isset($examGrade) ? route('exam-grades.update', $examGrade->id) : route('exam-grades.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @if(isset($examGrade))
                                @method('put')
                            @endif

                            <div class="row mt-2">
                                <div class="col-md-6 mb-4">
                                    <label  class="form-label">
                                        Grade Name
                                        <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Your Grade Name" data-bs-placement="right"></i>
                                    </label>
                                    <input type="text"  class="form-control" name="grade_name" placeholder="" value="{{ $errors->any() ? old('grade_name') : (isset($examGrade)? $examGrade->grade_name :'')}}">
                                    @error('grade_name')<span class="text-danger f-s-12">{{$errors->first('grade_name')}}</span> @enderror
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label  class="form-label">
                                        Point
                                        <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Your  Point" data-bs-placement="right"></i>
                                    </label>
                                    <input type="text"  class="form-control" name="point" placeholder="" value="{{ $errors->any() ? old('point') : (isset($examGrade)? $examGrade->point :'')}}">
                                    @error('point')<span class="text-danger f-s-12">{{$errors->first('point')}}</span> @enderror
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label  class="form-label">
                                        Mark Form
                                        <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Your Exam Form" data-bs-placement="right"></i>
                                    </label>
                                    <input type="text"  class="form-control" name="mark_form" placeholder="" value="{{ $errors->any() ? old('mark_form') : (isset($examGrade)? $examGrade->mark_form :'')}}">
                                    @error('mark_form')<span class="text-danger f-s-12">{{$errors->first('mark_form')}}</span> @enderror
                                </div>



                                <div class="col-md-6 mb-4">
                                    <label  class="form-label">
                                        Mark To
                                        <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Your Mark To" data-bs-placement="right"></i>
                                    </label>
                                    <input type="text"  class="form-control" name="mark_to" placeholder="" value="{{ $errors->any() ? old('mark_to') : (isset($examGrade)? $examGrade->mark_to :'')}}">
                                    @error('mark_to')<span class="text-danger f-s-12">{{$errors->first('mark_to')}}</span> @enderror
                                </div>





                                <div class="col-md-12 mb-4">
                                    <label for="" class="form-label">
                                        Note
                                        <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Your Note" data-bs-placement="right"></i>
                                    </label>
                                    <textarea name="note" id="editor" cols="20" rows="5" class="form-control" >{!!isset($examGrade)? $examGrade->note:''!!}</textarea>
                                    @error('note')<span class="text-danger f-s-12">{{$errors->first('note')}}</span> @enderror
                                </div>

                                <div class="col-md-4 mb-4">
                                    <label for="" class="">
                                        Publication Status
                                        <i class="dripicons-question f-s-12" data-bs-toggle="tooltip" data-bs-title="Set Exam Grade Publication Status" data-bs-placement="right"></i>
                                    </label>
                                    <div>
                                        <input type="checkbox" id="switch2" name="status" {{ isset($examGrade) && $examGrade->status == 0 ? "" : "checked" }} data-switch="success"/>
                                        <label for="switch2" data-on-label="Yes" data-off-label="No"></label>
                                    </div>
                                    @error('status')<span class="text-danger f-s-12" >{{ $errors->first('status') }}</span> @enderror
                                </div>

                            </div>

                            <div class=" form-group row mt-3 row">
                                <input type="submit" value="{{isset($examGrade)?'Update ':'Add '}} Exam Grade" class="btn btn-success col-md-4 mx-auto">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
