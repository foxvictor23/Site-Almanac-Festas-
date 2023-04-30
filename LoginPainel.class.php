<?php class LoginPainel extends BD{
	private $tabela;
	private $prefixo;
	
	public function __construct($table = 'usuarios', $pref = 'downs_'){
		$this->tabela = $table;
		$this->prefixo = $pref;
	}// constroi os atributos
	
	
	private function criptar($senha){
		return $senha;
	}//criptografa a senha de login
	
	
	private function validar($email, $senha){
		$senha = $this->criptar($senha);
		
		$verificar = self::conn()->prepare("SELECT * FROM `".$this->tabela."` WHERE email = ? AND senha = ? AND status = '1'");
		$verificar->execute(array($email, $senha));
		return ($verificar->rowCount() >0) ? true : false;
	}//validar usuario
	
	
	public function logar($email, $senha){
		if($this->validar($email, $senha)){
			$_SESSION[$this->prefixo.'email'] = $email;
			$_SESSION[$this->prefixo.'senha'] = $senha;
			return true;
		}else{
			return false;
		}
	}// função para logar usuarios
	
	public function isLogado(){
		if(isset($_SESSION[$this->prefixo.'email']) && isset($_SESSION[$this->prefixo.'senha'])){
			return true;
		}else{
			return false;
		}
	}//metodo de verificação de usuario logado
	
	public function sair(){
		if($this->isLogado()){
			unset($_SESSION[$this->prefixo.'email']);
			unset($_SESSION[$this->prefixo.'senha']);
			session_destroy();
			return true;
		}else{
			return false;
		}
	}//Metodo para sair do painel
}
?>