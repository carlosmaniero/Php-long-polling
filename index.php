<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<script src="ui/js/jquery-1.7.2.min.js" type="text/javascript"></script>
<script src="ui/js/jquery-ui-1.8.21.custom.min.js" type="text/javascript"></script>
<link rel="stylesheet" href="ui/css/pepper-grinder/jquery-ui-1.8.21.custom.css" type="text/css" media="all" />
<title>Login</title>
<style type="text/css">
	body{
		font-size: 11px;
	}
	#login-form{
		position: absolute;
		left: 50%;
		margin-left: -150px;
		margin-top: -44px;
		position: absolute;
		top: 50%;
	}
	#login-form .ui-widget-content{
		padding: 10px;
	}
	#login-form .ui-widget-content .ui-widget-header{
		padding: 5px;
		margin-bottom: 10px;
		text-align: center;
	}
	label input[type=text]{
		border: 1px solid #D4D1BF;
		padding: 5px;
		width: 150px;
		margin: 0 5px;
	}
</style>
<script type="text/javascript">
	$(document).ready(function(){
		// jQuery UI
		$('#login-form input[type=submit],button').button({
            icons: {
	            primary: "ui-icon-locked"
	        }
	    });
	});
</script>
</head>
<body>
	<div class="ui-widget" id="login-form">
	    <div class="ui-widget-content ui-corner-all">
	    		<div class="ui-widget-header ui-corner-all ui-helper-clearfix">Digite seu nome para entrar no chat</div>
	    		<form method="post" action="chat.php">
	    			<label>Nome:<input type="text" name="name" class="ui-corner-all"></label><button>Entrar</button>
	    		</form>
		</div>
	</div>
</body>
</html>
