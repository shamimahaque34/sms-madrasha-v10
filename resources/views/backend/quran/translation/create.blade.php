@extends('backend.master')

@section('title')
{{isset($translation) ?'Update':'Create'}} Quran Translation
@endsection



@section('body-title-section')
    @include('backend.includes.body-page-title-two',['parent'=>'Translation', 'child' => 'Create'])
@endsection

@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="card mt-3">
                <div class="card-header">
                    <h4 class="float-start">{{ isset($translation) ? 'Update' : 'Create' }} Quran Translation</h4>
                    <a href="{{ route('quran-translations.index') }}" class="btn btn-success float-end">
                        Manage
                    </a>
                </div>
                <div class="card-body">
                    <div>
                        <form action="{{isset($translation) ? route('quran-translations.update', $translation->id) : route('quran-translations.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @if(isset($translation))
                                @method('put')
                            @endif

                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <label for="disabledTextInput" class="form-label">
                                        Quran Chapter
                                        <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Quran Chapter" data-bs-placement="right"></i>
                                    </label>
                                    <select name="quran_chapter_id" class="select1 form-control" data-toggle="select1"  data-placeholder="Choose ...">
                                        <option value="">select a Quran Chapter</option>
                                        @foreach($chapters as $chapter)
                                            <option value="{{$chapter->id}}" {{$errors->any() ? ('selected') :(isset($translation) && $translation->quran_chapter_id==$chapter->id? 'selected':'')}}> {{$chapter->arabic_name}}</option>
                                        @endforeach
                                    </select>
                                    @error('quran_chapter_id')<span class="text-danger f-s-12">{{$errors->first('quran_chapter_id')}}</span> @enderror
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label for="disabledTextInput" class="form-label">
                                        Quran Verse
                                        <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set quran verse" data-bs-placement="right"></i>
                                    </label>
                                    <select name="quran_verse_id" class="select1 form-control" data-toggle="select1"  data-placeholder="Choose ...">
                                        <option value="">select a Quran Verse</option>
                                        @foreach($verses as $verse)
                                            <option value="{{$verse->id}}" {{$errors->any() ? ('selected') :(isset($translation) && $translation->quran_verse_id==$verse->id? 'selected':'')}}> {{$verse->verse_bangla}}</option>
                                        @endforeach
                                    </select>
                                    @error('quran_verse_id')<span class="text-danger f-s-12">{{$errors->first('quran_verse_id')}}</span> @enderror
                                </div>
                                <div class="col-md-12 mb-4">
                                    <label for="" class="form-label">
                                        Translated Verse
                                    </label>
                                    <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Translated Verse" data-bs-placement="right"></i>
                                    <textarea name="translated_verse" id="editor" cols="20" rows="5" class="form-control mt-2" value="">{!!$errors->any() ? (old('translated_verse')) :(isset($translation)? $translation->translated_verse:'')!!}</textarea>
                                    @error('translated_verse')<span class="text-danger f-s-12">{{$errors->first('translated_verse')}}</span> @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="disabledTextInput" class="form-label">
                                        Quran Translation Provider
                                        <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set quran_translation_provider" data-bs-placement="right"></i>
                                    </label>
                                    <select name="quran_translation_provider_id" class="select1 form-control" data-toggle="select1" data-placeholder="Choose ...">
                                        <option value="">select a Quran Translation Provider</option>
                                        @foreach($transproviders as $quranTranslation)
                                            <option value="{{$quranTranslation->id}}" {{$errors->any() ? ('selected') :(isset($translation) && $translation->quran_translation_provider_id==$quranTranslation->id? 'selected':'')}}> {{$quranTranslation->brand_name}}</option>
                                        @endforeach
                                    </select>
                                    @error('quran_translation_provider_id')<span class="text-danger f-s-12">{{$errors->first('quran_translation_provider_id')}}</span> @enderror
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-2">
                                        <label for="">
                                            Status
                                        </label>
                                        <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Your Status" data-bs-placement="right"></i>
                                    </div>
                                    <div>
                                        <input type="checkbox" id="switch3" name="status" {{ isset($translation) && $translation->status == 0 ? "" : "checked" }} data-switch="success"/>
                                        <label for="switch3" data-on-label="Yes" data-off-label="No"></label>
                                    </div>
                                    @error('status')<span class="text-danger f-s-12">{{$errors->first('status')}}</span> @enderror
                                </div>
                            </div>
                            <div class="mt-4 text-center">
                                <input type="submit" class="btn btn-success" data-provide="typeahead" id="" value="{{ isset($translation) ? 'Update ' : 'Create ' }} Translation">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script>
        var base_url = {!! json_encode(url('/')) !!}+'/';
        // $('#xx').click(function (){
        //     alert('sdfsdf');
        // });
        // $('#chapterId').click(function (){
        $(document).on('click','#chapterId', function(){
            // alert('sdfsdf');
            var chapterId = $(this).val();
            $.ajax({
                url: base_url +"admin/get-verse-data-by-chapter-id",
                dataType: "JSON",
                method: "POST",
                data: {quran_chapter_id:chapterId},
                success: function (res) {
                    console.log(res);
                    var verse = '';
                    verse += '<option value="">select a verse</option>';
                    $.each(res, function (index, value) {
                        verse += '<option value="'+value.id+'">'+value.verse_arabic+'</option>';
                    })

                    $('#quranVerses').empty().append(verse);
                }
            })
        })
    </script>
@endsection

