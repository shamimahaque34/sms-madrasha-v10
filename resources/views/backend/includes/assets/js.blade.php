
<!-- bundle -->
<script src="{{ asset('/') }}backend/assets/js/vendor.min.js"></script>
<script src="{{ asset('/') }}backend/assets/js/app.min.js"></script>
<script src="{{ asset('/') }}backend/assets/js/vendor/toastrjs.min.js"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    let baseUrl = {!! json_encode(url('/')) !!}+'/';
</script>

@if(Session::has('success'))
    <script>
        $(document).ready(function () {
            toastr.success("{{ Session::get('success') }}");
        });
    </script>
    {{ Session::forget('success') }}
@endif
@if(Session::has('error'))
    <script>
        $(document).ready(function () {
            toastr.error("{{ Session::get('error') }}");
        });
    </script>
    {{ Session::forget('error') }}
@endif


@yield('script')
