<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

```
<title>Attendance Report - Anne Marie Academy</title>

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
        max-width: 1400px;
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
        min-width: 800px;
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

    .present {
        color: #198754;
        font-weight: bold;
    }

    .absent {
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
    <p>Attendance Report</p>
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
    <div>Total Attendance Records</div>
    <strong><?= count($attendance ?? []) ?></strong>
</div>

<div class="table-container">

    <?php if (empty($attendance)): ?>

        <div class="empty">
            No attendance records found.
        </div>

    <?php else: ?>

        <table>

            <thead>
                <tr>
                    <th>No.</th>
                    <th>Date</th>
                    <th>Admission Number</th>
                    <th>Student Name</th>
                    <th>Class</th>
                    <th>Status</th>
                </tr>
            </thead>

            <tbody>

                <?php $number = 1; ?>

                <?php foreach ($attendance as $record): ?>

                    <?php
                    $studentName = trim(
                        ($record['first_name'] ?? '') . ' ' .
                        ($record['middle_name'] ?? '') . ' ' .
                        ($record['last_name'] ?? '')
                    );

                    $status = strtolower($record['status'] ?? '');
                    ?>

                    <tr>

                        <td><?= $number++ ?></td>

                        <td><?= esc($record['attendance_date'] ?? '') ?></td>

                        <td><?= esc($record['admission_number'] ?? '') ?></td>

                        <td><?= esc($studentName) ?></td>

                        <td><?= esc($record['class_name'] ?? '') ?></td>

                        <td class="<?= $status === 'present' ? 'present' : ($status === 'absent' ? 'absent' : '') ?>">
                            <?= esc(ucfirst($record['status'] ?? '')) ?>
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
