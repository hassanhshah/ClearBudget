<?php
// Show PHP errors
ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);

require_once 'classes/user.php';

$objUser = new User();
// GET
if(isset($_GET['edit_id'])){
    $id = $_GET['edit_id'];
    $stmt = $objUser->runQuery("SELECT * FROM purchases WHERE id=:id");
    $stmt->execute(array(":id" => $id));
    $rowUser = $stmt->fetch(PDO::FETCH_ASSOC);
}else{
  $id = null;
  $rowUser = null;
}

// POST
if(isset($_POST['btn_save'])){
  $description   = strip_tags($_POST['description']);
  $cost  = strip_tags($_POST['cost']);

  try{
     if($id != null){
       if($objUser->updatepurchase($description, $cost, $id)){
         $objUser->redirect('purchaseindex.php?updated');
       }
     }else{
       if($objUser->insertpurchase($description, $cost)){
         $objUser->redirect('purchaseindex.php?inserted');
       }else{
         $objUser->redirect('purchaseindex.php?error');
       }
     }
  }catch(PDOException $e){
    echo $e->getMessage();
  }
}

?>
<!doctype html>
<html lang="en">
    <head>
        <!-- Head metas, css, and title -->
        <?php require_once 'includes/head.php'; ?>
    </head>
    <body style = "background-color: #15b946">
        <!-- Header banner -->
        <?php require_once 'includes/header.php'; ?>
        <div class="container-fluid">
            <div class="row">
                <!-- Sidebar menu -->
                <?php require_once 'includes/sidebarpurchase.php'; ?>
                <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                  <h1 style="margin-top: 10px">Add / Edit Purchases</h1>
                  <form  method="post">
                    <div class="form-group">
                        <label for="name">Description (Include Name) </label>
                        <input  class="form-control" type="text" name="description" id="description" value="<?php if(isset($rowUser['description'])){  print($rowUser['description']);  }?>" required maxlength="100">
                    </div>
                    <div class="form-group">
                        <label for="email">Cost </label>
                        <input  class="form-control" type="text" name="cost" id="cost" value="<?php if(isset($rowUser['cost'])){  print($rowUser['cost']); }?>" required maxlength="100">
                    </div>
                    <input class="btn btn-primary mb-2" type="submit" name="btn_save" value="Save">
                  </form>
                </main>
            </div>
        </div>
        <!-- Footer scripts, and functions -->
        <?php require_once 'includes/footer.php'; ?>
      </body>
</html>
