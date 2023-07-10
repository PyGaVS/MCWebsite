<?php

class VsController {

    public static function switchAction($userAction)
    {
        switch ($userAction) {
            // case à ajouter pour chaque nouvelle action souhaitée

            case 'choosing':
                self::choosingAction($_POST);
                break;

            case 'chat':
                //self::chatAction($_POST);
                break;

            default:
                self::defaultAction();
                break;
        }
    }

    public static function choosingAction($post){

    }  

    public static function defaultAction(){
        $tabTitle = "";
        $results = Mob::all();
        $mobs = [];
        foreach ($results as $result){
            $mobs[] = new Mob($result['id'], $result['name'], $result['name_fr'], $result['score']);
        }
        include('../page/vs/index.php');
    }

}