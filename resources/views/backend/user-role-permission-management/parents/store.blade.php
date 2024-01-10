@extends('backend.master')

@section('title')
    {{ isset($backendSetting) ? $backendSetting->site_title : '' }} - {{ isset($parent) ? "Update" : 'Create' }} Parent
@endsection

@section('body-title-section')
    @include('backend.includes.body-page-title-two',['parent'=>'Designation', 'child' =>  isset($parent) ? "Update" : 'Create',])
@endsection

@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="card mt-3">
                <div class="card-header">
                    <h4 class="float-start">{{ isset($parent) ? 'Update' : 'Create' }} Parent</h4>
                    <a href="{{ route('parents.index') }}" class="btn btn-success float-end">
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
                        <form action="{{isset($parent) ? route('parents.update', $parent->id) : route('parents.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @if(isset($parent))
                                @method('put')
                            @endif
                            <div class="form-group row mt-2">
                                <div class="col-md-4">
                                    <label for="disabledTextInput" class="form-label">
                                        <span class="text-danger">* </span>
                                        English Name
                                        <i class="dripicons-question f-s-12" data-bs-toggle="tooltip" data-bs-title="Write Parent's name in English" data-bs-placement="right"></i>
                                    </label>
                                    <input type="text"  class="form-control" name="name_english" placeholder="Name in English" value="{{ $errors->any() ? old('name_english') : (isset($parent)? $parent->name_english :'')}}">
                                    @error('name_english')<span class="text-danger f-s-12">{{$errors->first('name_english')}}</span> @enderror
                                </div>

                                <div class="col-md-4">
                                    <label  class="form-label">
                                        <span class="text-danger">* </span>
                                        Bangla Name
                                        <i class="dripicons-question f-s-12" data-bs-toggle="tooltip" data-bs-title="Write Parent's name in Bangla" data-bs-placement="right"></i>
                                    </label>
                                    <input type="text"  class="form-control" name="name_bangla" placeholder="Name in Bangla" value="{{ $errors->any() ? old('name_bangla') : (isset($parent)? $parent->name_bangla :'')}}">
                                    @error('name_bangla')<span class="text-danger f-s-12">{{$errors->first('name_bangla')}}</span> @enderror
                                </div>

                                <div class="col-md-4">
                                    <label  class="form-label">
                                        <span class="text-danger">* </span>
                                        User Name
                                        <i class="dripicons-question f-s-12" data-bs-toggle="tooltip" data-bs-title="Set unique Parent username" data-bs-placement="right"></i>
                                    </label>
                                    <input type="text" name="username" class="form-control" value="{{ $errors->any() ? old('name_bangla') : (isset($parent)? $parent->username :'')}}" placeholder="username" />
                                    @error('username')<span class="text-danger f-s-12">{{$errors->first('username')}}</span> @enderror
                                </div>

                                <div class="col-md-4 mt-2">
                                    <label for="disabledTextInput" class="form-label">
                                        <span class="text-danger">* </span>
                                        Email
                                        <i class="dripicons-question f-s-12" data-bs-toggle="tooltip" data-bs-title="Write Parent Email for Login" data-bs-placement="right"></i>
                                    </label>
                                    <input type="text"  class="form-control" name="email" placeholder="email@domain.com" value="{{ $errors->any() ? old('email') : (isset($parent)? $parent->email :'')}}">
                                    @error('email')<span class="text-danger f-s-12">{{$errors->first('email')}}</span> @enderror
                                </div>

                                <div class="col-md-4 mt-2">
                                    <label  class="form-label">
                                        Mobile
                                        <i class="dripicons-question f-s-12" data-bs-toggle="tooltip" data-bs-title="Set Parent Mobile Number" data-bs-placement="right"></i>
                                    </label>
                                    <input type="text"  class="form-control" name="phone" placeholder="01234567890" value="{{$errors->any() ? old('phone') : (isset($parent)? $parent->phone :'')}}">
                                    @error('phone')<span class="text-danger f-s-12">{{$errors->first('phone')}}</span> @enderror
                                </div>

                                <div class="col-md-4 mt-2">
                                    <label  class="form-label">
                                        <span class="text-danger">* </span>
                                        Date Of Birth
                                        <i class="dripicons-question f-s-12" data-bs-toggle="tooltip" data-bs-title="Set Parent Date Of Birth" data-bs-placement="right"></i>
                                    </label>
                                    <input type="text" class="form-control" name="dob" id="birthdatepicker" data-toggle="date-picker" data-single-date-picker="true" placeholder="" value="{{ $errors->any() ? old('dob') : (isset($parent) ? \Illuminate\Support\Carbon::parse($parent->dob)->format('m/d/Y') : '') }}">
                                    @error('dob')<span class="text-danger f-s-12">{{$errors->first('dob')}}</span> @enderror
                                </div>

                                <div class="col-md-4 mt-2">
                                    <label  class="form-label">
                                        Gender
                                        <i class="dripicons-question f-s-12" data-bs-toggle="tooltip" data-bs-title="Select Parent's Gender" data-bs-placement="right"></i>
                                    </label>
                                    <br/>
                                    <select name="gender" class="form-control" data-toggle="select2" data-placeholder="select a gender name">
                                        <option value=""></option>
                                        <option value="male" {{ isset($parent) && $parent->gender == 'male' ? 'selected'  :'' }}>Male</option>
                                        <option value="female" {{ isset($parent) && $parent->gender == 'female' ? 'selected'  :'' }}>Female</option>
                                        <option value="other" {{ isset($parent) && $parent->gender == 'other' ? 'selected'  :'' }}>Other</option>
                                    </select>
                                    @error('gender')<span class="text-danger f-s-12">{{$errors->first('gender')}}</span> @enderror
                                </div>

                                <div class="col-md-4 mt-2">
                                    <label  class="form-label">
                                        Religion
                                        <i class="dripicons-question f-s-12" data-bs-toggle="tooltip" data-bs-title="Select Parent's religion" data-bs-placement="right"></i>
                                    </label>
                                    <select name="religion" class="form-control select2" data-toggle="select2" data-placeholder="select a religion name">
                                        <option value=""></option>
                                        <option value="Islam" {{ isset($parent) && $parent->religion == 'Islam' ? 'selected'  :'' }}>Islam</option>
                                        <option value="Hinduism" {{ isset($parent) && $parent->religion == 'Hinduism' ? 'selected'  :'' }}>Hinduism</option>
                                        <option value="Buddhism" {{ isset($parent) && $parent->religion == 'Buddhism' ? 'selected'  :'' }}>Buddhism</option>
                                        <option value="Christianity" {{ isset($parent) && $parent->religion == 'Christianity' ? 'selected'  :'' }}>Christianity</option>
                                        <option value="Other" {{ isset($parent) && $parent->religion == 'Other' ? 'selected'  :'' }}>Other</option>
                                    </select>
                                    @error('religion')<span class="text-danger f-s-12">{{$errors->first('religion')}}</span> @enderror
                                </div>

                                <div class="col-md-4 mt-2">
                                    <label  class="form-label">
                                        <span class="text-danger">* </span>
                                        Father's Profession
                                        <i class="dripicons-question f-s-12" data-bs-toggle="tooltip" data-bs-title="Set Father's Profession" data-bs-placement="right"></i>
                                    </label>
                                    <input type="text" class="form-control" name="fathers_profession" placeholder="Father's Profession" value="{{ $errors->any() ? old('fathers_profession') : (isset($parent) ? $parent->fathers_profession : '') }}">
                                    @error('fathers_profession')<span class="text-danger f-s-12">{{$errors->first('fathers_profession')}}</span> @enderror
                                </div>

                                <div class="col-md-4 mt-2">
                                    <label  class="form-label">
                                        <span class="text-danger">* </span>
                                        Mother's Profession
                                        <i class="dripicons-question f-s-12" data-bs-toggle="tooltip" data-bs-title="Set Mother's Profession" data-bs-placement="right"></i>
                                    </label>
                                    <input type="text" class="form-control" name="mothers_profession" placeholder="Mother's Profession" value="{{ $errors->any() ? old('mothers_profession') : (isset($parent) ? $parent->mothers_profession : '') }}">
                                    @error('mothers_profession')<span class="text-danger f-s-12">{{$errors->first('mothers_profession')}}</span> @enderror
                                </div>

                                <div class="col-md-4 mt-2">
                                    <label class="form-label">
                                        <span class="text-danger">* </span>
                                        Image
                                        <i class="dripicons-question f-s-12" data-bs-toggle="tooltip" data-bs-title="upload Parent's Image" data-bs-placement="right"></i>
                                    </label>
                                    <br>
                                    <input type="file" class="form-control-file" name="image" accept="image/*" />
                                    <br>
                                    @error('image')<span class="text-danger f-s-12">{{$errors->first('image')}}</span> @enderror
                                </div>
                                @if(isset($parent))
                                    <div class="col-md-4 mt-3">
                                        <img src="{{asset($parent->image)}}" style="height: 70px;width: 70px" alt="">
                                    </div>
                                @endif

                                <div class="row">
                                    <div class="col-md-6 mt-2">
                                        <label for="" class="form-label">
                                            Address
                                            <i class="dripicons-question f-s-12" data-bs-toggle="tooltip" data-bs-title="Insert Parent's Address" data-bs-placement="right"></i>
                                        </label>
                                        <textarea name="address" style="height: 100px" id="editor" cols="20" rows="5" class="form-control">{!!isset($parent)? $parent->address : '' !!}</textarea>
                                        @error('address')<span class="text-danger f-s-12">{{$errors->first('address')}}</span> @enderror
                                    </div>

                                    <div class="col-md-4 mt-2">
                                        <label for="" class="">
                                            Publication Status
                                            <i class="dripicons-question f-s-12" data-bs-toggle="tooltip" data-bs-title="Set Parent Publication Status" data-bs-placement="right"></i>
                                        </label>
                                        <div>
                                            <input type="checkbox" id="switch1" name="status" {{ isset($parent) && $parent->status == 0 ? "" : "checked" }} data-switch="success"/>
                                            <label for="switch1" data-on-label="Published" data-off-label="Unpublished" class="publish-switch"></label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class=" form-group row mt-3">
                                <label for="" class="col-md-4">
                                </label>
                                <div class="col-md-4">
                                    <input type="submit" value="{{isset($parent)?'Update':'Add'}} Parent" class="btn btn-success">
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
                            Create designation, salary grade before create a new Parent.
                        </p>
                        <p>
                            <b>Note: </b>
                            phone number will be used as Parent's default password.
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

    @if(isset($parent))
        <script>
            // var quill = new Quill('#snow-editor');
            {{--quill.root.innerHTML    = '{!! $parent->description !!}';--}}
            CKEDITOR.replace( 'editor' );
        </script>
    @endif
{{--    <script>--}}
{{--        $(function () {--}}
{{--            CKEDITOR.replace('editor');--}}
{{--        });--}}
{{--    </script>--}}
@endsection
