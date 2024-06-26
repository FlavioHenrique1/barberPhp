<?php \Classes\ClassLayout::setHeader('Cadastro','Realize seu cadastro em nosso sistema');?>
    
    <div class="topFaixa float w100 center">
        Cadastro de Clientes
    </div>
    <div class="retornoCad"></div>
    <form  name="formCadastro" id="formCadastro" action="<?php echo DIRPAGE.'controllers/controllerCadastro';?>" method="post">
        <div class="cadastro float center">
            <input class="float w100 h40" type="text" id="nome" name="nome" placeholder="Nome:" required>
            <input class="float w100 h40" type="email" id="email" name="email" placeholder="Email:" required>
            <input class="float w100 h40" type="text" id="prontuario" name="prontuario" placeholder="Prontuário:" required>
            <input class="float w100 h40" type="text" id="dataNascimento" name="dataNascimento" placeholder="Data de Nascimento:" required>
            <input class="float w100 h40" type="password" id="senha" name="senha" placeholder="Senha:" required>
            <input class="float w100 h40" type="password" id="senhaConf" name="senhaConf" placeholder="Confirmação de Senha:" required>
            <input class="inlineBlock h40" type="submit" value="Cadastrar">            
        
        </div>
    </form>

<?php \Classes\ClassLayout::setFooter();?>