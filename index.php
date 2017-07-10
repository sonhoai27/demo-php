<html lang="vi">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>Watches For Men and Women, Handbags, Crystal, Pens - Jomashop</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" media="all" href="./public/styles/css/main.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="./public/styles/js/script.js"></script>
    <link href="./public/styles/css/font-awesome.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans:400,400i,700,700i&amp;subset=vietnamese" rel="stylesheet">
</head>
<body>
	<div class="menu-header">
		<?php
		require_once('./theme/header/menu.php');
		require_once('./theme/header/notify.php');
		?>
	</div>
	<?php
		$controller_path = "controllers";
    	$action = isset($_GET['action']) ? $_GET['action']:"";
    	require_once ('./controllers/home.php');
    	require_once('./controllers/sales.php');
        require_once('./controllers/watches.php');
        require_once('./controllers/mens.php');
        require_once('./controllers/ladies.php');
        if($action != ""){
            if(!file_exists("./$controller_path/$action.php")){
                echo "<h1>./$controller_path/$action</h1>
                      <br>ERROR 404";
            }
            if($action == "sales"){
                $main = new Sales();
                $main->showSales();
            }
            if($action == "watches"){
                $main = new Watch();
                $main->showWatches();
            }
            if($action == "mens"){
                require_once ('./theme/mens/title_men.php');
                $main = new Men();
                $main->showMens();
            }
            if($action == "ladies"){
                require_once ('./theme/ladies/title_ladies.php');
                $main = new Lady();
                $main->showLadies();
            }
            if($action == "product_detail"){
                require_once ('./controllers/product_detail.php');
                $main = new ProductDetail();
                $main->ShowProductDetail();
            }
        }else{
            $main = new ShowHomePage();
            $main->showHomePage();
        }
	?>
    <div class="social-footer">
        <?php
            require_once ('./theme/social/social_content.php');
        ?>
    </div>
	<div class="footer-page">
		<?php
		require_once ('./theme/footer/footer_page.php');
		?>
	</div>
	<div class="footer-info">
		<?php
		require_once ('./theme/footer/footer_info.php');
		?>
	</div>
</body>
</html>