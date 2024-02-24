<?php 
  use App\http\controller\AuthController;
  $this->layout('master');
  if(isset($_COOKIE['token'])) {
    if(gettype(AuthController::decodedToken($_COOKIE['token'])) == 'string') {
      setcookie("token", "", time()-3600,);
      session_destroy();
      header('Location: http://localhost:8000/');
    }
  }
?>
<div class="container">
    <div class="column">
        <div class="box">
            <div class="title has-text-centered">
                Formulario de cadastro de produto
            </div>
            <form action="" method="post" enctype="multipart/form-data" class="form-cadastro" id="form1">
              <input type="hidden" name="id" value="<?=$_SESSION['id']?>">
                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                      <label class="label">Nome</label>
                    </div>
                    <div class="field-body">
                      <div class="field">
                        <p class="control is-expanded has-icons-left">
                          <input class="input" type="text" name="name" placeholder="Informe o nome do produto">
                        </p>
                      </div>
                    </div>
                </div>

                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                      <label class="label">Preço</label>
                    </div>
                    <div class="field-body">
                      <div class="field">
                        <p class="control is-expanded has-icons-left">
                          <input class="input" type="text" name="preco" placeholder="Informe o preço do seu produto">
                        </p>
                      </div>
                      <div class="field has-addons has-addons-right">
                        <label class="label m-3">Quantidade</label>
                        <p class="control is-expanded has-icons-left has-icons-right">
                          <input class="input" name="quantidade" type="number">
                        </p>
                      </div>
                    </div>
                </div>
                
                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label">Foto do produto</label>
                    </div>
                    <div class="field-body">
                      <div class="field">
                        <input class="input" name="foto" type="file">  
                    </div>
                    </div>
                </div>

                <div class="field is-horizontal">
                  <div class="field-label is-normal">
                    <label class="label">Descrição do produto</label>
                  </div>
                  <div class="field-body">
                    <div class="field">
                      <div class="control">
                        <textarea class="textarea" name="descricao" placeholder="Faça uma descrição sobre o seu produto."></textarea>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="field is-horizontal">
                  <div class="field-label">
                    <!-- Left empty for spacing -->
                  </div>
                  <div class="field-body">
                    <div class="field">
                        <div class="control has-text-centered">
                            <button type="submit" class="button is-black is-outlined">Enviar</button>
                        </div>
                    </div>
                  </div>
                </div>
            </form>
            <div id="alert" name="alert" class="has-text-danger has-text-centered"></div>
        </div>
    </div>
</div>
<script src="http://localhost:8000/accets/js/cadastroitem.js"></script>