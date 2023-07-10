<?php 
if (isset($_GET['route'])) {
    $route=$_GET['route'];
} else {
    $route = 'menu';
}
?>
<!DOCTYPE html>
<html>
<head>
    <title><?php echo $GLOBALS['ENV']['APP_NAME'] .$tabTitle ; ?></title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="./css/default.css" rel="stylesheet">  
    <script src="./js/main.js"></script>
    <?php 
    if($route=='chat'){
        echo '<script src="./js/main-chat.js"></script>';
    }
    ?>
</head>
<body class="light">
    <div class=header-container>
        <?php 

        $html = '';
        $items = [
            ['menu', 'Menu'],
            ['vs', 'Rank mobs'],
            ['chat', 'Chat'],
            ['settings', 'Settings']
        ];

        foreach($items as $item){
            if($route == $item[0]){
                $html .= '<div class=header-selected-item>';
                //$html .= '<a href="?route='.$item[0].'">'.$item[1].'</a>';
                $html .= '<a>'.$item[1].'</a>';
                $html .= '</div>';
            } else {
                $html .= '<div class=header-item>';
                $html .= '<a href="?route='.$item[0].'">'.$item[1].'</a>';
                $html .= '</div>';
            }
        }

        echo $html;
        ?>
        <!--
        <div class=header-item>
            <a href="?route=menu">Menu</a>
        </div>
        <div class=header-item>
            <a href="?route=vs">Rank mobs</a>
        </div>
        <div class=header-item>
            <a href="?route=chat">Chat</a>
        </div>
        <div class=header-item>
            <a href="?route=settings">Settings</a>
        </div>
        <div class=header-item>
            <a href="?route=mobs">Mob list</a>
        </div>-->
        
    </div>