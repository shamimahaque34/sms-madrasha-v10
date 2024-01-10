@extends('backend.master')

@section('title')
{{isset($academicYear) ?'Update':'Create'}} Academic Year
@endsection

@section('body-title-section')
    @include('backend.includes.body-page-title-two',['parent'=>'Academic year', 'child' => 'Create'])
@endsection

@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="card mt-3">
                <div class="card-header">
                    <h4 class="float-start">{{isset($academicYear) ?'Update':'Create'}} Academic Year</h4>
                    <a href="{{ route('academic-years.index') }}" class="btn btn-success float-end">
                        Manage
                    </a>
                </div>
                <div class="card-body">
                    <div>
                        <form action="{{isset($academicYear) ? route('academic-years.update', $academicYear->id) : route('academic-years.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @if(isset($academicYear))
                                @method('put')
                            @endif

                            <div class="row">
                                <div class="col-md-6 mb-4" id="datepicker4">
                                    <label  class="form-label">
                                        Session Year Start
                                        <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Your Session Year Start" data-bs-placement="right"></i>
                                    </label>
                                    <input type="text" data-provide="datepicker" data-date-container="#datepicker4" data-date-autoclose="true" class="form-control" name="session_year_start" placeholder="" value="{{ $errors->any() ? old('session_year_start') : (isset($academicYear)? $academicYear->session_year_start :'')}}">
                                    @error('session_year_start')<span class="text-danger f-s-12">{{$errors->first('session_year_start')}}</span> @enderror
                                </div>

                                <div class="col-md-6 mb-4" id="datepicker4">
                                    <label  class="form-label">
                                        Session year End
                                        <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Your Session Year End" data-bs-placement="right"></i>
                                    </label>
                                    <input type="text" data-provide="datepicker" data-date-container="#datepicker4" data-date-autoclose="true" class="form-control" name="session_year_end" placeholder="" value="{{ $errors->any() ? old('session_year_end') : (isset($academicYear)? $academicYear->session_year_end :'')}}">
                                    @error('session_year_end')<span class="text-danger f-s-12">{{$errors->first('session_year_end')}}</span> @enderror
                                </div>

                                {{--                                        <div class="col-md-6 mb-4" id="datepicker1">--}}
                                {{--                                            <label  class="form-label">--}}
                                {{--                                                Session Month start--}}
                                {{--                                                <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Your Session Month Start" data-bs-placement="right"></i>--}}
                                {{--                                            </label>--}}
                                {{--                                            <input type="text" data-provide="datepicker" data-date-container="#datepicker1" class="form-control" name="session_month_start" placeholder="" value="{{ $errors->any() ? old('session_month_start') : (isset($academicYear)? $academicYear->session_month_start :'')}}">--}}
                                {{--                                            @error('session_month_start')<span class="text-danger f-s-12">{{$errors->first('session_month_start')}}</span> @enderror--}}
                                {{--                                        </div>--}}

                                {{--                                        <div class="col-md-6 mb-4" id="datepicker1">--}}
                                {{--                                            <label  class="form-label">--}}
                                {{--                                                Session Month End--}}
                                {{--                                                <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Your Session Month End" data-bs-placement="right"></i>--}}
                                {{--                                            </label>--}}
                                {{--                                            <input type="text" data-provide="datepicker" data-date-container="#datepicker1" class="form-control" name="session_month_end" placeholder="" value="{{ $errors->any() ? old('session_month_end') : (isset($academicYear)? $academicYear->session_month_end :'')}}">--}}
                                {{--                                            @error('session_month_end')<span class="text-danger f-s-12">{{$errors->first('session_month_end')}}</span> @enderror--}}
                                {{--                                        </div>--}}

                                <div class="col-md-12">
                                    <label for="" class="">
                                        Status
                                        <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set Your Status" data-bs-placement="right"></i><br>
                                    </label>
                                    <div class="d-inline">
                                        <input type="checkbox" {{ isset($academicYear) && $academicYear->status == 0 ? '' : 'checked' }} name="status" id="switch1" data-switch="bool"/>
                                        <label for="switch1" data-on-label="On" data-off-label="Off"></label>
                                    </div>
                                    @error('status')<span class="text-danger f-s-12" >{{$errors->first('status')}}</span> @enderror
                                </div>

                                <div class="col-md-12 text-center">
                                    <input type="submit" class="btn btn-success mt-3" id="" value="{{ isset($academicYear) ? 'Update ' : 'Create ' }} Academic Year ">
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
