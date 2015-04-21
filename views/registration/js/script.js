$(function(){
    $('.delete').click(function(e){
        e.preventDefault;
        
        var c = confirm("Are you sure you want to delete?");
        if(c == false) return false;
    });
});

$(document).ready(function() {
    $("#registration").validate({
        rules: {
            login: {
                required: true,
                minlength: 2,
                maxlength: 32
            },
            password: {
                required: true,
                minlength: 6,
                maxlength: 32
            },
            name: {
                required: true,
                minlength: 2,
                maxlength: 32
            },
            surname: {
                required: true,
                minlength: 2,
                maxlength: 32
            },
            office: {
                required: true,
                digits: true
            }
        },
        messages: {
            login: {
                required: "Обязательно для заполнения",
                minlength: "Имя не должно быть меньше 2 знаков",
                maxlength: "Максимальная длина 32"
            },
            password: {
                required: "Обязательно для заполнения",
                minlength: "Минимально 6 знаков",
                maxlength: "Максимально 32 знаков"
            },
            name: {
                required: "Обязательно для заполнения",
                minlength: "Имя не должно быть меньше 2 знаков",
                maxlength: "Максимальная длина 32"
            },
            surname: {
                required: "Обязательно для заполнения",
                minlength: "Имя не должно быть меньше 2 знаков",
                maxlength: "Максимальная длина 32"
            },
            office: {
                required: "Обязательно для заполнения",
                digits: "Вводите только цифры"
            }
        }
    });
})