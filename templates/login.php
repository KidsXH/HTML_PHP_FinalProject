<ul class="navbar-nav navbar-right">
    <li class="nav-item">
        <a class="nav-link" href="javaScript:void(0)" onclick="$('#myModal').modal()">登录</a>
    </li>
</ul>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form>
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">登录</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="username">用户名</label>
                        <input type="text" class="form-control" id="username" placeholder="Username">
                    </div>
                    <div class="form-group">
                        <label for="password">密码</label>
                        <input type="password" class="form-control" id="password" placeholder="Password">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                    <button id="login-submit" type="button" class="btn btn-primary">登录</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    $("#login-submit").click(function () {
        var username = $("#username").val();
        var password = $("#password").val();
        $.ajax({
            url:"../app/checkLogin.php",
            data:{
                username: username,
                password: password
            },
            type:"POST",
            dataType:"TEXT",
            success: function(data){
                alert(data);
                if (data === 'OK') {
                }
                else
                {
                }
            }
        });
    });
</script>
