document.addEventListener('DOMContentLoaded', function() {
  const menuToggle = document.querySelector('.menu-toggle');
  const dropdownContent = document.querySelector('.dropdown-content');

  menuToggle.addEventListener('click', function() {
    menuToggle.classList.toggle('open');
    dropdownContent.classList.toggle('show');
  });
});

let count = 1;
document.getElementById("radio1").checked=true;

setInterval(function(){
  nextImage();
}, 5000)

function nextImage(){
  count++;
  if(count>3){
    count=1;
  }

  document.getElementById("radio"+count).checked=true;
}