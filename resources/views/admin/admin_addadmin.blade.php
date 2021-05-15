<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>

<body>


    <div class="d-flex" id="wrapper">


        <div class=" border-right text-white" id="sidebar-wrapper">
            <div class="sidebar-heading">
                <?php echo session('uname'); ?>
                <p style="padding-left: 10px;font-size: 14px;"><?php echo session('uemail'); ?></p>
            </div>
            <div class="list-group list-group-flush">
                <a href="/admin/dashboard" class="list-group-item list-group-item-action">Dashboard</a>
                <a href="/admin/addseller" class="list-group-item list-group-item-action">Add Seller</a>
                <a href="/admin/manage/sellers" class="list-group-item list-group-item-action ">Manage Sellers</a>
                <a href="/admin/manage/admins" class="list-group-item list-group-item-action ">Manage Admins</a>
                <a href="/admin/manage/users" class="list-group-item list-group-item-action ">Manage Users</a>
            </div>
        </div>

        <div id="page-content-wrapper">

            <nav class="navbar navbar-expand-lg  border-bottom">
                <button class="btn btn-primary" id="menu-toggle">
                    <i class="fa fa-list fa-lg"></i>
                </button>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span></button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                        <li class="nav-item active">
                            <a class="nav-link" href="#"> <i class="fa fa-home fa-lg"></i> Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" onclick="logout()"> <i class="fa fa-reply fa-lg"></i> Logout <span class="sr-only">(current)</span></a>
                        </li>
                    </ul>
                </div>
            </nav>

            <div class="form">
                <form id="sup_form" class="sign-up" style="display: <?php if (session('perms')->PERM_ALL == true || session('perms')->PERM_ADD_ADMIN == true) echo 'block'; else echo 'none'; ?>;">
                    <input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
                    <input type="hidden" name="action" value="add">
                    <div class="form-group">
                        <input type="text" class="form-control" name="uname" placeholder="Admin Name" id="sup_name" required> 
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

                    <div class="form-group">
                        <label>Permissions</label><br>
                        <input type="checkbox" name="pall"> PERM_ALL<br>
                        <input type="checkbox" name="paddadmin"> PERM_ADD_ADMIN<br>
                        <input type="checkbox" name="paddseller"> PERM_ADD_SELLER<br>
                        <input type="checkbox" name="pdeladmin"> PERM_DEL_ADMIN<br>
                        <input type="checkbox" name="pdelseller"> PERM_DEL_SELLER<br>
                        <input type="checkbox" name="pdeluser"> PERM_DEL_USER<br>
                        <input type="checkbox" name="peditseller"> PERM_EDIT_SELLER<br>
                        <input type="checkbox" name="peditadmin"> PERM_EDIT_ADMIN<br>
                    </div>

                    <div onclick="signup_btn_click()" class="btn btn-info btn-block" id="signup_btn"> Create </div>  
                    
                </form>
            <h3 style="display: <?php if (session('perms')->PERM_ALL == true || session('perms')->PERM_ADD_ADMIN == true) echo 'none'; else echo 'block'; ?>;">You don't have permissions to add an admin</h3>
            </div>


        </div>
        <!-- /#page-content-wrapper -->

    </div>

    <script src="{{ asset('js/jquery-3.5.1.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    @include('js.shared_js')
    <script>
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });

        var loadingSymbol = '<div class="fa-3x" style="display: inline-flex"><i class="fas fa-cog fa-spin" style="font-size: 25px;display: block;"></i></div>'
        var cbtn = false;
        function signup_verfiy(){
            if (   isNullOrEmpty(document.getElementById('sup_name').value) 
                || isNullOrEmpty(document.getElementById('sup_email').value)
                || isNullOrEmpty(document.getElementById('sup_pass').value)
                || isNullOrEmpty(document.getElementById('sup_pass2').value)
                || isNullOrEmpty(document.getElementById('sup_addr').value)
                )
                    return false
            if ( document.getElementById('sup_pass').value !== document.getElementById('sup_pass2').value){
                document.getElementById('passvererr').style.display = "block";
                return false;
            }
            return true;
        }
        function signup_btn_click(){
            if ( !signup_verfiy() ){
                console.log("some required fields are empty !");
            }
            else {
                document.getElementById('signup_btn').innerHTML = loadingSymbol;
                $.post(
                    '/admin/manage/admins',
                    $('form#sup_form').serialize(),
                    function (data){
                        console.log(data);
                        if (data['errCode'] == 200){
                            window.location.replace('/admin/manage/admins');
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