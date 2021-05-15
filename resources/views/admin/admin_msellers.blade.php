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

        <!-- Sidebar -->
        <div class=" border-right text-white" id="sidebar-wrapper">
            <div class="sidebar-heading">
                <?php

use App\Models\AdminPermissions;

echo session('uname'); ?>
                <p style="padding-left: 10px;font-size: 14px;"><?php echo session('uemail'); ?></p>
            </div>
            <div class="list-group list-group-flush">
                <a href="/admin/dashboard" class="list-group-item list-group-item-action">Dashboard</a>
                <a href="/admin/addseller" class="list-group-item list-group-item-action">Add Seller</a>
                <a href="/admin/addadmin" class="list-group-item list-group-item-action ">Add new admin</a>
                <a href="/admin/manage/admins" class="list-group-item list-group-item-action ">Manage Admins</a>
                <a href="/admin/manage/users" class="list-group-item list-group-item-action ">Manage Users</a>
            </div>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">

            <nav class="navbar navbar-expand-lg  border-bottom">
                <button class="btn btn-primary" id="menu-toggle">
                    <i class="fa fa-list fa-lg"></i>
                </button>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span></button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="#"> <i class="fa fa-home fa-lg"></i> Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" onclick="logout()"> <i class="fa fa-reply fa-lg"></i> Logout <span class="sr-only">(current)</span></a>
                        </li>
                    </ul>
                </div>
            </nav>

            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                        <th scope="col">Seller Name</th>
                        <th scope="col">Company Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Password</th>
                        <th scope="col">Address</th>
                        <th scope="col">Started At</th>
                        <th scope="col">Average Rate</th>
                        <th scope="col">Added By</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $perms = session('perms');
                            if ($perms->PERM_ALL == true
                            || $perms->PERM_EDIT_SELLER == true 
                            || $perms->PERM_DEL_SELLER == true )
                                foreach ($array_sellers as $seller) {
                                    echo "<tr><td>$seller->username</td>";
                                    echo "<td>$seller->company_name</td>";
                                    echo "<td>$seller->email</td>";
                                    echo "<td>$seller->password</td>";
                                    echo "<td>$seller->address</td>";
                                    echo "<td>$seller->started_at</td>";
                                    echo "<td>$seller->average_rate</td>";
                                    echo "<td>$seller->added_by</td>";
                                    if ($perms->PERM_EDIT_SELLER == true || $perms->PERM_ALL == true)
                                        echo '<td><button class="btn btn-primary"><i class="fa fa-edit fa-lg"></i></button></td>';
                                    if ($perms->PERM_DEL_SELLER == true || $perms->PERM_ALL == true)
                                        echo '<td><button class="btn btn-danger" onclick="delete_admin(' . $seller->id . ')"><i class="fa fa-remove fa-lg"></i></button></td>';
                                    echo '</tr>';
                                }
                            else {
                                echo "<center><h3>You don't have the permissions to manage sellers !</p></center>";
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    <script src="{{ asset('js/jquery-3.5.1.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    @include('js.shared_js')
    <script>
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
        function delete_admin(id){
            $.post(
                '/admin/manage/sellers',
                {
                    '_token': "<?php echo csrf_token() ?>",
                    'action': "delete",
                    'id': id
                },
                function (data){
                    if (data['errCode'] == 200){
                        alert("Deleted !");
                        location.reload();
                    }
                },
                'json'
            );
        }
    </script>
</body>

</html>