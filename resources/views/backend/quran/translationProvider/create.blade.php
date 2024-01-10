@extends('backend.master')

@section('title')
{{isset($transprov) ?'Update':'Create'}} Translation Provider
@endsection



@section('body-title-section')
    @include('backend.includes.body-page-title-two',['parent'=>'Translation Provider', 'child' => 'Create'])
@endsection

@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="card mt-3">
                <div class="card-header">
                    <h4 class="float-start">{{isset($transprov) ?'Update':'Create'}} Translation Provider</h4>
                    <a href="{{ route('quran-translation-providers.index') }}" class="btn btn-success float-end">
                        Manage
                        {{--                                    <i class="dripicons-arrow-thin-left"></i>--}}
                    </a>
                </div>
                <div class="card-body">
                    <div>
                        <form action="{{isset($transprov) ? route('quran-translation-providers.update', $transprov->id) : route('quran-translation-providers.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @if(isset($transprov))
                                @method('put')
                            @endif
                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <label for="disabledTextInput" class="form-label">Brand Name </label>
                                    <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Brand Name" data-bs-placement="right"></i>
                                    <input type="text"  class="form-control mt-1" name="brand_name" placeholder="" value="{{$errors->any() ? (old('brand_name')): (isset($transprov)? $transprov->brand_name :'')}}">
                                    @error('brand_name')<span class="text-danger f-s-12">{{$errors->first('brand_name')}}</span> @enderror
                                </div>
                                <div class="col-md-6">
                                    <label  class="form-label">Translated By </label>
                                    <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Translated By" data-bs-placement="right"></i>
                                    <input type="text"  class="form-control mt-1" name="translated_by" placeholder="" value="{{$errors->any() ? (old('translated_by')) :(isset($transprov)? $transprov->translated_by :'')}}">
                                    @error('translated_by')<span class="text-danger f-s-12">{{$errors->first('translated_by')}}</span> @enderror
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <label class="form-label">language</label>
                                    <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set language" data-bs-placement="right"></i>
                                    <select name="language" class="form-control select2 mt-1" data-toggle="select2">
                                        <option value="">Select Language</option>
                                        <option value="bangla" {{$errors->any() ? (old('language')) :(isset($transprov) && $transprov->language=='bangla'? 'selected':'')}}>Bangla</option>
                                        <option value="english" {{$errors->any() ? (old('language')) :(isset($transprov) && $transprov->language=='english'? 'selected':'')}}>English</option>
                                        <option value="arabic" {{$errors->any() ? (old('language')) :(isset($transprov) && $transprov->language=='arabic'? 'selected':'')}}>Erabic</option>
                                    </select>
                                    @error('language')<span class="text-danger f-s-12">{{$errors->first('language')}}</span> @enderror
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-2">
                                        <label for="">
                                            Status
                                            <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Your Status" data-bs-placement="right"></i>
                                        </label>
                                    </div>
                                    <div>
                                        <input type="checkbox" id="switch3" name="status" {{ isset($transprov) && $transprov->status == 0 ? "" : "checked" }} data-switch="success"/>
                                        <label for="switch3" data-on-label="Yes" data-off-label="No"></label>
                                    </div>
                                    @error('language')<span class="text-danger f-s-12">{{$errors->first('language')}}</span> @enderror
                                </div>
                            </div>
                            <div class="text-center">
                                <input type="submit" class="btn btn-success" data-provide="typeahead" id="" value="{{ isset($transprov) ? 'Update ' : 'Create ' }} Provider">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

