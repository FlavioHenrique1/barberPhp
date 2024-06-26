<?php 
$ReqHandler =new Classes\ClassRequestHandler();

// Recuperar os dados JSON usando a classe utilitária
$data = $ReqHandler->getJsonInput();

echo json_encode($data);