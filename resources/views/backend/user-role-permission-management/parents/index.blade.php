@extends('backend.master')

@section('title')
    Parents
@endsection

@section('body-title-section')
    @include('backend.includes.body-page-title-two',['parent'=>'Parents', 'child' => 'manage'])
@endsection

@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-capitalize float-start">Manage Parents</h4>
                    <a href="{{ route('parents.create') }}" class="btn btn-success float-end">
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
                                <th>Name (Bangla)</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>F.Prof</th>
                                <th>M.Prof</th>
                                <th>Birth</th>
                                <th>Gender</th>
                                <th>Religion</th>
                                <th>Address</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($parents as $parent)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $parent->name_english }}</td>
                                    <td>{{ $parent->name_bangla }}</td>
                                    <td>{{ $parent->email }}</td>
                                    <td>{{ $parent->phone }}</td>
                                    <td>{{ $parent->fathers_profession }}</td>
                                    <td>{{ $parent->mothers_profession }}</td>
                                    <td>{{ $parent->dob }}</td>
                                    <td>{{ $parent->gender }}</td>
                                    <td>{{ $parent->religion }}</td>
                                    <td>{!! $parent->address !!}</td>
                                    <td>
                                        <img src="{{ asset($parent->image) }}" alt="teacher-image" style="height: 60px;">
                                    </td>
                                    <td>{{ $parent->status == 1 ? 'Active' : 'Inactive' }}</td>
                                    <td>
                                        <a href="" class="btn btn-success btn-sm py-0 px-1 mb-1">
                                            <i class="dripicons-preview"></i>
                                        </a>
                                        <br>
                                        <a href="{{ route('parents.edit', $parent->id) }}" class="btn btn-primary btn-sm py-0 px-1 mb-1">
                                            <i class="dripicons-document-edit"></i>
                                        </a>
                                        <form action="{{ route('parents.destroy', $parent->id) }}" method="post">
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

