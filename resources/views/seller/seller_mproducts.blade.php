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
                <a href="/seller/dashboard" class="list-group-item list-group-item-action">Dashboard</a>
                <a href="/seller/addproduct" class="list-group-item list-group-item-action">Add New Product</a>
                <a href="/seller/addwarehouse" class="list-group-item list-group-item-action ">Add new warehouse</a>
                <a href="/seller/addoffer" class="list-group-item list-group-item-action ">Add New offer</a>
                <a href="/seller/manage/products" class="list-group-item list-group-item-action ">Manage products</a>
                <a href="/seller/manage/warehouses" class="list-group-item list-group-item-action ">Manage warehouses</a>
                <a href="/seller/manage/offers" class="list-group-item list-group-item-action ">Manage Offers</a>
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
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Count</th>
                        <th scope="col">Price</th>
                        <th scope="col">Warehouse</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach ($p_array as $ww) {
                                echo "<tr><td>$ww->name</td>";
                                echo "<td>$ww->description</td>";
                                echo "<td>$ww->available_count</td>";
                                echo "<td>$ww->price</td>";
                                echo "<td>[$ww->wid] $ww->address</td>";
                                echo '<td><button class="btn btn-primary"><i class="fa fa-edit fa-lg"></i></button></td>';
                                echo '<td><button class="btn btn-danger"><i class="fa fa-remove fa-lg"></i></button></td></tr>';

                            }
                        ?>
                    </tbody>
                </table>
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

    </script>
</body>

</html>