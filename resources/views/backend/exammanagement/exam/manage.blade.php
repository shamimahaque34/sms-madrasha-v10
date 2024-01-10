@extends('backend.master')

@section('title')
    Exam
@endsection

@section('body-title-section')
    @include('backend.includes.body-page-title-two',['parent'=>'Exam', 'child' => 'manage'])
@endsection

@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-capitalize float-start">Manage Exam</h4>
                    <a href="{{ route('exams.create') }}" class="btn btn-success float-end">
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
                                <th>Title</th>
                                <th>Display Title</th>
                                <th>Exam Code</th>
                                <th>Date</th>
                                <th>Note</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($exams as $exam)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $exam->title }}</td>
                                    <td>{{ $exam->display_title }}</td>
                                    <td>{{ $exam->exam_code }}</td>
                                    <td>{{ $exam->date->format('d-m-Y') }}</td>
                                    <td>{!! \Illuminate\Support\Str::words($exam->note,4,'....') !!} </td>
                                    <td>{{ $exam->status==0? 'Unpublished':'Publishid'}}</td>
                                    <td>
                                        {{--                                        <a href="{{route('section.show',$exam->id)}}" class="btn btn-{{$exam->status==0? 'secondary':'primary'}} btn-sm py-0 px-1"><i class="uil-arrow-{{$exam->status==0? 'down':'up'}}"></i></a>--}}
                                        <div class="d-flex">
                                        <a href="{{ route('exams.edit', $exam->slug) }}" class="btn btn-info btn-sm py-0 px-1 me-1"><i class="dripicons-document-edit"></i></a>
                                        <form action="{{ route('exams.destroy', $exam->slug) }}" method="post" style="display: inline-block"  onsubmit="return confirm('Are You sure that to delete this Exam data?'); ">
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

