    <?php class Painel extends BD{

	public function slug($string){
	$a = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜüÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿRr"!@#$%&*()_-+={[}]/?;:.,\\\'<>';
	$b = 'aaaaaaaceeeeiiiidnoooooouuuuuybsaaaaaaaceeeeiiiidnoooooouuuyybyRr                              ';
	$string = utf8_decode($string);
	$string = strtr($string, utf8_decode($a), $b);
	$string = strip_tags(trim($string));
	$string = str_replace(" ","-",$string);
	return strtolower(utf8_encode($string));
	}
	
	public function Cadtb_galeria($tmp, $file){
	$name = md5(uniqid(rand(), true)).$file;
	require ('inc/caracteres-especiais.php');
	$pasta = '../img_fotos';
	$largura_max = 800;
    $altura_max	= 600;
    require ('inc/resize.php');
    $result = upload($tmp, $name, $largura_max, $altura_max, $pasta);		
	if($result != ""){
	try{
	$cadastrar = self::conn()->prepare("INSERT INTO tb_galeria (img) VALUES(:img) ");
	
	$cadastrar->bindValue(':img', $name, PDO::PARAM_STR);	
    if($cadastrar->execute()){
	return true;
	}else{
	return false;
	}	
	}catch(PDOException $err){
	return false;
	logErrors($err);	
	}
	}else{
	return false;
	}
	}
	
	public function Cadtb_eventos($titulo, $texto, $ordem, $tmp, $file){
	$name = md5(uniqid(rand(), true)).$file;
	require ('inc/caracteres-especiais.php');
    $pasta = '../img_eventos';
    $largura_max = 1200;
    $altura_max	= 1200;
    require ('inc/resize.php');
    $result = upload($tmp, $name, $largura_max, $altura_max, $pasta);		
	if($result != ""){
	try{
	$cadastrar = self::conn()->prepare("INSERT INTO tb_eventos (titulo, texto, ordem, img) VALUES(:title, :tex, :ord, :img)");	
	$cadastrar->bindValue(':title', $titulo, PDO::PARAM_STR);
	$cadastrar->bindValue(':tex', $texto, PDO::PARAM_STR);
	$cadastrar->bindValue(':ord', $ordem, PDO::PARAM_STR);
	$cadastrar->bindValue(':img', $name, PDO::PARAM_STR);		
	
	if($cadastrar->execute()){
	return true;
	}else{
	return false;
	}
	}catch(PDOException $err){
	return false;
	logErrors($err);	
	}
	}else{
	return false;
	}
	}
	
	// cidades
	public function Cad_categoria($nome){	
	try{
	$cadastrar = self::conn()->prepare("INSERT INTO tb_categoria (nome) VALUES(:nome)");	
	$cadastrar->bindValue(':nome', $nome, PDO::PARAM_STR);
	if($cadastrar->execute()){
	return true;
	}else{
	return false;
	}
	}catch(PDOException $err){
	return false;
	logErrors($err);	
	}
	}
    // end cidades
	
	// cidades
	public function Cad_cidades($nome){	
	try{
	$cadastrar = self::conn()->prepare("INSERT INTO tb_cidade (nome) VALUES(:nome)");	
	$cadastrar->bindValue(':nome', $nome, PDO::PARAM_STR);
	if($cadastrar->execute()){
	return true;
	}else{
	return false;
	}
	}catch(PDOException $err){
	return false;
	logErrors($err);	
	}
	}
    // end cidades
	
	public function Cadtb_fornecedor($id_cat, $titulo, $slug, $cidade, $categoria, $texto, $tmp, $file){
	$name = md5(uniqid(rand(), true)).$file;
	require ('inc/caracteres-especiais.php');
    $pasta = '../img_fornecedor';
    $largura_max = 500;
    $altura_max	= 500;
    require ('inc/resize.php');
    $result = upload($tmp, $name, $largura_max, $altura_max, $pasta);		
	if($result != ""){
	try{
	$cadastrar = self::conn()->prepare("INSERT INTO tb_fornecedor (id_cat, titulo, slug, cidade, categoria, texto, imagem) VALUES(:icat, :titulo, :slu, :cidade, :categoria, :tx, :img)");	
	$cadastrar->bindValue(':icat', $id_cat, PDO::PARAM_STR);
	$cadastrar->bindValue(':titulo', $titulo, PDO::PARAM_STR);
	$cadastrar->bindValue(':slu', $slug, PDO::PARAM_STR);
	$cadastrar->bindValue(':cidade', $cidade, PDO::PARAM_STR);
	$cadastrar->bindValue(':categoria', $categoria, PDO::PARAM_STR);
	$cadastrar->bindValue(':tx', $texto, PDO::PARAM_STR);
	$cadastrar->bindValue(':img', $name, PDO::PARAM_STR);		
	
	if($cadastrar->execute()){
	return true;
	}else{
	return false;
	}
	}catch(PDOException $err){
	return false;
	logErrors($err);	
	}
	}else{
	return false;
	}
	}
	
	//inicio delivery
	public function Cadtb_delivery($id_cat, $titulo, $slug, $cidade, $categoria, $texto, $tmp, $file){
	$name = md5(uniqid(rand(), true)).$file;
	require ('inc/caracteres-especiais.php');
    $pasta = '../img_fornecedor';
    $largura_max = 500;
    $altura_max	= 500;
    require ('inc/resize.php');
    $result = upload($tmp, $name, $largura_max, $altura_max, $pasta);		
	if($result != ""){
	try{
	$cadastrar = self::conn()->prepare("INSERT INTO tb_delivery (id_cat, titulo, slug, cidade, categoria, texto, imagem) VALUES(:icat, :titulo, :slu, :cidade, :categoria, :tx, :img)");	
	$cadastrar->bindValue(':icat', $id_cat, PDO::PARAM_STR);
	$cadastrar->bindValue(':titulo', $titulo, PDO::PARAM_STR);
	$cadastrar->bindValue(':slu', $slug, PDO::PARAM_STR);
	$cadastrar->bindValue(':cidade', $cidade, PDO::PARAM_STR);
	$cadastrar->bindValue(':categoria', $categoria, PDO::PARAM_STR);
	$cadastrar->bindValue(':tx', $texto, PDO::PARAM_STR);
	$cadastrar->bindValue(':img', $name, PDO::PARAM_STR);		
	
	if($cadastrar->execute()){
	return true;
	}else{
	return false;
	}
	}catch(PDOException $err){
	return false;
	logErrors($err);	
	}
	}else{
	return false;
	}
	}

	//fim delivery

	public function Cadtb_multi_fornecedor($id_img, $tmp, $file){
	$name = md5(uniqid(rand(), true)).$file;
	require ('inc/caracteres-especiais.php');
    $pasta = '../img_fornecedor';
    $largura_max = 800;
    $altura_max	= 600;
    require ('inc/resize.php');
    $result = upload($tmp, $name, $largura_max, $altura_max, $pasta);		
	if($result != ""){
	try{
	$cadastrar = self::conn()->prepare("INSERT INTO tb_multi_fornecedor (id_img, img) VALUES (:id_img, :img)");	
	$cadastrar->bindValue(':id_img', $id_img, PDO::PARAM_STR);
	$cadastrar->bindValue(':img', $name, PDO::PARAM_STR);		
	
	if($cadastrar->execute()){
	return true;
	}else{
	return false;
	}
	}catch(PDOException $err){
	return false;
	logErrors($err);	
	}
	}else{
	return false;
	}
	}

	//Inicio multi-delivery
	public function Cadtb_multi_delivery($id_img, $tmp, $file){
	$name = md5(uniqid(rand(), true)).$file;
	require ('inc/caracteres-especiais.php');
    $pasta = '../img_fornecedor';
    $largura_max = 800;
    $altura_max	= 600;
    require ('inc/resize.php');
    $result = upload($tmp, $name, $largura_max, $altura_max, $pasta);		
	if($result != ""){
	try{
	$cadastrar = self::conn()->prepare("INSERT INTO tb_multi_delivery (id_img, img) VALUES (:id_img, :img)");	
	$cadastrar->bindValue(':id_img', $id_img, PDO::PARAM_STR);
	$cadastrar->bindValue(':img', $name, PDO::PARAM_STR);		
	
	if($cadastrar->execute()){
	return true;
	}else{
	return false;
	}
	}catch(PDOException $err){
	return false;
	logErrors($err);	
	}
	}else{
	return false;
	}
	}
	//fim multi-delivery
	
	
	public function Cadtb_materia($titulo, $slug, $data, $texto, $tmp, $file){
	$name = md5(uniqid(rand(), true)).$file;
	require ('inc/caracteres-especiais.php');
    $pasta = '../img_dicas';
    $largura_max = 1200;
    $altura_max	= 600;
    require ('inc/resize.php');
    $result = upload($tmp, $name, $largura_max, $altura_max, $pasta);		
	if($result != ""){
	try{
	$cadastrar = self::conn()->prepare("INSERT INTO tb_materia (titulo, slug, data, texto, img) VALUES(:title, :slu, :data, :tex, :img)");	
	$cadastrar->bindValue(':title', $titulo, PDO::PARAM_STR);
	$cadastrar->bindValue(':slu', $slug, PDO::PARAM_STR);
	$cadastrar->bindValue(':data', $data, PDO::PARAM_STR);		
	$cadastrar->bindValue(':tex', $texto, PDO::PARAM_STR);
    $cadastrar->bindValue(':img', $name, PDO::PARAM_STR);	
	if($cadastrar->execute()){
	return true;
	}else{
	return false;
	}
	}catch(PDOException $err){
	return false;
	logErrors($err);	
	}
	}else{
	return false;
	}
	}
    // END INSERT materias
	
	public function Cadtb_curiosidades($titulo, $slug, $data, $texto, $tmp, $file){
	$name = md5(uniqid(rand(), true)).$file;
	require ('inc/caracteres-especiais.php');
    $pasta = '../img_curiosidades';
    $largura_max = 1200;
    $altura_max	= 600;
    require ('inc/resize.php');
    $result = upload($tmp, $name, $largura_max, $altura_max, $pasta);		
	if($result != ""){
	try{
	$cadastrar = self::conn()->prepare("INSERT INTO tb_curiosidades (titulo, slug, data, texto, img) VALUES(:title, :slu, :data, :tex, :img)");	
	$cadastrar->bindValue(':title', $titulo, PDO::PARAM_STR);
	$cadastrar->bindValue(':slu', $slug, PDO::PARAM_STR);
	$cadastrar->bindValue(':data', $data, PDO::PARAM_STR);		
	$cadastrar->bindValue(':tex', $texto, PDO::PARAM_STR);
    $cadastrar->bindValue(':img', $name, PDO::PARAM_STR);	
	if($cadastrar->execute()){
	return true;
	}else{
	return false;
	}
	}catch(PDOException $err){
	return false;
	logErrors($err);	
	}
	}else{
	return false;
	}
	}
    // END INSERT curiosidades
	
	private function verificarUser($email){
	try{
	$verificar = self::conn()->prepare("SELECT id FROM usuarios WHERE email = ?");
	$verificar->execute(array($email));
	return ($verificar->rowCount() >0) ? true : false;
	}catch(PDOException $e){
	return false;
	logErrors($e);
	}
	}
	

}
?>