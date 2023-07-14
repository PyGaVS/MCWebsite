<?php

class Model {

    protected static function _getTable(){
        $class = get_called_class();
        $class[0] = strtolower($class[0]);
        return $class;
    }

    public static function all() {
        $request='SELECT * FROM '.self::_getTable();
        return Connection::query("SELECT * FROM ".self::_getTable());
    }

}