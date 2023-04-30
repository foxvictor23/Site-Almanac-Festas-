<?php include_once "inc/header.php";?>
<title>Gerenciar Delivery</title>
<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
<link href="css/sb-admin-2.min.css" rel="stylesheet">
<link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>
<body id="page-top">
<div id="wrapper">
<?php include_once "inc/sidebar.php";?>
<div id="content-wrapper" class="d-flex flex-column">
<div id="content">
<?php include_once "inc/menu.php";?>
<div class="container-fluid">
<div class='boxadm'><i class="fa fa-folder-open"></i> Gerenciar Delivery</div>
<br/>
<style>
.gr_banner_img {width:80px; height:60px; object-fit:cover; margin-bottom:3px;}
</style>

<div class="card shadow mb-4">
<div class="card-body">
<div class="table-responsive">
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
<thead>
<tr>
<th>Foto</th>
<th>Delivery</th>
<th>Cidade</th>
<th>Categoria</th>
<th>Editar</th>
<th>Capa</th>
<th>Fotos</th>
<th>Excluir</th>




</tr>
</thead>
<tfoot>
<tr>
<th>Foto</th>
<th>Delivery</th>
<th>Cidade</th>
<th>Categoria</th>
<th>Editar</th>
<th>Capa</th>
<th>Fotos</th>
<th>Excluir</th>



</tr>
</tfoot>
<tbody>
<?php

$pegar_estoque = BD::conn()->prepare("SELECT tbs.id, tbs.titulo, tbs.cidade, tbs.categoria, tbs.imagem, tb.nome FROM tb_delivery tbs join tb_categoria tb on tbs.categoria = tb.id ORDER BY id DESC");

//$pegar_estoque = BD::conn()->prepare("SELECT tbs.id, tbs.titulo, tbs.cidade, tbs.categoria, tbs.imagem, tb.nome FROM tb_fornecedor tbs join tb_categoria tb on tbs.categoria = tb.id ORDER BY id DESC");

$pegar_estoque->execute();
if ($pegar_estoque->rowCount() == 0) {
echo "<div class='alert alert-danger' role='alert'>Não há <b>Delivery cadastrado.</b></div>";
} else {	
?>
<?php while ($rows_ = $pegar_estoque->fetchObject()) {?>
<tr>
<td style="background:url(../img_fornecedor/<?php echo $rows_->imagem;?>); background-size:cover; background-repeat:no-repeat; background-position:center top;"></td>
<td><?php echo $rows_->titulo;?></td>
<td><?php echo $rows_->cidade;?></td>
<td><?php echo $rows_->nome;?></td>


<td>
<a href="edit_delivery.php?id=<?php echo $rows_->id;?>" class="btn btn-info btn-block" style="padding:0"><i class="fa fa-edit"></i></a>
</td>


<td>
<a href="capa_delivery.php?id=<?php echo $rows_->id;?>" class="btn btn-success btn-block" style="padding:0"><i class="fa fa-image"></i></a>
</td>

<td>
<a href="create_fotos_delivery.php?id=<?php echo $rows_->id;?>" class="btn btn-warning btn-block" style="padding:0"><i class="fa fa-image"></i></a>


</td>
<td>
<form action="remove-delivery.php" method="post">
<button type="submit" name="excluir" class="btn btn-danger btn-block" style="padding:0"><i class="fa fa-trash"></i></button>
<input name="id" value="<?php echo $rows_->id;?>" type="hidden">
</form>
</td>



</tr>
<?php }}?>
</tbody>
</table>
</div>
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
<script src="vendor/datatables/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="js/demo/datatables-demo.js"></script>
</html>
