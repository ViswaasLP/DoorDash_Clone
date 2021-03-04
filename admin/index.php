
    <?php include("partials/menu.php");?>

    <!-- main section begins here -->
    <div class="main">
        <div class="wrapper">
            <h1>DASHBOARD</h1>
            <br><br>
            <?php 
                if(isset($_SESSION['login'])){
                    echo $_SESSION['login'];
                    unset($_SESSION['login']);
                }
            ?>
            <br><br>
            <div class="col-4 text-center">
                <h1>5</h1>
                Categories
            </div>
            <div class="col-4 text-center">
                <h1>5</h1>
                Categories
            </div>
            <div class="col-4 text-center">
                <h1>5</h1>
                Categories
            </div>
            <div class="col-4 text-center">
                <h1>5</h1>
                Categories
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <!-- main section ends here -->

    <!-- footer section begins here -->
    <?php include("partials/footer.php");?>

    <!-- footer section ends here -->

