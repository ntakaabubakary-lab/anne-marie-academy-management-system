<?php

namespace App\Controllers;

use App\Models\TeacherModel;

class Teachers extends BaseController
{
    public function index()
    {
        $teacherModel = new TeacherModel();

        $data['teachers'] = $teacherModel->findAll();

        return view('teachers', $data);
    }

    public function add()
    {
        return view('teacher_add');
    }

    public function save()
    {
        try {

            $teacherModel = new TeacherModel();

            $data = [
                'teacher_number' => $this->request->getPost('teacher_number'),
                'first_name'     => $this->request->getPost('first_name'),
                'middle_name'    => $this->request->getPost('middle_name'),
                'last_name'     => $this->request->getPost('last_name'),
                'gender'         => $this->request->getPost('gender'),
                'phone'          => $this->request->getPost('phone'),
                'email'          => $this->request->getPost('email'),
                'qualification' => $this->request->getPost('qualification'),
                'address'       => $this->request->getPost('address')
            ];

            $teacherModel->insert($data);

            return redirect()->to('/teachers');

        } catch (\Throwable $e) {

            echo "<h2>TEACHER SAVE ERROR</h2>";

            echo "<pre>";
            echo $e->getMessage();
            echo "</pre>";
        }
    }

    public function edit($id)
    {
        $teacherModel = new TeacherModel();

        $teacher = $teacherModel->find($id);

        if (!$teacher) {
            return redirect()->to('/teachers');
        }

        return view('teacher_edit', [
            'teacher' => $teacher
        ]);
    }

    public function update($id)
    {
        try {

            $teacherModel = new TeacherModel();

            $data = [
                'teacher_number' => $this->request->getPost('teacher_number'),
                'first_name'     => $this->request->getPost('first_name'),
                'middle_name'    => $this->request->getPost('middle_name'),
                'last_name'     => $this->request->getPost('last_name'),
                'gender'         => $this->request->getPost('gender'),
                'phone'          => $this->request->getPost('phone'),
                'email'          => $this->request->getPost('email'),
                'qualification' => $this->request->getPost('qualification'),
                'address'       => $this->request->getPost('address')
            ];

            $teacherModel->update($id, $data);

            return redirect()->to('/teachers');

        } catch (\Throwable $e) {

            echo "<h2>TEACHER UPDATE ERROR</h2>";

            echo "<pre>";
            echo $e->getMessage();
            echo "</pre>";
        }
    }

    public function delete($id)
    {
        try {

            $teacherModel = new TeacherModel();

            $teacherModel->delete($id);

            return redirect()->to('/teachers');

        } catch (\Throwable $e) {

            echo "<h2>TEACHER DELETE ERROR</h2>";

            echo "<pre>";
            echo $e->getMessage();
            echo "</pre>";
        }
    }
}