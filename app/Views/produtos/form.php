<script>
    function setaValorAtivo(){
        const elemento = document.getElementById('ativo')
        if (elemento.checked){
            elemento.value = 1;
            
        }else{
            elemento.value = 0;
        }
    }
</script>


<h2><?php echo isset($codigo) ? "Editar Produto" : "Novo Produto" ?></h2>
<?php echo \Config\Services::validation()->listErrors(); ?>

<table class="table">
    <tr>
        <td>
        <div class="row-my-1">
            <a href="/produtos/overview" class="btn btn-primary">Consultar Produto</a>
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

<form action="/produtos/store" method="post">
   
    <div class="form-group">
        <label for="nome">Produto</label>
        <input type="text" class="form-control" name="nome" id="nome" value="<?php echo isset($nome) ? $nome : set_value('title') ?>">
    
    <div class="form-group">
        <label for="descricao">Descrição</label>
        <textarea rows="5" cols="33" class="form-control" name="descricao" id="descricao"><?php echo isset($descricao) ? $descricao : set_value('descricao') ?></textarea>
    </div>
    
    <div class="form-row">
    <div class="form-group col-md-8">
        <label for="idCategoria">Categoria</label>
        <select class="form-control" name="idCategoria" id="idCategoria">
            <?php if (!empty($categorias) && is_array($categorias)): ?>
            <?php foreach ($categorias as $categorias_item) : ?>
                <option value="<?php echo $categorias_item['id'] ?>" <?php echo (isset($idCategoria) && $idCategoria == $categorias_item['id']) ? 'selected' : '' ?>><?php echo $categorias_item['nome'] ?></option>
            <?php endforeach; ?>    
            <?php else : ?>
                <option value="0" disabled>Nenhuma categoria cadastrada.</option>    
            <?php endif; ?>
        </select>
    </div>       
    </div>       

    <div class="form-row">  
        <div class="form-group col-md-3">
            <label for="quantidade">Quantidade</label>
            <input type="text" class="form-control" name="quantidade" id="quantidade" value="<?php echo isset($quantidade) ? $quantidade: set_value('quantidade') ?>">
        </div>

        <div class="form-group col-md-3">
            <label for="preco">Valor</label>
            <input type="text" class="form-control" name="preco" id="preco" value="<?php echo isset($preco) ? $preco: set_value('preco') ?>">
        </div>
    </div>
        
    

    <div class="form-check">
    <input class="form-check-input" type="checkbox" id="ativo" name="ativo" onchange="return setaValorAtivo()" <?php echo (isset($ativo) && $ativo == '0') ? '' : 'checked' ?> value="<?php echo isset($ativo) ? $ativo: '1' ?>>
        <label class="form-check-label" for="defaultCheck1">
        Ativo? 
        </label> 
    </div>
    <br>
    <input type="hidden" name="codigo" value="<?php echo isset($codigo) ? $codigo : '' ?>">
    <div class="form-group">
        <input type="submit" value="Salvar" class="btn btn-primary">
    </div>

</form>