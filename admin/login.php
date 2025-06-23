<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login | Edible Oils Store</title>
  <link rel="icon" type="image/png" href="APFavicon.png">
 
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

  <style>
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins', sans-serif;
}

body {
  background: linear-gradient(to bottom right, #fdf7e3, #f5e6d1);
  height: 100vh;
  display: flex;
  align-items: center;
  justify-content: center;
}

.container {
  display: flex;
  max-width: 850px;
  width: 80%;
  background: rgba(255, 255, 255, 0.9); /* Glassmorphism effect */
  backdrop-filter: blur(10px);
  border-radius: 15px;
  box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
  overflow: hidden;
  transition: all 0.3s ease-in-out;
}

.left {
  flex: 1;
  display: flex;
  align-items: center;
  justify-content: center;
  background: #f9f9f9;
}

.left img {
  width: 100%;
  height: 100%;
  object-fit: contain; /* Ensures full fit without extra space */
}

.right {
  flex: 1;
  padding: 40px;
  display: flex;
  flex-direction: column;
  justify-content: center;
}

.right h2 {
  font-size: 26px;
  font-weight: 700;
  color: #333333;
  margin-bottom: 20px;
  text-align: center;
}

.form-group {
  margin-bottom: 15px;
}

.form-group input {
  width: 100%;
  height: 50px;
  padding: 0 15px;
  font-size: 16px;
  border: 2px solid transparent;
  border-radius: 8px;
  background: rgba(255, 255, 255, 0.7);
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
  transition: all 0.3s;
}

.form-group input:focus {
  border-color: #f4a950;
  outline: none;
  background: white;
}

.form-options {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-bottom: 20px;
}

.form-options label {
  font-size: 14px;
  color: #555;
}

.form-options a {
  font-size: 14px;
  color: #f4a950;
  text-decoration: none;
  transition: color 0.3s;
}

.form-options a:hover {
  color: #e89e44;
  text-decoration: underline;
}

button {
  width: 100%;
  height: 50px;
  font-size: 18px;
  font-weight: 600;
  color: #ffffff;
  background: linear-gradient(45deg, #f4a950, #e89e44);
  border: none;
  border-radius: 8px;
  cursor: pointer;
  box-shadow: 0 4px 8px rgba(244, 169, 80, 0.3);
  transition: all 0.3s ease;
}

button:hover {
  background: linear-gradient(45deg, #e89e44, #d27c2c);
  transform: translateY(-2px);
}

@media (max-width: 768px) {
  .container {
    flex-direction: column;
    width: 90%;
  }

  .left {
    height: 220px;
  }

  .right {
    padding: 25px;
  }

  button {
    font-size: 16px;
  }
}

  </style>
</head>

<body>
  <div class="container">
    <div class="left">
      <img src="BrandLogo.png" alt="Company Logo">
    </div>
    <div class="right">
      <h2>Welcome Back Admin</h2>
      <form method="post" action="include/check.php">
        
        <!-- Email or Username -->
        <div class="form-group">
          <input 
            type="text" 
            name="email" 
            placeholder="Enter your username or email" 
            required 
            pattern="^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}|[a-zA-Z0-9]{4,}$"
            title="Enter a valid email or username (min 4 characters)">
        </div>

        <!-- Password Field -->
        <div class="form-group">
          <input 
            type="password" 
            name="password" 
            placeholder="Enter your password" 
            required
            pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&]).{8,}$"
            title="Password must contain at least 8 characters, including uppercase, lowercase, number, and special character.">
        </div>

        <!-- Options -->
        <div class="form-options">
          <label for="remember">
            <input type="checkbox" id="remember" name="remember"> Remember me
          </label>
          <a href="forgot-password.php">Forgot your password?</a>
        </div>

        <!-- Submit -->
        <button type="submit">Login</button>
      </form>
    </div>
  </div>
</body>


</html>
