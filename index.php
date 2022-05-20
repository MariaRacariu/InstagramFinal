<?php
include "comments.php";
require "dbh.php";

session_start();
$user_id = $_SESSION['user_id'];
$username = $_SESSION['users'];

$dsn = new PDO("mysql:host=$host;dbname=$db", $user, $password);
$dsn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//--------------- SELECT PHOTOS --------------- \\
//pdo prepare sql string to select images from photos table
$stmtFetchPhotos = $pdo->prepare('SELECT * FROM users INNER JOIN photos ON users.user_id = photos.user_id
INNER JOIN followers ON users.user_id = followers.following_id WHERE followers.follower_id = :follower_id
ORDER BY photos_time DESC');
$stmtFetchPhotos->bindValue('follower_id', $user_id);
//run sql string after prepare
$stmtFetchPhotos->execute();

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

  <title>Instagräm</title>
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
                            <a class="utan" href="profile.php"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16"><path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/></svg>Add Friends</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>



  <section class="main">


    <div class="wrapper">
    <div>
      <?php

    $getUsers = $pdo->prepare("SELECT user_id, username FROM users WHERE NOT username ='$username'");
    $getUsers->execute();

    $results = $getUsers->fetchAll(PDO::FETCH_CLASS);

    echo '<ul>';
    foreach ($results as $users) {
        echo '<li><a href="./profile.php?user_id=' . $users->user_id . '">' . ($users->username) . '</a></li>';
    }
    echo  '</ul>';
?>
      </div>
      <?php
      //Repeat for each row found from sql above
      while ($rowPhotos = $stmtFetchPhotos->fetch()) {
        $photos_id = $rowPhotos['photos_id'];
        ?>

        <div class="post">


          <div class="info">


            <div class="user">


              <div class="profile-pic">
                <img src="img/p1.jpg" alt="" />
              </div>


              <p class="username">Instagram_grupp5</p>
            </div>


          </div>


          <div class="image-caption">
            <p><?= $rowPhotos['caption'] ?></p>
          </div>


          <img src="<?= $rowPhotos['URL']; ?>" class="post-image" alt="unknown" />


          <div class="post-content">


            <div class="reaction-wrapper">
              <div class="ikon">
                <i class="far fa-heart" class="ikon"></i>
              </div>
            </div>


            <p class="likes">55 likes</p>

            <?php




            //--------------- SELECT COMMENTS (inside loop because $photos_id changes) --------------- \\
            //pdo prepare sql string to select comments from photos table where photo_id in comments table == photos_id in photos table AND comment is not 'deleted'
            $stmtFetchComments = $pdo->prepare("SELECT comment_id, comment, user_id FROM comments WHERE photo_id = :photos_id AND deleted != 1");

            //bind photos_id to :photos_id
            $stmtFetchComments->bindValue('photos_id', $photos_id);

            //run sql
            $stmtFetchComments->execute();

            //Repeat for each row
            while ($rowComments = $stmtFetchComments->fetch()) {
              $commentId = $rowComments["comment_id"];
              $users_id = $rowComments["user_id"];

              $stmtFetchUsername = $pdo->prepare("SELECT username FROM users WHERE user_id = :userid");

              // bind user_id to : user_id
              $stmtFetchUsername->bindValue('userid', $users_id);
              
              // run sql
              $stmtFetchUsername->execute();

              while ($rowUsers = $stmtFetchUsername->fetch()) {
                $username = $rowUsers["username"];
              }

              ?>

              <div id="<?= $commentId ?>">

                <p class="description">
                  <span><?= $username; ?></span>
                  <!-- shorthand for php echo comment-->
                  <?= $rowComments["comment"]; ?>
                </p>

                <form method="POST" id="deleteCommentForm">
                  <input type="hidden" name="commentId" value="<?= $commentId ?>">
                  <!-- data-comment-id is for external javascript -->
                  <button name="deleteButton" class="deleteButton" data-comment-id="<?= $commentId ?>">Delete</button>
                </form>

              </div>


            <?php

          }
          ?>
          </div>


          <div class="comment-wrapper">
            <form method="POST" id="commentForm">
              <input type="hidden" name="photos_id" value="<?= $photos_id ?>">
              <input type="hidden" name="user_id" value="<?= $user_id ?>">
              <input type="text" class="comment-box" name="comment_section" placeholder="Lägg till kommentar" autocomplete="off"/>
              <button name="submit_comment" type="submit" class="comment-btn">Post</button>
            </form>
          </div>


    </div>

  <?php

}
?>
  </div>


  </section>
  <script src="js/index.js"></script>
</body>

</html>