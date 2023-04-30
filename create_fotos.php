<?php include_once "inc/header.php";?>
<title>Inserir fotos</title>
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
<div class='boxadm'><i class="fa fa-folder-open"></i> Inserir fotos</div>
<br/>


<div class="row">
<div class="col-lg-0 d-none d-lg-block"></div>
<div class="col-lg-6">

<form action="" method="post" enctype="multipart/form-data">

<div class="form-group row">
<div class="col-sm-12 mb-1 mb-sm-0">
<label>*Envie uma imagem de Imagem 800 <b>larg</b> x 800 <b>alt ou maior:</b> jpg, jpeg</label><br/>
<input type="file" name='imagem' class="form-control form-control-user" accept="image/jpeg,jpg" style="border:none; background:none; " required />
</div>
</div>

<div class="col-sm-3 mb-3 mb-sm-0">
<input type="hidden" name="id_img" value="<?php echo $id = $_GET['id']; ?>" >
<input type="hidden" name="acao" value="cadastrar" />
<button type="submit" class="btn btn-success btn-user btn-block">
Cadastrar
</button>
</div>
</form>

<br/>
<br/>
</div>

</div>

<style>
.gr_banner_img {width:100%; object-fit:cover; height:150px; margin-bottom:15px;}
</style>
<div class="row">
<?php
$id = (int)$_GET['id'];
$pegar_estoquea = BD::conn()->prepare("SELECT * FROM tb_multi_fornecedor WHERE id_img = ".$id." ");
$pegar_estoquea->execute();
if ($pegar_estoquea->rowCount() == 0) {
echo "<div class='alert alert-danger' role='alert' style='width:100%;'>Não há <b>fotos</b></div>";
}else{	
?>

<?php while ($rows_a = $pegar_estoquea->fetchObject()) { ?>
<div class="col-xl-3 col-md-6 mb-4">
<div class="card border-left-warning shadow h-100">
<div class="card-body">
<div class="col mr-2">
<div class="row no-gutters align-items-center">
<div class="col-auto">
<img src="../img_fornecedor/<?php echo $rows_a->img;?>" class="gr_banner_img">

<form action="remove-multi-fotos.php" method="post">
<button type="submit" name="excluir" class="btn btn-danger btn-block" style="padding:0">Excluir</button>
<input name="id" value="<?php echo $rows_a->id;?>" type="hidden">
</form>


</div>
</div>
</div>
</div>
</div>
</div>
<?php }}?>


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

<?php if(isset($_POST['acao']) && $_POST['acao'] == 'cadastrar'){
$id_img = strip_tags(filter_input(INPUT_POST, 'id_img'));
$files = $_FILES['imagem'];
if($files == ''){
echo '<script>alert("Imagem obrigatória!");location.href=""</script>';
}elseif($files['error'] == '4'){
echo '<script>alert("Imagem obrigatória!");location.href=""</script>';
}else{
if($painel->Cadtb_multi_fornecedor($id_img, $files['tmp_name'], $files['name'])){
echo '<script>alert("Cadastrado!");location.href=""</script>';
}else{
echo '<script>alert("Erro ao cadastrar, verifique a conexão com a internet.");location.href=""</script>';
}
}	
}
?>



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
