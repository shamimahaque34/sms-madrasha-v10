@extends('backend.master')

@section('title')
    {{ isset($backendSetting) ? $backendSetting->site_title : '' }} - {{ isset($stuff) ? "Update" : 'Create' }} Academic Staff
@endsection

@section('body-title-section')
    @include('backend.includes.body-page-title-two',['parent'=>'Academic Staff', 'child' =>  isset($stuff) ? "Update" : 'Create',])
@endsection

@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="card mt-3">
                <div class="card-header">
                    <h4 class="float-start">{{ isset($stuff) ? 'Update' : 'Create' }} Academic Staff</h4>
                    <a href="{{ route('stuffs.index') }}" class="btn btn-success float-end">
                        Manage
                        {{--                                    <i class="dripicons-arrow-thin-left"></i>--}}
                    </a>
                </div>
                <div class="card-body">
                    <div>
{{--                        @if(!empty($errors))--}}
{{--                            <ul>--}}
{{--                                @foreach($errors as $error)--}}
{{--                                    <li>{{ $error }}</li>--}}
{{--                                @endforeach--}}
{{--                            </ul>--}}
{{--                        @endif--}}
                        <form action="{{isset($stuff) ? route('stuffs.update', $stuff->id) : route('stuffs.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @if(isset($stuff))
                                @method('put')
                            @endif
                            <div class="form-group row mt-2">
                                <div class="col-md-4">
                                    <label for="disabledTextInput" class="form-label">
                                        <span class="text-danger">* </span>
                                        English Name
                                        <i class="dripicons-question f-s-12" data-bs-toggle="tooltip" data-bs-title="Write teacher's name in English" data-bs-placement="right"></i>
                                    </label>
                                    <input type="text"  class="form-control" name="name_english" placeholder="Name in English" value="{{ $errors->any() ? old('name_english') : (isset($stuff)? $stuff->name_english :'')}}">
                                    @error('name_english')<span class="text-danger f-s-12">{{$errors->first('name_english')}}</span> @enderror
                                </div>

                                <div class="col-md-4">
                                    <label  class="form-label">
                                        <span class="text-danger">* </span>
                                        Bangla Name
                                        <i class="dripicons-question f-s-12" data-bs-toggle="tooltip" data-bs-title="Write teacher's name in Bangla" data-bs-placement="right"></i>
                                    </label>
                                    <input type="text"  class="form-control" name="name_bangla" placeholder="Name in Bangla" value="{{ $errors->any() ? old('name_bangla') : (isset($stuff)? $stuff->name_bangla :'')}}">
                                    @error('name_bangla')<span class="text-danger f-s-12">{{$errors->first('name_bangla')}}</span> @enderror
                                </div>

                                <div class="col-md-4">
                                    <label  class="form-label">
                                        <span class="text-danger">* </span>
                                        User Name
                                        <i class="dripicons-question f-s-12" data-bs-toggle="tooltip" data-bs-title="Set unique teacher username" data-bs-placement="right"></i>
                                    </label>
                                    <input type="text" name="username" class="form-control" value="{{ $errors->any() ? old('name_bangla') : (isset($stuff)? $stuff->username :'')}}" placeholder="username" />
                                    @error('username')<span class="text-danger f-s-12">{{$errors->first('username')}}</span> @enderror
                                </div>

                                <div class="col-md-4 mt-2">
                                    <label for="disabledTextInput" class="form-label">
                                        <span class="text-danger">* </span>
                                        Email
                                        <i class="dripicons-question f-s-12" data-bs-toggle="tooltip" data-bs-title="Write Teacher Email for Login" data-bs-placement="right"></i>
                                    </label>
                                    <input type="text"  class="form-control" name="email" placeholder="email@domain.com" value="{{ $errors->any() ? old('email') : (isset($stuff)? $stuff->email :'')}}">
                                    @error('email')<span class="text-danger f-s-12">{{$errors->first('email')}}</span> @enderror
                                </div>

                                <div class="col-md-4 mt-2">
                                    <label  class="form-label">
                                        Mobile
                                        <i class="dripicons-question f-s-12" data-bs-toggle="tooltip" data-bs-title="Set teacher Mobile Number" data-bs-placement="right"></i>
                                    </label>
                                    <input type="text"  class="form-control" name="phone" placeholder="01234567890" value="{{$errors->any() ? old('phone') : (isset($stuff)? $stuff->phone :'')}}">
                                    @error('phone')<span class="text-danger f-s-12">{{$errors->first('phone')}}</span> @enderror
                                </div>

                                <div class="col-md-4 mt-2">
                                    <label  class="form-label">
                                        <span class="text-danger">* </span>
                                        Date Of Birth
                                        <i class="dripicons-question f-s-12" data-bs-toggle="tooltip" data-bs-title="Set Teacher Date Of Birth" data-bs-placement="right"></i>
                                    </label>
                                    <input type="text" class="form-control" name="dob" id="birthdatepicker" data-toggle="date-picker" data-single-date-picker="true" placeholder="" value="{{ $errors->any() ? old('dob') : (isset($stuff) ? \Illuminate\Support\Carbon::parse($stuff->dob)->format('m/d/Y') : '') }}">
                                    @error('dob')<span class="text-danger f-s-12">{{$errors->first('dob')}}</span> @enderror
                                </div>

{{--                                <div class="col-md-4 mt-2">--}}
{{--                                    <label  class="form-label">--}}
{{--                                        Created By--}}
{{--                                        <i class="dripicons-question text-danger" data-bs-toggle="tooltip" data-bs-title="Set Your Created By" data-bs-placement="right"></i>--}}
{{--                                    </label>--}}
{{--                                    <input type="text"  class="form-control" name="created_by" placeholder="" value="{{ $errors->any() ? old('created_by') : (isset($stuff)? $stuff->created_by :'')}}">--}}
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
                                        <option value="male" {{ isset($stuff) && $stuff->gender == 'male' ? 'selected'  :'' }}>Male</option>
                                        <option value="female" {{ isset($stuff) && $stuff->gender == 'female' ? 'selected'  :'' }}>Female</option>
                                        <option value="other" {{ isset($stuff) && $stuff->gender == 'other' ? 'selected'  :'' }}>Other</option>
                                    </select>
                                    @error('gender')<span class="text-danger f-s-12">{{$errors->first('gender')}}</span> @enderror
                                </div>

                                <div class="col-md-4 mt-2">
                                    <label  class="form-label">
                                        <span class="text-danger">* </span>
                                        Joining Date
                                        <i class="dripicons-question f-s-12" data-bs-toggle="tooltip" data-bs-title="Insert teacher's Joining Date" data-bs-placement="right"></i>
                                    </label>
                                    <input type="text" class="form-control" name="jod" placeholder="" data-toggle="date-picker" data-single-date-picker="true" value="{{ $errors->any() ? old('jod') : (isset($stuff) ? \Illuminate\Support\Carbon::parse($stuff->jod)->format('m/d/Y') : '') }}">
                                    @error('jod')<span class="text-danger f-s-12">{{$errors->first('jod')}}</span> @enderror
                                </div>

                                <div class="col-md-4 mt-2">
                                    <label  class="form-label">
                                        Religion
                                        <i class="dripicons-question f-s-12" data-bs-toggle="tooltip" data-bs-title="Select teacher's religion" data-bs-placement="right"></i>
                                    </label>
                                    <select name="religion" class="form-control select2" data-toggle="select2" data-placeholder="select a religion name">
                                        <option value=""></option>
                                        <option value="Islam" {{ isset($stuff) && $stuff->religion == 'Islam' ? 'selected'  :'' }}>Islam</option>
                                        <option value="Hinduism" {{ isset($stuff) && $stuff->religion == 'Hinduism' ? 'selected'  :'' }}>Hinduism</option>
                                        <option value="Buddhism" {{ isset($stuff) && $stuff->religion == 'Buddhism' ? 'selected'  :'' }}>Buddhism</option>
                                        <option value="Christianity" {{ isset($stuff) && $stuff->religion == 'Christianity' ? 'selected'  :'' }}>Christianity</option>
                                        <option value="Other" {{ isset($stuff) && $stuff->religion == 'Other' ? 'selected'  :'' }}>Other</option>
                                    </select>
                                    @error('religion')<span class="text-danger f-s-12">{{$errors->first('religion')}}</span> @enderror
                                </div>

                                <div class="col-md-4 mt-2">
                                    <label for="disabledTextInput" class="form-label">
                                        <span class="text-danger">* </span>
                                        MPO Index Number
                                        <i class="dripicons-question f-s-12" data-bs-toggle="tooltip" data-bs-title="Insert Teacher's MPO Index Number" data-bs-placement="right"></i>
                                    </label>
                                    <input type="text"  class="form-control" name="mpo_index_number" placeholder="11011078" value="{{ $errors->any() ? old('mpo_index_number') : (isset($stuff)? $stuff->mpo_index_number :'')}}">
                                    @error('mpo_index_number')<span class="text-danger f-s-12">{{$errors->first('mpo_index_number')}}</span> @enderror
                                </div>

                                <div class="col-md-4 mt-2">
                                    <label  class="form-label">
                                        Bank Name with Branch Address
                                        <i class="dripicons-question f-s-12" data-bs-toggle="tooltip" data-bs-title="Insert Bank Name with Branch Address" data-bs-placement="right"></i>
                                    </label>
                                    <input type="text"  class="form-control" name="bank_name" placeholder="Bangladesh Bank, Motijheel, Dhaka" value="{{ $errors->any() ? old('bank_name') : (isset($stuff)? $stuff->bank_name :'')}}">
                                    @error('bank_name')<span class="text-danger f-s-12">{{$errors->first('bank_name')}}</span> @enderror
                                </div>

                                <div class="col-md-4 mt-2">
                                    <label  class="form-label">
                                        Bank Account Number
                                        <i class="dripicons-question f-s-12" data-bs-toggle="tooltip" data-bs-title="Insert Bank Account Number" data-bs-placement="right"></i>
                                    </label>
                                    <input type="text"  class="form-control" name="bank_account_no" placeholder="1234567890" value="{{ $errors->any() ? old('bank_account_no') : (isset($stuff)? $stuff->bank_account_no :'')}}">
                                    @error('bank_account_no')<span class="text-danger f-s-12">{{$errors->first('bank_account_no')}}</span> @enderror
                                </div>

                                <div class="col-md-4 mt-2">
                                    <label for="" class="form-label">
                                        Highest Education
                                        <i class="dripicons-question f-s-12" data-bs-toggle="tooltip" data-bs-title="Insert Teacher Highest Education" data-bs-placement="right"></i>
                                    </label>
                                    <input type="text"  class="form-control" name="highest_education" placeholder="Masters" value="{{$errors->any() ? old('highest_education') : (isset($stuff)? $stuff->highest_education :'')}}">
                                    @error('highest_education')<span class="text-danger f-s-12">{{$errors->first('highest_education')}}</span> @enderror
                                </div>

                                <div class="col-md-4 mt-2">
                                    <label  class="form-label">
                                        Designation
                                        <i class="dripicons-question f-s-12" data-bs-toggle="tooltip" data-bs-title="Select Teacher's Designation Name" data-bs-placement="right"></i>
                                    </label>
                                    <select name="designation_id" class="form-control select2" data-toggle="select2" data-placeholder="select a Designation">
                                        <option value=""></option>
                                        @foreach($designations as $designation)
                                            <option value="{{ $designation->id }}" {{ isset($stuff) && $stuff->designation_id == $designation->id ? 'selected' : '' }}>{{ $designation->title.' ('.$designation->position_number.'th grade)' }}</option>
                                        @endforeach
                                    </select>
                                    @error('designation_id')<span class="text-danger f-s-12">{{$errors->first('designation_id')}}</span> @enderror
                                </div>

                                <div class="col-md-6 mt-2">
                                    <label for="" class="form-label">
                                        Address
                                        <i class="dripicons-question f-s-12" data-bs-toggle="tooltip" data-bs-title="Insert Teacher's Address" data-bs-placement="right"></i>
                                    </label>
                                    <textarea name="address" style="height: 100px" id="editor" cols="20" rows="5" class="form-control">{!!isset($stuff)? $stuff->address : '' !!}</textarea>
                                    @error('address')<span class="text-danger f-s-12">{{$errors->first('address')}}</span> @enderror
                                </div>

                                <div class="col-md-4 mt-2">
                                    <label class="form-label">
                                        Educational Files
                                        <i class="dripicons-question f-s-12" data-bs-toggle="tooltip" data-bs-title="upload Teacher's Educational Files" data-bs-placement="right"></i>
                                    </label>
                                    <br>
                                    <input type="file" multiple class="form-control-file" name="educational_files[]" />
                                    <br>
                                    <span class="text-success"> supported formats are <span class="text-uppercase">pdf, doc, docx, jpg, jpeg, png</span></span>
                                    @if(isset($stuff))
                                        @if(isset($stuff->userSubmittedCertificates))
                                            @foreach($stuff->userSubmittedCertificates as $key => $file)
                                                <a href="{{ asset($file->file) }}" download="">File {{ ++$key }}</a> {{ $file != $stuff->userSubmittedCertificates->last() ? '|' : ''  }}
                                            @endforeach
                                        @endif
                                    @endif
                                </div>

                                <div class="col-md-4 mt-2">
                                    <label class="form-label">
                                        <span class="text-danger">* </span>
                                        Image
                                        <i class="dripicons-question f-s-12" data-bs-toggle="tooltip" data-bs-title="upload Teacher's Image" data-bs-placement="right"></i>
                                    </label>
                                    <br>
                                    <input type="file" class="form-control-file" name="image" accept="image/*" />
                                    <br>
                                    @error('image')<span class="text-danger f-s-12">{{$errors->first('image')}}</span> @enderror
                                    @if(isset($stuff))
                                        <img src="{{asset($stuff->image)}}" style="height: 100px;width: 100px" alt="">
                                    @endif
                                </div>

                                <div class="col-md-4 mt-2">
                                    <label for="" class="form-label">
                                        <span class="text-danger">* </span>
                                        Payment Grade
                                        <i class="dripicons-question f-s-12" data-bs-toggle="tooltip" data-bs-title="Select a Payment Grade" data-bs-placement="right"></i>
                                    </label>
                                    <select class="form-control select2" data-toggle="select2" name="salary_grade_id" data-placeholder="select a Designation">
                                        <option value=""></option>
{{--                                        @foreach($salaryGrades as $salaryGrade)--}}
                                            <option value="1" {{ isset($stuff) && $stuff->salary_grade_id == 1 ? 'selected'  :'' }}>demo grade 1</option>
                                            <option value="2" {{ isset($stuff) && $stuff->salary_grade_id == 2 ? 'selected'  :'' }}>demo grade 2</option>
                                            <option value="3" {{ isset($stuff) && $stuff->salary_grade_id == 3 ? 'selected'  :'' }}>demo grade 3</option>
{{--                                        @endforeach--}}
                                    </select>
                                    @error('salary_grade_id')<span class="text-danger f-s-12">{{$errors->first('salary_grade_id')}}</span> @enderror
                                </div>

                                <div class="col-md-4 mt-2">
                                    <label for="" class="">
                                        Publication Status
                                        <i class="dripicons-question f-s-12" data-bs-toggle="tooltip" data-bs-title="Set Teacher Publication Status" data-bs-placement="right"></i>
                                    </label>
                                    <div>
                                        <input type="checkbox" id="switch2" name="status" {{ isset($stuff) && $stuff->status == 0 ? "" : "checked" }} data-switch="success"/>
                                        <label for="switch2" data-on-label="Yes" data-off-label="No"></label>
                                    </div>
{{--                                    <label for="" class="mt-2"> <input type="radio" name="status" value="1" @if(isset($academicStuff)) {{$academicStuff->status == 1 ?'checked':''}} @endif>Published</label>--}}
{{--                                    <label for="" class="mt-2"> <input type="radio"  name="status" value="0" @if(isset($academicStuff)) {{$academicStuff->status == 0 ?'checked':''}} @endif>UnPublished</label>--}}
                                </div>
                            </div>

                            <div class=" form-group row mt-3">
                                <label for="" class="col-md-4">
                                </label>
                                <div class="col-md-4">
                                    <input type="submit" value="{{isset($stuff)?'Update':'Add'}} Staff" class="btn btn-success">
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
                            Create designation, salary grade before create a new Staff.
                        </p>
                        <p>
                            <b>Note: </b>
                            phone number will be used as Staff's default password.
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
@endsection

@section('script')
    <!-- quill js -->
{{--    <script src="{{ asset('/') }}backend/assets/js/vendor/quill.min.js"></script>--}}
    <!-- quill Init js-->
{{--    <script src="{{ asset('/') }}backend/assets/js/pages/demo.quilljs.js"></script>--}}

    <!-- ck Editor -->
    <script src="{{ asset('/') }}backend/assets/js/ckeditor/ckeditor.js"></script>

    @if(isset($stuff))
        <script>
            // var quill = new Quill('#snow-editor');
            {{--quill.root.innerHTML    = '{!! $stuff->description !!}';--}}
            CKEDITOR.replace( 'editor' );
        </script>
    @endif
{{--    <script>--}}
{{--        $(function () {--}}
{{--            CKEDITOR.replace('editor');--}}
{{--        });--}}
{{--    </script>--}}
@endsection
