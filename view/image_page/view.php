<html>


<header>


    <link rel="stylesheet" type="text/css" href="/template/css/main.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="http://code.jquery.com/jquery-latest.js"></script>


</header>



<body>

<div>


    <div class="jumbotron text-center">
        <a href="/">
            <button class="btn btn-default">На главную</button>
        </a>

    </div>

    <div class="container">

        <div class="table-striped">

            <table class="table">
                <?foreach ($page as $row) { ?>

                    <tr id="name">
                        <td><? echo $row['name'] ?></td>
                    </tr>

                    <tr>
                        <th><? $size = getimagesize($row['path']);

                            if ($size['0'] > 500 || $size['1'] > 500) {
                                //echo "test=".$size['0'];
                                ?>

                                <img id="image" height="<? echo $size['0']?>" width="<? echo $size['1']?>"
                                     class="img-thumbnail"
                                     src="/<? echo $row['path'] ?>"
                                     title="<? echo $row['name'] ?>">

                            <? } else {
                                ?>

                                <img id="image" class="img-thumbnail"
                                     src="/<? echo $row['path'] ?>"
                                     title="<? echo $row['name'] ?>">

                            <? } ?>


                        </th>
                    </tr>

                    <tr>
                        <th id="button"><a href="/original_image/<? echo $row['id'] ?>">
                                <button class="btn btn-default">Просмотр в полном размере</button>
                            </a>
                            <a href="/update_page/<? echo $row['id'] ?>">
                                <button class="btn btn-default">Редактировать коментарий</button>
                            </a>
                            <a href="/delete_page/<? echo $row['id'] ?>">
                                <button class="btn btn-default">Удалить изображение</button>
                            </a>
                        </th>
                    </tr>

                    <tr id="comment">
                        <td>Коментарий</td>
                    </tr>

                    <tr>
                        <td><? echo $row['comment'] ?></td>
                    </tr>

                    <tr>
                        <td><? echo $row['date'] ?><br><? echo round($row['size'] / 1024, 2) ?>.MB</td>
                        <!--   <td><? // echo $row['size'] / 1024 ?></td>-->

                    </tr>
                <? } ?>


            </table>

        </div>

    </div>



</html>