@extends('backend.master')

@section('title')
    Academic Staff
@endsection

@section('body-title-section')
    @include('backend.includes.body-page-title-two',['parent'=>'Academic Staff', 'child' => 'manage'])
@endsection

@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-capitalize float-start">Manage Academic Staff</h4>
                    <a href="{{ route('stuffs.create') }}" class="btn btn-success float-end">
                        {{--                        <i class="mdi mdi-plus"></i>--}}
                        Create
                    </a>
                </div>
                <div class="card-body">
                    <div class="">
                        <table id="datatable-buttons" class="table table-striped table-bordered table-responsive dt-responsive nowrap w-100">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Name in Bangla</th>
                                <th>Designation</th>
                                <th>Index Number</th>
                                <th>Email</th>
                                <th>Subject</th>
                                <th>Payment Grade</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($stuffs as $stuff)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $stuff->name_english }}</td>
                                    <td>{{ $stuff->name_bangla }}</td>
                                    <td>{{ $stuff->designation->title }}</td>
                                    <td>{{ $stuff->mpo_index_number }}</td>
                                    <td>{{ $stuff->email }}</td>
                                    <td>{{ $stuff->subject }}</td>
                                    <td>{{ $stuff->salary_grade_id }}</td>
                                    <td>
                                        <img src="{{ asset($stuff->image) }}" alt="Stuff-image" style="height: 80px;">
                                    </td>
                                    <td>{{ $stuff->status == 1 ? 'Active' : 'Inactive' }}</td>
                                    <td>
                                        <a href="" class="btn btn-success btn-sm py-0 px-1 mb-1">
                                            <i class="dripicons-preview"></i>
                                        </a>
                                        <br>
                                        <a href="{{ route('stuffs.edit', $stuff->id) }}" class="btn btn-primary btn-sm py-0 px-1 mb-1">
                                            <i class="dripicons-document-edit"></i>
                                            {{--                                                <span class="f-s-11">Edit</span>--}}
                                        </a>
{{--                                        <a href="" onclick="event.preventDefault(); document.getElementById('deletePermission{{ $permission->id }}').submit();" class="btn btn-danger btn-sm">--}}
{{--                                            <i class="dripicons-trash"></i>--}}
{{--                                        </a>--}}
                                        <form action="{{ route('stuffs.destroy', $stuff->id) }}" method="post" onsubmit="return confirm('Are you sure to delete this Stuff?');">
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
            $('#datatable-buttons').DataTable({
                scrollX: true,
            });
        });

    </script>
@endsection

