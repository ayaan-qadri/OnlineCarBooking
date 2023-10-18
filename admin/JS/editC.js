const add=document.querySelector(".addBtn");
const cancel=document.querySelectorAll(".cancel");
const addB = document.querySelector(".addCard");

console.log(addB);

add.addEventListener("click", () => {
  const add = document.querySelector(".mainAMBC");
  add.style.display = "flex";
    
});

addB.addEventListener("click", () => {
  const addb = document.querySelector(".brandForm");
  addb.style.display = "flex";
  
});

if (cancel) {
  cancel.forEach(cancel => {
    cancel.addEventListener("click", () => {
      window.location.href = window.location.href;
    });
  });
}

console.log("working!!",cancel)
