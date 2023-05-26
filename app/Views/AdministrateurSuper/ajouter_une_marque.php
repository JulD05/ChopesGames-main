<div class="container mt-5">
    <br>
    <h2 class="text-primary"><?php echo $TitreDeLaPage ?></h2>
    <?php if ($TitreDeLaPage == 'Corriger votre formulaire') echo service('validation')->listErrors();
    echo form_open_multipart('AdministrateurSuper/ajouter_une_marque');
    ?>
    <?php 
    echo form_label('Marque : ', 'txtMarque');
    echo form_input('txtMarque', set_value('txtMarque'),['placeholder' => 'Marque', 'class'=>'form-control']);
    echo '<br>';
    ?>
    <input type="submit" name="submit" class="btn btn-primary btn-md" value="Valider">
    </form>
</div>