-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 06 apr 2025 om 15:02
-- Serverversie: 10.4.32-MariaDB
-- PHP-versie: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apothecare`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `producten`
--

CREATE TABLE `producten` (
  `ID` int(11) NOT NULL,
  `naam` varchar(255) NOT NULL,
  `beschrijving` text NOT NULL,
  `prijs` decimal(10,2) NOT NULL,
  `image_url` varchar(255) NOT NULL,
  `pilsoort` enum('Pijnstillers','Antibiotica','Allergiemedicijnen','Maag- en darmmedicijnen','Hoge bloeddruk medicijnen','Huidmedicijnen','Hoest- en verkoudheidsmiddelen','Diabetes medicijnen','Vitamine- en mineralensupplementen','Oogdruppels','Anticonceptiemiddelen','Slaap- en kalmeringsmiddelen','Vaccins','Anticonceptiepillen') NOT NULL,
  `datum_toegevoegd` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `producten`
--

INSERT INTO `producten` (`ID`, `naam`, `beschrijving`, `prijs`, `image_url`, `pilsoort`, `datum_toegevoegd`) VALUES
(1, 'Paracetamol', 'Pijnstillers die koorts verlagen en helpen bij het verlichten van pijn, zoals hoofdpijn en spierpijn.', 4.99, 'images/medicijn/paracetamol.png', 'Pijnstillers', '2025-04-05 11:57:44'),
(2, 'Ibuprofen', 'Pijnstillers en ontstekingsremmers die helpen bij pijn, koorts en ontstekingen, zoals bij gewrichtspijn of spierpijn.', 5.49, 'images/medicijn/ibuprofen.png', 'Pijnstillers', '2025-04-05 11:57:44'),
(3, 'Amoxicilline', 'Antibioticum gebruikt voor de behandeling van bacteriële infecties, zoals oor- en keelontstekingen.', 12.99, 'images/medicijn/amoxicilline.png', 'Antibiotica', '2025-04-05 11:57:44'),
(4, 'Ciprofloxacine', 'Antibioticum effectief tegen bacteriële infecties zoals urineweginfecties en luchtweginfecties.', 14.49, 'images/medicijn/ciprofloxacine.png', 'Antibiotica', '2025-04-05 11:57:44'),
(5, 'Cetirizine', 'Antihistaminicum dat helpt bij allergieën zoals hooikoorts, jeuk en huiduitslag.', 7.99, 'images/medicijn/cetirizine.png', 'Allergiemedicijnen', '2025-04-05 11:57:44'),
(6, 'Fluticason', 'Neusspray die de symptomen van allergieën zoals verstopte neus en niezen verlicht.', 9.99, 'images/medicijn/fluticason.png', 'Allergiemedicijnen', '2025-04-05 11:57:44'),
(7, 'Rennie', 'Antacidum dat zuurbranden en maagklachten verlicht door het neutraliseren van overtollig maagzuur.', 3.99, 'images/medicijn/rennie.png', 'Maag- en darmmedicijnen', '2025-04-05 11:57:44'),
(8, 'Bisacodyl', 'Laxeermiddel dat helpt bij de behandeling van constipatie door de darmen te stimuleren.', 4.49, 'images/medicijn/bisacodyl.png', 'Maag- en darmmedicijnen', '2025-04-05 11:57:44'),
(9, 'Enalapril', 'ACE-remmer die wordt gebruikt voor de behandeling van hoge bloeddruk en bepaalde hartproblemen.', 10.99, 'images/medicijn/enalapril.png', 'Hoge bloeddruk medicijnen', '2025-04-05 11:57:44'),
(10, 'Furosemide', 'Diureticum (plastablet) dat wordt gebruikt om vochtophoping te verminderen en de bloeddruk te verlagen.', 11.49, 'images/medicijn/furosemide.png', 'Hoge bloeddruk medicijnen', '2025-04-05 11:57:44'),
(11, 'Hydrocortison', 'Zalf die jeuk en ontstekingen op de huid vermindert, bijvoorbeeld bij eczeem of allergieën.', 6.99, 'images/medicijn/hydrocortison.png', 'Huidmedicijnen', '2025-04-05 11:57:44'),
(12, 'Clotrimazol', 'Antischimmelcrème die wordt gebruikt om schimmelinfecties zoals athletes foot en ringworm te behandelen.', 8.49, 'images/medicijn/clotrimazol.png', 'Huidmedicijnen', '2025-04-05 11:57:44'),
(13, 'Dextromethorfan', 'Hoestdrank die helpt bij het onderdrukken van droge hoest door de hoestreflex te dempen.', 5.99, 'images/medicijn/dextromethorfan.png', 'Hoest- en verkoudheidsmiddelen', '2025-04-05 11:57:44'),
(14, 'Xylometazoline', 'Decongestivum neusspray die helpt bij het verlichten van een verstopte neus door de bloedvaten in de neus te vernauwen.', 4.99, 'images/medicijn/xylometazoline.png', 'Hoest- en verkoudheidsmiddelen', '2025-04-05 11:57:44'),
(15, 'Insuline', 'Insuline-injecties die worden gebruikt voor de behandeling van diabetes door de bloedsuikerspiegel te reguleren.', 25.99, 'images/medicijn/insuline.png', 'Diabetes medicijnen', '2025-04-05 11:57:44'),
(16, 'Metformine', 'Medicijn dat de bloedsuikerspiegel verlaagt en wordt gebruikt bij de behandeling van type 2 diabetes.', 13.99, 'images/medicijn/metformine.png', 'Diabetes medicijnen', '2025-04-05 11:57:44'),
(17, 'Multivitaminen', 'Supplementen die essentiële vitamines en mineralen leveren ter ondersteuning van de algemene gezondheid en het welzijn.', 8.99, 'images/medicijn/multivitaminen.png', 'Vitamine- en mineralensupplementen', '2025-04-05 11:57:44'),
(18, 'Vitamine D', 'Vitamine D-supplement dat helpt bij de opname van calcium en het versterken van botten en het immuunsysteem.', 6.49, 'images/medicijn/vitamine_d.png', 'Vitamine- en mineralensupplementen', '2025-04-05 11:57:44'),
(19, 'Kunsttranen', 'Oogdruppels die helpen bij het verlichten van droge ogen, bijvoorbeeld door computergebruik of weersomstandigheden.', 5.49, 'images/medicijn/kunsttranen.png', 'Oogdruppels', '2025-04-05 11:57:44'),
(20, 'De pil', 'Anticonceptiepil die helpt bij het voorkomen van zwangerschap door hormonen die de ovulatie blokkeren.', 15.99, 'images/medicijn/de_pil.png', 'Anticonceptiemiddelen', '2025-04-05 11:57:44'),
(21, 'Melatonine', 'Slaapmiddel dat helpt bij het reguleren van het slaap-waakritme, vaak gebruikt bij slaapproblemen of jetlag.', 9.49, 'images/medicijn/melatonine.png', 'Slaap- en kalmeringsmiddelen', '2025-04-05 11:57:44'),
(22, 'Griepvaccin', 'Vaccin dat bescherming biedt tegen de griep en helpt om de verspreiding van het virus te voorkomen.', 20.00, 'images/medicijn/griepvaccin.png', 'Vaccins', '2025-04-05 11:57:44'),
(23, 'NuvaRing', 'Vaginale anticonceptiering die hormonen afgeeft om zwangerschap te voorkomen, gebruikt voor een maandelijkse cyclus.', 18.99, 'images/medicijn/nuvaring.png', 'Anticonceptiepillen', '2025-04-05 11:57:44'),
(24, 'Pleisters', 'Eerste hulp pleisters die worden gebruikt om kleine wonden af te dekken en te beschermen tegen infecties.', 2.99, 'images/medicijn/pleisters.png', '', '2025-04-05 11:57:44');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `user`
--

CREATE TABLE `user` (
  `ID` int(11) NOT NULL,
  `voornaam` varchar(50) NOT NULL,
  `tussenvoegsel` varchar(50) NOT NULL,
  `achternaam` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `wachtwoord` varchar(50) NOT NULL,
  `telefoon_nr` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `user`
--

INSERT INTO `user` (`ID`, `voornaam`, `tussenvoegsel`, `achternaam`, `email`, `wachtwoord`, `telefoon_nr`) VALUES
(1, 'Tejo', '', 'Veldman', 'tejoveldman@gmail.com', '$2y$10$i8RueXYxfBDSfUpL.PfDpOf3z4FGflUsKu5FSBhLKl6', ''),
(2, 'anton', '', 'prajo', 'aprajo@mborijnland.nl', '$2y$10$xN5OHmqjjO4IR3LUhcjPQOd8lyE0DNoirEyLlPIgcry', '');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `producten`
--
ALTER TABLE `producten`
  ADD PRIMARY KEY (`ID`);

--
-- Indexen voor tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `producten`
--
ALTER TABLE `producten`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT voor een tabel `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
