<div class="container">
    <div class="row">
    <br>
    <div class="col-md-12">
		<a href="http://<?php echo APP_HOST; ?>/contato" class="btn btn-success btn-sm">Voltar</a>
        <hr>
    </div>
    <div class="col-md-12">
        <?php if($Sessao::retornaMensagem()){ ?>
            <div class="alert alert-warning" role="alert">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <?php echo $Sessao::retornaMensagem(); ?>
            </div>
        <?php } ?>

        <?php
            if(!count($viewVar['listaContatos'])){
        ?>
            <div class="alert alert-info" role="alert">Nenhum contato cadastrado</div>
        <?php
            } else {
				$pessoa = $viewVar['listaContatos'];
        ?>

            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <tr>
                        <td class="info_det">Nome:</td>
						<td><?php echo $pessoa->getNome(); ?></td>
					</tr>
					<tr>
						<td class="info_det">Celular:</td>
						<td><?php echo $pessoa->getCelular(); ?></td>
					</tr>
          <tr>
						<td class="info_det">Telefone:</td>
						<td><?php echo $pessoa->getTelefone(); ?></td>
					</tr>
					<tr>
						<td class="info_det">Email:</td>
						<td><?php echo $pessoa->getEmail(); ?></td>
					</tr>
          <tr>
						<td class="info_det">Endereço:</td>
						<td><?php echo $pessoa->getEndereco(); ?></td>
					</tr>
          <tr>
						<td class="info_det">Observação:</td>
						<td><?php echo $pessoa->getObservacao(); ?></td>
					</tr>
					<tr>
						<td class="info_det">Data Cadastro:</td>
						<td><?php echo $pessoa->getDataOperacao()->format('d/m/Y'); ?></td>
					</tr>
					<tr>
					  <td class="info_det">Ação:</td>
						<td>
              <a href="http://<?php echo APP_HOST; ?>/contato/edicao/<?php echo $pessoa->getId(); ?>" class="btn btn-info btn-sm">Editar</a>
              <a href="http://<?php echo APP_HOST; ?>/contato/exclusao/<?php echo $pessoa->getId(); ?>" class="btn btn-danger btn-sm">Excluir</a>
            </td>
					</tr>
        </table>
      </div>
        <?php
            }
        ?>
    </div>
</div>
</div>
