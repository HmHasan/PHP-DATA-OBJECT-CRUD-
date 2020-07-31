<?php 
spl_autoload_register(function($class){
$path = __DIR__."/lib/".$class.".php";
if(file_exists($path))
{
    include $path;
}
});
$user = new user;

?>
<?php include('inc/header.php'); 


?>

<table class="table table-stripped table-bordered">
    <tr>
        <td>
        <?php 

if(isset($delete))
{
    echo $delete;
}


?>
        </td>
    </tr>
    <tr>
        <th>SL</th>
        <th>Name</th>
        <th>Email</th>
        <th>Action</th>
    </tr>
    <?php 
    $i = 0;
    foreach($user->show() as $value)
    {
        $i++;
    
    
    ?>
    <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo $value['name']; ?></td>
        <td><?php echo $value['email']; ?></td>
        <td><a class="btn btn-primary" href="update.php?action=edit&id=<?php echo $value['id']; ?>">View</a> <a onclick="return confirm('Are You Sure About This?');" class="btn btn-danger" href="index.php?action=delete&id=<?php echo $value['id']; ?>" >Delete</a></td>
    </tr>
    <?php } ?>
</table>
<?php include('inc/footer.php'); ?>
<?php 

if(isset($_GET['action']) && $_GET['action']=='delete')
{
    $id = $_GET['id'];
    $delete = $user->delete($id);


}


?>
