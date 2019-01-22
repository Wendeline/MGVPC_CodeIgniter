<article>
    <p>
        <?php
        echo form_open('Stock/UpdatePosStock');
        echo form_fieldset('Entrée de Sotck');
            echo form_label('Référence','ref');
            echo form_input('ref');
            echo '<br>';
            echo form_label('Nombre à ajouter','nb');
            echo form_input('nb');
            echo '<br>';
            echo form_submit('valid','Valider');
        echo form_fieldset_close();
        echo form_close();                
        ?>
    </p>
</article>
