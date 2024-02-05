<?php $this->layout('master')?>

    <div class="column"></div>
<div class="columns is-mobile is-centered">
    <div class="column is-narrow is-two-fifths">
        <div class="card">
            <div class="card-content ">
                <h2 class="is-size-2 has-text-centered">Cadastro de Loja</h2>
                <form action="/cadastro" method="post" class="form-cadastro" id="form2">
                    <div class="field">
                        <label class="label">Nome</label>
                        <div class="control">
                            <input type="text" class="input" name="name" placeholder="digite o nome da sua loja">
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Email</label>
                        <div class="control">
                            <input type="text" class="input" name="email" placeholder="digite o email da sua loja">
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Telefone</label>
                        <div class="control">
                            <input type="text" class="input" name="tell" placeholder="digite o contato da sua loja">
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Senha</label>
                        <div class="control">
                            <input type="password" class="input" name="password" placeholder="digite o sua senha">
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Descrição</label>
                        <div class="control">
                          <textarea class="textarea" name="descricao" placeholder="Textarea"></textarea>
                        </div>
                    </div>
                    <div class="field">
                        <div class="control has-text-centered">
                            <button type="submit" class="button is-primary-light is-outlined">Enviar</button>
                        </div>
                    </div>
                </form>
                <p class="is-size-7 has-text-link">
                    <a href="http://localhost:8000/login">Já tem cadastro?</a>
                </p>
                <div id="alert" name="alert" class="has-text-danger has-text-centered is-size-7"></div>
            </div>
        </div>
    </div>
</div>

<script type="module" src="http://localhost:8000/accets/js/authloja.js"></script>
