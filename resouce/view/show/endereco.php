<?php $this->layout('master');?>

<div class="column"></div>
<div class="column"></div>
<div class="column"></div>
<div class="columns is-mobile is-centered">
    <div class="column is-narrow is-two-fifths">
        <div class="box">
            <div class="title"> SEUS ENDEREÇOS</div>
            <a href="http://localhost:8000/endereco/<?= $this->data['slug']?>/cadastro">
                adicionar
            </a>
            <?php for ($i=0; $i < count($this->data) ; $i++) {  ?>
                <div class="box">
                    <div class="title is-size-4 m-4">
                        <?php echo $this->data[$i]["endereco"];?>
                    </div>
                    <div class="columns">
                         <div class="column">
                            <div>
                                <?php echo $this->data[$i]["cep"];?>
                            </div>
                        </div>
                        <div class="column">
                            <form class="form" id="form">
                                <input type="hidden" name="id" value="<?= $this->data[$i]["idendereco"]?>">
                                <input type="hidden" name="slug" value="<?= $this->data["slug"]?>">
                                <button class="button is-light">
                                    editar
                                </button>
                            </form>
                        </div>
                    </div>
                </div>    
            <?php } ?>
        </div>
    </div>
</div>
<script type="module" src="http://localhost:8000/accets/js/updateendereco.js"></script> 
    