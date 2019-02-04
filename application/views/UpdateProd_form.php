<article>
    <p>
        <?php
        //var_dump($produit);
        echo form_open_multipart('Prod/Modif/'.$produit->idProd);
        echo form_fieldset('Modifier un produit');
            echo form_label('Référence','ref');
            echo form_input('ref', $produit->idProd, "disabled");
            echo '<br>';
            echo form_label('Emplacement','emp');
            echo form_input('emp', $produit->emplacement);
            echo '<br>';
            echo form_label('Nom','nom');
            echo form_input('nom', $produit->libProd);
            echo '<br>';
            echo form_label('Description','desc');
            echo form_textarea('desc', $produit->descProd);
            echo '<br>';
            echo form_label('PUHT','prix');
            echo form_input('prix', $produit->prixProd);
            echo '<br>';

            ?>


            <br/><br /><?php

            echo form_submit('valid','Valider');
        echo form_fieldset_close();
        echo form_close();
        ?>
    </p>
</article>
