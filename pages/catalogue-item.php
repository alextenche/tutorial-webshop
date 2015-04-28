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
					</div><!-- end col-md-3 -->

					<div class="col-md-9">
						<h3><?php echo $product['name']; ?></h3>	
						<h4><strong><?php echo Catalogue::$_currency . $product['price']; ?></strong></h4>
						<?php echo Basket::activeButton($product['id']); ?>
					</div><!-- end col-md-9 -->

				</div><!-- end row -->

				<div class="dev">&#160;</div>
				<p><?php echo Helper::encodeHTML($product['description']); ?></p>
				<div class="dev br_td">&#160;</div> 
				<p><a class='btn btn-default' href="javascript:history.go(-1)">Go back</a></p>

			</div><!-- end panel-body -->

		</div><!-- end panel panel-default -->

		<?php require_once('_footer.php');

	} else {
		require_once('error.php');
	}
} else {
	require_once('error.php');
}