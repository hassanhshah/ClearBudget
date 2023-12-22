<?php
// Show PHP errors
ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);

require_once 'classes/user.php';

$objUser = new User();

// GET

?>
<!doctype html>
<html lang="en">
    <head>
        <!-- Head metas, css, and title -->
        <?php require_once 'includes/head.php'; ?>
    </head>
    <body style = "background-color: #15b946">
        <!-- Header banner -->
        <?php require_once 'includes/headeraccount.php'; ?>
        <div class="container-fluid">
            <div class="row">
                <!-- Sidebar menu -->
                <?php require_once 'includes/sidebaraccount.php'; ?>
                <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                    <h1 style="margin-top: 10px">Purchases</h1>
                      <div class="table-responsive">
                        <table class="table table-dark table-hover table-sm">
                            <thead>
                              <tr>
                                <th>Purchase ID</th>
                                <th>Description (Include Name)</th>
                                <th>Cost</th>
                                <th></th>
                              </tr>
                            </thead>
                            <?php
                              $query = "SELECT * FROM purchases";
                              $stmt = $objUser->runQuery($query);
                              $stmt->execute();
                            ?>
                            <tbody>
                                <?php if($stmt->rowCount() > 0){
                                  while($rowUser = $stmt->fetch(PDO::FETCH_ASSOC)){
                                 ?>
                                 <tr>
                                    <td><?php print($rowUser['id']); ?></td>

                                    <td>
                                      <?php print($rowUser['description']); ?>
                                    </td>

                                    <td><?php print($rowUser['cost']); ?></td>

                                 </tr>


                          <?php } } ?>
                            </tbody>
                        </table>

                      </div>


                </main>
            </div>
        </div>
        <!-- Footer scripts, and functions -->
        <?php require_once 'includes/footer.php'; ?>

        <!-- Custom scripts -->
    </body>
</html>
