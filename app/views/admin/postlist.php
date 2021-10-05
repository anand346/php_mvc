<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>
<h2>Article List</h2>
<?php
if(!empty($_GET['msg'])){
  $msg = unserialize(urldecode($_GET['msg']));
  foreach ($msg as $key => $value) {
    echo "<span style = 'color:green;'>{$value}</span>";    
  }
}
?>
<table id = "myTableId" class = "display" data-page-Length = "2">
<thead>
    <tr>
        <th width ="5%">S. no.</th>
        <th width ="20%">Title</th>
        <th width ="35%">Content</th>
        <th width ="15%">Category</th>
        <th width ="25%">Action</th>
    </tr>
</thead>
<tbody>
    <?php
    $i = 0;
    foreach ($listPost as $key => $value) {
        $i++;
    ?>
    <tr>
        <td><?php echo $i;?></td>
        <td><?php echo $value['title'];?></td>
        <td>
            <?php
                $text = $value['content'];
                if(strlen($text) > 40){
                    $text = substr($text,0,40);
                    echo $text;
                }else{
                    echo $text;
                }            
            ?>
        </td>
        <td>
            <?php
                foreach ($catList as $key => $cat) {
                    if($cat['id'] == $value['cat']){
                        echo $cat['name'];
                    }
                }
            ?>
        </td>
        <?php if(session::get("level") == 1){?>
        <td>
            <a href="<?php echo BASE_URL;?>/admin/editArticle/<?php echo $value['id'];?>">Edit</a> ||
            <a onclick = "return confirm('Are you sure want to delete this category');" href="<?php echo BASE_URL;?>/admin/deleteArticle/<?php echo $value['id'];?>">Delete</a>
        </td>
        <?php }else{?>
        <td>Not permitted</td>
        <?php } ?>
    </tr>
    <?php
    }
    ?>
</tbody>
</table>
<script>
$(document).ready( function () {
    $('#myTableId').DataTable();
} );
</script>