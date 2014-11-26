<?php
    /* @var $this PersonaController */
    /* @var $persona Persona */
?>
<tr>
    <td class="id"><?php echo $persona->id ?></td>
    <td class="nombre"><?php echo $persona->nombre ?></td>
    <td><?php echo $persona->apellido ?></td>
    <td><?php echo $persona->email ?></td>
    <td><?php echo $persona->estudiante ?></td>
    <td><?php echo $persona->sexo ?></td>
    <td><?php echo $persona->color ?></td>
    <td>
        <button id="editar" class="btn btn-warning"><span class="glyphicon glyphicon-pencil"></span></button>
        <button id="eliminar" class="btn btn-danger" href="index.php?r=persona/eliminar"><span class="glyphicon glyphicon-remove"></span></button>
    </td>
</tr>