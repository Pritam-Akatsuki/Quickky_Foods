<?php include('partials-front/menu.php'); ?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            
            <form action="<?php echo SITEURL; ?>food-search.php" method="POST">
                <input type="search" name="search" placeholder="Search for Food.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center text-white">Food Menu</h2>

            <?php
            //display foods that aare active
            $sql ="SELECT * FROM tbl_food WHERE active ='Yes'";

            //execue the query
            $res=mysqli_query($conn, $sql);

            // count rows
            $count = mysqli_num_rows($res);

            //count whethr the food are availabel or not
            if($count>0)
            {
                //foods availabel
                while($row=mysqli_fetch_assoc($res))
                {
                    //get the value
                    $id = $row['id'];
                    $title = $row['title'];
                    $description = $row['description'];
                    $price = $row['price'];
                    $image_name = $row['image_name'];
                    ?>

                        <div class="food-menu-box"data-aos="flip-left">
                            <div class="food-menu-img">
                                <?php
                                //check wether image availabel or not
                                if($image_name=="")
                                {
                                    //image not available
                                    echo "<div class='error'>Image Not Available.</div>";
                                }
                                else
                                {
                                    //image available
                                    ?>

                                    <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name; ?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">

                                    <?php
                                }
                                ?>
                                
                            </div>

                            <div class="food-menu-desc">
                                <h4><?php echo $title; ?></h4>
                                <p class="food-price"> ₹ <?php echo $price; ?></p>
                                <p class="food-detail">
                                <?php echo $description; ?>
                                </p>
                                <br>

                                <a href="<?php echo SITEURL; ?>order.php?food_id=<?php echo $id; ?>" class="btn btn-primary">Order Now</a>
                            </div>
                        </div>

                    <?php
                    
                }
            }
            else
            {
                //food not availabel
                echo "<div class='error'>Food Not Available.</div>";
            }
            ?>
            
            
            

            <div class="clearfix"></div>

            

        </div>

        

    </section>
    <!-- fOOD Menu Section Ends Here -->
    <!-- WP pop up message  ( Live chat)-->
    <!-- <script src="https://apps.elfsight.com/p/platform.js" defer></script>
    <div class="elfsight-app-bc58d730-8531-41e1-88fa-aec57d2874a9"></div> -->

    <!-- WP pop up message  ( Live chat)-->
    <script src="https://apps.elfsight.com/p/platform.js" defer></script>
    <div class="elfsight-app-a39a3d73-fd94-4832-bdea-ec3ca421de35"></div>

     <!-- live chat end  -->

     <!-- live chat end  -->

    <?php include('partials-front/footer.php'); ?>