//Máscaras do formulário de cadastro
$('#cpf , #dataNascimento,#telefone').on('focus', function () {
    var id = $(this).attr("id");
    if (id == "cpf") { VMasker(document.querySelector("#cpf")).maskPattern("999.999.999-99"); }
    if (id == "dataNascimento") { VMasker(document.querySelector("#dataNascimento")).maskPattern("99/99/9999") };
    if (id == "telefone") { VMasker(document.querySelector("#telefone")).maskPattern("(99) 99999-9999") };

});

//Retorno do root
export function getRoot() {
    var root = "http://" + document.location.hostname + ":8080/barber/";
    return root;
}

// //Ajax do formulário de cadastro
// $("#formCadastro").on("submit",function(event){
//     event.preventDefault();
//     var dados=$(this).serialize();

//     $.ajax({
//        url: getRoot()+'controllers/controllerCadastro',
//         type: 'post',
//         dataType: 'json',
//         data: dados,
//         success: function (response) {
//             $('.retornoCad').empty();
//             if(response.retorno == 'erro'){
//                 $.each(response.erros,function(key,value){
//                     $('.retornoCad').append(value+'<br>');
//                 });
//             }else{
//                 $('.retornoCad').append('Dados inseridos com sucesso!');
//             }
//         }
//     });
// });

//Ajax do formulário de login
$("#formLogin").on("submit", function (event) {
    event.preventDefault();
    var dados = $(this).serialize();

    $.ajax({
        url: getRoot() + 'controllers/controllerLogin',
        type: 'post',
        dataType: 'json',
        data: dados,
        success: function (response) {
            if (response.retorno == 'success') {
                window.location.href = response.page
            } else {
                if (response.tentativas == true) {
                    $('.loginFormulario').hide();
                }
                $('.resultadoForm').empty();
                $.each(response.erros, function (key, value) {
                    $('.resultadoForm').append(value + '<br>');
                });
            }
        }
    });
});

//Ajax do formulário de confirmação de senha
$("#formSenha").on("submit", function (event) {
    event.preventDefault();
    var dados = $(this).serialize();

    $.ajax({
        url: getRoot() + 'controllers/controllerSenha',
        type: 'post',
        dataType: 'json',
        data: dados,
        success: function (response) {
            if (response.retorno == 'success') {
                $('.retornoSen').html("Redefinição de senha enviada com sucesso!");
            } else {
                $('.retornoSen').empty();
                $.each(response.erros, function (key, value) {
                    $('.retornoSen').append(value + '');
                });
            }
        }
    });
});

//CapsLock
$("#senha").keypress(function (e) {
    kc = e.keyCode ? e.keyCode : e.which;
    sk = e.shiftKey ? e.shiftKey : ((kc == 16) ? true : false);
    if (((kc >= 65 && kc <= 90) && !sk) || (kc >= 97 && kc <= 122) && sk) {
        $(".resultadoForm").html("Caps Lock Ligado");
    } else {
        $(".resultadoForm").empty();
    }
});

//modal das atividades
$(document).ready(function () {
    $(document).on('click', '.view_data', function () {
        var user_id = $(this).attr("data-id");
        var ativ = $(this).attr("data-atv");
        var dataAtiv = $(this).attr("data-dataAtv");
        var dataPrazo = $(this).attr("data-prazo");
        var dataObs = $(this).attr("data-obs");
        var dataStatus = $(this).attr("data-status");
        var dataResp = $(this).attr("data-resp");

        //alert(user_id);
        if (user_id !== '') {
            var dados = {
                user_id: user_id
            };
            $("#dataid").val(user_id);
            $("#dataAtiv").val(ativ);
            $("#dataId").val(dataAtiv);
            $("#dataPrazo").val(dataPrazo);
            $("#dataObs").val(dataObs);
            $("#dataStatus").val(dataStatus);
            $("#dataResp").val(dataResp);


        }
    });
});

// Função para mostrar mensagem de erro
function showMsg(fieldId, type, message) {
    // success warning danger 
    const field = document.getElementById(fieldId);
    const divMsg = document.createElement("div");
    const img=document.createElement("img");
    img.setAttribute('src',getRoot()+`img/${type}.svg`);
    divMsg.setAttribute('class', `alert alert-${type} d-flex align-items-center`);
    divMsg.appendChild(img);
    divMsg.innerHTML += message;
    field.appendChild(divMsg);
}

// Função para limpar mensagens de erro
function clearMsg(fieldId) {
    fieldId.innerHTML="";
}