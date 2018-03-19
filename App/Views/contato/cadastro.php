<div class="container">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <h3>Cadastro de Contatos</h3>

            <?php if($Sessao::retornaErro()){ ?>
                <div class="alert alert-warning" role="alert">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <?php foreach($Sessao::retornaErro() as $key => $mensagem){ ?>
                        <?php echo $mensagem; ?> <br>
                    <?php } ?>
                </div>
            <?php } ?>

            <form action="http://<?php echo APP_HOST; ?>/contato/salvar" method="post" id="form_cadastro">
                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input type="text" class="form-control"  name="nome" placeholder="Ex: Paulo Silva" value="<?php echo $Sessao::retornaValorFormulario('nome'); ?>" required>

                </div>
                <div class="form-group">
                    <label for="celular">Celular</label>
                    <input type="text" class="form-control" name="celular" placeholder="(99) 99999-9999" value="<?php echo $Sessao::retornaValorFormulario('celular'); ?>" required>

                </div>
                <div class="form-group">
                    <label for="telefone">Telefone</label>
                    <input type="text" class="form-control" name="telefone" placeholder="(99) 9999-9999" value="<?php echo $Sessao::retornaValorFormulario('telefone'); ?>">

                </div>
                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="text" class="form-control" name="email" placeholder="Ex: p_silva@gmail.com" value="<?php echo $Sessao::retornaValorFormulario('email'); ?>">

                </div>
                <div class="form-group">
                    <label for="endereco">Endereco</label>
                    <input type="text" class="form-control" name="endereco" placeholder="Ex: Rua A, Nr. 26" value="<?php echo $Sessao::retornaValorFormulario('endereco'); ?>">

                </div>
                <div class="form-group">
                    <label for="Observacao">Observação</label>
                    <textarea class="form-control" name="observacao" placeholder="Ex: Cliente que ligou ontem..." required><?php echo $Sessao::retornaValorFormulario('observacao'); ?></textarea>

                </div>

                <button type="submit" class="btn btn-success btn-sm">Salvar</button>
            </form>
        </div>
        <div class=" col-md-3"></div>
    </div>
</div>
