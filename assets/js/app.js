document.addEventListener("DOMContentLoaded", function () {
  let navbarButton = document.querySelector('.burger.navbar-burger');
  navbarButton.addEventListener('click', function (e) {
    document.getElementById(e.target.dataset.target).classList.toggle('is-active');
    e.target.classList.toggle('is-active');
  });
});
//# sourceMappingURL=app.js.map