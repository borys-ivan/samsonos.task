<?php

require_once '/template/php/ez_sql_core.php';
require_once '/template/php/ez_sql_mysqli.php';

class Db
{

    public static function dbConnect()
    {


        $db = new ezSQL_mysqli('root', '', 'images_gallery', 'localhost');

        $db->query("SET NAMES utf8");

        return $db;
    }

}