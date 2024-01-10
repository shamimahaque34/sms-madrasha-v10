@extends('backend.master')

@section('title')
    Teachers
@endsection

@section('body-title-section')
    @include('backend.includes.body-page-title-two',['parent'=>'Teachers', 'child' => 'manage'])
@endsection

@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-capitalize float-start">Manage Teachers</h4>
                    <a href="{{ route('teachers.create') }}" class="btn btn-success float-end">
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
                            @foreach($teachers as $teacher)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $teacher->name_english }}</td>
                                    <td>{{ $teacher->name_bangla }}</td>
                                    <td>{{ $teacher->designation->title }}</td>
                                    <td>{{ $teacher->mpo_index_number }}</td>
                                    <td>{{ $teacher->email }}</td>
                                    <td>{{ $teacher->subject }}</td>
                                    <td>{{ $teacher->salary_grade_id }}</td>
                                    <td>
                                        <img src="{{ asset($teacher->image) }}" alt="teacher-image" style="height: 80px;">
                                    </td>
                                    <td>{{ $teacher->status == 1 ? 'Active' : 'Inactive' }}</td>
                                    <td>
                                        <a href="" class="btn btn-success btn-sm py-0 px-1 mb-1">
                                            <i class="dripicons-preview"></i>
                                        </a>
                                        <br>
                                        <a href="{{ route('teachers.edit', $teacher->id) }}" class="btn btn-primary btn-sm py-0 px-1 mb-1">
                                            <i class="dripicons-document-edit"></i>
                                            {{--                                                <span class="f-s-11">Edit</span>--}}
                                        </a>
{{--                                        <a href="" onclick="event.preventDefault(); document.getElementById('deletePermission{{ $permission->id }}').submit();" class="btn btn-danger btn-sm">--}}
{{--                                            <i class="dripicons-trash"></i>--}}
{{--                                        </a>--}}
                                        <form action="{{ route('teachers.destroy', $teacher->id) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger show-alert-delete-box btn-sm py-0 px-1">
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




<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer">
</script>



<script type="text/javascript">
$('.show-alert-delete-box').click(function(event){
event.preventDefault();
swal({
    title:  "Are you sure?",
    text: "You won't be able to revert this!",
    icon: "warning",
    type: "warning",
    buttons: ["Cancel","Yes!"],
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes, delete it!'
}).then((willDelete) => {
    if (willDelete) {
        $(this).parent().submit();
    }
});
});
</script>


@endsection

