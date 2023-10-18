const add = document.querySelector(".addBtn");
const cancel = document.querySelectorAll(".cancel");


add.addEventListener("click", () => {
  const add = document.querySelector(".mainAMBC");
  add.style.display = "flex";
});

if (cancel) {
  cancel.forEach((cancel) => {
    cancel.addEventListener("click", () => {
      window.location.href = window.location.href;
    });
  });
}