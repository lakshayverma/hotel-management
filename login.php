<?php
$nav_only = TRUE;
include './layouts/header.php';

if ($session->is_logged_in()) {
    redirect_to("index.php");
}

if (isset($_POST['username']) && isset($_POST['password'])) {
    $user = Account::find_by_sql(
                    "select * from account "
                    . "where"
                    . " user_name = \"{$_POST['username']}\""
                    . " and"
                    . " password = \"{$_POST['password']}\""
    );
    $user = array_shift($user);
    if (isset($user->id)) {
        $session->login($user);
        if (empty($_POST['request_uri'])) {
            redirect_to('index.php');
        } else {
            redirect_to($_POST['request_uri']);
        }
    } else {
        $message = "Incorrect credentials";
    }
}
?>

<style>
form {
    border: 3px solid #f1f1f1;
}

input[type=text], input[type=password] {
    width: 40%;
    padding: 10px 15px;
    margin: 8px 0;
    display: inline-block;
    border: 2px solid #ccc;
    box-sizing: border-box;
}

button {
    background-color: black;
    color: white;
    padding: 10px 15px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 40%;
}

button:hover {
    opacity: 0.8;
}

.cancelbtn {
    width: auto;
    padding: 10px 18px;
    background-color: #f44336;
}

.imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
}

img.avatar {
    width: 40%;
    border-radius: 50%;
}

.container {
    padding: 16px;
}

span.psw {
    float: right;
    padding-top: 16px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
    span.psw {
       display: block;
       float: none;
    }
    .cancelbtn {
       width: 100%;
    }
}
</style>
<DIV class="">
    <br>
    <br>

<h2 align="center">Login Form</h2>

<form action="./login.php" method="post">
  <div class="imgcontainer">
      <img src="hotel_pics/hotels-4.jpg" alt="Avatar" class="avatar">
  </div>

  <div class="container">
      <div class="col-sm-8 col-sm-offset-4"><b>Username</b>
    <input type="text" placeholder="Enter Username" name="username" required>
      </div>
    
    
    <div class="col-sm-8 col-sm-offset-4"><b>Password</b>
    <input type="password" placeholder="Enter Password" name="password" required>
    </div>
      <div class="col-sm-10 col-sm-offset-4">
    <button type="submit" >Login</button>
      </div>
  </div>
</form>

</DIV>

<?php include './layouts/footer.php'; ?>
<script>
    var activeForm = '#login-form';

    $(function () {
        $('#login-form-link').click(function (e) {
            $("#login-form").delay(100).fadeIn(100);
            $("#register-form").fadeOut(100);
            $('#register-form-link').removeClass('active btn-primary');
            $(this).addClass('btn-primary');
            activeForm = "#register-form";
            e.preventDefault();
        });
        $('#register-form-link').click(function (e) {
            $("#register-form").delay(100).fadeIn(100);
            $("#login-form").fadeOut(100);
            $('#login-form-link').removeClass('active btn-primary');
            $(this).addClass('btn-primary');
            activeForm = "#login-form";
            e.preventDefault();
        });
    });

    $(activeForm).validate();
</script>

