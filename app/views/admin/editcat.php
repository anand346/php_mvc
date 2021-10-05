<h2>Update Category</h2>
<?php

foreach($catById as $key => $value){
?>
    <form action="<?php echo BASE_URL;?>/Admin/updateCat/<?php echo $value['id'];?>" method="POST">
        <table>
            <tr>
                <td>Category Name</td>
                <td><input type="text" name="name" id="name" placeholder="category name..." value = "<?php echo $value['name'];?>"></td>
            </tr>
            <tr>
                <td>Category Title</td>
                <td><input type="text" name="title" id="title" placeholder="category title..." value = "<?php echo $value['title'];?>"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="submit" id="submit" value="Update"></td>
            </tr>
        </table>
    </form>
<?php } ?>