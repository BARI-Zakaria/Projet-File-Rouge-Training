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

function login(loginForm) {
  if(loginForm.email.value && loginForm.password.value){
    let username = document.getElementById("userName");
    document.write = ('<html><body><h1><b><center>');
    document.write = ("Welcome" + " " + username);
    document.write = ('</html></body></h1></b></center>');
  }else {
    alert('LFARDA KACH KACH !')
  }
}