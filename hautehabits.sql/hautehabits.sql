-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 29, 2023 at 06:14 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hautehabits`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_details`
--

CREATE TABLE `admin_details` (
  `admin_id` int(11) NOT NULL,
  `admin_username` varchar(100) NOT NULL,
  `admin_email` varchar(200) NOT NULL,
  `admin_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_details`
--

INSERT INTO `admin_details` (`admin_id`, `admin_username`, `admin_email`, `admin_password`) VALUES
(1, 'Khushi Walje', 'khushi123@gmail.com', '$2y$10$r7zdT0dUTZXzM27jujLYu.eEmPHIGXUiO4v6Jkx9QIrjdL3vEPrv2'),
(2, 'Shreya Walunj', 'shreya123@gmail.com', '$2y$10$aWn0ul/yM4.gqv/67CNiDuGcBh04UrNUDJQ8TmIGoB05v6Ed5SGAC');

-- --------------------------------------------------------

--
-- Table structure for table `cart_details`
--

CREATE TABLE `cart_details` (
  `product_id` int(11) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `quantity` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_title`) VALUES
(1, 'Jeans'),
(2, 'Jackets'),
(3, 'Shirts'),
(4, 'Tshirts'),
(5, 'Dresses'),
(6, 'Tops'),
(7, 'Skirts');

-- --------------------------------------------------------

--
-- Table structure for table `contact_details`
--

CREATE TABLE `contact_details` (
  `contact_id` int(11) NOT NULL,
  `contact_username` varchar(100) NOT NULL,
  `contact_email` varchar(100) NOT NULL,
  `contact_message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gender`
--

CREATE TABLE `gender` (
  `gender_id` int(11) NOT NULL,
  `gender_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gender`
--

INSERT INTO `gender` (`gender_id`, `gender_title`) VALUES
(1, 'Men'),
(2, 'Women');

-- --------------------------------------------------------

--
-- Table structure for table `pending_orders`
--

CREATE TABLE `pending_orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `invoice_number` int(255) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(255) NOT NULL,
  `order_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pending_orders`
--

INSERT INTO `pending_orders` (`order_id`, `user_id`, `invoice_number`, `product_id`, `quantity`, `order_status`) VALUES
(1, 1, 1969331300, 1, 1, 'Pending'),
(2, 1, 864675159, 1, 1, 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_title` varchar(100) NOT NULL,
  `product_description` varchar(255) NOT NULL,
  `product_keywords` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `gender_id` int(11) NOT NULL,
  `product_image1` varchar(255) NOT NULL,
  `product_image2` varchar(255) NOT NULL,
  `product_image3` varchar(255) NOT NULL,
  `product_image4` varchar(255) NOT NULL,
  `product_material` varchar(255) NOT NULL,
  `product_care` varchar(255) NOT NULL,
  `model_description` varchar(255) NOT NULL,
  `product_price` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_title`, `product_description`, `product_keywords`, `category_id`, `gender_id`, `product_image1`, `product_image2`, `product_image3`, `product_image4`, `product_material`, `product_care`, `model_description`, `product_price`, `date`, `status`) VALUES
(2, 'Blue Denim Buttoned Jacket', 'Overshirt in rigid cotton denim with a turn-down collar, classic front, a yoke at the back and a gently rounded hem. Regular fit with a patch chest pocket and long sleeves with buttoned cuffs and a sleeve placket.', 'jacket,denim,blue,men,', 2, 1, 'jacket1-1.webp', 'jacket1-2.webp', 'jacket1-3.webp', 'jacket1-4.webp', '100% Denim', 'Handwash only', 'Model is 5 feet 8inches and is wearing size S', '1999', '2023-09-29 06:22:25', 'true'),
(3, 'Brown Buttoned Jacket', 'Overshirt in rigid cotton denim with a turn-down collar, classic front, a yoke at the back and a gently rounded hem. Regular fit with a patch chest pocket and long sleeves with buttoned cuffs and a sleeve placket.', 'jacket,denim,brown,men', 2, 1, 'jacket2-1.webp', 'jacket2-2.webp', 'jacket2-4.webp', 'jacket2-5.webp', '100% Denim', 'Handwash only', 'Model is 6 feet and is wearing size M', '1999', '2023-09-29 06:24:49', 'true'),
(4, 'White Sports Jacket', 'Sports jacket in soft, warming teddy. Regular fit with a stand-up collar, zip down the front, zipped chest pocket and discreet pockets in the side seams. Extra-long raglan sleeves with sections in woven fabric and thumbholes at the cuffs. Rounded hem with', 'sports,jacket,white,men', 2, 1, 'jacket3-1.webp', 'jacket3-2.webp', 'jacket3-3.webp', 'jacket3-4.webp', 'Polyester 100%', 'Machine wash ', 'Model height is 6 feet and is wearing size M', '2200', '2023-09-29 06:30:15', 'true'),
(5, 'Blue Formal Jacket', 'Jacket in woven fabric with notch lapels, buttons at the front and jetted front pockets. Satin lining.', 'blue,jacket,formal,satin,men', 2, 1, 'jacket4-2.webp', 'jacket4-3.webp', 'jacket4-4.webp', 'jacket4-1', 'Polyester 100%', 'Machine wash', 'Model height is 5 feet 9 inches and is wearing size S', '3000', '2023-09-29 06:34:08', 'true'),
(6, 'Muscle Fit Cotton Shirt', 'Shirt in a stretch cotton weave with a turn-down collar, French front and a yoke with darts at the back. Long sleeves with buttoned cuffs and a sleeve placket with a link button, and a rounded hem. Muscle fit with narrow shoulders and tapered sleeves to c', 'black,cotton,shirt,men,fit', 3, 1, 'shirt1-1.jfif', 'shirt1-2.webp', 'shirt1-3.webp', 'shirt1-4.webp', 'Cotton 96%, Elastane 4%', 'Machine wash only', 'Model height is 6 feet and is wearing size M', '2200', '2023-09-29 06:52:41', 'true'),
(7, 'Cotton Shirt Muscle Fit', 'Short-sleeved shirt in a stretch cotton weave with a narrow grandad collar and classic front. Sewn-in turn-ups on the sleeves, yoke and darts at the back and a rounded hem. Muscle Fit – a fit designed to showcase the body’s physique with narrow shoulders,', 'cotton, shirt, men, muscle, fit, white, stripped, short sleeve', 3, 1, 'shirt3-1.jfif', 'shirt3-2.jfif', 'shirt3-3.jfif', 'shirt3-4.webp', 'Cotton 96%, Elastane 4%', 'Machine Wash and Hand Wash', 'Model is 5 feet 8 inches and is wearing size S', '2300', '2023-09-29 06:57:45', 'true'),
(8, 'Relaxed Fit Cotton T-shirt', 'T-shirt in soft cotton jersey. Relaxed fit with a round, rib-trimmed neckline, dropped shoulders and a straight hem.', 'tshirt,oversized,men,relaxed fit,purple,violet', 4, 1, 'tshirt1-1.webp', 'tshirt1-2.webp', 'tshirt1-3.webp', 'tshirt1-4.webp', '100% Cotton', 'Machine Wash', 'Model Height i 6 feet and is wearing size L', '999', '2023-09-29 07:14:29', 'true'),
(9, 'Regular Fit Round-neck T-shirt', 'Regular-fit T-shirt in soft cotton jersey with a round, rib-trimmed neckline and a straight hem', 'gray,grey,cotton,tshirt,men', 4, 1, 'tshirt2-1.webp', 'tshirt3-2.webp', 'tshirt3-4.webp', 'tshirt3-3.webp', '100% cotton', 'Hand Wash only', 'Model is 5 feet 9 inches and is wearing size M', '799', '2023-09-29 07:17:08', 'true'),
(10, 'Oversized printed T-shirt', 'Oversized T-shirt in soft cotton jersey with a print motif on the front. Ribbed trim around the neckline and', 'white,printed,tshirt,men,oversized', 4, 1, 'tshirt4-1.webp', 'tshirt4-2.webp', 'tshirt4-3.webp', 'tshirt4-5.webp', '100% Cotton,Jersey', 'Hand Wash only', 'Model is 6 feet and is wearing size L', '1999', '2023-09-29 07:20:03', 'true'),
(11, 'Soul Mini Dress ', 'Mini Dress with smocking detail and spaghetti straps that crosses over at back. Our black mini dress with smocking detail and delicate spaghetti straps is the epitome of effortless style. Made from high-quality materials, it ensures both comfort and durab', 'partywear,black,casual wear,mini,dress,women', 5, 2, 'dress1-1.webp', 'dress1-2.webp', 'dress1-3.webp', 'dress1-4.webp', 'Crepe', 'Hand Wash only', 'Model is 5feet 5inches and is wearing size S', '3700', '2023-09-29 07:28:38', 'true'),
(12, 'Lavendula Wrap Mini Dress', 'V-neck midi wrap dress. Crossover draped detail. This dress features a captivating floral print that exudes a sense of freshness and natural beauty. The V-neckline adds a touch of allure, drawing attention to your neckline and collarbone. The wrap design ', 'mini,dress,floral,women,wrap dress', 5, 2, 'dress2-2.jpg', 'dress2-2.webp', 'dress2-3.webp', 'dress2-4.webp', 'Georgette', 'Machine wash and hand wash', 'Model is 5 feet 4 inches and is wearing size XS', '2000', '2023-09-29 07:32:12', 'true'),
(13, 'Faux Leather Mini Dress', 'Short dress with a halter neck and draped neckline. Open back with a matching fabric strap. Matching lining. ', 'leather,dress,mini,women,orange,brown,short', 5, 2, 'dress3-1.webp', 'dress3-2.webp', 'dress3-3.webp', 'dress3-5.webp', 'Faux Leather', 'Hand Wash only', 'Model height is 5 feet 3 inches and is wearing size S', '3700', '2023-09-29 07:53:07', 'true'),
(14, 'Marina Ruched Dress ', 'Full Sleeves dress with V cut neckline . Gathering detail and invisible side zip fastening. Short, fitted dress with full sleeves. Deep V- cut neckline with a gathered detail that makes you look lean and heighted . Style with good pair of heels for Brunch', 'floral,midi,dress,blue,women,casual wear', 5, 2, 'dress4-1.webp', 'dress4-2.webp', 'dress4-3.webp', 'dress4-4.webp', 'Georgette', 'Machine Wash', 'Model height is 5 feet 5 inches and is wearing size M', '2000', '2023-09-29 07:56:12', 'true'),
(15, 'Mid Rise Denim Wide Leg Jeans', ' Channel trendy styles into your denim-wear line-up by investing in these midnight blue wide leg jeans from Freakins. Sculpted in a wide-leg construction from a rigid-cotton fabric, this five-pocket pair is designed to sit high at the waist and features d', 'mid,rise,jeans,women,blue,denim,wide leg,ripped,distressed', 1, 2, 'wjeans2-1.webp', 'wjeans2-2.webp', 'wjeans2-3.webp', 'wjeans2-4.webp', '100% Cotton', 'Hand wash only', 'Model height is 5 feet 6 inches and is wearing size S ', '1999', '2023-09-29 08:00:38', 'true'),
(16, 'Black Listed Cargo Jeans', 'A trending street style cargo jeans designed to highlight your daily wear. Fashioned with multiple cargo style pockets and contrast stitch details. Style them with our black denim v-cami bralette for a casual look.', 'high waist,black,jeans,women,cargo', 1, 2, 'wjeans3-1.webp', 'wjeans3-2.webp', 'wjeans3-3.webp', 'wjeans3-4.webp', '100% Cotton', 'Machine and Hand Wash', 'Model height is 5 feet 6 inches and is wearing size M', '1499', '2023-09-29 08:03:57', 'true'),
(17, 'Yale Cargo Mid Blue Jeans', ' Achieve a well-defined and stylish look when you don these Yale cargo mid blue jeans from Freakins. Designed with a charming solid pattern, it sits high at the waist while sporting multiple cargo style pockets.', 'high,waist,jeans,women,cargo,blue,denim', 1, 2, 'wjeans1-1.webp', 'wjeans1-2.webp', 'wjeans1-3.webp', 'wjeans1-4.webp', '100% Cotton', 'Hand wash only', 'Model height is 5 feet 5 inches and is wearing size XL', '1799', '2023-09-29 08:06:54', 'true'),
(18, 'Spatial Dream Pants', 'These modern and versatile hybrid pants will redefine your fashion game. Milled from a soft, lightweight fabric for limitless comfort and breathability, the pair features two tone patches crafted meticulously for an urbane look. Finished with metal button', 'blue,denim,pants,jeans,women,high,waist', 1, 2, 'wjeans4-1.webp', 'wjeans4-2.webp', 'wjeans4-3.webp', 'wjeans4-4.webp', '100% Cotton', 'Hand wash only', 'Model is 5 feet 6 inches and is wearing size S', '1899', '2023-09-29 08:09:38', 'true'),
(19, 'Sangwine Front Slit Skirt', 'A show-stopping addition to your everyday looks is this Sangwine front slit skirt. Crafted to sit high at the waist and falls below the knee for an elegant touch. The slit offers added feminity and grace. Compliment with a solid color top and pumps for a ', 'skirt,women,orange,slit,denim', 7, 2, 'skirt1-1.webp', 'skirt1-2.webp', 'skirt1-3.webp', 'skirt1-4.webp', '100% Cotton', 'Hand Wash only', 'Model height is 5 feet 6 inches and is wearing size M', '1999', '2023-09-29 08:17:08', 'true'),
(20, 'Raisin Skater Skirt', 'Add a tinge of glam to your wardrobe with this fun raisin skater skirt from HauteHabits. Designed with bold pink fabric and fitted waistband for a secure fit, this skirt is sure to be a statement worthy separate at all your parties.', 'skirt,women,pink,,denim,mini,short', 7, 2, 'skirt2-1.webp', 'skirt2-2.webp', 'skirt2-3.webp', 'skirt2-4.webp', '100% Cotton', 'Machine wash', 'Model height is 5 feet 5 inches and is wearing size S', '1499', '2023-09-29 08:21:38', 'true'),
(21, 'Dark Blue Denim Skorts', ' Make a statement in this stunning mini skort that is bound to make heads turn! The design fuses a pair of shorts with a skirt overlay for a chic illusion while the diagonal pocket design lends a modern touch. Style it with a strappy crop top, statement e', 'skorts,skirts,women,dark,blue,denim', 7, 2, 'skirt3-1.webp', 'skirt3-2.webp', 'skirt3-3.webp', 'skirt3-4.webp', '100% Cotton', 'Hand wash only', 'Model height is 5 feet 6 inches and is wearing size M', '1200', '2023-09-29 08:25:29', 'true'),
(22, 'Indie Cargo Skirt', ' Lend your casual apparel a versatile and chic contribution. This Indie Cargo skirt is designed with multiple pockets, and zip up closure on front. Finished with front slit and an elegant below-the-knee length for an urban graceful look.', 'cargo,skirt,midi,women,blue,denim,dark', 7, 2, 'skirt4-1.webp', 'skirt4-2.webp', 'skirt4-3.webp', 'skirt4-4.webp', '100% Cotton', 'Machine Wash', 'Model height is 5 feet 8 inches and is wearing size S', '1899', '2023-09-29 08:29:54', 'true'),
(23, 'White Butterfly Georgette Top', 'Butterfly inspired georgette top with tie-up spaghetti straps. Make heads turn in this chic feminine top crafted with delicacy and attention to detail.', 'georgette,top,women,white,crop,butterfly', 6, 2, 'top4-1.webp', 'top4-2.webp', 'top4-3.webp', 'top4-4.webp', 'Georgette', 'Handwash only', 'Model height is 5 feet 4 inches and is wearing size S', '999', '2023-09-29 08:36:21', 'true'),
(24, 'Light Blue Butterfly Top', ' Our new handcrafted butterfly top is all you need to make a statement to the world. The denim touch with frayed design details adds a glamorous touch to this piece. The tie up closing on the back and the halter neck adds an ultra chicness to the whole lo', 'light,blue,butterfly,top ,women', 6, 2, '5-1.webp', '5-2.webp', '5-3.webp', '5-4.webp', 'Georgette', 'Hand wash only', 'Model height is 5 feet 4 inches and is wearing size S', '999', '2023-09-29 08:38:50', 'true'),
(25, 'Denim Bustier Top', 'Introduce modern aesthetics to your wardrobe with this denim bustier top. Carved from a rigid cotton material for uninterrupted breathability, this denim style flaunts seam detailing in the front for a chic twist. Pair it with denims and chunky sneakers f', 'denim,top,women,blue,dark,crop', 6, 2, '6-1.webp', '6-2.webp', '6-3.webp', '6-4.webp', 'Denim', 'Hand Wash only', 'Model height is 5 feet 5 inches and is wearing size M', '799', '2023-09-29 08:42:15', 'true'),
(26, 'Pink Leather Corset Top', 'Endlessly versatile Pink leather corset top. Make a stunning style statement with this top. Crafted in stretch leather fabric, this pink top flaunts perfect stretch for a good fit. A perfect outfit for an intimate gathering or a cosy dinner date at home.', 'pink,crop,top,leather,women,corset', 6, 2, '7-1.webp', '7-2.webp', '7-3.webp', '7-4.webp', '99% Leather, 1% Lycra', 'Hand Wash Only', 'Model height is 5 feet 5 inches and is wearing size S', '1299', '2023-09-29 08:46:43', 'true');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `user_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_image` varchar(255) NOT NULL,
  `user_ip` varchar(100) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `user_mobile` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`user_id`, `username`, `user_email`, `user_password`, `user_image`, `user_ip`, `user_address`, `user_mobile`) VALUES
(1, 'Shreya Walunj', 'shreya123@gmail.com', '$2y$10$Q7bbNPB/jlq5Cd3U/QYgfOdveUWCTnzi3FAFkgnkj94R90HQa8DRO', 'My project (1).png', '::1', 'Talegaon Dabhade', '123456789');

-- --------------------------------------------------------

--
-- Table structure for table `user_orders`
--

CREATE TABLE `user_orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount_due` int(255) NOT NULL,
  `invoice_number` int(255) NOT NULL,
  `total_products` int(255) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `order_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_payments`
--

CREATE TABLE `user_payments` (
  `payment_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `invoice_number` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `payment_mode` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_details`
--
ALTER TABLE `admin_details`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `cart_details`
--
ALTER TABLE `cart_details`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `contact_details`
--
ALTER TABLE `contact_details`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `gender`
--
ALTER TABLE `gender`
  ADD PRIMARY KEY (`gender_id`);

--
-- Indexes for table `pending_orders`
--
ALTER TABLE `pending_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_orders`
--
ALTER TABLE `user_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `user_payments`
--
ALTER TABLE `user_payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_details`
--
ALTER TABLE `admin_details`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cart_details`
--
ALTER TABLE `cart_details`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `contact_details`
--
ALTER TABLE `contact_details`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `gender`
--
ALTER TABLE `gender`
  MODIFY `gender_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pending_orders`
--
ALTER TABLE `pending_orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_orders`
--
ALTER TABLE `user_orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_payments`
--
ALTER TABLE `user_payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
