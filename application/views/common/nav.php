<nav> 
    <?php  if ($this->session->adm == TRUE) {    ?>
    <ul id="menu" class="topmenu">
        <li class="topfirst"><?php echo anchor(current_url(),img('stock.png').' Gestion du stock','style="height:18px;line-height:18px;"') ?>
            <ul>
            <li><a href="<?php echo base_url('Stock/EntreeDeStock')?>">Saisir une entrée en stock</a></li>
            <li><a href="<?php echo base_url('Stock/AccesStat')?>">Statistiques</a></li>
            </ul>
        </li>
        <li class="topmenu"><?php echo anchor(current_url(),img('prod.png').' Produits','style="height:18px;line-height:18px;"') ?>
            <ul>
            <li><a href="<?php echo base_url('Prod/Add')?>">Nouveau produit disponible</a></li>
            <li><a href="<?php echo base_url('Prod/Update')?>">Modifier un produit</a></li>
            <li><a href="<?php echo base_url('Home/aSupp')?>">Retirer un produit de la vente</a></li>
            </ul>
        </li>
        <li class="toplast">
            <?php echo anchor('login/disconnect',img('switch.png').' Déconnecter','style="height:18px;line-height:18px;"') ?>
        </li>
    </ul>
   <?php  } ?>
</nav>
