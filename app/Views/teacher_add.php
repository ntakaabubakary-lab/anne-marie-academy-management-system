<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

```
<title>Add Teacher - Anne Marie Academy</title>

<style>
    * {
        box-sizing: border-box;
    }

    body {
        margin: 0;
        padding: 0;
        font-family: Arial, sans-serif;
        background: #f4f7fb;
        color: #1f2937;
    }

    .header {
        background: #12355b;
        color: white;
        padding: 25px;
        text-align: center;
    }

    .header h1 {
        margin: 0;
        font-size: 28px;
    }

    .header p {
        margin: 8px 0 0;
        font-size: 15px;
    }

    .container {
        width: 90%;
        max-width: 900px;
        margin: 30px auto;
    }

    .top-buttons {
        display: flex;
        gap: 12px;
        margin-bottom: 20px;
        flex-wrap: wrap;
    }

    .btn {
        display: inline-block;
        padding: 11px 20px;
        border-radius: 8px;
        text-decoration: none;
        font-weight: bold;
        border: none;
        cursor: pointer;
        font-size: 14px;
    }

    .dashboard-btn {
        background: #2563eb;
        color: white;
    }

    .dashboard-btn:hover {
        background: #1d4ed8;
    }

    .teachers-btn {
        background: #059669;
        color: white;
    }

    .teachers-btn:hover {
        background: #047857;
    }

    .card {
        background: white;
        padding: 30px;
        border-radius: 14px;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
    }

    .card h2 {
        margin-top: 0;
        margin-bottom: 25px;
        color: #12355b;
    }

    .form-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 18px;
    }

    .form-group {
        display: flex;
        flex-direction: column;
    }

    .form-group.full {
        grid-column: 1 / -1;
    }

    label {
        margin-bottom: 7px;
        font-weight: bold;
        color: #374151;
    }

    input,
    select,
    textarea {
        width: 100%;
        padding: 12px;
        border: 1px solid #d1d5db;
        border-radius: 8px;
        font-size: 15px;
        outline: none;
    }

    input:focus,
    select:focus,
    textarea:focus {
        border-color: #2563eb;
        box-shadow: 0 0 0 2px rgba(37, 99, 235, 0.12);
    }

    textarea {
        min-height: 100px;
        resize: vertical;
    }

    .submit-area {
        margin-top: 25px;
        display: flex;
        gap: 12px;
    }

    .submit-btn {
        background: #12355b;
        color: white;
    }

    .submit-btn:hover {
        background: #0d2947;
    }

    .cancel-btn {
        background: #6b7280;
        color: white;
    }

    .cancel-btn:hover {
        background: #4b5563;
    }

    .alert {
        padding: 12px 15px;
        border-radius: 8px;
        margin-bottom: 20px;
    }

    .alert-success {
        background: #d1fae5;
        color: #065f46;
    }

    .alert-error {
        background: #fee2e2;
        color: #991b1b;
    }

    @media (max-width: 700px) {
        .form-grid {
            grid-template-columns: 1fr;
        }

        .form-group.full {
            grid-column: auto;
        }

        .container {
            width: 94%;
        }

        .card {
            padding: 20px;
        }
    }
</style>
```

</head>

<body>

```
<div class="header">
    <h1>ANNE MARIE ACADEMY</h1>
    <p>Teacher Management System</p>
</div>

<div class="container">

    <div class="top-buttons">

        <a href="<?= site_url('dashboard') ?>" class="btn dashboard-btn">
            🏠 Dashboard
        </a>

        <a href="<?= site_url('teachers') ?>" class="btn teachers-btn">
            👨‍🏫 View Teachers
        </a>

    </div>

    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success">
            <?= esc(session()->getFlashdata('success')) ?>
        </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-error">
            <?= esc(session()->getFlashdata('error')) ?>
        </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('errors')): ?>
        <div class="alert alert-error">
            <?php foreach (session()->getFlashdata('errors') as $error): ?>
                <div><?= esc($error) ?></div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <div class="card">

        <h2>Register New Teacher</h2>

        <form action="<?= site_url('teachers/save') ?>" method="post">

            <?= csrf_field() ?>

            <div class="form-grid">

                <div class="form-group">
                    <label for="teacher_number">Teacher Number</label>

                    <input
                        type="text"
                        id="teacher_number"
                        name="teacher_number"
                        placeholder="e.g. TCH001"
                        value="<?= esc(old('teacher_number')) ?>"
                        required
                    >
                </div>

                <div class="form-group">
                    <label for="gender">Gender</label>

                    <select id="gender" name="gender" required>
                        <option value="">Select Gender</option>
                        <option value="Male" <?= old('gender') === 'Male' ? 'selected' : '' ?>>
                            Male
                        </option>
                        <option value="Female" <?= old('gender') === 'Female' ? 'selected' : '' ?>>
                            Female
                        </option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="first_name">First Name</label>

                    <input
                        type="text"
                        id="first_name"
                        name="first_name"
                        placeholder="Enter first name"
                        value="<?= esc(old('first_name')) ?>"
                        required
                    >
                </div>

                <div class="form-group">
                    <label for="middle_name">Middle Name</label>

                    <input
                        type="text"
                        id="middle_name"
                        name="middle_name"
                        placeholder="Enter middle name"
                        value="<?= esc(old('middle_name')) ?>"
                    >
                </div>

                <div class="form-group">
                    <label for="last_name">Last Name</label>

                    <input
                        type="text"
                        id="last_name"
                        name="last_name"
                        placeholder="Enter last name"
                        value="<?= esc(old('last_name')) ?>"
                        required
                    >
                </div>

                <div class="form-group">
                    <label for="qualification">Qualification</label>

                    <input
                        type="text"
                        id="qualification"
                        name="qualification"
                        placeholder="e.g. Bachelor in Chemistry"
                        value="<?= esc(old('qualification')) ?>"
                        required
                    >
                </div>

                <div class="form-group">
                    <label for="phone">Phone Number</label>

                    <input
                        type="text"
                        id="phone"
                        name="phone"
                        placeholder="e.g. 0775462890"
                        value="<?= esc(old('phone')) ?>"
                        required
                    >
                </div>

                <div class="form-group">
                    <label for="email">Email Address</label>

                    <input
                        type="email"
                        id="email"
                        name="email"
                        placeholder="e.g. teacher@gmail.com"
                        value="<?= esc(old('email')) ?>"
                    >
                </div>

                <div class="form-group full">
                    <label for="address">Address</label>

                    <textarea
                        id="address"
                        name="address"
                        placeholder="Enter teacher address"
                    ><?= esc(old('address')) ?></textarea>
                </div>

            </div>

            <div class="submit-area">

                <button type="submit" class="btn submit-btn">
                    Register Teacher
                </button>

                <a href="<?= site_url('teachers') ?>" class="btn cancel-btn">
                    Cancel
                </a>

            </div>

        </form>

    </div>

</div>
```

</body>
</html>s
