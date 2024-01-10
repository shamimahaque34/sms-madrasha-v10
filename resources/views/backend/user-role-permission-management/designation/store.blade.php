@extends('backend.master')

@section('title')
    {{ isset($backendSetting) ? $backendSetting->site_title : '' }} - {{ isset($designation) ? "Update" : 'Create' }} Designation
@endsection

@section('body-title-section')
    @include('backend.includes.body-page-title-two',['parent'=>'Designation', 'child' =>  isset($designation) ? "Update" : 'Create',])
@endsection

@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-6 mx-auto">
                    <div class="card mt-3">
                        <div class="card-header">
                            <h4 class="float-start">{{ isset($designation) ? 'Update' : 'Create' }} Designation</h4>
                            <a href="{{ route('designations.index') }}" class="btn btn-success float-end">
                                Manage
                                {{--                                    <i class="dripicons-arrow-thin-left"></i>--}}
                            </a>
                        </div>
                        <div class="card-body">
                            <div>
                                <form action="{{isset($designation) ? route('designations.update', $designation->id) : route('designations.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @if(isset($designation))
                                        @method('put')
                                    @endif

                                    <div class="row mt-2">
                                        <label for="disabledTextInput" class="form-label pl-0">
                                            Title
                                            <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Write Designation Title Here" data-bs-placement="right"></i>

                                        </label>
                                        <input type="text"  class="form-control" name="title" placeholder="" value="{{ $errors->any() ? old('title') : (isset($designation)? $designation->title :'')}}">
                                        @error('title')<span class="text-danger f-s-12">{{$errors->first('title')}}</span> @enderror

                                    </div>
                                    <div class="row mt-2">
                                        <label  class="form-label pl-0">
                                            Bangla Title
                                            <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Write Designation Title in Bangla Here" data-bs-placement="right"></i>
                                        </label>
                                        <input type="text"  class="form-control" name="title_bangla" placeholder="" value="{{ $errors->any() ? old('title_bangla') : (isset($designation)? $designation->title_bangla :'')}}">
                                        @error('title_bangla')<span class="text-danger f-s-12">{{$errors->first('title_bangla')}}</span> @enderror
                                    </div>
                                    <div class="row mt-2">
                                        <label  class="form-label pl-0">
                                            Grade Position Number
                                            <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Designation grade Position Number" data-bs-placement="right"></i>
                                        </label>
                                        <input type="text"  class="form-control" name="position_number" placeholder="" value="{{ $errors->any() ? old('position_number') : (isset($designation)? $designation->position_number :'')}}">
                                        @error('position_number')<span class="text-danger f-s-12">{{$errors->first('position_number')}}</span> @enderror
                                    </div>
                                    <div class="row mt-2">
                                        <label for="" class="form-label pl-0">
                                            Status remain published
                                            <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Published Status Here" data-bs-placement="right"></i>
                                        </label>
                                        <div>
{{--                                            <label for="" class=""> <input type="radio" name="status" value="1" @if(isset($designation)) {{$designation->status == 1 ?'checked':''}} @endif> Published</label>--}}
{{--                                            <label for="" class=""> <input type="radio"  name="status" value="0" @if(isset($designation)) {{$designation->status == 0 ?'checked':''}} @endif> UnPublished</label>--}}
                                            <input type="checkbox" id="switch3" name="status" {{ isset($designation) && $designation->status == 1 ? "checked" : "" }} data-switch="success"/>
                                            <label for="switch3" data-on-label="Yes" data-off-label="No"></label>
                                        </div>
                                    </div>
                                    <div class="form-group row mt-3">
                                        <label for="" class="col-md-4"></label>
                                        <div class="col-md-4">
                                            <input type="submit" value="{{isset($designation) ? 'Update' : 'Add'}} Designation" class="btn btn-success">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        CKEDITOR.replace('editor');
    </script>
@endsection
