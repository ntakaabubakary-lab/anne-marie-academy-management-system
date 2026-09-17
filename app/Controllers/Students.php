<?php

namespace App\Controllers;

use App\Models\StudentModel;
use App\Models\ClassModel;
use App\Models\CombinationModel;

class Students extends BaseController
{
    /**
     * Display all students
     */
    public function index()
    {
        $studentModel = new StudentModel();

        $data['students'] = $studentModel
            ->select('students.*, classes.class_name, classes.level, combinations.combination_code, combinations.combination_name')
            ->join('classes', 'classes.id = students.class_id')
            ->join('combinations', 'combinations.id = students.combination_id', 'left')
            ->findAll();

        return view('students', $data);
    }


    /**
     * Show Add Student form
     */
    public function add()
    {
        $classModel = new ClassModel();
        $combinationModel = new CombinationModel();

        // Get all classes
        $data['classes'] = $classModel->findAll();

        // Get all combinations from database
        $data['combinations'] = $combinationModel->findAll();

        return view('student_add', $data);
    }


    /**
     * Save new student
     */
    public function save()
    {
        try {

            $studentModel = new StudentModel();
            $classModel = new ClassModel();

            // Get selected class
            $classId = $this->request->getPost('class_id');

            // Find class
            $class = $classModel->find($classId);

            if (!$class) {

                return redirect()
                    ->back()
                    ->withInput()
                    ->with('error', 'Please select a valid class.');

            }


            // Default combination is NULL
            $combinationId = null;


            /*
             * A-Level students MUST have a combination.
             * O-Level students do NOT need a combination.
             */

            if ($class['level'] === 'A-Level') {

                $combinationId =
                    $this->request->getPost('combination_id');


                if (empty($combinationId)) {

                    return redirect()
                        ->back()
                        ->withInput()
                        ->with(
                            'error',
                            'A-Level student must have a combination.'
                        );

                }

            }


            // Student data
            $data = [

                'admission_number' =>
                    $this->request->getPost('admission_number'),

                'first_name' =>
                    $this->request->getPost('first_name'),

                'middle_name' =>
                    $this->request->getPost('middle_name'),

                'last_name' =>
                    $this->request->getPost('last_name'),

                'gender' =>
                    $this->request->getPost('gender'),

                'date_of_birth' =>
                    $this->request->getPost('date_of_birth'),

                'class_id' =>
                    $classId,

                'combination_id' =>
                    $combinationId,

                'parent_name' =>
                    $this->request->getPost('parent_name'),

                'parent_phone' =>
                    $this->request->getPost('parent_phone'),

                'address' =>
                    $this->request->getPost('address')

            ];


            // Insert student
            $studentModel->insert($data);


            // Redirect after successful registration
            return redirect()
                ->to('/students')
                ->with(
                    'success',
                    'Student registered successfully.'
                );


        } catch (\Throwable $e) {

            echo "<h2>STUDENT SAVE ERROR</h2>";

            echo "<pre>";

            echo $e->getMessage();

            echo "</pre>";

        }
    }


    /**
     * Edit student
     */
    public function edit($id)
    {
        $studentModel = new StudentModel();
        $classModel = new ClassModel();
        $combinationModel = new CombinationModel();

        // Find student
        $student = $studentModel->find($id);

        if (!$student) {

            return redirect()
                ->to('/students');

        }


        // Send data to edit page
        $data['student'] = $student;

        $data['classes'] =
            $classModel->findAll();

        $data['combinations'] =
            $combinationModel->findAll();


        return view(
            'student_edit',
            $data
        );
    }


    /**
     * Update student
     */
    public function update($id)
    {
        try {

            $studentModel = new StudentModel();
            $classModel = new ClassModel();

            // Get class
            $classId =
                $this->request->getPost('class_id');

            // Find class
            $class =
                $classModel->find($classId);


            if (!$class) {

                return redirect()
                    ->back()
                    ->withInput()
                    ->with(
                        'error',
                        'Please select a valid class.'
                    );

            }


            // Default combination
            $combinationId = null;


            // A-Level requires combination
            if ($class['level'] === 'A-Level') {

                $combinationId =
                    $this->request->getPost('combination_id');


                if (empty($combinationId)) {

                    return redirect()
                        ->back()
                        ->withInput()
                        ->with(
                            'error',
                            'A-Level student must have a combination.'
                        );

                }

            }


            // Updated student data
            $data = [

                'admission_number' =>
                    $this->request->getPost('admission_number'),

                'first_name' =>
                    $this->request->getPost('first_name'),

                'middle_name' =>
                    $this->request->getPost('middle_name'),

                'last_name' =>
                    $this->request->getPost('last_name'),

                'gender' =>
                    $this->request->getPost('gender'),

                'date_of_birth' =>
                    $this->request->getPost('date_of_birth'),

                'class_id' =>
                    $classId,

                'combination_id' =>
                    $combinationId,

                'parent_name' =>
                    $this->request->getPost('parent_name'),

                'parent_phone' =>
                    $this->request->getPost('parent_phone'),

                'address' =>
                    $this->request->getPost('address')

            ];


            // Update student
            $studentModel->update(
                $id,
                $data
            );


            return redirect()
                ->to('/students')
                ->with(
                    'success',
                    'Student updated successfully.'
                );


        } catch (\Throwable $e) {

            echo "<h2>STUDENT UPDATE ERROR</h2>";

            echo "<pre>";

            echo $e->getMessage();

            echo "</pre>";

        }
    }


    /**
     * Delete student
     */
    public function delete($id)
    {
        try {

            $studentModel =
                new StudentModel();


            $studentModel->delete($id);


            return redirect()
                ->to('/students')
                ->with(
                    'success',
                    'Student deleted successfully.'
                );


        } catch (\Throwable $e) {

            echo "<h2>STUDENT DELETE ERROR</h2>";

            echo "<pre>";

            echo $e->getMessage();

            echo "</pre>";

        }
    }
}