<?php include_once "inc/header.php";?>
<title>Cadastrar fornecedor</title>
<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
<link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>
<body id="page-top">
<div id="wrapper">
<?php include_once "inc/sidebar.php";?>
<div id="content-wrapper" class="d-flex flex-column">
<div id="content" style="">
<?php include_once "inc/menu.php";?>
<div class="container-fluid">
<div class='boxadm'><i class="fa fa-folder-open"></i> Cadastrar fornecedor</div>
<br/>
<?php if(isset($_POST['acao']) && $_POST['acao'] == 'cadastrar'){
include_once "inc/slug.php";	
$id_cat = strip_tags(filter_input(INPUT_POST, 'id_cat'));
$titulo = filter_input(INPUT_POST, 'titulo');
$slug = slug($titulo); 
$cidade = filter_input(INPUT_POST, 'cidade');
$categoria = filter_input(INPUT_POST, 'categoria');
$texto = filter_input(INPUT_POST, 'texto');
$files = $_FILES['imagem'];
if($files == ''){
echo '<script>alert("Imagem obrigatória!");location.href="cad_fornecedor.php"</script>';
}elseif($files['error'] == '4'){
echo '<script>alert("Imagem obrigatória!");location.href="cad_fornecedor.php"</script>';
}else{
if($painel->Cadtb_fornecedor($id_cat, $titulo, $slug, $cidade, $categoria, $texto, $files['tmp_name'], $files['name'])){
echo '<script>alert("Cadastrado!");location.href="cad_fornecedor.php"</script>';
}else{
echo '<script>alert("Erro ao cadastrar, verifique a conexão com a internet.");location.href="cad_fornecedor.php"</script>';
}
}
}
?>
<div class="row">
<div class="col-lg-0 d-none d-lg-block"></div>
<div class="col-lg-12">

<form action="" method="post" enctype="multipart/form-data">

<div class="form-group row">
<div class="col-sm-7 mb-1 mb-sm-0">
<p style="margin:0">*Título</p>
<input type="text" name="titulo" class="form-control form-control-user" maxlength="200" required >
</div>
</div>

<div class="form-group row">
<div class="col-sm-7 mb-1 mb-sm-0">
<p style="margin:0">*Cidade</p>
<select name="cidade" class="form-control form-control-user" required >
<?php
$exec_cidade = BD::conn()->prepare("SELECT * FROM tb_cidade ORDER BY nome ASC");
$exec_cidade->execute();
if ($exec_cidade->rowCount() == 0) {
echo "";
} else {	
while ($cidade = $exec_cidade->fetchObject()) {
?>
<option value="<?php echo $cidade->nome;?>"><?php echo $cidade->nome;?></option>
<?php }}?>
</select>
</div>
</div>

<div class="form-group row">
<div class="col-sm-7 mb-1 mb-sm-0">
<p style="margin:0">*Categoria</p>
<select name="categoria" class="form-control form-control-user" required >
<?php
$exec_categ = BD::conn()->prepare("SELECT * FROM tb_categoria ORDER BY nome ASC");
$exec_categ->execute();
if ($exec_categ->rowCount() == 0) {
echo "";
} else {	
while ($categ = $exec_categ->fetchObject()) {
?>
<option value="<?php echo $categ->id;?>"><?php echo $categ->nome;?></option>
<?php }}?>
</select>
</div>
</div>

<div class="form-group row">
<div class="col-sm-12 mb-1 mb-sm-0">
<label>*Envie uma imagem de Imagem 500 <b>alt</b> x 500 <b>larg:</b> jpg, jpeg</label><br/>
<input type="file" name='imagem' class="form-control form-control-user" accept="image/jpeg,jpg" style="border:none; background:none; " required />
</div>
</div>


<div class="form-group input-group" style="width:100%;">
 <textarea rows="15" name="texto">Conteúdo</textarea>
 </div>



<div class="col-sm-4 mb-3 mb-sm-0">


<input type="hidden" name="id_cat" value="1" />
<input type="hidden" name="acao" value="cadastrar" />
<button type="submit" class="btn btn-success btn-user btn-block">
Cadastrar
</button>
</div>
</form>
<?php ?>
<br/>
<br/>
</div>
</div>
</div>
</div>
<?php include_once "inc/footer.php";?>
</div>
</div>
<a class="scroll-to-top rounded" href="#page-top">
<i class="fas fa-angle-up"></i>
</a>
<?php include_once "inc/sair.php";?>
</body>
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="js/sb-admin-2.min.js"></script>
</html>
<script>
$(document).ready(function(){
$(".form").submit(function(e) {
e.preventDefault();//evito o submit do form ao apetar o enter..
});
});
</script>
<script language="JavaScript">
function espaco(){
var tecla=window.event.keyCode;if (tecla==32) {
alert('Por favor, não use espaço nesse campo.'); event.keyCode=0; event.returnValue=false;
}
}
</script>
<script language="JavaScript">
function digitado(event){
var tecla = window.event ? event.keyCode : event.which;
if(tecla == 32) {
window.alert("Por favor, não use espaço nesse campo.")
valor_input = document.form.input.value;
tamanho_input = document.form.input.value.length-1;
escreve = valor_input.substring(0,tamanho_input)
document.form.input.value=escreve;
return false;
}else{
return false;
}
}
</script>	
<script>
function isNumber(evt) {
evt = (evt) ? evt : window.event;
var charCode = (evt.which) ? evt.which : evt.keyCode;
if (charCode > 31 && (charCode < 48 || charCode > 57)) {
return false;
}
return true;
}
</script>
<script type="text/javascript" src="js/jquery.mask.min.js"></script>
<script>
$(document).ready(function(){
//$('.placeholder').mask("00/00/0000", { placeholder: "__/__/____" }) ;	
$('.data').mask('00/00/0000');
$('.tempo').mask('00:00:00');
$('.data_tempo').mask('00/00/0000 00:00:00');
$('.cep').mask('00000-000');
$('.tel').mask('00000-0000');
$('.ddd_tel').mask('(00) 0000-0000' , { placeholder: "(00) 0000-0000" });
$('.cpf').mask('000.000.000-00');
$('.cnpj').mask('00.000.000/0000-00');
$('.dinheiro').mask('000.000.000.000.000,00' , { reverse : true});
$('.dinheiro2').mask("#.##0,00" , { reverse:true});
});
</script> 