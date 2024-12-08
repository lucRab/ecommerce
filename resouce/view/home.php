<?php $this->layout('master');
?>
<div class="column"></div>
<?php if(!$this->data == null) { ?>
<div class="container is-variable is-1-mobile is-0-tablet is-3-desktop is-8-widescreen is-2-fullhd m-5">
    <div class="columns">
        <div class="column is-half">
          <a href="<?php if(isset($_COOKIE['token'])) {?>/product/<?= $this->data[array_key_last($this->data)]['slug']; }else {
            echo "/login"; }?>
          ">
          <figure class="image">
            <img src="<?= $this->data[array_key_last($this->data)]['foto']?>">
          </figure>
          </a>
        </div>
        <?php  if(array_key_last($this->data) - 1 > 3) {?>
          <div class="has-background-primary" >
            <div class="columns">
              <?php for($a = 1; $a <= 2; $a++){ ?>
                <div class="column text-center">
                  <?php for($i = 1; $i <= 2; $i++){$n = $i;
                    if($a == 2)$i = $i + $a;
                    if(array_key_exists($i, $this->data)) {?>
                    <div class="box m-5">
                      <div class="card-image m-2">
                      <a href="<?php if(isset($_COOKIE['token'])) {?>/product/<?= $this->data[array_key_last($this->data) - $i]['slug']; }else {
                      echo "/login"; }?>">
                        <figure class="image is-96x96 ml-5" >
                          <img src="<?= $this->data[array_key_last($this->data) - $i]['foto']?>">
                        </figure>
                      </a>
                      </div>
                      <div class="card-header-title">
                        <?= $this->data[array_key_last($this->data) - $i]['name']?>
                      </div>
                    </div>
                  <?php }$i = $n;}?>
                </div>
              <?php }?>
              
            </div>
          </div>
        <?php } ?>
    </div>
  </div>
  <?php }else {?>
    <div class="column is-center">
      <figure class="image">
        <img src="accets/img/semproduto.jpg">
      </figure>
      </a>
    </div>
  <?php }?>
<div class="has-background-grey-lighter ">
  <div class="container">
    <div class="columns">
      <div class="column">
        <a href="/store">
          <div class="box">
            Lojas
          </div>
        </a>
      </div>
    </div>
    <div class="columns">
      <div class="cont">
        <?php for ($i=0; $i < 10; $i++) {?>
          <?php if(!empty($this->data[array_key_last($this->data) - ($i + 5)])) {?>
            <div class="column is-one-fifth">
              <a href="<?php if(isset($_COOKIE['token'])) {?>
                /product/<?= $this->data[array_key_last($this->data)-($i + 5)]['slug']; }else {
                echo "/login"; }?>">
                <div class="box">
                  <div class="card-image m-2">
                    <figure class="image ml-5">
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

