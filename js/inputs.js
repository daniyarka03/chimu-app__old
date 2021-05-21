const inputs = document.querySelectorAll('.section-register__input');
for (let i = 0; i < inputs.length; i++) {
    inputs[i].onblur = function () {
        if (inputs[i].value == '') { // не email
            inputs[i].classList.add('invalid');
            console.log('Пожалуйста, введите что нибудь');
            inputs[i].style.borderBottom = "1px solid #fff";
        } else {
            inputs[i].style.borderBottom = "2px solid #FFDE88";
        }
    };

    inputs[i].onfocus = function () {
        inputs[i].style.borderBottom = "2px solid #FFDE88";
    };
}