<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Results Management - Anne Marie Academy</title>

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
            min-width: 1100px;
        }

        thead {
            background: #1e3a5f;
            color: white;
        }

        th {
            padding: 14px 12px;
            text-align: left;
            white-space: nowrap;
        }

        td {
            padding: 13px 12px;
            border-bottom: 1px solid #e5e5e5;
            white-space: nowrap;
        }

        tbody tr:hover {
            background: #f5f9ff;
        }

        .exam-badge {
            background: #e8f4ff;
            color: #1e3a5f;
            padding: 6px 9px;
            border-radius: 5px;
            font-weight: bold;
            display: inline-block;
        }

        .marks {
            font-weight: bold;
            font-size: 16px;
        }

        .grade {
            padding: 6px 10px;
            border-radius: 5px;
            font-weight: bold;
            display: inline-block;
        }

        .empty {
            text-align: center;
            padding: 50px;
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

    <a href="<?= site_url('dashboard') ?>">
        Dashboard
    </a>

</div>


<!-- MAIN CONTENT -->

<div class="container">


    <!-- TOP SECTION -->

    <div class="top-section">

        <h2>
            Results Management
        </h2>

        <a
            href="<?= site_url('results/add') ?>"
            class="add-button"
        >
            + Enter Student Result
        </a>

    </div>


    <!-- SUCCESS MESSAGE -->

    <?php if (session()->getFlashdata('success')): ?>

        <div class="success">

            <?= esc(
                session()->getFlashdata('success')
            ) ?>

        </div>

    <?php endif; ?>


    <!-- ERROR MESSAGE -->

    <?php if (session()->getFlashdata('error')): ?>

        <div class="error">

            <?= esc(
                session()->getFlashdata('error')
            ) ?>

        </div>

    <?php endif; ?>


    <!-- RESULTS TABLE -->

    <div class="table-card">

        <?php if (!empty($results)): ?>

            <table>

                <thead>

                    <tr>

                        <th>#</th>

                        <th>Admission Number</th>

                        <th>Student Name</th>

                        <th>Subject Code</th>

                        <th>Subject</th>

                        <th>Exam</th>

                        <th>Exam Type</th>

                        <th>Academic Year</th>

                        <th>Marks</th>

                        <th>Grade</th>

                    </tr>

                </thead>


                <tbody>

                    <?php $number = 1; ?>


                    <?php foreach ($results as $result): ?>

                        <?php

                        $marks = (float) $result['marks'];

                        if ($marks >= 75) {
                            $grade = 'A';
                        } elseif ($marks >= 65) {
                            $grade = 'B';
                        } elseif ($marks >= 45) {
                            $grade = 'C';
                        } elseif ($marks >= 30) {
                            $grade = 'D';
                        } else {
                            $grade = 'F';
                        }

                        ?>


                        <tr>

                            <td>
                                <?= $number++ ?>
                            </td>


                            <td>

                                <strong>
                                    <?= esc(
                                        $result['admission_number']
                                        ?? ''
                                    ) ?>
                                </strong>

                            </td>


                            <td>

                                <?= esc(
                                    trim(
                                        ($result['first_name'] ?? '') .
                                        ' ' .
                                        ($result['middle_name'] ?? '') .
                                        ' ' .
                                        ($result['last_name'] ?? '')
                                    )
                                ) ?>

                            </td>


                            <td>

                                <?= esc(
                                    $result['subject_code']
                                    ?? ''
                                ) ?>

                            </td>


                            <td>

                                <?= esc(
                                    $result['subject_name']
                                    ?? ''
                                ) ?>

                            </td>


                            <td>

                                <?= esc(
                                    $result['exam_name']
                                    ?? ''
                                ) ?>

                            </td>


                            <td>

                                <span class="exam-badge">

                                    <?= esc(
                                        $result['exam_type']
                                        ?? ''
                                    ) ?>

                                </span>

                            </td>


                            <td>

                                <?= esc(
                                    $result['year_name']
                                    ?? 'N/A'
                                ) ?>

                            </td>


                            <td>

                                <span class="marks">

                                    <?= esc(
                                        $result['marks']
                                    ) ?>

                                </span>

                            </td>


                            <td>

                                <span class="grade">

                                    <?= $grade ?>

                                </span>

                            </td>

                        </tr>


                    <?php endforeach; ?>


                </tbody>

            </table>


        <?php else: ?>


            <div class="empty">

                <p>
                    No student results entered yet.
                </p>

                <br>

                <a
                    href="<?= site_url('results/add') ?>"
                    class="add-button"
                >
                    Enter First Result
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