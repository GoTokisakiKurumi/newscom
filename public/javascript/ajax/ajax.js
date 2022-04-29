const search = document.getElementById('search');
const button = document.getElementById('button');
const main = document.getElementById('main');

search.addEventListener('keyup', function() {
  const ajax = new XMLHttpRequest();
  ajax.onreadystatechange = function() {
    if ( ajax.readyState == 4 && ajax.status == 200 ) {
      main.innerHTML = ajax.responseText;
    }
  }

  ajax.open('GET', 'http://localhost:8000/News.com/App/views/system/dashboard/system/ajax/searching.php?search=' + search.value , true);
  ajax.send();
})
