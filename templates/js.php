<?php
/**
 * Created by PhpStorm.
 * User: NewbeeWen
 * Date: 2018/12/25
 * Time: 21:50
 */
$dir = basename(getcwd());
if ($dir == "templates") $path_fix = "../";
else $path_fix = "";
?>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="<?php echo $path_fix . "assets/js/jquery-3.3.1.min.js" ?>" crossorigin="anonymous"></script>
<script src="https://cdn.bootcss.com/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.bootcss.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


<script src="<?php echo $path_fix . "assets/js/purify.min.js" ?>" crossorigin="anonymous"></script>
<script src="<?php echo $path_fix . "assets/js/bootstrap.bundle.min.js" ?>" crossorigin="anonymous"></script>
<script src="<?php echo $path_fix . "assets/js/fileinput.min.js" ?>" crossorigin="anonymous"></script>
<script src="<?php echo $path_fix . "assets/js/theme.min.js" ?>" crossorigin="anonymous"></script>
<script src="<?php echo $path_fix . "assets/js/bootstrap-input-spinner.js" ?>"></script>
