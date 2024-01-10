@extends('backend.master')

@section('title')
{{isset($academicClass) ?'Update':'Create'}} Academic Class
@endsection

@section('body-title-section')
    @include('backend.includes.body-page-title-two',['parent'=>' academic Class', 'child' => 'Create'])
@endsection

@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="card mt-3">
                <div class="card-header">
                    <h4 class="float-start">{{isset($academicClass) ?'Update':'Create'}} Academic Class</h4>
                    <a href="{{ route('academic-classes.index') }}" class="btn btn-success float-end">
                        Manage
                    </a>

                </div>
                <div class="card-body">
                    <div>
                        <form action="{{isset($academicClass) ? route('academic-classes.update', $academicClass->id) : route('academic-classes.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @if(isset($academicClass))
                                @method('put')
                            @endif

                            <div class="row mt-2">

                                <div class="col-md-6 mb-4">
                                    <label  class="form-label">Educational Stage </label>
                                    <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Educational stage" data-bs-placement="right"></i>
                                    <select name="educational_stage_id" class=" form-control " data-toggle="select" data-placeholder="Choose ...">
                                        <option value="">Select a Educational Stage</option>
                                        @foreach($educationalStages as $educationalStage)
                                            <option value="{{$educationalStage->id}}" {{$errors->any() ? (old('educational_stage_id')) :(isset($academicClass) && $academicClass->educational_stage_id==$educationalStage->id? 'selected':'')}}> {{$educationalStage->group_name}}</option>
                                        @endforeach
                                    </select>
                                    @error('educational_stage_id')<span class="text-danger f-s-12">{{$errors->first('educational_stage_id')}}</span> @enderror
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label  class="form-label">
                                        Class Name
                                        <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Class Name" data-bs-placement="right"></i>
                                    </label>
                                    <input type="text"  class="form-control" name="class_name" placeholder="" value="{{ $errors->any() ? old('class_name') : (isset($academicClass)? $academicClass->class_name :'')}}">
                                    @error('class_name')<span class="text-danger f-s-12">{{$errors->first('class_name')}}</span> @enderror
                                </div>
                                <div class="col-md-12 mb-4">
                                    <label for="" class="form-label">
                                        Note
                                        <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Note" data-bs-placement="right"></i>
                                    </label>
                                    <textarea name="note" id="editor" cols="20" rows="5" class="form-control" value="">{!!$errors->any() ? (old('note')) :(isset($academicClass)? $academicClass->note:'')!!}</textarea>
                                    @error('note')<span class="text-danger f-s-12">{{$errors->first('note')}}</span> @enderror
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label  class="form-label">
                                        Class Numeric
                                        <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Class Numeric" data-bs-placement="right"></i>
                                    </label>
                                    <input type="text"  class="form-control" name="class_numeric" placeholder="" value="{{ $errors->any() ? old('class_numeric') : (isset($academicClass)? $academicClass->class_numeric :'')}}">
                                    @error('class_numeric')<span class="text-danger f-s-12">{{$errors->first('class_numeric')}}</span> @enderror
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label for="" class="">
                                        Status
                                        <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Your Status" data-bs-placement="right"></i><br>
                                    </label>
                                    <br>
                                    <div class="d-inline">
                                        <input type="checkbox" {{ isset($academicClass) && $academicClass->status == 0 ? '' : 'checked' }} name="status" id="switch1"  data-switch="bool"/>
                                        <label for="switch1" data-on-label="On" data-off-label="Off"></label>
                                    </div>
                                    @error('status')<span class="text-danger f-s-12" >{{$errors->first('status')}}</span> @enderror
                                </div>
                                <div class="text-center">
                                    <input type="submit" class="btn btn-success" data-provide="typeahead" id="" value="{{ isset($academicClass) ? 'Update ' : 'Create ' }}Academic Class ">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
