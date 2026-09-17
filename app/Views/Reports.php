<!DOCTYPE html>

<html lang="en">

<head>


<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Reports - Anne Marie Academy</title>

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
        width: 92%;
        max-width: 1200px;
        margin: 35px auto;
    }

    .header {
        background: #1f3c88;
        color: white;
        padding: 25px;
        border-radius: 15px;
        margin-bottom: 25px;
    }

    .header h1 {
        margin: 0 0 8px;
        font-size: 28px;
    }

    .header p {
        margin: 0;
        opacity: 0.9;
    }

    .top-buttons {
        display: flex;
        gap: 10px;
        margin-top: 18px;
    }

    .top-buttons a {
        text-decoration: none;
        background: white;
        color: #1f3c88;
        padding: 10px 18px;
        border-radius: 8px;
        font-weight: bold;
    }

    .summary {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 18px;
        margin-bottom: 30px;
    }

    .summary-card {
        background: white;
        padding: 22px;
        border-radius: 12px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.07);
    }

    .summary-card h3 {
        margin: 0 0 10px;
        color: #555;
        font-size: 15px;
    }

    .summary-card .number {
        font-size: 30px;
        font-weight: bold;
        color: #1f3c88;
    }

    .section-title {
        margin-bottom: 18px;
        color: #1f3c88;
    }

    .reports-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 20px;
    }

    .report-card {
        background: white;
        padding: 25px;
        border-radius: 14px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.07);
        transition: 0.2s;
    }

    .report-card:hover {
        transform: translateY(-3px);
    }

    .report-icon {
        font-size: 35px;
        margin-bottom: 12px;
    }

    .report-card h2 {
        margin: 0 0 10px;
        color: #1f3c88;
        font-size: 20px;
    }

    .report-card p {
        color: #666;
        min-height: 45px;
        line-height: 1.5;
    }

    .view-btn {
        display: inline-block;
        margin-top: 12px;
        background: #1f3c88;
        color: white;
        text-decoration: none;
        padding: 10px 18px;
        border-radius: 8px;
        font-weight: bold;
    }

    .view-btn:hover {
        background: #162d68;
    }

    @media (max-width: 900px) {

        .summary {
            grid-template-columns: repeat(2, 1fr);
        }

        .reports-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media (max-width: 600px) {

        .summary {
            grid-template-columns: 1fr;
        }

        .reports-grid {
            grid-template-columns: 1fr;
        }

        .top-buttons {
            flex-direction: column;
        }
    }

</style>


</head>

<body>

<div class="container">


<div class="header">

    <h1>Reports</h1>

    <p>
        Anne Marie Academy Management System
    </p>

    <div class="top-buttons">

        <a href="<?= site_url('dashboard') ?>">
            Dashboard
        </a>

    </div>

</div>


<div class="summary">

    <div class="summary-card">

        <h3>Total Students</h3>

        <div class="number">
            <?= esc($totalStudents) ?>
        </div>

    </div>


    <div class="summary-card">

        <h3>Total Teachers</h3>

        <div class="number">
            <?= esc($totalTeachers) ?>
        </div>

    </div>


    <div class="summary-card">

        <h3>Total Classes</h3>

        <div class="number">
            <?= esc($totalClasses) ?>
        </div>

    </div>


    <div class="summary-card">

        <h3>Attendance Records</h3>

        <div class="number">
            <?= esc($totalAttendance) ?>
        </div>

    </div>


    <div class="summary-card">

        <h3>Fee Payments</h3>

        <div class="number">
            <?= esc($totalFees) ?>
        </div>

    </div>


    <div class="summary-card">

        <h3>Result Records</h3>

        <div class="number">
            <?= esc($totalResults) ?>
        </div>

    </div>

</div>


<h2 class="section-title">
    Available Reports
</h2>


<div class="reports-grid">


    <div class="report-card">

        <div class="report-icon">
            👨‍🎓
        </div>

        <h2>
            Student Report
        </h2>

        <p>
            View all registered students together with their classes and combinations.
        </p>

        <a
            href="<?= site_url('reports/students') ?>"
            class="view-btn"
        >
            View Report
        </a>

    </div>


    <div class="report-card">

        <div class="report-icon">
            👨‍🏫
        </div>

        <h2>
            Teacher Report
        </h2>

        <p>
            View registered teachers and their available information.
        </p>

        <a
            href="<?= site_url('reports/teachers') ?>"
            class="view-btn"
        >
            View Report
        </a>

    </div>


    <div class="report-card">

        <div class="report-icon">
            📅
        </div>

        <h2>
            Attendance Report
        </h2>

        <p>
            View student attendance records including Present, Absent and Late.
        </p>

        <a
            href="<?= site_url('reports/attendance') ?>"
            class="view-btn"
        >
            View Report
        </a>

    </div>


    <div class="report-card">

        <div class="report-icon">
            💰
        </div>

        <h2>
            Fees Report
        </h2>

        <p>
            View fee payments, payment methods, dates and total amount received.
        </p>

        <a
            href="<?= site_url('reports/fees') ?>"
            class="view-btn"
        >
            View Report
        </a>

    </div>


    <div class="report-card">

        <div class="report-icon">
            📝
        </div>

        <h2>
            Results Report
        </h2>

        <p>
            View student examination results, marks, subjects and academic years.
        </p>

        <a
            href="<?= site_url('reports/results') ?>"
            class="view-btn"
        >
            View Report
        </a>

    </div>


    <div class="report-card">

        <div class="report-icon">
            🏫
        </div>

        <h2>
            Class Report
        </h2>

        <p>
            View all classes and the number of students registered in each class.
        </p>

        <a
            href="<?= site_url('reports/classes') ?>"
            class="view-btn"
        >
            View Report
        </a>

    </div>


</div>


</div>

</body>

</html>
