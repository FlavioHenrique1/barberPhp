//Máscaras do formulário de cadastro
$('#cpf , #dataNascimento,#telefone').on('focus', function () {
    var id = $(this).attr("id");
    if (id == "cpf") { VMasker(document.querySelector("#cpf")).maskPattern("999.999.999-99"); }
    // if (id == "dataNascimento") { VMasker(document.querySelector("#dataNascimento")).maskPattern("99/99/9999") };
    if (id == "telefone") { VMasker(document.querySelector("#telefone")).maskPattern("(99) 99999-9999") };

});

//Retorno do root
export function getRoot() {
    var root = "http://" + document.location.hostname + ":8080/barber/";
    return root;
}

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
    let kc = e.keyCode ? e.keyCode : e.which;
    let sk = e.shiftKey ? e.shiftKey : ((kc == 16) ? true : false);
    if (((kc >= 65 && kc <= 90) && !sk) || (kc >= 97 && kc <= 122) && sk) {
        $(".resultadoForm").html("Caps Lock Ligado");
    } else {
        $(".resultadoForm").empty();
    }
});

// Função para mostrar mensagem de erro
export function showMsg(fieldId, type, message) {
    clearMsg(fieldId);
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
export function clearMsg(fieldId) {
    const field = document.getElementById(fieldId);
    field.innerHTML="";
}