<?php \Classes\ClassLayout::setHeader('Cadastro','Realize seu cadastro em nosso sistema');?>
<?php \Classes\ClassLayout::navBar(); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.8.0/chart.min.js" integrity="sha512-sW/w8s4RWTdFFSduOTGtk4isV1+190E/GghVffMA9XczdJ2MDzSzLEubKAs5h0wzgSJOQTRYyaz73L3d6RtJSg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<div class="container-fluid">
    <div class="row" >
        <div class="col">
            <div class="card" style="width: 17rem;">
                <div class="card-body">
                    <p class="card-title">Quantidade de Presentes</p>
                    <h2 class="h2-card" >534</h2><img class="img-card" src="<?php echo DIRIMG.'people-fill.svg';?>" alt="">
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card" style="width: 17rem;">
                <div class="card-body">
                    <p class="card-title">Quantidade de Faltas</p>
                    <h2 class="h2-card" >53</h2><img class="img-card" src="<?php echo DIRIMG.'person-x-fill.svg';?>" alt="">
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card" style="width: 17rem;">
                <div class="card-body">
                    <p class="card-title">Quadro Total</p>
                    <h2 class="h2-card" >526</h2><img class="img-card" src="<?php echo DIRIMG.'person-x-fill.svg';?>" alt="">
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card" style="width: 17rem;">
                <div class="card-body">
                    <p class="card-title">Ausentes(DSR/BH/FER/SUSP)</p>
                    <h2 class="h2-card" >53</h2><img class="img-card" src="<?php echo DIRIMG.'person-x-fill.svg';?>" alt="">
                </div>
            </div>
        </div>
        
        <div class="col">
            <div class="col-sm-12">
                <div class="card" style="margin-top: 0.7rem;">
                    <canvas id="myChart" width="400" height="400"></canvas>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="col-sm-12">
                <div class="card" style="margin-top: 0.7rem;">
                    <canvas id="myChart1" width="400" height="400"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
const ctx = document.getElementById('myChart').getContext('2d');
const myChart = new Chart(ctx, {
    type: 'scatter',
    data: {
        labels: [
    'January',
    'February',
    'March',
    'April'
  ],
  datasets: [{
    type: 'bar',
    label: 'Bar Dataset',
    data: [10, 20, 30, 40],
    borderColor: 'rgb(255, 99, 132)',
    backgroundColor: 'rgba(255, 99, 132)'
  }, {
    type: 'line',
    label: 'Line Dataset',
    data: [30, 30, 30, 30],
    fill: false,
    borderColor: 'rgb(54, 162, 235)'
  }]
    },

});

const ctx1 = document.getElementById('myChart1').getContext('2d');
const myChart1 = new Chart(ctx1, {
    type: 'doughnut',
    data: {
        labels: ['Red', 'Blue', 'Yellow'],
        datasets: [{
            label: '# of Votes',
            data: [300, 50, 100],
            backgroundColor: [
                'rgb(255, 99, 132)',
                'rgb(54, 162, 235)',
                'rgb(255, 205, 86)'

            ],
            hoverOffset: 4
        }]
    }
});
</script>


<?php \Classes\ClassLayout::setFooter();?>