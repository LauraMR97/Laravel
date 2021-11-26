-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 25, 2021 at 09:13 AM
-- Server version: 8.0.27-0ubuntu0.20.04.1
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `red_social`
--

-- --------------------------------------------------------

--
-- Table structure for table `comentarios`
--

CREATE TABLE `comentarios` (
  `id` int NOT NULL,
  `descripcion` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `correo` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_r` int NOT NULL,
  `id_tema` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comentarios`
--

INSERT INTO `comentarios` (`id`, `descripcion`, `correo`, `id_r`, `id_tema`) VALUES
(1, 'QUE SERIE MAS BONICA MAE MIA', 'h@gmail.com', 0, 4),
(4, 'Me gusta mucho esta serie', 'h@gmail.com', 0, 4),
(5, 'Me la he visto 5000 veces', 'h@gmail.com', 0, 4),
(6, 'Vaya tela', 'h@gmail.com', 0, 4),
(7, 'nosenose no me convence', 'h@gmail.com', 0, 6),
(8, 'CALLENSE TODOS', 'y@gmail.com', 0, 4),
(9, 'AYUDA ME HE PERDIDOCAMI NO A L ASILO NOSE DONDE ESTOI', 'y@gmail.com', 0, 5),
(10, 'NO ME CAE BIEN!!!', 'david@gmail.com', 0, 7),
(11, '¿Donde estoy?', 'laura@gmail.com', 0, 7),
(12, 'Me cae bien pero es un poco rata', 'alvaro@gmail.com', 0, 7),
(13, 'Pues te fastidias!', 'h@gmail.com', 10, 7),
(14, 'jajajjaj que bueno', 'h@gmail.com', 10, 7),
(16, 'jajajjaj que bueno', 'h@gmail.com', 10, 7),
(17, 'vaya...', 'h@gmail.com', 10, 7),
(18, 'si es', 'h@gmail.com', 12, 7),
(21, 'no seas tan borde', 'h@gmail.com', 10, 7),
(22, 'AJAJAJJAJAJAJJJAJAJAJ NOTECREO', 'y@gmail.com', 9, 5),
(23, 'SOCORRO', 'y@gmail.com', 0, 7),
(24, 'hola', 'y@gmail.com', 0, 7),
(25, 'LA REINA DE LOS LAGARTOS Y LAS LAGARTAS', 'y@gmail.com', 0, 8),
(26, 'LA REINA DE MIS ENTRAÑAS', 'david@gmail.com', 0, 8),
(27, 'ELLA ES ESA, REINA Y SEÑORA DE NUESTROS ENSERES', 'laura@gmail.com', 25, 8);

-- --------------------------------------------------------

--
-- Table structure for table `conjuntos`
--

CREATE TABLE `conjuntos` (
  `id_rol` int NOT NULL,
  `correo` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `conjuntos`
--

INSERT INTO `conjuntos` (`id_rol`, `correo`) VALUES
(1, 'admin@gmail.com'),
(2, 'ainara08@ruvalcaba.es'),
(2, 'alexandra.rojas@latinmail.com'),
(2, 'alvaro@gmail.com'),
(2, 'blanco.iker@terra.com'),
(2, 'bprado@arreola.com'),
(2, 'caraballo.lola@ruvalcaba.es'),
(2, 'carmen.alanis@hotmail.com'),
(2, 'claudia.amador@gmail.com'),
(2, 'corral.ruben@marroquin.com'),
(2, 'david@gmail.com'),
(2, 'enrique.negrete@terra.com'),
(2, 'escobar.alberto@terra.com'),
(2, 'fpreciado@chavez.net'),
(2, 'gloria.duran@villalobos.com'),
(2, 'h@gmail.com'),
(2, 'ian75@ballesteros.com'),
(2, 'iker48@cabello.org'),
(2, 'ismael06@bustos.com'),
(2, 'jasso.nadia@jimenez.com'),
(2, 'jdelafuente@terra.com'),
(2, 'korellana@loya.es'),
(2, 'laura@gmail.com'),
(2, 'lpuente@hispavista.com'),
(2, 'luna.ballesteros@live.com'),
(2, 'margarita98@hispavista.com'),
(2, 'martin.cuevas@pabon.es'),
(2, 'o@gmail.com'),
(2, 'paola79@yahoo.es'),
(2, 'pedraza.aleix@bravo.es'),
(2, 'qcorona@live.com'),
(2, 'salero@gmail.com'),
(2, 'saul.henriquez@cano.com'),
(2, 'spozo@gmail.com'),
(2, 'vega36@yahoo.es'),
(2, 'y@gmail.com'),
(2, 'yeray.ornelas@vanegas.com'),
(2, 'yguerrero@andres.es');

-- --------------------------------------------------------

--
-- Table structure for table `personas`
--

CREATE TABLE `personas` (
  `correo` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `edad` int NOT NULL,
  `password` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personas`
--

INSERT INTO `personas` (`correo`, `nombre`, `edad`, `password`) VALUES
('admin@gmail.com', 'admin', 34, 'admin'),
('ainara08@ruvalcaba.es', 'Pilar Bahena', 16, '_MqgV7^1'),
('alexandra.rojas@latinmail.com', 'Diana Vargas Tercero', 15, '_N4:\"o=AXO$+3wjfVQSd'),
('alvaro@gmail.com', 'Alvaro', 54, 'alvaro'),
('blanco.iker@terra.com', 'Izan Heredia', 76, 'R/Im}\''),
('bprado@arreola.com', 'Inés Pelayo', 97, 'f,G*SP>PkWT`j'),
('caraballo.lola@ruvalcaba.es', 'Lic. Dario Del Río', 45, 'E<B>;F~|$nX'),
('carmen.alanis@hotmail.com', 'Francisco Casado', 61, 'qnpn1OS9-P|'),
('claudia.amador@gmail.com', 'Biel Benito', 43, 'B+\'31`^8,8,rze'),
('corral.ruben@marroquin.com', 'Saúl Pabón', 2, 'm<!V4;5T0=Cwd]~?K'),
('david@gmail.com', 'David', 53, 'david'),
('enrique.negrete@terra.com', 'Nora Calvo', 7, 'tDvkiO4MvvF1'),
('escobar.alberto@terra.com', 'D. Gabriel Morales', 74, 'CBL0n?`1PM:%U'),
('fpreciado@chavez.net', 'Alejandro Villalobos Segundo', 68, 'zK?`kRwdvk\'ZQ9jA'),
('gloria.duran@villalobos.com', 'Carlos Mayorga', 100, 'ko~C@nfN>P;8`pUX'),
('h@gmail.com', 'h', 52, 'h'),
('ian75@ballesteros.com', 'Daniel Mesa', 100, 'UL0[c2Kft@^Dm'),
('iker48@cabello.org', 'D. Rafael Mateos', 5, 'yRze<`u@ivdywmEgJA'),
('ismael06@bustos.com', 'Lic. Pedro Escalante Segundo', 54, 'rE%4/4dC'),
('jasso.nadia@jimenez.com', 'Ing. Andrea Reynoso', 45, 'LVR,T,^{l^'),
('jdelafuente@terra.com', 'Jesús Vigil', 99, '[c{@1&\"bz^5lsB36R'),
('korellana@loya.es', 'Marina Guajardo', 30, 'y6\"=]v'),
('laura@gmail.com', 'Laura', 52, 'laura'),
('lpuente@hispavista.com', 'Sra. Nil Navas Segundo', 58, '89gZ$$/XcU[O:c'),
('luna.ballesteros@live.com', 'Carolina Lomeli', 62, 'Y]<;*Ni_JMFSm'),
('margarita98@hispavista.com', 'Lic. Carlos Granados', 81, 'M\\|#2=k'),
('martin.cuevas@pabon.es', 'María Dolores Madera', 16, ':`N2_cUZ>u6+6\\Bp98c'),
('o@gmail.com', 'o', 46, 'o'),
('paola79@yahoo.es', 'Oriol Esparza', 3, '4diFD4\\r/t!'),
('pedraza.aleix@bravo.es', 'Jordi Ordóñez', 0, '_n1?k]yHsp/$-|06vl!q'),
('qcorona@live.com', 'Dr. Mireia Montenegro Tercero', 3, '3p1MNG3#[~\'G=3(u'),
('salero@gmail.com', 'Salero', 45, 'salero'),
('saul.henriquez@cano.com', 'Pilar Armenta Segundo', 86, 'SH%XJkb'),
('sdgvgds@gmail.com', 'sas', 56, 'asd'),
('spozo@gmail.com', 'María Dolores Gurule', 82, 't=y,hF3C\'^+M5\''),
('vega36@yahoo.es', 'Saúl Cuevas', 65, 'y98@I4IxP`%'),
('y@gmail.com', 'y', 85, 'y'),
('yeray.ornelas@vanegas.com', 'D. Pablo Arriaga', 18, ',VDT,/?-6%\'Z\"O'),
('yguerrero@andres.es', 'Dña Helena Villa Segundo', 44, '2Z}$nUsoV}-');

-- --------------------------------------------------------

--
-- Table structure for table `rol`
--

CREATE TABLE `rol` (
  `id` int NOT NULL,
  `tipo` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rol`
--

INSERT INTO `rol` (`id`, `tipo`) VALUES
(1, 'Administrador'),
(2, 'Usuario');

-- --------------------------------------------------------

--
-- Table structure for table `temas`
--

CREATE TABLE `temas` (
  `id` int NOT NULL,
  `titulo` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `correo` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `edad_minima` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `temas`
--

INSERT INTO `temas` (`id`, `titulo`, `correo`, `edad_minima`) VALUES
(4, 'La sonrisa de la vieja', 'h@gmail.com', 25),
(5, 'Papitas Frititas', 'h@gmail.com', 80),
(6, 'La salsilla de la vida', 'h@gmail.com', 20),
(7, 'Reverte o no Reverte', 'y@gmail.com', 50),
(8, '¿Quien es Malena?', 'y@gmail.com', 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `correo` (`correo`),
  ADD KEY `id_tema` (`id_tema`);

--
-- Indexes for table `conjuntos`
--
ALTER TABLE `conjuntos`
  ADD PRIMARY KEY (`id_rol`,`correo`),
  ADD KEY `correo` (`correo`);

--
-- Indexes for table `personas`
--
ALTER TABLE `personas`
  ADD PRIMARY KEY (`correo`);

--
-- Indexes for table `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `temas`
--
ALTER TABLE `temas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `correo` (`correo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `rol`
--
ALTER TABLE `rol`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `temas`
--
ALTER TABLE `temas`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `comentarios_ibfk_1` FOREIGN KEY (`correo`) REFERENCES `personas` (`correo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comentarios_ibfk_2` FOREIGN KEY (`id_tema`) REFERENCES `temas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `conjuntos`
--
ALTER TABLE `conjuntos`
  ADD CONSTRAINT `conjuntos_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `conjuntos_ibfk_2` FOREIGN KEY (`correo`) REFERENCES `personas` (`correo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `temas`
--
ALTER TABLE `temas`
  ADD CONSTRAINT `temas_ibfk_1` FOREIGN KEY (`correo`) REFERENCES `personas` (`correo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
