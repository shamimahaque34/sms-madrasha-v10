<?php

namespace App\Http\Controllers\Admin\UserManagement;

use App\Http\Controllers\Controller;
use App\Http\Requests\BackendAdminFormRequest;
use App\Models\Backend\UserManagement\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    private $user, $admin;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.user-role-permission-management.admin-manage.index', [
            'admins'    => Admin::latest()->get(),
        ]);
    }

    public function dropzoneImage (Request $request)
    {
        $image = $request->file('file');
        $name = rand(10,1000).'.'.$image->extension();
        $directory = 'backend/temp/';
        $imageUrl = $directory.$name;
        $image->move($directory,$name);
        return response()->json(['success' => $imageUrl]);
        return json_encode($request->file('file'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.user-role-permission-management.admin-manage.store');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BackendAdminFormRequest $request)
    {
        try {
            DB::transaction(function () use ($request){
                $this->user = User::createAdminUser($request);
                Admin::saveOrUpdate($request, $this->user);
            });
            return back()->with('success', 'Admin data saved successfully.');
        } catch (\Exception $exception)
        {
            DB::rollBack();
            return redirect()->back()->withInput()->with('error', 'something went wrong. please try again.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('backend.user-role-permission-management.admin-manage.show', [
            'admin'     => Admin::findOrFail($id),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('backend.user-role-permission-management.admin-manage.store', [
            'admin'     => Admin::findOrFail($id),
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


        try {
            DB::transaction(function () use ($request, $id){
                $this->user = User::updateAdminUser($request, Admin::find($id)->user_id);
                Admin::saveOrUpdate($request, $this->user, $id);
            });
            return redirect()->route('admins.index')->with('success', 'Admin data updated successfully.');
        } catch (\Exception $exception)
        {
            DB::rollBack();
            return redirect()->back()->withInput()->with('error', 'something went wrong. please try again.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->admin = Admin::findOrFail($id);
        if ($this->admin)
        {
            User::find($this->admin->user_id)->delete();
            if (file_exists($this->admin->image))
            {
                unlink($this->admin->image);
            }
            $this->admin->delete();
            return back()->with('success', 'Admin user deleted successfully.');
        } else {
            return back()->with('error', 'Something went wrong. Please try again.');
        }
    }
}
