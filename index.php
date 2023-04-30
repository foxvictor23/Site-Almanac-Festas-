<?php include_once "inc/header.php" ; ?>
<title>Almanaque</title>
<meta name="description" content="" />
<meta name="application-name" content="" />
<link rel="canonical" href="" />
</head>
<body>
<!--[if lt IE 9]>
<p class='chromeframe'>Seu browser é muito antigo. <a href="//browsehappy.com/">Atualize para uma versão recente</a> para aproveitar todos os recursos deste site.</p>
<![endif]-->
<?php include_once "inc/topo.php" ; ?>
<div class="js-wrapper-body">
<header class="main margin-top-20 margin-bottom-20">
<?php include_once "inc/menu.php" ; ?>
</header>



<section class="padding-bottom-25 margin-top-negative-20">


<style type="text/css">/*.buscar_imoveis_topo{background:url(images/brindar.jpg);background-size:cover;background-position:center center;border-bottom:solid 1px #d8d8d8;height:380px;position:relative;box-shadow:inset 0 0 0 1000px rgba(0,0,0,0.5)}@media screen and (max-width:375px){.buscar_imoveis_topo{height:500px}#js-secao{width:100%}}
*/
</style>





<style>
#fmaster {width:100%; height:380px; object-fit:cover;}
.mySlides {display: none}
/* Slideshow container */
.slideshow-container {
  width:100%;
  position: relative;
  height:380px;
  margin: auto;
}
/* The dots/bullets/indicators */
.dot {
  cursor: pointer;
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
 
  
}
.active, .dot:hover {
  background-color: #717171;
}
/* Fading animation */
.fade {
  -webkit-animation-name: fade;
  -webkit-animation-duration: 1.5s;
  animation-name: fade;
  animation-duration: 1.5s;
}
@-webkit-keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

@keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}
@media only screen and (max-width: 300px) {
 
}
</style>


<div class="slideshow-container">

<div class="mySlides"><img src="images/bb43.jpg" id="fmaster" ></div>
<div class="mySlides"><img src="images/bb1.jpg" id="fmaster" ></div>
<div class="mySlides"><img src="images/bb2.jpg" id="fmaster" ></div>
<div class="mySlides"><img src="images/bb3.jpg" id="fmaster" ></div>
<div class="mySlides"><img src="images/15anos.jpeg" id="fmaster" ></div>

<div class="mySlides">
<img src="images/formatura.jpeg" id="fmaster">
</div>

<div class="mySlides">
<img src="images/eventos.jpeg" id="fmaster">
</div>


<div class="mySlides">
<img src="images/batizado.jpg" id="fmaster">
</div>


</div>

<br>

<div style="text-align:center">
  <span class="dot" onclick="currentSlide(1)"></span> 
  <span class="dot" onclick="currentSlide(2)"></span> 
  <span class="dot" onclick="currentSlide(3)"></span> 
  <span class="dot" onclick="currentSlide(4)"></span> 
  <span class="dot" onclick="currentSlide(5)"></span> 
  <span class="dot" onclick="currentSlide(6)"></span> 
  <span class="dot" onclick="currentSlide(7)"></span> 
  <span class="dot" onclick="currentSlide(8)"></span> 

</div>

<script>
var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
}
</script>


<div class="container center-container" >
<form action="busca.php" method="get">
<div class="row">
<h1 class="text-center" style="font-weight:bolder; text-transform:none;"><img src="images/white.png" width="130"></h1>
<div class="clearfix margin-top-25">
<div class="col-sxs-12 col-xs-5 form-group">
<label for="js-localizacao" class="text-black sr-only">O que você procura?</label>
<input name="s" type="text" class="form-control" style="height:50px;" placeholder="Buscar fornecedor" maxlength="70" >
</div>
<div class="col-sxs-12 col-xs-4 form-group">
<label for="js-localizacao" class="text-black sr-only">Seção</label>
<select class="form-control js-busca" name="cidade" style="height:50px;">
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

<div class="container" estado="MG" style="border:0; margin-top:-35px;">
<section class="project-feature" style="border:0;">
<h2 style="color:#333">Tudo para você fazer a festa</h2>
<div class="row">

<?php
$sqlf = BD::conn()->prepare("SELECT * FROM tb_fornecedor WHERE status='ativo' ORDER BY id DESC");
$sqlf->execute();
if ($sqlf->rowCount() == 0) {
echo "<div class='alert alert-danger' role='alert'>Não há <b>fornecedor cadastrado!</b></div>";
} else {	
while ($execf = $sqlf->fetchObject()) {
?>
<div class="project-feature__itens">
<div class="project-feature__itens__cat">
<a href="ver-fornecedor.php?id=<?php echo $execf->id;?>" title="">
<img src="img_fornecedor/<?php echo $execf->imagem;?>" alt="" style="width:100%; height:250px; object-fit:cover;">
<h4>
<div><?php echo $execf->cidade;?></div>
</h4>
</a>
</div>
<div class="project-feature__itens__box">
<a alt="" href="single.php" title="">
<strong style="color:#535353"><?php echo $execf->titulo;?></strong>
</a>
</div>
</div>
<?php }}?>


</div>
</section>
</div>
<?php include_once "inc/footer.php" ; ?>