@extends('backend.master')

@section('title')
   Academic Class
@endsection

@section('body-title-section')
    @include('backend.includes.body-page-title-two',['parent'=>'academic Class', 'child' => 'manage'])
@endsection

@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-capitalize float-start">Manage Academic Class</h4>
                    <a href="{{ route('academic-classes.create') }}" class="btn btn-success float-end">
                        Create
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap w-100">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Educational Stage Name</th>
                                <th>Class Name</th>
                                <th>Class Numeric</th>
                                <th>Note</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($academicClasses as $academicClass)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $academicClass->educationalStage->group_name ?? '' }}</td>
                                    <td>{{$academicClass->class_name}}</td>
                                    <td>{{$academicClass->class_numeric}}</td>
                                    <td>{!! $academicClass->note !!}</td>
                                    <td>{{ $academicClass->status == 0? 'Unpublished':'Published'}}</td>
                                    <td >
                                        <div class="d-flex">
{{--                                            <a href="{{route('chapter.show',$chapter->slug)}}" class=" btn btn-primary btn-sm py-0 px-1"><i class="uil-eye"></i></a>--}}
                                            <a href="{{ route('academic-classes.edit',$academicClass->id) }}" class="mx-1 btn btn-info btn-sm py-0 px-1"><i class="dripicons-document-edit"></i></a>
                                            <form action="{{ route('academic-classes.destroy',$academicClass->id) }}" method="post" style="display: inline-block">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger show-alert-delete-box btn-sm py-0 px-1">
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

    @section('script')


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
@endsection

