  const hidden = document.forms['form']['id_admin'];
  const username = document.forms['form']['username'];
  const email = document.forms['form']['email'];
  const password = document.forms['form']['password'];
  const verifikasi = document.forms['form']['verifikasi'];

  const button_image = document.querySelector('.fa-solid');
  const filesimage = document.getElementById('Profileimage');
  const imageprofile = document.getElementById('imageProfile');
  const iconimage = document.querySelector('.fa-solid');

  const username_error = document.getElementById('username_error');
  const email_error = document.getElementById('email_error');
  const password_error = document.getElementById('password_error');
  const verifikasi_error = document.getElementById('verifikasi_error');

  hidden.style.display = 'none';

  username.addEventListener('textInput', username_verify);
  email.addEventListener('textInput', email_verify);
  password.addEventListener('textInput', password_verify);
  verifikasi.addEventListener('textInput', verifikasi_verify);
  filesimage.addEventListener('change', profile);
  
  function validated () {
    if ( username.value.length < 5) {
      username_error.style.display = 'block';
      return false;
    } else if ( password.value !== verifikasi.value ) {
      verifikasi_error.style.display = 'block';
      return false;
    } else if ( email.value.length < 10 ) {
      email_error.style.display = 'block';
      return false;
    } else if ( password.value.length < 7 ) {
      password_error.style.display = 'block';
      return false;
    }
  }

  function username_verify() {
    if ( username.value.length >= 5 ) {
      username.style.border = '1px solid #0086FF';
      username_error.style.display = 'none';
    } else {
      username.style.border = '1px solid red';
    }
  }

  function email_verify () {
    if ( email.value.length >= 10 ) {
      email.style.border = '1px solid #0086FF';
      email_error.style.display = 'none';
    } else {
      email.style.border = '1px solid red';
    }
  }

  function password_verify () {
    if ( password.value.length >= 6 ) {
      password.style.border = '1px solid #0086FF';
      password_error.style.display = 'none';
    } else {
      password.style.border = '1px solid red';
    }
  }

  function verifikasi_verify () {
    if ( verifikasi.value.length >= 6 ) {
      verifikasi.style.border = '1px solid #0086FF';
      verifikasi_error.style.display = 'none';
    } else {
      verifikasi.style.border = '1px solid red';
    }
  }

  button_image.addEventListener('click', function(){
    filesimage.click();
  });

  function profile () {
    const file = this.files[0];
    if (file) {
      const reader = new FileReader();
      reader.onload = function() {
        const result = reader.result;
        const type = ['image/jpg','image/jpeg','image/png'];
        const check = type.includes(file['type']);
        if ( true == check ) {
          iconimage.style.display = 'none';
          imageprofile.src = result;
        }
      }
      reader.readAsDataURL(file);
    }
  }
