<?php $this->layout('master');
    $qtt = sizeof($this->data);
?>
<div class="container is-desktop is-mobile mt-6">
    <div class="columns has-background-grey-lighter">
        <div class="column">
            <div class="box"></div>
        </div>
        <div class="column">
            <?php for ($i=0; $i < $qtt; $i++) { ?>
                <a class="m-1" href="http://localhost:8000/store/<?= $this->data[$i]['slug']?>">
                    <div class="box" style="background-image: url('../<?= $this->data[$i]['imagem']?>'); background-position: center; ">
                        <figure class="image is-64x64 is-center">
                            <img class="is-rounded" src="../accets/img/perfil.jpg">
                        </figure>
                        <div class="title has-text-primary"> <?= $this->data[$i]['name']?></div>
                    </div>
                </a>
            <?php } ?>
        </div>
    </div>
</div>
