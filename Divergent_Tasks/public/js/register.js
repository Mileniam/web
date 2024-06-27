$(document).ready(function(){
//.registrar usuario
$("#btn-registrar").click(funtion(){
    validator();
});
var validator = function(){
    $("#form-register").validate({

        rules: {
           
            "email":{
                required !0,
                email: !0,
            },
            "password":{
                required: !0,
                minlenght: 8,
            },
            "password2":{
                required: !0,
                equalto: "#password",
            },
        },
        messages: {
            "email":"Por favor ingresa un correo valido",
            "password":{
                required: "Por favor ingresa una contraseña",
                minlenght: "La contraseña debe tener al menos 8 caracteres",
            },
            "password2":{
                required: "Por favor ingresa una contraseña",
                equalto: "Las contraseñas no son iguales",
            }
        },

ignore [],




    })
    //.registrar usuario , no se esto no compila no se jaja xd 

});



