<?php

namespace App\Controllers;

use App\Models\FeeModel;
use CodeIgniter\Controller;

class Fees extends Controller
{
    public function index()
    {
        $db = \Config\Database::connect();

        $fees = $db->table('fees')
            ->select('
                fees.id,
                fees.student_id,
                fees.academic_year_id,
                fees.amount,
                fees.payment_date,
                fees.payment_method,
                fees.reference_number,
                fees.received_by,
                fees.created_at,
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

        return view('fees', [
            'fees' => $fees
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
                students.last_name
            ')
            ->orderBy('students.first_name', 'ASC')
            ->get()
            ->getResultArray();

        $academicYears = $db->table('academic_years')
            ->select('id, year_name, status')
            ->orderBy('year_name', 'DESC')
            ->get()
            ->getResultArray();

        $users = $db->table('users')
            ->select('id, username, role')
            ->orderBy('username', 'ASC')
            ->get()
            ->getResultArray();

        return view('fee_add', [
            'students' => $students,
            'academicYears' => $academicYears,
            'users' => $users
        ]);
    }

    public function save()
    {
        try {
            $feeModel = new FeeModel();

            $studentId = $this->request->getPost('student_id');
            $academicYearId = $this->request->getPost('academic_year_id');
            $amount = $this->request->getPost('amount');
            $paymentDate = $this->request->getPost('payment_date');
            $paymentMethod = $this->request->getPost('payment_method');
            $referenceNumber = $this->request->getPost('reference_number');
            $receivedBy = $this->request->getPost('received_by');

            if (
                empty($studentId) ||
                empty($academicYearId) ||
                $amount === '' ||
                empty($paymentDate) ||
                empty($paymentMethod)
            ) {
                return redirect()
                    ->back()
                    ->withInput()
                    ->with(
                        'error',
                        'Please fill all required fields.'
                    );
            }

            if (!is_numeric($amount) || $amount <= 0) {
                return redirect()
                    ->back()
                    ->withInput()
                    ->with(
                        'error',
                        'Amount must be greater than zero.'
                    );
            }

            $db = \Config\Database::connect();

            $studentExists = $db->table('students')
                ->where('id', $studentId)
                ->countAllResults();

            if ($studentExists == 0) {
                return redirect()
                    ->back()
                    ->withInput()
                    ->with(
                        'error',
                        'Selected student does not exist.'
                    );
            }

            $academicYearExists = $db->table('academic_years')
                ->where('id', $academicYearId)
                ->countAllResults();

            if ($academicYearExists == 0) {
                return redirect()
                    ->back()
                    ->withInput()
                    ->with(
                        'error',
                        'Selected academic year does not exist.'
                    );
            }

            if (!empty($receivedBy)) {
                $userExists = $db->table('users')
                    ->where('id', $receivedBy)
                    ->countAllResults();

                if ($userExists == 0) {
                    return redirect()
                        ->back()
                        ->withInput()
                        ->with(
                            'error',
                            'Selected user does not exist.'
                        );
                }
            } else {
                $receivedBy = null;
            }

            $feeModel->insert([
                'student_id' => $studentId,
                'academic_year_id' => $academicYearId,
                'amount' => $amount,
                'payment_date' => $paymentDate,
                'payment_method' => $paymentMethod,
                'reference_number' => $referenceNumber,
                'received_by' => $receivedBy
            ]);

            return redirect()
                ->to('/fees')
                ->with(
                    'success',
                    'Fee payment recorded successfully.'
                );

        } catch (\Throwable $e) {
            echo '<h2>FEE SAVE ERROR</h2>';
            echo '<pre>';
            echo $e->getMessage();
            echo '</pre>';
        }
    }

    public function edit($id)
    {
        $feeModel = new FeeModel();

        $fee = $feeModel->find($id);

        if (!$fee) {
            return redirect()
                ->to('/fees')
                ->with(
                    'error',
                    'Fee payment record not found.'
                );
        }

        $db = \Config\Database::connect();

        $students = $db->table('students')
            ->select('
                students.id,
                students.admission_number,
                students.first_name,
                students.middle_name,
                students.last_name
            ')
            ->orderBy('students.first_name', 'ASC')
            ->get()
            ->getResultArray();

        $academicYears = $db->table('academic_years')
            ->select('id, year_name, status')
            ->orderBy('year_name', 'DESC')
            ->get()
            ->getResultArray();

        $users = $db->table('users')
            ->select('id, username, role')
            ->orderBy('username', 'ASC')
            ->get()
            ->getResultArray();

        return view('fee_edit', [
            'fee' => $fee,
            'students' => $students,
            'academicYears' => $academicYears,
            'users' => $users
        ]);
    }

    public function update($id)
    {
        try {
            $feeModel = new FeeModel();

            $fee = $feeModel->find($id);

            if (!$fee) {
                return redirect()
                    ->to('/fees')
                    ->with(
                        'error',
                        'Fee payment record not found.'
                    );
            }

            $studentId = $this->request->getPost('student_id');
            $academicYearId = $this->request->getPost('academic_year_id');
            $amount = $this->request->getPost('amount');
            $paymentDate = $this->request->getPost('payment_date');
            $paymentMethod = $this->request->getPost('payment_method');
            $referenceNumber = $this->request->getPost('reference_number');
            $receivedBy = $this->request->getPost('received_by');

            if (
                empty($studentId) ||
                empty($academicYearId) ||
                $amount === '' ||
                empty($paymentDate) ||
                empty($paymentMethod)
            ) {
                return redirect()
                    ->back()
                    ->withInput()
                    ->with(
                        'error',
                        'Please fill all required fields.'
                    );
            }

            if (!is_numeric($amount) || $amount <= 0) {
                return redirect()
                    ->back()
                    ->withInput()
                    ->with(
                        'error',
                        'Amount must be greater than zero.'
                    );
            }

            $db = \Config\Database::connect();

            $studentExists = $db->table('students')
                ->where('id', $studentId)
                ->countAllResults();

            if ($studentExists == 0) {
                return redirect()
                    ->back()
                    ->withInput()
                    ->with(
                        'error',
                        'Selected student does not exist.'
                    );
            }

            $academicYearExists = $db->table('academic_years')
                ->where('id', $academicYearId)
                ->countAllResults();

            if ($academicYearExists == 0) {
                return redirect()
                    ->back()
                    ->withInput()
                    ->with(
                        'error',
                        'Selected academic year does not exist.'
                    );
            }

            if (!empty($receivedBy)) {
                $userExists = $db->table('users')
                    ->where('id', $receivedBy)
                    ->countAllResults();

                if ($userExists == 0) {
                    return redirect()
                        ->back()
                        ->withInput()
                        ->with(
                            'error',
                            'Selected user does not exist.'
                        );
                }
            } else {
                $receivedBy = null;
            }

            $feeModel->update($id, [
                'student_id' => $studentId,
                'academic_year_id' => $academicYearId,
                'amount' => $amount,
                'payment_date' => $paymentDate,
                'payment_method' => $paymentMethod,
                'reference_number' => $referenceNumber,
                'received_by' => $receivedBy
            ]);

            return redirect()
                ->to('/fees')
                ->with(
                    'success',
                    'Fee payment updated successfully.'
                );

        } catch (\Throwable $e) {
            echo '<h2>FEE UPDATE ERROR</h2>';
            echo '<pre>';
            echo $e->getMessage();
            echo '</pre>';
        }
    }

    public function delete($id)
    {
        try {
            $feeModel = new FeeModel();

            $fee = $feeModel->find($id);

            if (!$fee) {
                return redirect()
                    ->to('/fees')
                    ->with(
                        'error',
                        'Fee payment record not found.'
                    );
            }

            $feeModel->delete($id);

            return redirect()
                ->to('/fees')
                ->with(
                    'success',
                    'Fee payment deleted successfully.'
                );

        } catch (\Throwable $e) {
            echo '<h2>FEE DELETE ERROR</h2>';
            echo '<pre>';
            echo $e->getMessage();
            echo '</pre>';
        }
    }
}
