<?php
	// Inicia sess�o
	session_start();

	$name = $_SESSION['name'];
	$post = $_POST['post'];
	
	// L� o arquivo
	$data = file_get_contents('chat.txt');
	$lines = explode("\n", $data);

	// Verifica se � necess�rio usar quebra de linha
	$line = empty($lines[0]) ? $line = "" : $line = "\n";
	 
	// Insere linha no arquivo e salva
	$line = $line . "<b>" . $name . "</b>: " . $post; 
	$data = $data . $line;
	file_put_contents('chat.txt', $data);
?>
