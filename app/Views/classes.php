<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Classes - ANNE MARIE ACADEMY</title>

    <style>

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        body {
            background: #f4f6f8;
            color: #222;
        }

        .header {
            background: #0b3d2e;
            color: white;
            padding: 20px 35px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header h1 {
            font-size: 24px;
        }

        .back-btn {
            background: #ffffff;
            color: #0b3d2e;
            text-decoration: none;
            padding: 10px 18px;
            border-radius: 6px;
            font-weight: bold;
        }

        .container {
            padding: 35px;
        }

        .top-section {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .top-section h2 {
            color: #0b3d2e;
        }

        .add-btn {
            background: #800000;
            color: white;
            text-decoration: none;
            padding: 12px 20px;
            border-radius: 6px;
            font-weight: bold;
        }

        .add-btn:hover {
            background: #5c0000;
        }

        .table-container {
            background: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 3px 12px rgba(0,0,0,0.10);
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            background: #0b3d2e;
            color: white;
            padding: 14px;
            text-align: left;
        }

        td {
            padding: 14px;
            border-bottom: 1px solid #ddd;
        }

        tr:hover {
            background: #f8f8f8;
        }

        .level {
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: bold;
        }

        .o-level {
            background: #d9f2e6;
            color: #0b3d2e;
        }

        .a-level {
            background: #e8e0f5;
            color: #4b286d;
        }

        .edit-btn {
            background: #123b63;
            color: white;
            padding: 8px 12px;
            text-decoration: none;
            border-radius: 5px;
            margin-right: 5px;
        }

        .delete-btn {
            background: #800000;
            color: white;
            padding: 8px 12px;
            text-decoration: none;
            border-radius: 5px;
        }

        .edit-btn:hover {
            background: #0b2945;
        }

        .delete-btn:hover {
            background: #5c0000;
        }

        .empty {
            text-align: center;
            padding: 30px;
            color: #777;
        }

    </style>

</head>

<body>

    <div class="header">

        <h1>ANNE MARIE ACADEMY MANAGEMENT SYSTEM</h1>

        <a href="<?= base_url('/') ?>" class="back-btn">
            Dashboard
        </a>

    </div>


    <div class="container">

        <div class="top-section">

            <h2>Classes Management</h2>

            <a href="<?= base_url('classes/add') ?>" class="add-btn">
                + Add Class
            </a>

        </div>


        <div class="table-container">

            <table>

                <thead>

                    <tr>

                        <th>ID</th>

                        <th>Class Name</th>

                        <th>Level</th>

                        <th>Actions</th>

                    </tr>

                </thead>


                <tbody>

                    <?php if (!empty($classes)): ?>

                        <?php foreach ($classes as $class): ?>

                            <tr>

                                <td>
                                    <?= esc($class['id']) ?>
                                </td>

                                <td>
                                    <strong>
                                        <?= esc($class['class_name']) ?>
                                    </strong>
                                </td>

                                <td>

                                    <?php if ($class['level'] === 'O-Level'): ?>

                                        <span class="level o-level">
                                            O-Level
                                        </span>

                                    <?php else: ?>

                                        <span class="level a-level">
                                            A-Level
                                        </span>

                                    <?php endif; ?>

                                </td>

                                <td>

                                    <a
                                        href="<?= base_url('classes/edit/' . $class['id']) ?>"
                                        class="edit-btn">
                                        Edit
                                    </a>

                                    <a
                                        href="<?= base_url('classes/delete/' . $class['id']) ?>"
                                        class="delete-btn"
                                        onclick="return confirm('Are you sure you want to delete this class?');">
                                        Delete
                                    </a>

                                </td>

                            </tr>

                        <?php endforeach; ?>

                    <?php else: ?>

                        <tr>

                            <td colspan="4" class="empty">
                                No classes found.
                            </td>

                        </tr>

                    <?php endif; ?>

                </tbody>

            </table>

        </div>

    </div>

</body>

</html>