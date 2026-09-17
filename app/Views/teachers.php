<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Teachers - Anne Marie Academy</title>

    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background: #f4f6f8;
            color: #222;
        }

        .header {
            background: #0b3d2e;
            color: white;
            padding: 22px;
            text-align: center;
        }

        .header h1 {
            font-size: 25px;
        }

        .header p {
            margin-top: 5px;
            color: #ddd;
        }

        .container {
            width: 95%;
            margin: 30px auto;
            background: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 3px 12px rgba(0,0,0,0.10);
        }

        .top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .top h2 {
            color: #061d3a;
        }

        .add-btn {
            background: #800000;
            color: white;
            text-decoration: none;
            padding: 12px 18px;
            border-radius: 6px;
            font-weight: bold;
        }

        .add-btn:hover {
            background: #5c0000;
        }

        .table-container {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 950px;
        }

        th {
            background: #0b3d2e;
            color: white;
            padding: 13px;
            text-align: left;
        }

        td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
        }

        tr:hover {
            background: #f2f7f5;
        }

        .action {
            display: flex;
            gap: 7px;
        }

        .edit-btn,
        .delete-btn {
            color: white;
            text-decoration: none;
            padding: 7px 11px;
            border-radius: 5px;
            font-size: 13px;
            font-weight: bold;
        }

        .edit-btn {
            background: #061d3a;
        }

        .edit-btn:hover {
            background: #0b3d2e;
        }

        .delete-btn {
            background: #800000;
        }

        .delete-btn:hover {
            background: #5c0000;
        }

        .empty {
            text-align: center;
            padding: 30px;
            color: #666;
        }

    </style>

</head>


<body>


    <div class="header">

        <h1>ANNE MARIE ACADEMY</h1>

        <p>Teacher Management System</p>

    </div>


    <div class="container">


        <div class="top">

            <h2>Registered Teachers</h2>

            <a href="<?= base_url('teachers/add') ?>" class="add-btn">

                + Add Teacher

            </a>

        </div>


        <div class="table-container">

            <table>

                <thead>

                    <tr>

                        <th>#</th>

                        <th>Teacher Number</th>

                        <th>First Name</th>

                        <th>Middle Name</th>

                        <th>Last Name</th>

                        <th>Gender</th>

                        <th>Phone</th>

                        <th>Email</th>

                        <th>Qualification</th>

                        <th>Action</th>

                    </tr>

                </thead>


                <tbody>


                    <?php if (!empty($teachers)): ?>

                        <?php $number = 1; ?>

                        <?php foreach ($teachers as $teacher): ?>

                            <tr>

                                <td>
                                    <?= $number++ ?>
                                </td>

                                <td>
                                    <?= esc($teacher['teacher_number']) ?>
                                </td>

                                <td>
                                    <?= esc($teacher['first_name']) ?>
                                </td>

                                <td>
                                    <?= esc($teacher['middle_name']) ?>
                                </td>

                                <td>
                                    <?= esc($teacher['last_name']) ?>
                                </td>

                                <td>
                                    <?= esc($teacher['gender']) ?>
                                </td>

                                <td>
                                    <?= esc($teacher['phone']) ?>
                                </td>

                                <td>
                                    <?= esc($teacher['email']) ?>
                                </td>

                                <td>
                                    <?= esc($teacher['qualification']) ?>
                                </td>

                                <td>

                                    <div class="action">

                                        <a
                                            href="<?= base_url('teachers/edit/' . $teacher['id']) ?>"
                                            class="edit-btn"
                                        >
                                            Edit
                                        </a>


                                        <a
                                            href="<?= base_url('teachers/delete/' . $teacher['id']) ?>"
                                            class="delete-btn"
                                            onclick="return confirm('Are you sure you want to delete this teacher?');"
                                        >
                                            Delete
                                        </a>

                                    </div>

                                </td>

                            </tr>

                        <?php endforeach; ?>


                    <?php else: ?>

                        <tr>

                            <td colspan="10" class="empty">

                                No teachers registered yet.

                            </td>

                        </tr>

                    <?php endif; ?>


                </tbody>

            </table>

        </div>

    </div>


</body>

</html>