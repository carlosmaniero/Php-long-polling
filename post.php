<?php
	// Inicia sessão
	session_start();

	$name = $_SESSION['name'];
	$post = $_POST['post'];
	
	// Lê o arquivo
	$data = file_get_contents('chat.txt');
	$lines = explode("\n", $data);

	// Verifica se é necessário usar quebra de linha
	$line = empty($lines[0]) ? $line = "" : $line = "\n";
	 
	// Insere linha no arquivo e salva
	$line = $line . "<b>" . $name . "</b>: " . $post; 
	$data = $data . $line;
	file_put_contents('chat.txt', $data);
?>
