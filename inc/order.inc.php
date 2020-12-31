<?php

    require 'db.inc.php';

    if(isset($_POST['submit-order'])){
        $name = trim(ucfirst($_POST['name']));
        $surname = trim(ucfirst($_POST['surname']));
        $cell = trim($_POST['cell']);
        $address = $_POST['address'];
        $gift = $_POST['gift'];

        if(empty($name) || empty($surname) || empty($cell) || empty($address) || empty($gift)){
            header("Location: ../?error=emptyfields#form");
            exit;
        }
        else{

            $sql = "SELECT * from ymi_gifts WHERE cell=?;";
            $stmt = mysqli_stmt_init($conn);

            if(!mysqli_stmt_prepare($stmt, $sql)){
                header("Location: ../?error=sql#form");
                exit;
            }
            else{
                mysqli_stmt_bind_param($stmt, "s", $cell);
                mysqli_stmt_execute($stmt);

                $result = mysqli_stmt_get_result($stmt);
                if($row = mysqli_fetch_assoc($result)){
                    header("Location: ../?error=exists#form");
                    exit();
                }
                else{
                    $sql = "INSERT INTO ymi_gifts (name, surname, cell, address, gift) VALUES (?, ?, ?, ?, ?);";
                    $stmt = mysqli_stmt_init($conn);

                    if(!mysqli_stmt_prepare($stmt, $sql)){
                        header("Location: ../?error=sql#form");
                        exit;
                    }
                    else{
                        mysqli_stmt_bind_param($stmt, "sssss", $name, $surname, $cell, $address, $gift);
                        if(mysqli_stmt_execute($stmt)){

                            // Other validation could go here
                            header("Location: ../?success=chosen#form");
                            exit;
                           
                        }
                        else{
                            header("Location: ../?error=sqlexe#form");
                            exit();
                        }
                    }
                }

            }
        }
    }
    else{
        header("Location: ../");
        exit;
    }