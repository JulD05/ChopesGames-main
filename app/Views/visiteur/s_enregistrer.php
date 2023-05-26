
    <div>
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-md-6">
                    <div class="col-md-12 container">
                        <?php echo form_open('Visiteur/s_enregistrer') ?>
                            <br>
                            <h3 class="text-center text-primary"><?php echo $TitreDeLaPage ?></h3>
                            <?PHP if($TitreDeLaPage=='Corriger votre formulaire') echo service('validation')->listErrors();
                             if(!isset($txtNom)) $txtNom=''; if(!isset($txtPrenom)) $txtPrenom=''; if(!isset($txtAdresse)) $txtAdresse=''; if(!isset($txtVille)) $txtVille=''; if(!isset($txtCP)) $txtCP=''; if(!isset($txtEmail)) $txtEmail=''; ?>
                                <?php
                                    echo form_input('txtNom', set_value('txtNom', $txtNom),['placeholder' => 'Nom', 'class'=>'form-control']);?> <br />
                                    <?php echo form_input('txtPrenom', set_value('txtPrenom', $txtPrenom),['placeholder' => 'Prenom', 'class'=>'form-control']);?> <br />
                                    <?php echo form_input('txtEmail', set_value('txtEmail', $txtEmail),['placeholder' => 'Email', 'class'=>'form-control'], 'email');?> <br />
                                    <?php echo form_input('txtAdresse', set_value('txtAdresse', $txtAdresse),['placeholder' => 'Adresse', 'class'=>'form-control']);?> <br />
                                    <?php echo form_input('txtVille', set_value('txtVille', $txtVille),['placeholder' => 'Ville', 'class'=>'form-control']);?> <br />
                                    <?php echo form_input('txtCP', set_value('txtCP', $txtCP),['placeholder' => 'Code Postal', 'class'=>'form-control']); ?> <br />
                                    <?php echo form_input('txtMdp', set_value('txtMdp'),['placeholder' => 'Mot de passe', 'class'=>'form-control'], 'password'); ?> <br />
                                    <?php echo form_input('confirmMdp', set_value('confirmMdp'),['placeholder' => 'Confirmez mot de passe', 'class'=>'form-control'], 'password');?> <br />
                            
                            <input type="submit" name="submit" class="btn btn-primary btn-md" value="Valider">
                            <div class="text-primary right">
                            <a class="btn btn-primary" href="<?php echo site_url('Visiteur/se_connecter') ?>">Se connecter</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script language=javascript>
     function Affichermasquermdp() {
  var x = document.getElementById("mdp");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
} 
      </script> 