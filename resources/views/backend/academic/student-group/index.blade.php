@extends('backend.master')

@section('title')
    {{ isset($backendSetting) ? $backendSetting->site_logo : '' }} - Manage Student Groups
@endsection

@section('body-title-section')
    @include('backend.includes.body-page-title-two',['parent'=>'Student Group', 'child' => 'Manage'])
@endsection

@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="text-capitalize float-start">Manage Student Groups</h4>
                            <a href="{{ route('student-groups.create') }}" class="btn btn-success float-end">
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
                                        <th>Group Name</th>
                                        <th>Note</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($groups as $group)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $group->group_name }}</td>
                                            <td>{!! $group->note !!}</td>
                                            <td>{{ $group->status == 1 ? 'Published' : 'Unpublished' }}</td>
                                            <td>
{{--                                                    <a href="{{ route('student-groups.show', $group->id) }}" class="btn btn-primary btn-sm mt-1 py-0 px-1">--}}
{{--                                                        <i class="dripicons-preview"></i>--}}
{{--                                                    </a>--}}
                                                    <a href="{{ route('student-groups.edit', $group->id) }}" class="btn btn-primary btn-sm mt-1 py-0 px-1">
                                                        <i class="dripicons-document-edit f-s-11"></i>
                                                    </a>
                                                <form action="{{ route('student-groups.destroy', $group->id) }}" method="post" style="display: inline-block">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-danger show-alert-delete-boxbtn-sm mt-1 py-0 px-1">
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
