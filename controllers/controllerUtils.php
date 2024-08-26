<?php 
$ReqHandler =new Classes\ClassRequestHandler();
$Classagend=new Classes\ClassAgendamento();
// Verificar o método da requisição
$request_method = $_SERVER['REQUEST_METHOD'];

if ($request_method === 'GET') {
// Ação para requisições GET
    $paramentros=\Traits\TraitParseUrl::parseUrl(2);
    if($paramentros == "getHorario"){
        $valor=\Traits\TraitParseUrl::parseUrl(3);
        $retorno = $Classagend->getHorario($valor);
    }
    echo json_encode($retorno);
} elseif ($request_method === 'POST') {
    // Ação para requisições POST
    // Recuperar os dados JSON usando a classe utilitária
    // $data = $ReqHandler->getJsonInput();
    // $Classagend->validateCampos($data);
    // $ret = $Classagend->validateFinalAgend($data);
    // $Classagend->getHorario($data['data']);
    // echo json_encode($ret);
} elseif ($request_method === 'DELETE') {
    // Ação para requisições DELETE
    echo "Método DELETE";
} else {
    // Ação padrão para outros métodos
    echo "Método desconhecido";
}
