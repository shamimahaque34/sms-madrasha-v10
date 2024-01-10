@extends('backend.master')

@section('title')
    {{ isset($backendSetting) ? $backendSetting->site_title : '' }} - {{ isset($permission) ? "Update" : 'Create' }} Permission
@endsection

@section('body-title-section')
    @include('backend.includes.body-page-title-two',['parent'=>'Permission', 'child' => 'Create'])
@endsection

@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="card mt-3">
                <div class="card-header">
                    <h4 class="float-start">{{ isset($permission) ? "Update" : 'Create' }} Permission</h4>
                    <a href="{{ route('permissions.index') }}" class="btn btn-success float-end">
                        Manage
                        {{--                                    <i class="dripicons-arrow-thin-left"></i>--}}
                    </a>
                </div>
                <div class="card-body">
                    <div>
                        <form action="{{ isset($permission) ? route('permissions.update', $permission->id) : route('permissions.store') }}" method="POST">
                            @csrf
                            @if(isset($permission))
                                @method('put')
                            @endif
                            <div class="mb-3">
                                <label class="form-label">Permission Title</label>
                                <input type="text" class="form-control" name="title" value="{{ isset($permission) ? $permission->title : '' }}" data-provide="typeahead" id="the-basics" placeholder="Permission Title">
                            </div>
                            <div class="mb-3 float-end">
                                <input type="submit" class="btn btn-success" data-provide="typeahead" id="" value="{{ isset($permission) ? 'Update' : 'Create' }} Permission">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
