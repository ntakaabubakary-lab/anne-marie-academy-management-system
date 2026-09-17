<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

```
<title>Results Report - Anne Marie Academy</title>

<style>
    * {
        box-sizing: border-box;
    }

    body {
        margin: 0;
        font-family: Arial, sans-serif;
        background: #f4f7fb;
        color: #222;
    }

    .header {
        background: #123c69;
        color: white;
        padding: 25px;
        text-align: center;
    }

    .header h1 {
        margin: 0 0 8px;
    }

    .container {
        width: 95%;
        max-width: 1500px;
        margin: 25px auto;
    }

    .top-bar {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 10px;
        margin-bottom: 20px;
        flex-wrap: wrap;
    }

    .btn {
        display: inline-block;
        padding: 10px 16px;
        text-decoration: none;
        border-radius: 6px;
        color: white;
        border: none;
        cursor: pointer;
    }

    .back {
        background: #555;
    }

    .print {
        background: #198754;
    }

    .summary {
        background: white;
        padding: 20px;
        border-radius: 10px;
        margin-bottom: 20px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.08);
    }

    .summary strong {
        font-size: 24px;
        color: #123c69;
    }

    .table-container {
        background: white;
        padding: 20px;
        border-radius: 10px;
        overflow-x: auto;
        box-shadow: 0 2px 8px rgba(0,0,0,0.08);
    }

    table {
        width: 100%;
        border-collapse: collapse;
        min-width: 1100px;
    }

    th {
        background: #123c69;
        color: white;
        padding: 12px;
        text-align: left;
    }

    td {
        padding: 11px;
        border-bottom: 1px solid #ddd;
    }

    tr:hover {
        background: #f5f8fc;
    }

    .grade-a {
        color: #198754;
        font-weight: bold;
    }

    .grade-b {
        color: #0d6efd;
        font-weight: bold;
    }

    .grade-c {
        color: #fd7e14;
        font-weight: bold;
    }

    .grade-d,
    .grade-f {
        color: #dc3545;
        font-weight: bold;
    }

    .empty {
        text-align: center;
        padding: 30px;
        color: #777;
    }

    @media print {
        .top-bar {
            display: none;
        }

        body {
            background: white;
        }

        .table-container,
        .summary {
            box-shadow: none;
        }
    }
</style>
```

</head>

<body>

<div class="header">
    <h1>Anne Marie Academy</h1>
    <p>Results Report</p>
</div>

<div class="container">

```
<div class="top-bar">

    <a href="<?= site_url('reports') ?>" class="btn back">
        Back to Reports
    </a>

    <button onclick="window.print()" class="btn print">
        Print Report
    </button>

</div>

<div class="summary">

    <div>Total Result Records</div>

    <strong><?= count($results ?? []) ?></strong>

</div>

<div class="table-container">

    <?php if (empty($results)): ?>

        <div class="empty">
            No results entered yet.
        </div>

    <?php else: ?>

        <table>

            <thead>

                <tr>
                    <th>No.</th>
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

                    $marks = (float)($result['marks'] ?? 0);

                    if ($marks >= 75) {
                        $grade = 'A';
                        $gradeClass = 'grade-a';
                    } elseif ($marks >= 65) {
                        $grade = 'B';
                        $gradeClass = 'grade-b';
                    } elseif ($marks >= 45) {
                        $grade = 'C';
                        $gradeClass = 'grade-c';
                    } elseif ($marks >= 30) {
                        $grade = 'D';
                        $gradeClass = 'grade-d';
                    } else {
                        $grade = 'F';
                        $gradeClass = 'grade-f';
                    }

                    $studentName = trim(
                        ($result['first_name'] ?? '') . ' ' .
                        ($result['middle_name'] ?? '') . ' ' .
                        ($result['last_name'] ?? '')
                    );

                    ?>

                    <tr>

                        <td><?= $number++ ?></td>

                        <td><?= esc($result['admission_number'] ?? '') ?></td>

                        <td><?= esc($studentName) ?></td>

                        <td><?= esc($result['subject_code'] ?? '') ?></td>

                        <td><?= esc($result['subject_name'] ?? '') ?></td>

                        <td><?= esc($result['exam_name'] ?? '') ?></td>

                        <td><?= esc($result['exam_type'] ?? '') ?></td>

                        <td><?= esc($result['year_name'] ?? '') ?></td>

                        <td><?= esc($marks) ?></td>

                        <td class="<?= $gradeClass ?>">
                            <?= $grade ?>
                        </td>

                    </tr>

                <?php endforeach; ?>

            </tbody>

        </table>

    <?php endif; ?>

</div>
```

</div>

</body>
</html>
