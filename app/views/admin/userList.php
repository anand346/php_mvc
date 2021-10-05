<h2>Users List</h2>
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
    <th width = "20%">S. no.</th>
    <th width = "30%">Username</th>
    <th width = "30%">Level</th>
    <th width = "20%">Action</th>
  </tr>
<?php
$i = 0;
foreach($users as $key=>$value){
    $i++;
?>
  <tr>
    <td><?php echo $i;?></td>
    <td><?php echo $value['username'];?></td>
    <td>
        <?php
            if($value['level'] == 1){
                echo "admin";
            }elseif($value['level'] == 2){
                echo "author";
            }else{
                echo "contributor";
            }
        ?>
    </td>
    <td>
        <a onclick = "return confirm('Are you sure want to delete this category');" href="<?php echo BASE_URL;?>/user/deleteUser/<?php echo $value['id'];?>">Delete</a>
    </td>
  </tr>
<?php
}
?>
</table>