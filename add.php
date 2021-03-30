<?php include 'header.php'; ?>
<div id="main-content">
    <h2>Add New Record</h2>
    <form class="post-form" action="savedata.php" method="post">
        <div class="form-group">
            <label>Name</label>
            <input type="text" name="sname" />
        </div>
        <div class="form-group">
            <label>Address</label>
            <input type="text" name="saddress" />
        </div>
        <div class="form-group">
            <label>Class</label>
            <select name="sclass">
                <option value="" selected disabled>Select Class</option>
                <option value="BscIT">BscIT</option>
                <option value="BCA">BCA</option>
                <option value="BTECH">BTECH</option>
                <option value="Bsc">Bsc</option>


                <!-- <option value="<?php //echo $row['cname']; ?>"><?php //echo $row['cname']; ?></option> -->

            </select>
        </div>
        <div class="form-group">
            <label>Phone</label>
            <input type="text" name="sphone" />
        </div>
        <div class="form-group">
            <label>City</label>
            <input type="text" name="scity" />
        </div>
        <div class="file-upload">
            <input type="file" name="fileToUpload" id="fileToUpload" />
        </div>
        <input class="submit" type="submit" value="Save" />
    </form>
</div>
</div>
</body>

</html>