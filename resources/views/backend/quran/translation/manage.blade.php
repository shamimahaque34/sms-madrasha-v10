@extends('backend.master')

@section('title')
    Quran Translation
@endsection

@section('body-title-section')
    @include('backend.includes.body-page-title-two',['parent'=>'Translation', 'child' => 'manage'])
@endsection

@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-capitalize float-start">Manage Quran Translation</h4>
                    <a href="{{ route('quran-translations.create') }}" class="btn btn-success float-end">
                        Create
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap w-100">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Quran Chapter</th>
                                <th>Quran Verse</th>
                                <th>Quran Translation Provider</th>
                                <th>Translated Verse</th>
                                <th>Status</th>
                                <th>Action</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($translations as $translation)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $translation->quranChapter->arabic_name }}</td>
                                    <td>{!! \Illuminate\Support\Str::words(($translation->quranVerse->verse_arabic),3,'...') !!}</td>
                                    <td>{{ $translation->quranTranslationProvider->brand_name ?? '' }}</td>
                                    <td>{!! \Illuminate\Support\Str::words($translation->translated_verse,3,'...') !!}</td>
                                    <td>{{ $translation->status==0? 'unpublished':'published'}}</td>
                                    <td >
                                        <div class="d-flex">
{{--                                           <a href="{{route('translation.show',$translation->slug)}}" class=" btn btn-primary btn-sm py-0 px-1"><i class="uil-eye"></i></a>--}}
                                            <a href="{{ route('quran-translations.edit', $translation->slug) }}" class="mx-1 btn btn-info btn-sm py-0 px-1"><i class="dripicons-document-edit"></i></a>
                                            <form action="{{ route('quran-translations.destroy', $translation->slug) }}" method="post" style="display: inline-block"  onsubmit="return confirm('Are You sure that to delete this Translate?'); ">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger btn-sm py-0 px-1">
                                                    <i class="dripicons-trash"></i>
                                                </button>
                                            </form>
                                        </div>

                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

