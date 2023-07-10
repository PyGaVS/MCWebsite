<?php

class Chat extends Model {

    private int $id;
    private string $content;
    private $date;
    private string $color;

    public function __construct($id, $content, $date, $color){

        $this->id = $id;
        $this->content = $content;
        $this->date = $date;
        $this->color = $color;
    }

    public function __toString(){
        return '<p style="color: '.$this->color.';">'.$this->content.'</p>';
    }

    public static function create($element) {
        $element[0] = explode('\'',$element[0]);
        $element[0] = implode("\'",$element[0]);
        $request="INSERT INTO `chat` (`id`, `content`, `color`) VALUES
                (NULL, '" . $element[0] . "', '".$element[1]."')";
        
        return Connection::exec($request);
        
    }

    public static function allByDate() {
        $request='SELECT * FROM '.self::_getTable().
        'WHERE CAST(date AS DATE) = CAST(GETDATE() AS DATE);
        ORDER BY date ASC';
        return Connection::query("SELECT * FROM ".self::_getTable());
    }


}