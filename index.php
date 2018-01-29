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
				<tr class="bg-primary">
					<th scope="col">ID</th>
					<th scope="col">URL</th>
					<th scope="col">Email</th>
				</tr>

<?php
if (isset($_POST['submit'])) {
    if (!empty($_POST['post_url'])) {
        $post_url = $_POST['post_url'];
        $text = file_get_contents($_POST['post_url']);
        $post_url_host = parse_url($_REQUEST['post_url'], PHP_URL_HOST);
        $i = 1;
        echo "<tr>
			<th scope='row'>" . $i . "</th>
			<td class='myone" . $i . "  shohel'>" . $post_url . "</a></td>
			<td class='email" . $i . "'></td></tr>";
        $i = $i + 1;
        if (!empty($text)) {
            $array_urls = preg_match_all(
				// "/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i"
				'/href=["\']?([^"\'>]+)["\']?/',
                $text,
                $matches
            );
        }
        if (!empty($text)) {
            foreach (array_unique($matches[0]) as $url) {

			if (substr_count($url, 'href=') == 1 && substr_count($url, $post_url_host) == 0) {
			$url = substr($url, 6, -1);
			$url = "http://" . $post_url_host . $url;
			}
			if (substr_count($url, 'href=')) {
				$url = substr($url, 6, -1);
			}
			if (substr_count($url, '//') == 0) {
				$url = "http://" . $url;
			}

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
                ) {
                    echo "<tr>
				<td>1." . $i . "</td>
				<td class='myone" . $i . "  shohel'>" . $url . "</a></td>
				<td class='email" . $i . "'></td></tr>";
                    $i = $i + 1;
				}
            }
        }
    }
}
?>
			</table>
<br>

</div>

</div>
<footer class="footer">


	<div>

			<a href='#'><i class="fa fa-twitch fa-3x fa-fw"></i></a>
			<a href='#'><i class="fa fa-facebook fa-3x fa-fw"></i></a>
			<a href='#'><i class="fa fa-twitter fa-3x fa-fw"></i></a>
			<a href='#'><i class="fa fa-youtube-play fa-3x fa-fw"></i></a>
			<a href='#'><i class="fa fa-rss fa-3x fa-fw"></i></a>
			<a href='#'><i class="fa fa-vine fa-3x fa-fw"></i></a>
			<a href='#'><i class="fa fa-flickr fa-3x fa-fw"></i></a>
			<a href='#'><i class="fa fa-linkedin fa-3x fa-fw"></i></a>

	</div>

</footer>

		<!-- Optional JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script src="js/jquery-3.2.1.slim.min.js"></script>
		<script src="js/popper.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/js.js"></script>
</div>
</body>
</html>