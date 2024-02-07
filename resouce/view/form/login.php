<?php $this->layout('master')?>

<div class="column"></div>
<div class="column"></div>
<div class="column"></div>
<div class="columns is-mobile is-centered">
    <div class="column is-narrow is-two-fifths">
            <div class="box">
                <h2 class="is-size-2 has-text-centered">Login</h2>
                <form action="" method="post" class="form-cadastro" id="form1">
                    <div class="field">
                        <label class="label">Email</label>
                        <div class="control">
                            <input type="text" class="input" name="email" placeholder="digite o seu email">
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Senha</label>
                        <div class="control">
                            <input type="password" class="input" name="password" placeholder="digite o sua senha">
                        </div>
                    </div>
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

<script type="module" src="accets/js/auth.js"></script>
