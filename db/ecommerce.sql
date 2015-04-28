-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 24 Noi 2014 la 19:01
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `admins`
--

CREATE TABLE IF NOT EXISTS `admins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Salvarea datelor din tabel `admins`
--

INSERT INTO `admins` (`id`, `first_name`, `last_name`, `email`, `password`) VALUES
(1, 'Sebastian', 'Sulinski', 'sebastian.sulinski@gmail.com', 'e6a866daadb723bd5379bb0322ae3c5168ac7e7fc5fe41e2715c680291b9696b53ddb642262aab58a282a85d6e72cf638333be48679a8e66a0b56593d5953620');

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `business`
--

CREATE TABLE IF NOT EXISTS `business` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `address` text NOT NULL,
  `telephone` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `website` varchar(200) NOT NULL,
  `vat_rate` decimal(5,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Salvarea datelor din tabel `business`
--

INSERT INTO `business` (`id`, `name`, `address`, `telephone`, `email`, `website`, `vat_rate`) VALUES
(1, 'eCommerce', 'Timisoara', '0256 555 555', 'business@businessemail.com', 'businessemail.com', '24.00');

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Salvarea datelor din tabel `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Biographies & Autobiographies'),
(2, 'Computers & IT'),
(3, 'Art & Architecture'),
(4, 'PC Games');

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `clients`
--

CREATE TABLE IF NOT EXISTS `clients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(150) NOT NULL,
  `last_name` varchar(150) NOT NULL,
  `address_1` varchar(255) NOT NULL,
  `address_2` varchar(255) NOT NULL,
  `town` varchar(255) NOT NULL,
  `county` varchar(255) NOT NULL,
  `post_code` varchar(10) NOT NULL,
  `country` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `hash` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `country` (`country`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Salvarea datelor din tabel `clients`
--

INSERT INTO `clients` (`id`, `first_name`, `last_name`, `address_1`, `address_2`, `town`, `county`, `post_code`, `country`, `email`, `password`, `date`, `active`, `hash`) VALUES
(1, 'Sebastian', 'Sulinski', 'Some address', '', 'Bognor Regis', 'West Sussex', 'Post Code', 229, 'sebastian.sulinski@gmail.com', 'b109f3bbbc244eb82441917ed06d618b9008dd09b3befd1b5e07394c706a8bb980b1d7785e5976ec049b46df5f1326af5a2ea6d103fd07c95385ffab0cacbc86', '2010-12-14 18:27:56', 1, '133493328520101214182756968055345'),
(2, 'Alexandru', 'Tenche', 'Timisoara', '', 'Timisoara', 'Timis', '300211', 180, 'alex.tenche@gmail.com', 'd63d0855ebec6a90e1e6e44a7c206ec907828387e130ac84482da5dba6e44989c2946667f00471da59873b92a3974f08dccd89d7f851cdd37000e8fab5b7a81a', '2014-11-24 08:53:02', 1, '1592142581201411240853021923108053');

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `countries`
--

CREATE TABLE IF NOT EXISTS `countries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `code` varchar(3) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=244 ;

--
-- Salvarea datelor din tabel `countries`
--

INSERT INTO `countries` (`id`, `name`, `code`) VALUES
(1, 'Afghanistan', 'AF'),
(2, 'Ãland Islands', 'AX'),
(3, 'Albania', 'AL'),
(4, 'Algeria', 'DZ'),
(5, 'American Samoa', 'AS'),
(6, 'Andorra', 'AD'),
(7, 'Angola', 'AO'),
(8, 'Anguilla', 'AI'),
(9, 'Antarctica', 'AQ'),
(10, 'Antigua And Barbuda', 'AG'),
(11, 'Argentina', 'AR'),
(12, 'Armenia', 'AM'),
(13, 'Aruba', 'AW'),
(14, 'Australia', 'AU'),
(15, 'Austria', 'AT'),
(16, 'Azerbaijan', 'AZ'),
(17, 'Bahamas', 'BS'),
(18, 'Bahrain', 'BH'),
(19, 'Bangladesh', 'BD'),
(20, 'Barbados', 'BB'),
(21, 'Belarus', 'BY'),
(22, 'Belgium', 'BE'),
(23, 'Belize', 'BZ'),
(24, 'Benin', 'BJ'),
(25, 'Bermuda', 'BM'),
(26, 'Bhutan', 'BT'),
(27, 'Bolivia', 'BO'),
(28, 'Bosnia And Herzegovina', 'BA'),
(29, 'Botswana', 'BW'),
(30, 'Bouvet Island', 'BV'),
(31, 'Brazil', 'BR'),
(32, 'British Indian Ocean Territory', 'IO'),
(33, 'Brunei Darussalam', 'BN'),
(34, 'Bulgaria', 'BG'),
(35, 'Burkina Faso', 'BF'),
(36, 'Burundi', 'BI'),
(37, 'Cambodia', 'KH'),
(38, 'Cameroon', 'CM'),
(39, 'Canada', 'CA'),
(40, 'Cape Verde', 'CV'),
(41, 'Cayman Islands', 'KY'),
(42, 'Central African Republic', 'CF'),
(43, 'Chad', 'TD'),
(44, 'Chile', 'CL'),
(45, 'China', 'CN'),
(46, 'Christmas Island', 'CX'),
(47, 'Cocos (keeling) Islands', 'CC'),
(48, 'Colombia', 'CO'),
(49, 'Comoros', 'KM'),
(50, 'Congo', 'CG'),
(51, 'Congo, The Democratic Republic Of', 'CD'),
(52, 'Cook Islands', 'CK'),
(53, 'Costa Rica', 'CR'),
(54, 'Cote D''ivoire', 'CI'),
(55, 'Croatia', 'HR'),
(56, 'Cuba', 'CU'),
(57, 'Cyprus', 'CY'),
(58, 'Czech Republic', 'CZ'),
(59, 'Denmark', 'DK'),
(60, 'Djibouti', 'DJ'),
(61, 'Dominica', 'DM'),
(62, 'Dominican Republic', 'DO'),
(63, 'Ecuador', 'EC'),
(64, 'Egypt', 'EG'),
(65, 'El Salvador', 'SV'),
(66, 'Equatorial Guinea', 'GQ'),
(67, 'Eritrea', 'ER'),
(68, 'Estonia', 'EE'),
(69, 'Ethiopia', 'ET'),
(70, 'Falkland Islands (malvinas)', 'FK'),
(71, 'Faroe Islands', 'FO'),
(72, 'Fiji', 'FJ'),
(73, 'Finland', 'FI'),
(74, 'France', 'FR'),
(75, 'French Guiana', 'GF'),
(76, 'French Polynesia', 'PF'),
(77, 'French Southern Territories', 'TF'),
(78, 'Gabon', 'GA'),
(79, 'Gambia', 'GM'),
(80, 'Georgia', 'GE'),
(81, 'Germany', 'DE'),
(82, 'Ghana', 'GH'),
(83, 'Gibraltar', 'GI'),
(84, 'Greece', 'GR'),
(85, 'Greenland', 'GL'),
(86, 'Grenada', 'GD'),
(87, 'Guadeloupe', 'GP'),
(88, 'Guam', 'GU'),
(89, 'Guatemala', 'GT'),
(90, 'Guernsey', 'GG'),
(91, 'Guinea', 'GN'),
(92, 'Guinea-bissau', 'GW'),
(93, 'Guyana', 'GY'),
(94, 'Haiti', 'HT'),
(95, 'Heard Island And Mcdonald Islands', 'HM'),
(96, 'Holy See (vatican City State)', 'VA'),
(97, 'Honduras', 'HN'),
(98, 'Hong Kong', 'HK'),
(99, 'Hungary', 'HU'),
(100, 'Iceland', 'IS'),
(101, 'India', 'IN'),
(102, 'Indonesia', 'ID'),
(103, 'Iran, Islamic Republic Of', 'IR'),
(104, 'Iraq', 'IQ'),
(105, 'Ireland', 'IE'),
(106, 'Isle Of Man', 'IM'),
(107, 'Israel', 'IL'),
(108, 'Italy', 'IT'),
(109, 'Jamaica', 'JM'),
(110, 'Japan', 'JP'),
(111, 'Jersey', 'JE'),
(112, 'Jordan', 'JO'),
(113, 'Kazakhstan', 'KZ'),
(114, 'Kenya', 'KE'),
(115, 'Kiribati', 'KI'),
(116, 'Korea, Democratic People''s Republic Of', 'KP'),
(117, 'Korea, Republic Of', 'KR'),
(118, 'Kuwait', 'KW'),
(119, 'Kyrgyzstan', 'KG'),
(120, 'Lao People''s Democratic Republic', 'LA'),
(121, 'Latvia', 'LV'),
(122, 'Lebanon', 'LB'),
(123, 'Lesotho', 'LS'),
(124, 'Liberia', 'LR'),
(125, 'Libyan Arab Jamahiriya', 'LY'),
(126, 'Liechtenstein', 'LI'),
(127, 'Lithuania', 'LT'),
(128, 'Luxembourg', 'LU'),
(129, 'Macao', 'MO'),
(130, 'Macedonia, The Former Yugoslav Republic Of', 'MK'),
(131, 'Madagascar', 'MG'),
(132, 'Malawi', 'MW'),
(133, 'Malaysia', 'MY'),
(134, 'Maldives', 'MV'),
(135, 'Mali', 'ML'),
(136, 'Malta', 'MT'),
(137, 'Marshall Islands', 'MH'),
(138, 'Martinique', 'MQ'),
(139, 'Mauritania', 'MR'),
(140, 'Mauritius', 'MU'),
(141, 'Mayotte', 'YT'),
(142, 'Mexico', 'MX'),
(143, 'Micronesia, Federated States Of', 'FM'),
(144, 'Moldova, Republic Of', 'MD'),
(145, 'Monaco', 'MC'),
(146, 'Mongolia', 'MN'),
(147, 'Montserrat', 'MS'),
(148, 'Morocco', 'MA'),
(149, 'Mozambique', 'MZ'),
(150, 'Myanmar', 'MM'),
(151, 'Namibia', 'NA'),
(152, 'Nauru', 'NR'),
(153, 'Nepal', 'NP'),
(154, 'Netherlands', 'NL'),
(155, 'Netherlands Antilles', 'AN'),
(156, 'New Caledonia', 'NC'),
(157, 'New Zealand', 'NZ'),
(158, 'Nicaragua', 'NI'),
(159, 'Niger', 'NE'),
(160, 'Nigeria', 'NG'),
(161, 'Niue', 'NU'),
(162, 'Norfolk Island', 'NF'),
(163, 'Northern Mariana Islands', 'MP'),
(164, 'Norway', 'NO'),
(165, 'Oman', 'OM'),
(166, 'Pakistan', 'PK'),
(167, 'Palau', 'PW'),
(168, 'Palestinian Territory, Occupied', 'PS'),
(169, 'Panama', 'PA'),
(170, 'Papua New Guinea', 'PG'),
(171, 'Paraguay', 'PY'),
(172, 'Peru', 'PE'),
(173, 'Philippines', 'PH'),
(174, 'Pitcairn', 'PN'),
(175, 'Poland', 'PL'),
(176, 'Portugal', 'PT'),
(177, 'Puerto Rico', 'PR'),
(178, 'Qatar', 'QA'),
(179, 'Reunion', 'RE'),
(180, 'Romania', 'RO'),
(181, 'Russian Federation', 'RU'),
(182, 'Rwanda', 'RW'),
(183, 'Saint Helena', 'SH'),
(184, 'Saint Kitts And Nevis', 'KN'),
(185, 'Saint Lucia', 'LC'),
(186, 'Saint Pierre And Miquelon', 'PM'),
(187, 'Saint Vincent And The Grenadines', 'VC'),
(188, 'Samoa', 'WS'),
(189, 'San Marino', 'SM'),
(190, 'Sao Tome And Principe', 'ST'),
(191, 'Saudi Arabia', 'SA'),
(192, 'Senegal', 'SN'),
(193, 'Serbia And Montenegro', 'CS'),
(194, 'Seychelles', 'SC'),
(195, 'Sierra Leone', 'SL'),
(196, 'Singapore', 'SG'),
(197, 'Slovakia', 'SK'),
(198, 'Slovenia', 'SI'),
(199, 'Solomon Islands', 'SB'),
(200, 'Somalia', 'SO'),
(201, 'South Africa', 'ZA'),
(202, 'South Georgia And The South Sandwich Islands', 'GS'),
(203, 'Spain', 'ES'),
(204, 'Sri Lanka', 'LK'),
(205, 'Sudan', 'SD'),
(206, 'Suriname', 'SR'),
(207, 'Svalbard And Jan Mayen', 'SJ'),
(208, 'Swaziland', 'SZ'),
(209, 'Sweden', 'SE'),
(210, 'Switzerland', 'CH'),
(211, 'Syrian Arab Republic', 'SY'),
(212, 'Taiwan, Province Of China', 'TW'),
(213, 'Tajikistan', 'TJ'),
(214, 'Tanzania, United Republic Of', 'TZ'),
(215, 'Thailand', 'TH'),
(216, 'Timor-leste', 'TL'),
(217, 'Togo', 'TG'),
(218, 'Tokelau', 'TK'),
(219, 'Tonga', 'TO'),
(220, 'Trinidad And Tobago', 'TT'),
(221, 'Tunisia', 'TN'),
(222, 'Turkey', 'TR'),
(223, 'Turkmenistan', 'TM'),
(224, 'Turks And Caicos Islands', 'TC'),
(225, 'Tuvalu', 'TV'),
(226, 'Uganda', 'UG'),
(227, 'Ukraine', 'UA'),
(228, 'United Arab Emirates', 'AE'),
(229, 'United Kingdom', 'GB'),
(230, 'United States', 'US'),
(231, 'United States Minor Outlying Islands', 'UM'),
(232, 'Uruguay', 'UY'),
(233, 'Uzbekistan', 'UZ'),
(234, 'Vanuatu', 'VU'),
(235, 'Venezuela', 'VE'),
(236, 'Viet Nam', 'VN'),
(237, 'Virgin Islands, British', 'VG'),
(238, 'Virgin Islands, U.S.', 'VI'),
(239, 'Wallis And Futuna', 'WF'),
(240, 'Western Sahara', 'EH'),
(241, 'Yemen', 'YE'),
(242, 'Zambia', 'ZM'),
(243, 'Zimbabwe', 'ZW');

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `client` int(11) NOT NULL,
  `vat_rate` decimal(5,2) NOT NULL,
  `vat` decimal(8,2) NOT NULL,
  `subtotal` decimal(8,2) NOT NULL,
  `total` decimal(8,2) NOT NULL,
  `date` datetime NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `pp_status` tinyint(1) NOT NULL DEFAULT '0',
  `txn_id` varchar(100) DEFAULT NULL,
  `payment_status` varchar(100) DEFAULT NULL,
  `ipn` text,
  `response` varchar(100) DEFAULT NULL,
  `notes` text,
  PRIMARY KEY (`id`),
  KEY `client` (`client`),
  KEY `fk_stage` (`status`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Salvarea datelor din tabel `orders`
--

INSERT INTO `orders` (`id`, `client`, `vat_rate`, `vat`, `subtotal`, `total`, `date`, `status`, `pp_status`, `txn_id`, `payment_status`, `ipn`, `response`, `notes`) VALUES
(1, 1, '17.50', '16.58', '94.75', '111.33', '2010-12-14 19:20:52', 3, 1, 'asdf', 'Completed', NULL, NULL, 'Some notes about the order');

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `orders_items`
--

CREATE TABLE IF NOT EXISTS `orders_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order` int(11) NOT NULL,
  `product` int(11) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `qty` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `order` (`order`,`product`),
  KEY `FK_PRODUCT` (`product`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Salvarea datelor din tabel `orders_items`
--

INSERT INTO `orders_items` (`id`, `order`, `product`, `price`, `qty`) VALUES
(1, 1, 19, '18.95', 5);

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `date` datetime NOT NULL,
  `category` int(11) NOT NULL,
  `image` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `category` (`category`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=24 ;

--
-- Salvarea datelor din tabel `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `date`, `category`, `image`) VALUES
(1, 'Lou Reed''s New York', 'After his first book of photographs was published, Lou Reed told a journalist for The Independent on Sunday that, "I live on intuition and taking pictures is intuitive." Here, we see Lou Reed''s intuitive take on New York, the city that has been the fulcrum of his creative world for decades and with which he has become indelibly identified. We''ve heard about the streets and characters for so long through his words and music, and now we can see it through his eyes. Over 100 of Reed''s photographs comprise New York, an intimate view of what inspires him. Hardcover, 9 x 13.5 in./192 pgs / 100 color.', '16.25', '2010-07-19 22:58:30', 1, '41jvrdnqpcl.-ss500-.jpg'),
(2, 'Andy Warhol Prints: A Catalogue Raisonné 1962-1987', 'No one can doubt that Andy Warhol has influenced the American art world both as an artist and as a personality. Feldman and Schellmann''s catalog provides the specialist with a multitude of color images that do much to illuminate Warhol as a printmaker. Unfortunately, the reproductions take up less space than the blank areas surrounding them. These small reproductions are preceded by two brief essays that provide a less-than-adequate introduction to the prints. Geldzahler has only praise for Warhol and dutifully acclaims his ``contribution to art history.'''' Roberta Bernstein''s essay is more substantive; she is more analytical and willing to make critical judgments. Though useful as a catalog of Warhol''s 364 prints, this book is not what it could be. Douglas G. Campbell, Ctr. for Fine Arts, Warner Pacific Coll., Portland, Ore.\r\nCopyright 1985 Reed Business Information, Inc.', '17.50', '2010-07-19 23:01:23', 3, '51msk1xtdbl.-ss500-.jpg'),
(3, 'The Autobiography and Sex Life of Andy Warhol', 'Village Voice and Interview cofounder John Wilcock was first drawn into the milieu of Andy Warhol through filmmaker Jonas Mekas, assisting on some of Warhol''s early films, hanging out at his parties and quickly becoming a regular at the Factory. "About six months after I started hanging out at the old, silvery Factory on West 47th Street," he recalls, "[Gerard] Malanga came up to me and asked, ''When are you going to write something about us?''" Already fascinated by Warhol''s persona, Wilcock went to work, interviewing the artist''s closest associates, supporters and superstars. Among these were Malanga, Naomi Levine, Taylor Mead and Ultra Violet, all of whom had been in the earliest films; scriptwriter Ronnie Tavel, and photographer Gretchen Berg; art dealers Sam Green, Ivan Karp, Eleanor Ward and Leo Castelli, and the Metropolitan Museum of Art''s Henry Geldzahler; the poets Charles Henri Ford and Taylor Mead, and the artist Marisol; and the musicians Lou Reed and Nico. Paul Morrissey supplied the title: The Autobiography and Sex Life of Andy Warhol is the first oral biography of the artist. First published in 1971, and pitched against the colorful backdrop of the 1960s, it assembles a prismatic portrait of one of modern art''s least knowable artists during the early years of his fame. The Autobiography and Sex Life is likely the most revealing portrait of Warhol, being composite instead of singular; each of its interviewees offers a piece of the puzzle that was Andy Warhol. This new edition corrects the many errors of the first, and is beautifully designed in a bright, Warholian palette with numerous illustrations.The British-born writer John Wilcock cofounded The Village Voice in 1955, and went on to edit seminal publications such as The East Village Other, Los Angeles Free Press, Other Scenes and (in 1970) Interview, with Andy Warhol. ', '28.56', '2010-07-19 23:03:29', 1, '51yw-ak9hgl.-ss400-.jpg'),
(13, 'Inside The Actors Studio - Johnny Depp', 'In one of only a handful of interviews Johnny Depp has ever granted, he brings both his fascinating eccentricity and his deep, uncompromising devotion to the craft of acting to the master s degree candidates of the Actors Studio Drama School at Pace University and to the viewers of Inside the Actors Studio in 125 countries around the world. ', '18.54', '2010-07-19 23:13:48', 1, '41tvgoec72l.-ss500-.jpg'),
(14, 'Miles, the Autobiography', 'Miles Davis, with all his faults, flaws and laughable quirks, was still one of the most important musicians of the twentieth century. It takes a book like this where he leaves no stone unturned to make clear the debt we all owe him and his contemporaries, as well as the restless spirit that lead him beyond what he helped to establish as modern jazz. In many ways he shows himself to be, ironically, the archetypal and sterotypical artist simultaneously. Yet his telling of the profound friendships he had with Max Roach and Coltrane, his deep awe and respect but dispassionate eye for the genius and addictions of Charlie Parker, the loves of his life- and what he put them through, and his brutal, courageous hoonesty in general, gives us a gift of his haunting humanity.', '9.68', '2010-07-19 23:19:08', 1, '41pw5c70m-l.-ss500-.jpg'),
(16, 'Dali (Taschen Basic Art Series)', 'Surveys the life and work of the Surrealist artist, and describes how his artistic vision transformed great works from earlier periods in art history. ', '18.48', '2010-07-19 23:22:48', 3, '51xqyzh2hcl.-ss500-.jpg'),
(17, 'Wicked Cool PHP: Real-World Scripts That Solve Difficult Problems', 'Wicked Cool PHP capitalizes on the success of the "Wicked Cool" series from No Starch Press. Rather than focus on the basics of the language, Wicked Cool PHP provides (and explains) PHP scripts that can be implemented immediately to simplify webmasters'' lives. These include unique scripts for processing credit cards, checking for valid email addresses, templating, overriding PHP''s default settings, and serving dynamic images and text. Readers will also find extensive sections on working with forms, words, and files; ways to harden PHP by closing common security holes; and instructions for keeping data and transactions secure. By exploring working code, readers learn how to customize their webserver''s behavior, prevent spammers from adding annoying comments, scrape information from other web sites, and much more. This is a book that''s sure to appeal to PHP programmers who have been there and done that and who want a book that delivers meaty content, not only promise.', '18.67', '2010-07-19 23:27:01', 2, '515htcskybl.-ss500-.jpg'),
(18, 'PHP Objects, Patterns and Practice 3rd Edition', 'This book takes you beyond the PHP basics to the enterprise development practices used by professional programmers. Updated for PHP 5.3 with new sections on closures, namespaces, and continuous integration, this edition will teach you about object features such as abstract classes, reflection, interfaces, and error handling. You''ll also discover object tools to help you learn more about your classes, objects, and methods.\r\n\r\nThen you''ll move into design patterns and the principles that make patterns powerful. You''ll learn both classic design patterns and enterprise and database patterns with easy-to-follow examples.\r\n\r\nFinally, you''ll discover how to put it all into practice to help turn great code into successful projects. You''ll learn how to manage multiple developers with Subversion, and how to build and install using Phing and PEAR. You''ll also learn strategies for automated testing and building, including continuous integration.', '28.91', '2010-07-19 23:28:58', 2, '51s9-bneftl.-ss500-.jpg'),
(19, '50 Artists You Should Know: From Giotto to Warhol', 'This vibrant reference guide profiles 50 major artists alongside their representative works. The entries are presented in an eye-catching format that includes brief biographies, time lines, and critical analyses. Additional information helps readers locate the artist''s work online and in museums, a glossary of important terms, and sidebars highlighting relevant movements and techniques. Arranged chronologically, the selection of artists includes every major artistic movement and development since the Gothic period, giving readers a clear understanding of the evolution of the visual arts. Perfect for casual reading or easy reference, this accessible overview is a fun and practical art history lesson that everyone can enjoy. ', '18.95', '2010-07-20 10:45:16', 3, '51c4k9pth4l.-ss500-.jpg'),
(20, 'Dragon Age: Inquisition', 'Select and lead a group of characters into harrowing battles against a myriad of enemies – from earth-shattering High Dragons to demonic forces from the otherworld of the Fade. Go toe-to-toe in visceral, heroic combat as your acolytes engage at your side, or switch to tactical view to coordinate lethal offensives using the combined might of your party. Observe the tangible, visible results of your journey through a living world – build structures, customize outposts, and change the landscape itself as environments are re-honed in the wake of your Inquisition. Helm a party chosen from nine unique, fully-realized characters – each of whom react to your actions and choices differently, crafting complex relationships both with you and with each other. Create your own character from multiple races, customize their appearance, and amalgamate their powers and abilities as the game progresses. Enhanced customization options allow you to pick everything from the color of your follower’s boots to the features of your Inquisition stronghold. Become a change agent in a time of uncertainty and upheaval. Shape the course of your empires, bring war or peace to factions in conflict, and drive the ultimate fate of the Inquisition. Will you bring an end to the cataclysmic anarchy gripping the Dragon Age?', '59.99', '2014-11-01 00:00:00', 4, 'dragon_age_inquisition.jpg'),
(21, 'World of Warcraft: Warlords of Draenor', 'To scrap with the greatest army Draenor has ever known, you will need your own forces and your own fortress. Build a mighty garrison: an enduring home base integrated seamlessly with the world, not a hiding place far from the tumult. Customize it with functional structures like farms, stables, armories, workshops and more. Lay down trade routes and unlock new quests, gear and pets to support your war for Draenor. Recruit stalwart followers to man your base, and send them to loot dungeons, fulfill missions, and craft items, even if you’re offline. Tame a deadly realm, and build an unbreakable monument to victory.', '49.99', '2014-11-07 00:00:00', 4, 'wow_warlords_of_draenor.jpg'),
(22, 'Metro Redux', ' The Metro Redux bundle features both Metro 2033 Redux and Metro: Last Light Redux. Both games have been remastered in the latest 4A Engine, and tout two unique unique play styles - Spartan and Survival - plus the legendary Ranger Mode.', '24.99', '2014-11-08 00:00:00', 4, 'metro_redux.jpg'),
(23, 'Dark Souls II: Crown of the Ivory King', 'The 3rd of three large-scale DLC additions to the Dark Souls II game includes new stages, maps, boss characters, weapons and armor. In this third DLC, players find themselves in a world shining bright with the glow of treacherous ice.', '35.99', '2014-11-18 00:00:00', 4, 'dark_souls_2.jpg');

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `statuses`
--

CREATE TABLE IF NOT EXISTS `statuses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Salvarea datelor din tabel `statuses`
--

INSERT INTO `statuses` (`id`, `name`) VALUES
(1, 'Pending'),
(2, 'Processing'),
(3, 'Dispatched');

--
-- Restrictii pentru tabele sterse
--

--
-- Restrictii pentru tabele `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`client`) REFERENCES `clients` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`status`) REFERENCES `statuses` (`id`) ON UPDATE CASCADE;

--
-- Restrictii pentru tabele `orders_items`
--
ALTER TABLE `orders_items`
  ADD CONSTRAINT `orders_items_ibfk_1` FOREIGN KEY (`order`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_items_ibfk_2` FOREIGN KEY (`product`) REFERENCES `products` (`id`) ON UPDATE CASCADE;

--
-- Restrictii pentru tabele `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
