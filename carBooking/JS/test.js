const childs = document.querySelectorAll(".ForArrowBrands li");
const liTranslateX = document.querySelector(".brands li");

let defa = 0;
let count = childs.length - 3;

const LeftArrow = document.querySelector(".fa-caret-left");
const RightArrow = document.querySelector(".fa-caret-right");

RightArrow.addEventListener("click", () => {
  if (defa <= 0 && count >= 1) 
  {
    defa -= 208;
    count -= 1;
    childs.forEach((child) => 
    {
        child.style.transform = `translateX(${defa}px)`;
    });
console.log(count,defa);
  }
});


LeftArrow.addEventListener("click", () => {
  if (defa < 0 && count < (childs.length - 3)) {
    defa += 208;
    count += 1;
    childs.forEach((child) => {
      child.style.transform = `translateX(${defa}px)`;
    });
    console.log(count, defa);
  }
});