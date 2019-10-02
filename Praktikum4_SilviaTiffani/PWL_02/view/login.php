<?php
$loginPressed = filter_input(INPUT_POST, 'btnLogin');
if(isset($loginPressed)){
    $usnm = filter_input(INPUT_POST, 'txtUsername');
    $pwd = filter_input(INPUT_POST, 'txtPassword');
    $user = login($usnm, MD5($pwd));
    if ($user != null && $user['username'] == $usnm){
        $_SESSION['user_loged'] = true;
        $_SESSION['name'] = $user['name'];

        header("location:index.php");
    } else {
        $errMsg = "Invalid Username or Password";
    }
}

if (isset($errMsg)){
    echo '<div class="err-msg">' . $errMsg . '</div>' ;
}

?>


<form method="post">
    <fieldset>
       <legend>Login Form</legend>
        <label for="txtUsernameIdx">Username</label>
            <input id="txtUsernameIdx" name="txtUsername" type="text" autofocus required
               placeholder="Your Username" class="form-input" >
        <label for="txtPasswordIdxIdx">Password</label>
            <input id="txtPasswordIdx" name="txtPassword" type="text" autofocus required
               placeholder="Your Password" class="form-input" ></label>
            <input type="submit" name="btnLogin" value="login" class="button button-primary">
    </fieldset>
</form>
