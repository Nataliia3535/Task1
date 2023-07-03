<?php include('header.php'); ?>
<?php include('OOP.php'); ?>
<?php include('nav.php'); ?>

<?php $db=new OOP();?>
<?php  $row = $db->find('tasks',$_GET['id']); ?>
<?php if(isset($_GET['id']) && is_numeric($_GET['id']) && $row):  ?>

  
   



<?php

$error = '';
$success = '';
if(isset($_POST['submit']))
{
   
    $status=$_POST['status'];
   
     $sql = "UPDATE tasks SET `status`='$status'  WHERE `id`='$row[id]' ";
     $success = $db->completeTask($sql);
                                    
}


?>


<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <h2 class="p-3 col text-center mt-5 text-white bg-primary">  Edit Task </h2>
        </div>


        <div class="col-sm-12">
            <?php if($error !=''): ?>
            <h2 class="p-2 col text-center mt-5  alert alert-danger"> <?php echo $error; ?>  </h2>
            <?php endif; ?>

            <?php if($success !=''): ?>
            <h2 class="p-2 col text-center mt-5  alert alert-success"> <?php echo $success; ?>  </h2>
            <?php endif; ?>
        </div>
  
            <form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
          <div class="form-check">
          <input class="form-check-input" type="radio" name="status" id="flexRadioDefault1"  value="Done">
         <label class="form-check-label" for="flexRadioDefault1">
             Done
          </label>
            </div>
  
            <div class="form-check">
            <input class="form-check-input" type="radio" name="status" id="flexRadioDefault1"  value="NotDone">
             <label class="form-check-label" for="flexRadioDefault1">
               NotDone
                </label>
              </div>





               
            
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>


<?php else: ?>

    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h3 class="alert alert-danger mt-5 text-center"> Not Found </h3>
            </div>
        </div>
    </div> 
    

<?php  endif;  ?>

<?php include('footer.php'); ?>


