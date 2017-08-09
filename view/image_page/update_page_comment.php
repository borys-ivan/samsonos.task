<html>


<header>


    <link rel="stylesheet" type="text/css" href="/template/css/main.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="http://code.jquery.com/jquery-latest.js"></script>


</header>




<body id="block">

<div>


    <div class="jumbotron text-center">
        <a href="/"><button class="btn btn-default">На главную</button></a>

    </div>

    <?php if (isset($errors) && is_array($errors)): ?>
        <ul>
            <?php foreach ($errors as $error): ?>
                <li class="warning_false"> - <?php echo $error; ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <div class="container">

        <div class="table-striped">

            <table class="table">
                <? foreach ($page as $row) { ?>

                    <tr id="name">
                        <td><? echo $row['name'] ?></td>
                    </tr>

                    <tr>
                        <th><? $size = getimagesize($row['path']);

                            if ($size['0'] > 200 && $size['0'] > 200) {
                                //echo "test=".$size['0'];
                                ?>

                                <img id="image" height="50%" width="50%"
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

                    <tr id="comment">
                        <td>Коментарий</td>
                    </tr>

                    <tr>
                        <form method="post">

                            <td><textarea id="<?echo $class_comment?>" class="form-control" cols="70" name="comment"><? echo $row['comment'] ?></textarea></td>

                    </tr>

                    <tr><td id="button"><input class="btn btn-default" type="submit" value="Обновить"></td></tr>

                    </form>

                <? } ?>


            </table>

        </div>

    </div>

</html>