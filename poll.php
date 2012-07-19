<?php
set_time_limit(0);

function poll($cur_line){
	// L� arquivo
	$data = file_get_contents('chat.txt');
	$lines = explode("\n", $data);
	
	// Verifica se o n�mero de linha � igual a linha atual ou se a linha 0 est� vazia
	if(count($lines) == $cur_line || empty($lines[0])){
		// Coloca o script para dormir por 1 segundo
		sleep(1); 
		return poll($cur_line);
	}else{
		$ret = array();
		$ret['lines'] = array();
		// Coloca somente as linhas que n�o foram lidas no vetor
		for($cur_line;$cur_line < count($lines); $cur_line++){
			$ret['lines'][] = $lines[$cur_line];
		}
		// Adciona a linha atual no vetor
		$ret['cur_line'] = $cur_line;
		// Encoda o vetor em json
		return json_encode($ret);
	}
}
echo poll($_POST['cur_line']);
?>
