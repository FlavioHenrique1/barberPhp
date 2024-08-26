import fetchWrapper from './fetchModule.js';
import { showMsg, clearMsg } from './javascript.js';
import { getRoot } from './javascript.js';

// scripts.js
document.addEventListener('DOMContentLoaded', () => {
    const linkLogin = document.getElementById('linkLogin');
    const linkCadastro = document.getElementById('linkCadastro');
    const formLogin = document.getElementById('formLogin');
    const formCadastro = document.getElementById('formCadastro');
    const resp = document.getElementById('resultado');

    linkLogin.addEventListener('click', (e) => {
        e.preventDefault();
        formLogin.classList.remove('inactive');
        formLogin.classList.add('active');
        formCadastro.classList.remove('active');
        formCadastro.classList.add('inactive');
        linkLogin.classList.add('ativo')
        linkCadastro.classList.remove('ativo')
        resp.innerHTML = "";
    });

    linkCadastro.addEventListener('click', (e) => {
        e.preventDefault();
        formCadastro.classList.remove('inactive');
        formCadastro.classList.add('active');
        formLogin.classList.remove('active');
        formLogin.classList.add('inactive');
        linkCadastro.classList.add('ativo')
        linkLogin.classList.remove('ativo')
        resp.innerHTML = "";
    });
});

// Função de validação
function isFormValid(fields,formData) {
    let isValid = true;
    // Verificar cada campo e definir mensagens de erro se necessário
    fields.forEach(fieldId => {
        const fieldValue = formData.get(fieldId);
        if (!fieldValue) {
            showMsg('resultado', 'danger', `Por favor, preencha o campo ${fieldId}.`);
            console.log(`Por favor, preencha o campo ${fieldId}.`)
            isValid = false;
        }
    });
    return isValid;
}

formCadastro.addEventListener('submit', async (evt) => {
    evt.preventDefault();
    // Pega os dados do formulário
    const form = evt.target;
    const formData = new FormData(form);

    // Campos a serem validados
    const fields = ['nome', 'email', 'dataNascimento', 'senha', 'senhaConf', 'telefone'];
    // Limpar mensagens de erro anteriores
    clearMsg('resultado');

    // Verificar se todos os campos estão preenchidos
    if (isFormValid(fields,formData)) {
        let endpoint = 'controllers/controllerCadastro';
        const payload = {
            nome: formData.get('nome'),
            email: formData.get('email'),
            dataNascimento: formData.get('dataNascimento'),
            senha: formData.get('senha'),
            senhaConf: formData.get('senhaConf'),
            telefone: formData.get('telefone'),
        };

        try {
            const response = await fetchWrapper.post(endpoint, payload);
            if (response.retorno == "erro") {
                console.log('Response:', response);
                showMsg('resultado', 'danger', response.erros);
            } else {
                showMsg('resultado', 'success', `Cadastro realizado com sucesso.`);
                // Limpar o formulário após o envio bem-sucedido
                form.reset();
            }
        } catch (error) {
            console.error('Erro:', error);
        }
    } else {
        console.log('Por favor, preencha todos os campos.');
    }

});

formLogin.addEventListener('submit', async (evt) => {
    evt.preventDefault();
    // Pega os dados do formulário
    const form = evt.target;
    const formData = new FormData(form);

    // Campos a serem validados
    const fields = ['email', 'senha'];
    // Limpar mensagens de erro anteriores
    clearMsg('resultado');

    // Verificar se todos os campos estão preenchidos
    if (isFormValid(fields,formData)) {
        let endpoint = 'controllers/controllerLogin';
        const payload = {
            email: formData.get('email'),
            senha: formData.get('senha')
        };

        try {
            const response = await fetchWrapper.post(endpoint, payload);
            if (response.retorno == "erro") {
                console.log('Response:', response);
                showMsg('resultado', 'danger', response.erros);
            } else {
                showMsg('resultado', 'success', `Login realizado com sucesso!.`);
                // Limpar o formulário após o envio bem-sucedido
                window.location.href = getRoot()+"painel";
            }
        } catch (error) {
            console.error('Erro:', error);
        }
    } else {
        console.log('Por favor, preencha todos os campos.');
    }

});