<div class="container">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">

            <h3>Editar Contato</h3>

            <?php if($Sessao::retornaErro()){ ?>
                <div class="alert alert-warning" role="alert">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <?php foreach($Sessao::retornaErro() as $key => $mensagem){ ?>
                        <?php echo $mensagem; ?> <br>
                    <?php } ?>
                </div>
            <?php } ?>

            <form action="http://<?php echo APP_HOST; ?>/contato/atualizar" method="post" id="form_cadastro">
                <input type="hidden" class="form-control" name="id" id="id" value="<?php echo $viewVar['contato']->getId(); ?>">

                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input type="text"  class="form-control" name="nome" id="nome" placeholder="" value="<?php echo $viewVar['contato']->getNome(); ?>" required>
                </div>

                <div class="form-group">
                    <label for="celular">Celular</label>
                    <input type="text"  class="form-control"  name="celular" id="celular" placeholder="" value="<?php echo $viewVar['contato']->getCelular(); ?>" required>
                </div>

                <div class="form-group">
                    <label for="telefone">Telefone</label>
                    <input type="text"  class="form-control"  name="telefone" id="telefone" placeholder="" value="<?php echo $viewVar['contato']->getTelefone(); ?>">
                </div>

                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="text"  class="form-control"  name="email" id="email" placeholder="" value="<?php echo $viewVar['contato']->getEmail(); ?>" required>
                </div>

                <div class="form-group">
                    <label for="endereco">Endereço</label>
                    <input type="text"  class="form-control"  name="endereco" id="endereco" placeholder="" value="<?php echo $viewVar['contato']->getEndereco(); ?>">
                </div>

                <div class="form-group">
                    <label for="observacao">Observação</label>
                    <textarea class="form-control" name="observacao" placeholder=""  required><?php echo $viewVar['contato']->getObservacao(); ?></textarea>
                </div>

                <button type="submit" class="btn btn-success btn-sm">Salvar</button>
                <a href="http://<?php echo APP_HOST; ?>/contato" class="btn btn-info btn-sm">Voltar</a>
            </form>
        </div>
        <div class=" col-md-3"></div>
    </div>
</div>
