<?php
spl_autoload_register(function ($class) {
    $path = __DIR__ . "/lib/" . $class . ".php";
    if (file_exists($path)) {
        include $path;
    }
});

$user = new user;

if (isset($_GET['action']) && $_GET['action']=='edit') {
    $id = $_GET['id'];
    $result = $user->readbyid($id);

}

?>
<?php include('inc/header.php') ?>
<div class="card-boy">
    <?php 
    
    if (isset($_POST['update']) && $_SERVER['REQUEST_METHOD'] == "POST") {

        $update = $user->userupdate($_POST);
    
    
   
    
    }
    
    
    
    ?>
    <form action="" method="post" style="margin: auto; width:600px">
    <?php 
    
    
    if(isset($update))
    {
        echo $update;
    }
    
    ?>
        <div class="form-group">
            <input type="hidden" name="id" value="<?php echo $result['id'];?>">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" value="<?php echo $result['name']; ?>">
        </div>
        <div class="form-group">
            <label for="name">Email</label>
            <input type="email" class="form-control" name="email" value="<?php echo $result['email']; ?>">
        </div>
        <div class="form-group">

            <input type="submit" class="btn btn-success" name="update" value="update">
        </div>
    </form>
</div>
<?php include('inc/footer.php') ?>