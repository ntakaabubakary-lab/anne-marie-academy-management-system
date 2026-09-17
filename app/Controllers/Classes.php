<?php

namespace App\Controllers;

use App\Models\ClassModel;

class Classes extends BaseController
{
    public function index()
    {
        $classModel = new ClassModel();

        $data['classes'] = $classModel->findAll();

        return view('classes', $data);
    }

    public function add()
    {
        return view('class_add');
    }

    public function save()
    {
        try {

            $classModel = new ClassModel();

            $data = [
                'class_name' => $this->request->getPost('class_name'),
                'level'      => $this->request->getPost('level')
            ];

            $classModel->insert($data);

            return redirect()->to('/classes');

        } catch (\Throwable $e) {

            echo "<h2>CLASS SAVE ERROR</h2>";

            echo "<pre>";
            echo $e->getMessage();
            echo "</pre>";
        }
    }

    public function edit($id)
    {
        $classModel = new ClassModel();

        $class = $classModel->find($id);

        if (!$class) {
            return redirect()->to('/classes');
        }

        return view('class_edit', [
            'class' => $class
        ]);
    }

    public function update($id)
    {
        try {

            $classModel = new ClassModel();

            $data = [
                'class_name' => $this->request->getPost('class_name'),
                'level'      => $this->request->getPost('level')
            ];

            $classModel->update($id, $data);

            return redirect()->to('/classes');

        } catch (\Throwable $e) {

            echo "<h2>CLASS UPDATE ERROR</h2>";

            echo "<pre>";
            echo $e->getMessage();
            echo "</pre>";
        }
    }

    public function delete($id)
    {
        try {

            $classModel = new ClassModel();

            $classModel->delete($id);

            return redirect()->to('/classes');

        } catch (\Throwable $e) {

            echo "<h2>CLASS DELETE ERROR</h2>";

            echo "<pre>";
            echo $e->getMessage();
            echo "</pre>";
        }
    }
}