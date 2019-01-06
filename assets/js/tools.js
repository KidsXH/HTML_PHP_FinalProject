$(function () {
    $('[data-toggle="tooltip"]').tooltip();
    $("input[type='number']").inputSpinner();
    $('#confirmArgsModal').on('hidden.bs.modal', function (e) {
        $('#dangerAlert').collapse('hide');
        $('#waringAlert').collapse('hide');
    })
});

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
    $('#downloadBtn1').removeClass('btn-outline-success').addClass('btn-outline-warning').prop('title', '文件已变更');
    $('#downloadBtn2').removeClass('btn-outline-success').addClass('btn-outline-warning').prop('title', '文件已变更');
}
function results_success() {
    $('#collapseDiv').collapse('show');
    $('#successModal').modal('show');
    $('#downloadBtn1').removeClass('btn-outline-warning').addClass('btn-outline-success').prop('title', '水体指数').click(function () {
        location.href = "app/results/ndwi.tif";
    });
    $('#downloadBtn2').removeClass('btn-outline-warning').addClass('btn-outline-success').prop('title', '水体指数二值化').click(function () {
        location.href = "app/results/ndwi_binary.tif";
    });
}
function results_error(errorType) {
    let msg = "未知错误";
    switch (errorType) {
        case '1': msg = "绿波段序号超出范围！"; break;
        case '2': msg = "近红外波段序号超出范围！"; break;
        case '3': msg = "阈值超出范围！"; break;
        case '4': msg = "无法解析图像！"; break;
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
        url: 'app/calculate.php',
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
            results_error('ajax error');
            // 状态码
            console.log(XMLHttpRequest.status);
            // 状态
            console.log(XMLHttpRequest.readyState);
            // 错误信息
            console.log(textStatus);
        }
    });
});


$("#imgInput").fileinput({
    showPreview: false,
    showUpload: false,
    elErrorContainer: '#kartik-file-errors',
    allowedFileExtensions: ["tif"],
    uploadUrl: "app/fileUpload.php",
    maxFileCount: 1,
    browseClass: "btn btn-success",
    browseLabel: "选择 TIF 文件",
    removeClass: "btn btn-danger",
    removeLabel: "删除"
});
$("#saveBtn").click(function () {
    $("#imgInput").fileinput('upload');
});

$('#imgInput').on('fileuploaded', function (event, data, previewId, index) {
    var form = data.form, files = data.files, extra = data.extra,
        res = data.response, reader = data.reader;
    $('#fileUploadModal').modal('hide');
    let btn = $('#uploadBtn');
    btn.removeClass('btn-primary').addClass('btn-success').text(res.filename);
    results_clear();
});

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
