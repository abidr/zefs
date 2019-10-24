<!DOCTYPE html>

<html>

    <head>

        <title><?php echo $site_config->SiteTitle; ?></title>
        <link rel="shortcut icon" href="<?php echo THEMEPATH; ?>/img/folder.png">

        <!-- STYLES -->
		<link href="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">
		<!-- Material Design Bootstrap -->
		<link href="//cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.10/css/mdb.min.css" rel="stylesheet">

        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/v/bs4/dt-1.10.18/r-2.2.2/datatables.min.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo THEMEPATH; ?>/css/style.css">

        <!-- SCRIPTS -->
        <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.min.js"></script>
		<!-- MDB core JavaScript -->
		<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.10/js/mdb.min.js"></script>
		
 
		<script type="text/javascript" src="//cdn.datatables.net/v/bs4/dt-1.10.18/r-2.2.2/datatables.min.js"></script>
		<script type="text/javascript" src="//cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
        <script type="text/javascript" src="<?php echo THEMEPATH; ?>/js/directorylister.js"></script>
		<script type="text/javascript">
			$(document).ready(function(){
			  $("#searchInput").on("keyup", function() {
				var value = $(this).val().toLowerCase();
				$("#listFiles tr").filter(function() {
				  $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
				});
			  });

			});
		</script>
		<script>
			$(document).ready( function () {
			    $('.rwd-table').DataTable();
    			$("#search-bdix").appendTo("#DataTables_Table_0_filter");
    			$("#DataTables_Table_0_filter label input").appendTo("#search-bdix");
    			$("#search-bdix input").attr("placeholder", "Type here to search");
    			$("#search-bdix input").removeClass("form-control-sm");
			} );
		</script>

        <!-- FONTS -->
		<link href="//fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
		
        <!-- META -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="utf-8">
    </head>

    <body>
		<!-- Modal -->
		<div class="modal fade" id="basicExampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
			  <div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Check BDIX Speed</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
			  </div>
			  <div class="modal-body">
				<iframe width="100%" height="650px" frameborder="0" src="<?php echo $site_config->speedtestURL; ?>"></iframe>
			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			  </div>
			</div>
		  </div>
		</div>
		<!--Navbar-->
		<nav class="navbar navbar-expand-lg navbar-dark bdixit-color scrolling-navbar fixed-top">

			<!-- Navbar brand -->
			<p class="navbar-brand">
			<a href="<?php echo home_base_url(); ?>"><?php echo $site_config->SiteTitle; ?></a>
			| 
			<a href="https://abidr.github.io/zefs"><small>Powered By ZeFS</small></a>
			</p>

			<!-- Collapse button -->
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav" aria-controls="basicExampleNav"
				aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<!-- Collapsible content -->
			<div class="collapse navbar-collapse" id="basicExampleNav">

				<!-- Links -->
				<ul class="navbar-nav ml-auto">
					<li class="nav-item active">
						<a class="nav-link" href="index.php">Home
							<span class="sr-only">(current)</span>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?php echo home_base_url(); ?>?dir=Files/Movies">Movies</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?php echo home_base_url(); ?>?dir=Files/TV%20Series">TV Series</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?php echo home_base_url(); ?>?dir=Files/Games">Games</a>
					</li>
					<button type="button" data-toggle="modal" data-target="#basicExampleModal" class="btn btn-primary btn-md my-2 my-sm-0 ml-3">Check BDIX Speed</button>
					
				</ul>
				<!-- Links -->
			</div>
			<!-- Collapsible content -->

		</nav>
		<!--/.Navbar-->
		<div class="container">
			<div class="row block-row text-center">
				<div class="col">
					<a href="<?php echo home_base_url(); ?>?dir=Files/Movies">
						<div class="button-block primary-color">
							<h2>Movies</h2>
						</div>
					</a>
				</div>
				<div class="col">
					<a href="<?php echo home_base_url(); ?>?dir=Files/TV%20Series">
						<div class="button-block secondary-color">
							<h2>TV Series</h2>
						</div>
					</a>
				</div>
				<div class="col">
					<a href="<?php echo home_base_url(); ?>?dir=Files/Games">
						<div class="button-block danger-color">
							<h2>Games</h2>
						</div>
					</a>
				</div>
			</div>
		</div>
        <div id="page-navbar" class="">
            <div class="container">
				<?php $breadcrumbs = $lister->listBreadcrumbs(); ?>

				<ol class="breadcrumb">
					<?php foreach($breadcrumbs as $breadcrumb): ?>
						<?php if ($breadcrumb != end($breadcrumbs)): ?>
								<li class="breadcrumb-item"><a href="<?php echo $breadcrumb['link']; ?>"><?php echo $breadcrumb['text']; ?></a></li>
						<?php else: ?>
							<li class="breadcrumb-item active"><?php echo $breadcrumb['text']; ?></li>							
						<?php endif; ?>
					<?php endforeach; ?>
				</ol>
            </div>
        </div>
        <div id="page-content" class="container">
			<?php

			function strposa($haystack, $needle, $offset=0) {
				if(!is_array($needle)) $needle = array($needle);
				foreach($needle as $query) {
					if(strpos($haystack, $query, $offset) !== false) return true; // stop on first true result
				}
				return false;
			}

			function checkmovie($dirArray){ 
				foreach($dirArray as $name => $fileInfo):
				$video_filetypes = array('avi', 'flv', 'mkv', 'mov', 'mp4', 'mpg', 'ogv', 'webm', 'wmv', 'swf', 'srt');
				if (strposa($name, $video_filetypes, 1)) {
					return 'true';
				}
				endforeach; 
			}

			if(checkmovie($dirArray) == 'true'): ?>
			<div class="movie-database">
				<?php 
				$api_url = 'http://www.omdbapi.com/?t='. $breadcrumb['text'] .'&apikey=' . $site_config->omdbAPI;
				$api_url_str = str_replace(' ', '%20', $api_url);
				$api_data_json = file_get_contents($api_url_str);
				$api_data = json_decode($api_data_json);
				$api_ratings = $api_data->Ratings;
				?>
				<div class="row">
					<div class="col-12 col-md-4 text-center">
						<img class="cover" src="<?php echo $api_data->Poster; ?>" alt="">
					</div>
					<div class="col-12 col-md-8">
						<div class="row">
							<div class="col movie-info-title">
								<h4><?php echo $api_data->Title; ?></h4>
								<h6><?php echo $api_data->Genre; ?></h6>
								<h6><?php echo $api_data->Language; ?> | <?php echo $api_data->Rated; ?> | <?php echo $api_data->Runtime; ?></h6>
							</div>
						</div>
						<hr>
						<div class="row">
							<div class="col">
								<div class="rating-icon">
									<a target="_blank" href="https://www.imdb.com/title/<?php echo $api_data->imdbID; ?>">
										<img src="<?php echo $lister->getThemePath(); ?>/img/imdb.png" alt="">
										<?php echo $api_data->imdbRating; ?> <small>(<?php echo $api_data->imdbVotes; ?> votes)</small>
									</a>
								</div>
							</div>
							<div class="col">
								<div class="rating-icon">
									<img src="<?php echo $lister->getThemePath(); ?>/img/rotten_tomatoes.png" alt="">
									<?php echo $api_ratings[1]->Value; ?>
								</div>
							</div>
							<div class="col">
								<div class="rating-icon">
									<img src="<?php echo $lister->getThemePath(); ?>/img/metacritic.png" alt="">
									<?php echo $api_ratings[2]->Value; ?>
								</div>
							</div>
						</div>
						<hr>
						<div class="row">
							<div class="col">
								<div class="rating-caption">
									<p><span>Released: </span><?php echo $api_data->Released; ?></p>
									<p><span>Director: </span><?php echo $api_data->Director; ?></p>
									<p><span>Writer: </span><?php echo $api_data->Writer; ?></p>
									<p><span>Actors: </span><?php echo $api_data->Actors; ?></p>
									<p><span>Plot: </span><?php echo $api_data->Plot; ?></p>
								</div>
							</div>
						</div>
					</div>
				</div>				
			</div>
			<?php endif; ?>

			
			<div class="row">
				<div class="col col-lg-5 col-md-5 col-sm-12 col-12">
					<div id="search-bdix" class="input-group" style="margin-bottom:10px;">
						<div class="input-group-prepend">
							<span class="input-group-text" id="basic-search"><i class="fa fa-search"></i></span>
						</div>
					</div>
				</div>
			</div>

            <?php if($lister->getSystemMessages()): ?>
                <?php foreach ($lister->getSystemMessages() as $message): ?>
                    <div class="alert alert-<?php echo $message['type']; ?>">
                        <?php echo $message['text']; ?>
                        <a class="close" data-dismiss="alert" href="#">&times;</a>
                    </div>
                <?php endforeach; ?>
			<?php endif; ?>
			
			<table class="rwd-table">
			  <thead>
				<tr>
				  <th scope="col">File</th>
				  <th scope="col">Size</th>
				  <th scope="col" class="no-mob">Date</th>
				</tr>
			  </thead>
			  <tbody id="listFiles">
			  <?php foreach($dirArray as $name => $fileInfo): ?>
                    <tr data-name="<?php echo $name; ?>" data-href="<?php echo $fileInfo['url_path']; ?>">
                        <td class="bdixit-file-name" data-th="File">
							<a href="<?php echo $fileInfo['url_path']; ?>" class="clearfix" data-name="<?php echo $name; ?>">
								<i class="fa <?php echo $fileInfo['icon_class']; ?> fa-fw"></i>
                                <?php echo $name; ?>
							</a>
						</td>
                        <td data-th="Size"><?php echo $fileInfo['file_size']; ?></td>
                        <td class="no-mob" data-th="Date"><?php echo $fileInfo['mod_time']; ?></td>
                    </tr>
                <?php endforeach; ?>
			  </tbody>
			</table>
        </div>

        <br /><!-- Footer -->
		<br /><!-- Footer -->
		<br /><!-- Footer -->
		<br /><!-- Footer -->
		<br /><!-- Footer -->
		<footer class="page-footer font-small special-color-dark">

			<!-- Copyright -->
			<div class="footer-copyright text-center py-3">&copy; <?php echo date("Y"); ?> <?php echo $site_config->SiteTitle; ?>, Powered By ZeFS</a>
			</div>
			<!-- Copyright -->

		</footer>
		<!-- Footer -->

    </body>

</html>
