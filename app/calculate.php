<?php
/**
 * Created by PhpStorm.
 * User: NewbeeWen
 * Date: 2018/12/28
 * Time: 13:37
 */

/** --post data--
 * greenChanel: greenChanel,
 * nirChanel: nirChanel,
 * threshold: threshold,
 * imgPath: imgPath,
 * imgName: imgName
 */

$greenChanel = $_POST['greenChanel'];
$nirChanel = $_POST['nirChanel'];
$threshold = $_POST['threshold'];
$imgPath = $_POST['imgPath'];
$imgName = $_POST['imgName'];
$imgFile = "../" . $imgPath . $imgName;

$cmd='python calculate.py' . ' ' .
    $greenChanel . ' '  . $nirChanel .  ' ' .  $threshold . ' ' .
    $imgFile;
$output = [];
exec ($cmd, $output);

echo $output[0];
