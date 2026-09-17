<!DOCTYPE html>

<html lang="en">

<head>

```
<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Fees Management</title>

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
        gap: 12px;
    }

    .header h1 {
        margin: 0;
        font-size: 25px;
    }

    .header-buttons {
        display: flex;
        gap: 10px;
        flex-wrap: wrap;
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

    .summary {
        display: flex;
        gap: 20px;
        margin-top: 20px;
        flex-wrap: wrap;
    }

    .summary-card {
        background: white;
        padding: 20px;
        border-radius: 12px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
        min-width: 220px;
        flex: 1;
    }

    .summary-card h3 {
        margin: 0 0 8px;
        color: #666;
        font-size: 15px;
    }

    .summary-card .value {
        font-size: 25px;
        font-weight: bold;
        color: #1f3c88;
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
        min-width: 1200px;
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

    .amount {
        font-weight: bold;
        color: #198754;
    }

    .payment-method {
        padding: 6px 10px;
        border-radius: 20px;
        font-size: 13px;
        font-weight: bold;
        display: inline-block;
        background: #e8f0fe;
        color: #1f3c88;
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

    <h1>Fees Management</h1>

    <div class="header-buttons">

        <a
            href="<?= site_url('fees/add') ?>"
            class="btn add-btn"
        >
            + Record Payment
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


<?php

    $totalPayments = count($fees);

    $totalAmount = 0;

    foreach ($fees as $fee) {
        $totalAmount += (float) $fee['amount'];
    }

?>


<div class="summary">

    <div class="summary-card">

        <h3>Total Payments</h3>

        <div class="value">
            <?= $totalPayments ?>
        </div>

    </div>


    <div class="summary-card">

        <h3>Total Amount Received</h3>

        <div class="value">
            <?= number_format($totalAmount, 2) ?>
        </div>

    </div>

</div>


<div class="table-container">

    <?php if (!empty($fees)): ?>

        <table>

            <thead>

                <tr>

                    <th>No.</th>

                    <th>Admission Number</th>

                    <th>Student Name</th>

                    <th>Academic Year</th>

                    <th>Amount</th>

                    <th>Payment Date</th>

                    <th>Payment Method</th>

                    <th>Reference Number</th>

                    <th>Received By</th>

                    <th>Action</th>

                </tr>

            </thead>


            <tbody>

                <?php $number = 1; ?>

                <?php foreach ($fees as $fee): ?>

                    <tr>

                        <td>
                            <?= $number++ ?>
                        </td>


                        <td>
                            <?= esc($fee['admission_number']) ?>
                        </td>


                        <td>

                            <?= esc($fee['first_name']) ?>

                            <?php if (!empty($fee['middle_name'])): ?>

                                <?= ' ' . esc($fee['middle_name']) ?>

                            <?php endif; ?>

                            <?php if (!empty($fee['last_name'])): ?>

                                <?= ' ' . esc($fee['last_name']) ?>

                            <?php endif; ?>

                        </td>


                        <td>
                            <?= esc($fee['year_name']) ?>
                        </td>


                        <td class="amount">

                            <?= number_format((float) $fee['amount'], 2) ?>

                        </td>


                        <td>
                            <?= esc($fee['payment_date']) ?>
                        </td>


                        <td>

                            <span class="payment-method">

                                <?= esc($fee['payment_method']) ?>

                            </span>

                        </td>


                        <td>

                            <?= !empty($fee['reference_number'])
                                ? esc($fee['reference_number'])
                                : '—'
                            ?>

                        </td>


                        <td>
                            <?= esc($fee['received_by']) ?>
                        </td>


                        <td>

                            <div class="actions">

                                <a
                                    href="<?= site_url('fees/edit/' . $fee['id']) ?>"
                                    class="edit-btn"
                                >
                                    Edit
                                </a>


                                <a
                                    href="<?= site_url('fees/delete/' . $fee['id']) ?>"
                                    class="delete-btn"
                                    onclick="return confirm('Are you sure you want to delete this fee payment?');"
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

            <h3>No fee payments found.</h3>

            <p>
                Click "Record Payment" to add a student fee payment.
            </p>

        </div>

    <?php endif; ?>

</div>
```

</div>

</body>

</html>
