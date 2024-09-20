document.addEventListener("DOMContentLoaded", function () {
  const textElement = document.querySelector(".typing-text");
  const text = textElement.textContent;
  textElement.textContent = "";
  let index = 0;

  function type() {
    if (index < text.length) {
      textElement.textContent += text.charAt(index);
      index++;
      setTimeout(type, 100); // Adjust speed by changing 100
    } else {
      textElement.style.borderRight = "2px solid transparent";
      setTimeout(
        () => (textElement.style.borderRight = "2px solid #ffffff"),
        500
      );
    }
  }

  type();
});
setTimeout(function () {
  let successAlert = document.querySelector(".fade-out");
  if (successAlert) {
    successAlert.style.transition = "opacity 0.5s ease";
    successAlert.style.opacity = "0";
    setTimeout(function () {
      successAlert.remove();
    }, 500);
  }
}, 8000);
