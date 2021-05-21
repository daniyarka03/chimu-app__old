const step_function = (count) => {
    
    // Variables 
    const block = document.querySelectorAll(`.section-register`);
    const button = document.querySelectorAll(`.section-register__button_next`);
    const button_back = document.querySelectorAll(`.section-register__button_back`);
    
    // Loops for creating function button
    for (let i = 0; i < count; i++) {
        if (i != 3) {
            button[i].onclick = function () {
                block[i].style.display = 'none';
                block[i + 1].style.display = 'block';
            }

            button_back[i].onclick = function () {
                block[i + 1].style.display = 'none';
                block[i].style.display = 'block';
            }
        }
    }
}

step_function(4);