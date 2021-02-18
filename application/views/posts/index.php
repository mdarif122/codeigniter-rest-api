
<h5>

<?= $title ?>

</h5>

<p>
All the posts list will go here 
</p>


<?php

foreach($employees as $key => $employee)
{
    echo '
    <div class="card m-3"> 
        name : '.$employee['name'].' <br>
        name : '.$employee['totalSalary'].'
        <a href="'. site_url('posts/'.$employee['employeeNo']) .'" class="btn btn-sm" >Go to details</a>
    </div>
    ';
}

?>
