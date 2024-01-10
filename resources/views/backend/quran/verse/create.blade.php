@extends('backend.master')

@section('title')
{{isset($verse) ?'Update':'Create'}} Verse
@endsection



@section('body-title-section')
    @include('backend.includes.body-page-title-two',['parent'=>'verse', 'child' => 'Create'])
@endsection

@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="card mt-3">
                <div class="card-header">
                    <h4 class="float-start">{{isset($verse) ?'Update':'Create'}} Verse</h4>
                    <a href="{{ route('quran-verses.index') }}" class="btn btn-success float-end">
                        Manage
                        {{--                                    <i class="dripicons-arrow-thin-left"></i>--}}
                    </a>
                </div>
                <div class="card-body">
                    <div>
                        <form action="{{isset($verse) ? route('quran-verses.update', $verse->id) : route('quran-verses.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @if(isset($verse))
                                @method('put')
                            @endif
                            <div class="form-group row mt-2 mb-4">
                                <div class="col-md-6">
                                    <label  class="form-label">Quran Chapter </label>
                                    <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Quran Chapter" data-bs-placement="right"></i>
                                    <select name="quran_chapter_id" class=" form-control " data-toggle="select" data-placeholder="Choose ...">
                                        <option value="">select a chapter</option>
                                        @foreach($chapters as $chapter)
                                            <option value="{{$chapter->id}}" {{$errors->any() ? (old('quran_chapter_id')) :(isset($verse) && $verse->quran_chapter_id==$chapter->id? 'selected':'')}}> {{$chapter->arabic_name}}</option>
                                        @endforeach
                                    </select>
                                    @error('quran_chapter_id')<span class="text-danger f-s-12">{{$errors->first('quran_chapter_id')}}</span> @enderror
                                </div>
                                <div class="col-md-6">
                                    <label  class="form-label">Quran Font </label>
                                    <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Quran Font" data-bs-placement="right"></i>
                                    <select name="quran_font_id" class=" form-control " data-toggle="select" data-placeholder="Choose ...">
                                        <option value="">select a font</option>
                                        @foreach($quranFonts as $quranFont)
                                            <option value="{{$quranFont->id}}" {{$errors->any() ? (old('quran_font_id')) :(isset($verse) && $verse->quran_font_id==$quranFont->id? 'selected':'')}}> {{$quranFont->quran_font}}</option>
                                        @endforeach
                                    </select>
                                    @error('quran_font_id')<span class="text-danger f-s-12">{{$errors->first('quran_font_id')}}</span> @enderror
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <div class="col-md-12">
                                    <label for="" class="form-label mb-2">
                                        Verse Arabic
                                        <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Verse Arabic" data-bs-placement="right"></i>
                                    </label>
                                    <textarea name="verse_arabic" id="editor" cols="20" rows="5" class="form-control" value="">{!!$errors->any() ? (old('verse_arabic')) :(isset($verse)? $verse->verse_arabic:'')!!}</textarea>
                                    @error('verse_arabic')<span class="text-danger f-s-12">{{$errors->first('verse_arabic')}}</span> @enderror
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <div class="col-md-12">
                                    <label for="" class="form-label mb-2">
                                        Verse Bangla
                                        <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Verse Bangla" data-bs-placement="right"></i>
                                    </label>
                                    <textarea name="verse_bangla" id="editor" cols="20" rows="5" class="form-control" value="">{!!$errors->any() ? (old('verse_bangla')) :(isset($verse)? $verse->verse_bangla:'')!!}</textarea>
                                    @error('verse_bangla')<span class="text-danger f-s-12">{{$errors->first('verse_bangla')}}</span> @enderror

                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <div class="col-md-12">
                                    <label for="" class="form-label mb-2">
                                        Verse English
                                    </label>
                                    <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Verse English" data-bs-placement="right"></i>
                                    <textarea name="verse_english" id="editor" cols="20" rows="5" class="form-control" value="">{!!$errors->any() ? (old('verse_english')) :(isset($verse)? $verse->verse_english:'')!!}</textarea>
                                    @error('verse_english')<span class="text-danger f-s-12">{{$errors->first('verse_english')}}</span> @enderror

                                </div>

                            </div>
                            <div class="row">
                                <div class="{{ isset($verse) ? 'col-md-4' : 'col-md-6' }}">
                                    <label for="disabledTextInput" class="form-label">Audio</label>
                                    <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Audio" data-bs-placement="right"></i>
                                    <input type="file"  class="form-control" name="audio" placeholder="">
                                    @error('audio')<span class="text-danger f-s-12">{{$errors->first('audio')}}</span> @enderror
                                </div>

                                @if(isset($verse))
                                    <div class="col-md-4 mt-3">
                                        <audio controls autoplay muted>
                                            <source src={{asset($verse->audio)}} type="audio/mpeg">
                                        </audio>
                                    </div>
                                @endif

                                <div class="col-md-4">
                                    <label for="" class="">
                                        Status
                                        <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Your Status" data-bs-placement="right"></i>
                                    </label>
                                    <div>
                                        <input type="checkbox" id="switch3" name="status" {{ isset($verse) && $verse->status == 0 ? "" : "checked" }} data-switch="success"/>
                                        <label for="switch3" data-on-label="Yes" data-off-label="No"></label>
                                    </div>
                                    @error('audio')<span class="text-danger f-s-12">{{$errors->first('audio')}}</span> @enderror
                                </div>
                                <div class="{{ isset($verse) ? 'col-md-12 text-center' : 'col-md-2' }}">
                                    <input type="submit" class="btn btn-success mt-3 "  id="" value="{{ isset($verse) ? 'Update ' : 'Create ' }} Verse">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

