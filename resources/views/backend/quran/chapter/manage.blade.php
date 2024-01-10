@extends('backend.master')

@section('title')
    Quran Chapter
@endsection

@section('body-title-section')
    @include('backend.includes.body-page-title-two',['parent'=>'Chapter', 'child' => 'manage'])
@endsection

@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-capitalize float-start">Manage Quran Chapter</h4>
                    <a href="{{ route('quran-chapters.create') }}" class="btn btn-success float-end">
                        Create
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap w-100">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Arabic Name</th>
                                <th>Bangla Name</th>
                                <th>English Name</th>
                                <th>Chapter Serial</th>
                                <th>Total Verse</th>
                                <th>Surah Origin</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($chapters as $chapter)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $chapter->arabic_name }}</td>
                                    <td>{{ $chapter->bangla_name }}</td>
                                    <td>{{ $chapter->english_name }}</td>
                                    <td>{{ $chapter->chapter_serial }}</td>
                                    <td>{{ $chapter->total_verse }}</td>
                                    <td>{{ $chapter->surah_origin == 1 ? 'Makki' : 'Madani' }}</td>
                                    <td>{{ $chapter->status==0? 'unpublished':'published'}}</td>
                                    <td >
                                        <div class="d-flex">
{{--                                            <a href="{{route('chapter.show',$chapter->slug)}}" class=" btn btn-primary btn-sm py-0 px-1"><i class="uil-eye"></i></a>--}}
                                            <a href="{{ route('quran-chapters.edit',$chapter->slug) }}" class="mx-1 btn btn-info btn-sm py-0 px-1"><i class="dripicons-document-edit"></i></a>
                                            <form action="{{ route('quran-chapters.destroy',$chapter->slug) }}" method="post" style="display: inline-block"  onsubmit="return confirm('Are You sure that to delete this Chapter'); ">
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

