<?php $this->layout('master');
$t = 0;
?>

<div class="columns">
    <div class="cont">
        <?php for ($i=0; $i < 10; $i++) {  $t++?> 
            <div class="column">
                <div class="box"></div>
            </div>
            <?php if($t == 5) {?>
            <div class="break"></div>
            <?php $t = 0;}?>
        <?php } ?>
    </div>
</div>

