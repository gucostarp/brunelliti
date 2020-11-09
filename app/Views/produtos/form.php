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


<h2><?php echo isset($codigo) ? "Editando produto" : "Novo Produto" ?></h2>
<?php echo \Config\Services::validation()->listErrors(); ?>

<form action="/produtos/store" method="post">
    <div class="form-group">
        <label for="nome">Produto</label>
        <input type="text" class="form-control" name="nome" id="nome" value="<?php echo isset($nome) ? $nome : set_value('title') ?>">
    </div>

    <div class="form-gorup">
        <label for="descricao">Descrição</label>
        <textarea rows="5" cols="33" class="form-control" name="descricao" id="descricao"><?php echo isset($descricao) ? $descricao : set_value('descricao') ?></textarea>
    </div>
    
    <div class="form-gorup">
        <label for="idCategoria">Categoria</label>
        <input type="select" class="form-control" name="idCategoria" id="idCategoria" value="<?php echo isset($idCategoria) ? $idCategoria: set_value('idCategoria') ?>">
    </div>
    
    <div class="form-gorup">
        <label for="quantidade">Quantidade</label>
        <input type="text" class="form-control" name="quantidade" id="quantidade" value="<?php echo isset($quantidade) ? $quantidade: set_value('quantidade') ?>">
    </div>

    <div class="form-gorup">
        <label for="preco">Preço</label>
        <input type="text" class="form-control" name="preco" id="preco" value="<?php echo isset($preco) ? $preco: set_value('preco') ?>">
    </div>

    <div class="form-gorup">
        <label for="ativo">Ativo</label>
        <input type="checkbox" class="form-control" onchange="return setaValorAtivo()" name="ativo" id="ativo" <?php echo ($ativo == '0') ? '' : 'checked' ?> value="<?php echo isset($ativo) ? $ativo: set_value('ativo') ?>">
    </div>

    <input type="hidden" name="codigo" value="<?php echo isset($codigo) ? $codigo : '' ?>">
    <div class="form-group">
        <input type="submit" value="Salvar" class="btn btn-primary">
    </div>

</form>