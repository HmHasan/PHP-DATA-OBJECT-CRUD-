<?php 
spl_autoload_register(function($class){
$path = __DIR__."/lib/".$class.".php";
if(file_exists($path))
{
    include $path;
}
});
?>
<?php include('inc/header.php') ?>
<?php 


$user = new user;

if(isset($_POST['submit']) && $_SERVER['REQUEST_METHOD']=="POST")
{
    $insert = $user->insertdata($_POST);
}

?>
<div class="card-boy">
    <form action="" method="post" style="margin: auto; width:600px;padding:30px 0px;">
    <?php if(isset($insert)) echo $insert; ?>
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name">
        </div>
        <div class="form-group">
            <label for="name">Email</label>
            <input type="email" class="form-control" name="email">
        </div>
        <div class="form-group">

            <input type="submit" class="btn btn-success" name="submit">
        </div>
    </form>
</div>
<?php include('inc/footer.php') ?>