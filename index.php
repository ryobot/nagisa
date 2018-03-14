<!DOCTYPE html>
<html>
<head>
    <title>PHP infinite scroll pagination</title>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <style type="text/css">
        .ajax-load{
            background: #e1e1e1;
            padding: 10px 0px;
            width: 100%;
        }
    </style>
</head>
<body>

<div class="container">
    <h2 class="text-center">PHP infinite scroll pagination</h2>
    <br/>
    <div class="col-md-12" id="post-data">
        <?php
            require('db_config.php');
            $sql = "SELECT * FROM posts
            ORDER BY id DESC LIMIT 8"; 
            $result = $mysqli->query($sql);
        ?>
        <?php include('data.php'); ?>

    </div>
</div>

<div class="ajax-load text-center" style="display:none">
    <p><img src="http://demo.itsolutionstuff.com/plugin/loader.gif">Loading More post</p>
</div>

<script type="text/javascript">
    $(window).scroll(function() {
        if($(window).scrollTop() + $(window).height() >= $(document).height()) {
            var last_id = $(".post-id:last").attr("id");
            loadMoreData(last_id);
        }
    });

    function loadMoreData(last_id){
      $.ajax(
            {
                url: '/loadMoreData.php?last_id=' + last_id,
                type: "get",
                beforeSend: function()
                {
                    $('.ajax-load').show();
                }
            })
            .done(function(data)
            {
                $('.ajax-load').hide();
                $("#post-data").append(data);
            })
            .fail(function(jqXHR, ajaxOptions, thrownError)
            {
                  alert('server not responding...');
            });
    }
</script>

</body>
</html>

