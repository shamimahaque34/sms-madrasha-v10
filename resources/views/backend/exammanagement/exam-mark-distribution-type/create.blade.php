@extends('backend.master')

@section('title')
{{isset($ExamMarkDistribution) ?'Update':'Create'}} Exam Mark Distribution Type
@endsection



@section('body-title-section')
    @include('backend.includes.body-page-title-two',['parent'=>'Exam Mark Distribution Type', 'child' =>'Create'])
@endsection

@section('body')
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card mt-3">
                <div class="card-header">
                    <h4 class="float-start">{{isset($ExamMarkDistribution) ?'Update':'Create'}} Exam Mark Distribution Type</h4>
                    <a href="{{ route('exam-mark-distribution-types.index') }}" class="btn btn-success float-end">
                        Manage
                    </a>
                </div>
                <div class="card-body">
                    <div>
                        <form action="{{isset($ExamMarkDistribution) ? route('exam-mark-distribution-types.update', $ExamMarkDistribution->id) : route('exam-mark-distribution-types.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @if(isset($ExamMarkDistribution))
                                @method('put')
                            @endif
                            <div class="row mt-2">
                                <div class="col-md-12 mb-4">
                                    <label for="disabledTextInput" class="form-label">
                                        Distribution Type
                                        <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Your Diostribution Type" data-bs-placement="right"></i>
                                    </label>
                                    <input type="text" name="distribution_type" class="form-control" value="{{ $errors->any() ? old('distribution_type') : (isset($ExamMarkDistribution)? $ExamMarkDistribution->distribution_type :'')}}" placeholder="Distribution Type" />
                                    {{--                                                <select name="distribution_type" class="select1 form-control" data-toggle="select1"  data-placeholder="Choose ...">--}}
                                    {{--                                                    <option value="">Select  a Distribution Type</option>--}}
                                    {{--                                                    <option value="1">ss</option>--}}
                                    {{--                                                    --}}{{--                                                    @foreach($classes as $class)--}}
                                    {{--                                                    --}}{{--                                                        <option value="{{$errors->any()? old('hostel_type'): $class->id}}" {{isset($subject) && $subject->hostel_type?'selected':''}}> {{$class->hostel_type}}</option>--}}
                                    {{--                                                    --}}{{--                                                    @endforeach--}}
                                    {{--                                                </select>--}}
                                    @error('distribution_type')<span class="text-danger f-s-12">{{$errors->first('distribution_type')}}</span> @enderror
                                </div>
                                <div class="col-md-12 mb-4">
                                    <label  class="form-label">
                                        Mark value
                                        <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Your Mark Value" data-bs-placement="right"></i>
                                    </label>
                                    <input type="text"  class="form-control" name="mark_value" placeholder="" value="{{ $errors->any() ? old('mark_value') : (isset($ExamMarkDistribution)? $ExamMarkDistribution->mark_value :'')}}">
                                    @error('mark_value')<span class="text-danger f-s-12">{{$errors->first('mark_value')}}</span> @enderror
                                </div>
                            </div>
                            <div class="col-md-12 mb-4">
                                <label for="" class="col-md-4">
                                    Status
                                    <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Your Status" data-bs-placement="right"></i>
                                </label>
                                <br>
                                <div>
                                    <input type="checkbox" id="switch2" name="status" {{ isset($ExamMarkDistribution) && $ExamMarkDistribution->status == 0 ? "" : "checked" }} data-switch="success"/>
                                    <label for="switch2" data-on-label="Yes" data-off-label="No"></label>
                                </div>
                                <br> @error('status')<span class="text-danger f-s-12">{{$errors->first('status')}}</span> @enderror
                            </div>
                            <div class=" form-group row mt-3 row">
                                <input type="submit" value="{{isset($ExamMarkDistribution)?'Update ':'Add '}} Exam Mark Distribution Type" class="btn btn-success col-md-6 mx-auto">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
