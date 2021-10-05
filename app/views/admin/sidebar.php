<aside class = "adminleft">
	<div class="widget">
		<h3>Site Options</h3>
		<ul>
			<li><a href="<?php echo BASE_URL;?>/admin">Home</a></li>
			<li><a href="<?php echo BASE_URL;?>/login/logout">Logout</a></li>
		</ul>
	</div>
	<?php if(session::get("level") != 2 && session::get("level") != 3){?>
	<div class="widget">
		<h3>Manage User</h3>
		<ul>
			<li><a href="<?php echo BASE_URL;?>/user/makeUser">Make User</a></li>
			<li><a href="<?php echo BASE_URL;?>/user/listUser">Users List</a></li>
		</ul>
	</div>
	<?php } ?>
	<?php if(session::get("level") != 3){?>
	<div class="widget">
		<h3>Category Option</h3>
		<ul>
			<li><a href="<?php echo BASE_URL;?>/admin/addcategory">Add Category</a></li>
			<li><a href="<?php echo BASE_URL;?>/admin/categoryList">Category List</a></li>
		</ul>
	</div>
	<?php } ?>

	<div class="widget">
		<h3>Post Options</h3>
		<ul>
			<li><a href="<?php echo BASE_URL;?>/admin/addArticle">Add Article</a></li>
			<li><a href="<?php echo BASE_URL;?>/admin/articleList">Article List</a></li>
		</ul>
	</div>
</aside>
<article class="adminright">
