-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2018 at 10:25 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `new_project#09`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Admin_id` varchar(8) NOT NULL,
  `Age` int(2) NOT NULL,
  `Address` text NOT NULL,
  `last_nameL` varchar(15) NOT NULL,
  `First_name` varchar(15) NOT NULL,
  `Password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Admin_id`, `Age`, `Address`, `last_nameL`, `First_name`, `Password`) VALUES
('root1', 24, '3909  avenue de Port-Royal, Bonaventure, Quebec G0C 1E0', 'Thompson', 'David', 'root1'),
('root2', 20, '2105  A Avenue, Edmonton, Alberta T5J 0K7', 'Michele ', 'Griego', 'root2');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `Brand_name` varchar(50) NOT NULL,
  `Brand_trade_mark` varchar(500) NOT NULL,
  `Website` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`Brand_name`, `Brand_trade_mark`, `Website`) VALUES
('Dove', 'https://commons.wikimedia.org/wiki/File:Dove_logo.png', 'www.dove.com'),
('Funko', 'https://static1.squarespace.com/static/58ad62e48419c2dd18e24323/58b2b4eaa5790a958ba8c069/59dabbedd7bdcef13184fd48/1507514052319/image-Funko-new-logo.png?format=500w', 'www.funko.com'),
('Head & Shoulders', 'https://seeklogo.com/images/H/head-shoulders-logo-80AC5E9C0F-seeklogo.com.png', 'www.headandshoulders.ca/en-ca'),
('L\'Oreal Paris', 'https://botw-pd.s3.amazonaws.com/styles/logo-thumbnail/s3/0016/7547/brand.gif?itok=VflyCt_V', 'www.lorealparis.ca/en'),
('LEGO', 'https://upload.wikimedia.org/wikipedia/commons/thumb/2/24/LEGO_logo.svg/1024px-LEGO_logo.svg.png', 'shop.lego.com'),
('Pantene', 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOAAAADgCAMAAAAt85rTAAABEVBMVEX///+DkZ3M0tYXNkwVNEoAACUAHTYiOE1GXm8AFjMAHDYOLUShq7Tx8/QAAB0AKkRIWmmRnafd4OTEzdNYZ3aWo6sAETArP1K0v8dATV7ctWvk6Ou+x80AACIAGDTT2NsAAAB2h5L8+fMfLUAAACj07uT27NrbsmXw4MMACSzmypcAABo/VGUAABTy5MrOqmneuXTt2bbgvn3kxY1pfInQp1wAACzYrFi/mlvozp/k1Lmzi0fZyK7p39DCnl+yjVBhb3wsSFs1SFqrfiuss7oYLUENEyYAAA0wPEa4lmDQto3Jqne/lUnPupmtgzzXuoYOGSVUbH0bIjXYv5bAonPDm1TUsXSdbyengEHEqX+hcRl3i6x8AAAMCUlEQVR4nO2cCXeiyBbHUQhGkOCuUYMtEVxiFFzaLaDZ+nViYl', 'www.pantene.ca/en-ca');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `User_id` varchar(8) NOT NULL,
  `Age` int(2) NOT NULL,
  `Address` text NOT NULL,
  `Balance` decimal(8,2) NOT NULL,
  `Last_name` varchar(15) NOT NULL,
  `First_name` varchar(15) NOT NULL,
  `Password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`User_id`, `Age`, `Address`, `Balance`, `Last_name`, `First_name`, `Password`) VALUES
('110', 20, 'sas', '10166.92', 'asda', 'stephen', '110'),
('110110', 20, 'On earth', '1298.39', 'Tim', 'Ben', '110110'),
('119', 19, 'Calgary', '1298.39', 'Dry', 'Cananda', '123'),
('12345677', 20, 'University Dr NW, Calgary, Alberta', '1298.39', 'on', 'cyth', 'qwertyui'),
('30026610', 21, 'University Dr NW, Calgary, Alberta', '500.00', 'Ding', 'Jianan', '1111100000');

-- --------------------------------------------------------

--
-- Table structure for table `online_shops`
--

CREATE TABLE `online_shops` (
  `Shop_name` varchar(50) NOT NULL,
  `Shop_trade_mark` varchar(500) NOT NULL,
  `Website` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `online_shops`
--

INSERT INTO `online_shops` (`Shop_name`, `Shop_trade_mark`, `Website`) VALUES
('London Drug', 'https://appointments.londondrugs.com/img/london-drugs-logo.jpg', 'www.londondrugs.com'),
('Real Canadian Superstore', 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOEAAADhCAMAAAAJbSJIAAABklBMVEX////9/////f////7+//wdfLz//f4AAAD///qr1fEAc8D6//9Skr39//3//fz/+//vLSTuLSf/9/jsLyPzKyTxKyfuLSDtLyrqMCH/9e/xLB////b5//vvKyznLyMAc7//zcn/6uj/8e5lZWVvb2//7OHdMifrIxX7vbb3s6rqMRz/5OH/2NX/+Or/8uzpXln/4OH7xL3iMjT/z8bZ1tbscm3ZST7m5uZYU1niRj6cnJzkNS5YWFj0hXrhVkn7qaTokYvvhoTzc3L1TUn7tbr6ppj2fnXmhoL8npjiQjXjbGTwUkndOyffjpTuVlLwTVLfW1nZaGX+wcTRIg/Mbm/cW1T93c76xrjxa2TtbWDilYf3kY3wnp/dNDDjeXLjhYb7m5xKi78hea98u93f//9kmbjhZmnc8foAaqnG5P', 'www.realcanadiansuperstore.ca'),
('Walmart Canada', 'https://upload.wikimedia.org/wikipedia/commons/thumb/c/ca/Walmart_logo.svg/1280px-Walmart_logo.svg.png', 'www.walmart.ca');

-- --------------------------------------------------------

--
-- Table structure for table `order_history`
--

CREATE TABLE `order_history` (
  `Order_id` int(3) NOT NULL,
  `User_id` varchar(8) NOT NULL,
  `Order_date` varchar(12) NOT NULL,
  `Total_amount` decimal(6,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_history`
--

INSERT INTO `order_history` (`Order_id`, `User_id`, `Order_date`, `Total_amount`) VALUES
(1, '110', '07/12/2018', '33.08'),
(1, '119', '07/12/2018', '4.76'),
(1, '12345677', '07/12/2018', '0.00'),
(1, '30026610', '06/12/2018', '5.99'),
(2, '119', '07/12/2018', '5.98'),
(2, '12345677', '07/12/2018', '0.00'),
(2, '30026610', '06/12/2018', '8.97'),
(3, '119', '07/12/2018', '4.76'),
(3, '12345677', '07/12/2018', '43.67'),
(3, '30026610', '06/12/2018', '8.97'),
(4, '30026610', '06/12/2018', '17.95'),
(5, '30026610', '06/12/2018', '4.76'),
(6, '30026610', '07/12/2018', '4.76'),
(7, '30026610', '07/12/2018', '4.76'),
(8, '30026610', '07/12/2018', '8.98'),
(9, '30026610', '07/12/2018', '8.97'),
(10, '30026610', '07/12/2018', '8.97'),
(11, '30026610', '07/12/2018', '74.70'),
(12, '30026610', '07/12/2018', '8.97'),
(13, '30026610', '07/12/2018', '8.97');

-- --------------------------------------------------------

--
-- Table structure for table `physical_shops`
--

CREATE TABLE `physical_shops` (
  `Shop_name` varchar(50) NOT NULL,
  `Phone` varchar(12) NOT NULL,
  `Address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `physical_shops`
--

INSERT INTO `physical_shops` (`Shop_name`, `Phone`, `Address`) VALUES
('Real Canadian Superstore', '403-241-4027', '5251 Country Hills Blvd NW, Calgary, Alberta T3A 5H8'),
('Walmart', '403-247-8585', '5005 Northland Dr NW #3011, Calgary, Alberta T2L 2K1'),
('Real Canadian Superstore', '403-280-8222', '3575 20 Ave NE, Calgary, Alberta T1Y 6R3'),
('London Drug', '403-288-0111', '3625 Shaganappi Trail NW, Calgary, Alberta T3A 0E2'),
('Real Canadian Superstore', '403-516-8519', '7020 4 St NW, Calgary, Alberta T2K 1C4'),
('Walmart', '403-567-1502', '8888 Country Hills Blvd NW, Calgary, ALBERTA T3G 5T4'),
('London Drug', '403-571-4933', '3630 Brentwood Rd NW, Calgary, Alberta T2L 1K8'),
('Walmart', '403-730-0990', '1110 57 Ave NE, Calgary, ALBERTA T2E 9B7');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `Product_name` text NOT NULL,
  `Bar_code` bigint(10) NOT NULL,
  `Picture` text NOT NULL,
  `Price` float NOT NULL,
  `Brand_name` varchar(50) NOT NULL,
  `Description` text NOT NULL,
  `Size` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`Product_name`, `Bar_code`, `Picture`, `Price`, `Brand_name`, `Description`, `Size`) VALUES
('Head & Shoulders Classic Clean Dandruff Shampoo', 3700006232, 'https://i5.walmartimages.ca/images/Large/839/517/6000197839517.jpg', 5.98, 'Head & Shoulders', 'Help say goodbye to flakes and hello to great hair with Head & Shoulders Classic Clean Dandruff Shampoo. It\'s from our original Classic Clean collection, formulated with HydraZinc to care for your scalp and leave you with soft, manageable, 100% flake-free hair.', '400 ml'),
('Head & Shoulders MEN Full & Thick Dandruff 2-in-1 ', 3700088070, 'https://i5.walmartimages.ca/images/Large/880/707/999999-37000880707.jpg', 8.97, 'Head & Shoulders', 'Get fuller, thicker looking hair and stay at the top of your game with Head & Shoulders Full & Thick Dandruff 2-in-1 Shampoo. Full & Thick 2-in-1 cleans to restore fullness to thin looking hair from the first wash.', '700 ml'),
('Dove Sensitive Skin Moisturizing Cream Beauty bar', 6723885390, 'https://i5.walmartimages.ca/images/Large/853/907/999999-67238853907.jpg', 8.97, 'Dove', 'This Dove beauty bar brings you classic Dove cleansers and moisturizing cream, a hypoallergenic bar that\'s gentle enough for sensitive skin.', '8 x 90 g'),
('L\\\'Oreal Paris Smooth Intense Shampoo for Frizzy Frizzy Hair', 7124936589, 'https://i5.walmartimages.ca/images/Large/839/692/6000197839692.jpg', 4.76, 'L\'Oreal Paris', 'Humidity and harsh climates can cause frizz and\r\nmake hair difficult to manage. SMOOTH INTENSE\r\ninfuses hair with argan oil and tames frizz and flyaways. Hair is hydrated, shiny and silky smooth, but still keeps it natural movement.', '385 ml'),
('Dove Damage Solutions Intensive Repair Shampoo', 7940010411, 'https://i5.walmartimages.ca/images/Large/735/361/6000196735361.jpg', 8.27, 'Dove', 'Dove Intensive Repair Shampoo, with Fibre Active Technology, helps reconstruct the hair from the inside and leaves it beautiful on the outside.', '750 ml'),
('Dove Nutritive Solutions Coconut and Hydration Shampoo', 7940062489, 'https://www.dove.com/content/dam/unilever/dove/united_states_of_america/pack_shot/front/hair_care/wash_and_care/dove_shampoo_coconut_hydration_12_oz/079400649492-982958-png.png.ulenscale.490x490.png', 3.97, 'Dove', 'At Dove, we are dedicated to providing nourishment solutions for hair. We believe that if you want to achieve real results, you need real care that works hard each time you use it. Every time you use it, your hair is soft, smooth and beautiful.', '355 ml'),
('Pantene Pro-V Daily Moisture Hydrating Renewal Shampoo And Conditioner Dual Value Pack', 8087807145, 'https://i5.walmartimages.ca/images/Large/875/485/6000197875485.jpg', 8.98, 'Pantene', 'Pantene Pro-V Daily Moisture Renewal Shampoo puts in more than it takes out with every wash. With a potent blend of Pro-V nutrients, Daily Moisture Renewal Shampoo gently cleanses your hair with a nutrient-rich lather that wraps every strand with strength.', '730 ml'),
('Pantene Pro-V Classic Clean Shampoo', 8087818388, 'https://i5.walmartimages.ca/images/Large/878/983/6000197878983.jpg', 6.97, 'Pantene', 'A simple solution to cleanse any hair type, Pantene Pro-V Classic Clean Shampoo gently cleanses for shiny, manageable hair. Helping to remove styling product buildup which can leave your hair looking dull and lifeless, this shampoo gives you a fresh, clean finish. ', '595 ml'),
('LEGO Mindstorms - LEGO MINDSTORMS EV3 (31313) Toy', 67341919305, 'https://i5.walmartimages.ca/images/Large/514/302/6000198514302.jpg', 399.86, 'LEGO', 'LEGO MINDSTORMS EV3 has arrived! Combining the versatility of the LEGO building system with the most advanced technology we’ve ever developed, unleash the creative powers of the new LEGO MINDSTORMS EV3 set to create and command robots that walk, talk, think and do anything you can imagine. ', '601 pcs'),
('LEGO Ideas LEGO NASA Apollo Saturn V (21309) Toy', 67341927715, 'https://i5.walmartimages.ca/images/Large/125/260/6000197125260.jpg', 149.99, 'LEGO', 'Display and role-play with this majestic meter-high LEGO brick model of the NASA Apollo Saturn V. Packed with authentic details, it features 3 removable rocket stages, including the S-IVB third stage with the lunar lander and lunar orbiter.', '1969 pcs'),
('Funko POP! Games: Fortnite - Black Knight Vinyl Figure Toy', 88969834467, 'https://i5.walmartimages.ca/images/Large/187/666/6000199187666.jpg', 12.94, 'Funko', 'Inspired by designer toys and stylized character collectibles. Funko is the number one stylized vinyl collectible in the world. Fans of Funko will love seeing their favorite characters rendered in cute vinyl figure, that measures approximately 3 1/2 inches tall.', '1 pcs');

-- --------------------------------------------------------

--
-- Table structure for table `promotion`
--

CREATE TABLE `promotion` (
  `Promotion_code` varchar(10) NOT NULL,
  `Start_date` varchar(10) NOT NULL,
  `End_date` varchar(10) NOT NULL,
  `Bar_codeb` bigint(10) NOT NULL,
  `Promotion_price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `promotion`
--

INSERT INTO `promotion` (`Promotion_code`, `Start_date`, `End_date`, `Bar_codeb`, `Promotion_price`) VALUES
('double11', '11/11/2018', '12/11/2018', 7940010411, 6.6),
('HappyFrida', '11/16/2018', '12/10/2018', 67341919305, 200);

-- --------------------------------------------------------

--
-- Table structure for table `shopping_cart`
--

CREATE TABLE `shopping_cart` (
  `Amount` int(1) NOT NULL,
  `Product_name` text NOT NULL,
  `Bar_code` bigint(10) NOT NULL,
  `User_id` varchar(8) NOT NULL,
  `Price` decimal(6,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shopping_cart`
--

INSERT INTO `shopping_cart` (`Amount`, `Product_name`, `Bar_code`, `User_id`, `Price`) VALUES
(1, 'L\'Oreal Paris Smooth Intense Shampoo for Frizzy Frizzy Hair', 7124936589, '-1', '4.76'),
(1, 'LEGO Mindstorms - LEGO MINDSTORMS EV3 (31313) Toy', 67341919305, '110', '399.86');

-- --------------------------------------------------------

--
-- Table structure for table `wish_list`
--

CREATE TABLE `wish_list` (
  `Product_name` text NOT NULL,
  `Bar_code` bigint(20) NOT NULL,
  `User_id` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wish_list`
--

INSERT INTO `wish_list` (`Product_name`, `Bar_code`, `User_id`) VALUES
('Pantene Pro-V Daily Moisture Hydrating Renewal Shampoo And Conditioner Dual Value Pack', 8087807145, '30026610');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Admin_id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`Brand_name`,`Brand_trade_mark`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`User_id`);

--
-- Indexes for table `online_shops`
--
ALTER TABLE `online_shops`
  ADD PRIMARY KEY (`Shop_name`,`Shop_trade_mark`);

--
-- Indexes for table `order_history`
--
ALTER TABLE `order_history`
  ADD PRIMARY KEY (`Order_id`,`User_id`),
  ADD KEY `User_id` (`User_id`);

--
-- Indexes for table `physical_shops`
--
ALTER TABLE `physical_shops`
  ADD PRIMARY KEY (`Phone`,`Address`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`Bar_code`);

--
-- Indexes for table `promotion`
--
ALTER TABLE `promotion`
  ADD PRIMARY KEY (`Promotion_code`);

--
-- Indexes for table `shopping_cart`
--
ALTER TABLE `shopping_cart`
  ADD PRIMARY KEY (`Bar_code`,`User_id`),
  ADD KEY `User_id` (`User_id`);

--
-- Indexes for table `wish_list`
--
ALTER TABLE `wish_list`
  ADD PRIMARY KEY (`Bar_code`,`User_id`),
  ADD KEY `User_id` (`User_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_history`
--
ALTER TABLE `order_history`
  ADD CONSTRAINT `order_history_ibfk_1` FOREIGN KEY (`User_id`) REFERENCES `client` (`User_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `shopping_cart`
--
ALTER TABLE `shopping_cart`
  ADD CONSTRAINT `shopping_cart_ibfk_1` FOREIGN KEY (`Bar_code`) REFERENCES `products` (`Bar_code`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `wish_list`
--
ALTER TABLE `wish_list`
  ADD CONSTRAINT `wish_list_ibfk_1` FOREIGN KEY (`Bar_code`) REFERENCES `products` (`Bar_code`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `wish_list_ibfk_2` FOREIGN KEY (`User_id`) REFERENCES `client` (`User_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
