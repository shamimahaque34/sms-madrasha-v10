@extends('backend.master')

@section('title')
    {{ isset($backendSetting) ? $backendSetting->site_logo : '' }} - Student Group
@endsection

@section('body-title-section')
    @include('backend.includes.body-page-title-two',['parent'=>'Student Group', 'child' => 'Create'])
@endsection

@section('body')
    <div class="row">
        <div class="col-md-9 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-capitalize float-start">{{ isset($group) ? 'Update' : 'Create' }} Student Group</h4>
                    <a href="{{ route('student-groups.index') }}" class="btn btn-success float-end">
                        Manage
                    </a>
                </div>
                <div class="card-body">
                    <form action="{{isset($group) ? route('student-groups.update',$group->id) : route('student-groups.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @if(isset($group))
                            @method('put')
                        @endif
                        <div class="mb-2">
                            <label class="py-1" for="">
                                <span class="text-danger">*</span>
                                Group Name
                                <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Write a student group name here" data-bs-placement="right"></i>
                            </label>
                            <input type="text" class="form-control mb-1" name="group_name" value="{{ $errors->any() ? old('group_name') : (isset($group) ? $group->group_name : '') }}" placeholder="Group name" >
                            @error('group_name')<span class="text-danger f-s-12">{{ $errors->first('group_name') }}</span>@enderror
                        </div>
                        <div class="mb-2">
                            <label class="py-1" for="">
                                Note
                                <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Write note here if there has any" data-bs-placement="right"></i>
                            </label>
                            <textarea name="note" class="form-control" id="" cols="30" rows="5" placeholder="Note">{{ $errors->any() ? old('note') : (isset($group) ? $group->note : '') }}</textarea>
                            @error('note')<span class="text-danger f-s-12">{{ $errors->first('note') }}</span>@enderror
                        </div>
                        <div class="mb-2">
                            <label class="py-1" for="">
                                Status
                                <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Select student group status here." data-bs-placement="right"></i>
                            </label>
                            <div class="d-inline mt-3">
                                <input type="checkbox" {{ isset($group) && $group->status == 1 ? 'checked' : '' }} name="status" id="switch1" checked data-switch="bool"/>
                                <label for="switch1" data-on-label="On" data-off-label="Off"></label>
                            </div>
                            @error('note')<span class="text-danger f-s-12">{{ $errors->first('note') }}</span>@enderror
                        </div>
                        <div class="d-grid">
                            <input type="submit" class="col-6 mx-auto btn btn-success" value="{{ isset($group) ? 'Update' : 'Create' }} Student Group">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
