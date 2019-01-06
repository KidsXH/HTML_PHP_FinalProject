<?php
$dir = basename(getcwd());
if ($dir == "templates") $path_fix = "../";
else $path_fix = "";
require_once $path_fix . "include/info.php";
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

    <title><?php echo $TITLE ?> | 工具</title>

    <?php include($path_fix . "templates/css.php"); ?>
    <link rel="stylesheet" href="<?php echo $path_fix . "assets/css/tools.css" ?>">

    <link href="<?php echo $path_fix . "assets/css/" ?>fileinput.min.css" media="all" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="<?php echo $path_fix . "assets/css/" ?>all.css" crossorigin="anonymous">
</head>

<body data-spy="scroll" data-target="#tools-sidebar">

<?php require $path_fix . "templates/nav.php"; ?>

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
                            <img src="<?php echo $path_fix . 'assets/image/1.jpg' ?>"
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
                            <img src="<?php echo $path_fix . 'assets/image/6.jpg' ?>"
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
                                <input type="number" id="thresholdInput" value="0" data-decimals="2" min="-10" max="10" step="0.05">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-8">
                        <figure class="figure">
                            <img src="<?php echo $path_fix . 'assets/image/7.jpg' ?>"
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
                            <img src="<?php echo $path_fix . 'assets/image/4.jpg' ?>"
                                 class="figure-img img-fluid rounded"
                                 alt="A generic square placeholder image with rounded corners in a figure.">
                            <figcaption class="figure-caption">点击按钮提交并获取结果。</figcaption>
                        </figure>
                    </div>
                </div>

            </div>
        </div>
        <div class="col-lg-2 col-md-12 tools-sidebar">
            <!--Scrollspy -->
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
<!-- fileUploadModal -->
<div class="modal fade" id="fileUploadModal" tabindex="-1" role="dialog" aria-labelledby="fileUploadModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="fileUploadModalLabel">上传 TIF 文件</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="file-loading">
                    <input id="imgInput" name="rawImg" type="file" accept="image/tiff">
                </div>
                <div id="kartik-file-errors"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">关闭</button>
                <button id="saveBtn" type="button" class="btn btn-primary" title="保存上传文件">保存
                </button>
            </div>
        </div>
    </div>
</div>
<!-- confirmArgsModal -->
<div class="modal fade" id="confirmArgsModal" tabindex="-1" role="dialog" aria-labelledby="confirmArgsModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmArgsModalLabel">确认参数设置</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body confirm-body text-center">
                <div class="alert alert-danger collapse" id="dangerAlert" role="alert"></div>
                <div class="alert alert-warning collapse" id="waringAlert" role="alert"></div>
                <div class="form-group row">
                    <label for="staticFile" class="col-sm-6 col-form-label">TIF 文件</label>
                    <div class="col-sm-6">
                        <button class="btn" id="staticFile"></button>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="staticGreen" class="col-sm-6 col-form-label">绿波段序号</label>
                    <div class="col-sm-6">
                        <button class="btn" id="staticGreen"></button>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="staticNir" class="col-sm-6 col-form-label">近红外波段序号</label>
                    <div class="col-sm-6">
                        <button class="btn" id="staticNir"></button>
                    </div>
                </div>
                <div class="row">
                    <label for="staticThr" class="col-sm-6">阈值</label>
                    <div class="col-sm-6">
                        <button class="btn" id="staticThr"></button>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">关闭</button>
                <button id="submitBtn" type="button" class="btn btn-primary">确认并提交</button>
            </div>
        </div>
    </div>
</div>
<!-- successModal -->
<div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">成功了!</h4>
            <hr>
            <p>您上传的文件成功通过了计算，生成了中间文件（水体指数）和结果文件（水体指数二值化）。</p>
            <p class="mb-0">请点击页面右侧按钮下载文件。</p>

        </div>
    </div>
</div>
<!-- errorModal -->
<div class="modal fade" id="errorModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="alert alert-danger" role="alert">
            <h4 class="alert-heading">出错了!</h4>
            <hr>
            <p class="mb-0" id="errorMsg"></p>
        </div>
    </div>
</div>
<!-- Bootstrap core JavaScript
  ================================================== -->
<?php include($path_fix . "templates/js.php"); ?>
<!-- piexif.min.js is needed for auto orienting image files OR when restoring exif data in resized images and when you
        wish to resize images before upload. This must be loaded before fileinput.min.js -->
<script src="<?php echo $path_fix . "assets/js/" ?>piexif.min.js" type="text/javascript"></script>
<!-- sortable.min.js is only needed if you wish to sort / rearrange files in initial preview.
    This must be loaded before fileinput.min.js -->
<script src="<?php echo $path_fix . "assets/js/" ?>sortable.min.js" type="text/javascript"></script>
<!-- purify.min.js is only needed if you wish to purify HTML content in your preview for
    HTML files. This must be loaded before fileinput.min.js -->
<script src="<?php echo $path_fix . "assets/js/" ?>purify.min.js" type="text/javascript"></script>
<!-- bootstrap.min.js below is needed if you wish to zoom and preview file content in a detail modal
    dialog. bootstrap 4.x is supported. You can also use the bootstrap js 3.3.x versions. -->
<script src="<?php echo $path_fix . "assets/js/" ?>bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<!-- the main fileinput plugin file -->
<script src="<?php echo $path_fix . "assets/js/" ?>fileinput.min.js"></script>
<!-- following theme script is needed to use the Font Awesome 5.x theme (`fas`) -->
<script src="<?php echo $path_fix . "assets/js/" ?>theme.min.js"></script>

<!--on_load-->
<script type="text/javascript">
    $(function () {
        $('[data-toggle="tooltip"]').tooltip();
        $('#confirmArgsModal').on('hidden.bs.modal', function (e) {
            $('#dangerAlert').collapse('hide');
            $('#waringAlert').collapse('hide');
        })
    })
</script>
<script src="../bootstrap/js/bootstrap-input-spinner.js"></script>
<!--number spinner-->
<script>
    $("input[type='number']").inputSpinner()
</script>
<!--calcBtn-->
<script>
    $('#goBtn').click(function () {
        let g = $('#lockGreenBtn');
        let n = $('#lockNirBtn');
        let t = $('#lockThBtn');
        let o = $('#uploadBtn');
        let warning_msg = "";
        let danger_msg = "";
        if (!o.hasClass('btn-success')) {
            $('#staticFile').text('文件未上传').removeClass('btn-outline-success').addClass('btn-outline-danger');
            danger_msg += "文件未上传！";
        }
        else {
            $('#staticFile').text(o.text()).removeClass('btn-outline-danger').addClass('btn-outline-success');
        }
        if (!g.hasClass('btn-outline-success')) {
            $('#staticGreen').text($('#greenInput').val()).removeClass('btn-outline-success').addClass('btn-outline-warning');
            warning_msg += "绿波段序号未确认！";
        }
        else {
            $('#staticGreen').text($('#greenInput').val()).removeClass('btn-outline-warning').addClass('btn-outline-success');
        }
        if (!n.hasClass('btn-outline-success')) {
            $('#staticNir').text($('#nirInput').val()).removeClass('btn-outline-success').addClass('btn-outline-warning');
            warning_msg += "近红外波段序号未确认！";
        }
        else {
            $('#staticNir').text($('#nirInput').val()).removeClass('btn-outline-warning').addClass('btn-outline-success');
        }

        if (!t.hasClass('btn-outline-success')) {
            $('#staticThr').text($('#thresholdInput').val()).removeClass('btn-outline-success').addClass('btn-outline-warning');
            warning_msg += "阈值未确认！";
        }
        else {
            $('#staticThr').text($('#thresholdInput').val()).removeClass('btn-outline-warning').addClass('btn-outline-success');
        }
        let da = $('#dangerAlert');
        let wa = $('#waringAlert');
        if (danger_msg !== "") {
            da.text(danger_msg).collapse('show');
        }
        $('#submitBtn').prop('disabled', danger_msg !== "");
        if (warning_msg !== "") {
            wa.text(warning_msg).collapse('show');
        }
    });

    function lockBtn(btnId) {
        let b = $(btnId);
        if (b.hasClass('btn-outline-primary')) {
            b.click();
        }
    }
    function results_clear() {
        $('#downloadBtn1').removeClass('btn-outline-success').addClass('btn-outline-warning').prop('title', '文件已改变').click(function () {
            location.href = "";
        });
        $('#downloadBtn2').removeClass('btn-outline-success').addClass('btn-outline-warning').prop('title', '文件已改变').click(function () {
            location.href = "";
        });
    }
    function results_success() {
        $('#collapseDiv').collapse('show');
        $('#successModal').modal('show');
        $('#downloadBtn1').removeClass('btn-outline-warning').addClass('btn-outline-success').prop('title', '水体指数').click(function () {
            location.href = "<?php echo $path_fix?>app/results/ndwi.tif";
        });
        $('#downloadBtn2').removeClass('btn-outline-warning').addClass('btn-outline-success').prop('title', '水体指数二值化').click(function () {
            location.href = "<?php echo $path_fix?>app/results/ndwi_binary.tif";
        });
    }
    function results_error(errorType) {
        let msg ="未知错误";
        switch (errorType) {
            case '1': msg = "绿波段序号超出范围！";break;
            case '2': msg = "近红外波段序号超出范围！";break;
            case '3': msg = "阈值超出范围！";break;
            case '4': msg = "无法解析图像！";break;
        }
        $('#errorMsg').text(msg);
        $('#errorModal').modal('show');
    }
    $('#submitBtn').click(function () {
        lockBtn('#lockGreenBtn');
        lockBtn('#lockNirBtn');
        lockBtn('#lockThBtn');
        $('#confirmArgsModal').modal('hide');
        let greenChanel = $('#greenInput').val();
        let nirChanel = $('#nirInput').val();
        let threshold = $('#thresholdInput').val();
        $.ajax({
            type: 'POST',
            url: '<?php echo $path_fix?>app/calculate.php',
            dataType: 'json',
            data: {
                greenChanel: greenChanel,
                nirChanel: nirChanel,
                threshold: threshold
            },
            success: function (data) {
                if (data.status === '0') {
                    results_success();
                }
                else {
                    results_error(data.status);
                }
            },
            error: function (XMLHttpRequest, textStatus, errorThrown) {
                // 状态码
                console.log(XMLHttpRequest.status);
                // 状态
                console.log(XMLHttpRequest.readyState);
                // 错误信息
                console.log(textStatus);
            }
        });
    });
</script>
<!--fileInput-->
<script>
    $("#imgInput").fileinput({
        showPreview: false,
        showUpload: false,
        elErrorContainer: '#kartik-file-errors',
        allowedFileExtensions: ["tif"],
        uploadUrl: "<?php echo $path_fix?>app/fileUpload.php",
        maxFileCount: 1,
        browseClass: "btn btn-success",
        browseLabel: "选择 TIF 文件",
        removeClass: "btn btn-danger",
        removeLabel: "删除"
    });
    $("#saveBtn").click(function () {
        $("#imgInput").fileinput('upload');
    });
</script>
<script>
    $('#imgInput').on('fileuploaded', function (event, data, previewId, index) {
        var form = data.form, files = data.files, extra = data.extra,
            res = data.response, reader = data.reader;
        $('#fileUploadModal').modal('hide');
        let btn = $('#uploadBtn');
        btn.removeClass('btn-primary').addClass('btn-success').text(res.filename);
    }).on('fileclear', function (event) {
        $('#uploadBtn').removeClass('btn-success').addClass('btn-primary').text('上传 TIF 文件');
        results_clear();
    });
</script>
<!--lockBtn-->
<script>
    $('#lockGreenBtn').click(function () {
        let t = $(this).toggleClass('btn-outline-primary').toggleClass('btn-outline-success');
        $('#greenInput').prop('disabled', t.hasClass('btn-outline-success'));
    });
    $('#lockNirBtn').click(function () {
        let t = $(this).toggleClass('btn-outline-primary').toggleClass('btn-outline-success');
        $('#nirInput').prop('disabled', t.hasClass('btn-outline-success'));
    });
    $('#lockThBtn').click(function () {
        let t = $(this).toggleClass('btn-outline-primary').toggleClass('btn-outline-success');
        $('#thresholdInput').prop('disabled', t.hasClass('btn-outline-success'));
    });
</script>
</body>
</html>
