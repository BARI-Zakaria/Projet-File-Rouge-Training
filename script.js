
// IF THE INPUT CHECKBOX IS CHECKED TURN THE BUTTON FROM DISABLED TO ENABLE 

function enable() {
    let check = document.getElementById("exampleCheck1");
    let btn = document.getElementById("btn");
    console.log('hello');

    if(check.checked){
        btn.removeAttribute("disabled");
    }else{
        btn.disabled = true;
    }
}

