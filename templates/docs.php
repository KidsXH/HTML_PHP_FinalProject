<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->

    <link rel="icon" href="assets/favicon.ico">
    <title><?php echo $TITLE?> | 文档</title>

    <?php require "templates/css.php";?>
</head>

<body>
<?php require "templates/nav.php";?>

<div class="jumbotron jumbotron-fluid masthead doc-masthead">
    <div class="container">
        <h1>文档</h1>
        <p>技术报告</p>
    </div>
</div>
<div class="container">
<div class="row">
    <div class="col-md-9" role="main">
        <div>
            <h1 id="summary">概述</h1>
        </div>
    </div>
    <div class="col-md-3" role="complementary">
        <nav class="doc-sidebar affix">
            <ul class="nav">
                <li>
                    <a href="#summary">概述</a>
                    <ul class="nav">
                        <li><a href="#summary-func">功能</a></li>
                        <li><a href="#summary-tech">技术</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</div>
</div>

<?php require "templates/js.php";?>
</body>

</html>
