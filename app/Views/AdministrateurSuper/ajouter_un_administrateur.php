<div class="container mt-5">
<br>
    <h2 class="text-primary"><?php echo $TitreDeLaPage ?></h2>
    <?PHP if($TitreDeLaPage=='Corriger votre formulaire') echo service('validation')->listErrors();
                if(!isset($txtIdentifiant)) $txtIdentifiant=''; if(!isset($txtEmail)) $txtEmail='';if(!isset($txtBtn)) $txtBtn='Valider';
    echo form_open('AdministrateurSuper/ajouter_un_administrateur');
    echo csrf_field();
    ?>
    <?php
    echo form_label('Identifiant : ', 'Identifiant');
    echo form_input('Identifiant', set_value('Identifiant' , $txtIdentifiant ), ['placeholder' => 'Identifiant', 'class' => 'form-control']);
    echo form_input('IdentifiantEmp', set_value('IdentifiantEmp' , $txtIdentifiant ), ['placeholder' => 'Identifiant', 'class' => 'form-control'], 'hidden');
    echo '<br>';
    echo form_label('Mot de passe : ', 'Mdp');
    echo form_input('Mdp', set_value('Mdp'), ['placeholder' => 'Mot de passe', 'class' => 'form-control']);
    echo '<br>';
    echo form_label('Email : ', 'Email');
    echo form_input('Email', set_value('Email' , $txtEmail), ['placeholder' => 'Email@email.fr', 'class' => 'form-control']);
    echo '<br>';
    ?>
    <?php echo form_submit('btnValidate', set_value('Valider' , $txtBtn), ['class'=>'btn btn-danger btn-md']) ?>
    
    </form>  
</div>