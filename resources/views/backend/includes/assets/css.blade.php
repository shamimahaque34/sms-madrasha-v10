<!-- App css -->
<link href="{{ asset('/') }}backend/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
<link href="{{ asset('/') }}backend/assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-style"/>
<link href="{{ asset('/') }}backend/assets/css/helper.min.css" rel="stylesheet" type="text/css" id="app-style"/>
<link href="{{ asset('/') }}backend/assets/css/custom.css" rel="stylesheet" type="text/css" id="app-style"/>
<link href="{{ asset('/') }}backend/assets/css/vendor/toastrjs.min.css" rel="stylesheet" type="text/css" />

{{--roboto font--}}
{{--<link rel="preconnect" href="https://fonts.googleapis.com">--}}
{{--<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>--}}
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
<style>
    body {
        font-family: 'Roboto', sans-serif;
    }
    .callout {
        margin: 0 0 20px 0;
        padding: 15px 30px 15px 15px;
        border-left: 5px solid #eee;
    }
    .callout.callout-danger {
        background-color: #fcf2f2;
        border-color: #dFb5b4;
    }
    .callout p:last-child {
        margin-bottom: 0;
    }
</style>
@yield('style')
