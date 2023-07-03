<?php include('header.php'); ?>
<?php include('OOP.php'); ?>
<?php include('nav.php'); ?>





<div class="container">
    <div class="row">
       
        <?php $db=new OOP();?>
        <?php if(count($db->getTasks("tasks"))): ?>
        <div class="col-sm-12">
            <table class="table table-light mt-5" >
                <thead>
                    <tr>
                        <th>TaskName</th>
                        <th>Priority</th>
                        <th>Status</th>                 
                        <th>Edit Status</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($db->getTasks("tasks") as $row): ?>
                        <tr>
                            <td><?php echo strtoupper($row['taskName']);  ?></td>
                            <td><?php echo $row['priority'];  ?></td>
                            <td><?php echo strtoupper($row['status']);  ?></td>
                            <td>
                                <a href="edit-task.php?id=<?php echo $row['id'] ?>" class="text-primary">
                                    <i class="fa fa-pencil-square-o fa-2x" ></i>
                                </a>
                            </td>

                            <td>
                                <a href="delete-task.php?id=<?php echo $row['id'] ?>" class="text-danger">
                                    <i class="fa fa-times fa-2x" ></i>
                                </a>
                            </td>


                        </tr>
                    <?php endforeach; ?>


                    
                    
                </tbody>
            </table>
        </div>
        <?php else: ?>

<div class="col-sm-12">
    <h3 class="alert alert-danger mt-5 text-center"> Not Found Data </h3>
</div>

<?php endif; ?>




    </div>
</div>


<?php include('footer.php'); ?>
