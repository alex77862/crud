let nav = document.querySelector(".header");
window.addEventListener("scroll", (e) => {
  console.log(e);
  if (scrollY > 100) {
    nav.classList.add("active");
  } else {
    nav.classList.remove("active");
  }
});

let loadFile = function (event) {
  let output = document.getElementById("output");
  output.src = URL.createObjectURL(event.target.files[0]);
  output.onload = function () {
    URL.revokeObjectURL(output.src);
  };
};
