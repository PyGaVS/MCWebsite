<?php include('../page/template/header.php');
//Pour accéder aux images : <img src="../page/template/img/Chicken.jpg" alt="bruh" />
//Superglobale : <a href="?action=truc">Ajouter une catégorie</a>
/*
foreach ($mobs as $mob){
    echo '<img src="../page/template/img/'.$mob->getName().'.jpg" alt="this mob has no pic yet :(" width=300px/>';
    echo $mob;
}
 */?>
<div class="chat-page">
<div class="wood-container" id="chat">
    <p>Ce chat se réinitialize tout les jours, cependant ne donnez pas vos informations personnels tel que : 
        votre numéro de téléphone, votre adresse ou des informations sur votre compte bancaire /!\
    </p>
    <?php 
    foreach ($chats as $chat){
        echo $chat;
    }
    ?>
</div>
<form class="send-message" method="POST" action="?route=chat&action=send">
    <input class="message-text" type="text" name="text">
    <input class="message-color" type="color" name="color">
    <button class="send-button" type="submit"><i class="fa-solid fa-paper-plane"></i></button>
</form>
</div>

<?php include('../page/template/footer.php');?>