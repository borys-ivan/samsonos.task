<html xmlns="http://www.w3.org/1999/html">

<header>


    <link rel="stylesheet" type="text/css" href="/template/css/pagination.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="http://code.jquery.com/jquery-latest.js"></script>-->

    <link rel="stylesheet" type="text/css" href="/template/css/main.css">


</header>

<body id="block">

<div>


    <div class="jumbotron text-center">
        <h1>Images gallery</h1>

        <br><a href="/add_image">
            <button class="btn btn-default">ЗАГРУЗКА ИЗОБРАЖЕНИЕ</button>
        </a>

    </div>


    <!--    <div class="container">

            <form method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <h4>Пользователь</h4>
                    <input class="form-control" id="user" type="text" name="user"> <br>
                    <h4>Email</h4>
                    <input class="form-control" id="email" type="text" name="email"> <br>
                    <h4>Задача</h4>
                    <textarea class="form-control" id="task" name="task" rows="5" cols="40"></textarea> <br><br>



                    <input id="image" name="picture" type="file" name="picture"><br>
                    <center><input class="btn btn-default" type="submit" value="Добавить задачу" name="submit_image">
                    </center>
                </div>
            </form>

        </div>

        <span id="output"></span>
        <p style="text-align: center">
            <button class="btn btn-default" onclick="test()">Предварительный просмотр</button>-->

    <?php if (isset($errors) && is_array($errors)): ?>
        <ul>
            <?php foreach ($errors as $error): ?>
                <li class="warning_false"> - <?php echo $error; ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>


    <!--    <div id="block">-->
    <div class="container">

        <div class="table-striped">


            <table class="table">

                <thead>
                <!--  <tr>
                      <th colspan="2"><h3></h3></th>

                  </tr> -->


                <!--  <form method="post">-->
                <tr class="table_com">
                    <th>
                        <h6>Сортировка</h6>
                        <select class="form-control" name="sort" id="sort">
                            <? if ($sort == "ASC") { ?>
                                <option selected value="ASC">по возрастанию</option>
                                <option value="DESC">по убыванию</option>
                            <? } else { ?>
                                <option selected value="DESC">по убыванию</option>
                                <option value="ASC">по возрастанию</option>
                            <? } ?>
                        </select>
                    </th>

                    <th>

                        <h6>Значение</h6>
                        <select class="form-control" name="value" id="value">
                            <? if ($value == "id") { ?>
                                <option selected value="id">по умолчанию</option>
                                <option value="date">по дате</option>
                                <option value="size">по размеру</option>
                            <? }
                            if ($value == "date") { ?>
                                <option selected value="date" id="date">по дате</option>
                                <option value="id">по умолчанию</option>
                                <option value="size">по размеру</option>
                            <? }
                            if ($value == "size") { ?>
                                <option selected value="size" id="size">по размеру</option>
                                <option value="date">по дате</option>
                                <option value="id">по умолчанию</option>
                            <? } ?>
                        </select>
                    </th>

                    <th>
                        <h6>Дата с</h6>

                            <input id="start_date" class="form-control" type="date" name="start_date"
                                   value="<? echo $start_date ?>">

                    </th>
                    <th>
                        <h6>Дата по</h6>

                            <input id="finish_date" name="finish_date" class="form-control" type="date"
                                   value="<? echo $finish_date ?>">

                    </th>

                    <th>
                        <h6>Размер с(KB)</h6>

                        <input id="start_size" class="form-control" type="text" name="start_size"
                               size="5"
                               value="<? echo $start_size ?>">

                    </th>
                    <th>
                        <h6>Размер по(KB)</h6>

                        <input id="finish_size" class="form-control" type="text"
                               name="finish_size" size="5"
                               value="<? echo $finish_size ?>">

                    </th>

                    <th>
                        <input class="form-control" class="btn btn-default" type="submit" id="submit" name="submit"
                               value="сортировать">
                    </th>

                    <th><input class="form-control" class="btn btn-default" type="submit" id="default" name="default"
                               value="по умолчанию"></th>


                </tr>
                </thead>

            </table>


            <center><? if (is_array($image)) {
                    foreach ($image as $row) { ?>

                        <? $size = getimagesize($row['path']);

                        if ($size['0'] > 200 && $size['1'] > 200) {
                            //echo "test=".$size['0'];
                            ?>

                            <a href="image/<? echo $row['id'] ?>"><img id="image_view" height="20%" width="20%"
                                                                       class="img-thumbnail"
                                                                       src="<? echo $row['path'] ?>"
                                                                       title="<? echo $row['name'] ?>"></a>

                        <? } else {
                            ?>

                            <a href="image/<? echo $row['id'] ?>"><img id="image_view" class="img-thumbnail"
                                                                       src="<? echo $row['path'] ?>"
                                                                       title="<? echo $row['name'] ?>"></a>

                        <? }
                    }
                } ?>

            </center>
        </div>
    </div>


    <br>
    <? echo $pagination_list_image->get(); ?>

</body>


<script>


</script>
<!--<script src="http://code.jquery.com/jquery-latest.js"></script>-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="/template/js/ajax.js"></script>

</html>