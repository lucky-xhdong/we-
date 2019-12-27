<!doctype html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="<?=base_url()?>media/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="<?=base_url()?>media/css/common.css">
<link rel="stylesheet" type="text/css" href="<?=base_url()?>media/css/itgenius.css">
<script type="text/javascript" src="<?=base_url()?>media/js/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>media/js/jquery.form.js"></script>
<meta charset="utf-8">
<title>无忧产检</title>
</head>
<script>
	var result = null;
	window.onload = function(){
		var script = document.createElement("<script>");
		script.type = "text/javascript";
		script.src = "http://182.92.159.85/ipregnant/test.php";
		
		var head = document.getElementsByTagName("head")[0];
		head.insertBefore(script,script.firstChild);
		
		function callback(data){
			return = data;
		}
		function btn_click(){
			alert(result.name);
		}
	}
</script>
<body>
<!--navbar start-->

<!--navbar end-->
<div class="container login dis-d bor-a">
	<div class="row">
        <button type="button" class="btn btn-default" onClick="btn_click()"></button>
    </div>
</div>
</body>
</html>
