@extends('backend.master')

@section('title')
   Assignment
@endsection

@section('body-title-section')
    @include('backend.includes.body-page-title-two',['parent'=>'Assignment', 'child' => 'manage'])
@endsection

@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-capitalize float-start">Manage Assignment</h4>
                    <a href="{{ route('assignments.create') }}" class="btn btn-success float-end">
                        Create
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap w-100">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Subject Name</th>
                                <th>Academic Class Name</th>
                                <th>Section Name</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>DeadLine</th>
                                <th>File</th>
                                <th>Note</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($assignments as $assignment)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $assignment->subject->subject_name ?? '' }}</td>
                                    <td>{{ $assignment->academicClass->class_name ?? '' }}</td>
                                    <td>{{ $assignment->section->section_name ?? '' }}</td>
                                    <td>{{ $assignment->title }}</td>
                                    <td>{!! \Illuminate\Support\Str::words($assignment->description,8,'...') !!}</td>
                                    <td>{{ $assignment->deadline }}</td>
                                    <td>
                                        <a href="{{ asset($assignment->file) }}" download="">Download File</a>
                                    </td>
                                    <td>{!! \Illuminate\Support\Str::words($assignment->note,8,'...') !!}</td>
                                    <td>{{ $assignment->status == 0 ? 'Unpublished' : 'Published' }}</td>
                                    <td >
                                        <div class="d-flex">
{{--                                            <a href="{{route('chapter.show',$chapter->slug)}}" class=" btn btn-primary btn-sm py-0 px-1"><i class="uil-eye"></i></a>--}}
                                            <a href="{{ route('assignments.edit',$assignment->slug) }}" class="mx-1 btn btn-info btn-sm py-0 px-1"><i class="dripicons-document-edit"></i></a>
                                            <form action="{{ route('assignments.destroy',$assignment->slug) }}" method="post" style="display: inline-block"  onsubmit="return confirm('Are You sure that to delete this Assignment'); ">
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

