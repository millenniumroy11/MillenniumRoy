<html>
    <head>
    <meta charset="utf-8">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <title>Form</title>
    </head>
    <body>
        <?php
        $fullnameErr = $phonenumberErr = $emailErr = $subjecErr = $messagErr = NULL;
        $fullname = $phonenumber = $email = $subjec = $messag = NULL;

        $flag = true;
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            if(empty($_POST["fullname"])){
                $fullnameErr = "Full Name Required";
                $flag = false;
            } else {
                $fullname = test_input($_POST["fullname"]);
            }

            if(empty($_POST["phonenumber"])){
                $phonenumberErr = "Phone Number Required";
                $flag = false;
            } else {
                $phonenumber = test_input($_POST["phonenumber"]);
            }

            if(empty($_POST["email"])){
                $emailErr = "email Required";
                $flag = false;
            } else {
                $email = test_input($_POST["email"]);
            }

            if(empty($_POST["subjec"])){
                $subjecErr = "Subject Required";
                $flag = false;
            } else {
                $subjec = test_input($_POST["fullname"]);
            }

            if(empty($_POST["messag"])){
                $messagErr = "Message Required";
                $flag = false;
            } else {
                $messag = test_input($_POST["fullname"]);
            }

            if($flag){
                $connection = new mysqli('localhost', "millennium", "millennium@123","college");

                if($connection -> connect_error) {
                    die("Connection Failed Error : " . $connection->connect_error);
                }

                $sql = "INSERT INTO client (fullname,phonenumber,email,subjec,messag) VALUES('$fullname'
                ,'$phonenumber','$email','$subjec','$messag')";

                if($connection->query($sql)==TRUE){
                    echo "<script> alert ('data saved successfully')";
                }
            }
        }
        function test_input($data)
        {
            $data=trim($data);
            $data=stripslashes($data);
            $data=htmlspecialchars($data);
            return $data;
        }
        ?>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
        <div class="card pt-2 mx-auto" style="max-width: 40rem;">
        <div class="card-header" style="font-size: 30px;">
        <header>Form</header>
        </div>
        <div class="card-body">
        <div class="card-text mb-2">
        Full Name* : <input type="text" name="fullname" class="form-control" placeholder="Full Name" value="<?= $fullname; ?>">
        <span class="error"><?= $fullnameErr; ?> </span>
        </div>

        <div class="card-text mb-2">
        Phone Number* : <input type="text" name="phonenumber" class="form-control" placeholder="Phone Number" value="<?= $phonenumber; ?>">
        <span class="error"><?= $phonenumberErr; ?> </span>
        </div>

        <div class="card-text mb-2">
        Email* : <input type="text" name="email" class="form-control" placeholder="Email" value="<?= $email; ?>">
        <span class="error"><?= $emailErr; ?> </span>
        </div>

        <div class="card-text mb-2">
        Subject* : <input type="text" name="subject" class="form-control" placeholder="Subject" value="<?= $subjec; ?>">
        <span class="error"><?= $subjecErr; ?> </span>
        </div>

        <div class="card-text mb-2">
        Message* : <input type="text" name="message" class="form-control" placeholder="Message" value="<?= $messag; ?>">
        <span class="error"><?= $messagErr; ?> </span>
        </div>
        <div class="card-footer mb-2 btn-lg">
        <input class="button btn btn-primary" type="submit" name="button">
        </div>
        </div>
    </div>
    </form>
    </body>
</html>