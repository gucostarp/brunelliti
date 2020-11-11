<h2><?php echo isset($id) ? "Editando a categoria" : "Nova categoria" ?></h2>
<?php echo \Config\Services::validation()->listErrors(); ?>

<table class="table">
    <tr>
        <td>
        <div class="row-my-1">
            <a href="/categorias/index" class="btn btn-primary">Consultar Categorias</a>
        </div>
        </td>
        <td>
        <div class="row-my-1" style="text-align: right;">
             <a href="/produtos/index" class="btn btn-success">Início</a>
        </div>
        </td>
    </tr>
</table>


<form action="/categorias/store" method="post">
    <div class="form-group">
        <label for="nome">Nome</label>
        <input type="text" class="form-control" name="nome" id="nome" value="<?php echo isset($nome) ? $nome : set_value('title') ?>">
    </div>

    <input type="hidden" name="id" value="<?php echo isset($id) ? $id : '' ?>">
    <div class="form-group">
        <input type="submit" value="Salvar" class="btn btn-primary">
    </div>

</form>