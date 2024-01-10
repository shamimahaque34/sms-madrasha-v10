@extends('backend.master')

@section('title')
    Exam Grade
@endsection

@section('body-title-section')
    @include('backend.includes.body-page-title-two',['parent'=>'Exam Grade', 'child' => 'manage'])
@endsection

@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-capitalize float-start">Manage Exam</h4>
                    <a href="{{ route('exam-grades.create') }}" class="btn btn-success float-end">
                        {{--                        <i class="mdi mdi-plus"></i>--}}
                        Create
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap w-100">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Grade Name</th>
                                <th>Point</th>
                                <th>Mark Form</th>
                                <th>Mark To</th>
                                <th>Note</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($grade as $exam)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $exam->grade_name }}</td>
                                    <td>{{ $exam->point }}</td>
                                    <td>{{ $exam->mark_form }}</td>
                                    <td>{{ $exam->mark_to }}</td>
                                    <td>{!! \Illuminate\Support\Str::words($exam->note,4,'....') !!} </td>
                                    <td>{{ $exam->status==0? 'Unpublished':'Published'}}</td>
                                    <td>
                                        {{--                                        <a href="{{route('section.show',$exam->id)}}" class="btn btn-{{$exam->status==0? 'secondary':'primary'}} btn-sm py-0 px-1"><i class="uil-arrow-{{$exam->status==0? 'down':'up'}}"></i></a>--}}
                                        <div class="d-flex">
                                        <a href="{{ route('exam-grades.edit', $exam->id) }}" class="btn btn-info btn-sm py-0 px-1 me-1"><i class="dripicons-document-edit"></i></a>
                                        <form action="{{ route('exam-grades.destroy', $exam->id) }}" method="post" style="display: inline-block"  onsubmit="return confirm('Are You sure that to delete this Exam Grade'); ">
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

