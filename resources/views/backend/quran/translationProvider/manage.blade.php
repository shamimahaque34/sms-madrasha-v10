@extends('backend.master')

@section('title')
    Translation Provider
@endsection

@section('body-title-section')
    @include('backend.includes.body-page-title-two',['parent'=>'Translation Provider', 'child' => 'manage'])
@endsection

@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-capitalize float-start">Manage Translation Provider</h4>
                    <a href="{{ route('quran-translation-providers.create') }}" class="btn btn-success float-end">
                        Create
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap w-100">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Brand Name</th>
                                <th>Translated By</th>
                                <th>Language</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($transproviders as $tranprovider)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $tranprovider->brand_name }}</td>
                                    <td>{{ $tranprovider->translated_by }}</td>
                                    <td>{{ $tranprovider->language }}</td>
                                    <td>{{ $tranprovider->status==0? 'unpublished':'published'}}</td>
                                    <td >
                                        <div class="d-flex">
{{--                                            <a href="{{route('translation.show',$tranprovider->slug)}}" class=" btn btn-primary btn-sm py-0 px-1"><i class="uil-eye"></i></a>--}}
                                            <a href="{{ route('quran-translation-providers.edit',$tranprovider->slug) }}" class="mx-1 btn btn-info btn-sm py-0 px-1"><i class="dripicons-document-edit"></i></a>
                                            <form action="{{ route('quran-translation-providers.destroy',$tranprovider->slug) }}" method="post" style="display: inline-block"  onsubmit="return confirm('Are You sure that to delete this Translation Provider'); ">
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

