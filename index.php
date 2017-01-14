<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">

    <title>BracketMaster</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/custom.css" rel="stylesheet">

  </head>
	<?php $i = 0; ?>
  <body class="container-fluid">
    <div class="site-wrapper">
		<div class="site-wrapper-inner">
			<div class="cover-container">
				<div class="inner cover">
					<h1 class="cover-heading">Bracket Seedings</h1>
					<p class="lead" id="description">Insert tags below separated by a space. Make sure names are typed as they appear on ocsmash.weebly.com.</p>
					<p class="lead" id="databox">
						<form action="results.php" method="post">
							<input type="text" name="challongeName" id="challongeName" class="form-control" placeholder="Challonge Name">
							<br>
							<textarea name="tagList" id="tagList" class="form-control"></textarea>
							<br>
							<input type="submit" class="btn btn-lg btn-default transp-button" id="calc-button" data-loading-text="Loading...">Calculate seeding</button>
						</form>
					</p>
				</div>			  
			</div>
			<div class="mastfoot">
				<div class="inner">
					<p>Cover template for <a href="http://getbootstrap.com">Bootstrap</a>, by <a href="https://twitter.com/mdo">@mdo</a>.</p>
				</div>
			</div>

        </div>

    </div>

    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>
  </body>
</html>
