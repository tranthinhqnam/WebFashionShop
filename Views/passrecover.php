<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="../font/font.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bubbler+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/beac25d89a.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/emailjs-com@3/dist/email.min.js"></script>
    <script type="text/javascript">
        (function() {
            emailjs.init("user_c5wJats9s5YzOg83Xx6qZ");
        })();
    </script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,300;0,400;0,500;1,200;1,300;1,400;1,500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/common.css">
    <link rel="stylesheet" href="../css/style-passrecover.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../logo/favicon.png">
    <title>HNT - Style</title>
</head>

<body>
    <script>
        $(function() {
            $("#header").load("../common/header.php");
            $("#footer").load("../common/footer.php");
        });
    </script>
    <div id="header"></div>
    <nav aria-label="breadcrumb" style="margin-top: 60px">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="../Views/Index.php">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Recover Password</li>
        </ol>
    </nav>
    <div class="container-fluid">
        <div class='heading' style="text-align: center;">
            <h3>Recover Password</h3>
            <?php 
                if(isset($_GET['email'])){
                    echo '<h5>Please check your emails for a message with your code. Your code is 6 numbers long.</h5>';
                }
                else
                echo '<h5>Please, enter your email</h5>';
            ?>
            
        </div>
        <?php
        if (isset($_GET['isvalidate'])) {
            if ($_GET['isvalidate'] == 'false') {
                echo "<p class='text-danger text-center'>You've entered invalid email</p>";
            }
        }
        ?>
        <div class="form-container">
            <form method="post" class="form" action="../Models/recover_password.php">
                <div class="form-group">
                    <label for="email" class="mx-auto">Enter your email</label>
                    <input type="email" class="form-control  mx-auto" name="email" id="email" placeholder="Enter your email" value=<?php 
                    if(isset($_GET['email'])){
                        $email = $_GET['email'];
                        echo $email;
                    }?> <?php 
                    if(isset($_GET['isvalidate'])){
                        $isvalidate = $_GET['isvalidate'];
                        if($isvalidate == 'true'){
                            echo 'readonly';
                        }
                    }
                ?>>
                    <?php
                    if(isset($_GET['email'])){
                        echo '<script src="../js/script-resetp.js"></script>';
                    }
                    ?>
                    <?php 
                    if(isset($_GET['isvalidate'])){
                        $isvalidate = $_GET['isvalidate'];
                        if($isvalidate == 'true'){
                            echo '<label for="code" class="mx-auto">Enter your code</label>

                            <input type="email" class="form-control  mx-auto" name="code" id="code" placeholder="Enter your code">';
                        }
                    }
                    ?>
                    <div class="submit-container">
                        <input class="btn" <?php 

                        if (isset($_GET['email'])){
                            echo 'onClick="valid()"';
                        } else {
                            echo 'type="submit"';
                        }
                        ?>  id="btnsignin" value="<?php
                            if(isset($_GET['email'])){
                                echo 'Submit code';
                            }
                            else{
                                echo 'Confirm';
                            }
                        ?>" name="signin"></input> 
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div id="footer"></div>
</body>

</html>

