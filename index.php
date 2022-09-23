    <?php include('partials-front/menu.php'); ?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">

            <form action="<?php echo SITEURL; ?>food-search.php" method="POST">
                <input type="search" name="search" placeholder="What do you desire ?" required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->

    <?php
        if(isset($_SESSION['order']))
        {
            echo $_SESSION['order'];
            unset($_SESSION['order']);
        }
    ?>

    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Restaurant Picker</h2>

            <?php
                    while($row=mysqli_fetch_assoc($res))
                    {?>

                        <a href="<?php echo SITEURL; ?>category-foods.php?category_id=<?php echo $row['id']; ?>">
                            <div class="box-3 float-container">

                                <img src="<?php echo SITEURL; ?>images/category/<?php echo $row['image_name']; ?>" alt="Image" class="img-responsive img-curve">
                                <h3 class="float-text text-white"><?php echo $row['title']; ?></h3>
                            </div>
                        </a>

                        <?php
                    }


            ?>


            <div class="clearfix"></div>
        </div>
        <p class="text-center">
            <a href="categories.php">See More</a>
        </p>
    </section>
    <!-- Categories Section Ends Here -->



    <!-- Food Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Foods</h2>

            <?php
            //SQL Query
            $sql2 = "SELECT * FROM table_food WHERE active='Yes' AND featured='Yes' LIMIT 6";

            //Execute the Query
            $res2 = mysqli_query($conn, $sql2);

            //Count Rows
            $count2 = mysqli_num_rows($res2);

            //food available or not
            if($count2>0)
            {
                //Food Available
                while($row=mysqli_fetch_assoc($res2))
                {
                    //Get all the values
                    $id = $row['id'];
                    $title = $row['title'];
                    $price = $row['price'];
                    $description = $row['description'];
                    $image_name = $row['image_name'];
                ?>

                    <div class="food-menu-box">
                        <div class="food-menu-img">
                            <?php
                                //Check whether image available or not
                                if($image_name=="")
                                {
                                    //Image not Available
                                    echo "<div class='error'>Image not available.</div>";
                                }
                                else
                                {
                                    //Image Available
                                    ?>
                                    <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name; ?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                                    <?php
                                }
                            ?>

                        </div>

                        <div class="food-menu-desc">
                            <h4><?php echo $title; ?></h4>
                            <p class="food-price">Tk. <?php echo $price; ?></p>
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
                //Food Not Available
                echo "<div class='error'>Food not available.</div>";
            }

            ?>





            <div class="clearfix"></div>



        </div>

        <p class="text-center">
            <a href="foods.php">See More</a>
        </p>
    </section>
    <!-- fOOD Menu Section Ends Here -->


    <?php include('partials-front/footer.php'); ?>
