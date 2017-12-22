-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 31, 2017 at 09:51 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `drd`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(10) NOT NULL,
  `main_cat` varchar(100) NOT NULL,
  `cat_img` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `main_cat`, `cat_img`) VALUES
(21, 'Fashion', 'https://goo.gl/CGAHF5'),
(22, 'Mobiles & Tablets', 'https://goo.gl/8TL1gv'),
(23, 'Travel', 'https://goo.gl/Y6Qzbi'),
(24, 'Food & Dining', 'https://d3pzq99hz695o4.cloudfront.net/sitespecific/in/coupon-categories/web/5f735b1ef3026be39a6d1c66e7fe4a19/food-and-dining-cover-large.jpg?80295'),
(25, 'Recharge', 'https://d3pzq99hz695o4.cloudfront.net/sitespecific/in/coupon-categories/web/7aba9b78eb4dfc382756625e31bc214a/recharges-cover-large.jpg?213356'),
(26, 'Computers, Laptops & Gaming', 'https://goo.gl/CGAHF5'),
(27, 'Beauty & Health', 'https://goo.gl/CGAHF5'),
(28, 'Appliances', 'https://goo.gl/RWFHz9'),
(29, 'Home Furnishing & Decor', 'https://goo.gl/CGAHF5'),
(30, 'Cameras & Accessories', 'https://goo.gl/TNqctQ'),
(31, 'Entertainment', 'https://goo.gl/CGAHF5'),
(32, 'Books & Stationery', 'https://goo.gl/CGAHF5'),
(33, 'Web Hosting & Domains', 'https://goo.gl/CGAHF5'),
(34, 'Education & Learning', 'https://goo.gl/CGAHF5'),
(35, 'Flowers, Gifts &  Jewellery', 'https://goo.gl/CGAHF5'),
(36, 'TV, Audio/Video & Moviews', 'https://goo.gl/CGAHF5'),
(37, 'Kids, Babies & Toys', 'https://goo.gl/CGAHF5'),
(38, 'Miscellaneous', 'https://goo.gl/CGAHF5'),
(39, 'Sports & Fitness', 'https://goo.gl/CGAHF5'),
(40, 'Automotive', 'https://goo.gl/CGAHF5');

-- --------------------------------------------------------

--
-- Table structure for table `cpn_category`
--

CREATE TABLE `cpn_category` (
  `cp_cat_id` int(10) NOT NULL,
  `sub_cat_id` int(10) NOT NULL,
  `coupon_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cpn_category`
--

INSERT INTO `cpn_category` (`cp_cat_id`, `sub_cat_id`, `coupon_id`) VALUES
(31, 1, 48),
(32, 2, 48),
(33, 3, 48),
(34, 4, 48),
(35, 5, 48),
(36, 6, 48),
(37, 7, 48),
(38, 8, 48),
(39, 9, 48),
(40, 10, 48),
(41, 11, 48),
(42, 12, 48),
(43, 13, 48),
(44, 14, 48),
(45, 15, 48),
(46, 16, 48),
(47, 17, 48),
(48, 18, 48),
(49, 19, 48),
(50, 20, 48),
(51, 21, 48),
(52, 22, 48),
(53, 23, 48),
(54, 24, 48),
(55, 25, 48),
(56, 26, 48),
(57, 27, 48),
(58, 28, 48),
(59, 29, 48),
(60, 30, 48),
(61, 31, 48),
(62, 32, 48),
(63, 33, 48),
(64, 34, 48),
(65, 36, 48),
(66, 37, 48),
(67, 38, 48),
(68, 39, 48),
(69, 40, 48),
(70, 41, 48),
(71, 42, 48),
(72, 44, 48),
(73, 45, 48),
(74, 46, 48),
(75, 47, 48),
(76, 48, 48),
(77, 49, 48),
(78, 50, 48),
(79, 51, 48),
(80, 52, 48),
(81, 53, 48),
(82, 54, 48),
(83, 55, 48),
(84, 56, 48),
(85, 57, 48),
(86, 58, 48),
(87, 59, 48),
(88, 60, 48),
(89, 61, 48),
(90, 62, 48),
(91, 63, 48),
(92, 64, 48),
(93, 65, 48),
(94, 66, 48),
(95, 67, 48),
(96, 68, 48),
(97, 69, 48),
(98, 70, 48),
(99, 71, 48),
(100, 72, 48),
(101, 73, 48),
(102, 74, 48),
(103, 75, 48),
(104, 76, 48),
(105, 77, 48),
(106, 78, 48),
(107, 1, 49),
(108, 2, 49),
(109, 3, 49),
(110, 4, 49),
(111, 5, 49),
(112, 6, 49),
(113, 7, 49),
(114, 8, 49),
(115, 9, 49),
(116, 26, 49),
(117, 27, 49),
(118, 28, 49),
(119, 29, 49),
(120, 36, 49),
(121, 37, 49),
(122, 38, 49),
(123, 39, 49),
(124, 40, 49),
(125, 41, 49),
(126, 42, 49),
(127, 44, 49),
(128, 7, 50),
(129, 8, 50),
(130, 7, 51),
(131, 8, 51),
(132, 26, 53),
(133, 27, 53),
(134, 26, 56),
(135, 27, 56),
(136, 60, 52),
(137, 37, 54),
(138, 37, 57),
(139, 1, 59),
(140, 2, 59),
(141, 3, 59),
(142, 4, 59),
(143, 5, 59),
(144, 6, 59),
(145, 7, 59),
(146, 8, 59),
(147, 9, 59),
(148, 10, 59),
(149, 11, 59),
(150, 12, 59),
(151, 13, 59),
(152, 14, 59),
(153, 15, 59),
(154, 16, 59),
(155, 17, 59),
(156, 18, 59),
(157, 19, 59),
(158, 20, 59),
(159, 21, 59),
(160, 22, 59),
(161, 23, 59),
(162, 24, 59),
(163, 25, 59),
(164, 26, 59),
(165, 27, 59),
(166, 28, 59),
(167, 29, 59),
(168, 30, 59),
(169, 31, 59),
(170, 32, 59),
(171, 33, 59),
(172, 34, 59),
(173, 36, 59),
(174, 37, 59),
(175, 38, 59),
(176, 39, 59),
(177, 40, 59),
(178, 41, 59),
(179, 42, 59),
(180, 44, 59),
(181, 45, 59),
(182, 46, 59),
(183, 47, 59),
(184, 48, 59),
(185, 49, 59),
(186, 50, 59),
(187, 51, 59),
(188, 52, 59),
(189, 53, 59),
(190, 54, 59),
(191, 55, 59),
(192, 56, 59),
(193, 57, 59),
(194, 58, 59),
(195, 59, 59),
(196, 60, 59),
(197, 61, 59),
(198, 62, 59),
(199, 63, 59),
(200, 64, 59),
(201, 65, 59),
(202, 66, 59),
(203, 67, 59),
(204, 68, 59),
(205, 69, 59),
(206, 70, 59),
(207, 71, 59),
(208, 72, 59),
(209, 73, 59),
(210, 74, 59),
(211, 75, 59),
(212, 76, 59),
(213, 77, 59),
(214, 78, 59),
(215, 36, 65),
(216, 37, 65),
(217, 38, 65),
(218, 39, 65),
(219, 36, 66),
(220, 37, 66),
(221, 38, 66),
(222, 39, 66),
(223, 27, 61),
(224, 1, 62),
(225, 2, 62),
(226, 3, 62),
(227, 4, 62),
(228, 5, 62),
(229, 6, 62),
(230, 1, 63),
(231, 2, 63),
(232, 3, 63),
(233, 4, 63),
(234, 5, 63),
(235, 6, 63),
(236, 30, 64),
(237, 31, 64),
(238, 32, 64),
(239, 33, 64),
(240, 34, 64),
(241, 56, 67),
(242, 36, 68),
(243, 37, 68),
(244, 38, 68),
(245, 39, 68),
(246, 36, 60),
(247, 37, 60),
(248, 38, 60),
(249, 60, 60),
(250, 1, 69),
(251, 2, 69),
(252, 3, 69),
(253, 4, 69),
(254, 5, 69),
(255, 6, 69),
(256, 7, 69),
(257, 8, 69),
(258, 9, 69),
(259, 10, 69),
(260, 11, 69),
(261, 12, 69),
(262, 13, 69),
(263, 14, 69),
(264, 15, 69),
(265, 16, 69),
(266, 17, 69),
(267, 18, 69),
(268, 19, 69),
(269, 20, 69),
(270, 21, 69),
(271, 22, 69),
(272, 23, 69),
(273, 24, 69),
(274, 25, 69),
(275, 26, 69),
(276, 27, 69),
(277, 28, 69),
(278, 29, 69),
(279, 30, 69),
(280, 31, 69),
(281, 32, 69),
(282, 33, 69),
(283, 34, 69),
(284, 36, 69),
(285, 37, 69),
(286, 38, 69),
(287, 39, 69),
(288, 40, 69),
(289, 41, 69),
(290, 42, 69),
(291, 44, 69),
(292, 45, 69),
(293, 46, 69),
(294, 47, 69),
(295, 48, 69),
(296, 49, 69),
(297, 50, 69),
(298, 51, 69),
(299, 52, 69),
(300, 53, 69),
(301, 54, 69),
(302, 55, 69),
(303, 56, 69),
(304, 57, 69),
(305, 58, 69),
(306, 59, 69),
(307, 60, 69),
(308, 61, 69),
(309, 62, 69),
(310, 63, 69),
(311, 64, 69),
(312, 65, 69),
(313, 66, 69),
(314, 67, 69),
(315, 68, 69),
(316, 69, 69),
(317, 70, 69),
(318, 71, 69),
(319, 72, 69),
(320, 73, 69),
(321, 74, 69),
(322, 75, 69),
(323, 76, 69),
(324, 77, 69),
(325, 78, 69),
(326, 1, 77),
(327, 2, 77),
(328, 3, 77),
(329, 4, 77),
(330, 5, 77),
(331, 6, 77),
(332, 7, 77),
(333, 8, 77),
(334, 9, 77),
(335, 10, 77),
(336, 11, 77),
(337, 12, 77),
(338, 13, 77),
(339, 14, 77),
(340, 15, 77),
(341, 16, 77),
(342, 17, 77),
(343, 18, 77),
(344, 19, 77),
(345, 20, 77),
(346, 21, 77),
(347, 22, 77),
(348, 23, 77),
(349, 24, 77),
(350, 25, 77),
(351, 26, 77),
(352, 27, 77),
(353, 28, 77),
(354, 29, 77),
(355, 30, 77),
(356, 31, 77),
(357, 32, 77),
(358, 33, 77),
(359, 34, 77),
(360, 36, 77),
(361, 37, 77),
(362, 38, 77),
(363, 39, 77),
(364, 40, 77),
(365, 41, 77),
(366, 42, 77),
(367, 44, 77),
(368, 45, 77),
(369, 46, 77),
(370, 47, 77),
(371, 48, 77),
(372, 49, 77),
(373, 50, 77),
(374, 51, 77),
(375, 52, 77),
(376, 53, 77),
(377, 54, 77),
(378, 55, 77),
(379, 56, 77),
(380, 57, 77),
(381, 58, 77),
(382, 59, 77),
(383, 60, 77),
(384, 61, 77),
(385, 62, 77),
(386, 63, 77),
(387, 64, 77),
(388, 65, 77),
(389, 66, 77),
(390, 67, 77),
(391, 68, 77),
(392, 69, 77),
(393, 70, 77),
(394, 71, 77),
(395, 72, 77),
(396, 73, 77),
(397, 74, 77),
(398, 75, 77),
(399, 76, 77),
(400, 77, 77),
(401, 78, 77),
(402, 18, 70),
(403, 20, 70),
(404, 18, 72),
(405, 20, 72),
(406, 18, 73),
(407, 20, 73),
(408, 18, 74),
(409, 20, 74),
(410, 19, 74),
(411, 14, 75),
(412, 12, 71),
(413, 14, 71),
(414, 30, 76);

-- --------------------------------------------------------

--
-- Table structure for table `cpn_offr`
--

CREATE TABLE `cpn_offr` (
  `coupon_id` int(10) NOT NULL,
  `title` varchar(500) NOT NULL,
  `off_rate` varchar(20) NOT NULL,
  `tags` varchar(500) NOT NULL,
  `coupon` varchar(500) NOT NULL,
  `cpn_offr_link` varchar(500) NOT NULL,
  `store_id` int(11) NOT NULL,
  `description` varchar(500) NOT NULL,
  `date` varchar(20) NOT NULL,
  `type` varchar(15) NOT NULL,
  `uses` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cpn_offr`
--

INSERT INTO `cpn_offr` (`coupon_id`, `title`, `off_rate`, `tags`, `coupon`, `cpn_offr_link`, `store_id`, `description`, `date`, `type`, `uses`) VALUES
(48, 'Shop Using Visa Debit Card & Get 10% Cashback', '10%', 'CASHBACK', 'NIL', 'https://www.amazon.in/b?ie=UTF8&node=13495408031&pf_rd_p=92f74512-c0c2-4183-9e99-273f10caaaa4&pf_rd_r=A8110MPXA97J2Q5EXFV0&tag=coupo07-21&ascsubtag=CG4e01470e69e714', 3, 'Shop using Visa debit card and get 10% cashback. Maximum cashback is Rs. 100 per customer. Applicable only for first cashless order. Find more details on the landing page.', 'ON GOING', 'Offer', 5),
(49, 'Best Deals on Amazon Today - Upto 80% OFF on Electronics, Appliances, Decor, Fashion & more', '85%', 'OFF', 'NIL', 'http://amzn.to/2yXS6jG', 3, 'Amazon Daily deals offer amazing discounts on brands such as Sony, Micromax, Puma, Fossil, JBL, HP, Samsung, Voltas, Lenovo, Philips, Milton & more. No Amazon Coupon Code required.', 'ON GOING', 'Offer', 17),
(50, 'Upto 80% OFF on Mobile Cases & Covers', '80%', 'OFF', 'NIL', 'http://amzn.to/2zUb3Sy', 3, 'Shop by popular brands including Xiaomi, Coolpad, Lenovo, Moto, Apple, Samsung, Micromax, Nokia, HTC & more.', 'ON GOING', 'Offer', 0),
(51, 'Upto 40% OFF on Mobiles', '40%', 'OFF', 'NIL', 'http://amzn.to/2zVWNZI', 3, 'Applicable on featured brands in mobiles such as Moto, Asus, Mi, Honor, Apple, Samsung, OnePlus, Gionee, Micromax, InFocus, Coolpad & more.', 'ON GOING', 'Offer', 1),
(52, 'Upto 40% OFF on Televisions', '40%', 'OFF', 'NIL', 'http://amzn.to/2yXS6jG', 3, 'Shop by brands like Micromax, Sanyo, BPL, Samsung, Tcl, Powereye, LG & more.', 'ON GOING', 'Offer', 69),
(53, 'Upto Rs. 20000 OFF on Laptops', 'Rs. 20000', 'OFF', 'NIL', 'http://amzn.to/2zUb3Sy', 3, 'Shop by brands like Apple, Dell, Lenovo, HP, Acer, iBall, Asus & more.', 'ON GOING', 'Offer', 32),
(54, 'Upto 35% OFF on Washing Machines', '35%', 'OFF', 'NIL', 'http://amzn.to/2zVWNZI', 3, 'Applicable on Haier, BPL, Godrej & Mitashi.', 'ON GOING', 'Offer', 4),
(55, 'Extra 10% Cashback on orders of Rs. 5000 with with Amazon Pay Balance', '10%', 'CASHBACK', 'NIL', 'http://amzn.to/2yXS6jG', 3, 'Cashback is upto Rs. 500.', 'ON GOING', 'Offer', 0),
(56, 'Upto 60% OFF on Headphones & Speakers', '60%', 'OFF', 'NIL', 'http://amzn.to/2yXS6jG', 3, 'Shop by brands like JBL, Sony, Boat, Sennheiser, House of Marley, Portronics, Philips & more.', 'ON GOING', 'Offer', 2),
(57, 'Upto 40% OFF on Air Conditioners', '40%', 'OFF', 'NIL', 'http://amzn.to/2zUb3Sy', 3, 'Offer valid on following brands such Voltas, Kenstar, LG & Carrier.', 'ON GOING', 'Offer', 1),
(59, 'Flipkart\'s Best Deal for Today - Upto 60% OFF Across Categories', '60%', 'OFF', 'NIL', 'https://goo.gl/5EL9Ay', 1, 'Now get Flipkart offers up to 60% OFF Across Categories. Offer valid on mobiles & tablets, electronics, fashion & lifestyle, appliances, home & furniture, cars & bikes, books and stationery. No Flipkart coupon required to avail this offer.', 'ON GOING', 'Offer', 3),
(60, 'Showstoppers Offer - Upto 60% OFF on TVs & Appliances', '60%', 'OFF', 'NIL', 'https://goo.gl/5EL9Ay', 1, 'Now get Flipkart offers up to 60% OFF Across Categories. Offer valid on mobiles & tablets, electronics, fashion & lifestyle, appliances, home & furniture, cars & bikes, books and stationery. No Flipkart coupon required to avail this offer.', 'ON GOING', 'Offer', 34),
(61, 'Upto 26% OFF plus Upto Rs. 12000 OFF (Exchange) on Laptops ', '10%', 'OFF', 'NIL', 'https://goo.gl/5EL9Ay', 1, 'Shop for artificial jewellery, precious articles, silver jewellery & precious jewellery by brands like Divastri, And Fashion, Joyalukkas, BlueStone & more at Flipkart.', 'ON GOING', 'Offer', 0),
(62, 'The Big Fashion Loot - Extra 10% OFF on minimum purchase of Rs. 2000', '15%', 'OFF', 'NIL', 'https://goo.gl/5EL9Ay', 1, 'Shop for artificial jewellery, precious articles, silver jewellery & precious jewellery by brands like Divastri, And Fashion, Joyalukkas, BlueStone & more at Flipkart.', 'ON GOING', 'Offer', 0),
(63, 'The Big Fashion Loot - Extra 15% OFF on minimum purchase of Rs. 3000', '81%', 'OFF', 'NIL', 'https://goo.gl/5EL9Ay', 1, 'Shop for Washing Machines by brands like IFB, Samsung, Bosch, Onida & more.', 'ON GOING', 'Offer', 0),
(64, 'Upto 81% OFF on Beauty & Personal Care products', '35%', 'OFF', 'NIL', 'https://goo.gl/5EL9Ay', 1, 'Shop for Washing Machines by brands like IFB, Samsung, Bosch, Onida & more.', 'ON GOING', 'Offer', 0),
(65, 'TVs and Appliances Showstoppers - Upto 35% OFF on Automatic Washing Machines ', '35%', 'OFF', 'NIL', 'https://goo.gl/5EL9Ay', 1, 'Offer valid on washing machine, television, refrigerator, microwaves, air conditioner, small appliances & more.', 'ON GOING', 'Offer', 0),
(66, 'Upto 35% OFF on Large Appliances', '87%', 'OFF', 'NIL', 'https://goo.gl/5EL9Ay', 1, 'Shop for artificial jewellery, precious articles, silver jewellery & precious jewellery by brands like Divastri, And Fashion, Joyalukkas, BlueStone & more at Flipkart.', 'ON GOING', 'Offer', 0),
(67, 'Upto 87% OFF on Women\'s Jewellery', '60%', 'OFF', 'NIL', 'https://goo.gl/5EL9Ay', 1, 'Shop for air purifiers, water geysers, chimneys, water purifiers & more.', 'ON GOING', 'Offer', 0),
(68, 'TVs and Appliances Showstoppers - Upto 60% OFF on Kitchen & Home Appliances', '80%', 'OFF', 'NIL', 'https://goo.gl/5EL9Ay', 1, 'Shop for bags, backpacks, garment covers, bags, belts, wallets combo, handbags, clutches by brands like Skybags, American Tourister, Puma, Metronaut, Wildcraft & more at Flipkart.', 'ON GOING', 'Offer', 0),
(69, 'Flat 33% Tapzo Credit on paying with Freecharge wallet at Tapzo', '33%', 'OFF', 'TAPFC', 'https://goo.gl/rYaTHr', 15, 'Now get Flipkart offers up to 60% OFF Across Categories. Offer valid on mobiles & tablets, electronics, fashion & lifestyle, appliances, home & furniture, cars & bikes, books and stationery. No Flipkart coupon required to avail this offer.', 'ON GOING', 'Coupon', 14),
(70, 'FREE 2 McVeggie/McChicken Burgers & a Large Coke on paying with Freecharge wallet at McDelivery', 'Free', 'Cashback', 'FC299', 'https://goo.gl/E3Vmq8', 15, 'Offer is valid only on minimum order of Rs.150. Offer is valid on First Tapzo Food Order across Swiggy, Faasos, Freshmenu & Behrouz Biryani. Offer valid once per user. Offer applicable on the Tapzo Android App.', 'ON GOING', 'Coupon', 0),
(71, 'Flat Rs. 100 Cashback when you pay with Freecharge on MyBusTickets', 'Rs. 100 ', 'Cashback', 'FCMBT', 'https://goo.gl/89EHZP', 15, 'Offer is valid only on minimum order of Rs.150. Offer is valid on First Tapzo Food Order across Swiggy, Faasos, Freshmenu & Behrouz Biryani. Offer valid once per user. Offer applicable on the Tapzo Android App.', 'ON GOING', 'Coupon', 0),
(72, 'Flat 20% OFF on paying with Freecharge wallet at Zomato (New Users)', '20%', 'OFF', 'FC20', 'https://www.zomato.com/bangalore/order', 15, 'Offer is valid on min ticket booking of Rs.500. Cashback will be credited to MyBusTicket wallet in 2 days after the journey date. Offer valid once per user. Customer has to be registered with MyBusTickets to get the Cashback. Discount/Cashback will not be refunded if the Ticket/Bus has been cancelled.', 'ON GOING', 'Coupon', 0),
(73, 'Flat 20% Cashback on paying with Freecharge wallet at Swiggy', '20%', 'Cashback', 'NIL', 'https://goo.gl/jaGsDM', 15, 'Offer is valid only on minimum order of Rs.150. Offer is valid on First Tapzo Food Order across Swiggy, Faasos, Freshmenu & Behrouz Biryani. Offer valid once per user. Offer applicable on the Tapzo Android App.', 'ON GOING', 'Offer', 0),
(74, 'Flat Rs. 20 Cashback when you pay with FreeCharge on Jugnoo App', 'Rs. 20 ', 'Cashback', 'NIL', 'https://goo.gl/rYaTHr', 15, 'Offer is valid only on minimum order of Rs.150. Offer is valid on First Tapzo Food Order across Swiggy, Faasos, Freshmenu & Behrouz Biryani. Offer valid once per user. Offer applicable on the Tapzo Android App.', 'ON GOING', 'Offer', 3),
(75, 'Flat Rs. 25 Cashback when you book train tickets on IRCTC Website with Freecharge (New User)', '100%', 'Cashback', 'NIL', 'https://goo.gl/E3Vmq9', 15, 'Offer is valid only on minimum order of Rs.150. Offer is valid on First Tapzo Food Order across Swiggy, Faasos, Freshmenu & Behrouz Biryani. Offer valid once per user. Offer applicable on the Tapzo Android App.', 'ON GOING', 'Offer', 0),
(76, 'Flat 30% OFF when you pay with Freecharge at PharmEasy (New Users)', 'Rs. 25 ', 'OFF', 'NIL', 'https://goo.gl/89EHZP', 15, 'Offer is valid only on minimum order of Rs.150. Offer is valid on First Tapzo Food Order across Swiggy, Faasos, Freshmenu & Behrouz Biryani. Offer valid once per user. Offer applicable on the Tapzo Android App.', 'ON GOING', 'Offer', 0),
(77, 'Get 25% Cashback when you pay with Freecharge on Purplle (New User)', '25%', 'Cashback', 'NIL', 'https://www.zomato.com/bangalore/order', 15, 'Offer is valid only on minimum order of Rs.150. Offer is valid on First Tapzo Food Order across Swiggy, Faasos, Freshmenu & Behrouz Biryani. Offer valid once per user. Offer applicable on the Tapzo Android App.', 'ON GOING', 'Offer', 1);

-- --------------------------------------------------------

--
-- Table structure for table `favorite_store`
--

CREATE TABLE `favorite_store` (
  `fav_id` int(10) NOT NULL,
  `store_name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `store`
--

CREATE TABLE `store` (
  `store_id` int(11) NOT NULL,
  `store_name` varchar(30) NOT NULL,
  `store_logo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `store`
--

INSERT INTO `store` (`store_id`, `store_name`, `store_logo`) VALUES
(1, 'Flipkart', 'https://goo.gl/1g1v4N'),
(3, 'Amazon', 'https://goo.gl/aodSmY'),
(11, 'Paytm', 'https://goo.gl/GpacHW'),
(12, 'Ebay', 'https://goo.gl/XwPKRY'),
(14, 'BookMyShow', 'https://goo.gl/xvnc9d'),
(15, 'Freecharge', 'https://goo.gl/LsPuUr'),
(16, 'Foodpanda', 'https://goo.gl/1uePnX'),
(17, 'Myntra', 'https://goo.gl/FsDXUy'),
(18, 'AJIO', 'https://goo.gl/gs8XQu'),
(19, 'airtel', 'https://goo.gl/px9sTR'),
(20, 'Airbnb', 'https://goo.gl/uvUuip'),
(21, 'MakeMyTrip', 'https://goo.gl/utc2fM');

-- --------------------------------------------------------

--
-- Table structure for table `subscribe`
--

CREATE TABLE `subscribe` (
  `subs_id` int(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `store_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subscribe`
--

INSERT INTO `subscribe` (`subs_id`, `email`, `store_id`) VALUES
(7, 'androbalajiupdated@gmail.com', 3),
(8, 'androbalajiupdated@gmail.com', 1),
(9, 'androbalajiupdated@gmail.com', 11);

-- --------------------------------------------------------

--
-- Table structure for table `sub_cat`
--

CREATE TABLE `sub_cat` (
  `sub_cat_id` int(10) NOT NULL,
  `cat_id` int(10) NOT NULL,
  `sub_cat_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_cat`
--

INSERT INTO `sub_cat` (`sub_cat_id`, `cat_id`, `sub_cat_name`) VALUES
(1, 21, 'Clothing'),
(2, 21, 'Footwear'),
(3, 21, 'Bags & Accessories'),
(4, 21, 'Watch & Sunglasses'),
(5, 21, 'Lingerie'),
(6, 21, 'Travel Accessories'),
(7, 22, 'Mobile'),
(8, 22, 'Mobile & Tablet Accessories'),
(9, 22, 'Tablet'),
(10, 23, 'Flight'),
(11, 23, 'Hotel'),
(12, 23, 'Bus'),
(13, 23, 'Cabs'),
(14, 23, 'Holiday'),
(15, 23, 'Self-drive Cars'),
(16, 23, 'Railway Bookings'),
(17, 23, 'Car Rentals'),
(18, 24, 'Food Ordering'),
(19, 24, 'Grocery'),
(20, 24, 'Pizza'),
(21, 24, 'Restaurants'),
(22, 24, 'Drinks & Beverages'),
(23, 25, 'Mobile Recharge'),
(24, 25, 'Bill Payments'),
(25, 25, 'DTH'),
(26, 26, 'Computer Accessories'),
(27, 26, 'Laptops, Monitors & Desktops'),
(28, 26, 'Software'),
(29, 26, 'Gaming'),
(30, 27, 'Personal Care & Beauty'),
(31, 27, 'Nutrition'),
(32, 27, 'Perfumes & Deos'),
(33, 27, 'Health Devices'),
(34, 27, 'Eyewear'),
(36, 28, 'Kitchen Appliances'),
(37, 28, 'Home Appliances'),
(38, 28, 'Personal Care Appliances'),
(39, 28, 'Cleaning Accessories'),
(40, 29, 'Furniture & Decor'),
(41, 29, 'Kitchen & Dining'),
(42, 29, 'Bed & Bath'),
(44, 29, 'Tools'),
(45, 30, 'Camera Accessories'),
(46, 30, 'Cameras'),
(47, 31, 'Cinema'),
(48, 31, 'Theme Parks'),
(49, 31, 'Indoor & Outdoor Games'),
(50, 32, 'Books, eBooks & Magazines'),
(51, 32, 'Posters & Stationery'),
(52, 33, 'Domains'),
(53, 33, 'Web Hosting'),
(54, 34, 'Education'),
(55, 34, 'Learning'),
(56, 35, 'Jewellery'),
(57, 35, 'Gifts'),
(58, 35, 'Flowers & Cakes'),
(59, 35, 'Gold Coins & Bars'),
(60, 36, 'Televisions'),
(61, 36, 'Audio & Video'),
(62, 36, 'On Demand Content'),
(63, 36, 'Music'),
(64, 36, 'Movies & TV Shows'),
(65, 36, 'DTH & Internet Providers'),
(66, 37, 'Apparel & Accessories'),
(67, 37, 'Baby Products'),
(68, 37, 'Toys & Games'),
(69, 37, 'School Essentials'),
(70, 38, 'Others'),
(71, 38, 'Pet products'),
(72, 38, 'Salon & Spa'),
(73, 38, 'Matrimonial'),
(74, 38, 'Astrology'),
(75, 39, 'Sports Apparel & Equipment'),
(76, 39, 'Fitness Equipment'),
(77, 40, 'Accessories & Gears'),
(78, 40, 'Car Electronics');

-- --------------------------------------------------------

--
-- Table structure for table `user_category`
--

CREATE TABLE `user_category` (
  `cpn_cat` int(10) NOT NULL,
  `coupon_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `store_id` int(10) NOT NULL,
  `sub_cat_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_category`
--

INSERT INTO `user_category` (`cpn_cat`, `coupon_id`, `user_id`, `store_id`, `sub_cat_id`) VALUES
(174, 54, 1, 3, 37),
(175, 52, 1, 3, 60),
(176, 53, 1, 3, 26),
(177, 53, 1, 3, 27),
(178, 49, 1, 3, 1),
(179, 49, 1, 3, 2),
(180, 49, 1, 3, 3),
(181, 49, 1, 3, 4),
(182, 49, 1, 3, 5),
(183, 49, 1, 3, 6),
(184, 49, 1, 3, 7),
(185, 49, 1, 3, 8),
(186, 49, 1, 3, 9),
(187, 49, 1, 3, 26),
(188, 49, 1, 3, 27),
(189, 49, 1, 3, 28),
(190, 49, 1, 3, 29),
(191, 49, 1, 3, 36),
(192, 49, 1, 3, 37),
(193, 49, 1, 3, 38),
(194, 49, 1, 3, 39),
(195, 49, 1, 3, 40),
(196, 49, 1, 3, 41),
(197, 49, 1, 3, 42),
(198, 49, 1, 3, 44),
(199, 51, 1, 3, 7),
(200, 51, 1, 3, 8),
(201, 60, 2, 1, 36),
(202, 60, 2, 1, 37),
(203, 60, 2, 1, 38),
(204, 60, 2, 1, 60);

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `user_id` int(10) NOT NULL,
  `full_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`user_id`, `full_name`, `last_name`, `email`, `gender`, `password`) VALUES
(1, 'Dinesh Balaji', 'Saravanan', 'androbalajiupdated@gmail.com', 'Male', 'sdbsk311996'),
(2, 'DB', 'SDB', 'dineshbalaji123@gmail.com', '', 'sdbsk311996');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `cpn_category`
--
ALTER TABLE `cpn_category`
  ADD PRIMARY KEY (`cp_cat_id`),
  ADD KEY `sub_cat_id` (`sub_cat_id`),
  ADD KEY `coupon_id` (`coupon_id`);

--
-- Indexes for table `cpn_offr`
--
ALTER TABLE `cpn_offr`
  ADD PRIMARY KEY (`coupon_id`) USING BTREE,
  ADD KEY `store_id` (`store_id`);

--
-- Indexes for table `favorite_store`
--
ALTER TABLE `favorite_store`
  ADD PRIMARY KEY (`fav_id`),
  ADD KEY `store_name` (`store_name`,`email`);

--
-- Indexes for table `store`
--
ALTER TABLE `store`
  ADD PRIMARY KEY (`store_id`) USING BTREE;

--
-- Indexes for table `subscribe`
--
ALTER TABLE `subscribe`
  ADD PRIMARY KEY (`subs_id`),
  ADD KEY `email` (`email`),
  ADD KEY `store_id` (`store_id`);

--
-- Indexes for table `sub_cat`
--
ALTER TABLE `sub_cat`
  ADD PRIMARY KEY (`sub_cat_id`),
  ADD KEY `cat_id` (`cat_id`);

--
-- Indexes for table `user_category`
--
ALTER TABLE `user_category`
  ADD PRIMARY KEY (`cpn_cat`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `store_id` (`store_id`),
  ADD KEY `sub_cat_id` (`sub_cat_id`),
  ADD KEY `coupon_id` (`coupon_id`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `cpn_category`
--
ALTER TABLE `cpn_category`
  MODIFY `cp_cat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=415;
--
-- AUTO_INCREMENT for table `cpn_offr`
--
ALTER TABLE `cpn_offr`
  MODIFY `coupon_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;
--
-- AUTO_INCREMENT for table `favorite_store`
--
ALTER TABLE `favorite_store`
  MODIFY `fav_id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `store`
--
ALTER TABLE `store`
  MODIFY `store_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `subscribe`
--
ALTER TABLE `subscribe`
  MODIFY `subs_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `sub_cat`
--
ALTER TABLE `sub_cat`
  MODIFY `sub_cat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;
--
-- AUTO_INCREMENT for table `user_category`
--
ALTER TABLE `user_category`
  MODIFY `cpn_cat` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=205;
--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `cpn_category`
--
ALTER TABLE `cpn_category`
  ADD CONSTRAINT `cpn_category_ibfk_1` FOREIGN KEY (`coupon_id`) REFERENCES `cpn_offr` (`coupon_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cpn_category_ibfk_2` FOREIGN KEY (`sub_cat_id`) REFERENCES `sub_cat` (`sub_cat_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cpn_offr`
--
ALTER TABLE `cpn_offr`
  ADD CONSTRAINT `cpn_offr_ibfk_2` FOREIGN KEY (`store_id`) REFERENCES `store` (`store_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subscribe`
--
ALTER TABLE `subscribe`
  ADD CONSTRAINT `subscribe_ibfk_1` FOREIGN KEY (`email`) REFERENCES `user_details` (`email`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `subscribe_ibfk_2` FOREIGN KEY (`store_id`) REFERENCES `store` (`store_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sub_cat`
--
ALTER TABLE `sub_cat`
  ADD CONSTRAINT `sub_cat_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `category` (`cat_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_category`
--
ALTER TABLE `user_category`
  ADD CONSTRAINT `user_category_ibfk_1` FOREIGN KEY (`store_id`) REFERENCES `store` (`store_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_category_ibfk_2` FOREIGN KEY (`sub_cat_id`) REFERENCES `sub_cat` (`sub_cat_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_category_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `user_details` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_category_ibfk_4` FOREIGN KEY (`coupon_id`) REFERENCES `cpn_offr` (`coupon_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
