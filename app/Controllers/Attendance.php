<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Attendance extends Controller
{
    public function index()
    {
        $db = \Config\Database::connect();

        $attendance = $db->table('attendance')
            ->select('
                attendance.id,
                attendance.student_id,
                attendance.class_id,
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

        return view('attendance', [
            'attendance' => $attendance
        ]);
    }


    public function add()
    {
        $db = \Config\Database::connect();

        $students = $db->table('students')
            ->select('
                students.id,
                students.admission_number,
                students.first_name,
                students.middle_name,
                students.last_name,
                students.class_id,
                classes.class_name
            ')
            ->join(
                'classes',
                'classes.id = students.class_id',
                'left'
            )
            ->orderBy('students.first_name', 'ASC')
            ->get()
            ->getResultArray();

        return view('attendance_add', [
            'students' => $students
        ]);
    }


    public function save()
    {
        $db = \Config\Database::connect();

        $studentId = $this->request->getPost('student_id');
        $attendanceDate = $this->request->getPost('attendance_date');
        $status = $this->request->getPost('status');


        if (
            empty($studentId) ||
            empty($attendanceDate) ||
            empty($status)
        ) {
            return redirect()
                ->back()
                ->withInput()
                ->with(
                    'error',
                    'Please fill all required fields.'
                );
        }


        $student = $db->table('students')
            ->select('
                students.id,
                students.class_id,
                classes.class_name
            ')
            ->join(
                'classes',
                'classes.id = students.class_id',
                'left'
            )
            ->where('students.id', $studentId)
            ->get()
            ->getRowArray();


        if (!$student) {
            return redirect()
                ->back()
                ->withInput()
                ->with(
                    'error',
                    'Selected student does not exist.'
                );
        }


        if (empty($student['class_id'])) {
            return redirect()
                ->back()
                ->withInput()
                ->with(
                    'error',
                    'The selected student has no class assigned.'
                );
        }


        $classId = $student['class_id'];


        $alreadyExists = $db->table('attendance')
            ->where('student_id', $studentId)
            ->where('attendance_date', $attendanceDate)
            ->countAllResults();


        if ($alreadyExists > 0) {
            return redirect()
                ->back()
                ->withInput()
                ->with(
                    'error',
                    'Attendance for this student has already been recorded for this date.'
                );
        }


        $db->table('attendance')->insert([
            'student_id' => $studentId,
            'class_id' => $classId,
            'attendance_date' => $attendanceDate,
            'status' => $status
        ]);


        return redirect()
            ->to('/attendance')
            ->with(
                'success',
                'Attendance saved successfully.'
            );
    }


    public function edit($id)
    {
        $db = \Config\Database::connect();


        $attendance = $db->table('attendance')
            ->select('
                attendance.id,
                attendance.student_id,
                attendance.class_id,
                attendance.attendance_date,
                attendance.status,
                students.admission_number,
                students.first_name,
                students.middle_name,
                students.last_name,
                students.class_id AS student_class_id,
                classes.class_name
            ')
            ->join(
                'students',
                'students.id = attendance.student_id',
                'left'
            )
            ->join(
                'classes',
                'classes.id = students.class_id',
                'left'
            )
            ->where('attendance.id', $id)
            ->get()
            ->getRowArray();


        if (!$attendance) {
            return redirect()
                ->to('/attendance')
                ->with(
                    'error',
                    'Attendance record not found.'
                );
        }


        $students = $db->table('students')
            ->select('
                students.id,
                students.admission_number,
                students.first_name,
                students.middle_name,
                students.last_name,
                students.class_id,
                classes.class_name
            ')
            ->join(
                'classes',
                'classes.id = students.class_id',
                'left'
            )
            ->orderBy('students.first_name', 'ASC')
            ->get()
            ->getResultArray();


        return view('attendance_edit', [
            'attendance' => $attendance,
            'students' => $students
        ]);
    }


    public function update($id)
    {
        $db = \Config\Database::connect();


        $studentId = $this->request->getPost('student_id');
        $attendanceDate = $this->request->getPost('attendance_date');
        $status = $this->request->getPost('status');


        if (
            empty($studentId) ||
            empty($attendanceDate) ||
            empty($status)
        ) {
            return redirect()
                ->back()
                ->withInput()
                ->with(
                    'error',
                    'Please fill all required fields.'
                );
        }


        $recordExists = $db->table('attendance')
            ->where('id', $id)
            ->countAllResults();


        if ($recordExists == 0) {
            return redirect()
                ->to('/attendance')
                ->with(
                    'error',
                    'Attendance record not found.'
                );
        }


        $student = $db->table('students')
            ->select('
                students.id,
                students.class_id,
                classes.class_name
            ')
            ->join(
                'classes',
                'classes.id = students.class_id',
                'left'
            )
            ->where('students.id', $studentId)
            ->get()
            ->getRowArray();


        if (!$student) {
            return redirect()
                ->back()
                ->withInput()
                ->with(
                    'error',
                    'Selected student does not exist.'
                );
        }


        if (empty($student['class_id'])) {
            return redirect()
                ->back()
                ->withInput()
                ->with(
                    'error',
                    'The selected student has no class assigned.'
                );
        }


        $classId = $student['class_id'];


        $duplicate = $db->table('attendance')
            ->where('student_id', $studentId)
            ->where('attendance_date', $attendanceDate)
            ->where('id !=', $id)
            ->countAllResults();


        if ($duplicate > 0) {
            return redirect()
                ->back()
                ->withInput()
                ->with(
                    'error',
                    'This student already has attendance recorded for this date.'
                );
        }


        $db->table('attendance')
            ->where('id', $id)
            ->update([
                'student_id' => $studentId,
                'class_id' => $classId,
                'attendance_date' => $attendanceDate,
                'status' => $status
            ]);


        return redirect()
            ->to('/attendance')
            ->with(
                'success',
                'Attendance updated successfully.'
            );
    }


    public function delete($id)
    {
        $db = \Config\Database::connect();


        $recordExists = $db->table('attendance')
            ->where('id', $id)
            ->countAllResults();


        if ($recordExists == 0) {
            return redirect()
                ->to('/attendance')
                ->with(
                    'error',
                    'Attendance record not found.'
                );
        }


        $db->table('attendance')
            ->where('id', $id)
            ->delete();


        return redirect()
            ->to('/attendance')
            ->with(
                'success',
                'Attendance deleted successfully.'
            );
    }
}
