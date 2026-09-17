<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

```
<title>Fees Report - Anne Marie Academy</title>

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
        font-size: 28px;
    }

    .header p {
        margin: 0;
        font-size: 16px;
    }

    .container {
        width: 95%;
        max-width: 1500px;
        margin: 25px auto;
    }

    .top-bar {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 10px;
        margin-bottom: 20px;
        flex-wrap: wrap;
    }

    .btn {
        display: inline-block;
        padding: 11px 18px;
        text-decoration: none;
        border-radius: 6px;
        color: white;
        border: none;
        cursor: pointer;
        font-size: 14px;
    }

    .back {
        background: #555;
    }

    .print {
        background: #198754;
    }

    .summary-container {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 20px;
        margin-bottom: 25px;
    }

    .summary-card {
        background: white;
        padding: 22px;
        border-radius: 10px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.08);
    }

    .summary-card h3 {
        margin: 0 0 10px;
        color: #555;
        font-size: 16px;
    }

    .summary-card strong {
        font-size: 26px;
        color: #123c69;
    }

    .amount {
        color: #198754 !important;
    }

    .table-container {
        background: white;
        padding: 20px;
        border-radius: 10px;
        overflow-x: auto;
        box-shadow: 0 2px 8px rgba(0,0,0,0.08);
    }

    table {
        width: 100%;
        border-collapse: collapse;
        min-width: 1100px;
    }

    th {
        background: #123c69;
        color: white;
        padding: 13px;
        text-align: left;
        white-space: nowrap;
    }

    td {
        padding: 12px;
        border-bottom: 1px solid #ddd;
    }

    tr:hover {
        background: #f5f8fc;
    }

    .empty {
        text-align: center;
        padding: 35px;
        color: #777;
        font-size: 16px;
    }

    .total-row {
        background: #eef4fa;
        font-weight: bold;
    }

    .total-row td {
        border-top: 2px solid #123c69;
    }

    @media (max-width: 700px) {
        .summary-container {
            grid-template-columns: 1fr;
        }

        .container {
            width: 92%;
        }
    }

    @media print {
        .top-bar {
            display: none;
        }

        body {
            background: white;
        }

        .table-container,
        .summary-card {
            box-shadow: none;
        }
    }
</style>
```

</head>

<body>

<div class="header">
    <h1>Anne Marie Academy</h1>
    <p>Fees Report</p>
</div>

<div class="container">

```
<div class="top-bar">

    <a href="<?= site_url('reports') ?>" class="btn back">
        Back to Reports
    </a>

    <button onclick="window.print()" class="btn print">
        Print Report
    </button>

</div>

<div class="summary-container">

    <div class="summary-card">
        <h3>Total Fee Payments</h3>

        <strong>
            <?= count($fees ?? []) ?>
        </strong>
    </div>

    <div class="summary-card">
        <h3>Total Amount Collected</h3>

        <strong class="amount">
            <?= number_format((float)($totalAmount ?? 0), 2) ?>
        </strong>
    </div>

</div>

<div class="table-container">

    <?php if (empty($fees)): ?>

        <div class="empty">
            No fee payments found.
        </div>

    <?php else: ?>

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
                </tr>
            </thead>

            <tbody>

                <?php $number = 1; ?>

                <?php foreach ($fees as $fee): ?>

                    <?php
                    $studentName = trim(
                        ($fee['first_name'] ?? '') . ' ' .
                        ($fee['middle_name'] ?? '') . ' ' .
                        ($fee['last_name'] ?? '')
                    );
                    ?>

                    <tr>

                        <td>
                            <?= $number++ ?>
                        </td>

                        <td>
                            <?= esc($fee['admission_number'] ?? '') ?>
                        </td>

                        <td>
                            <?= esc($studentName) ?>
                        </td>

                        <td>
                            <?= esc($fee['year_name'] ?? '') ?>
                        </td>

                        <td>
                            <?= number_format(
                                (float)($fee['amount'] ?? 0),
                                2
                            ) ?>
                        </td>

                        <td>
                            <?= esc($fee['payment_date'] ?? '') ?>
                        </td>

                        <td>
                            <?= esc($fee['payment_method'] ?? '') ?>
                        </td>

                        <td>
                            <?= esc($fee['reference_number'] ?? '') ?>
                        </td>

                        <td>
                            <?= esc($fee['received_by_name'] ?? '') ?>
                        </td>

                    </tr>

                <?php endforeach; ?>

                <tr class="total-row">

                    <td colspan="4">
                        TOTAL
                    </td>

                    <td>
                        <?= number_format(
                            (float)($totalAmount ?? 0),
                            2
                        ) ?>
                    </td>

                    <td colspan="4"></td>

                </tr>

            </tbody>

        </table>

    <?php endif; ?>

</div>
```

</div>

</body>
</html>
