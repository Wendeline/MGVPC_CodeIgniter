<article>
    <p>
        <?php
        echo form_open('Stock/UpdateNegStock');
        echo form_fieldset('Sortie de Sotck');
            echo form_label('Référence','ref');
            echo form_input('ref');
            echo '<br>';
            echo form_label('Nombre à enlever','nb');
            echo form_input('nb');
            echo '<br>';
            echo form_submit('valid','Valider');
        echo form_fieldset_close();
        echo form_close();                
        ?>
    </p>
</article>
