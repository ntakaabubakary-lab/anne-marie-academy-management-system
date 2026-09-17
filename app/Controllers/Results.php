<?php

namespace App\Controllers;

use App\Models\ResultModel;
use App\Models\StudentModel;
use App\Models\ExamModel;

class Results extends BaseController
{
    /*
    |--------------------------------------------------------------------------
    | Display All Results
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        $db = \Config\Database::connect();

        $data['results'] = $db
            ->table('results')
            ->select(
                'results.*,
                 students.admission_number,
                 students.first_name,
                 students.middle_name,
                 students.last_name,
                 subjects.subject_code,
                 subjects.subject_name,
                 exams.exam_name,
                 exams.exam_type,
                 academic_years.year_name'
            )
            ->join(
                'students',
                'students.id = results.student_id'
            )
            ->join(
                'subjects',
                'subjects.id = results.subject_id'
            )
            ->join(
                'exams',
                'exams.id = results.exam_id'
            )
            ->join(
                'academic_years',
                'academic_years.id = exams.academic_year_id'
            )
            ->orderBy(
                'results.id',
                'DESC'
            )
            ->get()
            ->getResultArray();

        return view(
            'results',
            $data
        );
    }


    /*
    |--------------------------------------------------------------------------
    | Add Result Page
    |--------------------------------------------------------------------------
    */

    public function add()
    {
        $studentModel = new StudentModel();
        $examModel = new ExamModel();

        $db = \Config\Database::connect();


        /*
        |--------------------------------------------------------------------------
        | Get Students
        |--------------------------------------------------------------------------
        */

        $data['students'] = $studentModel
            ->orderBy(
                'first_name',
                'ASC'
            )
            ->findAll();


        /*
        |--------------------------------------------------------------------------
        | Get Subjects
        |--------------------------------------------------------------------------
        */

        $data['subjects'] = $db
            ->table('subjects')
            ->select(
                'id, subject_code, subject_name, level'
            )
            ->orderBy(
                'subject_name',
                'ASC'
            )
            ->get()
            ->getResultArray();


        /*
        |--------------------------------------------------------------------------
        | Get Exams
        |--------------------------------------------------------------------------
        */

        $data['exams'] = $examModel
            ->select(
                'exams.*, academic_years.year_name'
            )
            ->join(
                'academic_years',
                'academic_years.id = exams.academic_year_id',
                'left'
            )
            ->orderBy(
                'exams.id',
                'DESC'
            )
            ->findAll();


        return view(
            'result_add',
            $data
        );
    }


    /*
    |--------------------------------------------------------------------------
    | Save Result
    |--------------------------------------------------------------------------
    */

    public function save()
    {
        try {

            $resultModel = new ResultModel();


            /*
            |--------------------------------------------------------------------------
            | Get Form Data
            |--------------------------------------------------------------------------
            */

            $studentId =
                $this->request->getPost(
                    'student_id'
                );

            $subjectId =
                $this->request->getPost(
                    'subject_id'
                );

            $examId =
                $this->request->getPost(
                    'exam_id'
                );

            $marks =
                $this->request->getPost(
                    'marks'
                );


            /*
            |--------------------------------------------------------------------------
            | Validate Required Fields
            |--------------------------------------------------------------------------
            */

            if (
                empty($studentId) ||
                empty($subjectId) ||
                empty($examId) ||
                $marks === ''
            ) {

                return redirect()
                    ->back()
                    ->withInput()
                    ->with(
                        'error',
                        'Please fill all required fields.'
                    );
            }


            /*
            |--------------------------------------------------------------------------
            | Validate Marks
            |--------------------------------------------------------------------------
            */

            if (
                !is_numeric($marks) ||
                $marks < 0 ||
                $marks > 100
            ) {

                return redirect()
                    ->back()
                    ->withInput()
                    ->with(
                        'error',
                        'Marks must be between 0 and 100.'
                    );
            }


            /*
            |--------------------------------------------------------------------------
            | Prepare Result Data
            |--------------------------------------------------------------------------
            */

            $data = [

                'student_id' =>
                    $studentId,

                'subject_id' =>
                    $subjectId,

                'exam_id' =>
                    $examId,

                'marks' =>
                    $marks

            ];


            /*
            |--------------------------------------------------------------------------
            | Save Result
            |--------------------------------------------------------------------------
            */

            $resultModel->insert(
                $data
            );


            /*
            |--------------------------------------------------------------------------
            | Redirect
            |--------------------------------------------------------------------------
            */

            return redirect()
                ->to('/results')
                ->with(
                    'success',
                    'Student result saved successfully.'
                );


        } catch (\Throwable $e) {

            echo '<h2>RESULT SAVE ERROR</h2>';

            echo '<pre>';

            echo $e->getMessage();

            echo '</pre>';
        }
    }
}