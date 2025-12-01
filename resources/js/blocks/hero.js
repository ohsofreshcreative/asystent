
document.addEventListener('DOMContentLoaded', function () {
  // Znajdź wszystkie triggery akordeonu na stronie
  var triggers = document.querySelectorAll('.__trigger');

  triggers.forEach(function (trigger) {
    trigger.addEventListener('click', function () {
      // Znajdź kontener z zawartością, który jest "bratem" triggera
      var content = this.nextElementSibling;

      // Sprawdź, czy zawartość jest aktualnie ukryta
      if (content.style.display === "none" || content.style.display === "") {
        content.style.display = "block"; // Pokaż zawartość
      } else {
        content.style.display = "none"; // Ukryj zawartość
      }
    });
  });
});
