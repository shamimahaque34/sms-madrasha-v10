@extends('backend.master')

@section('title')
    Manage Attendance
@endsection

@section('body-title-section')
    @include('backend.includes.body-page-title-two',['parent'=>'Attendance', 'child' => 'manage'])
@endsection

@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-capitalize float-start">Manage Attendance</h4>
                    <a href="{{ route('attendances.create') }}" class="btn btn-success float-end">
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
                                <th>Academic Year</th>
                                <th>Class</th>
                                <th>Section</th>
                                <th>Month</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
{{--                            @foreach($attendances as $attendance)--}}
{{--                                <tr>--}}
{{--                                    <td>{{ $loop->iteration }}</td>--}}
{{--                                    <td>{{ $attendance->section_name }}</td>--}}
{{--                                    <td>{{ $attendance->capacity }}</td>--}}
{{--                                    <td>{!! $attendance->note !!} </td>--}}
{{--                                    <td>{{ $attendance->status==0? 'Unpublished':'Publishid'}}</td>--}}
{{--                                    <td>--}}
{{--                                        --}}{{--                                        <a href="{{route('section.show',$attendance->id)}}" class="btn btn-{{$attendance->status==0? 'secondary':'primary'}} btn-sm py-0 px-1"><i class="uil-arrow-{{$attendance->status==0? 'down':'up'}}"></i></a>--}}
{{--                                        <a href="{{ route('sections.edit', $attendance->id) }}" class="btn btn-info btn-sm py-0 px-1"><i class="dripicons-document-edit"></i></a>--}}
{{--                                        <form action="{{ route('sections.destroy', $attendance->id) }}" method="post" style="display: inline-block"  onsubmit="return confirm('Are You sure that to delete this Section'); ">--}}
{{--                                            @csrf--}}
{{--                                            @method('delete')--}}
{{--                                            <button type="submit" class="btn btn-danger btn-sm py-0 px-1">--}}
{{--                                                <i class="dripicons-trash"></i>--}}
{{--                                            </button>--}}
{{--                                        </form>--}}
{{--                                    </td>--}}
{{--                                </tr>--}}
{{--                            @endforeach--}}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('style')
    <!-- Datatables css -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.bootstrap5.min.css">
@endsection

@section('script')
    <!-- Datatables js -->
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.bootstrap5.min.js"></script>


    <script>
        $(document).ready(function () {
            $('#datatable-buttons').DataTable();
        });

    </script>
@endsection
