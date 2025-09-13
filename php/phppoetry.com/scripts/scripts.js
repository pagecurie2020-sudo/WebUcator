function toggleMenu() {
  var x = document.querySelector('#main-nav ul');
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
}

window.addEventListener('load', (e) => {
  var mobileMenuIcon = document.getElementById('mobile-menu-icon');
  mobileMenuIcon.addEventListener('click', (e) => {
    toggleMenu(e);
  });
});