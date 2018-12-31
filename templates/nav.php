<?php
    $dir = basename(getcwd());
    if ($dir == "templates") $path_fix = "../";
    else $path_fix = "";
    require_once $path_fix . "include/info.php";
?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="./">水体提取工具</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="./">主页</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="docs.php">文档</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="tools.php">工具</a>
                </li>
            </ul>
            <?php
            if ($LOGIN_MOD == 1)
                require_once $path_fix . "templates/login.php";
            ?>
        </div>
    </div>
</nav>
