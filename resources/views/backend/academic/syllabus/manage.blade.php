@extends('backend.master')

@section('title')
   Syllabus
@endsection

@section('body-title-section')
    @include('backend.includes.body-page-title-two',['parent'=>'Syllabus', 'child' => 'manage'])
@endsection

@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-capitalize float-start">Manage Syllabus</h4>
                    <a href="{{ route('syllabuses.create') }}" class="btn btn-success float-end">
                        Create
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap w-100">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Subject</th>
                                <th>Academic Year</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>File</th>
                                <th>File Type</th>
                                <th>Note</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($syllabuses as $syllabus)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $syllabus->subject->subject_name ?? '' }}</td>
                                    <td>{{ $syllabus->academicYear->session_year_start ?? '' }}</td>
                                    <td>{{ $syllabus->title }}</td>
                                    <td>{!! $syllabus->description !!}</td>
                                    <td><a href="{{ asset($syllabus->file) }}" download="">{{ $syllabus->title }}</a></td>
                                    <td>{{ $syllabus->file_type }}</td>
                                    <td>{!! \Illuminate\Support\Str::words($syllabus->note,8,'...') !!}</td>
                                    <td>{{ $syllabus->status == 0 ? 'Unpublished' : 'Published' }}</td>
                                    <td >
                                        <div class="d-flex">
{{--                                            <a href="{{route('chapter.show',$chapter->slug)}}" class=" btn btn-primary btn-sm py-0 px-1"><i class="uil-eye"></i></a>--}}
                                            <a href="{{ route('syllabuses.edit',$syllabus->id) }}" class="mx-1 btn btn-info btn-sm py-0 px-1"><i class="dripicons-document-edit"></i></a>
                                            <form action="{{ route('syllabuses.destroy',$syllabus->id) }}" method="post" style="display: inline-block">
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

