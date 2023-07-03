<?php include('header.php'); ?>
<?php include('OOP.php'); ?>
<?php include('nav.php'); ?>






<?php
$error = '';
$success = '';

   
if(isset($_POST['submit']))
    {
        $taskName       = filter_var($_POST['taskName'],FILTER_SANITIZE_STRING);
        $priority      = filter_var($_POST['priority'],FILTER_SANITIZE_NUMBER_INT);
        $status=$_POST['status'];
       
        if(empty( $taskName  ) or empty($priority) )
        {
            $error = "Please Fill All Fields";
        }
        else 
        {
            if(strlen( $taskName ) > 3)
            {
                  
                        if (strlen($priority) >=0) 
                        {
                            $db = new OOP();
                            $sql = "INSERT INTO tasks (`taskName`,`priority`,`status`) 
                            VALUES ('$taskName','$priority','$status') ";
                            $success = $db->addTask($sql);

                        }
                        else 
                        {
                            $error = "priority Must be Grater than 0 !";
                        }
                    
                   
                
               
            }
            else 
            {
                $error = "taskname Must be Grater Than 3 chars !";
            }
        }
    }


           

        






    

?>

<div class="container">
    <div class="row">
       
        <div class="col-sm-12">
            <?php if($error !=''): ?>
            <h2 class="p-2 col text-center mt-5  alert alert-danger"> <?php echo $error; ?>  </h2>
            <?php endif; ?>

            <?php if($success !=''): ?>
            <h2 class="p-2 col text-center mt-5  alert alert-success"> <?php echo $success; ?>  </h2>
            <?php endif; ?>
        </div>





<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <h2 class="mt-2">  Add Task </h2>
        </div>

        <div class="col-sm-12">
            <form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
                <div class="form-group">
                    <label for="taskName">TaskName</label>
                    <input type="text" name="taskName" class="form-control" id="taskName"  placeholder="Enter name of task">
                </div>

                <div class="form-group">
                    <label for="priority">Priority</label>
                    <input type="text" name="priority" class="form-control" id="priority"  placeholder="Enter priority">
                </div>

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


               
            
                <button type="submit" name="submit" class="btn btn-primary mt-2">Submit</button>
            </form>
        </div>
    </div>
</div>


     
        
        
        
    </div>
</div>


<?php include('footer.php'); ?>
