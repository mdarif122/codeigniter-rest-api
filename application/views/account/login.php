<!DOCTYPE html>  
<html>  
<head>  
    <title>Login Page</title>  
</head>  
<body>  

    <?php echo $this->session->flashdata('error') ??  ''; 
    $this->session->set_flashdata('error', null);
    ?>  
    
    <form method="post" action="<?php echo site_url('login/process'); ?>">  
        <table cellpadding="2" cellspacing="2">  
            <tr>  
                <td><th>email:</th></td>  
                <td><input type="text" name="email"></td>  
            </tr>  
            <tr>  
                <td><th>Password:</th></td>  
                <td><input type="password" name="pass"></td>  
            </tr>  
  
            <tr>  
                <td> </td>  
                <td><input type="submit" value="Login"></td>  
            </tr>  
        </table>  
    </form>  
</body>  
</html>  