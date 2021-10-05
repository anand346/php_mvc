<h2>Category List</h2>
<?php
if(!empty($_GET['msg'])){
  $msg = unserialize(urldecode($_GET['msg']));
  foreach ($msg as $key => $value) {
    echo "<span style = 'color:green;'>{$value}</span>";    
  }
}
?>
<table class = "tblone">
  <tr>
    <th>S. no.</th>
    <th>Category Name</th>
    <th>Category Title</th>
    <th>Action</th>
  </tr>
<?php
$i = 0;
foreach($cat as $key=>$value){
    $i++;
?>
  <tr>
    <td><?php echo $i;?></td>
    <td><?php echo $value['name'];?></td>
    <td><?php echo $value['title'];?></td>
    <?php if(session::get("level") == 1){?>
    <td>
        <a href="<?php echo BASE_URL;?>/admin/editCategory/<?php echo $value['id'];?>">Edit</a> ||
        <a onclick = "return confirm('Are you sure want to delete this category');" href="<?php echo BASE_URL;?>/admin/deleteCategory/<?php echo $value['id'];?>">Delete</a>
    </td>
    <?php }else{?>
    <td>Not Permitted</td>
    <?php } ?>
  </tr>
<?php
}
?>
</table>