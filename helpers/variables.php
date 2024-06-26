<?php
$objPass=new \Classes\ClassPassword();
if(isset($_POST['nome'])){$nome=filter_input(INPUT_POST,'nome',FILTER_SANITIZE_FULL_SPECIAL_CHARS);}else{$nome=null;}
if(isset($_POST['email'])){$email=filter_input(INPUT_POST,'email',FILTER_VALIDATE_EMAIL);}else{$email=null;}
if(isset($_POST['prontuario'])){$prontuario=filter_input(INPUT_POST,'prontuario',FILTER_SANITIZE_FULL_SPECIAL_CHARS);}else{$prontuario=null;}
if(isset($_POST['dataNascimento'])){$dataNascimento=filter_input(INPUT_POST,'dataNascimento',FILTER_SANITIZE_FULL_SPECIAL_CHARS);}else{$dataNascimento=null;}
if(isset($_POST['senha'])){$senha=$_POST['senha']; $hashSenha=$objPass->passwordHash($senha) ;}else{$senha=null; $hashSenha=null;}
if(isset($_POST['senhaConf'])){$senhaConf=$_POST['senhaConf'];}else{$senhaConf=null;}
if(isset($_POST['atividade'])){$atividade=filter_input(INPUT_POST,'atividade',FILTER_SANITIZE_FULL_SPECIAL_CHARS);}else{$atividade=null;}
if(isset($_POST['resp'])){$resp=filter_input(INPUT_POST,'resp',FILTER_SANITIZE_FULL_SPECIAL_CHARS);}else{$resp=null;}
if(isset($_POST['obs'])){$obs=filter_input(INPUT_POST,'obs',FILTER_SANITIZE_FULL_SPECIAL_CHARS);}else{$obs=null;}
if(isset($_POST['status'])){$status=filter_input(INPUT_POST,'status',FILTER_SANITIZE_FULL_SPECIAL_CHARS);}else{$status=null;}
if(isset($_POST['prazo'])){$prazo=filter_input(INPUT_POST,'prazo',FILTER_SANITIZE_FULL_SPECIAL_CHARS);}else{$prazo=null;}


$dataCreate=date("Y-m-d H:i:s");
if(isset($_POST['token'])){$token=$_POST['token'];}else{$token=bin2hex(random_bytes(64));}

$arrVar=[
    "nome"=>$nome,
    "email"=>$email,
    "prontuario"=>$prontuario,
    "dataNascimento"=>$dataNascimento,
    "senha"=>$senha,
    "hashSenha"=>$hashSenha,
    "dataCreate"=>$dataCreate,
    "token"=>$token,
];

$arrAtiv=[
    "atividade"=>$atividade,
    "dataNascimento"=>$dataNascimento,
    "resp"=>$resp,
    "obs"=>$obs,
    "prazo"=>$prazo,
    "status"=>$status,
    "dataCreate"=>$dataCreate,
];