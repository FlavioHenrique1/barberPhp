<?php
$ReqHandler =new Classes\ClassRequestHandler();

// Recuperar os dados JSON usando a classe utilitária
$data = $ReqHandler->getJsonInput();

$validate=new Classes\ClassValidate();
$validate->validateFields($data);
$validate->validateEmail($email);
$validate->validateIssetEmail($email);
$validate->validateData($dataNascimento);
#$validate->validateCpf($cpf);
$validate->validateConfSenha($senha,$senhaConf);
$validate->validateStrongSenha($senha);
echo $validate->validateFinalCad($arrVar);