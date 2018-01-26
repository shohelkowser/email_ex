<!doctype html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="icon" href="favicon.ico" type="image/x-icon">
	<!-- normalize.css -->
	<link rel="stylesheet" href="css/normalize.css">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.3.7.css">
	<!-- bootstrap-theme.min.css -->
	<link rel="stylesheet" href="css/bootstrap-theme.min.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="style.css">
	<script src="js/jquery-3.2.1.min.js"></script>
	<title>Basic Website</title>
</head>
<body>
	<div class="container-fluid">
		<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="#">Email Extractor</a>
				</div>
				<div class="collapse navbar-collapse">
					<ul class="nav navbar-nav pull-right">
						<li class="active">
							<a href="index.php">
								<i class="fa fa-home" aria-hidden="true"></i> Home</a>
						</li>
						<li>
							<a href="about.php">
								<i class="fa fa-info-circle" aria-hidden="true"></i> About</a>
						</li>
						<li>
							<a href="contact.php">
								<i class="fa fa-envelope" aria-hidden="true"></i> Contact</a>
						</li>
					</ul>
				</div>
			</div>
		</div>

		<style type="text/css">
			div {
				overflow: hidden;
			}
		</style>

		<ol class="breadcrumb">
			<li>
				<a href="#">Home</a>
			</li>
			<li>
				<a href="#">Library</a>
			</li>
			<li class="active">Data</li>
		</ol>

		<!-- <div style="	display: flex; flex-wrap: wrap; justify-content:center;" > -->
		<div class="d-flex flex-wrap">

			<form method="post" action="index.php">
				<div class="form-group">
					<label for="exampleInputEmail1">Enter One URL</label>
					<input value="http://php.net/manual/en/function.strlen.php" type="url" class="form-control" id="exampleInputEmail1" placeholder="URL"
					 name="post_url">
				</div>
				<button type="submit" class="btn btn-primary" name="submit">Submit</button>
			</form>
			<br>

			<table class="table table-hover">
				<tr>
					<th>ID</th>
					<th>URL</th>
					<th>Email</th>
				</tr>

<?php 
if (isset($_POST['submit'])) {
	if (!empty($_POST['post_url'])){
	$post_url = $_POST['post_url'];
	$text = file_get_contents($_POST['post_url']);
	$post_url_host = parse_url($_REQUEST['post_url'], PHP_URL_HOST);
	$i=1;
	echo "<tr>
			<td>".$i."</td>
			<td class='myone".$i."  shohel'>".$post_url."</a></td>
			<td class='email".$i."'></td></tr>";
	$i=$i+1;
	if (!empty($text)) {
		$array_urls = preg_match_all(
		"/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",
		$text,
		$matches
		);
	}
	if (!empty($text)) {
			foreach(array_unique($matches[0]) as $url) {
				if (
				strpos($url, $post_url_host) !== false
				&& substr_count($url, '://') == 1 
				&& substr_count($url, '/') < 10
				&& substr_count($url, '/') > 2
				&& substr_count($url, '.png') == 0 
				&& substr_count($url, '.jpg') == 0 
				&& substr_count($url, '.gif') == 0 
				&& substr_count($url, '.css') == 0 
				&& substr_count($url, '.js') == 0  
				&& substr_count($url, '.pdf') == 0
				&& substr_count($url, '?') == 0
				&& substr_count($url, '.ico') == 0
				&& substr_count($url, '#') == 0
				&& $url != $post_url
				)  {
				echo "<tr>
				<td>1.".$i."</td>
				<td class='myone".$i."  shohel'>".$url."</a></td>
				<td class='email".$i."'></td></tr>";
				$i = $i +1;
					}
			}	
		}
	}
}
?>
			</table>
			<br>

		</div>
		<footer class="footer-bs">
			<div class="row">
				<div class="col-md-3 footer-brand animated fadeInLeft">
					<h2>Logo</h2>
					<p>Suspendisse hendrerit tellus laoreet luctus pharetra. Aliquam porttitor vitae orci nec ultricies. Curabitur vehicula,
						libero eget faucibus faucibus, purus erat eleifend enim, porta pellentesque ex mi ut sem.</p>
					<p>© 2014 BS3 UI Kit, All rights reserved</p>
				</div>
				<div class="col-md-4 footer-nav animated fadeInUp">
					<h4>Menu —</h4>
					<div class="col-md-6">
						<ul class="list">
							<li>
								<a href="#">About Us</a>
							</li>
							<li>
								<a href="#">Contacts</a>
							</li>
							<li>
								<a href="#">Terms & Condition</a>
							</li>
							<li>
								<a href="#">Privacy Policy</a>
							</li>
						</ul>
					</div>
				</div>
				<div class="col-md-2 footer-social animated fadeInDown">
					<h4>Follow Us</h4>
					<ul>
						<li>
							<a href="#">Facebook</a>
						</li>
						<li>
							<a href="#">Twitter</a>
						</li>
						<li>
							<a href="#">Instagram</a>
						</li>
						<li>
							<a href="#">RSS</a>
						</li>
					</ul>
				</div>
				<div class="col-md-3 footer-ns animated fadeInRight">
					<h4>Newsletter</h4>
					<p>A rover wearing a fuzzy suit doesn’t alarm the real penguins</p>
					<p>
						<div class="input-group">
							<input type="text" class="form-control" placeholder="Search for...">
							<span class="input-group-btn">
								<button class="btn btn-default" type="button">
									<span class="glyphicon glyphicon-envelope"></span>
								</button>
							</span>
						</div>
						<!-- /input-group -->
					</p>
				</div>
			</div>
		</footer>

		<!-- Optional JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script src="js/jquery-3.2.1.slim.min.js"></script>
		<script src="js/popper.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/js.js"></script>

</body>
</html>