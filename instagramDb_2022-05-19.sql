# ************************************************************
# Sequel Ace SQL dump
# Version 20033
#
# https://sequel-ace.com/
# https://github.com/Sequel-Ace/Sequel-Ace
#
# Host: localhost (MySQL 5.7.34)
# Database: instagramDb
# Generation Time: 2022-05-19 17:27:22 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
SET NAMES utf8mb4;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE='NO_AUTO_VALUE_ON_ZERO', SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table comments
# ------------------------------------------------------------

DROP TABLE IF EXISTS `comments`;

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `photo_id` int(11) DEFAULT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`comment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;

INSERT INTO `comments` (`comment_id`, `user_id`, `photo_id`, `comment`, `deleted`)
VALUES
	(19,NULL,1,'test 2',1),
	(20,NULL,3,'Funny bubbles man',0),
	(21,NULL,1,'Nice nail color Jenny',0),
	(22,NULL,1,'This will forever be a deleted comment',1),
	(23,NULL,1,'Such great hands! Why are the screens off??!  Amongus Sus',0),
	(24,NULL,3,'Get better lol',0),
	(25,NULL,1,'test 3',1),
	(26,NULL,1,'This is a test',1),
	(27,NULL,4,'Nice wallpaper',0),
	(28,NULL,5,'great job john',1),
	(29,7,10,'cool',0),
	(30,8,12,'hallo',1),
	(31,8,12,'halloooo',1),
	(32,9,12,'aaa',1),
	(33,9,13,'whats up',0),
	(34,9,11,'hej',0),
	(35,9,10,'galaxy',0);

/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table followers
# ------------------------------------------------------------

DROP TABLE IF EXISTS `followers`;

CREATE TABLE `followers` (
  `follow_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `follower_id` int(11) DEFAULT NULL,
  `following_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`follow_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `followers` WRITE;
/*!40000 ALTER TABLE `followers` DISABLE KEYS */;

INSERT INTO `followers` (`follow_id`, `follower_id`, `following_id`)
VALUES
	(6,9,1),
	(10,9,3),
	(11,9,3),
	(12,9,7);

/*!40000 ALTER TABLE `followers` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table likes
# ------------------------------------------------------------

DROP TABLE IF EXISTS `likes`;

CREATE TABLE `likes` (
  `user_id` int(11) DEFAULT NULL,
  `likes_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `photo_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`likes_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table photos
# ------------------------------------------------------------

DROP TABLE IF EXISTS `photos`;

CREATE TABLE `photos` (
  `photos_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `caption` varchar(255) DEFAULT NULL,
  `URL` varchar(255) DEFAULT NULL,
  `photos_time` datetime(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6),
  PRIMARY KEY (`photos_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `photos` WRITE;
/*!40000 ALTER TABLE `photos` DISABLE KEYS */;

INSERT INTO `photos` (`photos_id`, `user_id`, `caption`, `URL`, `photos_time`)
VALUES
	(10,7,'Future','user_image/nedladdning (4).jpeg','2022-05-15 14:39:01.864187'),
	(11,7,'no caption needed','user_image/boris-baldinger-6Ogl3xacOlM-unsplash.jpeg','2022-05-15 16:16:16.450558'),
	(12,8,'hello','user_image/nedladdning.jpeg','2022-05-15 18:00:06.384216'),
	(13,9,'samui','user_image/koh samui.jpeg','2022-05-19 15:46:25.513684');

/*!40000 ALTER TABLE `photos` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`user_id`, `username`, `password`, `email`)
VALUES
	(1,'Filip_falk','falken','Filip@gmail.com'),
	(2,'Micke','micke','micke@gmail.com'),
	(3,'Åsa','åsa','Åsa@gmail.com'),
	(4,'maria','$2y$12$sBBLP7govbELDam8KCB32u8OfYaqbaYu6SN2FR9UFL.3hLivsr7AC','maria@gmail.com'),
	(5,'maria2','$2y$12$N.2BP2RqmOodtrPed18M7OJF7S.lYGI/tqNURJvK291EgwTO9Ds0i','maria2@gmail.com'),
	(6,'mikkos','$2y$12$orsVb5BkUOazfQzTeCeYBOaVUa9GVmyZkFJ6YMSii1wsyuGtQH3NO','mikko@gmail.com'),
	(7,'testkonto','$2y$12$.ztgfwTYhQRuTBv5x6fdWuamI.ZPgXKB8vLJbYQ47ZbGHizfAIQ1K','test@gmail.com'),
	(8,'benjamin','$2y$12$qKlbGT0rsvUvUNFwEx8jguCJ8OwfYbHGhKSH1dr1HCZQmuqT7MPxG','benjamin@test.test'),
	(9,'blizzard','$2y$12$2o8dqfwmxckKLW7SvpLYh.rMrGQCkr0HmOPqKPiOsy2jdzoaLQdQq','blizzard@demo.demo');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
