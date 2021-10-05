<div class="searchoption">
    <div class="menu"><a href="<?php echo BASE_URL ;?>">Home</a></div>
    <div class="search">
        <form action="<?php echo BASE_URL ;?>/index/search" method = "POST">
            <input type="text" name="keyword" id="" placeholder = "search...">
            <select name="cat" id="" class="catsearch">
                <option value = "0">Select One</option>
                <?php
                foreach($catList as $key => $value){
                ?>
                <option value="<?php echo $value['id'];?>"><?php echo $value['name'];?></option>
                <?php } ?>
            </select>
            <button class="submitbtn" type = "submit">Search</button>
        </form>
    </div>
</div>