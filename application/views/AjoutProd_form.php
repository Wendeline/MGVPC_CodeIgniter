<article>
    <p>
        <?php
        echo form_open_multipart('Prod/Ajout');
        echo form_fieldset('Ajout d\'un produit');
            echo form_label('Référence','ref');
            echo form_input('ref');
            echo '<br>';
            echo form_label('Emplacement','emp');
            echo form_input('emp');
            echo '<br>';
            echo form_label('Nom','nom');
            echo form_input('nom');
            echo '<br>';
            echo form_label('Description','desc');
            echo form_input('desc');
            echo '<br>';
            echo form_label('PUHT','prix');
            echo form_input('prix');
            echo '<br>';
            echo '<br>';

            ?>

            <br/><br /><?php

            echo form_submit('valid','Valider');
        echo form_fieldset_close();
        echo form_close();
        ?>
    </p>
</article>
