<?php 
include "ignore/dados.php";
#Caminhos absolutos
define('DIRPAGE',"http://{$_SERVER['HTTP_HOST']}/{$pastaInterna}");

(substr($_SERVER['DOCUMENT_ROOT'],-1)=='/')?$barra="":$barra="/";
define('DIRREQ',"{$_SERVER['DOCUMENT_ROOT']}{$barra}{$pastaInterna}");

#Atalhos
define('DIRIMG',DIRPAGE.'img/');
define('DIRCSS',DIRPAGE.'lib/css/');
define('DIRJS',DIRPAGE.'lib/js/');
define('DIRCONT',DIRPAGE.'controllers/');

#Acesso ao BD
define('HOST',$host);
define('BD',$bd);
define('USER',$userBd);
define('PASS',$passBd);

#Informações do servidor de email
define("HOSTMAIL",$hostMail);
define("USERMAIL",$userMail);
define("PASSMAIL",$passMail);


#Outras Informações
define("DOMAIN",$_SERVER["HTTP_HOST"]."/".$pastaInterna);
