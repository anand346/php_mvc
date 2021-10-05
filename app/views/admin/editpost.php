<script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
<h2>Update Article</h2>
<?php
foreach ($postbyid as $key => $value) {
?>
    <form action="<?php echo BASE_URL;?>/Admin/updatePost/<?php echo $value['id'];?>" method="POST">
        <table>
            <tr>
                <td>Title</td>
                <td><input id = "postinput" type="text" name="title" id="name" placeholder="Post Title..." value = "<?php echo $value['title'];?>"></td>
            </tr>
            <tr>
                <td>Content</td>
                <td>
                    <textarea style = "width:350px;" name="content" id="" cols="20" rows="5"><?php echo $value['content'];?></textarea>
                <script>
                        CKEDITOR.replace( 'content' );
                </script>
                </td>
            </tr>
            <tr>
                <td>Category</td>
                <td>
                    <select name="cat" class = "cat" id="">
                        <option value="0">Select One</option>
                        <?php
                        foreach ($catList as $key => $cat) { 
                        ?>
                        <option 
                        <?php
                        if($cat['id'] == $value['cat']){
                            echo "selected";
                        }
                        ?>
                        value="<?php echo $cat['id'];?>"><?php echo $cat['name'];?></option>
                        <?php
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td></td>
                <td><input class = "submitbtn" type="submit" name="submit" id="submit" value="Update Article"></td>
            </tr>
        </table>
    </form>
<?php
}
?>