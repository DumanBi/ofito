$(document).ready(function() {
    $("#login").validate({
        rules: {
            login: {
                required: true,
                minlength: 2,
                maxlength: 32
            },
            password: {
                required: true,
                digits: true,
                minlength: 6,
                maxlength: 32
            },
        },
        messages: {
            login: {
                required: "Обязательно для заполнения",
                minlength: "Логин не должно быть меньше 2 знаков",
                maxlength: "Максимальная длина 32",
            },
            password: {
                required: "Обязательно для заполнения",
                minlength: "Минимально 6 знаков",
                maxlength: "Максимально 32 знаков",
            },
        }
    });
})