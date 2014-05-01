-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 01, 2014 at 03:31 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `task`
--

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE IF NOT EXISTS `clients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(5) NOT NULL,
  `full_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `client_type` enum('individual','company') NOT NULL,
  `phone_mobile` varchar(15) NOT NULL,
  `phone_home` varchar(15) NOT NULL,
  `phone_office` varchar(15) NOT NULL,
  `phone_mobile2` varchar(15) NOT NULL,
  `phone_office2` varchar(15) NOT NULL,
  `dob` date NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `pan` varchar(15) NOT NULL,
  `tan` varchar(15) NOT NULL,
  `genius_id` varchar(15) NOT NULL,
  `file_id` varchar(15) NOT NULL,
  `create_date` datetime NOT NULL,
  `update_date` datetime NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=666 ;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `title`, `full_name`, `client_type`, `phone_mobile`, `phone_home`, `phone_office`, `phone_mobile2`, `phone_office2`, `dob`, `email`, `address`, `pan`, `tan`, `genius_id`, `file_id`, `create_date`, `update_date`, `status`) VALUES
(1, '', '  GEETHAVELMOHAN', 'individual', '', '', '', '', '', '1980-05-15', '', '19, West Mada Street, Pillaiyar Koil Street\r\nThirumazhisai\r\nChennai - 600041\r\nTamilnadu\r\n', 'ALMPG2470K', '', '398A', '', '2014-04-30 19:45:04', '2014-04-30 19:45:04', 'active'),
(2, '', '  GEORGE BUSH', 'individual', '', '', '', '', '', '1992-06-25', '', '80, Salai Street\r\nSrivaikundam\r\nTuticorin - 628601\r\nTamilnadu\r\n', 'AXTPG6580D', '', '427', '', '2014-04-30 19:45:04', '2014-04-30 19:45:04', 'active'),
(3, '', '  GOPALANVIJAYARAGHAVAN', 'individual', '', '', '', '', '', '1952-05-27', '', '42/154(2), Casa Feliz, M.r.a. 16a, Behind Mukolaikal Temple\r\nMuttathara, Vallakadavu Post\r\nThiruvanathapuram - 600098\r\nKerala\r\n', 'AYXPG5319B', '', '425', '', '2014-04-30 19:45:04', '2014-04-30 19:45:04', 'active'),
(4, '', '  PARVATHY NARAYAN', 'individual', '', '', '', '', '', '1937-08-11', '', '1a, Palm Lands,lyn Wood Avenue\r\nMahalingapuram\r\nChennai - 600034\r\nTamilnadu\r\n', 'AABPN3279P', '', '309A', '', '2014-04-30 19:45:04', '2014-04-30 19:45:04', 'active'),
(5, '', '  RASHMI AJAY', 'individual', '', '', '', '', '', '1973-12-30', '', 'Z -72, 11th Street\r\nAnna Nagar\r\nChennai - 600040\r\nTamilnadu\r\n', 'AGTPR9555N', '', '262A', '', '2014-04-30 19:45:04', '2014-04-30 19:45:04', 'active'),
(6, '', '  SRAVANTHI', 'individual', '', '', '', '', '', '1985-03-17', '', '67 T3, Candle Square, Kaveri Street\r\nSaligramam\r\nChennai - 600093\r\nTamilnadu\r\n', 'ARTPK4635R', '', 'M-24', '', '2014-04-30 19:45:04', '2014-04-30 19:45:04', 'active'),
(7, '', '  SWAMINATHAN', 'individual', '', '', '', '', '', '1970-12-12', '', 'B.no.7-1a, Sterling Srivedasri Apartments, 4, Chockalingam Nagar\r\n4th Main Road, Ags Colony, Velachery\r\nChennai - 600042\r\nTamilnadu\r\n', 'ASAPS4233P', '', 'MISV-001', '', '2014-04-30 19:45:04', '2014-04-30 19:45:04', 'active'),
(8, '', 'A  CHANDRAN', 'individual', '', '', '', '', '', '1949-05-15', '', 'New No 5, Vembuliamman Koil, First Cross Street\r\nWest K.k. Nagar\r\nChennai - 600078\r\nTamilnadu\r\n', 'AAGPC7721C', '', 'S-011', '', '2014-04-30 19:45:04', '2014-04-30 19:45:04', 'active'),
(9, '', 'A  KATHIRESAN', 'individual', '', '', '', '', '', '1969-05-07', '', '12a, 4th Street\r\nVijayaraghavapuram Saligrmam\r\nChennai - 600093\r\nTamilnadu\r\n', 'ALOPK9554E', '', '458', '', '2014-04-30 19:45:04', '2014-04-30 19:45:04', 'active'),
(10, '', 'A  PEERKANNU', 'individual', '', '', '', '', '', '1954-11-18', '', '8a, Chakrapani Road,narasingapuram\r\nGuindy\r\nChennai - 600032\r\nTamilnadu\r\n', 'AALPP5160H', '', '222', '', '2014-04-30 19:45:04', '2014-04-30 19:45:04', 'active'),
(11, '', 'A  PERUMAL', 'individual', '', '', '', '', '', '1954-02-07', '', 'F-3, Sri Balamurugan Engg Enterprises\r\nEkkattuthangal\r\nChennai - 600097\r\nTamilnadu\r\n', 'AAAPA8553C', '', '172', '', '2014-04-30 19:45:04', '2014-04-30 19:45:04', 'active'),
(12, '', 'A  PRABHAKARAN', 'individual', '', '', '', '', '', '1960-05-18', '', '21/10, Indira Nagar, Second Street\r\nAlwarthirunagar\r\nChennai - 600087\r\nTamilnadu\r\n', 'ADOPA4352N', '', '323', '', '2014-04-30 19:45:04', '2014-04-30 19:45:04', 'active'),
(13, '', 'A  RANGANATHAN', 'individual', '', '', '', '', '', '1945-02-07', '', '6/16, West Vannier Street\r\nK.k.nagar\r\nChennai - 600078\r\nTamilnadu\r\n', 'AAHPR5718H', '', 'IT-2', '', '2014-04-30 19:45:04', '2014-04-30 19:45:04', 'active'),
(14, '', 'A  RANI SIVARAMAN', 'individual', '', '', '', '', '', '1955-07-25', '', '15, August, Annaji Nagar First Main Road\r\nWest K.k.nagar\r\nChennai - 600078\r\nTamilnadu\r\n', 'ABTPS6823K', '', 'IT-163', '', '2014-04-30 19:45:04', '2014-04-30 19:45:04', 'active'),
(15, '', 'A  SEENI', 'individual', '', '', '', '', '', '1949-11-06', '', '58, Duraisamy Street\r\nVadapalani\r\nChennai - 600026\r\nTamilnadu\r\n', 'AAFPS6188N', '', 'IT-144', '', '2014-04-30 19:45:04', '2014-04-30 19:45:04', 'active'),
(16, '', 'A  SHRUTHILAKSHMI', 'individual', '', '', '', '', '', '1970-10-05', '', '10/30, Volta Colony Extn.\r\nNanganallur\r\nChennai - 600061\r\nTamilnadu\r\n', 'AUXPS4877L', '', 'V-126', '', '2014-04-30 19:45:04', '2014-04-30 19:45:04', 'active'),
(17, '', 'A  SRINIVASAN', 'individual', '', '', '', '', '', '1950-02-04', '', 'Flat No.234/15, Sidharth Tulip, Vembuliamman Koil Street\r\nWest K.k.nagar\r\nChennai - 600078\r\nTamilnadu\r\n', 'AANPI0369K', '', 'MIS-137', '', '2014-04-30 19:45:04', '2014-04-30 19:45:04', 'active'),
(18, '', 'A  SURESH', 'individual', '', '', '', '', '', '1965-01-17', '', 'B-4, Kumaran Constructions,omsakthi Nagar, 17,k.r.ponnurangan Salai\r\nValsaravakkam\r\nChennai - 600087\r\nTamilnadu\r\n', 'AFMPA5757M', '', 'S-039A', '', '2014-04-30 19:45:04', '2014-04-30 19:45:04', 'active'),
(19, '', 'A  VIJAYAKUMAR', 'individual', '', '', '', '', '', '1963-02-07', '', '661, 9th Sector 48th Street\r\nK K Nagar\r\nChennai - 600078\r\nTamilnadu\r\n', 'ADIPV2356D', '', '403N', '', '2014-04-30 19:45:04', '2014-04-30 19:45:04', 'active'),
(20, '', 'A ARJUN DOGRA', 'individual', '', '', '', '', '', '1980-09-08', '', 'A6, Building No.48/1, Durairaj Street\r\nPazhavanthangal\r\nChennai - 600114\r\nTamilnadu\r\n', 'AIIPA5392B', '', '360', '', '2014-04-30 19:45:04', '2014-04-30 19:45:04', 'active'),
(21, '', 'A B SUBRAMONIAM', 'individual', '', '', '', '', '', '1975-12-15', '', '51, Balaji Nagar, Ii Street\r\nVirugambakkam\r\nChennai - 600092\r\nTamilnadu\r\n', 'AVOPS5652B', '', 'S-017', '', '2014-04-30 19:45:04', '2014-04-30 19:45:04', 'active'),
(22, '', 'A K NARAYANAN', 'individual', '', '', '', '', '', '1943-04-16', '', '6, M.g.r Nagar, Pammal Nallathambi Street\r\nK.k.nagar\r\nChennai - 600078\r\nTamilnadu\r\n', 'ABCPN7303G', '', '346', '', '2014-04-30 19:45:04', '2014-04-30 19:45:04', 'active'),
(23, '', 'A N SEVUGAN CHETTY', 'individual', '', '', '', '', '', '1975-10-11', '', '603, I- Wing, Mayuresh Park\r\nLake Road,bhandup (west)\r\nMumbai - 400078\r\nMaharashtra\r\n', 'AFMPC8703R', '', '410N', '', '2014-04-30 19:45:04', '2014-04-30 19:45:04', 'active'),
(24, '', 'A N VIJAYAN', 'individual', '', '', '', '', '', '1963-10-15', '', '20-f1, Vinayaga, Vallal Kumanan Street\r\nBagirathi Nagar, Madipakkam\r\nChennai - 600091\r\nTamilnadu\r\n', 'AAGPV0325H', '', 'V-127', '', '2014-04-30 19:45:04', '2014-04-30 19:45:04', 'active'),
(25, '', 'A PARANDAMA NAIDU', 'individual', '', '', '', '', '', '1969-06-22', '', 'No.1/a, Sivan Koil 1st Cross Street 2nd Floor\r\nKodambakkam\r\nChennai - 600024\r\nTamilnadu\r\n', 'APNPP0192A', '', '350N', '', '2014-04-30 19:45:04', '2014-04-30 19:45:04', 'active'),
(26, '', 'A S MAHENDRAN', 'individual', '', '', '', '', '', '1969-05-05', '', '41, M.g.r Nagar, K.k.salai\r\nK.k.nagar\r\nChennai - 600078\r\nTamilnadu\r\n', 'AKYPM7807P', '', '284', '', '2014-04-30 19:45:04', '2014-04-30 19:45:04', 'active'),
(27, '', 'A S PRAKASH', 'individual', '', '', '', '', '', '1957-11-19', '', 'Ananda Sadanam, Nettayam P O\r\nPooyapally\r\nKollam - 691537\r\nKerala\r\n', 'ABVPP3188J', '', '454D', '', '2014-04-30 19:45:04', '2014-04-30 19:45:04', 'active'),
(28, '', 'A V SHANMUGAM', 'individual', '', '', '', '', '', '1953-03-14', '', '1-a, Royal Sweets, Stringer Street\r\nPark Town\r\nChennai - 600003\r\nTamilnadu\r\n', 'AFAPS7328Q', '', '259', '', '2014-04-30 19:45:04', '2014-04-30 19:45:04', 'active'),
(29, '', 'A.  ABDUL MALICK', 'individual', '', '', '', '', '', '1955-07-29', '', 'New No.12, Duraisamy Road\r\nVadapalani\r\nChennai - 600026\r\nTamilnadu\r\n', 'AJLPA3789L', '', '286N', '', '2014-04-30 19:45:04', '2014-04-30 19:45:04', 'active'),
(30, '', 'A.  GAYATHRI BINDHU', 'individual', '', '', '', '', '', '1976-11-24', '', 'No.13, Manjolai St\r\nEkkathuthangal\r\nChennai - 600097\r\nTamilnadu\r\n', 'AIFPG3235L', '', '276', '', '2014-04-30 19:45:04', '2014-04-30 19:45:04', 'active'),
(31, '', 'A.  KALA ARUMUGAM', 'individual', '', '', '', '', '', '1956-05-31', '', '5, Ramapuram Ramasamy Street\r\nSaidapet\r\nChennai - 600 015\r\nTamilnadu\r\n', 'AEEPK6589A', '', '138', '', '2014-04-30 19:45:04', '2014-04-30 19:45:04', 'active'),
(32, '', 'A.  RAMALINGAM PILLAI', 'individual', '', '', '', '', '', '1934-02-18', '', '26, Shanmugaraya Street\r\nPurasawakkam\r\nChennai - 600007\r\nTamilnadu\r\n', 'AAJPR8109G', '', '232', '', '2014-04-30 19:45:04', '2014-04-30 19:45:04', 'active'),
(33, '', 'A.K.  MUKUNDAN', 'individual', '', '', '', '', '', '1948-02-19', '', '7, Fourth Cross,5th Street\r\nVijayaraghavapuram\r\nChennai - 600093\r\nTamilnadu\r\n', 'ADEPM8115F', '', 'IT-316', '', '2014-04-30 19:45:04', '2014-04-30 19:45:04', 'active'),
(34, '', 'A.M  KUMAR', 'individual', '', '', '', '', '', '1958-05-31', '', '23/12, Flat D, Ii St, Bakatavatchalam Colny\r\nVadapalani\r\nChennai - 600026\r\nTamilnadu\r\n', 'AKDPK2880K', '', '252', '', '2014-04-30 19:45:04', '2014-04-30 19:45:04', 'active'),
(35, '', 'A.V.R.EYE AND ENT CARE CENTRE', 'company', '', '', '', '', '', '1993-01-05', '', 'No.9,18th Avenue, P.t.rajan Road\r\nK.k.nagar\r\nChennai - 600078\r\nTamilnadu\r\n', 'AAHFA7517P', '', '314', '', '2014-04-30 19:45:04', '2014-04-30 19:45:04', 'active'),
(36, '', 'ABDUL  RAHIM', 'individual', '', '', '', '', '', '1958-01-07', '', '13, Jaganathan Street\r\nAgaram\r\nChennai - 600082\r\nTamilnadu\r\n', 'ADZPA5031D', '', 'IT-353', '', '2014-04-30 19:45:04', '2014-04-30 19:45:04', 'active'),
(37, '', 'ACA LITERATURE MINISTRY', 'company', '', '', '', '', '', '2003-09-22', '', '26, Shanmugarayan Street\r\nPurasawakkam\r\nChennai - 600007\r\nTamilnadu\r\n', 'AABTA3063E', '', '231', '', '2014-04-30 19:45:04', '2014-04-30 19:45:04', 'active'),
(38, '', 'AJITHA  MARY', 'individual', '', '', '', '', '', '1983-01-18', '', '13, Ambal Nagar, Thiruvallur Street\r\nEkkattuthangal\r\nChennai - 600097\r\nTamilnadu\r\n', 'AWYPM7917Q', '', 'MIS-127', '', '2014-04-30 19:45:04', '2014-04-30 19:45:04', 'active'),
(39, '', 'AKBAR BIRIYANI', 'individual', '', '', '', '', '', '1983-01-18', '', '-\r\n-\r\n-\r\n-\r\n', 'AWYPM7917Q', '', '259A', '', '2014-04-30 19:45:04', '2014-04-30 19:45:04', 'active'),
(40, '', 'ALMAACH TECHNOLOGIES PRIVATE LIMITED', 'company', '', '', '', '', '', '2007-06-03', '', '4, Ii Floor Akshaya Colony, I Avenue\r\nAnna Nagar Extension\r\nChennai - 600050\r\nTamilnadu\r\n', 'AAGCA1817L', 'CHEA12532C', '106N', '', '2014-04-30 19:45:04', '2014-04-30 19:45:04', 'active'),
(41, '', 'ALTACIT GLOBAL', 'company', '', '', '', '', '', '2003-02-15', '', '148-150, Crative Enclave, Luz Church Road\r\nMylapore\r\nChennai - 600004\r\nTamilnadu\r\n', 'AAEFG6424C', 'CHEG06661E', '186A', '', '2014-04-30 19:45:04', '2014-04-30 19:45:04', 'active'),
(42, '', 'AMBAL ENGINEERING ACCESSORIES (P) LTD', 'company', '', '', '', '', '', '1996-11-21', '', '4, Amaravathy Nagar, Main Road\r\nArumbakkam\r\nChennai - 600106\r\nTamilnadu\r\n', 'AACCA4626R', 'CHEA09463G', '123', '', '2014-04-30 19:45:04', '2014-04-30 19:45:04', 'active'),
(43, '', 'AMIRTHA NARAYANA  ACHAR', 'individual', '', '', '', '', '', '1949-10-21', '', 'Flat No.5, "pooja" First Floor, No.3, K.b.dasan Road\r\nAlwarpet\r\nChennai - 600018\r\nTamilnadu\r\n', 'AEMPA2784H', 'CHEA09463G', 'S-010A', '', '2014-04-30 19:45:04', '2014-04-30 19:45:04', 'active'),
(44, '', 'ANDREW PREETHAM DAVIDS', 'individual', '', '', '', '', '', '1977-01-05', '', '451, 4th Street\r\nAnna Nagar West Extn\r\nChennai - 600101\r\nTamilnadu\r\n', 'AOWPD7861G', 'CHEA09463G', 'MIS-112', '', '2014-04-30 19:45:04', '2014-04-30 19:45:04', 'active'),
(45, '', 'ANTHONY MUTHU  T', 'individual', '', '', '', '', '', '1973-05-29', '', '12, V.o.c Nagar 4th Cross Street, V.k.p Nagar\r\nAyyanchery, Oorapakkam\r\nChennai - 603302\r\nTamilnadu\r\n', 'AHXPA2580P', 'CHEA09463G', 'V-131', '', '2014-04-30 19:45:04', '2014-04-30 19:45:04', 'active'),
(46, '', 'ARAVIND RAAM INFOTEC', 'individual', '', '', '', '', '', '1973-05-29', '', '-\r\n-\r\n-\r\n-\r\n', 'AHXPA2580P', 'CHEA09463G', 'TEMP3', '', '2014-04-30 19:45:04', '2014-04-30 19:45:04', 'active'),
(47, '', 'ARAVINDER  SINGH', 'individual', '', '', '', '', '', '1976-02-27', '', 'No.15a, Kasi Towers, Mariamman Koil Street\r\nK.k.nagar\r\nChennai - 600078\r\nTamilnadu\r\n', 'AEQPA9349Q', 'CHEA09463G', '108', '', '2014-04-30 19:45:04', '2014-04-30 19:45:04', 'active'),
(48, '', 'ARCHANA  AGRAWAL', 'individual', '', '', '', '', '', '1977-08-13', '', '4/27-1, Bella Vista, Sunrise Avenue\r\nNeelankarai\r\nChennai - 600041\r\nTamilnadu\r\n', 'ADGPA7998A', 'CHEA09463G', 'IT-115B', '', '2014-04-30 19:45:04', '2014-04-30 19:45:04', 'active'),
(49, '', 'ARPITA  VERGHESE', 'individual', '', '', '', '', '', '1979-08-25', '', 'New No.4/27/1(old No.2), Bella Vista, Sunrise Avenue\r\nNeelankarai\r\nChennai - 600041\r\nTamilnadu\r\n', 'AJCPA3174G', 'CHEA09463G', '115A', '', '2014-04-30 19:45:04', '2014-04-30 19:45:04', 'active'),
(50, '', 'ARTHUR H TAYLOR', 'individual', '', '', '', '', '', '1960-01-22', '', '19, Raja Street, Kalyani Nagar\r\nKottivakkam\r\nChennai\r\nTamilnadu\r\n', 'AFEPT2870G', 'CHEA09463G', 'IT-500M', '', '2014-04-30 19:45:04', '2014-04-30 19:45:04', 'active'),
(51, '', 'ARTHUR JAWAHAR ISSAC', 'individual', '', '', '', '', '', '1950-10-12', '', '10/25, Danny Dennis Cottage, Mes Road,amar Nagar\r\nKadaperi Tambaram West\r\nChennai - 600045\r\nTamilnadu\r\n', 'AADPI7477C', 'CHEA09463G', 'S-020', '', '2014-04-30 19:45:04', '2014-04-30 19:45:04', 'active'),
(52, '', 'ARULMIGU VINAYTHEERTHA VINAYAGAR AALAYAM', 'individual', '', '', '', '', '', '1950-10-12', '', '-\r\n-\r\n-\r\n-\r\n', 'AADPI7477C', 'CHEA09463G', 'MIS105', '', '2014-04-30 19:45:04', '2014-04-30 19:45:04', 'active'),
(53, '', 'ARUN KUMAR BOSE', 'individual', '', '', '', '', '', '1952-12-22', '', 'A 1/2, Bharathi Dasan Colony\r\nK.k.nagar,\r\nChennai - 600078\r\nTamilnadu\r\n', 'AAJPA0315K', 'CHEA09463G', 'S-008', '', '2014-04-30 19:45:04', '2014-04-30 19:45:04', 'active'),
(54, '', 'ATC TOOLS PRIVATE LIMITED', 'company', '', '', '', '', '', '2000-03-30', '', '524/1, P.h.road\r\nArumbakkam\r\nChennai - 600106\r\nTamilnadu\r\n', 'AADCA3245K', 'CHEA09464A', '121', '', '2014-04-30 19:45:04', '2014-04-30 19:45:04', 'active'),
(55, '', 'AZAX BENEFIT FUND LIMITED', 'company', '', '', '', '', '', '2000-03-30', '', '-524/1, P.h.road\r\nArumbakkam\r\nChennai - 600106\r\nTamilnadu\r\n', 'AADCA3245K', 'CHEA09464A', 'A-1', '', '2014-04-30 19:45:04', '2014-04-30 19:45:04', 'active'),
(56, '', 'AZHAGUVELU KALYANA KUMAR', 'individual', '', '', '', '', '', '1978-04-10', '', '0/19, Krishna Street\r\nChrompet\r\nChennai - 600044\r\nTamilnadu\r\n', 'ASTPK5867A', 'CHEA09464A', '161', '', '2014-04-30 19:45:04', '2014-04-30 19:45:04', 'active'),
(57, '', 'B  AIYAPPAN', 'individual', '', '', '', '', '', '1966-05-31', '', 'B17,ground Floor, Ihfd Flats\r\nPallavaram\r\nChennai - 600043\r\nTamilnadu\r\n', 'AFTPA6794D', 'CHEA09464A', '397N', '', '2014-04-30 19:45:04', '2014-04-30 19:45:04', 'active'),
(58, '', 'B  BALABASKARAN', 'individual', '', '', '', '', '', '1977-05-12', '', '5, Kanchi Natrajan Street, Vasudevan Nagar\r\nJafferkhanpet\r\nChennai - 600083\r\nTamilnadu\r\n', 'AEPPB2601D', 'CHEA09464A', '174A', '', '2014-04-30 19:45:04', '2014-04-30 19:45:04', 'active'),
(59, '', 'B  CHANDRASEKAR', 'individual', '', '', '', '', '', '1978-09-17', '', 'F-5, Mahalakshmi Flats, 40,azhagar Perumal Street\r\nVadapalani\r\nChennai - 600026\r\nTamilnadu\r\n', 'AHGPC1564N', 'CHEA09464A', 'S-35', '', '2014-04-30 19:45:04', '2014-04-30 19:45:04', 'active'),
(60, '', 'B  GEETHESWARI', 'individual', '', '', '', '', '', '1969-02-16', '', '293, 38th Street\r\nFirst Floor .(g),7th Sector,k.k.nagar\r\nChennai - 600078\r\nTamilnadu\r\n', 'AJXPG8334M', 'CHEA09464A', '378', '', '2014-04-30 19:45:04', '2014-04-30 19:45:04', 'active'),
(61, '', 'B  HEMALATHA', 'individual', '', '', '', '', '', '1969-07-07', '', '4, 4th Poomagal Street\r\nEkkattuthangal\r\nChenai - 600097\r\nTamilnadu\r\n', 'ADIPH0716M', 'CHEA09464A', '228B', '', '2014-04-30 19:45:04', '2014-04-30 19:45:04', 'active'),
(62, '', 'B  KANAKASABHAMANI', 'individual', '', '', '', '', '', '1946-10-13', '', '56, Duraisamy Street\r\nVadapalani\r\nChennai - 600026\r\nTamilnadu\r\n', 'AAQPK7829P', 'CHEA09464A', 'S-025', '', '2014-04-30 19:45:04', '2014-04-30 19:45:04', 'active'),
(63, '', 'B  KESAVAMANI', 'individual', '', '', '', '', '', '1942-12-15', '', '16/25, Sanathi Street\r\nVadapalani\r\nChennai - 600026\r\nTamilnadu\r\n', 'AGDPK6128N', 'CHEA09464A', 'S-023', '', '2014-04-30 19:45:04', '2014-04-30 19:45:04', 'active'),
(64, '', 'B  MALLIGAARJUN', 'individual', '', '', '', '', '', '1986-10-08', '', '136/ 1-2a, Ceebros Symala Garden, Arcot Road\r\nSaligramam\r\nChennai - 600093\r\nTamilnadu\r\n', 'AUVPM3516A', 'CHEA09464A', '406N', '', '2014-04-30 19:45:04', '2014-04-30 19:45:04', 'active'),
(65, '', 'B  RABINSON', 'individual', '', '', '', '', '', '1967-06-15', '', '15, Atzan Avenue, Dr. Seethapathy Nagar\r\nVelachery\r\nChennai - 600042\r\nTamilnadu\r\n', 'AICPR0330A', 'CHEA09464A', 'V-122', '', '2014-04-30 19:45:04', '2014-04-30 19:45:04', 'active'),
(66, '', 'B  RAMYA', 'individual', '', '', '', '', '', '1978-05-09', '', '5/25, Sri Venkatesa Perumal Nagar, Balaji Street\r\nArumbakkam\r\nChennai - 600106\r\nTamilnadu\r\n', 'AGBPR8396K', 'CHEA09464A', '177', '', '2014-04-30 19:45:04', '2014-04-30 19:45:04', 'active'),
(67, '', 'B  SELVARAJ', 'individual', '', '', '', '', '', '1946-11-10', '', '3/2, Aishwarya Apartments, Old No.g 43 (new No.g 76)\r\nFirst Avenue, Anna Nagar East\r\nChennai - 600102\r\nTamilnadu\r\n', 'AXMPS7008P', 'CHEA09464A', '319', '', '2014-04-30 19:45:04', '2014-04-30 19:45:04', 'active'),
(68, '', 'B  VENKATRAMAN', 'individual', '', '', '', '', '', '1951-03-02', '', '33, Vaduvambal Nagar, First Main Road\r\nVelachery\r\nChennai - 600042\r\nTamilnadu\r\n', 'AAEPB5036B', 'CHEA09464A', '240', '', '2014-04-30 19:45:04', '2014-04-30 19:45:04', 'active'),
(69, '', 'B  VIJAYALAKSHMI', 'individual', '', '', '', '', '', '1978-03-03', '', 'No.5, First Street,subbarayan Nagar\r\nKodambakkam\r\nChennai - 600024\r\nTamilnadu\r\n', 'AIVPV7566P', 'CHEA09464A', '140A', '', '2014-04-30 19:45:04', '2014-04-30 19:45:04', 'active'),
(70, '', 'B.  GOWRI', 'individual', '', '', '', '', '', '1981-05-21', '', 'No.1, Ruckmaniammal Street\r\nWest.k.k.nagar\r\nChennai - 600078\r\nTamil Nadu\r\n', 'AIIPB8783H', 'CHEA09464A', '281AN', '', '2014-04-30 19:45:04', '2014-04-30 19:45:04', 'active'),
(71, '', 'B.  SARAVANAN', 'individual', '', '', '', '', '', '1971-09-13', '', '329/244, Sanmac Executive Centre, Second Floor\r\nAnnasalai\r\nChennai - 600006\r\nTamilnadu\r\n', 'ALEPS9344J', 'CHEA09464A', '389', '', '2014-04-30 19:45:04', '2014-04-30 19:45:04', 'active'),
(72, '', 'B.L.  RAVICHANDRAN', 'individual', '', '', '', '', '', '1967-07-31', '', '1080a, Rohini Flats, Munusamy Salai\r\nWest K.k.nagar\r\nChennai - 600078\r\nTamilnadu\r\n', 'ADIPR3243B', 'CHEA09464A', '367', '', '2014-04-30 19:45:04', '2014-04-30 19:45:04', 'active'),
(73, '', 'B.P.M INDUSTRIES', 'company', '', '', '', '', '', '2009-01-11', '', 'D-6, Mogappair Industrial Estate (east)\r\nMogappair\r\nChennai - 600037\r\nTamilnadu\r\n', 'AAJFB8084E', 'CHEB07552G', '204A', '', '2014-04-30 19:45:04', '2014-04-30 19:45:04', 'active'),
(74, '', 'B.V.  KUMARI', 'individual', '', '', '', '', '', '1957-02-08', '', '10, Pallavan Nagar, School Street\r\nNerkundram\r\nChennai - 600107\r\nTamilnadu\r\n', 'AICPK9206A', 'CHEB07552G', '128', '', '2014-04-30 19:45:04', '2014-04-30 19:45:04', 'active'),
(75, '', 'BAGIRATHI.N', 'individual', '', '', '', '', '', '1977-07-17', '', '5, 101th Street, 15th Sector\r\nK.k.nagar\r\nChennai - 600078\r\nTamilnadu\r\n', 'AJEPB7253M', 'CHEB07552G', 'S-018N', '', '2014-04-30 19:45:04', '2014-04-30 19:45:04', 'active'),
(76, '', 'BAKTHAVATCHALAM  MOHAN', 'individual', '', '', '', '', '', '1961-10-10', '', '18, 1st Bharathi Colony\r\nAlwarthirunagar\r\nChennai - 600087\r\nTamilnadu\r\n', 'AAIPM4834G', 'CHEB07552G', '340N', '', '2014-04-30 19:45:04', '2014-04-30 19:45:04', 'active'),
(77, '', 'BALAJI  ANDREWS', 'individual', '', '', '', '', '', '1946-12-12', '', 'New No.4/27/1 (old No.2), Bella Vista, Sunrise Avenue\r\nNeelankarai\r\nChennai - 600115\r\nTamilnadu\r\n', 'AAAPA6551G', 'CHEB07552G', '113', '', '2014-04-30 19:45:04', '2014-04-30 19:45:04', 'active'),
(78, '', 'BALAMURUGAN NALLASIVAM RAMRAJ', 'individual', '', '', '', '', '', '1960-04-13', '', '67, Hotel Green Palace, Ramasamy Street\r\nBroadway(521)\r\nChennai - 600001\r\nTamilnadu\r\n', 'AMNPB6512D', 'CHEB07552G', '402', '', '2014-04-30 19:45:04', '2014-04-30 19:45:04', 'active'),
(79, '', 'BALAND INDUSTRIES (MDS)', 'company', '', '', '', '', '', '1981-01-30', '', '2/1,velachery Main Road\r\nMedavakkam\r\nChennai - 600100\r\nTamilnadu\r\n', 'AAAFB2225L', 'CHEB07314G', '112', '', '2014-04-30 19:45:04', '2014-04-30 19:45:04', 'active'),
(80, '', 'BALAND TRADING COMPANY PRIVATE LIMITED', 'company', '', '', '', '', '', '1991-03-20', '', 'G-100, Phase-ii,ground Floor No.769, Spencer Plaza\r\nAnna Salai\r\nChennai - 600002\r\nTamilnadu\r\n', 'AABCB8070H', 'CHEB02358G', '111', '', '2014-04-30 19:45:04', '2014-04-30 19:45:04', 'active'),
(81, '', 'BALASUBRAMANIAN  ANURADHA', 'individual', '', '', '', '', '', '1974-06-17', '', 'Plot No.20, F-1, Vallal Kumanan Street, Bagirathi Nagar\r\nMadipakkam\r\nChennai - 600091\r\nTamilnadu\r\n', 'AEGPA3913E', 'CHEB02358G', 'V-104', '', '2014-04-30 19:45:04', '2014-04-30 19:45:04', 'active'),
(82, '', 'BASE AUTOMATION', 'company', '', '', '', '', '', '2005-10-20', '', '-Plot No.20, F-1, Vallal Kumanan Street, Bagirathi Nagar\r\nMadipakkam\r\nChennai - 600091\r\nTamilnadu\r\n', 'AEGPA3913E', 'CHEB02358G', '1', '', '2014-04-30 19:45:04', '2014-04-30 19:45:04', 'active'),
(83, '', 'BHAGAVATHIPERUMAL  MUDALIAR', 'individual', '', '', '', '', '', '1946-02-25', '', 'F-5, Mahalakshmi Flats, 40, Azhagar Perumal Street\r\nVadapalani\r\nChennai - 600026\r\nTamilnadu\r\n', 'AIQPM4587L', 'CHEB02358G', 'IT-451', '', '2014-04-30 19:45:04', '2014-04-30 19:45:04', 'active'),
(84, '', 'BHARATHI  ACHAR', 'individual', '', '', '', '', '', '1952-02-26', '', 'Flat No.5, ''pooja'' First Floor, No.3, K.b.dasan Road\r\nAlwarpet\r\nChennai - 600018\r\nTamilnadu\r\n', 'AABPA8413A', 'CHEB02358G', 'S-010', '', '2014-04-30 19:45:04', '2014-04-30 19:45:04', 'active'),
(85, '', 'BIJOY  NARAYAN', 'individual', '', '', '', '', '', '1974-02-20', '', 'No.6, Sudarma, T.k.pani 3rd Street, Periyar Nagar\r\nNesapakkam\r\nChennai - 600078\r\nTamilnadu\r\n', 'ABNPN5971F', 'CHEB02358G', 'MIS-102', '', '2014-04-30 19:45:04', '2014-04-30 19:45:04', 'active'),
(86, '', 'BRIGHTON  DURAIRAJ', 'individual', '', '', '', '', '', '1936-02-04', '', '4, Andavar Nagar, Third Street\r\nKodambakkam\r\nChennai - 600024\r\nTamilnadu\r\n', 'AABPD8453H', 'CHEB02358G', '132', '', '2014-04-30 19:45:04', '2014-04-30 19:45:04', 'active'),
(87, '', 'BRINDER  KAUR', 'individual', '', '', '', '', '', '1953-04-20', '', 'No.15a, Kasi Towers, Ground Flloor,mariamman Koil Street\r\nK.k.nagar\r\nChennai - 600078\r\nTamilnadu\r\n', 'AHTPB1628B', 'CHEB02358G', '109', '', '2014-04-30 19:45:04', '2014-04-30 19:45:04', 'active'),
(88, '', 'BUHARI ASRAF ABDUL RAHMAN ', 'individual', '', '', '', '', '', '1953-04-20', '', 'PRECIOUS TRADING CO\r\n', 'AACPA3838J', 'CHEB02358G', '345', '', '2014-04-30 19:45:04', '2014-04-30 19:45:04', 'active'),
(89, '', 'C  CHANDRAN', 'individual', '', '', '', '', '', '1965-03-08', '', 'F-3, First Floor, New No 68, Kamaraj Salai\r\nAnakaputhur\r\nChennai - 600070\r\nTamilnadu\r\n', 'AEUPC2423F', 'CHEB02358G', '392', '', '2014-04-30 19:45:04', '2014-04-30 19:45:04', 'active'),
(90, '', 'C  DAYALAN', 'individual', '', '', '', '', '', '1952-04-15', '', '5/317, Valliammal Nagar\r\nNerkundram\r\nChennai - 600107\r\nTamilnadu\r\n', 'AFEPD7795Q', 'CHEB02358G', '107', '', '2014-04-30 19:45:04', '2014-04-30 19:45:04', 'active'),
(91, '', 'C  FELBIN', 'individual', '', '', '', '', '', '1952-04-15', '', '-5/317, Valliammal Nagar\r\nNerkundram\r\nChennai - 600107\r\nTamilnadu\r\n', 'AAAPF2708A', 'CHEB02358G', 'IT-237A', '', '2014-04-30 19:45:04', '2014-04-30 19:45:04', 'active'),
(92, '', 'C  GURUNATHAN', 'individual', '', '', '', '', '', '1940-05-07', '', '1114, Bobli Raja Salai\r\nK.k.nagar\r\nChennai - 600078\r\nTamilnadu\r\n', 'AAOPG7244G', 'CHEB02358G', '270', '', '2014-04-30 19:45:04', '2014-04-30 19:45:04', 'active'),
(93, '', 'C  NACHUMMAI', 'individual', '', '', '', '', '', '1940-05-07', '', '16, Lakshmi Vilas, Ldg Road\r\nArogyamadha Nagar\r\nLittle Mount,chennai - 600015\r\nTamilnadu\r\n', 'AAOPG7244G', 'CHEB02358G', '247A', '', '2014-04-30 19:45:04', '2014-04-30 19:45:04', 'active'),
(94, '', 'C  PARVATHY', 'individual', '', '', '', '', '', '1955-06-14', '', '109/3, Arcot Road\r\nVadapalani\r\nChennai - 600026\r\nTamilnadu\r\n', 'ALRPP7368J', 'CHEB02358G', '239', '', '2014-04-30 19:45:04', '2014-04-30 19:45:04', 'active'),
(95, '', 'C  PRAKASH', 'individual', '', '', '', '', '', '1974-05-18', '', '893, Cotton Zone, Munuswamy Salai\r\nWest K.k.nagar\r\nChennai - 600078\r\nTamilnadu\r\n', 'AESPC7416E', 'CHEB02358G', '224N', '', '2014-04-30 19:45:04', '2014-04-30 19:45:04', 'active'),
(96, '', 'C  RAJHALAKSHMEE', 'individual', '', '', '', '', '', '1969-06-22', '', '60, Ldg Road\r\nLittle Mount\r\nChennai - 600015\r\nTamilnadu\r\n', 'AAFPR2493F', 'CHEB02358G', '246', '', '2014-04-30 19:45:04', '2014-04-30 19:45:04', 'active'),
(97, '', 'C  SATHYAMOORTHY', 'individual', '', '', '', '', '', '1974-05-03', '', '27, Flat F1, Srinivasam Flat, Seyon Street Madurai Meenatchi Nagar\r\nValasarawakkam\r\nChennai - 600087\r\nTamilnadu\r\n', 'APAPS1522E', 'CHEB02358G', '411', '', '2014-04-30 19:45:04', '2014-04-30 19:45:04', 'active'),
(98, '', 'C  SRINATH', 'individual', '', '', '', '', '', '1985-03-31', '', '27/16, Bharathi Colony Annexe\r\nAlwarthirunagar\r\nChennai - 600087\r\nTamilnadu\r\n', 'BPCPS9334H', 'CHEB02358G', '452', '', '2014-04-30 19:45:04', '2014-04-30 19:45:04', 'active'),
(99, '', 'C J RAAJASEKAR', 'individual', '', '', '', '', '', '1960-08-31', '', '17/34, Venkatesa Nagar Extn-ii, Second Main Road\r\nVirugambakkam\r\nChennai - 600092\r\nTamilnadu\r\n', 'AEMPR3306J', 'CHEB02358G', '291', '', '2014-04-30 19:45:04', '2014-04-30 19:45:04', 'active'),
(100, '', 'C K NASAR', 'individual', '', '', '', '', '', '1976-01-06', '', '17/10, Aziz Mulk, 5th Street\r\nThousand Light\r\nChennai - 600006\r\nTamilnadu\r\n', 'ADNPN8783D', 'CHEB02358G', 'IT-419', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(101, '', 'C K SUKUMARAN', 'individual', '', '', '', '', '', '1938-04-06', '', 'Flat No.1, I I Floor, Garden Apartments, 21, Pycrofts Garden Road\r\nNungambakkam\r\nChennai - 600006\r\nTamilnadu\r\n', 'AAHPS0602H', 'CHEB02358G', '265', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(102, '', 'C P VELUSAMI', 'individual', '', '', '', '', '', '1941-10-06', '', 'H-19b, Hig Flats, Kamaraj Nagar, South Avenue\r\nThiruvanmiyur\r\nChennai - 600041\r\nTamilnadu\r\n', 'ABRPV7949K', 'CHEB02358G', '194', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(103, '', 'C R DURAIRAJ', 'individual', '', '', '', '', '', '1932-07-06', '', '4, Andavar Nagar, Third Street\r\nKodambakkam\r\nChennai - 600024\r\nTamilnadu\r\n', 'AAAPC5363N', 'CHEB02358G', '131', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(104, '', 'C S SOBISH', 'individual', '', '', '', '', '', '1976-03-25', '', 'Cherkkara Thandayan  House, Ganesamangalam\r\nVatanappilly\r\nThrissur - 680614\r\nKerala\r\n', 'AQBPS2771B', 'CHEB02358G', '361', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(105, '', 'C VINOD DANNY', 'individual', '', '', '', '', '', '1976-08-08', '', 'New No.5, Vembuliamman Koil, First Street\r\nWest K.k.nagar\r\nChennai - 600078\r\nTamilnadu\r\n', 'ACKPV5995P', 'CHEB02358G', 'S-012N', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(106, '', 'C.  SEKARAN', 'individual', '', '', '', '', '', '1960-05-25', '', 'No.2a, 3rd Reddy Street\r\nEkkattuthangal\r\nChennai - 600097\r\nTamilnadu\r\n', 'ABHPS2245R', 'CHEB02358G', '119', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(107, '', 'C.  SIVARAJ', 'individual', '', '', '', '', '', '1966-05-06', '', 'Plot No.4, 5th Street, Rajarajeswari Nagar\r\nMadipakkam\r\nChennai - 600091\r\nTamilnadu\r\n', 'APJPS7662C', 'CHEB02358G', 'V-103', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(108, '', 'C.V  RAMESH', 'individual', '', '', '', '', '', '1963-04-23', '', 'G/3, Vasanth  Apartments, 14,sadasivam Street\r\nGopalapuram\r\nChennai. - 600086\r\nTamilnadu\r\n', 'AFAPR1466A', 'CHEB02358G', 'S-004', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(109, '', 'CAC', 'individual', '', '', '', '', '', '1963-04-23', '', '-G/3, Vasanth  Apartments, 14,sadasivam Street\r\nGopalapuram\r\nChennai. - 600086\r\nTamilnadu\r\n', 'AFAPR1466A', 'CHEB02358G', '401A', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(110, '', 'CAPE COIN CHITS PVT LTD', 'company', '', '', '', '', '', '1989-10-05', '', '63, East Vanniar Street\r\nWest K.k.nagar\r\nChennai - 600078\r\nTamilnadu\r\n', 'AABCC9116B', 'CHEC05824A', 'IT-106', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(111, '', 'CAROLINE S VIJAYAKUMAR', 'individual', '', '', '', '', '', '1978-05-18', '', 'New No.9, Teachers Colony\r\nMeenambakkam\r\nChennai - 600027\r\nTamilnadu\r\n', 'AFRPV5279A', 'CHEC05824A', 'MIS-125', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(112, '', 'CARPI INDIA WATER PROOFING SPECIALISTS P LTD', 'company', '', '', '', '', '', '2005-12-16', '', '4/1, Karunanidhi Street\r\nWest Mambalam\r\nChennai - 600033\r\nTamilnadu\r\n', 'AACCC8358C', 'CHEC07499C', '242AN', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(113, '', 'CARPI TECH S.A', 'company', '', '', '', '', '', '1994-10-09', '', 'Old No.27/new No.61/2, Perumalkoil Street\r\nWest Saidapet\r\nChennai - 600015\r\nTamilnadu\r\n', 'AACCC5322Q', 'CHEC05587B', '245N', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(114, '', 'CAUVERY ASSOCIATES', 'company', '', '', '', '', '', '1994-10-09', '', '-Old No.27/new No.61/2, Perumalkoil Street\r\nWest Saidapet\r\nChennai - 600015\r\nTamilnadu\r\n', 'AACCC5322Q', 'CHEC05587B', 'RCC109', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(115, '', 'CAUVERY INDUSTRIES', 'company', '', '', '', '', '', '1993-06-04', '', 'No-a12, Iii Phase, Guindy Industrial Estate\r\nGuindy\r\nChennai - 600032\r\nTamilnadu\r\n', 'AACFC3600J', 'CHEC06262E', '191', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(116, '', 'CELEXTEL ENTERPRISES PRIVATE LIMITED', 'company', '', '', '', '', '', '2002-03-28', '', 'Flat A  Block A, Prems Nest Dev Apts, 1a Thiruveeti Amman Street, Dr. Seethapathy Nagar\r\nVelachery\r\nChennai - 600042\r\nTamilnadu\r\n', 'AABCC7675B', 'CHEC04072F', 'V-108', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(117, '', 'CHENNAI ARTHROPLASTY CLUB', 'company', '', '', '', '', '', '2009-01-08', '', 'T 39 B, 8th Street\r\nAnna Nagar\r\nChennai - 600040\r\nTamilnadu\r\n', 'AAAAC7161K', 'CHEC04072F', 'A-48', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(118, '', 'CHENNAI ENGINEERS', 'company', '', '', '', '', '', '2004-12-14', '', '36, First Reddy Street\r\nEkkatuthangal\r\nChennai - 600097\r\nTamilnadu\r\n', 'AAFFC0155K', 'CHEC04072F', '210', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(119, '', 'CHENNAI GEAR INDUSTRIES', 'company', '', '', '', '', '', '2004-10-13', '', 'No.5,, Second Street.first Cross Street\r\n,ekkatuhtnagal\r\nChennai - 600 078\r\nTamilnadu\r\n', 'AAEFC9083D', 'CHEC04072F', '357N', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(120, '', 'CHENNAI HI-TECH PRIVATE LIMITED', 'company', '', '', '', '', '', '2004-10-13', '', 'Old No.55, New No.129, New Avadi Road\r\nKipauk\r\nChennai - 600010\r\nTamilnadu\r\n', 'AABCC1974N', 'CHEC04072F', 'IT-455', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(121, '', 'CITY TOWER HOTELS PRIVATE LIMITED', 'company', '', '', '', '', '', '1997-10-08', '', '148, Wall Tax Road\r\nPark Town\r\nChennai - 600002\r\nTamilnadu\r\n', 'AABCC2129G', 'CHEC04072F', '258', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(122, '', 'CM ACHARAY SHYAMKUMAR', 'individual', '', '', '', '', '', '1956-10-15', '', '2/4 12a, Sivasankaran Street, M.g.swamy Nagar\r\nVirugambakkam\r\nChennai - 600092\r\nTamilnadu\r\n', 'AELPS7048P', 'CHEC04072F', '454A', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(123, '', 'D  BIDHU KISHAN', 'individual', '', '', '', '', '', '1975-03-24', '', '1, Kalharam, Karayil House, Triprayar\r\nNattika\r\nThrissur - 680566\r\nKerala\r\n', 'AHLPB1458K', 'CHEC04072F', 'CSS-1', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(124, '', 'D  DARA', 'individual', '', '', '', '', '', '1970-03-26', '', 'Plot No.20, G1 Vallal Kumanan Street\r\nBagirathi Nagar , Madipakkam\r\nChennai - 600091\r\nTamilnadu\r\n', 'AFRPD6243E', 'CHEC04072F', 'V-105', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(125, '', 'D  GANGADHARAN', 'individual', '', '', '', '', '', '1951-05-08', '', '49-1, Bharathidasan Colony\r\nK.k.nagar\r\nChennai - 600078\r\nTamilnadu\r\n', 'AEKPG5310H', 'CHEC04072F', 'S-013', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(126, '', 'D  GOPALAKRISHNAN', 'individual', '', '', '', '', '', '1959-12-25', '', '87, Krishna Nagar, Second Street\r\nVirugambakkam\r\nChennai - 600098\r\nTamilnadu\r\n', 'ADTPG0923C', 'CHEC04072F', 'IT-148', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(127, '', 'D  KARUNAKARAN', 'individual', '', '', '', '', '', '1951-08-13', '', 'G3, Block 15.jain Abhinavan, Murugu Nagar Extn\r\nVelachery\r\nChennai - 600042\r\nTamilnadu\r\n', 'AGCPD3544L', 'CHEC04072F', 'IT-376', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(128, '', 'D  MALLIGESWARI', 'individual', '', '', '', '', '', '1952-09-17', '', '5/317, Valliammal Nagar\r\nNerkundram\r\nChennai - 600107\r\nTamilnadu\r\n', 'BBFPM3221A', 'CHEC04072F', '107B', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(129, '', 'D  PURUSHOTHAM', 'individual', '', '', '', '', '', '1967-04-14', '', '38/30, I Floor, Dr.ambedkar Street\r\nMeenambakkam\r\nChennai - 600027\r\nTamilnadu\r\n', 'AKGPP4292B', 'CHEC04072F', '225N', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(130, '', 'D  SRINIVASAN', 'individual', '', '', '', '', '', '1965-11-10', '', '9, Cholan Nagar, Vinayaga Street\r\nPattabiram\r\nChennai - 600072\r\nTamilnadu\r\n', 'AAYPS9350D', 'CHEC04072F', '102', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(131, '', 'D  SRINIVASAN', 'individual', '', '', '', '', '', '1965-10-06', '', 'New No.366/1, Vinayagapuram 3rd Cross Street\r\nChunambukulathur, Kovilambakkam\r\nChennai - 600117\r\nTamilnadu\r\n', 'BHSPS3984B', 'CHEC04072F', '382', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(132, '', 'D  USHA', 'individual', '', '', '', '', '', '1958-08-09', '', '109, N.s.k.salai\r\nVadapalani\r\nChennai - 600026\r\nTamilnadu\r\n', 'AASPU5612N', 'CHEC04072F', '342', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(133, '', 'D K KALAISELVI', 'individual', '', '', '', '', '', '1956-03-10', '', '21/11, Labour Colony\r\nGuindy\r\nChennai - 600032\r\nTamilnadu\r\n', 'CTQPK0376Q', 'CHEC04072F', '457', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(134, '', 'D K SARAVANAN', 'individual', '', '', '', '', '', '1966-09-18', '', '8, Palayakaran Street\r\nEkkattuthangal\r\nChennai - 600097\r\nTamilnadu\r\n', 'BLZPS8943R', 'CHEC04072F', '229N', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(135, '', 'D V AANANDAN', 'individual', '', '', '', '', '', '1968-04-21', '', '83/4, Achuthan Nagar, First Street, Second Cross\r\nEkkattuthangal\r\nChennai - 600097\r\nTamilnadu\r\n', 'AESPA4398H', 'CHEC04072F', '159', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(136, '', 'D.  RAJA JAYASEELAN', 'individual', '', '', '', '', '', '1957-12-31', '', 'No.4, 3rd Street,andavar Nagar\r\nKodambakkam\r\nChennai - 600024\r\nTamilnadu\r\n', 'AABPJ7892G', 'CHEC04072F', '133', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(137, '', 'D. L. SUKUMAR', 'individual', '', '', '', '', '', '1964-04-23', '', '5, V.o.c.street,kaikankuppam\r\nValsarawalkam\r\nChennai - 600078\r\nTamilnadu\r\n', 'AFAPS6922G', 'CHEC04072F', 'IT-187-N', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(138, '', 'D.M. BHAVANI', 'individual', '', '', '', '', '', '1965-03-30', '', '2, Jeewanadam Street\r\nVirugambakkam\r\nChennai - 600078\r\nTamilnadu\r\n', 'AKTPB8603P', 'CHEC04072F', '359N', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(139, '', 'DATCHAYINI  K', 'individual', '', '', '', '', '', '1951-01-13', '', 'Plot No.3, Thandavamoorthy Nagar\r\nArcot Road,valasaravakkam\r\nChennai - 600087\r\nTamilnadu\r\n', 'ARRPD7755K', 'CHEC04072F', '391A', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(140, '', 'DAULAT NISHA BEGUM', 'individual', '', '', '', '', '', '1968-01-16', '', '5, Sai Srinivasa, First Cross Street\r\nVijaya Nagar\r\nVelachery - 600042\r\nChennai\r\n', 'AGXPD2809H', 'CHEC04072F', 'V-116', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(141, '', 'DAYALAN  AMUDARAJAN', 'individual', '', '', '', '', '', '1977-06-11', '', '108, First Street\r\nValliammai Nagar,nerkundram\r\nChennai - 600107\r\nTamilnadu\r\n', 'AIIPA5356P', 'CHEC04072F', '413A', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(142, '', 'DAYALAN  GOPI', 'individual', '', '', '', '', '', '1979-09-12', '', '108, First Street\r\nValliammai Nagar,nerkundram\r\nChennai - 600107\r\nTamilnadu\r\n', 'AKQPG7120F', 'CHEC04072F', '413', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(143, '', 'DAYALAN REAL ESTATES', 'company', '', '', '', '', '', '2005-01-05', '', '5/317, Valliammai Nagar\r\nNerkundram\r\nChennai - 600107\r\nTamilnadu\r\n', 'AAGFD9356A', 'CHEC04072F', '1001', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(144, '', 'DELVAC PUMPS PRIVATE LIMITED', 'company', '', '', '', '', '', '1995-06-20', '', 'Ac-17a, Industrial Estate\r\nThirumudivakkam\r\nChennai - 600044\r\nTamilnadu\r\n', 'AAACD2308K', 'CHED02062E', '200', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(145, '', 'DEVADAS  LAKSHMANAN', 'individual', '', '', '', '', '', '1976-06-07', '', 'P.no.76, S1, Salma Tower Castle, T Block 8th Street\r\nAnna Nagar\r\nChennai - 600040\r\nTamilnadu\r\n', 'ACJPL8220G', 'CHED02062E', 'V-146', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(146, '', 'DEVE ENTERPRISES,CHENNAI.', 'individual', '', '', '', '', '', '1976-06-07', '', '5, Rajiv Street\r\nNerkundram\r\nChennai - 600102\r\nTamilnadu\r\n', 'ACJPL8220G', 'CHED02062E', '401D', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(147, '', 'DIVYA  DEVADAS', 'individual', '', '', '', '', '', '1981-12-04', '', 'P.no.76, S1, Salma Tower Castle, T Block 8th Street\r\nAnna Nagar\r\nChennai - 600040\r\nTamilnadu\r\n', 'AMUPK0856G', 'CHED02062E', 'V-145', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(148, '', 'DOROTHY  PAUL', 'individual', '', '', '', '', '', '1963-10-30', '', '4, Andavar Nagar, Third Street\r\nKodambakkam\r\nChennai - 600024\r\nTamilnadu\r\n', 'ADZPD9642F', 'CHED02062E', '135', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(149, '', 'DOSS  JOSEPH', 'individual', '', '', '', '', '', '1957-09-11', '', '14, United India Colony, Tank Street\r\nKodambakkam\r\nChennai - 600024\r\nTamilnadu\r\n', 'AAIPJ2186Q', 'CHED02062E', 'IT-318', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(150, '', 'DR A RAMNATH', 'individual', '', '', '', '', '', '1958-05-07', '', '1248, Gmd Flats, Golden Colony\r\nAnna Nagar West Extn.\r\nChennai - 600050\r\nTamilnadu\r\n', 'AAJPR4856L', 'CHED02062E', '312', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(151, '', 'DR C THIRUPATHI', 'individual', '', '', '', '', '', '1966-05-03', '', '54/5, Collectrate Colony, Third Cross Street\r\nAminjikarai\r\nChennai - 600029\r\nTamilnadu\r\n', 'ACMPT1860B', 'CHED02062E', '307', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(152, '', 'DR V SUDHARSANAN', 'individual', '', '', '', '', '', '1966-05-03', '', '-54/5, Collectrate Colony, Third Cross Street\r\nAminjikarai\r\nChennai - 600029\r\nTamilnadu\r\n', 'ACMPT1860B', 'CHED02062E', 'D-102', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(153, '', 'DR.  EZHILARASU.P', 'individual', '', '', '', '', '', '1975-01-08', '', 'Flat No.12, M.m.majestic Apartments, 15th Cross Street\r\nChrompet\r\nChennai - 600046\r\nTamilnadu\r\n', 'AAIPE0214A', 'CHED02062E', '311N', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(154, '', 'DR. MANJULADEVI  NANDAKUMAR', 'individual', '', '', '', '', '', '1956-05-23', '', '4/28, Casurina Drive, Kapaleeswarar Nagar\r\nNeelangarai\r\nChennai - 600041\r\nTamilnadu\r\n', 'ADAPN2473P', 'CHED02062E', '304', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(155, '', 'DR. NANDAKUMAR  SUNDARAM', 'individual', '', '', '', '', '', '1954-03-10', '', '4/28, Casurina Drive, Kapaleeswarar Nagar\r\nNeelangarai\r\nChennai - 600041\r\nTamilnadu\r\n', 'ADAPN2475M', 'CHED02062E', '305', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(156, '', 'DR. R.H GOVARDHAN', 'individual', '', '', '', '', '', '1953-03-08', '', 'T39b, Eighth Street\r\nAnna Nagar\r\nChennai - 600040\r\nTamilnadu\r\n', 'AALPG6618B', 'CHED02062E', '301', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(157, '', 'DR. S. VITHIAVATHI SATISH', 'individual', '', '', '', '', '', '1970-10-12', '', 'Flat  1-a, Palm Lands, 21, Lynwood Avenue\r\nMahalingapuram\r\nChennai - 600034\r\nTamilnadu\r\n', 'ABEPV9694C', 'CHED02062E', '310', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(158, '', 'DR. S.N MANOHAR', 'individual', '', '', '', '', '', '1962-06-29', '', 'A-3-e, Ceedeeyes Regal Palm Garden, No.383 , Velachery Tambaram Road\r\nVelachery\r\nChennai - 600042\r\nTamil Nadu\r\n', 'AEWPM9081R', 'CHED02062E', 'IT-180', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(159, '', 'DR. THANGA GUNAVATHI', 'individual', '', '', '', '', '', '1969-07-23', '', '54/5, Collectorate Colony, Third Cross Street\r\nAminjikarai\r\nChennai - 600029\r\nTamilnadu\r\n', 'AHUPG8867G', 'CHED02062E', '308', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(160, '', 'DR.ABDUL  SEETHAKATHI', 'individual', '', '', '', '', '', '1954-12-31', '', 'No.2, Eswara Nagar, Second Sreet\r\nKodambakkam\r\nChennai - 600024\r\nTamil Nadu\r\n', 'ALNPM7987Q', 'CHED02062E', 'IT-436', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(161, '', 'DR.ARCHANA  SUDHIR', 'individual', '', '', '', '', '', '1978-05-02', '', '4, Srinagar Colony, East Mada Street\r\nSaidapet\r\nChennai - 600015\r\nTamilnadu\r\n', 'AGXPA7821Q', 'CHED02062E', '187', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(162, '', 'DR.B  VARAPRASAD', 'individual', '', '', '', '', '', '1944-06-11', '', '656, Park View Road\r\nAnna Nagar West Extn\r\nChennai - 600101\r\nTamilnadu\r\n', 'AAFPV8448Q', 'CHED02062E', '302', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(163, '', 'DR.G  KIRUBNATH', 'individual', '', '', '', '', '', '1969-04-13', '', '13/12, Bazzar Street\r\nWest K.k.nagar\r\nChennai - 600078\r\nTamilnadu\r\n', 'AIJPK3598G', 'CHED02062E', '303N', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(164, '', 'DR.J. JASLINE DAVID SYLVESTER', 'individual', '', '', '', '', '', '1972-09-11', '', '1, Janaki Nagar, Prakasam Street\r\nValsarawakkam\r\nChennai - 600087\r\nTamilnadu\r\n', 'ADPPJ0995F', 'CHED02062E', '317N', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(165, '', 'DR.L.  SATISH', 'individual', '', '', '', '', '', '1968-07-06', '', 'Flat  1-a, Palm Lands, 21, Lynwood Avenue\r\nMahalingapuram\r\nChennai - 600034\r\nTamilnadu\r\n', 'AHYPS1616B', 'CHED02062E', '309', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(166, '', 'DR.N  RAMESWARI', 'individual', '', '', '', '', '', '1962-04-28', '', '3, Kamaraj Nagar, 8th Street\r\nThiruvanmiyur\r\nChennai - 600041\r\nTamilnadu\r\n', 'AEQPR4228F', 'CHED02062E', 'IT-156', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(167, '', 'DR.S  RAMACHANDRAN', 'individual', '', '', '', '', '', '1942-04-30', '', '1535, S.m.narayana Nagar,near Collector Nagar\r\nAnna Nagar West\r\nChennai - 600101\r\nTamilnadu\r\n', 'ADVPR8504J', 'CHED02062E', '306', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(168, '', 'DREAMS POWER EQUIPMENTS INDIA PRIVATE LIMITED', 'company', '', '', '', '', '', '2005-12-30', '', 'D.no.3-93,8f, No.5, Hmt Nagar\r\nHabsiguda\r\nHyderabad - 500007\r\nAndhra Pradesh\r\n', 'AACCD3002G', 'CHED02062E', 'IT-498N', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(169, '', 'E  ARULPIRAKASAM', 'individual', '', '', '', '', '', '1948-09-08', '', '1, Bharani Colony, Diwakar Street\r\nSaligramam\r\nChennai - 600093\r\nTamilnadu\r\n', 'AAAPP7758A', 'CHED02062E', 'S-007', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(170, '', 'E  NIRANJANI', 'individual', '', '', '', '', '', '1988-08-08', '', '1076, Tvs Colony 48th Street\r\nAnnanagar West Extn\r\nChennai - 600101\r\nTamilnadu\r\n', 'ALEPN1707E', 'CHED02062E', 'H007', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(171, '', 'E  SAROJA', 'individual', '', '', '', '', '', '1958-06-15', '', 'Flat No.c3, Plot No.35, First Cross Street, Ii Main Road\r\nLogaiah Colony,saligramam\r\nChennai - 600093\r\nTamilnadu\r\n', 'AOIPS1413H', 'CHED02062E', 'IT-395', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(172, '', 'E  SEKAR', 'individual', '', '', '', '', '', '1957-04-15', '', '35, Avvaiyar Street\r\nEkkatuthangal\r\nChennai - 600032\r\nTamilnadu\r\n', 'AALPS2893Q', 'CHED02062E', '396-N', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(173, '', 'E  VADIVELU', 'individual', '', '', '', '', '', '1965-06-26', '', '36, Ist Reddy Street\r\nEkkatuthangal\r\nChennai - 600097\r\nTamilnadu\r\n', 'AAGPV0478B', 'CHED02062E', '209', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(174, '', 'E P VETRISELVI', 'individual', '', '', '', '', '', '1965-05-07', '', '17/34-a/2, Venkatesa Nagar Extn-ii, Second Main Road\r\nVirugambakkam\r\nChennai - 600092\r\nTamilnadu\r\n', 'ABHPV9421G', 'CHED02062E', '292', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(175, '', 'E.  ANBUJOTHI', 'individual', '', '', '', '', '', '1981-05-23', '', '68/a/3, Manickam Apartments, East Vanniar Street\r\nK.k.nagar West\r\nChennai - 600 078\r\nTamilnadu\r\n', 'AIGPA2099D', 'CHED02062E', '358N', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(176, '', 'E.  JAGANATHAN', 'individual', '', '', '', '', '', '1969-03-29', '', 'No.1/6a, 1 St Reddy Street\r\nEkkattuthangal\r\nChennai - 600097\r\nTamilnadu\r\n', 'AHLPJ0024F', 'CHED02062E', '249N', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(177, '', 'E.S.  SANKARAN', 'individual', '', '', '', '', '', '1951-06-12', '', '10/4, Menaka Flats P Block, 19th Street,6th Aveenue\r\nAnnanagar East\r\nChennai - 600102\r\nTamilnadu\r\n', 'ASXPS1954L', 'CHED02062E', 'IT-315', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(178, '', 'ELAMURUGU  LAKHUVAN', 'individual', '', '', '', '', '', '1975-09-09', '', 'A-3,, Thirumagal Gardens, Santhi I Cross Street\r\nDr. Seethapathy Nagar,\r\nChennai - 600042\r\nTamil Nadu\r\n', 'AOZPK0611A', 'CHED02062E', 'V-111', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(179, '', 'ELMARAN,N ASST/LIB/STMT', 'individual', '', '', '', '', '', '1975-09-09', '', '-A-3,, Thirumagal Gardens, Santhi I Cross Street\r\nDr. Seethapathy Nagar,\r\nChennai - 600042\r\nTamil Nadu\r\n', 'AADPE8762E', 'CHED02062E', '253A', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(180, '', 'EMILIAS  SAHAYARAJ', 'individual', '', '', '', '', '', '1967-06-02', '', 'G3, Suvasini Apartment, 31, South Street, Radha Nagar\r\nChrompet\r\nChennai - 600044\r\nTamilnadu\r\n', 'BMLPS9927G', 'CHED02062E', 'MIS-110', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(181, '', 'ESCROWTECH INDIA PRIVATE LIMITED', 'company', '', '', '', '', '', '2005-10-03', '', '148-150, Creative Enclave, Iii Floor, Luz Church Road\r\nMylapore\r\nChennai - 600004\r\nTamilnadu\r\n', 'AABCE4182H', 'CHEE03655B', '189N', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(182, '', 'EVELYINE  DIVYA', 'individual', '', '', '', '', '', '1976-04-10', '', 'New No.9, Teachers Colony\r\nMeenambakkam\r\nChennai - 600027\r\nTamilnadu\r\n', 'AASPE1308F', 'CHEE03655B', 'MIS-126', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(183, '', 'F ZULFIKHAR AHAMED', 'individual', '', '', '', '', '', '1962-02-15', '', '4/206, E Type, Sidco Nagar\r\nVillivakkam\r\nChennai - 600049\r\nTamilnadu\r\n', 'AAJPF8390D', 'CHEE03655B', 'S-022N', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(184, '', 'FINE COMPONENTSS', 'individual', '', '', '', '', '', '1962-02-15', '', '-4/206, E Type, Sidco Nagar\r\nVillivakkam\r\nChennai - 600049\r\nTamilnadu\r\n', 'AAJPF8390D', 'CHEE03655B', 'M102', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(185, '', 'G  BALAJI', 'individual', '', '', '', '', '', '1982-04-13', '', '157, Nadaipathai Street\r\nKundrathur\r\nChennai - 600069\r\nTamilnadu\r\n', 'ARNPB8270F', 'CHEE03655B', '381N', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(186, '', 'G  HARI', 'individual', '', '', '', '', '', '1966-06-07', '', '44/29, Dr,ghanu Nagar, 4th Anna Street\r\nNesapakkam\r\nChennai - 600 078\r\nTamilnadu\r\n', 'ABMPH1881R', 'CHEE03655B', '321', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active');
INSERT INTO `clients` (`id`, `title`, `full_name`, `client_type`, `phone_mobile`, `phone_home`, `phone_office`, `phone_mobile2`, `phone_office2`, `dob`, `email`, `address`, `pan`, `tan`, `genius_id`, `file_id`, `create_date`, `update_date`, `status`) VALUES
(187, '', 'G  JAMUNA', 'individual', '', '', '', '', '', '1960-12-12', '', '114/77, East Vannier Street\r\nK.k.nagar West\r\nChennai - 600078\r\nTamilnadu\r\n', 'AGZPJ2903Q', 'CHEE03655B', '372A', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(188, '', 'G  MAHENDRAN', 'individual', '', '', '', '', '', '1984-06-05', '', '25, Nagappan Street Rajiv Gandhi 1st Street\r\nNesapakkam\r\nChennai - 600078\r\nTamilnadu\r\n', 'BCNPM3221P', 'CHEE03655B', '390', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(189, '', 'G  MALLEESWARI', 'individual', '', '', '', '', '', '1953-03-11', '', '31, Mangammal Lane\r\nSeven Wells\r\nChennai - 600001\r\nTamilnadu\r\n', 'AHLPM6351L', 'CHEE03655B', 'S-030', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(190, '', 'G  MOHAN', 'individual', '', '', '', '', '', '1948-12-22', '', 'Old No.31, Mangammal Lane\r\nSeven Wells\r\nChennai - 600001\r\nTamilnadu\r\n', 'AGMPM4819R', 'CHEE03655B', 'S-029', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(191, '', 'G  PONMURALI', 'individual', '', '', '', '', '', '1975-08-05', '', '2/2, Ganga Nagar\r\nMadhuravoyal\r\nChennai - 602102\r\nTamilnadu\r\n', 'AGMPM4819R', 'CHEE03655B', 'IT-151', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(192, '', 'G  PRABHAKAR', 'individual', '', '', '', '', '', '1969-06-25', '', '1/2, Valliswaran Koil Street\r\nMylapore\r\nChennai - 600004\r\nTamilnadu\r\n', 'AGEPP1394C', 'CHEE03655B', '362', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(193, '', 'G  RADHAKRISHNAN', 'individual', '', '', '', '', '', '1940-08-25', '', 'Z-95, Fiith Avenue\r\nAnna Nagar\r\nChennai - 600040\r\nTamilnadu\r\n', 'AAHPR9326B', 'CHEE03655B', '266', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(194, '', 'G  RAJALAKSHMI', 'individual', '', '', '', '', '', '1967-04-25', '', '26a, Valmiki Street Extn\r\nGandhi Nagar Saligramam\r\nChennai - 600093\r\nTamilnadu\r\n', 'AHGPR2930K', 'CHEE03655B', '451', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(195, '', 'G  RAMAKRISHNAN', 'individual', '', '', '', '', '', '1945-04-03', '', 'Old No.4, New No.8, Poomagal 4th Street\r\nEkkattuthangal\r\nChennai - 600097\r\nTamilnadu\r\n', 'AEGPR8200P', 'CHEE03655B', '228', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(196, '', 'G  SRINIVASAN', 'individual', '', '', '', '', '', '1971-05-24', '', '1114, Bobli Raja Salai\r\nK.k.nagar\r\nChennai - 600078\r\nTamilnadu\r\n', 'AMAPS7413H', 'CHEE03655B', '269', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(197, '', 'G  UMA', 'individual', '', '', '', '', '', '1975-10-08', '', 'B23, Panna Oasis, 35/36,n.k.amman Koil Street\r\nMylapore\r\nChennai - 600024\r\nTamilnadu\r\n', 'AAJPU5276D', 'CHEE03655B', 'IT-142', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(198, '', 'G  VIJAYA', 'individual', '', '', '', '', '', '1970-05-14', '', '15, Anna Iiird Cross Street,srinivasa Nagar\r\nPadi\r\nChennai - 600050\r\nTamilnadu\r\n', 'ACZPV5707A', 'CHEE03655B', '273', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(199, '', 'G J BABU', 'individual', '', '', '', '', '', '1982-10-05', '', '8, H Block, Jeevanandam Salai\r\nK K Nagar\r\nChennai - 600078\r\nTamilnadu\r\n', 'AFQPJ5788R', 'CHEE03655B', '418', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(200, '', 'G RANI RANGANATHAN', 'individual', '', '', '', '', '', '1957-09-15', '', '34a, Chelaiamman Koil Street\r\nNerkundam\r\nChennai - 600107\r\nTamilnadu\r\n', 'AAIPR7925D', 'CHEE03655B', '127', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(201, '', 'G S ASWINKUMAR', 'individual', '', '', '', '', '', '1986-03-13', '', 'Old No 106, New No. 66, R E Apartment, Flat No 17, A.p.road\r\nChoolai\r\nChennai - 600112\r\nTamilnadu\r\n', 'AJTPA8005H', 'CHEE03655B', '353B', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(202, '', 'G.  BAGYALAKSHMI', 'individual', '', '', '', '', '', '1982-05-30', '', 'No.77, Opp, To Devi Academy School, Ekkatahmman Koil Street\r\nValsarawalkam\r\nChennai - 600087\r\nTamilnadu\r\n', 'AJSPB5158M', 'CHEE03655B', '154A', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(203, '', 'G.V. CREATIONS', 'company', '', '', '', '', '', '2008-02-15', '', 'Plot No.20, G1 Vallal Kumanan Street\r\nBagirathi Nagar ,madipakkam\r\nChennai - 600091\r\nTamilnadu\r\n', 'AAIFG2493D', 'CHEE03655B', 'V-134', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(204, '', 'G.VE ENGINEERING', 'company', '', '', '', '', '', '2008-02-15', '', '-Plot No.20, G1 Vallal Kumanan Street\r\nBagirathi Nagar ,madipakkam\r\nChennai - 600091\r\nTamilnadu\r\n', 'AAIFG2493D', 'CHEE03655B', 'RCC-004', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(205, '', 'GA.  CHOCKALINGAM', 'individual', '', '', '', '', '', '1965-12-15', '', '16, Lakshmi Vilas, Ldg Road\r\nArogyamadha Nagar\r\nLittle Mount,chennai - 600015\r\nTamilnadu\r\n', 'AAEPC2803R', 'CHEE03655B', '247', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(206, '', 'GANESAN  RENGASAMY', 'individual', '', '', '', '', '', '1947-03-05', '', 'B 45, First Cross Street\r\nKurinji Nagar, Ramapuram\r\nChennai - 600089\r\nTamilnadu\r\n', 'AAGPG9845F', 'CHEE03655B', 'S-034', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(207, '', 'GAUTHAM CAPS  AND PACKAGINGS', 'company', '', '', '', '', '', '2010-05-14', '', '2, Palayakaran Street\r\nEkkattuthangal\r\nChennai - 600032\r\nTamilnadu\r\n', 'AAJFG2363B', 'CHEE03655B', '369', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(208, '', 'GEETHA  VASANTH', 'individual', '', '', '', '', '', '1973-01-15', '', '57, Ishwaryam, B.r.puram Layout, Rajiv Gandhi Nagar Phase -1\r\nSowripalayam\r\nCoimbatore - 641028\r\nTamilnadu\r\n', 'ACYPV9336L', 'CHEE03655B', 'V-139', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(209, '', 'GLOBAL BUSINESS SOLUTIONS', 'company', '', '', '', '', '', '2003-02-15', '', '148-150, Creative Enclave Iii Floor, Luz Church Road\r\nMylapore\r\nChennai - 600004\r\nTamilnadu\r\n', 'AAEFG6424C', 'CHEG06661E', '186', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(210, '', 'GLOBAL CARBONS TECH', 'company', '', '', '', '', '', '2006-10-05', '', 'Sf254/1b, Chikkanapuram Village, Dhalavoipattinam Post\r\nDharapuram Taluk\r\nThiruppur District - 638672\r\nTamilnadu\r\n', 'AAHFG6726E', 'CHEG06661E', 'V-143', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(211, '', 'GONA SAMUEL SUDHAKAR', 'individual', '', '', '', '', '', '1958-10-03', '', '12\r\nHirapur\r\nGulbarg - 585103\r\nKarnataka\r\n', 'AHQPS5269N', 'CHEG06661E', '454C', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(212, '', 'GOPALAKRISHNAN AND ANANDAN JOINT A/C', 'individual', '', '', '', '', '', '1958-10-03', '', '-12\r\nHirapur\r\nGulbarg - 585103\r\nKarnataka\r\n', 'AHQPS5269N', 'CHEG06661E', '459J', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(213, '', 'GOPALSWAMY  UMASEKARAN', 'individual', '', '', '', '', '', '1948-03-27', '', '4/17, Shobana Apts, 3rd Floor Bishop Wallers Avenue West Cit Colony\r\nMylapore\r\nChennai - 600004\r\nTamilnadu\r\n', 'AAJPU0256H', 'CHEG06661E', 'IT-121', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(214, '', 'GOPINATH', 'individual', '', '', '', '', '', '1962-03-06', '', '48b, Sarangarajkumari Street, Nehru Nagar\r\nChromepet\r\nChennai - 600044\r\nTamilnadu\r\n', 'AGIPG2854Q', 'CHEG06661E', '461', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(215, '', 'GOVINDAN  ELUMALAI', 'individual', '', '', '', '', '', '1968-05-30', '', '10/64, Velachery Main Road, Muvaenthar Street\r\nMedavakkam\r\nChennai - 600100\r\nTamilnadu\r\n', 'ABJPE0502F', 'CHEG06661E', '190', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(216, '', 'GURUSAMY  THIRUNAVUKKARASU', 'individual', '', '', '', '', '', '1980-10-06', '', '41a, Devi Karumari Amman Nagar, 1st Street\r\nVijayanagar, Velachery\r\nChennai - 600042\r\nTamilnadu\r\n', 'ASOPG6693F', 'CHEG06661E', 'V-153M', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(217, '', 'H  ANNIE', 'individual', '', '', '', '', '', '1968-08-12', '', '777, Munusamy Salai\r\nWest K K Nagar\r\nChennai - 600078\r\nTamilnadu\r\n', 'AJJPA3873B', 'CHEG06661E', '160A', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(218, '', 'HELEN  BALAJI', 'individual', '', '', '', '', '', '1951-01-23', '', 'New No.4/27/1 (old No.2), Bella Vista, Sunrise Avenue\r\nNeelankarai\r\nChennai - 600115\r\nTamilnadu\r\n', 'AAGPB7215G', 'CHEG06661E', '114', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(219, '', 'HELIOS INDIA PVT LTD', 'individual', '', '', '', '', '', '1951-01-23', '', '-New No.4/27/1 (old No.2), Bella Vista, Sunrise Avenue\r\nNeelankarai\r\nChennai - 600115\r\nTamilnadu\r\n', 'AAGPB7215G', 'CHEG06661E', '400', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(220, '', 'HEMRAJ HUF', 'company', '', '', '', '', '', '1996-03-21', '', 'No.5, V.p.koil Street, Kumaran Colony\r\nVadapalani\r\nChennai - 600026\r\nTamilnadu\r\n', 'AAAHH2541F', 'CHEG06661E', '278', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(221, '', 'I  HAJA MOHIDEEN', 'individual', '', '', '', '', '', '1949-01-05', '', '28, Giri Street\r\nWest Mambalam\r\nChennai - 600033\r\nTamilnadu\r\n', 'AAZPH0981Q', 'CHEG06661E', 'S-019', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(222, '', 'I M ZAKIR', 'individual', '', '', '', '', '', '1968-01-15', '', 'Plot.51, Baby Nagar, Voc First Street\r\nVelachery\r\nChennai - 600042\r\nTamilnadu\r\n', 'AACPZ7029C', 'CHEG06661E', '105', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(223, '', 'IE-TECH METALWARE INDIA PRIVATE LIMITED', 'company', '', '', '', '', '', '2003-11-28', '', '21-h, Sidco Industrial Estate\r\nAmbattur\r\nChennai - 600098\r\nTamilnadu\r\n', 'AABCI2122H', 'CHEI06028B', '352N', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(224, '', 'INSTRUMENTATION AND SCIENTIFIC INSTRUMENTS PRIVATE', 'company', '', '', '', '', '', '2011-10-20', '', '19/10, Kalaivani Street\r\nKeelkattalai\r\nChennai - 600117\r\nTamilnadu\r\n', 'AACCI7370Q', 'CHEI06028B', '421', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(225, '', 'J  BALASUBRAMANIAN', 'individual', '', '', '', '', '', '1942-10-13', '', 'No.5, Annaji Nagar, First Cross Street\r\nK.k.nagar West\r\nChennai - 600078\r\nTamilnadu\r\n', 'AEBPB5773J', 'CHEI06028B', '383', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(226, '', 'J  BOLAN', 'individual', '', '', '', '', '', '1948-01-28', '', 'M-45b, S.v.lingam Salai\r\nK.k.nagar\r\nChennai - 600078\r\nTamilnadu\r\n', 'AAKPB9144N', 'CHEI06028B', 'S-009', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(227, '', 'J  DILLIBABU', 'individual', '', '', '', '', '', '1972-04-02', '', '9, 5th Cross Street\r\nKovalan Nagar, Pallikaranai\r\nChennai - 601302\r\nTamilnadu\r\n', 'AJWPD4812A', 'CHEI06028B', 'V-123', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(228, '', 'J  LAVANYHA', 'individual', '', '', '', '', '', '1982-03-17', '', '-9, 5th Cross Street\r\nKovalan Nagar, Pallikaranai\r\nChennai - 601302\r\nTamilnadu\r\n', 'AJWPD4812A', 'CHEI06028B', 'H008', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(229, '', 'J  MALLESWARI', 'individual', '', '', '', '', '', '1954-04-03', '', '893, Munusamy Salai\r\nWest.k.k.nagar\r\nChennai - 600078\r\nTamilnadu\r\n', 'AFMPM1759D', 'CHEI06028B', 'S-003', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(230, '', 'J  NARESH', 'individual', '', '', '', '', '', '1963-07-04', '', '18/4, Jawahar Street Extn.\r\nK.k.nagar West\r\nChennai - 600078\r\nTamilnadu\r\n', 'AEGPN4774C', 'CHEI06028B', '288', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(231, '', 'J  PONRATHI', 'individual', '', '', '', '', '', '1958-12-02', '', '2, Anbu Nagar\r\nPallavaram(t) Keelkatalai\r\nChennai - 600117\r\nTamilnadu\r\n', 'AEGPN4774C', 'CHEI06028B', 'IT-174', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(232, '', 'J  PUSHPARAMAN', 'individual', '', '', '', '', '', '1954-05-27', '', '49, North Street\r\nPinji Village\r\nVellore - 632403\r\nTamilnadu\r\n', 'AADPP2118F', 'CHEI06028B', 'V-151', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(233, '', 'J  SAMUEL THANGARAJ', 'individual', '', '', '', '', '', '1974-12-08', '', '17d, First Cross Street,, Vijaya Nagar\r\nVelachery,\r\nChennai, - 600042\r\nTamil Nadu\r\n', 'AUZPS6453L', 'CHEI06028B', 'V-102', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(234, '', 'J  SHEEBA RANI', 'individual', '', '', '', '', '', '1974-12-08', '', '-17d, First Cross Street,, Vijaya Nagar\r\nVelachery,\r\nChennai, - 600042\r\nTamil Nadu\r\n', 'BCQPS2895J', 'CHEI06028B', '213N', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(235, '', 'J  VIJAYAGAPPAN', 'individual', '', '', '', '', '', '1964-02-07', '', 'B-1-41, Tnhb, 23rd Street\r\nVelachery\r\nChennai - 600042\r\nTamilnadu\r\n', 'AEYPV0350C', 'CHEI06028B', 'V-121', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(236, '', 'J NANHI RAO', 'individual', '', '', '', '', '', '1970-01-08', '', '6/11, Manju Apartments, Thiruvalluvar Stret\r\nK.k.nagar\r\nChennai - 600078\r\nTamilnadu\r\n', 'AFGPJ3116F', 'CHEI06028B', 'S-038', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(237, '', 'J.  LAKSHMIKANTHAN', 'individual', '', '', '', '', '', '1958-10-29', '', '6a, Karthikeyan Nagar, Meenakshi Street\r\nMaduravoyal\r\nChennai - 602102\r\nTamilnadu\r\n', 'AAAPL6377M', 'CHEI06028B', '124', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(238, '', 'JOSEPH  CHELLADURAI', 'individual', '', '', '', '', '', '1935-10-13', '', 'Plot 19, Officers Colony, 4th Main Road\r\nAdambakkam\r\nChennai - 600088\r\nTamilnadu\r\n', 'AAGPC7068N', 'CHEI06028B', '280', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(239, '', 'K  ARCHANA', 'individual', '', '', '', '', '', '1986-10-02', '', '14/2, Akshaya Apartments, V P Arnachalam Street\r\nNesapakkam\r\nChennai - 600078\r\nTamilnadu\r\n', 'AWNPA6303R', 'CHEI06028B', '417', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(240, '', 'K  ARUMUGAM', 'individual', '', '', '', '', '', '1959-07-08', '', '11, Jeevanandham Street\r\nNehru Nagar, Velachery\r\nChennai - 600042\r\nTamilnadu\r\n', 'AINPA4613L', 'CHEI06028B', 'V-124', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(241, '', 'K  ARUMUGAM', 'individual', '', '', '', '', '', '1976-02-07', '', '5/7, Balaji Avenue\r\nVadapalani\r\nChennai - 600026\r\nTamilnadu\r\n', 'AJHPA2265M', 'CHEI06028B', '453', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(242, '', 'K  HARISH KUMAR', 'individual', '', '', '', '', '', '1966-07-13', '', '777, Munusamy Salai\r\nK.k.nagar West\r\nChennai - 600078\r\nTamilnadu\r\n', 'ABAPH2627P', 'CHEI06028B', '160', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(243, '', 'K  HEMA', 'individual', '', '', '', '', '', '1952-02-28', '', '33, Grond Floor, Josier Street\r\nNungambakkam\r\nChennai - 600034\r\nTamilnadu\r\n', 'AABPH6883P', 'CHEI06028B', '279', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(244, '', 'K  LATHA', 'individual', '', '', '', '', '', '1979-06-12', '', '23/14, Murugesan Street\r\nWest K.k.nagar\r\nChennai - 600078\r\nTamilnadu\r\n', 'ADAPL0608G', 'CHEI06028B', '408D', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(245, '', 'K  MALATHY', 'individual', '', '', '', '', '', '1972-04-23', '', '84, Ii Main Road\r\nAlwarthirunagar Annexe\r\nChennai - 600087\r\nTamilnadu\r\n', 'AKSPM6701C', 'CHEI06028B', '283', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(246, '', 'K  MANI', 'individual', '', '', '', '', '', '1972-04-23', '', '86, Suryanarayan Road\r\nRoyapuram\r\nChennai - 600013\r\nTamilnadu\r\n', 'AGZPM2286R', 'CHEI06028B', 'MIS-119', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(247, '', 'K  NATESH', 'individual', '', '', '', '', '', '1976-05-26', '', '6, Seva Nagar, Ii Street\r\nVelachery\r\nChennai - 600042\r\nTamilnadu\r\n', 'ACSPN4938N', 'CHEI06028B', 'IT-208A', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(248, '', 'K  NIRMALA', 'individual', '', '', '', '', '', '1978-07-16', '', '9, Mkb Nagar, Second Cross Street\r\nVysarpadi\r\nChennai - 600039\r\nTamilnadu\r\n', 'ACFPN3097H', 'CHEI06028B', 'IT-139', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(249, '', 'K  RAJESH', 'individual', '', '', '', '', '', '1975-03-13', '', '30/19, Natesh Street\r\nT.nagar\r\nChennai - 600017\r\nTamilnadu\r\n', 'AGVPR7542L', 'CHEI06028B', '293', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(250, '', 'K  RAVI', 'individual', '', '', '', '', '', '1955-08-30', '', '52, South Sivan Koil Street\r\nVadapalani\r\nChennai - 600026\r\nTamilnadu\r\n', 'ACZPR1413M', 'CHEI06028B', '226', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(251, '', 'K  RENUKADEVI', 'individual', '', '', '', '', '', '1977-06-16', '', '11, Annai Sathya Nagar, First Street\r\nRama[puram\r\nChennai - 600089\r\nTamilnadu\r\n', 'APAPJ7823B', 'CHEI06028B', '364A', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(252, '', 'K  SARVAR', 'individual', '', '', '', '', '', '1968-12-10', '', '12/160, Mmda Colony, Dr.j.j.nagar\r\nMogappair\r\nChennai - 600050\r\nTamilnadu\r\n', 'AWHPS0829G', 'CHEI06028B', '335', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(253, '', 'K  SHEELA', 'individual', '', '', '', '', '', '1963-01-20', '', '29/70, Valluvar Street\r\nKrishnamoorthy Nagar\r\nChennai - 600118\r\nTamilnadu\r\n', 'ASHPS2981D', 'CHEI06028B', 'IT-308', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(254, '', 'K  SIVABALAN', 'individual', '', '', '', '', '', '1975-05-09', '', '15/4, Golden Avenue Main Road\r\nKeelkattalai\r\nChennai - 600117\r\nTamilnadu\r\n', 'BGAPS7241C', 'CHEI06028B', '143N', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(255, '', 'K  THANKAM', 'individual', '', '', '', '', '', '1952-08-30', '', 'Plot No.dp-34(sp), Industrial Estate\r\nGuindy\r\nChennai - 600032\r\nTamilnadu\r\n', 'ABTPT4742L', 'CHEI06028B', '184', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(256, '', 'K  THEVI', 'individual', '', '', '', '', '', '1960-12-11', '', '32, Dinakaran I St Street\r\nT.nagar\r\nChennai - 600017\r\nTamilnadu\r\n', 'ADCPT6039J', 'CHEI06028B', 'IT-392', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(257, '', 'K  VASANTHA', 'individual', '', '', '', '', '', '1948-05-07', '', '14, Muniraj Illam, Ii Main Road, Govindaraj Nagar\r\nPorur\r\nChenai - 600116\r\nTamilnadu\r\n', 'AAAPV4166E', 'CHEI06028B', 'GB-01', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(258, '', 'K  VIJAYAN', 'individual', '', '', '', '', '', '1964-02-06', '', '18/p1, Appusali Street\r\nSaligramam\r\nChennai - 600093\r\nTamilnadu\r\n', 'ABWPV7219H', 'CHEI06028B', '298', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(259, '', 'K  VINOD KANNAN', 'individual', '', '', '', '', '', '1977-07-13', '', '229, Labour Colony\r\nGuindy\r\nChennai - 600032\r\nTamilnadu\r\n', 'APEPV9579C', 'CHEI06028B', '211A', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(260, '', 'K K RAMACHANDRAN', 'individual', '', '', '', '', '', '1951-03-25', '', 'No.07, ''aiswarya Lakshmi'', Jeevanandham Road\r\nWest.k.knagar\r\nChennai - 600078\r\nTamilnadu\r\n', 'AAKPR4123P', 'CHEI06028B', '331', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(261, '', 'K N SIVAKUMAR', 'individual', '', '', '', '', '', '1977-06-18', '', 'G-4, Shivish Apartments, 204, Fifth Main Road\r\nSadasiva Nagar, Madipakkam\r\nChennai - 600091\r\nTamilnadu\r\n', 'AVHPS4353A', 'CHEI06028B', '208', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(262, '', 'K P MANOHARAN', 'individual', '', '', '', '', '', '1966-05-21', '', '11/6, Gangaiamman Colony\r\nVadapalani\r\nChennai - 600026\r\nTamilnadu\r\n', 'AMPPM2491Q', 'CHEI06028B', '399', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(263, '', 'K R KANNAN', 'individual', '', '', '', '', '', '1979-05-26', '', 'No 33/887, Grace Enclave, Ground Floor, Munusamy Salai\r\nWest.k.k.nagar\r\nChennai - 600078\r\nTamilnadu\r\n', 'AVMPK3261G', 'CHEI06028B', 'M104', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(264, '', 'K R SHANMUGAM', 'individual', '', '', '', '', '', '1976-09-14', '', '-No 33/887, Grace Enclave, Ground Floor, Munusamy Salai\r\nWest.k.k.nagar\r\nChennai - 600078\r\nTamilnadu\r\n', 'AYHPS0768A', 'CHEI06028B', 'MIS-120', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(265, '', 'K R SUBRAMANIAN', 'individual', '', '', '', '', '', '1951-05-27', '', '6e/69, Jains Swarna Kamal Apartments, N.s.ksalai\r\nSaligramam\r\nChennai - 600093\r\nTamilnadu\r\n', 'AAWPS3913N', 'CHEI06028B', '405N', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(266, '', 'K R THIRUPARASUNDARI', 'individual', '', '', '', '', '', '1955-02-24', '', 'Plot No 1045, Flat No 2, 73rd Street 12th Sector\r\nK K Nagar\r\nChennai - 600078\r\nTamilnadu\r\n', 'ADDPT5677L', 'CHEI06028B', '456', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(267, '', 'K S BALAJI', 'individual', '', '', '', '', '', '1977-03-31', '', '10, Kannagi Street\r\nMadipakkam\r\nChennai - 600091\r\nTamilnadu\r\n', 'AIQPB8228B', 'CHEI06028B', 'IT-429', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(268, '', 'K S SURESHBABU', 'individual', '', '', '', '', '', '1959-04-20', '', 'Karattuparambil\r\nThrissur\r\nThrissur - 680704\r\nKerala\r\n', 'CLHPS3294L', 'CHEI06028B', 'A-28A', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(269, '', 'K.  MURUGANANDAM', 'individual', '', '', '', '', '', '1962-12-04', '', 'No 15/g1, Sai Oks, 19th Street\r\nTnasi Nagar Velachery\r\nChennai - 600042\r\nTamilnadu\r\n', 'AHBPM7713Q', 'CHEI06028B', 'S-001', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(270, '', 'K.  RAMESH', 'individual', '', '', '', '', '', '1962-06-05', '', 'No.23/b, P.t.rajan Road\r\nK.k.nagar\r\nChennai - 600078\r\nTamilnadu\r\n', 'AABPR9563L', 'CHEI06028B', 'S-006', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(271, '', 'KAMALA  RAMSHANKER', 'individual', '', '', '', '', '', '1945-06-28', '', 'Flat No.402, Hazel Building, Rose Wood H, Plot No.270, Sector.10, Kharghar\r\nKharghar\r\nNav Mumbai - 410210\r\nMaharashtra\r\n', 'AKBPK5100C', 'CHEI06028B', 'IT-153', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(272, '', 'KAMARAJ  A', 'individual', '', '', '', '', '', '1976-03-06', '', '110, Raja Street, Dr. Seethapathy Nagar\r\nVelachery\r\nChennai - 600042\r\nTamilnadu\r\n', 'AHHPA3898G', 'CHEI06028B', 'V-133', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(273, '', 'KAMATHCHI AMMAN TRAVELS', 'individual', '', '', '', '', '', '1967-04-27', '', '11, Annai Sathya Nagar, 1st Street\r\nRamapuram\r\nChennai - 600089\r\nTamilnadu\r\n', 'ADQPJ2901A', 'CHEI06028B', '364B', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(274, '', 'KANAMMA  GANESH BABU', 'individual', '', '', '', '', '', '1954-08-06', '', '2002, I Block, 42nd Lane\r\nAnna Nagar East\r\nChennai - 600040\r\nTamilnadu\r\n', 'ADOPB9105C', 'CHEI06028B', 'S-024', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(275, '', 'KANCHANA  GEETHA', 'individual', '', '', '', '', '', '1965-05-30', '', 'No.18, Ambal Nagar, Thiruvalluvar Street\r\nEkkattuthangal\r\nChennai - 600097\r\nTamilnadu\r\n', 'AAOPK0746P', 'CHEI06028B', '193', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(276, '', 'KARWARE IMPEX PRIVATE LIMITED', 'company', '', '', '', '', '', '2002-03-07', '', '55/129, New Avadi Road\r\nKilpauk\r\nChennai - 600010\r\nTamilnadu\r\n', 'AAOPK0746P', 'CHEI06028B', '351N', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(277, '', 'KAVIA CARBONS (CHENNAI) PVT LTD.', 'company', '', '', '', '', '', '1996-11-29', '', 'Sf232,, Chikkanpuram Village, Dhalavoipattinam Post\r\nDharapuram Taluk\r\nThiruppur District - 638656\r\nTamilnadu\r\n', 'AABCK7350D', 'CMBK05348A', 'V-113', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(278, '', 'KESTREL ENGINEERING (P) LTD.', 'company', '', '', '', '', '', '2011-04-03', '', 'B-2, Santhosh Apartments, New No.56, Halls Road\r\nEgmore\r\nChennai - 600008\r\nTamilnadu\r\n', 'AAECK2452K', 'CHEK10880C', 'A-28', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(279, '', 'KODY CLINICAL LABORATORIES PRIVATE LIMTED', 'company', '', '', '', '', '', '1985-10-17', '', '881, P.h.road\r\nOpposite To Nehru Park\r\nChennai - 600084\r\nTamilnadu\r\n', 'AAACK1419J', 'CHEK10880C', '196', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(280, '', 'KODY MEDICAL - LTCG', 'company', '', '', '', '', '', '1985-10-17', '', '-881, P.h.road\r\nOpposite To Nehru Park\r\nChennai - 600084\r\nTamilnadu\r\n', 'AAACK1419J', 'CHEK10880C', 'TEMP1', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(281, '', 'KODY MEDICAL ELECTRONICS PRIVATE LIMITED', 'company', '', '', '', '', '', '1978-11-13', '', 'Plot No.347, Door.9, Kamaraj Nagar, 12th East Street\r\nThiruvanmiyur\r\nChennai - 600041\r\nTamilnadu\r\n', 'AAACK1415E', 'CHEK00441A', '195', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(282, '', 'KOTA LAKSHMI BHRAMARAMBA', 'individual', '', '', '', '', '', '1961-03-15', '', '67, Candid Square, F1 Kavarai\r\nSaligramam\r\nChennai - 600093\r\nTamilnadu\r\n', 'ABRPL1668B', 'CHEK00441A', '395N', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(283, '', 'KOTA VENKATA VASUDEVA RAO', 'individual', '', '', '', '', '', '1959-05-22', '', '67, Candid Square, F1 Kavarai\r\nSaligramam\r\nChennai - 600093\r\nTamilnadu\r\n', 'AAPPV5945E', 'CHEK00441A', '395K', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(284, '', 'KRISHNAMOORTHY', 'individual', '', '', '', '', '', '1981-10-06', '', '4/6, Manthi Naicker Thottam\r\nRamapuram\r\nChennai - 600089\r\nTamilnadu\r\n', 'CVZPK6235K', 'CHEK00441A', '426', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(285, '', 'KRISHNAVENI  MISHRA', 'individual', '', '', '', '', '', '1967-08-30', '', '95a, Dharmapuri Colony\r\nUppal\r\nHyderabad - 500039\r\nAndhra Pradesh\r\n', 'ALXPM8163A', 'CHEK00441A', 'V-128', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(286, '', 'KRIYAGRAM INFORMATIQUES (P) LTD', 'company', '', '', '', '', '', '2005-02-04', '', '10, Anna Nagar, Second Street\r\nVelachery\r\nChennai - 600042\r\nTamilnadu\r\n', 'AACCK5707F', 'CHEK07332D', '206', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(287, '', 'KUMAR  KARTHIKEYAN', 'individual', '', '', '', '', '', '1984-09-15', '', '23/12,flatd, Ramya Enclave,bakthavachalam Colony, 2nd Street\r\nVadapalani\r\nChennai - 600026\r\nTamilnadu\r\n', 'ANXPK2040A', 'CHEK07332D', '252B', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(288, '', 'L  VIJAYALAKSHMI', 'individual', '', '', '', '', '', '1969-02-09', '', '6a, Meenakshi Street\r\nKarthikeyan Nagar,maduravoyal\r\nChennai - 602102\r\nTamilnadu\r\n', 'AACPL4912C', 'CHEK07332D', '129', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(289, '', 'L ROSY JASMINE CARONA', 'individual', '', '', '', '', '', '1986-11-13', '', '15/5, Bharathydhasan Colony, 5th Street\r\nKodambakkam\r\nChennai - 600024\r\nTamilnadu\r\n', 'AMXPR4520R', 'CHEK07332D', 'MIS-134', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(290, '', 'LAKSHMAN LATA', 'individual', '', '', '', '', '', '1962-10-27', '', 'CELEXTEL ENTERPRISES PRIVATE LIMITED\r\nA1, Dev Appartments, 1-a, Thiruveeti Amman Koil Street\r\nVelachery, Chennai - 600042\r\nTamilnadu\r\n', 'ABKPL4178P', 'CHEK07332D', 'V-108', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(291, '', 'LAKSHMANAN S', 'individual', '', '', '', '', '', '1960-08-31', '', 'CELEXTEL ENTERPRISES PRIVATE LIMITED\r\nA-1, Dev Appartments, 1a, Thiruveethy Amman Koil St.\r\nVelachery, Chennai - 600042\r\nTamilnadu\r\n', 'ABKPL4175A', 'CHEK07332D', 'V-108', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(292, '', 'LAKSHMI A', 'individual', '', '', '', '', '', '1960-08-31', '', '-CELEXTEL ENTERPRISES PRIVATE LIMITED\r\nA-1, Dev Appartments, 1a, Thiruveethy Amman Koil St.\r\nVelachery, Chennai - 600042\r\nTamilnadu\r\n', 'ABKPL4175A', 'CHEK07332D', 'RCC-102', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(293, '', 'LAKSHMIKANTHAN PRABHU', 'individual', '', '', '', '', '', '1978-11-08', '', '5/8, Annaji Nagar First Main Road\r\nWest K.k.nagar\r\nChennai - 600078\r\nTamilnadu\r\n', 'ALPPP7148A', 'CHEK07332D', 'MIS-135', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(294, '', 'LAKSHMIPRASAD  EMURI', 'individual', '', '', '', '', '', '1975-08-06', '', '166-3c, B, Block, Castle Winds Appts, Velcahery Main Road\r\nVelachery\r\nChennai - 600042\r\nTamilnadu\r\n', 'AADPE0256H', 'CHEK07332D', 'IT-466N', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(295, '', 'LATICES AND POLYMERS', 'company', '', '', '', '', '', '1996-10-18', '', 'B-2, Santhosh Apartments, 56,halls Road\r\nEgmore\r\nChennai - 600008\r\nTamilnadu\r\n', 'AAAFL3969M', 'CHEK07332D', '267', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(296, '', 'LESLIE E J DOUYERE', 'individual', '', '', '', '', '', '1939-08-06', '', '-B-2, Santhosh Apartments, 56,halls Road\r\nEgmore\r\nChennai - 600008\r\nTamilnadu\r\n', 'AGKPL2922J', 'CHEK07332D', 'MIS-138', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(297, '', 'LORDS SECURITY MINT LIMITED', 'company', '', '', '', '', '', '2003-01-20', '', '0, Industrial Development Area, Gajulamandyam\r\nRenigunta\r\nChittoor - 517520\r\nAndhra Pradesh\r\n', 'AAACL8984B', 'HYDL00871D', '182', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(298, '', 'M  AMUDHAVALLI', 'individual', '', '', '', '', '', '1980-04-15', '', '39, Palliarasan Street\r\nAnna Nagar,\r\nChennai - 600102\r\nTamilnadu\r\n', 'AIWPA4080G', 'HYDL00871D', '204N', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(299, '', 'M  BALAKRISHNAN', 'individual', '', '', '', '', '', '1952-06-30', '', '6, New No.5, Annaji Nagar Ii Cross Street\r\nWest K.k..nagar\r\nChennai - 600078\r\nTamilnadu\r\n', 'ADOPB8908R', 'HYDL00871D', 'S-015', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(300, '', 'M  DURAI', 'individual', '', '', '', '', '', '1949-05-08', '', '2, Gandhi Nagar, Poonamallee Road\r\nEkkattuthangal\r\nChennai - 600032\r\nTamilnadu\r\n', 'ADPPD1578G', 'HYDL00871D', '250', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(301, '', 'M  GIRIJA', 'individual', '', '', '', '', '', '1973-06-15', '', '213, T1, Saadveegam Arcade, Vgp Nagar\r\nMogappair\r\nChennai - 600037\r\nTamilnadu\r\n', 'AJAPM3688H', 'HYDL00871D', '205N', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(302, '', 'M  GUNASEKARAN', 'individual', '', '', '', '', '', '1960-09-11', '', '1047, A/1, Munusamy Street\r\nK.k.nagar\r\nChennai - 600078\r\nTamil Nadu\r\n', 'AHIPG0195K', 'HYDL00871D', '153N', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(303, '', 'M  LAVANYA', 'individual', '', '', '', '', '', '1981-09-13', '', '44, Vivekanada Street\r\nUday Nagar\r\nBangalore - 560016\r\nKarnataka\r\n', 'AMFPM6176J', 'HYDL00871D', 'H006', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(304, '', 'M  PANDIYAN', 'individual', '', '', '', '', '', '1960-07-08', '', '28/23, Mariamman Koil Street\r\nK.k.nagar West\r\nChennai - 600078\r\nTamil Nadu\r\n', 'AOKPP2758N', 'HYDL00871D', 'IT-101N', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(305, '', 'M  PANEERSELVAM', 'individual', '', '', '', '', '', '1961-01-07', '', '13, 1 Mettu Street\r\nLakshmipuram,chrompet\r\nChennai - 600044\r\nTamilnadu\r\n', 'AHIPP8665M', 'HYDL00871D', '219', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(306, '', 'M  PITCHIMUTHU', 'individual', '', '', '', '', '', '1960-05-27', '', '14, 56th Street 10th Sector\r\nAyyavupuram, Rajamannar Salai\r\nChennai - 600078\r\nTamilnadu\r\n', 'AMIPP1238P', 'HYDL00871D', '419', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(307, '', 'M  RAJA', 'individual', '', '', '', '', '', '1976-10-25', '', '6/6, Rukmani Ammal Street\r\nWest K K Nagar\r\nChennai - 600078\r\nTamilnadu\r\n', 'AGQPR1393H', 'HYDL00871D', '294', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(308, '', 'M  RAJAKUMAR', 'individual', '', '', '', '', '', '1959-06-29', '', '798,, First Floor, T.p.chatram, 32nd Cross Street\r\nShenoy Nagar\r\nChennai - 600030\r\nTamilnadu\r\n', 'AKIPR5166L', 'HYDL00871D', 'V-152', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(309, '', 'M  RAJU', 'individual', '', '', '', '', '', '1974-06-29', '', '97, East Vanniar Street\r\nWest K.k.nagar\r\nChennai - 600078\r\nTamilnadu\r\n', 'AIAPR0017N', 'HYDL00871D', '299N', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(310, '', 'M  SANKAR', 'individual', '', '', '', '', '', '1968-12-24', '', 'A6 3/127, Senduran Colony\r\nMadipakkam\r\nChennai - 600091\r\nTamilnadu\r\n', 'BSSPS6129R', 'HYDL00871D', 'V-136', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(311, '', 'M  SARAVANAN', 'individual', '', '', '', '', '', '1979-01-08', '', '12, Devi Nagar, Moolachathiram Road\r\nMadhavaram Milk Colony\r\nChennai - 600051\r\nTamilnadu\r\n', 'BJKPS9235F', 'HYDL00871D', '144A-N', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(312, '', 'M  SENTHIL KUMAR', 'individual', '', '', '', '', '', '1972-10-05', '', 'Plot No.13 Door No.4/8a, Gokulam Nagar, Second Cross Road\r\nMoovarasampettai\r\nChennai - 600091\r\nTamilnadu\r\n', 'AMIPK4603M', 'HYDL00871D', '337', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(313, '', 'M  THANGARATHNAVEL', 'individual', '', '', '', '', '', '1968-08-04', '', 'No.a88,b-3, Amudham Flats, Kandasamy Salai\r\nPeriyarnagar\r\nChennai - 600086\r\nTamilnadu\r\n', 'ACEPT9040R', 'HYDL00871D', '100', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(314, '', 'M  VENKATARAMANA', 'individual', '', '', '', '', '', '1961-07-02', '', '21/3, Gangai Nagar, First Main Road\r\nVelachery\r\nChennai - 600042\r\nTamilnadu\r\n', 'AADPV2277P', 'HYDL00871D', '199', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(315, '', 'M  VIJAYAKUMAR', 'individual', '', '', '', '', '', '1968-05-17', '', '52, Fourth Cross Street, Ranganathapuram\r\nTambaram\r\nChennai - 600045\r\nTamilnadu\r\n', 'ACFPV0760R', 'HYDL00871D', '220', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(316, '', 'M G A ASSOCIATES', 'individual', '', '', '', '', '', '1968-05-17', '', '-52, Fourth Cross Street, Ranganathapuram\r\nTambaram\r\nChennai - 600045\r\nTamilnadu\r\n', 'ACFPV0760R', 'HYDL00871D', '459', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(317, '', 'M G A AVENUE', 'company', '', '', '', '', '', '2011-04-20', '', '111\r\nAggaram Mel Village Thiruvloor\r\n0\r\nTamilnadu\r\n', 'ACFPV0760R', 'HYDL00871D', '459A', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(318, '', 'M G A AVENUE FIRM', 'company', '', '', '', '', '', '2011-04-20', '', '-111\r\nAggaram Mel Village Thiruvloor\r\n0\r\nTamilnadu\r\n', 'ACFPV0760R', 'HYDL00871D', '459F', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(319, '', 'M MOHAMED HANEEFA', 'individual', '', '', '', '', '', '1967-01-15', '', 'No.11, V.o.c.street\r\nMgr Nagar\r\nChennai - 600078\r\nTamil Nadu\r\n', 'ABHPH2365M', 'HYDL00871D', '282', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(320, '', 'M P BHASKARAN', 'individual', '', '', '', '', '', '1947-04-15', '', '10c, Mohanapuri, Lake View Road\r\nAdambakkam\r\nChennai - 600088\r\nTamilnadu\r\n', 'AEBPB2037H', 'HYDL00871D', 'IT-149', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(321, '', 'M S BASKARAN', 'individual', '', '', '', '', '', '1968-03-23', '', 'No.6, Rama Rao Garden, Third Street\r\nRoyapettah\r\nChennai - 600014\r\nTamilnadu\r\n', 'AEZPB4629M', 'HYDL00871D', '110', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(322, '', 'M S KALAIVANI', 'individual', '', '', '', '', '', '1969-09-23', '', '6, First Stret\r\nGill Nagar,choolaimedu\r\nChennai - 600094\r\nTamilnadu\r\n', 'AHQPK2925H', 'HYDL00871D', '216N', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(323, '', 'M S SURYAKUMARI', 'individual', '', '', '', '', '', '1939-02-10', '', '6/46, Gill Nagar, First Street\r\nChoolaimedu\r\nChennai - 600094\r\nTamilnadu\r\n', 'AMEPS9407M', 'HYDL00871D', '214', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(324, '', 'M V ANANDHARAJ', 'individual', '', '', '', '', '', '1966-01-15', '', 'Anna Nagar West, Ellai Amman Koil Street\r\nVepampat\r\n602204\r\nTamilnadu\r\n', 'AJKPM0287E', 'HYDL00871D', 'IT-430', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(325, '', 'M V HARISH KUMAR', 'individual', '', '', '', '', '', '1976-12-10', '', 'G -4, Valayapathy Apartments, 9/1, East Vannier Street\r\nWest K.k.nagar\r\nChennai - 600078\r\nTamil Nadu\r\n', 'ABAPH0662G', 'HYDL00871D', 'IT-254', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(326, '', 'M V RAMESH BABU', 'individual', '', '', '', '', '', '1973-05-07', '', 'Flat No.15,, 2 Nd Floor, Karpagam Apts, Jeevanandam Street\r\nWest.k.k.nagar\r\nChennai - 600078\r\nTamil Nadu\r\n', 'AECPR9163B', 'HYDL00871D', 'IT-254A', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(327, '', 'M.  MUTHUPALANI', 'individual', '', '', '', '', '', '1945-06-19', '', 'A/3, Kumaran Kudil, Saravanan Apts, 58 & 59 M.m.ramasamy Street\r\nJaferkhanpet\r\nChennai - 600083\r\nTamil Nadu\r\n', 'AAEPM0420G', 'HYDL00871D', 'IT-165', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(328, '', 'M.  SIVAKUMAR', 'individual', '', '', '', '', '', '1968-10-05', '', 'No.7, North Mada Street\r\nKoyampedu\r\nChennai - 600107\r\nTamilnadu\r\n', 'AGEPS4789G', 'HYDL00871D', '347', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(329, '', 'M.  VENUGOPAL', 'individual', '', '', '', '', '', '1933-09-08', '', '217, Konnur High Road, Ayanavaram\r\nAyanawaram\r\nChennai - 600 023\r\nTamil Nadu\r\n', 'ACAPV4385M', 'HYDL00871D', '365', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(330, '', 'M. U. SURESH', 'individual', '', '', '', '', '', '1964-05-25', '', '4, Sri Nagar Colony, East Mada Street\r\nSaidapet\r\nChennai - 600015\r\nTamilnadu\r\n', 'AMBPS3253N', 'HYDL00871D', '416', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(331, '', 'M.F ADITHYA I RESIDENTS ASSOCIATION', 'company', '', '', '', '', '', '2009-11-26', '', 'Ambal Nagar\r\nNarayanapuram, Pallikaranai\r\nChennai - 600100\r\nTamilnadu\r\n', 'AMBPS3253N', 'HYDL00871D', 'A53', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(332, '', 'M.K.  JEGADAMBAL', 'individual', '', '', '', '', '', '1955-07-25', '', '4/11, Agathiyar Street,ambal Nagar\r\nEkkattuthangal\r\nChennai - 600097\r\nTamilnadu\r\n', 'AFCPJ3748R', 'HYDL00871D', '324', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(333, '', 'MADRAS INFORMATION MANAGERS (P) LTD.', 'company', '', '', '', '', '', '1989-07-04', '', '176/7, 2nd Floor, North Usman Road\r\nT Nagar\r\nChennai - 600017\r\nTamilnadu\r\n', 'AAACM7626F', 'HYDL00871D', 'M-001', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(334, '', 'MALA  KUMAR', 'individual', '', '', '', '', '', '1963-09-22', '', '23/12, Flat-d,ramya Enclave, 2nd Street,bakthvachalam Colony\r\nVadapalani\r\nChennai - 600026\r\nTamilnadu\r\n', 'AHRPM8472E', 'HYDL00871D', '252A', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(335, '', 'MANJULADEVI', 'individual', '', '', '', '', '', '1963-09-22', '', '-23/12, Flat-d,ramya Enclave, 2nd Street,bakthvachalam Colony\r\nVadapalani\r\nChennai - 600026\r\nTamilnadu\r\n', 'AHRPM8472E', 'HYDL00871D', 'TEMP5', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(336, '', 'MARUTHI ENGINEERING EKKATTUTHANGAL', 'company', '', '', '', '', '', '1989-01-25', '', '8, Ganapathy Colony\r\nEkkatuthangal\r\nChennai. - 600032\r\nTamilnadu\r\n', 'AABFM0908N', 'HYDL00871D', '218', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(337, '', 'MARUTHI ENGINEERING INDUSTRIES VALASARAVAKKAM', 'company', '', '', '', '', '', '1989-01-25', '', '5/13, Sri Devi Kuppam Road\r\nValasaravakkam\r\nChennai - 600087\r\nTamilnadu\r\n', 'AADFM3576E', 'HYDL00871D', '162', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(338, '', 'MASILLA MOSES KENNEDY.S', 'individual', '', '', '', '', '', '1963-11-22', '', 'No.14, Third Main Road, Annaji Nagar\r\nWest K.k.nagar\r\nChennai - 600078\r\nTamilnadu\r\n', 'AKVPK1889Q', 'HYDL00871D', 'IT-237', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(339, '', 'MEENA  GANESH', 'individual', '', '', '', '', '', '1953-11-16', '', 'S-12, Sangath, Mgr Nagar I Street\r\nVelacheri\r\nChennai - 600042\r\nTamilnadu\r\n', 'AKVPK1889Q', 'HYDL00871D', 'IT-357', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(340, '', 'MERCY  ANAND', 'individual', '', '', '', '', '', '1958-02-11', '', 'No.50, Kanigapuram, Ist Street\r\nK.k.nagar\r\nChennai - 600078\r\nTamil Nadu\r\n', 'ALLPM1340H', 'HYDL00871D', '233A', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(341, '', 'MITA TEKNIK TECHNOLOGY PRIVATE LIMITED', 'company', '', '', '', '', '', '2007-12-13', '', '1/62-15, Ravi Colony, I Street, Paul Wells Road\r\nSt. Thomas Mount\r\nChennai - 600016\r\nTamilnadu\r\n', 'AAFCM3953L', 'CHEM10280E', '377N', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(342, '', 'MODERN COFFEE HOUSE', 'company', '', '', '', '', '', '1998-08-24', '', 'Cape Road,kottar\r\nNagercoil\r\nK.k.district - 629 000\r\nTamilnadu\r\n', 'AAJFM5352Q', 'CHEM10280E', 'IT-177', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(343, '', 'MURUGESAN  MUNUSAMY', 'individual', '', '', '', '', '', '1972-07-16', '', '2/161, Nehru Street\r\nPasumpon Nagar, Perumbakkam\r\nChennai - 600100\r\nTamilnadu\r\n', 'AIAPM8212G', 'CHEM10280E', '415', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(344, '', 'N  ANANTH', 'individual', '', '', '', '', '', '1973-02-23', '', '79, Arcot Road\r\nValsaravakkam\r\nChennai - 600087\r\nTamilnadu\r\n', 'AEYPA9667D', 'CHEM10280E', 'IT-317', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(345, '', 'N  BALAMURUGAN', 'individual', '', '', '', '', '', '1977-01-05', '', '2,, Manjolai Street, First Main Road\r\nKalaimagal Nagar, Ekkaduthangal\r\nChennai - 600097\r\nTamilnadu\r\n', 'AEGPN9489Q', 'CHEM10280E', 'S-016', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(346, '', 'N  ELAMARAN', 'individual', '', '', '', '', '', '1970-07-13', '', '2, Palayakaran Street\r\nEkkattuthangal\r\nChennai - 600097\r\nTamilnadu\r\n', 'AADPE8762E', 'CHEM10280E', '253', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(347, '', 'N  ESWARA', 'individual', '', '', '', '', '', '1952-06-16', '', '7, Kushaldas Street,ramasamy Nager\r\nSaligramam\r\nChennai - 600093\r\nTamilnadu\r\n', 'AADPE2031J', 'CHEM10280E', '152', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(348, '', 'N  JAYAKUMAR', 'individual', '', '', '', '', '', '1958-11-30', '', '25, S V P Nagar\r\nArumbakkam\r\nChennai - 600106\r\nTamilnadu\r\n', 'AGNPJ3322M', 'CHEM10280E', '130', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(349, '', 'N  KALAICHELVI', 'individual', '', '', '', '', '', '1966-09-03', '', 'New No.6, Kalaimagal Nagar, First Street\r\nEkkattuthangal\r\nChennai - 600097\r\nTamilnadu\r\n', 'AHEPK3330L', 'CHEM10280E', '368', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(350, '', 'N  KUMARASAMY', 'individual', '', '', '', '', '', '1967-05-30', '', 'F-1, Vennila Apartments, First Street,vijaya Ganapathy Nagar\r\nUllagaram\r\nChennai - 600091\r\nTamilnadu\r\n', 'AAXPK9297N', 'CHEM10280E', '104', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(351, '', 'N  KUMARAVEL', 'individual', '', '', '', '', '', '1952-08-25', '', '23a, First Floor, Ravi Street, Dr.seethapathy Nagar\r\nVelachery\r\nChennai - 600042\r\nTamilnadu\r\n', 'AIPPK4870P', 'CHEM10280E', 'S-026', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(352, '', 'N  PAKKIRISAMY', 'individual', '', '', '', '', '', '1946-04-03', '', '25, Sulochana Nagar,moulivakkam\r\nKundrathur Road\r\nChennai - 600116\r\nTamilnadu\r\n', 'AHQPP9819H', 'CHEM10280E', '145', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(353, '', 'N  SANKARAN', 'individual', '', '', '', '', '', '1950-07-21', '', 'Block 1c, Built-tech Thirupathi Flats, 4th Street\r\nKrishnamachary Nagar,alapakkam\r\nChennai - 600116\r\nTamilnadu\r\n', 'ABGPS1754E', 'CHEM10280E', 'IT-347', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(354, '', 'N  SANTHAKUMARI', 'individual', '', '', '', '', '', '1952-02-03', '', '1-b3, Trustpuram, Third Cross Street\r\nKodambakkam\r\nChennai - 600024\r\nTamilnadu\r\n', 'ABGPS1754E', 'CHEM10280E', '274B', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(355, '', 'N  SASIKUMAR', 'individual', '', '', '', '', '', '1983-06-13', '', '76, Big Street, 34, Villagam Village\r\nPandur Post, Thirukalunkundram\r\nKancheepuram - 603109\r\nTamilnadu\r\n', 'CATPS6179M', 'CHEM10280E', 'V-138', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(356, '', 'N  SUMATHI', 'individual', '', '', '', '', '', '1972-04-30', '', '20, Second Main Street, Kalaimagal Nagar\r\nEkkattuthangal\r\nChennai - 600097\r\nTamilnadu\r\n', 'ASSPS1786R', 'CHEM10280E', '229A', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(357, '', 'N  USHA DEVI', 'individual', '', '', '', '', '', '1965-04-21', '', '2/662, Ranga Reddy Garden Main Road\r\nNeelankarai\r\nChennai - 600041\r\nTamilnadu\r\n', 'ADMPN5206G', 'CHEM10280E', 'V-112', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(358, '', 'N  VALLIKANNU', 'individual', '', '', '', '', '', '1964-02-17', '', '10b, Varadharajapuram First Street\r\nVelcahery\r\nChennai - 600042\r\nTamilnadu\r\n', 'ADRPN7054R', 'CHEM10280E', 'V-118', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(359, '', 'N  VEENA', 'individual', '', '', '', '', '', '1985-09-05', '', 'H6, Mgm Nethrambigai Apartments, 15 Vembuliamman Kovil Street\r\nWest K K Nagar\r\nChennai - 600078\r\nTamilnadu\r\n', 'AIVPV4691D', 'CHEM10280E', '423', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(360, '', 'N  VISWANATH', 'individual', '', '', '', '', '', '1976-06-14', '', '1/b-3, City Royal Flats, Iii Cross Street, Trustpuram\r\nKodambakkam\r\nChennai - 600024\r\nTamilnadu\r\n', 'ACGPV3150N', 'CHEM10280E', '274', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(361, '', 'N G GANAPATHY', 'individual', '', '', '', '', '', '1964-01-15', '', '1/109, Thiruveethi Amman Koil Street\r\nDhamu Nagar, Bharani Puttur\r\nChennai - 602101\r\nTamilnadu\r\n', 'AKTPG7863N', 'CHEM10280E', '380', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(362, '', 'N P BHOOPALAN', 'individual', '', '', '', '', '', '1976-12-15', '', 'No.53/6, 15th Lane\r\nIndra Nagar ,adayar\r\nChennai - 600020\r\nTamil Nadu\r\n', 'AAPPB6968H', 'CHEM10280E', 'IT-271', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(363, '', 'N P PRAKKASH', 'individual', '', '', '', '', '', '1974-11-17', '', 'No.25, Sulochana Nagar\r\nMoulivkkam, Porur\r\nChennai - 600116\r\nTamilnadu\r\n', 'APUPP7091P', 'CHEM10280E', '147', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(364, '', 'N PRASANNA VENKATESHAN', 'individual', '', '', '', '', '', '1983-12-17', '', 'New # 21,flat No B-13, Abirami Apartments, Babu Rajendra Prasad Street\r\nWest Mambalam\r\nChennai - 600033\r\nTamilnadu\r\n', 'APUPP7091P', 'CHEM10280E', 'H004', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(365, '', 'N R BALAMURUGAN', 'individual', '', '', '', '', '', '1960-04-13', '', 'Ap-1343, 33rd Street\r\n7th Sector, K.k.nagar\r\nChennai - 600078\r\nTamilnadu\r\n', 'AMNPB6512D', 'CHEM10280E', '388', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(366, '', 'N RAJAVEL MOHAN', 'individual', '', '', '', '', '', '1964-02-11', '', '19, West Mada Street, Pillaiyar Koil Street\r\nThirumazhisai\r\nChennai - 600041\r\nTamilnadu\r\n', 'AENPN4746D', 'CHEM10280E', '600', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(367, '', 'N.  DHANALAKSHMI', 'individual', '', '', '', '', '', '1948-08-16', '', '46, Kalaimagal Nagar, Second Street\r\nEkkattuthangal\r\nChennai - 600097\r\nTamilnadu\r\n', 'ADTPD0788Q', 'CHEM10280E', '254', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(368, '', 'N.  DURAIRAJ', 'individual', '', '', '', '', '', '1954-11-13', '', '50, Pammal Nallathambi Street\r\nM.g.r.nagar\r\nChennai - 600078\r\nTamilnadu\r\n', 'ADXPD2125R', 'CHEM10280E', '271N', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(369, '', 'N.  RAJAGOPAL', 'individual', '', '', '', '', '', '1948-06-28', '', '221, School Street\r\n,nerkundram\r\nChennai - 600107\r\nTamilnadu\r\n', 'AABPR9354D', 'CHEM10280E', '126', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(370, '', 'N.  RAMESHKUMAR', 'individual', '', '', '', '', '', '1975-05-07', '', '32, Sona Enclave, Second Street Kumaran Colony\r\nVadapalani\r\nChennai - 600026\r\nTamilnadu\r\n', 'ADAPN7312B', 'CHEM10280E', 'S-002N', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(371, '', 'N.  SAROJA', 'individual', '', '', '', '', '', '1938-12-12', '', '29, Kamraj Nagar, Rajeswari Street\r\nChoolaimedu\r\nChennai - 600 094\r\nTamilnadu\r\n', 'ALKPS6819E', 'CHEM10280E', 'IT-223', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active');
INSERT INTO `clients` (`id`, `title`, `full_name`, `client_type`, `phone_mobile`, `phone_home`, `phone_office`, `phone_mobile2`, `phone_office2`, `dob`, `email`, `address`, `pan`, `tan`, `genius_id`, `file_id`, `create_date`, `update_date`, `status`) VALUES
(372, '', 'N.  SUBRAMANI', 'individual', '', '', '', '', '', '1967-05-07', '', 'New No.3, Munirathinam, Surappa Street\r\nTriplicane\r\nChennai - 600005\r\nTamil Nadu\r\n', 'AIUPS2297K', 'CHEM10280E', '300', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(373, '', 'NAGALAKSHMI INDUSTRIES', 'company', '', '', '', '', '', '2007-03-14', '', '5/860, Lakeview  3rd Street\r\nIyyappa Nagar, Madipakkam\r\nChennai - 600091\r\nTamilnadu\r\n', 'AAHFN9585A', 'CHEM10280E', '168N', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(374, '', 'NATESH TOURS AND TRAVELS', 'company', '', '', '', '', '', '2006-08-31', '', 'No.15(old No.62), Natesh Complex, Kodambakkam High Road\r\nT.nagar\r\nChennai - 600017\r\nTamilnadu\r\n', 'AAGFN7770E', 'CHEM10280E', '376', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(375, '', 'NEW DELTA GEAR MANUFACTURERS PRIVATE LIMITED', 'company', '', '', '', '', '', '1996-06-07', '', '2, Palayakaran Street\r\nEkkattuthangal\r\nChennai - 600097\r\nTamilnadu\r\n', 'AAACN3576F', 'CHEN02300E', '251', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(376, '', 'NISHANTH  BALAJI', 'individual', '', '', '', '', '', '1976-01-30', '', 'New No.4/27/1(old No.2), Bella Vista, Sunrise Avenue\r\nNeelankarai\r\nChennai - 600041\r\nTamilnadu\r\n', 'AAAPN3708J', 'CHEN02300E', '116', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(377, '', 'NITHIYASHREE CONSTRUCTIONS (P) LTD', 'company', '', '', '', '', '', '2010-10-04', '', '127, Arcot Road\r\nVirugambakkam\r\nChennai - 600092\r\nTamilnadu\r\n', 'AADCN2715M', 'CHEN02300E', '412', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(378, '', 'NIZAM ABDUL KAYOOM', 'company', '', '', '', '', '', '2010-10-04', '', 'PRECIOUS TRADING CO\r\n-\r\n-\r\n-\r\n', 'AGXPA5286B', 'CHEN02300E', '345', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(379, '', 'NOHAIDEEN I HAJA', 'company', '', '', '', '', '', '2010-10-04', '', 'PRECIOUS TRADING CO\r\n-\r\n-\r\n-\r\n', 'AGXPA5286B', 'CHEN02300E', '345', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(380, '', 'OLIVE  MALATHY', 'individual', '', '', '', '', '', '1952-10-25', '', '9/5, Teachers Colony\r\nMeenambakkam\r\nChennai - 600027\r\nTamilnadu\r\n', 'AENPM4343K', 'CHEN02300E', 'IT-203', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(381, '', 'P  AJAYAKOSH', 'individual', '', '', '', '', '', '1966-06-15', '', '-9/5, Teachers Colony\r\nMeenambakkam\r\nChennai - 600027\r\nTamilnadu\r\n', 'ADYPA5126G', 'CHEN02300E', '212', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(382, '', 'P  ASHWINI', 'individual', '', '', '', '', '', '1966-06-15', '', '25, Jawahar Street\r\nWest K K Nagar\r\nChennai - 600078\r\nTamilnadu\r\n', 'AKBPA5616P', 'CHEN02300E', 'H001', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(383, '', 'P  CHANDRASEKAR', 'individual', '', '', '', '', '', '1955-05-07', '', '13, Susil Flats,firt Floor, 134,lake View Road\r\nWest Mambalam\r\nChennai - 600033\r\nTamilnadu\r\n', 'AADPC3841Q', 'CHEN02300E', '356', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(384, '', 'P  ELANGO', 'individual', '', '', '', '', '', '1971-04-03', '', '110, Media Visuals, Avm Avenue 5th Street\r\nVirugambakkam\r\nChennai - 600093\r\nTamilnadu\r\n', 'AAEPE9318D', 'CHEN02300E', '355', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(385, '', 'P  ELUMALAI', 'individual', '', '', '', '', '', '1970-03-07', '', '7, Gandhi Street\r\nPallikaranai\r\nChennai - 601302\r\nTamilnadu\r\n', 'AALPE9373P', 'CHEN02300E', 'V-141', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(386, '', 'P  ESWARAN', 'individual', '', '', '', '', '', '1974-11-13', '', '1, 8th Street\r\nNesapakkam\r\nChennai - 600078\r\nTamilnadu\r\n', 'AAMPE4608C', 'CHEN02300E', '155', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(387, '', 'P  ESWARI', 'individual', '', '', '', '', '', '1972-12-04', '', 'Plot 1/1, Balaji Nagar, First Street\r\nVirugambakkam\r\nChennai - 600092\r\nTamilnadu\r\n', 'AARPE6381M', 'CHEN02300E', '224NA', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(388, '', 'P  GOPAL', 'individual', '', '', '', '', '', '1968-06-20', '', '1, Gill Nagar 3rd Cross Street\r\nNear Gill Nagar Park,chooliamedu,\r\nChennai - 600094\r\nTamilnadu\r\n', 'ADWPG0610R', 'CHEN02300E', '103', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(389, '', 'P  MANIAMMAL', 'individual', '', '', '', '', '', '1950-04-07', '', '25, Sulochana Nagar, Moulivakkam\r\nPorur\r\nChennai - 600116\r\nTamilnadu\r\n', 'ABGPM3365D', 'CHEN02300E', '146', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(390, '', 'P  MANIKANDAN', 'individual', '', '', '', '', '', '1980-11-10', '', '7/na, Ashok Nanthavanam, Brunthavan Nagar\r\nTiruverkadu\r\nChennai - 600077\r\nTamilnadu\r\n', 'ANKPM4328E', 'CHEN02300E', '142N', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(391, '', 'P  NANDITHA', 'individual', '', '', '', '', '', '1971-05-20', '', '129/55, Raman Villa Building, Flat No. 2b, Ii Floor\r\nNew Avadi Road, Kilpauk\r\nChennai - 600010\r\nTamilnadu\r\n', 'ACLPN8418N', 'CHEN02300E', '353A', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(392, '', 'P  NATANASIGAMANI', 'individual', '', '', '', '', '', '1938-10-09', '', 'Old No.67, New No.7, Kalaimagal Nagar, Third Street\r\nEkkattuthangal\r\nChennai - 600097\r\nTamilnadu\r\n', 'AFNPN7250F', 'CHEN02300E', '221N', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(393, '', 'P  RAJESHKUMAR', 'individual', '', '', '', '', '', '1990-01-19', '', 'F-3, Sri Balamurugan Engg Enterprises, Industrial Estate\r\nEkkattuthangal\r\nChennai - 600097\r\nTamilnadu\r\n', 'ANQPR3202A', 'CHEN02300E', '175A', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(394, '', 'P  RANGANATHAN', 'individual', '', '', '', '', '', '1946-08-15', '', '34a, Chelliamman Koil Street\r\nNerkundram\r\nChennai - 600107\r\nTamilnadu\r\n', 'AABPR5436L', 'CHEN02300E', '125', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(395, '', 'P  RAVINDRAN', 'individual', '', '', '', '', '', '1941-02-26', '', '4, Srinagar Colony, East Mada Street\r\nSaidapet\r\nChennai - 600015\r\nTamilnadu\r\n', 'ADCPR0368K', 'CHEN02300E', '183', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(396, '', 'P  SANDHYA', 'individual', '', '', '', '', '', '1984-06-06', '', '25, Jawahar Street\r\nWest K K Nagar\r\nChennai - 600078\r\nTamilnadu\r\n', 'APDPP7758J', 'CHEN02300E', 'H009', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(397, '', 'P  SASIREKHA', 'individual', '', '', '', '', '', '1980-03-08', '', 'F-3, Sri Balamurugan Engg Enterprises, Industrial Estate\r\nEkkattuthangal\r\nChennai - 600097\r\nTamil Nadu\r\n', 'AWHPS0658R', 'CHEN02300E', '174', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(398, '', 'P  SUBASHINI', 'individual', '', '', '', '', '', '1984-06-21', '', 'F-3, Sri Balamurugan Engg Enterprises, Industrial Estate\r\nEkkattuthangal\r\nChennai - 600097\r\nTamil Nadu\r\n', 'AWHPS0657A', 'CHEN02300E', '175', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(399, '', 'P  SURESH', 'individual', '', '', '', '', '', '1967-11-15', '', 'New No.7, Ghanu Nagar, Anna Fourth Street\r\nK.k.nagar\r\nChennai - 600078\r\nTamil Nadu\r\n', 'BDWPS3723A', 'CHEN02300E', '339N', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(400, '', 'P  VEERAN', 'individual', '', '', '', '', '', '1966-10-10', '', 'New No.5, Gandhi Nagar, Karunai Street\r\nEkattuthangal\r\nChennai - 600097\r\nTamilnadu\r\n', 'ADAPV9049B', 'CHEN02300E', '343N', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(401, '', 'P M ZAKIR HUSSAIN', 'individual', '', '', '', '', '', '1965-05-16', '', 'Plot No.7, Door No.15, 3rd Cross Street, Logaiah Colony\r\nSaligramam\r\nChennai - 600093\r\nTamilnadu\r\n', 'AADPZ4760B', 'CHEN02300E', '235', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(402, '', 'P MADHEVAN PILLAI', 'individual', '', '', '', '', '', '1971-05-20', '', 'Flat No.j85, Govind Flats, Ii Nd Floor\r\nVenkatesh Nagar Virugambakkam\r\nChennai - 600092\r\nTamilnadu\r\n', 'AGZPM2256K', 'CHEN02300E', 'S-032N', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(403, '', 'P S MANOJ', 'individual', '', '', '', '', '', '1970-12-02', '', 'Cmc Xii/247, Puthuveettil\r\nCherthala P O\r\nAlappuzha - 688524\r\nKerala\r\n', 'BMKPS4236D', 'CHEN02300E', 'A-28B', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(404, '', 'P T BEERAN KOYA', 'individual', '', '', '', '', '', '1949-01-08', '', '2, New Sakthi Cafe, Issac Street\r\nPark Town\r\nChennai - 600003\r\nTamilnadu\r\n', 'AAHPB3439K', 'CHEN02300E', '256', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(405, '', 'P T UMMER', 'individual', '', '', '', '', '', '1955-02-10', '', '12, Bharathi Street\r\nTriplicane\r\nChennai - 600005\r\nTamilnadu\r\n', 'AAHPU8279N', 'CHEN02300E', 'IT-125', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(406, '', 'P V THIRUMURTHY', 'individual', '', '', '', '', '', '1968-05-06', '', '52, Vgp Selva Nagar, 1st Main Road\r\nVelachery\r\nChennai - 600042\r\nTamilnadu\r\n', 'AEYPT0932L', 'CHEN02300E', '354', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(407, '', 'P.  BALAJI', 'individual', '', '', '', '', '', '1975-02-16', '', 'No.01, Ruckmaniammal Street\r\nWest .k.knagar\r\nChennai - 600078\r\nTamil Nadu\r\n', 'AHVPB0658H', 'CHEN02300E', '281N', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(408, '', 'P.  GANESH KUMAR', 'individual', '', '', '', '', '', '1970-02-02', '', 'No.77, Opp.to Devi Academy School, Ekkatamman Koil Street\r\nWest .k.k.nagar\r\nChennai - 600087\r\nTamilnadu\r\n', 'AIGPG1432Q', 'CHEN02300E', '154', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(409, '', 'P.  SUGUNA', 'individual', '', '', '', '', '', '1960-11-12', '', 'F3, Sri Balamurugan Engg Enterps, Industrial Estate\r\nEkkatuthangal\r\nChennai - 600097\r\nTamilnadu\r\n', 'AOWPS7758F', 'CHEN02300E', '173', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(410, '', 'P.G. SANTHANA KRISHNAN', 'individual', '', '', '', '', '', '1963-03-15', '', '9, Nehru Street\r\nChoolaimedu\r\nChennai - 600094\r\nTamilnadu\r\n', 'ALQPS9401A', 'CHEN02300E', '217N', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(411, '', 'P.K.  KURSHIDA', 'individual', '', '', '', '', '', '1964-02-06', '', 'Flat No 3h, Rani Enclave.36/45, Kuttiappan Ii Street\r\nKellys\r\nChennai - 600010\r\nTamilnadu\r\n', 'AEUPK2075D', 'CHEN02300E', '257A', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(412, '', 'P.M.  KRISHNAN', 'individual', '', '', '', '', '', '1972-03-03', '', '5/569, Selva Vinayagar, Ist Cross Street\r\nMogappair West\r\nChennai - 600058\r\nTamil Nadu\r\n', 'AHVPK4157G', 'CHEN02300E', 'IT-440N', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(413, '', 'P.V.  BASHEER', 'individual', '', '', '', '', '', '1962-05-20', '', 'Flat No 3h, Rani Enclave, 36/45,kuttiappan Ii Street\r\nKellys\r\nChennai - 600010\r\nTamilnadu\r\n', 'AHUPB6680L', 'CHEN02300E', '257', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(414, '', 'PADMA  SUBRAMONIA PILLAI', 'individual', '', '', '', '', '', '1980-03-17', '', '154, Ananda Priya, Sixth Street\r\nBethania Nagar, Valasaravakkam\r\nChennai - 600087\r\nTamilnadu\r\n', 'ATSPP8414C', 'CHEN02300E', 'M-003', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(415, '', 'PALLAVAN GEAR INDUSTRIES', 'individual', '', '', '', '', '', '1980-03-17', '', '-154, Ananda Priya, Sixth Street\r\nBethania Nagar, Valasaravakkam\r\nChennai - 600087\r\nTamilnadu\r\n', 'ATSPP8414C', 'CHEN02300E', 'MIS-128', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(416, '', 'PANDYAN INDUSTRIAL EQUIPMENTS P LTD', 'company', '', '', '', '', '', '2005-06-10', '', 'No.41, I St Reddy Street\r\nEkkattuthangal\r\nChennai - 600097\r\nTamilnadu\r\n', 'AADCP6780E', 'CHEP08053D', '118N', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(417, '', 'PARTHASARATHY MAGAESH KUMAR', 'individual', '', '', '', '', '', '1974-06-24', '', '48, Munuswamy Salai\r\nK K Nagar\r\nChennai, - 600078\r\nTamilnadu\r\n', 'AFJPM4830N', 'CHEP08053D', 'S-028', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(418, '', 'PATCO PRECISION COMPONENTS PVT LTD-CHENNAI UNIT', 'company', '', '', '', '', '', '2004-07-14', '', '23a, Sidco Industrial Estate\r\nAmbattur\r\nChennai - 600098\r\nTamilnadu\r\n', 'AABCT3058K', 'CHEP08053D', 'A-33', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(419, '', 'PAULINE  GEORGE', 'individual', '', '', '', '', '', '1935-07-03', '', '507, 18th Street,sector 4\r\nK.k.nagar\r\nChennai - 600078\r\nTamilnadu\r\n', 'AAAPG6521E', 'CHEP08053D', 'S-014', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(420, '', 'PAWAN KUMAR GOEL', 'individual', '', '', '', '', '', '1975-08-27', '', '112b, U Anb V Block\r\nShalimar Bagh\r\nNew Delhi - 110088\r\nDelhi\r\n', 'AEAPG4505L', 'CHEP08053D', 'V-161', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(421, '', 'PONNUMUTHU  AYYAPPAN', 'individual', '', '', '', '', '', '1953-03-23', '', '13, Ambal Nagar, Thiruvallur Street\r\nEkkattuthangal\r\nChennai - 600097\r\nTamilnadu\r\n', 'AAIPA1994M', 'CHEP08053D', '151', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(422, '', 'POWERMATIC PACKAGING PVT LTD', 'company', '', '', '', '', '', '1970-09-03', '', 'Dp.34, Industrial Estate\r\nGuindy\r\nChennai - 600032\r\nTamilnadu\r\n', 'AACCP4735A', 'CHEP00775F', '181', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(423, '', 'PRASANNA  SUKUMARAN', 'individual', '', '', '', '', '', '1951-03-30', '', 'Flat 1, Ii Floor, Garden Apartments, No.21, Pycrofts Garden Road\r\nThousandlights\r\nChennai - 600006\r\nTamilnadu\r\n', 'AAGPS1891P', 'CHEP00775F', '262', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(424, '', 'PRASANNA S NAIR', 'individual', '', '', '', '', '', '1939-08-17', '', 'B-2, Santhosh Apartments, 56,halls Road\r\nEgmore\r\nChennai - 600008\r\nTamilnadu\r\n', 'AADPN6541Q', 'CHEP00775F', '263', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(425, '', 'PRASANTH  BALAJI', 'individual', '', '', '', '', '', '1974-01-23', '', 'New No.4/27/1 (old No.2), Bella Vista, Sunrise Avenue\r\nNeelankarai\r\nChennai - 600041\r\nTamilnadu\r\n', 'AAAPB8404B', 'CHEP00775F', '115', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(426, '', 'PRECIOUS TRADING CO', 'company', '', '', '', '', '', '2012-01-10', '', '5, Buhari Building, Moores Road\r\nThousand Lights\r\nChennai - 600006\r\nTamilnadu\r\n', 'AAOFP0369H', 'CHEP00775F', '345', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(427, '', 'PREMA  LEELA', 'individual', '', '', '', '', '', '1952-05-06', '', 'No.1,, Kotten Villa, 8th Street, Tansi Nagar\r\nVelachery\r\nChennai - 600042\r\nTamilnadu\r\n', 'AANPP0090N', 'CHEP00775F', 'V-117', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(428, '', 'PRIMETECHNOLOGIES & SOLUTIONS PRIVATE LIMITED', 'company', '', '', '', '', '', '2000-02-28', '', '76, Priyan Plaza, Third Floor, Nelson Manickam Road\r\nAminjikarai\r\nChennai - 600029\r\nTamilnadu\r\n', 'AACCP4496Q', 'CHEP02618A', '322', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(429, '', 'PRIYA', 'individual', '', '', '', '', '', '1981-06-21', '', '46/2 Old No.104, East Vanniar Street\r\nWest K.k.nagar\r\nChennai - 600078\r\nTamilnadu\r\n', 'BJPPP5757E', 'CHEP02618A', '407N', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(430, '', 'PRIYANGA PARADISE INN', 'individual', '', '', '', '', '', '1981-06-21', '', '36, First Reddy Street\r\nEkkattuthangal\r\nChennai - 600097\r\nTamilnadu\r\n', 'BJPPP5757E', 'CHEP02618A', '209A', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(431, '', 'PSM INDUSTRIES', 'company', '', '', '', '', '', '2007-11-29', '', '122, Cart Track Road\r\nEkkattuthangal\r\nChennai - 600032\r\nTamilnadu\r\n', 'AALFP0575C', 'CHEP02618A', '394N', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(432, '', 'R  ARUMUGAM', 'individual', '', '', '', '', '', '1976-09-05', '', '10, Mariappa Naicker Street\r\nNesapakam\r\nChennai - 600078\r\nTamilnadu\r\n', 'AFVPA5982R', 'CHEP02618A', '248', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(433, '', 'R  BALAKUMAR', 'individual', '', '', '', '', '', '1972-11-24', '', '5/25, Sri Venkatesa Perumal Nagar, Balaji Street\r\nArumbakkam\r\nChennai - 600106\r\nTamilnadu\r\n', 'AAPPB6836Q', 'CHEP02618A', '176', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(434, '', 'R  BHARATHKUMAR', 'individual', '', '', '', '', '', '1972-02-06', '', '6, Patel Street\r\nKodambakkam\r\nChennai - 600024\r\nTamilnadu\r\n', 'AAPPB6836Q', 'CHEP02618A', 'IT-342', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(435, '', 'R  CHANDRAKALA', 'individual', '', '', '', '', '', '1959-07-05', '', '1248, Gmt Flats, Gloden Colony\r\nAnna Nagar West Extn\r\nChennai - 600050\r\nTamilnadu\r\n', 'ADMPC9988Q', 'CHEP02618A', '313', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(436, '', 'R  ELSIE SUJATHA', 'individual', '', '', '', '', '', '1962-08-22', '', 'No.4, 3rd Street\r\nAndavar Nagar\r\nChennai - 600024\r\nTamilnadu\r\n', 'AACPS3410L', 'CHEP02618A', '134', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(437, '', 'R  JAGADEESH MENON', 'individual', '', '', '', '', '', '1985-05-03', '', '5/3b, Ngo Colony, Third Cross Street\r\nVadapalani\r\nChennai - 600026\r\nTamilnadu\r\n', 'AHVPJ6286H', 'CHEP02618A', 'S-035', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(438, '', 'R  KANDASAMY', 'individual', '', '', '', '', '', '1960-06-15', '', '1/201a, School Street,pallavan Nagar\r\nNerkundram\r\nChennai - 600107\r\nTamilnadu\r\n', 'AAOPK5278J', 'CHEP02618A', '328', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(439, '', 'R  LAKSHMANAN', 'individual', '', '', '', '', '', '1964-03-26', '', '7, Sivan Koil North Cross Street\r\nThiruverkadu\r\nChennai - 600077\r\nTamilnadu\r\n', 'AAPPL5692N', 'CHEP02618A', '327', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(440, '', 'R  MADHU', 'individual', '', '', '', '', '', '1976-10-19', '', 'No.893, Munuswamy Road\r\nK.k.nagar\r\nChennai - 600078\r\nTamilnadu\r\n', 'AFLPR2676H', 'CHEP02618A', 'S-004A', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(441, '', 'R  MEENAKSHI', 'individual', '', '', '', '', '', '1976-10-30', '', '5/860, Lake View, Third Cross Street\r\nIyyappa Nagar, Madipakkam\r\nChennai - 600091\r\nTamilnadu\r\n', 'AKBPM4392G', 'CHEP02618A', '167N', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(442, '', 'R  NAGALAKSHMI', 'individual', '', '', '', '', '', '1939-10-21', '', '5/860, Lake View, Third Cross Street\r\nIyyappa Nagar, Madipakkam\r\nChennai - 600091\r\nTamilnadu\r\n', 'AFJPN2118Q', 'CHEP02618A', '166AN', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(443, '', 'R  NARAYANAN', 'individual', '', '', '', '', '', '1946-01-02', '', '103, Harshita Mansion, 51/52, Dayanandan Nagar\r\n7th Street, Malkajgiri\r\nHyderabad - 500547\r\nAndhra Pradesh\r\n', 'ABWPN4308D', 'CHEP02618A', 'S-027', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(444, '', 'R  PANDIAN', 'individual', '', '', '', '', '', '1978-07-15', '', '17, First Floor, First Cross Street\r\nVijaya Nagar, Velachery\r\nChennai - 600042\r\nTamil Nadu\r\n', 'AHBPR4618K', 'CHEP02618A', 'V-101', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(445, '', 'R  RAGHUNATHAN', 'individual', '', '', '', '', '', '1964-03-13', '', '10, Sundaravadivel Nagar\r\nPorur\r\nChennai - 600116\r\nTamilnadu\r\n', 'AESPR8802F', 'CHEP02618A', '120N', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(446, '', 'R  RAJENDRAN', 'individual', '', '', '', '', '', '1967-10-21', '', '6, Karikalan Street\r\nMgr Nagar\r\nChennai - 600078\r\nTamilnadu\r\n', 'AJRPR1272R', 'CHEP02618A', '157N', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(447, '', 'R  RAMAKRISHNAN', 'individual', '', '', '', '', '', '1972-06-15', '', '5/860, Iyappa Nagar, 3rd Street\r\nMadipakkam\r\nChennai - 600091\r\nTamilnadu\r\n', 'AGLPR4816L', 'CHEP02618A', '167AN', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(448, '', 'R  RAMESH', 'individual', '', '', '', '', '', '1982-07-13', '', '2, Thiru Nagar Annexe, Kaikankuppam\r\nAlwarthirunagar\r\nChennai - 600087\r\nTamilnadu\r\n', 'AILPR0356B', 'CHEP02618A', '227N', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(449, '', 'R  RAMSHANKER', 'individual', '', '', '', '', '', '1939-03-13', '', 'Flat No.t2, Murugan Apartments, 17, Madhavan Nair Road\r\nMahalingapuram\r\nChennai - 600034\r\nTamilnadu\r\n', 'ABLPR1538G', 'CHEP02618A', 'IT-154', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(450, '', 'R  RATHISH', 'individual', '', '', '', '', '', '1983-04-23', '', '10, School Street, Pallavan Nagar\r\nNerkundram\r\nChennai - 600107\r\nTamilnadu\r\n', 'AVKPR2679D', 'CHEP02618A', '126A', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(451, '', 'R  RISHI SHANKAR', 'individual', '', '', '', '', '', '1979-12-15', '', '128/3, T6 Sai Kings Dale, Horamavu Agara Main Rd\r\nBabusapalya\r\nBangalore - 500043\r\nKarnataka\r\n', 'AGIPR1559B', 'CHEP02618A', 'H003', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(452, '', 'R  SANTHANAM', 'individual', '', '', '', '', '', '1977-02-25', '', 'New No.18, West Cross Street\r\nNatesa Nagar,virugambakam\r\nChennai - 600092\r\nTamilnadu\r\n', 'BNXPS0404B', 'CHEP02618A', '349N', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(453, '', 'R  SENTHIL A RAJENDRAN', 'individual', '', '', '', '', '', '1977-02-25', '', 'No.3, 9th Street,, Tansi Nagar\r\nVelachery\r\nChennai - 600042\r\nTamil Nadu\r\n', 'AGPPR9610N', 'CHEP02618A', 'V-106', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(454, '', 'R  SENTHILKUMAR', 'individual', '', '', '', '', '', '1978-05-26', '', '3, Sakthivel Nagar, Sivan Koil South Mada Street\r\nThiruverkadu\r\nChennai - 600077\r\nTamilnadu\r\n', 'AAWPS8810N', 'CHEP02618A', '330', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(455, '', 'R  SIVAGAMASUNDARI', 'individual', '', '', '', '', '', '1975-08-20', '', '4/18, Kumaran Colony, 9th Murugan Street\r\nVadapalani\r\nChennai - 600026\r\nTamilnadu\r\n', 'APAPS1540L', 'CHEP02618A', '411A', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(456, '', 'R  SREE BHADRA', 'individual', '', '', '', '', '', '1974-08-31', '', '4, East Mada Street\r\nSrinagar Colony Saidapet\r\nChennai - 600015\r\nTamilnadu\r\n', 'ASVPS3432M', 'CHEP02618A', '341N', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(457, '', 'R  SRIDHAR', 'individual', '', '', '', '', '', '1956-08-20', '', '115, 5th Cross Street Thirupathi Nagar ,anjaneyar Templ\r\nValasarawakkam\r\nChennai - 600087\r\nTamilnadu\r\n', 'BJFPS2186G', 'CHEP02618A', '384', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(458, '', 'R  SRIRAM', 'individual', '', '', '', '', '', '1967-05-09', '', 'Flat No.t-2, Murugan Apts, No.17, Madavan Nair Rd\r\nMahalingapuram\r\nChennai - 600034\r\nTamilnadu\r\n', 'AHLPS7192P', 'CHEP02618A', 'S-021', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(459, '', 'R  SUBRAMANIAN', 'individual', '', '', '', '', '', '1958-03-28', '', '7, Sivan Koil North Cross Street\r\nThiruverkadu\r\nChennai - 600077\r\nTamilnadu\r\n', 'ALFPS9326K', 'CHEP02618A', '329', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(460, '', 'R  SUDHIR RAJA', 'individual', '', '', '', '', '', '1975-10-31', '', 'No.4, Srinagar Colony, East Mada Street\r\nSaidapet\r\nChennai - 600015\r\nTamilnadu\r\n', 'AOWPS9019K', 'CHEP02618A', '188', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(461, '', 'R  SULOCHANA', 'individual', '', '', '', '', '', '1957-02-18', '', '8, Poomagal Iv Street\r\nEkkatuthangal\r\nChennai - 600097\r\nTamilnadu\r\n', 'APAPS7454P', 'CHEP02618A', '228A', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(462, '', 'R  VENKATASUBRAMANIAN', 'individual', '', '', '', '', '', '1964-01-05', '', '5/860, Lake View, Third Cross Street\r\nIyyappa Nagar, Madipakkam\r\nChennai - 600091\r\nTamilnadu\r\n', 'ABRPV9753D', 'CHEP02618A', '163N', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(463, '', 'R B HIMA RAM', 'individual', '', '', '', '', '', '1982-03-14', '', '15, August, Annaji Nagar 1st Main Road\r\nWest K K Nagar\r\nChennai - 600078\r\nTamilnadu\r\n', 'ACIPH1691L', 'CHEP02618A', 'H002', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(464, '', 'R G APPAREL', 'individual', '', '', '', '', '', '1982-03-14', '', '10, Amarjothi Garden, Railway Feeder Road, Uthukuli Road\r\nTirupur\r\nTirupur - 641601\r\nTamilnadu\r\n', 'AAIFR6437L', 'CMBR04816A', 'TEMP2', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(465, '', 'R G PRAVEEN', 'individual', '', '', '', '', '', '1990-09-30', '', 'T39b, Eighth Street\r\nAnna Nagar\r\nChennai - 600040\r\nTamilnadu\r\n', 'CFRPP6974C', 'CMBR04816A', '301-B', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(466, '', 'R G SHARADA', 'individual', '', '', '', '', '', '1989-03-28', '', 'T39b, Eighth Street\r\nAnna Nagar\r\nChennai - 600040\r\nTamilnadu\r\n', 'EUHPS4786N', 'CMBR04816A', '301-A', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(467, '', 'R G VASANTHI', 'individual', '', '', '', '', '', '1966-10-19', '', 'T39b, Eighth Street\r\nAnna Nagar\r\nChennai - 600040\r\nTamilnadu\r\n', 'AADPV0258Q', 'CMBR04816A', '371', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(468, '', 'R JYOTHI MENON', 'individual', '', '', '', '', '', '1980-09-12', '', '5/3b, 3rd Cross Street\r\nNgo Colony,vadapalani\r\nChennai - 600026\r\nTamilnadu\r\n', 'AGEPJ4986G', 'CMBR04816A', 'IT-497A', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(469, '', 'R K AKSHAYA GEETHA', 'individual', '', '', '', '', '', '1971-12-22', '', '46/22, Srinivasa Reddy Street\r\nT.nagar\r\nChennai - 600017\r\nTamilnadu\r\n', 'AIIPG4657P', 'CMBR04816A', '104A', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(470, '', 'R M CHOCKALINGAM', 'individual', '', '', '', '', '', '1943-03-08', '', '42, Dr.raghavan Colony\r\nVadapalani\r\nChennai - 600026\r\nTamilnadu\r\n', 'AACPC6332M', 'CMBR04816A', 'IT-126', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(471, '', 'R NARAYANAN@ SIRPY', 'individual', '', '', '', '', '', '1962-05-25', '', '10, Logaiah Colony, Iii Street\r\nSaligramam\r\nChennai - 600093\r\nTamilnadu\r\n', 'AABPN2083K', 'CMBR04816A', '332', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(472, '', 'R S RAMAN', 'individual', '', '', '', '', '', '1938-09-15', '', 'Plot No 1053 New No 65, Munusamy Salai\r\nWest K K Nagar\r\nChennai - 600078\r\nTamilnadu\r\n', 'AAEPR6893A', 'CMBR04816A', 'MIS111', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(473, '', 'R.  ARUMUGAM', 'individual', '', '', '', '', '', '1959-05-03', '', '19, Gandhi Nagar Main Road\r\nEkkatuthangal\r\nChennai - 600 097\r\nTamilnadu\r\n', 'AEYPA5078E', 'CMBR04816A', '139', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(474, '', 'R.  BHOOMA RAM', 'individual', '', '', '', '', '', '1959-04-24', '', '15, August, Annaji Nagar I Main Road\r\nK.k.nagar West\r\nChennai - 600078\r\nTamilnadu\r\n', 'AADPR5399C', 'CMBR04816A', 'IT-105', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(475, '', 'R.  NARAYANASAMY', 'individual', '', '', '', '', '', '1936-09-15', '', '2, Palayakaran Street\r\nEkkattuthangal\r\nChennai - 600097\r\nTamilnadu\r\n', 'ABPPN6390N', 'CMBR04816A', '255', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(476, '', 'R.  SAKKUBAI', 'individual', '', '', '', '', '', '1942-10-02', '', '28, Vengeesewarar Nagar, Ii Main Road\r\nVadapalani\r\nChennai - 600 026\r\nTamilnadu\r\n', 'BGCPS5740L', 'CMBR04816A', 'IT-477', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(477, '', 'R.  SASIKUMAR', 'individual', '', '', '', '', '', '1959-10-06', '', '113/1, Basker Colony, Third Street\r\nVirgambakkam\r\nChennai - 600092\r\nTamilnadu\r\n', 'APGPS8775M', 'CMBR04816A', '297', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(478, '', 'RAJ  KISHOR', 'individual', '', '', '', '', '', '1962-06-04', '', '2/12, Ngo Colony,b.v.nagar, 3rd Street\r\nPalvanthangal\r\nChennai - 600114\r\nTamilnadu\r\n', 'ADSPR2926D', 'CMBR04816A', '454B', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(479, '', 'RAJSEKAR  DANIEL', 'individual', '', '', '', '', '', '1973-02-05', '', '2048/h, Jothi Apartments-old H Bl, 5th Street, 12th Main Road\r\nAnna Nagar\r\nChennai - 600040\r\nTamilnadu\r\n', 'AHBPD1376Q', 'CMBR04816A', 'IT-402', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(480, '', 'RAM INFOTECH', 'individual', '', '', '', '', '', '1973-02-05', '', '-2048/h, Jothi Apartments-old H Bl, 5th Street, 12th Main Road\r\nAnna Nagar\r\nChennai - 600040\r\nTamilnadu\r\n', 'AHBPD1376Q', 'CMBR04816A', 'RCC-101', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(481, '', 'RAMANI  CHANDRASAYKAR', 'individual', '', '', '', '', '', '1960-01-06', '', '5, Vee Are Manere, Srinivasa Iyer\r\nWest Mambalam\r\nChennai - 600033\r\nTamilnadu\r\n', 'AAUPC3200A', 'CMBR04816A', '414N', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(482, '', 'RAMANI IYER', 'company', '', '', '', '', '', '2004-10-20', '', '115, 5th Cross Street Thirupathi Nagar ,anjaneyar Templ\r\nValasarawakkam\r\nChennai - 600087\r\nTamilnadu\r\n', 'AAUPC3200A', 'CMBR04816A', '385', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(483, '', 'RAMAYYAN  KALAIARASI', 'individual', '', '', '', '', '', '1970-05-28', '', '5, Vgp Selva Nagar\r\nVelachery\r\nChennai - 600042\r\nTamilnadu\r\n', 'AAPPK2561D', 'CMBR04816A', 'V-148', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(484, '', 'RAMESH  BABU', 'individual', '', '', '', '', '', '1971-04-28', '', '1/181, 1 Street\r\nPeriyar Nagar, Poonamallee\r\nChennai - 600 056\r\nTamilnadu\r\n', 'AAPPK2561D', 'CMBR04816A', 'IT-400', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(485, '', 'RANGA NURSERY AND PRIMARY SCHOOL', 'company', '', '', '', '', '', '2007-01-05', '', '46, Gill Nagar, First Street\r\nChoolaimedu\r\nChennai - 600094\r\nTamilnadu\r\n', 'AAKFR0954N', 'CMBR04816A', '215', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(486, '', 'RANUMA TECH PRIVATE LIMITED', 'company', '', '', '', '', '', '2009-05-25', '', '721, Npl Pushpanjali, 1, Thirumangalam Road\r\nVillivakkam\r\nChennai - 600049\r\nTamilnadu\r\n', 'AAECR3795G', 'CHER10842G', 'V-144', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(487, '', 'RAVI KRISHNAMURTHY SHANKAR', 'individual', '', '', '', '', '', '1972-07-07', '', '1, Bharathidasan Street\r\nM.g.r Nagar\r\nChennai - 600078\r\nTamilnadu\r\n', 'BCOPS0969M', 'CHER10842G', '379', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(488, '', 'REFRAME SOFT TECH PRIVATE LIMITED', 'company', '', '', '', '', '', '2010-11-02', '', 'First Floor New No.1, Old No.12, Shree Vasantham, Appuu Street, First Lane\r\nSanthome\r\nChennai - 600004\r\nTamilnadu\r\n', 'AANCS7529J', 'CHES33545B', '246N', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(489, '', 'RIFA SYSTEMS PRIVATE LIMITED', 'company', '', '', '', '', '', '1995-10-13', '', '204, Academy Court, Purasawakkam High Road\r\nVepery\r\nChennai - 600007\r\nTamilnadu\r\n', 'AABCR8423N', 'CHER02327D', '101', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(490, '', 'RM C RUKMANI', 'individual', '', '', '', '', '', '1952-04-18', '', '42, Dr.raghavan Colony\r\nVadapalani\r\nChennai - 600026\r\nTamilnadu\r\n', 'ADRPR4898P', 'CHER02327D', 'IT-130', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(491, '', 'ROSE  ABRAHAM', 'individual', '', '', '', '', '', '1979-08-31', '', 'New No.4/27/1(old No.2), Bella Vista, Sunrise Avenue\r\nNeelankarai\r\nChennai - 600041\r\nTamilnadu\r\n', 'ACCPR5092B', 'CHER02327D', 'IT-212', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(492, '', 'S  ARAVIND', 'individual', '', '', '', '', '', '1979-08-04', '', 'No.7, 2 Nd Street,r.e.nagar\r\n5th Street, Porur\r\nChennai - 600116\r\nTamilnadu\r\n', 'AGUPA2365E', 'CHER02327D', 'S-037', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(493, '', 'S  BAGAVATHY', 'individual', '', '', '', '', '', '1974-07-30', '', 'Door-2, Third Floor, Vasanth Apartments, 10, Maduraisamy Madam Street\r\nPerambur\r\nChennai - 600011\r\nTamilnadu\r\n', 'ANQPB1696Q', 'CHER02327D', '375B', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(494, '', 'S  BALASUBRAMANIAN', 'individual', '', '', '', '', '', '1967-03-24', '', 'No.5, First Street,subbarayan Nagar\r\nKodambakkam\r\nChennai - 600024\r\nTamilnadu\r\n', 'AADPB1109Q', 'CHER02327D', '140', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(495, '', 'S  BEER MOHIDEEN', 'individual', '', '', '', '', '', '1965-07-07', '', '9/415, B Type, Sidco Nagar\r\nVillivakkam\r\nChennai - 600049\r\nTamilnadu\r\n', 'ANMPB7527Q', 'CHER02327D', '374N', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(496, '', 'S  DEVAKI', 'individual', '', '', '', '', '', '1957-02-20', '', '61/2, Perumal Koil Street\r\nSaidapet\r\nChennai - 600015\r\nTamilnadu\r\n', 'AGXPD8929L', 'CHER02327D', '243', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(497, '', 'S  GANAPATHY', 'individual', '', '', '', '', '', '1969-04-12', '', 'Flat.b9/d.no.38, Aziz Nagar Iii Street, Parangusapuram Street\r\nKodambakkam\r\nChennai - 600024\r\nTamilnadu\r\n', 'AEXPG8168C', 'CHER02327D', 'IT-183', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(498, '', 'S  GOWTHAMAN', 'individual', '', '', '', '', '', '1958-04-13', '', '3, Kamaraj Nagar, 8th East Street\r\nThiruvanmiyur\r\nChennai - 600041\r\nTamilnadu\r\n', 'AANPG4257C', 'CHER02327D', '197', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(499, '', 'S  JAGADEESAN', 'individual', '', '', '', '', '', '1982-10-25', '', '61/2, Perumal Koil Street\r\nSaidapet\r\nChennai - 600015\r\nTamilnadu\r\n', 'AFEPJ8129C', 'CHER02327D', '244', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(500, '', 'S  JAYARAJ', 'individual', '', '', '', '', '', '1976-11-16', '', '9, Anand Block,503, Choolaimedu High Road, Chitra Avenue\r\nChoolaimedu\r\nChennai - 600094\r\nTamilnadu\r\n', 'AUTPS6419C', 'CHER02327D', 'IT-407', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(501, '', 'S  JEYAPRADHABAN', 'individual', '', '', '', '', '', '1949-03-12', '', 'Ts-70, Sidco, Development Plot\r\nEkkattuthangal\r\nChennai - 600097\r\nTamilnadu\r\n', 'AAEPJ0173H', 'CHER02327D', '289', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(502, '', 'S  JEYAPRAKASH', 'individual', '', '', '', '', '', '1957-01-15', '', '293a, Ist Floor, 38th Street,7th Sector\r\nK.k.nagar\r\nChennai - 600078\r\nTamilnadu\r\n', 'AHFPJ0148L', 'CHER02327D', '388A', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(503, '', 'S  KANAGASABAI', 'individual', '', '', '', '', '', '1981-05-16', '', '180/33, Mathiyalagan Street\r\nNehru Nagar, Velachery\r\nChennai - 600042\r\nTamilnadu\r\n', 'BBGPK7988D', 'CHER02327D', 'V-137', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(504, '', 'S  KANNAN', 'individual', '', '', '', '', '', '1976-11-19', '', '14, Murugesan Street\r\nVirugambakkam\r\nChennai - 600092\r\nTamilnadu\r\n', 'BRIPK5381A', 'CHER02327D', '408B', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(505, '', 'S  KESAVAKUMAR', 'individual', '', '', '', '', '', '1973-05-07', '', '50/75, Collector Nagar, Ii Street\r\nMogappair\r\nChennai - 600050\r\nTamilnadu\r\n', 'AKNPK2393K', 'CHER02327D', 'IT-333', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(506, '', 'S  KRISHNASWAMY', 'individual', '', '', '', '', '', '1947-05-15', '', 'Ts-69, Industrial Estate\r\nEkkattuthangal\r\nChennai - 600097\r\nTamilnadu\r\n', 'AFRPK4278E', 'CHER02327D', '211', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(507, '', 'S  LAKSHMINARAYANAN', 'individual', '', '', '', '', '', '1969-05-04', '', '17, Gandhi Nagar, Thandavarayan Street\r\nEkkattuthangal\r\nChennai - 600097\r\nTamilnadu\r\n', 'ACWPL3079Q', 'CHER02327D', '348N', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(508, '', 'S  MAHENDRAKUMAR', 'individual', '', '', '', '', '', '1971-06-27', '', 'K-7, Ashiana Apartments, 9, Venus Colony Ii Street\r\nAlwarpet\r\nChennai - 600018\r\nTamilnadu\r\n', 'ADRPM8038J', 'CHER02327D', '178', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(509, '', 'S  MANIVASAGAM', 'individual', '', '', '', '', '', '1971-06-26', '', '3/2, Aishwarya Apts., Old No. G43 (new No G76) First Avenue\r\nAnna Nagar East\r\nChennai - 600102\r\nTamilnadu\r\n', 'AKCPM7356F', 'CHER02327D', '320', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(510, '', 'S  MEENA', 'individual', '', '', '', '', '', '1975-02-07', '', '1114, Bobli Raja Salai\r\nK.k.nagar\r\nChennai - 600078\r\nTamilnadu\r\n', 'AGMPM8317J', 'CHER02327D', '269A', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(511, '', 'S  NAGARAJAN', 'individual', '', '', '', '', '', '1956-06-26', '', 'No.3/2a, S.m.b.nivas, Rajeswari Street, Anish Nagar\r\nRamapuram\r\nChennai - 600089\r\nTamilnadu\r\n', 'ACUPN2970L', 'CHER02327D', '148N', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(512, '', 'S  OMKARAM', 'individual', '', '', '', '', '', '1985-08-12', '', '115, 5th Cross Street Thirupathi Nagar ,anjaneyar Templ\r\nValasarawakkam\r\nChennai - 600087\r\nTamilnadu\r\n', 'AAKPO3181E', 'CHER02327D', '387', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(513, '', 'S  PRABAKAR', 'individual', '', '', '', '', '', '1985-08-12', '', '-115, 5th Cross Street Thirupathi Nagar ,anjaneyar Templ\r\nValasarawakkam\r\nChennai - 600087\r\nTamilnadu\r\n', 'AAKPO3181E', 'CHER02327D', 'D-101', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(514, '', 'S  PRIYA', 'individual', '', '', '', '', '', '1980-04-15', '', 'T1, 2nd Block, Ssl Green Park,kundrathur Main Road\r\nMadanandapuram\r\nChennai - 600116\r\nTamilnadu\r\n', 'ALBPP0327P', 'CHER02327D', '158A', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(515, '', 'S  RAJAMONEY', 'individual', '', '', '', '', '', '1939-09-23', '', 'No.3, 9th Street,, Tansi Nagar\r\nVelachery\r\nChennai - 600042\r\nTamilnadu\r\n', 'AFYPR4172D', 'CHER02327D', 'V-149', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(516, '', 'S  RAJESH KANNA', 'individual', '', '', '', '', '', '1982-11-24', '', 'Plot No.65, Kavignar Kannadasan Nagar, 5th Street\r\nRamapuram\r\nChennai - 600089\r\nTamilnadu\r\n', 'AKQPR7778A', 'CHER02327D', '404-N', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(517, '', 'S  RAJINI', 'individual', '', '', '', '', '', '1974-03-23', '', 'J85, Govind Flats, Ii Floor\r\nVenkatesh Nagar Virugambakkam\r\nChennai - 600092\r\nTamilnadu\r\n', 'ANLPR9621A', 'CHER02327D', 'S-38', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(518, '', 'S  RAMALINGAM', 'individual', '', '', '', '', '', '1947-08-18', '', '15, August, Annaji First Main Road\r\nK.k.nagar West\r\nChennai - 600078\r\nTamilnadu\r\n', 'AABPR2137C', 'CHER02327D', 'IT-298', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(519, '', 'S  RATHAN DEV', 'individual', '', '', '', '', '', '1987-02-19', '', '109/44, Rangarajapuram Main Road\r\nKodambakkam\r\nChennai - 600024\r\nTamilnadu\r\n', 'AMZPR2001F', 'CHER02327D', 'H005', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(520, '', 'S  SANKAR', 'individual', '', '', '', '', '', '1966-06-26', '', 'T1, 2nd Block, Ssl Green Park, Kundrathur Main Road\r\nMadanandhapuram,porur\r\nChennai - 600116\r\nTamilnadu\r\n', 'AXLPS0277K', 'CHER02327D', '158', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(521, '', 'S  SANKARANARAYANAN', 'individual', '', '', '', '', '', '1965-07-15', '', '3a/13, Cee Dee Yes Enclave, 100 Ft Road, Tansi Nagar\r\nVelachery\r\nChennai - 600042\r\nTamilnadu\r\n', 'ANUPS5266R', 'CHER02327D', 'V-119', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(522, '', 'S  SARAVANAN', 'individual', '', '', '', '', '', '1981-02-06', '', '61/2, Perumal Koil Street\r\nSaidapet\r\nChennai - 600015\r\nTamilnadu\r\n', 'EAQPS8006G', 'CHER02327D', '244A', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(523, '', 'S  SENTHIL KUMAR', 'individual', '', '', '', '', '', '1978-11-04', '', '14, Murugesan Street\r\nVirugambakkam\r\nChennai - 600092\r\nTamilnadu\r\n', 'BLBPS6287E', 'CHER02327D', '408C', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(524, '', 'S  SENTHILRAJA', 'individual', '', '', '', '', '', '1985-02-07', '', '3/1925, Tnhb\r\nTiruvallur\r\nChennai - 602025\r\nTamilnadu\r\n', 'CIEPS7958F', 'CHER02327D', '422', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(525, '', 'S  SHANTHA KUMAR', 'individual', '', '', '', '', '', '1976-06-07', '', '1, Srinivasa Street\r\nWest K.k.nagar\r\nChennai - 600078\r\nTamilnadu\r\n', 'AUYPS4300D', 'CHER02327D', '393', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(526, '', 'S  SIVARAMAN', 'individual', '', '', '', '', '', '1945-01-14', '', '15, August, Annaji First Main Road\r\nK.k.nagar West\r\nChennai - 600078\r\nTamilnadu\r\n', 'ABHPS8445B', 'CHER02327D', 'IT-104', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(527, '', 'S  SRIMURUGAN', 'individual', '', '', '', '', '', '1980-10-18', '', '115, 5th Cross Street Thirupathi Nagar,anjaneyar Temple\r\nValasarawakkam\r\nChennai - 600087\r\nTamilnadu\r\n', 'BJFPS2184E', 'CHER02327D', '386', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(528, '', 'S  SUNIL RAJA', 'individual', '', '', '', '', '', '1979-11-10', '', 'Besant Nagar\r\nChennai. - 600090\r\nTamilnadu\r\n-\r\n', 'ATCPS9624B', 'CHER02327D', 'V-125', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(529, '', 'S  SYMALA DEVI', 'individual', '', '', '', '', '', '1949-07-16', '', '3/2, Aishwarya Apartments, Old No.g43 (new G76)\r\nFirst Avenue, Anna Nagar East\r\nChennai - 600102\r\nTamilnadu\r\n', 'AXMPS7009N', 'CHER02327D', '318', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(530, '', 'S  THIRUNAVUKKARASU', 'individual', '', '', '', '', '', '1962-07-28', '', '162/42, Mambalam High Road\r\nT.nagar\r\nChennai - 600017\r\nTamilnadu\r\n', 'ABZPT0563D', 'CHER02327D', 'IT-173', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(531, '', 'S  THIVYANATHAN', 'individual', '', '', '', '', '', '1949-07-06', '', '12, V.o.c Nagar 4th Cross Street, V.k.p Nagar\r\nAyyanchery, Oorapakkam\r\nChennai - 603302\r\nTamilnadu\r\n', 'AICPT0387R', 'CHER02327D', 'V-135', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(532, '', 'S  VEERARAGHAVAN', 'individual', '', '', '', '', '', '1944-12-09', '', 'No.6, Dasan Street\r\nGokulam Colony,pamal\r\nChennai - 600075\r\nTamilnadu\r\n', 'AFJPV9071L', 'CHER02327D', '164N', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(533, '', 'S  VIJAYAKANTH', 'individual', '', '', '', '', '', '1972-06-07', '', '118a, Sri Ranga Home, East Vanniyar Street\r\nWest K K Nagar\r\nChennai - 600078\r\nTamilnadu\r\n', 'ACVPV1064C', 'CHER02327D', 'MIS139', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(534, '', 'S  VIJAYAKUMAR', 'individual', '', '', '', '', '', '1962-06-22', '', '2, 6th Street,dr.subbrayan Nagarra\r\nKodambakkam\r\nChennai - 600024\r\nTamilnadu\r\n', 'AAIPS2015D', 'CHER02327D', 'IT-370', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(535, '', 'S  VIJAYAKUMAR', 'individual', '', '', '', '', '', '1950-10-10', '', 'No.18, Ambal Nagar, Thiruvalluvar Street\r\nEkkattuthangal\r\nChennai - 600097\r\nTamilnadu\r\n', 'ACGPV3700Q', 'CHER02327D', '192', '', '2014-04-30 19:45:05', '2014-04-30 19:45:05', 'active'),
(536, '', 'S  VIJAYAKUMAR', 'individual', '', '', '', '', '', '1950-10-10', '', '18, Ambal Nagar, Thiruvalluvar Stret\r\nEkkattuthangal\r\nChennai - 600097\r\nTamilnadu\r\n', 'ACGPV3700Q', 'CHER02327D', 'REC1', '', '2014-04-30 19:45:06', '2014-04-30 19:45:06', 'active'),
(537, '', 'S  VINAYAGA MURTHY', 'individual', '', '', '', '', '', '1975-07-15', '', '14, Murugesan Street\r\nVirugambakkam\r\nChennai - 600092\r\nTamilnadu\r\n', 'AIZPV6225B', 'CHER02327D', '408A', '', '2014-04-30 19:45:06', '2014-04-30 19:45:06', 'active'),
(538, '', 'S A C  VASANTH', 'individual', '', '', '', '', '', '1974-08-22', '', '57, Ishwaryam, B.r.puram Layout, Rajiv Gandhi Nagar Phase -1\r\nSowripalayam\r\nCoimbatore - 641028\r\nTamilnadu\r\n', 'ACYPV7725P', 'CHER02327D', 'V-140', '', '2014-04-30 19:45:06', '2014-04-30 19:45:06', 'active'),
(539, '', 'S AMUDHA MAHENDRAKUMAR', 'individual', '', '', '', '', '', '1972-02-05', '', 'K-7, Ashiana Apartments, 9, Venus Colony Ii Street\r\nAlwarpet\r\nChennai - 600018\r\nTamilnadu\r\n', 'AEIPA7030G', 'CHER02327D', '178A', '', '2014-04-30 19:45:06', '2014-04-30 19:45:06', 'active'),
(540, '', 'S G SATHEESH KUMAR', 'individual', '', '', '', '', '', '1978-08-24', '', '33\r\nOfficers Colony,porur\r\nChennai - 600116\r\nTamilnadu\r\n', 'BGAPS7240D', 'CHER02327D', '144N', '', '2014-04-30 19:45:06', '2014-04-30 19:45:06', 'active'),
(541, '', 'S M KAMUR NISA', 'individual', '', '', '', '', '', '1962-10-13', '', 'G-1 New No.5, Malar Olive, New Colony 8th Street\r\nAdambakkam\r\nChennai - 600088\r\nTamilnadu\r\n', 'AUYPS4289D', 'CHER02327D', 'MIS-104', '', '2014-04-30 19:45:06', '2014-04-30 19:45:06', 'active'),
(542, '', 'S N NATARAJAN', 'individual', '', '', '', '', '', '1981-11-26', '', '3/2a, Smb Nivas, Rajeswari Street\r\nAnish Nagar, Ramapuram\r\nChennai - 600089\r\nTamilnadu\r\n', 'ACYPN4028K', 'CHER02327D', '149N', '', '2014-04-30 19:45:06', '2014-04-30 19:45:06', 'active'),
(543, '', 'S N PARAMESHWARAN', 'individual', '', '', '', '', '', '1980-06-29', '', '3/2a, Smb Nivas Anish Nagar, Rajeshwari Street\r\nRamapuram\r\nChennai - 600089\r\nTamilnadu\r\n', 'AJLPP8731F', 'CHER02327D', '150N', '', '2014-04-30 19:45:06', '2014-04-30 19:45:06', 'active'),
(544, '', 'S N SUBBURAJ', 'individual', '', '', '', '', '', '1967-04-24', '', 'Door-2, Third Floor, Vasanth Apartments, Madurai Samy Mada Street\r\nPerambur\r\nChennai - 600011\r\nTamilnadu\r\n', 'ASJPS0015Q', 'CHER02327D', '375A', '', '2014-04-30 19:45:06', '2014-04-30 19:45:06', 'active'),
(545, '', 'S N THANGARAJ', 'individual', '', '', '', '', '', '1961-01-21', '', '29, Kamaraj Nagar, Rajeswari Street\r\nChoolaimedu\r\nChennai - 600094\r\nTamilnadu\r\n', 'ABTPT5058R', 'CHER02327D', '375', '', '2014-04-30 19:45:06', '2014-04-30 19:45:06', 'active'),
(546, '', 'S R BHAGAVATHI SUMITHA', 'individual', '', '', '', '', '', '1975-10-22', '', 'No.2, Sakthisaradhambika Apartmants, Minor Trustpuram Street\r\nKodambakkam\r\nChennai - 600094\r\nTamilnadu\r\n', 'AMKPB9862F', 'CHER02327D', 'MIS-109', '', '2014-04-30 19:45:06', '2014-04-30 19:45:06', 'active'),
(547, '', 'S R SELVAKUMAR', 'individual', '', '', '', '', '', '1978-03-29', '', '15, August, Annaji Nagar I Main Road\r\nWest K.k.nagar\r\nChennai - 600078\r\nTamilnadu\r\n', 'AZJPS1677H', 'CHER02327D', 'IT-163A', '', '2014-04-30 19:45:06', '2014-04-30 19:45:06', 'active'),
(548, '', 'S.  ANAND', 'individual', '', '', '', '', '', '1957-01-13', '', 'No.50, Kannigapuram Ist Street\r\nK.k.nagar\r\nChennai - 600078\r\nTamil Nadu\r\n', 'AHCPA2944G', 'CHER02327D', '233', '', '2014-04-30 19:45:06', '2014-04-30 19:45:06', 'active'),
(549, '', 'S.  ARUMUGAM', 'individual', '', '', '', '', '', '1954-08-27', '', '5,, Ramampuram Ramasamy Street\r\nSaidapet\r\nChennai - 600015\r\nTamilnadu\r\n', 'AAMPA7736K', 'CHER02327D', '137', '', '2014-04-30 19:45:06', '2014-04-30 19:45:06', 'active'),
(550, '', 'S.  JAYARAJ', 'individual', '', '', '', '', '', '1967-04-27', '', '11, Annai Sathya Nagar, 1st Street\r\nRamapuram\r\nChennai - 600089\r\nTamilnadu\r\n', 'ADQPJ2901A', 'CHER02327D', '364', '', '2014-04-30 19:45:06', '2014-04-30 19:45:06', 'active'),
(551, '', 'S.  KARUPPUCHAMY', 'individual', '', '', '', '', '', '1970-10-20', '', '6, Karikalan Street\r\nMgr Nagar\r\nChennai - 600078\r\nTamilnadu\r\n', 'AQSPK7459D', 'CHER02327D', '156N', '', '2014-04-30 19:45:06', '2014-04-30 19:45:06', 'active'),
(552, '', 'S.  SATHYASREE', 'individual', '', '', '', '', '', '1978-11-03', '', '1, Srinivasa Street\r\nWest K.k.nagar\r\nChennai - 600078\r\nTamil Nadu\r\n', 'AQCPS7295R', 'CHER02327D', 'IT-421', '', '2014-04-30 19:45:06', '2014-04-30 19:45:06', 'active'),
(553, '', 'S.  SUBRAMONIA PILLAI', 'individual', '', '', '', '', '', '1946-05-21', '', '10, M P T Officers Quarters\r\nTirisulam\r\nChennai - 600043\r\nTamilnadu\r\n', 'AGIPS3755Q', 'CHER02327D', 'S-031N', '', '2014-04-30 19:45:06', '2014-04-30 19:45:06', 'active'),
(554, '', 'S. K. PARIVALLAL', 'individual', '', '', '', '', '', '1964-01-06', '', 'Old No. 7/8, New No.13,, Karmel Car Street\r\nPallikaranai,\r\nChennai - 601302\r\nTamilnadu\r\n', 'AMHPP1526D', 'CHER02327D', '223', '', '2014-04-30 19:45:06', '2014-04-30 19:45:06', 'active'),
(555, '', 'S. M. FAROOQ ALI', 'individual', '', '', '', '', '', '1963-05-12', '', '5, Sai Srinivasa, First Cross Street\r\nVijaya Nagar\r\nVelachery - 600042\r\nChennai\r\n', 'AAHPF6508M', 'CHER02327D', 'V-115', '', '2014-04-30 19:45:06', '2014-04-30 19:45:06', 'active');
INSERT INTO `clients` (`id`, `title`, `full_name`, `client_type`, `phone_mobile`, `phone_home`, `phone_office`, `phone_mobile2`, `phone_office2`, `dob`, `email`, `address`, `pan`, `tan`, `genius_id`, `file_id`, `create_date`, `update_date`, `status`) VALUES
(556, '', 'S. RAM AND CO.', 'company', '', '', '', '', '', '1995-01-05', '', '63, East Vanniar Street\r\nWest K.k.nagar\r\nChennai - 600078\r\nTamilnadu\r\n', 'AARFS6334C', 'CHES29898B', 'IT-253', '', '2014-04-30 19:45:06', '2014-04-30 19:45:06', 'active'),
(557, '', 'S. SELVI SHANTHI', 'individual', '', '', '', '', '', '1968-06-07', '', '44/29, Dr.ghanu Nagar, 4th Anna Street\r\nNesapakkam\r\nChennai - 600 078\r\nTamil Nadu\r\n', 'AXRPS0388R', 'CHES29898B', '321A', '', '2014-04-30 19:45:06', '2014-04-30 19:45:06', 'active'),
(558, '', 'SAGAYARAJA  MARIADASS', 'individual', '', '', '', '', '', '1973-07-27', '', 'New No.47, Old No.947, 66th Street, 11 Th Sector\r\nK.k.nagar\r\nChennai - 600078\r\nTamilnadu\r\n', 'AOFPM3488P', 'CHES29898B', 'MIS-105', '', '2014-04-30 19:45:06', '2014-04-30 19:45:06', 'active'),
(559, '', 'SAHARAJ', 'individual', '', '', '', '', '', '1973-07-27', '', '-New No.47, Old No.947, 66th Street, 11 Th Sector\r\nK.k.nagar\r\nChennai - 600078\r\nTamilnadu\r\n', 'AOFPM3488P', 'CHES29898B', '12', '', '2014-04-30 19:45:06', '2014-04-30 19:45:06', 'active'),
(560, '', 'SALAM RAJENDRA BABU', 'individual', '', '', '', '', '', '1962-03-15', '', '5, Vgp Selva Nagar\r\nVelachery\r\nChennai - 600042\r\nTamilnadu\r\n', 'AOZPS6677N', 'CHES29898B', 'V-147', '', '2014-04-30 19:45:06', '2014-04-30 19:45:06', 'active'),
(561, '', 'SAMEER', 'individual', '', '', '', '', '', '1962-03-15', '', '2nd Cross Road, C.i.t. Campus\r\nTaramani\r\nChennai - 600113\r\nTamilnadu\r\n', 'AOZPS6677N', 'CHES29898B', 'A-30', '', '2014-04-30 19:45:06', '2014-04-30 19:45:06', 'active'),
(562, '', 'SAMUEL RAJA SUNDARAM PAUL', 'individual', '', '', '', '', '', '1954-09-14', '', '4, Third Street\r\nAndavar Nagar,kodambakkam\r\nChennai - 600024\r\nTamilnadu\r\n', 'AMFPS9775B', 'CHES29898B', '136', '', '2014-04-30 19:45:06', '2014-04-30 19:45:06', 'active'),
(563, '', 'SANGEETHA  DURAISAMY', 'individual', '', '', '', '', '', '1977-06-13', '', '4, Arudhra Clinic, M.g.chakrapani Street\r\nSaligramam\r\nChennai - 600093\r\nTamilnadu\r\n', 'AIRPD3178M', 'CHES29898B', 'V-142', '', '2014-04-30 19:45:06', '2014-04-30 19:45:06', 'active'),
(564, '', 'SARADA  GURUNATHAN', 'individual', '', '', '', '', '', '1950-09-30', '', '1114, Bobli Raja Salai\r\nK.k.nagar\r\nChennai - 600078\r\nTamilnadu\r\n', 'AMLPS0450K', 'CHES29898B', '268', '', '2014-04-30 19:45:06', '2014-04-30 19:45:06', 'active'),
(565, '', 'SARADA KULACHANDRAN', 'individual', '', '', '', '', '', '1959-02-17', '', '8, Ponmanachemmal Street\r\nMgr Nagar\r\nChennai - 600078\r\nTamilnadu\r\n', 'AMLPS0450K', 'CHES29898B', 'S-37', '', '2014-04-30 19:45:06', '2014-04-30 19:45:06', 'active'),
(566, '', 'SARASWATHI METAL FAB', 'company', '', '', '', '', '', '2002-01-09', '', '65/1, Plot No.22, Tass Industrial Estate\r\nAmbattur\r\nChennai - 600098\r\nTamilnadu\r\n', 'AAWFS5698A', 'CHES35526B', '274A', '', '2014-04-30 19:45:06', '2014-04-30 19:45:06', 'active'),
(567, '', 'SATHIYANATHAN  FLORA', 'individual', '', '', '', '', '', '1963-11-21', '', 'Old No.24/new No.58, 18th Cross Street, Kakkanchavadi\r\nTambaram Sanitorium\r\nChenai - 600049\r\nTamilnadu\r\n', 'CYDPS7370G', 'CHES35526B', 'MIS-133', '', '2014-04-30 19:45:06', '2014-04-30 19:45:06', 'active'),
(568, '', 'SAVITHRI  AMMAL', 'individual', '', '', '', '', '', '1943-07-24', '', '14/29, Poonamallee Road\r\nEkkattuthangal\r\nChennai - 600097\r\nTamilnadu\r\n', 'AWPPS6287E', 'CHES35526B', '336', '', '2014-04-30 19:45:06', '2014-04-30 19:45:06', 'active'),
(569, '', 'SHANKAR  GUHAN', 'individual', '', '', '', '', '', '1975-09-29', '', '4, Arudhra Clinic, M.g.chakrapani Street\r\nSaligramam\r\nChennai - 600093\r\nTamilnadu\r\n', 'BCJPS4025F', 'CHES35526B', 'V-129', '', '2014-04-30 19:45:06', '2014-04-30 19:45:06', 'active'),
(570, '', 'SHANMUGAM', 'individual', '', '', '', '', '', '1975-10-18', '', '-4, Arudhra Clinic, M.g.chakrapani Street\r\nSaligramam\r\nChennai - 600093\r\nTamilnadu\r\n', 'BCJPS4025F', 'CHES35526B', '710N', '', '2014-04-30 19:45:06', '2014-04-30 19:45:06', 'active'),
(571, '', 'SHANTHI   RAMANI', 'individual', '', '', '', '', '', '1966-01-07', '', 'No.19, Flat No .7, Srinivasa Apartments, 2nd Main Road, Gandhi Nagar\r\nAdyar\r\nChennai - 600020\r\nTamilnadu\r\n', 'ADWPS4756L', 'CHES35526B', '338', '', '2014-04-30 19:45:06', '2014-04-30 19:45:06', 'active'),
(572, '', 'SHANTHI  BEULLAH', 'individual', '', '', '', '', '', '1954-04-18', '', '70, Kalaimagal Nagar,ii Main Road\r\nEkkattuthangal\r\nChennai - 600097\r\nTamilnadu\r\n', 'AHWPB5075H', 'CHES35526B', '326', '', '2014-04-30 19:45:06', '2014-04-30 19:45:06', 'active'),
(573, '', 'SHILPA  GOPALDAS BANG', 'individual', '', '', '', '', '', '1978-10-15', '', '110, Raja Street, Dr. Seethapathy Nagar\r\nVelachery\r\nChennai - 600042\r\nTamilnadu\r\n', 'AIKPB4995R', 'CHES35526B', 'V-132', '', '2014-04-30 19:45:06', '2014-04-30 19:45:06', 'active'),
(574, '', 'SHOBANAH  KIRUBNATH', 'individual', '', '', '', '', '', '1973-09-15', '', 'B-20, Arcot Terrace, 160,arcot Road\r\nVadapalani\r\nChennai - 600026\r\nTamilnadu\r\n', 'BOIPS7580E', 'CHES35526B', '303AN', '', '2014-04-30 19:45:06', '2014-04-30 19:45:06', 'active'),
(575, '', 'SIVA SHANMUGA VADIVOO', 'individual', '', '', '', '', '', '1947-02-16', '', '18, Varghese Avenue\r\nAshok Nagar\r\nChennai - 600083\r\nTamilnadu\r\n', 'ABHPS7254G', 'CHES35526B', 'IT-128', '', '2014-04-30 19:45:06', '2014-04-30 19:45:06', 'active'),
(576, '', 'SONATA PARK', 'company', '', '', '', '', '', '2004-01-05', '', '41,, Syedhams Road\r\nPeraimet\r\nChennai - 600003\r\nTamilnadu\r\n', 'ABEFS3677C', 'CHES35526B', '260N', '', '2014-04-30 19:45:06', '2014-04-30 19:45:06', 'active'),
(577, '', 'SOUTHERN SCIENTIFIC INSTRUMENTS', 'company', '', '', '', '', '', '2009-01-22', '', '23 B/ 1, Alapakkam Main Road\r\nMaduravoyal\r\nChennai - 600095\r\nTamilnadu\r\n', 'ABOFS0947D', 'CHES32202C', '141A', '', '2014-04-30 19:45:06', '2014-04-30 19:45:06', 'active'),
(578, '', 'SOUTHERN SCIENTIFIC INSTRUMENTS (OLD)', 'company', '', '', '', '', '', '2002-06-13', '', '26, Easwaran Nagar, First Street\r\nKilkatalai\r\nChennai - 600117\r\nTamilnadu\r\n', 'ABAFS9428H', 'CHES32202C', 'IT-445N', '', '2014-04-30 19:45:06', '2014-04-30 19:45:06', 'active'),
(579, '', 'SOUTHERN SCIENTIFIC LAB INSTRUMENTS PVT LTD', 'company', '', '', '', '', '', '2006-07-26', '', '1, Ii Floor, Yadhaval Second Street\r\nVirugambakkam\r\nChennai - 600092\r\nTamilnadu\r\n', 'AAKCS1272K', 'CHES27429D', '141N', '', '2014-04-30 19:45:06', '2014-04-30 19:45:06', 'active'),
(580, '', 'SREEDHAR  SIVASHANMUGAM', 'individual', '', '', '', '', '', '1982-07-15', '', '36, C/o. Mr. Thooyavan, Ii West Cross Street\r\nAmaravathy Nagar, Arumbakkam\r\nChennai - 600106\r\nTamilnadu\r\n', 'BBUPS7505J', 'CHES27429D', 'IT-492A', '', '2014-04-30 19:45:06', '2014-04-30 19:45:06', 'active'),
(581, '', 'SREEDHARAN DR. A.', 'individual', '', '', '', '', '', '1974-03-11', '', 'A.V.R.EYE AND ENT CARE CENTRE\r\n9, 18th Avenue\r\nK.k.nagar, Chennai - 600078\r\nTamilnadu\r\n', 'AADPS5273L', 'CHES27429D', '314', '', '2014-04-30 19:45:06', '2014-04-30 19:45:06', 'active'),
(582, '', 'SREEDHARAN DR. GEETHA', 'individual', '', '', '', '', '', '1961-01-11', '', 'A.V.R.EYE AND ENT CARE CENTRE\r\n9, 18th  Avenue\r\nK.k.nagar, Chennai - 600078\r\nTamilnadu\r\n', 'ABWPG4199D', 'CHES27429D', '314', '', '2014-04-30 19:45:06', '2014-04-30 19:45:06', 'active'),
(583, '', 'SREEKALA', 'individual', '', '', '', '', '', '1976-01-17', '', 'No.4, Srinagar Colony, East Mada Street\r\nSaidapet\r\nChennai - 600015\r\nTamilnadu\r\n', 'DWPPS3819P', 'CHES27429D', '184-A', '', '2014-04-30 19:45:06', '2014-04-30 19:45:06', 'active'),
(584, '', 'SREEKANTAN', 'individual', '', '', '', '', '', '1941-02-07', '', 'No.1,, Kotten Villa, 8th Street, Tansi Nagar\r\nVelachery\r\nChennai - 600042\r\nTamilnadu\r\n', 'AANPS3395P', 'CHES27429D', 'V-130', '', '2014-04-30 19:45:06', '2014-04-30 19:45:06', 'active'),
(585, '', 'SREERENU  RAVINDRAN', 'individual', '', '', '', '', '', '1941-02-07', '', 'No.4, Srinagar Colony, East Mada Street\r\nSaidapet\r\nChennai - 600015\r\nTamilnadu\r\n', 'ACOPR1409G', 'CHES27429D', '184-B', '', '2014-04-30 19:45:06', '2014-04-30 19:45:06', 'active'),
(586, '', 'SRI BALAMURUGAN ENGINEERING ENTERPRISES', 'company', '', '', '', '', '', '1994-01-05', '', 'F3, Guindy Industrial Estate\r\nEkkatuthangal\r\nChennai - 600097\r\nTamilnadu\r\n', 'AANFS3597D', 'CHES26032G', '171', '', '2014-04-30 19:45:06', '2014-04-30 19:45:06', 'active'),
(587, '', 'SRI GURU ENGINEERING', 'company', '', '', '', '', '', '2005-09-08', '', 'No.d13, Mugappair East, Near Sboa School\r\nMugapair Industrial Estate,\r\nChennai - 600050\r\nTamil Nadu\r\n', 'AANFS3597D', 'CHES26032G', 'IT-109', '', '2014-04-30 19:45:06', '2014-04-30 19:45:06', 'active'),
(588, '', 'SRI LAKSHMI ENGINEERING WORKS', 'company', '', '', '', '', '', '1998-11-13', '', 'Plot No. 43,, Sidco Industrial Estate, Thirumudivakkam\r\nChennai - 600044\r\nTamil Nadu\r\n-\r\n', 'AACFL4350N', 'CHES26032G', 'IT-305', '', '2014-04-30 19:45:06', '2014-04-30 19:45:06', 'active'),
(589, '', 'SRI SURYA METAL', 'company', '', '', '', '', '', '2007-05-18', '', '8/3, Amman Koil Street\r\nPark Town\r\nChennai - 600003\r\nTamilnadu\r\n', 'ABKFS8895E', 'CHES32213G', '353N', '', '2014-04-30 19:45:06', '2014-04-30 19:45:06', 'active'),
(590, '', 'SUDHARSAN  NARAYANAN', 'individual', '', '', '', '', '', '1979-02-08', '', '4/17, Mahalakshmi Flats, Lic Colony Main Road\r\nVelachery\r\nChennai - 600042\r\nTamilnadu\r\n', 'AZKPS0482R', 'CHES32213G', 'V-160', '', '2014-04-30 19:45:06', '2014-04-30 19:45:06', 'active'),
(591, '', 'SUMANTH  SURENDRAN', 'individual', '', '', '', '', '', '1976-04-20', '', '11a, Maansarovar Raaj Ii Floor, Block 2, Arcot Road\r\nPorur\r\nChennai - 600116\r\nTamil Nadu\r\n', 'APAPS5360J', 'CHES32213G', 'S-033', '', '2014-04-30 19:45:06', '2014-04-30 19:45:06', 'active'),
(592, '', 'SURENDRA KUMAR SRIVASTAVA', 'individual', '', '', '', '', '', '1957-01-02', '', '10, North Avenue\r\nSrinagar Colony Saidapet\r\nChennai - 600015\r\nTamilnadu\r\n', 'AKHPS6685C', 'CHES32213G', '454', '', '2014-04-30 19:45:06', '2014-04-30 19:45:06', 'active'),
(593, '', 'SUSAN  GEORGE', 'individual', '', '', '', '', '', '1957-01-02', '', '12, Iv Th Lane, Nungambakkam High Road\r\nTamilnadu\r\n-\r\n-\r\n', 'AAVPS5831L', 'CHES32213G', 'M001', '', '2014-04-30 19:45:06', '2014-04-30 19:45:06', 'active'),
(594, '', 'SUVERA RUBBER AND ALLIED PRODUCTS', 'company', '', '', '', '', '', '1983-10-15', '', 'B-2, Santhosh Apartments, No.56/33, Halls Road\r\nEgmore\r\nChennai - 600008\r\nTamilnadu\r\n', 'AAAFS1518F', 'CHES01780C', '261', '', '2014-04-30 19:45:06', '2014-04-30 19:45:06', 'active'),
(595, '', 'T  ANANDAKRISHNAN', 'individual', '', '', '', '', '', '1959-12-10', '', '9, Bakthi Vedantha, First Avenue, Royala Nagar Annexe\r\nRamapuram\r\nChennai - 600089\r\nTamilnadu\r\n', 'ADRPA4809P', 'CHES01780C', 'IT-292', '', '2014-04-30 19:45:06', '2014-04-30 19:45:06', 'active'),
(596, '', 'T  ANDREW', 'individual', '', '', '', '', '', '1984-07-05', '', '2, Bella Vista, Sunrise Avenue\r\nNeelankarai\r\nChennai - 600041\r\nTamilnadu\r\n', 'AGYPA2527Q', 'CHES01780C', '117AN', '', '2014-04-30 19:45:06', '2014-04-30 19:45:06', 'active'),
(597, '', 'T  BABU', 'individual', '', '', '', '', '', '1972-05-16', '', '12/2, Pillairasu Street\r\nAnna Nagar\r\nChennai - 600102\r\nTamilnadu\r\n', 'AHUPB6588R', 'CHES01780C', '202N', '', '2014-04-30 19:45:06', '2014-04-30 19:45:06', 'active'),
(598, '', 'T  CHAKRAVARTHY', 'individual', '', '', '', '', '', '1948-03-15', '', '109/3, Arcot Road\r\nVadapalani\r\nChennai - 600026\r\nTamilnadu\r\n', 'ADXPC6370M', 'CHES01780C', '238', '', '2014-04-30 19:45:06', '2014-04-30 19:45:06', 'active'),
(599, '', 'T  CHAKRAVARTHY', 'individual', '', '', '', '', '', '1976-08-09', '', '11, E-block, Paramount Park, Vijaya Nagar\r\nVelachery\r\nChennai - 600042\r\nTamilnadu\r\n', 'ADEPC9771B', 'CHES01780C', '207', '', '2014-04-30 19:45:06', '2014-04-30 19:45:06', 'active'),
(600, '', 'T  DURAISAMY', 'individual', '', '', '', '', '', '1950-06-20', '', '109, Nsk Salai\r\nVadapalani\r\nChennai, - 600026\r\nTamilnadu\r\n', 'AGPPD6843H', 'CHES01780C', '341', '', '2014-04-30 19:45:06', '2014-04-30 19:45:06', 'active'),
(601, '', 'T  KARTHICK', 'individual', '', '', '', '', '', '1992-02-07', '', '52, V.g.p.selvanagar, 1st Main Road\r\nVelachery\r\nChennai - 600042\r\nTamilnadu\r\n', 'CCHPK4981R', 'CHES01780C', '354A', '', '2014-04-30 19:45:06', '2014-04-30 19:45:06', 'active'),
(602, '', 'T  KARUNABAI', 'individual', '', '', '', '', '', '1945-01-30', '', '13a, Manjolai Street\r\nEkkattuthangal\r\nChennai - 600097\r\nTamilnadu\r\n', 'AILPK7580N', 'CHES01780C', '277', '', '2014-04-30 19:45:06', '2014-04-30 19:45:06', 'active'),
(603, '', 'T  KUMARESAN', 'individual', '', '', '', '', '', '1942-04-21', '', 'Plot No.3, Thandavamoorthy Nagar\r\nArcot Road,valasaravakkam\r\nChennai - 600087\r\nTamilnadu\r\n', 'AWXPK2138E', 'CHES01780C', '391', '', '2014-04-30 19:45:06', '2014-04-30 19:45:06', 'active'),
(604, '', 'T  MADHAVAN', 'individual', '', '', '', '', '', '1968-02-04', '', 'No.12/2, Palliarasu Street\r\nAnna Nagar\r\nChennai - 600102\r\nTamilnadu\r\n', 'AGLPM5725H', 'CHES01780C', '203', '', '2014-04-30 19:45:06', '2014-04-30 19:45:06', 'active'),
(605, '', 'T  SUNDARI', 'individual', '', '', '', '', '', '1973-10-17', '', '52, Vgp Selva Nagar 1st Main Road\r\nVelachery\r\nChennai - 600042\r\nTamilnadu\r\n', 'EDAPS4717K', 'CHES01780C', '354B', '', '2014-04-30 19:45:06', '2014-04-30 19:45:06', 'active'),
(606, '', 'T J BALARAMAN', 'individual', '', '', '', '', '', '1957-06-13', '', '80, Ponappa Mudali Street\r\nPurasawakkam\r\nChennai - 600084\r\nTamilnadu\r\n', 'AAHPB0497M', 'CHES01780C', '198', '', '2014-04-30 19:45:06', '2014-04-30 19:45:06', 'active'),
(607, '', 'T. J. GEORGE', 'individual', '', '', '', '', '', '1978-04-30', '', '2, Bella Vista, Sunrise Avenue\r\nNeelankarai\r\nChennai - 600041\r\nTamilnadu\r\n', 'AIOPG0519N', 'CHES01780C', '117N', '', '2014-04-30 19:45:06', '2014-04-30 19:45:06', 'active'),
(608, '', 'TAMIL NADU MEDICAL SERVICES CORPORATION LIMITED', 'company', '', '', '', '', '', '1994-01-08', '', '417, Pantheon Road\r\nEgmore\r\nChennai - 600008\r\nTamilnadu\r\n', 'AAACT3400E', 'CHES01780C', 'A-31', '', '2014-04-30 19:45:06', '2014-04-30 19:45:06', 'active'),
(609, '', 'TAMIL NADU POWER FINANCE AND INFRASTRUCTURE DEVELO', 'company', '', '', '', '', '', '1991-06-27', '', '490/ 3-4, Tufido-powerfin Tower, Anna Salai\r\nNandanam\r\nChennai - 600035\r\nTamilnadu\r\n', 'AAACT2840A', 'CHET00927D', 'MIS-117', '', '2014-04-30 19:45:06', '2014-04-30 19:45:06', 'active'),
(610, '', 'TAMILNADU FISHERIES DEVELOPMENT CORPORATION LIMITE', 'company', '', '', '', '', '', '1991-06-27', '', '-490/ 3-4, Tufido-powerfin Tower, Anna Salai\r\nNandanam\r\nChennai - 600035\r\nTamilnadu\r\n', 'AAACT2840A', 'CHET00927D', 'MIS-103', '', '2014-04-30 19:45:06', '2014-04-30 19:45:06', 'active'),
(611, '', 'TAMILNADU POWER FINANCE', 'company', '', '', '', '', '', '1991-06-27', '', '-490/ 3-4, Tufido-powerfin Tower, Anna Salai\r\nNandanam\r\nChennai - 600035\r\nTamilnadu\r\n', 'AAACT2840A', 'CHET00927D', 'MIS-118', '', '2014-04-30 19:45:06', '2014-04-30 19:45:06', 'active'),
(612, '', 'TEAM TRAVELS', 'company', '', '', '', '', '', '2011-08-24', '', '781, Munnuswamy Salai\r\nWest K.k.nagar\r\nChennai - 600078\r\nTamilnadu\r\n', 'AAHFT1238J', 'CHET00927D', '353', '', '2014-04-30 19:45:06', '2014-04-30 19:45:06', 'active'),
(613, '', 'THE TRIDENT TOOLS', 'company', '', '', '', '', '', '1996-01-15', '', 'Developed Plot No.244, Sidco Industrial Estate\r\nThirumudivakkam\r\nChennai - 600044\r\nTamilnadu\r\n', 'AACFT6750E', 'CHET07804G', '122', '', '2014-04-30 19:45:06', '2014-04-30 19:45:06', 'active'),
(614, '', 'THIRUKUMARAN INFRASTRUCTURE (P) LIMITED', 'company', '', '', '', '', '', '1999-06-18', '', 'Dp-34(sp), Industrial Estate\r\nGuindy\r\nChennai - 600032\r\nTamilnadu\r\n', 'AABCT8284F', 'CHET07804G', '185', '', '2014-04-30 19:45:06', '2014-04-30 19:45:06', 'active'),
(615, '', 'TUBES AND ALLIED PRODUCTS', 'company', '', '', '', '', '', '2001-01-11', '', 'No.140, Labour Colony, T.v.k. Industrial Estate\r\nGuindy\r\nChennai - 600032\r\nTamilnadu\r\n', 'AACFT5202F', 'CHET07804G', 'IT-290', '', '2014-04-30 19:45:06', '2014-04-30 19:45:06', 'active'),
(616, '', 'U  SOWMYA', 'individual', '', '', '', '', '', '1979-01-14', '', '4/17, Shobana Apts, 3rd Floor Bishop Wallers Avenue West Cit Colony\r\nMylapore\r\nChennai - 600004\r\nTamilnadu\r\n', 'AVAPS0387H', 'CHET07804G', '420', '', '2014-04-30 19:45:06', '2014-04-30 19:45:06', 'active'),
(617, '', 'U.  MANIMOZHI', 'individual', '', '', '', '', '', '1959-11-30', '', '4/17, Shobana Apts, 3rd Floor Bishop Wallers Avenue West Cit Colony\r\nMylapore\r\nChennai - 600004\r\nTamilnadu\r\n', 'AGNPM1511H', 'CHET07804G', '333', '', '2014-04-30 19:45:06', '2014-04-30 19:45:06', 'active'),
(618, '', 'UMA  KARTHIK', 'individual', '', '', '', '', '', '1980-06-18', '', '4/17, Shobana Apts, 3rd Floor Bishop Wallers Avenue West Cit Colony\r\nMylapore\r\nChennai - 600050\r\nTamilnadu\r\n', 'AAOPU0980D', 'CHET07804G', 'IT-235', '', '2014-04-30 19:45:06', '2014-04-30 19:45:06', 'active'),
(619, '', 'UMA  V', 'individual', '', '', '', '', '', '1976-05-30', '', '13/36, 1st Reddy Street\r\nEkkathuthangal\r\nChennai - 600097\r\nTamilnadu\r\n', 'AAZPU7723K', 'CHET07804G', '373', '', '2014-04-30 19:45:06', '2014-04-30 19:45:06', 'active'),
(620, '', 'V  BAGYARANI', 'individual', '', '', '', '', '', '1969-12-30', '', 'Plot No.20, Vinayaga, F-1, Vallal Kumanan Street, Bagirathi Nagar\r\nMadipakkam\r\nChennai - 600091\r\nTamilnadu\r\n', 'ADYPB5618G', 'CHET07804G', 'V-114', '', '2014-04-30 19:45:06', '2014-04-30 19:45:06', 'active'),
(621, '', 'V  BALAJI', 'individual', '', '', '', '', '', '1974-06-07', '', '2/51, 4th Cross Street\r\nBalaji Nagar, Kolathur\r\nChennai - 600099\r\nTamilnadu\r\n', 'ACIPV1826H', 'CHET07804G', 'IT-354N', '', '2014-04-30 19:45:06', '2014-04-30 19:45:06', 'active'),
(622, '', 'V  CHITHRA', 'individual', '', '', '', '', '', '1965-02-07', '', '113/1, Baskar Colony 3rd Street\r\nVirugambakkam\r\nChennai - 600092\r\nTamilnadu\r\n', 'APXPC4391L', 'CHET07804G', '297A', '', '2014-04-30 19:45:06', '2014-04-30 19:45:06', 'active'),
(623, '', 'V  DHIVYA', 'individual', '', '', '', '', '', '1981-03-18', '', 'No.16, G2, Fourth Cross Street\r\nLakshmi Nagar,velachery\r\nChennai - 600042\r\nTamilnadu\r\n', 'AGWPD2375B', 'CHET07804G', 'MIS-101', '', '2014-04-30 19:45:06', '2014-04-30 19:45:06', 'active'),
(624, '', 'V  GANESAN', 'individual', '', '', '', '', '', '1958-01-22', '', '16/8, Venkateswara Apartments, Kamaraj Salai\r\nChennai - 600092\r\nTamilnadu\r\n-\r\n', 'ADHPG0137C', 'CHET07804G', 'IT-343', '', '2014-04-30 19:45:06', '2014-04-30 19:45:06', 'active'),
(625, '', 'V  KAVITHA', 'individual', '', '', '', '', '', '1977-09-30', '', '58, Flat F 3, Alwarthirunagar Annex\r\nAlwarthirunagar\r\nChennai - 600087\r\nTamilnadu\r\n', 'BDFPK5676M', 'CHET07804G', '424', '', '2014-04-30 19:45:06', '2014-04-30 19:45:06', 'active'),
(626, '', 'V  MAHADEVAN', 'individual', '', '', '', '', '', '1965-12-13', '', '57b, Adha Nagar Extn\r\nMoulivkkam\r\nChennai - 600116\r\nTamilnadu\r\n', 'AANPM3974E', 'CHET07804G', '450', '', '2014-04-30 19:45:06', '2014-04-30 19:45:06', 'active'),
(627, '', 'V  MEENAKSHISUNDARAM', 'individual', '', '', '', '', '', '1976-07-26', '', 'F-1, Sai Okas Apartments, 19th Street, Tansi Nagar\r\nVelachery\r\nChennai - 600042\r\nTamilnadu\r\n', 'AGLPM0707B', 'CHET07804G', 'V-120', '', '2014-04-30 19:45:06', '2014-04-30 19:45:06', 'active'),
(628, '', 'V  MURUGESAN', 'individual', '', '', '', '', '', '1975-06-19', '', 'No.41, K.k.salai\r\nM.g.r. Nagar\r\nChennai - 600078\r\nTamil Nadu\r\n', 'AMBPM5062B', 'CHET07804G', '285', '', '2014-04-30 19:45:06', '2014-04-30 19:45:06', 'active'),
(629, '', 'V  RAMAMOORTHY', 'individual', '', '', '', '', '', '1929-08-17', '', '5/860, Lake View, Third Cross Street\r\nIyyappa Nagar, Madipakkam\r\nChennai - 600091\r\nTamilnadu\r\n', 'AKOPR0045G', 'CHET07804G', '166N', '', '2014-04-30 19:45:06', '2014-04-30 19:45:06', 'active'),
(630, '', 'V  SHEREEN', 'individual', '', '', '', '', '', '1979-05-13', '', '108, 1st Street\r\nValliammai Nagar, Nerkundram\r\nChennai - 600107\r\nTamilnadu\r\n', 'ADKPV4362K', 'CHET07804G', 'MIS-113', '', '2014-04-30 19:45:06', '2014-04-30 19:45:06', 'active'),
(631, '', 'V  SUBRAMANIAN', 'individual', '', '', '', '', '', '1948-02-15', '', '61/2, Perumal Koil Street\r\nSaidapet\r\nChennai - 600015\r\nTamilnadu\r\n', 'AAUPS7049H', 'CHET07804G', '242', '', '2014-04-30 19:45:06', '2014-04-30 19:45:06', 'active'),
(632, '', 'V  VIJAYALAKSHMI', 'individual', '', '', '', '', '', '1969-12-16', '', '5/860, Lake View, Third Cross Street\r\nIyyappa Nagar, Madipakkam\r\nChennai - 600091\r\nTamilnadu\r\n', 'ACWPV3542N', 'CHET07804G', '165N', '', '2014-04-30 19:45:06', '2014-04-30 19:45:06', 'active'),
(633, '', 'V K AJITHKUMAR', 'individual', '', '', '', '', '', '1970-03-20', '', 'A/28, First Floor, Ihfd Nagar\r\nPallavaram\r\nChennai - 600043\r\nTamilnadu\r\n', 'ACYPA0052E', 'CHET07804G', '230', '', '2014-04-30 19:45:06', '2014-04-30 19:45:06', 'active'),
(634, '', 'V K RAMESH', 'individual', '', '', '', '', '', '1946-06-20', '', '3, Rajeswari Colony\r\nVirugambakkam\r\nChennai - 600092\r\nTamilnadu\r\n', 'ADIPR8302H', 'CHET07804G', '409', '', '2014-04-30 19:45:06', '2014-04-30 19:45:06', 'active'),
(635, '', 'V LINE ENGINEERS AND SURVEYORS', 'company', '', '', '', '', '', '2004-01-08', '', 'No.187, Old No.91, Ii Floor\r\nAngappa Naicker Street\r\nChennai - 600001\r\nTamilnadu\r\n', 'AAFFV2763G', 'CHET07804G', '170', '', '2014-04-30 19:45:06', '2014-04-30 19:45:06', 'active'),
(636, '', 'V M GANGADHARAN', 'individual', '', '', '', '', '', '1952-03-08', '', '114/77, East Vannier Street\r\nK.k.nagar West\r\nChennai - 600078\r\nTamilnadu\r\n', 'AGPPG5373B', 'CHET07804G', '372', '', '2014-04-30 19:45:06', '2014-04-30 19:45:06', 'active'),
(637, '', 'V MOHAN', 'individual', '', '', '', '', '', '1947-12-21', '', '3/48, South Street\r\nKovur\r\nChennai - 602101\r\nTamilnadu\r\n', 'ATFPM2798B', 'CHET07804G', 'S-36', '', '2014-04-30 19:45:06', '2014-04-30 19:45:06', 'active'),
(638, '', 'V P SHANKAR', 'individual', '', '', '', '', '', '1945-10-05', '', '-3/48, South Street\r\nKovur\r\nChennai - 602101\r\nTamilnadu\r\n', 'ATFPM2798B', 'CHET07804G', 'M-004', '', '2014-04-30 19:45:06', '2014-04-30 19:45:06', 'active'),
(639, '', 'V V CORPORATION', 'company', '', '', '', '', '', '2005-01-05', '', '30, I Floor, Marutis Veeriah Complex, 57, Nehru Bazar\r\nAvadi\r\nChennai - 600054\r\nTamilnadu\r\n', 'AAFFV6091D', 'CHET07804G', 'IT-494N', '', '2014-04-30 19:45:06', '2014-04-30 19:45:06', 'active'),
(640, '', 'V.  ARUNAKUMARI', 'individual', '', '', '', '', '', '1952-03-29', '', '6, Bharani Colony, Kannammal Street\r\nSaligramam\r\nChennai - 600093\r\nTamilnadu\r\n', 'AACPV6512C', 'CHET07804G', 'IT-135', '', '2014-04-30 19:45:06', '2014-04-30 19:45:06', 'active'),
(641, '', 'V.  MANONMANI', 'individual', '', '', '', '', '', '1951-01-08', '', 'New No.14, M- Block, Eight Street\r\nAnna Nagar East\r\nChennai - 600102\r\nTamilnadu\r\n', 'AEBPV8632A', 'CHET07804G', '264', '', '2014-04-30 19:45:06', '2014-04-30 19:45:06', 'active'),
(642, '', 'V.  RAMASUBRAMANIAN', 'individual', '', '', '', '', '', '1973-10-05', '', 'Block -2, B-1, Green Park Apartment, Lic Colony Main Road\r\nVelachery\r\nChennai - 600042\r\nTamilnadu\r\n', 'ADJPR9496H', 'CHET07804G', 'V-107', '', '2014-04-30 19:45:06', '2014-04-30 19:45:06', 'active'),
(643, '', 'V.  SHANMUGANATHAN', 'individual', '', '', '', '', '', '1974-03-02', '', '1/359, Kalamegam Street\r\nMogappair West\r\nChennai - 600 058\r\nTamilnadu\r\n', 'AYPPS0898H', 'CHET07804G', 'IT-331-N', '', '2014-04-30 19:45:06', '2014-04-30 19:45:06', 'active'),
(644, '', 'V.  VENKATARAMAN', 'individual', '', '', '', '', '', '1945-05-15', '', 'No.2, Udayam Nagar, First Main Road\r\nVelachery\r\nChennai - 600040\r\nTamilnadu\r\n', 'AABPV9734H', 'CHET07804G', '169', '', '2014-04-30 19:45:06', '2014-04-30 19:45:06', 'active'),
(645, '', 'V. SUBRAMANIAN AND CO.', 'company', '', '', '', '', '', '2001-01-10', '', '353, Anna Salai\r\nNandanam\r\nChennai - 600035\r\nTamilnadu\r\n', 'AAEFV6104C', 'CHEV06429D', '241', '', '2014-04-30 19:45:06', '2014-04-30 19:45:06', 'active'),
(646, '', 'V.KAVITHA', 'company', '', '', '', '', '', '2001-01-10', '', 'SARASWATHI METAL FAB\r\n6, 4 Th Main Road\r\nNatesan Nagar,virugambakkam\r\nChennai - 600092, Tamilnadu\r\n', 'AAEFV6104C', 'CHEV06429D', '274A', '', '2014-04-30 19:45:06', '2014-04-30 19:45:06', 'active'),
(647, '', 'V.V.CORPORATION', 'company', '', '', '', '', '', '2001-01-10', '', '-SARASWATHI METAL FAB\r\n6, 4 Th Main Road\r\nNatesan Nagar,virugambakkam\r\nChennai - 600092, Tamilnadu\r\n', 'AAEFV6104C', 'CHEV06429D', 'IT-494DEC', '', '2014-04-30 19:45:06', '2014-04-30 19:45:06', 'active'),
(648, '', 'V.V.R.  CHOUDARY', 'individual', '', '', '', '', '', '1939-09-06', '', '6, Kanammal Street,bharani Colony\r\nSaligrammam\r\nChennai - 600093\r\nTamilnadu\r\n', 'AAEPC2496E', 'CHEV06429D', 'IT-345', '', '2014-04-30 19:45:06', '2014-04-30 19:45:06', 'active'),
(649, '', 'VANITHA  AMBALAVANAN', 'individual', '', '', '', '', '', '1949-04-12', '', '56, Dr. Seethapathy Nagar, Usha Street\r\nVelachery\r\nChennai - 600042\r\nTamilnadu\r\n', 'ACPPV6640J', 'CHEV06429D', '370', '', '2014-04-30 19:45:06', '2014-04-30 19:45:06', 'active'),
(650, '', 'VASANTHI ORTHOPAEDIC HOSPITAL PRIVATE LIMITED', 'company', '', '', '', '', '', '2011-09-26', '', 'Cp 50,, Garden Main Road\r\nArumbakkam\r\nChennai - 600106\r\nTamilnadu\r\n', 'AADCV7967K', 'CHEV11143G', 'A-32', '', '2014-04-30 19:45:06', '2014-04-30 19:45:06', 'active'),
(651, '', 'VASANTHI PHARMACY', 'company', '', '', '', '', '', '2011-09-26', '', '-Cp 50,, Garden Main Road\r\nArumbakkam\r\nChennai - 600106\r\nTamilnadu\r\n', 'AADCV7967K', 'CHEV11143G', '301-C', '', '2014-04-30 19:45:06', '2014-04-30 19:45:06', 'active'),
(652, '', 'VASANTHY  KARTHIKEYAN', 'individual', '', '', '', '', '', '1967-05-20', '', '32, Sriramar Street, Devaraj Nagar\r\nSaligramam\r\nChennai - 600093\r\nTamilnadu\r\n', 'ACGPV5378J', 'CHEV11143G', '340', '', '2014-04-30 19:45:06', '2014-04-30 19:45:06', 'active'),
(653, '', 'VASS ENTERPRISES', 'company', '', '', '', '', '', '1996-01-05', '', '16/46, Ground Floor, Appu Sali Street\r\nSaligramam\r\nChennai - 600093\r\nTamilnadu\r\n', 'AADFV9503A', 'CHEV11143G', '296', '', '2014-04-30 19:45:06', '2014-04-30 19:45:06', 'active'),
(654, '', 'VEENA  ANAND', 'individual', '', '', '', '', '', '1963-09-10', '', '9, Bakthi Vedantha, First Avenue, Royala Nagar Annexe\r\nRamapuram\r\nChennai - 600089\r\nTamilnadu\r\n', 'ACTPV8448G', 'CHEV11143G', '237', '', '2014-04-30 19:45:06', '2014-04-30 19:45:06', 'active'),
(655, '', 'VENKATESWARAN  SRIVIDHYA', 'individual', '', '', '', '', '', '1975-09-14', '', 'B.no.7-1a, Sterling Srivedasri Apartments, 4, Chockalingam Nagar\r\n4th Main Road, Ags Colony, Velachery\r\nChennai - 600042\r\nTamilnadu\r\n', 'CQFPS2391H', 'CHEV11143G', 'MISV-002', '', '2014-04-30 19:45:06', '2014-04-30 19:45:06', 'active'),
(656, '', 'VIMALACHELLADURAI', 'individual', '', '', '', '', '', '1944-10-28', '', '19, Defence Colony, 4th Main Raoad\r\nAdambakkam\r\nChennai - 600088\r\nTamilnadu\r\n', 'AISPC9875D', 'CHEV11143G', '280A', '', '2014-04-30 19:45:06', '2014-04-30 19:45:06', 'active'),
(657, '', 'VISHNU T  HARJANI', 'individual', '', '', '', '', '', '1957-02-15', '', '246, Arcot Road\r\nVadapalani\r\nChennai - 600026\r\nTamilnadu\r\n', 'AARPH6011M', 'CHEV11143G', '344', '', '2014-04-30 19:45:06', '2014-04-30 19:45:06', 'active'),
(658, '', 'VISVANATH PLASTIC', 'individual', '', '', '', '', '', '1957-02-15', '', '-246, Arcot Road\r\nVadapalani\r\nChennai - 600026\r\nTamilnadu\r\n', 'AARPH6011M', 'CHEV11143G', 'M101', '', '2014-04-30 19:45:06', '2014-04-30 19:45:06', 'active'),
(659, '', 'VISWANATHAN  PONNIVALAVAN', 'individual', '', '', '', '', '', '1960-03-07', '', '6, First Main Street\r\nKalaimagal Nagar Post, Ekkatuthangal\r\nChennai - 600032\r\nTamilnadu\r\n', 'AFWPP6419H', 'CHEV11143G', 'SAL31', '', '2014-04-30 19:45:06', '2014-04-30 19:45:06', 'active'),
(660, '', 'Y  MUTHAIYAN', 'individual', '', '', '', '', '', '1942-11-20', '', 'No.13a, Manjolai Street, Kalaimagal Nagar\r\nEkkatuthangal\r\nChennai - 600097\r\nTamilnadu\r\n', 'AGPPM0866M', 'CHEV11143G', '275', '', '2014-04-30 19:45:06', '2014-04-30 19:45:06', 'active'),
(661, '', 'Y MARIA JOHN', 'individual', '', '', '', '', '', '1952-10-04', '', 'No.38, Kalaimagal Nagar, Iii Rd Main Road\r\nEkkaduthangal\r\nChennai, - 600032\r\nTamilnadu\r\n', 'AACPJ6161F', 'CHEV11143G', '325', '', '2014-04-30 19:45:06', '2014-04-30 19:45:06', 'active'),
(662, '', 'YOHA TRANS ELECTRICAL', 'company', '', '', '', '', '', '2007-09-03', '', '12, Ashta Lakshmi Nagar, Iind Street\r\nGoparasanallur, Kattupakkam\r\nChennai - 600056\r\nTamilnadu\r\n', 'AAAFY6683M', 'CHEV11143G', '398N', '', '2014-04-30 19:45:06', '2014-04-30 19:45:06', 'active'),
(663, '', 'Z  ANASDEEN', 'individual', '', '', '', '', '', '1968-03-02', '', '54, Ii Floor, Sembudoss Street\r\nParrys\r\nChennai - 600001\r\nTamilnadu\r\n', 'AABPA4667L', 'CHEV11143G', '180', '', '2014-04-30 19:45:06', '2014-04-30 19:45:06', 'active'),
(664, '', 'Z  FATHIMA', 'individual', '', '', '', '', '', '1970-05-10', '', '15, Logaiah Colony, 3rd Cross Street\r\nSaligramam\r\nChennai - 600093\r\nTamilnadu\r\n', 'AAPPF5317G', 'CHEV11143G', '235AN', '', '2014-04-30 19:45:06', '2014-04-30 19:45:06', 'active'),
(665, '', 'ZYMASS AUTO SYSTEMS', 'company', '', '', '', '', '', '1999-01-05', '', 'D-20, Ambattur Industrial Estate\r\nAmbattur\r\nChennai - 600058\r\nTamilnadu\r\n', 'AAAFZ2873L', 'CHEZ03082C', '201', '', '2014-04-30 19:45:06', '2014-04-30 19:45:06', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE IF NOT EXISTS `documents` (
  `register_id` int(11) NOT NULL,
  `doc_id` int(11) NOT NULL AUTO_INCREMENT,
  `particulars` varchar(300) NOT NULL,
  `quantity` int(11) NOT NULL,
  `tag` varchar(100) NOT NULL,
  `status` enum('inward','outward') NOT NULL,
  `by_employee` int(11) NOT NULL,
  `mode_of_receipt` enum('in_person','email','courier','other','post') NOT NULL,
  `row_status` enum('active','deleted') NOT NULL,
  `create_date` datetime NOT NULL,
  `update_date` datetime NOT NULL,
  PRIMARY KEY (`doc_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `doc_trans`
--

CREATE TABLE IF NOT EXISTS `doc_trans` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `register_id` int(11) NOT NULL,
  `doc_id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `reg_status` enum('inward','outward','in_out') NOT NULL,
  `trans_date` datetime NOT NULL,
  `trans_type` enum('inward','outward','create','edit','delete') NOT NULL,
  `create_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE IF NOT EXISTS `employees` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(5) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `login` varchar(8) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role_id` int(11) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `create_date` datetime NOT NULL,
  `update_date` datetime NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  PRIMARY KEY (`id`),
  UNIQUE KEY `login` (`login`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `title`, `full_name`, `login`, `password`, `role_id`, `phone`, `email`, `address`, `create_date`, `update_date`, `status`) VALUES
(6, 'Ms', 'HimaRam R B', 'himaram', '1a1dc91c907325c69271ddf0c944bc72', 3, '9840618113', 'hima_ram@sram.com', 'KK Nagar, Chennai', '2013-05-13 17:17:17', '2014-04-14 00:02:00', 'active'),
(7, 'Mr', 'Ramalingam S', 'sram', '1a1dc91c907325c69271ddf0c944bc72', 2, '9876543211', 'sram@sram.com', 'kknagar, chennai', '2013-05-16 10:32:56', '2014-04-13 23:43:44', 'active'),
(9, 'Mr', 'Rishi Shankar Rengasamy', 'rishi', '1a1dc91c907325c69271ddf0c944bc72', 2, '9876543210', 'rishi@gmail.com', 'Bangalore', '2013-05-26 14:55:30', '2014-04-13 23:43:58', 'active'),
(10, 'Mr', 'Dilip K', 'dilip', '1a1dc91c907325c69271ddf0c944bc72', 3, '9876543211', 'dilip@test.com', 'Chennai', '2013-07-16 19:39:54', '2014-04-14 00:01:45', 'active'),
(12, 'Mrs', 'Sowmya M', 'sowmya', '1a1dc91c907325c69271ddf0c944bc72', 3, '9894210539', 'sowmya@sram.com', 'Chennai', '2013-07-17 12:03:20', '2014-04-14 00:01:52', 'active'),
(14, 'Mr', 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 1, '', '', '', '2014-04-02 09:48:34', '2014-04-02 09:48:34', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `invoice_sequence`
--

CREATE TABLE IF NOT EXISTS `invoice_sequence` (
  `inv_no` int(11) NOT NULL AUTO_INCREMENT,
  `create_date` date NOT NULL,
  PRIMARY KEY (`inv_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `inward_invoices`
--

CREATE TABLE IF NOT EXISTS `inward_invoices` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `inv_id` varchar(20) NOT NULL,
  `reg_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `client_name` varchar(100) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `emp_name` varchar(100) NOT NULL,
  `particulars` varchar(300) NOT NULL,
  `date` datetime NOT NULL,
  `mode_of_receipt` enum('in_person','email','courier','other','post') NOT NULL,
  `create_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `itrs`
--

CREATE TABLE IF NOT EXISTS `itrs` (
  `itr_id` int(11) NOT NULL AUTO_INCREMENT,
  `task_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `date_of_uploading` date NOT NULL,
  `assessment_year` varchar(20) NOT NULL,
  `filed_by` int(11) NOT NULL,
  `date_of_mailing` date NOT NULL,
  `date_of_acknowledgement` date NOT NULL,
  `date_of_billing` date NOT NULL,
  `bill_amount` int(11) NOT NULL,
  `remarks` varchar(200) NOT NULL,
  `create_date` datetime NOT NULL,
  `update_date` datetime NOT NULL,
  PRIMARY KEY (`itr_id`),
  UNIQUE KEY `itr_id` (`itr_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `outward_invoices`
--

CREATE TABLE IF NOT EXISTS `outward_invoices` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `inv_id` varchar(20) NOT NULL,
  `reg_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `client_name` varchar(100) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `emp_name` varchar(100) NOT NULL,
  `particulars` varchar(300) NOT NULL,
  `date` datetime NOT NULL,
  `mode_of_receipt` enum('in_person','email','courier','other','post') NOT NULL,
  `create_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `registers`
--

CREATE TABLE IF NOT EXISTS `registers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `client_id` int(11) NOT NULL,
  `fin_yr` varchar(10) NOT NULL,
  `create_date` datetime NOT NULL,
  `update_date` datetime NOT NULL,
  `status` enum('inward','outward','in_out') NOT NULL,
  `type` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(20) NOT NULL,
  `description` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role`, `description`) VALUES
(1, 'admin', 'admin'),
(2, 'manager', 'manager'),
(3, 'audit-assistant', 'audit assistant');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE IF NOT EXISTS `tasks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `type` varchar(20) NOT NULL,
  `comments` text NOT NULL,
  `client_id` int(11) NOT NULL,
  `priority` enum('high','medium','low') NOT NULL DEFAULT 'medium',
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `due_date` date NOT NULL,
  `created_by` int(11) NOT NULL,
  `create_date` datetime NOT NULL,
  `update_date` datetime NOT NULL,
  `status` enum('new','re-assigned','pending','query','completed','finalized') NOT NULL DEFAULT 'new',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `task_documents`
--

CREATE TABLE IF NOT EXISTS `task_documents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `task_id` int(11) NOT NULL,
  `document_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `task_query`
--

CREATE TABLE IF NOT EXISTS `task_query` (
  `task_id` int(11) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `raised_by` int(11) NOT NULL,
  `requested_to` int(11) NOT NULL,
  `status` enum('open','closed','answered') NOT NULL,
  `task_status` enum('new','re-assigned','pending','completed') NOT NULL,
  `created_by` int(11) NOT NULL,
  `create_date` datetime NOT NULL,
  `update_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=41 ;

--
-- Dumping data for table `task_query`
--

INSERT INTO `task_query` (`task_id`, `id`, `raised_by`, `requested_to`, `status`, `task_status`, `created_by`, `create_date`, `update_date`) VALUES
(22, 40, 6, 12, 'closed', 'new', 6, '2014-03-23 12:49:52', '2014-03-23 12:51:36');

-- --------------------------------------------------------

--
-- Table structure for table `task_types`
--

CREATE TABLE IF NOT EXISTS `task_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(20) NOT NULL,
  `type_ui_desc` varchar(50) NOT NULL,
  `status` enum('active','inactive') NOT NULL,
  `create_date` date NOT NULL,
  `update_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `task_types`
--

INSERT INTO `task_types` (`id`, `type`, `type_ui_desc`, `status`, `create_date`, `update_date`) VALUES
(1, 'itr', 'ITR', 'active', '2014-04-06', '2014-04-06'),
(2, 'tds', 'TDS', 'active', '2014-04-06', '2014-04-06'),
(3, 'st', 'Service Tax', 'active', '2014-04-06', '2014-04-06'),
(4, 'accounting', 'Accounting', 'active', '2014-04-06', '2014-04-06'),
(5, 'audit', 'Audit', 'active', '2014-04-06', '2014-04-06'),
(6, 'intimation', 'Intimation', 'active', '2014-04-06', '2014-04-06'),
(7, 'vat', 'VAT', 'active', '2014-04-06', '2014-04-06'),
(8, 'other', 'Other', 'active', '2014-04-06', '2014-04-06');

-- --------------------------------------------------------

--
-- Table structure for table `type_owners`
--

CREATE TABLE IF NOT EXISTS `type_owners` (
  `emp_id` int(11) NOT NULL,
  `type` varchar(20) NOT NULL,
  `create_date` date NOT NULL,
  `update_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `type_owners`
--

INSERT INTO `type_owners` (`emp_id`, `type`, `create_date`, `update_date`) VALUES
(7, 'itr', '2014-04-13', '2014-04-13'),
(7, 'tds', '2014-04-13', '2014-04-13'),
(7, 'st', '2014-04-13', '2014-04-13'),
(7, 'accounting', '2014-04-13', '2014-04-13'),
(7, 'audit', '2014-04-13', '2014-04-13'),
(7, 'intimation', '2014-04-13', '2014-04-13'),
(7, 'vat', '2014-04-13', '2014-04-13'),
(7, 'other', '2014-04-13', '2014-04-13'),
(9, 'itr', '2014-04-13', '2014-04-13'),
(9, 'tds', '2014-04-13', '2014-04-13'),
(9, 'st', '2014-04-13', '2014-04-13'),
(9, 'accounting', '2014-04-13', '2014-04-13'),
(9, 'audit', '2014-04-13', '2014-04-13'),
(9, 'intimation', '2014-04-13', '2014-04-13'),
(9, 'vat', '2014-04-13', '2014-04-13'),
(12, 'tds', '2014-04-14', '2014-04-14'),
(6, 'itr', '2014-04-14', '2014-04-14'),
(6, 'tds', '2014-04-14', '2014-04-14'),
(6, 'st', '2014-04-14', '2014-04-14');

-- --------------------------------------------------------

--
-- Table structure for table `years`
--

CREATE TABLE IF NOT EXISTS `years` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `from_year` varchar(5) NOT NULL,
  `to_year` varchar(5) NOT NULL,
  `fin_year` varchar(10) NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `assessment_year` varchar(10) NOT NULL,
  `is_curr_year` enum('Y','N') NOT NULL,
  `create_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `years`
--

INSERT INTO `years` (`id`, `from_year`, `to_year`, `fin_year`, `from_date`, `to_date`, `assessment_year`, `is_curr_year`, `create_date`) VALUES
(5, '2013', '2014', '2013-2014', '2013-04-01', '2014-03-31', '2014-2015', 'N', '2013-06-27 22:02:20'),
(6, '2012', '2013', '2012-2013', '2012-04-01', '2013-03-31', '2013-2014', 'N', '2014-03-22 14:46:14'),
(8, '2014', '2015', '2014-2015', '2014-04-01', '2015-03-31', '2015-2016', 'Y', '2014-04-06 16:18:12');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
