<?php
namespace Models;

class ClassMoAgend extends ClassCrud{
    private $tabela;

    public function __construct()
    {
        $this->tabela = "agendamento";
    }

    #Realizar a inserção no banco de dados
    public function inserMAgend($arrVar,$status)
    {
        $this->insertDB(
            $this->tabela,
            "?,?,?,?,?,?,?,?",
            array(
                0,
                $arrVar['data'],
                $arrVar['profissional'],
                $arrVar['nome'],
                $arrVar['telefone'],
                $arrVar['obs'],
                $arrVar['horario'],
                $status
            )
        );
    }

    #Retorna os dados do usuário
    public function getMHorario($dia,$horario=null)
    {
        if(!$horario){
            $b=$this->selectDB(
                "*",
                $this->tabela,
                "WHERE data=?",
                array(
                    $dia
                )
            );
            $f=$b->fetchAll(\PDO::FETCH_ASSOC);
            $r=$b->rowCount();
            return $f;
        }else{
            $b=$this->selectDB(
                "*",
                $this->tabela,
                "WHERE data=? and hora=?",
                array(
                    $dia,
                    $horario
                )
            );
            $f=$b->fetchAll(\PDO::FETCH_ASSOC);
            $r=$b->rowCount();
            return $r;
        }

    }
}