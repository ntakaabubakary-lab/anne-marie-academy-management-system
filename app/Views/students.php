<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Student Management - Anne Marie Academy</title>

    <style>

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f4f7fb;
            color: #333;
        }

        .header {
            background: #1e3a5f;
            color: white;
            padding: 20px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header h1 {
            font-size: 25px;
        }

        .header a {
            text-decoration: none;
            color: white;
            background: #3498db;
            padding: 10px 18px;
            border-radius: 6px;
            font-weight: bold;
        }

        .header a:hover {
            background: #2980b9;
        }

        .container {
            width: 96%;
            margin: 30px auto;
        }

        .top-section {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            gap: 15px;
            flex-wrap: wrap;
        }

        .top-section h2 {
            color: #1e3a5f;
        }

        .add-button {
            background: #27ae60;
            color: white;
            text-decoration: none;
            padding: 12px 20px;
            border-radius: 6px;
            font-weight: bold;
        }

        .add-button:hover {
            background: #219150;
        }

        .success {
            background: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
            padding: 13px 18px;
            border-radius: 6px;
            margin-bottom: 20px;
        }

        .error {
            background: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
            padding: 13px 18px;
            border-radius: 6px;
            margin-bottom: 20px;
        }

        .table-card {
            background: white;
            border-radius: 10px;
            box-shadow: 0 3px 12px rgba(0, 0, 0, 0.08);
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 1300px;
        }

        thead {
            background: #1e3a5f;
            color: white;
        }

        th {
            padding: 14px 12px;
            text-align: left;
            font-size: 14px;
            white-space: nowrap;
        }

        td {
            padding: 13px 12px;
            border-bottom: 1px solid #e5e5e5;
            font-size: 14px;
            white-space: nowrap;
        }

        tbody tr:hover {
            background: #f5f9ff;
        }

        .combination {
            background: #e8f4ff;
            color: #1e3a5f;
            padding: 6px 9px;
            border-radius: 5px;
            font-weight: bold;
            display: inline-block;
        }

        .no-combination {
            color: #888;
        }

        .edit-btn {
            background: #f39c12;
            color: white;
            text-decoration: none;
            padding: 7px 12px;
            border-radius: 5px;
            margin-right: 5px;
            display: inline-block;
        }

        .edit-btn:hover {
            background: #d68910;
        }

        .delete-btn {
            background: #e74c3c;
            color: white;
            text-decoration: none;
            padding: 7px 12px;
            border-radius: 5px;
            display: inline-block;
        }

        .delete-btn:hover {
            background: #c0392b;
        }

        .empty {
            text-align: center;
            padding: 40px;
            color: #777;
            font-size: 17px;
        }

        .footer {
            text-align: center;
            padding: 25px;
            color: #777;
            font-size: 14px;
        }

    </style>

</head>


<body>


<!-- HEADER -->

<div class="header">

    <h1>
        Anne Marie Academy
    </h1>

    <!-- DASHBOARD LINK -->

    <a href="<?= site_url('dashboard') ?>">
        Dashboard
    </a>

</div>


<!-- MAIN CONTENT -->

<div class="container">


    <div class="top-section">

        <h2>
            Student Management
        </h2>

        <a
            href="<?= site_url('students/add') ?>"
            class="add-button"
        >
            + Register New Student
        </a>

    </div>


    <!-- SUCCESS MESSAGE -->

    <?php if (session()->getFlashdata('success')): ?>

        <div class="success">

            <?= esc(session()->getFlashdata('success')) ?>

        </div>

    <?php endif; ?>


    <!-- ERROR MESSAGE -->

    <?php if (session()->getFlashdata('error')): ?>

        <div class="error">

            <?= esc(session()->getFlashdata('error')) ?>

        </div>

    <?php endif; ?>


    <!-- STUDENTS TABLE -->

    <div class="table-card">

        <?php if (!empty($students)): ?>

            <table>

                <thead>

                    <tr>

                        <th>#</th>

                        <th>Admission Number</th>

                        <th>Full Name</th>

                        <th>Gender</th>

                        <th>Date of Birth</th>

                        <th>Class</th>

                        <th>Level</th>

                        <th>Combination</th>

                        <th>Parent Name</th>

                        <th>Parent Phone</th>

                        <th>Address</th>

                        <th>Action</th>

                    </tr>

                </thead>


                <tbody>

                    <?php $number = 1; ?>

                    <?php foreach ($students as $student): ?>

                        <tr>

                            <td>
                                <?= $number++ ?>
                            </td>


                            <td>

                                <strong>
                                    <?= esc($student['admission_number'] ?? '') ?>
                                </strong>

                            </td>


                            <td>

                                <?= esc(
                                    trim(
                                        ($student['first_name'] ?? '') . ' ' .
                                        ($student['middle_name'] ?? '') . ' ' .
                                        ($student['last_name'] ?? '')
                                    )
                                ) ?>

                            </td>


                            <td>
                                <?= esc($student['gender'] ?? '') ?>
                            </td>


                            <td>
                                <?= esc($student['date_of_birth'] ?? '') ?>
                            </td>


                            <td>
                                <?= esc($student['class_name'] ?? 'N/A') ?>
                            </td>


                            <td>
                                <?= esc($student['level'] ?? 'N/A') ?>
                            </td>


                            <td>

                                <?php if (!empty($student['combination_code'])): ?>

                                    <span class="combination">

                                        <?= esc($student['combination_code']) ?>

                                    </span>

                                    <?php if (!empty($student['combination_name'])): ?>

                                        <br>

                                        <small>
                                            <?= esc($student['combination_name']) ?>
                                        </small>

                                    <?php endif; ?>

                                <?php else: ?>

                                    <span class="no-combination">
                                        N/A
                                    </span>

                                <?php endif; ?>

                            </td>


                            <td>
                                <?= esc($student['parent_name'] ?? '') ?>
                            </td>


                            <td>
                                <?= esc($student['parent_phone'] ?? '') ?>
                            </td>


                            <td>
                                <?= esc($student['address'] ?? '') ?>
                            </td>


                            <td>

                                <a
                                    href="<?= site_url('students/edit/' . $student['id']) ?>"
                                    class="edit-btn"
                                >
                                    Edit
                                </a>


                                <a
                                    href="<?= site_url('students/delete/' . $student['id']) ?>"
                                    class="delete-btn"
                                    onclick="return confirm('Are you sure you want to delete this student?');"
                                >
                                    Delete
                                </a>

                            </td>

                        </tr>

                    <?php endforeach; ?>

                </tbody>

            </table>


        <?php else: ?>

            <div class="empty">

                <p>
                    No students registered yet.
                </p>

                <br>

                <a
                    href="<?= site_url('students/add') ?>"
                    class="add-button"
                >
                    Register First Student
                </a>

            </div>

        <?php endif; ?>

    </div>


</div>


<!-- FOOTER -->

<div class="footer">

    Anne Marie Academy Management System

</div>


</body>

</html>