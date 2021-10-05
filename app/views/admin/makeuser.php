<h2>Add New User</h2>
    <form action="<?php echo BASE_URL;?>/user/addNewUser" method="POST">
        <table>
            <tr>
                <td>Username</td>
                <td><input type="text" name="username" id="name" placeholder="User name..."></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="text" name="password" id="title" placeholder="User password..."></td>
            </tr>
            <tr>
                <td>Roles</td>
                <td>
                    <select name="level" id="" class = "cat">
                        <option value="0">Select One</option>
                        <option value="2">Author</option>
                        <option value="3">Contributor</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="submit" id="submit" value="Make User"></td>
            </tr>
        </table>
    </form>
