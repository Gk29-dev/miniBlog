<?php include 'header.php'; ?>
    <div id="main-content">
      <div class="container">
        <div class="row">
            <div class="col-md-8">
                <!-- post-container -->
                <?php 
                   include 'config.php';
                   if(isset($_GET['search'])){
                      $search = $_GET['search'];
                       
                   }
                  ?>
                <div class="post-container">
                  <h2 class="page-heading">Search : <?php echo $search ?></h2>
                  
                  <?php 
                  //pagination code
                  $limit = 3;
                  if(isset($_GET['page_no'])){
                      $page = $_GET['page_no'];
                  }else{
                      $page = 1;
                  }
                  $offset = ($page - 1) * $limit;

                  $sql = "SELECT * FROM post
                  LEFT JOIN category ON post.category = category.category_id
                  LEFT JOIN user ON post.author = user.user_id 
                WHERE post.title LIKE '%{$search}%'
                  ORDER BY post.post_id DESC LIMIT {$offset}, {$limit}";

                  $result = mysqli_query($conn, $sql);
                  if(mysqli_num_rows($result) > 0){
                      while($row = mysqli_fetch_assoc($result)){
                  
                  ?>
                    <div class="post-content">
                        <div class="row">
                            <div class="col-md-4">
                                <a class="post-img" href="single.php?p_id=<?php echo $row['post_id']; ?>"><img src="admin/upload/<?php echo $row['post_img']; ?>" alt=""/></a>
                            </div>
                            <div class="col-md-8">
                                <div class="inner-content clearfix">
                                    <h3><a href='single.php?p_id=<?php echo $row['post_id']; ?>'><?php echo $row['title']; ?></a></h3>
                                    <div class="post-information">
                                        <span>
                                            <i class="fa fa-tags" aria-hidden="true"></i>
                                            <a href='category.php'><?php echo $row['category_name']; ?></a>
                                        </span>
                                        <span>
                                            <i class="fa fa-user" aria-hidden="true"></i>
                                            <a href='author.php'><?php echo $row['username']; ?></a>
                                        </span>
                                        <span>
                                            <i class="fa fa-calendar" aria-hidden="true"></i>
                                            <?php echo $row['post_date']; ?>
                                        </span>
                                    </div>
                                    <p class="description">
                                       <?php echo substr($row['description'],0,150); ?>
                                    </p>
                                    <a class='read-more pull-right' href='single.php?p_id=<?php echo $row['post_id']; ?>'>read more</a>
                                </div>
                            </div>
                        </div>
                    </div>
            
                    <?php 
                         }
                        }
                        else{
                            echo "<h2>No Record Found</h2>";
                        }
                    //pagination code
                    $sql1 = "SELECT * FROM post WHERE title LIKE '%$search%'";
                    $result1 = mysqli_query($conn, $sql1);
                    if(mysqli_num_rows($result1) >0){
                        $total_record = mysqli_num_rows($result1);
                        $total_pages = ceil($total_record/$limit);
                        echo "<ul class='pagination'>";
                    
                    if($page > 1){
                        $prev_page = ($page - 1);
                        echo "<li><a href='search.php?search='.$search.'&page_no='.$prev_page>Prev</a></li>";
                    }    
                        for($i =1;$i<=$page;$i++){
                           if($page == $i){
                               $active = "active";
                           } 
                           else{
                               $active = "";
                           }
                           echo "<li class = ".$active."><a href='search.php?search='.$search.'&page_no=$i'>$i</a></li>";
                        }

                    if($page < $total_pages){
                        $next_page = ($page + 1);
                        echo "<li><a href='search.php?search='.$search.'&page_no='.$next_page>Next</a></li>";
                    }    
                    }
                    
                    ?>
                    </ul>
                </div><!-- /post-container -->
            </div>
            <?php include 'sidebar.php'; ?>
        </div>
      </div>
    </div>
<?php include 'footer.php'; ?>
