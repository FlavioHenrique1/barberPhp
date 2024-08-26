import fetchWrapper from './fetchModule.js';
import {showMsg , clearMsg} from './javascript.js';

const horario = document.querySelector("#horario");
const profissional = document.querySelector('#profissional');
const formAgendamento = document.querySelector("#formAgendamento");
const inputData=document.querySelector("#data");

// configuração de horarios
let horaInicio = '08:00';
let horaFim = '18:00';
let horaIntervalo = '12:00';
let qtdHoraIntervalo = 2;
// configuração de profissional
let profi = ['jose', 'pedro'];

const carregarProf = () => {
    profi.map((evt) => {
        const optionProf = document.createElement('option');
        optionProf.setAttribute('value', evt);
        optionProf.innerHTML = evt;
        profissional.appendChild(optionProf)
    })
}
carregarProf()
// Extrair dados dos horarios
const minhaFuncaoAssincrona = async () => {
    let endpoint= 'controllers/controllerUtils/getHorario/'+inputData.value;
    try {
        const response = await fetchWrapper.get(endpoint);
        return await response
    } catch (error) {
        console.error('Erro:', error);
    }
};

// carregar os horários do input
const carregarHorarios = async (data) => {
    // Chame a função
    horario.innerHTML="";
    // let data = year + "-" + month + "-" + dia;
    inputData.value = data;
    try {
        let horasMarcadas = await minhaFuncaoAssincrona(data);

        if (Array.isArray(horasMarcadas)) {
            // Crie um conjunto dos horários marcados para uma verificação rápida
            let horasMarcadasSet = new Set(horasMarcadas.map(evt => evt.hora));

            let inicio = toMinutes(horaInicio);
            let fim = toMinutes(horaFim);
            let intervaloInicio = toMinutes(horaIntervalo);
            let intervaloFim = intervaloInicio + qtdHoraIntervalo * 60;

            let horarios = [];

            for (let current = inicio; current < fim; current += 30) {
                let currentHora = toTimeString(current);
                if (!horasMarcadasSet.has(currentHora) &&
                    (current < intervaloInicio || current >= intervaloFim)) {
                    const option = document.createElement('option');
                    option.setAttribute('value', currentHora);
                    option.innerHTML = currentHora;
                    horario.appendChild(option);
                    horarios.push(currentHora);
                }
            }
        } else {
            console.error('Erro: O retorno não é um array', horasMarcadas);
        }
    } catch (error) {
        console.error('Erro ao carregar horários:', error);
    }
};

export { carregarHorarios };

// Funções auxiliares
function toMinutes(timeStr) {
    let [hours, minutes] = timeStr.split(':').map(Number);
    return hours * 60 + minutes;
}

function toTimeString(minutes) {
    let hours = String(Math.floor(minutes / 60)).padStart(2, '0');
    let mins = String(minutes % 60).padStart(2, '0');
    return `${hours}:${mins}:00`;
}
// carregarHorarios();

formAgendamento.addEventListener('submit', async (evt) => {
    evt.preventDefault();
    // Pega os dados do formulário
    const form = evt.target;
    const formData = new FormData(form);

    // Campos a serem validados
    const fields = ['horario', 'profissional', 'nome', 'telefone', 'data'];
    // Limpar mensagens de erro anteriores
    clearMsg('resultado');
    let dataInputSalva=inputData.value

    // Função de validação
    function isFormValid() {
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


    // Verificar se todos os campos estão preenchidos
    if (isFormValid()) {
        let endpoint= 'controllers/controllerAgendamento';
        const payload = {
            horario: formData.get('horario'),
            profissional: formData.get('profissional'),
            nome: formData.get('nome'),
            telefone: formData.get('telefone'),
            data: formData.get('data'),
            obs: formData.get('obs'),
        };

        try {
            const response = await fetchWrapper.post(endpoint, payload);
            if(response.retorno == "erro"){
                console.log('Response:', response);
                showMsg('resultado', 'danger', response.erros);
            }else{
                showMsg('resultado', 'success', `Agendamento realizado com sucesso.`);
                // Limpar o formulário após o envio bem-sucedido
                form.reset();
            }
        } catch (error) {
            console.error('Erro:', error);
        }
    } else {
        console.log('Por favor, preencha todos os campos.');
    }

    carregarHorarios(dataInputSalva);
});