<?php

namespace App\Models\Validacao;

use \App\Models\Validacao\ResultadoValidacao;
use \App\Models\Entidades\Pessoa;

class ContatoValidador{

    public function validar(Pessoa $pessoa)
    {
        $resultadoValidacao = new ResultadoValidacao();

        if(empty($pessoa->getNome()))
        {
            $resultadoValidacao->addErro('nome',"Nome: Este campo não pode ser vazio");
        }

        if(empty($pessoa->getCelular()))
        {
            $resultadoValidacao->addErro('celular',"Celular: Este campo não pode ser vazio");
        }

        if(empty($pessoa->getEmail()))
        {
            $resultadoValidacao->addErro('email',"Email: Este campo não pode ser vazio");
        }

        return $resultadoValidacao;
    }
}
