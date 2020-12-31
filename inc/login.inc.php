<?php
    require 'db.inc.php';

    if(isset($_POST['submit-login'])){
        $uid = $_POST['username'];
        $pwd = $_POST['password'];

        if(empty($uid) || empty($pwd)){
            header("Location: ../login/?error=emptyfields");
            exit();
        }
        else{
            $sql = 'SELECT * FROM husers WHERE uid=?;';
            $stmt = mysqli_stmt_init($conn);

            if(!mysqli_stmt_prepare($stmt, $sql)){
                header("Location: ../login/?error=sqlerror");
                exit();
            }
            else{
                $uid = $conn->real_escape_string($uid);

                mysqli_stmt_bind_param($stmt, "s", $uid);
                mysqli_stmt_execute($stmt);

                $result = mysqli_stmt_get_result($stmt);
                if($row = mysqli_fetch_assoc($result)){

                    $pwdCheck = password_verify($pwd, $row['pwd']);

                    if($pwdCheck == false){
                        header("Location: ../login/?error=pwdincorrect");
                        exit();
                    }
                    else if($pwdCheck == true){
                        session_start();

                        $_SESSION['userId'] = $uid;

                        header("Location: ../login/access");
                        exit();
                    }
                }
                else{
                    header("Location: ../login/?error=nouid");
                    exit();
                }
            }
        }
    }
    else{
        header("Location: ../login/");
        exit();
    }