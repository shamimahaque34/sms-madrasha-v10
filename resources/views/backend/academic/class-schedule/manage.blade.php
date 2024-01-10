@extends('backend.master')

@section('title')
  Class Schedule
@endsection

@section('body-title-section')
    @include('backend.includes.body-page-title-two',['parent'=>'Class Schedule', 'child' => 'manage'])
@endsection

@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-capitalize float-start">Manage Class Schedule</h4>
                    <a href="{{ route('class-schedules.create') }}" class="btn btn-success float-end">
                        Create
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap w-100">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Starting Time</th>
                                <th>Ending Time</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($classSchedules as $classSchedule)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $classSchedule->starting_time }}</td>
                                    <td>{{$classSchedule->ending_time}}</td>

                                    <td>{{ $classSchedule->status == 0? 'unpublished':'published'}}</td>
                                    <td >
                                        <div class="d-flex">
{{--                                            <a href="{{route('chapter.show',$chapter->slug)}}" class=" btn btn-primary btn-sm py-0 px-1"><i class="uil-eye"></i></a>--}}
                                            <a href="{{ route('class-schedules.edit',$classSchedule->id) }}" class="mx-1 btn btn-info btn-sm py-0 px-1"><i class="dripicons-document-edit"></i></a>
                                            <form action="{{ route('class-schedules.destroy',$classSchedule->id) }}" method="post" style="display: inline-block"  onsubmit="return confirm('Are You sure that to delete this Class Schedule'); ">
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

