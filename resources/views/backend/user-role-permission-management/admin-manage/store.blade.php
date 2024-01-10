@extends('backend.master')

@section('title')
    {{ isset($backendSetting) ? $backendSetting->site_title : '' }} - {{ isset($admin) ? "Update" : 'Create' }} Admin
@endsection

@section('body-title-section')
    @include('backend.includes.body-page-title-two',['parent'=>'Admin', 'child' => isset($admin) ? "Update" : 'Create'])
@endsection

@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-12 mx-auto">
                    <div class="card mt-3">
                        <div class="card-header">
                            <h4 class="float-start">{{ isset($admin) ? "Update" : 'Create' }} Admin</h4>
                            <a href="{{ route('admins.index') }}" class="btn btn-success float-end">
                                Manage
                                {{--                                    <i class="dripicons-arrow-thin-left"></i>--}}
                            </a>
                        </div>
                        <div class="card-body">
                            <div>
                                <form action="{{ isset($admin) ? route('admins.update', $admin->id) : route('admins.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @if(isset($admin))
                                        @method('put')
                                    @endif
                                    <div class="form-group row">
                                        <div class="col-md-4 mt-2">
                                            <label for="disabledTextInput" class="form-label f-s-11">
                                                <span class="text-danger">*</span>
                                                Name (English)
                                                <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Write you name in English here" data-bs-placement="right"></i>
                                            </label>
                                            <input type="text" class="form-control" name="name_english" placeholder="Write you name in English here" value="{{ $errors->any() ? old('name_english') : (isset($admin) ? $admin->name_english : '') }}">
                                            @error('name_english')<span class="text-danger f-s-12">{{ $errors->first('name_english') }}</span>@enderror
                                        </div>
                                        <div class="col-md-4 mt-2">
                                            <label for="disabledTextInput" class="form-label f-s-11">
                                                <span class="text-danger">*</span>
                                                Name (Bangla)
                                                <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Write you name in English here" data-bs-placement="right"></i>
                                            </label>
                                            <input type="text" required class="form-control" name="name_bangla" placeholder="" value="{{ $errors->any() ? old('name_bangla') : (isset($admin) ? $admin->name_bangla : '') }}">
                                            @error('name_bangla')<span class="text-danger f-s-12">{{ $errors->first('name_bangla') }}</span>@enderror
                                        </div>
                                        <div class="col-md-4 mt-2">
                                            <label for="disabledTextInput" class="form-label f-s-11">
                                                <span class="text-danger">*</span>
                                                User Name
                                                <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Admin Username here" data-bs-placement="right"></i>
                                            </label>
                                            <input type="text" required class="form-control" name="username" placeholder="Set Admin Username here" value="{{ $errors->any() ? old('username') : (isset($admin) ? $admin->username : '') }}">
                                            @error('username')<span class="text-danger f-s-12">{{ $errors->first('username') }}</span>@enderror
                                        </div>
                                        <div class="col-md-4 mt-2">
                                            <label for="disabledTextInput" class="form-label f-s-11">
                                                <span class="text-danger">*</span>
                                                Email
                                                <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Admin Email here" data-bs-placement="right"></i>
                                            </label>
                                            <input type="text" required class="form-control" name="email" placeholder="Set Admin Email here" value="{{ $errors->any() ? old('email') : (isset($admin) ? $admin->email : '') }}">
                                            @error('email')<span class="text-danger f-s-12">{{ $errors->first('email') }}</span>@enderror
                                        </div>
                                        <div class="col-md-4 mt-2">
                                            <label for="disabledTextInput" class="form-label f-s-11">
                                                <span class="text-danger">*</span>
                                                Phone Number
                                                <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Admin Phone Number here" data-bs-placement="right"></i>
                                            </label>
                                            <input type="text" class="form-control" name="phone" required placeholder="Set Admin Phone Number here" value="{{ $errors->any() ? old('phone') : (isset($admin) ? $admin->phone : '') }}">
                                            @error('phone')<span class="text-danger f-s-12">{{ $errors->first('phone') }}</span>@enderror
                                        </div>
                                        <div class="col-md-4 mt-2">
                                            <label for="disabledTextInput" class="form-label f-s-11">
                                                Date Of Birth
                                                <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Admin Phone Number here" data-bs-placement="right"></i>
                                            </label>
                                            <input type="text" class="form-control date" id="birthdatepicker" data-toggle="date-picker" data-single-date-picker="true" name="dob" required value="{{ $errors->any() ? old('dob') : (isset($admin) ? \Illuminate\Support\Carbon::parse($admin->dob)->format('m/d/Y') : '') }}">
                                            @error('dob')<span class="text-danger f-s-12">{{ $errors->first('dob') }}</span>@enderror
                                        </div>
                                        <div class="col-md-4 mt-2">
                                            <label for="disabledTextInput" class="form-label f-s-11">
                                                Gender
                                                <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Admin Gender here" data-bs-placement="right"></i>
                                            </label>
                                            <select name="gender"  id="" class="form-control select2" data-toggle="select2">
                                                <option value="" selected disabled>Please select a gender</option>
                                                <option value="male" {{ $errors->any() ? (old('gender') == 'male' ? 'selected' : '') : (isset($admin) && $admin->gender == 'male' ? 'selected' : '') }}>Male</option>
                                                <option value="female" {{ $errors->any() ? (old('gender') == 'female' ? 'selected' : '') : (isset($admin) && $admin->gender == 'female' ? 'selected' : '') }}>Female</option>
                                                <option value="other" {{ $errors->any() ? (old('gender') == 'other' ? 'selected' : '') : (isset($admin) && $admin->gender == 'other' ? 'selected' : '') }}>Other</option>
                                            </select>
                                            @error('gender')<span class="text-danger f-s-12">{{ $errors->first('gender') }}</span>@enderror
                                        </div>
                                        <div class="col-md-4 mt-2">
                                            <label for="disabledTextInput" class="form-label f-s-11">
                                                Religion
                                                <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Admin Religion here" data-bs-placement="right"></i>
                                            </label>
                                            <select name="religion"  id="" class="form-control select2" data-toggle="select2">
                                                <option value="" selected disabled>Please select a religion</option>
                                                <option value="islam" {{ $errors->any() ? (old('religion') == 'islam' ? 'selected' : '') : (isset($admin) && $admin->religion == 'islam' ? 'selected' : '') }}>Islam</option>
                                                <option value="hinduism" {{ $errors->any() ? (old('religion') == 'hinduism' ? 'selected' : '') : (isset($admin) && $admin->religion == 'hinduism' ? 'selected' : '') }}>Hinduism</option>
                                                <option value="buddhism" {{ $errors->any() ? (old('religion') == 'buddhism' ? 'selected' : '') : (isset($admin) && $admin->religion == 'buddhism' ? 'selected' : '') }}>Buddhism</option>
                                                <option value="christianity" {{ $errors->any() ? (old('religion') == 'christianity' ? 'selected' : '') : (isset($admin) && $admin->religion == 'christianity' ? 'selected' : '') }}>Christianity</option>
                                                <option value="other" {{ $errors->any() ? (old('religion') == 'other' ? 'selected' : '') : (isset($admin) && $admin->religion == 'other' ? 'selected' : '') }}>Other</option>
                                            </select>
                                            @error('religion')<span class="text-danger f-s-12">{{ $errors->first('religion') }}</span>@enderror
                                        </div>
                                        <div class="col-md-6 mt-2">
                                            <label for="disabledTextInput" class="form-label f-s-11">
                                                Address
                                                <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Admin address here" data-bs-placement="right"></i>
                                            </label>
                                            <textarea name="address" id="" class="form-control" cols="30" rows="5">{{ $errors->any() > 0 ? old('address') : (isset($admin) ? $admin->address : '') }}</textarea>
                                            @error('address')<span class="text-danger f-s-12">{{ $errors->first('address') }}</span>@enderror
                                        </div>
                                        <div class="col-md-6 mt-3">
                                            <div class="row">
                                                <label for="disabledTextInput" class="form-label f-s-11 col-md-3">
                                                    Image
                                                    <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Admin Profile Image here" data-bs-placement="right"></i>
                                                </label>
                                                {{--                                                <div class="fallback dropzone" id="my-dropzone">--}}
                                                {{--                                                    <div class="dz-message">--}}
                                                {{--                                                        <p>Drag & drop only one image here</p>--}}
                                                {{--                                                    </div>--}}
                                                <div class="col-md-9">
                                                    <input type="file" id="test-dropzone" class="" name="image" accept="image/*" />
                                                </div>
                                                {{--                                                </div>--}}
                                            </div>
                                            @error('image')<span class="text-danger f-s-12">{{ $errors->first('image') }}</span>@enderror
                                            @if(isset($admin) && !empty($admin->image))
                                                <img src="{{ asset($admin->image) }}" alt="{{ $admin->name_english.' profile picture' }}" style="height: 100px; width: 100px" >
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row col-4 my-3 mx-auto">
                                        <input type="submit" class="btn btn-success" data-provide="typeahead" id="" value="{{ isset($admin) ? 'Update' : 'Create' }} Admin">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

{{--@section('script')--}}
{{--    <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>--}}
{{--    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />--}}
{{--    <script>--}}
{{--        // $('div>input#test-dropzone').dropzone();--}}
{{--        Dropzone.options.dropzone =--}}
{{--            {--}}
{{--                maxFilesize: 12,--}}
{{--                resizeQuality: 1.0,--}}
{{--                acceptedFiles: ".jpeg,.jpg,.png,.gif",--}}
{{--                addRemoveLinks: true,--}}
{{--                timeout: 60000,--}}
{{--                removedfile: function(file)--}}
{{--                {--}}
{{--                    var name = file.upload.filename;--}}
{{--                    $.ajax({--}}
{{--                        type: 'POST',--}}
{{--                        url: '{{ url("files/destroy") }}',--}}
{{--                        data: {filename: name},--}}
{{--                        success: function (data){--}}
{{--                            console.log("File has been successfully removed!!");--}}
{{--                        },--}}
{{--                        error: function(e) {--}}
{{--                            console.log(e);--}}
{{--                        }});--}}
{{--                    var fileRef;--}}
{{--                    return (fileRef = file.previewElement) != null ?--}}
{{--                        fileRef.parentNode.removeChild(file.previewElement) : void 0;--}}
{{--                },--}}
{{--                success: function (file, response) {--}}
{{--                    console.log(response);--}}
{{--                },--}}
{{--                error: function (file, response) {--}}
{{--                    return false;--}}
{{--                }--}}
{{--            };--}}
{{--    </script>--}}


{{--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.css" integrity="sha512-jU/7UFiaW5UBGODEopEqnbIAHOI8fO6T99m7Tsmqs2gkdujByJfkCbbfPSN4Wlqlb9TGnsuC0YgUgWkRBK7B9A==" crossorigin="anonymous" referrerpolicy="no-referrer" />--}}
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.js" integrity="sha512-U2WE1ktpMTuRBPoCFDzomoIorbOyUv0sP8B+INA3EzNAhehbzED1rOJg6bCqPf/Tuposxb5ja/MAUnC8THSbLQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>--}}
{{--<script>--}}
{{--    // let myUploader = $('div#dropzoneDiv');--}}
{{--    let uploadedDocumentMap = {};--}}
{{--    Dropzone.autoDiscover = false;--}}
{{--    $('div#my-dropzone').dropzone({--}}
{{--        url: "{{ route('dropzone-image') }}",--}}
{{--        method: 'post',--}}
{{--        // withCredentials:true,--}}
{{--        paramName: "file",--}}
{{--        acceptedFiles: 'image/*',--}}
{{--        addRemoveLinks: true,--}}
{{--        // autoProcessQueue: false,--}}
{{--        headers: {--}}
{{--            'x-csrf-token': $('meta[name="csrf-token"]').attr('content'),--}}
{{--        },--}}
{{--        success: function (data, response) {--}}
{{--            console.log(data); <!--file object -->--}}
{{--            // console.log(response.success); <!--returned response object -->--}}
{{--            $('form').append('<input type="hidden" name="image" value="' + response.success + '">'); <!-- for single file -->--}}

{{--            // $(document).on('click','.dz-remove', function () {--}}
{{--                $('.dz-remove').attr('href', baseUrl+response.success);--}}
{{--            // })--}}
{{--            // $.each(response['name'], function (key, val) {--}}
{{--            //     $('form').append('<input type="hidden" name="images[]" value="' + val + '">');--}}
{{--            //     uploadedDocumentMap[data[key].name] = val;--}}
{{--            // });--}}
{{--        },--}}
{{--        removedfile: function () {--}}
{{--            --}}
{{--        }--}}
{{--    });--}}
{{--    // myDropzone.processQueue();--}}
{{--</script>--}}
{{--@endsection--}}
