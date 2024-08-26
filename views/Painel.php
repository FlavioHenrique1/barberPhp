<?php #\Classes\ClassLayout::setHeadRestrito("user");
?>
<?php \Classes\ClassLayout::setHeader('Cadastro', 'Realize seu cadastro em nosso sistema',"Flávio","painel.css"); ?>
<?php \Classes\ClassLayout::navBar(); ?>
<!-- https://dribbble.com/shots/19138603-KangCokor-Dashboard-Manager -->
<!-- https://dribbble.com/shots/15953890-Barber-Shop-Admin-Dashboard/attachments/7788200?mode=media -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.8.0/chart.min.js" integrity="sha512-sW/w8s4RWTdFFSduOTGtk4isV1+190E/GghVffMA9XczdJ2MDzSzLEubKAs5h0wzgSJOQTRYyaz73L3d6RtJSg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card cardPainel" style="width: 20rem; text-align: center;">
                <div class="card-body">
                    <p class="card-title"><span class="textoCard">Confirmado</span></p>
                    <h2 class="h2-card" id="confirmado"></h2>
                    <img class="img-card" src="<?= DIRIMG . 'check.png'; ?>" alt="">
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card cardPainel" style="width: 20rem; text-align: center;">
                <div class="card-body">
                    <p class="card-title"><span class="textoCard">Pendente</span></p>
                    <h2 class="h2-card" id="pendente"></h2><img class="img-card" src="<?= DIRIMG . 'pending.png'; ?>" alt="">
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card cardPainel" style="width: 20rem; text-align: center;">
                <div class="card-body">
                    <p class="card-title"><span class="textoCard">Cancelado</span></p>
                    <h2 class="h2-card" id="cancelado"></h2><img class="img-card" src="<?= DIRIMG . 'canceled.png'; ?>" alt="">
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card cardPainel" style="width: 20rem; text-align: center;">
                <div class="card-body">
                    <p class="card-title"><span class="textoCard">Total de Agendado</span></p>
                    <h2 class="h2-card" id="total"></h2><img class="img-card" src="<?php echo DIRIMG . 'total.png'; ?>" alt="">
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="card cardTabela cardPainel" style="width: 95%; text-align: center;">
            <div class="divHeadTable">
                <div class="inicio">
                    <p><span class="textoInici">Reservas</span></p>
                </div>
                <div class="fim">
                    <p class="linkTabela"><a href="#">Ver Todos</a></p>
                </div>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Horário</th>
                        <th scope="col">Status</th>
                        <th scope="col">Profissional</th>
                    </tr>
                </thead>
                <tbody id="bodyTabAgend">
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card cardPainel cardGrafico" style="width: 43rem; text-align: center;">
                <div class="card-body cardGrafico">
                    <div class="graficoDoughnut" ><canvas id="myChart1"></canvas></div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card cardPainel " style="width: 43rem; text-align: center;">
                <div class="card-body">
                    <div><canvas id="myChart"></canvas></div>
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
        options: {
            plugins: {
                title: {
                    display: true,
                    text: 'Quantidade de agendamento mensal',
                    padding: {
                    top: 10,
                    bottom: 10
                },
                font: {
                        size: 30
                    }             
                }
            }
        }

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
        },
        options: {
            plugins: {
                title: {
                    display: true,
                    text: 'Quantidade por status',
                    padding: {
                    top: 10,
                    bottom: 10
                },
                font: {
                        size: 30
                    }             
                }
            }
        }
    });
</script>


<?php \Classes\ClassLayout::setFooter("painel.js"); ?>