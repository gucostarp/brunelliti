<script>
    function confirma(){
        if (!confirm("Deseja excluir?")) {
            return false;         
        }
        return true;
    }
</script>

<table class="table">
    <tr>
        <td>
        <div class="row-my-1">
            <a href="/produtos/create" class="btn btn-primary">Cadastrar Produto</a>
        </div>
        </td>
        <td>
        <div class="row-my-1" style="text-align: right;">
            <a href="/produtos/overview" class="btn btn-success">Voltar</a> 
            <a href="/produtos/index" class="btn btn-success">Início</a>
        </div>
        </td>
    </tr>
</table>

<h2><?php echo ($produtos['nome']) ?></h2>
<div class="row">
    <div class="col-1">
        <h5>Descrição<h5>
    </div>
</div>  
<div class="row">
    <div class="col">
        <p><?php echo ($produtos['descricao']) ?><p>
    </div>    
</div>

<div class="row">
    <div class="col-1">
        <h5>Categoria: <h5>
    </div>
</div>  

<div class="row">
    <div class="col">
        <p><?php echo ($produtos['idCategoria']) ?><p>
    </div>    
</div>

<div class="row">
    <div class="col-1">
        <h5>Preço: <h5>
    </div>
</div>  
<div class="row">
    <div class="col">
        <p><?php echo ($produtos['preco']) ?><p>
    </div>
    
</div>
<div class="row">
    <div class="col-1">
        <h5>Quantidade: <h5>
    </div>
</div>  

<div class="row">
    <div class="col">
        <p><?php echo ($produtos['quantidade']) ?><p>
    </div>    
</div>

<div class="row">
    <div class="col-1">
        <h4>Ativo <h4>
    </div>
</div>  

<div class="row">
    <div class="col">
        <p><?php echo ($produtos['ativo']) ?><p>
    </div>    
</div>

    

