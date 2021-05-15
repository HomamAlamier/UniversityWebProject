<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title></title>
        <link rel="stylesheet" href="http://main-laraveltests.servehttp.com/css/bootstrap.min.css">
        <link rel="stylesheet" href="http://main-laraveltests.servehttp.com/css/font-awesome.css">
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
        <h3 class="text-center">Hello <?php echo $name; ?></h3>
        <p class="text-center">Please verfiy your account email by clicking the button below.</p>
        <center>
            <a class="btn btn-info btn-block" style="width: 180px" href="<?php echo $verf_url; ?>">Verfiy</a>
        </center>
    </body>
</html>
