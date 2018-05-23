<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>404 Not Found</title>
    <style>
        html{
            background-color:#fff;
            color:#555;
            font-family: 'Roboto', Arial, sans-serif;
            font-size: 20px;
            font-weight: 400;
            text-rendering: optimizeLegibility;
        }

        html{
            background-color : #fff;
        }
        div{
            height: 80vh;
            display:flex;
            align-items:center;
            justify-content:center;
            flex-direction:column;
        }
        h1{
            margin : 0;
            line-height:100%;
            font-size:700%;
            font-weight:300; 
        }
        h3{
            color:#4DABFD;
            margin :0;
            font-size:200%;
        }
        
        a{
            background-color : #4DABFD;
            padding : 10px 20px;
            margin-top : 20px;
            text-decoration:none;
            color:#fff;
            border-radius:5px;
            box-shadow: 1px 2px 3px 0px rgba(0,0,0,0.2);
        }
        a:hover{
            background-color: rgb(95, 178, 250);
            box-shadow: 1px 4px 6px 0px rgba(0,0,0,0.2);
        }
    </style>
</head>


<body>

    <div>
        <h1>404</h1>
        <h3>You're Lost</h3>
        <a href="<?php echo base_url();?>" class="back-btn">
            Bring me back to home
        </a>
    </div>
    
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400" rel="stylesheet">
</body>

</html>