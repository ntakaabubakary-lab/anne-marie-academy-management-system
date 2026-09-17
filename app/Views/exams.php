<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        Exams Management - Anne Marie Academy
    </title>


    <style>

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }


        body {

            font-family:
                Arial,
                Helvetica,
                sans-serif;

            background: #f4f7fb;

            color: #333;
        }


        /* HEADER */

        .header {

            background: #1e3a5f;

            color: white;

            padding: 20px 30px;

            display: flex;

            justify-content:
                space-between;

            align-items:
                center;
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


        /* CONTAINER */

        .container {

            width: 94%;

            margin: 30px auto;
        }


        /* TOP SECTION */

        .top-section {

            display: flex;

            justify-content:
                space-between;

            align-items:
                center;

            margin-bottom: 20px;

            gap: 15px;

            flex-wrap: wrap;
        }


        .top-section h2 {

            color: #1e3a5f;
        }


        /* ADD BUTTON */

        .add-button {

            background: #27ae60;

            color: white;

            text-decoration: none;

            padding: 12px 20px;

            border-radius: 6px;

            font-weight: bold;
        }


        .add-button:hover {

            background: #219150;
        }


        /* SUCCESS */

        .success {

            background: #d4edda;

            color: #155724;

            border:
                1px solid
                #c3e6cb;

            padding: 13px 18px;

            border-radius: 6px;

            margin-bottom: 20px;
        }


        /* ERROR */

        .error {

            background: #f8d7da;

            color: #721c24;

            border:
                1px solid
                #f5c6cb;

            padding: 13px 18px;

            border-radius: 6px;

            margin-bottom: 20px;
        }


        /* TABLE */

        .table-card {

            background: white;

            border-radius: 10px;

            box-shadow:
                0 3px 12px
                rgba(0, 0, 0, 0.08);

            overflow-x: auto;
        }


        table {

            width: 100%;

            border-collapse:
                collapse;

            min-width: 700px;
        }


        thead {

            background:
                #1e3a5f;

            color: white;
        }


        th {

            padding: 15px;

            text-align: left;

            white-space:
                nowrap;
        }


        td {

            padding: 14px 15px;

            border-bottom:
                1px solid
                #e5e5e5;
        }


        tbody tr:hover {

            background:
                #f5f9ff;
        }


        /* BADGE */

        .badge {

            background:
                #e8f4ff;

            color:
                #1e3a5f;

            padding:
                6px 10px;

            border-radius: 5px;

            font-weight: bold;

            display:
                inline-block;
        }


        /* EMPTY */

        .empty {

            text-align:
                center;

            padding: 50px;

            color: #777;

            font-size: 17px;
        }


        /* FOOTER */

        .footer {

            text-align:
                center;

            padding: 25px;

            color: #777;

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


    <a
        href="<?= site_url('dashboard') ?>"
    >
        Dashboard
    </a>

</div>



<!-- MAIN CONTENT -->

<div class="container">


    <!-- TOP SECTION -->

    <div class="top-section">

        <h2>
            Exams Management
        </h2>


        <a
            href="<?= site_url('exams/add') ?>"
            class="add-button"
        >

            + Create New Exam

        </a>

    </div>



    <!-- SUCCESS MESSAGE -->

    <?php
    if (
        session()->getFlashdata(
            'success'
        )
    ):
    ?>

        <div class="success">

            <?= esc(
                session()->getFlashdata(
                    'success'
                )
            ) ?>

        </div>

    <?php endif; ?>



    <!-- ERROR MESSAGE -->

    <?php
    if (
        session()->getFlashdata(
            'error'
        )
    ):
    ?>

        <div class="error">

            <?= esc(
                session()->getFlashdata(
                    'error'
                )
            ) ?>

        </div>

    <?php endif; ?>



    <!-- EXAMS TABLE -->

    <div class="table-card">


        <?php
        if (!empty($exams)):
        ?>


            <table>


                <thead>

                    <tr>

                        <th>
                            #
                        </th>

                        <th>
                            Exam Name
                        </th>

                        <th>
                            Exam Type
                        </th>

                        <th>
                            Academic Year
                        </th>

                    </tr>

                </thead>



                <tbody>


                    <?php
                    $number = 1;
                    ?>


                    <?php
                    foreach (
                        $exams
                        as $exam
                    ):
                    ?>


                        <tr>


                            <td>

                                <?= $number++ ?>

                            </td>


                            <td>

                                <strong>

                                    <?= esc(
                                        $exam[
                                            'exam_name'
                                        ] ?? ''
                                    ) ?>

                                </strong>

                            </td>


                            <td>

                                <span
                                    class="badge"
                                >

                                    <?= esc(
                                        $exam[
                                            'exam_type'
                                        ] ?? ''
                                    ) ?>

                                </span>

                            </td>


                            <td>

                                <?= esc(
                                    $exam[
                                        'year_name'
                                    ] ?? 'N/A'
                                ) ?>

                            </td>


                        </tr>


                    <?php
                    endforeach;
                    ?>


                </tbody>


            </table>


        <?php else: ?>


            <div class="empty">

                <p>

                    No exams created yet.

                </p>


                <br>


                <a
                    href="<?= site_url('exams/add') ?>"
                    class="add-button"
                >

                    Create First Exam

                </a>

            </div>


        <?php endif; ?>


    </div>


</div>



<!-- FOOTER -->

<div class="footer">

    Anne Marie Academy Management System

</div>


</body>

</html>