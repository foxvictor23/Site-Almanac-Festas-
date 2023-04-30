<?php include_once "inc/header.php";?>
<title>Editar capa</title>
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
<div class='boxadm'><i class="fa fa-folder-open"></i> Editar capa</div>
<br/>


<div class="row">
<div class="col-lg-0 d-none d-lg-block"></div>
<div class="col-lg-12">
<?php
$id = $_GET['id']; 
 $sql = BD::conn()->prepare("SELECT id, imagem FROM tb_fornecedor WHERE id = $id ");
 $sql->execute();
 while($rows_ = $sql->fetchObject()){

?>
<form action="" method="post" enctype="multipart/form-data">

<div class="form-group row">

<div class="col-sm-12 mb-1 mb-sm-0">
<p style="margin:0">
<img src="../img_fornecedor/<?php echo $rows_->imagem?>" style="width:350px; height:250px; object-fit:cover;">
</p>
</div>
</div>

<div class="col-sm-12 mb-1 mb-sm-0">
<input type="file" name="file" id="file" accept="image/jpeg,jpg" required >
</div>

<?php }?>
<div class="col-sm-2 mb-3 mb-sm-0" style="margin:0; padding:0;">

<br/>
<input type="hidden" name="acao" value="cadastrar" />
<button type="submit" class="btn btn-success btn-user btn-block">
Atualizar
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

<?php 
if(isset($_POST['acao']) && $_POST['acao'] == 'cadastrar'){
	
$uploadPath = '../img_fornecedor/'; 
$statusMsg = ''; 
$upload = 0; 

if(!empty($_FILES['file']['name'])){ 
      
   $fileName = $_FILES['file']['name']; 
   $fileType = $_FILES['file']['type']; 
   $fileTemp = $_FILES['file']['tmp_name'];

   $origina = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜüÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿRr"!@#$%&*()_-+={[}]/?;:,\\\'<>°ºª';
   $substitui = 'aaaaaaaceeeeiiiidnoooooouuuuuybsaaaaaaaceeeeiiiidnoooooouuuyybyRr                                ';	
   $fileName = strtr(utf8_decode($fileName), utf8_decode($origina), $substitui);
   $fileName = str_replace(' ', '-', $fileName);
   $fileName = strtolower($fileName);
         
   $filePath = $uploadPath.basename($fileName); 
		
   $allowTypes = array('image/png','image/jpg','image/jpeg','image/gif'); 
   if(in_array($fileType, $allowTypes)){ 
   $rotation = $_POST['rotation']; 
   if($rotation == -90 || $rotation == 270){ 
   $rotation = 90; 
   }elseif($rotation == -180 || $rotation == 180){ 
   $rotation = 180; 
   }elseif($rotation == -270 || $rotation == 90){ 
   $rotation = 270; 
   } 
             
   if(!empty($rotation)){ 
                switch($fileType){ 
                    case 'image/png': 
                        $source = imagecreatefrompng($fileTemp); 
                        break; 
                    case 'image/gif': 
                        $source = imagecreatefromgif($fileTemp); 
                        break; 
                    default: 
                        $source = imagecreatefromjpeg($fileTemp); 
                } 
                $imageRotate = imagerotate($source, $rotation, 0); 
                 
                switch($fileType){ 
                    case 'image/png': 
                        $upload = imagepng($imageRotate, $filePath); 
                        break; 
                    case 'image/gif': 
                        $upload = imagegif($imageRotate, $filePath); 
                        break; 
                    default: 
                        $upload = imagejpeg($imageRotate, $filePath); 
                } 
                  
            }elseif(move_uploaded_file($fileTemp, $filePath)){ 
                $upload = 1; 
            }else{ 
                $statusMsg = 'Erro ao subir a imagem, verifique sua conexão com a internet.'; 
            } 
        }else{ 
            $statusMsg = 'Somente imagens JPG/JPEG/PNG/GIF são permitidas.'; 
        } 
    }else{ 
        $statusMsg = 'Por favor, selecione uma imagem.'; 
    } 

   if($upload == 1){ 
   $max_x = "800"; 
   $max_y = "600";
   $img		= imagecreatefromjpeg($filePath);
   $original_x	= imagesx($img); //largura
   $original_y	= imagesy($img); //altura
   
    if ( ( $original_x > $max_x ) || ( $original_y > $max_y ) ){
    if ( $original_x > $original_y ) {	
	$max_y	= ( $max_x * $original_y ) / $original_x;
	}else{
	$max_x	= ( $max_y * $original_x ) / $original_y;
	}
	$nova = imagecreatetruecolor($max_x, $max_y);
	imagecopyresampled($nova, $img, 0, 0, 0, 0, $max_x, $max_y, $original_x, $original_y);
	imagejpeg($nova, $filePath);
	imagedestroy($nova);
	imagedestroy($img);
	
    }else{
	imagejpeg($img, $filePath);
	imagedestroy($img);
    }
    if($upload == true){
	   
	try{ 
	$id = $_GET['id']; 
	$cadastrar = BD::conn()->prepare("UPDATE tb_fornecedor SET imagem = ? WHERE id = '".$id."' ");
	}
	catch(PDOException $err){ return false; logErrors($err);}
	}
	else{return false;}
	$cadastrar_aqui = array("$fileName");
	if($cadastrar->execute($cadastrar_aqui)){
	
	echo '<script>alert("Imagem editada!");location.href=""</script>';
	}	
    }	   
    }  
?>

<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="js/sb-admin-2.min.js"></script>
</html>
