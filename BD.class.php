<?php class BD{
	private static $conn;
	public function __construct(){}
	public static function conn(){
	if(is_null(self::$conn)){
	self::$conn = new PDO('mysql:host=mysql07.hstbr.net;dbname=bd_almanaq','bd_almanaq','A1!27nQ5@{');
	self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	return self::$conn;
	}
}

function logErrors($errno){
	if(error_reporting() == 0) return; // se não existir erros ele retorna vasio!
	$exec = func_get_arg(0); // a $exec recebe os erros
	$errno = $exec->getCode(); // recebe o codigo do erro
	$errstr = $exec->getMessage(); // recebe mensagem
	$errfile = $exec->getFile(); // recebe onde foi o err (qual arquivo)
	$errline = $exec->getLine(); // em que linha
	$err = 'CAUGHT EXCEPTION '; // tipo é CAUGHT EXCEPTION tratamento de exceção
		if(ini_get('log_errors')){
			error_log(sprintf("PHP %s: %s in %s on line % d", $err, $errstr, $errfile, $errline));//defino meu log de erro
		}
	$strErro = 'erro: '.$err.' no arquivo: '.$errfile.' ( line '. $errline .') :: IP: ('.$_SERVER['REMOTE_ADDR'].')';
	$strErro .= 'data: '.date('d/m/Y')."\n\n";// mensagem para gravar
	$arquivo = fopen("errlog.txt",'a');// crio o arquivo de log
	fwrite($arquivo, $strErro);// escrevo no arquivo
	fclose($arquivo); // fecho o arquivo
		
	set_error_handler('logErrors'); // defino que a função pra tratemento é essa!
}

?>