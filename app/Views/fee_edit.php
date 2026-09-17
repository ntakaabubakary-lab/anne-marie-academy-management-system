<!DOCTYPE html>

<html lang="en">

<head>

```
<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Edit Fee Payment</title>

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
        width: 90%;
        max-width: 750px;
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
        border-radius: 8px;
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
        color: #333;
    }

    input,
    select {
        width: 100%;
        padding: 12px;
        border: 1px solid #ccd3dd;
        border-radius: 8px;
        font-size: 15px;
        background: white;
    }

    input:focus,
    select:focus {
        outline: none;
        border-color: #1f3c88;
    }

    .hint {
        margin-top: 5px;
        font-size: 13px;
        color: #777;
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
        font-size: 15px;
        font-weight: bold;
        text-align: center;
        text-decoration: none;
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

    <h1>Edit Fee Payment</h1>


    <?php if (session()->getFlashdata('error')): ?>

        <div class="message error">
            <?= esc(session()->getFlashdata('error')) ?>
        </div>

    <?php endif; ?>


    <form
        action="<?= site_url('fees/update/' . $fee['id']) ?>"
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
                        <?= old('student_id', $fee['student_id']) == $student['id'] ? 'selected' : '' ?>
                    >

                        <?= esc($student['admission_number']) ?>
                        -
                        <?= esc($student['first_name']) ?>

                        <?php if (!empty($student['middle_name'])): ?>

                            <?= ' ' . esc($student['middle_name']) ?>

                        <?php endif; ?>

                        <?php if (!empty($student['last_name'])): ?>

                            <?= ' ' . esc($student['last_name']) ?>

                        <?php endif; ?>

                    </option>

                <?php endforeach; ?>

            </select>

        </div>


        <div class="form-group">

            <label for="academic_year_id">
                Academic Year
            </label>

            <select
                name="academic_year_id"
                id="academic_year_id"
                required
            >

                <option value="">
                    -- Select Academic Year --
                </option>

                <?php foreach ($academicYears as $year): ?>

                    <option
                        value="<?= esc($year['id']) ?>"
                        <?= old('academic_year_id', $fee['academic_year_id']) == $year['id'] ? 'selected' : '' ?>
                    >

                        <?= esc($year['year_name']) ?>

                        <?php if ($year['status'] === 'Active'): ?>

                            - Active

                        <?php endif; ?>

                    </option>

                <?php endforeach; ?>

            </select>

        </div>


        <div class="form-group">

            <label for="amount">
                Amount
            </label>

            <input
                type="number"
                name="amount"
                id="amount"
                min="1"
                step="0.01"
                value="<?= old('amount', $fee['amount']) ?>"
                placeholder="Enter amount"
                required
            >

        </div>


        <div class="form-group">

            <label for="payment_date">
                Payment Date
            </label>

            <input
                type="date"
                name="payment_date"
                id="payment_date"
                value="<?= old('payment_date', $fee['payment_date']) ?>"
                required
            >

        </div>


        <div class="form-group">

            <label for="payment_method">
                Payment Method
            </label>

            <select
                name="payment_method"
                id="payment_method"
                required
            >

                <option value="">
                    -- Select Payment Method --
                </option>

                <option
                    value="Cash"
                    <?= old('payment_method', $fee['payment_method']) === 'Cash' ? 'selected' : '' ?>
                >
                    Cash
                </option>

                <option
                    value="Bank"
                    <?= old('payment_method', $fee['payment_method']) === 'Bank' ? 'selected' : '' ?>
                >
                    Bank
                </option>

                <option
                    value="Mobile Money"
                    <?= old('payment_method', $fee['payment_method']) === 'Mobile Money' ? 'selected' : '' ?>
                >
                    Mobile Money
                </option>

                <option
                    value="Cheque"
                    <?= old('payment_method', $fee['payment_method']) === 'Cheque' ? 'selected' : '' ?>
                >
                    Cheque
                </option>

            </select>

        </div>


        <div class="form-group">

            <label for="reference_number">
                Reference Number
            </label>

            <input
                type="text"
                name="reference_number"
                id="reference_number"
                value="<?= old('reference_number', $fee['reference_number']) ?>"
                placeholder="Enter transaction/reference number"
            >

            <div class="hint">
                Optional.
            </div>

        </div>


        <div class="form-group">

            <label for="received_by">
                Received By
            </label>

            <select
                name="received_by"
                id="received_by"
            >

                <option value="">
                    -- Select User (Optional) --
                </option>

                <?php foreach ($users as $user): ?>

                    <option
                        value="<?= esc($user['id']) ?>"
                        <?= old('received_by', $fee['received_by']) == $user['id'] ? 'selected' : '' ?>
                    >

                        <?= esc($user['username']) ?>

                        <?php if (!empty($user['role'])): ?>

                            - <?= esc($user['role']) ?>

                        <?php endif; ?>

                    </option>

                <?php endforeach; ?>

            </select>

            <div class="hint">
                Optional. Select the user who received this payment if applicable.
            </div>

        </div>


        <div class="buttons">

            <a
                href="<?= site_url('fees') ?>"
                class="back-btn"
            >
                Cancel
            </a>

            <button
                type="submit"
                class="update-btn"
            >
                Update Payment
            </button>

        </div>

    </form>

</div>
```

</div>

</body>

</html>
