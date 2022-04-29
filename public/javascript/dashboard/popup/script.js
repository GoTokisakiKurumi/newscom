const buttonAlert = document.getElementById('buttonAlert');
const popupAlert = document.getElementById('popup');
const section = document.getElementById('section');
const body = document.getElementById('body');

buttonAlert.addEventListener('click', function(){
  popupAlert.classList.toggle('show');
  section.style.filter = "blur(500px)";
  body.style.position = "fixed";
})
