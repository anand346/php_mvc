    <h2>Add Category</h2>
    <form action="<?php echo BASE_URL;?>/Admin/insertCategory" method="POST">
        <table>
            <tr>
                <td>Category Name</td>
                <td><input type="text" name="name" id="name" placeholder="category name..."></td>
            </tr>
            <tr>
                <td>Category Title</td>
                <td><input type="text" name="title" id="title" placeholder="category title..."></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="submit" id="submit" value="save"></td>
            </tr>
        </table>
    </form>
