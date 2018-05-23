<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ahmad Riza</title>
    
    <link rel="stylesheet" href="<?php echo base_url();?>resources/css/formreset.css">
    <link rel="stylesheet" href="<?php echo base_url();?>resources/css/layout.css">
    <link rel="stylesheet" href="<?php echo base_url();?>vendors/css/ionicons.min.css">
    <link href="<?php echo base_url();?>resources/css/style.css" rel="stylesheet">
</head>

<body>
   
    <div class="container">
        <div class="row center login-box">
            <div class="col-md-5 col-sm-9 login">
                <section>
                    <h2>Login</h2>
                    <p class="msg"><?php if(isset($msg)) echo $msg;?></p>
                    <form class="flex vertical" method="POST">
                        <input name="email" class="txt-input" type="text" placeholder="Email" required>
                        <input name="pass" class="txt-input" type="password" placeholder="Password" required>
                        <input class="submit" type="submit" value="Login">
                    </form>
                </section>
            </div>

        </div>


    </div>
    
</body>

</html>