<?php $this->layout('master');
?>
<div class="column"></div>
<div class="container is-variable is-1-mobile is-0-tablet is-3-desktop is-8-widescreen is-2-fullhd m-5">
    <div class="columns">

        <div class="column is-half">
          <a href="http://localhost:8000/product/<?= $this->data[array_key_last($this->data)]['slug']?>">
          <figure class="image">
            <img src="<?= $this->data[array_key_last($this->data)]['foto']?>">
          </figure>
          </a>
        </div>


        <div class="has-background-primary" >
          <div class="columns">

            <div class="column text-center is-shadowless">
              <div class="box m-5">
                <div class="card-image m-2">
                <a href="http://localhost:8000/product/<?= $this->data[array_key_last($this->data) - 1]['slug']?>">
                  <figure class="image is-96x96 ml-5" >
                    <img src="<?= $this->data[array_key_last($this->data) - 1]['foto']?>">
                  </figure>
                </a>
                </div>
                <div class="card-header-title">
                  <?= $this->data[array_key_last($this->data) - 1]['name']?>
                </div>
              </div>

              <div class="box m-5">
                <div class="card-image m-2">
                <a href="http://localhost:8000/product/<?= $this->data[array_key_last($this->data) - 2]['slug']?>">
                  <figure class="image is-96x96 ml-5">
                    <img src="<?= $this->data[array_key_last($this->data) - 2]['foto']?>">
                  </figure>
                </a>
                </div>
                <div class="card-header-title">
                  <?= $this->data[array_key_last($this->data) - 2]['name']?>
                </div>
              </div>

            </div>


            <div class="column text-center">

              <div class="box m-5">
                <div class="card-image m-2">
                <a href="http://localhost:8000/product/<?= $this->data[array_key_last($this->data) - 3]['slug']?>">
                  <figure class="image is-96x96 ml-5">
                    <img src="<?= $this->data[array_key_last($this->data) - 3]['foto']?>"">
                  </figure>
                </a>
                </div>
                <div class="card-header-title">
                  <?= $this->data[array_key_last($this->data) - 3]['name']?>
                </div>
              </div>

              <div class="box m-5">
                <div class="card-image m-2">
                <a href="http://localhost:8000/product/<?= $this->data[array_key_last($this->data)- 4]['slug']?>">
                  <figure class="image is-96x96 ml-5">
                    <img src="<?= $this->data[array_key_last($this->data) - 4]['foto']?>">
                  </figure>
                </a>
                </div>
                <div class="card-header-title">
                  <?= $this->data[array_key_last($this->data) - 4]['name']?>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
</div>


<div class="has-background-grey-lighter ">
  <div class="container">
    <div class="columns">

      <div class="column">
        <div class="box">
          <a href="http://localhost:8000/store">Lojas</a>
        </div>
      </div>

      <div class="column">
        <div class="box"></div>
      </div>

      <div class="column">
        <div class="box">Categorias</div>
      </div>

    </div>

    <div class="columns">
      <div class="cont">
        <?php for ($i=0; $i < 10; $i++) {?>
          <?php if(!empty($this->data[array_key_last($this->data) - ($i + 5)])) {?>
            <div class="column is-one-fifth">
              <a href="http://localhost:8000/product/<?= $this->data[array_key_last($this->data) - ($i + 5)]['slug']?>">
                <div class="box">
                  <div class="card-image m-2">
                    <figure class="image is-96x96 ml-5">
                      <img src="<?= $this->data[array_key_last($this->data) - ($i + 5)]['foto']?>">
                    </figure>
                  </div>
                  <div class="card-header-title">
                    <?= $this->data[array_key_last($this->data) - ($i + 5)]['name']?>
                  </div>
                </div>
              </a>
            </div>
          <?php } ?>
        <?php } ?>
      </div>
    </div>
  </div>
</div>

