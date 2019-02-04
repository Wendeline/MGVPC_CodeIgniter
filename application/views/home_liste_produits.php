        <article>
            <h2><?php echo $titre;?></h2>
            <p><?php echo $soustitre;?></p>
            <p>
            <table class="case_orange">
            <?php
                $cpt=0;
                echo "<tr>";
                foreach ($donnees as $produit) {
                    echo "<td width='30%'>";
                    //echo img('prod/'.$produit->refProd.'.jpg','height="150" width="150"');
                    //echo "<br>";
                    echo $produit->libProd;
                    echo "<br>";
                    echo "<b>".$produit->stockProd."</b> <i>en stock</i>";
                    echo "<br>";
                    echo "<br>";
                    echo '<a class="btn" href="'. base_url('Prod/Update/'.$produit->idProd) .'">Modifier</a>';
                    echo "<br>";
                    echo "<br>";
                    if ($produit->qteStock == 0) {
                      echo '<a class="btn" href="'. base_url('Prod/Delete/'. $produit->idProd) .'">Supprimer</a>';
                      echo "<br>";
                      echo "<br>";
                    }
                    echo "</td>";
                    $cpt++;
                    if ($cpt%3==0) {
                        echo "</tr><tr>";
                    }
                }
                echo "</tr>";
            ?>
            </table>
            </p>
        </article>
