-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 12, 2013 at 10:56 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `skripsi_commerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

CREATE TABLE IF NOT EXISTS `administrator` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `im_type` int(11) NOT NULL,
  `im_id` varchar(50) NOT NULL,
  `user_active` enum('Y','N') NOT NULL,
  `im_active` enum('Y','N') NOT NULL,
  `user_type` int(11) NOT NULL,
  `reg_date` datetime NOT NULL,
  `last_update` datetime NOT NULL,
  `last_login` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `administrator`
--

INSERT INTO `administrator` (`id`, `username`, `password`, `im_type`, `im_id`, `user_active`, `im_active`, `user_type`, `reg_date`, `last_update`, `last_login`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 1, 'admin@admin.com', 'N', 'Y', 0, '2013-06-27 00:00:00', '0000-00-00 00:00:00', '2013-09-12 08:30:33');

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE IF NOT EXISTS `banner` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `image` varchar(200) NOT NULL,
  `link` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `position` varchar(50) NOT NULL,
  `is_active` enum('Y','N') NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `blocked` enum('Y','N') NOT NULL,
  `newsletter` enum('Y','N') NOT NULL,
  `reg_date` datetime NOT NULL,
  `last_login` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `username`, `password`, `blocked`, `newsletter`, `reg_date`, `last_login`) VALUES
(1, 'zambelz', '69bc95ff1293f0f3dbf62c862cd19dda', 'N', 'N', '2013-08-18 00:00:00', '2013-09-12 09:40:39');

-- --------------------------------------------------------

--
-- Table structure for table `customer_detail`
--

CREATE TABLE IF NOT EXISTS `customer_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_customer` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `sex` enum('Pria','Wanita') NOT NULL,
  `photo` varchar(200) NOT NULL,
  `address` text NOT NULL,
  `state` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `postal_code` varchar(10) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_customer` (`id_customer`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `customer_detail`
--

INSERT INTO `customer_detail` (`id`, `id_customer`, `fullname`, `sex`, `photo`, `address`, `state`, `city`, `postal_code`, `phone_number`, `email`) VALUES
(1, 1, 'nanda julianda', 'Pria', '', 'jl. cisaat', 'bali', 'denpasar', '484848', '089613716588', 'nanda@kebon.com');

-- --------------------------------------------------------

--
-- Table structure for table `customer_wishlist`
--

CREATE TABLE IF NOT EXISTS `customer_wishlist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_customer` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `date_added` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_customer` (`id_customer`,`id_product`),
  KEY `id_product` (`id_product`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `customer_wishlist`
--

INSERT INTO `customer_wishlist` (`id`, `id_customer`, `id_product`, `date_added`) VALUES
(1, 1, 3, '2013-09-12 04:33:11');

-- --------------------------------------------------------

--
-- Table structure for table `hits`
--

CREATE TABLE IF NOT EXISTS `hits` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hits_type` int(11) NOT NULL,
  `content_id` int(11) NOT NULL,
  `ip_address` varchar(100) NOT NULL,
  `hits` varchar(255) NOT NULL,
  `online` int(11) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `hits_type` (`hits_type`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `hits_type`
--

CREATE TABLE IF NOT EXISTS `hits_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `module_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `module_id` (`module_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `home_slider`
--

CREATE TABLE IF NOT EXISTS `home_slider` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_product` int(11) NOT NULL,
  `image` varchar(200) NOT NULL,
  `is_active` enum('Y','N') NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_product` (`id_product`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `home_slider`
--

INSERT INTO `home_slider` (`id`, `id_product`, `image`, `is_active`, `created`, `updated`) VALUES
(2, 4, '354766banner1.jpg', 'Y', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 6, '247192banner2.jpg', 'Y', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `msg_context` varchar(200) NOT NULL COMMENT 'module tujuan',
  `context_id` int(11) NOT NULL COMMENT 'id content dari module',
  `reply_to` int(11) NOT NULL,
  `user_type` enum('admin','customer','guest') NOT NULL,
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `content` text NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE IF NOT EXISTS `modules` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `module_name` varchar(100) NOT NULL,
  `total_size` int(11) NOT NULL,
  `module_table` varchar(200) NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`id`, `module_name`, `total_size`, `module_table`, `created`) VALUES
(2, 'customer', 0, '''customer'','' customer_detail'',''customer_wishlist''', '2013-08-24 00:00:00'),
(3, 'home', 0, '''home''', '2013-08-24 00:00:00'),
(5, 'messages', 0, '''messages''', '2013-08-24 00:00:00'),
(6, 'product', 0, '''product''', '2013-08-24 00:00:00'),
(7, 'product_brand', 0, '''product_brand''', '2013-08-24 00:00:00'),
(8, 'product_category', 0, '''product_category''', '2013-08-24 00:00:00'),
(9, 'themes', 0, '''themes''', '2013-08-24 00:00:00'),
(10, 'user', 0, '''user''', '2013-08-24 00:00:00'),
(11, 'order', 0, '''order'',''order_detail'',''order_temp''', '2013-08-24 00:00:00'),
(12, 'site_profile', 0, '''site_profile''', '2013-08-24 00:00:00'),
(13, 'banner', 0, '''banner''', '2013-08-24 00:00:00'),
(14, 'home_slider', 0, '''home_slider''', '2013-08-24 00:00:00'),
(15, 'page', 0, '', '2013-08-30 00:00:00'),
(16, 'product_review', 0, '''product_review''', '2013-08-30 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `transaction_code` varchar(100) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `total_qty` int(11) NOT NULL,
  `total_weight` int(11) NOT NULL,
  `shipping_tax` int(20) NOT NULL,
  `total` int(11) NOT NULL,
  `status` enum('0','1') NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_customer` (`id_customer`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE IF NOT EXISTS `order_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_order` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_order` (`id_order`),
  KEY `id_product` (`id_product`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `order_temp`
--

CREATE TABLE IF NOT EXISTS `order_temp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `session_id` varchar(200) NOT NULL,
  `id_product` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_product` (`id_product`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `order_temp`
--

INSERT INTO `order_temp` (`id`, `session_id`, `id_product`, `qty`) VALUES
(1, 'nonn4c380ctrd8qfl9ck9lfs31', 5, 1),
(5, '66hl90kasu5vf9qq1tq1ptsn74', 4, 1),
(6, 'p997m5piqg8g2t3ivc866djui6', 8, 1),
(9, 'glj1egf4ug8hl1ut3islb3en72', 3, 1),
(10, 'glj1egf4ug8hl1ut3islb3en72', 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_product_category` int(3) NOT NULL,
  `id_product_brand` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL,
  `price` int(20) NOT NULL,
  `weight` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `status` enum('0','1') NOT NULL,
  `description` text NOT NULL,
  `featured` enum('Y','N') NOT NULL,
  `rating` int(11) NOT NULL,
  `meta_desc` text NOT NULL,
  `meta_key` text NOT NULL,
  `publish` enum('Y','N') NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_product_category` (`id_product_category`),
  KEY `id_product_brand` (`id_product_brand`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `id_user`, `id_product_category`, `id_product_brand`, `name`, `image`, `price`, `weight`, `stock`, `status`, `description`, `featured`, `rating`, `meta_desc`, `meta_key`, `publish`, `created`, `updated`) VALUES
(3, 1, 1, 4, 'Intel core i5', '602539acer.jpg', 800000, 10, 100, '1', '<p>keterangan produk intel i5</p>', 'Y', 0, 'meta deskripsi produk intel i5', 'meta keyword produk intel i5', 'Y', '2013-08-10 04:59:21', '0000-00-00 00:00:00'),
(4, 1, 1, 1, 'Asus ', '334014asus.jpg', 1200000, 4, 50, '1', '', 'Y', 0, '', '', 'Y', '2013-08-17 03:49:36', '0000-00-00 00:00:00'),
(5, 1, 1, 1, 'HP', '393737hp.jpg', 5000000, 8, 20, '1', '', 'Y', 0, '', '', 'Y', '2013-08-17 03:52:24', '0000-00-00 00:00:00'),
(6, 1, 1, 1, 'Asus RT N16 Wireless Router', '469543Asus-RT-N16-Wireless-Router.jpg', 200000, 2, 100, '1', '', 'Y', 0, '', '', 'Y', '2013-08-17 03:54:26', '0000-00-00 00:00:00'),
(8, 1, 1, 1, 'lenovo', '450408lenovo.jpg', 200000, 4, 100, '1', '', 'Y', 0, '', '', 'Y', '2013-08-17 04:00:15', '0000-00-00 00:00:00'),
(9, 1, 2, 2, 'Test produk', 'no_image.jpg', 10000, 0, 100, '1', '<p>ajhsjahsj</p>', 'Y', 0, '', '', 'Y', '2013-09-01 09:54:01', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `product_brand`
--

CREATE TABLE IF NOT EXISTS `product_brand` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `image` varchar(200) NOT NULL,
  `web` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `meta_desc` text NOT NULL,
  `meta_key` text NOT NULL,
  `publish` enum('Y','N') NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `product_brand`
--

INSERT INTO `product_brand` (`id`, `name`, `image`, `web`, `description`, `meta_desc`, `meta_key`, `publish`, `created`, `updated`) VALUES
(1, 'tanpa brand', '', '', '', '', '', 'Y', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Acer', '634490acer.jpg', '', '', '', '', 'Y', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'Intel', '51879intel-logo.jpg', '', '', '', '', 'Y', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'AMD', '', '', '', '', '', 'Y', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'Microsoft', '', '', '', '', '', 'Y', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE IF NOT EXISTS `product_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `image` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `meta_desc` text NOT NULL,
  `meta_key` text NOT NULL,
  `publish` enum('Y','N') NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`id`, `parent`, `level`, `name`, `image`, `description`, `meta_desc`, `meta_key`, `publish`, `created`, `updated`) VALUES
(1, 0, 0, 'tanpa kategori', '', '', '', '', 'Y', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 0, 1, 'Hardware', '', '', '', '', 'Y', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 0, 2, 'Software', '', '', '', '', 'Y', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 2, 0, 'Harddisk', '', '', '', '', 'Y', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 2, 1, 'Motherboard', '', '', '', '', 'Y', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 2, 2, 'Proccessor', '', '', '', '', 'Y', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 3, 0, 'Sistem operasi', '', '', '', '', 'Y', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 2, 3, 'RAM', '', '', '', '', 'Y', '2013-08-20 00:00:00', '0000-00-00 00:00:00'),
(9, 2, 4, 'PSU', '', '', '', '', 'Y', '2013-08-20 00:00:00', '0000-00-00 00:00:00'),
(10, 2, 5, 'MOUSE', '', '', '', '', 'Y', '2013-08-20 00:00:00', '0000-00-00 00:00:00'),
(11, 2, 6, 'OPTICAL', '', '', '', '', 'Y', '2013-08-20 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `product_review`
--

CREATE TABLE IF NOT EXISTS `product_review` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_product` int(11) NOT NULL,
  `reply_to` int(11) NOT NULL,
  `user_type` enum('admin','customer','guest') NOT NULL,
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `content` text NOT NULL,
  `given_rating` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `site_profile`
--

CREATE TABLE IF NOT EXISTS `site_profile` (
  `id` int(11) NOT NULL,
  `site_name` varchar(100) NOT NULL,
  `site_author` varchar(50) NOT NULL,
  `site_slogan` varchar(100) NOT NULL,
  `site_footer` varchar(200) NOT NULL,
  `site_meta_desc` text NOT NULL,
  `site_meta_key` text NOT NULL,
  `site_status` enum('online','offline') NOT NULL,
  `offline_message` text NOT NULL,
  `date_updated` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `site_profile`
--

INSERT INTO `site_profile` (`id`, `site_name`, `site_author`, `site_slogan`, `site_footer`, `site_meta_desc`, `site_meta_key`, `site_status`, `offline_message`, `date_updated`) VALUES
(1, 'Ecommerce', 'Nanda . J . A', 'Program CMS eCommerce Untuk Skripsi', 'Copyright nanda julianda Â© 2013', 'meta description untuk home page', 'meta, keywords, untuk, home, page', 'offline', 'pesan offline kalo web offline', '2013-09-12 08:53:23');

-- --------------------------------------------------------

--
-- Table structure for table `themes`
--

CREATE TABLE IF NOT EXISTS `themes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `theme_name` varchar(100) NOT NULL,
  `design` enum('admin','site') NOT NULL,
  `is_active` enum('Y','N') NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `themes`
--

INSERT INTO `themes` (`id`, `theme_name`, `design`, `is_active`, `created`, `updated`) VALUES
(1, 'default', 'admin', 'Y', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'default', 'site', 'Y', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customer_detail`
--
ALTER TABLE `customer_detail`
  ADD CONSTRAINT `customer_detail_ibfk_1` FOREIGN KEY (`id_customer`) REFERENCES `customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `customer_wishlist`
--
ALTER TABLE `customer_wishlist`
  ADD CONSTRAINT `customer_wishlist_ibfk_1` FOREIGN KEY (`id_customer`) REFERENCES `customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `customer_wishlist_ibfk_2` FOREIGN KEY (`id_product`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `hits`
--
ALTER TABLE `hits`
  ADD CONSTRAINT `hits_ibfk_1` FOREIGN KEY (`hits_type`) REFERENCES `hits_type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `hits_type`
--
ALTER TABLE `hits_type`
  ADD CONSTRAINT `hits_type_ibfk_1` FOREIGN KEY (`module_id`) REFERENCES `modules` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `home_slider`
--
ALTER TABLE `home_slider`
  ADD CONSTRAINT `home_slider_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`id_customer`) REFERENCES `customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `order_detail_ibfk_1` FOREIGN KEY (`id_order`) REFERENCES `order` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_detail_ibfk_2` FOREIGN KEY (`id_product`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_temp`
--
ALTER TABLE `order_temp`
  ADD CONSTRAINT `order_temp_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`id_product_category`) REFERENCES `product_category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`id_product_brand`) REFERENCES `product_brand` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `administrator` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
