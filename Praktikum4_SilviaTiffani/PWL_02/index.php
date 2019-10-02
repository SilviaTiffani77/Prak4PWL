<?php
session_start();
include_once 'db_function/db_helper.php';
include_once 'db_function/insurance_func.php';
include_once 'db_function/patient_func.php';
include_once 'db_function/user_func.php';

if (!isset($_SESSION['user_loged'])){
    $_SESSION['user_loged'] = false;
}



?>
<!DOCTYPE html>
<html>
    <head>
        <title>Rumah Sakit</title>
        <script src="js/my_insurance.js"></script>
        <script src="js/my_patient.js"></script>
    </head>
    <body>
        <div class="page">
            <?php
            if ($_SESSION['user_loged']){

            ?>
            <header><h2><font face="Comic Sans Ms">Rumah Sakit</font></h2></header>

            <!--Jika yang Login adalah role 1-->
            <?php if ($_SESSION['role'] == 1) {
                ?>
                    <h4>Menu</h4>
                    <nav>
                        <ul>
                            <li><a href="?menu=hm">Home</a></li>
                            <li><a href="?menu=at">About</a></li>
                            <li><a href="?menu=p">Patient</a></li>
                            <li><a href="?menu=i">Insurance</a></li>
                            <li><a href="?menu=u">User</a></li>
                            <li><a href="?menu=out">Logout</a></li>
                        </ul>
                    </nav><br>
                    <main>
                        <?php
                        $targetMenu = filter_input(INPUT_GET, 'menu');
                        switch ($targetMenu) {
                            case 'hm':
                                include_once 'view/home.php';
                                break;
                            case 'at':
                                include_once 'view/about.php';
                                break;
                            case 'p':
                                include_once 'view/patient.php';
                                break;
                            case 'i':
                                include_once 'view/insurance.php';
                                break;
                            case 'iu':
                                include_once 'view/insurance_update.php';
                                break;
                            case 'up':
                                include_once 'view/patient_update.php';
                                break;
                            case 'out':
                                session_destroy();
                                header("location:index.php");
                                break;
                            default:
                                include_once 'view/home.php';
                                break;
                        }
                        ?>
                    </main>

            <!--Jika yang login adalah role 2 -->

                <?php
            } elseif ($_SESSION['role'] == 2) {
                ?>
                    <nav>
                        <ul>
                            <li><a href="?menu=hm">Home</a></li>
                            <li><a href="?menu=at">About</a></li>
                            <li><a href="?menu=p">Patient</a></li>
                            <li><a href="?menu=i">Insurance</a></li>
                            <li><a href="?menu=out">Logout</a></li>
                        </ul>
                    </nav>

                    <main>
                        <?php
                        $targetMenu = filter_input(INPUT_GET, 'menu');
                        switch ($targetMenu) {
                            case 'hm':
                                include_once 'view/home.php';
                                break;
                            case 'at':
                                include_once 'view/about.php';
                                break;
                            case 'p':
                                include_once 'view/patient.php';
                                break;
                            case 'i':
                                include_once 'view/insurance.php';
                                break;
                            case 'iu':
                                include_once 'view/insurance_update.php';
                                break;
                            case 'up':
                                include_once 'view/patient_update.php';
                                break;
                            case 'out':
                                session_destroy();
                                header("location:index.php");
                                break;
                            default:
                                include_once 'view/home.php';
                                break;
                        }
                        ?>
                    </main>
            <!--Jika yang Login adalah role 3 -->
            <?php
            } elseif ($_SESSION['role'] == 3) {?>
                    <nav>
                        <ul>
                            <li><a href="?menu=hm">Home</a></li>
                            <li><a href="?menu=at">About</a></li>
                            <li><a href="?menu=p">Patient</a></li>
                            <li><a href="?menu=out">Logout</a></li>
                        </ul>
                    </nav>
                    <main>
                        <?php
                        $targetMenu = filter_input(INPUT_GET, 'menu');
                        switch ($targetMenu) {
                            case 'p':
                                include_once 'view/patient.php';
                                break;
                            case 'up':
                                include_once 'view/patient_update.php';
                                break;
                            case 'out':
                                session_destroy();
                                header("location:index.php");
                                break;
                            default:
                                include_once 'view/home.php';
                                break;
                        }
                        ?>
                    </main>
            <?php
                }
            ?>
            <?php
            } else {
                include_once 'view/login.php';
            }
            ?>


                <footer>Pemrograman Web 2 &copy;2019</footer>


            <!-- <nav>
                <ul><font face="Comic Sans Ms">
                    <li><a href="?menu=hm">Home</a></li>
                    <li><a href="?menu=at">About</a></li>
                    <li><a href="?menu=p">Patient</a></li>
                    <li><a href="?menu=i">Insurance</a></li>
                    <li><a href="?menu=u">User</a></li>
                    <li><a href="?menu=out">Logout</a></li>
                    </font>
                     style="visibility:hidden;"
                </ul>
            </nav>
                -->

        </div>
    </body>


</html>
