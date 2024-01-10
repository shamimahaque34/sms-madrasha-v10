<?php

namespace App\Http\Controllers\Admin\UserManagement;

use App\Http\Controllers\Controller;
use App\Models\Backend\Designation;
use App\Models\Backend\UserManagement\AcademicStuff;
use App\Models\Backend\UserManagement\Teacher;
use App\Models\Backend\UserManagement\UserSubmittedCertificate;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AcademicStuffController extends Controller
{
    private $academicStuff;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.user-role-permission-management.stuff-manage.index', [
            'stuffs' => AcademicStuff::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.user-role-permission-management.stuff-manage.store',['designations' => Designation::where('status', 1)->get()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = User::UpdateOrCreateUser($request->name_english, $request->email, $request->phone);
        $this->academicStuff = AcademicStuff::saveOrUpdateStuff($request, $user->id);
        if ($request->hasFile('educational_files'))
        {
            UserSubmittedCertificate::saveUserCertificates($request->file('educational_files'), $this->academicStuff);
        }
        return back()->with('success', 'Academic Stuff created successfully.');




        DB::beginTransaction();
        try {
            $user = User::UpdateOrCreateUser($request->name_english, $request->email, $request->phone);
            $this->academicStuff = AcademicStuff::saveOrUpdateStuff($request, $user->id);
            if ($request->hasFile('educational_files'))
            {
                UserSubmittedCertificate::saveUserCertificates($request->file('educational_files'), $this->academicStuff);
            }
            return back()->with('success', 'Academic Stuff created successfully.');
        } catch (\Exception $error)
        {
            DB::rollBack();
            return back()->with('error','error');
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
        return view('backend.user-role-permission-management.stuff-manage.store', [
            'stuff'   => AcademicStuff::findOrFail($id),
            'designations' => Designation::where('status', 1)->get(),
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
        $teacher = AcademicStuff::find($id);
        User::updateOrCreateUser($request->username, $request->email, null, $teacher->user_id);
        AcademicStuff::saveOrUpdateStuff($request, $teacher->user_id, $id);
        return redirect()->route('stuffs.index')->with('success', 'Academic Stuff updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->academicStuff = AcademicStuff::findOrFail($id);
        $user = User::find($this->academicStuff->user_id)->delete();
        if (file_exists($this->academicStuff->image))
        {
            unlink($this->academicStuff->image);
        }
        $this->academicStuff->delete();
        return back()->with('success', 'Academic Stuff deleted successfully.');
    }
}
