<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->

    <link rel="icon" href="assets/favicon.ico">
    <title><?php echo $TITLE ?> | 工具</title>

    <?php require "templates/css.php"; ?>

</head>

<body data-spy="scroll" data-target="#tools-sidebar">

<?php require "templates/nav.php"; ?>

<div class="jumbotron jumbotron-fluid masthead doc-masthead">
    <div class="container">
        <h1>工具</h1>
        <p>上传TIF文件，设定参数，获得提取结果。</p>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-lg-10 col-md-12 main-div">
            <div class="container">
                <h1 class="page-header" id="stepOne">第一步
                    <small>上传 TIF 文件</small>
                </h1>
                <div class="row align-items-center">
                    <div class="col-md-4 text-center">
                        <span data-toggle="modal" data-target="#fileUploadModal">
                        <button id='uploadBtn' type="button" class="btn btn-primary btn-lg">上传 TIF 文件</button>
                        </span>
                    </div>
                    <div class="col-md-8">
                        <figure class="figure">
                            <img src="assets/image/1.jpg"
                                 class="figure-img img-fluid rounded"
                                 alt="A generic square placeholder image with rounded corners in a figure.">
                            <figcaption class="figure-caption">点击按钮上传新文件，仅支持 TIF 格式文件。</figcaption>
                        </figure>
                    </div>
                </div>
            </div>
            <div class="container">
                <h1 class="page-header" id="stepTwo">第二步
                    <small>设定波段序号</small>
                </h1>
                <div class="row align-items-center">
                    <div class="col-md-4 input-block">
                        <div class="row">
                            <div class="col-lg-12 col-xl-5">
                                <label id="lockGreenBtn" for="greenInput" class="btn btn-outline-primary col-12"
                                       data-toggle="tooltip" data-placement="left" title="点击确认/取消">
                                    绿波段
                                </label>
                            </div>
                            <div class="col-lg-12 col-xl-7">
                                <input type="number" id="greenInput" value="1" min="1" step="1">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-xl-5">
                                <label id="lockNirBtn" for="nirInput" class="btn btn-outline-primary col-12"
                                       data-toggle="tooltip" data-placement="left" title="点击确认/取消">
                                    近红外波段
                                </label>
                            </div>
                            <div class="col-lg-12 col-xl-7">
                                <input type="number" id="nirInput" value="1" min="1" step="1">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <figure class="figure">
                            <img src="assets/image/6.jpg"
                                 class="figure-img img-fluid rounded"
                                 alt="A generic square placeholder image with rounded corners in a figure.">
                            <figcaption class="figure-caption">点击标签确认并锁定参数，波段序号必须是正整数。</figcaption>
                        </figure>
                    </div>
                </div>
            </div>
            <div class="container">
                <h1 class="page-header" id="stepThree">第三步
                    <small>设定阈值</small>
                </h1>
                <div class="row align-items-center">
                    <div class="col-md-4 input-block">
                        <div class="row">
                            <div class="col-lg-12 col-xl-5">
                                <label id="lockThBtn" for="thresholdInput" class="btn btn-outline-primary col-12"
                                       data-toggle="tooltip" data-placement="left" title="点击确认/取消">
                                    阈值
                                </label>
                            </div>
                            <div class="col-lg-12 col-xl-7">
                                <input type="number" id="thresholdInput" value="0" data-decimals="2" min="-10" max="10"
                                       step="0.05">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-8">
                        <figure class="figure">
                            <img src="assets/image/7.jpg"
                                 class="figure-img img-fluid rounded"
                                 alt="A generic square placeholder image with rounded corners in a figure.">
                            <figcaption class="figure-caption">点击标签确认并锁定参数。</figcaption>
                        </figure>
                    </div>
                </div>

            </div>
            <div class="container">
                <h1 class="page-header" id="stepFour">第四步
                    <small>提取结果</small>
                </h1>
                <div class="row align-items-center">
                    <div class="col-md-4 text-center">
                        <div class="row">
                            <div class="container">
                                <button id='goBtn' type="button" class="btn btn-primary btn-lg" data-toggle="modal"
                                        data-target="#confirmArgsModal">
                                    GO!
                                </button>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-8">
                        <figure class="figure">
                            <img src="assets/image/4.jpg"
                                 class="figure-img img-fluid rounded"
                                 alt="A generic square placeholder image with rounded corners in a figure.">
                            <figcaption class="figure-caption">点击按钮提交并获取结果。</figcaption>
                        </figure>
                    </div>
                </div>

            </div>
        </div>
        <div class="col-lg-2 col-md-12 tools-sidebar">
            <nav id="tools-sidebar" class="navbar navbar-light sticky-top d-none d-xl-block">
                <nav class="nav flex-column">
                    <a class="nav-link" href="#stepOne">1. 上传文件</a>
                    <a class="nav-link" href="#stepTwo">2. 设定波段</a>
                    <a class="nav-link" href="#stepThree">3. 设定阈值</a>
                    <a class="nav-link" href="#stepFour">4. 提取结果</a>
                </nav>
            </nav>
            <div class="collapse results-area" id="collapseDiv">
                <p>
                    <button id='downloadBtn1' type="button" class="btn btn-outline-primary">
                        中间文件
                    </button>
                </p>
                <p>
                    <button id='downloadBtn2' type="button" class="btn btn-outline-primary">
                        结果文件
                    </button>
                </p>
            </div>
        </div>
    </div>
</div>

<?php require "templates/tools_modals.php"; ?>

<?php require "templates/js.php"; ?>

<script src="assets/js/tools.js"></script>

</body>

</html>
