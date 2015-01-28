<?php
$cat = Url::getParam('category');

if(empty($cat)) {
	require_once("error.php");
} else {

	$objCatalogue = new Catalogue();
	$category = $objCatalogue->getCategory($cat);
	
	if(empty($category)) {
		require_once("error.php");
	} else {

		$rows = $objCatalogue->getProducts($cat);
		
		// instantiate paging class 
		$objPaging = new Paging($rows, 3);
		$rows = $objPaging->getRecords();
		
		require_once("_header.php");?>

		<div class="panel panel-default">
			<div class="panel-heading panel-heading-green">
				<h3 class="panel-title">Catalogue - <?php echo $category['name']; ?></h3>
			</div>
			<div class="panel-body">

				<?php if(!empty($rows)) { ?>
				<?php foreach($rows as $row) : ?>

					<div class="row">

						<div class="col-md-3">
							<?php
							$image = !empty($row['image']) ? $objCatalogue->_path.$row['image'] : $objCatalogue->_path.'unavailable.png';

							$width = Helper::getImgSize($image, 0);
							$width = $width > 120 ? 120 : $width;			
							?>

							<a href="?page=catalogue-item&amp;category=<?php echo $category['id']; ?>&amp;id=<?php echo $row['id']; ?>"><img src="<?php echo $image; ?>" alt="<?php echo Helper::encodeHtml($row['name'], 1); ?>" width="<?php echo $width; ?>" /></a>
						</div>

						<div class="col-md-9">
							<h4><a href="?page=catalogue-item&amp;category=<?php echo $category['id']; ?>&amp;id=<?php echo $row['id']; ?>"><?php echo Helper::encodeHtml($row['name'], 1); ?></a></h4>
							<h4>Price: <?php echo Catalogue::$_currency; echo number_format($row['price'], 2); ?></h4>
							<p><?php echo Helper::shortenString(Helper::encodeHtml($row['description'])); ?></p>
							<p><?php echo Basket::activeButton($row['id']); ?></p>
						</div>

					</div>
					<hr>

				<?php endforeach; ?>

				<!-- pagination -->
				<div class="row">
    				<div class="col-md-8 col-md-offset-4">
    					<?php echo $objPaging->getPaging();?>

    				</div>
				</div>



			
				
			
			</div>

			

		<?php } else {
			?>
			<p>There are no products in this category.</p>
			<?php		
		}
		require_once("_footer.php");
		
	}
}
?>