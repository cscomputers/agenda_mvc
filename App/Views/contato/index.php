<div class="container">
    <div class="row">
    <br>
    <div class="col-md-12">
        <a href="http://<?php echo APP_HOST; ?>/contato/cadastro" class="btn btn-success btn-sm">Adicionar</a>
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
            <div class="alert alert-info" role="alert">Nenhum contato encontrado</div>
        <?php
            } else {
        ?>

            <div class="table-responsive">
                <table id="lista_contatos" class="table table-striped table-bordered" style="width:100%">
                  <thead>
                    <tr>
                        <td class="info">Nome</td>
                        <td class="info">Celular</td>
                        <td class="info">E-mail</td>
                        <td class="info">Data Cadastro</td>
                        <td class="info">Ação</td>
                    </tr>
                  </thead>
                    <?php
                        foreach($viewVar['listaContatos'] as $contato) {
                    ?>
                    <tbody>
                        <tr>
                            <td><?php echo $contato->getNome(); ?></td>
                            <td><?php echo $contato->getCelular(); ?></td>
                            <td><?php echo $contato->getEmail(); ?></td>
                            <td><?php echo $contato->getDataOperacao()->format('d/m/Y'); ?></td>
                            <td>
								                <a href="http://<?php echo APP_HOST; ?>/contato/listagem/<?php echo $contato->getId(); ?>" class="btn btn-info btn-sm">Detalhe</a>
                                <a href="http://<?php echo APP_HOST; ?>/contato/edicao/<?php echo $contato->getId(); ?>" class="btn btn-info btn-sm">Editar</a>
                                <a href="http://<?php echo APP_HOST; ?>/contato/exclusao/<?php echo $contato->getId(); ?>" class="btn btn-danger btn-sm">Excluir</a>
                            </td>
                        </tr>
                    </tbody>
                    <?php
                        }
                    ?>
                </table>
            </div>
        <?php
            }
        ?>
    </div>
</div>
</div>
<script>
  $(document).ready(function() {
    //$('#lista_contatos').DataTable();
    $('#lista_contatos').dataTable({
        "bJQueryUI": true,
        "sPaginationType": "full_numbers",
        "oLanguage": {
            "sLengthMenu": "Mostrar _MENU_ registros por página",
            "sZeroRecords": "Nenhum registro encontrado",
            "sInfo": "Mostrando _START_ / _END_ de _TOTAL_ registro(s)",
            "sInfoEmpty": "Mostrando 0 / 0 de 0 registros",
            "sInfoFiltered": "(filtrado de _MAX_ registros)",
            "sSearch": "Pesquisar: ",
            "oPaginate": {
                "sFirst": "Início",
                "sPrevious": "Anterior",
                "sNext": "Próximo",
                "sLast": "Último"
            }
        },
        "aaSorting": [[0, 'desc']],
        "aoColumnDefs": [
            {"sType": "num-html", "aTargets": [0]}
        ]
    });
  });
</script>
