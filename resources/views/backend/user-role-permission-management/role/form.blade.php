@extends('backend.master')

@section('title')
    Create Role
@endsection

@section('body-title-section')
    @include('backend.includes.body-page-title-two',['parent'=>'Roles', 'child' => 'Create'])
@endsection

@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="card mt-3">
                <div class="card-header">
                    <h4 class="float-start">Create Role</h4>
                    <a href="{{ route('roles.index') }}" class="btn btn-success float-end">
                        Manage
                        {{--                                    <i class="dripicons-arrow-thin-left"></i>--}}
                    </a>
                </div>
                <div class="card-body">
                    <div>
                        <form action="{{ isset($role) ? route('roles.update', $role->id) : route('roles.store') }}" method="POST">
                            @csrf
                            @if(isset($role))
                                @method('put')
                            @endif
                            <div class="mb-3">
                                <label class="form-label">Role Title</label>
                                <input type="text" class="form-control" name="title" value="{{ isset($role) ? $role->title : '' }}" data-provide="typeahead" id="the-basics" placeholder="Role Title">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Role Permissions</label>
                                <select name="permissions[]" class="select2 form-control select2-multiple" data-toggle="select2" multiple="multiple" data-placeholder="Set Permissions">
                                    @foreach($permissions as $permission)
                                        <option value="{{ $permission->id }}" {{ isset($role) && $role->permissions->contains($permission->id) ? 'selected' : '' }}>{{ $permission->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3 float-end">
                                <input type="submit" class="btn btn-success" data-provide="typeahead" id="" value="{{ isset($user) ? 'Update' : 'Create' }} Role">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
