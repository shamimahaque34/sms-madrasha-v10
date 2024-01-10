<?php

namespace App\Http\Controllers\Admin\UserManagement;

use App\Http\Controllers\Controller;
use App\Http\Requests\TeacherFormRequest;
use App\Models\Backend\Designation;
use App\Models\Backend\UserManagement\Teacher;
use App\Models\Backend\UserManagement\UserSubmittedCertificate;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TeacherController extends Controller
{
    private $teacher;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.user-role-permission-management.teacher-manage.index', ['teachers' => Teacher::latest()->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.user-role-permission-management.teacher-manage.store',['designations' => Designation::where('status', 1)->get()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TeacherFormRequest $request)
    {
        DB::beginTransaction();
        try {
            $user = User::UpdateOrCreateUser($request->name_english, $request->email, $request->phone);
            $this->teacher = Teacher::saveOrUpdateTeacher($request, $user->id);
            if ($request->hasFile('educational_files'))
            {
                UserSubmittedCertificate::saveUserCertificates($request->file('educational_files'), $this->teacher);
            }
            return back()->with('success', 'Teacher created successfully.');
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
        return view('backend.user-role-permission-management.teacher-manage.store', [
            'teacher'   => Teacher::findOrFail($id),
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
        $teacher = Teacher::find($id);
        User::updateOrCreateUser($request->username, $request->email, null, $teacher->user_id);
        Teacher::saveOrUpdateTeacher($request, $teacher->user_id, $id);
        return redirect()->route('teachers.index')->with('success', 'Teacher updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->teacher = Teacher::findOrFail($id);
        $user = User::find($this->teacher->user_id)->delete();
        if (file_exists($this->teacher->image))
        {
            unlink($this->teacher->image);
        }
        $this->teacher->delete();
        return back()->with('success', 'Teacher deleted successfully.');
    }
}
