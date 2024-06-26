import fetchWrapper from './fetchModule.js';


const horario = document.querySelector("#horario");
const profissional = document.querySelector('#profissional');
const formAgendamento = document.querySelector("#formAgendamento");

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

const carregarHorarios = () => {

    function toMinutes(timeStr) {
        let [hours, minutes] = timeStr.split(':').map(Number);
        return hours * 60 + minutes;
    }

    function toTimeString(minutes) {
        let hours = String(Math.floor(minutes / 60)).padStart(2, '0');
        let mins = String(minutes % 60).padStart(2, '0');
        return `${hours}:${mins}`;
    }

    let inicio = toMinutes(horaInicio);
    let fim = toMinutes(horaFim);
    let intervaloInicio = toMinutes(horaIntervalo);
    let intervaloFim = intervaloInicio + qtdHoraIntervalo * 60;

    let horarios = [];

    for (let current = inicio; current < fim; current += 30) {
        if (current < intervaloInicio || current >= intervaloFim) {
            // "<option value="">08:00</option>"
            const option = document.createElement('option');
            option.setAttribute('value', toTimeString(current));
            option.innerHTML = toTimeString(current);
            horario.appendChild(option)
            horarios.push(toTimeString(current));
        }
    }

}
carregarHorarios();

formAgendamento.addEventListener('submit', async (evt) => {
    evt.preventDefault();
    // Pega os dados do formulário
    const form = evt.target;
    const formData = new FormData(form);

    // Campos a serem validados
    const fields = ['horario', 'profissional', 'nome', 'telefone', 'data'];

    // Função de validação
    function isFormValid() {
        let isValid = true;
        // Limpar mensagens de erro anteriores
        // clearErrors();

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
        console.log('Horário:', horario.value);
        console.log('Profissional:', profissional.value);
        console.log('Data:', data.value);
        // console.log('Observações:', obs.value);
        let endpoint= 'controllers/controllerTeste';
        console.log(endpoint)
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
            console.log('Response:', response);
        } catch (error) {
            console.error('Erro:', error);
        }
         
    } else {
        console.log('Por favor, preencha todos os campos.');
    }

});
