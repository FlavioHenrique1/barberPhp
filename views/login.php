<?php \Classes\ClassLayout::setHeader('Login','Entre com seu usuário e senha');?>
    
    <div class="fundo"></div>

    <form name="formLogin" id="formLogin" action="<?php echo DIRCONT.'controllerLogin';?>" method="post">
        <div class="login">
            <div class="loginLogomarca float w100 center">
                <img src="<?php #echo DIRIMG.'logoExemplo.jpg';?>" alt="Logomarca">
            </div>
            <div class="resultadoForm float w100 center"></div>
            <div class="loginFormulario float w100">
                <input class="float w100 h40" type="email" name="email" id="email" placeholder="Email" required><br>
                <input class="float w100 h40" type="password" name="senha" id="senha" placeholder="Senha" required>
                <input class="float h40 center" type="submit" value="Entrar">
                <div class="loginTextos float center"><a href="<?php echo DIRPAGE.'esqueci-minha-senha';?>">Esqueci minha senha</a></div>
            </div>
      
        </div>
    </form>

<?php \Classes\ClassLayout::setFooter();?>