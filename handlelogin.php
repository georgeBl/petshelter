<?php 


require "connection.php";

//print $post
echo '<pre>';
print_r($_POST);
echo '</pre>';

//if there is any session delete it.

if(isset($_SESSION)){
    session_destroy();
}

//initialize error array.
$error= [];
//NEED TO BE SANITIZED AND FILTERED
$username = filter_input(INPUT_POST, 'username',  FILTER_SANITIZE_STRING);
$password = filter_input(INPUT_POST, 'password',  FILTER_SANITIZE_STRING);


if(empty($username) || !isset($username)) {
    $error ['login'] = 'Wrong username or password';
}
if(empty($password) || !isset($password)){
    $error ['login'] = 'Wrong username or password';
}

if(empty($error)){
    $sql = 'SELECT * FROM user WHERE username = ?';
    $stmt = $conn->prepare($sql);

    $stmt->bind_param("s", $username);

    //send to database
    $stmt->execute();
    $result = $stmt->get_result(); // get the mysqli result
    $user = $result->fetch_assoc(); // fetch data  

   //if the $user is not empty - has values in it
    if(!empty($user)){
        //verify password using in built PHP method - passsowrd_verify(UNHASHED PASSWORD, HASHED PASSWORD)
        if(password_verify($password, $user['password'])){
            // create session to store ID user and role
            session_start();
            $_SESSION['id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role'];
           
            header('Location: index.php');
        } else{
            $error['login'] = 'Wrong username or password';
            require_once('LogIn.php');
        }
    } else{
        $error['login'] ='Wrong username or password';
        require_once('LogIn.php');
    }
} else{
    // reload page if there is something wrong, you will now have access to $username and $password in the login.php page
    require_once('login.php');
}
