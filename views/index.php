<?php \Classes\ClassLayout::setHeader('HOMEPAGE', 'ESSA É A home page do nosso site'); ?>

<header>
<?php \Classes\ClassLayout::navBar(); ?>
</header>
<section>
    <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="<?= DIRIMG . 'Mulan-Premier-Access-Disney-Plus.jpg'; ?>" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="<?= DIRIMG . 'sonic.jpg' ?>" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="<?= DIRIMG . 'the boys.jpg' ?>" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <div class="principalDados">
        <div class="tituloPrincipal">
            <h2>Barbearia Inova</h2>
            <button>Aberto</button>
        </div>
        <div class="endereco">
            <p><img src="img/location.svg" alt="" class="iconEnd">Av. Nossa Sra. do Bom Conselho, 74 - Pte. dos Carvalhos, Cabo - PE</p>
            <p class="fw-bold">Contato</p>
            <p class="numeroTel fw-bold"><img src="<?= DIRIMG . 'call.svg' ?>" alt="" class="iconEnd">(81) 97845-1234</p>
        </div>
        <div class="hrIndex">
            <hr>
        </div>
        <div class="especialista">
            <p class="fw-bold">Especialista</p>
            <div class="imgEspeci">
                <img class="imgEsp" src="img/_6d811d12-7a7b-4b8f-8f63-82e75d14fd0e.jpeg" alt="">
            </div>
            <div class="textoInto">
                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Illo, harum non cum at dolorem porro, ullam in, tempore voluptatum accusantium ducimus? Cupiditate quibusdam quae quod inventore pariatur cumque incidunt maxime.
            </div>
        </div>
        <div class="hrIndex">
            <hr>
        </div>
        <span class="fw-bold">Horário de funcionamento:</span>
        <div class="horario">
            <p>Segunda - Sexta : <span>08:00 AM - 18:00 PM</span></p>
            <p>Sabado - Domingo : <span>08:00 AM - 18:00 PM</span></p>
        </div>
        <div class="btnPrinc">
            <a class="btn btnAgendamento" href="<?= DIRPAGE.'agendamento'?>" id="btnAgendamento"><span>Agendamento</span></a>
        </div>
    </div>
</section>

<?php \Classes\ClassLayout::setFooter(); ?>