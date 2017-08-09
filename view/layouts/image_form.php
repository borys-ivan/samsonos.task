<html>


<header>

    <link rel="stylesheet" type="text/css" href="/template/css/main.css">
    <link rel="stylesheet" type="text/css" href="/template/css/pagination.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="http://code.jquery.com/jquery-latest.js"></script>



</header>

<div>


    <div class="jumbotron text-center">
        <a href="/"><button class="btn btn-default">На главную</button></a>

    </div>


<body>

<?php if (isset($errors) && is_array($errors)): ?>
    <ul>
        <?php foreach ($errors as $error): ?>
            <li class="warning_false"> - <?php echo $error; ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>


<div class="container">

    <form method="post" enctype="multipart/form-data">
        <div class="form-group">
            <h4>Изображение</h4>
            <input  id="image" name="picture" type="file" name="picture"><br>
            <h4>Коментарий</h4>
            <textarea id="<?echo $class_comment?>" class="form-control" id="comment" name="comment" rows="5" cols="40"></textarea> <br><br>
            <center><input  class="btn btn-default" type="submit" value="Добавить изображения" name="submit_image">
            </center>
        </div>
    </form>

</div>

</body>


</html>