<div class="container mt-5">
    <br>
    <h2 class="text-primary mb-5">Liste des administrateur</h2>
    <table class="table">
        <tbody>
            <?php
                foreach ($AdmEmp as $Emp):?>
            <tr>
                <?php echo form_open('AdministrateurSuper/modifier_supprimer_un_administrateur');
                echo csrf_field();?>
                <td><?php echo form_input('idEmp' , set_value('Emp', $Emp['IDENTIFIANT']),['placeholder' => 'Nom', 'class'=>'form-control'], 'hidden') ?></td>
                <td><?php echo $Emp['IDENTIFIANT'] ?></td>
                <td><?php echo form_submit('btnModif', 'Modifier ', ['class'=>'btn btn-danger btn-md']) ?></td>
                <td><?php echo form_submit('btnSup', 'Supprimer ', ['class'=>'btn btn-outline-danger btn-md']) ?></td>
                </form>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>