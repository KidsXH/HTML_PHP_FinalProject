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
            <p class="mb-0">请点击相应按钮下载文件。</p>

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
