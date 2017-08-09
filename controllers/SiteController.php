<?php

include_once ROOT . '/models/Image.php';


include_once ROOT . '/components/Pagination.php';


class SiteController
{

    public function actionIndex($page = 1)
    {


        $MaxDate = Image::getMaxDate();

        $min_date = Image::getMinDate();

        $max_size = Image::getMaxSize();

        $total = Image::getListImageCount();

        if (isset($_POST['default'])) {

            $_SESSION['sort'] = 'DESC';
            $_SESSION['value'] = 'id';
            $_SESSION['start_date'] = $min_date;
            $_SESSION['finish_date'] = $MaxDate;
            $_SESSION['start_size'] = 1;
            $_SESSION['finish_size'] = $max_size;
        }

        if (!isset($_SESSION['sort'])) {

            $_SESSION['sort'] = 'DESC';
            $_SESSION['value'] = 'id';
            $_SESSION['start_date'] = $min_date;
            $_SESSION['finish_date'] = $MaxDate;
            $_SESSION['start_size'] = 1;
            $_SESSION['finish_size'] = $max_size;
        }


        $sort = $_SESSION['sort'];
        $value = $_SESSION['value'];
        $start_date = $_SESSION['start_date'];
        $finish_date = $_SESSION['finish_date'];
        $start_size = $_SESSION['start_size'];
        $finish_size = $_SESSION['finish_size'];



        if (isset($_POST['submit']) && isset($_POST['sort']) && isset($_POST['value'])) {

            $sort = $_POST['sort'];
            //echo $sort;
            $value = $_POST['value'];
            $start_date = $_POST['start_date'];
            $finish_date = $_POST['finish_date'];
            $start_size = $_POST['start_size'];
            $finish_size = $_POST['finish_size'];

            $_SESSION['sort'] = $sort;
            $_SESSION['value'] = $value;
            $_SESSION['start_date'] = $start_date;
            $_SESSION['finish_date'] = $finish_date;
            $_SESSION['start_size'] = $start_size;
            $_SESSION['finish_size'] = $finish_size;


        }


        $errors = false;
        $class_start_size=false;
        $class_finish_size=false;
        $class_start_date=false;
        $class_finish_date=false;
        //$class = false;

        //echo $errors;
        //echo $class;

        // Валидация полей
        if (Image::checkSizeS($start_size)) {
            $errors[] = 'Заполните личейку Размер';
           // $class_start_size = 'red';
            $class_start_size = 'start_size';
        }

        if (Image::checkSizeF($finish_size)) {
            $errors[] = 'Заполните личейку Размер';
          //  $class_finish_size = 'red';
            $class_finish_size = 'finish_size';
        }

        if (Image::checkDateS($start_date)) {
            $errors[] = 'Заполните личейку Дату';
          //  $class_start_date = 'red';
            $class_start_size = 'start_date';
        }

        if (Image::checkDateF($finish_date)) {
            $errors[] = 'Заполните личейку Дату';
          //  $class_finish_date = 'red';
            $class_finish_size = 'finish_date';
        }


        $image = Image::getImage($page, $sort, $value, $start_date,
            $finish_date, $start_size, $finish_size);


        $pagination_list_image = new Pagination($total, $page, Image::SHOW_BY_DEFAULT, 'page-');

        require_once(ROOT . '/view/site/index.php');

        return true;
    }


    public function actionPageImage($id)
    {


        $page = Image::getImageID($id);

        require_once(ROOT . '/view/image_page/view.php');

        return true;
    }


    public function actionAddImage()
    {

        $errors = false;

        //if (isset($_POST['comment'])) {
        if (isset($_POST['comment'])) {

            $comment = $_POST['comment'];

            if (Image::checkComment($comment)) {
                $errors[] = 'Заполните коментарий';
                $class_comment = 'red';
            }

            Image::addImage($comment);
        }//else{//echo $test='1111';}

        require_once(ROOT . '/view/layouts/image_form.php');

        return true;
    }


    public function actionOriginalImage($id)
    {


        $original = Image::getImageID($id);

        require_once(ROOT . '/view/image_page/original_size_image.php');

        return true;
    }


    public function actionUpdatePage($id)
    {


        if (isset($_POST['comment'])) {

            $comment = $_POST['comment'];

            if (Image::checkComment($comment)) {
                $errors[] = 'Заполните коментарий';
                $class_comment = 'red';
            }

            if (!empty($comment)) {

                Image::update_Page($id, $comment);


                header("Location: /image/" . $id);
            }

        }

        $page = Image::getImageID($id);

        require_once(ROOT . '/view/image_page/update_page_comment.php');

        return true;
    }

    public function actionDeletePage($id)
    {

        if (isset($id)) {

            Image::delete_Page($id);


            header("Location: /");

        }

        return true;
    }


}