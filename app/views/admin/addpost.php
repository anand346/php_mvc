<script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
<h2>Add New Article</h2>
<?php
if(isset($postErrors)){
    echo "<div style = 'color:red;border:1px solid red;padding:5px 10px;margin:5px;'>";
    foreach ($postErrors as $key => $value) {
        switch ($key) {
            case 'title':
                foreach ($value as $val) {
                    echo "Title : ".$val."<br>";
                }
                break;
            case 'content':
                foreach ($value as $val) {
                    echo "Content : ".$val."<br>";
                }
                break;
            case 'cat':
                foreach ($value as $val) {
                    echo "Category : ".$val."<br>";
                }
                break;
            default:
                # code...
                break;
        }
    }
    echo "</div>";
}
?>

    <form action="<?php echo BASE_URL;?>/Admin/addNewPost" method="POST">
        <table>
            <tr>
                <td>Title</td>
                <td><input id = "postinput" type="text" name="title" id="name" placeholder="Post Title..."></td>
            </tr>
            <tr>
                <td>Content</td>
                <td>
                    <textarea style = "width:350px;" name="content" id="" cols="20" rows="5"></textarea>
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
                        <option value="<?php echo $cat['id'];?>"><?php echo $cat['name'];?></option>
                        <?php
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td></td>
                <td><input class = "submitbtn" type="submit" name="submit" id="submit" value="Save Article"></td>
            </tr>
        </table>
    </form>
