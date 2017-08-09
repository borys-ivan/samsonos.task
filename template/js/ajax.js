$(document).ready(function () {


    $("#submit").click( function () {

        var submit = $("#submit").val();
        var sort = $("#sort").val();
        var value = $("#value").val();
        var start_date=$("#start_date").val();
        var finish_date=$("#finish_date").val();
        var start_size=$("#start_size").val();
        var finish_size=$("#finish_size").val();

        $.post('/', {submit:submit,sort: sort ,value:value,start_date:start_date,finish_date:finish_date,
            start_size:start_size,finish_size:finish_size}, function (data) {

            $("#block").html(data);
        });

        return false;
    });



    $("#default").click( function () {

        var submit = $("#default").val();


        $.post('/', {default: submit}, function (data) {

            $("#block").html(data);
        });

        return false;
    });



    $("a.test_page").click(  function () {

        var page=$(this).attr("data-id");
        $.post('/page-'+page, {}, function (data) {

            $("#block").html(data);
        });

        return false;
    });

});









