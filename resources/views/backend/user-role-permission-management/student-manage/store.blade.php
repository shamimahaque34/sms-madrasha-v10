@extends('backend.master')

@section('title')
    {{ isset($backendSetting) ? $backendSetting->site_title : '' }} - {{ isset($student) ? "Update" : 'Create' }} Student
@endsection

@section('body-title-section')
    @include('backend.includes.body-page-title-two',['parent'=>'Student', 'child' =>  isset($student) ? "Update" : 'Create',])
@endsection

@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="card mt-3">
                <div class="card-header">
                    <h4 class="float-start">{{ isset($student) ? 'Update' : 'Create' }} Student</h4>
                    <a href="{{ route('students.index') }}" class="btn btn-success float-end">
                        Manage
                        {{--                                    <i class="dripicons-arrow-thin-left"></i>--}}
                    </a>
                </div>
                <div class="card-body">
                    <div>
                        @if(!empty($errors))
                            <ul>
                                @foreach($errors as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif
                        <form action="{{isset($student) ? route('students.update', $student->id) : route('students.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @if(isset($student))
                                @method('put')
                            @endif

                            <div class="form-group row">
                                <div class="col-md-4 mt-2">
                                    <label  class="form-label">
                                        Parents
                                        <i class="dripicons-question f-s-12" data-bs-toggle="tooltip" data-bs-title="Select Teacher's Parent Name" data-bs-placement="right"></i>
                                    </label>
                                    <select name="parent_id" class="form-control select2" data-toggle="select2" data-placeholder="select a Parent">
                                        <option value=""></option>
                                        @foreach($parents as $parent)
                                            <option value="{{ $parent->id }}" {{ isset($student) && $student->parent_id == $parent->id ? 'selected' : '' }}>{{ $parent->name_english.' ('.$parent->name_bangla.')' }}</option>
                                        @endforeach
                                    </select>
                                    @error('parent_id')<span class="text-danger f-s-12">{{$errors->first('parent_id')}}</span> @enderror
                                </div>

                                <div class="col-md-4 mt-2">
                                    <label  class="form-label">
                                        Class
                                        <i class="dripicons-question f-s-12" data-bs-toggle="tooltip" data-bs-title="Select Class" data-bs-placement="right"></i>
                                    </label>
                                    <select name="academic_class_id" id="selectClass" class="form-control select2" data-toggle="select2" data-placeholder="select a Class">
                                        <option value=""></option>
                                        @foreach($academicClasses as $academicClass)
                                            <option value="{{ $academicClass->id }}" data-class_numeric="{{ $academicClass->class_numeric }}" {{ isset($student) && $student->academic_class_id == $academicClass->id ? 'selected' : '' }}>{{ $academicClass->class_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('academic_class_id')<span class="text-danger f-s-12">{{$errors->first('academic_class_id')}}</span> @enderror
                                </div>

                                <div class="col-md-4 mt-2">
                                    <label  class="form-label">
                                        Section
                                        <i class="dripicons-question f-s-12" data-bs-toggle="tooltip" data-bs-title="Select Section" data-bs-placement="right"></i>
                                    </label>
                                    <select name="section_id" class="form-control select2" data-toggle="select2" data-placeholder="select a Section">
                                        <option value=""></option>
                                        @foreach($sections as $section)
                                            <option value="{{ $section->id }}" {{ isset($student) && $student->section_id == $section->id ? 'selected' : '' }}>{{ $section->section_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('section_id')<span class="text-danger f-s-12">{{$errors->first('section_id')}}</span> @enderror
                                </div>

                                <div class="col-md-4 mt-2 ">
                                    <label  class="form-label">
                                        Group
                                        <i class="dripicons-question f-s-12" data-bs-toggle="tooltip" data-bs-title="Select Group" data-bs-placement="right"></i>
                                    </label>
                                    <select name="student_group_id" id="selectGroup" class="form-control select2" data-toggle="select2" data-placeholder="select a Group">
                                        <option value=""></option>
                                        @foreach($studentGroups as $studentGroup)
                                            <option value="{{ $studentGroup->id }}" {{ isset($student) && $student->student_group_id == $studentGroup->id ? 'selected' : '' }}>{{ $studentGroup->group_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('student_group_id')<span class="text-danger f-s-12">{{$errors->first('student_group_id')}}</span> @enderror
                                </div>

                                <div class="col-md-4 mt-2 subject-toggle">
                                    <label  class="form-label">
                                        Main Subject
                                        <i class="dripicons-question f-s-12" data-bs-toggle="tooltip" data-bs-title="Select Main Subject" data-bs-placement="right"></i>
                                    </label>
                                    <select name="main_subject_id" class="form-control select2" id="mainSubject" data-toggle="select2" data-placeholder="select Main Subject">
                                        <option value=""></option>
                                        @foreach($subjects as $subject)
                                            <option value="{{ $subject->id }}" {{ isset($student) && $student->main_subject_id == $subject->id ? 'selected' : '' }}>{{ $subject->subject_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('main_subject_id')<span class="text-danger f-s-12">{{$errors->first('main_subject_id')}}</span> @enderror
                                    <span class="subjectError"></span>
                                </div>

                                <div class="col-md-4 mt-2 subject-toggle">
                                    <label  class="form-label">
                                        Optional Subject
                                        <i class="dripicons-question f-s-12" data-bs-toggle="tooltip" data-bs-title="Select Main Subject" data-bs-placement="right"></i>
                                    </label>
                                    <select name="optional_subject_id" class="form-control select2" id="optionalSubject" data-toggle="select2" data-placeholder="select Main Subject">
                                        <option value=""></option>
                                        @foreach($subjects as $subject)
                                            <option value="{{ $subject->id }}" {{ isset($student) && $student->optional_subject_id == $subject->id ? 'selected' : '' }}>{{ $subject->subject_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('optional_subject_id')<span class="text-danger f-s-12">{{$errors->first('optional_subject_id')}}</span> @enderror
                                    <span class="subjectError"></span>
                                </div>
                            </div>









                            <div class="form-group row mt-2">
                                <div class="col-md-4">
                                    <label for="disabledTextInput" class="form-label">
                                        <span class="text-danger">* </span>
                                        English Name
                                        <i class="dripicons-question f-s-12" data-bs-toggle="tooltip" data-bs-title="Write teacher's name in English" data-bs-placement="right"></i>
                                    </label>
                                    <input type="text"  class="form-control" name="name_english" placeholder="Name in English" value="{{ $errors->any() ? old('name_english') : (isset($student)? $student->name_english :'')}}">
                                    @error('name_english')<span class="text-danger f-s-12">{{$errors->first('name_english')}}</span> @enderror
                                </div>

                                <div class="col-md-4">
                                    <label  class="form-label">
                                        <span class="text-danger">* </span>
                                        Bangla Name
                                        <i class="dripicons-question f-s-12" data-bs-toggle="tooltip" data-bs-title="Write teacher's name in Bangla" data-bs-placement="right"></i>
                                    </label>
                                    <input type="text"  class="form-control" name="name_bangla" placeholder="Name in Bangla" value="{{ $errors->any() ? old('name_bangla') : (isset($student)? $student->name_bangla :'')}}">
                                    @error('name_bangla')<span class="text-danger f-s-12">{{$errors->first('name_bangla')}}</span> @enderror
                                </div>

                                <div class="col-md-4">
                                    <label  class="form-label">
                                        <span class="text-danger">* </span>
                                        User Name
                                        <i class="dripicons-question f-s-12" data-bs-toggle="tooltip" data-bs-title="Set unique teacher username" data-bs-placement="right"></i>
                                    </label>
                                    <input type="text" name="username" class="form-control" value="{{ $errors->any() ? old('name_bangla') : (isset($student)? $student->username :'')}}" placeholder="username" />
                                    @error('username')<span class="text-danger f-s-12">{{$errors->first('username')}}</span> @enderror
                                </div>

                                <div class="col-md-4 mt-2">
                                    <label for="disabledTextInput" class="form-label">
                                        <span class="text-danger">* </span>
                                        Email
                                        <i class="dripicons-question f-s-12" data-bs-toggle="tooltip" data-bs-title="Write Teacher Email for Login" data-bs-placement="right"></i>
                                    </label>
                                    <input type="text"  class="form-control" name="email" placeholder="email@domain.com" value="{{ $errors->any() ? old('email') : (isset($student)? $student->email :'')}}">
                                    @error('email')<span class="text-danger f-s-12">{{$errors->first('email')}}</span> @enderror
                                </div>

                                <div class="col-md-4 mt-2">
                                    <label  class="form-label">
                                        Mobile
                                        <i class="dripicons-question f-s-12" data-bs-toggle="tooltip" data-bs-title="Set teacher Mobile Number" data-bs-placement="right"></i>
                                    </label>
                                    <input type="text"  class="form-control" name="phone" placeholder="01234567890" value="{{$errors->any() ? old('phone') : (isset($student)? $student->phone :'')}}">
                                    @error('phone')<span class="text-danger f-s-12">{{$errors->first('phone')}}</span> @enderror
                                </div>

                                <div class="col-md-4 mt-2">
                                    <label  class="form-label">
                                        <span class="text-danger">* </span>
                                        Date Of Birth
                                        <i class="dripicons-question f-s-12" data-bs-toggle="tooltip" data-bs-title="Set Teacher Date Of Birth" data-bs-placement="right"></i>
                                    </label>
                                    <input type="text" class="form-control" name="dob" id="birthdatepicker" data-toggle="date-picker" data-single-date-picker="true" placeholder="" value="{{ $errors->any() ? old('dob') : (isset($student) ? \Illuminate\Support\Carbon::parse($student->dob)->format('m/d/Y') : '') }}">
                                    @error('dob')<span class="text-danger f-s-12">{{$errors->first('dob')}}</span> @enderror
                                </div>

{{--                                <div class="col-md-4 mt-2">--}}
{{--                                    <label  class="form-label">--}}
{{--                                        Created By--}}
{{--                                        <i class="dripicons-question text-danger" data-bs-toggle="tooltip" data-bs-title="Set Your Created By" data-bs-placement="right"></i>--}}
{{--                                    </label>--}}
{{--                                    <input type="text"  class="form-control" name="created_by" placeholder="" value="{{ $errors->any() ? old('created_by') : (isset($student)? $student->created_by :'')}}">--}}
{{--                                    @error('created_by')<span class="text-danger f-s-12">{{$errors->first('created_by')}}</span> @enderror--}}
{{--                                </div>--}}

                                <div class="col-md-4 mt-2">
                                    <label  class="form-label">
                                        Gender
                                        <i class="dripicons-question f-s-12" data-bs-toggle="tooltip" data-bs-title="Select Teacher's Gender" data-bs-placement="right"></i>
                                    </label>
                                    <br/>
                                    <select name="gender" class="form-control" data-toggle="select2" data-placeholder="select a gender name">
                                        <option value=""></option>
                                        <option value="male" {{ isset($student) && $student->gender == 'male' ? 'selected'  :'' }}>Male</option>
                                        <option value="female" {{ isset($student) && $student->gender == 'female' ? 'selected'  :'' }}>Female</option>
                                        <option value="other" {{ isset($student) && $student->gender == 'other' ? 'selected'  :'' }}>Other</option>
                                    </select>
                                    @error('gender')<span class="text-danger f-s-12">{{$errors->first('gender')}}</span> @enderror
                                </div>

                                <div class="col-md-4 mt-2">
                                    <label  class="form-label">
                                        <span class="text-danger">* </span>
                                        Blood Group
                                        <i class="dripicons-question f-s-12" data-bs-toggle="tooltip" data-bs-title="Select a Blood Group" data-bs-placement="right"></i>
                                    </label>
                                    <select name="blood_group" id="" class="form-control select2" data-toggle="select2" data-placeholder="Select a Blood Group">
                                        <option value=""></option>
                                        <option value="A+" {{ isset($student) && $student->blood_group == 'A+' ? 'selected'  : '' }}>A RhD positive (A+)</option>
                                        <option value="A-" {{ isset($student) && $student->blood_group == 'A-' ? 'selected'  : '' }}>A RhD negative (A-)</option>
                                        <option value="B+" {{ isset($student) && $student->blood_group == 'B+' ? 'selected'  : '' }}>B RhD positive (B+)</option>
                                        <option value="B-" {{ isset($student) && $student->blood_group == 'B-' ? 'selected'  : '' }}>B RhD negative (B-)</option>
                                        <option value="O+" {{ isset($student) && $student->blood_group == 'O+' ? 'selected'  : '' }}>O RhD positive (O+)</option>
                                        <option value="O-" {{ isset($student) && $student->blood_group == 'O-' ? 'selected'  : '' }}>O RhD negative (O-)</option>
                                        <option value="AB+" {{ isset($student) && $student->blood_group == 'AB+' ? 'selected'  : '' }}>AB RhD positive (AB+)</option>
                                        <option value="AB-" {{ isset($student) && $student->blood_group == 'AB-' ? 'selected'  : '' }}>AB RhD negative (AB-)</option>
                                    </select>
                                    @error('blood_group')<span class="text-danger f-s-12">{{$errors->first('blood_group')}}</span> @enderror
                                </div>

                                <div class="col-md-4 mt-2">
                                    <label  class="form-label">
                                        Religion
                                        <i class="dripicons-question f-s-12" data-bs-toggle="tooltip" data-bs-title="Select teacher's religion" data-bs-placement="right"></i>
                                    </label>
                                    <select name="religion" class="form-control select2" data-toggle="select2" data-placeholder="select a religion name">
                                        <option value=""></option>
                                        <option value="Islam" {{ isset($student) && $student->religion == 'Islam' ? 'selected'  :'' }}>Islam</option>
                                        <option value="Hinduism" {{ isset($student) && $student->religion == 'Hinduism' ? 'selected'  :'' }}>Hinduism</option>
                                        <option value="Buddhism" {{ isset($student) && $student->religion == 'Buddhism' ? 'selected'  :'' }}>Buddhism</option>
                                        <option value="Christianity" {{ isset($student) && $student->religion == 'Christianity' ? 'selected'  :'' }}>Christianity</option>
                                        <option value="Other" {{ isset($student) && $student->religion == 'Other' ? 'selected'  :'' }}>Other</option>
                                    </select>
                                    @error('religion')<span class="text-danger f-s-12">{{$errors->first('religion')}}</span> @enderror
                                </div>


                                <div class="col-md-4 mt-2">
                                    <label for="" class="form-label">
                                        Registration Number
                                        <i class="dripicons-question f-s-12" data-bs-toggle="tooltip" data-bs-title="Insert Teacher Highest Education" data-bs-placement="right"></i>
                                    </label>
                                    <input type="text"  class="form-control" name="registration_no" placeholder="123456789" value="{{$errors->any() ? old('registration_no') : (isset($student)? $student->registration_no :'')}}">
                                    @error('registration_no')<span class="text-danger f-s-12">{{$errors->first('registration_no')}}</span> @enderror
                                </div>

                                <div class="col-md-4 mt-2">
                                    <label for="" class="form-label">
                                        Roll Number
                                        <i class="dripicons-question f-s-12" data-bs-toggle="tooltip" data-bs-title="Insert Teacher Highest Education" data-bs-placement="right"></i>
                                    </label>
                                    <input type="text"  class="form-control" name="roll_no" placeholder="123456789" value="{{$errors->any() ? old('roll_no') : (isset($student)? $student->roll_no :'')}}">
                                    @error('roll_no')<span class="text-danger f-s-12">{{$errors->first('roll_no')}}</span> @enderror
                                </div>

                                <div class="col-md-4 mt-2">
                                    <label  class="form-label">
                                        Country
                                        <i class="dripicons-question f-s-12" data-bs-toggle="tooltip" data-bs-title="Select Country" data-bs-placement="right"></i>
                                    </label>
                                    <select name="country" class="form-control select2" data-toggle="select2" data-placeholder="select Country">
                                        <option value=""></option>
                                        <option value="Bangladesh" {{ isset($student) && $student->country == 'Bangladesh' ? 'selected'  :'' }}>Bangladesh</option>
                                    </select>
                                    @error('country')<span class="text-danger f-s-12">{{$errors->first('country')}}</span> @enderror
                                </div>

                                <div class="col-md-4 mt-2">
                                    <label for="" class="form-label">
                                        State
                                        <i class="dripicons-question f-s-12" data-bs-toggle="tooltip" data-bs-title="Insert State name if has any" data-bs-placement="right"></i>
                                    </label>
                                    <input type="text"  class="form-control" name="state" placeholder="State Name" value="{{$errors->any() ? old('state') : (isset($student)? $student->state :'')}}">
                                    @error('state')<span class="text-danger f-s-12">{{$errors->first('state')}}</span> @enderror
                                </div>

                                <div class="col-md-4 mt-2">
                                    <label  class="form-label">
                                        Division
                                        <i class="dripicons-question f-s-12" data-bs-toggle="tooltip" data-bs-title="Select Division" data-bs-placement="right"></i>
                                    </label>
                                    <select name="division" id="divisions" class="form-control select2" data-toggle="select2" data-placeholder="select Division" onchange="divisionsList();">
                                        <option value="" selected></option>
                                        <option value="Barishal" {{ isset($student) && $student->division == 'Barishal' ? 'selected'  :'' }}>Barishal</option>
                                        <option value="Chattogram" {{ isset($student) && $student->division == 'Chattogram' ? 'selected'  :'' }}>Chattogram</option>
                                        <option value="Dhaka" {{ isset($student) && $student->division == 'Dhaka' ? 'selected'  :'' }}>Dhaka</option>
                                        <option value="Khulna" {{ isset($student) && $student->division == 'Khulna' ? 'selected'  :'' }}>Khulna</option>
                                        <option value="Mymensingh" {{ isset($student) && $student->division == 'Mymensingh' ? 'selected'  :'' }}>Mymensingh</option>
                                        <option value="Rajshahi" {{ isset($student) && $student->division == 'Rajshahi' ? 'selected'  :'' }}>Rajshahi</option>
                                        <option value="Rangpur" {{ isset($student) && $student->division == 'Rangpur' ? 'selected'  :'' }}>Rangpur</option>
                                        <option value="Sylhet" {{ isset($student) && $student->division == 'Sylhet' ? 'selected'  :'' }}>Sylhet</option>
                                    </select>
                                    @error('division')<span class="text-danger f-s-12">{{$errors->first('division')}}</span> @enderror
                                </div>

                                <div class="col-md-4 mt-2">
                                    <label class="form-label">
                                        District
                                        <i class="dripicons-question f-s-12" data-bs-toggle="tooltip" data-bs-title="Select District" data-bs-placement="right"></i>
                                    </label>
                                    <select name="district" id="distr" class="form-control select2" data-toggle="select2" data-placeholder="select District" onchange="">
                                        <option value=""></option>
                                        @if(isset($student))
                                            <option value="{{ $student->district }}" selected>{{ $student->district }}</option>
                                        @endif
                                    </select>
                                </div>

                                <div class="col-md-6 mt-2">
                                    <label for="" class="form-label">
                                        Address
                                        <i class="dripicons-question f-s-12" data-bs-toggle="tooltip" data-bs-title="Insert Teacher's Address" data-bs-placement="right"></i>
                                    </label>
                                    <textarea name="address" style="height: 100px" id="editor" cols="20" rows="5" class="form-control">{!!isset($student)? $student->address : '' !!}</textarea>
                                    @error('address')<span class="text-danger f-s-12">{{$errors->first('address')}}</span> @enderror
                                </div>

                                <div class="col-md-4 mt-2">
                                    <label class="form-label">
                                        <span class="text-danger">* </span>
                                        Image
                                        <i class="dripicons-question f-s-12" data-bs-toggle="tooltip" data-bs-title="upload Student's Image" data-bs-placement="right"></i>
                                    </label>
                                    <br>
                                    <input type="file" class="form-control-file" name="image" accept="image/*" />
                                    <br>
                                    @error('image')<span class="text-danger f-s-12">{{$errors->first('image')}}</span> @enderror
                                    @if(isset($student))
                                        <img src="{{asset($student->image)}}" style="height: 100px;width: 100px" alt="">
                                    @endif
                                </div>

                                <div class="col-md-6 mt-2">
                                    <label for="" class="form-label">
                                        Extra Activities
                                        <i class="dripicons-question f-s-12" data-bs-toggle="tooltip" data-bs-title="Insert Extra Activities" data-bs-placement="right"></i>
                                    </label>
                                    <textarea name="extra_activities" style="height: 100px" id="extraActivities" cols="20" rows="5" class="form-control">{!!isset($student)? $student->extra_activities : '' !!}</textarea>
                                    @error('extra_activities')<span class="text-danger f-s-12">{{$errors->first('extra_activities')}}</span> @enderror
                                </div>

                                <div class="col-md-6 mt-2">
                                    <label for="" class="form-label">
                                        Remarks
                                        <i class="dripicons-question f-s-12" data-bs-toggle="tooltip" data-bs-title="Remarks about this student" data-bs-placement="right"></i>
                                    </label>
                                    <textarea name="remarks" style="height: 100px" id="remarks" cols="20" rows="5" class="form-control">{!!isset($student)? $student->remarks : '' !!}</textarea>
                                    @error('remarks')<span class="text-danger f-s-12">{{$errors->first('remarks')}}</span> @enderror
                                </div>

                                <div class="col-md-4 mt-2">
                                    <label for="" class="">
                                        Publication Status
                                        <i class="dripicons-question f-s-12" data-bs-toggle="tooltip" data-bs-title="Set Teacher Publication Status" data-bs-placement="right"></i>
                                    </label>
                                    <div>
                                        <input type="checkbox" id="switch3" name="status" {{ isset($student) && $student->status == 0 ? "" : "checked" }} data-switch="success"/>
                                        <label for="switch3" data-on-label="Yes" data-off-label="No"></label>
                                    </div>
{{--                                    <label for="" class="mt-2"> <input type="radio" name="status" value="1" @if(isset($academicStuff)) {{$academicStuff->status == 1 ?'checked':''}} @endif>Published</label>--}}
{{--                                    <label for="" class="mt-2"> <input type="radio"  name="status" value="0" @if(isset($academicStuff)) {{$academicStuff->status == 0 ?'checked':''}} @endif>UnPublished</label>--}}
                                </div>
                            </div>

                            <div class=" form-group row mt-3">
                                <label for="" class="col-md-4">
                                </label>
                                <div class="col-md-4">
                                    <input type="submit" value="{{isset($student)?'Update':'Add'}} Student" class="btn btn-success">
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="callout callout-danger mt-2">
                        <p>
                            <b>Note: </b>
                            <span class="text-danger">* </span> fields are required
                        </p>
                        <p>
                            <b>Note: </b>
                            Create Parents, Student Group, Academic Class, Sections, Subjects before create a new Student.
                        </p>
                        <p>
                            <b>Note: </b>
                            phone number will be used as student's default password.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Quill css -->
{{--    <link href="{{ asset('/') }}backend/assets/css/vendor/quill.core.css" rel="stylesheet" type="text/css" />--}}
{{--    <link href="{{ asset('/') }}backend/assets/css/vendor/quill.snow.css" rel="stylesheet" type="text/css" />--}}
    <style>
        .subjectError {
            color: #ff0000;
        }
        .subject-toggle {
            display: none!important;
        }
    </style>
@endsection

@section('script')
    <!-- quill js -->
{{--    <script src="{{ asset('/') }}backend/assets/js/vendor/quill.min.js"></script>--}}
    <!-- quill Init js-->
{{--    <script src="{{ asset('/') }}backend/assets/js/pages/demo.quilljs.js"></script>--}}

    <!-- ck Editor -->
    <script src="{{ asset('/') }}backend/assets/js/ckeditor/ckeditor.js"></script>
    <script src="{{ asset('/') }}backend/assets/js/district/js-2.js"></script>

{{--    @if(isset($student))--}}
        <script>
            // var quill = new Quill('#snow-editor');
            {{--quill.root.innerHTML    = '{!! $student->description !!}';--}}
            CKEDITOR.replace( 'editor' );
            CKEDITOR.replace( 'extraActivities' );
            CKEDITOR.replace( 'remarks' );
        </script>
{{--    @endif--}}
{{--    <script>--}}
{{--        $(function () {--}}
{{--            CKEDITOR.replace('editor');--}}
{{--        });--}}
{{--    </script>--}}

    <script>
        $(document).on('change', '#selectClass', function () {
            checkClass();
        })
        $(function () {
            checkClass();
        })
        function checkClass ()
        {
            var classNumericValue = $('#selectClass').children('option:selected').attr('data-class_numeric');
            if(Number(classNumericValue) > 8)
            {
                $('.subject-toggle').css('cssText','display: block !important');
                // $('.subject-toggle').css('display','block !important');
            } else {
                $('.subject-toggle').css('cssText','display: none !important');
                $('#selectGroup option').each(function () {
                    var text = 'Regular';
                    if ($(this).text().toLowerCase() == text.toLowerCase())
                    {
                        $(this).attr('selected', true);
                    } else {
                        $('this').addClass('d-none')
                    }
                })
            }
        }
        $(document).on('change', '#mainSubject', function () {
            checkSubjectMatch();
        })
        $(document).on('change', '#optionalSubject', function () {
            checkSubjectMatch();
        })
        function checkSubjectMatch() {
            var mainSubject = $('#mainSubject').val();
            var optionalSubject = $('#optionalSubject').val();
            if (mainSubject == optionalSubject)
            {
                $('input[type="submit"]').attr('disabled', true);
                $('.subjectError').text('Main Subject and Optional Subject can not be same.');
            } else {
                $('input[type="submit"]').attr('disabled', false);
                $('.subjectError').text('');
            }
        }
    </script>
@endsection
