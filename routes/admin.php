<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserManagement\UserController;
use App\Http\Controllers\Admin\UserManagement\AdminController;
use App\Http\Controllers\Admin\UserManagement\AcademicStuffController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\DesignationController;
use App\Http\Controllers\Admin\Academic\StudentGroupController;
use App\Http\Controllers\Admin\UserManagement\TeacherController;
use App\Http\Controllers\Admin\UserManagement\StudentController;
use App\Http\Controllers\Admin\UserManagement\ParentInfoController;
use App\Http\Controllers\Admin\Academic\EducationalStageController;
use App\Http\Controllers\Admin\Academic\AcademicYearController;
use App\Http\Controllers\Admin\Academic\ClassScheduleController;
use App\Http\Controllers\Admin\Academic\SectionController;
use App\Http\Controllers\Admin\Academic\AcademicClassController;
use App\Http\Controllers\Admin\Academic\SubjectController;
use App\Http\Controllers\Admin\Academic\AssignmentController;
use App\Http\Controllers\Admin\Academic\RoutineController;
use App\Http\Controllers\Admin\Academic\AttendanceController;

use App\Http\Controllers\Admin\Quran\QuranFontController;
use App\Http\Controllers\Admin\Quran\QuranChapterController;
use App\Http\Controllers\Admin\Quran\QuranVerseController;
use App\Http\Controllers\Admin\Quran\QuranTranslationProviderController;
use App\Http\Controllers\Admin\Quran\QuranTranslationController;
use App\Http\Controllers\Admin\Academic\SyllabusController;

use App\Http\Controllers\Admin\ExamManagement\ExamController;
use App\Http\Controllers\Admin\ExamManagement\ExamGradeController;
use App\Http\Controllers\Admin\ExamManagement\ExamScheduleController;
use App\Http\Controllers\Admin\ExamManagement\ExamAttendanceController;
use App\Http\Controllers\Admin\ExamManagement\ExamMarkDistributionTypeController;

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('backend.home.dashboard');
    })->name('dashboard');

    Route::prefix('admin')->group(function (){
        //permissions route
        Route::resource('permissions', PermissionController::class);
        //roles route
        Route::resource('roles', RoleController::class);
        //User route
        Route::resource('users', UserController::class);
        //Settings route
        Route::resource('settings', SettingsController::class);
        //Admin route
        Route::resource('admins', AdminController::class);
//        Designation route
        Route::resource('designations', DesignationController::class);
        // Teacher Route
        Route::resource('teachers', TeacherController::class);
        // Student Route
        Route::resource('students', StudentController::class);
        // Parent Route
        Route::resource('parents', ParentInfoController::class);
        // Academic Stuff Route
        Route::resource('stuffs', AcademicStuffController::class);
        // Academic Assignment Route
        Route::resource('assignments', AssignmentController::class);


//        Student Group Routes
        Route::resource('student-groups', StudentGroupController::class);
        //Educational Stage route
        Route::resource('educational-stages', EducationalStageController::class);
        //Academic Year route
        Route::resource('academic-years', AcademicYearController::class);
        //Class Schedule route
        Route::resource('class-schedules', ClassScheduleController::class);
        //Section route
        Route::resource('sections', SectionController::class);
        //class route
        Route::resource('academic-classes', AcademicClassController::class);
        //Subject route
        Route::resource('subjects', SubjectController::class);
        //Subject route
        Route::resource('syllabuses', SyllabusController::class);
        //Routine route
        Route::resource('routines', RoutineController::class);
        //Routine route
        Route::resource('attendances', AttendanceController::class);

//        Exam Routes
        Route::resource('exams', ExamController::class);
//        Exam Grade Routes
        Route::resource('exam-grades', ExamGradeController::class);
//        Exam Grade Routes
        Route::resource('exam-schedules', ExamScheduleController::class);
//        Exam Attendance Routes
        Route::resource('exam-attendance', ExamAttendanceController::class);
//        Exam Mark Distribution Type Routes
        Route::resource('exam-mark-distribution-types', ExamMarkDistributionTypeController::class);

//        Quran Font Route
        Route::resource('quran-fonts', QuranFontController::class);
//        Quran Chapter Route
        Route::resource('quran-chapters', QuranChapterController::class);
//        Quran Verse Route
        Route::resource('quran-verses', QuranVerseController::class);
//        Quran Translation Provider Route
        Route::resource('quran-translation-providers', QuranTranslationProviderController::class);
//        Quran Translation Route
        Route::resource('quran-translations', QuranTranslationController::class);
    });

    Route::post('/update-exam-attendance', [ExamAttendanceController::class, 'updateExamAttendance'])->name('exam.attendance.edit');
//    ajax routes
    Route::post('/get-exam-schedule-by-exam-section-class', [ExamAttendanceController::class, 'getExamScheduleBySectionClassExam'])->name('get-exam-schedule-by-exam-section-class');
    Route::post('/get-student-exam-attendance', [ExamAttendanceController::class, 'getStudentExamAttendance'])->name('get-student-exam-attendance');
});


