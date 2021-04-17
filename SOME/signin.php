<?php
session_start();
$_SESSION['erroremail']="";
$username;
$password;
$address;
$myfile=fopen("Accounts.xml", "a") or die("Unable to find the path/folder for the accounts");

if (isset($_POST['createAc'])) {
    $username=$_POST['email'];
    $password=$_POST['passWord'];
    $firstname=$_POST['firstN'];
    $lastname=$_POST['lastN'];
    $address=$_POST['A_SU'];

    /*
    Here is where you check if the values inputed are empty.
    
    */

    $read=fopen("Accounts.xml", "r") or die("Unable to find the path/folder for the accounts");
    $exist=false;
    while (!feof($read) || fgets($read) != ""){
        $line=fgets($read);
        $info=explode(" ", $line);

        if ($info[0] == $username){
           $_SESSION['erroremail']="This email is already assigned to an account.";
           $exist=true;
           break;
        }
    }

    fclose($read);
    //write in folder in this order: Username Password Email Address
    if ($exist==false) {
        $data=$username . ' ' . $password . ' ' . $firstname . ' ' . $lastname. ' ' . $address . "\n";

        fwrite($myfile, $data);
    }

}

if (isset($_POST['signBtn'])) {
    fclose($myfile);
    $username=$_POST['email'];
    $password=$_POST['password'];
    $Exist=false;


     /*

    Here is where you check if the values inputed are empty.

    */

    if ($username!='' && $password!='') {
            $MyFile=fopen("Accounts.xml", "r") or die("Unable to find the path/folder for the accounts");

        while (!feof($MyFile)) {
            $information = fgets($MyFile);
            $infos = explode(" ", $information);
            if ($username==$infos[0] && $password==$infos[1]) {
                $_SESSION['username']=$username;
                header("Location: http://localhost/SOME2/aisle.html");
                break;
            }
        }

        $MyFile=fopen("admin.txt", "r") or die("Unable to find the path/folder for the accounts");
        $line=fgets($MyFile);
        $lines=explode(" ",$line);
        if ($username==$lines[0] && $password==$lines[1]) {
            $_SESSION['username']=$username;
            header("Location: http://localhost/SOME2/employee.html");
            exit();
        }

        if ($Exist==false) {
            $_SESSION['erroremail']= "Wrong username/password";
        }
        fclose($MyFile);
    }
}

?>
