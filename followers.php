<?php 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="css/style.css" />

    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=, initial-scale=1.0" />

    <title>Instagräm followers</title>
</head>

<body>
<nav class="navbar">
    <div class="nav-wrapper" class="dropdown">
        <a href="index.php"><img src="img/instagram-logga.png" class="insta-img" alt=""></a>
        <div class="navigering-items">
            <div class="ikon">
                <a class="utan" href="upload.php"><i class="far fa-plus-square"></i></a>
            </div>
            <div class="dropdown">
                <div class="dropbtn">
                    <i class="fas fa-user-circle"></i>
                </div>
                <div class="dropdown-content">
                    <a href="Signin.php"><div class="ikon"><i class="fas fa-user-circle"></i></div>Log out</a>
                    <div class="ikon">
                        <div>
                            <a class="utan" href="followers.php"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16"><path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/></svg>Add Friends</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>  
</body>
</html>