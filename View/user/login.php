<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/assets/css/home.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>
</head>
<style>
.bgImg {
    background-image: url('public/assets/image/login/bglogin.jpg');
}
</style>

<body>
    <div class="bgImg">
        <div class="wrap_login">
            <div class="img_decor">
                <img src="public/assets/image/login/laptoplearn.jpg" alt="">
            </div>
            <div class="form_login">
                <div class="wrap__form-login">
                    <h1>WELCOME</h1>
                    <form action="?url=login" method="POST">
                        <div class="form-group">
                            <input type="text" placeholder="User" class="input__login" id="user" name="username">
                            <i class="fa-solid fa-user"></i>
                            <div class="valid valid_user"></div>
                        </div>
                        <div class="form-group">
                            <input type="password" placeholder="Pass" class="input__login" id="pass" name="password">
                            <i class="fa-solid fa-lock"></i>
                            <div class="valid valid_pass"></div>
                        </div>
                        <div class="check__forgot">
                            <div class="checkRemember">
                                <input type="checkbox" id="checkbox"> <label for="checkbox">Remember me</label>
                            </div>
                            <div class="forgotPass"><a href="/user/forgotPass">Forgot passwords
                                    ?</a></div>
                        </div>

                        <button type=" submit" class="btn-login">Login</button>
                        <div>
                            <a href="?url=register"><button class="btn-register" type="button">
                                    Create a new account</button></a>
                        </div>

                    </form>
                    <?php 
                    if(isset($_SESSION['user'])){
                        header('location:?url=/');



                    }
                    ?>
                </div>

            </div>

        </div>

    </div>

</body>

</html>
<script>
let userInput = document.getElementById('user')
let passInput = document.getElementById('pass')
let userNoti = document.querySelector('.valid_user')
let passNoti = document.querySelector('.valid_pass')
let tb = document.querySelector('.tb')
let formE = document.querySelector('form')
userInput.addEventListener('focus', function() {
    userNoti.innerHTML = '';
    tb.innerHTML = '';
})
passInput.addEventListener('focus', function() {
    passNoti.innerHTML = '';
    tb.innerHTML = '';

})
formE.addEventListener('submit', function(e) {
    if (userInput.value == '') {
        userNoti.innerHTML = 'Vui lòng điền thông tin'
        e.preventDefault();
    }
    if (passInput.value == '') {
        passNoti.innerHTML = 'Vui lòng điền thông tin'
        e.preventDefault();
    }

})
</script>