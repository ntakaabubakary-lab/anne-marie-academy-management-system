<!DOCTYPE html>

<html lang="en">

<head>

```
<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Attendance Management</title>

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
        margin: 30px auto;
    }

    .header {
        background: #1f3c88;
        color: white;
        padding: 22px;
        border-radius: 12px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 10px;
    }

    .header h1 {
        margin: 0;
        font-size: 25px;
    }

    .header-buttons {
        display: flex;
        gap: 10px;
    }

    .btn {
        text-decoration: none;
        padding: 10px 16px;
        border-radius: 7px;
        font-weight: bold;
        display: inline-block;
    }

    .add-btn {
        background: #28a745;
        color: white;
    }

    .dashboard-btn {
        background: white;
        color: #1f3c88;
    }

    .message {
        padding: 14px;
        margin: 20px 0;
        border-radius: 8px;
        font-weight: bold;
    }

    .success {
        background: #d4edda;
        color: #155724;
    }

    .error {
        background: #f8d7da;
        color: #721c24;
    }

    .table-container {
        background: white;
        margin-top: 20px;
        padding: 20px;
        border-radius: 12px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
        overflow-x: auto;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        min-width: 900px;
    }

    th {
        background: #1f3c88;
        color: white;
        padding: 13px;
        text-align: left;
    }

    td {
        padding: 12px;
        border-bottom: 1px solid #ddd;
    }

    tr:hover {
        background: #f5f8ff;
    }

    .status {
        padding: 6px 10px;
        border-radius: 20px;
        font-size: 13px;
        font-weight: bold;
        display: inline-block;
    }

    .present {
        background: #d4edda;
        color: #155724;
    }

    .absent {
        background: #f8d7da;
        color: #721c24;
    }

    .late {
        background: #fff3cd;
        color: #856404;
    }

    .actions {
        display: flex;
        gap: 7px;
    }

    .edit-btn {
        background: #ffc107;
        color: #212529;
        padding: 8px 12px;
        border-radius: 6px;
        text-decoration: none;
        font-weight: bold;
    }

    .delete-btn {
        background: #dc3545;
        color: white;
        padding: 8px 12px;
        border-radius: 6px;
        text-decoration: none;
        font-weight: bold;
    }

    .edit-btn:hover {
        background: #e0a800;
    }

    .delete-btn:hover {
        background: #c82333;
    }

    .empty {
        text-align: center;
        padding: 35px;
        color: #777;
    }

</style>
```

</head>

<body>

<div class="container">

```
<div class="header">

    <h1>Attendance Management</h1>

    <div class="header-buttons">

        <a
            href="<?= site_url('attendance/add') ?>"
            class="btn add-btn"
        >
            + Record Attendance
        </a>

        <a
            href="<?= site_url('dashboard') ?>"
            class="btn dashboard-btn"
        >
            Dashboard
        </a>

    </div>

</div>


<?php if (session()->getFlashdata('success')): ?>

    <div class="message success">
        <?= esc(session()->getFlashdata('success')) ?>
    </div>

<?php endif; ?>


<?php if (session()->getFlashdata('error')): ?>

    <div class="message error">
        <?= esc(session()->getFlashdata('error')) ?>
    </div>

<?php endif; ?>


<div class="table-container">

    <?php if (!empty($attendance)): ?>

        <table>

            <thead>

                <tr>

                    <th>No.</th>

                    <th>Admission Number</th>

                    <th>Student Name</th>

                    <th>Class</th>

                    <th>Attendance Date</th>

                    <th>Status</th>

                    <th>Action</th>

                </tr>

            </thead>


            <tbody>

                <?php $number = 1; ?>

                <?php foreach ($attendance as $row): ?>

                    <tr>

                        <td>
                            <?= $number++ ?>
                        </td>


                        <td>
                            <?= esc($row['admission_number']) ?>
                        </td>


                        <td>

                            <?= esc($row['first_name']) ?>

                            <?= !empty($row['middle_name']) ? ' ' . esc($row['middle_name']) : '' ?>

                            <?= !empty($row['last_name']) ? ' ' . esc($row['last_name']) : '' ?>

                        </td>


                        <td>
                            <?= esc($row['class_name']) ?>
                        </td>


                        <td>
                            <?= esc($row['attendance_date']) ?>
                        </td>


                        <td>

                            <?php if ($row['status'] === 'Present'): ?>

                                <span class="status present">
                                    Present
                                </span>

                            <?php elseif ($row['status'] === 'Absent'): ?>

                                <span class="status absent">
                                    Absent
                                </span>

                            <?php else: ?>

                                <span class="status late">
                                    Late
                                </span>

                            <?php endif; ?>

                        </td>


                        <td>

                            <div class="actions">

                                <a
                                    href="<?= site_url('attendance/edit/' . $row['id']) ?>"
                                    class="edit-btn"
                                >
                                    Edit
                                </a>


                                <a
                                    href="<?= site_url('attendance/delete/' . $row['id']) ?>"
                                    class="delete-btn"
                                    onclick="return confirm('Are you sure you want to delete this attendance record?');"
                                >
                                    Delete
                                </a>

                            </div>

                        </td>

                    </tr>

                <?php endforeach; ?>

            </tbody>

        </table>

    <?php else: ?>

        <div class="empty">

            <h3>No attendance records found.</h3>

            <p>
                Click "Record Attendance" to add attendance.
            </p>

        </div>

    <?php endif; ?>

</div>
```

</div>

</body>

</html>
