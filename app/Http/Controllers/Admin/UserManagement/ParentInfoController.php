<?php

namespace App\Http\Controllers\Admin\UserManagement;

use App\Http\Controllers\Controller;
use App\Http\Requests\ParentFormRequest;
use App\Models\Backend\UserManagement\ParentInfo;
use App\Models\User;
use Illuminate\Http\Request;

class ParentInfoController extends Controller
{
    public $user, $parent;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.user-role-permission-management.parents.index',[
            'parents'   => ParentInfo::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.user-role-permission-management.parents.store');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ParentFormRequest $request)
    {
        $this->user = User::updateOrCreateUser($request->username, $request->email, $request->phone);
        ParentInfo::saveOrUpdateParent($request, $this->user->id);
        return back()->with('success', 'Parent created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('backend.user-role-permission-management.parents.store',[
            'parent'    => ParentInfo::findOrFail($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'username'  => 'required',
            'email' => 'required',
        ]);
        $parent = ParentInfo::find($id);
        $this->user = User::updateOrCreateUser($request->username, $request->email, null, $parent->user_id);
        ParentInfo::saveOrUpdateParent($request, $this->user->id, $id);

        return redirect(route('parents.index'))->with('success', 'Parent Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ParentInfo::find($id)->delete();
        return back()->with('success', 'Parent Deleted Successfully.');
    }
}
