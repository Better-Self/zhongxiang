<!--_meta 作为公共模版分离出去-->
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="Bookmark" href="/favicon.ico" >
    <link rel="Shortcut Icon" href="/favicon.ico" />
    <!--[if lt IE 9]>
    <script type="text/javascript" src="/luntan/lib/html5shiv.js"></script>
    <script type="text/javascript" src="/luntan/lib/respond.min.js"></script>

    <![endif]-->

    <link rel="stylesheet" type="text/css" href="/luntan/static/h-ui/css/H-ui.min.css" />
    <link rel="stylesheet" type="text/css" href="/luntan/static/h-ui.admin/css/H-ui.admin.css" />
    <link rel="stylesheet" type="text/css" href="/luntan/lib/Hui-iconfont/1.0.8/iconfont.css" />
    <link rel="stylesheet" type="text/css" href="/luntan/static/h-ui.admin/skin/default/skin.css" id="skin" />
    <link rel="stylesheet" type="text/css" href="/luntan/static/h-ui.admin/css/style.css" />
    <script type="text/javascript" src="/luntan/lib/address.js"></script>
    <!--[if IE 6]>
    <script type="text/javascript" src="/luntan/lib/DD_belatedPNG_0.0.8a-min.js" ></script>
    <script>DD_belatedPNG.fix('*');</script>

    <![endif]-->
    <!--/meta 作为公共模版分离出去-->

    <title>查询用户 </title>

</head>
<body>
<article class="page-container">
    <form action="" method="post" class="form form-horizontal" id="form-member-add" onsubmit="return false" >
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>省市县：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <select id="province" onchange="changeSelect(this);">
                    <option value="" >-请选择省-</option>
                </select>
                <select id="city" onchange="changeSelect(this);">
                    <option value=""  >-请选择市-</option>
                </select>
                <select id="district">
                    <option value="">-请选区-</option>
                </select>


            </div>
        </div>

        </div>
        <br/> <br/> <br/>
        <div class="row cl">
            <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
                <input class="btn btn-primary radius" type="submit" onclick="add()" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
            </div>
        </div>
    </form>
</article>
<script type="text/javascript" src="/luntan/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="/luntan/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/luntan/static/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="/luntan/static/h-ui.admin/js/H-ui.admin.js"></script> <!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="/luntan/lib/My97DatePicker/4.8/WdatePicker.js"></script>
<script type="text/javascript" src="/luntan/lib/jquery.validation/1.14.0/jquery.validate.js"></script>
<script type="text/javascript" src="/luntan/lib/jquery.validation/1.14.0/validate-methods.js"></script>
<script type="text/javascript" src="/luntan/lib/jquery.validation/1.14.0/messages_zh.js"></script>

<script type="text/javascript">


    //添加的处理操作
    function  add(){

         province=$("#province option:selected");
         city=$("#city option:selected");
         district=$("#district option:selected");

        $.ajax({
            type : "post",  //提交方式
            url : "/admin/city",
            data : {
                "province" : province.val(),
                "city" : city.val(),
                "district" : district.val(),
                "_token":'{{csrf_token()}}'
            },//数据，这里使用的是Json格式进行传输
            success : function(data) {//返回数据根据结果进行相应的处理

                if(data==1){

                    layer.msg('添加成功!',{icon:1,time:1000});
                    var index = parent.layer.getFrameIndex(window.name);
                    parent.$('.btn-refresh').click();
                    parent.layer.close(index);
                }
            }
        });

    }
</script>
</body>
</html>

