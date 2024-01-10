@extends('backend.master')

@section('title')
    {{ isset($backendSetting) ? $backendSetting->site_title : '' }} - Manage Admins
@endsection

@section('body-title-section')
    @include('backend.includes.body-page-title-two',['parent'=>'Admin', 'child' => 'Manage'])
@endsection

@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="text-capitalize float-start">Manage Admins</h4>
                            <a href="{{ route('admins.create') }}" class="btn btn-success float-end">
{{--                                                        <i class="mdi mdi-plus"></i>--}}
                                Create
                            </a>
                        </div>
                        <div class="card-body">
                            <div class="">
                                <table id="adminTable" class="table table-striped dt-responsive table-responsive nowrap w-100">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name (Eng)</th>
                                        <th>Name (Ban)</th>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>DOB</th>
                                        <th>Gender</th>
                                        <th>Religion</th>
                                        <th>Address</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($admins as $admin)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $admin->name_english }}</td>
                                                <td>{{ $admin->name_bangla }}</td>
                                                <td>{{ $admin->username }}</td>
                                                <td>{{ $admin->email }}</td>
                                                <td>{{ $admin->phone }}</td>
                                                <td>{{ $admin->dob_timestamp->format('d-m-Y') }}</td>
                                                <td>{{ $admin->gender }}</td>
                                                <td>{{ $admin->religion }}</td>
                                                <td>{!! $admin->address !!}</td>
                                                <td>
                                                    <img src="{{ asset($admin->image) }}" alt="" style="height: 80px; ">
                                                </td>
                                                <td>
                                                    <div>
                                                        <a href="{{ route('admins.show', $admin->id) }}" class="btn btn-primary btn-sm mt-1 py-0 px-1">
                                                            <i class="dripicons-preview"></i>
                                                        </a>
                                                    </div>
                                                    <div>
                                                        <a href="{{ route('admins.edit', $admin->id) }}" class="btn btn-primary btn-sm mt-1 py-0 px-1">
                                                            <i class="dripicons-document-edit f-s-11"></i>
                                                        </a>
                                                    </div>
                                                    <form action="{{ route('admins.destroy', $admin->id) }}" method="post" style="display: inline-block" onsubmit="return confirm('Are you sure to delete this Admin?');">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="btn btn-danger btn-sm mt-1 py-0 px-1">
                                                            <i class="dripicons-trash f-s-11"></i>
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
            $('#adminTable').DataTable({
                scrollX: true,
            });
        });

    </script>
@endsection
