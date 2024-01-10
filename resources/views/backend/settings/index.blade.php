@extends('backend.master')

@section('title')
    {site title} - Settings
@endsection

@section('body-title-section')
    @include('backend.includes.body-page-title-two',['parent'=>'Settings', 'child' => 'Create'])
@endsection

@section('style')
{{--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />--}}
    <style>
        .settings-tabs #pills-tab .nav-item .active {
            background-color: orange;
        }
        .settings-tabs #pills-tab .nav-item .nav-link {
            color: black;
        }
    </style>
@endsection

@section('body')
    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="settings-tabs card card-body">
                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="pills-general-tab" data-bs-toggle="pill" data-bs-target="#pills-general" type="button" role="tab" aria-controls="pills-general" aria-selected="true">General Setting</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-localization-tab" data-bs-toggle="pill" data-bs-target="#pills-localization" type="button" role="tab" aria-controls="pills-localization" aria-selected="false">Localization</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-payment-tab" data-bs-toggle="pill" data-bs-target="#pills-payment" type="button" role="tab" aria-controls="pills-payment" aria-selected="false">Payment Settings</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-email-tab" data-bs-toggle="pill" data-bs-target="#pills-email" type="button" role="tab" aria-controls="pills-email" aria-selected="false">Email Setting</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-sociallogin-tab" data-bs-toggle="pill" data-bs-target="#pills-sociallogin" type="button" role="tab" aria-controls="pills-sociallogin" aria-selected="false">Social Media Login</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-sociallinks-tab" data-bs-toggle="pill" data-bs-target="#pills-sociallinks" type="button" role="tab" aria-controls="pills-sociallinks" aria-selected="false">Social Links</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-seo-tab" data-bs-toggle="pill" data-bs-target="#pills-seo" type="button" role="tab" aria-controls="pills-seo" aria-selected="false">SEO Settings</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-other-tab" data-bs-toggle="pill" data-bs-target="#pills-other" type="button" role="tab" aria-controls="pills-other" aria-selected="false">Others</button>
                            </li>

                        </ul>

                        <div class="tab-content mt-2" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-general" role="tabpanel" aria-labelledby="pills-general-tab" tabindex="0">
                                @include('backend.settings.includes.general')
                            </div>
                            <div class="tab-pane fade" id="pills-localization" role="tabpanel" aria-labelledby="pills-localization-tab" tabindex="0">
                                Localization
                            </div>
                            <div class="tab-pane fade" id="pills-payment" role="tabpanel" aria-labelledby="pills-payment-tab" tabindex="0">
                                payment setting
                            </div>
                            <div class="tab-pane fade" id="pills-email" role="tabpanel" aria-labelledby="pills-email-tab" tabindex="0">
                                email setting
                            </div>
                            <div class="tab-pane fade" id="pills-sociallogin" role="tabpanel" aria-labelledby="pills-sociallogin-tab" tabindex="0">
                                social media login
                            </div>
                            <div class="tab-pane fade" id="pills-sociallinks" role="tabpanel" aria-labelledby="pills-sociallinks-tab" tabindex="0">
                                social midea links
                            </div>
                            <div class="tab-pane fade" id="pills-seo" role="tabpanel" aria-labelledby="pills-seo-tab" tabindex="0">
                                Seo settings
                            </div>

                            <div class="tab-pane fade" id="pills-other" role="tabpanel" aria-labelledby="pills-other-tab" tabindex="0">
                                others
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script src="{{ asset('/') }}backend/assets/js/district/javascript.js"></script>
@endsection
