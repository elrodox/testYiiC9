<?php
    /* @var $this PersonaController */
    /* @var $personas Array */
?>
<div class="container">
    <div class="row">
        <div class="col-xs-4">
            <br>
            <?php $this->renderPartial("form"); ?>
        </div>
        <div class="col-xs-8">
            <?php $this->renderPartial("lista", array('personas'=>$personas)); ?>
        </div>
    </div>
</div>