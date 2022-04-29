<!DOCTYPE html>
<html lang="en">

<head>
  <title></title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="<?= BASEURL; ?>/css/style.css" rel="stylesheet">
</head>

<body>
  <div class="container-registrasi">
    <div class="registrasi">
      <form action="registrasi/postData" method="post" enctype="multipart/form-data" name="form" onsubmit="return validated()">
        <input type=" hidden" name="id_admin" value="2">
        <ul>
          <h1>Registrasi</h1>
          <li><label for="username">Username</label></li>
          <li><input type="text" name="username" id="username" maxlength="20" autofocus autocomplete="off"></li>
          <li>
            <div id="username_error">usename tidak boleh kosong!</div>
          </li>
          <li><label for="email">Email</label></li>
          <li><input type="email" name="email" id="email" maxlength="20" autocomplete="off"></li>
          <li>
            <div id="email_error">Email tidak boleh kosong!</div>
          </li>
          <li><label for="password">Password</label></li>
          <li><input type="password" name="password" id="password" maxlength="20" autocomplete="off"></li>
          <li>
            <div id="password_error">password tidak boleh kosong!</div>
          </li>
          <li><label for="verifikasi">Verifikasi Password</label></li>
          <li><input type="password" name="verifikasi" id="verifikasi" maxlength="20" autocomplete="off"></li>
          <li>
            <div id="username_error">verifikasi tidak boleh kosong!</div>
          </li>
          <li><label for="Profileimage">Profile Image</label></li>
          <li><input type="file" name="Profileimage" id="Profileimage" autocomplete="off"></li>
          <li><button type="submit">Daftar</button></li>
        </ul>
      </form>
    </div>
  </div>
  <script src="<?= BASEURL; ?>/javascript/validated/script.js"></script>
</body>

</html>
