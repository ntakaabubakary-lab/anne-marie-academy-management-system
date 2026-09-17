```php
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Enter Student Result</title>

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
            max-width: 900px;
            margin: 40px auto;
        }

        .card {
            background: white;
            padding: 35px;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.08);
        }

        h1 {
            margin-top: 0;
            color: #1f3c88;
            text-align: center;
        }

        .subtitle {
            text-align: center;
            color: #777;
            margin-bottom: 30px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 8px;
            color: #333;
        }

        select,
        input {
            width: 100%;
            padding: 13px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 15px;
            background: white;
        }

        select:focus,
        input:focus {
            outline: none;
            border-color: #1f3c88;
        }

        .buttons {
            display: flex;
            gap: 12px;
            margin-top: 30px;
        }

        button,
        .back-button {
            flex: 1;
            padding: 13px;
            border: none;
            border-radius: 8px;
            font-size: 15px;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
        }

        button {
            background: #1f3c88;
            color: white;
        }

        button:hover {
            background: #162d68;
        }

        .back-button {
            background: #777;
            color: white;
        }

        .back-button:hover {
            background: #555;
        }

        .message {
            padding: 12px;
            margin-bottom: 20px;
            border-radius: 8px;
        }

        .error {
            background: #ffe5e5;
            color: #b00020;
        }

        .info {
            background: #e8f1ff;
            color: #1f3c88;
            margin-top: 20px;
        }

    </style>

</head>

<body>

<div class="container">

    <div class="card">

        <h1>Enter Student Result</h1>

        <p class="subtitle">
            ANNE MARIE ACADEMY MANAGEMENT SYSTEM
        </p>


        <?php if (session()->getFlashdata('error')): ?>

            <div class="message error">
                <?= esc(session()->getFlashdata('error')) ?>
            </div>

        <?php endif; ?>


        <form
            action="<?= site_url('results/save') ?>"
            method="post"
        >

            <?= csrf_field() ?>


            <!-- STUDENT -->

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

                    <?php if (!empty($students)): ?>

                        <?php foreach ($students as $student): ?>

                            <option
                                value="<?= esc($student['id']) ?>"
                                <?= old('student_id') == $student['id'] ? 'selected' : '' ?>
                            >

                                <?= esc($student['admission_number']) ?>
                                -
                                <?= esc($student['first_name']) ?>

                                <?php if (!empty($student['middle_name'])): ?>

                                    <?= esc($student['middle_name']) ?>

                                <?php endif; ?>

                                <?= esc($student['last_name']) ?>

                            </option>

                        <?php endforeach; ?>

                    <?php else: ?>

                        <option value="" disabled>
                            No students registered
                        </option>

                    <?php endif; ?>

                </select>

            </div>


            <!-- SUBJECT -->

            <div class="form-group">

                <label for="subject_id">
                    Subject
                </label>

                <select
                    name="subject_id"
                    id="subject_id"
                    required
                >

                    <option value="">
                        -- Select Subject --
                    </option>

                    <?php if (!empty($subjects)): ?>

                        <?php foreach ($subjects as $subject): ?>

                            <option
                                value="<?= esc($subject['id']) ?>"
                                <?= old('subject_id') == $subject['id'] ? 'selected' : '' ?>
                            >

                                <?= esc($subject['subject_code']) ?>
                                -
                                <?= esc($subject['subject_name']) ?>
                                (<?= esc($subject['level']) ?>)

                            </option>

                        <?php endforeach; ?>

                    <?php else: ?>

                        <option value="" disabled>
                            No subjects available
                        </option>

                    <?php endif; ?>

                </select>

            </div>


            <!-- EXAM -->

            <div class="form-group">

                <label for="exam_id">
                    Examination
                </label>

                <select
                    name="exam_id"
                    id="exam_id"
                    required
                >

                    <option value="">
                        -- Select Examination --
                    </option>

                    <?php if (!empty($exams)): ?>

                        <?php foreach ($exams as $exam): ?>

                            <option
                                value="<?= esc($exam['id']) ?>"
                                <?= old('exam_id') == $exam['id'] ? 'selected' : '' ?>
                            >

                                <?= esc($exam['exam_name']) ?>
                                -
                                <?= esc($exam['exam_type']) ?>
                                -
                                <?= esc($exam['year_name']) ?>

                            </option>

                        <?php endforeach; ?>

                    <?php else: ?>

                        <option value="" disabled>
                            No examinations available
                        </option>

                    <?php endif; ?>

                </select>

            </div>


            <!-- MARKS -->

            <div class="form-group">

                <label for="marks">
                    Marks
                </label>

                <input
                    type="number"
                    name="marks"
                    id="marks"
                    min="0"
                    max="100"
                    step="0.01"
                    value="<?= old('marks') ?>"
                    placeholder="Enter marks from 0 to 100"
                    required
                >

            </div>


            <!-- BUTTONS -->

            <div class="buttons">

                <a
                    href="<?= site_url('results') ?>"
                    class="back-button"
                >
                    Back to Results
                </a>

                <button type="submit">
                    Save Result
                </button>

            </div>

        </form>


        <div class="message info">

            <strong>Grading System:</strong><br>

            75 - 100 = A |
            65 - 74 = B |
            45 - 64 = C |
            30 - 44 = D |
            0 - 29 = F

        </div>

    </div>

</div>

</body>

</html>
```
