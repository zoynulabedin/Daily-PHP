<?php 
session_start([
    'cookie_lifetime'   =>60,
]);
$error = false;
// $_SESSION['loggedin']='';  

if(isset($_POST['username']) && isset($_POST['password'])){
    if('admin' == $_POST['username'] && 'pass' == $_POST['password']){
        $_SESSION['loggedin'] = true;
    }else{
        $error = false;
        $_SESSION['loggedin']  = false;
    }
}
if(isset($_POST['logout'])){
    $_SESSION['loggedin']  = false;
    session_destroy();
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Roboto:300,300italic,700,700italic">
    <link rel="stylesheet" href="//cdn.rawgit.com/necolas/normalize.css/master/normalize.css">
    <link rel="stylesheet" href="//cdn.rawgit.com/milligram/milligram/master/dist/milligram.min.css">
</head>
<body>
    <div class="container">
        <div class="row">
           <div class="column column-60 column-offset-20">
           <h2>Simple auth </h2>
            <?php 
        
            if(true == $_SESSION['loggedin']){
                echo "Hello Admin! Welcome";
            }else{
                echo "Login below";
            }
            ?>
               
           </div>
        </div>
        <div class="row">
            <div class="column column-60 column-offset-20">
            <?php
                if($error){
                    echo "<blockquote>Username and password wrong</blockquote>";
                }
            if(false == $_SESSION['loggedin']): ?>
                <form action="" method="POST">
                    <label for="username">User Name</label>
                    <input type="text" name="username" id="username">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password">
                    <button type="submit" name="submit" class="button-primary">Log In</button>
                </form>
                <?php else: ?>
                    <form action="\practice\session\session.php?logout=true" method="POST">
                        <input type="hidden" name="logout" value="1">
                        <button type="submit" name="logout">Logout</button>
                    </form>
                <?php endif; ?>
            </div>
        </div>
    </div>
</body>
</html>