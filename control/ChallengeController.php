<?php

class ChallengeController {

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
        $challenges = [
            'Pet a creeper in a cage with a name tag in your survival world',
            'Do 20 push-ups',
            'Survive in a flat world',
            'Trap your friend',
            'Do a mlg over the clouds with only one click in your survival world',
            'Raid a mansion eating only chorus fruit',
            'Kill the Wither with bee army',
            'Put a disc on a jukebox in a ancient village in your survival world (destroy nothing and stay)',
            'Farm wither skeleton head eating only soup, stew, cookie or cake',
            'Create a water pool in your survival world',
            'Create a roller coaster in your survival world'
        ];
        $challenge = $challenges[array_rand($challenges, 1)];
        $tabTitle = "";
        include('../page/challenge/index.php');
    }

}