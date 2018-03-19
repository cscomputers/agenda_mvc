<?php

namespace App\Controllers;

use App\Lib\Sessao;
use App\Models\DAO\PessoaDAO;
use App\Models\Entidades\Pessoa;
use App\Models\Validacao\ContatoValidador;

class ContatoController extends Controller
{
    public function index()
    {
        $pessoaDAO = new PessoaDAO();

        self::setViewParam('listaContatos',$pessoaDAO->listar());

        $this->render('/contato/index');

        Sessao::limpaMensagem();
    }

	public function listagem($params)
    {
        $id = $params[0];

        $pessoaDAO = new PessoaDAO();

		$pessoa = $pessoaDAO->listar($id);

		self::setViewParam('listaContatos', $pessoa);

		$this->render('/contato/detalhe');

        Sessao::limpaMensagem();

	}

    public function cadastro()
    {
        $this->render('/contato/cadastro');

        Sessao::limpaFormulario();
        Sessao::limpaMensagem();
        Sessao::limpaErro();
    }

    public function salvar()
    {
        $pessoa = new Pessoa();
        $pessoa->setNome($_POST['nome']);
        $pessoa->setCelular($_POST['celular']);
        $pessoa->setTelefone($_POST['telefone']?$_POST['telefone']:"");
        $pessoa->setEmail($_POST['email']);
        $pessoa->setEndereco($_POST['endereco']?$_POST['endereco']:"");
        $pessoa->setObservacao($_POST['observacao']?$_POST['observacao']:"");

        Sessao::gravaFormulario($_POST);

        $contatoValidador = new ContatoValidador();
        $resultadoValidacao = $contatoValidador->validar($pessoa);

        if($resultadoValidacao->getErros()){
            Sessao::gravaErro($resultadoValidacao->getErros());
            $this->redirect('/contato/cadastro');
        }

        $pessoaDAO = new PessoaDAO();

        $pessoaDAO->salvar($pessoa);

        Sessao::limpaFormulario();
        Sessao::limpaMensagem();
        Sessao::limpaErro();

        $this->redirect('/contato');

    }

    public function edicao($params)
    {
        $id = $params[0];

        $pessoaDAO = new PessoaDAO();

        $pessoa = $pessoaDAO->listar($id);

        if(!$pessoa){
            Sessao::gravaMensagem("Contato inexistente");
            $this->redirect('/contato');
        }

        self::setViewParam('contato',$pessoa);

        $this->render('/contato/editar');

        Sessao::limpaMensagem();

    }

    public function atualizar()
    {
      $pessoa = new Pessoa();
      $pessoa->setId($_POST['id']);
      $pessoa->setNome($_POST['nome']);
      $pessoa->setCelular($_POST['celular']);
      $pessoa->setTelefone($_POST['telefone']?$_POST['telefone']:"");
      $pessoa->setEmail($_POST['email']);
      $pessoa->setEndereco($_POST['endereco']?$_POST['endereco']:"");
      $pessoa->setObservacao($_POST['observacao']?$_POST['observacao']:"");

        Sessao::gravaFormulario($_POST);

        $contatoValidador = new ContatoValidador();
        $resultadoValidacao = $contatoValidador->validar($pessoa);

        if($resultadoValidacao->getErros()){
            Sessao::gravaErro($resultadoValidacao->getErros());
            $this->redirect('/contato/edicao/'.$_POST['id']);
        }

        $pessoaDAO = new PessoaDAO();

        $pessoaDAO->atualizar($pessoa);

        Sessao::limpaFormulario();
        Sessao::limpaMensagem();
        Sessao::limpaErro();

        $this->redirect('/contato');

    }

    public function exclusao($params)
    {
        $id = $params[0];

        $pessoaDAO = new PessoaDAO();

        $pessoa = $pessoaDAO->listar($id);

        if(!$pessoa){
            Sessao::gravaMensagem("Contato inexistente");
            $this->redirect('/contato');
        }

        self::setViewParam('contato',$pessoa);

        $this->render('/contato/exclusao');

        Sessao::limpaMensagem();

    }

    public function excluir()
    {
        $pessoa = new Pessoa();
        $pessoa->setId($_POST['id']);

        $pessoaDAO = new PessoaDAO();

        if(!$pessoaDAO->excluir($pessoa)){
            Sessao::gravaMensagem("Contato inexistente");
            $this->redirect('/contato');
        }

        Sessao::gravaMensagem("Contato excluido com sucesso!");

        $this->redirect('/contato');

    }
}
