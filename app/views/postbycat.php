<article class = "postcontent">

<?php
foreach($getcat as $key => $value){
?>
	<div class="post">
        <div class="title">
            <h2><?php echo $value['title'];?></h2>
            <p>Category : <?php echo $value['name'];?></p>
        </div>
		<?php 
		$text = $value['content'];
		if(strlen($text) > 200){
			$text = substr($text,0,200);
			echo $text;
		}else{
			echo $text;
		}?>
		<div class="readmore"><a href="<?php echo BASE_URL; ?>/index/postDetails/<?php echo $value['id']; ?>">read more</a></div>
	</div>

	<?php
	}
	
	?>

</article>


 


