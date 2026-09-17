<?php

namespace App\Controllers;

use App\Models\ExamModel;
use CodeIgniter\Controller;

class Exams extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Display Exams
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        $db = \Config\Database::connect();

        $examModel = new ExamModel();

        $data['exams'] = $examModel
            ->select('exams.*, academic_years.year_name')
            ->join(
                'academic_years',
                'academic_years.id = exams.academic_year_id',
                'left'
            )
            ->orderBy('exams.id', 'DESC')
            ->findAll();

        return view('exams', $data);
    }


    /*
    |--------------------------------------------------------------------------
    | Add Exam Page
    |--------------------------------------------------------------------------
    */

    public function add()
    {
        $db = \Config\Database::connect();

        /*
        |--------------------------------------------------------------------------
        | Get Current Year Automatically
        |--------------------------------------------------------------------------
        */

        $currentYear = date('Y');


        /*
        |--------------------------------------------------------------------------
        | Make All Academic Years Inactive
        |--------------------------------------------------------------------------
        */

        $db->table('academic_years')
            ->update([
                'status' => 'Inactive'
            ]);


        /*
        |--------------------------------------------------------------------------
        | Check Whether Current Year Exists
        |--------------------------------------------------------------------------
        */

        $currentYearExists = $db->table('academic_years')
            ->where('year_name', $currentYear)
            ->countAllResults();


        /*
        |--------------------------------------------------------------------------
        | Create Current Year Automatically If It Does Not Exist
        |--------------------------------------------------------------------------
        */

        if ($currentYearExists == 0) {

            $db->table('academic_years')->insert([

                'year_name' =>
                    $currentYear,

                'status' =>
                    'Active',

                'created_at' =>
                    date('Y-m-d H:i:s')

            ]);

        } else {

            /*
            |--------------------------------------------------------------------------
            | Make Current Year Active
            |--------------------------------------------------------------------------
            */

            $db->table('academic_years')
                ->where(
                    'year_name',
                    $currentYear
                )
                ->update([
                    'status' => 'Active'
                ]);
        }


        /*
        |--------------------------------------------------------------------------
        | Get All Academic Years
        |--------------------------------------------------------------------------
        */

        $data['academic_years'] = $db
            ->table('academic_years')
            ->orderBy(
                'year_name',
                'DESC'
            )
            ->get()
            ->getResultArray();


        /*
        |--------------------------------------------------------------------------
        | Open Add Exam Page
        |--------------------------------------------------------------------------
        */

        return view(
            'exam_add',
            $data
        );
    }


    /*
    |--------------------------------------------------------------------------
    | Save Exam
    |--------------------------------------------------------------------------
    */

    public function save()
    {
        try {

            $examModel = new ExamModel();


            /*
            |--------------------------------------------------------------------------
            | Get Form Data
            |--------------------------------------------------------------------------
            */

            $examName =
                $this->request->getPost(
                    'exam_name'
                );

            $examType =
                $this->request->getPost(
                    'exam_type'
                );

            $academicYearId =
                $this->request->getPost(
                    'academic_year_id'
                );


            /*
            |--------------------------------------------------------------------------
            | Validate Required Fields
            |--------------------------------------------------------------------------
            */

            if (
                empty($examName) ||
                empty($examType) ||
                empty($academicYearId)
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
            | Prepare Data
            |--------------------------------------------------------------------------
            */

            $data = [

                'exam_name' =>
                    $examName,

                'exam_type' =>
                    $examType,

                'academic_year_id' =>
                    $academicYearId

            ];


            /*
            |--------------------------------------------------------------------------
            | Save Exam
            |--------------------------------------------------------------------------
            */

            $examModel->insert($data);


            /*
            |--------------------------------------------------------------------------
            | Redirect
            |--------------------------------------------------------------------------
            */

            return redirect()
                ->to('/exams')
                ->with(
                    'success',
                    'Exam created successfully.'
                );


        } catch (\Throwable $e) {

            echo '<h2>EXAM SAVE ERROR</h2>';

            echo '<pre>';

            echo $e->getMessage();

            echo '</pre>';
        }
    }
}