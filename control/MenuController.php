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
        $results = Mob::all();
        $mobs = [];
        foreach ($results as $result){
            $mobs[] = new Mob($result['id'], $result['name'], $result['name_fr'], $result['score']);
        }
        include('../page/menu/index.php');
    }

}