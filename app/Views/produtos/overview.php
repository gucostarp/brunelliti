<h2>Produtos</h2>
<table class="table">
    <tr>
        <th>Código</th>
        <th>Produto</th>
        <th>Descrição</th>
        <th>Preço</th>
        <th>Categoria</th>
        <th>Ativo</th>
        <th>Quantidade</th>
    </tr>
    <?php if (!empty($produtos) && is_array($produtos)): ?>
        <?php foreach ($produtos as $produtos_item) : ?>
        <tr>
            <td><?php echo $produtos_item['codigo'] ?></td>
            <td><?php echo $produtos_item['nome'] ?></td>
            <td><?php echo $produtos_item['descricao'] ?></td>
            <td><?php echo $produtos_item['preco'] ?></td>
            <td><?php echo $produtos_item['idCategoria'] ?></td>
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