<?php include('../page/template/header.php');
//Pour accéder aux images : <img src="../page/template/img/Chicken.jpg" alt="bruh" />
//Superglobale : <a href="?action=truc">Ajouter une catégorie</a>
/*
foreach ($mobs as $mob){
    echo '<img src="../page/template/img/'.$mob->getName().'.jpg" alt="this mob has no pic yet :(" width=300px/>';
    echo $mob;
} <?="aa"?>
 */?>
<div class="center">
    <div class="mc-button"><a href="?route=challenge" class = "mc-button">Challenges</a></div>
    <div class="mc-button"><a href="?route=chat" class = "mc-button">Chat</a></div>
    <div class="mc-button">
        <a href="https://portfolio-phi-eight-17.vercel.app/" target="_blank" class = "mc-button">Credit</a>
        <a href="?route=settings" class = "mc-button">Settings</a>
    </div>

    <div class="fly"></div>
</div>
<?php include('../page/template/footer.php');?>