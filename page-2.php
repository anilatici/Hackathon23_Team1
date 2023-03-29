<?php

require_once('database.php');


// Get branches
$queryBranches = 'SELECT * FROM kfc_menu';
$statement = $db->prepare($queryBranches);
$statement->execute();
$branches = $statement->fetchAll();
$statement->closeCursor();

?>

<?php include 'includes/header.php'; ?>

<body >

    <main class="containerTable2" style="height: 1100px">

        <div class="allText">


            <header>
                <h1  class="my-heading">KFC Chicken</h1>
            </header>

            <div class="starter-template text-center">
                <h1 class="my-heading">KFC Restaurants, IRELAND</h1>
                <p class="my-heading" class="lead">You can consult here for Discounts<br>
                    For reservation Contact us and enjoy of our offers </p> <br>
            </div>

        </div>


        <div class="box">

        <div class="tabla-desktop" style="padding-left: 20%">

            <table>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Calories</th>
                    <th>Allergens</th>

                </tr>

                <?php foreach ($branches as $branch) : ?>
                    <tr>
                        <td><?php echo $branch['item_id']; ?></td>
                        <td><?php echo $branch['item_name']; ?></td>
                        <td><?php echo $branch['category']; ?></td>
                        <td><?php echo $branch['price']; ?></td>
                        <td><?php echo $branch['calories']; ?></td>
                        <td><?php echo $branch['allergens']; ?></td>


                    </tr>
                <?php endforeach; ?>
            </table>

        </div>

        <div class="calculations">

            <form action="display_discount.php" method="post" >

                <div id="data">
                    <label>Product Name:</label>
                    <input type="text" name="product_name" required><br>

                    <label>List Price:</label>
                    <input type="text" name="list_price" required><br>

                    <label>Discount Percent:</label>
                    <input type="text" name="discount_percent" required><span>%</span><br>

                    <label>How many People:</label>
                    <input type="text" name="description" required><br>

                    <label>Quantity Menus:</label>
                    <input type="text" name="quantity" required><br>



                </div>

                <div id="buttons">
                    <label>&nbsp;</label>
                    <input type="submit" value="Calculate Discount"><br>
                </div>

            </form>



        </div>


    </div>


    </main><!-- /.container -->

</body>

<?php include 'includes/footer.php'; ?>