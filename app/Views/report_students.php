<!DOCTYPE html>

<html lang="en">

<head>

```
<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Student Report - Anne Marie Academy</title>

<style>

    * {
        box-sizing: border-box;
    }

    body {
        margin: 0;
        font-family: Arial, sans-serif;
        background: #f4f7fb;
        color: #333;
    }

    .container {
        width: 95%;
        max-width: 1400px;
        margin: 30px auto;
    }

    .header {
        background: #1f3c88;
        color: white;
        padding: 25px;
        border-radius: 15px;
        margin-bottom: 25px;
    }

    .header h1 {
        margin: 0 0 8px;
    }

    .header p {
        margin: 0;
        opacity: 0.9;
    }

    .buttons {
        margin-top: 18px;
        display: flex;
        gap: 10px;
    }

    .buttons a,
    .buttons button {
        text-decoration: none;
        border: none;
        padding: 10px 18px;
        border-radius: 8px;
        font-weight: bold;
        cursor: pointer;
        background: white;
        color: #1f3c88;
    }

    .table-card {
        background: white;
        padding: 20px;
        border-radius: 15px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.07);
        overflow-x: auto;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        min-width: 1000px;
    }

    th {
        background: #1f3c88;
        color: white;
        padding: 13px;
        text-align: left;
    }

    td {
        padding: 12px;
        border-bottom: 1px solid #e5e7eb;
    }

    tr:hover {
        background: #f8fafc;
    }

    .summary {
        background: white;
        padding: 18px;
        border-radius: 12px;
        margin-bottom: 20px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.06);
    }

    .summary strong {
        color: #1f3c88;
    }

    .empty {
        text-align: center;
        padding: 30px;
        color: #777;
    }

    @media print {

        .buttons {
            display: none;
        }

        .header {
            color: black;
            background: white;
            border: 1px solid #ddd;
        }

        .table-card {
            box-shadow: none;
        }

    }

</style>
```

</head>

<body>

<div class="container">

```
<div class="header">

    <h1>
        Student Report
    </h1>

    <p>
        Anne Marie Academy Management System
    </p>

    <div class="buttons">

        <a href="<?= site_url('reports') ?>">
            Back to Reports
        </a>

        <button type="button" onclick="window.print()">
            Print Report
        </button>

    </div>

</div>


<div class="summary">

    <strong>Total Students:</strong>
    <?= count($students) ?>

</div>


<div class="table-card">

    <?php if (!empty($students)): ?>

        <table>

            <thead>

                <tr>

                    <th>No.</th>

                    <th>Admission Number</th>

                    <th>Student Name</th>

                    <th>Gender</th>

                    <th>Date of Birth</th>

                    <th>Class</th>

                    <th>Level</th>

                    <th>Combination</th>

                    <th>Parent Name</th>

                    <th>Parent Phone</th>

                    <th>Address</th>

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
                            <?= esc($student['admission_number']) ?>
                        </td>

                        <td>

                            <?= esc($student['first_name']) ?>

                            <?php if (!empty($student['middle_name'])): ?>

                                <?= ' ' . esc($student['middle_name']) ?>

                            <?php endif; ?>

                            <?php if (!empty($student['last_name'])): ?>

                                <?= ' ' . esc($student['last_name']) ?>

                            <?php endif; ?>

                        </td>

                        <td>
                            <?= esc($student['gender']) ?>
                        </td>

                        <td>
                            <?= esc($student['date_of_birth']) ?>
                        </td>

                        <td>
                            <?= esc($student['class_name'] ?? '—') ?>
                        </td>

                        <td>
                            <?= esc($student['level'] ?? '—') ?>
                        </td>

                        <td>

                            <?php if (!empty($student['combination_code'])): ?>

                                <?= esc($student['combination_code']) ?>

                                <?php if (!empty($student['combination_name'])): ?>

                                    - <?= esc($student['combination_name']) ?>

                                <?php endif; ?>

                            <?php else: ?>

                                —

                            <?php endif; ?>

                        </td>

                        <td>
                            <?= esc($student['parent_name'] ?? '—') ?>
                        </td>

                        <td>
                            <?= esc($student['parent_phone'] ?? '—') ?>
                        </td>

                        <td>
                            <?= esc($student['address'] ?? '—') ?>
                        </td>

                    </tr>

                <?php endforeach; ?>

            </tbody>

        </table>

    <?php else: ?>

        <div class="empty">

            No students registered yet.

        </div>

    <?php endif; ?>

</div>
```

</div>

</body>

</html>
