const step_function = (count, block, button, button_back, count_inputs_block_first, count_inputs_block_second, count_inputs_block_thirth) => {
    // Loops for creating function button
    for (let i = 0; i < count; i++) {

        if (i != (count - 1)) {
            button[i].onclick = function () {
                // let f = 0;
                block[i].style.display = 'none';
                block[i + 1].style.display = 'block';
                // if (i == 0) {
                //     for (let n = 0; n < count_inputs_block_first; n++) {
                //         if (!$(require_input[n]).val()) {
                //             $(require_input[n]).css("border-bottom", "1px solid red");
                //         } else {
                //             f++;
                //             $(require_input[n]).css("border-bottom", "1px solid white");
                //         }
                //     }
                    
    
                //    if (f == count_inputs_block_first) {
                //     block[i].style.display = 'none';
                //     block[i + 1].style.display = 'block';
                //    }
                // }

                // if (i == 1) {
                //     for (let n = 0; n < count_inputs_block_second; n++) {
                //         if (!$(require_input[n]).val()) {
                //             $(require_input[n]).css("border-bottom", "1px solid red");
                //         } else {
                //             f++;
                //             $(require_input[n]).css("border-bottom", "1px solid white");
                //         }
                //     }
                    
    
                //    if (f == count_inputs_block_second) {
                //     block[i].style.display = 'none';
                //     block[i + 1].style.display = 'block';
                //    }
                // }

                // if (i == 2) {
                //     for (let n = 0; n < count_inputs_block_thirth; n++) {
                //         if (!$(require_input[n]).val()) {
                //             $(require_input[n]).css("border-bottom", "1px solid red");
                //         } else {
                //             f++;
                //             $(require_input[n]).css("border-bottom", "1px solid white");
                //         }
                //     }
                    
    
                //    if (f == count_inputs_block_thirth) {
                //     block[i].style.display = 'none';
                //     block[i + 1].style.display = 'block';
                //    }
                // }
                
            }

            button_back[i].onclick = function () {
                block[i + 1].style.display = 'none';
                block[i].style.display = 'block';
            }
        }

    }
}