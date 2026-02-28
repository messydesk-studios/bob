-- MySQL dump 10.13  Distrib 9.4.0, for macos15.4 (arm64)
--
-- Host: localhost    Database: marketplace2
-- ------------------------------------------------------
-- Server version	9.4.0

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categories` (
  `id` varchar(500) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES ('1','bag'),('4','books'),('5','games'),('6','food'),('7','Souvenir'),('8','miscellaneous'),('9','music');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `products` (
  `id` int NOT NULL AUTO_INCREMENT,
  `product_name` varchar(100) NOT NULL,
  `descriptions` varchar(1000) DEFAULT NULL,
  `images` varchar(2048) DEFAULT NULL,
  `category` varchar(500) DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `stock` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `products_ibfk_1` (`category`),
  CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category`) REFERENCES `categories` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (3,'Tomato','Tomato very yum. I like tomato because it taste gud. Tomtato is red like ketchup. I also like tomato cuz it m-m-massive. I am huse fan of tomtato because it very healthy. Tommaato make you strong.	','https://upload.wikimedia.org/wikipedia/commons/8/89/Tomato_je.jpg','4',5.00,7),(4,'Cat in the hat','This is a hard cover book of the classic childrens novel by doctor suess called cat in the hat.I liked the book because it reflects on the social issues of boredom and rain. This raises awarness on the need for fun and talking cats. this book was written by dr. sooos and he is a gud riter. Dr. Suess is good at writing cuz he made cat in the hat,','https://upload.wikimedia.org/wikipedia/en/thumb/1/10/The_Cat_in_the_Hat.png/250px-The_Cat_in_the_Hat.png','1',10.00,2),(7,'Avocado','The avocado, alligator pear or avocado pear (Persea americana) is an evergreen tree in the laurel family (Lauraceae).','https://www.dole.com/sites/default/files/media/avocados-cut-web.png','1',18.00,10),(8,'Orange','The orange, also called sweet orange to distinguish it from the bitter orange (Citrus × aurantium), is the fruit of a tree in the family Rutaceae. Botanically, this is the hybrid Citrus × sinensis, between the pomelo (Citrus maxima) and the mandarin orange (Citrus reticulata).','https://digital.loblaws.ca/PCX/20079199001_KG/en/1/20079199001_en_front_800.png','1',7.50,4),(12,'Bob','Bob Mister is commonly referred to as Mr. Bob(he doesn\'t like being called Mr. Mister). He is the CEO and owner of the company. Bob started out working as a mascot in Chol-hee cheese until he created a marketplace for Bobs. Bob likes to cook, play soccer and have bites of Cheese.','images/bob.png','4',1000000.00,2),(13,'M&M\'s','Skittles taste better','https://allcitycandy.com/cdn/shop/products/m_mmilkchocolatebagfront2_2048x.jpg?v=1651519269','6',1.00,3),(14,'Peanut butter','Peanut butter is a food paste or spread made from ground, dry-roasted peanuts. It commonly contains additional ingredients that modify the taste or texture, such as salt, sweeteners, or emulsifiers. Consumed in many countries, it is the most commonly used of the nut butters, a group that also includes cashew butter and almond butter.','https://shop.smucker.com/cdn/shop/files/ejx0fueklbqxuvg1if89.jpg?v=1702052839&width=1400','4',10.00,3),(15,'Anthology 4 - The Beatles','Anthology 4 is the fourth addition to the Anthology series. It was released on the 21st of November of 2025. The Album contains a collection of outtakes, demos and alternate versions and rehearsals.','https://upload.wikimedia.org/wikipedia/commons/c/c8/Anthology_Four_cover.jpg','4',1750.00,1),(16,'Arab Pen','Ink is replaced with oil!','https://aljabergallery.com/wp-content/uploads/2025/07/MC-53-0038-2-1-scaled.jpg','7',3000.00,1),(17,'The Orb','The Orb','https://i1.sndcdn.com/artworks-IN9koLgjJsFfLRyl-1a5kng-t240x240.jpg','8',-10000.00,3),(18,'The world','The Earth is the third planet in the system. It comes with water, plants, animals and kinda intelligent lifeforms known as humans. No one is gonna afford this. So why not put it for sale.','https://qz.com/cdn-cgi/image/width=300,height=300,fit=cover,quality=85,format=auto/https://assets.qz.com/media/51d6f34278e1a0fe5880d48d7937eefa.jpg','8',1.00,3),(19,'Two dolla dolla tip','get two dollars for only two dollars','https://thumbs.dreamstime.com/b/hand-holds-two-dollars-8909033.jpg','8',100.00,1),(20,'Dark Side of the Moon - Pink Floyd','The Dark Side of the moon is an album released by the British band, Pink Floyd. It was recorded in Abbey Road studios and was released in 1973. The concept album contains 10 songs and is available on Vinyl.','https://i.scdn.co/image/ab67616d0000b273db216ca805faf5fe35df4ee6','9',2000000.00,1),(21,'Apple','This is the US company called Apple mainly known for tech products.','https://upload.wikimedia.org/wikipedia/commons/f/fa/Apple_logo_black.svg','8',50.00,10),(22,'Apple','Apples are a common fruit that appears in grocery stores often.','https://img.freepik.com/free-psd/close-up-delicious-apple_23-2151868338.jpg?semt=ais_hybrid&w=740&q=80','4',4000000.00,1),(23,'Fart Boy','do you like funny books then your in luck i like fart boy becase of the storyline it is a about a neat kid who became a farting spechelst and make pepole puke fast. I love Fart boy because the unique art style it is Eye catching and appealing. Danger: you might be disgusted.','https://d3ddkgxe55ca6c.cloudfront.net/assets/t1615455784/a/93/7b/207717-ml-1990749.jpg','4',500.00,1),(24,'Texas Math Notebook 3.1','This is a good work book for people who want to learn or improve their skills in math. It is also good for people who live in Texas.','https://m.media-amazon.com/images/I/8164GuWyTTL._AC_UF1000,1000_QL80_.jpg','4',750.00,3),(28,'Carrots','Carrot very yum.','https://goodfinds.ph/wp-content/uploads/2022/08/FindsVegetables-34.jpg','6',10.00,7),(29,'Lettuce','I like lettuce because its green.','https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS-11vyj9efsoDb6S8V5JAHahd8Fr5qeZwPpA&s','4',10.00,12),(30,'Onion','Onion','https://produits.bienmanger.com/36700-0w470h470_Organic_Red_Onion_From_Italy.jpg','4',10.00,4);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-02-21 10:40:53
