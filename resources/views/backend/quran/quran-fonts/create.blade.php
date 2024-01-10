@extends('backend.master')

@section('title')
{{isset($quranFont) ?'Update':'Create'}} Quran Font
@endsection

@section('body-title-section')
    @include('backend.includes.body-page-title-two',['parent'=>' Quran Font', 'child' => 'Create'])
@endsection

@section('body')
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card mt-3">
                <div class="card-header">
                    <h4 class="float-start">{{isset($quranFont) ?'Update':'Create'}} Quran Font</h4>
                    <a href="{{ route('quran-fonts.index') }}" class="btn btn-success float-end">
                        Manage
                    </a>
                </div>
                <div class="card-body">
                    <div>
                        <form action="{{isset($quranFont) ? route('quran-fonts.update', $quranFont->id) : route('quran-fonts.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @if(isset($quranFont))
                                @method('put')
                            @endif

                            <div class="form-group row justify-content-center mt-2">
                                <div class="col-md-12">
                                    <label  class="form-label">
                                        Quran Font
                                        <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Quran Font" data-bs-placement="right"></i>
                                    </label>
                                    <input type="text"  class="form-control" name="quran_font" placeholder="" value="{{ $errors->any() ? old('quran_font') : (isset($quranFont)? $quranFont->quran_font :'')}}">
                                    @error('quran_font')<span class="text-danger f-s-12">{{$errors->first('quran_font')}}</span> @enderror
                                </div>
                                <div class="col-md-12 mt-2">
                                    <label for="" class="">
                                        Publication Status
                                        <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Your Status" data-bs-placement="right"></i><br>
                                    </label>
                                    <div>
                                        <input type="checkbox" id="switch3" name="status" {{ isset($quranFont) && $quranFont->status == 0 ? "" : "checked" }} data-switch="success"/>
                                        <label for="switch3" data-on-label="Yes" data-off-label="No"></label>
                                    </div>
                                    @error('status')<span class="text-danger f-s-12" >{{$errors->first('status')}}</span> @enderror
                                </div>
                            </div>


                            <div class="mt-5 float-end">
                                <input type="submit" class="btn btn-success" data-provide="typeahead" id="" value="{{ isset($quranFont) ? 'Update ' : 'Create ' }} Quran Font">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
