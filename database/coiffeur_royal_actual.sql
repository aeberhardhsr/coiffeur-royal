-- phpMyAdmin SQL Dump
-- version 5.0.4deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Erstellungszeit: 25. Mai 2022 um 14:52
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
(1, '0.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

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
(65, 'Werder', 'Sebastian', 'Boswil', 5623, '', '0798392334', '');

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
(1, 'Metal DX Shampoo', '300', '18.00', '22.00'),
(2, 'Metal DX Shampoo', '1500', '29.00', NULL),
(3, 'Metal DX Mask', '250', '20.00', NULL),
(4, 'Metal DX Mask', '500', '25.00', NULL),
(5, 'Silver Shampoo Cotril', '300', '15.00', NULL),
(6, 'Volume Roots Spray', '200', '22.95', NULL),
(7, 'Regenerationsspray', '200', '23.80', NULL),
(8, 'Helmet Gel', '100', '22.00', NULL),
(9, 'Clay Matt Paste', '100', '22.00', NULL),
(10, 'Pomade Water Wax', '100', '22.00', NULL),
(11, 'Gale Haarspray', '300', '16.00', NULL),
(12, 'Gel Mousse ', '250', '16.00', NULL),
(13, 'Extra Volume Mousse', '250', '17.00', NULL),
(14, 'Volume No Gas Haarspray', '250', '22.00', NULL),
(15, 'Velvet', '150', '18.00', NULL),
(16, 'Top 10 in 1', '150', '20.00', NULL),
(17, 'Goodbye Yellow/Orange Shampoo', '1000', '23.00', NULL),
(18, 'Goodbye Yellow/Orange Shampoo', '300', '8.45', NULL),
(19, 'Bio Argan Oil', '125', '20.00', NULL),
(20, 'Panaché Spray', '250', '16.00', NULL),
(21, 'Morning After Dust', '200', '18.00', NULL),
(22, 'Hair Touch Up Farbspray', '75', '13.50', NULL),
(23, 'Lagoom Gel Goldwell', '200', '18.00', NULL),
(24, '9P Goldwell Tönungsschaum', '100', '8.00', NULL);

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
(1, 'test', 'Auftragspauschale', 2, '1.30', '120.00', '12.00', '187.20');

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
(2, 'Damen Langhaar'),
(3, 'Damen Kurzhaar'),
(4, 'Kinder'),
(5, 'Herren'),
(6, 'Zusatzdienstleistungen');

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
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

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
  MODIFY `services_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT für Tabelle `service_groups`
--
ALTER TABLE `service_groups`
  MODIFY `service_group_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT für Tabelle `staff_user`
--
ALTER TABLE `staff_user`
  MODIFY `staff_user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT für Tabelle `visits`
--
ALTER TABLE `visits`
  MODIFY `visits_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `visits_purchase`
--
ALTER TABLE `visits_purchase`
  MODIFY `visits_purchase_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
