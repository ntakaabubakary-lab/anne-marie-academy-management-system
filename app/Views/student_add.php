<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Add Student - Anne Marie Academy</title>

    <style>

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f4f7f6;
        }

        .container {
            width: 90%;
            max-width: 950px;
            margin: 40px auto;
            background: white;
            padding: 35px;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.10);
        }

        h1 {
            text-align: center;
            color: #7b1113;
            margin-bottom: 30px;
        }

        .message {
            padding: 12px;
            margin-bottom: 20px;
            border-radius: 7px;
            background: #f8d7da;
            color: #842029;
        }

        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
        }

        .full-width {
            grid-column: 1 / 3;
        }

        label {
            font-weight: bold;
            margin-bottom: 7px;
            color: #333;
        }

        input,
        select,
        textarea {
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 7px;
            font-size: 15px;
        }

        input:focus,
        select:focus,
        textarea:focus {
            outline: none;
            border-color: #7b1113;
        }

        textarea {
            min-height: 90px;
            resize: vertical;
        }

        .combination-box {
            display: none;
        }

        .buttons {
            margin-top: 30px;
            display: flex;
            gap: 15px;
        }

        button {
            background: #7b1113;
            color: white;
            border: none;
            padding: 13px 25px;
            border-radius: 7px;
            cursor: pointer;
            font-size: 15px;
            font-weight: bold;
        }

        button:hover {
            background: #5e0d0f;
        }

        .back {
            background: #198754;
            color: white;
            text-decoration: none;
            padding: 13px 25px;
            border-radius: 7px;
            font-weight: bold;
        }

        .back:hover {
            background: #146c43;
        }

        @media (max-width: 700px) {

            .form-grid {
                grid-template-columns: 1fr;
            }

            .full-width {
                grid-column: 1;
            }

        }

    </style>

</head>

<body>

<div class="container">

    <h1>Register New Student</h1>


    <?php if (session()->getFlashdata('error')): ?>

        <div class="message">

            <?= esc(session()->getFlashdata('error')) ?>

        </div>

    <?php endif; ?>


    <form action="<?= base_url('students/save') ?>" method="post">

        <div class="form-grid">


            <!-- Admission Number -->

            <div class="form-group">

                <label>Admission Number</label>

                <input
                    type="text"
                    name="admission_number"
                    placeholder="Example: AMA001"
                    value="<?= old('admission_number') ?>"
                    required
                >

            </div>


            <!-- First Name -->

            <div class="form-group">

                <label>First Name</label>

                <input
                    type="text"
                    name="first_name"
                    placeholder="Enter first name"
                    value="<?= old('first_name') ?>"
                    required
                >

            </div>


            <!-- Middle Name -->

            <div class="form-group">

                <label>Middle Name</label>

                <input
                    type="text"
                    name="middle_name"
                    placeholder="Enter middle name"
                    value="<?= old('middle_name') ?>"
                >

            </div>


            <!-- Last Name -->

            <div class="form-group">

                <label>Last Name</label>

                <input
                    type="text"
                    name="last_name"
                    placeholder="Enter last name"
                    value="<?= old('last_name') ?>"
                    required
                >

            </div>


            <!-- Gender -->

            <div class="form-group">

                <label>Gender</label>

                <select name="gender" required>

                    <option value="">-- Select Gender --</option>

                    <option value="Male"
                        <?= old('gender') == 'Male' ? 'selected' : '' ?>>
                        Male
                    </option>

                    <option value="Female"
                        <?= old('gender') == 'Female' ? 'selected' : '' ?>>
                        Female
                    </option>

                </select>

            </div>


            <!-- Date of Birth -->

            <div class="form-group">

                <label>Date of Birth</label>

                <input
                    type="date"
                    name="date_of_birth"
                    value="<?= old('date_of_birth') ?>"
                >

            </div>


            <!-- Class -->

            <div class="form-group">

                <label>Class</label>

                <select name="class_id" id="class_id" required>

                    <option value="">-- Select Class --</option>

                    <?php foreach ($classes as $class): ?>

                        <option
                            value="<?= esc($class['id']) ?>"
                            data-level="<?= esc($class['level']) ?>"
                            <?= old('class_id') == $class['id'] ? 'selected' : '' ?>
                        >

                            <?= esc($class['class_name']) ?>
                            - <?= esc($class['level']) ?>

                        </option>

                    <?php endforeach; ?>

                </select>

            </div>


            <!-- Combination -->

            <div class="form-group combination-box" id="combinationBox">

                <label>Combination</label>

                <select name="combination_id" id="combination_id">

                    <option value="">
                        -- Select Combination --
                    </option>


                    <?php if (!empty($combinations)): ?>

                        <?php foreach ($combinations as $combination): ?>

                            <option
                                value="<?= esc($combination['id']) ?>"
                                <?= old('combination_id') == $combination['id'] ? 'selected' : '' ?>
                            >

                                <?= esc($combination['combination_code']) ?>
                                -
                                <?= esc($combination['combination_name']) ?>

                            </option>

                        <?php endforeach; ?>

                    <?php endif; ?>

                </select>


                <small style="margin-top:6px; color:#777;">

                    Required for A-Level students.

                </small>

            </div>


            <!-- Parent Name -->

            <div class="form-group">

                <label>Parent / Guardian Name</label>

                <input
                    type="text"
                    name="parent_name"
                    placeholder="Enter parent or guardian name"
                    value="<?= old('parent_name') ?>"
                >

            </div>


            <!-- Parent Phone -->

            <div class="form-group">

                <label>Parent / Guardian Phone</label>

                <input
                    type="text"
                    name="parent_phone"
                    placeholder="Example: 0712345678"
                    value="<?= old('parent_phone') ?>"
                >

            </div>


            <!-- Address -->

            <div class="form-group full-width">

                <label>Address</label>

                <textarea
                    name="address"
                    placeholder="Enter student's address"
                ><?= old('address') ?></textarea>

            </div>

        </div>


        <div class="buttons">

            <button type="submit">
                Save Student
            </button>

            <a href="<?= base_url('students') ?>" class="back">
                Back to Students
            </a>

        </div>

    </form>

</div>


<script>

    const classSelect =
        document.getElementById('class_id');

    const combinationBox =
        document.getElementById('combinationBox');

    const combinationSelect =
        document.getElementById('combination_id');


    function checkClassLevel() {

        const selectedOption =
            classSelect.options[classSelect.selectedIndex];


        if (!selectedOption) {
            return;
        }


        const level =
            selectedOption.getAttribute('data-level');


        if (level === 'A-Level') {

            // Show combination
            combinationBox.style.display = 'flex';

            // Make combination required
            combinationSelect.required = true;

        } else {

            // Hide combination for O-Level
            combinationBox.style.display = 'none';

            // Combination is not required
            combinationSelect.required = false;

            // Clear selected combination
            combinationSelect.value = '';

        }

    }


    classSelect.addEventListener(
        'change',
        checkClassLevel
    );


    // Check when page loads
    checkClassLevel();

</script>

</body>

</html>