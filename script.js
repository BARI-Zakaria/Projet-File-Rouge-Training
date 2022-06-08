function enable() {
    let check = document.getElementById("exampleCheck1");
    let btn = document.getElementById("btn");
    console.log('hello');

    if(check.checked){
    console.log('hello!!!');
        btn.removeAttribute("disabled");
    }else{
        btn.disabled = true;
    }
}