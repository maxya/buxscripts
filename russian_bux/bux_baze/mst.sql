-- phpMyAdmin SQL Dump
-- version 2.11.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 23, 2008 at 12:58 AM
-- Server version: 5.0.51
-- PHP Version: 5.2.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `pro`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_ads`
--

CREATE TABLE `tb_ads` (
  `id` int(11) NOT NULL auto_increment,
  `user` varchar(150) collate cp1251_general_ci NOT NULL,
  `ip` varchar(15) collate cp1251_general_ci NOT NULL,
  `tipo` varchar(150) collate cp1251_general_ci NOT NULL,
  `visitime` varchar(150) collate cp1251_general_ci NOT NULL,
  `ident` varchar(150) collate cp1251_general_ci NOT NULL,
  `fechainicia` varchar(150) collate cp1251_general_ci NOT NULL,
  `paypalname` varchar(150) collate cp1251_general_ci NOT NULL,
  `paypalemail` varchar(150) collate cp1251_general_ci NOT NULL,
  `plan` varchar(150) collate cp1251_general_ci NOT NULL,
  `bold` varchar(150) collate cp1251_general_ci NOT NULL,
  `highlight` varchar(150) collate cp1251_general_ci NOT NULL,
  `url` varchar(150) collate cp1251_general_ci NOT NULL,
  `description` varchar(150) collate cp1251_general_ci NOT NULL,
  `category` varchar(150) collate cp1251_general_ci NOT NULL,
  `members` varchar(150) collate cp1251_general_ci NOT NULL default '0',
  `outside` varchar(150) collate cp1251_general_ci NOT NULL default '0',
  `total` varchar(150) collate cp1251_general_ci NOT NULL default '0',
  KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251 COLLATE=cp1251_general_ci AUTO_INCREMENT=29 ;

--
-- Dumping data for table `tb_ads`
--

INSERT INTO `tb_ads` (`id`, `user`, `ip`, `tipo`, `visitime`, `ident`, `fechainicia`, `paypalname`, `paypalemail`, `plan`, `bold`, `highlight`, `url`, `description`, `category`, `members`, `outside`, `total`) VALUES
(1, '', '', 'ads', '', '', '1195231256', '', '2dmain@gmail.com', '10000', '1', '1', 'http://plati.ru', 'Categoria 1', '1', '5', '1', '0'),
(3, '', '', 'ads', '', '', '1195231395', '', 'nico@nico.c0m', '1000', '1', '1', 'http://plati.ru', 'Categoria 2', '1', '1', '0', '0'),
(6, '', '', 'ads', '', '', '1195493883', '', 'admin', '1000', '', '', 'http://palti.ru', 'Categoria 3', '1', '0', '0', '0'),
(22, 'sol', '', 'visit', '1195673371', '21', '', '', '', '', '', '', '', '', '', '0', '0', '0'),
(23, 'admin', '', 'visit', '1196562956', '1', '', '', '', '', '', '', '', '', '', '0', '0', '0'),
(25, 'sol', '', 'visit', '1197057471', '1', '', '', '', '', '', '', '', '', '', '0', '0', '0'),
(28, 'admin', '', 'visit', '1200639022', '27', '', '', '', '', '', '', '', '', '', '0', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tb_ads_categories`
--

CREATE TABLE `tb_ads_categories` (
  `id` int(11) NOT NULL,
  `catname` varchar(50) collate cp1251_general_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=cp1251 COLLATE=cp1251_general_ci;

--
-- Dumping data for table `tb_ads_categories`
--

INSERT INTO `tb_ads_categories` (`id`, `catname`) VALUES
(1, 'Arts & Entertainment'),
(5, 'Shopping & Free Offers'),
(2, 'Earn Money'),
(3, 'YourOwnBux Offers'),
(6, 'Society, Family & Relationships'),
(7, 'Charity &amp  Non-profit Organisations'),
(8, 'Travelling'),
(10, 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `tb_advertisers`
--

CREATE TABLE `tb_advertisers` (
  `id` int(11) NOT NULL auto_increment,
  `pname` varchar(150) collate cp1251_general_ci NOT NULL,
  `pemail` varchar(150) collate cp1251_general_ci NOT NULL,
  `plan` varchar(150) collate cp1251_general_ci NOT NULL,
  `url` varchar(150) collate cp1251_general_ci NOT NULL,
  `description` varchar(150) collate cp1251_general_ci NOT NULL,
  `category` varchar(150) collate cp1251_general_ci NOT NULL,
  `ip` varchar(15) collate cp1251_general_ci NOT NULL,
  `bold` varchar(150) collate cp1251_general_ci NOT NULL,
  `highlight` varchar(150) collate cp1251_general_ci NOT NULL,
  `tipo` varchar(150) collate cp1251_general_ci NOT NULL,
  `money` varchar(150) collate cp1251_general_ci NOT NULL,
  KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251 COLLATE=cp1251_general_ci AUTO_INCREMENT=40 ;

--
-- Dumping data for table `tb_advertisers`
--


-- --------------------------------------------------------

--
-- Table structure for table `tb_buyref`
--

CREATE TABLE `tb_buyref` (
  `id` int(11) NOT NULL auto_increment,
  `refnum` varchar(15) NOT NULL,
  `sets` varchar(150) NOT NULL,
  `customer` varchar(150) NOT NULL,
  `amount` varchar(150) NOT NULL,
  `refset` varchar(20) NOT NULL,
  `pemail` varchar(150) NOT NULL,
  `ip` varchar(15) NOT NULL,
  KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=43 ;

--
-- Dumping data for table `tb_buyref`
--

INSERT INTO `tb_buyref` (`id`, `refnum`, `sets`, `customer`, `amount`, `refset`, `pemail`, `ip`) VALUES
(1, '10', '18', 'admin', '', '', '', ''),
(1, '15', '2', 'admin', '', '', '', ''),
(1, '20', '1', 'admin', '', '', '', ''),
(1, '50', '1', 'admin', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_clickpack`
--

CREATE TABLE `tb_clickpack` (
  `id` int(11) NOT NULL,
  `item` varchar(150) collate cp1251_general_ci NOT NULL,
  `howmany` varchar(150) collate cp1251_general_ci NOT NULL,
  `price` varchar(150) collate cp1251_general_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=cp1251 COLLATE=cp1251_general_ci;

--
-- Dumping data for table `tb_clickpack`
--

INSERT INTO `tb_clickpack` (`id`, `item`, `howmany`, `price`) VALUES
(1, 'hits', '1000', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tb_config`
--

CREATE TABLE `tb_config` (
  `id` int(11) NOT NULL auto_increment,
  `item` varchar(15) collate cp1251_general_ci NOT NULL,
  `howmany` varchar(15) collate cp1251_general_ci NOT NULL,
  `price` varchar(150) collate cp1251_general_ci NOT NULL,
  KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251 COLLATE=cp1251_general_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tb_config`
--

INSERT INTO `tb_config` (`id`, `item`, `howmany`, `price`) VALUES
(1, 'click', '1', '0.01'),
(1, 'referalclick', '1', '0.01'),
(1, 'premiumclick', '1', '10'),
(1, 'premiumreferalc', '1', '25'),
(1, 'hits', '1000', '1'),
(1, 'hits', '2000', '2'),
(1, 'hits', '3000', '3'),
(1, 'hits', '5000', '5'),
(1, 'hits', '10000', '10'),
(1, 'payment', '1', '10.00'),
(1, 'upgrade', '1', '45.99'),
(1, 'hits', '500', '0.5'),
(1, 'hits', '20000', '20'),
(1, 'hits', '30000', '10'),
(1, 'hits', '50000', '50'),
(1, 'hits', '100000', '100');

-- --------------------------------------------------------

--
-- Table structure for table `tb_contact`
--

CREATE TABLE `tb_contact` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(150) collate cp1251_general_ci NOT NULL,
  `email` varchar(150) collate cp1251_general_ci NOT NULL,
  `topic` varchar(150) collate cp1251_general_ci NOT NULL,
  `subject` varchar(150) collate cp1251_general_ci NOT NULL,
  `comments` varchar(200) collate cp1251_general_ci NOT NULL,
  `ip` varchar(15) collate cp1251_general_ci NOT NULL,
  KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251 COLLATE=cp1251_general_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tb_contact`
--


-- --------------------------------------------------------

--
-- Table structure for table `tb_history`
--

CREATE TABLE `tb_history` (
  `id` int(11) NOT NULL auto_increment,
  `user` varchar(150) collate cp1251_general_ci NOT NULL,
  `date` varchar(150) collate cp1251_general_ci NOT NULL,
  `amount` int(150) NOT NULL,
  `method` varchar(150) collate cp1251_general_ci NOT NULL,
  `status` varchar(150) collate cp1251_general_ci NOT NULL,
  KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251 COLLATE=cp1251_general_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tb_history`
--

INSERT INTO `tb_history` (`id`, `user`, `date`, `amount`, `method`, `status`) VALUES
(1, 'admin', '', 0, 'paypal', ''),
(7, 'admin', '23 Jan 2008 00:55', 10, 'PayPal', 'Payment Sent');

-- --------------------------------------------------------

--
-- Table structure for table `tb_messenger`
--

CREATE TABLE `tb_messenger` (
  `id` int(11) NOT NULL auto_increment,
  `sendfrom` varchar(11) collate cp1251_general_ci NOT NULL,
  `sendto` varchar(11) collate cp1251_general_ci NOT NULL,
  `date` varchar(35) collate cp1251_general_ci NOT NULL,
  `comments` varchar(150) collate cp1251_general_ci NOT NULL,
  `status` varchar(11) collate cp1251_general_ci NOT NULL default 'unread',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251 COLLATE=cp1251_general_ci AUTO_INCREMENT=29 ;

--
-- Dumping data for table `tb_messenger`
--

INSERT INTO `tb_messenger` (`id`, `sendfrom`, `sendto`, `date`, `comments`, `status`) VALUES
(23, 'refadmin', 'admin', '09-01-08 03:24', 'hola mi amor', 'read');

-- --------------------------------------------------------

--
-- Table structure for table `tb_payme`
--

CREATE TABLE `tb_payme` (
  `id` int(11) NOT NULL auto_increment,
  `username` varchar(150) collate cp1251_general_ci NOT NULL,
  `pasword` varchar(150) collate cp1251_general_ci NOT NULL,
  `email` varchar(150) collate cp1251_general_ci NOT NULL,
  `pemail` varchar(150) collate cp1251_general_ci NOT NULL,
  `country` varchar(150) collate cp1251_general_ci NOT NULL,
  `money` varchar(150) collate cp1251_general_ci NOT NULL,
  `ip` varchar(15) collate cp1251_general_ci NOT NULL,
  KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251 COLLATE=cp1251_general_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tb_payme`
--


-- --------------------------------------------------------

--
-- Table structure for table `tb_refset`
--

CREATE TABLE `tb_refset` (
  `id` int(11) NOT NULL,
  `howmany` int(5) NOT NULL,
  `price` varchar(5) collate cp1251_general_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=cp1251 COLLATE=cp1251_general_ci;

--
-- Dumping data for table `tb_refset`
--

INSERT INTO `tb_refset` (`id`, `howmany`, `price`) VALUES
(4, 50, '35'),
(3, 20, '15'),
(2, 15, '11'),
(1, 10, '8');

-- --------------------------------------------------------

--
-- Table structure for table `tb_site`
--

CREATE TABLE `tb_site` (
  `id` varchar(11) collate cp1251_general_ci NOT NULL,
  `sitename` varchar(30) collate cp1251_general_ci NOT NULL,
  `sitepp` varchar(30) collate cp1251_general_ci NOT NULL,
  KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=cp1251 COLLATE=cp1251_general_ci;

--
-- Dumping data for table `tb_site`
--

INSERT INTO `tb_site` (`id`, `sitename`, `sitepp`) VALUES
('1', 'MST', 'paypal@youremail.tld');

-- --------------------------------------------------------

--
-- Table structure for table `tb_upgrade`
--

CREATE TABLE `tb_upgrade` (
  `id` int(11) NOT NULL auto_increment,
  `username` varchar(150) NOT NULL,
  `pemail` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `status` varchar(150) NOT NULL,
  `date` varchar(150) NOT NULL,
  `end` varchar(150) NOT NULL,
  `ip` varchar(15) NOT NULL,
  KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `tb_upgrade`
--


-- --------------------------------------------------------

--
-- Table structure for table `tb_users`
--

CREATE TABLE `tb_users` (
  `id` int(11) NOT NULL auto_increment,
  `username` varchar(15) collate cp1251_general_ci NOT NULL,
  `password` varchar(100) collate cp1251_general_ci NOT NULL,
  `ip` varchar(15) collate cp1251_general_ci NOT NULL,
  `email` varchar(150) collate cp1251_general_ci NOT NULL,
  `pemail` varchar(150) collate cp1251_general_ci NOT NULL,
  `referer` varchar(15) collate cp1251_general_ci NOT NULL,
  `country` varchar(150) collate cp1251_general_ci NOT NULL,
  `visits` varchar(150) collate cp1251_general_ci NOT NULL default '0',
  `referals` varchar(150) collate cp1251_general_ci NOT NULL default '0',
  `referalvisits` varchar(150) collate cp1251_general_ci NOT NULL default '0',
  `money` varchar(150) collate cp1251_general_ci NOT NULL default '0.00',
  `paid` varchar(150) collate cp1251_general_ci NOT NULL default '0.00',
  `joindate` varchar(150) collate cp1251_general_ci NOT NULL,
  `lastlogdate` varchar(150) collate cp1251_general_ci NOT NULL,
  `lastiplog` varchar(150) collate cp1251_general_ci NOT NULL,
  `account` varchar(150) collate cp1251_general_ci NOT NULL,
  `user_status` varchar(15) collate cp1251_general_ci NOT NULL default 'user',
  KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251 COLLATE=cp1251_general_ci AUTO_INCREMENT=20 ;

--
-- Dumping data for table `tb_users`
--

INSERT INTO `tb_users` (`id`, `username`, `password`, `ip`, `email`, `pemail`, `referer`, `country`, `visits`, `referals`, `referalvisits`, `money`, `paid`, `joindate`, `lastlogdate`, `lastiplog`, `account`, `user_status`) VALUES
(1, 'admin', 'admin', '127.0.0.1', 'admin@plati.ru', 'admin@plati.ru', '', 'Admin', '0', '0', '0', '-10', '10', '1184512264', '1201045992', '127.0.0.1', 'premium', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `users_online`
--

CREATE TABLE `users_online` (
  `visitor` varchar(15) collate cp1251_general_ci NOT NULL,
  `lastvisit` int(14) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=cp1251 COLLATE=cp1251_general_ci;

--
-- Dumping data for table `users_online`
--

INSERT INTO `users_online` (`visitor`, `lastvisit`) VALUES
('127.0.0.1', 1201045993);
