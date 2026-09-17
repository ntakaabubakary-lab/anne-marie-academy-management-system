<?php

$teacher = $teacher ?? [];

$teacherId = $teacher['id'] ?? '';

?>

<!DOCTYPE html>

<html lang="en">
<head>


<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Edit Teacher - Anne Marie Academy</title>

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

    .header p {
        margin: 0;
    }

    .container {
        width: 90%;
        max-width: 800px;
        margin: 30px auto;
    }

    .form-card {
        background: white;
        padding: 30px;
        border-radius: 12px;
        box-shadow: 0 3px 12px rgba(0, 0, 0, 0.08);
    }

    .form-card h2 {
        margin-top: 0;
        color: #123c69;
        margin-bottom: 25px;
    }

    .form-group {
        margin-bottom: 18px;
    }

    label {
        display: block;
        margin-bottom: 7px;
        font-weight: bold;
        color: #333;
    }

    input,
    select {
        width: 100%;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 6px;
        font-size: 15px;
        outline: none;
    }

    input:focus,
    select:focus {
        border-color: #123c69;
    }

    .buttons {
        display: flex;
        gap: 10px;
        margin-top: 25px;
        flex-wrap: wrap;
    }

    .btn {
        padding: 12px 20px;
        border: none;
        border-radius: 6px;
        text-decoration: none;
        color: white;
        cursor: pointer;
        font-size: 15px;
    }

    .update {
        background: #198754;
    }

    .cancel {
        background: #6c757d;
    }

    .error {
        background: #f8d7da;
        color: #842029;
        padding: 12px;
        border-radius: 6px;
        margin-bottom: 20px;
    }

    .success {
        background: #d1e7dd;
        color: #0f5132;
        padding: 12px;
        border-radius: 6px;
        margin-bottom: 20px;
    }

</style>


</head>

<body>

<div class="header">


<h1>Anne Marie Academy</h1>

<p>Edit Teacher</p>


</div>

<div class="container">


<div class="form-card">

    <h2>Update Teacher Information</h2>

    <?php if (session()->getFlashdata('error')): ?>

        <div class="error">
            <?= esc(session()->getFlashdata('error')) ?>
        </div>

    <?php endif; ?>

    <?php if (session()->getFlashdata('success')): ?>

        <div class="success">
            <?= esc(session()->getFlashdata('success')) ?>
        </div>

    <?php endif; ?>

    <form action="<?= site_url('teachers/update/' . $teacherId) ?>" method="post">

        <?= csrf_field() ?>

        <div class="form-group">

            <label for="teacher_number">
                Teacher Number
            </label>

            <input
                type="text"
                id="teacher_number"
                name="teacher_number"
                value="<?= esc(old('teacher_number', $teacher['teacher_number'] ?? '')) ?>"
                required
            >

        </div>

        <div class="form-group">

            <label for="first_name">
                First Name
            </label>

            <input
                type="text"
                id="first_name"
                name="first_name"
                value="<?= esc(old('first_name', $teacher['first_name'] ?? '')) ?>"
                required
            >

        </div>

        <div class="form-group">

            <label for="middle_name">
                Middle Name
            </label>

            <input
                type="text"
                id="middle_name"
                name="middle_name"
                value="<?= esc(old('middle_name', $teacher['middle_name'] ?? '')) ?>"
            >

        </div>

        <div class="form-group">

            <label for="last_name">
                Last Name
            </label>

            <input
                type="text"
                id="last_name"
                name="last_name"
                value="<?= esc(old('last_name', $teacher['last_name'] ?? '')) ?>"
                required
            >

        </div>

        <div class="form-group">

            <label for="gender">
                Gender
            </label>

            <select id="gender" name="gender" required>

                <option value="">
                    Select Gender
                </option>

                <option
                    value="Male"
                    <?= old('gender', $teacher['gender'] ?? '') === 'Male' ? 'selected' : '' ?>
                >
                    Male
                </option>

                <option
                    value="Female"
                    <?= old('gender', $teacher['gender'] ?? '') === 'Female' ? 'selected' : '' ?>
                >
                    Female
                </option>

            </select>

        </div>

        <div class="form-group">

            <label for="qualification">
                Qualification
            </label>

            <input
                type="text"
                id="qualification"
                name="qualification"
                placeholder="e.g. BSc Education, Diploma in Education"
                value="<?= esc(old('qualification', $teacher['qualification'] ?? '')) ?>"
                required
            >

        </div>

        <div class="form-group">

            <label for="phone">
                Phone Number
            </label>

            <input
                type="text"
                id="phone"
                name="phone"
                value="<?= esc(old('phone', $teacher['phone'] ?? '')) ?>"
            >

        </div>

        <div class="form-group">

            <label for="email">
                Email
            </label>

            <input
                type="email"
                id="email"
                name="email"
                value="<?= esc(old('email', $teacher['email'] ?? '')) ?>"
            >

        </div>

        <div class="form-group">

            <label for="address">
                Address
            </label>

            <input
                type="text"
                id="address"
                name="address"
                value="<?= esc(old('address', $teacher['address'] ?? '')) ?>"
            >

        </div>

        <div class="buttons">

            <button type="submit" class="btn update">
                Update Teacher
            </button>

            <a href="<?= site_url('teachers') ?>" class="btn cancel">
                Cancel
            </a>

        </div>

    </form>

</div>


</div>

</body>
</html>
