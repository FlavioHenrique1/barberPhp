<?php
$objPass=new \Classes\ClassPassword();
$ReqHandler =new Classes\ClassRequestHandler();

// Recuperar os dados JSON usando a classe utilitária
$data = $ReqHandler->getJsonInput();
if(isset($data['nome'])){$nome=$data['nome'];}else{$nome=null;}
if(isset($data['email'])){$email=$data['email'];}else{$email=null;}
if(isset($data['dataNascimento'])){$dataNascimento=$data['dataNascimento'];}else{$dataNascimento=null;}
if(isset($data['senha'])){$senha=$data['senha']; $hashSenha=$objPass->passwordHash($senha) ;}else{$senha=null; $hashSenha=null;}
if(isset($data['senhaConf'])){$senhaConf=$data['senhaConf'];}else{$senhaConf=null;}
if(isset($data['obs'])){$obs=$data['obs'];}else{$obs=null;}
if(isset($data['telefone'])){$telefone=$data['telefone'];}else{$telefone=null;}



$dataCreate=date("Y-m-d H:i:s");
if(isset($data['token'])){$token=$data['token'];}else{$token=bin2hex(random_bytes(64));}

$arrVar=[
    "nome"=>$nome,
    "email"=>$email,
    "dataNascimento"=>$dataNascimento,
    "senha"=>$senha,
    "hashSenha"=>$hashSenha,
    "dataCreate"=>$dataCreate,
    "token"=>$token,
    "telefone"=>$telefone
];