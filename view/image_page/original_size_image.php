<html>

<header>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


    <style>
        #image {
            display: block;
            margin-left: auto;
            margin-right: auto

    </style>

</header>


<body>

<? foreach ($original as $row) { ?>

    <img id="image" src="/<? echo $row['path'] ?>">

<? } ?>


</body>


</html>