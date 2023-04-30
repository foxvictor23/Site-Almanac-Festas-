<?php include_once "inc/header.php" ; ?>
   <!-- Google -->
   <title>Delivery</title>
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
  
  <!-- menu rola com a página -->
  <!-- end menu rolda com a página -->
  <?php include_once "inc/menu.php" ; ?>
  </header>
  
  
  <style type="text/css">
    /* versao mobile mais limpa ate a nova versao do detalhe */
    @media (max-width: 768px){
    	.col-xs-12.margin-bottom-30 {
    		margin-bottom: 0 !important;
    	}
    
    	.barra-uai {
    		display: none !important;
    	}
    
    	.container.main .border-top-ccc{
    		border: 0 !important;
    		padding-top:0 !important;
    	}
    
    	.barradeacoes, .itenscustos__taxas{
    		display: none !important;
    	}
    	.tab-content {
    		padding: 0 !important;
    		padding: 0 !important;
    	}
    	.meus-imoveis-favoritos {
    		display: none !important;
    	}
    }
  </style>
 
<?php
$id = $_GET['id'];
$sqlv = BD::conn()->prepare("SELECT * FROM tb_delivery WHERE id = ".$id." ");
$sqlv->execute();
if($sqlv->rowCount() == 0){
echo "";
}else{	
while($execv = $sqlv->fetchObject()){					 
?>
 <div class="container padding-0">
    <ul class="breadcrumb hidden-sxs">
      <li itemtype="http://data-vocabulary.org/Breadcrumb"  itemscope><a href="./" style="color:#6abded;" title="" itemprop="url"><span itemprop="title">Página inicial</span></a></li>

        <li itemtype="http://data-vocabulary.org/Breadcrumb" itemscope>
          <a href="" style="color:#333; cursor:default; text-decoration:underline;" title="" itemprop="url"><span itemprop="title"> Delivery em <?php echo $execv->cidade;?> </span></a>
        </li>
    </ul>
  </div>
  
  

  <div class="container main">
    <section class="row anuncio-lista">
      <div class="col-lg-12 margin-top-20">
        <div class="row">
          <div class="col-sxs-12 col-sm-8 col-md-9">
            <h1 class="margin-top-0 margin-bottom-5 lancamento__title">
			<?php echo $execv->titulo;?>
			</h1>
			<i class="sprite-map_maker"></i>
			<span class="resultados-da-busca-localizacao"> <?php echo $execv->cidade;?></span></div>
          <div
            class="col-sxs-12 col-sm-4 col-md-3">
            <div class="row">
             
			 <div class="col-md-12 hidden-xs">
			  <button data-action="role" data-target="#js-contate-o-anunciante" title="" class="btn btn-lg btn-warning btn-block" style="background:#535353; border:none;">CONTATE O ANUNCIANTE</button>
			  </div>
			  
            </div>
        </div>
      </div>
      
	  
	  <!--<div class="row margin-top-15">
        <div class="lancamento__hero--footer">
         
          <div class="lancamento__infobox col-xs-6 col-sm-3"><i class="sprite-previsao_entrega"></i>
            <p>Previsão de entrega</p><span>12/2019</span></div>
          <div class="lancamento__infobox col-xs-6 col-sm-3"><i class="sprite-etiqueta_preco"></i>
            <p>A partir de </p><span>1.144.000,00</span></div>
          <div class="lancamento__infobox col-xs-6 col-sm-3"><i class="sprite-carac_condominio"></i>
            <p>Área de montagem</p><span>82m²</span></div>
        </div>
      </div>-->
	  
	  
      <section id="lancamento-descricao" class="row border-top-ccc margin-top-15 padding-top-15">
        <div class="col-md-12 margin-bottom-15">
          <div class="text-center ">
            <h2 class="lancamento__subtitle">Descrição</h2>
          </div>
        </div>
        <div class="col-md-12">
      
          <div class="lancamento__descricao" style="text-align:center;">
		  
		  <?php echo $execv->texto;?>
		  </div>
  
        </div>
        
      </section>
      
	 <section id="lancamento-plantas" class="row margin-top-15 padding-top-15">
        <div class="col-md-12 margin-bottom-15">
          <div class="text-center ">
            <h2 class="lancamento__subtitle">Fotos</h2>
	<br/>		
	<br/>	
	<p style="text-align:center;">
<?php
$id = $execv->id;
$selecionar_produto = BD::conn()->prepare("SELECT * FROM tb_multi_delivery WHERE id_img = ".$id." ");
$selecionar_produto->execute();
if($selecionar_produto->rowCount() == 0){echo '<p style=text-align:center;><b></b></p>';
}else{while($ep = $selecionar_produto->fetchObject()){
          ?>
			<img src="img_fornecedor/<?php echo $ep->img;?>" style="width:250px; height:200px; padding:15px; object-fit:cover;">
<?php }}?>
</p>
<br/>
<br/>
          </div>
        </div>
        
		
		
      </section>
    
	
      <section id="js-contate-o-anunciante" class="row margin-top-15 padding-top-15">
        <div class="col-md-12 margin-bottom-15">
          <div class="text-center ">
            <h2 class="lancamento__subtitle">Fale com o anunciante</h2>
          </div>
          <div class="col-md-12">
            <div class="row">
            
			<!-- img anunciante -->
			<div class="col-md-12 text-center margin-bottom-15 margin-top-5">
             <a href="" title="" class="green-text"><img src="img_fornecedor/<?php echo $execv->imagem;?>"
                    class alt="" style="width:30%;"></a>
              </div>
			  <!-- end img anunciante -->
			  
              <div class="col-md-12 text-center">
              <!--  <div class="mostraescondetelefone white margin-0-auto text-center"><span class="h3 text-regular mostraescondetelefone__fone"> (37) 0000-0000 <span class="tel2" style="display:none;"><br>(39) 0000-0000 </span></span>
                  <a
                    href="javascript:;" class="orange-text small mostraescondetelefone__controle ver-tel-baixo-esq" title="Clique para ver o telefone" data-action="remove"
                    data-ctrl="details-ads"> Ver telefone </a>
                </div>-->
                <div class="msg-phone margin-bottom-10 text-center"><small class="orange-text font-size-15">Ligue agora e solicite mais informações.</small></div>
              </div>
            </div>
          </div>
		<?php }}?>
          <div class="col-md-6 col-md-offset-3 margin-top-15">
            <div class="row margin-top-15">
              <form name="form-proposta-2" id="form-proposta-2" action="email/envia.php" method="post">
                <div class="col-sm-12">
                  <div class="form-group"><input type="text" class="form-control form-control-label margin-bottom-15" placeholder="Seu nome" id="seu-nome-2" name="nome"
                      required><label for="seu-nome-2">Nome</label></div>
                  <div class="form-group"><input type="text" class="form-control form-control-label margin-bottom-15" placeholder="Seu email" id="seu-email-2" name="email"
                      required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"><label for="seu-email-2">E-mail</label></div>
                  <div class="form-group"><input type="text" class="js-numberPhone form-control form-control-label margin-bottom-15" placeholder="Seu telefone" id="seu-telefone-2"
                      name="telefone"><label for="seu-telefone-2">Telefone</label></div>
                </div><input type="hidden" name="info-1" id="info-1" value="None">
                <div class="col-sm-12"><textarea type="text" class="form-control margin-bottom-20" placeholder="Sua mensagem" id="sua-mensagem-2" name="mensagem" required
                    rows="6"></textarea></div>
               

			   <div class="col-md-12 text-center">
			
                  
                <div class="row">
                  <div class="col-md-12"><button type="submit" class="btn js-btn btn-warning btn-lg btn-block"><i class="sprite-email_white margin-right-10"></i>ENVIAR <span class="hidden-sm">MENSAGEM</span></button></div>
                </div>
            </div>
            </form>
          </div>
        </div>
  </div>
  </section>
  
  <br/>
  <br/>
  
  
  
  </div>
  </section>
  </div>
 
 <?php include_once "inc/footer.php" ; ?>