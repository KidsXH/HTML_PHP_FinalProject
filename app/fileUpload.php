<?php
    // _FILES下标表示input:file的name参数
    if (empty($_FILES['rawImg'])) {
        echo json_encode(['error' => 'No files found for upload.']);
        return;
    }

    // 获取文件
    $images = $_FILES['rawImg'];
    // 获取Extra data
    $userid = empty($_POST['userid']) ? '' : $_POST['userid'];
    $username = empty($_POST['username']) ? '' : $_POST['username'];

    // a flag to see if everything is ok
    $success = null;

    // file paths to store
    $paths = [];

    // get file names
    $filename = $images['name'];

    // loop and process files
        $ext = explode('.', basename($filename));
        $path_fix = dirname(__FILE__);
        // $target = $path_fix . "\..\uploads" . DIRECTORY_SEPARATOR . md5(uniqid()) . "." . array_pop($ext);
        $target = $path_fix . "\..\uploads" .DIRECTORY_SEPARATOR . basename($filename);
        if (move_uploaded_file($images['tmp_name'], $target)) {
            $success = true;
            $paths[] = $target;
        } else {
            $success = false;
        }


    // check and process based on successful status
    if ($success === true) {
    // call the function to save all data to database
    // code for the following function `save_data` is not
    // mentioned in this example
    //    save_data($userid, $username, $paths);

    // store a successful response (default at least an empty array). You
    // could return any additional response info you need to the plugin for
    // advanced implementations.
        $output = ['filename'=>$filename];
    // for example you can get the list of files uploaded this way
    // $output = ['uploaded' => $paths];
    } elseif ($success === false) {
        $output = ['error' => 'Error while uploading images. Contact the system administrator'];
    // delete any uploaded files
        foreach ($paths as $file) {
            unlink($file);
        }
    } else {
        $output = ['error' => 'No files were processed.'];
    }

    // return a json encoded response for plugin to process successfully
    echo json_encode($output);
