<div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-6">
                <div class="col-md-12 container">
                    <br>
                    <h2 class="text-primary"><?php echo $TitreDeLaPage ?></h2>
                    <?php if ($TitreDeLaPage == 'Corriger votre formulaire') echo 'Un ou plusieurs champs incorects ';
                        if(!isset($txtObjet)) $txtObjet=''; if(!isset($txtTitre)) $txtTitre='';if(!isset($txtMessage)) $txtMessage='';
                    echo form_open('AdministrateurSuper/rediger_newsletter');
                    echo csrf_field()
                    ?>
                    <?php 
                    echo form_label('Objet', 'txtObjet');
                    echo form_input('txtObjet', set_value('txtTitre'),['placeholder' => 'Objet', 'class'=>'form-control']);
                    echo '<br>';
                    echo form_label('Titre', 'txtTitre');
                    echo form_input('txtTitre', set_value('txtTitre' , ),['placeholder' => 'Titre', 'class'=>'form-control']);
                    echo '<br>';
                    echo form_label('Message', 'txtMessage');
                    echo form_textarea('txtMessage', set_value('txtMessage'),['placeholder' => 'Entrez votre message', 'class'=>'form-control']);
                    echo '<br>';
                    echo form_submit('btnEnvoyer', 'Envoyer', ['class'=>'btn btn-danger btn-md'])
                    ?>
                    </form>
                </div>
            </div>
        </div>
    </div>