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
        $results = Chat::all();
        $chats = [];
        $banned_words = [
            'enculé', 'fuck',
            'connard', 'asshole',
            'salope', 'dick', 'zeub',
            'bite', 'pussy',
            'suce', 'bitch', 'cunt'];
        
        foreach ($results as $result){
            foreach($banned_words as $word){
                
                /*if(strpos(strtolower($result['content']), $word) !== false){
                    $result['content'] = 'banned word were used';
                    
                }*/
                $result['content'] = str_replace($word, "*", $result['content']);
                $result['content'] = str_replace(strtoupper($word), "*", $result['content']);
            }

            if(strlen($result['content']) > 250){
                $result['content'] = substr($result['content'], 0, 249);
            }
            if($result['content']==''){
                $result['content']='hi';
            }
            $chats[] = new Chat($result['id'], $result['content'], $result['date'], $result['color']);
            
        }
        include('../page/chat/index.php');
    }

    public static function sendAction(){
            Chat::create([$_POST['text'], $_POST['color']]);
            self::defaultAction();
            }
}