import fetchWrapper from './fetchModule.js';
import { showMsg, clearMsg } from './javascript.js';
const confirmado = document.querySelector("#confirmado");
const pendente = document.querySelector("#pendente");
const cancelado = document.querySelector("#cancelado");
const total = document.querySelector("#total");



const CriarTabAgend = (id,nome,horario,status,prof) => {
    const bodyTabAgend=document.querySelector("#bodyTabAgend");

    const trTab = document.createElement("tr");
    const thTab = document.createElement("th");
    thTab.setAttribute("scope","row");
    thTab.innerHTML=id;
    const tdTabnome = document.createElement("td");
    tdTabnome.innerHTML=nome;
    const tdTabHora = document.createElement("td");
    tdTabHora.innerHTML=horario;
    const tdTabStatus = document.createElement("td");
    tdTabStatus.setAttribute("class",status);
    tdTabStatus.innerHTML=status.charAt(0).toUpperCase() + status.slice(1);
    const tdTabProf = document.createElement("td");
    tdTabProf.innerHTML=prof;
    trTab.appendChild(thTab);
    trTab.appendChild(tdTabnome);
    trTab.appendChild(tdTabHora);
    trTab.appendChild(tdTabStatus);
    trTab.appendChild(tdTabProf);
    bodyTabAgend.appendChild(trTab);

}

let bucarDados = async () => {

    let endpoint = 'controllers/controllerPainel';
    try {
        const response = await fetchWrapper.get(endpoint);
        if (response.retorno == "erro") {
            console.log('Response:', response);
            // showMsg('resultado', 'danger', response.erros);
        } else {
            response.map((ele)=>{
                CriarTabAgend(ele.id,ele.nome,ele.hora,ele.status,ele.profissional);
            })
            // console.log(response);
            // console.log('Response:', response);
            const contagemStatus = response.reduce((acc, response) => {
                const status = response.status.toLowerCase(); // normalizar o status para lowercase
                acc[status] = (acc[status] || 0) + 1;
                acc.total = (acc.total || 0) + 1;
                return acc;
            }, {});
            confirmado.innerHTML = contagemStatus.confirmado;
            pendente.innerHTML = contagemStatus.pendente;
            cancelado.innerHTML = contagemStatus.cancelado;
            total.innerHTML = contagemStatus.total;
            

            console.log(contagemStatus);
            // showMsg('resultado', 'success', `Login realizado com sucesso!.`);
            // Limpar o formulário após o envio bem-sucedido
            // window.location.href = getRoot()+"painel";
        }
    } catch (error) {
        console.error('Erro:', error);
    }
};
bucarDados();