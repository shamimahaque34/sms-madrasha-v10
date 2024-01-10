@extends('backend.master')

@section('title')
    Exam Attendance
@endsection

@section('body-title-section')
    @include('backend.includes.body-page-title-two',['parent'=>'exam_attendance', 'child' => 'manage'])
@endsection

@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-capitalize float-start">Manage Exam Attendance</h4>
                    <a href="{{ route('exam-attendance.create') }}" class="btn btn-success float-end">
                        {{--                        <i class="mdi mdi-plus"></i>--}}
                        Create
                    </a>
                </div>
                <div class="card-body">

                    <form action="{{ route('exam.attendance.edit') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md mb-2">
                                <label for="disabledTextInput" class="form-label">
                                    Exam Name
                                    <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Your Exam Name" data-bs-placement="right"></i>
                                </label>
                                <select name="exam_id" class="select2 form-control" id="exam" data-toggle="select2" data-placeholder="Choose Exam Name...">
                                    <option value="">Select A Option</option>
                                    @foreach($exams as $exam)
                                        <option value="{{ $exam->id}}" {{$errors->any() && old('exam_id') == $exam->id ? ('selected') : (isset($ExamAttendance) && $ExamAttendance->exam_id==$exam->id? 'selected':'')}}> {{$exam->title}}</option>
                                    @endforeach
                                </select>
                                @error('exam_id')<span class="text-danger f-s-12">{{$errors->first('exam_id')}}</span> @enderror
                            </div>

                            <div class="col-md mb-2">
                                <label for="disabledTextInput" class="form-label">
                                    Academic Class
                                    <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Your Academic Class Name" data-bs-placement="right"></i>
                                </label>
                                <select name="academic_class_id" id="class" class="select1 form-control" data-toggle="select2"  data-placeholder="Choose ...">
                                    <option value="">Select A Option</option>
                                    @foreach($classes as  $class)
                                        <option value="{{$class->id}}" {{$errors->any() && old('academic_class_id')==$class->id? ('selected'):(isset($examShedule) && $examShedule->academic_class_id==$class->id? 'selected':'')}}> {{$class->class_name}}</option>
                                    @endforeach
                                </select>
                                @error('academic_class_id')<span class="text-danger f-s-12">{{$errors->first('academic_class_id')}}</span> @enderror
                            </div>

                            <div class="col-md mb-2">
                                <label for="disabledTextInput" class="form-label">
                                    Section
                                    <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Your Section" data-bs-placement="right"></i>
                                </label>
                                <select name="section_id" class="select form-control" id="section" data-toggle="select2"  data-placeholder="Choose ...">
                                    <option value="">Select A Option</option>
                                    @foreach($sections as  $section)
                                        <option value="{{$section->id}}" {{$errors->any() && old('section_id')==$section->id? ('selected'):(isset($examShedule) && $examShedule->section_id==$section->id? 'selected':'')}}> {{$section->section_name}}</option>
                                    @endforeach
                                </select>
                                @error('section_id')<span class="text-danger f-s-12">{{$errors->first('section_id')}}</span> @enderror
                            </div>

                            <div class="col-md mb-2">
                                <label for="disabledTextInput" class="form-label">
                                    Date
                                    <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Your Section" data-bs-placement="right"></i>
                                </label>
                                <select name="date" class="select form-control" id="examDate" data-toggle="select2"  data-placeholder="Choose ...">
                                    <option value="">Select A Option</option>
{{--                                    @foreach($sections as  $section)--}}
{{--                                        <option value="{{$section->id}}" {{$errors->any() && old('section_id')==$section->id? ('selected'):(isset($examShedule) && $examShedule->section_id==$section->id? 'selected':'')}}> {{$section->section_name}}</option>--}}
{{--                                    @endforeach--}}
                                </select>
                                @error('section_id')<span class="text-danger f-s-12">{{$errors->first('section_id')}}</span> @enderror
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-md-4">
                                <button type="button" id="searchButton" class="btn btn-success">Search</button>
                            </div>
                        </div>
                        <div class="row mt-3 d-none" id="manageExamAttendanceTable">
                            <div class="col-12">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Present</th>
                                            <th>Image</th>
                                            <th>Name</th>
                                            <th>Class</th>
                                            <th>Section</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="studentAttendanceTable"></tbody>
                                </table>
                            </div>
                            <div class="col-4 d-none" id="submitBtn">
                                <input type="submit" class="btn btn-success" value="update">
                            </div>
                        </div>
                    </form>

{{--                    <div class="table-responsive">--}}
{{--                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap w-100">--}}
{{--                            <thead>--}}
{{--                            <tr>--}}
{{--                                <th>#</th>--}}
{{--                                <th>Exam</th>--}}
{{--                                <th>Exam Schedule</th>--}}
{{--                                <th>Student Name</th>--}}
{{--                                <th>Section Name</th>--}}
{{--                                <th>Accademic Class</th>--}}
{{--                                <th>Date</th>--}}
{{--                                <th>Is Present</th>--}}
{{--                                <th>Status</th>--}}
{{--                                <th>Action</th>--}}
{{--                            </tr>--}}
{{--                            </thead>--}}
{{--                            <tbody>--}}
{{--                            @foreach($attendance as $exam)--}}
{{--                                <tr>--}}
{{--                                    <td>{{ $loop->iteration }}</td>--}}
{{--                                    <td>{{ $exam->exam->title}}</td>--}}
{{--                                    <td>{{ $exam->examSchedule->exam_date }}</td>--}}
{{--                                    <td>{{ $exam->student_id }}</td>--}}
{{--                                    <td>{{ $exam->section->section_name }}</td>--}}
{{--                                    <td>{{ $exam->academicClass->class_name }}</td>--}}
{{--                                    <td>{{ $exam->date }}</td>--}}
{{--                                    <td>{{ $exam->is_present }}</td>--}}
{{--                                    <td>{{ $exam->status==0? 'Unpublished':'Publishid'}}</td>--}}
{{--                                    <td>--}}
{{--                                        --}}{{--                                        <a href="{{route('section.show',$exam->id)}}" class="btn btn-{{$exam->status==0? 'secondary':'primary'}} btn-sm py-0 px-1"><i class="uil-arrow-{{$exam->status==0? 'down':'up'}}"></i></a>--}}
{{--                                        <a href="{{ route('exam-attendance.edit', $exam->id) }}" class="btn btn-info btn-sm py-0 px-1"><i class="dripicons-document-edit"></i></a>--}}
{{--                                        <form action="{{ route('exam-attendance.destroy', $exam->id) }}" method="post" style="display: inline-block"  onsubmit="return confirm('Are You sure that to delete this Exam Attendence'); ">--}}
{{--                                            @csrf--}}
{{--                                            @method('delete')--}}
{{--                                            <button type="submit" class="btn btn-danger btn-sm py-0 px-1">--}}
{{--                                                <i class="dripicons-trash"></i>--}}
{{--                                            </button>--}}
{{--                                        </form>--}}
{{--                                    </td>--}}
{{--                                </tr>--}}
{{--                            @endforeach--}}
{{--                            </tbody>--}}
{{--                        </table>--}}
{{--                    </div>--}}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/themes/black-tie/jquery-ui.min.css" integrity="sha512-+Z63RrG0zPf5kR9rHp9NlTMM29nxf02r1tkbfwTRGaHir2Bsh4u8A79PiUKkJq5V5QdugkL+KPfISvl67adC+Q==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/themes/black-tie/theme.min.css" integrity="sha512-pRXxoDFasJ7vmpKnFluI1tFoIQvfjxvfYSxJY7/2li9EM0RY1NlibP6K3CvyzppFY90Co/HvkEGd1W17LbaiRw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js" integrity="sha512-57oZ/vW8ANMjR/KQ6Be9v/+/h6bq9/l3f0Oc7vn6qMqyhvPd1cvKBRWWpzu0QoneImqr2SkmO4MSqU+RpHom3Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(document).on('change', '#section', function () {
            var examId = $('#exam').val();
            var classId = $('#class').val();
            var sectionId = $(this).val();
            $.ajax({
                url: baseUrl+"get-exam-schedule-by-exam-section-class",
                method: "POST",
                dataType: "JSON",
                data: { exam_id:examId, class_id:classId, section_id:sectionId },
                success: function(data) {
                    console.log(data);
                    var date = '';
                    date += '<option value="">Select A Option</option>';
                    $.each(data.schedules, function (index, val) {
                        var scDa = new Date(val.exam_date);
                        date += '<option value="'+val.exam_date+'" data-start-time="'+val.start_time+'" data-end-time="'+val.end_time+'" data-schedule-id="'+val.id+'">'+$.datepicker.formatDate('dd M yy', scDa)+'</option>';
                    })
                    $('#examDate').html(date);
                },
                error: function (error) {
                    toastr.error(error);
                }
            })
        })
        $(document).on('click', '#searchButton', function () {
            var examId = $('#exam').val();
            var classId = $('#class').val();
            var sectionId = $('#section').val();
            var scheduleId = $('#examDate option:selected').attr('data-schedule-id');
            $.ajax({
                url: baseUrl+"get-student-exam-attendance",
                method: "POST",
                dataType: "JSON",
                data: { exam_id:examId, class_id:classId, section_id:sectionId, schedule_id:scheduleId },
                success: function(data) {
                    console.log(data);
                    if (data.status == 'success')
                    {
                        var className = $('#class option:selected').text();
                        var sectionName = $('#section option:selected').text();

                        var student = '';
                        $.each(data.attendances, function (key, value) {
                            student += '<tr>';
                            student += '<td style="width: 30px"><span class="pt-3 ps-3"><input type="checkbox" '+(value.is_present == 1 ? "checked" : "")+' value="'+(value.is_present == 1 ? "1" : "0")+'" name="status[]"></span></td>';
                            student += '<td style="width: 50px"><img src="' + (baseUrl + value.student.image) + '" alt="" style="height: 35px; width: 35px"></td>';
                            student += '<td><input type="hidden" name="student_id[]" value="'+value.student.id+'">'+value.student.name_english+'</td>';
                            student += '<td><input type="hidden" name="exam_attendance_id[]" value="'+value.id+'">'+className+'</td>';
                            student += '<td>'+sectionName+'</td>';
                            student += '<td></td>';
                            // student += '<td><a href="" class="btn btn-sm btn-outline-success"><i class="fa fa-user"></i></a></td>';
                            student += '</tr>';
                        })
                        $('#studentAttendanceTable').empty().html(student);
                        $('#submitBtn').removeClass('d-none');
                        $('#manageExamAttendanceTable').removeClass('d-none');
                    }
                    if(data.status == 'empty')
                    {
                        toastr.error(data.message);
                    }
                },
                error: function (error) {
                    toastr.error(error);
                }
            })
        })
    </script>
@endsection

