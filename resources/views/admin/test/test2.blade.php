<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <script src="/admin/js/jqueryjs"></script>
    <script src="/com/laydate/laydate.js"></script>
</head>
<body>
<input type="text" id="test1">
<script>
    $(function(){
        //常规用法
        laydate.render({
            elem: '#test1'
        });
        //国际版
        laydate.render({
            elem: '#test1-1'
            ,lang: 'en'
        });
    })


</script>
</body>

</html>
