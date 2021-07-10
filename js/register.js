$(document).ready(function() {

    var $modal = $('#modal');

    var image = document.getElementById('sample_image');

    var cropper;

    $('#upload_image').change(function(event) {
        var files = event.target.files;

        var done = function(url) {
            image.src = url;
            $modal.modal('show');
        };

        if (files && files.length > 0) {
            reader = new FileReader();
            reader.onload = function(event) {
                done(reader.result);
            };
            reader.readAsDataURL(files[0]);
        }
    });

    $modal.on('shown.bs.modal', function() {
        cropper = new Cropper(image, {
            aspectRatio: 1,
            viewMode: 3,
            preview: '.preview'
        });
    }).on('hidden.bs.modal', function() {
        cropper.destroy();
        cropper = null;
    });

    $('#crop').click(function() {
        canvas = cropper.getCroppedCanvas({
            width: 400,
            height: 400
        });

        canvas.toBlob(function(blob) {
            url = URL.createObjectURL(blob);
            var reader = new FileReader();
            reader.readAsDataURL(blob);
            reader.onloadend = function() {
                var base64data = reader.result;
                $.ajax({
                    url: 'upload.php',
                    method: 'POST',
                    data: {
                        image: base64data
                    },
                    success: function(data) {
                        $modal.modal('hide');
                        $('#uploaded_image').attr('src', data);
                        $('#uploaded_image2').attr('src', data);
                    }
                });
            };
        });
    });

});
const email_input = document.querySelector('input[type="email"]');
const firstname_input = document.querySelector('input[name="firstname"]');
const lastname_input = document.querySelector('input[name="lastname"]');
const password_input = document.querySelector('input[name="password"]');
const confirm_password_input = document.querySelector('input[name="password_2"]');
const button_next_1 = document.querySelector('.next_1');


email_input.addEventListener('blur', () => {
    let email_input_val = $(email_input).val();
    let email_format = /[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?/;
    $.ajax({
		type: "POST",
		url: "./send.php",
        dataType: 'json',
		data: {
            email: email_input_val
        },
		success: function(data) {
	
            if (data.status) {
                $('#error_message_email').text();
                $('.email').css({
                    'color': '',
                    'border-bottom': ''
                });
                if (email_format.test(String(email_input_val).toLowerCase())) {
                    $('#error_message_email').text('');     
                    $('.email').css({
                        'color': '',
                        'border-bottom': ''
                    }); 
                } else {
                    $('#error_message_email').text('Неверный формат email!');
                    $('.email').css({
                        'color': '#ff3748',
                        'border-bottom': '1px solid #ff3748'
                    });
                }
            } else {
                $('#error_message_email').text('Такой email уже зарегистрирован!');
                $('.email').css({
                    'color': '#ff3748',
                    'border-bottom': '1px solid #ff3748'
                });
            }
		},
		error:  function(xhr, str){
			alert("Возникла ошибка!");
		}
	});
});

firstname_input.addEventListener('blur', () => {
    if ($(firstname_input).val().length < 2) {
        $('#error_message_firstname').text('Ваше имя должно состоять минимум из 2 символов');
        $(firstname_input).css({
            'color': '#ff3748',
            'border-bottom': '1px solid #ff3748'
        });
    } else {
        $('#error_message_firstname').text('');
        $(firstname_input).css({
            'color': '',
            'border-bottom': ''
        });
    }
});

lastname_input.addEventListener('blur', () => {
    if ($(lastname_input).val().length < 2) {
        $('#error_message_lastname').text('Ваше фамилия должно состоять минимум из 2 символов');
        $(lastname_input).css({
            'color': '#ff3748',
            'border-bottom': '1px solid #ff3748'
        });
    } else {
        $('#error_message_lastname').text('');
        $(lastname_input).css({
            'color': '',
            'border-bottom': ''
        });
    }
});

firstname_input.addEventListener('blur', () => {
    if ($(firstname_input).val().length < 2) {
        $('#error_message_firstname').text('Ваше имя должно состоять минимум из 2 символов');
        $(firstname_input).css({
            'color': '#ff3748',
            'border-bottom': '1px solid #ff3748'
        });
    } else {
        $('#error_message_firstname').text('');
        $(firstname_input).css({
            'color': '',
            'border-bottom': ''
        });
    }
});

confirm_password_input.addEventListener('blur', () => {
    if ($(confirm_password_input).val() != $(password_input).val()) {
        $('#error_message_password').text('Пароли не совпадают');
        $('#error_message_confirm_password').text('Пароли не совпадают');
        $(confirm_password_input).css({
            'color': '#ff3748',
            'border-bottom': '1px solid #ff3748'
        });
        $(password_input).css({
            'color': '#ff3748',
            'border-bottom': '1px solid #ff3748'
        });
    } else {
        $('#error_message_password').text('');
        $('#error_message_confirm_password').text('');
        $(confirm_password_input).css({
            'color': '',
            'border-bottom': ''
        });
        $(password_input).css({
            'color': '',
            'border-bottom': ''
        });
    }
});

password_input.addEventListener('blur', () => {
    if ($(confirm_password_input).val() != $(password_input).val()) {
        $('#error_message_password').text('Пароли не совпадают');
        $('#error_message_confirm_password').text('Пароли не совпадают');
        $(confirm_password_input).css({
            'color': '#ff3748',
            'border-bottom': '1px solid #ff3748'
        });
        $(password_input).css({
            'color': '#ff3748',
            'border-bottom': '1px solid #ff3748'
        });
    } else {
        $('#error_message_password').text('');
        $('#error_message_confirm_password').text('');
        $(confirm_password_input).css({
            'color': '',
            'border-bottom': ''
        });
        $(password_input).css({
            'color': '',
            'border-bottom': ''
        });
    }
});




// File Upload Change Event
$('#file_upload').on('change', function() {
    $('.section-register__label_text').text('Фото загружено!')
});

let count = 4;

const require_step_1 = document.querySelectorAll('.require_step_1');
const error_message_step_1 = document.querySelectorAll('.error_message_step_1');

const require_step_2 = document.querySelectorAll('.require_step_2');
const error_message_step_2 = document.querySelectorAll('.error_message_step_2');

const error_message_step_3 = document.querySelectorAll('.error_message_step_3');



for (let i = 0; i < count; i++) {
    if (i != (count - 1)) {
        button[i].onclick = function () {
            if (i == 0) {
                for (let n = 0; n < require_step_1.length; n++) {
                    if ($(require_step_1[n]).val() == "") {
                        $(error_message_step_1[n]).text("Заполните поле!");
                        $(require_step_1[n]).css({
                            'color': '#ff3748',
                            'border-bottom': '1px solid #ff3748'
                        });
                    } 
                    if ($(error_message_step_1).text() == "") {
                        block[i + 1].style.display = 'block';
                        block[i].style.display = 'none';
                    }
                } 
            }
            if (i == 1) {

                if ($('.chosen-single span').text() != "") {
                    for (let n = 0; n < 2; n++) {
                        const dropdown_item = document.querySelectorAll('.chosen-choices');
                        if (dropdown_item.length != 0) {
                            if (dropdown_item[n].childElementCount > 1){
                                $(error_message_step_2[n]).text("");
                            } else {
                                $(error_message_step_2[n]).text("Выберите минимум 1 навык!");
                            }
                        }
                       
                    } 
                
                if ($('.chosen-single span').text() == "ВыберитеВыберите") {
                    $(error_message_step_2[2]).text("Выберите страну!");
                } else {
                    $(error_message_step_2[2]).text("");
                }


                if ($('input[type="date"]').val() == "") {
                    $(error_message_step_2[3]).text("Выберите дату рождения!");
                } else {
                    $(error_message_step_2[3]).text("");
                }

                if ($(error_message_step_2).text() == "") {
                    block[i + 1].style.display = 'block';
                    block[i].style.display = 'none';
                }
                
                } else {
                    block[i + 1].style.display = 'block';
                    block[i].style.display = 'none';
                }
                
                    
            }
            
            if (i == 2) {
                if ($('.register__step_3 .chosen-single span').text() == "Выберите") {
                    $(error_message_step_3[0]).text("Выберите пол!");
                } else {
                    $(error_message_step_3[0]).text("");
                }
                if ($(error_message_step_3).text() == "") {
                    block[i + 1].style.display = 'block';
                    block[i].style.display = 'none';
                }

            }
          
        }

        button_back[i].onclick = function () {
            block[i + 1].style.display = 'none';
            block[i].style.display = 'block';
        }
    }
}