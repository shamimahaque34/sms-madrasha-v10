@extends('backend.master')

@section('title')
  Academic Year
@endsection

@section('body-title-section')
    @include('backend.includes.body-page-title-two',['parent'=>'Academic Year', 'child' => 'manage'])
@endsection

@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-capitalize float-start">Manage Academic Year</h4>
                    <a href="{{ route('academic-years.create') }}" class="btn btn-success float-end">
                        Create
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap w-100">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Session Year Start</th>
                                <th>Session year End</th>
                                <th>Session Month start</th>
                                <th>Session Month End</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($academicYears as $academicYear)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ \Illuminate\Support\Carbon::parse($academicYear->session_year_start)->format('d F Y') }}</td>
                                    <td>{{ \Illuminate\Support\Carbon::parse($academicYear->session_year_end)->format('d F Y') }}</td>
                                    <td>{{ $academicYear->session_month_start }}</td>
                                    <td>{{ $academicYear->session_month_end }}</td>
                                    <td>{{ $academicYear->status == 0? 'unpublished':'published'}}</td>
                                    <td >
                                        <div class="d-flex">
{{--                                            <a href="{{route('chapter.show',$chapter->slug)}}" class=" btn btn-primary btn-sm py-0 px-1"><i class="uil-eye"></i></a>--}}
                                            <a href="{{ route('academic-years.edit',$academicYear->id) }}" class="mx-1 btn btn-info btn-sm py-0 px-1"><i class="dripicons-document-edit"></i></a>
                                            <form action="{{ route('academic-years.destroy',$academicYear->id) }}" method="post" style="display: inline-block"  onsubmit="return confirm('Are You sure that to delete this Academic Year'); ">
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

