<?php

require_once('database.php');


// Get branches
$queryBranches = 'SELECT * FROM branch';
$statement = $db->prepare($queryBranches);
$statement->execute();
$branches = $statement->fetchAll();
$statement->closeCursor();

?>

<?php include 'includes/header.php'; ?>

<body>

<main class="containerTable2" style="height: 850px">

    <div class="allText">


        <header>
            <h1  class="my-heading">KFC Chicken</h1>
        </header>

        <div class="starter-template text-center">
            <h1 class="my-heading">KFC Restaurants, IRELAND</h1>
            <p class="my-heading" class="lead">Check for your Favorite<br>
                For reservation Contact us and enjoy of our offers </p> <br>
        </div>

    </div>



    <div class="box2">

        <div class="tabla-desktop2" >

            <table>
                <tr>
                    <th class="my-heading" >ID</th>
                    <th class="my-heading" >Name</th>
                    <th class="my-heading" >Manager</th>
                    <th class="my-heading" >Telephone</th>
                    <th class="my-heading" >Address</th>
                    <th class="my-heading" >Established</th>
                    <!--                      <th>Delete</th>-->
                </tr>

                <?php foreach ($branches as $branch) : ?>
                    <tr>
                        <td><?php echo $branch['Branch_Id']; ?></td>
                        <td><?php echo $branch['Branch_Name']; ?></td>
                        <td><?php echo $branch['Manager_Name']; ?></td>
                        <td><?php echo $branch['Telephone']; ?></td>
                        <td><?php echo $branch['Address_Line1'] . ', ' . $branch['Address_Line2'] . ', ' . $branch['Address_Line3'] . ', ' . $branch['Eircode']; ?></td>
                        <td><?php echo $branch['Established']; ?></td>
                        <!--                          <td>-->
                        <!--                              <form action="delete_branch.php" method="post">-->
                        <!--                                  <input type="hidden" name="branch_id"-->
                        <!--                                         value="--><?php //echo $branch['Branch_Id']; ?><!--">-->
                        <!--                                  <input type="submit" value="Delete">-->
                        <!--                              </form>-->
                        <!--                          </td>-->

                    </tr>
                <?php endforeach; ?>
            </table>

        </div>



    </div>


</main><!-- /.container -->

</body>


<?php include 'includes/footer.php'; ?>