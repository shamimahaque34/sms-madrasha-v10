@extends('backend.master')

@section('title')
    Create Role
@endsection

@section('body-title-section')
    @include('backend.includes.body-page-title-two',['parent'=>'Users', 'child' => 'Create'])
@endsection

@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="card mt-3">
                <div class="card-header">
                    <h4 class="float-start">Create User</h4>
                    <a href="{{ route('users.index') }}" class="btn btn-success float-end">
                        Manage
                        {{--                                    <i class="dripicons-arrow-thin-left"></i>--}}
                    </a>
                </div>
                <div class="card-body">
                    <div>
                        <form action="{{ isset($user) ? route('users.update', $user->id) : route('users.store') }}" method="POST">
                            @csrf
                            @if(isset($user))
                                @method('put')
                            @endif
                            <div class="mb-3">
                                <label class="form-label">Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="name" required value="{{ isset($user) ? $user->name : '' }}" data-provide="typeahead" id="the-basics" placeholder="User Name">
                                <span class="text-danger">{{ $errors->has('name') ? $errors->first('name') : '' }}</span>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Email <span class="text-danger">*</span></label>
                                <input type="email" class="form-control" required name="email" value="{{ isset($user) ? $user->email : '' }}" data-provide="typeahead" id="" placeholder="User Email">
                                <span class="text-danger">{{ $errors->has('email') ? $errors->first('email') : '' }}</span>
                            </div>
                            <div class="mb-3">
                                <label class="form-label"> Password <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="password" value="" data-provide="typeahead" id="" placeholder="{{ isset($user) ? 'Update' : 'User' }} Password {{ isset($user) ? 'if required' : '' }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Roles <span class="text-danger">*</span></label>
                                <select name="roles[]" required class="select2 form-control select2-multiple" data-toggle="select2" multiple="multiple" data-placeholder="Set Permissions">
                                    @foreach($roles as $role)
                                        <option value="{{ $role->id }}" {{ isset($user) && $user->roles->contains($role->id) ? 'selected' : '' }}>{{ $role->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3 float-end">
                                <input type="submit" class="btn btn-success" data-provide="typeahead" id="" value="{{ isset($user) ? 'Update' : 'Create' }} User">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
