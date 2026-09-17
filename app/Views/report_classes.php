<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

```
<title>Class Report - Anne Marie Academy</title>

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
        font-size: 28px;
    }

    .header p {
        margin: 0;
        font-size: 16px;
    }

    .container {
        width: 95%;
        max-width: 1100px;
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
        padding: 11px 18px;
        text-decoration: none;
        border-radius: 6px;
        color: white;
        border: none;
        cursor: pointer;
        font-size: 14px;
    }

    .back {
        background: #555;
    }

    .print {
        background: #198754;
    }

    .summary-container {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 20px;
        margin-bottom: 25px;
    }

    .summary-card {
        background: white;
        padding: 22px;
        border-radius: 10px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.08);
    }

    .summary-card h3 {
        margin: 0 0 10px;
        color: #555;
        font-size: 16px;
    }

    .summary-card strong {
        font-size: 28px;
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
    }

    th {
        background: #123c69;
        color: white;
        padding: 13px;
        text-align: left;
    }

    td {
        padding: 13px;
        border-bottom: 1px solid #ddd;
    }

    tr:hover {
        background: #f5f8fc;
    }

    .student-count {
        font-weight: bold;
        color: #123c69;
    }

    .empty {
        text-align: center;
        padding: 35px;
        color: #777;
        font-size: 16px;
    }

    @media (max-width: 700px) {
        .summary-container {
            grid-template-columns: 1fr;
        }

        .container {
            width: 92%;
        }

        table {
            min-width: 600px;
        }
    }

    @media print {
        .top-bar {
            display: none;
        }

        body {
            background: white;
        }

        .table-container,
        .summary-card {
            box-shadow: none;
        }
    }
</style>
```

</head>

<body>

<div class="header">
    <h1>Anne Marie Academy</h1>
    <p>Class Report</p>
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

<div class="summary-container">

    <div class="summary-card">

        <h3>Total Classes</h3>

        <strong>
            <?= count($classes ?? []) ?>
        </strong>

    </div>

    <div class="summary-card">

        <h3>Total Students</h3>

        <strong>
            <?php
            $totalStudents = 0;

            foreach ($classes ?? [] as $class) {
                $totalStudents += (int)($class['student_count'] ?? 0);
            }

            echo $totalStudents;
            ?>
        </strong>

    </div>

</div>

<div class="table-container">

    <?php if (empty($classes)): ?>

        <div class="empty">
            No classes found.
        </div>

    <?php else: ?>

        <table>

            <thead>

                <tr>
                    <th>No.</th>
                    <th>Class Name</th>
                    <th>Level</th>
                    <th>Number of Students</th>
                </tr>

            </thead>

            <tbody>

                <?php $number = 1; ?>

                <?php foreach ($classes as $class): ?>

                    <tr>

                        <td>
                            <?= $number++ ?>
                        </td>

                        <td>
                            <?= esc($class['class_name'] ?? '') ?>
                        </td>

                        <td>
                            <?= esc($class['level'] ?? '') ?>
                        </td>

                        <td class="student-count">
                            <?= esc($class['student_count'] ?? 0) ?>
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
