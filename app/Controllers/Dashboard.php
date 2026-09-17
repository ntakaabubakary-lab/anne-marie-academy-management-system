<?php

namespace App\Controllers;

use App\Models\StudentModel;
use App\Models\TeacherModel;
use App\Models\ClassModel;

class Dashboard extends BaseController
{
    public function index()
    {
        // Student count
        $studentModel = new StudentModel();
        $totalStudents = $studentModel->countAllResults();

        // Teacher count
        $teacherModel = new TeacherModel();
        $totalTeachers = $teacherModel->countAllResults();

        // Class count
        $classModel = new ClassModel();
        $totalClasses = $classModel->countAllResults();

        // Send totals to dashboard view
        $data = [
            'totalStudents' => $totalStudents,
            'totalTeachers' => $totalTeachers,
            'totalClasses'  => $totalClasses
        ];

        return view('dashboard', $data);
    }
}