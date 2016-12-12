<?php
session_start();
# kalo udah login ga bisa kesini
if(isset($_SESSION['admin'])){
	/*header("Location: logout.php");*/
	echo "<script type='text/javascript'>window.location.href = 'admin_account.php';</script>";
}
elseif (isset($_SESSION['kasir'])) {
	echo "<script type='text/javascript'>window.location.href = 'sales_transaction.php';</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	
	<meta name="description" content="">
    <meta name="author" content="">

    <title>LOGIN</title>

	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<link href="https://fonts.googleapis.com/css?family=Questrial" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	
	<!-- datatabel-->
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<script src="js/jquery.dataTables.js"></script>
	<script src="js/dataTables.bootstrap.js"></script>

	
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

	<!--buat menu
	<link rel="stylesheet" href="jasny-bootstrap/dist/css/jasny-bootstrap.min.css">
	<script type="text/javascript" src="jasny-bootstrap/dist/js/jasny-bootstrap.min.js"></script>-->
	
	<!--dari eli-->
	<link rel="stylesheet" href="css/pembantu.css">
	
	
</head>
<body>

<form action="sales_acc.php" method="POST">
<div style="margin-left:35%;margin-top:10%;padding:1px 3px;height:500px;padding-right:0%">
	<div class="container-fluid" style="padding:0%;">
		<div class="col-lg-5" style="background-color:white;">
			<h1 style="margin-bottom:20px">LOGIN</h1>
			<div class="kotakbiru"></div>
			<div class="row" style="padding:3%;padding-left:0%;padding-top:5%;">
				<div class="container-fluid" style="padding:0%;padding-bottom:1%">
					<div class="col-sm-3 col-md-3 col-lg-3">
						<h4 class="isiankiri"> Username </h4>
					</div>
					<div class="col-sm-9 col-md-9 col-lg-9" style="padding-top:0.2%">
						<input type="text" class="form-control" name="username">
					</div>
				</div>
				<div class="container-fluid" style="padding:0%;padding-bottom:1%">
					<div class="col-sm-3 col-md-3 col-lg-3">
						<h4 class="isiankiri"> Password </h4>
					</div>
					<div class="col-sm-9 col-md-9 col-lg-9" style="padding-top:0.2%">
						<input type="password" class="form-control" name="password" id="password">
					</div>
				</div>
				<!-- <div class="container-fluid" style="padding:0%;padding-bottom:1%">
					<div class="col-sm-3 col-md-3 col-lg-3">
						<h4 class="isiankiri"> Re password </h4>
					</div>
					<div class="col-sm-9 col-md-9 col-lg-9" style="padding-top:0.2%">
						<input type="password" class="form-control" name="repassword" id="repassword" onblur="checking()">
					</div>
					<div class="error-messages" style="display:none;"></div>
				</div> -->
				<div class="container-fluid" style="padding:0%;padding-bottom:1%">
					<div class="col-sm-3 col-md-3 col-lg-3">
						<h4 class="isiankiri"> Level </h4>
					</div>
					<div class="col-sm-9 col-md-9 col-lg-9" style="padding-top:0.2%">
						<select name="level" class="form-control" required>
							<option value="0">Pilih Level User</option>
							<option value="1">Administrator</option>
							<option value="2">Kasir</option>
						</select>
					</div>
				</div>
			</div>
			<div class="row text-right" style="padding-top:5%;padding-right:6%">
					<button class="btn btn-biru" name="login" > SUBMIT </button>
			</div>	
		</div>	
</div>
</form>
<!-- Modal -->
<!-- <div id="myModal" class="modal fade" role="dialog" style="padding-top:5%">
  <div class="modal-dialog">
 -->
    <!-- Modal content-->
    <!-- <div class="modal-content">
      <div class="modal-header" style="background-color:#2196F3">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="putih">Change Account Confirmation</h4>
      </div>
      <div class="modal-body">
        <p> Do you really want to save this changes? </p>
      </div>
      <div class="modal-footer">
		<button type="button" class="btn btn-biruout" data-dismiss="modal">CANCEL</button>
        <a><button type="button" class="btn btn-biru" name="login">SUBMIT</button></a>
      </div>
    </div> -->
<?php
	/*$username = "root";
	$password = "";
	$conn = new PDO ('mysql:host=localhost; dbname=transaksi_roti', $username, $password);*/
	include 'koneksi.php';
	if (isset($_POST['login']))
	{
		if (isset($_POST['username']) && isset($_POST['password']))
		{
			if ($_POST['level']!= 0){
			$username =$_POST['username'];
			$pass = $_POST['password'];
			
			/*$stmt = $conn -> prepare("SELECT * FROM login WHERE username = '$username'");*/
			$stid = oci_parse($conn, "SELECT * FROM login WHERE username = '$username'");
			oci_execute($stid);
			$row = oci_fetch_array($stid, OCI_BOTH);
			/*$row = $stmt -> fetch();*/
			
			$pass_salt = $pass . $row['SALT'];
			$hash = md5($pass_salt);
			$level= $_POST['level'];
			//$conn = null;
				///////////untuk cek password dan level/////////
				if (strcmp($row['PASS'], $hash) == 0)
				{
					if($row['ID_LEVEL'] == 1 && $level == 1){
						$_SESSION['username']=$username;
						$_SESSION['level']='admin';
						$_SESSION['admin']='admin';
						echo "<script type='text/javascript'>window.location.href = 'admin_account.php';</script>";
						// header("Location: sales_transaction.php");
					}else if($row['ID_LEVEL'] == 2 && $level == 2){
						$_SESSION['username']=$username;
						$_SESSION['level']='kasir';
						$_SESSION['kasir']='kasir';
						echo "<script type='text/javascript'>window.location.href = 'sales_transaction.php';</script>";
						// header("Location: sales_transaction.php");
					}else{
						echo '<div class="alert alert-danger">Upss...!!! Login gagal.</div>';
					}
				}
				else
				{
					echo '<div class="alert alert-danger">Username / Passwordnya salah nih! </div>';
				}
			}
			else{
				echo '<div class="alert alert-danger">Dipilih dulu atuh divisinya</div>';
			}
			
		}
	}

?>
  </div>
</div>
<script>
$(document).ready(function() {
    $('#example').DataTable();
} );
</script>

</body>