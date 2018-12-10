<?php
require("../global.php");
?>
<!doctype html>
<html lang="en">
<?php
require("tpl/header.php");
require("tpl/navbar.php");
?>
<style>
    table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
    }
</style>
<script type="text/javascript">
    function notifyBateau() {
        $(document).ready(function () {

            demo.initChartist();

            $.notify({
                icon: 'pe-7s-gift',
                message: "Bienvenue <b>Panel Administration de MarieTeam</b>"

            }, {
                type: 'info',
                timer: 4000
            });

        });
    }
</script>
<body>
<div class="main-panel">
    <nav class="navbar navbar-default navbar-fixed">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">User</a>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-left">
                    <li>
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-dashboard"></i>
                            <p class="hidden-lg hidden-md">Dashboard</p>
                        </a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-globe"></i>
                            <b class="caret hidden-sm hidden-xs"></b>
                            <span class="notification hidden-sm hidden-xs">5</span>
                            <p class="hidden-lg hidden-md">
                                5 Notifications
                                <b class="caret"></b>
                            </p>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Notification 1</a></li>
                            <li><a href="#">Notification 2</a></li>
                            <li><a href="#">Another notification</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="">
                            <i class="fa fa-search"></i>
                            <p class="hidden-lg hidden-md">Search</p>
                        </a>
                    </li>
                </ul>

                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="">
                            <p>Account</p>
                        </a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <p>
                                Dropdown
                                <b class="caret"></b>
                            </p>

                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Action</a></li>
                            <li><a href="#">Another action</a></li>
                            <li><a href="#">Something</a></li>
                            <li><a href="#">Another action</a></li>
                            <li><a href="#">Something</a></li>
                            <li class="divider"></li>
                            <li><a href="#">Separated link</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">
                            <p>Log out</p>
                        </a>
                    </li>
                    <li class="separator hidden-lg hidden-md"></li>
                </ul>
            </div>
        </div>
    </nav>


    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Liste des comptes</h4>
                        </div>


                            <table id="tabuser" class="table table-striped table-bordered" style="width:100%">
                                <script>
                                    $(document).ready(function() {
                                        $('#tabuser').DataTable();
                                    } );
                                </script>
                                <div class="Tableau">
                                <?php
                                $req = $db->connection()->prepare('SELECT * FROM bateau');
                                $req->execute();
                                $rows = $req->rowCount();

                                ?>
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nom</th>
                                    <th>Type</th>
                                    <th>Capacité</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                //print_r($data);
                                if ($rows != 0) {
                                    for ($i = 1; $i <= $rows; $i++) {
                                        $data = $req->fetch();
                                        ?>
                                        <tr>
                                            <th> <?=$data['idBateau']?></th>
                                            <th> <?=$data['nom']?> </th>
                                            <th> <?=$data['typeBateau'] ?></th>
                                            <th> <?=$data['capaciteBateau'] ?></th>
                                        </tr>
                                        <?php
                                    }
                                }
                                else{
                                    if ($rows == 0) {

                                }
                                }

                                ?>
                                </div>
                                </tbody>
                            </table>
                            <h4 class="title">Ajouter un bateau</h4>
                                <form action="createbateau.php" method="post">
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Nom</label>
                                        <input type="text" value="<?=@$_POST['nom'] ?>" class="form-control" placeholder=" " name="nom" id="nom" required="">
                                    </div>
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Type</label>
                                        <input type="text" value="<?=@$_POST['typeBateau'] ?>"  class="form-control" placeholder=" " name="typeBateau" id="typeBateau" required="">
                                    </div>
                                    <div class="form-group">
                                        <label for="recipient-email" class="col-form-label">Capacité</label>
                                        <input type="text" value="<?=@$_POST['capaciteBateau'] ?>"  class="form-control" placeholder=" " name="capaciteBateau" id="mail" required="">
                                    </div>
                                    <div class="right-w3l">
                                        <input type="submit" class="form-control serv_bottom" value="Ajouter">
                                    </div>
                                </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
</div>
</div>
<footer class="footer">
    <div class="container-fluid">
        <nav class="pull-left">
            <ul>
                <li>
                    <a href="#">
                        Home
                    </a>
                </li>
                <li>
                    <a href="#">
                        Company
                    </a>
                </li>
                <li>
                    <a href="#">
                        Portfolio
                    </a>
                </li>
                <li>
                    <a href="#">
                        Blog
                    </a>
                </li>
            </ul>
        </nav>
        <p class="copyright pull-right">
            &copy; <script>document.write(new Date().getFullYear())</script> <a href="http://www.creative-tim.com">Creative Tim</a>, made with love for a better web
        </p>
    </div>
</footer>

</div>
</div>


</body>

<!--   Core JS Files   -->
<script src="assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

<!--  Charts Plugin -->
<script src="assets/js/chartist.min.js"></script>

<!--  Notifications Plugin    -->
<script src="assets/js/bootstrap-notify.js"></script>

<!--  Google Maps Plugin    -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>

<!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
<script src="assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>

<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
<script src="assets/js/demo.js"></script>

</html>
