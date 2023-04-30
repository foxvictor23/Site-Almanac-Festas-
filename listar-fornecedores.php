<?php include_once "inc/header.php" ; ?>
   <!-- Google -->

   <title>Listar Delivery</title>
   <meta name="description" content="" />
   <meta name="application-name" content="" />
   <link rel="canonical" href="" />
   
</head>
<link rel='preload' as='style' href='https://s.lugarcerto.com.br/css/search.lugar-certo.1.6.min.css' onload="this.rel='stylesheet'" onerror='loadCSS(this.href)'>
</head>
<body>
<!--[if lt IE 9]>
<p class='chromeframe'>Seu browser é muito antigo. <a href="//browsehappy.com/">Atualize para uma versão recente</a> para aproveitar todos os recursos deste site.</p>
<![endif]-->
    
<?php include_once "inc/topo.php" ; ?>	
  <div class="js-wrapper-body">
  <header class="main margin-top-20 margin-bottom-20">
  
  <!-- menu rola com a página -->
  <!-- end menu rolda com a página -->
  <?php include_once "inc/menu.php" ; ?>
  </header>

  <section class="padding-bottom-25 margin-top-negative-20">
<style type="text/css">.buscar_imoveis_topo{background:url(images/brindar.jpg);background-size:cover;background-position:center center;border-bottom:solid 1px #d8d8d8;height:130px;position:relative;box-shadow:inset 0 0 0 1000px rgba(0,0,0,0.5)}@media screen and (max-width:375px){.buscar_imoveis_topo{height:500px}#js-secao{width:100%}}</style>
<div class="buscar_imoveis_topo search-realty">
<div class="container center-container">

<form action="busca.php" method="get">
<div class="row">

<div class="clearfix margin-top-25">

<div class="col-sxs-12 col-xs-5 form-group">
<label for="js-localizacao" class="text-black sr-only">O que você procura?</label>

<input name="s" type="text" class="form-control" placeholder="Buscar fornecedor" maxlength="70" >

</div>

<div class="col-sxs-12 col-xs-4 form-group">
<label for="js-localizacao" class="text-black sr-only">Seção</label>
<select class="form-control js-busca" name="cidade">
<option value="">Qual região?</option>
<?php
$sql = BD::conn()->prepare("SELECT * FROM tb_cidade ORDER BY nome ASC");
$sql->execute();
if ($sql->rowCount() == 0) {
echo "<div class='alert alert-danger' role='alert'>Não há <b>cidade cadastrada</b></div>";
} else {	
while ($exec = $sql->fetchObject()) {
?>
<option value="<?php echo $exec->nome;?>"><?php echo $exec->nome;?></option>
<?php }}?>


</select>
</div>

<div class="col-sxs-12 col-xs-3 form-group">

<input class="btn center-block text-center btn-busca-simples search-realty__btn" style="margin:0; height:50px;" type="submit" value="BUSCAR">
</div>
</form>
</div>



</div>
</div>

</section>
  

  <div class="container main" >
   
<!--  <div class="row">
      <div class="col-xs-12 margin-top-0 padding-top-15 padding-bottom-5" style="overflow: hidden;display: flex;align-items:center;">
        <h1><span class="pull-left resultados-da-busca-numeros-de-itens margin-right-20">1</span><span class="resultados-da-busca-descricao-dos-itens display-inherit h1 margin-top-0 title-search-h1"> resultado(s) </span>
      </div>
    </div>-->

 
    <section class="row resultados-da-busca">
      
	  <!-- refinar busca -->
	  <?php include_once "inc/refinar-busca.php" ; ?>
      <!-- end refinar busca -->
  
  
  <section class="anuncio-lista col-sxs-12 col-xs-12 col-sm-8">
    <style type="text/css">
      .stlle100 {
      		text-transform: uppercase;
      		color: #679123;
      		font-size: 10px;
      		font-family: "Lato Regular", Helvetica, Arial, sans-serif;
      		line-height: 1.5;
      	}
    </style>
	
	
    <div class="border-top-ccc">
      <div class="row">
       
	    <div class="col-sxs-6 col-xs-9 padding-top-10">
		
		<span class="h2 results-seach-number margin-bottom-0 margin-top-0" style="font-family:montserrat; font-size:21px;">

   <?php
$pegar_con = BD::conn()->prepare("SELECT * FROM tb_delivery ");
$pegar_con->execute();
if($pegar_con->rowCount() == 0){
echo '0';
}else{
$con = $pegar_con->rowCount();
echo "<b>$con \n</b>";
?>
<?php }?>
Delivery's encontrado(s) 
		
		</span>
		
		</div>
		
        <!-- 
		<div class="col-sxs-6 col-xs-3 padding-top-10">
		
		<select class="form-control pull-right" id="js-ordenar-por">
		<option value=''>Relevante</option>
		<option value=''>A - Z</option>
	
		</select>
		</div>
		-->
		
		
      </div>
    </div>
	
	
  <br/>
  
   
 <?php
  
  $pegar_estoque = BD::conn()->prepare("SELECT * FROM tb_delivery ORDER by id DESC");
  $pegar_estoque->execute();
  if($pegar_estoque->rowCount() == 0){
  echo "Não há Delivery cadastrado no sistema.";
  }else{	
  while($rows_ = $pegar_estoque->fetchObject()){

?>
    <!-- single -->
	<div class="row active-hover-layer green anuncio-lista-item" style="margin:0; padding:0;" >
      
      <a class="col-sm-2 col-xs-3 property-absolute hidden-sxs" href='ver-fornecedor.php?id=<?php echo $rows_->id;?>'>
	  <span class="image-advertiser-search verticalAlignCenter-container height35"><figure>
	  <img class="center-block img-responsive stlle100" alt='' data-src-image="img_fornecedor/<?php echo $rows_->imagem;?>"></figure></span>
	  </a>
      <a href='ver-delivery.php?id=<?php echo $rows_->id;?>'>
		<span class="col-xs-5 col-sxs-12">
		<span class='tags' style="z-index: 1;">
		<span class="tags-figure tags-figure-visited js-visited" style="display: none;">
		</span>

   </span>
  <figure class="wrapper-hover-layer border-radius controlheight controlheight-x-large margin-bottom-20" style="position: relative;">
  <img src="img_fornecedor/<?php echo $rows_->imagem;?> "
  alt=""
  style="position: absolute; width: 100%; top: 50%; left: 50%; transform: translate(-50%,-50%);">
			  
  <figcaption class='hover-layer' style=" display: table-cell;"></figcaption>
  
  </figure>
  
  </span>
  </a>
 
 
  <div class="col-xs-12 col-sm-7">
  
  <a href='ver-delivery.php?id=<?php echo $rows_->id;?>' title="">
  <h2 class='margin-0'>
  <div class="row margin-bottom-5"><span class="item-descricao text-bold col-sxs-12 col-xs-9 clearfix"><i> 
  <?php echo $rows_->cidade ;?> 
   </i></span>
  
  <div class="text-bold margin-top-0 margin-bottom-0 item-titulo col-sxs-12 col-xs-9">
  <?php echo $rows_->titulo ;?>  </div>

  </div>
				
   <div class="margin-bottom-10 margin-top-10">
  <span class='resultados-da-busca-localizacao'> <?php echo $rows_->texto ;?> </span>
   </div>
   </h2>
   
				
   </a>
           
   <div class="row hidden-xs hidden-md hidden-sm">
   <div class="col-sxs-10 col-xs-6 pull-right"><a href='ver-delivery.php?id=<?php echo $rows_->id;?>'
   class="btn btn-sm btn-success btn-block margin-right-10" style="background:#535353;"  title="Ver detalhes deste anúncio">Ver detalhes</a>
   </div>
   </div>
   </div>
   
          
		  
	<!-- mobile -->	  
	<div class="col-xs-12 hidden-lg">
    <div class='row'>
    <div class="col-sxs-10 col-xs-6">
	<a href='ver-delivery.php?id=<?php echo $rows_->id;?>'
    class="btn btn-sm btn-success btn-block margin-right-10" style="background:#535353;" title=""> Ver detalhes </a>
	</div>
	</div>
    </div>
	<!-- end mobile -->	  
		  
    </div>

    <hr class='linha-busca'>
	<br/>
	<br/>
	<!-- end single -->
	<?php }}?>
	
	

	
  </section>
  </section>
  
 
  </div>
 
 <?php include_once "inc/footer.php" ; ?>