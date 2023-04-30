
<?php 
	
	session_start();
	require_once("classes/BD.class.php");
	require_once("classes/LoginPainel.class.php");
	$log = new LoginPainel;
	if(!$log->isLogado()){
    header('Location:./');
	}
	if(isset($_GET['acao']) ==  'sair'){
	if($log->sair()){
	
	header('Location:./');
	
	}
	}
	$pegarUsuarioLogado = BD::conn()->prepare("SELECT * FROM `usuarios` WHERE status = '1' AND email = '".$_SESSION['downs_email']."'");
	$pegarUsuarioLogado->execute();
	$usuarioLogado = $pegarUsuarioLogado->fetchObject();
	require_once ('classes/Painel.class.php');
	$painel = new Painel;
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=cdpbu7j45cregm5yiw78bhg35jewvt5t1d9jc49inqu76ioh"></script>
	<script>
	tinymce.init({
	selector: "textarea",
	plugins: "image, media, link, lists, wordcount, contextmenu, table, preview",
	});
	</script>
	<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,400,400i&display=swap" rel="stylesheet">
	<style>.boxadm {background:#f1f1f1; color:#535353; font-size:25px; padding-left:25px; padding-top:3px; border-left:7px solid #1c8eff; margin-bottom:7px; font-family:roboto condensed; font-weight:lighter; }</style>
	<style>
#overlaymaster {
  position: fixed;
  
  width: 100%;
  height: 100%;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: rgba(0,0,0,0.9);
  z-index: 9999;

}
#resonance { top: 50%; left: 50%;}
#textmaster{
  position: absolute;
  top: 30%;
  left: 50%;
  font-size: 30px;
  color: white;
  font-family:roboto condensed;
  font-weight:lighter;
  transform: translate(-50%,-50%);
  -ms-transform: translate(-50%,-50%);
}
</style>
	