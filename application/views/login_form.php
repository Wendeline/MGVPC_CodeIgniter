<article>
    <h2><?php echo $titre;?></h2>
    <p><?php echo $soustitre;?></p>
    <p>
        <?php
        echo form_open('Login/check_admin');
        echo form_fieldset('identification');
            echo form_label('Mail','mail');
            echo form_input('mail');
            echo '<br>';
            echo form_label('Mot de Passe','pwd');
            echo form_password('pwd');
            echo '<br>';
            echo form_submit('valid','Valider');
        echo form_fieldset_close();
        echo form_close();                
        ?>
    </p>
</article>
