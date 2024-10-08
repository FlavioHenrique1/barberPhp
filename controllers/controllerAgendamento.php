<?php 
$ReqHandler =new Classes\ClassRequestHandler();
$Classagend=new Classes\ClassAgendamento();
// Verificar o método da requisição
$request_method = $_SERVER['REQUEST_METHOD'];

if ($request_method === 'GET') {
    // Ação para requisições GET
    echo "Método GET";
} elseif ($request_method === 'POST') {
    // Ação para requisições POST
    // Recuperar os dados JSON usando a classe utilitária
    $data = $ReqHandler->getJsonInput();
    $Classagend->validateCampos($data);
    $Classagend->getHorario($data['data'],$data['horario']);
    $ret = $Classagend->validateFinalAgend($data);
    echo $ret;
} elseif ($request_method === 'DELETE') {
    // Ação para requisições DELETE
    echo "Método DELETE";
} else {
    // Ação padrão para outros métodos
    echo "Método desconhecido";
}
