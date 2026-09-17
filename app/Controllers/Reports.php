<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Reports extends Controller
{
    public function index()
    {
        $db = \Config\Database::connect();

        $totalStudents = $db->table('students')
            ->countAllResults();

        $totalTeachers = $db->table('teachers')
            ->countAllResults();

        $totalClasses = $db->table('classes')
            ->countAllResults();

        $totalAttendance = $db->table('attendance')
            ->countAllResults();

        $totalFees = $db->table('fees')
            ->countAllResults();

        $totalResults = $db->table('results')
            ->countAllResults();

        $data = [
            'totalStudents' => $totalStudents,
            'totalTeachers' => $totalTeachers,
            'totalClasses' => $totalClasses,
            'totalAttendance' => $totalAttendance,
            'totalFees' => $totalFees,
            'totalResults' => $totalResults
        ];

        return view('reports', $data);
    }

    public function students()
    {
        $db = \Config\Database::connect();

        $students = $db->table('students')
            ->select('
                students.*,
                classes.class_name,
                classes.level,
                combinations.combination_code,
                combinations.combination_name
            ')
            ->join(
                'classes',
                'classes.id = students.class_id',
                'left'
            )
            ->join(
                'combinations',
                'combinations.id = students.combination_id',
                'left'
            )
            ->orderBy('students.id', 'DESC')
            ->get()
            ->getResultArray();

        return view('report_students', [
            'students' => $students
        ]);
    }

    public function teachers()
    {
        $db = \Config\Database::connect();

        $teachers = $db->table('teachers')
            ->orderBy('id', 'DESC')
            ->get()
            ->getResultArray();

        return view('report_teachers', [
            'teachers' => $teachers
        ]);
    }

    public function attendance()
    {
        $db = \Config\Database::connect();

        $attendance = $db->table('attendance')
            ->select('
                attendance.id,
                attendance.attendance_date,
                attendance.status,
                students.admission_number,
                students.first_name,
                students.middle_name,
                students.last_name,
                classes.class_name
            ')
            ->join(
                'students',
                'students.id = attendance.student_id',
                'left'
            )
            ->join(
                'classes',
                'classes.id = attendance.class_id',
                'left'
            )
            ->orderBy('attendance.attendance_date', 'DESC')
            ->orderBy('attendance.id', 'DESC')
            ->get()
            ->getResultArray();

        return view('report_attendance', [
            'attendance' => $attendance
        ]);
    }

    public function fees()
    {
        $db = \Config\Database::connect();

        $fees = $db->table('fees')
            ->select('
                fees.id,
                fees.amount,
                fees.payment_date,
                fees.payment_method,
                fees.reference_number,
                students.admission_number,
                students.first_name,
                students.middle_name,
                students.last_name,
                academic_years.year_name,
                users.username AS received_by_name
            ')
            ->join(
                'students',
                'students.id = fees.student_id',
                'left'
            )
            ->join(
                'academic_years',
                'academic_years.id = fees.academic_year_id',
                'left'
            )
            ->join(
                'users',
                'users.id = fees.received_by',
                'left'
            )
            ->orderBy('fees.payment_date', 'DESC')
            ->orderBy('fees.id', 'DESC')
            ->get()
            ->getResultArray();

        $totalAmount = $db->table('fees')
            ->selectSum('amount')
            ->get()
            ->getRowArray();

        return view('report_fees', [
            'fees' => $fees,
            'totalAmount' => $totalAmount['amount'] ?? 0
        ]);
    }

    public function results()
    {
        $db = \Config\Database::connect();

        $results = $db->table('results')
            ->select('
                results.id,
                results.marks,
                students.admission_number,
                students.first_name,
                students.middle_name,
                students.last_name,
                subjects.subject_code,
                subjects.subject_name,
                exams.exam_name,
                exams.exam_type,
                academic_years.year_name
            ')
            ->join(
                'students',
                'students.id = results.student_id',
                'left'
            )
            ->join(
                'subjects',
                'subjects.id = results.subject_id',
                'left'
            )
            ->join(
                'exams',
                'exams.id = results.exam_id',
                'left'
            )
            ->join(
                'academic_years',
                'academic_years.id = exams.academic_year_id',
                'left'
            )
            ->orderBy('results.id', 'DESC')
            ->get()
            ->getResultArray();

        return view('report_results', [
            'results' => $results
        ]);
    }

    public function classes()
    {
        $db = \Config\Database::connect();

        $classes = $db->table('classes')
            ->select('
                classes.id,
                classes.class_name,
                classes.level
            ')
            ->orderBy('classes.class_name', 'ASC')
            ->get()
            ->getResultArray();

        foreach ($classes as &$class) {

            $class['student_count'] = $db->table('students')
                ->where('class_id', $class['id'])
                ->countAllResults();
        }

        return view('report_classes', [
            'classes' => $classes
        ]);
    }
}
