<div class="container">
    <div class="row">
        <div class="col-md-12 position-relative" style="border: 1px solid lightgrey!important;">
            <div class="" >
                <div class="position-absolute border-1 d-flex justify-content-between align-items-center" style="top: -9px">
                    <h5 class="card-title mb-0">
                        <span class="px-2 py-1 bg-white" style="border: 1px solid lightgrey!important;">Site Configuration</span>
                    </h5>
                </div>
                <div class="pt-2">
                    <form action="{{ isset($setting) ? route('settings.update', $setting->id) : route('settings.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @if(isset($setting))
                            @method('put')
                        @endif
                        <fieldset >
                            <input type="hidden" name="setting_category" value="general">
                            {{--                                                            <input type="hidden" name="setting_id" value="{{ isset($setting) ? $setting->id : '' }}">--}}
                            <div class="form-group row mt-2">
                                <div class="col-md-4 ">
                                    <label for="disabledTextInput" class="form-label f-s-11">
                                        Website Title
                                        <i class="dripicons-question text-danger" data-bs-toggle="tooltip" data-bs-title="Set your site title here" data-bs-placement="right"></i>
                                    </label>
                                    <input type="text"  class="form-control" name="site_title" placeholder="" value="{{ $errors->any() ? old('site_title') : (isset($setting) ? $setting->site_title : '') }}">
                                    @error('site_title')<span class="text-danger f-s-12">{{ $errors->first('site_title') }}</span>@enderror
                                </div>
                                <div class="col-md-4">
                                    <label for="disabledTextInput" class="form-label f-s-12">
                                        Website Name
                                        <i class="dripicons-question f-s-12 text-danger" data-bs-toggle="tooltip" data-bs-title="Set your site Name here" data-bs-placement="right"></i>
                                    </label>
                                    <input type="text"  class="form-control" name="site_name" placeholder="" value="{{ $errors->any() ? old('site_name') : (isset($setting) ? $setting->site_name : '') }}">
                                    @error('site_name')<span class="text-danger f-s-12">{{ $errors->first('site_name') }}</span>@enderror
                                </div>
                                <div class="col-md-4 ">
                                    <label for="disabledTextInput" class="form-label f-s-12">System Email</label>
                                    <i class="dripicons-question text-danger f-s-12" data-bs-toggle="tooltip" data-bs-title="Set organization email address here" data-bs-placement="right"></i>
                                    <input type="text"  class="form-control" name="system_email" placeholder="" value="{{ $errors->any() ? old('system_email') : (isset($setting) ? $setting->system_email : '') }}">
                                    @error('system_email')<span class="text-danger f-s-12">{{ $errors->first('system_email') }}</span>@enderror
                                </div>
                                <div class="col-md-4 mt-2">
                                    <label for="disabledTextInput" class="form-label f-s-12">Institute Phone</label>
                                    <i class="dripicons-question text-danger f-s-12" data-bs-toggle="tooltip" data-bs-title="Set organization email address here" data-bs-placement="right"></i>
                                    <input type="text"  class="form-control" name="institute_phone" placeholder="Institute Phone Number" value="{{ $errors->any() ? old('institute_phone') : (isset($setting) ? $setting->institute_phone : '') }}">
                                    @error('institute_phone')<span class="text-danger f-s-12">{{ $errors->first('institute_phone') }}</span>@enderror
                                </div>
                                <div class="col-md-4 mt-2">
                                    <label for="disabledTextInput" class="form-label f-s-12">Footer</label>
                                    <i class="dripicons-question text-danger f-s-12" data-bs-toggle="tooltip" data-bs-title="Set site footer text here" data-bs-placement="right"></i>
                                    <input type="text"  class="form-control" name="footer" placeholder="Set site footer text here" value="{{ $errors->any() ? old('footer') : (isset($setting) ? $setting->footer : '') }}">
                                    @error('footer')<span class="text-danger f-s-12">{{ $errors->first('footer') }}</span>@enderror
                                </div>
                                <div class="col-md-4 mt-2">
                                    <label for="disabledTextInput" class="form-label f-s-12">Currency Code</label>
                                    <i class="dripicons-question text-danger f-s-12" data-bs-toggle="tooltip" data-bs-title="Set organization currency code like BDT or USD" data-bs-placement="right"></i>
                                    <input type="text"  class="form-control" name="currency_code" placeholder="Set organization currency code like BDT or USD" value="{{ $errors->any() ? old('currency_code') : (isset($setting) ? $setting->currency_code : '') }}">
                                    @error('currency_code')<span class="text-danger f-s-12">{{ $errors->first('currency_code') }}</span>@enderror
                                </div>
                                <div class="col-md-4 mt-2">
                                    <label for="disabledTextInput" class="form-label f-s-12">Currency Symbol</label>
                                    <i class="dripicons-question text-danger f-s-12" data-bs-toggle="tooltip" data-bs-title="Set organization currency system here like ৳ or $" data-bs-placement="right"></i>
                                    <input type="text"  class="form-control" name="currency_symbol" placeholder="Set organization currency system here like ৳ or $" value="{{ $errors->any() ? old('currency_symbol') : (isset($setting) ? $setting->currency_symbol : '') }}">
                                    @error('currency_symbol')<span class="text-danger f-s-12">{{ $errors->first('currency_symbol') }}</span>@enderror
                                </div>
                                <div class="col-md-4 mt-2">
                                    <label for="disabledTextInput" class="form-label f-s-12">Language Change</label>
                                    <i class="dripicons-question text-danger f-s-12" data-bs-toggle="tooltip" data-bs-title="Enable/Disable language for top section" data-bs-placement="right"></i>
                                    <select name="change_language" class="form-control select2" data-toggle="select2">
                                        <option value="1" {{ $errors->any() ? (old('change_language') == 1 ? 'selected' : '') : (isset($setting) && $setting->change_language == 1 ? 'selected' : '') }}>Enable</option>
                                        <option value="0" {{ $errors->any() ? (old('change_language') == 0 ? 'selected' : '') : (isset($setting) && $setting->change_language == 0 ? 'selected' : '') }}>Disable</option>
                                    </select>
                                </div>
                                <div class="col-md-4 mt-2">
                                    <label for="disabledTextInput" class="form-label f-s-12">Default Language</label>
                                    <i class="dripicons-question text-danger f-s-12" data-bs-toggle="tooltip" data-bs-title="Select organization default language here" data-bs-placement="right"></i>
                                    <select name="default_language" class="form-control select2" data-toggle="select2">
                                        <option value="English" selected>English</option>
                                        <option value="Bangla">Bangla</option>
                                    </select>
                                </div>
                                <div class="col-md-4 mt-2">
                                    <label for="disabledTextInput" class="form-label f-s-12">
                                        Institute Division
                                        <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set organization Division here" data-bs-placement="right"></i>
                                    </label>
                                    <select name="institute_division" id="divisions" class="form-control select2" onchange="divisionsList();" data-toggle="select2" data-placeholder="Select  a Division">
                                        <option disabled selected>Select Division</option>
                                        <option value="Dhaka">Dhaka</option>
                                        <option value="Barishal">Barishal</option>
                                        <option value="Chattogram">Chattogram</option>
                                        <option value="Khulna">Khulna</option>
                                        <option value="Mymensingh">Mymensingh</option>
                                        <option value="Rajshahi">Rajshahi</option>
                                        <option value="Rangpur">Rangpur</option>
                                        <option value="Sylhet">Sylhet</option>
                                    </select>
                                </div>
                                <div class="col-md-4 mt-2">
                                    <label for="disabledTextInput" class="form-label f-s-12">Institute District</label>
                                    <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set organization District here" data-bs-placement="right"></i>
                                    <select name="institute_district" id="districts" class="form-control select2" data-toggle="select2">
                                        <option value="" disabled selected> Select a district</option>
                                    </select>
                                </div>
                                <div class="col-md-4 mt-2">
                                    <label for="disabledTextInput" class="form-label f-s-12">Institute Address</label>
                                    <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set organization Address here" data-bs-placement="right"></i>
                                    <textarea name="institute_address" id="" class="form-control" cols="30" rows="2" placeholder="Set organization Address here">{{ $errors->any() ? old('institute_address') : (isset($setting) ? $setting->institute_address : '') }}</textarea>
                                    @error('institute_address')<span class="text-danger f-s-12">{{ $errors->first('institute_address') }}</span>@enderror
                                </div>
                                <div class="col-md-4 mt-2">
                                    <label for="disabledTextInput" class="form-label f-s-12">
                                        Website Favicon
                                        <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set your site Favicon here" data-bs-placement="right"></i>
                                    </label>
                                    <input type="file"  class="form-control" name="site_favicon" placeholder="" accept="image/*">
                                    <span class="text-danger">{{ $errors->has('site_favicon') ? $errors->first('site_favicon') : '' }}</span>
                                    @if(!empty($setting->site_favicon))
                                        <img src="{{ asset($setting->site_favicon)}}" style="height: 16px;width: 16px" alt="site-favicon">
                                    @endif
                                </div>
                                <div class="col-md-4 mt-2">
                                    <label for="disabledTextInput" class="form-label f-s-12">
                                        Website Logo
                                        <i class="dripicons-question" data-bs-toggle="tooltip" data-bs-title="Set your site Logo here" data-bs-placement="right"></i>
                                    </label>
                                    <input type="file"  class="form-control" name="site_logo" placeholder="" accept="image/*" />
                                    <span class="text-danger">{{ $errors->has('site_logo') ? $errors->first('site_logo') : '' }}</span>
                                    @if(!empty($setting->site_logo))
                                        <img src="{{ asset($setting->site_logo)}}" style="height: 100px;width: 100px" alt="">
                                    @endif
                                </div>
                                <div class="col-md-4 mt-2">
                                    <label for="disabledTextInput" class="form-label f-s-12">Website Banner</label>
                                    <input type="file" class="form-control" name="site_banner" placeholder="" accept="image/*" />
                                    <span class="text-danger">{{ $errors->has('site_banner') ? $errors->first('site_banner') : '' }}</span>
                                    @if(!empty($setting->site_banner))
                                        <img src="{{ asset($setting->site_banner)}}" style="height: 250px;width: 250px" alt="">
                                    @endif
                                </div>
                                <div class="col-md-4 mt-2">
                                    <label for="disabledTextInput" class="form-label f-s-12">Website Meta</label>
                                    <textarea name="site_meta" id="" class="form-control" cols="30" rows="2">{{ $errors->any() ? old('site_meta') : (isset($setting) ? $setting->site_meta : '') }}</textarea>
                                    @error('site_meta')<span class="text-danger f-s-12">{{ $errors->first('site_meta') }}</span>@enderror
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <div class="col-12">
                                    <input type="submit" class="mt-3 btn btn-outline-warning" value="Update Settings">
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
