<?php include_once "inc/header.php";?>
<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
<link href="css/sb-admin-2.min.css" rel="stylesheet">
<title>Painel de Controle</title>
</head>
<body id="page-top">
<div id="wrapper">
<?php include_once "inc/sidebar.php";?>
<div id="content-wrapper" class="d-flex flex-column">
<div id="content">
<?php include_once "inc/menu.php";?>
<div class="container-fluid">
<div class="d-sm-flex align-items-center justify-content-between mb-4">
<h1 class="h3 mb-0 text-gray-800">
Painel de Controle,
<?php
function mostraData($quando){
$semana = array('Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sábado');
$mes = array('Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro','Outubro', 'Novembro', 'Dezembro');
return $semana[date('w',$quando)] . ', ' . date('j',$quando) . ' de ' . $mes[date('n',$quando)-1] . ' de ' . date('Y',$quando);
}
$agora = time( );
$prazo = mktime(0,0,0,7,15,2016);
echo '' . mostraData($agora);
?></h1>
</div>


<div class="card shadow mb-4">
<div class="card-body">
<div class="table-responsive">
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
<thead>
<tr>

<th>Fornecedor</th>
<th>Cidade</th>

<th>Ação</th>




</tr>
</thead>
<tfoot>
<tr>

<th>Fornecedor</th>
<th>Cidade</th>
<th>Ação</th>



</tr>
</tfoot>
<tbody>
<?php
$pegar_estoque = BD::conn()->prepare("SELECT * FROM tb_fornecedor ORDER BY id DESC");
$pegar_estoque->execute();
if ($pegar_estoque->rowCount() == 0) {
echo "<div class='alert alert-danger' role='alert'>Não há <b>fornecedor cadastrado.</b></div>";
} else {	
while ($rows_ = $pegar_estoque->fetchObject()) {
?>
<tr>

<td><?php echo $rows_->titulo;?></td>
<td><?php echo $rows_->cidade;?></td>

<td>


<a href="http://almanaquefestas.com.br/ver-fornecedor.php?id=<?php echo $rows_->id;?>" class="btn btn-info btn-block" style="padding:0" target="_blank">Visualizar</a>

</td>

</tr>
<?php }}?>
</tbody>
</table>
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