<!DOCTYPE>
<html>

<head>
  <title>Newscom | login</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?= BASEURL; ?>/css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body>
  <div class="container-login">
    <form class="login" action="login/loginVerify" method="post">
      <h1>Login</h1>
      <ul>
        <li><label for="email">Email</label></li>
        <li><input type="text" name="email" maxlength="20" required autocomplete="off"></li>
        <li><label for="password">Password</label></li>
        <li><input type="password" name="password" required autocomplete="off"></li>
        <li><button type="submit">Login</label></li>
        <li>
          <p><a href="registrasi">daftar</a></p>
        </li>
      </ul>
    </form>
  </div>
</body>

</html>
