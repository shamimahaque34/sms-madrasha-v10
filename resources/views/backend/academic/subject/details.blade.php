@extends('backend.master')

@section('title')
    Teacher
@endsection

@section('body-title-section')
    @include('backend.includes.body-page-title-two',['parent'=>'Teacher', 'child' => 'manage'])
@endsection

@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-capitalize float-start">{{ $subject->subject_name }} -informations</h4>
                    <a href="{{ route('teacher.index') }}" class="btn btn-success float-end">
                        manage
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap w-100">
                            <thead>
                            <tr>
                                <th class="col-md-3">Content</th>
                                <th class="col-md-9">Informations</th>

                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>class_name</td>
                                <td>{{\App\Models\ClassMadrasha::find($subject->class_id)->class_name}}</td>
                            </tr>
                            <tr>
                                <td>Subject Name</td>
                                <td>{{ $subject->subject_name }}</td>
                            </tr>
                            <tr>
                                <td>Subject Type</td>
                                <td>{!! $subject->subject_type !!}</td>
                            </tr>
                            <tr>
                                <td>Pass Mark</td>
                                <td>{{ $subject->pass_mark }}</td>
                            </tr>
                            <tr>
                                <td>Full Mark</td>
                                <td>{{ $subject->full_mark }}</td>
                            </tr>
                            <tr>
                                <td>Subject Author</td>
                                <td>{{ $subject->subject_author }}</td>
                            </tr>
                            <tr>
                                <td>Subject Code</td>
                                <td>{{ $subject->subject_code }}</td>
                            </tr>
                            <tr>
                                <td>Subject Book</td>
                                <td>
                                    <img src="{{asset($subject->book_image) }}" style="height: 100px;width: 100px" alt="">
                                </td>
                            </tr>
                            <tr>
                                <td>Lavel</td>
                                <td>{{ $subject->lavel }}</td>
                            </tr>
                            <tr>
                                <td>is_graduation</td>
                                <td>{{ $subject->is_graduation==0? 'NO':'Yes'}}</td>
                            </tr>
                            <tr>
                                <td>is_main</td>
                                <td>{{ $subject->is_main==0? 'NO':'Yes'}}</td>
                            </tr>
                            <tr>
                                <td>is_optional</td>
                                <td>{{ $subject->is_optional==0? 'NO':'Yes'}}</td>
                            </tr>
                            <tr>
                                <td>note</td>
                                <td>{!! \Illuminate\Support\Str::words($subject->note,3,'...') !!}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

