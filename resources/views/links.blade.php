<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

		<title>URL Shortener In Laravel</title>
	</head>
	<body>

	<div class="jumbotron">
		<h1 class="text-center">URL Shortener In Laravel</h1>
	</div>

	<div class="container">
		<form method="post">
			@csrf
			<div class="row">
				<div class="col-md-6 offset-md-2">
					<div class="row">
						<div class="col-md-8">
							<input type="url" name="link" class="form-control" required>
						</div>
						<div class="col-md-4">
							<input type="submit" value="Shortener" class="btn btn-primary btn-block">
						</div>
					</div>
						<?php error_reporting(0); ?>
						<a target="_blank" href="<?php echo $NewShortenUrl; ?>">
						<?php 
							
							echo $NewShortenUrl;
						?>
						</a>
					
				</div>
			</div>
		</form>
	</div>	







	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>