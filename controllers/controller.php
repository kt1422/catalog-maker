<?php

if(isset($_POST['login'])){
    $username=$_POST['username'];
    $password=$_POST['password'];
    if($username=="admin" && $password=="admin"){
        session_start();
        $_SESSION["user"] = $username;
        echo "<script>
        window.location.href='./index.php?page=home';
        alert('You have successfully logged in!');
        </script>";
    }else{
        echo "<script>
        alert('Invalid username or password!');
        </script>";
    }
}

function logout(){
    $action=$_GET['action'];
    if($action=="logout"){
        session_start();
        unset($_SESSION["user"]);
        echo "<script>
        window.location.href='./index.php?page=login';
        alert('Your account has been logout successfully');
        </script>";
    }
}

if(isset($_POST['generate'])){
    $header=$_POST['header'];
    $pager=$_POST['pager'];
    $image=$_FILES['image'];
    
    $uploaddir = './uploads/';
    $files = $_FILES['image'];
    $file_count = count($files['name']);
    $url = [];
    for($i = 0; $i < $file_count; $i++) {
        $filename = $files['name'][$i];
        $tmp = $files['tmp_name'][$i];
    
        // set the filename as the basename + extension
        $uploaded_file = $filename;
        // new filepath
        $filepath = $uploaddir . $uploaded_file;
        $url[] = $filepath;
        // move the file to the upload dir
        move_uploaded_file($tmp, $filepath);
    }

    
}

?>