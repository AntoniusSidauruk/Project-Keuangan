<!-- Proses Login -->
<?php  
	session_start();
	if (isset($_SESSION['username'])){
		header("Location:index.php");
	}

	include 'koneksi.php';
if (isset($_POST['login'])){		
	$username = $_POST['username'];
	$password = $_POST['password'];


	$login = mysqli_query($koneksi, "SELECT * FROM data_admin WHERE username = '$username' and password = '$password'");
	$data = mysqli_num_rows($login);

	if ($username == "" && $password == ""){
		echo "<br>";
			echo "<div class =\"alert alert-success\">Silahkan masukan username dan password</div>";
		}

			else if ($data > 0){
			$data1 = mysqli_fetch_assoc($login);
			$_SESSION['username'] = $data1 ['username'];
			$_SESSION['nama'] = $data1['nama'];
			header("Location:index.php");
							
		}else{
			echo "<br>";
			echo "<div class=\" alert alert-danger \">Maaf Username atau Password Tidak Sesuai</div>";
			
		}
}
	
?>

<!-- DESAIN LOGIN -->
<!DOCTYPE html>
<html>
<head>
	<title>Log|in Admin BTN</title>
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>
<body>
	<div class="Boxlogin">
		<img class="user" src="assets/image/find_user.png">
		<h3>Sign In Here</h3>
		<form action="" method="post">
			<div class="inputBox">
				<span><i class="fa fa-user" aria-hidden="true"></i></span>	
				<input type="text" name="username" autocomplete="off" placeholder="Username..">
				
			</div>
			<div class="inputBox">
				<span><i class="fa fa-lock" aria-hidden="true"></i></span>
				<input type="password" name="password" placeholder="Password..">
				
			</div>
				<input type="submit" name="login" value="login">
		</form>
	</div>

	<button id="press" style="margin-top:150px; position: absolute;" type="button">Klik</button>

	<script type="text/javascript" src="assets/js/jquery-1.11.1.min.js"></script>
	<script type="text/javascript" src="assets/js/toastr.min.js"></script>

	<script>
		$("#press").on("click", function(){
			toastr.options = {
				"closeButton": true,
				"debug": true,
				"newestOnTop": false,
				"progressBar": false,
				"positionClass": "toast-top-right",
				"preventDuplicates": false,
				"onclick": null,
				"showDuration": "300",
				"hideDuration": "1000",
				"timeOut": "5000",
				"extendedTimeOut": "1000",
				"showEasing": "swing",
				"hideEasing": "linear",
				"showMethod": "fadeIn",
				"hideMethod": "fadeOut"
			}
			toastr["success"]("Lorem ipsum dolor sit amet, consectetur adipisicing elit")
		});
	</script>
</body>
</html>


