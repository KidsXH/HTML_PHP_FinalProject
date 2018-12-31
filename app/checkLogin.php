<?php
$username = $_POST['username'];
$password = $_POST['password'];

if ($username == 'root' && $password == 'root') {
    echo 'OK';
}
else {
    echo 'Fail';
}
