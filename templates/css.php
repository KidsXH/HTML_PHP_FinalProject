<?php
/**
 * Created by PhpStorm.
 * User: NewbeeWen
 * Date: 2018/12/25
 * Time: 21:03
 */

$dir = basename(getcwd());
if ($dir == "templates") $path_fix = "../";
else $path_fix = "";

?>

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <link rel="stylesheet" href="<?php echo $path_fix."assets/css/style.css"?>">

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
  <script src="https://cdn.bootcss.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->
