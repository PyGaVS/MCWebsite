<?php include('../page/template/header.php');
//Pour accéder aux images : <img src="../page/template/img/Chicken.jpg" alt="bruh" />
//Superglobale : <a href="?action=truc">Ajouter une catégorie</a>
/*
foreach ($mobs as $mob){
    echo '<img src="../page/template/img/'.$mob->getName().'.jpg" alt="this mob has no pic yet :(" width=300px/>';
    echo $mob;
}
 */
?>
<div class="center">
    <p class="yellow-text">
        <?=$challenge?>
    </p>
</div>

<div class="fixed-mc-button"><a href="?route=challenge" class = "mc-button">Refresh</a></div>

<?php include('../page/template/footer.php');?>