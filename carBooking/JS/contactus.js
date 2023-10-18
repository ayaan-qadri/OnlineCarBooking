const cancel = document.querySelector(".cancel");
console.log(cancel);
if(cancel) 
{
    cancel.addEventListener("click", () => 
    {
      window.location.href = window.location.href;
    });
}