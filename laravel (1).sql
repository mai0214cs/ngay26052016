-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2016 at 12:53 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `config`
--

CREATE TABLE `config` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `value` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `config`
--

INSERT INTO `config` (`id`, `key`, `type`, `value`, `created_at`, `updated_at`) VALUES
(1, 'icon', 'image', '/library/img/logo.png', NULL, NULL),
(2, 'logo', 'image', '/library/img/logo.png', NULL, NULL),
(3, 'sologan', 'string', 'Bán hàng Online', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('Y','N') COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contenthtml`
--

CREATE TABLE `contenthtml` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `value` longtext COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `contenthtml`
--

INSERT INTO `contenthtml` (`id`, `name`, `value`, `created_at`, `updated_at`) VALUES
(1, 'Nội dung Footer', '<footer id="footer">\r\n<section class="footersocial">\r\n<div class="container">\r\n<div class="row">\r\n<div class="span3 aboutus">\r\n<h2>About Us</h2>\r\n\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.<br />\r\n<br />\r\nt has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>\r\n</div>\r\n\r\n<div class="span3 contact">\r\n<h2>Contact Us</h2>\r\n\r\n<ul>\r\n	<li class="phone">+123 456 7890, +123 456 7890</li>\r\n	<li class="mobile">+123 456 7890, +123 456 78900</li>\r\n	<li class="email">test@test.com</li>\r\n	<li class="email">test@test.com</li>\r\n</ul>\r\n</div>\r\n\r\n<div class="span3 twitter">\r\n<h2>Twitter</h2>\r\n\r\n<div id="twitter">&nbsp;</div>\r\n</div>\r\n</div>\r\n</div>\r\n</section>\r\n\r\n<section class="footerlinks">\r\n<div class="container">\r\n<div class="info">\r\n<ul>\r\n	<li><a href="#">Privacy Policy</a></li>\r\n	<li><a href="#">Terms &amp; Conditions</a></li>\r\n	<li><a href="#">Affiliates</a></li>\r\n	<li><a href="#">Newsletter</a></li>\r\n</ul>\r\n</div>\r\n\r\n<div id="footersocial"><a class="facebook" href="#" title="Facebook">Facebook</a> <a class="twitter" href="#" title="Twitter">Twitter</a> <a class="linkedin" href="#" title="Linkedin">Linkedin</a> <a class="rss" href="#" title="rss">rss</a> <a class="googleplus" href="#" title="Googleplus">Googleplus</a> <a class="skype" href="#" title="Skype">Skype</a> <a class="flickr" href="#" title="Flickr">Flickr</a></div>\r\n</div>\r\n</section>\r\n\r\n<section class="copyrightbottom">\r\n<div class="container">\r\n<div class="row">\r\n<div class="span6">All images are copyright to their owners.</div>\r\n\r\n<div class="span6 textright">ShopSimple @ 2012</div>\r\n</div>\r\n</div>\r\n</section>\r\n<a href="#" id="gotop">Back to top</a></footer>\r\n', NULL, '2016-05-25 19:19:07'),
(2, 'Nội dung cột trái', '', NULL, NULL),
(3, 'Nội dung cột phải', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ip` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `createdate` datetime NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('Y','N') COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `orderby` int(11) NOT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `createdate` datetime NOT NULL,
  `createby` bigint(20) NOT NULL,
  `modifieddate` datetime NOT NULL,
  `modifiedby` bigint(20) NOT NULL,
  `limitclick` bigint(20) NOT NULL,
  `numberclick` bigint(20) NOT NULL,
  `status` enum('Y','N') COLLATE utf8_unicode_ci NOT NULL,
  `type_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `imagetype`
--

CREATE TABLE `imagetype` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menudetail`
--

CREATE TABLE `menudetail` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `orderby` int(11) NOT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `parent_id` bigint(20) NOT NULL,
  `type_id` bigint(20) NOT NULL,
  `target` enum('Y','N') COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('Y','N') COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `menudetail`
--

INSERT INTO `menudetail` (`id`, `name`, `image`, `orderby`, `link`, `description`, `parent_id`, `type_id`, `target`, `status`, `created_at`, `updated_at`) VALUES
(1, '', '', 0, '', '', 0, 0, 'Y', 'Y', '2016-05-24 20:55:41', '2016-05-24 20:55:41'),
(4, 'Trang chủ', '/image.png', 999, '', '', 0, 1, 'N', 'Y', '2016-05-25 03:51:34', '2016-05-25 03:51:34'),
(5, 'Giới thiệu', '/image.png', 999, '', '', 0, 1, 'N', 'Y', '2016-05-25 03:51:44', '2016-05-25 03:51:44'),
(6, 'Sản phẩm', '/image.png', 999, '', '', 0, 1, 'N', 'Y', '2016-05-25 03:51:52', '2016-05-25 03:51:52'),
(7, 'Tin tức', '/image.png', 999, '', '', 0, 1, 'N', 'Y', '2016-05-25 03:52:01', '2016-05-25 03:52:01'),
(8, 'Bản đồ', '/image.png', 999, '', '', 0, 1, 'N', 'Y', '2016-05-25 03:52:10', '2016-05-25 03:52:10'),
(9, 'Liên hệ', '/image.png', 999, '', '', 0, 1, 'N', 'Y', '2016-05-25 03:52:23', '2016-05-25 03:52:23');

-- --------------------------------------------------------

--
-- Table structure for table `menutype`
--

CREATE TABLE `menutype` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `menutype`
--

INSERT INTO `menutype` (`id`, `name`, `avatar`, `created_at`, `updated_at`) VALUES
(1, 'Trình đơn chính', '', NULL, NULL),
(2, 'Trình đơn trái', '', NULL, NULL),
(3, 'Trình đơn phải', '', NULL, NULL),
(4, 'Trình đơn cuối trang', '', NULL, NULL),
(5, 'Trình đơn footer 1', '', NULL, NULL),
(6, 'Trình đơn footer 2', '', NULL, NULL),
(7, 'Trình đơn footer 3', '', NULL, NULL),
(8, 'Trình đơn footer chính', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `newscategory`
--

CREATE TABLE `newscategory` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `parent_id` bigint(20) NOT NULL,
  `orderby` int(11) NOT NULL,
  `seotitle` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `seodescription` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `seokeywords` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `createdate` datetime NOT NULL,
  `createby` bigint(20) NOT NULL,
  `modifieddate` datetime NOT NULL,
  `modifiedby` bigint(20) NOT NULL,
  `status` enum('Y','N') COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `alias` varchar(250) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `newslist`
--

CREATE TABLE `newslist` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `detail` longtext COLLATE utf8_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `moreimages` text COLLATE utf8_unicode_ci NOT NULL,
  `category_id` bigint(20) NOT NULL,
  `orderby` int(11) NOT NULL,
  `seotitle` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `seodescription` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `seokeywords` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `createdate` datetime NOT NULL,
  `createby` bigint(20) NOT NULL,
  `modifieddate` datetime NOT NULL,
  `modifiedby` bigint(20) NOT NULL,
  `status` enum('Y','N') COLLATE utf8_unicode_ci NOT NULL,
  `hot` enum('Y','N') COLLATE utf8_unicode_ci NOT NULL,
  `new` enum('Y','N') COLLATE utf8_unicode_ci NOT NULL,
  `feature` enum('Y','N') COLLATE utf8_unicode_ci NOT NULL,
  `viewcount` bigint(20) NOT NULL,
  `tags` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `alias` varchar(250) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `newslist`
--

INSERT INTO `newslist` (`id`, `name`, `description`, `detail`, `avatar`, `moreimages`, `category_id`, `orderby`, `seotitle`, `seodescription`, `seokeywords`, `createdate`, `createby`, `modifieddate`, `modifiedby`, `status`, `hot`, `new`, `feature`, `viewcount`, `tags`, `created_at`, `updated_at`, `alias`) VALUES
(1, 'dsgsdgs', 'dsgasfgsd', 'gsdfsfsd', '', '', 0, 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 'Y', 'Y', 'Y', 'Y', 0, '', '2016-05-23 09:36:21', '2016-05-23 09:36:21', ''),
(2, 'sfsafas', 'dsgasfgsdsadfsad', 'gsdfsfsđâsd', '', '', 0, 0, '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 'Y', 'Y', 'Y', 'Y', 0, '', '2016-05-23 09:38:28', '2016-05-23 09:38:28', ''),
(3, 'Tin tức 1', 'ưertwerw', '<p>dfhdtew</p>\r\n', '/lib/images/image/header-bg.png', '', 3, 999, 'dsfsdf', 'sdsfdsfwerwq', 'sdsfsdf', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 'Y', 'Y', 'Y', 'Y', 0, '', '2016-05-24 00:34:19', '2016-05-24 01:25:45', 'dsfa--ssd-v-cv-s-dsdcsd');

-- --------------------------------------------------------

--
-- Table structure for table `newstag`
--

CREATE TABLE `newstag` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `news_id` bigint(20) NOT NULL,
  `tag_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pageinfo`
--

CREATE TABLE `pageinfo` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `detail` longtext COLLATE utf8_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `seotitle` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `seodescription` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `seokeywords` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `createdate` datetime NOT NULL,
  `createby` bigint(20) NOT NULL,
  `modifieddate` datetime NOT NULL,
  `modifiedby` bigint(20) NOT NULL,
  `status` enum('Y','N') COLLATE utf8_unicode_ci NOT NULL,
  `viewcount` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `alias` varchar(250) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pageinfo`
--

INSERT INTO `pageinfo` (`id`, `name`, `description`, `detail`, `avatar`, `seotitle`, `seodescription`, `seokeywords`, `createdate`, `createby`, `modifieddate`, `modifiedby`, `status`, `viewcount`, `created_at`, `updated_at`, `alias`) VALUES
(1, 'Trang chủ', '', '', '', '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 'Y', 0, NULL, NULL, ''),
(2, 'Danh mục sản phẩm', '', '', '', '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 'Y', 0, NULL, NULL, ''),
(3, 'Danh mục tin tức', 'sdfaswqwe', '<p>sdfsdfsdf</p>\r\n', '/lib/images/image/header-bg.png', 'fghdfg', 'sdfsdfsd', 'sdgsdf', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 'Y', 0, NULL, '2016-05-25 03:36:59', 'fsdfsdfsd'),
(4, 'Khách hàng', '', '', '', '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 'Y', 0, NULL, NULL, ''),
(5, 'Thanh toán', '', '', '', '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 'Y', 0, NULL, NULL, ''),
(6, 'Liên hệ', '', '', '', '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 'Y', 0, NULL, NULL, ''),
(7, 'Bản đồ', '', '', '', '', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 'Y', 0, NULL, NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `productcategory`
--

CREATE TABLE `productcategory` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `parent_id` bigint(20) NOT NULL,
  `orderby` int(11) NOT NULL,
  `seotitle` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `seodescription` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `seokeywords` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `createdate` datetime NOT NULL,
  `createby` bigint(20) NOT NULL,
  `modifieddate` datetime NOT NULL,
  `modifiedby` bigint(20) NOT NULL,
  `status` enum('Y','N') COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `alias` varchar(250) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `productcategory`
--

INSERT INTO `productcategory` (`id`, `name`, `avatar`, `parent_id`, `orderby`, `seotitle`, `seodescription`, `seokeywords`, `createdate`, `createby`, `modifieddate`, `modifiedby`, `status`, `created_at`, `updated_at`, `alias`) VALUES
(1, 'Danh mục sản phẩm', 'edwerwerwe', 0, 999, 'Danh mục sản phẩm 1', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 'Y', '2016-05-24 02:25:15', '2016-05-25 21:22:33', 'danh-muc-san-pham');

-- --------------------------------------------------------

--
-- Table structure for table `productlist`
--

CREATE TABLE `productlist` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `detail` longtext COLLATE utf8_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `moreimages` text COLLATE utf8_unicode_ci NOT NULL,
  `price` bigint(20) NOT NULL,
  `promotionprice` bigint(20) NOT NULL,
  `includedvat` enum('Y','N') COLLATE utf8_unicode_ci NOT NULL,
  `quantity` bigint(20) NOT NULL,
  `category_id` bigint(20) NOT NULL,
  `warranty` int(11) NOT NULL,
  `orderby` int(11) NOT NULL,
  `seotitle` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `seodescription` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `seokeywords` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `createdate` datetime NOT NULL,
  `createby` bigint(20) NOT NULL,
  `modifieddate` datetime NOT NULL,
  `modifiedby` bigint(20) NOT NULL,
  `status` enum('Y','N') COLLATE utf8_unicode_ci NOT NULL,
  `hot` enum('Y','N') COLLATE utf8_unicode_ci NOT NULL,
  `new` enum('Y','N') COLLATE utf8_unicode_ci NOT NULL,
  `feature` enum('Y','N') COLLATE utf8_unicode_ci NOT NULL,
  `viewcount` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `alias` varchar(250) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `productlist`
--

INSERT INTO `productlist` (`id`, `code`, `name`, `description`, `detail`, `avatar`, `moreimages`, `price`, `promotionprice`, `includedvat`, `quantity`, `category_id`, `warranty`, `orderby`, `seotitle`, `seodescription`, `seokeywords`, `createdate`, `createby`, `modifieddate`, `modifiedby`, `status`, `hot`, `new`, `feature`, `viewcount`, `created_at`, `updated_at`, `alias`) VALUES
(1, 'abcd', 'Quần áo cao cấp', 'Quần áo cao cấp', '<p>Quần &aacute;o cao cấp</p>\r\n', '/lib/files/Product/product1a.jpg', '', 12000, 10000, 'N', 0, 1, 0, 999, 'Quần áo cao cấp cdsasdasf', 'Quần áo cao cấp', 'Quần áo cao cấpdf fs ádasda', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 'Y', 'Y', 'N', 'Y', 0, '2016-05-24 03:02:26', '2016-05-26 01:21:12', 'quan-ao-cao-caphtml'),
(2, '', 'Sản phẩm 2', '', '', '/lib/files/Product/product2a.jpg', '', 0, 0, 'Y', 0, 1, 0, 999, 'gdgsafas', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 'Y', 'Y', 'Y', 'Y', 0, '2016-05-24 03:57:53', '2016-05-25 21:24:10', 'gdgsafas'),
(3, '', 'Sản phẩm 3', '', '', '/lib/files/Product/product1a.jpg', '', 0, 0, 'Y', 0, 1, 0, 999, 'Sản phẩm 3', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 'Y', 'Y', 'N', 'Y', 0, '2016-05-25 21:24:40', '2016-05-26 01:25:20', 'sn-phm-'),
(4, '', 'Sản phẩm 4', '', '', '/lib/files/Product/product2a.jpg', '', 0, 0, 'Y', 0, 1, 0, 999, 'Sản phẩm 4', '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 'Y', 'Y', 'Y', 'Y', 0, '2016-05-25 21:24:54', '2016-05-25 21:24:54', 'sn-phm-364777');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `orderby` int(11) NOT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `createdate` datetime NOT NULL,
  `createby` bigint(20) NOT NULL,
  `modifieddate` datetime NOT NULL,
  `modifiedby` bigint(20) NOT NULL,
  `status` enum('Y','N') COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `name`, `image`, `orderby`, `link`, `description`, `createdate`, `createby`, `modifieddate`, `modifiedby`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Hình ảnh 1', '/lib/files/Slider/banner1.jpg', 999, '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 'Y', '2016-05-25 18:27:06', '2016-05-25 18:27:06'),
(3, 'Hình ảnh 2', '/lib/files/Slider/banner2.jpg', 999, '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 'Y', '2016-05-25 18:28:05', '2016-05-25 18:28:05'),
(4, 'Hình ảnh 3', '/lib/files/Slider/banner1.jpg', 999, '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 'Y', '2016-05-25 18:28:16', '2016-05-25 18:28:16'),
(5, 'Hình ảnh 4', '/lib/files/Slider/banner2.jpg', 999, '', '', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, 'Y', '2016-05-25 18:28:27', '2016-05-25 18:28:27');

-- --------------------------------------------------------

--
-- Table structure for table `support`
--

CREATE TABLE `support` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fullname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `yahoo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `skype` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `facebook` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `website` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `orderby` int(11) NOT NULL,
  `status` enum('Y','N') COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `support`
--

INSERT INTO `support` (`id`, `fullname`, `avatar`, `description`, `yahoo`, `skype`, `facebook`, `address`, `website`, `orderby`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Mai Đức Thạch', '/lib/images/image/header-bg.png', 'sfsdfsd', 'mai0214cs_baicakhonggian', 'maiducthach', 'maiducthach', 'Ba Đình - Hà Nội', 'webnadi.com', 999, 'Y', '2016-05-25 01:29:38', '2016-05-25 01:29:38');

-- --------------------------------------------------------

--
-- Table structure for table `tag`
--

CREATE TABLE `tag` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `config`
--
ALTER TABLE `config`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contenthtml`
--
ALTER TABLE `contenthtml`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `imagetype`
--
ALTER TABLE `imagetype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menudetail`
--
ALTER TABLE `menudetail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menutype`
--
ALTER TABLE `menutype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newscategory`
--
ALTER TABLE `newscategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newslist`
--
ALTER TABLE `newslist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newstag`
--
ALTER TABLE `newstag`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pageinfo`
--
ALTER TABLE `pageinfo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `productcategory`
--
ALTER TABLE `productcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `productlist`
--
ALTER TABLE `productlist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `support`
--
ALTER TABLE `support`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `config`
--
ALTER TABLE `config`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `contenthtml`
--
ALTER TABLE `contenthtml`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `imagetype`
--
ALTER TABLE `imagetype`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `menudetail`
--
ALTER TABLE `menudetail`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `menutype`
--
ALTER TABLE `menutype`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `newscategory`
--
ALTER TABLE `newscategory`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `newslist`
--
ALTER TABLE `newslist`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `newstag`
--
ALTER TABLE `newstag`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pageinfo`
--
ALTER TABLE `pageinfo`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `productcategory`
--
ALTER TABLE `productcategory`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `productlist`
--
ALTER TABLE `productlist`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `support`
--
ALTER TABLE `support`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tag`
--
ALTER TABLE `tag`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
