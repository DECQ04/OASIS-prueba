
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Home</title>
	<link rel="stylesheet" href="assets/styles/style.min.css">

	<!-- Waves Effect -->
	<link rel="stylesheet" href="assets/plugin/waves/waves.min.css">

</head>

<body>

<div id="single-wrapper">
<?php
            include ("database.php");
            $login =  new Database();
            if (isset($_POST) && !empty($_POST)) {
              $username = $login->sanitize($_POST['username']);
              $password = $login->sanitize($_POST['password']);
             //uso de la funcion plogin para verificar el contenido de usuario y contraseña en la bd
              $login->plogin($username, $password);
              /*$res = $login->plogin($username, $password);
              if ($res) {
                $message = "Datos con exito";
                $class = "alert alert-success";
              }else{
                $message="No se pudieron insertar los datos";
                $class="alert alert-danger";
              }*/


             ?>
           
           <div class="<?php echo $class?>">
             <?php echo $message;?>
           </div>   
           <?php
          }
        
       
        ?>


          
          <script>/*function plogin($nick,$pass){
        $sql="SELECT * FROM iniciar where nick='$nick' and pass='$pass'";
        $res=mysqli_query($this->con, $sql);
        $return=mysqli_fetch_object($res);
        if (!$return) {
            header('Location: mipagina.php');
        }*/$login->plogin($username, $password);
    }</script>
	<form action="#" method="post" class="frm-single" >
		<div class="inside">
			<div class="title"><strong>Ninja</strong>Admin</div>
			<!-- /.title -->
			<div class="frm-title">Login</div>
			<!-- /.frm-title -->
			<div class="frm-input"><input type="text" placeholder="Username"  id="username" class="frm-inp"><i class="fa fa-user frm-ico"></i></div>
			<!-- /.frm-input -->
			<div class="frm-input"><input type="password" placeholder="Password" id="password"class="frm-inp"><i class="fa fa-lock frm-ico"></i></div>
			<!-- /.frm-input -->
			<div class="clearfix margin-bottom-20">
				<div class="pull-left">
					<div class="checkbox primary"><input type="checkbox" id="rememberme"><label for="rememberme">Remember me</label></div>
					<!-- /.checkbox -->
				</div>
				<!-- /.pull-left -->
				<div class="pull-right"><a href="page-recoverpw.html" class="a-link"><i class="fa fa-unlock-alt"></i>Forgot password?</a></div>
				<!-- /.pull-right -->
			</div>
			<!-- /.clearfix -->
			<button type="submit" class="frm-submit" onclick="plogin($username,$password);">Login<i class="fa fa-arrow-circle-right"></i></button>
			<div class="row small-spacing">
				<div class="col-sm-12">
					<div class="txt-login-with txt-center">or login with</div>
					<!-- /.txt-login-with -->
				</div>
				<!-- /.col-sm-12 -->
				<div class="col-sm-6"><button type="button" class="btn btn-sm btn-icon btn-icon-left btn-social-with-text btn-facebook text-white waves-effect waves-light"><i class="ico fa fa-facebook"></i><span>Facebook</span></button></div>
				<!-- /.col-sm-6 -->
				<div class="col-sm-6"><button type="button" class="btn btn-sm btn-icon btn-icon-left btn-social-with-text btn-google-plus text-white waves-effect waves-light"><i class="ico fa fa-google-plus"></i>Google+</button></div>
				<!-- /.col-sm-6 -->
			</div>
			<!-- /.row -->
			<a href="page-register.html" class="a-link"><i class="fa fa-key"></i>New to NinjaAdmin? Register.</a>
			<div class="frm-footer">NinjaAdmin © 2016.</div>
			<!-- /.footer -->
		</div>
		<!-- .inside -->
	</form>
	<!-- /.frm-single -->
</div><!--/#single-wrapper -->

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		<script src="assets/script/html5shiv.min.js"></script>
		<script src="assets/script/respond.min.js"></script>
	<![endif]-->
	<!-- 
	================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script src="assets/scripts/jquery.min.js"></script>
	<script src="assets/scripts/modernizr.min.js"></script>
	<script src="assets/plugin/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/plugin/nprogress/nprogress.js"></script>
	<script src="assets/plugin/waves/waves.min.js"></script>

	<script src="assets/scripts/main.min.js"></script>
</body>
</html>