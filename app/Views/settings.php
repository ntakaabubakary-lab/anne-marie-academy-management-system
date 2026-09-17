<!DOCTYPE html>

<html lang="en">

<head>

```
<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Settings - ANNE MARIE ACADEMY</title>

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

    .header {
        background: #17365d;
        color: white;
        padding: 25px;
        text-align: center;
    }

    .header h1 {
        margin-bottom: 5px;
    }

    .container {
        width: 90%;
        max-width: 900px;
        margin: 30px auto;
    }

    .top-buttons {
        margin-bottom: 20px;
    }

    .btn {
        display: inline-block;
        padding: 11px 20px;
        border-radius: 8px;
        text-decoration: none;
        font-weight: bold;
        margin-right: 10px;
    }

    .dashboard-btn {
        background: #2563eb;
        color: white;
    }

    .logout-btn {
        background: #dc2626;
        color: white;
    }

    .card {
        background: white;
        padding: 30px;
        border-radius: 12px;
        box-shadow: 0 3px 12px rgba(0,0,0,0.08);
        margin-bottom: 20px;
    }

    .card h2 {
        color: #17365d;
        margin-bottom: 20px;
    }

    .setting-item {
        padding: 18px;
        border-bottom: 1px solid #eee;
    }

    .setting-item:last-child {
        border-bottom: none;
    }

    .setting-item h3 {
        color: #17365d;
        margin-bottom: 8px;
    }

    .setting-item p {
        color: #666;
        line-height: 1.6;
    }

</style>
```

</head>

<body>

```
<div class="header">

    <h1>ANNE MARIE ACADEMY</h1>

    <p>Management System</p>

</div>

<div class="container">

    <div class="top-buttons">

        <a href="<?= site_url('dashboard') ?>" class="btn dashboard-btn">
            🏠 Dashboard
        </a>

        <a href="<?= site_url('logout') ?>" class="btn logout-btn">
            🚪 Logout
        </a>

    </div>

    <div class="card">

        <h2>⚙️ System Settings</h2>

        <div class="setting-item">

            <h3>School Information</h3>

            <p>
                ANNE MARIE ACADEMY MANAGEMENT SYSTEM
            </p>

        </div>

        <div class="setting-item">

            <h3>Academic Year</h3>

            <p>
                Current Academic Year:
                <strong><?= date('Y') ?></strong>
            </p>

        </div>

        <div class="setting-item">

            <h3>System</h3>

            <p>
                Manage system settings and administrator account
                from this section.
            </p>

        </div>

    </div>

</div>
```

</body>

</html>
