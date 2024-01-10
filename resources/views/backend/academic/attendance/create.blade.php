@extends('backend.master')

@section('title')
    {{isset($attendance) ?'Update':'Create'}} Attendance
@endsection



@section('body-title-section')
    @include('backend.includes.body-page-title-two',['parent'=>'Attendance', 'child' =>'Create'])
@endsection

@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="row">
                    <div class="col-md-12 mx-auto">
                        <div class="card mt-3">
                            <div class="card-header">
                                <h4 class="float-start">{{isset($attendance) ?'Update':'Create'}} Attendance</h4>
                                <a href="{{ route('attendances.index') }}" class="btn btn-success float-end">
                                    Manage
                                </a>
                            </div>
                            <div class="card-body">
                                <div>
                                    <form action="{{isset($attendance) ? route('exam-attendance.update', $attendance->id) : route('exam-attendance.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @if(isset($attendance))
                                            @method('put')
                                        @endif

                                        <div class="row mt-2">

                                            <div class="col-md-4 mb-4">
                                                <label for="disabledTextInput" class="form-label">
                                                    Attendance Of
                                                    <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Attendance User Type" data-bs-placement="right"></i>
                                                </label>
                                                <select name="" class="select2 form-control" id="attendanceType" data-toggle="select2" data-placeholder="Choose Exam Name...">
                                                    <option value="" disabled selected><-- Select a Type --></option>
                                                    <option value="student">Student</option>
                                                    <option value="teacher">Teacher</option>
                                                    <option value="staff">Academic Stuff</option>
                                                </select>
                                                <input type="hidden" name="attendance_type" id="attendanceTypeInput">
                                                @error('exam_id')<span class="text-danger f-s-12">{{$errors->first('exam_id')}}</span> @enderror
                                            </div>

{{--                                            for student--}}
                                            <div class="col-md-4 mb-4 hide-me d-none">
                                                <label for="disabledTextInput" class="form-label">
                                                    Academic Class
                                                    <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Your Academic Class Name" data-bs-placement="right"></i>
                                                </label>
                                                <select name="academic_class_id" id="class" class="select1 form-control" data-toggle="select2"  data-placeholder="Choose ...">
                                                    <option value="">Select A Option</option>
                                                    @foreach($academicClasses as  $class)
                                                        <option value="{{$class->id}}" {{$errors->any() && old('academic_class_id')==$class->id? ('selected'):(isset($examShedule) && $examShedule->academic_class_id==$class->id? 'selected':'')}}> {{$class->class_name}}</option>
                                                    @endforeach
                                                </select>
                                                @error('academic_class_id')<span class="text-danger f-s-12">{{$errors->first('academic_class_id')}}</span> @enderror
                                            </div>

                                            <div class="col-md-4 mb-4 hide-me d-none">
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
{{--                                            for student ends--}}


                                            <div class="col-md-4 mb-4">
                                                <label for="disabledTextInput" class="form-label">
                                                    Month
                                                    <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Attendance User Type" data-bs-placement="right"></i>
                                                </label>
                                                <select name="month" class="select2 form-control" id="exam" data-toggle="select2" data-placeholder="Choose Exam Name...">
                                                    <option value="" disabled selected><-- Select a Type --></option>
                                                    <option value="January">January</option>
                                                    <option value="February">February</option>
                                                    <option value="March">March</option>
                                                    <option value="April">April</option>
                                                    <option value="May">May</option>
                                                    <option value="June">June</option>
                                                    <option value="July">July</option>
                                                    <option value="August">August</option>
                                                    <option value="September">September</option>
                                                    <option value="October">October</option>
                                                    <option value="November">November</option>
                                                    <option value="December">December</option>
                                                </select>
                                                @error('month')<span class="text-danger f-s-12">{{$errors->first('month')}}</span> @enderror
                                            </div>

                                            <div class="col-md-6 mb-4 position-relative" id="datepicker1">
                                                <label  class="form-label">
                                                    Date
                                                    <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Your Date " data-bs-placement="right"></i>
                                                </label>
                                                <input type="text" data-provide="datepicker" data-date-container="#datepicker1"  class="form-control" name="date" placeholder="" value="{{ $errors->any() ? old('exam_date') : (isset($attendance)? $attendance->exam_date :'')}}">
                                                @error('date')<span class="text-danger f-s-12">{{$errors->first('date')}}</span> @enderror
                                            </div>
                                        </div>
                                        <div class=" form-group row mt-3 ">
                                            <input type="submit"  value="{{isset($attendance)?'Update ':'Add '}} Exam Attendance" class="btn btn-success col-md-4 mx-auto">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
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


            var attendanceType = $(this).val();
            if (attendanceType == 'student')
            {
                $('.hide-me').removeClass('d-none');
            } else if (attendanceType == 'teacher')
            {
                checkHideMe();
            } else if (attendanceType == 'staff')
            {
                checkHideMe();
            }
        })
        function getAttendanceTypeAjaxData() {

        }
        function checkHideMe ()
        {
            if(!$('.hide-me').hasClass('d-none'))
            {
                $('.hide-me').addClass('d-none');
            }
        }

    </script>
@endsection
