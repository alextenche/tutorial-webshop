<?php
$id = Url::getParam('id');

if(!empty($id)){

	$objCatalogue = new Catalogue();
	$product = $objCatalogue->getProduct($id);
	
	if(!empty($product)){

		$category = $objCatalogue->getCategory($product['category']);
		
		require_once('_header.php'); ?>

		<div class="panel panel-default">
			<div class="panel-heading panel-heading-green">
				<h3 class="panel-title">Catalogue - <?php echo $category['name']; ?></h3>
			</div>
			<div class="panel-body">
				<div class="row">

					<div class="col-md-3">
						<?php $image = !empty($product['image']) ? 'media/catalogue/' .$product['image'] : null;
						if(!empty($image)){
							$width = Helper::getImgSize($image, 0);
							$width = $width > 120 ? 120 : $width; ?>
							<img src="<?php echo $image; ?>" alt="<?php echo Helper::encodeHTML($product['name'], 1);?>" width="<?php echo $width; ?>" />
						<?php } ?>
					</div>
					<div class="col-md-9">
					<?php	
							
				echo "<h3>".$product['name']."</h3>";
				echo "<h4><strong>". Catalogue::$_currency . $product['price']."</strong></h4>";
				echo Basket::activeButton($product['id']);
				echo "</div>";
echo "</div>";

				echo "<div class=\"dev\">&#160;</div>"; 
				echo "<p>".Helper::encodeHTML($product['description'])."</p>";
				echo "<div class=\"dev br_td\">&#160;</div>"; 
				echo "<p><a class='btn btn-default' href=\"javascript:history.go(-1)\">Go back</a></p>";
			echo "</div>";
				echo "</div>";

				require_once('_footer.php');

			} else {
				require_once('error.php');
			}

		} else {
			require_once('error.php');
		}