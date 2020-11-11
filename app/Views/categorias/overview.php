<script>
    function confirma(){
        if (!confirm("Deseja excluir?")) {
            return false;         
        }
        return true;
    }
</script>

<h2>Categorias</h2>
<table class="table">
    <tr>
        <td>
        <div class="row-my-1">
            <a href="/categorias/create" class="btn btn-primary">Cadastrar Categoria</a>
        </div>
        </td>
        <td>
        <div class="row-my-1" style="text-align: right;">
             <a href="/produtos/index" class="btn btn-success">Início</a>
        </div>
        </td>
    </tr>
</table>


<table class="table table-striped table-sm" >
    <tr>
        <th>Código</th>
        <th>Categoria</th>
        <th>
    </tr>
    <?php if (!empty($categorias) && is_array($categorias)): ?>
        <?php foreach ($categorias as $categorias_item) : ?>
        <tr>
            <td><?php echo $categorias_item['id'] ?></td>
            <td><?php echo $categorias_item['nome'] ?></td>
     
            <td>
                <a href="/categorias/edit/<?php echo $categorias_item['id'] ?>">Editar</a>
                |
                <a href="/categorias/delete/<?php echo $categorias_item['id'] ?>" onclick="return confirma()">Deletar</a>
            </td>
        </tr>
        <?php endforeach; ?>    
    <?php else : ?>
        <tr>
            <td colspan="2">Nenhuma categoria encontrada</td>
        </tr>
    <?php endif; ?>
</table>