const myslide = document.querySelectorAll('.slide')
let counter = 1;
slidefun(counter);

let timer = setInterval(autoSlide, 5000);
function autoSlide() {
	counter += 1;
	slidefun(counter);
}

function resetTimer() {
	clearInterval(timer);
	timer = setInterval(autoSlide, 5000);
}

function slidefun(n) {
	
	let i;
	for(i = 0;i<myslide.length;i++){
		myslide[i].style.display = "none";
	}
	if(n > myslide.length){
	   counter = 1;
	   }
	if(n < 1){
	   counter = myslide.length;
	   }
	myslide[counter - 1].style.display = "block";
}


const navigation = document.querySelector('.navigation');
const views_Bars = document.getElementById('views_Bars');

navigation.addEventListener('click', function(e){
  if ( e.target.className == 'fa-solid fa-bars') {
    views_Bars.classList.toggle('slide-bars');
  }
});
