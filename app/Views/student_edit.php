<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Student - Anne Marie Academy</title>

    <style>

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f4f6f8;
        }

        .header {
            background: #0b3d2e;
            color: white;
            padding: 20px;
            text-align: center;
        }

        .header h1 {
            margin: 0;
            font-size: 28px;
        }

        .header p {
            margin: 6px 0 0;
        }

        .container {
            width: 90%;
            max-width: 900px;
            margin: 30px auto;
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.12);
        }

        h2 {
            color: #0b3d2e;
            margin-bottom: 25px;
            border-bottom: 3px solid #800000;
            padding-bottom: 10px;
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

        .form-group.full {
            grid-column: 1 / 3;
        }

        label {
            font-weight: bold;
            margin-bottom: 7px;
            color: #222;
        }

        input,
        select,
        textarea {
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 7px;
            font-size: 15px;
            width: 100%;
        }

        input:focus,
        select:focus,
        textarea:focus {
            outline: none;
            border-color: #0b3d2e;
        }

        textarea {
            min-height: 90px;
            resize: vertical;
        }

        .buttons {
            margin-top: 30px;
            display: flex;
            gap: 12px;
        }

        .btn {
            padding: 12px 22px;
            border: none;
            border-radius: 7px;
            text-decoration: none;
            cursor: pointer;
            font-size: 15px;
            font-weight: bold;
        }

        .update-btn {
            background: #0b3d2e;
            color: white;
        }

        .update-btn:hover {
            background: #06291f;
        }

        .cancel-btn {
            background: #800000;
            color: white;
        }

        .cancel-btn:hover {
            background: #5c0000;
        }

        @media (max-width: 700px) {

            .form-grid {
                grid-template-columns: 1fr;
            }

            .form-group.full {
                grid-column: 1;
            }

            .container {
                width: 95%;
                padding: 20px;
            }

        }

    </style>

</head>

<body>

    <div class="header">

        <h1>ANNE MARIE ACADEMY</h1>

        <p>Student Management System</p>

    </div>


    <div class="container">

        <h2>Edit Student</h2>

        <form action="<?= base_url('students/update/' . $student['id']) ?>" method="post">

            <div class="form-grid">

                <div class="form-group">

                    <label>Admission Number</label>

                    <input
                        type="text"
                        name="admission_number"
                        value="<?= esc($student['admission_number']) ?>"
                        required
                    >

                </div>


                <div class="form-group">

                    <label>Gender</label>

                    <select name="gender" required>

                        <option value="Male"
                            <?= $student['gender'] == 'Male' ? 'selected' : '' ?>>
                            Male
                        </option>

                        <option value="Female"
                            <?= $student['gender'] == 'Female' ? 'selected' : '' ?>>
                            Female
                        </option>

                    </select>

                </div>


                <div class="form-group">

                    <label>First Name</label>

                    <input
                        type="text"
                        name="first_name"
                        value="<?= esc($student['first_name']) ?>"
                        required
                    >

                </div>


                <div class="form-group">

                    <label>Middle Name</label>

                    <input
                        type="text"
                        name="middle_name"
                        value="<?= esc($student['middle_name']) ?>"
                    >

                </div>


                <div class="form-group">

                    <label>Last Name</label>

                    <input
                        type="text"
                        name="last_name"
                        value="<?= esc($student['last_name']) ?>"
                        required
                    >

                </div>


                <div class="form-group">

                    <label>Date of Birth</label>

                    <input
                        type="date"
                        name="date_of_birth"
                        value="<?= esc($student['date_of_birth']) ?>"
                    >

                </div>


                <div class="form-group">

                    <label>Class</label>

                    <select name="class_id" required>

                        <option value="1" <?= $student['class_id'] == 1 ? 'selected' : '' ?>>
                            Form One
                        </option>

                        <option value="2" <?= $student['class_id'] == 2 ? 'selected' : '' ?>>
                            Form Two
                        </option>

                        <option value="3" <?= $student['class_id'] == 3 ? 'selected' : '' ?>>
                            Form Three
                        </option>

                        <option value="4" <?= $student['class_id'] == 4 ? 'selected' : '' ?>>
                            Form Four
                        </option>

                        <option value="5" <?= $student['class_id'] == 5 ? 'selected' : '' ?>>
                            Form Five
                        </option>

                        <option value="6" <?= $student['class_id'] == 6 ? 'selected' : '' ?>>
                            Form Six
                        </option>

                    </select>

                </div>


                <div class="form-group">

                    <label>A-Level Combination</label>

                    <select name="combination_id">

                        <option value="">Not Applicable / O-Level</option>

                        <option value="1" <?= $student['combination_id'] == 1 ? 'selected' : '' ?>>
                            PCM
                        </option>

                        <option value="2" <?= $student['combination_id'] == 2 ? 'selected' : '' ?>>
                            PCB
                        </option>

                        <option value="3" <?= $student['combination_id'] == 3 ? 'selected' : '' ?>>
                            PGM
                        </option>

                        <option value="4" <?= $student['combination_id'] == 4 ? 'selected' : '' ?>>
                            CBG
                        </option>

                        <option value="5" <?= $student['combination_id'] == 5 ? 'selected' : '' ?>>
                            HGL
                        </option>

                        <option value="6" <?= $student['combination_id'] == 6 ? 'selected' : '' ?>>
                            HKL
                        </option>

                        <option value="7" <?= $student['combination_id'] == 7 ? 'selected' : '' ?>>
                            EGM
                        </option>

                        <option value="8" <?= $student['combination_id'] == 8 ? 'selected' : '' ?>>
                            EBUAC
                        </option>

                        <option value="9" <?= $student['combination_id'] == 9 ? 'selected' : '' ?>>
                            ECA
                        </option>

                        <option value="10" <?= $student['combination_id'] == 10 ? 'selected' : '' ?>>
                            BUACM
                        </option>

                    </select>

                </div>


                <div class="form-group">

                    <label>Parent / Guardian Name</label>

                    <input
                        type="text"
                        name="parent_name"
                        value="<?= esc($student['parent_name']) ?>"
                    >

                </div>


                <div class="form-group">

                    <label>Parent / Guardian Phone</label>

                    <input
                        type="text"
                        name="parent_phone"
                        value="<?= esc($student['parent_phone']) ?>"
                    >

                </div>


                <div class="form-group full">

                    <label>Address</label>

                    <textarea name="address"><?= esc($student['address']) ?></textarea>

                </div>


                <div class="form-group">

                    <label>Status</label>

                    <select name="status">

                        <option value="Active"
                            <?= $student['status'] == 'Active' ? 'selected' : '' ?>>
                            Active
                        </option>

                        <option value="Inactive"
                            <?= $student['status'] == 'Inactive' ? 'selected' : '' ?>>
                            Inactive
                        </option>

                        <option value="Graduated"
                            <?= $student['status'] == 'Graduated' ? 'selected' : '' ?>>
                            Graduated
                        </option>

                    </select>

                </div>

            </div>


            <div class="buttons">

                <button type="submit" class="btn update-btn">
                    Update Student
                </button>

                <a href="<?= base_url('students') ?>" class="btn cancel-btn">
                    Cancel
                </a>

            </div>

        </form>

    </div>

</body>

</html>