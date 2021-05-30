const step_function = (count, block, button, button_back) => {
    // Loops for creating function button
    for (let i = 0; i < count; i++) {

        if (i != (count - 1)) {
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