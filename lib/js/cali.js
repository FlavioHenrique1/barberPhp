//DARK MODE TOGGLE
// document.querySelector('.dark-mode-switch').onclick = () =>{
//     document.querySelector('#princ').classList.toggle('dark');
//     document.querySelector('#princ').classList.toggle('light');
// }

//CHECK LEAP YEAR
let isLeapYear=(year) => {
    return (year % 4 === 0 && year % 100 !== 0 && year % 400 !==0) || (year % 100 === 0 && year % 400 === 0)
}

let getFebDays = (year) => {
    return isLeapYear(year) ? 29 : 28
}

let calendar = document.querySelector('.calendar');

const month_names = ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'];

let month_picker = document.querySelector('#month-picker');

month_picker.onclick = () => {
    month_list.classList.add('show');
}
// GENERATE CALENDAR

let generateCalendar = (month,year) => {
    let calendar_days = document.querySelector('.calendar-days');
    calendar_days.innerHTML = '';

    let calendar_header_year = document.querySelector('#year');

    let days_of_month = [31,getFebDays(year),31,30,31,30,31,31,30,31,30,31];

    let currDate= new Date();

    month_picker.innerHTML = month_names[month];
    calendar_header_year.innerHTML = year;

    let first_day = new Date(year, month, 1);

    for (let i = 0; i<=days_of_month[month] + first_day.getDay() - 1; i++){
        let day = document.createElement('div');
        if(i>= first_day.getDay()){

            if(i - first_day.getDay()+1 == 5){
                day.classList.add('corDiaSec');
            }else{
                day.addEventListener('click',(evt)=>{
                   let dia = i - first_day.getDay()+1;
                    carregarDadosCale(month,year,dia);
                });
                day.classList.add('calendar-day-hover');
            }
            day.innerHTML = i - first_day.getDay()+1;
            day.innerHTML +=`<span></span>
                            <span></span>
                            <span></span>
                            <span></span>`;
            if(i - first_day.getDay() + 1 === currDate.getDate() && year === currDate.getFullYear() && month === currDate.getMonth()){
                day.classList.add('curr-date');
            }
        }
        calendar_days.appendChild(day)
    }
}

let month_list = calendar.querySelector('.month-list');

month_names.forEach((e,index) => {
    let month =document.createElement('div');
    month.innerHTML = `<div>${e}</div>`;
    month.onclick =() =>{
        month_list.classList.remove('show');
        curr_month.value = index
        generateCalendar(curr_month.value,curr_year.value);
    }
    month_list.appendChild(month);
})

document.querySelector('#prev-year').onclick = () => {
    --curr_year.value
    generateCalendar(curr_month.value,curr_year.value)
}

document.querySelector('#next-year').onclick = () => {
    ++curr_year.value
    generateCalendar(curr_month.value,curr_year.value)
}

let currDate = new Date();

let curr_month = {value: currDate.getMonth()}
let curr_year = {value: currDate.getFullYear()}

generateCalendar(curr_month.value,curr_year.value);

//Abrir modal e carregar informações
const carregarDadosCale=(month,year,day)=>{
    month++;
    if(month < 10){
        month='0'+month;
    }
    if(day < 10){
        day='0'+day;
    }

    let date = `${year}-${month}-${day}`;
    let data = document.querySelector('#data');
    data.value = date;

    // // Obtenha uma referência ao elemento do modal
    // var modal = document.getElementById('exampleModal');
    // // Crie um novo objeto Modal usando o elemento do modal
    // var myModal = new bootstrap.Modal(modal);
    // const teste=document.querySelector('.corpoModal');
    // // teste.innerHTML = data
    // // Chame o método show() para exibir o modal
    // myModal.show();
}

