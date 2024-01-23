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
                    <h1>REGISTER</h1>
                    <form action="?url=register" method="POST">
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
                        <div class="form-group">
                            <input type="password" placeholder="Enter the pass..." class="input__login" id="pass2">
                            <i class="fa-solid fa-lock"></i>
                            <div class="valid valid_pass2"></div>
                        </div>
                        <div class="form-group">
                            <input type="text" placeholder="Email" class="input__login" id="email" name="email">
                            <i class="fa-solid fa-envelope"></i>
                            <div class="valid valid_email"></div>
                        </div>


                        <button type="submit" class="btn-login">Submit</button>
                        <div>
                            <a href="?url=login"><button class="btn-register" type="button">Login</button></a>
                        </div>

                    </form>
                    <?php
                        if(isset($tb)){echo $tb;}
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
let pass2Input = document.getElementById('pass2')
let emailInput = document.getElementById('email')
let userNoti = document.querySelector('.valid_user')
let passNoti = document.querySelector('.valid_pass')
let pass2Noti = document.querySelector('.valid_pass2')
let emailNoti = document.querySelector('.valid_email')
let formE = document.querySelector('form')
userInput.addEventListener('focus', function() {
    userNoti.innerHTML = '';
})
passInput.addEventListener('focus', function() {
    passNoti.innerHTML = '';
})
pass2Input.addEventListener('focus', function() {
    pass2Noti.innerHTML = '';
})
emailInput.addEventListener('focus', function() {
    emailNoti.innerHTML = '';
})

function checkUser() {
    if (userInput.value == '') {
        userNoti.innerHTML = 'Không để trống user'
        return false
    } else {
        if (userInput.value.length <= 5) {
            userNoti.innerHTML = 'Độ dài user lớn hơn 5'
            return false
        } else {
            return true
        }
    }

}

function checkPass() {
    if (passInput.value == '') {
        passNoti.innerHTML = 'Không để trống mật khẩu'
        return false
    } else {
        if (passInput.value.length <= 5) {
            passNoti.innerHTML = 'Độ dài pass lớn hơn 5'
            return false
        } else {
            return true
        }
    }

}

function checkPass2() {
    if (pass2Input.value == '') {
        pass2Noti.innerHTML = 'Không để trống trường này'
        return false
    } else {
        if (pass2Input.value.length <= 5) {
            pass2Noti.innerHTML = 'Độ dài pass lớn hơn 5'
            return false
        } else {
            if (pass2Input.value != passInput.value) {
                pass2Noti.innerHTML = 'Mật khẩu không khớp'
                return false
            } else {
                pass2Noti.innerHTML = ''

                return true
            }
        }
    }

}

function checkEmail() {
    if (emailInput.value == '') {
        emailNoti.innerHTML = 'Không để trống email'
        return false
    } else {
        let emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/
        email = emailRegex.test(emailInput.value)
        console.log(email)
        if (email) {
            return true
        } else {
            emailNoti.innerHTML = 'Email invalid'
            return false
        }
    }

}
formE.addEventListener('submit', function(e) {

    let user = checkUser()
    let pass = checkPass()
    let pass2 = checkPass2()
    let email = checkEmail()
    if (user && pass && pass2 && email) {

    } else {
        e.preventDefault();
    }

})
</script>