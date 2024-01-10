@extends('backend.master')

@section('title')
{{isset($ExamAttendance) ?'Update':'Create'}} Exam Attendance
@endsection



@section('body-title-section')
    @include('backend.includes.body-page-title-two',['parent'=>'Exam Attendance', 'child' =>'Create'])
@endsection

@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="card mt-3">
                <div class="card-header">
                    <h4 class="float-start">{{isset($ExamAttendance) ?'Update':'Create'}} Exam Attendance</h4>
                    <a href="{{ route('exam-attendance.index') }}" class="btn btn-success float-end">
                        Manage
                    </a>
                </div>
                <div class="card-body">
                    <div>
                        <form action="{{isset($ExamAttendance) ? route('exam-attendance.update', $ExamAttendance->id) : route('exam-attendance.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @if(isset($ExamAttendance))
                                @method('put')
                            @endif

                            <div class="row mt-2">

                                <div class="col-md-4 mb-4">
                                    <label for="disabledTextInput" class="form-label">
                                        Exam Name
                                        <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Your Exam Name" data-bs-placement="right"></i>
                                    </label>
                                    <select name="exam_id" class="select2 form-control" id="exam" data-toggle="select2" data-placeholder="Choose Exam Name...">
                                        @foreach($exams as $exam)
                                            <option value="{{ $exam->id}}" {{$errors->any() && old('exam_id') == $exam->id ? ('selected') : (isset($ExamAttendance) && $ExamAttendance->exam_id==$exam->id? 'selected':'')}}> {{$exam->title}}</option>
                                        @endforeach
                                    </select>
                                    @error('exam_id')<span class="text-danger f-s-12">{{$errors->first('exam_id')}}</span> @enderror
                                </div>

                                <div class="col-md-4 mb-4">
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

                                <div class="col-md-4 mb-4">
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

                                <div class="col-md-6 mb-4 position-relative" id="datepicker1">
                                    <label  class="form-label">
                                        Date
                                        <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Your Date " data-bs-placement="right"></i>
                                    </label>
                                    {{--                                                <input type="text" data-provide="datepicker" data-date-container="#datepicker1"  class="form-control" name="date" placeholder="" value="{{ $errors->any() ? old('exam_date') : (isset($ExamAttendance)? $ExamAttendance->exam_date :'')}}">--}}
                                    <select name="date" class="select2 form-control" id="examDate" data-toggle="select2"  data-placeholder="Choose Exam Schedule...">
                                        <option value="">Select A Option</option>
                                        {{--                                                    @foreach($schedules as $schedule)--}}
                                        {{--                                                        <option value="{{ $schedule->id}}" {{$errors->any() && old('exam_schedule_id')==$schedule->id? ('selected'):(isset($ExamAttendance) && $ExamAttendance->hostel_id==$schedule->id? 'selected':'')}}> {{ \Illuminate\Support\Carbon::parse($schedule->start_time)->format('h:m').' - '.\Illuminate\Support\Carbon::parse($schedule->end_time)->format('h:m') }}</option>--}}
                                        {{--                                                    @endforeach--}}
                                    </select>
                                    @error('date')<span class="text-danger f-s-12">{{$errors->first('date')}}</span> @enderror
                                </div>

                                <div class="col-md-6 mb-4">
                                    <label for="disabledTextInput" class="form-label">
                                        Exam Schedule
                                        <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Your Exam Schedule" data-bs-placement="right"></i>
                                    </label>
                                    <input type="text" readonly class="form-control" id="scheduleReadOnlyInput">
                                    <input type="hidden" name="exam_schedule_id" id="scheduleHiddenInput">
                                    {{--                                                <select name="exam_schedule_id" id="examSchedule" class="select2 form-control" data-toggle="select2"  data-placeholder="Choose Exam Schedule...">--}}
                                    {{--                                                    <option value="">Select A Option</option>--}}
                                    {{--                                                    @foreach($schedules as $schedule)--}}
                                    {{--                                                        <option value="{{ $schedule->id}}" {{$errors->any() && old('exam_schedule_id')==$schedule->id? ('selected'):(isset($ExamAttendance) && $ExamAttendance->hostel_id==$schedule->id? 'selected':'')}}> {{ \Illuminate\Support\Carbon::parse($schedule->start_time)->format('h:m').' - '.\Illuminate\Support\Carbon::parse($schedule->end_time)->format('h:m') }}</option>--}}
                                    {{--                                                    @endforeach--}}
                                    {{--                                                </select>--}}
                                    @error('exam_schedule_id')<span class="text-danger f-s-12">{{$errors->first('exam_schedule_id')}}</span> @enderror
                                </div>




                                {{--                                            <div class="col-md-6 mb-4">--}}
                                {{--                                                <label for="disabledTextInput" class="form-label">--}}
                                {{--                                                    Student--}}
                                {{--                                                    <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Your Student" data-bs-placement="right"></i>--}}
                                {{--                                                </label>--}}
                                {{--                                                <select name="student_id" class="select1 form-control" data-toggle="select1"  data-placeholder="Choose ...">--}}
                                {{--                                                    <option value="">Select a Student</option>--}}
                                {{--                                                    <option value="1">ss</option>--}}
                                {{--                                                    --}}{{--                                                    @foreach($classes as $class)--}}
                                {{--                                                    --}}{{--                                                        <option value="{{$errors->any()? old('hostel_type'): $class->id}}" {{isset($ExamAttendance) && $ExamAttendance->hostel_type?'selected':''}}> {{$class->hostel_type}}</option>--}}
                                {{--                                                    --}}{{--                                                    @endforeach--}}
                                {{--                                                </select>--}}
                                {{--                                                @error('student_id')<span class="text-danger f-s-12">{{$errors->first('student_id')}}</span> @enderror--}}
                                {{--                                            </div>--}}
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-12">

                                    <table class="table d-none" style="">
                                        <thead>
                                        <tr>
                                            <th>Present</th>
                                            <th>Image</th>
                                            <th>Name</th>
                                            <th>Class</th>
                                            <th>Section</th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody id="studentLoop">

                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class=" form-group row mt-3 ">
                                <input type="submit"  value="{{isset($ExamAttendance)?'Update ':'Add '}} Exam Attendance" class="btn btn-success col-md-4 mx-auto">
                            </div>
                        </form>
                    </div>
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
                success: function (data) {
                    // console.log(data);
                    if (data.status == 'empty')
                    {
                        toastr.error(data.message);
                    }
                    if (data.status == 'success')
                    {
                        // var schedule = '';
                        // schedule += '<option value="">Select A Option</option>';
                        // $.each(data.schedules, function (index, val) {
                        //     schedule += '<option value="'+val.id+'">'+val.start_time+' - '+val.end_time+'</option>';
                        // })
                        // $('#examSchedule').html(schedule);

                        var date = '';
                        date += '<option value="">Select A Option</option>';
                        $.each(data.schedules, function (index, val) {
                            var scDa = new Date(val.exam_date);
                            date += '<option value="'+val.exam_date+'" data-start-time="'+val.start_time+'" data-end-time="'+val.end_time+'" data-schedule-id="'+val.id+'">'+$.datepicker.formatDate('dd M yy', scDa)+'</option>';
                        })
                        $('#examDate').html(date);

                        var className = $('#class option:selected').text();
                        var sectionName = $('#section option:selected').text();

                        var student = '';
                        $.each(data.students, function (key, value) {
                            student += '<tr>';
                            student += '<td style="width: 30px"><span class="pt-3 ps-3"><input type="checkbox" checked name="status[]"></span></td>';
                            student += '<td style="width: 50px"><img src="' + (baseUrl + value.image) + '" alt="" style="height: 35px; width: 35px"></td>';
                            student += '<td><input type="hidden" name="student_id[]" value="'+value.id+'">'+value.name_english+'</td>';
                            student += '<td>'+className+'</td>';
                            student += '<td>'+sectionName+'</td>';
                            student += '</tr>';
                        })
                        $('#studentLoop').empty().html(student);

                        $('.table').removeClass('d-none');
                    }
                },
                error: function (error) {
                    toastr.error(error);
                }
            })
        })
        $(document).on('change', '#examDate', function () {
            var scheduleId = $('#examDate option:selected').attr('data-schedule-id');
            var startTime = $('#examDate option:selected').attr('data-start-time');
            var endTime = $('#examDate option:selected').attr('data-end-time');
            $('#scheduleReadOnlyInput').val(startTime+' - '+endTime);
            $('#scheduleHiddenInput').val(scheduleId);
        })
    </script>
@endsection
