<?php

class Mob extends Model {

    private int $id;
    private string $name;
    private string $name_fr;
    private int $score;

    public function __construct($id, $name, $name_fr, $score){

        $this->id = $id;
        $this->name = $name;
        $this->name_fr = $name_fr;
        $this->score = $score;
    }

    public function getId(){
        return $this->id;
    }

    public function getName(){
        return $this->name;
    }

    public function __toString(){
        return '<p> Id : '.$this->id.'</p>'.
               '<p> Name : '.$this->name.'</p>'.
               '<p> Nom français : '.$this->name_fr.'</p>'.
               '<p> Score : '.$this->score.'</p><br>';
    }

    public static function create($element) {
        $request="INSERT INTO `mob` (`id`, `name`,`name_fr`, `score`) VALUES
                (NULL, '" . $element[0] . "', '" . $element[1] . "', '0')";
        
        return Connection::exec($request);
        
    }

}