<?php \Classes\ClassLayout::setHeader('HOMEPAGE', 'ESSA É A home page do nosso site'); ?>

<header>
    <?php \Classes\ClassLayout::navBar(); ?>
</header>
<section>
    <div class="container text-center agendamento home">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <label>Selecione o dia</label>
                <div class="col princ">
                    <div class="light" id="princ">
                        <div class="calendar">
                            <div class="calendar-header">
                                <span class="month-picker" id="month-picker">
                                    February
                                </span>
                                <span class="year-change" id="prev-year">
                                    &lt;
                                </span>
                                <span id="year">2023</span>
                                <span class="year-change" id="next-year">
                                    &gt;
                                </span>
                            </div>
                            <div class="calendar-body">
                                <div class="calendar-week-day">
                                    <div>Dom</div>
                                    <div>Seg</div>
                                    <div>Ter</div>
                                    <div>Qua</div>
                                    <div>Qui</div>
                                    <div>Sex</div>
                                    <div>Sáb</div>
                                </div>
                                <div class="calendar-days">
                                </div>
                            </div>
                            <div class="calendar-footer">
                                <!-- <div class="toggle">
                            <span>Dark Mode</span>
                            <div class="dark-mode-switch">
                              <div class="dark-mode-switch-ident"></div>
                            </div>
                          </div> -->
                            </div>
                            <div class="month-list"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div id="resultado"></div>
                <div class="form">
                    <form action="" id="formAgendamento">
                        <div class="mb-3">
                            <div class="custominput">
                                <label class="customlabel">Selecione um horário</label>
                                <select name="horario" class="form-select form-select-lg mb-3" id="horario">
                                    <option selected disabled>Selecione...</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="custominput">
                                <label class="customlabel customlabelImput">Profissional</label>
                                <select name="profissional" class="form-select form-select-lg mb-3" id="profissional">
                                    <option selected disabled>Selecione...</option>
                                </select>
                                <input name="data" type="hidden" required id="data" />
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="custominput">
                                <label class="customlabel customlabelImput">Nome:</label>
                                <input name="nome" type="text" required placeholder="Digite seu nome:"/>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="custominput">
                                <label class="customlabel customlabelImput">Telefone:</label>
                                <input name="telefone" type="text" required placeholder="(xx)xxxxx xxxx" id="telefone"/>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="custominput">
                                <label class="customlabel customlabelImput">Observações:</label>
                                <textarea name="obs" type="text" ></textarea>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="custominput">
                                <button type="submit" class="btn btnAgendamento">Salvar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</section>
<?php \Classes\ClassLayout::setFooter(["cali.js","agendamento.js"]); ?>