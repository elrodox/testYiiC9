<?php
    /* @var $this PersonaController */
    /* @var $personas Array */
?>
<h1>Listado de Personas</h1>
<!--<div class="table-responsive">-->
    <table class="table table-hover table-striped">
        <tr>
            <th>id</th>
            <th>nombre</th>
            <th>apellido</th>
            <th>email</th>
            <th>estudiante</th>
            <th>sexo</th>
            <th>color</th>
            <th>accion</th>
        </tr>
        <tbody class="lista-personas">
            <?php foreach($personas as $persona): ?>
                <?php $this->renderPartial('_ver', array("persona"=>$persona)) ?>
            <?php endforeach ?> 
        </tbody>
    </table>
<!--</div>-->