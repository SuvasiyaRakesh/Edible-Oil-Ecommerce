<?php
include 'dbcon.php';
$msg = '';

if (isset($_POST['submit'])) {
    $user = $_POST['username'];
    $mobile = $_POST['mobile'];
    $newpass = $_POST['new_password'];

    $sql = "SELECT * FROM user WHERE username = '$user' AND mobile = '$mobile'";
    $result = $conn->query($sql);

    if ($result->num_rows) {
        $sql2 = "UPDATE user SET password = '$newpass' WHERE username = '$user'";
        if ($conn->query($sql2)) {
            $msg = "✅ Password successfully updated. <a href='login.php'>Login Now</a>";
        } else {
            $msg = "❌ Error updating password.";
        }
    } else {
        $msg = "⚠️ Invalid username or mobile number.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<link rel="icon" type="image/png" href="admin/APFavicon.png">
    <title>Forgot Password</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: #f2f4f8;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .reset-box {
            background: #fff;
            padding: 30px 40px;
            border-radius: 12px;
            box-shadow: 0 0 12px rgba(0,0,0,0.1);
            width: 100%;
            max-width: 400px;
        }

        .reset-box h2 {
            margin-bottom: 20px;
            text-align: center;
            color: #333;
        }

        .reset-box form input[type="text"],
        .reset-box form input[type="password"] {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-sizing: border-box;
        }

        .reset-box form input[type="submit"] {
            width: 100%;
            padding: 12px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-weight: bold;
        }

        .reset-box form input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .msg {
            margin-bottom: 15px;
            text-align: center;
            font-weight: 500;
        }

        .msg a {
            color: #007bff;
            text-decoration: underline;
        }

        .error {
            color: red;
            font-size: 14px;
            margin-top: -8px;
            margin-bottom: 8px;
        }
    </style>
</head>
<body>

<div class="reset-box">
    <h2>Forgot Password</h2>
    <?php if ($msg): ?>
        <div class="msg"><?= $msg ?></div>
    <?php endif; ?>
    
    <form method="post" action="" onsubmit="return validateForm()">
        <input type="text" name="username" id="username" placeholder="Enter Username" required>
        <div id="usernameError" class="error"></div>

        <input type="text" name="mobile" id="mobile" placeholder="Enter Registered Mobile No." required pattern="[0-9]{10}">
        <div id="mobileError" class="error"></div>

        <input type="password" name="new_password" id="password" placeholder="New Password"
            required pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&]).{8,}$"
            title="Must contain at least 8 characters, 1 uppercase, 1 lowercase, 1 number and 1 special character">
        <div id="passwordError" class="error"></div>

        <input type="submit" name="submit" value="Reset Password">
    </form>
</div>

<script>
    function validateForm() {
        let isValid = true;

        // Reset error messages
        document.getElementById("usernameError").textContent = '';
        document.getElementById("mobileError").textContent = '';
        document.getElementById("passwordError").textContent = '';

        // Username validation
        const username = document.getElementById("username").value.trim();
        if (!/^[a-zA-Z0-9]{4,}$/.test(username)) {
            document.getElementById("usernameError").textContent = "Username must be at least 4 alphanumeric characters.";
            isValid = false;
        }

        // Mobile validation
        const mobile = document.getElementById("mobile").value.trim();
        if (!/^[0-9]{10}$/.test(mobile)) {
            document.getElementById("mobileError").textContent = "Mobile number must be exactly 10 digits.";
            isValid = false;
        }

        // Password validation
        const password = document.getElementById("password").value.trim();
        const passwordPattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&]).{8,}$/;
        if (!passwordPattern.test(password)) {
            document.getElementById("passwordError").textContent = "Password must include uppercase, lowercase, number, special character, and be 8+ characters.";
            isValid = false;
        }

        return isValid;
    }
</script>

</body>
</html>
