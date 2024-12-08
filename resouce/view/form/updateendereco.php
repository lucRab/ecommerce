<?php $this->layout('master');?>


<div class="column"></div>
<div class="columns is-mobile is-centered">
<div class="column is-narrow is-two-fifths">
    <div class="card">
        <div class="card-content ">
            <h2 class="is-size-2 has-text-centered">ATUALIZAÇÃO DE ENDERECO</h2>
            <form method="post" class="form-cadastro" id="form">
                <div class="field">
                    <label class="label m-2">SEU ENDEREÇO</label>
                    <div class="control">
                        <input type="text" class="input" name="endereco" placeholder="digite o nome da sua loja">
                    </div>
                </div>
                <div class="field">
                    <label class="label m-2">CEP</label>
                    <div class="control">
                        <input type="text" class="input" name="ce" placeholder="digite o email da sua loja">
                    </div>
                </div>
                <div class="field">
                    <div class="control has-text-centered">
                        <button type="submit" class="button is-primary-light is-outlined">UPDATE</button>
                    </div>
                </div>
                <input type="hidden" name="slug" value="<?= $this->data[0]?>">
                
                <input type="hidden" name="id" value="<?= $this->data[1]?>">
            </form>
            <div id="alert" name="alert" class="has-text-danger has-text-centered is-size-7"></div>
        </div>
    </div>
</div>
</div>