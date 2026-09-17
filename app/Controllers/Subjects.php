<?php

namespace App\Controllers;

use App\Models\StudentModel;
use App\Models\ClassModel;
use App\Models\CombinationModel;

class Students extends BaseController
{
    public function index()
    {
        $studentModel = new StudentModel();

        $data['students'] = $studentModel
            ->select('students.*, classes.class_name, classes.level')
            ->join('classes', 'classes.id = students.class_id')
            ->findAll();

        return view('students', $data);
    }


    public function add()
    {
        $classModel       = new ClassModel();
        $combinationModel = new CombinationModel();

        $data['classes'] = $classModel->findAll();

        // Get all combinations from database
        $data['combinations'] = $combinationModel
            ->orderBy('combination_code', 'ASC')
            ->findAll();

        return view('student_add', $data);
    }


    public function save()
    {
        try {

            $studentModel    = new StudentModel();
            $classModel      = new ClassModel();
            $combinationModel = new CombinationModel();

            $classId = $this->request->getPost('class_id');

            // Check selected class
            $class = $classModel->find($classId);

            if (!$class) {

                return redirect()->back()
                    ->withInput()
                    ->with('error', 'Please select a valid class.');
            }


            /*
             * O-Level does not require combination.
             * A-Level requires a valid combination.
             */

            $combinationId = null;


            if ($class['level'] === 'A-Level') {

                $combinationId = $this->request->getPost('combination_id');

                // Combination is required
                if (empty($combinationId)) {

                    return redirect()->back()
                        ->withInput()
                        ->with('error', 'A-Level student must have a combination.');
                }


                // Check if combination exists
                $combination = $combinationModel->find($combinationId);

                if (!$combination) {

                    return redirect()->back()
                        ->withInput()
                        ->with('error', 'Please select a valid combination.');
                }
            }


            $data = [

                'admission_number' => $this->request->getPost('admission_number'),

                'first_name' => $this->request->getPost('first_name'),

                'middle_name' => $this->request->getPost('middle_name'),

                'last_name' => $this->request->getPost('last_name'),

                'gender' => $this->request->getPost('gender'),

                'date_of_birth' => $this->request->getPost('date_of_birth'),

                'class_id' => $classId,

                'combination_id' => $combinationId,

                'parent_name' => $this->request->getPost('parent_name'),

                'parent_phone' => $this->request->getPost('parent_phone'),

                'address' => $this->request->getPost('address')
            ];


            $studentModel->insert($data);


            return redirect()->to('/students')
                ->with('success', 'Student registered successfully.');


        } catch (\Throwable $e) {

            echo "<h2>STUDENT SAVE ERROR</h2>";

            echo "<pre>";
            echo $e->getMessage();
            echo "</pre>";
        }
    }


    public function edit($id)
    {
        $studentModel    = new StudentModel();
        $classModel      = new ClassModel();
        $combinationModel = new CombinationModel();

        $student = $studentModel->find($id);

        if (!$student) {

            return redirect()->to('/students');
        }


        $data['student'] = $student;

        $data['classes'] = $classModel->findAll();

        // Get combinations for edit form
        $data['combinations'] = $combinationModel
            ->orderBy('combination_code', 'ASC')
            ->findAll();


        return view('student_edit', $data);
    }


    public function update($id)
    {
        try {

            $studentModel     = new StudentModel();
            $classModel       = new ClassModel();
            $combinationModel = new CombinationModel();

            $classId = $this->request->getPost('class_id');

            // Check selected class
            $class = $classModel->find($classId);

            if (!$class) {

                return redirect()->back()
                    ->withInput()
                    ->with('error', 'Please select a valid class.');
            }


            $combinationId = null;


            /*
             * A-Level requires combination.
             */

            if ($class['level'] === 'A-Level') {

                $combinationId = $this->request->getPost('combination_id');


                if (empty($combinationId)) {

                    return redirect()->back()
                        ->withInput()
                        ->with('error', 'A-Level student must have a combination.');
                }


                // Check if combination exists
                $combination = $combinationModel->find($combinationId);

                if (!$combination) {

                    return redirect()->back()
                        ->withInput()
                        ->with('error', 'Please select a valid combination.');
                }
            }


            $data = [

                'admission_number' => $this->request->getPost('admission_number'),

                'first_name' => $this->request->getPost('first_name'),

                'middle_name' => $this->request->getPost('middle_name'),

                'last_name' => $this->request->getPost('last_name'),

                'gender' => $this->request->getPost('gender'),

                'date_of_birth' => $this->request->getPost('date_of_birth'),

                'class_id' => $classId,

                'combination_id' => $combinationId,

                'parent_name' => $this->request->getPost('parent_name'),

                'parent_phone' => $this->request->getPost('parent_phone'),

                'address' => $this->request->getPost('address')
            ];


            $studentModel->update($id, $data);


            return redirect()->to('/students')
                ->with('success', 'Student updated successfully.');


        } catch (\Throwable $e) {

            echo "<h2>STUDENT UPDATE ERROR</h2>";

            echo "<pre>";
            echo $e->getMessage();
            echo "</pre>";
        }
    }


    public function delete($id)
    {
        try {

            $studentModel = new StudentModel();

            $studentModel->delete($id);

            return redirect()->to('/students')
                ->with('success', 'Student deleted successfully.');


        } catch (\Throwable $e) {

            echo "<h2>STUDENT DELETE ERROR</h2>";

            echo "<pre>";
            echo $e->getMessage();
            echo "</pre>";
        }
    }
}