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
        <div class="col-md-10 main-div">
            <div class="container">
                <h1 class="page-header" id="stepOne">第一步
                    <small>上传TIF文件</small>
                </h1>
                <div class="row align-items-center">
                    <div class="col-md-4 text-center">
                        <button id='openBtn' type="button" class="btn btn-primary btn-lg" data-toggle="modal"
                                data-target="#fileUploadModal">
                            上传TIF文件
                        </button>
                    </div>
                    <div class="col-md-8">
                        <figure class="figure">
                            <img src="<?php echo $path_fix . 'assets/image/1.jpg' ?>"
                                 class="figure-img img-fluid rounded"
                                 alt="A generic square placeholder image with rounded corners in a figure.">
                            <figcaption class="figure-caption">A caption for the above image.</figcaption>
                        </figure>
                    </div>
                </div>
            </div>
            <div class="container">
                <h1 class="page-header" id="stepTwo">第二步
                    <small>设定波段序号</small>
                </h1>

                <div class="row align-items-center">
                    <div class="col-md-4 text-center">
                        <div class="row">
                            <label id="lockGreenBtn" for="greenInput" class="btn btn-outline-primary col-md-5"
                                   data-toggle="tooltip" data-placement="left" title="Click to lock/unlock">
                                绿波段
                            </label>
                            <div class="col-md-7">
                                <input type="number" id="greenInput" value="1" min="1" max="10" step="1">
                            </div>
                        </div>
                        <div class="row">
                            <label id="lockNirBtn" for="nirInput" class="btn btn-outline-primary col-md-5"
                                   data-toggle="tooltip" data-placement="left" title="Click to lock/unlock">
                                近红外波段
                            </label>
                            <div class="col-md-7">
                                <input type="number" id="nirInput" value="1" min="1" max="10" step="1">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <figure class="figure">
                            <img src="<?php echo $path_fix . 'assets/image/1.jpg' ?>"
                                 class="figure-img img-fluid rounded"
                                 alt="A generic square placeholder image with rounded corners in a figure.">
                            <figcaption class="figure-caption">A caption for the above image.</figcaption>
                        </figure>
                    </div>
                </div>
            </div>
            <div class="container">
                <h1 class="page-header" id="stepThree">第三步
                    <small>设定阈值</small>
                </h1>

                <div class="row align-items-center">

                    <div class="col-md-4 text-center">

                        <div class="row">
                            <label id="lockThBtn" for="thresholdInput" class="btn btn-outline-primary col-md-5"
                                   data-toggle="tooltip" data-placement="left" title="Click to lock/unlock">
                                阈值
                            </label>
                            <div class="col-md-7">
                                <input type="number" id="thresholdInput" value="0" data-decimals="2" min="-10"
                                       max="10"
                                       step="0.05">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <figure class="figure">
                            <img src="<?php echo $path_fix . 'assets/image/1.jpg' ?>"
                                 class="figure-img img-fluid rounded"
                                 alt="A generic square placeholder image with rounded corners in a figure.">
                            <figcaption class="figure-caption">A caption for the above image.</figcaption>
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

                        <button id="calcBtn" type="button" class="btn btn-primary btn-lg">GO!</button>
                    </div>
                    <div class="col-md-8">
                        <figure class="figure">
                            <img src="<?php echo $path_fix . 'assets/image/1.jpg' ?>"
                                 class="figure-img img-fluid rounded"
                                 alt="A generic square placeholder image with rounded corners in a figure.">
                            <figcaption class="figure-caption">A caption for the above image.</figcaption>
                        </figure>
                    </div>
                </div>

            </div>
        </div>
        <div class="col-md-2 tools-sidebar">
            <!--Scrollspy -->
            <nav id="tools-sidebar" class="navbar navbar-light sticky-top">
                <nav class="nav flex-column">
                    <a class="nav-link" href="#stepOne">1. 上传文件</a>
                    <a class="nav-link" href="#stepTwo">2. 设定波段</a>
                    <a class="nav-link" href="#stepThree">3. 设定阈值</a>
                    <a class="nav-link" href="#stepFour">4. 提取结果</a>
                        <!--a class="nav-link ml-3 my-1" href="#item-3-1">Item 3-1</a-->
                </nav>
            </nav>
        </div>
        <!--div class="row">
            <div class="col-md-6 text-justify">
                <button type="button" class="btn btn-outline-success">水体指数</button>
                <button type="button" class="btn btn-outline-success">水体提取</button>
            </div>
        </div-->
    </div>
</div>
<!--p>
    <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false"
       aria-controls="collapseExample">
        Link with href
    </a>
    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample"
            aria-expanded="false" aria-controls="collapseExample">
        Button with data-target
    </button>
</p>
<div class="collapse" id="collapseExample">
    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid
</div-->
<!-- Modal -->
<div class="modal fade" id="fileUploadModal" tabindex="-1" role="dialog" aria-labelledby="fileUploadModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="fileUploadModalLabel">上传TIF文件</h5>
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
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button id="submitBtn" type="button" class="btn btn-primary" title="Your custom upload logic">Save
                </button>
            </div>
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
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>
<script src="../bootstrap/js/bootstrap-input-spinner.js"></script>
<!--number spinner-->
<script>
    $("input[type='number']").inputSpinner()
</script>
<!--calcBtn-->
<script>
    $('#calcBtn').click(function () {
        let g = $('#lockGreenBtn');
        let n = $('#lockNirBtn');
        let t  = $('#lockThBtn');
        let o = $('#openBtn');
        let msg = "";
        if (!g.hasClass('btn-outline-success')) {
            msg += "绿波段序号未确认\n";
        }
        if (!n.hasClass('btn-outline-success')) {
            msg += "近红外波段序号未确认\n";
        }
        if (!t.hasClass('btn-outline-success')) {
            msg += "阈值未确认\n";
        }
        if (!o.hasClass('btn-success')) {
            msg += "TIF文件未上传\n";
        }

        if (msg !== "") {
            alert(msg);
            return;
        }
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
                    alert('succeed!');

                    location.href = ("<?php echo $path_fix?>app/results/ndwi.tif");
                }
                else
                    alert(data.msg);
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
        browseLabel: "Pick Image",
        removeClass: "btn btn-danger",
        removeLabel: "Delete"
    });
    $("#submitBtn").click(function () {
        $("#imgInput").fileinput('upload');
    });
</script>
<script>
    $('#imgInput').on('fileuploaded', function (event, data, previewId, index) {
        var form = data.form, files = data.files, extra = data.extra,
            res = data.response, reader = data.reader;
        $('#fileUploadModal').modal('hide');
        let btn = $('#openBtn');
        btn.toggleClass("btn-success").text(res.filename);
        // console.log('File uploaded triggered');
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
