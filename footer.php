<div id ="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
            <?php 
                include 'config.php';

                $sql1 = "SELECT * FROM settings";
                $result1 = mysqli_query($conn, $sql1);
                if(mysqli_num_rows($result1)>0){
                    while($row1 = mysqli_fetch_assoc($result1)){ 
            ?>
                <span><?php echo $row1['footer']; ?></span>
            <?php 
                 }
            }
            ?>    
            </div>
        </div>
    </div>
</div>
</body>
</html>
