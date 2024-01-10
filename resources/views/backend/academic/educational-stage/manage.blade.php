@extends('backend.master')

@section('title')
   Educational Stage
@endsection

@section('body-title-section')
    @include('backend.includes.body-page-title-two',['parent'=>'Educational Stage', 'child' => 'manage'])
@endsection

@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-capitalize float-start">Manage Educational Stage</h4>
                    <a href="{{ route('educational-stages.create') }}" class="btn btn-success float-end">
                        Create
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap w-100">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Group Name</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($educationalStages as $educationalStage)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $educationalStage->group_name }}</td>
                                    <td>{{ $educationalStage->status == 0? 'unpublished':'published'}}</td>
                                    <td >
                                        <div class="d-flex">
{{--                                            <a href="{{route('chapter.show',$chapter->slug)}}" class=" btn btn-primary btn-sm py-0 px-1"><i class="uil-eye"></i></a>--}}
                                            <a href="{{ route('educational-stages.edit',$educationalStage->slug) }}" class="mx-1 btn btn-info btn-sm py-0 px-1"><i class="dripicons-document-edit"></i></a>
                                            <form action="{{ route('educational-stages.destroy',$educationalStage->slug) }}" method="post" style="display: inline-block"  onsubmit="return confirm('Are You sure that to delete this Educational Stage'); ">
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

