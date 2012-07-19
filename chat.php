<?php
session_start();
if( !isset($_POST['name']) ) header("location: ./");
$_SESSION['name'] = $_POST['name'];
?>
<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<script src="ui/js/jquery-1.7.2.min.js" type="text/javascript"></script>
<script src="ui/js/jquery-ui-1.8.21.custom.min.js" type="text/javascript"></script>
<link rel="stylesheet" href="ui/css/pepper-grinder/jquery-ui-1.8.21.custom.css" type="text/css" media="all" />
<title>Bate-Papo da Freela</title>
<style type="text/css">
	body{
		font-size: 11px;
	}
	#chat .ui-widget-content{
		padding: 10px;
		width: 660px;
		margin: 0 auto;
	}
	#chat #chat-content .messages{
		background: #FFF;
		padding: 10px;
		height: 500px;
		overflow: auto;
	}
	#chat #chat-content .messages li{
		border-bottom: 1px solid #D4D1BF;
		padding: 5px 0; 
		list-style: none;
	}
	#chat #chat-post input[type=text]{
		border: 1px solid #D4D1BF;
		padding: 5px;
		width: 500px;
		margin: 0 5px;
	}
</style>
<script type="text/javascript">
	// Variável global usuada para identificar o número de linhas mostrados
	var cur_line = 0;
	var poll;
	function get_messages(){
		poll = $.ajax({
		type: "POST",
		url: "poll.php",
		data: { 'cur_line' : cur_line },
		dataType: "json",
		success: function(json, textStatus, jqXHR) {
			cur_line = json.cur_line;
			
			// Insere linhas na tela 
			for(i=0;i<json.lines.length;i++){
				line = $('<li>' + json.lines[i] + '</li>');
				$("#chat #chat-content .messages").prepend(line);
			}
			
		},
		complete: function(){ 
			get_messages();
		},
		timeout: 30000
		});
	}

	$(document).ready(function(){
		// jQuery UI
		$('#chat-post button').button({ icons: { secondary: "ui-icon-arrowreturnthick-1-e"} });
	    // Evento Submit do formulário
	    $("#form-post").submit(function(evt){
		    evt.preventDefault();
		    // Posta mensagem
			$.post('post.php',$(this).serialize(),function(){
				// Limpa campo de texto
				$('#chat #chat-post input[type=text]').val('');
			});
		});
		get_messages();
	});
</script>
</head>
<body>
	<div class="ui-widget" id="chat">
		<div class="ui-widget-content ui-corner-all"  id="chat-post">
    		<form method="post" id="form-post">
    			<label>Mensagem:<input type="text" name="post" class="ui-corner-all"></label><button>Enviar</button>
    		</form>
		</div>
	    <div class="ui-widget-content ui-corner-all" id="chat-content">
    		<ul class="messages ui-corner-all">
    			
    		</ul>
	    </div>
	</div>
</body>
</html>
