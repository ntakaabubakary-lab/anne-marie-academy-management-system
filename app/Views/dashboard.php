<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard - ANNE MARIE ACADEMY</title>

    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f4f7fb;
            color: #333;
        }

        /* SIDEBAR */

        .sidebar {
            position: fixed;
            left: 0;
            top: 0;
            width: 250px;
            height: 100vh;
            background: #17365d;
            color: white;
            padding-top: 20px;
            overflow-y: auto;
        }

        .school-title {
            text-align: center;
            padding: 10px 15px 25px;
            border-bottom: 1px solid rgba(255,255,255,0.15);
        }

        .school-title h2 {
            font-size: 21px;
            margin-bottom: 6px;
        }

        .school-title p {
            font-size: 13px;
            opacity: 0.8;
        }

        .sidebar a {
            display: block;
            color: white;
            text-decoration: none;
            padding: 15px 22px;
            font-size: 15px;
            transition: 0.2s;
        }

        .sidebar a:hover {
            background: #28548a;
        }

        .sidebar a.active {
            background: #3498db;
        }

        /* MAIN */

        .main {
            margin-left: 250px;
            min-height: 100vh;
        }

        /* TOP BAR */

        .topbar {
            background: white;
            padding: 20px 30px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .topbar h1 {
            color: #17365d;
            font-size: 25px;
        }

        .admin {
            font-weight: bold;
            color: #555;
        }

        /* CONTENT */

        .content {
            padding: 30px;
        }

        .welcome {
            background: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 3px 12px rgba(0,0,0,0.06);
            margin-bottom: 25px;
        }

        .welcome h2 {
            color: #17365d;
            margin-bottom: 12px;
        }

        .welcome p {
            line-height: 1.6;
            color: #666;
        }

        /* STAT CARDS */

        .cards {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            margin-bottom: 30px;
        }

        .card {
            background: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 3px 12px rgba(0,0,0,0.07);
        }

        .card h3 {
            font-size: 15px;
            color: #777;
            margin-bottom: 15px;
        }

        .card .number {
            font-size: 32px;
            font-weight: bold;
            color: #17365d;
        }

        .card p {
            margin-top: 8px;
            color: #888;
            font-size: 13px;
        }

        /* QUICK ACTIONS */

        .section-title {
            color: #17365d;
            margin-bottom: 15px;
        }

        .quick-actions {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 15px;
        }

        .quick-actions a {
            background: white;
            padding: 20px;
            text-align: center;
            text-decoration: none;
            color: #17365d;
            border-radius: 10px;
            box-shadow: 0 3px 10px rgba(0,0,0,0.06);
            font-weight: bold;
            transition: 0.2s;
        }

        .quick-actions a:hover {
            background: #eaf4ff;
            transform: translateY(-2px);
        }

        /* FOOTER */

        .footer {
            text-align: center;
            padding: 25px;
            color: #888;
            font-size: 13px;
        }

        /* RESPONSIVE */

        @media (max-width: 1000px) {

            .cards {
                grid-template-columns: repeat(2, 1fr);
            }

            .quick-actions {
                grid-template-columns: repeat(2, 1fr);
            }

        }

        @media (max-width: 700px) {

            .sidebar {
                width: 200px;
            }

            .main {
                margin-left: 200px;
            }

            .cards {
                grid-template-columns: 1fr;
            }

            .quick-actions {
                grid-template-columns: 1fr;
            }

        }

    </style>

</head>


<body>


<!-- =========================
     SIDEBAR
========================= -->

<div class="sidebar">

    <div class="school-title">

        <h2>
            ANNE MARIE ACADEMY
        </h2>

        <p>
            Management System
        </p>

    </div>


    <a
        href="<?= site_url('dashboard') ?>"
        class="active"
    >
        🏠 Dashboard
    </a>


    <a href="<?= site_url('students') ?>">
        👨‍🎓 Students
    </a>


    <a href="<?= site_url('teachers') ?>">
        👨‍🏫 Teachers
    </a>


    <a href="<?= site_url('classes') ?>">
        🏫 Classes
    </a>


    <a href="<?= site_url('subjects') ?>">
        📚 Subjects
    </a>


    <a href="<?= site_url('exams') ?>">
        📝 Exams & Results
    </a>


    <a href="<?= site_url('attendance') ?>">
        📅 Attendance
    </a>


    <a href="<?= site_url('fees') ?>">
        💰 Fees
    </a>


    <a href="<?= site_url('reports') ?>">
        📊 Reports
    </a>


    <a href="<?= site_url('settings') ?>">
        ⚙️ Settings
    </a>


    <a href="<?= site_url('logout') ?>">
        🚪 Logout
    </a>

</div>



<!-- =========================
     MAIN CONTENT
========================= -->

<div class="main">


    <!-- TOP BAR -->

    <div class="topbar">

        <h1>
            Dashboard
        </h1>

        <div class="admin">
            Administrator
        </div>

    </div>



    <!-- CONTENT -->

    <div class="content">


        <!-- WELCOME -->

        <div class="welcome">

            <h2>
                Welcome to ANNE MARIE ACADEMY
            </h2>

            <p>
                ANNE MARIE ACADEMY MANAGEMENT SYSTEM helps the school
                manage students, teachers, classes, subjects, attendance,
                examinations, results and school fees.
            </p>

        </div>



        <!-- STATISTICS -->

        <div class="cards">


            <!-- STUDENTS -->

            <div class="card">

                <h3>
                    Total Students
                </h3>

                <div class="number">

                    <?= esc($totalStudents ?? 0) ?>

                </div>

                <p>
                    Registered students
                </p>

            </div>



            <!-- TEACHERS -->

            <div class="card">

                <h3>
                    Total Teachers
                </h3>

                <div class="number">

                    <?= esc($totalTeachers ?? 0) ?>

                </div>

                <p>
                    Registered teachers
                </p>

            </div>



            <!-- CLASSES -->

            <div class="card">

                <h3>
                    Total Classes
                </h3>

                <div class="number">

                    <?= esc($totalClasses ?? 0) ?>

                </div>

                <p>
                    Available classes
                </p>

            </div>



            <!-- ACADEMIC YEAR -->

            <div class="card">

                <h3>
                    Active Academic Year
                </h3>

                <div class="number">

                    <?= date('Y') ?>

                </div>

                <p>
                    Current academic year
                </p>

            </div>


        </div>



        <!-- QUICK ACTIONS -->

        <h2 class="section-title">
            Quick Actions
        </h2>


        <div class="quick-actions">


            <a href="<?= site_url('students/add') ?>">

                ➕ Add Student

            </a>


            <a href="<?= site_url('teachers/add') ?>">

                👨‍🏫 Add Teacher

            </a>


            <a href="<?= site_url('results/add') ?>">

                📝 Enter Results

            </a>


            <a href="<?= site_url('attendance') ?>">

                📅 Attendance

            </a>


        </div>


    </div>



    <!-- FOOTER -->

    <div class="footer">

        © <?= date('Y') ?>
        ANNE MARIE ACADEMY MANAGEMENT SYSTEM

    </div>


</div>


</body>

</html>