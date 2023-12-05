<header class = 'header flex space-between'>
    <h3>
        Medieval Game
    </h3>
    <nav>
        <div class = 'flex align-center'>
            <div class = 'mar-right-8 dropdown'>
                <p>Tools</p>
                <div class="dropdown-content">
                    <p>
                        <a href="../pages/tools/draw.php">Draw</a>
                    </p>
                </div>
            </div>
        <a href='../pages/game.php' class = 'mar-right-8'>Play</a>
            <?php
            if(isset($_SESSION['userid'])) {
                echo "<div>
                   
                    <a href = '../pages/logout.php'> Logout</a>
                    </div>";
            } else {
                echo "<a href = 'login.php'> Log in </a>";
            }
            ?>
        </div>

    </nav>
   
</header>