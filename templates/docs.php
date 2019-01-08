<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->

    <link rel="icon" href="assets/favicon.ico">
    <title><?php echo $TITLE?> | 文档</title>

    <?php require "templates/css.php";?>

    <style>
        .bd-toc {
            position: -webkit-sticky;
            position: sticky;
            top: 4rem;
            height: calc(100vh - 4rem);
            overflow-y: auto;
        }
        .bd-toc {
            -webkit-box-ordinal-group: 3;
            -ms-flex-order: 2;
            order: 2;
            padding-top: 1.5rem;
            padding-bottom: 1.5rem;
            font-size: .875rem;
        }
        .toc-entry {
            display: block;
        }
        .toc-entry a {
            display: block;
            padding: .125rem 1.5rem;
            color: #99979c;
        }
        .section-nav ul {
            margin-top: 0;
            padding-left: 1rem;
        }
        ol ol, ol ul, ul ol, ul ul {
            margin-bottom: 0;
        }
        dl, ol, ul {
            margin-top: 0;
            margin-bottom: 1rem;
        }
        .section-nav {
            padding-left: 0;
            border-left: 1px solid #eee;
        }
        .lead {
            color: #777;
        }
        h2 {
            margin: 1em 0 1rem 0;
        }
        .docs-code {
            -moz-osx-font-smoothing: initial;
            -webkit-font-smoothing: initial;
            background-color: #f8f8f8;
            border-radius: 2px;
            color: #525252;
            display: block;
            font-family: Roboto Mono,Monaco,courier,monospace;
            font-size: .8rem;
            line-height: inherit;
            margin: 0 2px;
            max-width: inherit;
            overflow: inherit;
            padding: 2.2em 5px;
            white-space: inherit;
        }
    </style>
</head>

<body>
<?php require "templates/nav.php";?>

<div class="jumbotron jumbotron-fluid masthead doc-masthead">
    <div class="container">
        <h1>文档</h1>
        <p>技术报告</p>
    </div>
</div>

<div class="container">
    <div class="row">
        <main class="col-12 col-xl-9 bd-content" role="main">
            <h1 class="page-header" id="summary">概述</h1>
            <p class="lead">简要介绍网站的功能、采用的技术等。</p>
            <h2 id="summary-function">功能</h2>
            <p>根据用户上传的影像和设定的参数，计算出水体指数和水体提取结果。</p>
            <h2 id="summary-technology">技术</h2>
            <p>
                前端使用 HTML5, JavaScript, jQuery, bootstrap-v4.0.0 等；
                <br>
                后端使用 PHP5.6 + Python；
                <br>
                计算过程由 Python 调用第三方库 GDAL 实现。
            </p>
            <h1 class="page-header" id="requirements">需求分析</h1>
            <p class="lead">简要描述各个功能模块、业务处理流程。</p>
            <h2 id="requirements-models">功能模块描述</h2>

            <dl>
                <dt>文件上传模块</dt>
                <dd>接收上传的文件，只接受单个文件，文件格式只接受 TIF 文件。文件将被作为临时文件上传到服务器。</dd>
                <dt>设置参数模块</dt>
                <dd>由输入框和按钮组成，接受三个参数：绿波段序号，近红外波段序号，阈值。用户输入的数值会被提交到后端。</dd>
                <dt>确认提交模块</dt>
                <dd>在提交计算之前，让用户确认设置是否无误。对未确认的信息进行提醒，若未上传文件，则发出警告。确认后提交数据到后端。</dd>
                <dt>显示结果模块</dt>
                <dd>弹窗显示计算结果，并在页面上显示下载按钮。</dd>
            </dl>

            <h2 id="requirements-flow">业务处理流程</h2>
                <ol>
                    <li>
                        <h4>上传文件</h4>
                        <p>点击按钮，在弹出的文件上传界面中，选择要上传的本地文件，点击保存完成上传。</p>
                    </li>
                    <li>
                        <h4>设置波段序号</h4>
                        <p>在输入框中输入数字或点击 +, - 按钮，设置绿波段和近红外波段序号，波段序号必须是正整数。点击标签按钮确认参数，或在最终提交时确认。</p>
                    </li>
                    <li>
                        <h4>设置阈值</h4>
                        <p>在输入框中输入数字或点击 +, - 按钮，设置阈值，阈值是两位小数。点击标签按钮确认参数，或在最终提交时确认。</p>
                    </li>
                    <li>
                        <h4>提交计算</h4>
                        <p>点击按钮，弹出确认框，确认参数设置并提交或返回修改。</p>
                    </li>
                    <li>
                        <h4>获取结果</h4>
                        <p>提交后若弹出成功提示，则可点击页面上的按钮下载相应文件。若提示出错，调整设置后再次提交。</p>
                    </li>
                    <li>
                        <h4>计算下一个文件</h4>
                        <p>返回第一步，上传新的文件，参数要重新确认。在新的请求提交前，仍可以下载上一次的结果，下载按钮会通过颜色提醒是否是最新结果。</p>
                    </li>
                </ol>
            <h1 class="page-header" id="design">详细设计</h1>
            <p class="lead">详细说明系统目录结构，各个文件的作用与实现的功能。</p>
            <h2 id="design-structure">系统目录结构</h2>
            <pre><code class="docs-code">➜  HTML_PHP_FinalProject
    ├── app
    │   ├── results
    │   │   └── ...
    │   ├── caculate.php
    │   ├── caculate.py
    │   └── fileUpload.php
    ├── assets
    │   ├── css
    │   │   ├── style.css
    │   │   └── ...
    │   ├── img
    │   │   └── ...
    │   ├── js
    │   │   ├── tools.js
    │   │   └── ...
    │   └── favicon.ico
    ├── include
    │   └── info.php
    ├── templates
    │   ├── css.php
    │   ├── js.php
    │   ├── home.php
    │   ├── docs.php
    │   ├── tools.php
    │   ├── tools_modals.php
    │   └── nav.php
    ├── uploads
    │   └── ...
    ├── index.php
    ├── docs.php
    └── tools.php</code></pre>
            <h2 id="design-description">目录结构简介</h2>
            <table class="table">
                <thead class="thead-light">
                <tr>
                    <th scope="col">文件夹/文件名称</th>
                    <th scope="col">简介</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th scope="row">app</th>
                    <td>存放后端代码。</td>
                </tr>
                <tr>
                    <th scope="row">app/results</th>
                    <td>存放中间文件和结果文件。</td>
                </tr>
                <tr>
                    <th scope="row">app/caculate.php</th>
                    <td>接收提交的数据，调用 Python 程序进行计算，返回结果。</td>
                </tr>
                <tr>
                    <th scope="row">app/caculate.py</th>
                    <td>用 Python 调用 GDAL 实现的计算程序。</td>
                </tr>
                <tr>
                    <th scope="row">app/fileUpload.php</th>
                    <td>将提交的影像文件储存到指定位置，返回一个文件名。</td>
                </tr>
                <tr>
                    <th scope="row">assets</th>
                    <td>存放前端需要的各类资源。</td>
                </tr>
                <tr>
                    <th scope="row">assets/css</th>
                    <td>存放需要的 css 文件。</td>
                </tr>
                <tr>
                    <th scope="row">assets/css/style.css</th>
                    <td>主要的 css 文件。</td>
                </tr>
                <tr>
                    <th scope="row">assets/img</th>
                    <td>存放需要的图片。</td>
                </tr>

                <tr>
                    <th scope="row">assets/js</th>
                    <td>存放需要的 JavaScript 文件。</td>
                </tr>
                <tr>
                    <th scope="row">assets/js/tools.js</th>
                    <td>工具页面（tools.php）需要的 JavaScript 文件。</td>
                </tr>
                <tr>
                    <th scope="row">assets/favicon.ico</th>
                    <td>网页图标。</td>
                </tr>
                <tr>
                    <th scope="row">include</th>
                    <td>存放可能需要引用的文件。</td>
                </tr>
                <tr>
                    <th scope="row">include/info.php</th>
                    <td>项目配置文件。</td>
                </tr>
                <tr>
                    <th scope="row">templates</th>
                    <td>存放前端页面文件。</td>
                </tr>
                <tr>
                    <th scope="row">templates/css.php</th>
                    <td>所有页面的 css 引用。</td>
                </tr>
                <tr>
                    <th scope="row">templates/js.php</th>
                    <td>所有页面的 JavaScript 引用。</td>
                </tr>
                <tr>
                    <th scope="row">templates/home.php</th>
                    <td>首页页面。</td>
                </tr>
                <tr>
                    <th scope="row">templates/docs.php</th>
                    <td>文档页面。</td>
                </tr>
                <tr>
                    <th scope="row">templates/tools.php</th>
                    <td>工具页面。</td>
                </tr>
                <tr>
                    <th scope="row">templates/tools_modals.php</th>
                    <td>工具页面的模态框组件。</td>
                </tr>
                <tr>
                    <th scope="row">templates/nav.php</th>
                    <td>导航栏组件。</td>
                </tr>
                <tr>
                    <th scope="row">uploads</th>
                    <td>存放上传文件。</td>
                </tr>
                <tr>
                    <th scope="row">index.php</th>
                    <td>首页。</td>
                </tr>
                <tr>
                    <th scope="row">docs.php</th>
                    <td>文档。</td>
                </tr>
                <tr>
                    <th scope="row">tools.php</th>
                    <td>工具。</td>
                </tr>
                </tbody>
            </table>
            <h1 class="page-header" id="implementation">实现功能</h1>
        </main>
        <div class="d-none d-xl-block col-xl-3 bd-toc">
            <ul class="section-nav">
                <li class="toc-entry toc-h2"><a href="#summary">概述</a>
                    <ul>
                        <li class="toc-entry toc-h3"><a href="#summary-function">功能</a></li>
                        <li class="toc-entry toc-h3"><a href="#summary-technology">技术</a></li>
                    </ul>
                </li>
                <li class="toc-entry toc-h2"><a href="#requirements">需求分析</a>
                    <ul>
                        <li class="toc-entry toc-h3"><a href="#requirements-models">功能模块描述</a></li>
                        <li class="toc-entry toc-h3"><a href="#requirements-flow">业务处理流程</a></li>
                    </ul>
                </li>
                <li class="toc-entry toc-h2"><a href="#design">详细设计</a>
                    <ul>
                        <li class="toc-entry toc-h3"><a href="#design-structure">系统目录结构</a></li>
                        <li class="toc-entry toc-h3"><a href="#design-description">目录结构简介</a></li>
                    </ul>
                </li>
                <li class="toc-entry toc-h2"><a href="#implementation">实现功能</a>
                    <ul>
                        <li class="toc-entry toc-h3"><a href="#order-classes">模块1</a>
                        <ul>
                            <li class="toc-entry toc-h4"><a href="#offset-classes">功能</a></li>
                            <li class="toc-entry toc-h4"><a href="#margin-utilities">流程图</a></li>
                            <li class="toc-entry toc-h4"><a href="#margin-utilities">截图</a></li>
                        </ul>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>


<?php require "templates/js.php";?>
</body>

</html>
