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
    background-image: url('/public/assets/image/login/bglogin.jpg');
}
</style>

<body>
    <div class="bgImg">
        <div class="wrap_login">
            <div class="img_decor">
                <img src="/public/assets/image/login/laptoplearn.jpg" alt="">
            </div>
            <div class="form_login">
                <div class="wrap__form-login">
                    <h1>QUÊN MẬT KHẨU</h1>
                    <form action="/user/forgotPass" method="POST">
                        <div class="form-group">
                            <input type="text" placeholder="Email" class="input__login" id="email" name="email">
                            <i class="fa-solid fa-envelope"></i>
                            <div class="valid valid_email"></div>
                        </div>
                        <button type="submit" class="btn-login">Gửi lại mật khẩu</button>
                        <!-- <?php 
                    if(isset($tb) && $tb!='' && preg_match('/^mật\skhẩu\s[^@-]+$/iu',$tb)==1){
                       echo "<h4 class='tb'>$tb</h4>
                       <div>
                            <a href='login'><button class='btn-register' type='button'>Login</button></a>
                        </div>
                        ";
                    }else{
                        echo "<h4 class='tb'>$tb</h4>";
                    }

                    ?> -->
                    </form>

                </div>

            </div>

        </div>

    </div>

</body>

</html>
<script>
let emailInput = document.getElementById('email')
let emailNoti = document.querySelector('.valid_email')
let tb = document.querySelector('.tb')

let formE = document.querySelector('form')

emailInput.addEventListener('focus', function() {
    emailNoti.innerHTML = '';
    tb.innerHTML = '';

})

function checkEmail() {
    if (emailInput.value == '') {
        emailNoti.innerHTML = 'Không để trống email'
        return false
    } else {
        let emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/
        email = emailRegex.test(emailInput.value)
        if (email) {
            return true
        } else {
            emailNoti.innerHTML = 'Email invalid'
            return false
        }
    }

}
formE.addEventListener('submit', function(e) {
    let checkmail = checkEmail();
    if (checkmail) {

    } else {
        e.preventDefault();
    }
})
</script>