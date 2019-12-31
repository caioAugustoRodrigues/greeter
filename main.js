const loginSubmit = document.getElementById('btn_login');

function checkInputs() {
    let loginField = document.getElementById('campo_usuario');
    loginField = loginField.value;
    let passField = document.getElementById('campo_senha');
    passField = passField.value;
    let isEmpty = false;

    if(loginField == '') {
        loginField.style.borderColor = 'red';
        isEmpty = true;
    }

    if(isEmpty){
        return false;
    };
}

loginSubmit.addEventListener('click', checkInputs);
