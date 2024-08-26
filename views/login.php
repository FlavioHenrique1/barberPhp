<?php \Classes\ClassLayout::setHeader('Login', 'Entre com seu usuário e senha', "Flávio", "login.css"); ?>

<div class="conteudo">
    <div>
        <img src="<?=  DIRIMG . 'barberIcon.png'; ?>" alt="" class="imgIcon" />
    </div>
    <h1 class="textoLogin">Bem Vindo!</h1>
    <div class="customDiv">
        <a href="#" class="divBt ativo" id="linkLogin">
            <span>Sign in</span>
        </a>
        <a href="#" class="divBt" id="linkCadastro">
            <span>Sign up</span>
        </a>
    </div>
    <div id="resultado"></div>
    <form id="formLogin" action="<?= DIRCONT.'controllerLogin';?>" method="post" class="active">
        <div class="mb-3">
            <div class="custominput">
                <label class="customlabel customlabelImput">Email:</label>
                <input name="email" type="text" required placeholder="Entre com seu Email" />
            </div>
        </div>
        <div class="mb-3">
            <div class="custominput">
                <label class="customlabel customlabelImput">Senha:</label>
                <input name="senha" type="password" required placeholder="Entre com sua Senha" />
            </div>
        </div>
        <div class="textoSpan">
            <a href="<?= DIRPAGE.'esqueci-minha-senha';?>">
                <span class="textSpan">Forgot your password?</span>
            </a>
        </div>
        <div class="divCheckbox">
            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" />
            <label for="flexCheckDefault">Remember</label>
        </div>
        <div class="divBtn">
            <button type="submit" class="btn btnLogin">Sing in</button>
        </div>
    </form>

    <form id="formCadastro" action="<?= DIRCONT.'controllerCadastro';?>" method="post" class="inactive">
        <div class="mb-3">
            <div class="custominput">
                <label class="customlabel customlabelImput">Nome:</label>
                <input id="nome" name="nome" type="text" required placeholder="Digite seu nome" />
            </div>
        </div>
        <div class="mb-3">
            <div class="custominput">
                <label class="customlabel customlabelImput">Telefone:</label>
                <input id="telefone" name="telefone" type="text" required placeholder="(xx)xxxxx xxxx" />
            </div>
        </div>
        <div class="mb-3">
            <div class="custominput">
                <label class="customlabel customlabelImput">Email:</label>
                <input id="email" name="email" type="email" required placeholder="Digite seu Email" />
            </div>
        </div>
        <div class="mb-3">
            <div class="custominput">
                <label class="customlabel customlabelImput">Data de Nascimento:</label>
                <input id="dataNascimento" name="dataNascimento" type="date" required />
            </div>
        </div>
        <div class="mb-3">
            <div class="custominput">
                <label class="customlabel customlabelImput">Senha:</label>
                <input id="senha" name="senha" type="password" required placeholder="Digite sua Senha" />
            </div>
        </div>
        <div class="mb-3">
            <div class="custominput">
                <label class="customlabel customlabelImput">Confirmação de Senha::</label>
                <input id="senhaConf" name="senhaConf" type="password" required placeholder="Digite sua Senha" />
            </div>
        </div>
        <div class="divBtn">
            <button type="submit" class="btn btnLogin">Sing in</button>
        </div>
    </form>
</div>
<?php \Classes\ClassLayout::setFooter("loginCad.js"); ?>