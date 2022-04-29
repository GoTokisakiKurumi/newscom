  const hidden = document.forms['form']['id_admin'];
  const username = document.forms['form']['username'];
  const email = document.forms['form']['email'];
  const password = document.forms['form']['password'];

  const username_error = document.getElementById('username_error');
  const email_error = document.getElementById('email_error');

  hidden.style.display = 'none';

  username.addEventListener('textInput', username_verify);
  email.addEventListener('textInput', email_verify);

  function validated() {
    if (username.value.length < 9) {
      username.style.border = '2px solid red';
      username.style.borderRadius = '3px';
      username_error.style.display = 'block';
      username.style.outline = 'none';
      return false;
    }
    if (email.value.length < 9) {
      email.style.border = '2px solid red';
      email.style.borderRadius = '3px';
      email_error.style.display = 'block';
      email.style.outline = 'none';
      return false;
    }
    if (password.value.length < 6 ) {
      password.style.border = '2px solid red';
      password.style.borderRadius = '3px';
      password_error.style.display = 'block';
      return false;
    }
  }

  function username_verify() {
    if (username.value.length >= 8) {
      username.style.border = '2px solid #0086FF';
      username_error.style.display = 'none';
      console.log(username.value);
      return true;
    }
  }

  function email_verify() {
    if (email.value.length >= 8) {
      email.style.border = '2px solid #0086FF';
      email_error.style.display = 'none';
      return true;
    }
  }

