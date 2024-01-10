@extends('backend.master')

@section('title')
    Subjects
@endsection

@section('body-title-section')
    @include('backend.includes.body-page-title-two',['parent'=>'subject', 'child' => 'manage'])
@endsection

@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-capitalize float-start">Manage Subject</h4>
                    <a href="{{ route('subjects.create') }}" class="btn btn-success float-end">
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
                                <th>Updated By</th>
                                <th>Student Group Name</th>
                                <th>Academic Class Name</th>
                                <th>Subject Name</th>
                                <th>Subject Type</th>
                                <th>Pass Mark</th>
                                <th>Final Mark</th>
                                <th>Point</th>
                                <th>Subject Author</th>
                                <th>Subject Code</th>
                                <th>Subject Book Image</th>
                                <th>Note</th>
                                <th>Is For Graduation</th>
                                <th>Is Main Subject</th>
                                <th>Is Optional</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($subjects as $subject)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{$subject->educationalStage->group_name ?? ''}}</td>
                                    <td>{{$subject->user->name}}</td>
                                    <td>{{$subject->studentGroup->group_name ?? ''}}</td>
                                    <td>{{$subject->academicClass->class_name ?? ''}}</td>
                                    <td>{{ $subject->subject_name }}</td>
                                    <td>{{ $subject->subject_type == 1 ? 'Mandatory' : '' }}{{ $subject->subject_type == 2 ? 'Optional' : '' }}</td>
                                    <td>{{ $subject->pass_mark }}</td>
                                    <td>{{ $subject->final_mark }}</td>
                                    <td>{{ $subject->point}}</td>
                                    <td>{{ $subject->subject_author }}</td>
                                    <td>{{ $subject->subject_code }}</td>
                                    <td>
                                        <img src="{{asset($subject->subject_book_image) }}" style="height: 70px;width: 70px" alt="">
                                    </td>
                                    <td>{!! \Illuminate\Support\Str::words($subject->note,3,'...') !!}</td>
                                    <td>{{ $subject->is_for_graduation==0? 'NO':'Yes'}}</td>
                                    <td>{{ $subject->is_main_subject==0? 'NO':'Yes'}}</td>
                                    <td>{{ $subject->is_optional==0? 'NO':'Yes'}}</td>
                                    <td>{{ $subject->status==0? 'Unpublished':'Published'}}</td>
                                    <td >
                                        <div class="d-flex">
                                            {{-- <a href="{{route('subject.show',$subj->slug)}}" class=" btn btn-primary btn-sm py-0 px-1"><i class="uil-eye"></i></a> --}}
                                            <a href="{{ route('subjects.edit', $subject->id) }}" class="mx-1 btn btn-info btn-sm py-0 px-1"><i class="dripicons-document-edit"></i></a>
                                            <form action="{{ route('subjects.destroy', $subject->id) }}" method="post" style="display: inline-block">
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

