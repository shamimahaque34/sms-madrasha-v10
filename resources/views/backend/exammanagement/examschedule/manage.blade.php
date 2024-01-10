@extends('backend.master')

@section('title')
    Exam Schedule
@endsection

@section('body-title-section')
    @include('backend.includes.body-page-title-two',['parent'=>'Exam schedule', 'child' => 'manage'])
@endsection

@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-capitalize float-start">Manage Exam Schedule</h4>
                    <a href="{{ route('exam-schedules.create') }}" class="btn btn-success float-end">
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
                                <th>Class </th>
                                <th>Exam</th>
                                <th>Section</th>
                                <th>Subject</th>
                                <th>Academic Year</th>

                                <th>Exam Date</th>
                                <th>Start Time</th>
                                <th>End Time</th>
                                <th>Room</th>
                                <th>Note</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($schedul as $exam)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $exam->academicClass->class_name}}</td>
                                    <td>{{ $exam->exam->title}}</td>
                                    <td>{{ $exam->section->section_name}}</td>
                                    <td>{{ $exam->subject->subject_name}}</td>
                                    <td>{{ \Illuminate\Support\Carbon::parse($exam->academicYear->session_year_start)->format('Y').' - '.\Illuminate\Support\Carbon::parse($exam->academicYear->session_year_end)->format('Y') }}</td>

                                    <td>{{ $exam->exam_date->format('d-m-Y') }}</td>
                                    <td>{{ $exam->start_time }}</td>
                                    <td>{{ $exam->end_time }}</td>
                                    <td>{{ $exam->room }}</td>
                                    <td>{!! \Illuminate\Support\Str::words($exam->note,8,'....') !!} </td>
                                    <td>{{ $exam->status==0? 'Unpublished':'Published'}}</td>
                                    <td>
                                        {{--                                        <a href="{{route('section.show',$exam->id)}}" class="btn btn-{{$exam->status==0? 'secondary':'primary'}} btn-sm py-0 px-1"><i class="uil-arrow-{{$exam->status==0? 'down':'up'}}"></i></a>--}}
                                        <div class="d-flex">
                                        <a href="{{ route('exam-schedules.edit', $exam->id) }}" class="btn btn-info btn-sm py-0 px-1 me-1"><i class="dripicons-document-edit"></i></a>
                                        <form action="{{ route('exam-schedules.destroy', $exam->id) }}" method="post" style="display: inline-block"  onsubmit="return confirm('Are You sure that to delete this Exam Schedule'); ">
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

