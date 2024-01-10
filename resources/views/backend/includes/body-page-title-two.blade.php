
{{--type two--}}

<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    @if(isset($parent))
                        <li class="breadcrumb-item"><a href="javascript: void(0);">{{ $parent }}</a></li>
                    @endif
                    @if(isset($child))
                        <li class="breadcrumb-item active">{{ $child }}</li>
                    @endif
                </ol>
            </div>
            <h4 class="page-title">{{ isset($parent) ? $parent : '' }}</h4>
        </div>
    </div>
</div>
