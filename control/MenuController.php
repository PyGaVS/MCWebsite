<?php

class MenuController {

    public static function switchAction($userAction)
    {
        switch ($userAction) {
            // case à ajouter pour chaque nouvelle action souhaitée

            default:
                self::defaultAction();
                break;
        }
    }

    public static function defaultAction(){
        $tabTitle = "";
        include('../page/menu/index.php');
    }

}