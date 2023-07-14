<?php

class ChatController {

    public static function switchAction($userAction)
    {
        switch ($userAction) {
            // case à ajouter pour chaque nouvelle action souhaitée
            case 'send':
                self::sendAction();
                break;

            default:
                self::defaultAction();
                break;
        }
    }

    public static function defaultAction(){
        $tabTitle = "";
        $results = Chat::allByDate();
        $chats = [];
        foreach ($results as $result){
            $chats[] = new Chat($result['id'], $result['content'], $result['date'], $result['color']);
        }
        include('../page/chat/index.php');
    }

    public static function sendAction(){
        Chat::create([$_POST['text'], $_POST['color']]);
        self::defaultAction();
    }

}