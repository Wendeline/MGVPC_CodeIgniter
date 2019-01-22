<article>
    <p>
        <?php

        //Valeur Stock total
        $lesProd = Produit::all();
        $prix = 0;
        foreach ($lesProd as $prod) {
            $stockProd = $prod->qteStock;
            $prixProd = $prod->PUHTProd;
            $prix = $prix + $prixProd*$stockProd;
        }
        echo "<h3>La valeur de votre stock total est de ". $prix."€. </h3>";
        //Valeur stock par produit
        echo "Valeur de votre stock par produit : <br>";

        echo '<table class="tableau_bleu">';
          echo '<thead>
                  <tr>
                      <th>Produit</th>
                      <th>Prix du stock</th>
                  </tr>
                </thead>
                <tbody>';
                    foreach ($lesProd as $prod) {
                        $stockProd = $prod->qteStock;
                        $prixProd = $prod->PUHTProd;
                        $price = $prixProd*$stockProd;
                        echo '<tr><td>'. $prod->refProd . "</td><td>". $price."€ </td><tr>";
                        $price = 0;
                    }
        echo " </tbody>
        </table>";


        ?>
    </p>
</article>
