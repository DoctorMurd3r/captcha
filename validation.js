let form = $('#form');
let usernameInput = $('#username'); 
let emailInput = $('#email');
let messageInput = $('#message');
let captchaInput = $('#captcha');

let regLatNum = /^[A-Za-z0-9]+$/;
let regEmail = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{1,5})$/;
let regMessage = /^[.,A-Za-zА-Яа-я0-9\s]+$/;

let error = false;




form.bind('submit', function(event){
    validationForm();
    if(error){
        event.preventDefault();   
    }
})

// $.ajax({
//     url: '/index.php',         /* Куда отправить запрос */
//     method: 'post',             /* Метод запроса (post или get) */
//     dataType: 'html',          /* Тип данных в ответе (xml, json, script, html). */
//     data: {text: 'Текст'},     /* Данные передаваемые в массиве */
//     success: function(data){   /* функция которая будет выполнена после успешного запроса.  */
//          alert(data); /* В переменной data содержится ответ от index.php. */
//     }
// });

function validationForm(){
    $('.error').remove();
    console.log(usernameInput.val() + ' - ' + emailInput.val() + ' - ' + messageInput.val())

    error = false;
    if(usernameInput.val().length <= 0){
        usernameInput.after("<label class='error' style='color:red; margin-left:5px'>Обязательное поле</label>");
        error = true;
    } else if(!regLatNum.test(usernameInput.val())){
        usernameInput.after("<label class='error' style='color:red; margin-left:5px'>Поле должно содержать только латинские буквы и цифры</label>");
        error = true; 
    }

    if(emailInput.val().length <= 0){
        emailInput.after("<label class='error' style='color:red; margin-left:5px'>Обязательное поле</label>");
        error = true;
    } else if(!regEmail.test(emailInput.val())){
        emailInput.after("<label class='error' style='color:red; margin-left:5px'>Введите адрес электронной почты корректно</label>");
        error = true;
    }

    if(messageInput.val().length <= 0){
        messageInput.after("<label class='error' style='color:red; margin-left:5px'>Обязательное поле</label>");
        error = true;
    } else if (!regMessage.test(messageInput.val())){
        messageInput.after("<label class='error' style='color:red; margin-left:5px'>Сообщение может содержать только буквы русского и латинского алфавитов и цифры</label>");
        error = true;
    }

    if(captchaInput.val().length <= 0){
        captchaInput.after("<label class='error' style='color:red; margin-left:5px'>Укажите код с картинки</label>");
        error = true;
    } 
     






    return error;
}


