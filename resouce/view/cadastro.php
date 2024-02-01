<?php $this->layout('master')?>

    <div class="column"></div>
<div class="columns is-mobile is-centered">
    <div class="column is-narrow is-two-fifths">
        <div class="card">
            <div class="card-content ">
                <h2 class="is-size-2 has-text-centered">Cadastro</h2>
                <form action="/cadastro" method="post" class="form-cadastro" id="form2">
                    <div class="field">
                        <label class="label">Nome</label>
                        <div class="control">
                            <input type="text" class="input" name="name" placeholder="digite o seu nome">
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">CPF</label>
                        <div class="control">
                            <input type="text" class="input" name="cpf" placeholder="digite o seu CPF">
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Email</label>
                        <div class="control">
                            <input type="text" class="input" name="email" placeholder="digite o seu email">
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Telefone</label>
                        <div class="control">
                            <input type="text" class="input" name="tell" placeholder="digite o seu telefone">
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Senha</label>
                        <div class="control ">
                            <input type="password" class="input" name="password" placeholder="digite o sua senha">
                        </div>
                    </div>
                    <div class="field">
                        <div class="control has-text-centered">
                            <button type="submit" class="button is-dark is-outlined">Enviar</button>
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

<script type="module" src="accets/js/auth.js"></script>
