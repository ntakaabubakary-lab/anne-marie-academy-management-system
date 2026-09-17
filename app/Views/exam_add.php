```php
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Create Exam - Anne Marie Academy</title>

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
            width: 600px;
            max-width: 94%;
            margin: 40px auto;
        }

        .card {
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
        }

        h2 {
            color: #1e3a5f;
            margin-bottom: 25px;
            text-align: center;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #333;
        }

        input,
        select {
            width: 100%;
            padding: 13px;
            border: 1px solid #ccc;
            border-radius: 7px;
            font-size: 15px;
            background: white;
        }

        input:focus,
        select:focus {
            outline: none;
            border-color: #3498db;
            box-shadow: 0 0 4px rgba(52, 152, 219, 0.3);
        }

        .save-button {
            width: 100%;
            background: #27ae60;
            color: white;
            border: none;
            padding: 14px;
            border-radius: 7px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
        }

        .save-button:hover {
            background: #219150;
        }

        .back-button {
            display: block;
            text-align: center;
            margin-top: 18px;
            text-decoration: none;
            color: #3498db;
            font-weight: bold;
        }

        .back-button:hover {
            text-decoration: underline;
        }

        .error {
            background: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
            padding: 13px;
            border-radius: 7px;
            margin-bottom: 20px;
        }

        .info {
            background: #e8f4ff;
            color: #1e3a5f;
            border: 1px solid #c8e5ff;
            padding: 12px;
            border-radius: 7px;
            margin-bottom: 20px;
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

    <div class="card">

        <h2>
            Create New Exam
        </h2>


        <!-- ERROR MESSAGE -->

        <?php if (session()->getFlashdata('error')): ?>

            <div class="error">

                <?= esc(session()->getFlashdata('error')) ?>

            </div>

        <?php endif; ?>


        <!-- INFORMATION -->

        <div class="info">

            Select the academic year in which this examination will be conducted.

        </div>


        <!-- EXAM FORM -->

        <form
            action="<?= site_url('exams/save') ?>"
            method="post"
        >


            <!-- EXAM NAME -->

            <div class="form-group">

                <label for="exam_name">
                    Exam Name
                </label>

                <input
                    type="text"
                    id="exam_name"
                    name="exam_name"
                    placeholder="Example: Mid Term Examination"
                    required
                >

            </div>


            <!-- EXAM TYPE -->

            <div class="form-group">

                <label for="exam_type">
                    Exam Type
                </label>

                <select
                    id="exam_type"
                    name="exam_type"
                    required
                >

                    <option value="">
                        -- Select Exam Type --
                    </option>

                    <option value="Mid Term">
                        Mid Term
                    </option>

                    <option value="Terminal">
                        Terminal
                    </option>

                    <option value="Annual">
                        Annual
                    </option>

                    <option value="Mock">
                        Mock
                    </option>

                    <option value="Monthly">
                        Monthly
                    </option>

                    <option value="Other">
                        Other
                    </option>

                </select>

            </div>


            <!-- ACADEMIC YEAR -->

            <div class="form-group">

                <label for="academic_year_id">
                    Academic Year
                </label>

                <select
                    id="academic_year_id"
                    name="academic_year_id"
                    required
                >

                    <option value="">
                        -- Select Academic Year --
                    </option>


                    <?php if (!empty($academic_years)): ?>

                        <?php foreach ($academic_years as $year): ?>

                            <option
                                value="<?= esc($year['id']) ?>"
                            >

                                <?= esc($year['year_name']) ?>

                                <?php if (($year['status'] ?? '') === 'Active'): ?>

                                    - Active

                                <?php endif; ?>

                            </option>

                        <?php endforeach; ?>


                    <?php else: ?>

                        <option value="" disabled>

                            No academic years available

                        </option>

                    <?php endif; ?>


                </select>

            </div>


            <!-- SAVE BUTTON -->

            <button
                type="submit"
                class="save-button"
            >

                Save Exam

            </button>


            <!-- BACK -->

            <a
                href="<?= site_url('exams') ?>"
                class="back-button"
            >

                ← Back to Exams

            </a>


        </form>

    </div>

</div>


</body>

</html>
```
