-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  jeu. 19 jan. 2023 à 10:27
-- Version du serveur :  10.1.38-MariaDB
-- Version de PHP :  7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `carrental_db`
--

-- --------------------------------------------------------

--
-- Structure de la table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(11) NOT NULL,
  `permission` varchar(255) CHARACTER SET latin1 NOT NULL,
  `createuser` varchar(255) DEFAULT NULL,
  `deleteuser` varchar(255) DEFAULT NULL,
  `createbid` varchar(255) DEFAULT NULL,
  `updatebid` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `permissions`
--

INSERT INTO `permissions` (`id`, `permission`, `createuser`, `deleteuser`, `createbid`, `updatebid`) VALUES
(1, 'Superuser', '1', '1', '1', '1'),
(2, 'Admin', NULL, NULL, '1', '1'),
(3, 'User', NULL, NULL, '1', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `ID` int(10) NOT NULL,
  `Staffid` int(10) DEFAULT NULL,
  `AdminName` varchar(120) DEFAULT NULL,
  `UserName` varchar(120) DEFAULT NULL,
  `FirstName` varchar(255) DEFAULT NULL,
  `LastName` varchar(255) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `Status` int(11) NOT NULL DEFAULT '1',
  `Photo` varchar(255) CHARACTER SET latin1 NOT NULL DEFAULT 'avatar15.jpg',
  `Password` varchar(120) DEFAULT NULL,
  `AdminRegdate` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `tbladmin`
--

INSERT INTO `tbladmin` (`ID`, `Staffid`, `AdminName`, `UserName`, `FirstName`, `LastName`, `MobileNumber`, `Email`, `Status`, `Photo`, `Password`, `AdminRegdate`) VALUES
(30, 3, 'Admin', 'lola', 'leila', 'maamouch', 632147895, 'leila@gmail.com', 1, 'avatar15.jpg', 'c6f057b86584942e415435ffb1fa93d4', '2023-01-11 21:45:48'),
(31, 1, 'Admin', 'leila', 'leila', 'maamouch', 632145789, 'leilamaamouch@gmail.com', 1, 'avatar15.jpg', '698d51a19d8a121ce581499d7b701668', '2023-01-14 13:43:22'),
(32, 1, 'Admin', 'lolita', 'leila', 'leila', 624587142, 'leila7@gmail.com', 1, 'avatar15.jpg', '698d51a19d8a121ce581499d7b701668', '2023-01-16 15:18:08');

-- --------------------------------------------------------

--
-- Structure de la table `tblbike`
--

CREATE TABLE `tblbike` (
  `id` int(11) NOT NULL,
  `BikeTitle` varchar(255) CHARACTER SET latin1 NOT NULL,
  `BikeOverview` varchar(255) CHARACTER SET latin1 NOT NULL,
  `PricePerDay` varchar(255) CHARACTER SET latin1 NOT NULL,
  `ModelYear` int(11) NOT NULL,
  `Vimage1` varchar(255) CHARACTER SET latin1 NOT NULL,
  `CreationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `tblbike`
--

INSERT INTO `tblbike` (`id`, `BikeTitle`, `BikeOverview`, `PricePerDay`, `ModelYear`, `Vimage1`, `CreationDate`) VALUES
(15, 'Tapis Berbère Beni Ouarain', 'Un joli tapis blanc écru tissé en pure laine de mouton, à l\'apparence toute douce ce qui n\'est d\'ailleurs pas seulement une apparence, il est bien douillet et bien chaud.', '5099', 2015, 'PRE COMMANDE - Tapis Beni Ourain Boho - 010 - 4_10 x 6.png', '2023-01-11 15:43:07'),
(16, 'Tapis Traditionnel Essaouira', 'Chauffage par le sol  Ce tapis est adapté au chauffage par le sol.  Antipertedefibre est un produit anti-poussière et anti-perte de fibres, idéal pour garder une maison propre\r\n', '3600', 2014, 'Tapis Beni Ourain Tapis jaune marocain Tapis berbère Tapis - Etsy France.jpg', '2023-01-11 15:46:40'),
(17, 'Tapis Berbère M\'Guild', 'Un beau tapis berbère de type M\'Guild rouge bordeaux. Confortable, douillet, on aime son épaisseur, ses motifs de losanges contournés de noir un tapis berbère marocain qui saura sublimer votre décoration intérieure.', '4500', 2008, 'k0W_cIrE.jpg', '2023-01-11 15:50:19'),
(18, 'Tapis Traditionnel Azilal ', 'Joli tapis berbère plus long que large de type Azilal tissé et noué en pure laine de mouton bien soyeuse et fils de coton dont le vert fluo qui se fait remarquer. ', '4999', 2018, 'Tapis berbère Beni Ourain, Azilal, Ourikan… tout savoir sur la superstar du salon - Elle Décoration.jpg', '2023-01-11 16:06:25'),
(19, 'Tapis Folklore Marocain', 'Un très joli tapis qui fait valoir à la fois le folklore berbère marocain et le charme d\'un tapis méticuleusement tissé par la tisserande qui y a mis tout son coeur et son savoir-faire.', '3399', 2017, 'Tapis motif berbère amazigh kabyle.jpg', '2023-01-11 16:07:38'),
(20, 'Tapis Traditionnel Safi', 'Très joli tapis Safi bien berbère dans son allure, doté de ses losanges très travaillés qui a nécessité un travail méticuleux de la part de la tisserande qui l\'a créé.', '4299', 2019, 'Fenoun - Tapis Berbère shaggy - 400x500 cm.jpg', '2023-01-11 16:09:07'),
(21, 'Assiette en poterie Rim', 'Assiette en poterie Rim pour servir du Couscous et tout plat traditionnel ou pour la décoration , avec des motifs décoratifs peints à la main sur une glaçure blanche. il est parfait pour servir différents plats. \r\n', '750', 2015, 'IMG-4404.JPG', '2023-01-11 16:12:57'),
(22, 'Jarre traditionnel Andalouse', 'Magnifique Jarre  traditionnel Andalouse. Fabrication artisanale à Fès dans l\'Est du Maroc à la poterie de la Debaghin.', '450', 2021, 'IMG-4397.JPG', '2023-01-11 16:17:26'),
(23, 'Jarre traditionnel Naqes', 'Magnifique Jarre traditionnel Naqes coloré. Fabrication artisanale à Fès dans l\'Est du Maroc à la poterie de la Debaghin.', '500', 2019, 'IMG-4409.JPG', '2023-01-11 16:19:57');

-- --------------------------------------------------------

--
-- Structure de la table `tblbooking`
--

CREATE TABLE `tblbooking` (
  `id` int(11) NOT NULL,
  `BookingNumber` bigint(12) DEFAULT NULL,
  `userEmail` varchar(100) DEFAULT NULL,
  `VehicleType` varchar(255) NOT NULL,
  `VehicleId` int(11) DEFAULT NULL,
  `FromDate` varchar(20) DEFAULT NULL,
  `ToDate` varchar(20) DEFAULT NULL,
  `Quantity` int(11) NOT NULL DEFAULT '1',
  `message` varchar(255) DEFAULT NULL,
  `Status` int(11) DEFAULT NULL,
  `PostingDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `LastUpdationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tblbooking`
--

INSERT INTO `tblbooking` (`id`, `BookingNumber`, `userEmail`, `VehicleType`, `VehicleId`, `FromDate`, `ToDate`, `Quantity`, `message`, `Status`, `PostingDate`, `LastUpdationDate`) VALUES
(38, 756990937, 'leila1@gmail.com', '', 14, '2023-02-02', '2023-02-05', 2, 'mlkjhgfds', 2, '2023-01-16 22:30:45', '2023-01-17 21:08:20'),
(39, 703268163, 'leila1@gmail.com', '', 17, '2023-02-02', '2023-02-06', 2, 'mlkjhgfd', 1, '2023-01-16 22:38:28', '2023-01-18 18:07:13'),
(40, 540199306, 'leila1@gmail.com', 'Bike', 12, '2023-04-02', '2023-04-06', 2, 'ùmlkjhg', 0, '2023-01-16 23:10:49', NULL),
(41, 701559039, 'leila1@gmail.com', 'vhc', 20, '2023-02-01', '2023-02-03', 3, 'mlkjhgfd', 1, '2023-01-16 23:15:53', '2023-01-16 23:46:16'),
(42, 509759834, 'leila1@gmail.com', 'vhc', 23, '2023-05-05', '2023-05-06', 3, 'lkjhgfdsqzertyu', 1, '2023-01-17 09:42:07', '2023-01-17 21:09:10'),
(43, 842333938, 'leila1@gmail.com', '', 11, '2023-01-12', '2023-01-26', 1, 'mlkjhgfdspoiuytrez', 2, '2023-01-18 17:42:29', '2023-01-18 18:07:31'),
(44, 751327616, 'leila1@gmail.com', 'Bike', 18, '2023-01-25', '2023-01-26', 1, 'mlkjhgfd', 1, '2023-01-18 18:02:07', '2023-01-18 18:06:51'),
(45, 378971771, 'leila1@gmail.com', 'Bike', 23, '2023-01-19', '2023-01-19', 1, 'lkjhgfds', 0, '2023-01-18 18:47:00', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `tblbrands`
--

CREATE TABLE `tblbrands` (
  `id` int(11) NOT NULL,
  `BrandName` varchar(120) NOT NULL,
  `CreationDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdationDate` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tblbrands`
--

INSERT INTO `tblbrands` (`id`, `BrandName`, `CreationDate`, `UpdationDate`) VALUES
(1, 'Sacs', '2021-06-18 16:24:34', '2023/01/14'),
(3, 'Chaussures', '2021-06-18 16:25:03', '2021/07/24'),
(4, 'Ceintures', '2021-06-18 16:25:13', '2021/07/24'),
(9, 'Potries', '2023-01-12 01:40:53', '2023/01/16'),
(10, 'Tapis', '2023-01-12 01:41:01', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `tblcompany`
--

CREATE TABLE `tblcompany` (
  `id` int(11) NOT NULL,
  `regno` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `companyname` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `companyemail` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `country` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `companyphone` int(10) NOT NULL,
  `companyaddress` varchar(255) CHARACTER SET latin1 NOT NULL,
  `companylogo` varchar(255) CHARACTER SET latin1 NOT NULL DEFAULT 'avatar15.jpg',
  `status` varchar(255) CHARACTER SET latin1 NOT NULL DEFAULT '0',
  `creationdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `tblcompany`
--

INSERT INTO `tblcompany` (`id`, `regno`, `companyname`, `companyemail`, `country`, `companyphone`, `companyaddress`, `companylogo`, `status`, `creationdate`) VALUES
(4, '1005', 'ArtiSanat', 'ArtiSanat@gmail.com', 'Maroc', 770546590, 'Agadir', 'logosite.png', '1', '2021-02-02 12:17:15');

-- --------------------------------------------------------

--
-- Structure de la table `tbldriverbooking`
--

CREATE TABLE `tbldriverbooking` (
  `id` int(11) NOT NULL,
  `userEmail` varchar(255) CHARACTER SET latin1 NOT NULL,
  `VehicleId` int(11) NOT NULL,
  `Firstname` varchar(255) CHARACTER SET latin1 NOT NULL,
  `Lastname` varchar(255) CHARACTER SET latin1 NOT NULL,
  `Phone` int(11) NOT NULL,
  `Email` varchar(255) CHARACTER SET latin1 NOT NULL,
  `Address` varchar(255) CHARACTER SET latin1 NOT NULL,
  `FromDate` varchar(255) CHARACTER SET latin1 NOT NULL,
  `ToDate` varchar(255) CHARACTER SET latin1 NOT NULL,
  `Status` int(11) NOT NULL,
  `BookingNumber` int(11) NOT NULL,
  `CreationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdationDate` varchar(255) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `tbldriverbooking`
--

INSERT INTO `tbldriverbooking` (`id`, `userEmail`, `VehicleId`, `Firstname`, `Lastname`, `Phone`, `Email`, `Address`, `FromDate`, `ToDate`, `Status`, `BookingNumber`, `CreationDate`, `UpdationDate`) VALUES
(1, 'gerald@gmail.com', 9, 'John', 'Simith', 770546590, 'john@gmail.com', 'Luthuli Avenue', '2022-06-01', '2022-06-05', 0, 189915186, '2022-05-31 10:33:31', ''),
(2, 'kevin@gmail.com', 9, 'Kevin', 'Brown', 770546444, 'kevin@gmail.com', 'Luthuli Avenue, California', '2022-06-06', '2022-06-09', 1, 856565003, '2022-06-01 05:34:32', ''),
(3, 'leila@gmail.com', 9, 'leila', 'maamouch', 654871235, 'leila@gmail.com', 'agadir', '2023-10-25', '2023-11-11', 0, 631779935, '2023-01-12 01:42:49', ''),
(4, 'leila@gmail.com', 9, 'leila', 'maamouch', 654871235, 'leila@gmail.com', 'agadir', '2023-10-25', '2023-11-11', 0, 752984550, '2023-01-12 01:42:49', ''),
(5, 'leila1@gmail.com', 9, 'leila', 'leila', 632145874, 'leila1@gmail.com', 'lkjhgfds', '2023-05-02', '2023-05-03', 0, 750250701, '2023-01-17 09:52:57', '');

-- --------------------------------------------------------

--
-- Structure de la table `tbldrivers`
--

CREATE TABLE `tbldrivers` (
  `Id` int(11) NOT NULL,
  `DriverName` varchar(255) CHARACTER SET latin1 NOT NULL,
  `Email` varchar(255) CHARACTER SET latin1 NOT NULL,
  `Phone` int(11) DEFAULT NULL,
  `PricePerDay` varchar(255) CHARACTER SET latin1 NOT NULL,
  `Experience` varchar(255) CHARACTER SET latin1 NOT NULL,
  `Dimage` varchar(255) CHARACTER SET latin1 NOT NULL,
  `CreationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdationDate` varchar(255) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `tbldrivers`
--

INSERT INTO `tbldrivers` (`Id`, `DriverName`, `Email`, `Phone`, `PricePerDay`, `Experience`, `Dimage`, `CreationDate`, `UpdationDate`) VALUES
(3, 'Mike  Tison', 'Tison@gmail.com', 770546855, '38', 'Three years', 'u3.jpg', '2022-05-31 08:21:41', '2023/01/12'),
(4, 'Don Williams', 'don@gmail.com', 770553456, '70', 'Five years', 'u4.jpg', '2022-05-31 08:22:23', ''),
(5, 'Brown Gerald', 'gerald@gmail.com', 770543422, '40', 'Four years', 'u5.jpg', '2022-05-31 08:23:12', ''),
(6, 'Boom Klinton', 'boom', 770553433, '83', 'Five years', 'u6.jpg', '2022-05-31 08:24:13', ''),
(7, 'James Tenhag', 'james@gmail.com', 770543411, '32', 'Two years', 'u-xl-9.jpg', '2022-05-31 08:25:19', ''),
(8, 'Kevin Morgan', 'Kevin@gmail.com', 770543454, '32', 'One year', 'u-xl-2.jpg', '2022-05-31 08:41:43', ''),
(9, 'Pillips Martin', 'martin@gmail.com', 77054436, '100', 'Five years', 'u-xl-10.jpg', '2022-05-31 08:42:42', '');

-- --------------------------------------------------------

--
-- Structure de la table `tblorders`
--

CREATE TABLE `tblorders` (
  `id` int(11) NOT NULL,
  `ProductId` int(11) DEFAULT NULL,
  `Quantity` int(11) DEFAULT NULL,
  `InvoiceNumber` int(11) DEFAULT NULL,
  `CustomerName` varchar(150) DEFAULT NULL,
  `CustomerContactNo` bigint(12) DEFAULT NULL,
  `PaymentMode` varchar(100) DEFAULT NULL,
  `InvoiceGenDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tblorders`
--

INSERT INTO `tblorders` (`id`, `ProductId`, `Quantity`, `InvoiceNumber`, `CustomerName`, `CustomerContactNo`, `PaymentMode`, `InvoiceGenDate`) VALUES
(3, 1, 1, 979148350, 'Sanjeen', 1234567890, 'card', '2019-12-25 11:38:08'),
(4, 4, 1, 979148350, 'Sanjeen', 1234567890, 'card', '2019-12-25 11:38:08'),
(5, 1, 1, 861354457, 'Rahul', 9876543210, 'cash', '2019-12-24 11:43:48'),
(6, 5, 1, 861354457, 'Rahul', 9876543210, 'cash', '2019-12-24 11:43:48'),
(7, 5, 1, 276794782, 'Sarita', 1122334455, 'cash', '2019-12-25 11:48:06'),
(8, 6, 1, 276794782, 'Sarita', 1122334455, 'cash', '2019-12-25 11:48:06'),
(9, 6, 2, 744608164, 'Babu Pandey', 123458962, 'card', '2019-12-25 12:07:50'),
(10, 2, 2, 744608164, 'Babu Pandey', 123458962, 'card', '2019-12-25 12:07:50'),
(11, 7, 1, 139640585, 'John', 45632147892, 'cash', '2019-12-25 14:54:24'),
(12, 5, 1, 139640585, 'John', 45632147892, 'cash', '2019-12-25 14:54:24'),
(13, 1, 5, 199453245, 'gerald', 770546590, 'cash', '2021-06-04 08:56:35'),
(14, 2, 1, 199453245, 'gerald', 770546590, 'cash', '2021-06-04 08:56:35'),
(16, 7, 1, 631413957, 'Owen', 770546590, 'cash', '2021-06-06 20:45:52'),
(19, 1, 10, 371439323, 'gloria', 770546590, 'cash', '2021-06-06 21:18:18'),
(20, 3, 19, 371439323, 'gloria', 770546590, 'cash', '2021-06-06 21:18:18'),
(21, 5, 12, 371439323, 'gloria', 770546590, 'cash', '2021-06-06 21:18:18');

-- --------------------------------------------------------

--
-- Structure de la table `tblsubscribers`
--

CREATE TABLE `tblsubscribers` (
  `id` int(11) NOT NULL,
  `SubscriberEmail` varchar(120) DEFAULT NULL,
  `PostingDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tblsubscribers`
--

INSERT INTO `tblsubscribers` (`id`, `SubscriberEmail`, `PostingDate`) VALUES
(4, 'smith@gmail.com', '2020-07-07 09:26:21'),
(6, 'gerald@gmail.com', '2021-01-16 12:24:07');

-- --------------------------------------------------------

--
-- Structure de la table `tblusers`
--

CREATE TABLE `tblusers` (
  `id` int(11) NOT NULL,
  `FullName` varchar(120) DEFAULT NULL,
  `EmailId` varchar(100) DEFAULT NULL,
  `Password` varchar(100) DEFAULT NULL,
  `ContactNo` char(11) DEFAULT NULL,
  `dob` varchar(100) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `City` varchar(100) DEFAULT NULL,
  `Country` varchar(100) DEFAULT NULL,
  `RegDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tblusers`
--

INSERT INTO `tblusers` (`id`, `FullName`, `EmailId`, `Password`, `ContactNo`, `dob`, `Address`, `City`, `Country`, `RegDate`, `UpdationDate`) VALUES
(12, 'leila', 'leila@gmail.com', '202cb962ac59075b964b07152d234b70', '0632145789', NULL, NULL, NULL, NULL, '2023-01-12 00:27:22', NULL),
(13, 'leila', 'leila1@gmail.com', 'c6f057b86584942e415435ffb1fa93d4', '0694549796', NULL, NULL, NULL, NULL, '2023-01-16 19:53:33', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `tblvehicles`
--

CREATE TABLE `tblvehicles` (
  `id` int(11) NOT NULL,
  `VehiclesTitle` varchar(150) DEFAULT NULL,
  `VehiclesBrand` int(11) DEFAULT NULL,
  `VehiclesOverview` longtext,
  `PricePerDay` int(11) DEFAULT NULL,
  `FuelType` varchar(100) DEFAULT NULL,
  `ModelYear` int(6) DEFAULT NULL,
  `SeatingCapacity` int(11) DEFAULT NULL,
  `Vimage1` varchar(120) DEFAULT NULL,
  `Vimage2` varchar(120) DEFAULT NULL,
  `Vimage3` varchar(120) DEFAULT NULL,
  `Vimage4` varchar(120) DEFAULT NULL,
  `Vimage5` varchar(120) DEFAULT NULL,
  `AirConditioner` int(11) DEFAULT NULL,
  `PowerDoorLocks` int(11) DEFAULT NULL,
  `AntiLockBrakingSystem` int(11) DEFAULT NULL,
  `BrakeAssist` int(11) DEFAULT NULL,
  `PowerSteering` int(11) DEFAULT NULL,
  `DriverAirbag` int(11) DEFAULT NULL,
  `PassengerAirbag` int(11) DEFAULT NULL,
  `PowerWindows` int(11) DEFAULT NULL,
  `CDPlayer` int(11) DEFAULT NULL,
  `CentralLocking` int(11) DEFAULT NULL,
  `CrashSensor` int(11) DEFAULT NULL,
  `LeatherSeats` int(11) DEFAULT NULL,
  `RegDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tblvehicles`
--

INSERT INTO `tblvehicles` (`id`, `VehiclesTitle`, `VehiclesBrand`, `VehiclesOverview`, `PricePerDay`, `FuelType`, `ModelYear`, `SeatingCapacity`, `Vimage1`, `Vimage2`, `Vimage3`, `Vimage4`, `Vimage5`, `AirConditioner`, `PowerDoorLocks`, `AntiLockBrakingSystem`, `BrakeAssist`, `PowerSteering`, `DriverAirbag`, `PassengerAirbag`, `PowerWindows`, `CDPlayer`, `CentralLocking`, `CrashSensor`, `LeatherSeats`, `RegDate`, `UpdationDate`) VALUES
(11, ' Sonia Vintage Leather Bag', 1, ' Sac porté main  - Vintage Cuir- Sonia\r\n\r\nSonia, c\'est l\'histoire d\'un atelier familial de maroquinerie situé en plein coeur de Paris, et de deux frères, Anthony et David. Grandissants dans cet univers empreint de passion, de tradition et de savoir-faire artisanal, ils se font un jour une promesse : démocratiser la maroquinerie !\r\n\r\nLa noblesse et souplesse du cuir de vachette grainé et la bijouterie argentée font de Confort une ligne intemporelle qui apportera texture et chaleur à toutes vos tenues. Jeunes, tendances et dynamiques, les nombreux modèles de la collection vous raviront grâce à leur large choix de coloris. Alors, lequel vous fera craquer ?\r\n\r\nDétails produit :\r\n\r\n- Dimensions : L 29 x H 21 x P 12 cm.\r\n\r\n- Poids : 0,78 kg.\r\n\r\n- Matière : vintage cuir.\r\n\r\n', 1200, NULL, 2017, NULL, 'Best Vintage Leather Bags Purses Here!.jpg', 'Best Vintage Leather Bags Purses Here!.jpg', 'Best Vintage Leather Bags Purses Here!.jpg', 'Best Vintage Leather Bags Purses Here!.jpg', 'Best Vintage Leather Bags Purses Here!.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-11 14:47:29', NULL),
(12, 'Leather Bag Fez', 1, ' Sac porté main - Cuir - FEZ\r\n\r\nFEZ, c\'est l\'histoire d\'un atelier familial de maroquinerie situé en plein coeur de Paris, et de deux frères, Anthony et David. Grandissants dans cet univers empreint de passion, de tradition et de savoir-faire artisanal, ils se font un jour une promesse : démocratiser la maroquinerie !\r\n\r\nLa noblesse et souplesse du cuir de vachette grainé et la bijouterie argentée font de Confort une ligne intemporelle qui apportera texture et chaleur à toutes vos tenues. Jeunes, tendances et dynamiques, les nombreux modèles de la collection vous raviront grâce à leur large choix de coloris. Alors, lequel vous fera craquer ?\r\n\r\nDétails produit :\r\n\r\n- Dimensions : L 29 x H 20x P 12 cm.\r\n\r\n- Poids : 0,70 kg.\r\n\r\n- Matière : cuir de vachette grainé.\r\n ', 1000, NULL, 2011, NULL, 'sac.JPG', 'sac.JPG', 'sac.JPG', 'sac.JPG', 'sac.JPG', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-11 14:51:37', NULL),
(13, 'Exotic Lezard Leather Bag', 1, ' Sac porté main - Cuir-\r\n\r\nExotic Lezard , c\'est l\'histoire d\'un atelier familial de maroquinerie situé en plein coeur de Paris, et de deux frères, Anthony et David. Grandissants dans cet univers empreint de passion, de tradition et de savoir-faire artisanal, ils se font un jour une promesse : démocratiser la maroquinerie ! La noblesse et souplesse du cuir de vachette grainé et la bijouterie argentée font de Confort une ligne intemporelle qui apportera texture et chaleur à toutes vos tenues. Jeunes, tendances et dynamiques, les nombreux modèles de la collection vous raviront grâce à leur large choix de coloris. Alors, lequel vous fera craquer ? \r\n\r\nComposition : 100% Cuir\r\nDimensions : 11 x 7.5x4 cm ', 2999, NULL, 2018, NULL, '10 Fashion Trends You\'re Going to See Everywhere - FabFitFun.jpg', '10 Fashion Trends You\'re Going to See Everywhere - FabFitFun.jpg', '10 Fashion Trends You\'re Going to See Everywhere - FabFitFun.jpg', '10 Fashion Trends You\'re Going to See Everywhere - FabFitFun.jpg', '10 Fashion Trends You\'re Going to See Everywhere - FabFitFun.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-11 15:00:32', NULL),
(14, 'Leather Bag Arya', 1, 'Sac porté main - Cuir- Arya\r\nArya est un sac en cuir fabriqué sur Taroudant selon les principes du commerce équitable.\r\n\r\nDimensions\r\n\r\n32 x 20 cm', 1300, NULL, 2019, NULL, 'leather and wood bag.jpg', 'leather and wood bag.jpg', 'leather and wood bag.jpg', 'leather and wood bag.jpg', 'leather and wood bag.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-11 15:03:55', NULL),
(15, 'Maamouch Vintage Leather Bag', 1, 'Sac porté dos- Cuir- Maamouch Maamouch, c\'est l\'histoire d\'un atelier familial de maroquinerie situé en plein coeur de Paris, et de deux frères, Anthony et David. Grandissants dans cet univers empreint de passion, de tradition et de savoir-faire artisanal, ils se font un jour une promesse : démocratiser la maroquinerie ! La noblesse et souplesse du cuir de vachette grainé et la bijouterie argentée font de Confort une ligne intemporelle qui apportera texture et chaleur à toutes vos tenues. Jeunes, tendances et dynamiques, les nombreux modèles de la collection vous raviront grâce à leur large choix de coloris. Alors, lequel vous fera craquer ? Détails produit : - Dimensions : L 29 x H 21 x P 12 cm. - Poids : 0,78 kg. - Matière : cuir. ', 5399, NULL, 2002, NULL, 'Denny&Dora Mens Cow Leather Backpack(1).jpg', 'Denny&Dora Mens Cow Leather Backpack(1).jpg', 'Denny&Dora Mens Cow Leather Backpack(1).jpg', 'Denny&Dora Mens Cow Leather Backpack(1).jpg', 'Denny&Dora Mens Cow Leather Backpack(1).jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-11 15:06:10', NULL),
(16, 'Leather Bag Denny', 1, 'Sac porté main - Cuir- Denny Denny, c\'est l\'histoire d\'un atelier familial de maroquinerie situé en plein coeur de Paris, et de deux frères, Anthony et David. Grandissants dans cet univers empreint de passion, de tradition et de savoir-faire artisanal, ils se font un jour une promesse : démocratiser la maroquinerie ! La noblesse et souplesse du cuir de vachette grainé et la bijouterie argentée font de Confort une ligne intemporelle qui apportera texture et chaleur à toutes vos tenues. Jeunes, tendances et dynamiques, les nombreux modèles de la collection vous raviront grâce à leur large choix de coloris. Alors, lequel vous fera craquer ? Détails produit : - Dimensions : L 29 x H 21 x P 12 cm. - Poids : 0,78 kg. - Matière : cuir. ', 1100, NULL, 2019, NULL, 'Leather-envelope-clutch-1477076110.jpg', 'Leather-envelope-clutch-1477076110.jpg', 'Leather-envelope-clutch-1477076110.jpg', 'Leather-envelope-clutch-1477076110.jpg', 'Leather-envelope-clutch-1477076110.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-11 15:07:28', NULL),
(17, 'Hay Leather Bag ', 1, 'Sac porté main - Cuir- Hay Hay, c\'est l\'histoire d\'un atelier familial de maroquinerie situé en plein coeur de Paris, et de deux frères, Anthony et David. Grandissants dans cet univers empreint de passion, de tradition et de savoir-faire artisanal, ils se font un jour une promesse : démocratiser la maroquinerie ! La noblesse et souplesse du cuir de vachette grainé et la bijouterie argentée font de Confort une ligne intemporelle qui apportera texture et chaleur à toutes vos tenues. Jeunes, tendances et dynamiques, les nombreux modèles de la collection vous raviront grâce à leur large choix de coloris. Alors, lequel vous fera craquer ? Détails produit : - Dimensions : L 29 x H 21 x P 12 cm. - Poids : 0,78 kg. - Matière : cuir. ', 5999, NULL, 2001, NULL, 'This item is unavailable Etsy(1).jpg', 'This item is unavailable Etsy(1).jpg', 'This item is unavailable Etsy(1).jpg', 'This item is unavailable Etsy(1).jpg', 'This item is unavailable Etsy(1).jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-11 15:08:58', NULL),
(18, 'Leather Bag Zaroual', 1, 'Sac porté dos- Cuir- Zaroual Zaroual , c\'est l\'histoire d\'un atelier familial de maroquinerie situé en plein coeur de Paris, et de deux frères, Anthony et David. Grandissants dans cet univers empreint de passion, de tradition et de savoir-faire artisanal, ils se font un jour une promesse : démocratiser la maroquinerie ! La noblesse et souplesse du cuir de vachette grainé et la bijouterie argentée font de Confort une ligne intemporelle qui apportera texture et chaleur à toutes vos tenues. Jeunes, tendances et dynamiques, les nombreux modèles de la collection vous raviront grâce à leur large choix de coloris. Alors, lequel vous fera craquer ? Détails produit : - Dimensions : L 29 x H 21 x P 12 cm. - Poids : 0,78 kg. - Matière : cuir. ', 899, NULL, 2021, NULL, 'Vintage Buckles Leather Student Bag Backpacks only $32_99 -ByGoods(1).jpg', 'Vintage Buckles Leather Student Bag Backpacks only $32_99 -ByGoods(1).jpg', 'Vintage Buckles Leather Student Bag Backpacks only $32_99 -ByGoods(1).jpg', 'Vintage Buckles Leather Student Bag Backpacks only $32_99 -ByGoods(1).jpg', 'Vintage Buckles Leather Student Bag Backpacks only $32_99 -ByGoods(1).jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-11 15:15:39', NULL),
(19, 'Leather Bag Croco', 1, 'Sac porté dos- Cuir- Croco  Croco, c\'est l\'histoire d\'un atelier familial de maroquinerie situé en plein coeur de Paris, et de deux frères, Anthony et David. Grandissants dans cet univers empreint de passion, de tradition et de savoir-faire artisanal, ils se font un jour une promesse : démocratiser la maroquinerie ! La noblesse et souplesse du cuir de vachette grainé et la bijouterie argentée font de Confort une ligne intemporelle qui apportera texture et chaleur à toutes vos tenues. Jeunes, tendances et dynamiques, les nombreux modèles de la collection vous raviront grâce à leur large choix de coloris. Alors, lequel vous fera craquer ? Détails produit : - Dimensions : L 29 x H 21 x P 12 cm. - Poids : 0,78 kg. - Matière : cuir. ', 1595, NULL, 2011, NULL, 'SACSS.JPG', 'SACSS.JPG', 'SACSS.JPG', 'SACSS.JPG', 'SACSS.JPG', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-11 15:17:19', NULL),
(20, 'La babouche berbère', 3, 'Babouche Berbère: La babouche \"Tout Terrain\"\r\n\r\nOn l\'appelle la babouche tout terrain, car la babouche berbère est une babouche à utiliser sans modération. La babouche berbère peut être portée à l\'intérieur, à l\'extérieur et aussi au travail, si on a un metier éprouvant, qui demande à rester debout une bonne partie de la journée.\r\n\r\nLa babouche berbère est la star la plus ancienne et la plus emblématique des babouches marocaines. C\'est une babouche à bout arrondi, qui à l\'origine, était la chaussure des populations berbères. Ajourd\'hui, nous avons donnée une cure de jouvence à cette babouche. La babouche berbère est une babouche en cuir véritable intérieur et extérieur. Le cuir est doublé, la semelle intérieure est en cuir doux, pour plus de confort. La babouche est égalementcousue, et la semelle en caoutchouc de premier choix très résistant pour une longue durabilité. Cette babouche est disponible pour femme, pour homme et pour enfant. Elle est disponible en plusieurs couleurs, et les pointures vont jusqu\'à 52, exclusivement sur Babouche-Maroc. Retrouvez les babouches berbères homme grandes pointures ici.\r\nIntérieur et extérieur encuir doublé\r\nTrès durable\r\nCuir doux, d\'excellente qualité\r\nSemelle intérieure en cuir doux', 2067, NULL, 2010, NULL, 'LALLA, La babouche berbère - La babouche à la mode by babmode_com.jpg', 'LALLA, La babouche berbère - La babouche à la mode by babmode_com.jpg', 'LALLA, La babouche berbère - La babouche à la mode by babmode_com.jpg', 'LALLA, La babouche berbère - La babouche à la mode by babmode_com.jpg', 'LALLA, La babouche berbère - La babouche à la mode by babmode_com.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-11 15:23:00', NULL),
(22, 'Leather Shoes Dora', 3, 'Les chaussures Dora sont le choix idéal pour tous ceux qui recherchent des chaussures raffinées et élégantes. Fabriquées à partir de cuir de vachette pour une durabilité et un confort optimaux, ces chaussures sont dotées d\'une semelle extérieure en caoutchouc synthétique et d\'une semelle intérieure en cuir pour garantir le maximum de confort. Associant fermeture sur les côtés et laçage plat pour un look tendance, elles savent donner une touche d\'originalité à toute tenue ! Ces chaussures peuvent être portées avec n’importe quel type de tenue pour un look professionnel ou casual, adaptée à toute occasion. On les porte facilement avec un jean ou une jupe lors des soirée fraîches d\'automne ou hiver. ', 1399, NULL, 2009, NULL, 'The Corinne Lugsole Loafer.png', 'The Corinne Lugsole Loafer.png', 'The Corinne Lugsole Loafer.png', 'The Corinne Lugsole Loafer.png', 'The Corinne Lugsole Loafer.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-11 15:29:28', NULL),
(23, 'Belt Trevi Camel', 4, 'Cette ceinture Trevi Camel en cuir grainé et lisse est munie d\'une boucle ronde monogramme à rivet.\r\n\r\nLargeur 3 cm', 300, NULL, 2018, NULL, 'Ceinture Trevi - trevi camel, 95.jpg', 'Ceinture Trevi - trevi camel, 95.jpg', 'Ceinture Trevi - trevi camel, 95.jpg', 'Ceinture Trevi - trevi camel, 95.jpg', 'Ceinture Trevi - trevi camel, 95.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-11 15:35:22', NULL),
(24, 'ZV Serpent ', 4, 'ZV Serpent est une ceinture en cuir marron.\r\n\r\nComposition: 100% CUIR DE VACHE\r\n\r\nTaille : 80\r\n\r\nMatière : Cuir', 450, NULL, 2018, NULL, 'Gianni Feraud - Ceinture en cuir véritable lisse - Marron foncé.jpg', 'Gianni Feraud - Ceinture en cuir véritable lisse - Marron foncé.jpg', 'Gianni Feraud - Ceinture en cuir véritable lisse - Marron foncé.jpg', 'Gianni Feraud - Ceinture en cuir véritable lisse - Marron foncé.jpg', 'Gianni Feraud - Ceinture en cuir véritable lisse - Marron foncé.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-11 15:37:38', NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `tblbike`
--
ALTER TABLE `tblbike`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tblbooking`
--
ALTER TABLE `tblbooking`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tblbrands`
--
ALTER TABLE `tblbrands`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tblcompany`
--
ALTER TABLE `tblcompany`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tbldriverbooking`
--
ALTER TABLE `tbldriverbooking`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tbldrivers`
--
ALTER TABLE `tbldrivers`
  ADD PRIMARY KEY (`Id`);

--
-- Index pour la table `tblorders`
--
ALTER TABLE `tblorders`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tblsubscribers`
--
ALTER TABLE `tblsubscribers`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tblusers`
--
ALTER TABLE `tblusers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `EmailId` (`EmailId`);

--
-- Index pour la table `tblvehicles`
--
ALTER TABLE `tblvehicles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT pour la table `tblbike`
--
ALTER TABLE `tblbike`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT pour la table `tblbooking`
--
ALTER TABLE `tblbooking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT pour la table `tblbrands`
--
ALTER TABLE `tblbrands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `tblcompany`
--
ALTER TABLE `tblcompany`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `tbldriverbooking`
--
ALTER TABLE `tbldriverbooking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `tbldrivers`
--
ALTER TABLE `tbldrivers`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `tblorders`
--
ALTER TABLE `tblorders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pour la table `tblsubscribers`
--
ALTER TABLE `tblsubscribers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `tblusers`
--
ALTER TABLE `tblusers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `tblvehicles`
--
ALTER TABLE `tblvehicles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
