<?php


class Image


{
    const SHOW_BY_DEFAULT = 5;

    public static function getImage($page = 1, $sort,$value,$start_date,$finish_date,$start_size,$finish_size)
    {


        $db = Db::dbConnect();

        $page = intval($page);
        $offset = ($page - 1) * self::SHOW_BY_DEFAULT;




        $image = $db->get_results("SELECT*FROM images WHERE `date` BETWEEN '".$start_date."' AND '".$finish_date."' 
        AND `size` BETWEEN '".$start_size."' AND '".$finish_size."' ORDER BY `" . $value . "` " . $sort . " LIMIT " . self::SHOW_BY_DEFAULT .
            " OFFSET " . $offset, ARRAY_A);

       // print_r($image);

        if ($image) {
            foreach ($image as $row) {
                $rez[] = array('id' => $row['id'], 'name' => $row['name'], 'path' => $row['path']
                , 'date' => $row['date'], 'size' => $row['size']);
            }

            return $rez;

        }

    }


    public static function getImageID($id)
    {

        $db = Db::dbConnect();

        $page_id = $db->get_results("SELECT*FROM images WHERE id=" . $db->escape($id), ARRAY_A);

        if ($page_id) {

            foreach ($page_id as $row) {
                $rez[] = array('id' => $row['id'], 'name' => $row['name'], 'path' => $row['path'], 'comment' => $row['comment']
                , 'date' => $row['date'], 'size' => $row['size']);
            }

            return $rez;

        }

    }


    public static function update_Page($id, $comment)
    {

        $db = Db::dbConnect();

        $db->query("UPDATE `images` SET `comment`='" . $db->escape($comment) . "' WHERE id=" . $db->escape($id));

    }

    public static function delete_Page($id)
    {

        $db = Db::dbConnect();

        $db->query("DELETE FROM `images` WHERE id=" . $db->escape($id));

    }


    public static function getListImageCount()
    {
        $db = Db::dbConnect();
        $result = $db->get_var("SELECT count(ID) AS count FROM images ");

        return $result;

    }


    public static function getMaxDate()
    {

        $db = Db::dbConnect();

        $max_date = $db->get_var("SELECT MAX(date) FROM images");

        return $max_date;

    }

    public static function getMinDate()
    {

        $db = Db::dbConnect();

        $min_date = $db->get_var("SELECT MIN(date) FROM images");

        return $min_date;

    }


    public static function getMaxSize(){

        $db = Db::dbConnect();

        $max_size = $db->get_var("SELECT MAX(size) FROM images");

        return $max_size;

    }




    public static function addImage($comment)
    {

        $path = 'i/';
        $types = array('image/gif', 'image/png', 'image/jpeg');

        //       $types = array('image/gif', 'image/png', 'image/jpeg');

        if (empty($_FILES['picture']['name']))
            die('Добавьте изображение.<a href="/add_image">Перейти к форме </a>');

        if(!empty($comment)) {

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                if (!in_array($_FILES['picture']['type'], $types))
                    die('Запрещённый тип файла. <a href="/add_image">Попробовать другой файл?</a>');

               // if (!isset())
                //    die('Запрещённый тип файла. <a href="/add_image">Попробовать другой файл?</a>');

                if ($_FILES["picture"]["size"] <= 1024 * 1 * 1024) {

                    if (!@copy($_FILES['picture']['tmp_name'], $path . $_FILES['picture']['name']))
                        echo 'Что-то пошло не так';
                    else {
                        //echo 'Загрузка удачна';
                        $name = $_FILES['picture']['name'];
                        $name_path = $path . $_FILES['picture']['name'];
                        //$date = date("Y-m-d H:i:s");
                        $date = date("Y-m-d");
                        $size = $_FILES["picture"]["size"];
                        $db = Db::dbConnect();
                        $add_user = $db->query("INSERT INTO `images` (`name`, `path`, `comment`,`date`,`size`) 
              VALUES ('" . $db->escape($name) . "', '" . $db->escape($name_path) . "','" . $db->escape($comment) . "','" .
                            $db->escape($date) . "','" . $db->escape($size / 1024) . "')");


                        //$filename = $path . $_FILES['picture']['name'];
                        //echo $filename;

                        die($_FILES['picture']['name'].'.Загрузка удачна. <a href="/">На главную</a>');

                    }

                } else {
                    echo 'Файл більший 1 МВ';
                }
            }
        }

    }


    public static function checkSizeS($start_size)
{
    if (empty($start_size)) {
        return true;
    }
    return false;
}

    public static function checkSizeF($finish_size)
    {
        if (empty($finish_size)) {
            return true;
        }
        return false;
    }

    public static function checkDateS($start_date)
    {
        if (empty($start_date)) {
            return true;
        }
        return false;
    }

    public static function checkDateF($finish_date)
    {
        if (empty($finish_date)) {
            return true;
        }
        return false;
    }


    public static function checkComment($comment)
    {
        if (empty($comment)) {
            return true;
        }
        return false;
    }


}