<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


<title>Admin Login - Anne Marie Academy</title>

<style>
    * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
        font-family: Arial, sans-serif;
    }

    body {
        min-height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        background: linear-gradient(135deg, #dbeafe, #f0f9ff);
    }

    .login-container {
        width: 100%;
        max-width: 420px;
        padding: 20px;
    }

    .login-box {
        background: white;
        padding: 40px 35px;
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
    }

    .school-name {
        text-align: center;
        color: #1e3a8a;
        font-size: 25px;
        font-weight: bold;
        margin-bottom: 8px;
    }

    .system-name {
        text-align: center;
        color: #64748b;
        font-size: 15px;
        margin-bottom: 30px;
    }

    .admin-icon {
        width: 75px;
        height: 75px;
        margin: 0 auto 20px;
        border-radius: 50%;
        background: #2563eb;
        color: white;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 35px;
    }

    h2 {
        text-align: center;
        color: #1e293b;
        margin-bottom: 25px;
    }

    label {
        display: block;
        margin-bottom: 7px;
        color: #334155;
        font-weight: bold;
    }

    input {
        width: 100%;
        padding: 13px;
        border: 1px solid #cbd5e1;
        border-radius: 8px;
        margin-bottom: 18px;
        font-size: 15px;
        outline: none;
    }

    input:focus {
        border-color: #2563eb;
        box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
    }

    .login-button {
        width: 100%;
        padding: 13px;
        border: none;
        border-radius: 8px;
        background: #2563eb;
        color: white;
        font-size: 16px;
        font-weight: bold;
        cursor: pointer;
    }

    .login-button:hover {
        background: #1d4ed8;
    }

    .error {
        background: #fee2e2;
        color: #b91c1c;
        padding: 12px;
        border-radius: 8px;
        margin-bottom: 18px;
        text-align: center;
    }

    .footer {
        text-align: center;
        margin-top: 25px;
        color: #64748b;
        font-size: 13px;
    }
</style>


</head>

<body>

<div class="login-container">

```
<div class="login-box">

    <div class="admin-icon">👤</div>

    <div class="school-name">
        ANNE MARIE ACADEMY
    </div>

    <div class="system-name">
        Management System
    </div>

    <h2>Admin Login</h2>

    <?php if (session()->getFlashdata('error')): ?>
        <div class="error">
            <?= esc(session()->getFlashdata('error')) ?>
        </div>
    <?php endif; ?>

    <form action="<?= site_url('login/authenticate') ?>" method="post">

        <label for="username">Username</label>

        <input
            type="text"
            id="username"
            name="username"
            placeholder="Enter username"
            required
            autocomplete="username"
        >

        <label for="password">Password</label>

        <input
            type="password"
            id="password"
            name="password"
            placeholder="Enter password"
            required
            autocomplete="current-password"
        >

        <button type="submit" class="login-button">
            Login
        </button>

    </form>

    <div class="footer">
        © <?= date('Y') ?> Anne Marie Academy
    </div>

</div>


</div>

</body>
</html>
