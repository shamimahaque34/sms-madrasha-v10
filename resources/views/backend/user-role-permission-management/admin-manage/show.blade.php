@extends('backend.master')

@section('title')
    {{ isset($backendSetting) ? $backendSetting->site_title : '' }} - Show Admin
@endsection

@section('body-title-section')
    @include('backend.includes.body-page-title-two',['parent'=>'Admin', 'child' => 'Show'])
@endsection

@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-12 mx-auto">
                    <div class="card mt-3">
                        <div class="card-header">
                            <h4 class="float-start">Show Admin Details</h4>
                            <a href="{{ route('admins.index') }}" class="btn btn-success float-end">
                                Manage
                                {{--                                    <i class="dripicons-arrow-thin-left"></i>--}}
                            </a>
                        </div>
                        <div class="card-body">
                            <div>
                                <div class="form-group row">
                                    <div class="col-md-4 mt-1">
                                        <label for="disabledTextInput" class="form-label f-s-11">
                                            Name (English)
                                        </label>
                                        <p class="f-s-16">{{ $admin->name_english }}</p>
                                    </div>
                                    <div class="col-md-4 mt-1">
                                        <label for="disabledTextInput" class="form-label f-s-11">
                                            Name (Bangla)
                                        </label>
                                        <p class="f-s-16">{{ $admin->name_bangla }}</p>
                                    </div>
                                    <div class="col-md-4 mt-1">
                                        <label for="disabledTextInput" class="form-label f-s-11">
                                            User Name
                                        </label>
                                        <p class="f-s-16">{{ $admin->username }}</p>
                                    </div>
                                    <div class="col-md-4 mt-1">
                                        <label for="disabledTextInput" class="form-label f-s-11">
                                            Email
                                        </label>
                                        <p class="f-s-16">{{ $admin->email }}</p>
                                    </div>
                                    <div class="col-md-4 mt-1">
                                        <label for="disabledTextInput" class="form-label f-s-11">
                                            Phone Number
                                        </label>
                                        <p class="f-s-16">{{ $admin->phone }}</p>
                                    </div>
                                    <div class="col-md-4 mt-1">
                                        <label for="disabledTextInput" class="form-label f-s-11">
                                            Date Of Birth
                                        </label>
                                        <p class="f-s-16">{{ $admin->dob_timestamp->format('d M Y') }}</p>
                                    </div>
                                    <div class="col-md-4 mt-1">
                                        <label for="disabledTextInput" class="form-label f-s-11">
                                            Gender
                                        </label>
                                        <p class="f-s-16">{{ $admin->gender }}</p>
                                    </div>
                                    <div class="col-md-4 mt-1">
                                        <label for="disabledTextInput" class="form-label f-s-11">
                                            Religion
                                        </label>
                                        <p class="f-s-16">{{ $admin->religion }}</p>
                                    </div>
                                    <div class="col-md-6 mt-1">
                                        <label for="disabledTextInput" class="form-label f-s-11">
                                            Address
                                        </label>
                                        <p class="f-s-16">{!! $admin->address !!}</p>
                                    </div>
                                    <div class="col-md-6 mt-1">
                                        <label for="disabledTextInput" class="form-label f-s-11 col-md-3">
                                            Image
                                        </label>
                                        <div>
                                            @if(isset($admin) && !empty($admin->image))
                                                <img src="{{ asset($admin->image) }}" alt="{{ $admin->name_english.' profile picture' }}" style="height: 100px; width: 100px" >
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

