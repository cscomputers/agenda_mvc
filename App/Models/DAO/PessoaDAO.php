<?php

namespace App\Models\DAO;

use App\Models\Entidades\Pessoa;

class PessoaDAO extends BaseDAO
{
    public  function listar($id=null)
    {
        if($id) {
            $resultado = $this->selectItAll('pessoa', $id);
            $result = $resultado->fetchObject(Pessoa::class);
			return $result;
        }else{
            $resultado = $this->selectItAll('pessoa');
            $result = $resultado->fetchAll(\PDO::FETCH_CLASS, Pessoa::class);
			return $result;
        }

        return false;
    }

    public  function salvar(Pessoa $pessoa)
    {
        try {

            $nome           = $pessoa->getNome();
            $celular        = $pessoa->getCelular();
            $telefone       = $pessoa->getTelefone();
            $endereco       = $pessoa->getEndereco();
            $email          = $pessoa->getEmail();
            $observacao     = $pessoa->getObservacao();
            $status         = "A";

            return $this->insert(
                'pessoa',
                ":nome,:celular,:telefone,:endereco,:email,:observacao,:status",
                [
                    ':nome'=>$nome,
                    ':celular'=>$celular,
                    ':telefone'=>$telefone,
                    ':endereco'=>$endereco,
                    ':email'=>$email,
                    ':observacao'=>$observacao,
                    ':status'=>$status
                ]
            );

        }catch (\Exception $e){
            throw new \Exception("Ocorreu um erro ao persistir o registro.", 500);
        }
    }

    public  function atualizar(Pessoa $pessoa)
    {
        try {

            $id             = $pessoa->getId();
            $nome           = $pessoa->getNome();
            $celular        = $pessoa->getCelular();
            $telefone       = $pessoa->getTelefone();
            $endereco       = $pessoa->getEndereco();
            $email          = $pessoa->getEmail();
            $observacao     = $pessoa->getObservacao();
            $status         = "A";

            return $this->update(
              'pessoa',
              "nome = :nome, celular = :celular, telefone = :telefone, endereco = :endereco,
               email = :email, observacao = :observacao, status = :status",
              [
                  ':id'=>$id,
                  ':nome'=>$nome,
                  ':celular'=>$celular,
                  ':telefone'=>$telefone,
                  ':endereco'=>$endereco,
                  ':email'=>$email,
                  ':observacao'=>$observacao,
                  ':status'=>$status
              ],
                "id = :id"
            );

        }catch (\Exception $e){
            throw new \Exception("Ocorreu um erro ao persistir o registro.", 500);
        }
    }

    public function excluir(Pessoa $pessoa)
    {
        try {
            $id = $pessoa->getId();

            return $this->delete('pessoa',"id = $id");

        }catch (Exception $e){

            throw new \Exception("Ocorreu um erro ao deletar", 500);
        }
    }
}
