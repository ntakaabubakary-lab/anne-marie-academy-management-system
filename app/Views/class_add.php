```php
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Add Class - ANNE MARIE ACADEMY</title>

    <style>

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        body {
            background: #f4f6f8;
            min-height: 100vh;
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
            margin-top: 6px;
            color: #ddd;
        }

        .container {
            width: 90%;
            max-width: 650px;
            margin: 40px auto;
        }

        .form-box {
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 3px 15px rgba(0,0,0,0.10);
        }

        .form-box h2 {
            color: #0b3d2e;
            margin-bottom: 25px;
            text-align: center;
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
            padding: 13px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 15px;
            outline: none;
        }

        input:focus,
        select:focus {
            border-color: #0b3d2e;
        }

        .buttons {
            display: flex;
            gap: 10px;
            margin-top: 25px;
        }

        .save-btn,
        .back-btn {
            flex: 1;
            padding: 13px;
            border: none;
            border-radius: 6px;
            text-align: center;
            text-decoration: none;
            font-weight: bold;
            cursor: pointer;
            font-size: 15px;
        }

        .save-btn {
            background: #800000;
            color: white;
        }

        .save-btn:hover {
            background: #5c0000;
        }

        .back-btn {
            background: #0b3d2e;
            color: white;
        }

        .back-btn:hover {
            background: #06291f;
        }

    </style>

</head>

<body>

    <div class="header">

        <h1>ANNE MARIE ACADEMY</h1>

        <p>School Management System</p>

    </div>


    <div class="container">

        <div class="form-box">

            <h2>Add New Class</h2>

            <form action="<?= base_url('classes/save') ?>" method="post">

                <div class="form-group">

                    <label for="class_name">
                        Class Name
                    </label>

                    <input
                        type="text"
                        id="class_name"
                        name="class_name"
                        placeholder="Example: Form One"
                        required
                    >

                </div>


                <div class="form-group">

                    <label for="level">
                        Level
                    </label>

                    <select id="level" name="level" required>

                        <option value="">
                            -- Select Level --
                        </option>

                        <option value="O-Level">
                            O-Level
                        </option>

                        <option value="A-Level">
                            A-Level
                        </option>

                    </select>

                </div>


                <div class="buttons">

                    <a
                        href="<?= base_url('classes') ?>"
                        class="back-btn"
                    >
                        Back
                    </a>

                    <button
                        type="submit"
                        class="save-btn"
                    >
                        Save Class
                    </button>

                </div>

            </form>

        </div>

    </div>

</body>

</html>
```
