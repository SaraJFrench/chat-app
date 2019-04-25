<!DOCTYPE html>
<html>
<header>

</header>
<title>Intern Registration</title>
<body>
    <h1>College Internship</h1>
    <h2>Intern Registration</h2>
    <?php
    $errors = 0;
    $email = "";
    if (empty($_POST['email'])) {
     ++$errors;
     echo "<p>You need to enter an e-mail address.</p>\n";
    }
    else {
     $email = stripslashes($_POST['email']);
     if (preg_match("/^[\w−]+(\.[\w−]+)*@" .
     "[\w−]+(\.[\w−]+)*(\.[a-zA-Z]{2, })$/i",
     $email) == 0) {
     ++$errors;
     echo "<p>You need to enter a valid " .
     "e-mail address.</p>\n";
     $email = "";
     }
    }
    if (empty($_POST['password'])) {
        ++$errors;
        echo "<p>You need to enter a password.</p>\n";
        $password = ""; 
    }
    else
        $password = stripslashes($_POST['password']);
    if (empty($_POST['password2'])) {
            ++$errors;
            echo "<p>You need to enter a confirmation
            password.</p>\n";
            $password2 = " "; }
    else
            $password2 = stripslashes($_POST['password2']);
       if ((!(empty($password))) && (!(empty($password2)))) {
        if (strlen($password) < 6) {
            ++$errors;
            echo "<p>The password is too short.</p>\n";
            $password = "";
            $password2 = "";
        }
        if ($password <> $password2) {
            ++$errors;
            echo "<p>The passwords do not match.</p>\n";
            $password = "";
            $password2 = "";
        }
    }

    if ($errors == 0) {
        $DBConnect = @mysql_connect("localhost", "root",
        "");
        if ($DBConnect === FALSE) {
        echo "<p>Unable to connect to the database
        server. " .
        "Error code " . mysql_errno() . ": " .
        mysql_error() . "</p>\n";
        ++$errors;
        }
        else {
        $DBName = "internships";
        $result = @mysql_select_db($DBName,
        $DBConnect);
        if ($result === FALSE) {
        echo "<p>Unable to select the
        database. " .
        "Error code " . mysql_errno($DBConnect) .
        ": " . mysql_error($DBConnect) .
        "</p>\n";
        ++$errors;
        }
        }
       }
        $TableName = "interns";
        if ($errors == 0) {
            $SQLstring = "SELECT count(*) FROM $TableName" .
                "where email=$email";
            $QueryResult = @mysql_query($SQLstring,
                $DBConnect);
            if ($QueryResult !== FALSE) {
                $Row = mysql_fetch_row($QueryResult);
                if ($Row[0]>0) {
                    echo "<p>The email address entered (" .
                            htmlentities($email) .
                        ") is already registered.</p>\n";
                    ++$errors;
                    }
                }
            }

            if ($errors > 0) {
                echo "<p>Please use your browser's BACK button
                to return" .
                " to the form and fix the errors
                indicated.</p>\n";
               }
               if ($errors == 0) {
                $first = stripslashes($_POST['first']);
                $last = stripslashes($_POST['last']);
                $SQLstring = "INSERT INTO $TableName " .
                " (first, last, email, password_md5) " .
                " VALUES( '$first', '$last',
                '$email', " .
                " '" . md5($password) . "')";
                $QueryResult = @mysql_query($SQLstring,
                $DBConnect);
                if ($QueryResult === FALSE) {
                echo "<p>Unable to save your registration " .
                " information. Error code " .
                mysql_errno($DBConnect) . ": " .
                mysql_error($DBConnect) . "</p>\n";
                ++$errors;
                }
                else {
                $InternID = mysql_insert_id($DBConnect);
                }
                mysql_close($DBConnect);
               }

               if ($errors == 0) {
                $InternName = $first . " " . $last;
                echo "<p>Thank you, $InternName. ";
                echo "Your new Intern ID is <strong>" .
                $InternID . "</strong>.</p>\n";
               }
    ?>
</body>
</html>