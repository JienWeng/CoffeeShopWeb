-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2024 at 08:58 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cup_corner`
--
CREATE DATABASE IF NOT EXISTS `cup_corner` DEFAULT CHARACTER SET utf32 COLLATE utf32_general_ci;
USE `cup_corner`;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_title`) VALUES
(1, 'Coffee'),
(3, 'Pastries'),
(4, 'Hot meals'),
(5, 'Non-Coffee'),
(7, 'Seasonal');

-- --------------------------------------------------------

--
-- Table structure for table `contact_responses`
--

CREATE TABLE `contact_responses` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf32 COLLATE=utf32_general_ci;

--
-- Dumping data for table `contact_responses`
--

INSERT INTO `contact_responses` (`id`, `name`, `email`, `message`, `created_at`) VALUES
(1, 'Jan', 'laijienweng@1utar.my', 'Hello Im Lai Jien Weng. HAHA\r\n', '2024-04-16 23:46:17'),
(2, 'jan', 'janicee@gmail.com', 'deafrsf', '2024-04-16 23:48:19'),
(3, 'hellooscar', 'donut@gmail.com', 'my donut is not served', '2024-04-16 23:49:14'),
(7, 'LAI JIEN WENG', 'laijienweng@1utar.my', 'The coffee is too bitter.', '2024-04-18 09:50:58'),
(6, 'Max', 'johnmax@hotmail.com', 'Very good service!! Please add more seasonal coffe product! I like it so much!', '2024-04-18 09:06:20'),
(8, 'Oscarr', 'laijienweng@1utar.my', 'Coffee is too bitter, please compensate me!!!', '2024-04-18 14:21:37'),
(9, 'LAI JIEN WENG', 'laijienweng@1utar.my', 'Your spana very lembik, cannot fix my pipe.', '2024-04-18 15:24:44');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` varchar(255) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `total_payment` decimal(10,2) DEFAULT NULL,
  `shipping_address` varchar(255) DEFAULT NULL,
  `payment_method` varchar(50) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `total_payment`, `shipping_address`, `payment_method`, `date_created`) VALUES
('4_6620d4eec6cf3', 4, 232.00, 'bubu home', 'Bank Transfer', '2024-04-18 10:08:14'),
('4_6620d50a58bb8', 4, 92.00, 'utar', 'Bank Transfer', '2024-04-18 10:08:42'),
('6_6620e148738d8', 6, 236.00, '1, Jalan Besar, KL', 'Credit Card', '2024-04-18 11:00:56'),
('6_6620e18251b29', 6, 278.00, 'Shell Mahkota Cheras, Selangor', 'PayPal', '2024-04-18 11:01:54'),
('7_6620e1dda847a', 7, 138.00, 'Halloween Ground, Putrajaya', 'Credit Card', '2024-04-18 11:03:25'),
('8_66212a2353c44', 8, 50.00, 'Oscar home', 'PayPal', '2024-04-18 16:11:47');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `detail_id` int(11) NOT NULL,
  `order_id` varchar(255) DEFAULT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `price_per_unit` decimal(10,2) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_general_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`detail_id`, `order_id`, `product_name`, `price_per_unit`, `quantity`) VALUES
(36, '4_6620d4eec6cf3', 'Asian Dolce Latte', 18.00, 1),
(37, '4_6620d4eec6cf3', 'Caffe Latte', 14.00, 1),
(38, '4_6620d4eec6cf3', 'Cappuccino', 14.00, 1),
(39, '4_6620d4eec6cf3', 'Cold Brew', 18.00, 1),
(40, '4_6620d4eec6cf3', 'Coffee by the Press', 18.00, 1),
(41, '4_6620d4eec6cf3', 'Cocoa Cappuccino', 16.00, 1),
(42, '4_6620d4eec6cf3', 'Matcha Latte', 18.00, 2),
(43, '4_6620d4eec6cf3', 'Spaghetti Carbonara', 18.00, 2),
(44, '4_6620d4eec6cf3', 'Spaghetti Bolognese', 18.00, 2),
(45, '4_6620d4eec6cf3', 'Cinnamon Roll', 16.00, 1),
(46, '4_6620d4eec6cf3', 'Wholemeal Tuna Sandwich', 10.00, 1),
(47, '4_6620d50a58bb8', 'Asian Dolce Latte', 18.00, 1),
(48, '4_6620d50a58bb8', 'Caffe Latte', 14.00, 1),
(49, '4_6620d50a58bb8', 'Cappuccino', 14.00, 1),
(50, '4_6620d50a58bb8', 'Cinnamon Roll', 16.00, 1),
(51, '4_6620d50a58bb8', 'Croissant', 10.00, 1),
(52, '4_6620d50a58bb8', 'Pumpkin Spice Latte', 20.00, 1),
(53, '6_6620e148738d8', 'Americano', 10.00, 1),
(54, '6_6620e148738d8', 'Asian Dolce Latte', 18.00, 2),
(55, '6_6620e148738d8', 'Coffee by the Press', 18.00, 1),
(56, '6_6620e148738d8', 'Matcha Cold Foam Iced Americano', 20.00, 1),
(57, '6_6620e148738d8', 'Cocoa Cappuccino', 16.00, 1),
(58, '6_6620e148738d8', 'Wholemeal Tuna Sandwich', 10.00, 1),
(59, '6_6620e148738d8', 'Apple Turnover', 16.00, 2),
(60, '6_6620e148738d8', 'Spaghetti Bolognese', 18.00, 2),
(61, '6_6620e148738d8', 'Spaghetti Carbonara', 18.00, 1),
(62, '6_6620e148738d8', 'Classic Mac & Cheese', 20.00, 1),
(63, '6_6620e148738d8', 'Pumpkin Spice Latte', 20.00, 1),
(64, '6_6620e18251b29', 'Cinnamon Roll', 16.00, 1),
(65, '6_6620e18251b29', 'Spaghetti Bolognese', 18.00, 4),
(66, '6_6620e18251b29', 'Signature Chicken Lasagna', 20.00, 4),
(67, '6_6620e18251b29', 'Signature Hot Chocolate', 18.00, 2),
(68, '6_6620e18251b29', 'Brewed Tea', 10.00, 2),
(69, '6_6620e18251b29', 'Iced Shaken Lemon Tea', 14.00, 1),
(70, '6_6620e18251b29', 'Strawberry Açai With Lemonade Starbucks Refreshers™', 20.00, 1),
(71, '6_6620e18251b29', 'Pumpkin Spice Latte', 20.00, 1),
(72, '7_6620e1dda847a', 'Pumpkin Spice Latte', 20.00, 4),
(73, '7_6620e1dda847a', 'Cinnamon Roll', 16.00, 1),
(74, '7_6620e1dda847a', 'Apple Turnover', 16.00, 1),
(75, '7_6620e1dda847a', 'Croissant', 10.00, 1),
(76, '7_6620e1dda847a', 'Salted Caramel Nut Danish', 16.00, 1),
(81, '8_66212a2353c44', 'Asian Dolce Latte', 18.00, 1),
(82, '8_66212a2353c44', 'Caffe Latte', 14.00, 1),
(83, '8_66212a2353c44', 'Spaghetti Carbonara', 18.00, 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_title` varchar(100) NOT NULL,
  `product_description` text NOT NULL,
  `category_id` int(11) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_title`, `product_description`, `category_id`, `product_image`, `product_price`) VALUES
(1, 'Americano', 'Rich, full-bodied espresso with hot water in true European style. While the americano is similar in strength and taste to American-style brewed coffee, there are subtle differences achieved by pulling a fresh shot of espresso for the beverage base. The best way to discover these nuances, of course, is to try a cup yourself.', 1, 'americano.jpg', 10.00),
(2, 'Asian Dolce Latte', 'Introducing Asian Dolce Latte, the new smooth and velvety textured latte with an Asian twist. Inspired by how coffee is drank in many parts of Asia, strong yet smooth and flavored, Asian Dolce Latte has a delicious local flavor in every sip.', 1, 'asianDolceLatte.jpg', 18.00),
(3, 'Caffe Latte', 'Rich, full-bodied espresso in steamed milk, lightly topped with foam. This is the original coffeehouse classic. And like most classics, part of its appeal comes from its simplicity. A caffe latte is simply a shot or two of bold, tasty espresso with fresh, sweet steamed milk over it. Some prefer to add syrup or extra espresso to the recipe. Some maintain that it is entirely perfect as is!', 1, 'caffeLatte.jpg', 14.00),
(4, 'Caffe Mocha', 'Espresso with bittersweet mocha sauce and steamed milk. Topped with sweetened whipped cream. There’s no question chocolate and coffee are flavors that meant for each other. Both are rich and full of depth. Where one is creamy, the other is roasty. They complement each other perfectly. And when they come together under a fluffy cloud of sweetened whipped cream, you’ll wish their union would last forever.', 1, 'caffeMocha.jpg', 16.00),
(5, 'Cappuccino', 'Espresso with steamed milk, topped with a deep layer of foam. With less milk than a latte, cappuccino offers a stronger espresso flavor and a luxurious texture. To make it properly requires much skill and attentiveness. Arguably the most important part is frothing the foam to velvety perfection as the milk steams – something our baristas take great care to achieve. The milky moustache that clings to your upper lip is proof we’ve made yours right. And may we say, you wear it well.', 1, 'cappucino.jpg', 14.00),
(6, 'Caramel Macchiato', 'Freshly steamed milk with vanilla-flavored syrup is marked with espresso, and finished with caramel sauce. Scores of people are passionate devotees of this signature beverage. So bewitched are they, you’d think it was some kind of magical elixir. Well there’s no hocus pocus here. We’ll tell you exactly what goes into it: creamy vanilla-flavored syrup, freshly steamed milk with a topping of velvety-rich foam, an intense hit of our Espresso Roast, a finishing of buttery caramel drizzle … okay, we take it back. That does sounds like magic to us. (And it tastes even better.)', 1, 'caramelMacchiato.jpg', 16.00),
(7, 'Cocoa Cappuccino', 'Dark, rich espresso with bittersweet mocha sauce lies in wait under a smoothed and stretched layer of thick foam. With less milk than a latte, cappuccino offers a stronger espresso flavor and a luxurious texture. To make it properly requires much skill and attentiveness. Arguably the most important part is frothing the foam to velvety perfection as the milk steams – something our baristas take great care to achieve. The milky moustache that clings to your upper lip is proof we’ve made yours right. And may we say, you wear it well.', 1, 'cocoaCappucino.jpg', 16.00),
(8, 'Coffee by the Press', 'The coffee press is a classic, straightforward brewing method that produces a boldly flavorful cup. To brew, fresh coffee grounds are fully immersed in hot water. The mesh filter encourages an even extraction that releases flavorful oils into the cup and creates rich, full-bodied cup.', 1, 'caffePress.jpg', 18.00),
(9, 'Cold Brew', 'Slow-steeped, small-batch and super smooth. We use a unique craft-brewing process to create a super smooth tasting coffee. While making our Cold Brew, the coffee never comes into contact with hot water. Instead, the coffee is slow-steeped in cool water for more than 10 hours and is handcrafted in small batches each day. To create our signature recipe, our team spent months experimenting with different brew times and coffee varietals. We specifically developed the Starbucks® Cold Brew Blend to heighten the rich, naturally sweet flavor created during the cold brewing process. The blend incorporates African and Latin American coffees.', 1, 'coldBrew.jpg', 18.00),
(10, 'Matcha Cold Foam Iced Americano', 'A dream come true for coffee and tea lovers – Cup Corner is reimagining the classic Iced Americano with the infusion of matcha – in the format of meringue-like, earthy Matcha Cold Foam. Made with nonfat milk, this layer of smooth Matcha Cold Foam atop the classic Iced Americano instantly intrigues the palate with the contrasting yet complementing flavors of Americano and Matcha. The Matcha Cold Foam Iced Americano is available cold only.', 1, 'matchaFoamAmericano.jpg', 20.00),
(11, 'DoubleShot® Iced Shaken Espresso', 'Two fresh shots of espresso, hand shaken with classic syrup and ice, finished with low fat milk mixed with sweetened whipped cream. Our only hand-shaken espresso drink, it melds the flavors of the rich, full-bodied espresso you love and is chilled and mellowed with a touch of milk and then lightly sweetened. All with tiny bubbles of frothy foam.', 1, 'doubleShot.jpg', 12.00),
(12, 'Apple Turnover', 'A delectable snack featuring generous apple chunks enveloped in golden-brown pastry.\r\n\r\n \r\n\r\nIngredients: \r\n\r\nApple Fillings: Apple filling 38% (apples 26%, apple puree 6%, sugar, water, maize starch, lemon concentrated juice, antioxidant)\r\nDough: WHEAT flour, fine butter16%, water, EGGS, salt, WHEAT gluten. Barn laid eggs.', 3, 'appleTurnover.jpg', 16.00),
(13, 'Cinnamon Roll', 'Experience a unique blend of soft and crispy textures inspired by the classic French pastry.\r\n\r\nBest pairing beverage: \r\nCafé Latte / Americano / English Breakfast', 3, 'cinnamonRool.jpg', 16.00),
(14, 'Croissant', 'Savor this classic French pastry with its irresistible taste, aroma, and texture. Enjoy it solo or with butter and jam for the ultimate heavenly experience.\r\n\r\nBest pairing beverage: \r\nCafé Latte / Americano / English Breakfast', 3, 'croissant.jpg', 10.00),
(15, 'Salted Caramel Nut Danish', 'A unique mix of walnuts, sweet corn and cranberry glaze with salted caramel fills this lattice top danish, giving you a flavorful sensation with every bite.\r\n\r\nBest pairing beverage: \r\nCold Brew/ Iced Shaken Lemon Passion Tea', 3, 'danish.jpg', 16.00),
(16, 'Wholemeal Tuna Sandwich', 'A hearty, healthy sandwich with tuna and thinly-sliced fresh cucumber. A great choice to start your day with.\r\n\r\nBest pairing beverage: \r\nAmericano / Cold Brew', 3, 'tunaSandwich.jpg', 10.00),
(17, 'Signature Chicken Lasagna', 'Sink your fork into our Premium Signature Lasagna, where every bite is out-of-this-world, much like you’re flying First Class!\r\n\r\nJust imagine the creamy, cheesy and delicious mixture of chicken mixed with irresistible, savoury, bolognese sauce. ', 4, 'lasagna.jpg', 20.00),
(18, 'Spaghetti Bolognese', 'The classic tomato based pasta that everybody loves. Made with our Signature Homemade Sauce.', 4, 'bolognese.jpg', 18.00),
(19, 'Spaghetti Carbonara', 'The perfect creamy comfort pasta that brings warmth to the soul in every bite!', 4, 'carbonara.jpg', 18.00),
(20, 'Classic Mac & Cheese', 'Nothing screams cheese like this Classic Mac & Cheese! Comfort food so good that it’ll make you smile from ear to ear just as you would when you say “Cheese!”', 4, 'macAndCheese.jpg', 20.00),
(21, 'Brewed Tea', 'Discover the vibrant flavors of full-leaf tea. From light and invigorating to a bold and energizing blend, we have something for everyone.', 5, 'brewedTea.jpg', 10.00),
(22, 'Signature Hot Chocolate', 'Steamed milk with a generous amount of mocha-syrup, topped with fluffy whipped cream and cocoa powder.\r\n\r\n*Only available in hot*', 5, 'hotChocolate.jpg', 18.00),
(23, 'Matcha Latte', 'Sweetened matcha green tea with steamed milk. The Japanese tea ceremony emphasizes the virtues of humility, restraint and simplicity, its practice governed by a set of highly ritualized actions. But this smooth and creamy matcha-based beverage can be enjoyed any way you like. So by all means, slurp away if you want to.', 5, 'matchaLatte.jpg', 18.00),
(24, 'Iced Shaken Lemon Tea', 'Dark black tea. Sunny lemonade. Can such contradictory figures truly coexist in one delightfully refreshing drink? Thankfully, in this case opposites not only attract, they form the perfect marriage. Better yet, no one has to make any compromises – especially not in the flavor department. Did you know? The black and yellow stripes on the common bumblebee may have been the inspiration for this blend of black tea and lemonade. At least, no bumblebee has ever told us otherwise.', 5, 'lemonTea.jpg', 14.00),
(25, 'Strawberry Açai With Lemonade Starbucks Refreshers™', 'This ice-cold, fruity, and flavorful beverage bursts with berry goodness. Handcrafted with a delicious blend of fruit juice accented by strawberry and açaí notes, delightful zing of citrusy lemonade, and green coffee extract, this hand-shaken beverage surprises thanks to blissful strawberry pieces in every sip. The Strawberry Açaí with Lemonade Starbucks Refreshers™ is only available as an iced handcrafted beverage.', 5, 'strawberryLemonade.jpg', 20.00),
(26, 'Pumpkin Spice Latte', '\r\nPumpkin Spice Latte is a popular seasonal beverage featuring espresso, steamed milk, pumpkin pie spice, and often topped with whipped cream, enjoyed during autumn months.', 7, 'pumpkinSpiceLatte.png', 20.00),
(31, 'Maple Pecan Scones', 'Enjoy the delectable combination of rich maple and crunchy pecans in our Maple Pecan Scones. Each buttery scone is expertly crafted, with a delicate balance of sweet maple syrup and nutty pecans in every bite. Our Maple Pecan Scones are ideal for pairing with your morning coffee or as a delicious afternoon treat, and they provide a comforting taste of indulgence that will leave you wanting more.', 7, 'mfood.jpg', 9.90),
(32, 'Cranberry Orange Cake', 'Our Cranberry Orange Cake combines tangy cranberries and zesty orange to create a delightful harmony of flavours. Each moist and flavorful bite is a symphony of sweet and citrus notes, expertly balanced to tantalise your palate.', 7, 'new.cake.png', 18.90),
(33, 'Caramel Apple Latte', 'Enjoy the warm embrace of autumn with our Caramel Apple Latte. Enjoy the comforting warmth of freshly brewed espresso, perfectly blended with creamy caramel and the crisp sweetness of ripe apples. Each sip immerses your senses in a symphony of autumnal flavours, transporting you to orchard-filled landscapes and cosy fireside gatherings. ', 7, 'new.coffee2.jpg', 15.90),
(34, 'Tiramisu Cake', 'Embark on a decadent journey with our Tiramisu Cake, a divine creation that combines layers of delicate sponge cake soaked in rich espresso, luscious mascarpone cream, and cocoa powder. Each forkful is a symphony of flavours and textures, from the strong kick of coffee to the creamy indulgence of mascarpone, culminating in a divine dessert experience', 3, 'atf.cake.png', 12.90);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf32 COLLATE=utf32_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`, `email`, `password`) VALUES
(4, 'Jien Weng', 'Lai', 'Jr', 'reallyhat@gmail.com', '12345678'),
(5, 'Oscar', 'Chong', 'Oscar', 'oscar@gmail.com', 'Oscar1234'),
(6, 'En Yi', 'Liew', 'enyi', 'liewenyi@yahoo.com', '12345678'),
(7, 'John', 'Max', 'max', 'johnmax@hotmail.com', '12345678'),
(8, 'Oscar', 'Lai', 'Oscarr', 'oscar@hotmail.com', '12345678');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `contact_responses`
--
ALTER TABLE `contact_responses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`detail_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `contact_responses`
--
ALTER TABLE `contact_responses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`);