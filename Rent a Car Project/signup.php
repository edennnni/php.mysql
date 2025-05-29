<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="apple-touch-icon" href="/docs/5.1/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
    <link rel="icon" href="/docs/5.1/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
    <link rel="icon" href="/docs/5.1/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
    <link rel="manifest" href="/docs/5.1/assets/img/favicons/manifest.json">
    <link rel="mask-icon" href="/docs/5.1/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
    <link rel="icon" href="/docs/5.1/assets/img/favicons/favicon.ico">
    <style>
/* Tesla-inspired dark theme */

body {
    background: #181a20;
    color: #fff;
    font-family: 'Montserrat', Arial, sans-serif;
    margin: 0;
    padding: 0;
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
}

.form-container {
    background: #22232a;
    padding: 2.5rem 2rem;
    border-radius: 12px;
    box-shadow: 0 8px 32px rgba(0,0,0,0.25);
    width: 350px;
    text-align: center;
}

h2 {
    font-weight: 700;
    letter-spacing: 2px;
    margin-bottom: 1.5rem;
    color: #e82127;
}

input[type="email"],
input[type="password"] {
    width: 90%;
    padding: 0.9rem;
    margin: 0.7rem 0;
    border: none;
    border-radius: 6px;
    background: #181a20;
    color: #fff;
    font-size: 1rem;
    outline: none;
    transition: background 0.2s;
}

input[type="email"]:focus,
input[type="password"]:focus {
    background: #23242b;
}

button[type="submit"] {
    width: 100%;
    padding: 0.9rem;
    background: #e82127;
    color: #fff;
    border: none;
    border-radius: 6px;
    font-size: 1.1rem;
    font-weight: 600;
    letter-spacing: 1px;
    cursor: pointer;
    margin-top: 1rem;
    transition: background 0.2s;
}

button[type="submit"]:hover {
    background: #b71c1c;
}

.error {
    color: #ff5252;
    margin-bottom: 1rem;
    font-weight: 500;
}

a {
    color: #e82127;
    text-decoration: none;
    font-weight: 500;
}

a:hover {
    text-decoration: underline;
}

p {
    margin-top: 1.2rem;
    font-size: 0.97rem;
    color: #b0b3b8;
}
    </style>
    </head>
<body class="text-center">
<!-- Creating a form which will post us some data in register.php file -->
<main class="form-signin">
  <form action="register.php" method="post">
    <img class="mb-4" src="https://getbootstrap.com/docs/5.1/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">
    <h1 class="h3 mb-3 fw-normal">Register</h1>


    <div class="form-floating">
      <input type="text" class="form-control" id="floatingInput" placeholder="Emri" name="emri">
      <label for="floatingInput">Name</label>
    </div>
    <div class="form-floating">
      <input type="text" class="form-control" id="floatingInput" placeholder="Username" name="username">
      <label for="floatingInput">Username</label>
    </div> ]
    <div class="form-floating">
      <input type="email" class="form-control" id="floatingInput" placeholder="Email" name="email">
      <label for="floatingInput">Email</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" id="floatingInput" placeholder="Password" name="password">
      <label for="floatingInput">Password</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" id="floatingPassword" placeholder="Confirm Password" name="confirm_password">
      <label for="floatingPassword">Confirm Password</label>
    </div><div class="checkbox mb-3">
      <label>
        <input type="checkbox" value="remember-me"> Remember me
      </label>
    </div>
    <button class="w-100 btn btn-lg btn-primary" type="submit" name="submit">Sign up</button>
    <span>Already have an account: </span><a href="login.php">Sign in</a>
  </form>
</main>


</body>
</html>