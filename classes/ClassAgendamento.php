<?php
namespace Classes;

use Models\ClassMoAgend;

class ClassAgendamento{

    private $db;
    private $erro=[];

    public function __construct()
    {
        $this->db=new ClassMoAgend();
    }

    public function getErro()
    {
        return $this->erro;
    }

    public function setErro($erro)
    {
        array_push($this->erro,$erro);
    }

    #Validar se todos os campos obrigatorios estão preenchidos
    public function validateCampos($campos)
    {
        foreach ($campos as $key => $value) {
            // Verifica se o campo é obrigatório e se está vazio
            if (empty($value) && $key !== 'obs') {
                $this->setErro("Preencha o campo '$key'.");
                return false;
            }
        }
        
        return true; // Retorna true se todos os campos obrigatórios estiverem preenchidos
    }

    #Validar se todos os campos obrigatorios estão preenchidos
    public function getHorario($dia,$horario=null)
    {   
        if(!$horario){
            $ret = $this->db->getMHorario($dia);
            return $ret;
        }else{
            $ret = $this->db->getMHorario($dia,$horario);
            if($ret <> 0 ){
                $this->setErro("Horário ja foi agendado.");
                return true;
            }
        }

    }
    
    #Validação final do agendamento
    public function validateFinalAgend($dados)
    {
        $status="pendente";
        if(count($this->getErro())>0){
            $arrResponse=[
                "retorno"=>"erro",
                "erros"=>$this->getErro()
            ];
        }else{
            $arrResponse=[
                "retorno"=>"success",
                "erros"=>null
            ];
            $this->db->inserMAgend($dados,$status);
        }
        return json_encode($arrResponse);
    }
}
