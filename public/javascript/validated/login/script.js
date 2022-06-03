const email = document.forms['form']['email'];
const password = document.forms['form']['password'];
const email_error = document.querySelector('.email_error');
const password_error = document.querySelector('.password_error');

email.addEventListener('textInput', email_verify);
password.addEventListener('textInput', password_verify);

function validated() {
  if ( email.value.length < 5 && password.value.length < 5 ) {
    email_error.style.display = 'block';
    email.style.border = '1px solid red';
    password_error.style.display = 'block';
    password.style.border = '1px solid red';
  }
  if ( email.value.length < 5 ) {
    email_error.style.display = 'block';
    email.style.border = '1px solid red';
    return false;
  }
  if ( password.value.length <= 5) {
    password_error.style.display = 'block';
    return false;
  }
}

function email_verify(){
  if ( email.value.length >= 5) {
    email.style.border = '1px solid #0086FF';
    email_error.style.display = 'none';
  } else {
    email.style.border = '1px solid red';
  }
}

function password_verify() {
  if ( password.value.length >= 5 ) {
    password.style.border = '1px solid #0086FF';
    password_error.style.display = 'none';
  } else {
    password.style.border = '1px solid red';
  }
}
