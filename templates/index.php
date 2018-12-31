<?php
$dir = basename(getcwd());
if ($dir == "templates") $path_fix = "../";
else $path_fix = "";
require_once($path_fix . "include/info.php");
?>
<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="icon" href="<?php echo $path_fix . "assets/favicon.ico" ?>">
    <title><?php echo $TITLE ?> | 主页</title>

    <?php require $path_fix . "templates/css.php"; ?>
    <link rel="stylesheet" href="<?php echo $path_fix."assets/css/home.css"?>">
</head>

<body>
<?php require $path_fix."templates/nav.php"; ?>

<div class="jumbotron jumbotron-fluid masthead">
    <div class="container">
        <h1>欢迎使用水体提取工具</h1>
        <br>
        <p><a class="btn btn-lg btn-outline-light" href="<?php echo $path_fix . "tools.php" ?>" role="button">立即开始</a></p>
    </div>
</div>

<!-- Bootstrap core JavaScript
  ================================================== -->
<?php require $path_fix . "templates/js.php"; ?>
</body>

</html>
