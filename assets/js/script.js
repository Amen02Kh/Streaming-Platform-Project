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
  
  window.location.href = 'signin.html';
});



//HETHA code nav bar partie loula tekhdem w thenia feha mochkla
//amalt tableau dobj static khater taa php habetch tekhdem kaed njareb
let test=[{name:"Doctor Strange",year:"2021"},{name:"Sbouei",year:"2021"},{name:"lahir",year:"2021"},{name:"choufli nam",year:"2021"},{name:"falouja",year:"2021"},{name:"darbouka",year:"2021"},{name:"namouma",year:"2021"},{name:"mara fil kar",year:"2021"}];
let searchbox=document.getElementsByClassName('searchbox')[0];
window.addEventListener('load', ()=>{
  test.forEach(element => {
    const {name,year}=element;
    let card=document.createElement('a');
    card.innerHTML=`          
    <div class="content">
      <h6>${name}</h6>
      <p>${year}</p>
    </div>
  `;
  searchbox.appendChild(card);
  });
})
//mochkla tebda lahne
let searching = document.getElementById('searching');
searching.addEventListener('keyup', () => {
  
  let filter = searching.value.toUpperCase();
  let a=searchbox.getElementsByTagName('a');
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
// AHAWA CODE ELI MAFROUDH IHEZ DONNE MEL PHP LEL JS
/* fetch("http://localhost/Streaming-Platform-Project/php/fetchbd.php")
  .then((res) => {
    if (!res.ok) {
      throw new Error("Network response was not ok");
    }
    return res.json();
  })
  .then((data) => {
    
    

  })
const goTopBtn = document.querySelector("[data-go-top]");
fetch("http://localhost/Streaming-Platform-Project/test.php")
.then((res) => res.json())
    .then((data) => {
        const result = JSON.parse(data);
        
    }); */
    
window.addEventListener("scroll", function () {

  window.scrollY >= 500 ? goTopBtn.classList.add("active") : goTopBtn.classList.remove("active");

});
