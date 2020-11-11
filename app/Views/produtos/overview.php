<script>
    function confirma(){
        if (!confirm("Deseja excluir?")) {
            return false;         
        }
        return true;
    }

    function setaValorAtivo(){
        const elemento = document.getElementById('ativo')
        if (elemento.checked){
            elemento.value = 1;
            
        }else{
            elemento.value = 0;
        
        }
    }

</script>


<h2>Consultar Produtos</h2>
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

    <div class="form-check">
      <input class="form-check-input" type="checkbox" id="ativo" name="ativo" onchange="return setaValorAtivo()" <?php echo (isset($ativo) && $ativo == '0') ? 'checked' : '' ?> value="<?php echo isset($ativo) ? $ativo: '0' ?>>
        <label class="form-check-label" for="defaultCheck1">
        Listar produtos inativos?
        </label>     
    </div>
    
    <div class="input-group mb-1">
        <input type="text" class="form-control" placeholder="Digite algo para pesquisar" aria-label="busca" aria-describedby="button-addon1" id="busca" name="busca" value="<?php echo isset($busca) ? $busca : '' ?>">
         <div class="input-group-prepend">
         <button class="btn btn-primary" type="submit" value="buscar">Pesquisar</button>
        </div>  
    </div>
</form>

<table class="table table-striped table-sm">
    <tr>
        <th>Código</th>
        <th>Produto</th>
        <th>Preço</th>
        <th>Categoria</th>
        <th>Ação</th>
    </tr>
    <?php if (!empty($produtos) && is_array($produtos)): ?>
        <?php foreach ($produtos as $produtos_item) : ?>
        <tr>
            <td><a href="/produtos/view/<?php echo $produtos_item['codigo'] ?>"><?php echo $produtos_item['codigo'] ?></a></td>
            <td><a href="/produtos/view/<?php echo $produtos_item['codigo'] ?>"><?php echo $produtos_item['nome'] ?></a></td>
            <td><a href="/produtos/view/<?php echo $produtos_item['codigo'] ?>"><?php echo $produtos_item['preco'] ?></a></td>
            <td><a href="/produtos/view/<?php echo $produtos_item['codigo'] ?>"><?php echo $produtos_item['nomeCategoria'] ?></a></td>
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