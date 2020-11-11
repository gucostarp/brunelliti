<script>
    function confirma(){
        if (!confirm("Deseja excluir?")) {
            return false;         
        }
        return true;
    }
</script>

<h2>Buscar  Produtos</h2>
<table class="table">
    <tr>
        <td>
        <div class="row-my-1">
            <a href="/produtos/create" class="btn btn-primary">Cadastrar Produto</a>
        </div>
        </td>
        <td>
        <div class="row-my-1" style="text-align: right;">
             <a href="/produtos/index" class="btn btn-success">Início</a>
        </div>
        </td>
    </tr>
</table>

<form action="/produtos/overview" method="post">
    <div class="form-group">
        <label for="nome">Buscar por</label>
        <input type="text" class="form-control" name="busca" id="busca" value="<?php echo isset($busca) ? $busca : '' ?>">
    </div>

    <div class="form-group">
        <input type="submit" value="Buscar" class="btn btn-primary">
    </div>
</form>

<table class="table table-striped table-sm">
    <tr>
        <th>Código</th>
        <th>Produto</th>
        <th>Descrição</th>
        <th>Preço</th>
        <th>Categoria</th>
        <th>Quantidade</th>
        <th>Ativo</th>
        <th></th>
    </tr>
    <?php if (!empty($produtos) && is_array($produtos)): ?>
        <?php foreach ($produtos as $produtos_item) : ?>
        <tr>
            <td><?php echo $produtos_item['codigo'] ?></td>
            <td><?php echo $produtos_item['nome'] ?></td>
            <td><?php echo $produtos_item['descricao'] ?></td>
            <td><?php echo $produtos_item['preco'] ?></td>
            <td><?php echo $produtos_item['nomeCategoria'] ?></td>
            <td><?php echo $produtos_item['quantidade'] ?></td>
            <td><?php echo $produtos_item['ativo'] ?></td>
            <td>
                <a href="/produtos/edit/<?php echo $produtos_item['codigo'] ?>">Editar</a>
                |
                <a href="/produtos/delete/<?php echo $produtos_item['codigo'] ?>" onclick="return confirma()">Deletar</a>
            </td>
        </tr>
        <?php endforeach; ?>    
    <?php else : ?>
        <tr>
            <td colspan="2">Nenhum produto encontrado</td>
        </tr>
    <?php endif; ?>
</table>