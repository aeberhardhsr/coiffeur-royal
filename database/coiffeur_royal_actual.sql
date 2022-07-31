-- phpMyAdmin SQL Dump
-- version 5.0.4deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Erstellungszeit: 28. Jul 2022 um 14:20
-- Server-Version: 10.5.15-MariaDB-0+deb11u1
-- PHP-Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `coiffeur_royal`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `cost_calculation`
--

CREATE TABLE `cost_calculation` (
  `cost_calculation_id` int(11) NOT NULL,
  `cost_calculation_space` decimal(10,2) DEFAULT NULL,
  `cost_calculation_parking` decimal(10,2) DEFAULT NULL,
  `cost_calculation_energy` decimal(10,2) DEFAULT NULL,
  `cost_calculation_water` decimal(10,2) DEFAULT NULL,
  `cost_calculation_waste` decimal(10,2) DEFAULT NULL,
  `cost_calculation_office` decimal(10,2) DEFAULT NULL,
  `cost_calculation_office_material` decimal(10,2) DEFAULT NULL,
  `cost_calculation_marketing` decimal(10,2) DEFAULT NULL,
  `cost_calculation_towel` decimal(10,2) DEFAULT NULL,
  `cost_calculation_accountant` decimal(10,2) DEFAULT NULL,
  `cost_calculation_additional_cost` decimal(10,2) GENERATED ALWAYS AS (`cost_calculation_space` + `cost_calculation_parking` + `cost_calculation_energy` + `cost_calculation_water` + `cost_calculation_waste` + `cost_calculation_office` + `cost_calculation_office_material` + `cost_calculation_marketing` + `cost_calculation_towel` + `cost_calculation_accountant`) STORED,
  `cost_calculation_social_charges` decimal(10,2) DEFAULT NULL,
  `cost_calculation_gross_wage_full` decimal(10,2) GENERATED ALWAYS AS (`cost_calculation_hour_rate_full` * `cost_calculation_work_hours_full` * `cost_calculation_social_charges`) STORED,
  `cost_calculation_hour_rate_full` decimal(10,2) DEFAULT NULL,
  `cost_calculation_work_hours_full` decimal(10,2) DEFAULT NULL,
  `cost_calculation_gross_wage_half` decimal(10,2) GENERATED ALWAYS AS (`cost_calculation_hour_rate_half` * `cost_calculation_work_hours_half` * `cost_calculation_social_charges`) STORED,
  `cost_calculation_hour_rate_half` decimal(10,2) DEFAULT NULL,
  `cost_calculation_work_hours_half` decimal(10,2) DEFAULT NULL,
  `cost_calculation_gross_wage_three` decimal(10,2) GENERATED ALWAYS AS (`cost_calculation_hour_rate_three` * `cost_calculation_work_hours_three` * `cost_calculation_social_charges`) STORED,
  `cost_calculation_hour_rate_three` decimal(10,2) DEFAULT NULL,
  `cost_calculation_work_hours_three` decimal(10,2) DEFAULT NULL,
  `cost_calculation_cost_fte` decimal(10,2) GENERATED ALWAYS AS (`cost_calculation_hour_rate_full` * `cost_calculation_work_hours_full` * `cost_calculation_social_charges` + `cost_calculation_hour_rate_half` * `cost_calculation_work_hours_half` * `cost_calculation_social_charges` + `cost_calculation_hour_rate_three` * `cost_calculation_work_hours_three` * `cost_calculation_social_charges` + `cost_calculation_additional_cost`) STORED,
  `cost_calculation_hour_rate_calculated` decimal(10,2) GENERATED ALWAYS AS ((`cost_calculation_hour_rate_full` * `cost_calculation_work_hours_full` * `cost_calculation_social_charges` + `cost_calculation_hour_rate_half` * `cost_calculation_work_hours_half` * `cost_calculation_social_charges` + `cost_calculation_hour_rate_three` * `cost_calculation_work_hours_three` * `cost_calculation_social_charges` + `cost_calculation_additional_cost`) / (`cost_calculation_work_hours_full` + `cost_calculation_work_hours_half` + `cost_calculation_work_hours_three`)) STORED
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `cost_calculation`
--

INSERT INTO `cost_calculation` (`cost_calculation_id`, `cost_calculation_space`, `cost_calculation_parking`, `cost_calculation_energy`, `cost_calculation_water`, `cost_calculation_waste`, `cost_calculation_office`, `cost_calculation_office_material`, `cost_calculation_marketing`, `cost_calculation_towel`, `cost_calculation_accountant`, `cost_calculation_social_charges`, `cost_calculation_hour_rate_full`, `cost_calculation_work_hours_full`, `cost_calculation_hour_rate_half`, `cost_calculation_work_hours_half`, `cost_calculation_hour_rate_three`, `cost_calculation_work_hours_three`) VALUES
(1, '800.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(30) NOT NULL,
  `customer_vorname` varchar(30) NOT NULL,
  `customer_city` varchar(30) DEFAULT NULL,
  `customer_zipcode` int(4) DEFAULT NULL,
  `customer_street` varchar(50) DEFAULT NULL,
  `customer_phone` varchar(40) DEFAULT NULL,
  `customer_mail` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_name`, `customer_vorname`, `customer_city`, `customer_zipcode`, `customer_street`, `customer_phone`, `customer_mail`) VALUES
(1, 'Eberhard', 'Andreas', 'St. Gallenkappel', 8735, 'Oberrainstrasse 35', '079 683 11 69', 'andreas.eberhard@bluewin.ch'),
(2, 'Koch ', 'Annelies', 'Boswil', 5623, '', '0792026372', ''),
(3, 'Kalt', 'Bianca', 'Muri', 5630, '', '0797681153', 'bkalt@gmx.ch'),
(4, 'Mamie', 'Beatrice', 'Muri', 5630, '', '0793573277', 'trix.mamie@bluewin.ch'),
(5, 'Wüstner', 'Kevin', 'Muri', 5630, '', '0794794507', 'kevinwuestner5@gmail.com'),
(6, 'Fischbach', 'Rainer', 'Villmergen', 5612, '', '0762217879', 'rai.fischbach@gmail.com'),
(7, 'Frei', 'Peter', 'Bünzen', 5624, '', '0794465302', 'frei.peter@gmx.ch'),
(8, 'Sorge', 'Hansruedi', 'Bettwil', 5618, '', '0787223232', 'h.sorge@bluewin.ch'),
(9, 'Brun', 'Helen', 'Muri', 5630, '', '0793827862', 'h.brun@gmx.net'),
(10, 'Fiesolani', 'Naemi', 'Zwillikon', 8909, '', '0794002261', 'n.fiesolani@gmail.com'),
(11, 'Jud', 'Elia', 'Merenschwand', 5634, '', '0796578538', 'elia.jud99@gmail.com'),
(12, 'Käppeli', 'David', 'Jonen', 8916, '', '0795999757', 'husky-1995@hotmail.com'),
(13, 'Hüppin', 'Marietta', 'Bünzen', 5624, '', '0796934560', 'marietta.kosmetic@bluewin.ch'),
(14, 'Lam', 'Robin Mary', 'Niederwil', 5524, '', '0793267980', 'robinmary.lam@protenmail.com'),
(15, 'Riesen', 'Remo', 'Bünzen', 5624, '', '0762540707', 'Remo@mriesen.ch'),
(16, 'Riesen', 'Lukas', 'Bünzen', 5624, '', '0784052827', 'lukas@mriesen.ch'),
(17, 'Mamie', 'Korinna', 'Muri', 5630, '', '0796840707', 'k.mamie@bluewin.ch'),
(18, 'Quero ', 'Renato', 'Mühlau', 5642, '', '0792892854', 'renato.quero@bluewin.ch'),
(19, 'Rosenberg', 'Davis Valentino', 'Muri', 5630, '', '0772114555', 'rosenbergdavis@gmail.com'),
(20, 'Pfammatter', 'Gabi', 'Boswil', 5623, '', '0794685735', 'gabi.pfammatter@bluewin.ch'),
(21, 'Schmid', 'Michelle Marisa', 'Boswil', 5623, 'Niesenbergstrasse 8', '0799298879', 'mrsmms16@gmail.com'),
(22, 'Korina', 'Smoljo', 'Muri', 5630, '', '0795427705', 'korina.smoljo@gmail.com'),
(23, 'Engel', 'Dario', 'Muri', 5630, '', '0765870535', 'engeldario@hotmail.com'),
(24, 'Mario', 'Alessandro', 'Anglikon', 5611, '', '0797666053', 'alessandro-mario@bluewin.ch'),
(25, 'Tanner', 'Maya', 'Boswil', 5623, '', '0795203635', 'tanner.boswil@sunrise.ch'),
(26, 'Frei', 'Yvonne', 'Boswil', 5623, '', '0765232877', 'frei-stutz.yvonne@bluewin.ch'),
(27, 'Kälin- Huber', 'Sandra', 'Birri/ Aristau', 5628, '', '0797553535', 'sandra.huber8@hotmail.com'),
(28, 'Kalt', 'Jolanda', 'Muri', 5630, '', '0797385445', 'jkalt@gmx.ch'),
(29, 'Merz', 'Cédric', 'Büttikon', 5619, '', '0799228558', 'cedric.sprinter@gmail.com'),
(30, 'Werder', 'Sandra', 'Bünzen', 5624, '', '0795663448', 'werder.sandra@bluewin.ch'),
(31, 'Werder', 'Stefanie', 'Bünzen', 5624, 'Am Bach 1', '0774757652', 'werder.stefanie@bluewin.ch'),
(32, 'Werder', 'Severin', 'Bünzen', 5624, 'Am Bach 1', '0798396611', 'werder.severin@bluewin.ch'),
(33, 'Werder', 'Paul', 'Bünzen', 5624, 'Am Bach 1', '0797902090', 'werder.paul@bluewin.ch'),
(34, 'Werder', 'Fabienne', 'Wädenswil', 8820, '', '0797390827', 'werder.fabienne@bluewin.ch'),
(35, 'Bieler', 'Fabian', 'Muri', 5630, 'Untere Bächlen 9', '0764151426', 'fabian.bieler@hotmail.com'),
(36, 'Bieler', 'Patric', 'Muri', 5630, 'Untere Bächlen 9', '0764391695', ''),
(37, 'Lüthy', 'Dennis', 'Besenbüren', 5627, '', '0791979934', ''),
(38, 'Fischer', 'Karin', 'Stetten', 5608, '', '0797593235', ''),
(39, 'Käppeli', 'Jasmin', 'Jonen', 8916, '', '0797159225', ''),
(40, 'Schmid', 'Aline', 'Winterthur', 8000, '', '0787247975', ''),
(41, 'Christen', 'Albin', 'Aarau', 5000, '', '0793006381', ''),
(42, 'Riesen', 'Alexandra', 'Bünzen', 5624, '', '0792823146', ''),
(43, 'Rast', 'Andre', 'Muri', 5630, '', '0797234256', ''),
(44, 'Bärtschi', 'Andrea', 'Aristau/Birri', 5628, '', '0774453468', ''),
(45, 'Weber', 'Angelica', 'Muri', 5630, '', '0792136830', ''),
(46, 'Burkard', 'Noée', 'Rüstenschwil', 5644, '', '0764019772', 'noee.burkard7@gmail.com'),
(47, 'Scherer', 'Filomena', 'Aristau', 5628, '', '0795609006', 'Filomena.scherer@bluewin.ch'),
(48, 'Huber', 'Maria', 'Dottikon', 5605, '', '0789351916', 'hufima@bluewin.ch'),
(49, 'Koller- Huber', 'Regina', 'Muri', 53630, '', '0795674681', 'reku.koller@bluewin.ch'),
(50, 'Kalt', 'Andi', 'Muri', 5630, '', '0793263808', 'akalt@gmx.ch'),
(51, 'Wyssling', 'Pia', 'Rottenshwil', 8919, '', '0566344178', 'p.wyssling@bluewin.ch'),
(52, 'Rhyner', 'Maya', 'Althäusern', 5628, '', '0566643829', ''),
(53, 'Berchtold', 'Marcel', 'Muri', 5630, '', '0765074514', 'marcel_berchtold@yahoo.com'),
(54, 'Keusch', 'Martina', 'Muri', 5630, '', '0796979137', 'mar-tina@bluewin.ch'),
(55, 'Birrer', 'Maria', 'Urdorf', 8902, '', '0796877868', 'mariabirrer@hotmail.com'),
(56, 'Isler', 'Benjamin', 'Bünzen', 5624, '', '0796853123', 'pal45stek@hispeed.ch'),
(57, 'Di Chiara', 'Renzo', 'Seon', 5703, '', '0792236517', 'renzo.dichiara@regapack.ch'),
(59, 'Lebeda', 'Antonia', 'Münchwilen', 9542, '', '0788685335', 'antonia.lebeda@bluemail.ch'),
(60, 'Kluser', 'Natasha', 'Muri', 5630, '', '0788815829', 'natasha.kluser@outlook.com'),
(61, 'Meier', 'Alexander', 'Boswil', 5623, '', '0798539599', ''),
(62, 'Christen', 'Nicole', 'Mühlau', 5642, '', '0789505592', ''),
(63, 'Brun', 'Celine', 'Aristau', 5628, '', '0795500063', ''),
(64, 'Werder', 'Tobias', 'Boswil', 5623, '', '0798375527', ''),
(65, 'Werder', 'Sebastian', 'Boswil', 5623, '', '0798392334', ''),
(66, 'Strebel', 'Jad', 'Muri', 5630, '', '0566643621', ''),
(67, 'Fischer', 'Marianne', 'Egliswil', 5704, '', '0764514618', ''),
(68, 'Deola', 'Elsbeth', 'Muri', 5630, '', '', ''),
(69, 'Bringoli', 'Carlo', 'Muri', 5630, '', '0793755067', ''),
(70, 'Bieler', 'Fabian', 'Muri', 5630, '', '', 'fabian.bieler@hotmail.ch'),
(71, 'Jud', 'Elia', 'Merenschwand', 5634, '', '0796578538', ''),
(72, 'Stutz', 'Roger', 'Muri', 5630, '', '0792918202', 'webdiv@gmx.ch'),
(73, 'Weibel', 'Werner', 'Boswil', 5623, '', '0798169440', ''),
(74, 'Allgeier', 'Yanik', 'Muri', 5630, 'Zürcherstrasse', '0792307616', ''),
(75, 'Yvonne', 'Frey', 'Boswil', 5623, '', '0765232877', ''),
(76, 'Annen', 'Markus', 'Alikon', 5643, '', '0797871988', ''),
(77, 'Ackermann ', 'Michelle', 'Besenbüren', 5627, '', '0793776366', ''),
(78, 'Arnold', 'Frau', 'Muri', 5630, 'Maiholzstrasse 26', '', ''),
(79, 'Abgottspon', 'Cynthia', 'Beinwil', 5637, 'Unterdorfstrasse 12', '056668 26 14', ''),
(80, 'Alberelli', 'Beatrice', 'Muri', 5630, 'Mürlifeld 8', '0566643720', ''),
(81, 'Abegg', 'Margrith', 'Muri', 5630, 'Egenteweg 15', '056 695 10 41', ''),
(82, 'Abegg', 'Franz', 'Muri', 5630, 'Egentenweg 4', '056 695 10 41', ''),
(83, 'Andenmatten', 'Aldo', 'Wallis', 3925, '', '0794033841', ''),
(84, 'Brunner ', 'Ruth', 'sins', 5643, '', '0792433387', ''),
(85, 'Von Ballmoos', 'Monika', 'Dottikon', 5605, 'Fildistrasse 31', '0566242113', ''),
(86, 'Familie', 'Bajrami', 'Muri', 5630, '', '0566645051', ''),
(87, 'Burkard', 'Cornelia', 'Boswil', 5623, '', '0796804359', ''),
(88, 'Bossert', 'Margrit', 'Muri', 5630, '', '0566645585', ''),
(89, 'Bieler', 'Patric', 'Muri', 5630, 'Untere Bächlen 9', '0764391695', ''),
(90, 'Baltiaglia', 'Renate', 'Muri', 5630, '', '', ''),
(91, 'Bütler', 'Iris', 'Muri', 5630, '', '415219700', ''),
(92, 'Büchi', 'Raphael', 'Bünzen', 5624, '', '0789146910', ''),
(93, 'Buob', 'Bea', 'Oberlunkofen', 8917, '', '0765256544', ''),
(94, 'Brunner', 'Corina', 'Muri', 5630, '', '0798936726', ''),
(95, 'Blatty', 'Thea', 'Mühlau', 5642, '', '0792311463', ''),
(96, 'Businger', 'Daniela', 'Weggis', 6353, '', '0793748340', ''),
(97, 'Christen', 'Nadja', 'Muri', 5630, '', '0797672914', ''),
(98, 'Christen', 'Nicole', 'Muri', 5630, '', '0789505529', ''),
(99, 'Chizzolini', 'Jessica', 'Muri', 5630, '', '0793945341', ''),
(100, 'Dürig', 'Morena', 'Muri', 5630, '', '', ''),
(101, 'Dentler', 'Corinne', 'Muri', 5630, '', '0787180240', ''),
(102, 'Dentler', 'Celine', 'Bremgarten', 5620, '', '0787514409', ''),
(103, 'Erni', 'Martin', 'Seengen', 5707, '', '0795687260', ''),
(104, 'Erni', 'Monika', 'Seengen', 5707, '', '', ''),
(105, 'Engel', 'Ernst', 'Muri', 5630, '', '0792496502', ''),
(106, 'Elmer', 'Uschi', 'Muri', 5630, '', '0765674366', ''),
(107, 'Emmenegger', 'Stefan', 'Aristau', 5628, '', '0799021643', ''),
(108, 'Furter', 'Edith & Roland', 'Mellingen', 5507, '', '0564912743', ''),
(109, 'Fossa', 'Claudine', 'Seengen', 5707, '', '', ''),
(110, 'Fischer', 'Heidi', 'Muri', 5630, 'Rösslimatt', '0566641058', ''),
(111, 'Furrer', 'Joel', 'Wohlen', 5610, '', '', ''),
(112, 'Glauser', 'Janine', 'Künten', 5444, '', '', ''),
(113, 'Gumann', 'Sandra', 'Muri', 5630, '', '', ''),
(114, 'Gloor', 'Julie', 'Muri', 5630, '', '0792637046', ''),
(115, 'Gervasi', 'Ursula', 'Muri', 5630, '', '', ''),
(116, 'Grob', 'Agnes', 'Muri', 5630, '', '00566641683', ''),
(117, 'Gabriel', 'Peter', 'Muri', 5630, '', '079 775 12 62', ''),
(118, 'Guhl', 'Anna', 'Muri', 5630, 'Kirchenfeldmatt 13', '0775231507', ''),
(119, 'Hilfiker', 'Rita', 'Boswil', 5623, 'Flurstrasse 22', '0566661385', ''),
(120, 'Herzberg', 'Seraina', 'Muri', 5630, '', '0764131539', ''),
(121, 'Hirt', 'Franca', 'Muri', 5630, '', '079 488 01 73', ''),
(122, 'Hohermut', 'Beat', 'Muri', 5630, 'Bachmattenstrasse 12', '0792056018', ''),
(123, 'HUber', 'Maria', 'Muri', 5630, '', '076 380 96 12', ''),
(124, 'Isenschmid', 'Hans', 'Boswil', 5623, 'Kleinzelgli 1', '056 666 16 03', ''),
(125, 'Jäggi', 'Priska', 'Boswil', 5623, 'Kleinzelgli 4', '076 566 02 00', ''),
(126, 'Isler', 'Tanja & Beni', 'Bünzen', 5624, '', '056 666 96 06', ''),
(127, 'Jancic', 'Irene', 'Villmergen', 5605, '', '079 431 85 11', '079 671 78 08'),
(128, 'Jud', 'Elia', 'Merenschwand', 5634, '', '079 657 85 38', ''),
(129, 'Irniger', 'Klaudia', 'Muri', 5630, '', '076 340 45 42', ''),
(130, 'Judova', 'Viera', 'Muri', 5630, '', '076 267 82 99', ''),
(131, 'Kuhn', 'Sandra', 'Muri', 5630, '', '079 256 50 44', ''),
(132, 'Kaufmann', 'Anita', 'Muri', 5630, '', '078 699 25 84', ''),
(133, 'Käser', 'Silvia', 'Muri', 5630, '', '056 664 37 29', ''),
(134, 'Kaufmann', 'Edda', 'DE', 32847, '', '', ''),
(135, 'Kählin - Huber', 'Sandra', 'Muri', 5630, '', '079 755 35 35', ''),
(136, 'Kluser', 'Natasha', 'Muri', 5630, '', '', ''),
(137, 'Konti', 'Sandra', 'Muri', 5630, '', '056 664 28 30', ''),
(138, 'Koch', 'Reto', 'Sarmenstorf', 5614, '', '079 511 69 42', ''),
(139, 'Koch', 'Simon', 'Boswil', 5623, '', '079 933 92 29', ''),
(140, 'Keusch', 'Matthia', 'Besenbüren', 5627, '', '077 489 56 87', ''),
(141, 'Keusch', 'Hans & Vreni', 'Muri', 5630, '', '056 664 18 12', ''),
(142, 'Küng', 'Maria', 'Muri', 5630, '', '056 664 48 78', ''),
(143, 'Kunz', 'Marcel', 'muri', 5630, '', '058 887 60 49', 'marcello.kunz@gmail.com'),
(144, 'Käppeli', 'Rita', 'Muri', 5630, '', '079 384 39 58', ''),
(145, 'Keusch', 'Manuela', 'Boswil', 5623, '', '079 350 61 62', '');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `customer_visit_info`
--

CREATE TABLE `customer_visit_info` (
  `customer_visit_info_id` int(11) NOT NULL,
  `customer_visit_info_datetime` datetime DEFAULT NULL,
  `customer_visit_info_notes` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `product_amount` varchar(30) DEFAULT NULL,
  `product_purchase_price` decimal(6,2) DEFAULT NULL,
  `product_margin` decimal(6,2) GENERATED ALWAYS AS (`product_sales_price` - `product_purchase_price`) STORED,
  `product_sales_price` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_amount`, `product_purchase_price`, `product_sales_price`) VALUES
(1, 'Metal DX Shampoo', '300', '18.00', '25.00'),
(2, 'Metal DX Shampoo', '1500', '29.00', '40.00'),
(3, 'Metal DX Mask', '250', '20.00', '25.00'),
(4, 'Metal DX Mask', '500', '25.00', '40.00'),
(5, 'Silver Shampoo Cotril', '300', '15.00', '25.00'),
(6, 'Volume Roots Spray', '200', '22.95', '35.00'),
(7, 'Regenerationsspray', '200', '23.80', '35.00'),
(8, 'Helmet Gel', '100', '22.00', '33.00'),
(9, 'Clay Matt Paste', '100', '22.00', '33.00'),
(10, 'Pomade Water Wax', '100', '22.00', '33.00'),
(11, 'Gale Haarspray', '300', '16.00', '25.00'),
(12, 'Gel Mousse ', '250', '16.00', '25.00'),
(13, 'Extra Volume Mousse', '250', '17.00', '25.00'),
(14, 'Volume No Gas Haarspray', '250', '22.00', '32.00'),
(15, 'Velvet', '150', '18.00', '30.00'),
(16, 'Top 10 in 1', '150', '20.00', '30.00'),
(17, 'Goodbye Yellow/Orange Shampoo', '1000', '23.00', '35.00'),
(18, 'Goodbye Yellow/Orange Shampoo', '300', '8.45', '20.00'),
(19, 'Bio Argan Oil', '125', '20.00', '30.00'),
(20, 'Panaché Spray', '250', '16.00', '25.00'),
(21, 'Morning After Dust', '200', '18.00', '25.00'),
(22, 'Hair Touch Up Farbspray', '75', '13.50', '20.00'),
(23, 'Lagoom Gel Goldwell', '200', '18.00', '24.00'),
(24, '9P Goldwell Tönungsschaum', '100', '8.00', '17.00');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `services`
--

CREATE TABLE `services` (
  `services_id` int(11) NOT NULL,
  `services_name` varchar(50) NOT NULL,
  `services_service_group` varchar(50) DEFAULT NULL,
  `services_duration` int(3) DEFAULT NULL,
  `services_factor` decimal(10,2) DEFAULT NULL,
  `services_consumption` decimal(10,2) DEFAULT NULL,
  `services_price_kg_liter` decimal(10,2) DEFAULT NULL,
  `services_sales_price` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `services`
--

INSERT INTO `services` (`services_id`, `services_name`, `services_service_group`, `services_duration`, `services_factor`, `services_consumption`, `services_price_kg_liter`, `services_sales_price`) VALUES
(2, 'Auftragspauschale', 'Auftragspauschale', 5, '1.30', '0.10', '10.00', '0.13'),
(3, '1. Waschen', 'Damen Kurzhaar', 5, '1.50', '0.30', '32.00', '1.44'),
(4, 'Schneiden', 'Damen Kurzhaar', 25, '1.50', '0.00', '0.00', '0.00'),
(5, 'Keratintreatment', 'Damen Kurzhaar', 188, '1.50', '2.00', '320.00', '96.00'),
(6, 'Dauerwelle Oberkopf', 'Damen Kurzhaar', 38, '1.50', '0.50', '36.00', '2.70'),
(7, 'Dauerwelle Ganzkopf', 'Damen Kurzhaar', 48, '1.50', '1.00', '36.00', '5.40'),
(8, 'Tönung Ansatz', 'Damen Kurzhaar', 25, '1.50', '1.00', '125.00', '18.75'),
(9, 'Tönung Ganzkopf', 'Damen Kurzhaar', 30, '1.50', '1.20', '125.00', '22.50'),
(10, 'Färben Ansatz', 'Damen Kurzhaar', 30, '1.50', '1.20', '155.00', '27.90'),
(11, 'Färben Ansatz Express', 'Damen Kurzhaar', 15, '1.50', '1.50', '115.00', '25.88'),
(12, 'Färben Ganzkopf', 'Damen Kurzhaar', 35, '1.50', '1.50', '155.00', '34.88'),
(13, 'Blondieren Ansatz', 'Damen Kurzhaar', 40, '1.50', '1.00', '27.00', '4.05'),
(14, 'Blondieren Ganzkopf', 'Damen Kurzhaar', 40, '1.50', '1.50', '27.00', '6.08'),
(15, 'Méche (15 Folien)', 'Damen Kurzhaar', 25, '1.50', '1.00', '27.00', '4.05'),
(16, 'Méche Oberkopf', 'Damen Kurzhaar', 40, '1.50', '1.50', '27.00', '6.08'),
(17, 'Méche Ganzkopf', 'Damen Kurzhaar', 55, '1.50', '2.00', '27.00', '8.10'),
(18, '2. Waschen', 'Damen Kurzhaar', 12, '1.50', '0.30', '32.00', '1.44'),
(19, 'Abtönen', 'Damen Kurzhaar', 10, '1.50', '1.00', '125.00', '18.75'),
(20, '3. Waschen', 'Damen Kurzhaar', 2, '1.50', '0.20', '32.00', '0.96'),
(21, 'Föhnen & Styling', 'Damen Kurzhaar', 15, '1.50', '0.10', '10.00', '0.15'),
(22, '1. Waschen', 'Damen Mittellang', 7, '1.45', '0.40', '32.00', '1.86'),
(23, 'Schneiden', 'Damen Mittellang', 21, '1.45', '0.00', '0.00', '0.00'),
(24, 'Keratintreatment', 'Damen Mittellang', 218, '1.45', '2.50', '320.00', '116.00'),
(25, 'Dauerwelle Oberkopf', 'Damen Mittellang', 43, '1.45', '0.75', '36.00', '3.92'),
(26, 'Dauerwelle Ganzkopf', 'Damen Mittellang', 53, '1.45', '1.25', '36.00', '6.53'),
(27, 'Tönung Ansatz', 'Damen Mittellang', 25, '1.50', '1.00', '125.00', '18.75'),
(28, 'Tönung Ganzkopf', 'Damen Mittellang', 33, '1.45', '1.35', '125.00', '24.47'),
(29, 'Färben Ansatz', 'Damen Mittellang', 30, '1.50', '1.20', '155.00', '27.90'),
(30, 'Färben Ansatz Express', 'Damen Mittellang', 15, '1.50', '1.50', '115.00', '25.88'),
(31, 'Färben Ganzkopf', 'Damen Mittellang', 38, '1.45', '2.00', '155.00', '44.95'),
(32, 'Blondieren Ansatz', 'Damen Mittellang', 40, '1.50', '1.25', '27.00', '5.06'),
(33, 'Blondieren Ganzkopf', 'Damen Mittellang', 45, '1.45', '2.75', '27.00', '10.77'),
(34, 'Méche (15 Folien)', 'Damen Mittellang', 25, '1.50', '1.00', '27.00', '4.05'),
(35, 'Méche Oberkopf', 'Damen Mittellang', 55, '1.45', '2.00', '27.00', '7.83'),
(36, 'Méche Ganzkopf', 'Damen Mittellang', 78, '1.45', '3.00', '27.00', '11.75'),
(37, 'Balayage - Méchetechnik', 'Damen Mittellang', 70, '1.45', '2.00', '27.00', '7.83'),
(38, '2. Waschen', 'Damen Mittellang', 14, '1.45', '0.40', '32.00', '1.86'),
(39, 'Abtönen', 'Damen Mittellang', 10, '1.45', '1.25', '125.00', '22.66'),
(40, '3. Waschen', 'Damen Mittellang', 3, '1.45', '0.30', '32.00', '1.39'),
(41, 'Föhnen & Styling', 'Damen Mittellang', 20, '1.45', '0.15', '10.00', '0.22'),
(42, '1. Waschen', 'Damen Langhaar', 10, '1.40', '0.50', '32.00', '2.24'),
(43, 'Schneiden', 'Damen Langhaar', 17, '1.40', '0.00', '0.00', '0.00'),
(44, 'Keratintreatment', 'Damen Langhaar', 248, '1.40', '3.00', '320.00', '134.40'),
(45, 'Dauerwelle Ganzkopf', 'Damen Langhaar', 58, '1.40', '1.50', '36.00', '7.56'),
(46, 'Tönung Ansatz', 'Damen Langhaar', 25, '1.50', '1.00', '125.00', '18.75'),
(47, 'Tönung Ganzkopf', 'Damen Langhaar', 35, '1.40', '1.50', '125.00', '26.25'),
(48, 'Färben Ansatz', 'Damen Langhaar', 30, '1.50', '1.20', '155.00', '27.90'),
(49, 'Färben Ansatz Express', 'Damen Langhaar', 15, '1.50', '1.50', '115.00', '25.88'),
(50, 'Färben Ganzkopf', 'Damen Langhaar', 40, '1.40', '2.50', '155.00', '54.25'),
(51, 'Blondieren Ansatz', 'Damen Langhaar', 40, '1.50', '1.50', '27.00', '6.08'),
(52, 'Blondieren Ganzkopf', 'Damen Langhaar', 50, '1.40', '4.00', '27.00', '15.12'),
(53, 'Méche (15 Folien)', 'Damen Langhaar', 25, '1.50', '1.00', '27.00', '4.05'),
(54, 'Méche Oberkopf', 'Damen Langhaar', 70, '1.50', '2.50', '27.00', '10.13'),
(55, 'Méche Ganzkopf', 'Damen Langhaar', 100, '1.40', '4.00', '27.00', '15.12'),
(56, 'Balayage - Méchetechnik', 'Damen Langhaar', 85, '1.40', '3.00', '27.00', '11.34'),
(57, '2. Waschen', 'Damen Langhaar', 15, '1.40', '0.50', '32.00', '2.24'),
(58, 'Abtönen', 'Damen Langhaar', 10, '1.40', '1.50', '125.00', '26.25'),
(59, '3. Waschen', 'Damen Langhaar', 4, '1.40', '0.40', '32.00', '1.79'),
(60, 'Föhnen & Styling', 'Damen Langhaar', 30, '1.40', '0.20', '10.00', '0.28'),
(61, 'Augenbrauen färben', 'Kosmetikbehandlungen', 7, '1.40', '0.10', '50.00', '0.70'),
(62, 'Augenbrauen formen', 'Kosmetikbehandlungen', 7, '1.40', '1.00', '10.00', '1.40'),
(63, 'Wimpernlifting', 'Kosmetikbehandlungen', 45, '1.40', '2.00', '70.00', '19.60'),
(64, '1. Waschen', 'Herren', 5, '1.40', '0.30', '14.00', '0.59'),
(65, 'Schneiden', 'Herren', 20, '1.40', '0.00', '0.00', '0.00'),
(66, 'Dauerwelle Oberkopf', 'Herren', 38, '1.40', '0.50', '36.00', '2.52'),
(67, 'Tönung Ansatz', 'Herren', 25, '1.40', '1.00', '125.00', '17.50'),
(68, 'Tönung Ganzkopf', 'Herren', 30, '1.40', '1.20', '125.00', '21.00'),
(69, 'Färben Ansatz', 'Herren', 30, '1.40', '1.20', '155.00', '26.04'),
(70, 'Färben Ganzkopf', 'Herren', 35, '1.40', '1.50', '155.00', '32.55'),
(71, 'Blondieren Ansatz', 'Herren', 30, '1.40', '1.00', '27.00', '3.78'),
(72, 'Blondieren Ganzkopf', 'Herren', 30, '1.40', '1.50', '27.00', '5.67'),
(73, 'Méche Oberkopf', 'Herren', 25, '1.40', '1.50', '27.00', '5.67'),
(74, '2. Waschen', 'Herren', 10, '1.40', '0.30', '14.00', '0.59'),
(75, 'Abtönen', 'Herren', 7, '1.40', '1.00', '125.00', '17.50'),
(76, '3. Waschen', 'Herren', 2, '1.40', '0.20', '14.00', '0.39'),
(77, 'Bart kürzen / konturieren', 'Herren', 10, '1.40', '0.00', '0.00', '0.00'),
(78, 'Kopfmassage', 'Herren', 3, '1.40', '0.00', '0.00', '0.00'),
(79, 'Föhnen & Styling', 'Herren', 5, '1.40', '0.10', '10.00', '0.14'),
(80, 'Kinder bis 12 Jahre', 'Kinder', 30, '1.00', '0.30', '14.00', '0.42'),
(81, 'Girls bis 16 Jahre ', 'Kinder', 40, '1.00', '0.40', '32.00', '1.28'),
(82, 'Boys bis 16 Jahre', 'Kinder', 30, '1.00', '0.30', '14.00', '0.42');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `service_groups`
--

CREATE TABLE `service_groups` (
  `service_group_id` int(11) NOT NULL,
  `service_group_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `service_groups`
--

INSERT INTO `service_groups` (`service_group_id`, `service_group_name`) VALUES
(1, 'Auftragspauschale'),
(3, 'Damen Kurzhaar'),
(7, 'Damen Mittellang'),
(8, 'Damen Langhaar'),
(9, 'Herren'),
(10, 'Kosmetikbehandlungen'),
(11, 'Kinder'),
(12, 'Nageldesign');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `staff_user`
--

CREATE TABLE `staff_user` (
  `staff_user_id` int(11) NOT NULL,
  `staff_user_name` varchar(30) DEFAULT NULL,
  `staff_user_vorname` varchar(30) DEFAULT NULL,
  `staff_user_email` varchar(50) DEFAULT NULL,
  `staff_user_password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `staff_user`
--

INSERT INTO `staff_user` (`staff_user_id`, `staff_user_name`, `staff_user_vorname`, `staff_user_email`, `staff_user_password`) VALUES
(1, 'Werder', 'Stefi', 'werder.stefanie', 'c78298b714888b43d2989507a02ae0344190de56'),
(2, 'Weibel', 'Romy', 'weibel.romy', 'c78298b714888b43d2989507a02ae0344190de56');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `visits`
--

CREATE TABLE `visits` (
  `visits_id` int(11) NOT NULL,
  `visits_datetime` varchar(30) NOT NULL,
  `visits_customer` varchar(50) NOT NULL,
  `visits_notes` varchar(1000) DEFAULT NULL,
  `visits_assignee` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `visits`
--

INSERT INTO `visits` (`visits_id`, `visits_datetime`, `visits_customer`, `visits_notes`, `visits_assignee`) VALUES
(1, '25.07.2022', 'Werder Sandra', NULL, 'Stefanie Werder');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `visits_purchase`
--

CREATE TABLE `visits_purchase` (
  `visits_purchase_id` int(11) NOT NULL,
  `visits_purchase_vid` int(11) DEFAULT NULL,
  `visits_purchase_uid` int(11) DEFAULT NULL,
  `visits_purchase_services_group_name` varchar(50) DEFAULT NULL,
  `visits_purchase_services_name` varchar(50) DEFAULT NULL,
  `visits_purchase_services_sales_price` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `cost_calculation`
--
ALTER TABLE `cost_calculation`
  ADD PRIMARY KEY (`cost_calculation_id`);

--
-- Indizes für die Tabelle `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indizes für die Tabelle `customer_visit_info`
--
ALTER TABLE `customer_visit_info`
  ADD PRIMARY KEY (`customer_visit_info_id`);

--
-- Indizes für die Tabelle `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indizes für die Tabelle `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`services_id`);

--
-- Indizes für die Tabelle `service_groups`
--
ALTER TABLE `service_groups`
  ADD PRIMARY KEY (`service_group_id`);

--
-- Indizes für die Tabelle `staff_user`
--
ALTER TABLE `staff_user`
  ADD PRIMARY KEY (`staff_user_id`);

--
-- Indizes für die Tabelle `visits`
--
ALTER TABLE `visits`
  ADD PRIMARY KEY (`visits_id`);

--
-- Indizes für die Tabelle `visits_purchase`
--
ALTER TABLE `visits_purchase`
  ADD PRIMARY KEY (`visits_purchase_id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `cost_calculation`
--
ALTER TABLE `cost_calculation`
  MODIFY `cost_calculation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT für Tabelle `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=146;

--
-- AUTO_INCREMENT für Tabelle `customer_visit_info`
--
ALTER TABLE `customer_visit_info`
  MODIFY `customer_visit_info_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT für Tabelle `services`
--
ALTER TABLE `services`
  MODIFY `services_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT für Tabelle `service_groups`
--
ALTER TABLE `service_groups`
  MODIFY `service_group_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT für Tabelle `staff_user`
--
ALTER TABLE `staff_user`
  MODIFY `staff_user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT für Tabelle `visits`
--
ALTER TABLE `visits`
  MODIFY `visits_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT für Tabelle `visits_purchase`
--
ALTER TABLE `visits_purchase`
  MODIFY `visits_purchase_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
