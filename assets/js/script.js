'use strict';

/**
 * navbar variables
 */


const navOpenBtn = document.querySelector("[data-menu-open-btn]");
const navCloseBtn = document.querySelector("[data-menu-close-btn]");
const navbar = document.querySelector("[data-navbar]");
const overlay = document.querySelector("[data-overlay]");

const navElemArr = [navOpenBtn, navCloseBtn, overlay];

for (let i = 0; i < navElemArr.length; i++) {

  navElemArr[i].addEventListener("click", function () {

    navbar.classList.toggle("active");
    overlay.classList.toggle("active");
    document.body.classList.toggle("active");

  });

} 



/**
 * header sticky
 */

const header = document.querySelector("[data-header]");

window.addEventListener("scroll", function () {

  window.scrollY >= 10 ? header.classList.add("active") : header.classList.remove("active");

});

var signinBtn = document.getElementById('signin-btn');
signinBtn.addEventListener('click', function() {
  
  window.location.href = '..\Streaming-Platform-Project\logout.php';
});
//trying ajax req

var searching = document.getElementById('searching');
var movies = [];
$(document).ready(function() {
  $.ajax({
    url: '../Streaming-Platform-Project/assets/php/fetchbd.php',
    method: "POST",
    dataType: "json",
    success: function(response) {
      $.each(response, function(index, item) {
        var movie = {
          name: item.name,
          year: item.year,
          image:item.image
        };
        movies.push(movie);
      });
      console.log(movies); // array of movie objects
      
      // create movie cards
      let searchbox=document.getElementsByClassName('searchbox')[0];
      movies.forEach(element => {
        const {name,year,image}=element;
        let card=document.createElement('a');
        card.setAttribute('href', './movie-details.html');
        
        card.innerHTML=` 
        <img src="${image}" alt="">      
        <div class="content">
          <h6>${name}</h6>
          <p>${year}</p>
        </div>
        `;
        searchbox.appendChild(card);
      });
    }
  });
});

let searchbox = document.getElementsByClassName('searchbox')[0];
searching.addEventListener('keyup', () => {
  let filter = searching.value.toUpperCase();
  let a = searchbox.getElementsByTagName('a');
  for (let index = 0; index < a.length; index++) {
    let b = a[index].getElementsByClassName('content')[0];
    let c = b.getElementsByTagName('h6')[0];
    let Textvalue = c.textContent || c.innerText;
    if (Textvalue.toUpperCase().indexOf(filter) > -1) {
      a[index].style.display = '';
      searchbox.style.visibility="visible";
      searchbox.style.opacity=1;
    } else {
      a[index].style.display = 'none';
    }
    if (searching.value.length === 0) {
      searchbox.style.visibility="hidden";
      searchbox.style.opacity=0;
    }
  }
});






