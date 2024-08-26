//DARK MODE TOGGLE
// document.querySelector('.dark-mode-switch').onclick = () =>{
//     document.querySelector('#princ').classList.toggle('dark');
//     document.querySelector('#princ').classList.toggle('light');
// }
import { carregarHorarios } from './agendamento.js';

//CHECK LEAP YEAR
let isLeapYear = (year) => {
    return (year % 4 === 0 && year % 100 !== 0 && year % 400 !== 0) || (year % 100 === 0 && year % 400 === 0)
}

let getFebDays = (year) => {
    return isLeapYear(year) ? 29 : 28
}

let calendar = document.querySelector('.calendar');

const month_names = ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'];

let month_picker = document.querySelector('#month-picker');

month_picker.onclick = () => {
    month_list.classList.add('show');
}

// GENERATE CALENDAR
let generateCalendar = (month, year) => {
    let calendar_days = document.querySelector('.calendar-days');
    calendar_days.innerHTML = '';

    let calendar_header_year = document.querySelector('#year');

    let days_of_month = [31, getFebDays(year), 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];

    let currDate = new Date();
    let currDateWithoutTime = new Date(currDate.getFullYear(), currDate.getMonth(), currDate.getDate());

    month_picker.innerHTML = month_names[month];
    calendar_header_year.innerHTML = year;

    let first_day = new Date(year, month, 1);
    let dia = "";
    for (let i = 0; i <= days_of_month[month] + first_day.getDay() - 1; i++) {
        let day = document.createElement('div');
        if (i >= first_day.getDay()) {
            dia = i - first_day.getDay() + 1;
            // Criar data corretamente para comparação
            let data = new Date(year, month, dia);
            let dataWithoutTime = new Date(data.getFullYear(), data.getMonth(), data.getDate());
            let dayOfWeek = data.getDay();

            // Colocar condições para o dia não ser selecionado
            if (dataWithoutTime < currDateWithoutTime) {
                day.classList.add('corDiaSec');
            } else if (dayOfWeek === 0) { // Verifica se é sábado (6) ou domingo (0) dayOfWeek === 6 || dayOfWeek === 0
                day.classList.add('corDiaSec');
                // day.classList.add('weekend'); // Adiciona uma classe especial para finais de semana
                // day.addEventListener('click', (evt) => {
                //     // Lógica para lidar com finais de semana, por exemplo:
                //     alert('Finais de semana não estão disponíveis para agendamento.');
                // });
            } else {
                day.addEventListener('click', (evt) => {
                    // Remover a classe 'diaselecionado' de todos os dias antes de adicionar ao clicado
                    let diasSelecionados = document.querySelectorAll('.diaselecionado');
                    diasSelecionados.forEach(diaSelecionado => {
                        diaSelecionado.classList.remove('diaselecionado');
                    });
                    dia = i - first_day.getDay() + 1;
                    carregarHorarios(`${year}-${month + 1}-${dia}`);
                    day.classList.add("diaselecionado");
                });
                day.classList.add('calendar-day-hover');
            }
            day.innerHTML = i - first_day.getDay() + 1;
            day.innerHTML += `<span></span>
                              <span></span>
                              <span></span>
                              <span></span>`;
            if (i - first_day.getDay() + 1 === currDate.getDate() && year === currDate.getFullYear() && month === currDate.getMonth()) {
                day.classList.add('curr-date');
                dia = i - first_day.getDay() + 1;
                carregarHorarios(`${year}-${month + 1}-${dia}`);
            }
        }
        calendar_days.appendChild(day);
    }
}


let month_list = calendar.querySelector('.month-list');

month_names.forEach((e, index) => {
    let month = document.createElement('div');
    month.innerHTML = `<div>${e}</div>`;
    month.onclick = () => {
        month_list.classList.remove('show');
        curr_month.value = index
        generateCalendar(curr_month.value, curr_year.value);
    }
    month_list.appendChild(month);
})

document.querySelector('#prev-year').onclick = () => {
    --curr_year.value
    generateCalendar(curr_month.value, curr_year.value)
}

document.querySelector('#next-year').onclick = () => {
    ++curr_year.value
    generateCalendar(curr_month.value, curr_year.value)
}

let currDate = new Date();

let curr_month = { value: currDate.getMonth() }
let curr_year = { value: currDate.getFullYear() }

generateCalendar(curr_month.value, curr_year.value);



