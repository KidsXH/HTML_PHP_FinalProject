<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->

    <link rel="icon" href="assets/favicon.ico">
    <title><?php echo $TITLE ?> | 主页</title>

    <?php require "templates/css.php"; ?>
</head>

<body>

<?php require "templates/nav.php"; ?>

<div class="jumbotron jumbotron-fluid masthead">
    <div class="container">
        <h1>欢迎使用水体提取工具</h1>
        <br>
        <p><a class="btn btn-lg btn-outline-light home-btn" href="tools.php" role="button">立即开始</a></p>
    </div>
</div>

<?php require "templates/js.php"; ?>

</body>

</html>
