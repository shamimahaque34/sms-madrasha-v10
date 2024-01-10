@extends('backend.master')

@section('title')
    Exam mark Distribution Type
@endsection

@section('body-title-section')
    @include('backend.includes.body-page-title-two',['parent'=>'Exam Mark distribution type', 'child' => 'manage'])
@endsection

@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-capitalize float-start">Manage Exam Mark distribution</h4>
                    <a href="{{ route('exam-mark-distribution-types.create') }}" class="btn btn-success float-end">
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
                                <th>Distribution Type</th>
                                <th>Mark Value</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($exam_dist_type as $examdist)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $examdist->distribution_type }}</td>
                                    <td>{{ $examdist->mark_value }}</td>
                                     <td>{{ $examdist->status==0? 'Unpublished':'Published'}}</td>
                                    <td>
                                        {{--                                        <a href="{{route('section.show',$examdist->id)}}" class="btn btn-{{$examdist->status==0? 'secondary':'primary'}} btn-sm py-0 px-1"><i class="uil-arrow-{{$examdist->status==0? 'down':'up'}}"></i></a>--}}
                                        <a href="{{ route('exam-mark-distribution-types.edit',$examdist->slug) }}" class="btn btn-info btn-sm py-0 px-1"><i class="dripicons-document-edit"></i></a>
                                        <form action="{{ route('exam-mark-distribution-types.destroy',$examdist->slug) }}" method="post" style="display: inline-block"  onsubmit="return confirm('Are You sure that to delete this Exam Mark Distribution Type'); ">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger btn-sm py-0 px-1">
                                                <i class="dripicons-trash"></i>
                                            </button>
                                        </form>
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
