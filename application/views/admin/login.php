<!DOCTYPE html>
<html lang="en">
<head>
	
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Log-in Area</title>
    
    <link href="/dbms/css/bootstrap.css" rel="stylesheet">
    <link rel="shortcut icon" type="image/x-icon" href="/logo.ico" />


</head>

<body class="page">
    <?php if($try==1){?>
    <script type="text/javascript">alert("Username-Password combination does not exists!");</script>
    <?php }?>

    <div class="container">

        <div class="outer">


            <form  role="form" action="/dbms/index.php/admin/login" method="post" autocomplete="off">
                <input style="display:none">
                <input type="password" style="display:none">

                <table>
                    <tr>
                        <td><h2 align="center" style="color: #fff">Log-in Area</h2>
                        </td>
                    </tr>
                    <tr>
                        <td><input class="form-control" type="text" name="user" placeholder="Enter Username" >
                        </td>
                    </tr>
                    <tr><td>&nbsp;</td></tr>
                    <tr>
                        <td><input class="form-control" type="password" name="pass" placeholder="Enter Password">
                        </td>
                    </tr>
                    <tr><td>&nbsp;</td></tr>
                    <tr>
                        <td width=100%><input class="btn btn-success" type="Submit" value="Submit">
                        </td>
                    </tr>

                </table>
            </form>

        </div>
        
    </div>

</body>

<script src="js/bootstrap.min.js"></script>
</html>



