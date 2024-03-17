<?php 
use App\http\controller\AuthController;
$this->layout('master');
AuthController::decodedToken($_COOKIE['token']);
?>
<div class="column"></div>
<div class="column"></div>
<div class="column"></div>
<div class="columns is-mobile is-centered">
    <div class="column is-narrow is-two-fifths">
            <div class="box">
                <h2 class="is-size-2 has-text-centered">Atualização de Dados</h2>
                <form action="" method="post" class="form-update" id="form1">
                    <div class="field">
                        <label class="label">Nome</label>
                        <div class="control">
                            <input type="text" class="input" name="name" value="<?= $this->data[0]['name']?>">
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Email</label>
                        <div class="control">
                            <input type="text" class="input" name="email" value="<?= $this->data[0]['email']?>">
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Telefone</label>
                        <div class="control">
                            <input type="text" class="input" name="tell" value="<?= $this->data[0]['tell']?>">
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Descrição</label>
                        <div class="control">
                            <input type="text" class="textarea" name="descricao" value="<?= $this->data[0]['descricao']?>">
                        </div>
                    </div>
                    <input type="hidden" name="id" value="<?= $_SESSION['id']?>">
                    <div class="field">
                        <div class="control has-text-centered">
                            <button type="submit" class="button is-black is-outlined">Enviar</button>
                        </div>
                    </div>
                </form>
                <div id="alert" name="alert" class="has-text-danger has-text-centered"></div>
            </div>
    </div>
</div>
<script type="module" src="../../accets/js/storeupdate.js"></script>