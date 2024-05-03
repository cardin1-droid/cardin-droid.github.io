-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2024 at 03:34 AM
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
-- Database: `candaweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `id` int(11) NOT NULL,
  `about_text` text NOT NULL,
  `about_image` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`id`, `about_text`, `about_image`, `created_at`) VALUES
(3, 'Canda is a village in Balayan, Western Batangas, Calabarzon. Canda is situated nearby to the villages Sambat and Lagnas', 'uploads/church.jpg', '2024-03-05 04:23:58'),
(9, 'Canda is a barangay in the municipality of Balayan, in the province of Batangas. Its population as determined by the 2020 Census was 1,371. This represented 1.43% of the total population of Balayan.\r\n', 'uploads/ab.jpg', '2024-04-26 07:01:56');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('admin-secretary', 'canda123');

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

CREATE TABLE `announcement` (
  `id` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `announcement_name` varchar(255) DEFAULT NULL,
  `message` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `announcement`
--

INSERT INTO `announcement` (`id`, `image`, `announcement_name`, `message`) VALUES
(8, 'images/Infographic Making - SACDALAN, FERDINAND PAULO.png', 'Fire Prevention', 'Dahil sa sobrang init ngayon na umabot sa 45 degree celsius, tayo ay pinaaalalahanan na magingat!');

-- --------------------------------------------------------

--
-- Table structure for table `contact_messages`
--

CREATE TABLE `contact_messages` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_messages`
--

INSERT INTO `contact_messages` (`id`, `name`, `email`, `message`, `created_at`) VALUES
(16, '', 'denver@gmail.com', 'salamat po sa libreng bigas!', '2024-04-28 03:31:03'),
(19, '', 'soniaperez@gmail.com', 'testing ko lang magsend ng mahabang mahabang mahabang mahabang mahabang mahabang mahabang mahabang mahabang mahabang mahabang mahabang mahabang mahabang mahabang mahabang mahabang mahabang mahabang mahabang mahabang mahabang mahabang mahabang message para makita ko kung gumagana yung paghide sa code', '2024-04-29 04:25:57'),
(20, 'John Doe', 'johndoe@gmail.com', 'I appreciate the effort the barangay is putting into improving our community.', '2024-04-29 04:32:36'),
(21, 'Jane Smith', 'janesmith@gmail.com', 'I have some concerns about the cleanliness of our streets. Can we discuss this further?', '2024-04-29 04:32:36'),
(22, 'Michael Johnson', 'michaeljohnson@gmail.com', 'Thank you for addressing the issue with the streetlights. It has made our neighborhood safer.', '2024-04-29 04:32:36'),
(23, 'Emily Brown', 'emilybrown@gmail.com', 'I noticed some graffiti on the walls near the park. Could we please take action to remove it?', '2024-04-29 04:32:36'),
(24, 'David Lee', 'davidlee@gmail.com', 'Im impressed with the new community center. Its a great addition to our neighborhood.', '2024-04-29 04:32:36'),
(25, 'Jennifer Martinez', 'jennifermartinez@gmail.com', 'There have been some disturbances late at night. Can we have more patrols in the area?', '2024-04-29 04:32:36'),
(26, 'Juan dela Cruz', 'juandelacruz@gmail.com', 'Salamat sa magandang serbisyo sa barangay! Napakalinis ng paligid.', '2024-04-29 04:33:13'),
(27, 'Maria Santos', 'mariasantos@gmail.com', 'Maganda ang proyektong ipinatutupad ng barangay para sa kalikasan. Malaking tulong ito sa ating komunidad.', '2024-04-29 04:33:13'),
(28, 'Pedro Reyes', 'pedroreyes@gmail.com', 'Napakaganda ng mga aktibidades na inihahanda ng barangay para sa kabataan. Saludo ako sa inyo!', '2024-04-29 04:33:13'),
(29, 'Andres Hernandez', 'andreshernandez@gmail.com', 'Nakakalungkot na hindi pa rin naaayos ang problema sa kalsada. Sana mabilisang aksyonan ito ng barangay.', '2024-04-29 04:33:13'),
(30, 'Feliza Garcia', 'felizagarcia@gmail.com', 'May mga basura pa rin sa mga bangketa. Sana mas maging mahigpit ang pagpapatupad ng ordinansa.', '2024-04-29 04:33:13'),
(31, 'Ramon Reyes', 'ramonreyes@gmail.com', 'Hindi sapat ang ilaw sa ilang lugar ng barangay. Sana mas mapagtuunan ng pansin ang seguridad ng mga residente.', '2024-04-29 04:33:13'),
(32, '', 'anitadelacruz@gmail.com', 'Malinis at maayos ang mga kalsada sa barangay. Salamat sa pag-aalaga sa ating kapaligiran.', '2024-04-29 04:34:46'),
(33, '', 'rodelmendoza@gmail.com', 'Napakaganda ng programa para sa mga senior citizens. Malaking tulong ito sa kanilang kalusugan at kasiyahan.', '2024-04-29 04:34:46'),
(34, '', 'leilasantos@gmail.com', 'Mabuhay ang barangay! Nais ko lamang pasalamatan ang lahat ng mga lider at kawani ng barangay sa kanilang dedikasyon.', '2024-04-29 04:34:46'),
(35, '', 'rodrigotan@gmail.com', 'Nakakalungkot na hindi pa rin napapansin ang mga bahay na napabayaan. Sana ay may agarang solusyon sa problemang ito.', '2024-04-29 04:34:46'),
(36, '', 'carmelaperez@gmail.com', 'Nakakabahala ang dumaraming krimen sa barangay. Sana ay mas palakasin pa ang seguridad sa komunidad.', '2024-04-29 04:34:46'),
(37, '', 'leonardodelaCruz@gmail.com', 'Hindi sapat ang serbisyo ng barangay sa pangangalaga ng kapaligiran. Dapat mas magtulungan tayo para sa ating kalikasan.', '2024-04-29 04:34:46'),
(38, 'paulmar', 'paulmarmanjac@gmail.com', 'bakit wala na namang kuryente?', '2024-04-30 08:17:41'),
(39, '', 'soniaperez@gmail.com', 'need ko ng help, patulong naman', '2024-05-01 17:01:13');

-- --------------------------------------------------------

--
-- Table structure for table `incident_reports`
--

CREATE TABLE `incident_reports` (
  `id` int(11) NOT NULL,
  `incident_type` varchar(255) NOT NULL,
  `incident_date` datetime NOT NULL,
  `location` varchar(255) NOT NULL,
  `involved_person` varchar(255) NOT NULL,
  `narrative_details` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `incident_reports`
--

INSERT INTO `incident_reports` (`id`, `incident_type`, `incident_date`, `location`, `involved_person`, `narrative_details`, `created_at`) VALUES
(1, 'curfew', '2024-04-30 22:27:00', 'court', 'denver alipustain', 'nagbabasketball', '2024-05-01 14:28:13'),
(2, 'away', '2024-05-01 10:43:00', 'kanto', 'ferdinand paulo sacdalan, juspher pedraza', 'nagaway dahil sa vegeballs', '2024-05-01 14:38:07');

-- --------------------------------------------------------

--
-- Table structure for table `officials`
--

CREATE TABLE `officials` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `image_url` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `officials`
--

INSERT INTO `officials` (`id`, `name`, `position`, `image_url`, `created_at`) VALUES
(16, 'Arlene Alipustain', 'Barangay Chairwoman', 'uploads/arlene.jpg', '2024-04-27 11:49:16');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `services_text` text DEFAULT NULL,
  `services_img` varchar(255) DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `service_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `services_text`, `services_img`, `created_date`, `service_title`) VALUES
(4, 'We recognize that to be able to help save our waterways from litter, we need to address the issue of pollution at its source. But these cleanups do make a big difference especially in shaping the way people interact with the environment.', 'uploads/wat.jpg', '2024-04-26 07:28:23', 'Costal Cleaning'),
(5, 'The world-famous \"Parada ng Lechon\" originated in the old thanksgiving custom of the working class in what used to be the poor and depressed area of the Kanluran district (western Poblacion) of Balayan, Batangas.\r\n', 'uploads/festi.jpg', '2024-04-26 07:28:46', 'Lechon Festival'),
(6, 'Through RAFI\'s One-Two-Three (OTT) program, the partnership aims to plant and nurture 45,000 native trees in a 56-hectare-area for a 3-year-period in the municipality of Balayan and Tuy, Batangas. ICTSI Foundation will solely fund this tree-growing project which is the first project partnership of RAFI_OTT in Luzon area.', 'uploads/denr.jpg', '2024-04-29 13:10:25', 'Tree Planting');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `confirmation_code` varchar(255) DEFAULT NULL,
  `is_confirmed` tinyint(1) DEFAULT 0,
  `email` varchar(255) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `middle_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `sex` enum('male','female') DEFAULT NULL,
  `civil_status` enum('single','married','widowed') DEFAULT NULL,
  `house_number` varchar(50) DEFAULT NULL,
  `street` varchar(100) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `household_condition` varchar(255) DEFAULT NULL,
  `family_condition` varchar(255) DEFAULT NULL,
  `family_info_q1` varchar(255) DEFAULT NULL,
  `family_info_q2` varchar(255) DEFAULT NULL,
  `family_info_q3` varchar(255) DEFAULT NULL,
  `family_info_q3_2` varchar(255) DEFAULT NULL,
  `meals_daily` varchar(255) DEFAULT NULL,
  `herbal_plant` varchar(255) DEFAULT NULL,
  `vege_garden` varchar(255) DEFAULT NULL,
  `fam_plan` varchar(255) DEFAULT NULL,
  `therapy` varchar(255) DEFAULT NULL,
  `barangay` varchar(255) DEFAULT NULL,
  `profile_picture` varchar(255) DEFAULT NULL,
  `contact_number` varchar(15) DEFAULT NULL,
  `4ps` varchar(255) DEFAULT NULL,
  `house_acquisition` varchar(255) DEFAULT NULL,
  `lot_ownership` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `confirmation_code`, `is_confirmed`, `email`, `first_name`, `middle_name`, `last_name`, `birthdate`, `sex`, `civil_status`, `house_number`, `street`, `city`, `household_condition`, `family_condition`, `family_info_q1`, `family_info_q2`, `family_info_q3`, `family_info_q3_2`, `meals_daily`, `herbal_plant`, `vege_garden`, `fam_plan`, `therapy`, `barangay`, `profile_picture`, `contact_number`, `4ps`, `house_acquisition`, `lot_ownership`) VALUES
('', '@Canda123', NULL, 0, 'paulmarmanjac@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('20-00160', '@Canda123', NULL, 0, 'joaodasilva@gmail.com', 'Joao', 'Santos', 'da Silva', '1985-09-10', 'male', 'single', '123', 'Sambok', 'Balayan', 'owner', 'active', '3', '1995-02-20', 'Balayan', 'Batangas', 'yes', 'no', 'yes', 'no', 'yes', 'canda', NULL, '09123456789', 'no', 'owned', 'owned'),
('20-00161', '@Canda123', NULL, 0, 'mariaalves@gmail.com', 'Maria', 'Fernandes', 'Alves', '1978-06-25', 'female', 'married', '456', 'Sugod', 'Balayan', 'extended_family', 'inactive', '4', '2000-03-15', 'Balayan', 'Batangas', 'yes', 'yes', 'no', 'yes', 'no', 'canda', NULL, '09134567890', 'yes', 'rented', 'owned'),
('20-00163', '@Canda123', NULL, 0, 'anaferreira@gmail.com', 'Ana', 'Pereira', 'Ferreira', '1983-03-17', 'female', 'widowed', '1011', 'Suklob', 'Balayan', 'owner', 'inactive', '5', '1999-09-28', 'Balayan', 'Batangas', 'yes', 'yes', 'yes', 'yes', 'no', 'canda', NULL, '09156789012', 'yes', 'occupied free with consent', 'family owned'),
('20-00164', '@Canda123', NULL, 0, 'carlosrodrigues@gmail.com', 'Carlos', 'Oliveira', 'Rodrigues', '1976-12-30', 'male', 'married', '1213', 'Palayan', 'Balayan', 'extended_family', 'active', '3', '2005-12-10', 'Balayan', 'Batangas', 'yes', 'no', 'no', 'yes', 'no', 'canda', NULL, '09167890123', 'no', 'owned', 'government owned'),
('20-00165', '@Canda123', NULL, 0, 'silvialopes@gmail.com', 'Silvia', 'Santos', 'Lopes', '1995-05-05', 'female', 'single', '1415', 'Sambok', 'Balayan', 'owner', 'active', '4', '2000-02-15', 'Balayan', 'Batangas', 'yes', 'yes', 'no', 'no', 'yes', 'canda', NULL, '09178901234', 'yes', 'rented', 'owned'),
('20-00166', '@Canda123', NULL, 0, 'fernandocosta@gmail.com', 'Fernando', 'Silva', 'Costa', '1988-08-20', 'male', 'single', '1617', 'Sugod', 'Balayan', 'owner', 'inactive', '2', '1996-10-05', 'Balayan', 'Batangas', 'yes', 'no', 'yes', 'yes', 'yes', 'canda', NULL, '09189012345', 'no', 'amortized', 'caretaker'),
('20-00167', '@Canda123', NULL, 0, 'patriciamartins@gmail.com', 'Patricia', 'Oliveira', 'Martins', '1979-04-12', 'female', 'married', '1819', 'Gancho', 'Balayan', 'owner', 'active', '3', '1998-08-30', 'Balayan', 'Batangas', 'yes', 'yes', 'no', 'no', 'no', 'canda', NULL, '09190123456', 'yes', 'occupied free with consent', 'family owned'),
('20-00168', '@Canda123', NULL, 0, 'marcelopereira@gmail.com', 'Marcelo', 'Santos', 'Pereira', '1992-01-29', 'male', 'single', '2021', 'Suklob', 'Balayan', 'extended_family', 'inactive', '5', '2001-05-20', 'Balayan', 'Batangas', 'yes', 'yes', 'yes', 'yes', 'yes', 'canda', NULL, '09201234567', 'no', 'owned', 'government owned'),
('20-00169', '@Canda123', NULL, 0, 'andreafonseca@gmail.com', 'Andre', 'Rodrigues', 'Fonseca', '1986-07-08', 'female', 'married', '2223', 'Palayan', 'Balayan', 'owner', 'active', '4', '2003-09-15', 'Balayan', 'Batangas', 'yes', 'no', 'yes', 'no', 'no', 'canda', NULL, '09212345678', 'yes', 'rented', 'owned'),
('20-00170', '@Canda123', NULL, 0, 'renatosilva@gmail.com', 'Renato', 'Oliveira', 'Silva', '1980-02-14', 'male', 'single', '2425', 'Sambok', 'Balayan', 'owner', 'active', '3', '1999-07-10', 'Balayan', 'Batangas', 'yes', 'no', 'no', 'yes', 'yes', 'canda', NULL, '09223456789', 'no', 'amortized', 'caretaker'),
('20-00171', '@Canda123', NULL, 0, 'claudiacarvalho@gmail.com', 'Claudia', 'Lima', 'Carvalho', '1975-11-03', 'female', 'widowed', '2627', 'Sugod', 'Balayan', 'owner', 'inactive', '2', '1990-03-07', 'Balayan', 'Batangas', 'yes', 'yes', 'no', 'no', 'no', 'canda', NULL, '09234567890', 'yes', 'occupied free with consent', 'family owned'),
('20-00172', '@Canda123', NULL, 0, 'lucianomendes@gmail.com', 'Luciano', 'Fernandes', 'Mendes', '1993-08-11', 'male', 'single', '2829', 'Gancho', 'Balayan', 'extended_family', 'active', '6', '2005-06-15', 'Balayan', 'Batangas', 'yes', 'yes', 'no', 'yes', 'yes', 'canda', NULL, '09245678901', 'no', 'owned', 'government owned'),
('20-00173', '@Canda123', NULL, 0, 'marlenesilva@gmail.com', 'Marlene', 'Rodrigues', 'Silva', '1987-05-23', 'female', 'married', '3031', 'Suklob', 'Balayan', 'owner', 'active', '5', '2004-10-09', 'Balayan', 'Batangas', 'yes', 'no', 'yes', 'no', 'no', 'canda', NULL, '09256789012', 'yes', 'rented', 'owned'),
('20-00174', '@Canda123', NULL, 0, 'rafaelsantos@gmail.com', 'Rafael', 'Oliveira', 'Santos', '1981-10-17', 'male', 'single', '3233', 'Palayan', 'Balayan', 'owner', 'active', '4', '2002-12-30', 'Balayan', 'Batangas', 'yes', 'no', 'no', 'yes', 'yes', 'canda', NULL, '09267890123', 'no', 'amortized', 'caretaker'),
('20-00175', '@Canda123', NULL, 0, 'danielalmeida@gmail.com', 'Daniela', 'Silva', 'Almeida', '1976-07-28', 'female', 'widowed', '3435', 'Sambok', 'Balayan', 'owner', 'inactive', '3', '1999-08-20', 'Balayan', 'Batangas', 'yes', 'yes', 'no', 'no', 'yes', 'canda', NULL, '09278901234', 'yes', 'occupied free with consent', 'family owned'),
('20-00176', '@Canda123', NULL, 0, 'alexandresouza@gmail.com', 'Alexandre', 'Lima', 'Souza', '1990-02-03', 'male', 'married', '3637', 'Sugod', 'Balayan', 'owner', 'active', '2', '2000-04-25', 'Balayan', 'Batangas', 'yes', 'yes', 'yes', 'yes', 'no', 'canda', NULL, '09289012345', 'no', 'owned', 'government owned'),
('20-00177', '@Canda123', NULL, 0, 'cristinasilveira@gmail.com', 'Cristina', 'Oliveira', 'Silveira', '1985-11-19', 'female', 'single', '3839', 'Gancho', 'Balayan', 'extended_family', 'inactive', '5', '2001-08-13', 'Balayan', 'Batangas', 'yes', 'no', 'no', 'no', 'yes', 'canda', NULL, '09290123456', 'yes', 'rented', 'owned'),
('20-00178', '@Canda123', NULL, 0, 'tiagorodrigues@gmail.com', 'Tiago', 'Santos', 'Rodrigues', '1979-06-09', 'male', 'single', '4041', 'Suklob', 'Balayan', 'owner', 'active', '4', '1998-10-05', 'Balayan', 'Batangas', 'yes', 'yes', 'yes', 'yes', 'no', 'canda', NULL, '09301234567', 'no', 'amortized', 'caretaker'),
('20-00179', '@Canda123', NULL, 0, 'rosaferreira@gmail.com', 'Rosa', 'Oliveira', 'Ferreira', '1984-03-24', 'female', 'married', '4243', 'Palayan', 'Balayan', 'owner', 'active', '3', '2003-07-15', 'Balayan', 'Batangas', 'yes', 'no', 'yes', 'no', 'no', 'canda', NULL, '09312345678', 'yes', 'occupied free with consent', 'family owned'),
('20-00180', '@Canda123', NULL, 0, 'ricardosilva@gmail.com', 'Ricardo', 'Lima', 'Silva', '1991-12-12', 'male', 'single', '4445', 'Sambok', 'Balayan', 'owner', 'inactive', '2', '1998-09-30', 'Balayan', 'Batangas', 'yes', 'yes', 'no', 'yes', 'yes', 'canda', NULL, '09323456789', 'no', 'owned', 'government owned'),
('20-00181', '@Canda123', NULL, 0, 'lucianamartins@gmail.com', 'Luciana', 'Oliveira', 'Martins', '1978-09-03', 'female', 'widowed', '4647', 'Sugod', 'Balayan', 'owner', 'inactive', '4', '2005-02-12', 'Balayan', 'Batangas', 'yes', 'yes', 'no', 'no', 'no', 'canda', NULL, '09334567890', 'yes', 'rented', 'owned'),
('20-00182', '@Canda123', NULL, 0, 'marcossouza@gmail.com', 'Marcos', 'Silva', 'Souza', '1983-04-06', 'male', 'married', '4849', 'Gancho', 'Balayan', 'owner', 'active', '5', '2001-03-28', 'Balayan', 'Batangas', 'yes', 'no', 'yes', 'no', 'yes', 'canda', NULL, '09345678901', 'no', 'amortized', 'caretaker'),
('20-00183', '@Canda123', NULL, 0, 'fernandalima@gmail.com', 'Fernanda', 'Lima', 'Silva', '1977-01-15', 'female', 'single', '5051', 'Suklob', 'Balayan', 'owner', 'active', '3', '1999-11-21', 'Balayan', 'Batangas', 'yes', 'yes', 'yes', 'yes', 'no', 'canda', NULL, '09356789012', 'yes', 'occupied free with consent', 'family owned'),
('20-00184', '@Canda123', NULL, 0, 'andreoliveira@gmail.com', 'Andre', 'Oliveira', 'Silva', '1994-06-30', 'male', 'married', '5253', 'Palayan', 'Balayan', 'owner', 'active', '4', '2002-05-17', 'Balayan', 'Batangas', 'yes', 'no', 'yes', 'no', 'no', 'canda', NULL, '09367890123', 'no', 'owned', 'government owned'),
('20-00185', '@Canda123', NULL, 0, 'mariapereira@gmail.com', 'Maria', 'Lima', 'Pereira', '1980-05-02', 'female', 'widowed', '5455', 'Sambok', 'Balayan', 'owner', 'inactive', '2', '1998-08-10', 'Balayan', 'Batangas', 'yes', 'yes', 'no', 'no', 'yes', 'canda', NULL, '09378901234', 'yes', 'rented', 'owned'),
('20-00186', '@Canda123', NULL, 0, 'rodrigofonseca@gmail.com', 'Rodrigo', 'Silva', 'Fonseca', '1996-09-18', 'male', 'single', '5657', 'Sugod', 'Balayan', 'owner', 'active', '5', '2003-12-25', 'Balayan', 'Batangas', 'yes', 'no', 'yes', 'yes', 'yes', 'canda', NULL, '09389012345', 'no', 'amortized', 'caretaker'),
('20-00187', '@Canda123', NULL, 0, 'sandravieira@gmail.com', 'Sandra', 'Oliveira', 'Vieira', '1974-08-07', 'female', 'married', '5859', 'Gancho', 'Balayan', 'owner', 'active', '4', '2000-06-30', 'Balayan', 'Batangas', 'yes', 'yes', 'no', 'no', 'no', 'canda', NULL, '09390123456', 'yes', 'occupied free with consent', 'family owned'),
('20-00188', '@Canda123', NULL, 0, 'leandroalmeida@gmail.com', 'Leandro', 'Lima', 'Almeida', '1979-03-29', 'male', 'single', '6061', 'Suklob', 'Balayan', 'owner', 'inactive', '3', '1999-05-22', 'Balayan', 'Batangas', 'yes', 'yes', 'yes', 'yes', 'yes', 'canda', NULL, '09401234567', 'no', 'owned', 'government owned'),
('20-00189', '@Canda123', NULL, 0, 'julianasilva@gmail.com', 'Juliana', 'Rodrigues', 'Silva', '1991-02-14', 'female', 'married', '6263', 'Palayan', 'Balayan', 'owner', 'active', '2', '2003-04-18', 'Balayan', 'Batangas', 'yes', 'no', 'yes', 'no', 'no', 'canda', NULL, '09412345678', 'yes', 'rented', 'owned'),
('20-00190', '@Canda123', NULL, 0, 'rodrigooliveira@gmail.com', 'Rodrigo', 'Silva', 'Oliveira', '1985-11-03', 'male', 'single', '6465', 'Sambok', 'Balayan', 'owner', 'active', '5', '2002-07-05', 'Balayan', 'Batangas', 'yes', 'no', 'no', 'yes', 'yes', 'canda', NULL, '09423456789', 'no', 'amortized', 'caretaker'),
('20-00191', '@Canda123', NULL, 0, 'anapereira@gmail.com', 'Ana', 'Fernandes', 'Pereira', '1978-06-25', 'female', 'single', '123', 'Sambok', 'Balayan', 'owner', 'active', '3', '1995-02-20', 'Balayan', 'Batangas', 'yes', 'no', 'yes', 'no', 'yes', 'canda', NULL, '09434567890', 'no', 'owned', 'owned'),
('20-00192', '@Canda123', NULL, 0, 'leonardolima@gmail.com', 'Leonardo', 'Silva', 'Lima', '1990-11-08', 'male', 'single', '456', 'Sugod', 'Balayan', 'extended_family', 'inactive', '4', '2000-03-15', 'Balayan', 'Batangas', 'yes', 'yes', 'no', 'yes', 'no', 'canda', NULL, '09445678901', 'yes', 'rented', 'owned'),
('20-00193', '@Canda123', NULL, 0, 'carolinagoncalves@gmail.com', 'Carolina', 'Lima', 'Gonçalves', '1993-04-10', 'female', 'married', '789', 'Gancho', 'Balayan', 'owner', 'active', '2', '1998-07-03', 'Balayan', 'Batangas', 'yes', 'yes', 'yes', 'no', 'no', 'canda', NULL, '09456789012', 'no', 'amortized', 'caretaker'),
('20-00194', '@Canda123', NULL, 0, 'eduardofonseca@gmail.com', 'Eduardo', 'Rodrigues', 'Fonseca', '1988-12-17', 'male', 'single', '1011', 'Suklob', 'Balayan', 'owner', 'inactive', '5', '1999-09-28', 'Balayan', 'Batangas', 'yes', 'yes', 'yes', 'yes', 'no', 'canda', NULL, '09467890123', 'yes', 'occupied free with consent', 'family owned'),
('20-00195', '@Canda123', NULL, 0, 'mariaoliveira@gmail.com', 'Maria', 'Santos', 'Oliveira', '1976-03-30', 'female', 'married', '1213', 'Palayan', 'Balayan', 'extended_family', 'active', '3', '2005-12-10', 'Balayan', 'Batangas', 'yes', 'no', 'no', 'yes', 'no', 'canda', NULL, '09478901234', 'no', 'owned', 'government owned'),
('20-00196', '@Canda123', NULL, 0, 'rodrigosilva@gmail.com', 'Rodrigo', 'Fernandes', 'Silva', '1995-09-14', 'male', 'single', '1415', 'Sambok', 'Balayan', 'owner', 'active', '4', '2000-02-15', 'Balayan', 'Batangas', 'yes', 'yes', 'no', 'no', 'yes', 'canda', NULL, '09489012345', 'yes', 'rented', 'owned'),
('20-00197', '@Canda123', NULL, 0, 'claudialopes@gmail.com', 'Claudia', 'Oliveira', 'Lopes', '1987-02-20', 'female', 'widowed', '1617', 'Sugod', 'Balayan', 'owner', 'inactive', '2', '1996-10-05', 'Balayan', 'Batangas', 'yes', 'no', 'yes', 'yes', 'yes', 'canda', NULL, '09490123456', 'no', 'amortized', 'caretaker'),
('20-00198', '@Canda123', NULL, 0, 'pedroalmeida@gmail.com', 'Pedro', 'Lima', 'Almeida', '1979-09-12', 'male', 'married', '1819', 'Gancho', 'Balayan', 'owner', 'active', '3', '1998-08-30', 'Balayan', 'Batangas', 'yes', 'yes', 'no', 'no', 'no', 'canda', NULL, '09501234567', 'yes', 'occupied free with consent', 'family owned'),
('20-00199', '@Canda123', NULL, 0, 'sabrinamendes@gmail.com', 'Sabrina', 'Fernandes', 'Mendes', '1982-08-03', 'female', 'single', '2021', 'Suklob', 'Balayan', 'extended_family', 'inactive', '5', '2001-05-20', 'Balayan', 'Batangas', 'yes', 'yes', 'yes', 'yes', 'yes', 'canda', NULL, '09512345678', 'no', 'owned', 'government owned'),
('20-00200', '@Canda123', NULL, 0, 'gabrielarodrigues@gmail.com', 'Gabriela', 'Rodrigues', 'Silva', '1986-04-27', 'male', 'married', '2223', 'Palayan', 'Balayan', 'owner', 'active', '4', '2003-09-15', 'Balayan', 'Batangas', 'yes', 'no', 'yes', 'no', 'no', 'canda', NULL, '09523456789', 'yes', 'rented', 'owned'),
('20-00201', '@Canda123', NULL, 0, 'joanasilva@gmail.com', 'Joana', 'Lima', 'Silva', '1980-10-22', 'female', 'widowed', '2425', 'Sambok', 'Balayan', 'owner', 'inactive', '3', '1999-07-10', 'Balayan', 'Batangas', 'yes', 'no', 'no', 'yes', 'yes', 'canda', NULL, '09534567890', 'no', 'amortized', 'caretaker'),
('24-00001', '@Canda123', '427669', 0, 'paulmarmanjac@gmail.com', 'John Paulmar', 'Lontoc', 'Manjac', '0000-00-00', '', '', '', '', 'Balayan', NULL, NULL, '', '', '', '', NULL, NULL, NULL, NULL, NULL, 'Canda', 'uploads/663263b232ec6_6630e13b5d50c_662da39831141_662da2950d9e6_662d9ac6ad449_paulmar.jpg', '', '', '', ''),
('24-00014', '@Canda123', NULL, 0, 'kevinlopez@gmail.com', 'Kevin', 'Alexander', 'Lopez', '1998-05-10', 'male', 'single', '132', 'Sambok', 'Balayan', 'extended_family', 'inactive', '4', '1993', 'Iloilo', 'iloilo', 'no', 'no', 'no', 'yes', 'yes', 'balayan', NULL, '09203999901', 'No', 'occupied free with consent', 'rented'),
('24-00015', '@Canda123', NULL, 0, 'sarahwang@gmail.com', 'Sarah', 'Li', 'Wang', '1990-08-25', 'female', 'single', '88', 'Gancho', 'Balayan', 'owner', 'active', '8', '1979', 'Baguio', 'benguet', 'yes', 'no', 'yes', 'yes', 'yes', 'balayan', NULL, '09019558822', 'No', 'owned', 'government owned'),
('24-00016', '@Canda123', NULL, 0, 'michaelsmith@gmail.com', 'Michael', 'James', 'Smith', '1985-12-15', 'male', 'married', '57', 'Suklob', 'Balayan', 'owner', 'active', '2', '1987', 'Zamboanga', 'zamboanga del sur', 'yes', 'no', 'no', 'no', 'yes', 'balayan', NULL, '09485794440', 'Yes', 'government owned', 'amortized'),
('24-00017', '@Canda123', NULL, 0, 'katherinelee@gmail.com', 'Katherine', 'May', 'Lee', '1976-04-02', 'female', 'widowed', '163', 'Santulan', 'Balayan', 'extended_family', 'inactive', '1', '1980', 'Angeles', 'pampanga', 'no', 'yes', 'no', 'no', 'yes', 'balayan', NULL, '09370295764', 'Yes', 'rented', 'owned'),
('24-00018', '@Canda123', NULL, 0, 'ryangarcia@gmail.com', 'Ryan', 'Joseph', 'Garcia', '1992-02-28', 'male', 'single', '114', 'Sugod', 'Balayan', 'owner', 'active', '8', '1975', 'Cagayan de Oro', 'misamis oriental', 'yes', 'yes', 'yes', 'no', 'no', 'balayan', NULL, '09394095531', 'No', 'amortized', 'occupied free without consent'),
('24-00019', '@Canda123', NULL, 0, 'mariagomez@gmail.com', 'Maria', 'Carmen', 'Gomez', '1980-10-18', 'female', 'married', '22', 'Palayan', 'Balayan', 'owner', 'active', '5', '1988', 'Bacolod', 'negros occidental', 'no', 'yes', 'no', 'yes', 'yes', 'balayan', NULL, '09859590393', 'No', 'owned', 'government owned'),
('24-00020', '@Canda123', NULL, 0, 'danielrodriguez@gmail.com', 'Daniel', 'Patrick', 'Rodriguez', '1996-06-08', 'male', 'single', '77', 'Suklob', 'Balayan', 'extended_family', 'inactive', '6', '1977', 'Iligan', 'lanao del norte', 'yes', 'no', 'yes', 'no', 'no', 'balayan', NULL, '09115665404', 'Yes', 'occupied free with consent', 'owned'),
('24-00021', '@Canda123', NULL, 0, 'jessicataylor@gmail.com', 'Jessica', 'Marie', 'Taylor', '1973-09-23', 'female', 'widowed', '195', 'Sambok', 'Balayan', 'owner', 'active', '7', '1972', 'Calamba', 'laguna', 'yes', 'yes', 'yes', 'yes', 'yes', 'balayan', NULL, '09999555871', 'No', 'amortized', 'rented'),
('24-00022', '@Canda123', NULL, 0, 'christophernguyen@gmail.com', 'Christopher', 'Minh', 'Nguyen', '1983-11-11', 'male', 'married', '31', 'Gancho', 'Balayan', 'extended_family', 'inactive', '4', '1983', 'Antipolo', 'rizal', 'yes', 'no', 'no', 'yes', 'no', 'balayan', NULL, '09650783177', 'Yes', 'government owned', 'amortized'),
('24-00023', '@Canda123', NULL, 0, 'jenniferdavis@gmail.com', 'Jennifer', 'Elizabeth', 'Davis', '1994-01-05', 'female', 'single', '68', 'Suklob', 'Balayan', 'owner', 'active', '3', '1981', 'Dagupan', 'pangasinan', 'no', 'no', 'no', 'no', 'yes', 'balayan', NULL, '09255248300', 'No', 'amortized', 'amortized'),
('24-00024', '@Canda123', NULL, 0, 'matthewmartinez@gmail.com', 'Matthew', 'Gabriel', 'Martinez', '1987-07-30', 'male', 'single', '150', 'Santulan', 'Balayan', 'extended_family', 'inactive', '2', '1995', 'Marawi', 'lanao del sur', 'yes', 'no', 'yes', 'no', 'no', 'balayan', NULL, '09323892004', 'No', 'government owned', 'rented'),
('24-00025', '@Canda123', NULL, 0, 'susanbrown@gmail.com', 'Susan', 'Ann', 'Brown', '1978-12-20', 'female', 'married', '93', 'Palayan', 'Balayan', 'owner', 'active', '8', '1976', 'Dumaguete', 'negros oriental', 'yes', 'yes', 'no', 'yes', 'yes', 'balayan', NULL, '09853715148', 'Yes', 'amortized', 'caretaker'),
('24-00026', '@Canda123', NULL, 0, 'andrewclark@gmail.com', 'Andrew', 'Scott', 'Clark', '1991-04-15', 'male', 'single', '127', 'Sugod', 'Balayan', 'extended_family', 'inactive', '5', '1994', 'Tagbilaran', 'bohol', 'yes', 'no', 'yes', 'yes', 'yes', 'balayan', NULL, '09296899761', 'No', 'occupied free with consent', 'amortized'),
('24-00027', '@Canda123', NULL, 0, 'rebeccawilson@gmail.com', 'Rebecca', 'Louise', 'Wilson', '1971-08-10', 'female', 'widowed', '84', 'Sambok', 'Balayan', 'owner', 'active', '4', '1986', 'Tacloban', 'leyte', 'yes', 'yes', 'no', 'no', 'yes', 'balayan', NULL, '09923353391', 'Yes', 'government owned', 'government owned'),
('24-00028', '@Canda123', NULL, 0, 'peterwalker@gmail.com', 'Peter', 'John', 'Walker', '1993-02-28', 'male', 'married', '36', 'Gancho', 'Balayan', 'extended_family', 'inactive', '6', '1974', 'Malolos', 'bulacan', 'no', 'no', 'yes', 'no', 'no', 'balayan', NULL, '09726067704', 'Yes', 'owned', 'amortized'),
('24-00029', '@Canda123', NULL, 0, 'rachelmartin@gmail.com', 'Rachel', 'Marie', 'Martin', '1982-06-15', 'female', 'married', '172', 'Suklob', 'Balayan', 'owner', 'active', '7', '1973', 'San Fernando', 'pampanga', 'yes', 'yes', 'no', 'no', 'no', 'balayan', NULL, '09860278379', 'No', 'owned', 'occupied free without consent'),
('24-00030', '@Canda123', NULL, 0, 'patrickjackson@gmail.com', 'Patrick', 'Lee', 'Jackson', '1986-03-18', 'male', 'single', '98', 'Sambok', NULL, 'extended_family', 'inactive', '4', '1990', 'Cebu', 'cebu', 'yes', 'no', 'yes', 'no', 'yes', 'balayan', NULL, '09123188816', 'Yes', 'owned', 'government owned'),
('24-00031', '@Canda123', NULL, 0, 'gracewhite@gmail.com', 'Grace', 'Elizabeth', 'White', '1997-09-10', 'female', 'single', '73', 'Gancho', NULL, 'owner', 'active', '7', '1978', 'Dumaguete', 'negros oriental', 'no', 'no', 'no', 'yes', 'yes', 'balayan', NULL, '09035108971', 'No', 'government owned', 'government owned'),
('24-00032', '@Canda123', NULL, 0, 'nicholaswilson@gmail.com', 'Nicholas', 'James', 'Wilson', '1980-05-25', 'male', 'married', '143', 'Santulan', NULL, 'extended_family', 'inactive', '3', '1982', 'Cagayan de Oro', 'misamis oriental', 'yes', 'no', 'yes', 'yes', 'no', 'balayan', NULL, '09805978439', 'No', 'government owned', 'government owned'),
('24-00033', '@Canda123', NULL, 0, 'amandaclark@gmail.com', 'Amanda', 'Nicole', 'Clark', '1993-11-08', 'female', 'single', '62', 'Sugod', NULL, 'owner', 'active', '5', '1986', 'Lipa', 'batangas', 'no', 'no', 'yes', 'no', 'yes', 'balayan', NULL, '09924565314', 'Yes', 'government owned', 'amortized'),
('24-00034', '@Canda123', NULL, 0, 'justinrogers@gmail.com', 'Justin', 'Michael', 'Rogers', '1988-07-15', 'male', 'single', '112', 'Suklob', NULL, 'extended_family', 'inactive', '2', '1998', 'Zamboanga', 'zamboanga del sur', 'yes', 'yes', 'no', 'no', 'no', 'balayan', NULL, '09204891283', 'No', 'rented', 'rented'),
('24-00035', '@Canda123', NULL, 0, 'elizabethbaker@gmail.com', 'Elizabeth', 'Anne', 'Baker', '1975-01-20', 'female', 'widowed', '87', 'Palayan', NULL, 'owner', 'active', '6', '1983', 'Bacolod', 'negros occidental', 'yes', 'no', 'yes', 'no', 'yes', 'balayan', NULL, '09250760504', 'No', 'rented', 'government owned'),
('24-00036', '@Canda123', NULL, 0, 'charlescooper@gmail.com', 'Charles', 'Robert', 'Cooper', '1990-09-28', 'male', 'married', '29', 'Sambok', NULL, 'extended_family', 'inactive', '4', '1979', 'Davao', 'davao del sur', 'no', 'yes', 'no', 'yes', 'yes', 'balayan', NULL, '09639128702', 'Yes', 'amortized', 'occupied free without consent'),
('24-00037', '@Canda123', NULL, 0, 'michellewood@gmail.com', 'Michelle', 'Marie', 'Wood', '1983-04-12', 'female', 'single', '175', 'Gancho', NULL, 'owner', 'active', '8', '1974', 'Angeles', 'pampanga', 'yes', 'no', 'no', 'no', 'no', 'balayan', NULL, '09443362029', 'Yes', 'rented', 'rented'),
('24-00038', '@Canda123', NULL, 0, 'robertedwards@gmail.com', 'Robert', 'William', 'Edwards', '1978-06-05', 'male', 'married', '51', 'Suklob', NULL, 'extended_family', 'inactive', '5', '1985', 'Iloilo', 'iloilo', 'no', 'yes', 'yes', 'no', 'yes', 'balayan', NULL, '09299424072', 'No', 'amortized', 'occupied free without consent'),
('24-00039', '@Canda123', NULL, 0, 'melissaharris@gmail.com', 'Melissa', 'Rose', 'Harris', '1982-02-15', 'female', 'single', '97', 'Santulan', NULL, 'owner', 'active', '7', '1977', 'Baguio', 'benguet', 'yes', 'yes', 'no', 'yes', 'yes', 'balayan', NULL, '09167034302', 'No', 'amortized', 'owned'),
('24-00040', '@Canda123', NULL, 0, 'davidyoung@gmail.com', 'David', 'Christopher', 'Young', '1996-08-30', 'male', 'single', '68', 'Palayan', NULL, 'extended_family', 'inactive', '6', '1988', 'Cebu', 'cebu', 'yes', 'no', 'yes', 'yes', 'no', 'balayan', NULL, '09936899324', 'Yes', 'government owned', 'amortized'),
('24-00041', '@Canda123', NULL, 0, 'jenniferlewis@gmail.com', 'Jennifer', 'Michelle', 'Lewis', '1987-12-03', 'female', 'single', '123', 'Sugod', NULL, 'owner', 'active', '5', '1980', 'Manila', 'metro manila', 'no', 'yes', 'yes', 'no', 'yes', 'balayan', NULL, '09183393748', 'No', 'owned', 'government owned'),
('24-00042', '@Canda123', NULL, 0, 'brianhall@gmail.com', 'Brian', 'Matthew', 'Hall', '1972-10-18', 'male', 'married', '84', 'Suklob', NULL, 'extended_family', 'inactive', '4', '1975', 'Dumaguete', 'negros oriental', 'yes', 'no', 'yes', 'no', 'yes', 'balayan', NULL, '09106270799', 'No', 'government owned', 'government owned'),
('24-00043', '@Canda123', NULL, 0, 'samantharoberts@gmail.com', 'Samantha', 'Taylor', 'Roberts', '1990-05-27', 'female', 'single', '134', 'Sambok', NULL, 'owner', 'active', '8', '1986', 'Davao', 'davao del sur', 'yes', 'no', 'yes', 'no', 'no', 'balayan', NULL, '09981172782', 'No', 'government owned', 'owned'),
('24-00044', '@Canda123', NULL, 0, 'kevinthomas@gmail.com', 'Kevin', 'Joseph', 'Thomas', '1981-11-08', 'male', 'married', '57', 'Gancho', NULL, 'extended_family', 'inactive', '2', '1987', 'Tacloban', 'leyte', 'no', 'no', 'yes', 'yes', 'yes', 'balayan', NULL, '09587051543', 'No', 'occupied free without consent', 'rented'),
('24-00045', '@Canda123', NULL, 0, 'ashleyhall@gmail.com', 'Ashley', 'Nicole', 'Hall', '1994-04-20', 'female', 'single', '102', 'Santulan', NULL, 'owner', 'active', '6', '1979', 'Legazpi', 'albay', 'yes', 'no', 'no', 'yes', 'yes', 'balayan', NULL, '09991739403', 'Yes', 'owned', 'government owned'),
('24-00046', '@Canda123', NULL, 0, 'joshuawalker@gmail.com', 'Joshua', 'Daniel', 'Walker', '1989-09-15', 'male', 'single', '45', 'Palayan', NULL, 'extended_family', 'inactive', '3', '1996', 'Naga', 'camarines sur', 'no', 'yes', 'no', 'no', 'yes', 'balayan', NULL, '09197542416', 'No', 'rented', 'government owned'),
('24-00047', '@Canda123', NULL, 0, 'emilybaker@gmail.com', 'Emily', 'Grace', 'Baker', '1976-03-12', 'female', 'widowed', '67', 'Sugod', NULL, 'owner', 'active', '7', '1982', 'Zamboanga', 'zamboanga del sur', 'yes', 'no', 'yes', 'no', 'yes', 'balayan', NULL, '09012493900', 'No', 'caretaker', 'occupied free with consent'),
('24-00048', '@Canda123', NULL, 0, 'jasonthompson@gmail.com', 'Jason', 'Lee', 'Thompson', '1984-08-23', 'male', 'married', '119', 'Suklob', NULL, 'extended_family', 'inactive', '5', '1990', 'Iloilo', 'iloilo', 'no', 'no', 'no', 'yes', 'yes', 'balayan', NULL, '09469842287', 'Yes', 'owned', 'occupied free with consent'),
('24-00049', '@Canda123', NULL, 0, 'meganwilson@gmail.com', 'Megan', 'Michelle', 'Wilson', '1987-12-03', 'female', 'single', '142', 'Santulan', NULL, 'owner', 'active', '6', '1983', 'Cagayan de Oro', 'misamis oriental', 'yes', 'yes', 'yes', 'no', 'no', 'balayan', NULL, '09311729763', 'Yes', 'owned', 'government owned'),
('24-00050', '@Canda123', NULL, 0, 'jonathandavis@gmail.com', 'Jonathan', 'David', 'Davis', '1993-01-25', 'male', 'single', '95', 'Sambok', 'Balayan', 'extended_family', 'inactive', '2', '1985', '', '', 'no', 'yes', 'no', 'yes', 'yes', 'Canda', NULL, '09149121988', 'Yes', 'amortized', 'amortized'),
('24-00051', '@Canda123', NULL, 0, 'mariogarcia@gmail.com', 'Mario', 'Gomez', 'Garcia', '1985-12-15', 'male', 'married', '45', 'Palayan', 'balayan', 'owner', 'active', '6', '1980', 'Manila', 'metro manila', 'yes', 'yes', 'no', 'yes', 'no', 'balayan', NULL, '09123456789', 'Yes', 'owned', 'government owned'),
('24-00052', '@Canda123', NULL, 0, 'cristinareyes@gmail.com', 'Cristina', 'Cruz', 'Reyes', '1979-09-20', 'female', 'single', '72', 'Suklob', 'balayan', 'extended_family', 'inactive', '4', '1991', 'Cebu', 'cebu', 'no', 'no', 'yes', 'no', 'yes', 'balayan', NULL, '09234567890', 'Yes', 'occupied free without consent', 'rented'),
('24-00053', '@Canda123', NULL, 0, 'alfonsogonzales@gmail.com', 'Alfonso', 'Santos', 'Gonzales', '1988-06-25', 'male', 'single', '118', 'Sambok', 'balayan', 'owner', 'active', '7', '1983', 'Davao', 'davao del sur', 'yes', 'no', 'no', 'yes', 'yes', 'balayan', NULL, '09345678901', 'Yes', 'government owned', 'amortized'),
('24-00054', '@Canda123', NULL, 0, 'andreafernandez@gmail.com', 'Andrea', 'Santiago', 'Fernandez', '1992-03-10', 'female', 'single', '63', 'Sugod', 'balayan', 'extended_family', 'inactive', '5', '1989', 'Baguio', 'benguet', 'no', 'yes', 'yes', 'no', 'no', 'balayan', NULL, '09456789012', 'No', 'owned', 'government owned'),
('24-00055', '@Canda123', NULL, 0, 'manuelramos@gmail.com', 'Manuel', 'Enriquez', 'Ramos', '1981-08-05', 'male', 'married', '143', 'Gancho', 'balayan', 'owner', 'active', '6', '1976', 'Angeles', 'pampanga', 'yes', 'no', 'yes', 'no', 'yes', 'balayan', NULL, '09567890123', 'Yes', 'government owned', 'occupied free with consent'),
('24-00056', '@Canda123', NULL, 0, 'rosamendoza@gmail.com', 'Rosa', 'Lopez', 'Mendoza', '1984-04-30', 'female', 'widowed', '87', 'Palayan', 'balayan', 'extended_family', 'inactive', '8', '1984', 'Bacolod', 'negros occidental', 'no', 'yes', 'no', 'yes', 'no', 'balayan', NULL, '09678901234', 'No', 'government owned', 'occupied free without consent'),
('24-00057', '@Canda123', NULL, 0, 'eduardodelacruz@gmail.com', 'Eduardo', 'Ocampo', 'De La Cruz', '1977-01-18', 'male', 'single', '29', 'Suklob', 'balayan', 'owner', 'active', '7', '1995', 'Iloilo', 'iloilo', 'yes', 'no', 'no', 'yes', 'yes', 'balayan', NULL, '09789012345', 'No', 'rented', 'government owned'),
('24-00058', '@Canda123', NULL, 0, 'patriciasanchez@gmail.com', 'Patricia', 'Mercado', 'Sanchez', '1989-07-25', 'female', 'married', '174', 'Santulan', 'balayan', 'extended_family', 'inactive', '6', '1980', 'Baguio', 'benguet', 'yes', 'no', 'yes', 'no', 'no', 'balayan', NULL, '09890123456', 'No', 'government owned', 'family owned'),
('24-00059', '@Canda123', NULL, 0, 'juanrivera@gmail.com', 'Juan', 'Natividad', 'Rivera', '1974-11-20', 'male', 'single', '50', 'Sambok', 'balayan', 'owner', 'active', '5', '1978', 'Tacloban', 'leyte', 'no', 'yes', 'yes', 'no', 'yes', 'balayan', NULL, '09901234567', 'No', 'owned', 'rented'),
('24-00060', '@Canda123', NULL, 0, 'sofiatorres@gmail.com', 'Sofia', 'Luna', 'Torres', '1986-02-15', 'female', 'single', '97', 'Gancho', 'balayan', 'extended_family', 'inactive', '4', '1993', 'Legazpi', 'albay', 'yes', 'no', 'no', 'yes', 'yes', 'balayan', NULL, '09012345678', 'Yes', 'amortized', 'government owned'),
('24-00061', '@Canda123', NULL, 0, 'pedroaguilar@gmail.com', 'Pedro', 'Alvarez', 'Aguilar', '1993-06-30', 'male', 'single', '67', 'Sugod', 'balayan', 'owner', 'active', '3', '1985', 'Zamboanga', 'zamboanga del sur', 'no', 'no', 'yes', 'yes', 'no', 'balayan', NULL, '09123456789', 'No', 'government owned', 'government owned'),
('24-00062', '@Canda123', NULL, 0, 'angelabatista@gmail.com', 'Angela', 'Dela Cruz', 'Batista', '1980-03-08', 'female', 'married', '83', 'Palayan', 'balayan', 'extended_family', 'inactive', '2', '1987', 'Dumaguete', 'negros oriental', 'yes', 'no', 'yes', 'no', 'yes', 'balayan', NULL, '09234567890', 'Yes', 'occupied free with consent', 'amortized'),
('24-00063', '@Canda123', NULL, 0, 'carlosgomez@gmail.com', 'Carlos', 'Nunez', 'Gomez', '1984-09-23', 'male', 'single', '112', 'Suklob', 'balayan', 'owner', 'active', '8', '1981', 'Davao', 'davao del sur', 'no', 'yes', 'no', 'yes', 'no', 'balayan', NULL, '09345678901', 'Yes', 'owned', 'occupied free without consent'),
('24-00064', '@Canda123', NULL, 0, 'marialopez@gmail.com', 'Maria', 'Santos', 'Lopez', '1987-12-18', 'female', 'widowed', '56', 'Sambok', 'balayan', 'extended_family', 'inactive', '6', '1984', 'Angeles', 'pampanga', 'yes', 'no', 'yes', 'no', 'no', 'balayan', NULL, '09456789012', 'No', 'government owned', 'owned'),
('24-00065', '@Canda123', NULL, 0, 'diegomartinez@gmail.com', 'Diego', 'Flores', 'Martinez', '1982-05-10', 'male', 'married', '130', 'Santulan', 'balayan', 'owner', 'active', '5', '1979', 'Cebu', 'cebu', 'no', 'yes', 'no', 'yes', 'yes', 'balayan', NULL, '09567890123', 'Yes', 'rented', 'amortized'),
('24-00066', '@Canda123', NULL, 0, 'anaperez@gmail.com', 'Ana', 'Diaz', 'Perez', '1990-08-22', 'female', 'single', '89', 'Gancho', 'balayan', 'extended_family', 'inactive', '7', '1986', 'Baguio', 'benguet', 'yes', 'no', 'no', 'yes', 'no', 'balayan', NULL, '09678901234', 'Yes', 'government owned', 'government owned'),
('24-00067', '@Canda123', NULL, 0, 'josemaria@gmail.com', 'Jose', 'Velasquez', 'Maria', '1976-02-05', 'male', 'single', '37', 'Palayan', 'balayan', 'owner', 'active', '3', '1990', 'Bacolod', 'negros occidental', 'no', 'no', 'yes', 'no', 'yes', 'balayan', NULL, '09789012345', 'Yes', 'amortized', 'owned'),
('24-00068', '@Canda123', NULL, 0, 'anamoreno@gmail.com', 'Ana', 'Garcia', 'Moreno', '1985-10-12', 'female', 'married', '64', 'Suklob', 'balayan', 'extended_family', 'inactive', '4', '1981', 'Iloilo', 'iloilo', 'yes', 'no', 'yes', 'no', 'yes', 'balayan', NULL, '09890123456', 'Yes', 'owned', 'government owned'),
('24-00069', '@Canda123', NULL, 0, 'miguelfernandez@gmail.com', 'Miguel', 'Reyes', 'Fernandez', '1978-04-29', 'male', 'single', '27', 'Sugod', 'balayan', 'owner', 'active', '8', '1985', 'Legazpi', 'albay', 'no', 'yes', 'yes', 'no', 'yes', 'balayan', NULL, '09901234567', 'Yes', 'owned', 'amortized'),
('24-00070', '@Canda123', NULL, 0, 'marthatorres@gmail.com', 'Martha', 'Sanchez', 'Torres', '1991-07-17', 'female', 'single', '98', 'Gancho', 'balayan', 'extended_family', 'inactive', '6', '1989', 'Dumaguete', 'negros oriental', 'yes', 'no', 'no', 'no', 'no', 'balayan', NULL, '09012345678', 'Yes', 'government owned', 'rented'),
('24-00071', '@Canda123', NULL, 0, 'johndoe@gmail.com', 'John', 'Anthony', 'Doe', '2016-05-20', 'male', 'single', '15', 'Suklob', 'balayan', 'owner', 'active', '3', '1990', 'Cebu', 'cebu', 'yes', 'no', 'no', 'yes', 'yes', 'balayan', NULL, '09123456789', 'No', 'government owned', 'rented'),
('24-00072', '@Canda123', NULL, 0, 'janedoe@gmail.com', 'Jane', 'Beatrice', 'Doe', '2013-08-10', 'female', 'single', '25', 'Sugod', 'balayan', 'extended_family', 'inactive', '5', '1989', 'Davao', 'davao del sur', 'no', 'yes', 'yes', 'no', 'no', 'balayan', NULL, '09134567890', 'Yes', 'government owned', 'government owned'),
('24-00073', '@Canda123', NULL, 0, 'mariogomez@gmail.com', 'Mario', 'Christopher', 'Gomez', '2008-11-15', 'male', 'single', '35', 'Palayan', 'balayan', 'owner', 'active', '6', '1980', 'Manila', 'metro manila', 'yes', 'no', 'no', 'yes', 'yes', 'balayan', NULL, '09145678901', 'No', 'government owned', 'owned'),
('24-00074', '@Canda123', NULL, 0, 'mariadelacruz@gmail.com', 'Maria', 'Daniela', 'De La Cruz', '2005-03-22', 'female', 'single', '45', 'Santulan', 'balayan', 'extended_family', 'inactive', '4', '1991', 'Cebu', 'cebu', 'no', 'yes', 'yes', 'no', 'yes', 'balayan', NULL, '09156789012', 'Yes', 'government owned', 'occupied free without consent'),
('24-00075', '@Canda123', NULL, 0, 'juangarcia@gmail.com', 'Juan', 'Emmanuel', 'Garcia', '2002-07-10', 'male', 'single', '55', 'Sambok', 'balayan', 'owner', 'active', '7', '1983', 'Davao', 'davao del sur', 'yes', 'no', 'no', 'yes', 'no', 'balayan', NULL, '09167890123', 'Yes', 'amortized', 'rented'),
('24-00076', '@Canda123', NULL, 0, 'anarodriguez@gmail.com', 'Ana', 'Francesca', 'Rodriguez', '1997-10-05', 'female', 'single', '65', 'Palayan', 'balayan', 'extended_family', 'inactive', '5', '1989', 'Baguio', 'benguet', 'no', 'yes', 'no', 'yes', 'yes', 'balayan', NULL, '09178901234', 'Yes', 'owned', 'rented'),
('24-00077', '@Canda123', NULL, 0, 'carlosfernandez@gmail.com', 'Carlos', 'Gabriel', 'Fernandez', '1994-12-18', 'male', 'single', '75', 'Suklob', 'balayan', 'owner', 'active', '8', '1981', 'Davao', 'davao del sur', 'yes', 'no', 'yes', 'no', 'yes', 'balayan', NULL, '09189012345', 'No', 'rented', 'rented'),
('24-00078', '@Canda123', NULL, 0, 'luisavila@gmail.com', 'Luisa', 'Hannah', 'Avila', '1991-02-28', 'female', 'single', '85', 'Sugod', 'balayan', 'extended_family', 'inactive', '2', '1987', 'Baguio', 'benguet', 'no', 'no', 'yes', 'yes', 'no', 'balayan', NULL, '09190123456', 'No', 'occupied free without consent', 'rented'),
('24-00079', '@Canda123', NULL, 0, 'josephlopez@gmail.com', 'Joseph', 'Isaac', 'Lopez', '1988-05-15', 'male', 'single', '95', 'Santulan', 'balayan', 'owner', 'active', '6', '1980', 'Angeles', 'pampanga', 'yes', 'no', 'yes', 'no', 'no', 'balayan', NULL, '09101234567', 'No', 'amortized', 'amortized'),
('24-00080', '@Canda123', NULL, 0, 'lucytorres@gmail.com', 'Lucy', 'Jasmine', 'Torres', '1985-09-30', 'female', 'single', '105', 'Gancho', 'balayan', 'extended_family', 'inactive', '4', '1981', 'Dumaguete', 'negros oriental', 'no', 'yes', 'yes', 'no', 'yes', 'balayan', NULL, '09112345678', 'Yes', 'government owned', 'occupied free without consent'),
('24-00081', '@Canda123', NULL, 0, 'miguelmartinez@gmail.com', 'Miguel', 'Kurt', 'Martinez', '1982-01-18', 'male', 'single', '115', 'Sambok', 'balayan', 'owner', 'active', '6', '1980', 'Tagaytay', 'cavite', 'yes', 'no', 'yes', 'no', 'no', 'balayan', NULL, '09123456789', 'No', 'owned', 'owned'),
('24-00082', '@Canda123', NULL, 0, 'mariaespina@gmail.com', 'Maria', 'Louisa', 'Espina', '1960-04-25', 'female', 'married', '125', 'Palayan', 'balayan', 'owner', 'active', '7', '1976', 'Dumaguete', 'negros oriental', 'yes', 'no', 'yes', 'yes', 'no', 'balayan', NULL, '09134567890', 'Yes', 'owned', 'rented'),
('24-00083', '@Canda123', NULL, 0, 'juanjose@gmail.com', 'Juan', 'Manuel', 'Jose', '1955-12-10', 'male', 'widowed', '135', 'Sugod', 'balayan', 'extended_family', 'inactive', '6', '1975', 'Cebu', 'cebu', 'no', 'yes', 'yes', 'no', 'yes', 'balayan', NULL, '09145678901', 'No', 'rented', 'owned'),
('24-00084', '@Canda123', NULL, 0, 'luciasantos@gmail.com', 'Lucia', 'Natividad', 'Santos', '1950-08-15', 'female', 'married', '145', 'Suklob', 'balayan', 'owner', 'active', '8', '1970', 'Davao', 'davao del sur', 'yes', 'no', 'no', 'yes', 'no', 'balayan', NULL, '09156789012', 'No', 'government owned', 'government owned'),
('24-00085', '@Canda123', NULL, 0, 'josephnavarro@gmail.com', 'Joseph', 'Oscar', 'Navarro', '1945-02-22', 'male', 'widowed', '155', 'Sambok', 'balayan', 'extended_family', 'inactive', '5', '1972', 'Baguio', 'benguet', 'no', 'yes', 'yes', 'no', 'yes', 'balayan', NULL, '09167890123', 'No', 'rented', 'amortized'),
('24-00086', '@Canda123', NULL, 0, 'isabelladelacruz@gmail.com', 'Isabella', 'Penelope', 'De La Cruz', '1940-11-10', 'female', 'single', '165', 'Palayan', 'balayan', 'owner', 'active', '6', '1974', 'Dumaguete', 'negros oriental', 'yes', 'no', 'no', 'yes', 'yes', 'balayan', NULL, '09178901234', 'Yes', 'owned', 'rented'),
('24-00087', '@Canda123', NULL, 0, 'franciscogonzales@gmail.com', 'Francisco', 'Quirino', 'Gonzales', '1935-07-05', 'male', 'widowed', '175', 'Sugod', 'balayan', 'extended_family', 'inactive', '7', '1978', 'Cebu', 'cebu', 'no', 'yes', 'yes', 'no', 'no', 'balayan', NULL, '09189012345', 'No', 'government owned', 'occupied free without consent'),
('24-00088', '@Canda123', NULL, 0, 'angelitatan@gmail.com', 'Angelita', 'Cruz', 'Tan', '1959-06-20', 'female', 'single', '185', 'Palayan', 'balayan', 'owner', 'active', '8', '1973', 'Dumaguete', 'negros oriental', 'yes', 'no', 'no', 'no', 'no', 'balayan', NULL, '09190123456', 'No', 'rented', 'owned'),
('24-00089', '@Canda123', NULL, 0, 'felicianoperez@gmail.com', 'Feliciano', 'Tolentino', 'Perez', '1958-03-18', 'male', 'married', '195', 'Sugod', 'balayan', 'extended_family', 'inactive', '7', '1979', 'Cebu', 'cebu', 'no', 'yes', 'yes', 'no', 'no', 'balayan', NULL, '09123456789', 'Yes', 'amortized', 'government owned'),
('24-00090', '@Canda123', NULL, 0, 'vivianomarquez@gmail.com', 'Viviano', 'Guerrero', 'Marquez', '1957-09-15', 'male', 'widowed', '205', 'Sambok', 'balayan', 'extended_family', 'inactive', '6', '1977', 'Baguio', 'benguet', 'yes', 'no', 'yes', 'yes', 'no', 'balayan', NULL, '09234567890', 'Yes', 'owned', 'amortized'),
('24-00091', '@Canda123', NULL, 0, 'rosariogalang@gmail.com', 'Rosario', 'Nicanor', 'Galang', '1956-04-11', 'female', 'married', '215', 'Palayan', 'balayan', 'owner', 'active', '5', '1971', 'Dumaguete', 'negros oriental', 'no', 'yes', 'no', 'no', 'yes', 'balayan', NULL, '09245678901', 'No', 'amortized', 'government owned'),
('24-00092', '@Canda123', NULL, 0, 'gregoriovillanueva@gmail.com', 'Gregorio', 'Emilio', 'Villanueva', '1955-01-06', 'male', 'widowed', '225', 'Suklob', 'balayan', 'extended_family', 'inactive', '4', '1974', 'Cebu', 'cebu', 'yes', 'yes', 'yes', 'no', 'no', 'balayan', NULL, '09256789012', 'Yes', 'owned', 'amortized'),
('24-00093', '@Canda123', NULL, 0, 'gracielagarcia@gmail.com', 'Graciela', 'Salazar', 'Garcia', '1954-08-03', 'female', 'single', '235', 'Sugod', 'balayan', 'extended_family', 'inactive', '3', '1976', 'Baguio', 'benguet', 'no', 'no', 'no', 'no', 'yes', 'balayan', NULL, '09267890123', 'No', 'government owned', 'government owned'),
('24-00094', '@Canda123', NULL, 0, 'elmermoreno@gmail.com', 'Elmer', 'Gabriel', 'Moreno', '1953-02-28', 'male', 'married', '245', 'Sambok', 'balayan', 'owner', 'active', '2', '1972', 'Dumaguete', 'negros oriental', 'yes', 'yes', 'yes', 'yes', 'yes', 'balayan', NULL, '09278901234', 'No', 'rented', 'occupied free without consent'),
('24-00095', '@Canda123', NULL, 0, 'gloriareyes@gmail.com', 'Gloria', 'Alfonso', 'Reyes', '1952-11-23', 'female', 'widowed', '255', 'Palayan', 'balayan', 'extended_family', 'active', '1', '1975', 'Cebu', 'cebu', 'no', 'no', 'yes', 'no', 'no', 'balayan', NULL, '09289012345', 'Yes', 'occupied free with consent', 'occupied free with consent'),
('24-00096', '@Canda123', NULL, 0, 'ramonsantiago@gmail.com', 'Ramon', 'Bartolome', 'Santiago', '1951-06-18', 'male', 'single', '265', 'Suklob', 'balayan', 'extended_family', 'inactive', '8', '1971', 'Baguio', 'benguet', 'yes', 'yes', 'no', 'no', 'yes', 'balayan', NULL, '09290123456', 'No', 'owned', 'rented'),
('24-00097', '@Canda123', NULL, 0, 'sofiapanganiban@gmail.com', 'Sofia', 'Napoleon', 'Panganiban', '1950-03-14', 'female', 'married', '275', 'Sambok', 'balayan', 'owner', 'active', '7', '1978', 'Dumaguete', 'negros oriental', 'no', 'yes', 'yes', 'no', 'no', 'balayan', NULL, '09312345678', 'No', 'owned', 'government owned'),
('24-00098', '@Canda123', NULL, 0, 'emanuelsanchez@gmail.com', 'Emanuel', 'Pablo', 'Sanchez', '1949-10-08', 'male', 'widowed', '285', 'Palayan', 'balayan', 'extended_family', 'active', '6', '1973', 'Cebu', 'cebu', 'yes', 'no', 'no', 'yes', 'yes', 'balayan', NULL, '09323456789', 'No', 'owned', 'government owned'),
('24-00099', '@Canda123', NULL, 0, 'gladiolasolis@gmail.com', 'Gladiola', 'Joaquin', 'Solis', '1948-05-04', 'female', 'single', '295', 'Sugod', 'balayan', 'owner', 'active', '5', '1979', 'Baguio', 'benguet', 'no', 'yes', 'yes', 'no', 'no', 'balayan', NULL, '09334567890', 'No', 'rented', 'amortized'),
('24-00100', '@Canda123', NULL, 0, 'valentinodizon@gmail.com', 'Valentino', 'Agustin', 'Dizon', '1947-01-29', 'male', 'widowed', '305', 'Sambok', 'balayan', 'extended_family', 'inactive', '4', '1976', 'Dumaguete', 'negros oriental', 'yes', 'no', 'no', 'no', 'yes', 'balayan', NULL, '09345678901', 'No', 'government owned', 'government owned'),
('24-00101', '@Canda123', NULL, 0, 'estelitaserrano@gmail.com', 'Estelita', 'Tomas', 'Serrano', '1946-08-24', 'female', 'married', '315', 'Palayan', 'balayan', 'owner', 'active', '3', '1972', 'Cebu', 'cebu', 'no', 'yes', 'no', 'yes', 'yes', 'balayan', NULL, '09356789012', 'No', 'government owned', 'owned'),
('24-00102', '@Canda123', NULL, 0, 'martinacelestino@gmail.com', 'Martina', 'Ernesto', 'Celestino', '1945-04-20', 'male', 'widowed', '325', 'Suklob', 'balayan', 'extended_family', 'inactive', '2', '1971', 'Baguio', 'benguet', 'yes', 'no', 'yes', 'no', 'no', 'balayan', NULL, '09367890123', 'No', 'government owned', 'owned'),
('24-00103', '@Canda123', NULL, 0, 'vinadelosreyes@gmail.com', 'Vina', 'Domingo', 'De Los Reyes', '1944-01-14', 'female', 'single', '335', 'Sambok', 'balayan', 'owner', 'active', '1', '1975', 'Dumaguete', 'negros oriental', 'no', 'yes', 'no', 'yes', 'yes', 'balayan', NULL, '09378901234', 'Yes', 'owned', 'rented'),
('24-00104', '@Canda123', NULL, 0, 'valentinapelayo@gmail.com', 'Valentina', 'Bernardo', 'Pelayo', '1943-10-09', 'male', 'married', '345', 'Palayan', 'balayan', 'extended_family', 'active', '8', '1972', 'Cebu', 'cebu', 'yes', 'yes', 'yes', 'no', 'no', 'balayan', NULL, '09389012345', 'Yes', 'government owned', 'rented'),
('24-00105', '@Canda123', NULL, 0, 'fernandacaballero@gmail.com', 'Fernanda', 'Maximo', 'Caballero', '1942-06-04', 'female', 'widowed', '355', 'Suklob', 'balayan', 'extended_family', 'inactive', '7', '1977', 'Baguio', 'benguet', 'no', 'no', 'no', 'yes', 'yes', 'balayan', NULL, '09456789012', 'Yes', 'amortized', 'rented'),
('24-00106', '@Canda123', NULL, 0, 'leovigildogonzalez@gmail.com', 'Leovigildo', 'Inocencio', 'Gonzalez', '1941-01-29', 'male', 'single', '365', 'Sambok', 'balayan', 'owner', 'active', '6', '1979', 'Dumaguete', 'negros oriental', 'yes', 'no', 'yes', 'no', 'no', 'balayan', NULL, '09467890123', 'Yes', 'government owned', 'rented'),
('24-00107', '@Canda123', NULL, 0, 'zarate@gmail.com', 'Zarate', 'Soliman', 'Soliman', '1940-08-24', 'female', 'married', '375', 'Palayan', 'balayan', 'extended_family', 'active', '5', '1975', 'Cebu', 'cebu', 'no', 'yes', 'no', 'yes', 'yes', 'balayan', NULL, '09478901234', 'Yes', 'government owned', 'government owned'),
('24-00108', '@Canda123', NULL, 0, 'tobias@gmail.com', 'Tobias', 'Edgardo', 'Edgardo', '1939-04-20', 'male', 'widowed', '385', 'Suklob', 'balayan', 'extended_family', 'inactive', '4', '1974', 'Baguio', 'benguet', 'yes', 'no', 'no', 'no', 'no', 'balayan', NULL, '09489012345', 'No', 'amortized', 'occupied free with consent'),
('24-00109', '@Canda123', NULL, 0, 'lorraine@gmail.com', 'Lorraine', 'Wilfredo', 'Wilfredo', '1938-01-14', 'female', 'single', '395', 'Sambok', 'balayan', 'owner', 'active', '3', '1971', 'Dumaguete', 'negros oriental', 'no', 'yes', 'yes', 'yes', 'yes', 'balayan', NULL, '09490123456', 'No', 'government owned', 'rented'),
('24-00110', '@Canda123', NULL, 0, 'dennis@gmail.com', 'Dennis', 'Augusto', 'Augusto', '1937-10-09', 'male', 'widowed', '405', 'Palayan', 'balayan', 'extended_family', 'active', '2', '1972', 'Cebu', 'cebu', 'yes', 'yes', 'yes', 'no', 'no', 'balayan', NULL, '09512345678', 'Yes', 'government owned', 'rented'),
('24-00111', '@Canda123', NULL, 0, 'clemente@gmail.com', 'Clemente', 'Rogelio', 'Rogelio', '1936-06-04', 'female', 'married', '415', 'Suklob', 'balayan', 'owner', 'active', '1', '1976', 'Baguio', 'benguet', 'no', 'no', 'no', 'yes', 'yes', 'balayan', NULL, '09523456789', 'Yes', 'amortized', 'rented'),
('24-00112', '@Canda123', NULL, 0, 'jessie@gmail.com', 'Jessie', 'Emeterio', 'Emeterio', '1935-01-29', 'male', 'widowed', '425', 'Sambok', 'balayan', 'extended_family', 'inactive', '8', '1971', 'Dumaguete', 'negros oriental', 'yes', 'no', 'no', 'no', 'no', 'balayan', NULL, '09534567890', 'No', 'rented', 'government owned'),
('24-00113', '@Canda123', NULL, 0, 'gwendolyn@gmail.com', 'Gwendolyn', 'Quintin', 'Quintin', '1934-08-24', 'female', 'single', '435', 'Palayan', 'balayan', 'owner', 'active', '7', '1979', 'Cebu', 'cebu', 'no', 'yes', 'no', 'yes', 'yes', 'balayan', NULL, '09545678901', 'Yes', 'government owned', 'government owned'),
('24-00114', '@Canda123', NULL, 0, 'denise@gmail.com', 'Denise', 'Maximo', 'Maximo', '1933-04-20', 'male', 'married', '445', 'Suklob', 'balayan', 'extended_family', 'active', '6', '1977', 'Baguio', 'benguet', 'yes', 'no', 'yes', 'no', 'no', 'balayan', NULL, '09556789012', 'No', 'government owned', 'owned'),
('24-00115', '@Canda123', NULL, 0, 'salvacion@gmail.com', 'Salvacion', 'Froilan', 'Froilan', '1932-01-14', 'female', 'widowed', '455', 'Sambok', 'balayan', 'extended_family', 'inactive', '5', '1974', 'Dumaguete', 'negros oriental', 'no', 'yes', 'no', 'yes', 'yes', 'balayan', NULL, '09567890123', 'Yes', 'government owned', 'amortized'),
('24-00116', '@Canda123', NULL, 0, 'claire@gmail.com', 'Claire', 'Augusto', 'Augusto', '1931-10-09', 'male', 'single', '465', 'Palayan', 'balayan', 'owner', 'active', '4', '1975', 'Cebu', 'cebu', 'yes', 'no', 'yes', 'no', 'no', 'balayan', NULL, '09578901234', 'Yes', 'government owned', 'rented'),
('24-00117', '@Canda123', NULL, 0, 'richard@gmail.com', 'Richard', 'Serafin', 'Serafin', '1930-06-04', 'female', 'married', '475', 'Suklob', 'balayan', 'extended_family', 'active', '3', '1972', 'Baguio', 'benguet', 'no', 'no', 'no', 'yes', 'yes', 'balayan', NULL, '09589012345', 'No', 'government owned', 'owned'),
('24-00118', '@Canda123', NULL, 0, 'julian@gmail.com', 'Julian', 'Valentin', 'Valentin', '1929-01-29', 'male', 'widowed', '485', 'Sambok', 'balayan', 'owner', 'active', '2', '1976', 'Dumaguete', 'negros oriental', 'yes', 'yes', 'no', 'no', 'no', 'balayan', NULL, '09612345678', 'Yes', 'government owned', 'rented'),
('24-00120', '@Canda123', NULL, 0, 'dondon@gmail.com', 'Don Don', 'Dine', 'Diyan', '1956-02-14', 'male', 'widowed', '34', 'Palayan', 'Balayan', 'owner', 'inactive', '1', '1967', 'Nasugbu', 'Batangas', 'no', 'no', 'no', 'no', 'yes', 'Canda', NULL, NULL, 'No', 'government owned', 'government owned'),
('24-00123', 'candacanda123', '402761', 0, 'paulmarmanjac@gmail.com', 'John Paulmar', 'Lontoc', 'Manjac', '2003-07-14', 'male', 'single', '221', 'sambok', 'Balayan', 'owner', NULL, '5', '2003', 'Bauan', 'Batangas', 'yes', 'no', 'no', 'yes', 'no', 'Canda', 'uploads/6631cbf6064e2_662d9b3cd86a3_662d9ac6ad449_paulmar.jpg', '09304365359', 'No', 'rented', 'owned'),
('24-00124', '@Canda123', NULL, 0, 'jojojomapalad12@gmail.com', 'Tsulo', 'Mento', 'Sador', '2003-07-14', 'male', 'single', '233', 'Palayan', 'Balayan', 'owner', 'active', '', '', '', '', NULL, NULL, NULL, NULL, NULL, 'Canda', NULL, NULL, NULL, NULL, NULL),
('24-00150', '@Canda123', NULL, 0, 'joaodasilva@gmail.com', 'Joao', 'Santos', 'da Silva', '1985-09-10', 'male', 'single', '123', 'Sambok', 'Balayan', 'owner', 'active', '3', '1995-02-20', 'Balayan', 'Batangas', 'yes', 'no', 'yes', 'no', 'yes', 'canda', NULL, '09123456789', 'no', 'owned', 'owned'),
('24-00151', '@Canda123', NULL, 0, 'mariaalves@gmail.com', 'Maria', 'Fernandes', 'Alves', '1978-06-25', 'female', 'married', '456', 'Sugod', 'Balayan', 'extended_family', 'inactive', '4', '2000-03-15', 'Balayan', 'Batangas', 'yes', 'yes', 'no', 'yes', 'no', 'canda', NULL, '09234567890', 'yes', 'rented', 'owned'),
('24-00152', '@Canda123', NULL, 0, 'pedrogoncalves@gmail.com', 'Pedro', 'Lima', 'Gonçalves', '1990-11-08', 'male', 'single', '789', 'Gancho', 'Balayan', 'owner', 'active', '2', '1998-07-03', 'Balayan', 'Batangas', 'yes', 'yes', 'yes', 'no', 'no', 'canda', NULL, '09345678901', 'no', 'amortized', 'caretaker'),
('24-00153', '@Canda123', NULL, 0, 'anaferreira@gmail.com', 'Ana', 'Pereira', 'Ferreira', '1983-03-17', 'female', 'widowed', '1011', 'Suklob', 'Balayan', 'owner', 'inactive', '5', '1999-09-28', 'Balayan', 'Batangas', 'yes', 'yes', 'yes', 'yes', 'no', 'canda', NULL, '09456789012', 'yes', 'occupied free with consent', 'family owned'),
('24-00154', '@Canda123', NULL, 0, 'carlosrodrigues@gmail.com', 'Carlos', 'Oliveira', 'Rodrigues', '1976-12-30', 'male', 'married', '1213', 'Palayan', 'Balayan', 'extended_family', 'active', '3', '2005-12-10', 'Balayan', 'Batangas', 'yes', 'no', 'no', 'yes', 'no', 'canda', NULL, '09567890123', 'no', 'owned', 'government owned');
INSERT INTO `users` (`username`, `password`, `confirmation_code`, `is_confirmed`, `email`, `first_name`, `middle_name`, `last_name`, `birthdate`, `sex`, `civil_status`, `house_number`, `street`, `city`, `household_condition`, `family_condition`, `family_info_q1`, `family_info_q2`, `family_info_q3`, `family_info_q3_2`, `meals_daily`, `herbal_plant`, `vege_garden`, `fam_plan`, `therapy`, `barangay`, `profile_picture`, `contact_number`, `4ps`, `house_acquisition`, `lot_ownership`) VALUES
('24-00155', '@Canda123', NULL, 0, 'silvialopes@gmail.com', 'Silvia', 'Santos', 'Lopes', '1995-05-05', 'female', 'single', '1415', 'Sambok', 'Balayan', 'owner', 'active', '4', '2000-02-15', 'Balayan', 'Batangas', 'yes', 'yes', 'no', 'no', 'yes', 'canda', NULL, '09678901234', 'yes', 'rented', 'owned'),
('24-00156', '@Canda123', NULL, 0, 'fernandocosta@gmail.com', 'Fernando', 'Silva', 'Costa', '1988-08-20', 'male', 'single', '1617', 'Sugod', 'Balayan', 'owner', 'inactive', '2', '1996-10-05', 'Balayan', 'Batangas', 'yes', 'no', 'yes', 'yes', 'yes', 'canda', NULL, '09789012345', 'no', 'amortized', 'caretaker'),
('24-00157', '@Canda123', NULL, 0, 'patriciamartins@gmail.com', 'Patricia', 'Oliveira', 'Martins', '1979-04-12', 'female', 'married', '1819', 'Gancho', 'Balayan', 'owner', 'active', '3', '1998-08-30', 'Balayan', 'Batangas', 'yes', 'yes', 'no', 'no', 'no', 'canda', NULL, '09890123456', 'yes', 'occupied free with consent', 'family owned'),
('24-00158', '@Canda123', NULL, 0, 'marcelopereira@gmail.com', 'Marcelo', 'Santos', 'Pereira', '1992-01-29', 'male', 'single', '2021', 'Suklob', 'Balayan', 'extended_family', 'inactive', '5', '2001-05-20', 'Balayan', 'Batangas', 'yes', 'yes', 'yes', 'yes', 'yes', 'canda', NULL, '09901234567', 'no', 'owned', 'government owned'),
('24-00159', '@Canda123', NULL, 0, 'andreafonseca@gmail.com', 'Andre', 'Rodrigues', 'Fonseca', '1986-07-08', 'female', 'married', '2223', 'Palayan', 'Balayan', 'owner', 'active', '4', '2003-09-15', 'Balayan', 'Batangas', 'yes', 'no', 'yes', 'no', 'no', 'canda', NULL, '01234567890', 'yes', 'rented', 'owned'),
('24-00160', '@Canda123', NULL, 0, 'renatosilva@gmail.com', 'Renato', 'Oliveira', 'Silva', '1980-02-14', 'male', 'single', '2425', 'Sambok', 'Balayan', 'owner', 'active', '3', '1999-07-10', 'Balayan', 'Batangas', 'yes', 'no', 'no', 'yes', 'yes', 'canda', NULL, '02345678901', 'no', 'amortized', 'caretaker'),
('24-00203', '@Canda123', NULL, 0, 'rafaelsilva@gmail.com', 'Rafael', 'Santos', 'Silva', '1995-08-18', 'male', 'single', '123', 'Sambok', 'Balayan', 'owner', 'active', '3', '2005-02-12', 'Balayan', 'Batangas', 'yes', 'no', 'yes', 'no', 'yes', 'canda', NULL, '09123456789', 'no', 'owned', 'owned'),
('24-00204', '@Canda123', NULL, 0, 'marialima@gmail.com', 'Maria', 'Fernandes', 'Lima', '1988-07-25', 'female', 'married', '456', 'Sugod', 'Balayan', 'extended_family', 'inactive', '4', '2000-03-20', 'Balayan', 'Batangas', 'yes', 'yes', 'no', 'yes', 'no', 'canda', NULL, '09134567890', 'yes', 'rented', 'owned'),
('24-00205', '@Canda123', NULL, 0, 'pedrogomes@gmail.com', 'Pedro', 'Lima', 'Gomes', '1979-12-15', 'male', 'single', '789', 'Gancho', 'Balayan', 'owner', 'active', '2', '1998-06-10', 'Balayan', 'Batangas', 'yes', 'yes', 'yes', 'no', 'no', 'canda', NULL, '09145678901', 'no', 'amortized', 'caretaker'),
('24-00206', '@Canda123', NULL, 0, 'anapereira@gmail.com', 'Ana', 'Oliveira', 'Pereira', '1991-03-27', 'female', 'widowed', '1011', 'Suklob', 'Balayan', 'owner', 'inactive', '5', '1999-09-28', 'Balayan', 'Batangas', 'yes', 'yes', 'yes', 'yes', 'no', 'canda', NULL, '09156789012', 'yes', 'occupied free with consent', 'family owned'),
('24-00207', '@Canda123', NULL, 0, 'carlosrocha@gmail.com', 'Carlos', 'Santos', 'Rocha', '1982-06-02', 'male', 'married', '1213', 'Palayan', 'Balayan', 'extended_family', 'active', '3', '2005-12-15', 'Balayan', 'Batangas', 'yes', 'no', 'no', 'yes', 'no', 'canda', NULL, '09167890123', 'no', 'owned', 'government owned'),
('24-00208', '@Canda123', NULL, 0, 'silviacosta@gmail.com', 'Silvia', 'Oliveira', 'Costa', '1996-05-15', 'female', 'single', '1415', 'Sambok', 'Balayan', 'owner', 'active', '4', '2000-02-10', 'Balayan', 'Batangas', 'yes', 'yes', 'no', 'no', 'yes', 'canda', NULL, '09178901234', 'yes', 'rented', 'owned'),
('24-00209', '@Canda123', NULL, 0, 'fernandogarcia@gmail.com', 'Fernando', 'Lima', 'Garcia', '1987-08-21', 'male', 'single', '1617', 'Sugod', 'Balayan', 'owner', 'inactive', '2', '1996-10-05', 'Balayan', 'Batangas', 'yes', 'no', 'yes', 'yes', 'yes', 'canda', NULL, '09189012345', 'no', 'amortized', 'caretaker'),
('24-00210', '@Canda123', NULL, 0, 'patriciacarvalho@gmail.com', 'Patricia', 'Santos', 'Carvalho', '1975-05-01', 'female', 'married', '1819', 'Gancho', 'Balayan', 'owner', 'active', '3', '1998-08-30', 'Balayan', 'Batangas', 'yes', 'yes', 'no', 'no', 'no', 'canda', NULL, '09190123456', 'yes', 'occupied free with consent', 'family owned'),
('24-00211', '@Canda123', NULL, 0, 'marcelopinto@gmail.com', 'Marcelo', 'Fernandes', 'Pinto', '1990-01-22', 'male', 'single', '2021', 'Suklob', 'Balayan', 'extended_family', 'inactive', '5', '2001-05-20', 'Balayan', 'Batangas', 'yes', 'yes', 'yes', 'yes', 'yes', 'canda', NULL, '09201234567', 'no', 'owned', 'government owned'),
('24-00212', '@Canda123', NULL, 0, 'andreafonseca@gmail.com', 'Andre', 'Oliveira', 'Fonseca', '1983-07-10', 'female', 'married', '2223', 'Palayan', 'Balayan', 'owner', 'active', '4', '2003-09-15', 'Balayan', 'Batangas', 'yes', 'no', 'yes', 'no', 'no', 'canda', NULL, '09212345678', 'yes', 'rented', 'owned'),
('24-00213', '@Canda123', NULL, 0, 'renatosantos@gmail.com', 'Renato', 'Lima', 'Santos', '1981-02-10', 'male', 'single', '2425', 'Sambok', 'Balayan', 'owner', 'active', '3', '1999-07-10', 'Balayan', 'Batangas', 'yes', 'no', 'no', 'yes', 'yes', 'canda', NULL, '09223456789', 'no', 'amortized', 'caretaker'),
('24-00214', '@Canda123', NULL, 0, 'julianasouza@gmail.com', 'Juliana', 'Ferreira', 'Souza', '1988-03-10', 'female', 'single', '123', 'Sambok', 'Balayan', 'owner', 'active', '4', '2000-07-15', 'Balayan', 'Batangas', 'yes', 'yes', 'yes', 'no', 'yes', 'canda', NULL, '09234567891', 'no', 'owned', 'owned'),
('24-00215', '@Canda123', NULL, 0, 'marcosrodrigues@gmail.com', 'Marcos', 'Lima', 'Rodrigues', '1992-05-18', 'male', 'single', '456', 'Sugod', 'Balayan', 'extended_family', 'inactive', '5', '2002-11-28', 'Balayan', 'Batangas', 'yes', 'no', 'yes', 'no', 'no', 'canda', NULL, '09245678912', 'yes', 'rented', 'owned'),
('24-00216', '@Canda123', NULL, 0, 'carlasilva@gmail.com', 'Carla', 'Oliveira', 'Silva', '1985-09-23', 'female', 'married', '789', 'Gancho', 'Balayan', 'owner', 'active', '3', '1998-12-03', 'Balayan', 'Batangas', 'yes', 'yes', 'no', 'yes', 'yes', 'canda', NULL, '09256789123', 'no', 'amortized', 'caretaker'),
('24-00217', '@Canda123', NULL, 0, 'andreapereira@gmail.com', 'Andrea', 'Santos', 'Pereira', '1976-07-30', 'female', 'widowed', '1011', 'Suklob', 'Balayan', 'owner', 'inactive', '2', '1995-08-15', 'Balayan', 'Batangas', 'yes', 'yes', 'yes', 'no', 'no', 'canda', NULL, '09267891234', 'yes', 'occupied free with consent', 'family owned'),
('24-00218', '@Canda123', NULL, 0, 'pedrooliveira@gmail.com', 'Pedro', 'Silva', 'Oliveira', '1990-11-11', 'male', 'single', '1213', 'Palayan', 'Balayan', 'owner', 'active', '4', '2005-06-20', 'Balayan', 'Batangas', 'yes', 'no', 'no', 'yes', 'yes', 'canda', NULL, '09278912345', 'no', 'owned', 'government owned'),
('24-00219', '@Canda123', NULL, 0, 'luciamartins@gmail.com', 'Lucia', 'Fernandes', 'Martins', '1983-03-01', 'female', 'married', '1415', 'Sambok', 'Balayan', 'extended_family', 'active', '3', '2000-09-10', 'Balayan', 'Batangas', 'yes', 'yes', 'no', 'no', 'yes', 'canda', NULL, '09289123456', 'yes', 'rented', 'owned'),
('24-00220', '@Canda123', NULL, 0, 'josesilva@gmail.com', 'Jose', 'Ferreira', 'Silva', '1983-05-12', 'male', 'single', '1120', 'Sambok', 'Balayan', 'owner', 'active', '4', '1998-09-03', 'Balayan', 'Batangas', 'yes', 'yes', 'yes', 'yes', 'no', 'canda', NULL, '09123456789', 'yes', 'owned', 'owned'),
('24-00221', '@Canda123', NULL, 0, 'anapereira@gmail.com', 'Ana', 'Oliveira', 'Pereira', '1990-08-25', 'female', 'married', '1221', 'Sugod', 'Balayan', 'extended_family', 'inactive', '5', '2003-03-17', 'Balayan', 'Batangas', 'yes', 'yes', 'no', 'yes', 'no', 'canda', NULL, '09134567890', 'no', 'rented', 'owned'),
('24-00222', '@Canda123', NULL, 0, 'pedromartins@gmail.com', 'Pedro', 'Silva', 'Martins', '1977-12-04', 'male', 'single', '1322', 'Gancho', 'Balayan', 'owner', 'active', '3', '2000-10-22', 'Balayan', 'Batangas', 'yes', 'no', 'yes', 'no', 'yes', 'canda', NULL, '09145678901', 'yes', 'amortized', 'caretaker'),
('24-00223', '@Canda123', NULL, 0, 'marialima@gmail.com', 'Maria', 'Fernandes', 'Lima', '1986-03-18', 'female', 'widowed', '1423', 'Suklob', 'Balayan', 'owner', 'inactive', '4', '2002-05-30', 'Balayan', 'Batangas', 'yes', 'yes', 'yes', 'yes', 'no', 'canda', NULL, '09156789012', 'no', 'occupied free with consent', 'family owned'),
('24-00224', '@Canda123', NULL, 0, 'carlossilva@gmail.com', 'Carlos', 'Oliveira', 'Silva', '1975-06-29', 'male', 'married', '1524', 'Palayan', 'Balayan', 'extended_family', 'active', '2', '1999-12-15', 'Balayan', 'Batangas', 'yes', 'no', 'no', 'yes', 'yes', 'canda', NULL, '09167890123', 'yes', 'owned', 'government owned'),
('24-00225', '@Canda123', NULL, 0, 'silviapereira@gmail.com', 'Silvia', 'Lima', 'Pereira', '1994-09-03', 'female', 'single', '1625', 'Sambok', 'Balayan', 'owner', 'active', '3', '2003-02-08', 'Balayan', 'Batangas', 'yes', 'no', 'no', 'yes', 'no', 'canda', NULL, '09178901234', 'no', 'rented', 'owned'),
('24-00226', '@Canda123', NULL, 0, 'fernandooliveira@gmail.com', 'Fernando', 'Silva', 'Oliveira', '1981-02-14', 'male', 'single', '1726', 'Sugod', 'Balayan', 'owner', 'inactive', '4', '1998-11-21', 'Balayan', 'Batangas', 'yes', 'yes', 'yes', 'no', 'yes', 'canda', NULL, '09189012345', 'yes', 'amortized', 'caretaker'),
('24-00227', '@Canda123', NULL, 0, 'patriciasilva@gmail.com', 'Patricia', 'Oliveira', 'Silva', '1978-05-07', 'female', 'married', '1827', 'Gancho', 'Balayan', 'owner', 'active', '5', '2001-08-19', 'Balayan', 'Batangas', 'yes', 'no', 'yes', 'yes', 'no', 'canda', NULL, '09190123456', 'no', 'owned', 'government owned'),
('24-00228', '@Canda123', NULL, 0, 'marcelolima@gmail.com', 'Marcelo', 'Ferreira', 'Lima', '1993-08-23', 'male', 'single', '1928', 'Suklob', 'Balayan', 'extended_family', 'inactive', '6', '2005-04-14', 'Balayan', 'Batangas', 'yes', 'yes', 'no', 'no', 'yes', 'canda', NULL, '09201234567', 'yes', 'rented', 'owned'),
('24-00229', '@Canda123', NULL, 0, 'andreasilva@gmail.com', 'Andre', 'Oliveira', 'Silva', '1989-11-30', 'female', 'married', '2029', 'Palayan', 'Balayan', 'owner', 'active', '4', '2003-02-25', 'Balayan', 'Batangas', 'yes', 'yes', 'no', 'yes', 'no', 'canda', NULL, '09212345678', 'yes', 'amortized', 'caretaker'),
('24-00230', '@Canda123', NULL, 0, 'carlalima@gmail.com', 'Carla', 'Santos', 'Lima', '1982-04-17', 'female', 'single', '2130', 'Sambok', 'Balayan', 'owner', 'active', '3', '1998-11-20', 'Balayan', 'Batangas', 'yes', 'yes', 'yes', 'yes', 'no', 'canda', NULL, '09223456789', 'yes', 'owned', 'owned'),
('24-00231', '@Canda123', NULL, 0, 'luisfernandes@gmail.com', 'Luis', 'Silva', 'Fernandes', '1985-07-21', 'male', 'married', '2231', 'Sugod', 'Balayan', 'extended_family', 'inactive', '4', '2000-06-15', 'Balayan', 'Batangas', 'yes', 'no', 'no', 'yes', 'yes', 'canda', NULL, '09234567890', 'no', 'rented', 'owned'),
('24-00232', '@Canda123', NULL, 0, 'mariasilva@gmail.com', 'Maria', 'Oliveira', 'Silva', '1991-10-02', 'female', 'single', '2332', 'Gancho', 'Balayan', 'owner', 'active', '5', '2002-03-25', 'Balayan', 'Batangas', 'yes', 'no', 'yes', 'no', 'no', 'canda', NULL, '09245678901', 'yes', 'amortized', 'caretaker'),
('24-00233', '@Canda123', NULL, 0, 'rodrigosantos@gmail.com', 'Rodrigo', 'Ferreira', 'Santos', '1976-01-29', 'male', 'widowed', '2433', 'Suklob', 'Balayan', 'owner', 'inactive', '6', '1998-05-10', 'Balayan', 'Batangas', 'yes', 'yes', 'no', 'yes', 'yes', 'canda', NULL, '09256789012', 'no', 'occupied free with consent', 'family owned'),
('24-00234', '@Canda123', NULL, 0, 'claudiasilva@gmail.com', 'Claudia', 'Lima', 'Silva', '1983-09-12', 'female', 'married', '2534', 'Palayan', 'Balayan', 'extended_family', 'active', '3', '2000-10-03', 'Balayan', 'Batangas', 'yes', 'yes', 'yes', 'yes', 'no', 'canda', NULL, '09267890123', 'yes', 'owned', 'government owned'),
('24-00235', '@Canda123', NULL, 0, 'marcosferreira@gmail.com', 'Marcos', 'Oliveira', 'Ferreira', '1996-02-06', 'male', 'single', '2635', 'Sambok', 'Balayan', 'owner', 'active', '4', '2003-07-29', 'Balayan', 'Batangas', 'yes', 'no', 'no', 'no', 'yes', 'canda', NULL, '09278901234', 'no', 'rented', 'owned'),
('24-00236', '@Canda123', NULL, 0, 'sandrareis@gmail.com', 'Sandra', 'Fernandes', 'Reis', '1979-05-18', 'female', 'widowed', '2736', 'Sugod', 'Balayan', 'owner', 'inactive', '5', '2001-09-15', 'Balayan', 'Batangas', 'yes', 'yes', 'yes', 'no', 'no', 'canda', NULL, '09289012345', 'yes', 'amortized', 'caretaker'),
('24-00237', '@Canda123', NULL, 0, 'luissilva@gmail.com', 'Luis', 'Lima', 'Silva', '1988-11-23', 'male', 'single', '2837', 'Gancho', 'Balayan', 'owner', 'active', '6', '2005-03-07', 'Balayan', 'Batangas', 'yes', 'no', 'yes', 'yes', 'yes', 'canda', NULL, '09290123456', 'no', 'owned', 'government owned'),
('24-00238', '@Canda123', NULL, 0, 'anacosta@gmail.com', 'Ana', 'Oliveira', 'Costa', '1982-08-14', 'female', 'married', '2938', 'Suklob', 'Balayan', 'owner', 'active', '3', '1999-12-18', 'Balayan', 'Batangas', 'yes', 'no', 'no', 'yes', 'no', 'canda', NULL, '09301234567', 'yes', 'owned', 'government owned'),
('24-00239', '@Canda123', NULL, 0, 'fernandarodrigues@gmail.com', 'Fernanda', 'Ferreira', 'Rodrigues', '1974-03-27', 'male', 'single', '3039', 'Palayan', 'Balayan', 'extended_family', 'inactive', '4', '1998-11-20', 'Balayan', 'Batangas', 'yes', 'yes', 'yes', 'no', 'yes', 'canda', NULL, '09312345678', 'no', 'rented', 'owned'),
('24-00240', '@Canda123', NULL, 0, 'josesantos@gmail.com', 'Jose', 'Oliveira', 'Santos', '1986-10-10', 'male', 'single', '3240', 'Sambok', 'Balayan', 'owner', 'active', '5', '2000-05-25', 'Balayan', 'Batangas', 'yes', 'yes', 'yes', 'yes', 'no', 'canda', NULL, '09323456789', 'yes', 'owned', 'owned'),
('24-00241', '@Canda123', NULL, 0, 'mariacosta@gmail.com', 'Maria', 'Ferreira', 'Costa', '1990-01-15', 'female', 'married', '3341', 'Sugod', 'Balayan', 'extended_family', 'inactive', '4', '2002-09-18', 'Balayan', 'Batangas', 'yes', 'no', 'no', 'no', 'yes', 'canda', NULL, '09334567890', 'no', 'rented', 'owned'),
('24-00242', '@Canda123', NULL, 0, 'paulooliveira@gmail.com', 'Paulo', 'Lima', 'Oliveira', '1978-04-28', 'male', 'single', '3442', 'Gancho', 'Balayan', 'owner', 'active', '3', '2001-08-23', 'Balayan', 'Batangas', 'yes', 'yes', 'yes', 'yes', 'no', 'canda', NULL, '09345678901', 'yes', 'amortized', 'caretaker'),
('24-00243', '@Canda123', NULL, 0, 'marlenalima@gmail.com', 'Marlena', 'Oliveira', 'Lima', '1983-07-03', 'female', 'widowed', '3543', 'Suklob', 'Balayan', 'owner', 'inactive', '2', '1999-12-01', 'Balayan', 'Batangas', 'yes', 'yes', 'no', 'no', 'yes', 'canda', NULL, '09356789012', 'no', 'occupied free with consent', 'family owned'),
('24-00244', '@Canda123', NULL, 0, 'renatosilva@gmail.com', 'Renato', 'Ferreira', 'Silva', '1995-09-20', 'male', 'married', '3644', 'Palayan', 'Balayan', 'owner', 'active', '4', '2004-04-14', 'Balayan', 'Batangas', 'yes', 'no', 'yes', 'yes', 'no', 'canda', NULL, '09367890123', 'yes', 'owned', 'government owned'),
('24-00245', '@Canda123', NULL, 0, 'silviasantos@gmail.com', 'Silvia', 'Oliveira', 'Santos', '1972-12-12', 'female', 'single', '3745', 'Sambok', 'Balayan', 'owner', 'active', '5', '2000-07-26', 'Balayan', 'Batangas', 'yes', 'yes', 'yes', 'no', 'yes', 'canda', NULL, '09378901234', 'no', 'rented', 'owned'),
('24-00246', '@Canda123', NULL, 0, 'lucianalima@gmail.com', 'Luciana', 'Fernandes', 'Lima', '1987-03-08', 'male', 'single', '3846', 'Sugod', 'Balayan', 'owner', 'inactive', '6', '2005-01-02', 'Balayan', 'Batangas', 'yes', 'no', 'no', 'yes', 'yes', 'canda', NULL, '09389012345', 'yes', 'amortized', 'caretaker'),
('24-00247', '@Canda123', NULL, 0, 'joaosilva@gmail.com', 'Joao', 'Oliveira', 'Silva', '1979-06-14', 'female', 'married', '3947', 'Gancho', 'Balayan', 'owner', 'active', '4', '2001-09-03', 'Balayan', 'Batangas', 'yes', 'yes', 'no', 'no', 'no', 'canda', NULL, '09390123456', 'no', 'owned', 'government owned'),
('24-00248', '@Canda123', NULL, 0, 'larissasilva@gmail.com', 'Larissa', 'Lima', 'Silva', '1993-11-30', 'male', 'single', '4048', 'Suklob', 'Balayan', 'owner', 'active', '5', '2003-04-25', 'Balayan', 'Batangas', 'yes', 'no', 'yes', 'yes', 'yes', 'canda', NULL, '09401234567', 'yes', 'owned', 'government owned'),
('24-00249', '@Canda123', NULL, 0, 'andersonlima@gmail.com', 'Anderson', 'Ferreira', 'Lima', '1975-10-21', 'female', 'widowed', '4149', 'Palayan', 'Balayan', 'owner', 'inactive', '3', '1999-08-19', 'Balayan', 'Batangas', 'yes', 'yes', 'no', 'no', 'no', 'canda', NULL, '09412345678', 'no', 'rented', 'owned'),
('24-00250', '@Canda123', NULL, 0, 'marcosantos@gmail.com', 'Marco', 'Oliveira', 'Santos', '1984-05-25', 'male', 'single', '4250', 'Sambok', 'Balayan', 'owner', 'active', '4', '2001-02-14', 'Balayan', 'Batangas', 'yes', 'yes', 'yes', 'yes', 'no', 'canda', NULL, '09423456789', 'yes', 'owned', 'owned'),
('24-00251', '@Canda123', NULL, 0, 'rosacosta@gmail.com', 'Rosa', 'Ferreira', 'Costa', '1989-08-12', 'female', 'married', '4351', 'Sugod', 'Balayan', 'extended_family', 'inactive', '5', '2003-11-28', 'Balayan', 'Batangas', 'yes', 'no', 'no', 'no', 'yes', 'canda', NULL, '09434567890', 'no', 'rented', 'owned'),
('24-00252', '@Canda123', NULL, 0, 'gabrielsilva@gmail.com', 'Gabriel', 'Lima', 'Silva', '1977-11-04', 'male', 'single', '4452', 'Gancho', 'Balayan', 'owner', 'active', '3', '2000-06-19', 'Balayan', 'Batangas', 'yes', 'yes', 'yes', 'yes', 'no', 'canda', NULL, '09445678901', 'yes', 'amortized', 'caretaker'),
('24-00253', '@Canda123', NULL, 0, 'fernandalima@gmail.com', 'Fernanda', 'Oliveira', 'Lima', '1991-02-20', 'female', 'widowed', '4553', 'Suklob', 'Balayan', 'owner', 'inactive', '4', '1999-10-01', 'Balayan', 'Batangas', 'yes', 'yes', 'no', 'no', 'yes', 'canda', NULL, '09456789012', 'no', 'occupied free with consent', 'family owned'),
('24-00254', '@Canda123', NULL, 0, 'rogeriosilva@gmail.com', 'Rogerio', 'Ferreira', 'Silva', '1996-04-15', 'male', 'married', '4654', 'Palayan', 'Balayan', 'owner', 'active', '5', '2004-09-12', 'Balayan', 'Batangas', 'yes', 'no', 'yes', 'yes', 'no', 'canda', NULL, '09467890123', 'yes', 'owned', 'government owned'),
('24-00255', '@Canda123', NULL, 0, 'anaoliveira@gmail.com', 'Ana', 'Lima', 'Oliveira', '1973-07-08', 'female', 'single', '4755', 'Sambok', 'Balayan', 'owner', 'active', '6', '2001-05-05', 'Balayan', 'Batangas', 'yes', 'yes', 'yes', 'no', 'yes', 'canda', NULL, '09478901234', 'no', 'rented', 'owned'),
('24-00256', '@Canda123', NULL, 0, 'lucianasilva@gmail.com', 'Luciana', 'Fernandes', 'Silva', '1988-10-02', 'male', 'single', '4856', 'Sugod', 'Balayan', 'owner', 'inactive', '3', '1999-11-25', 'Balayan', 'Batangas', 'yes', 'no', 'no', 'yes', 'yes', 'canda', NULL, '09489012345', 'yes', 'amortized', 'caretaker'),
('24-00257', '@Canda123', NULL, 0, 'carloscosta@gmail.com', 'Carlos', 'Oliveira', 'Costa', '1980-01-29', 'female', 'married', '4957', 'Gancho', 'Balayan', 'owner', 'active', '4', '2002-04-14', 'Balayan', 'Batangas', 'yes', 'yes', 'no', 'no', 'no', 'canda', NULL, '09490123456', 'no', 'owned', 'government owned'),
('24-00258', '@Canda123', NULL, 0, 'susanalima@gmail.com', 'Susana', 'Ferreira', 'Lima', '1993-04-23', 'male', 'single', '5058', 'Suklob', 'Balayan', 'owner', 'active', '5', '2004-10-18', 'Balayan', 'Batangas', 'yes', 'no', 'yes', 'yes', 'yes', 'canda', NULL, '09501234567', 'yes', 'owned', 'government owned'),
('24-00259', '@Canda123', NULL, 0, 'gabrielaoliveira@gmail.com', 'Gabriela', 'Oliveira', 'Silva', '1976-11-17', 'female', 'widowed', '5159', 'Palayan', 'Balayan', 'owner', 'inactive', '6', '2000-08-02', 'Balayan', 'Batangas', 'yes', 'yes', 'no', 'no', 'no', 'canda', NULL, '09512345678', 'no', 'rented', 'owned'),
('24-00260', '@Canda123', NULL, 0, 'andersonsilva@gmail.com', 'Anderson', 'Lima', 'Silva', '1989-12-12', 'male', 'single', '5260', 'Sambok', 'Balayan', 'owner', 'active', '3', '2002-06-07', 'Balayan', 'Batangas', 'yes', 'yes', 'yes', 'yes', 'no', 'canda', NULL, '09523456789', 'yes', 'owned', 'owned'),
('24-00261', '@Canda123', NULL, 0, 'claudiolima@gmail.com', 'Claudio', 'Ferreira', 'Lima', '1985-07-28', 'male', 'single', '5361', 'Sugod', 'Balayan', 'owner', 'active', '4', '2000-10-15', 'Balayan', 'Batangas', 'yes', 'no', 'yes', 'no', 'yes', 'canda', NULL, '09534567890', 'yes', 'owned', 'owned'),
('24-00262', '@Canda123', NULL, 0, 'patricialima@gmail.com', 'Patricia', 'Oliveira', 'Lima', '1990-02-14', 'female', 'married', '5462', 'Gancho', 'Balayan', 'extended_family', 'inactive', '5', '2004-03-22', 'Balayan', 'Batangas', 'yes', 'yes', 'no', 'yes', 'no', 'canda', NULL, '09545678901', 'no', 'rented', 'owned'),
('24-00263', '@Canda123', NULL, 0, 'andreoliveira@gmail.com', 'Andre', 'Fernandes', 'Oliveira', '1977-11-29', 'male', 'single', '5563', 'Suklob', 'Balayan', 'owner', 'active', '6', '2003-07-14', 'Balayan', 'Batangas', 'yes', 'no', 'yes', 'yes', 'no', 'canda', NULL, '09556789012', 'yes', 'amortized', 'caretaker'),
('24-00264', '@Canda123', NULL, 0, 'marialima@gmail.com', 'Maria', 'Silva', 'Lima', '1982-09-04', 'female', 'widowed', '5664', 'Palayan', 'Balayan', 'owner', 'inactive', '3', '1998-11-01', 'Balayan', 'Batangas', 'yes', 'yes', 'no', 'no', 'yes', 'canda', NULL, '09567890123', 'no', 'occupied free with consent', 'family owned'),
('24-00265', '@Canda123', NULL, 0, 'luizsilva@gmail.com', 'Luiz', 'Oliveira', 'Silva', '1995-03-15', 'male', 'married', '5765', 'Sambok', 'Balayan', 'owner', 'active', '4', '2002-05-20', 'Balayan', 'Batangas', 'yes', 'no', 'yes', 'yes', 'no', 'canda', NULL, '09578901234', 'yes', 'owned', 'government owned'),
('24-00266', '@Canda123', NULL, 0, 'cristinasantos@gmail.com', 'Cristina', 'Ferreira', 'Santos', '1973-04-18', 'female', 'single', '5866', 'Sugod', 'Balayan', 'owner', 'active', '5', '2000-08-10', 'Balayan', 'Batangas', 'yes', 'yes', 'yes', 'no', 'yes', 'canda', NULL, '09589012345', 'no', 'rented', 'owned'),
('24-00267', '@Canda123', NULL, 0, 'jorgesilva@gmail.com', 'Jorge', 'Lima', 'Silva', '1988-07-22', 'male', 'single', '5967', 'Gancho', 'Balayan', 'owner', 'inactive', '6', '2003-11-05', 'Balayan', 'Batangas', 'yes', 'no', 'no', 'yes', 'yes', 'canda', NULL, '09590123456', 'yes', 'amortized', 'caretaker'),
('24-00268', '@Canda123', NULL, 0, 'vanessalima@gmail.com', 'Vanessa', 'Fernandes', 'Lima', '1980-10-23', 'female', 'married', '6068', 'Suklob', 'Balayan', 'owner', 'active', '4', '2002-03-17', 'Balayan', 'Batangas', 'yes', 'yes', 'no', 'yes', 'no', 'canda', NULL, '09601234567', 'no', 'owned', 'government owned'),
('24-00269', '@Canda123', NULL, 0, 'ricardosilva@gmail.com', 'Ricardo', 'Oliveira', 'Silva', '1993-12-30', 'male', 'single', '6169', 'Palayan', 'Balayan', 'owner', 'active', '5', '2004-06-25', 'Balayan', 'Batangas', 'yes', 'no', 'yes', 'no', 'yes', 'canda', NULL, '09612345678', 'yes', 'owned', 'government owned'),
('24-00270', '@Canda123', NULL, 0, 'marciaoliveira@gmail.com', 'Marcia', 'Ferreira', 'Oliveira', '1976-11-05', 'female', 'widowed', '6270', 'Sambok', 'Balayan', 'owner', 'inactive', '6', '1998-09-15', 'Balayan', 'Batangas', 'yes', 'yes', 'no', 'yes', 'no', 'canda', NULL, '09623456789', 'no', 'rented', 'owned'),
('24-00271', '@Canda123', NULL, 0, 'rafaelsantos@gmail.com', 'Rafael', 'Silva', 'Santos', '1982-12-19', 'male', 'single', '6371', 'Sugod', 'Balayan', 'owner', 'active', '4', '2001-07-11', 'Balayan', 'Batangas', 'yes', 'no', 'yes', 'yes', 'yes', 'canda', NULL, '09634567890', 'yes', 'owned', 'owned'),
('24-00272', '@Canda123', NULL, 0, 'rosanaferrari@gmail.com', 'Rosana', 'Oliveira', 'Ferrari', '1989-03-24', 'female', 'married', '6472', 'Gancho', 'Balayan', 'extended_family', 'inactive', '5', '2003-05-29', 'Balayan', 'Batangas', 'yes', 'yes', 'no', 'no', 'no', 'canda', NULL, '09645678901', 'no', 'rented', 'owned'),
('24-00273', '@Canda123', NULL, 0, 'leonardolima@gmail.com', 'Leonardo', 'Lima', 'Lima', '1977-05-31', 'male', 'single', '6573', 'Suklob', 'Balayan', 'owner', 'active', '6', '2002-08-03', 'Balayan', 'Batangas', 'yes', 'no', 'yes', 'yes', 'yes', 'canda', NULL, '09656789012', 'yes', 'amortized', 'caretaker'),
('24-00274', '@Canda123', NULL, 0, 'elisasilva@gmail.com', 'Elisa', 'Ferreira', 'Silva', '1982-08-04', 'female', 'widowed', '6674', 'Palayan', 'Balayan', 'owner', 'inactive', '3', '2000-01-28', 'Balayan', 'Batangas', 'yes', 'yes', 'no', 'no', 'no', 'canda', NULL, '09667890123', 'no', 'occupied free with consent', 'family owned'),
('24-18745', '@Canda123', NULL, 0, 'carmen_reyes@gmail.com', 'Carmen', 'Angela', 'Reyes', '1990-12-10', 'female', 'single', '890', 'Sugod', 'Balayan', 'extended_family', 'active', '2', '1990-12-10', 'Balayan', 'Batangas', 'yes', 'no', 'no', 'yes', 'yes', 'Canda', NULL, '09456789012', 'no', 'rented', 'owned'),
('24-29684', '@Canda123', NULL, 0, 'lorna_ortega@gmail.com', 'Lorna', 'Luz', 'Ortega', '1976-02-22', 'female', 'married', '567', 'Sambok', 'Balayan', 'owner', 'inactive', '3', '1976-02-22', 'Balayan', 'Batangas', 'yes', 'yes', 'yes', 'no', 'no', 'Canda', NULL, '09901234567', 'yes', 'owned', 'owned'),
('24-34792', '@Canda123', NULL, 0, 'maria_santos@gmail.com', 'Maria', 'Teresa', 'Santos', '1982-06-15', 'female', 'married', '234', 'Gancho', 'Balayan', 'owner', 'active', '4', '1982-06-15', 'Balayan', 'Batangas', 'yes', 'yes', 'no', 'yes', 'no', 'Canda', NULL, '09234567890', 'yes', 'owned', 'owned'),
('24-37492', '@Canda123', NULL, 0, 'luz_perez@gmail.com', 'Luz', 'Marcelo', 'Perez', '1973-11-14', 'female', 'widowed', '234', 'Sugod', 'Balayan', 'owner', 'inactive', '2', '1973-11-14', 'Balayan', 'Batangas', 'yes', 'yes', 'yes', 'no', 'no', 'Canda', NULL, '09678901234', 'yes', 'owned', 'owned'),
('24-39482', '@Canda123', NULL, 0, 'rodrigo_castillo@gmail.com', 'Rodrigo', 'Ignacio', 'Castillo', '1981-02-20', 'male', 'single', '123', 'Palayan', 'Balayan', 'owner', 'active', '2', '1981-02-20', 'Balayan', 'Batangas', 'no', 'yes', 'no', 'no', 'yes', 'Canda', NULL, '09901234567', 'no', 'rented', 'rented'),
('24-47926', '@Canda123', NULL, 0, 'catalina_romero@gmail.com', 'Catalina', 'Santiago', 'Romero', '1977-09-08', 'female', 'married', '890', 'Suklob', 'Balayan', 'owner', 'inactive', '5', '1977-09-08', 'Balayan', 'Batangas', 'yes', 'no', 'yes', 'yes', 'no', 'Canda', NULL, '09890123456', 'yes', 'owned', 'owned'),
('24-48293', '@Canda123', NULL, 0, 'manuel_santos@gmail.com', 'Manuel', 'Ramon', 'Santos', '1991-10-14', 'male', 'single', '234', 'Suklob', 'Balayan', 'extended_family', 'active', '3', '1991-10-14', 'Balayan', 'Batangas', 'yes', 'yes', 'no', 'yes', 'yes', 'Canda', NULL, '09456789012', 'no', 'rented', 'rented'),
('24-48367', '@Canda123', NULL, 0, 'teresita_gonzalez@gmail.com', 'Teresita', 'Maria', 'Gonzalez', '1986-07-28', 'female', 'single', '123', 'Gancho', 'Balayan', 'owner', 'active', '2', '1986-07-28', 'Balayan', 'Batangas', 'no', 'yes', 'no', 'no', 'yes', 'Canda', NULL, '09234567890', 'yes', 'rented', 'rented'),
('24-50928', '@Canda123', NULL, 0, 'miguel_luna@gmail.com', 'Miguel', 'Jose', 'Luna', '1975-03-25', 'male', 'married', '567', 'Palayan', 'Balayan', 'owner', 'active', '5', '1975-03-25', 'Balayan', 'Batangas', 'yes', 'yes', 'yes', 'no', 'no', 'Canda', NULL, '09345678901', 'yes', 'owned', 'owned'),
('24-51273', '@Canda123', NULL, 0, 'rosalinda_mendoza@gmail.com', 'Rosalinda', 'Guillermo', 'Mendoza', '1983-04-08', 'female', 'widowed', '987', 'Gancho', 'Balayan', 'owner', 'inactive', '1', '1983-04-08', 'Balayan', 'Batangas', 'yes', 'no', 'no', 'no', 'no', 'Canda', NULL, '09789012345', 'yes', 'rented', 'rented'),
('24-59284', '@Canda123', NULL, 0, 'alfredo_gomez@gmail.com', 'Alfredo', 'Javier', 'Gomez', '1984-08-03', 'male', 'single', '987', 'Sambok', 'Balayan', 'owner', 'active', '3', '1984-08-03', 'Balayan', 'Batangas', 'yes', 'no', 'no', 'yes', 'yes', 'Canda', NULL, '09567890123', 'no', 'rented', 'rented'),
('24-62084', '@Canda123', NULL, 0, 'elena_gonzaga@gmail.com', 'Elena', 'Felipe', 'Gonzaga', '1993-07-03', 'female', 'single', '456', 'Sambok', 'Balayan', 'owner', 'active', '3', '1993-07-03', 'Balayan', 'Batangas', 'yes', 'no', 'no', 'yes', 'no', 'Canda', NULL, '09123456789', 'yes', 'owned', 'owned'),
('24-62735', '@Canda123', NULL, 0, 'marilou_flores@gmail.com', 'Marilou', 'Miguel', 'Flores', '1974-12-25', 'female', 'widowed', '987', 'Gancho', 'Balayan', 'owner', 'inactive', '2', '1974-12-25', 'Balayan', 'Batangas', 'yes', 'no', 'yes', 'no', 'no', 'Canda', NULL, '09345678901', 'yes', 'rented', 'rented'),
('24-64028', '@Canda123', NULL, 0, 'roberto_vasquez@gmail.com', 'Roberto', 'Manuel', 'Vasquez', '1995-10-17', 'male', 'single', '890', 'Sugod', 'Balayan', 'owner', 'active', '4', '1995-10-17', 'Balayan', 'Batangas', 'yes', 'no', 'yes', 'yes', 'no', 'Canda', NULL, '09123456789', 'no', 'owned', 'owned'),
('24-65239', '@Canda123', NULL, 0, 'josephine_cruz@gmail.com', 'Josephine', 'Vicente', 'Cruz', '1987-05-18', 'female', 'single', '432', 'Sambok', 'Balayan', 'owner', 'inactive', '3', '1987-05-18', 'Balayan', 'Batangas', 'no', 'yes', 'no', 'no', 'yes', 'Canda', NULL, '09567890123', 'yes', 'owned', 'owned'),
('24-72193', '@Canda123', NULL, 0, 'carlos_rodriguez@gmail.com', 'Carlos', 'Antonio', 'Rodriguez', '1992-04-30', 'male', 'single', '456', 'Suklob', 'Balayan', 'owner', 'active', '5', '1992-04-30', 'Balayan', 'Batangas', 'yes', 'yes', 'yes', 'yes', 'yes', 'Canda', NULL, '09345678901', 'no', 'owned', 'owned'),
('24-72384', '@Canda123', NULL, 0, 'juan_delacruz@gmail.com', 'Juan', 'Carlos', 'Dela Cruz', '1988-09-05', 'male', 'single', '987', 'Suklob', 'Balayan', 'owner', 'active', '3', '1988-09-05', 'Balayan', 'Batangas', 'yes', 'no', 'yes', 'yes', 'no', 'Canda', NULL, '09187654321', 'no', 'owned', 'owned'),
('24-74932', '@Canda123', NULL, 0, 'ernesto_rojas@gmail.com', 'Ernesto', 'Luis', 'Rojas', '1976-11-17', 'male', 'single', '890', 'Sambok', 'Balayan', 'owner', 'active', '2', '1976-11-17', 'Balayan', 'Batangas', 'yes', 'no', 'no', 'yes', 'yes', 'Canda', NULL, '09678901234', 'no', 'rented', 'rented'),
('24-82736', '@Canda123', NULL, 0, 'emilio_sanchez@gmail.com', 'Emilio', 'Fernando', 'Sanchez', '1998-06-27', 'male', 'single', '567', 'Gancho', 'Balayan', 'extended_family', 'active', '3', '1998-06-27', 'Balayan', 'Batangas', 'yes', 'yes', 'no', 'yes', 'yes', 'Canda', NULL, '09789012345', 'no', 'rented', 'rented'),
('24-83726', '@Canda123', NULL, 0, 'eduardo_tan@gmail.com', 'Eduardo', 'Francisco', 'Tan', '1980-08-14', 'male', 'single', '234', 'Palayan', 'Balayan', 'extended_family', 'active', '2', '1980-08-14', 'Balayan', 'Batangas', 'yes', 'yes', 'no', 'yes', 'yes', 'Canda', NULL, '09890123456', 'no', 'rented', 'rented'),
('24-84723', '@Canda123', NULL, 0, 'gloria_hernandez@gmail.com', 'Gloria', 'Consuelo', 'Hernandez', '1979-01-12', 'female', 'married', '789', 'Palayan', 'Balayan', 'owner', 'active', '4', '1979-01-12', 'Balayan', 'Batangas', 'yes', 'no', 'yes', 'no', 'no', 'Canda', NULL, '09456789012', 'yes', 'owned', 'owned'),
('24-93467', '@Canda123', NULL, 0, 'pablo_garcia@gmail.com', 'Pablo', 'Enrique', 'Garcia', '1978-11-29', 'male', 'married', '765', 'Suklob', 'Balayan', 'extended_family', 'active', '4', '1978-11-29', 'Balayan', 'Batangas', 'yes', 'yes', 'yes', 'yes', 'no', 'Canda', NULL, '09678901234', 'no', 'owned', 'owned'),
('24-93746', '@Canda123', NULL, 0, 'lucia_alvarez@gmail.com', 'Lucia', 'Elena', 'Alvarez', '1985-05-06', 'female', 'married', '567', 'Palayan', 'Balayan', 'owner', 'active', '5', '1985-05-06', 'Balayan', 'Batangas', 'yes', 'no', 'yes', 'no', 'no', 'Canda', NULL, '09567890123', 'yes', 'owned', 'owned');

-- --------------------------------------------------------

--
-- Table structure for table `users_info`
--

CREATE TABLE `users_info` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `middle_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `profile_picture` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_messages`
--
ALTER TABLE `contact_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `incident_reports`
--
ALTER TABLE `incident_reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `officials`
--
ALTER TABLE `officials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `users_info`
--
ALTER TABLE `users_info`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `announcement`
--
ALTER TABLE `announcement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `contact_messages`
--
ALTER TABLE `contact_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `incident_reports`
--
ALTER TABLE `incident_reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `officials`
--
ALTER TABLE `officials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users_info`
--
ALTER TABLE `users_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users_info`
--
ALTER TABLE `users_info`
  ADD CONSTRAINT `users_info_ibfk_1` FOREIGN KEY (`username`) REFERENCES `users` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
