<?php
include "comments.php";
require "dbh.php";

$dsn = new PDO("mysql:host=$host;dbname=$db", $user, $password);
$dsn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//--------------- SELECT PHOTOS --------------- \\
//pdo prepare sql string to select images from photos table
$stmtFetchPhotos = $pdo->prepare("SELECT photos_id, URL FROM photos");

//run sql string after prepare
$stmtFetchPhotos->execute();
?>

<?php //Search
  if (isset($_POST["search"])) {
    require "2-search.php";

    if (count($results) > 0) { foreach ($results as $r) {
       //"The format string" består av noll eller fler direktiv: vanliga tecken (exklusive %) som kopieras direkt till resultat- och konverteringsspecifikationerna, som var och en resulterar i att en egen parameter hämtas.
      printf("<div> %s </div>", $r["username"]);
      }} else { echo "No results found"; }
    }
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;600&display=swap"  rel="stylesheet" />
    <link rel="stylesheet" href="css/style.css" />
    <!-- <link rel="stylesheet" href="css/login.style.css" /> -->

    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=, initial-scale=1.0" />

    <title>Instagräm</title>
  </head>


  <body>
    <nav class="navbar">
      <div class="nav-wrapper" class="dropdown">
        <a href="index.php"><img src="img/instagram-logga.png" class="insta-img" alt="" /></a>
        <!-- Search -->
        <form class="search" method="post" action="index.php">
          <input   type="text"placeholder="sök" name="search" required/>
          <input class="mitt" type="submit" value="->"/>
        </form>
        <div class="navigering-items">
          <div class="ikon">
            <i class="fas fa-home"></i>
          </div>
          <div class="ikon">
            <a class="utan" href="upload.php"><i class="far fa-plus-square"></i></a>
          </div>
          <div class="ikon">
            <i class="far fa-paper-plane"></i>
          </div>
          <div class="ikon">
            <i class="far fa-compass"></i>
          </div>
          <div class="ikon">
            <i class="far fa-heart"></i>
          </div>
          <div class="dropdown">
            <div class="dropbtn"><i class="fas fa-user-circle"></i></div>
            <div class="dropdown-content">
              <a class="storlek" href="#"><div class="ikon "><i class="fas fa-user-circle"></i></div>Profil</a>
              <a class="storlek" href="#"><div class="ikon "><i class="far fa-bookmark"></i></div>Spara</a>
              <a class="storlek" href="#"><div class="ikon "><i class="fas fa-user-circle"></i></div>Inställningar</a>
              <a class="storlek" href="#"><div class="ikon "><i class="fas fa-user-circle"></i></div>Byt konto</a>
              <a class="storlek linje" href="Signin.php"><div class="ikon"><i class="fas fa-user-circle"></i></div>Logga ut</a>
            </div>
          </div>
        </div>
      </div>
    </nav>

    <section class="main">
      <div class="wrapper">
        <div class="left-col">
          <div class="status-wrapper">
            <div class="status-card">
              <div class="profile-pic"><img src="img/profil.jpg" alt="" /></div>
              <p class="username">Joel_Stolt</p>
            </div>
            <div class="status-card">
              <div class="profile-pic"><img src="img/p1.jpg" alt="" /></div>
              <p class="username">Filip_falk</p>
            </div>
            <div class="status-card">
              <div class="profile-pic"><img src="img/p2.jpg" alt="" /></div>
              <p class="username">Karin_jonsson</p>
            </div>
            <div class="status-card">
              <div class="profile-pic"><img src="img/p3.jpg" alt="" /></div>
              <p class="username">Melker_A</p>
            </div>
            <div class="status-card">
              <div class="profile-pic"><img src="img/p4.jpg" alt="" /></div>
              <p class="username">Knasen102</p>
            </div>
            <div class="status-card">
              <div class="profile-pic"><img src="img/p5.jpg" alt="" /></div>
              <p class="username">troll_konto</p>
            </div>
            <div class="status-card">
              <div class="profile-pic"><img src="img/p6.jpg" alt="" /></div>
              <p class="username">Bengtsson</p>
            </div>
            <div class="status-card">
              <div class="profile-pic"><img src="img/p7.jpg" alt="" /></div>
              <p class="username">Milko</p>
            </div>
          </div>
          <?php
          //Repeat for each row found from sql above
          while($rowPhotos = $stmtFetchPhotos->fetch()){
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
                <div class="options">
                  <i class="fas fa-ellipsis-h"></i>
                </div>
              </div>
              <img src="<?= $rowPhotos['URL']; ?>" class="post-image" alt="unknown" />
              <div class="post-content">
                <div class="reaction-wrapper">
                  <div class="ikon">
                    <i class="far fa-heart" class="ikon"></i>
                  </div>
                  <div class="ikon">
                    <i class="far fa-comment-alt"></i>
                  </div>
                  <div class="ikon">
                    <i class="far fa-paper-plane" class="ikon"></i>
                  </div>
                  <div class="save ikon">
                    <i class="far fa-bookmark"></i>
                  </div>
                </div>
                <p class="likes">55 likes</p>
                <?php
                //--------------- SELECT COMMENTS (inside loop because $photos_id changes) --------------- \\
                //pdo prepare sql string to select comments from photos table where photo_id in comments table == photos_id in photos table AND comment is not 'deleted'
                $stmtFetchComments = $pdo->prepare("SELECT comment_id, comment FROM comments WHERE photo_id = :photos_id AND deleted != 1");

                //bind photos_id to :photos_id
                $stmtFetchComments->bindValue('photos_id', $photos_id);

                //run sql
                $stmtFetchComments->execute();

                //Repeat for each row
                while($rowComments = $stmtFetchComments->fetch()){
                  $commentId = $rowComments["comment_id"];
                  ?>
                  <div id="<?= $commentId ?>">
                    <p class="description">
                      <span>Användarnamn</span>
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
                <div class="ikon">
                  <i class="far fa-smile"></i>
                </div>
                <form method="POST" id="commentForm">
                  <input type="hidden" name="photos_id" value="<?= $photos_id ?>">
                  <input type="text" class="comment-box" name="comment_section" placeholder="Lägg till kommentar"/>
                  <button name="submit_comment" type="submit" class="comment-btn">Post</button>
                </form>
              </div>
            </div>  
            <?php
          }
          ?>
        </div>
        <div class="right-col">
          <p class="Suggestion-text">Förslag att följa</p>
          <div class="profile-card">
            <div class="profile-pic">
              <img src="img/randon-foto8.jpg" alt="" />
            </div>
            <div>
              <p class="username">Pontus</p>
              <p class="sub-text">Ponta_1</p>
            </div>
            <button class="action-btn">Följ</button>
          </div>
          <div class="profile-card">
            <div class="profile-pic">
              <img src="img/randon-foto6.jpg" alt="" />
            </div>
            <div>
              <p class="username">Micke</p>
              <p class="sub-text">Micke_1</p>
            </div>
            <button class="action-btn">Följ</button>
          </div>
          <div class="profile-card">
            <div class="profile-pic">
              <img src="img/randon-foto2.jpg" alt="" />
            </div>
            <div>
              <p class="username">Åsa</p>
              <p class="sub-text">Åsa_1</p>
            </div>
            <button class="action-btn">Följ</button>
          </div>
        </div>
      </div>
    </section>
    <script src="js/index.js"></script>
  </body>
</html>
