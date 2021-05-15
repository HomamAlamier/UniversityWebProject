<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta property="og:title" content="testing Login" />
        <meta property="og:site_name" content="Laravel tests"/>
        <meta property="og:description" content="Login or signup to this website" />
        <title></title>
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
        <style>
            body{
                font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;

            }
            #account{
                margin-top: 30px;
                margin-left: 20px;

            }
            .cust p{
                margin-top: -5px;
                color: #444;
                font-size: 20px;
            }
            h3{
                color:#222;
                margin-top: 30px;
            }
            div .form{
                width: 600px;
                margin: 30px auto;
            }
            .creataccount input{
                border: 0;
                border-bottom: 1px solid #ddd;
                outline: 0;
            }

            select.custom-select {
                border: 0;
                border-bottom: 1px solid #ddd;
            }


            div .Social{
                margin-top: 20px;
            }

            div .Social p{
                margin-top: 20px;
                font-weight: 700;
                color: #777;
            }
            div .Social .btn.btn-info{
                margin-left: 33%;
            }

            a{
                color: #333;
            }

            form .login,.sign-up{
                display: none;
            }
            .message {
                margin: 15px 0 0;
                color: #b3b3b3;
                font-size: 13px;
            }

            .message a {
                margin-top: 30px;
                text-decoration: none;
                color: rgb(27, 137, 240);
            }


            @media screen and (max-width: 768px) {
                div .form{
                width: 400px;
            }
            div .Social .btn.btn-info{
                margin-left: 24%;
            }
            }
        </style>
    </head>

    <body>

        <button type="button" class="btn btn-danger" id="account"> Create Account </button>

        <div class="container">
            <div class="form">
                <div class="cust">
                    <h3 class="text-center"> Hello ! </h3>
                    <p class="text-center"> You Must Login To Continue </p>
                </div>
                <div class="creataccount">
                    <form id="sup_form" class="sign-up">
                        <input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
                        <input type="hidden" name="action" value="signup">
                        <div class="form-group">
                            <label></label>
                            <input type="text" class="form-control" name="uname" placeholder="Your Name" id="sup_name" required> 
                        </div>

                        <div class="form-group">
                            <p style="color: Red;display: none;" id="emailerr">Email is already in use !!</p>
                            <input type="email" class="form-control" name="email" placeholder="Email" id="sup_email" required>
                        </div>

                        <div class="form-group">
                            <input type="password" class="form-control" name="pass" id="sup_pass" placeholder="Password" required>
                        </div>

                        <div class="form-group">
                            <p style="color: Red;display: none;" id="passvererr">Password verfiy is wrong</p>
                            <input type="password" class="form-control" id="sup_pass2" placeholder="Confirm Password">
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" name="address" placeholder="Location" id="sup_addr" required>
                        </div>

                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="customFile">
                            <label class="custom-file-label" for="customFile">Choose Photo</label>
                        </div><br><br>
                        <div onclick="signup_btn_click()" class="btn btn-info btn-block" id="signup_btn"> Create </div>  

                        <div class="Social">
                            <p class="text-center lead"> Or sing-up with </p>
                            <button type="button" class="btn btn-info"> <i class="fa fa-facebook fa-x4"></i> facebook </button>
                            <button type="button" class="btn btn-danger"> <i class="fa fa-google-plus fa-x4"></i> Google </button>
                            <p class="text-center"> By logging into sooqsiria, you agree to our terms and privacy policy. </p>
                        </div>
                        
                    </form>

                    <form class="login" action="/account" method="POST">
                        <input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
                        <input type="hidden" name="action" value="login">
                        <div class="form-group">
                            <input type="email" class="form-control" name="uname" placeholder="Email" required>
                        </div>

                        <div class="form-group">
                            <input type="password" class="form-control" name="pass" placeholder="Password" required>
                        </div>
                        <button type="submit" class="btn btn-info btn-block" style="margin-bottom: 40px"> Login </button> 
                        <div class="Social">
                            <p class="text-center lead"> Or login with </p>
                            <button type="button" class="btn btn-info"> <i class="fa fa-facebook fa-x4"></i> facebook </button>
                            <button type="button" class="btn btn-danger"> <i class="fa fa-google-plus fa-x4"></i> Google </button>
                            <p class="text-center"> By logging into sooqsiria, you agree to our terms and privacy policy. </p>
                        </div>
                    </form>

                </div>

                <p class="message text-center">Have You Forgotten The PassWord? <a href="#"> Create New One</a></p>
                <a href="first-page.html"><p class="text-center" style="margin-top: 30px;"> Back </p></a>

                
            </div>
        </div>




        <script src="{{ asset('js/jquery-3.5.1.js') }}"></script>
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
        <script>
            var loadingSymbol = '<div class="fa-3x" style="display: inline-flex"><i class="fas fa-cog fa-spin" style="font-size: 25px;display: block;"></i></div>'
            var cbtn = false;
            function getUrlVars()
            {
                var vars = [], hash;
                var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
                for(var i = 0; i < hashes.length; i++)
                {
                    hash = hashes[i].split('=');
                    vars.push(hash[0]);
                    vars[hash[0]] = hash[1];
                }
                return vars;
            }
            function signup_verfiy(){
                if (   isNullOrEmpty(document.getElementById('sup_name').value) 
                    || isNullOrEmpty(document.getElementById('sup_email').value)
                    || isNullOrEmpty(document.getElementById('sup_pass').value)
                    || isNullOrEmpty(document.getElementById('sup_pass2').value)
                    || isNullOrEmpty(document.getElementById('sup_addr').value))
                        return false
                if ( document.getElementById('sup_pass').value !== document.getElementById('sup_pass2').value){
                    document.getElementById('passvererr').style.display = "block";
                    return false;
                }
                return true;
            }
            function isNullOrEmpty(x){
                return x === null || x === '' || x === ' ';
            }
            function signup_btn_click(){
                if ( !signup_verfiy() ){
                    console.log("some required fields are empty !");
                }
                else {
                    document.getElementById('signup_btn').innerHTML = loadingSymbol;
                    $.post(
                        '/account',
                        $('form#sup_form').serialize(),
                        function (data){
                            console.log(data);
                            if (data['errCode'] == 200){
                                window.location.replace('/accountverfiy?p=1');
                            }
                            else if (data['errCode'] == 201){
                                document.getElementById('emailerr').style.display = "block";
                            }
                            document.getElementById('signup_btn').innerHTML = "Create";
                        },
                        'json'
                    );   
                }
            }
            var urlVars = getUrlVars();
            if (urlVars['p'] == "signup"){
                $(".login").fadeToggle(function(){
                    $(".sign-up").fadeToggle();
                })
            }
            if (urlVars['err'] != undefined){
                if (urlVars['err'] == "email"){
                    document.getElementById('emailerr').style.display = "block";
                }
            }
            $(document).ready(function(){
                $("#account").click(function(){
                    if (cbtn){
                        $("#account").text("Create Account")
                        cbtn = false
                    }
                    else {
                        $("#account").text("Sign In")
                        cbtn = true
                    }
                    $(".login").fadeToggle(function(){
                        $(".sign-up").fadeToggle();
                    })
                })
            })
        </script>
    </body>
</html>
