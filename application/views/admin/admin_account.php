<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <?php foreach ($css_files as $file): ?>
            <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
        <?php endforeach; ?>
        <?php foreach ($js_files as $file): ?>
            <script src="<?php echo $file; ?>"></script>
        <?php endforeach; ?>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	
	<meta name="description" content="">
    <meta name="author" content="">

    <title>Transaction</title>

	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<link href="https://fonts.googleapis.com/css?family=Questrial" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	
	<!-- datatabel-->
	<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/dataTables.bootstrap.min.css">
	<script src="<?php echo base_url(); ?>/assets/js/jquery.dataTables.js"></script>
	<script src="<?php echo base_url(); ?>/assets/js/dataTables.bootstrap.js"></script>

	
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
	<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/pembantu.css">
	
</head>
<body>
<ul>
  <li><a class="text-center paddingnav putih" href="admin_report.html">
  <span><img src="<?php echo base_url(); ?>/assets/assets/list.svg" style="margin-bottom:10px;width:40%"></span>
  Report </a></li>
  <li><a class="active text-center paddingnav putih tebal" href="admin_account.html"><i class="fa fa-users fa-lg putih" aria-hidden="true" style="margin-bottom:10px"></i>
  Account</a></li>
  <li><a class="text-center paddingnav putih" href="Admin/bread">
  <span><img src="<?php echo base_url(); ?>/assets/assets/bread.svg" style="margin-bottom:3px;width:55%"></span>
  Bread</a></li>
  <li><a class="text-center paddingnav putih" href="admin_bread.html"><i class="fa fa-sign-out fa-lg putih" aria-hidden="true" style="margin-bottom:10px"></i>
  Signout</a></li>
</ul>

<div style="margin-left:5.8%;padding:1px 3px;padding-right:0%">
	<div class="container-fluid" style="padding:0%;">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="padding-left:3.5%;height:698px;margin-left:0%;width:100%">
			<h1 style="margin-bottom:20px"> LIST USERS </h1>
			<div class="kotakbiru"></div>
			<div class="row" style="padding:3%;padding-left:0%;padding-top:1%">
				<div class="row text-right" style="margin-left:1%;margin-right:1%;margin-bottom:1%">
					<a href="admin_input_level.html"><button class="btn btn-biru" style="height:37px;width:165px;margin-right:0.5%">
					<i class="fa fa-plus" aria-hidden="true" style="margin-right:10px"></i>ADD LEVEL USER 
					</button></a>
					<a href="admin_input_user.html"><button class="btn btn-biru" style="height:37px;width:130px">
					<i class="fa fa-plus" aria-hidden="true" style="margin-right:10px"></i>ADD USER 
					</button></a>
				</div>
				
				<div class="container-fluid">
				<?php echo $output;
				?>
					<!-- <table class="table table-striped" style="border:1px solid #E0E0E0" id="example">
						<thead>
						<tr>
							<th>No</th>
							<th>ID Employee</th>
							<th>Name</th>
							<th>Username</th>
							<th style="width:150px"> </th>
						</tr>
						</thead>
						<tbody class="warnatbl">
						<tr>
							<td>1</td>
							<td>WA-00001</td>
							<td>Monica Devi</td>
							<td>monicadevi</td>
							<td> 
							<a href="admin_edit_user.html"><button type='button' class='btn btn-warning' name='edit'><span class='glyphicon glyphicon-pencil'></span> Edit</button></a>
							<button type='button' class='btn btn-danger' name='delete' data-toggle="modal" data-target="#myModal">
							<span class='glyphicon glyphicon-pencil'></span> Delete</button>	
							</td>
						</tr>
						<tr>
							<td>2</td>
							<td>WA-00002</td>
							<td>Monica Kapan</td>
							<td>monicakapan</td>
							<td> 
							<button type='button' class='btn btn-warning' name='edit'><span class='glyphicon glyphicon-pencil'></span> Edit</button>
							<button type='button' class='btn btn-danger' name='delete'><span class='glyphicon glyphicon-pencil'></span> Delete</button>	
							</td>
						</tr>
						</tbody>
					</table> -->
				</div>
			</div>
		</div>		
</div>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog" style="padding-top:5%">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="background-color:#EF5350">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="putih">Delete User Confirmation</h4>
      </div>
      <div class="modal-body">
        <p> Do you really want to delete this user? </p>
      </div>
      <div class="modal-footer">
		<button type="button" class="btn btn-biruout" data-dismiss="modal">CANCEL</button>
        <a href="admin_account.html"><button type="button" class="btn btn-biru">SUBMIT</button></a>
      </div>
    </div>

  </div>
</div>

<script>
$(document).ready(function() {
    $('#example').DataTable();
} );
</script>
</body>