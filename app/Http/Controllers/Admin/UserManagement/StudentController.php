<?php

namespace App\Http\Controllers\Admin\UserManagement;

use App\Http\Controllers\Controller;
use App\Models\Backend\Academic\AcademicClass;
use App\Models\Backend\Academic\Section;
use App\Models\Backend\Academic\StudentGroup;
use App\Models\Backend\Academic\Subject;
use App\Models\Backend\UserManagement\ParentInfo;
use App\Models\Backend\UserManagement\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;

class StudentController extends Controller
{
    protected $student;
    protected $teacher;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.user-role-permission-management.student-manage.index', ['students' => Student::latest()->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.user-role-permission-management.student-manage.store', [
            'parents'   => ParentInfo::where(['status' => 1])->latest()->get(),
            'academicClasses' => AcademicClass::where('status', 1)->get(),
            'sections'      => Section::where('status', 1)->get(),
            'studentGroups' => StudentGroup::where('status', 1)->get(),
            'subjects'  => Subject::where('status' , 1)->whereHas('academicClass',function ($query) {
                $query->where('class_numeric', '>', 8);
            })->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::transaction(function () use ($request) {
            $user = User::UpdateOrCreateUser($request->name_english, $request->email, $request->phone);
            $this->student = Student::saveOrUpdateStudent($request, $user->id);
        });
        if (isset($this->student))
        {
            return back()->with('success', 'Student created successfully.');
        } else {
            return back()->withInput()->with('error', 'something went wrong, please try again');
        }
//        DB::beginTransaction();
//        try {
//            $user = User::UpdateOrCreateUser($request->name_english, $request->email, $request->phone);
//            $this->student = Student::saveOrUpdateStudent($request, $user->id);
//
////            return back()->with('success', 'Student created successfully.');
//        } catch (Exception $e)
//        {
//            DB::rollBack();
//            dd($e->getMessage());
////            return back()->withInput()->withErrors($e);
//        }
//        DB::commit();
//        if (isset($this->student))
//        {
//            return 'has data';
//        } else {
//            return 'wrong';
//        }
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
        return view('backend.user-role-permission-management.student-manage.store', [
            'parents'   => ParentInfo::where(['status' => 1])->latest()->get(),
            'academicClasses' => AcademicClass::where('status', 1)->get(),
            'sections'      => Section::where('status', 1)->get(),
            'studentGroups' => StudentGroup::where('status', 1)->get(),
            'subjects'  => Subject::where('status' , 1)->whereHas('academicClass',function ($query) {
                $query->where('class_numeric', '>', 8);
            })->get(),
            'student'   => Student::find($id)
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
        DB::transaction(function () use ($request, $id) {
            $user = User::UpdateOrCreateUser($request->name_english, $request->email, null, Student::find($id)->user_id);
            $this->student = Student::saveOrUpdateStudent($request, $user->id, $id);
        });
        if (isset($this->student))
        {
            return redirect('/admin/students')->with('success', 'Student updated successfully.');
        } else {
            return back()->withInput()->with('error', 'something went wrong, please try again');
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
        $this->teacher = Student::findOrFail($id);
        $user = User::find($this->teacher->user_id)->delete();
        if (file_exists($this->teacher->image))
        {
            unlink($this->teacher->image);
        }
        $this->teacher->delete();
        return back()->with('success', 'Student deleted successfully.');
    }
}
