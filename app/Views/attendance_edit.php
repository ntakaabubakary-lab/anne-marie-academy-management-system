<!DOCTYPE html>

<html lang="en">

<head>

```
<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Edit Attendance</title>

<style>

    * {
        box-sizing: border-box;
    }

    body {
        margin: 0;
        font-family: Arial, sans-serif;
        background: #f4f7fb;
    }

    .container {
        width: 90%;
        max-width: 700px;
        margin: 40px auto;
    }

    .card {
        background: white;
        padding: 30px;
        border-radius: 15px;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
    }

    h1 {
        text-align: center;
        color: #1f3c88;
        margin-bottom: 25px;
    }

    .message {
        padding: 13px;
        border-radius: 7px;
        margin-bottom: 20px;
        font-weight: bold;
    }

    .error {
        background: #f8d7da;
        color: #721c24;
    }

    .form-group {
        margin-bottom: 20px;
    }

    label {
        display: block;
        margin-bottom: 8px;
        font-weight: bold;
    }

    input,
    select {
        width: 100%;
        padding: 12px;
        border: 1px solid #ccd3dd;
        border-radius: 8px;
        font-size: 15px;
    }

    input[readonly] {
        background: #f1f3f5;
        font-weight: bold;
    }

    .buttons {
        display: flex;
        gap: 12px;
        margin-top: 25px;
    }

    .buttons a,
    .buttons button {
        flex: 1;
        padding: 13px;
        border: none;
        border-radius: 8px;
        text-align: center;
        text-decoration: none;
        font-weight: bold;
        cursor: pointer;
    }

    .back-btn {
        background: #e5e7eb;
        color: #333;
    }

    .update-btn {
        background: #1f3c88;
        color: white;
    }

    .update-btn:hover {
        background: #162d68;
    }

</style>
```

</head>

<body>

<div class="container">

```
<div class="card">

    <h1>Edit Attendance</h1>


    <?php if (session()->getFlashdata('error')): ?>

        <div class="message error">
            <?= esc(session()->getFlashdata('error')) ?>
        </div>

    <?php endif; ?>


    <form
        action="<?= site_url('attendance/update/' . $attendance['id']) ?>"
        method="post"
    >

        <?= csrf_field() ?>


        <div class="form-group">

            <label for="student_id">
                Student
            </label>

            <select
                name="student_id"
                id="student_id"
                required
            >

                <option value="">
                    -- Select Student --
                </option>

                <?php foreach ($students as $student): ?>

                    <option
                        value="<?= esc($student['id']) ?>"
                        data-class-id="<?= esc($student['class_id']) ?>"
                        data-class-name="<?= esc($student['class_name']) ?>"
                        <?= $student['id'] == $attendance['student_id'] ? 'selected' : '' ?>
                    >

                        <?= esc($student['admission_number']) ?>
                        -
                        <?= esc($student['first_name']) ?>

                        <?php if (!empty($student['middle_name'])): ?>
                            <?= esc($student['middle_name']) ?>
                        <?php endif; ?>

                        <?php if (!empty($student['last_name'])): ?>
                            <?= esc($student['last_name']) ?>
                        <?php endif; ?>

                    </option>

                <?php endforeach; ?>

            </select>

        </div>


        <div class="form-group">

            <label for="class_name">
                Class
            </label>

            <input
                type="text"
                id="class_name"
                value="<?= esc($attendance['class_name']) ?>"
                readonly
            >

            <input
                type="hidden"
                name="class_id"
                id="class_id"
                value="<?= esc($attendance['student_class_id']) ?>"
            >

        </div>


        <div class="form-group">

            <label for="attendance_date">
                Attendance Date
            </label>

            <input
                type="date"
                name="attendance_date"
                id="attendance_date"
                value="<?= esc($attendance['attendance_date']) ?>"
                required
            >

        </div>


        <div class="form-group">

            <label for="status">
                Attendance Status
            </label>

            <select
                name="status"
                id="status"
                required
            >

                <option
                    value="Present"
                    <?= $attendance['status'] === 'Present' ? 'selected' : '' ?>
                >
                    Present
                </option>

                <option
                    value="Absent"
                    <?= $attendance['status'] === 'Absent' ? 'selected' : '' ?>
                >
                    Absent
                </option>

                <option
                    value="Late"
                    <?= $attendance['status'] === 'Late' ? 'selected' : '' ?>
                >
                    Late
                </option>

            </select>

        </div>


        <div class="buttons">

            <a
                href="<?= site_url('attendance') ?>"
                class="back-btn"
            >
                Back
            </a>

            <button
                type="submit"
                class="update-btn"
            >
                Update Attendance
            </button>

        </div>

    </form>

</div>
```

</div>

<script>

    const studentSelect =
        document.getElementById('student_id');

    const className =
        document.getElementById('class_name');

    const classId =
        document.getElementById('class_id');


    function updateClass()
    {
        const selectedOption =
            studentSelect.options[
                studentSelect.selectedIndex
            ];


        if (!selectedOption || !selectedOption.value)
        {
            className.value = '';
            classId.value = '';

            return;
        }


        const selectedClassId =
            selectedOption.getAttribute(
                'data-class-id'
            );


        const selectedClassName =
            selectedOption.getAttribute(
                'data-class-name'
            );


        classId.value =
            selectedClassId || '';


        className.value =
            selectedClassName || 'No class assigned';
    }


    studentSelect.addEventListener(
        'change',
        updateClass
    );


    updateClass();

</script>

</body>

</html>
