function clicked(obj) 
{
    const id = obj.id;
    const btn = document.getElementById(id);
    const submitForm = document.getElementsByClassName("editStatus");
    submitForm.display = "block";
    obj.nextElementSibling.style.display = "block";
    btn.style.display = "none";

    const status = document.querySelector(".status".concat(id));
    status.style.display = "none";

    const selectStatus = document.querySelector(".selectStatus".concat(id));
    selectStatus.classList.remove("defaultOff");
    selectStatus.display = "block";
}


function submitSelect(id) 
{
    const form = document.getElementById("form".concat(id));
    form.submit();
}