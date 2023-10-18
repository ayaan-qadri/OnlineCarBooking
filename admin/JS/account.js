const addUser = document.querySelector(".addUserBtn");
const cancel = document.querySelector(".cancel");

addUser.addEventListener("click",()=>{

    const addUser = document.querySelector(".mainAddUser");
    addUser.style.display = "flex";
    document.body.style.overflow = 'hidden';
});

if(cancel)
{
    cancel.addEventListener("click",()=>{

        window.location.href = window.location.href;
    });
}


