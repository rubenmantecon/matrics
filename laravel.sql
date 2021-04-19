-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 18-04-2021 a las 00:02:11
-- Versión del servidor: 8.0.23-0ubuntu0.20.04.1
-- Versión de PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `laravel`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `careers`
--

CREATE TABLE `careers` (
  `id` bigint UNSIGNED NOT NULL,
  `term_id` bigint UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hours` int NOT NULL,
  `start` date NOT NULL,
  `end` date DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `careers`
--

INSERT INTO `careers` (`id`, `term_id`, `code`, `name`, `description`, `hours`, `start`, `end`, `active`, `created_at`, `updated_at`) VALUES
(1, 1, 'CFPM    AF10', 'Preimpressió digital', '', 2000, '2025-02-13', NULL, 1, '2021-04-16 21:50:50', '2021-04-16 21:50:50'),
(2, 1, 'CFPM    AF20', 'Impressió gràfica', '', 2000, '2025-02-13', NULL, 1, '2021-04-16 21:50:50', '2021-04-16 21:50:50'),
(3, 1, 'CFPM    AF21', 'Impressió gràfica (converting)', '', 2000, '2014-11-13', NULL, 1, '2021-04-16 21:50:50', '2021-04-16 21:50:50'),
(4, 1, 'CFPM    AF30', 'Postimpressió i acabats gràfics', '', 2000, '2017-06-14', NULL, 1, '2021-04-16 21:50:50', '2021-04-16 21:50:50'),
(5, 1, 'CFPM    AG10', 'Gestió administrativa', '', 2000, '2014-10-10', NULL, 1, '2021-04-16 21:50:50', '2021-04-16 21:50:50'),
(6, 1, 'CFPM    AG11', 'Gestió administrativa (àmbit jurídic)', '', 2000, '2014-12-12', NULL, 1, '2021-04-16 21:50:50', '2021-04-16 21:50:50'),
(7, 1, 'CFPM    AG12', 'Gestió administrativa (àmbit sanitari)', '', 2000, '2017-05-16', NULL, 1, '2021-04-16 21:50:50', '2021-04-16 21:50:50'),
(8, 1, 'CFPM    AR10', 'Producció agropecuària', '', 2000, '2025-01-11', NULL, 1, '2021-04-16 21:50:50', '2021-04-16 21:50:50'),
(9, 1, 'CFPM    AR11', 'Producció agropecuària (Producció agrícola)', '', 2000, '2025-01-11', NULL, 1, '2021-04-16 21:50:50', '2021-04-16 21:50:50'),
(10, 1, 'CFPM    AR12', 'Producció agropecuària (Producció ramadera)', '', 2000, '2025-01-11', NULL, 1, '2021-04-16 21:50:50', '2021-04-16 21:50:50'),
(11, 1, 'CFPM    AR20', 'Producció agroecològica', '', 2000, '2025-01-11', NULL, 1, '2021-04-16 21:50:50', '2021-04-16 21:50:50'),
(12, 1, 'CFPM    AR21', 'Producció agroecològica (Producció agrícola ecològica)', '', 2000, '2025-01-11', NULL, 1, '2021-04-16 21:50:50', '2021-04-16 21:50:50'),
(13, 1, 'CFPM    AR22', 'Producció agroecològica (Producció ramadera ecològica)', '', 2000, '2025-01-11', NULL, 1, '2021-04-16 21:50:50', '2021-04-16 21:50:50'),
(14, 1, 'CFPM    AR30', 'Aprofitament i conservació del medi natural', '', 2000, '2008-04-13', NULL, 1, '2021-04-16 21:50:50', '2021-04-16 21:50:50'),
(15, 1, 'CFPM    AR50', 'Jardineria i floristeria', '', 2000, '2003-04-13', NULL, 1, '2021-04-16 21:50:50', '2021-04-16 21:50:50'),
(16, 1, 'CFPM    AR60', 'Activitats eqüestres', '', 2000, '2022-06-18', NULL, 1, '2021-04-16 21:50:50', '2021-04-16 21:50:50'),
(17, 1, 'CFPM    CM10', 'Activitats comercials', '', 2000, '2008-04-13', NULL, 1, '2021-04-16 21:50:50', '2021-04-16 21:50:50'),
(18, 1, 'CFPM    CM11', 'Activitats comercials (productes frescos)', '', 2000, '2031-03-15', NULL, 1, '2021-04-16 21:50:50', '2021-04-16 21:50:50'),
(19, 1, 'CFPM    CM12', 'Activitats comercials (logística)', '', 2000, '2017-05-16', NULL, 1, '2021-04-16 21:50:50', '2021-04-16 21:50:50'),
(20, 1, 'CFPM    CM13', 'Activitats comercials (moda)', '', 2000, '2030-08-17', NULL, 1, '2021-04-16 21:50:50', '2021-04-16 21:50:50'),
(21, 1, 'CFPM    EA10', 'Xarxes, instal·lacions i estacions de tractament d\'aigua', '', 2000, '2017-06-14', NULL, 1, '2021-04-16 21:50:50', '2021-04-16 21:50:50'),
(22, 1, 'CFPM    EA20', 'Xarxes i estacions de tractament d\'aigües', '', 2000, '2029-08-17', NULL, 1, '2021-04-16 21:50:50', '2021-04-16 21:50:50'),
(23, 1, 'CFPM    EE10', 'Instal·lacions elèctriques i automàtiques', '', 2000, '2005-07-10', NULL, 1, '2021-04-16 21:50:50', '2021-04-16 21:50:50'),
(24, 1, 'CFPM    EE30', 'Instal.lacions de telecomunicacions', '', 2000, '2025-01-11', NULL, 1, '2021-04-16 21:50:50', '2021-04-16 21:50:50'),
(25, 1, 'CFPM    EO10', 'Obres d\'interior, decoració i rehabilitació', '', 2000, '2004-06-13', NULL, 1, '2021-04-16 21:50:50', '2021-04-16 21:50:50'),
(26, 1, 'CFPM    EO20', 'Construcció', '', 2000, '2003-06-13', NULL, 1, '2021-04-16 21:50:50', '2021-04-16 21:50:50'),
(27, 1, 'CFPM    FM10', 'Soldadura i caldereria', '', 2000, '2020-02-09', NULL, 1, '2021-04-16 21:50:50', '2021-04-16 21:50:50'),
(28, 1, 'CFPM    FM20', 'Mecanització', '', 2000, '2020-02-09', NULL, 1, '2021-04-16 21:50:50', '2021-04-16 21:50:50'),
(29, 1, 'CFPM    FM21', 'Mecanització (Manteniment i reparació en rellotgeria) ', '', 2000, '2025-01-11', NULL, 1, '2021-04-16 21:50:50', '2021-04-16 21:50:50'),
(30, 1, 'CFPM    FS10', 'Fusteria i moble', '', 2000, '2001-07-13', NULL, 1, '2021-04-16 21:50:50', '2021-04-16 21:50:50'),
(31, 1, 'CFPM    FS20', 'Instal·lació i moblament', '', 2000, '2002-07-13', NULL, 1, '2021-04-16 21:50:50', '2021-04-16 21:50:50'),
(32, 1, 'CFPM    HT10', 'Cuina i gastronomia', '', 2000, '2020-02-09', NULL, 1, '2021-04-16 21:50:50', '2021-04-16 21:50:50'),
(33, 1, 'CFPM    HT30', 'Serveis en restauració', '', 2000, '2020-02-09', NULL, 1, '2021-04-16 21:50:50', '2021-04-16 21:50:50'),
(34, 1, 'CFPM    IA10', 'Elaboració de productes alimentaris', '', 2000, '2005-05-11', NULL, 1, '2021-04-16 21:50:50', '2021-04-16 21:50:50'),
(35, 1, 'CFPM    IA30', 'Olis d\'oliva i vins', '', 2000, '2020-02-09', NULL, 1, '2021-04-16 21:50:50', '2021-04-16 21:50:50'),
(36, 1, 'CFPM    IA60', 'Forneria, pastisseria i confiteria', '', 2000, '2020-02-09', NULL, 1, '2021-04-16 21:50:50', '2021-04-16 21:50:50'),
(37, 1, 'CFPM    IC10', 'Sistemes microinformàtics i xarxes', '', 2000, '2020-02-09', NULL, 1, '2021-04-16 21:50:50', '2021-04-16 21:50:50'),
(38, 1, 'CFPM    IE10', 'Excavacions i sondatges', '', 2000, '2008-04-13', NULL, 1, '2021-04-16 21:50:50', '2021-04-16 21:50:50'),
(39, 1, 'CFPM    IE11', 'Excavacions i sondatges (operacions de maquinària de construcció)', '', 2000, '2006-11-13', NULL, 1, '2021-04-16 21:50:50', '2021-04-16 21:50:50'),
(40, 1, 'CFPM    IE20', 'Pedra natural', '', 2000, '2029-08-17', NULL, 1, '2021-04-16 21:50:50', '2021-04-16 21:50:50'),
(41, 1, 'CFPM    IM10', 'Manteniment electromecànic', '', 2000, '2029-04-13', NULL, 1, '2021-04-16 21:50:50', '2021-04-16 21:50:50'),
(42, 1, 'CFPM    IM11', 'Manteniment electromecànic (vaixells d\'esbarjo i serveis portuaris)', '', 2000, '2014-11-13', NULL, 1, '2021-04-16 21:50:50', '2021-04-16 21:50:50'),
(43, 1, 'CFPM    IM20', 'Instal·lacions de producció de calor', '', 2000, '2003-05-11', NULL, 1, '2021-04-16 21:50:50', '2021-04-16 21:50:50'),
(44, 1, 'CFPM    IM30', 'Instal·lacions frigorífiques i de climatització', '', 2000, '2019-05-11', NULL, 1, '2021-04-16 21:50:50', '2021-04-16 21:50:50'),
(45, 1, 'CFPM    IP10', 'Perruqueria i cosmètica capil·lar', '', 2000, '2002-07-13', NULL, 1, '2021-04-16 21:50:50', '2021-04-16 21:50:50'),
(46, 1, 'CFPM    IP20', 'Estètica i bellesa', '', 2000, '2008-04-13', NULL, 1, '2021-04-16 21:50:50', '2021-04-16 21:50:50'),
(47, 1, 'CFPM    IS10', 'Vídeo, discjòquei i so', '', 2000, '2022-07-13', NULL, 1, '2021-04-16 21:50:50', '2021-04-16 21:50:50'),
(48, 1, 'CFPM    MP10', 'Cultius Aqüícoles', '', 2000, '2002-07-13', NULL, 1, '2021-04-16 21:50:50', '2021-04-16 21:50:50'),
(49, 1, 'CFPM    MP20', 'Operacions subaquàtiques i hiperbàriques', '', 2000, '2008-04-13', NULL, 1, '2021-04-16 21:50:50', '2021-04-16 21:50:50'),
(50, 1, 'CFPM    MP30', 'Navegació i pesca de litoral', '', 2000, '2008-04-13', NULL, 1, '2021-04-16 21:50:50', '2021-04-16 21:50:50'),
(51, 1, 'CFPM    MP40', 'Manteniment i control de la maquinària de vaixells i embarcacions', '', 2000, '2008-04-13', NULL, 1, '2021-04-16 21:50:50', '2021-04-16 21:50:50'),
(52, 1, 'CFPM    QU10', 'Planta química', '', 2000, '2016-09-09', NULL, 1, '2021-04-16 21:50:50', '2021-04-16 21:50:50'),
(53, 1, 'CFPM    QU11', 'Planta química (productes farmacèutics i cosmètics)', '', 2000, '2018-05-16', NULL, 1, '2021-04-16 21:50:50', '2021-04-16 21:50:50'),
(54, 1, 'CFPM    QU20', 'Operacions de laboratori', '', 2000, '2008-04-13', NULL, 1, '2021-04-16 21:50:50', '2021-04-16 21:50:50'),
(55, 1, 'CFPM    SA20', 'Farmàcia i parafarmàcia', '', 2000, '2001-07-10', NULL, 1, '2021-04-16 21:50:50', '2021-04-16 21:50:50'),
(56, 1, 'CFPM    SA30', 'Emergències sanitàries', '', 2000, '2001-07-10', NULL, 1, '2021-04-16 21:50:50', '2021-04-16 21:50:50'),
(57, 1, 'CFPM    SC10', 'Atenció a persones en situació de dependència', '', 2000, '2017-12-12', NULL, 1, '2021-04-16 21:50:50', '2021-04-16 21:50:50'),
(58, 1, 'CFPM    SM20', 'Emergències i protecció civil', '', 2000, '2030-08-17', NULL, 1, '2021-04-16 21:50:50', '2021-04-16 21:50:50'),
(59, 1, 'CFPM    TM10', 'Electromecànica de vehicles automòbils', '', 2000, '2017-05-11', NULL, 1, '2021-04-16 21:50:50', '2021-04-16 21:50:50'),
(60, 1, 'CFPM    TM11', 'Electromecànica de vehicles automòbils (Avions amb motor de pistó)', '', 2000, '2017-05-11', NULL, 1, '2021-04-16 21:50:50', '2021-04-16 21:50:50'),
(61, 1, 'CFPM    TM12', 'Electromecànica de vehicles automòbils (Electromecánica de vehicles industrials)', '', 2000, '2017-05-11', NULL, 1, '2021-04-16 21:50:50', '2021-04-16 21:50:50'),
(62, 1, 'CFPM    TM20', 'Carrosseria', '', 2000, '2020-02-09', NULL, 1, '2021-04-16 21:50:50', '2021-04-16 21:50:50'),
(63, 1, 'CFPM    TM30', 'Electromecànica de maquinària', '', 2000, '2018-02-13', NULL, 1, '2021-04-16 21:50:50', '2021-04-16 21:50:50'),
(64, 1, 'CFPM    TM40', 'Manteniment de material rodant ferroviari', '', 2000, '2008-04-13', NULL, 1, '2021-04-16 21:50:50', '2021-04-16 21:50:50'),
(65, 1, 'CFPM    TM50', 'Conducció de vehicles de transport per carretera', '', 2000, '2028-08-17', NULL, 1, '2021-04-16 21:50:50', '2021-04-16 21:50:50'),
(66, 1, 'CFPM    TM60', 'Manteniment d\'embarcacions d\'esbarjo', '', 2000, '2026-07-18', NULL, 1, '2021-04-16 21:50:50', '2021-04-16 21:50:50'),
(67, 1, 'CFPM    TX10', 'Fabricació i ennobliment de productes tèxtils', '', 2000, '2025-02-13', NULL, 1, '2021-04-16 21:50:50', '2021-04-16 21:50:50'),
(68, 1, 'CFPM    TX11', 'Fabricació i ennobliment de productes tèxtils (gèneres de punt)', '', 2000, '2018-05-16', NULL, 1, '2021-04-16 21:50:50', '2021-04-16 21:50:50'),
(69, 1, 'CFPM    TX50', 'Confecció i moda', '', 2000, '2020-02-09', NULL, 1, '2021-04-16 21:50:50', '2021-04-16 21:50:50'),
(70, 1, 'CFPM    TX51', 'Confecció i moda (innovació i producció de la moda)', '', 2000, '2002-04-14', NULL, 1, '2021-04-16 21:50:50', '2021-04-16 21:50:50'),
(71, 1, 'CFPS    AEA0', 'Ensenyament i animació socioesportiva', '', 2000, '2022-06-18', NULL, 1, '2021-04-16 21:50:50', '2021-04-16 21:50:50'),
(72, 1, 'CFPS    AEB0', 'Condicionament físic', '', 2000, '2010-07-18', NULL, 1, '2021-04-16 21:50:50', '2021-04-16 21:50:50'),
(73, 1, 'CFPS    AFA0', 'Disseny i edició de publicacions impreses i multimèdia ', '', 2000, '2006-06-14', NULL, 1, '2021-04-16 21:50:50', '2021-04-16 21:50:50'),
(74, 1, 'CFPS    AFB0', 'Disseny i gestió de la producció gràfica', '', 2000, '2012-06-14', NULL, 1, '2021-04-16 21:50:50', '2021-04-16 21:50:50'),
(75, 1, 'CFPS    AGA0', 'Assistència a la direcció ', '', 2000, '2024-05-12', NULL, 1, '2021-04-16 21:50:50', '2021-04-16 21:50:50'),
(76, 1, 'CFPS    AGB0', 'Administració i finances', '', 2000, '2010-12-12', NULL, 1, '2021-04-16 21:50:50', '2021-04-16 21:50:50'),
(77, 1, 'CFPS    AGB1', 'Administració i finances (gestor d\'assegurances)', '', 2000, '2030-08-17', NULL, 1, '2021-04-16 21:50:50', '2021-04-16 21:50:50'),
(78, 1, 'CFPS    ARA0', 'Gestió forestal i del medi natural', '', 2000, '2002-07-13', NULL, 1, '2021-04-16 21:50:50', '2021-04-16 21:50:50'),
(79, 1, 'CFPS    ARB0', 'Paisatgisme i medi rural', '', 2000, '2002-07-13', NULL, 1, '2021-04-16 21:50:50', '2021-04-16 21:50:50'),
(80, 1, 'CFPS    ARB1', 'Paisatgisme i medi rural (gestió agropecuària)', '', 2000, '2031-03-15', NULL, 1, '2021-04-16 21:50:50', '2021-04-16 21:50:50'),
(81, 1, 'CFPS    ARC0', 'Ramaderia i assistència en sanitat animal', '', 2000, '2016-06-14', NULL, 1, '2021-04-16 21:50:50', '2021-04-16 21:50:50'),
(82, 1, 'CFPS    CMA0', 'Gestió de vendes i espais comercials ', '', 2000, '2024-05-12', NULL, 1, '2021-04-16 21:50:51', '2021-04-16 21:50:51'),
(83, 1, 'CFPS    CMB0', 'Comerç internacional', '', 2000, '2014-12-12', NULL, 1, '2021-04-16 21:50:51', '2021-04-16 21:50:51'),
(84, 1, 'CFPS    CMC0', 'Transport i logística', '', 2000, '2016-12-12', NULL, 1, '2021-04-16 21:50:51', '2021-04-16 21:50:51'),
(85, 1, 'CFPS    CMD0', 'Màrqueting i publicitat ', '', 2000, '2024-05-12', NULL, 1, '2021-04-16 21:50:51', '2021-04-16 21:50:51'),
(86, 1, 'CFPS    CMD1', 'Màrqueting i publicitat (enològic)', '', 2000, '2031-03-15', NULL, 1, '2021-04-16 21:50:51', '2021-04-16 21:50:51'),
(87, 1, 'CFPS    CMD2', 'Màrqueting i publicitat (promoció turística)', '', 0, '2018-06-15', NULL, 1, '2021-04-16 21:50:51', '2021-04-16 21:50:51'),
(88, 1, 'CFPS    EAA0', 'Eficiència energètica i energia solar tèrmica', '', 2000, '2028-05-10', NULL, 1, '2021-04-16 21:50:51', '2021-04-16 21:50:51'),
(89, 1, 'CFPS    EAC0', 'Energies renovables', '', 2000, '2011-02-13', NULL, 1, '2021-04-16 21:50:51', '2021-04-16 21:50:51'),
(90, 1, 'CFPS    EAD0', 'Gestió de l\'aigua', '', 2000, '2011-07-18', NULL, 1, '2021-04-16 21:50:51', '2021-04-16 21:50:51'),
(91, 1, 'CFPS    EEA0', 'Sistemes electrotècnics i automatitzats', '', 2000, '2025-04-12', NULL, 1, '2021-04-16 21:50:51', '2021-04-16 21:50:51'),
(92, 1, 'CFPS    EEA1', 'Sistemes electrotècnics i automatitzats (instal·lacions elèctriques i comunicacions del vaixell)', '', 2000, '2031-03-15', NULL, 1, '2021-04-16 21:50:51', '2021-04-16 21:50:51'),
(93, 1, 'CFPS    EEB0', 'Automatització i robòtica industrial', '', 2000, '2008-02-13', NULL, 1, '2021-04-16 21:50:51', '2021-04-16 21:50:51'),
(94, 1, 'CFPS    EEC0', 'Manteniment electrònic', '', 2000, '2031-03-11', NULL, 1, '2021-04-16 21:50:51', '2021-04-16 21:50:51'),
(95, 1, 'CFPS    EED0', 'Sistemes de telecomunicacions i informàtics', '', 2000, '2004-02-13', NULL, 1, '2021-04-16 21:50:51', '2021-04-16 21:50:51'),
(96, 1, 'CFPS    EEE0', 'Electromedicina clínica', '', 2000, '2017-05-16', NULL, 1, '2021-04-16 21:50:51', '2021-04-16 21:50:51'),
(97, 1, 'CFPS    EOA0', 'Projectes d\'obra civil', '', 2000, '2029-05-13', NULL, 1, '2021-04-16 21:50:51', '2021-04-16 21:50:51'),
(98, 1, 'CFPS    EOA1', 'Projectes d\'obra civil (Sobrestants)', '', 2000, '2018-11-13', NULL, 1, '2021-04-16 21:50:51', '2021-04-16 21:50:51'),
(99, 1, 'CFPS    EOA2', 'Projectes d\'obra civil (ús d\'aplicacions SIG)', '', 2000, '2017-06-14', NULL, 1, '2021-04-16 21:50:51', '2021-04-16 21:50:51'),
(100, 1, 'CFPS    EOB0', 'Projectes d\'edificació', '', 2000, '2028-05-10', NULL, 1, '2021-04-16 21:50:51', '2021-04-16 21:50:51'),
(101, 1, 'CFPS    EOB1', 'Projectes d\'edificació (rehabilitació i restauració)', '', 2000, '2018-06-14', NULL, 1, '2021-04-16 21:50:51', '2021-04-16 21:50:51'),
(102, 1, 'CFPS    EOC0', 'Organització i control d\'obres de construcció', '', 2000, '2006-05-16', NULL, 1, '2021-04-16 21:50:51', '2021-04-16 21:50:51'),
(103, 1, 'CFPS    FMA0', 'Construccions metàl·liques', '', 2000, '2020-02-09', NULL, 1, '2021-04-16 21:50:51', '2021-04-16 21:50:51'),
(104, 1, 'CFPS    FMB0', 'Programació de la producció en fabricació mecànica', '', 2000, '2020-02-09', NULL, 1, '2021-04-16 21:50:51', '2021-04-16 21:50:51'),
(105, 1, 'CFPS    FMB1', 'Programació de la producció en fabricació mecànica (motlles i matrius)', '', 2000, '2030-08-17', NULL, 1, '2021-04-16 21:50:51', '2021-04-16 21:50:51'),
(106, 1, 'CFPS    FMC0', 'Disseny en fabricació mecànica', '', 2000, '2028-05-10', NULL, 1, '2021-04-16 21:50:51', '2021-04-16 21:50:51'),
(107, 1, 'CFPS    FMC1', 'Disseny en fabricació mecànica (desenvolupament virtual de l\'automòbil)', '', 2000, '2011-07-18', NULL, 1, '2021-04-16 21:50:51', '2021-04-16 21:50:51'),
(108, 1, 'CFPS    FMD0', 'Programació de la producció en emmotllament de metalls i polímers', '', 2000, '2018-11-13', NULL, 1, '2021-04-16 21:50:51', '2021-04-16 21:50:51'),
(109, 1, 'CFPS    FSA0', 'Disseny i moblament', '', 2000, '2002-07-13', NULL, 1, '2021-04-16 21:50:51', '2021-04-16 21:50:51'),
(110, 1, 'CFPS    FSA1', 'Disseny i moblament (construccions efímeres i decorats)', '', 2000, '2018-06-14', NULL, 1, '2021-04-16 21:50:51', '2021-04-16 21:50:51'),
(111, 1, 'CFPS    HTA0', 'Agències de viatges i gestió d\'esdeveniments', '', 2000, '2028-05-10', NULL, 1, '2021-04-16 21:50:51', '2021-04-16 21:50:51'),
(112, 1, 'CFPS    HTB0', 'Gestió d\'allotjaments turístics', '', 2000, '2020-02-09', NULL, 1, '2021-04-16 21:50:51', '2021-04-16 21:50:51'),
(113, 1, 'CFPS    HTD0', 'Direcció de cuina', '', 2000, '2028-05-10', NULL, 1, '2021-04-16 21:50:51', '2021-04-16 21:50:51'),
(114, 1, 'CFPS    HTE0', 'Direcció de serveis en restauració', '', 2000, '2028-05-10', NULL, 1, '2021-04-16 21:50:51', '2021-04-16 21:50:51'),
(115, 1, 'CFPS    HTF0', 'Guia, informació i assistència turístiques', '', 2000, '2028-05-10', NULL, 1, '2021-04-16 21:50:51', '2021-04-16 21:50:51'),
(116, 1, 'CFPS    HTF1', 'Guia, informació i assistència turístiques (animació turística)', '', 2000, '2008-04-13', NULL, 1, '2021-04-16 21:50:51', '2021-04-16 21:50:51'),
(117, 1, 'CFPS    IAA0', 'Vitivinicultura', '', 2000, '2020-02-09', NULL, 1, '2021-04-16 21:50:51', '2021-04-16 21:50:51'),
(118, 1, 'CFPS    IAB0', 'Processos i qualitat en la indústria alimentària', '', 2000, '2028-05-10', NULL, 1, '2021-04-16 21:50:51', '2021-04-16 21:50:51'),
(119, 1, 'CFPS    ICA0', 'Administració de sistemes informàtics en xarxa', '', 2000, '2028-05-10', NULL, 1, '2021-04-16 21:50:51', '2021-04-16 21:50:51'),
(120, 1, 'CFPS    ICA1', 'Administració de sistemes informàtics en xarxa (ciberseguretat)', '', 2000, '2030-08-17', NULL, 1, '2021-04-16 21:50:51', '2021-04-16 21:50:51'),
(121, 1, 'CFPS    ICB0', 'Desenvolupament d\'aplicacions multiplataforma', '', 2000, '2028-05-10', NULL, 1, '2021-04-16 21:50:51', '2021-04-16 21:50:51'),
(122, 1, 'CFPS    ICB1', 'Desenvolupament d\'aplicacions multiplataforma (informàtica aplicada a la logística)', '', 2000, '2001-09-14', NULL, 1, '2021-04-16 21:50:51', '2021-04-16 21:50:51'),
(123, 1, 'CFPS    ICB2', 'Desenvolupament d\'aplicacions multiplataforma (videojocs i oci digital)', '', 2000, '2018-10-16', NULL, 1, '2021-04-16 21:50:51', '2021-04-16 21:50:51'),
(124, 1, 'CFPS    ICC0', 'Desenvolupament d\'aplicacions web', '', 2000, '2028-05-10', NULL, 1, '2021-04-16 21:50:51', '2021-04-16 21:50:51'),
(125, 1, 'CFPS    ICC1', 'Desenvolupament d\'aplicacions web (bioinformàtica)', '', 2000, '2031-03-15', NULL, 1, '2021-04-16 21:50:51', '2021-04-16 21:50:51'),
(126, 1, 'CFPS    IMA0', 'Manteniment d\'instal·lacions tèrmiques i de fluids', '', 2000, '2020-02-09', NULL, 1, '2021-04-16 21:50:51', '2021-04-16 21:50:51'),
(127, 1, 'CFPS    IMB0', 'Desenvolupament de projectes d\'instal·lacions tèrmiques i de fluids', '', 2000, '2020-02-09', NULL, 1, '2021-04-16 21:50:51', '2021-04-16 21:50:51'),
(128, 1, 'CFPS    IMC0', 'Mecatrònica industrial', '', 2000, '2029-04-13', NULL, 1, '2021-04-16 21:50:51', '2021-04-16 21:50:51'),
(129, 1, 'CFPS    IMC1', 'Mecatrònica industrial (fabricació de productes ceràmics)', '', 2000, '2018-06-14', NULL, 1, '2021-04-16 21:50:51', '2021-04-16 21:50:51'),
(130, 1, 'CFPS    IPA0', 'Assessoria d\'imatge personal i corporativa', '', 2000, '2002-07-13', NULL, 1, '2021-04-16 21:50:51', '2021-04-16 21:50:51'),
(131, 1, 'CFPS    IPB0', 'Estètica integral i benestar', '', 2000, '2002-07-13', NULL, 1, '2021-04-16 21:50:51', '2021-04-16 21:50:51'),
(132, 1, 'CFPS    IPC0', 'Estilisme i direcció de perruqueria', '', 2000, '2002-07-13', NULL, 1, '2021-04-16 21:50:51', '2021-04-16 21:50:51'),
(133, 1, 'CFPS    IPD0', 'Caracterització i maquillatge professional', '', 2000, '2008-04-13', NULL, 1, '2021-04-16 21:50:51', '2021-04-16 21:50:51'),
(134, 1, 'CFPS    ISA0', 'Realització de projectes d\'audiovisuals i espectacles', '', 2000, '2002-07-13', NULL, 1, '2021-04-16 21:50:51', '2021-04-16 21:50:51'),
(135, 1, 'CFPS    ISB0', 'Il·luminació, captació i tractament d\'imatge', '', 2000, '2002-07-13', NULL, 1, '2021-04-16 21:50:51', '2021-04-16 21:50:51'),
(136, 1, 'CFPS    ISC0', 'So per a audiovisuals i espectacles', '', 2000, '2002-07-13', NULL, 1, '2021-04-16 21:50:51', '2021-04-16 21:50:51'),
(137, 1, 'CFPS    ISD0', 'Producció d\'audiovisuals i espectacles', '', 2000, '2002-07-13', NULL, 1, '2021-04-16 21:50:51', '2021-04-16 21:50:51'),
(138, 1, 'CFPS    ISE0', 'Animacions 3D, jocs i entorns interactius', '', 2000, '2002-07-13', NULL, 1, '2021-04-16 21:50:51', '2021-04-16 21:50:51'),
(139, 1, 'CFPS    ISE1', 'Animacions 3D, jocs i entorns interactius (móns virtuals, realitat augmentada i gamificació)', '', 2000, '2018-06-14', NULL, 1, '2021-04-16 21:50:51', '2021-04-16 21:50:51'),
(140, 1, 'CFPS    MPA0', 'Transport marítim i pesca d\'altura', '', 2000, '2013-05-13', NULL, 1, '2021-04-16 21:50:51', '2021-04-16 21:50:51'),
(141, 1, 'CFPS    MPB0', 'Aqüicultura', '', 2000, '2002-07-13', NULL, 1, '2021-04-16 21:50:51', '2021-04-16 21:50:51'),
(142, 1, 'CFPS    MPC0', 'Organització del manteniment de la maquinària de vaixells i embarcacions', '', 2000, '2008-04-13', NULL, 1, '2021-04-16 21:50:51', '2021-04-16 21:50:51'),
(143, 1, 'CFPS    QUA0', 'Química industrial', '', 2000, '2020-02-09', NULL, 1, '2021-04-16 21:50:51', '2021-04-16 21:50:51'),
(144, 1, 'CFPS    QUB0', 'Fabricació de productes farmacèutics, biotecnològics i afins', '', 2000, '2018-03-15', NULL, 1, '2021-04-16 21:50:51', '2021-04-16 21:50:51'),
(145, 1, 'CFPS    QUD0', 'Laboratori d\'anàlisi i control de qualitat', '', 2000, '2020-02-09', NULL, 1, '2021-04-16 21:50:51', '2021-04-16 21:50:51'),
(146, 1, 'CFPS    SAA0', 'Pròtesis dentals', '', 2000, '2001-07-12', NULL, 1, '2021-04-16 21:50:51', '2021-04-16 21:50:51'),
(147, 1, 'CFPS    SAB0', 'Ortopròtesi i productes de suport', '', 2000, '2016-06-14', NULL, 1, '2021-04-16 21:50:51', '2021-04-16 21:50:51'),
(148, 1, 'CFPS    SAC0', 'Anatomia patològica i citodiagnòstic', '', 2000, '2018-03-15', NULL, 1, '2021-04-16 21:50:51', '2021-04-16 21:50:51'),
(149, 1, 'CFPS    SAD0', 'Documentació i administració sanitària', '', 2000, '2018-03-15', NULL, 1, '2021-04-16 21:50:51', '2021-04-16 21:50:51'),
(150, 1, 'CFPS    SAD1', 'Documentació i administració sanitàries (gestió de dades)', '', 2000, '2028-10-15', NULL, 1, '2021-04-16 21:50:51', '2021-04-16 21:50:51'),
(151, 1, 'CFPS    SAE0', 'Laboratori clínic i biomèdic', '', 2000, '2018-03-15', NULL, 1, '2021-04-16 21:50:51', '2021-04-16 21:50:51'),
(152, 1, 'CFPS    SAE1', 'Laboratori clínic i biomèdic (recerca)', '', 2000, '2029-10-15', NULL, 1, '2021-04-16 21:50:51', '2021-04-16 21:50:51'),
(153, 1, 'CFPS    SAF0', 'Radioteràpia i dosimetria', '', 2000, '2018-03-15', NULL, 1, '2021-04-16 21:50:51', '2021-04-16 21:50:51'),
(154, 1, 'CFPS    SAG0', 'Audiologia protètica', '', 2000, '2020-02-09', NULL, 1, '2021-04-16 21:50:51', '2021-04-16 21:50:51'),
(155, 1, 'CFPS    SAH0', 'Higiene bucodental', '', 2000, '2018-03-15', NULL, 1, '2021-04-16 21:50:51', '2021-04-16 21:50:51'),
(156, 1, 'CFPS    SAI0', 'Imatge per al diagnòstic i medicina nuclear', '', 2000, '2018-03-15', NULL, 1, '2021-04-16 21:50:51', '2021-04-16 21:50:51'),
(157, 1, 'CFPS    SCA0', 'Animació sociocultural i turística ', '', 2000, '2024-05-12', NULL, 1, '2021-04-16 21:50:51', '2021-04-16 21:50:51'),
(158, 1, 'CFPS    SCB0', 'Educació Infantil', '', 2000, '2005-07-10', NULL, 1, '2021-04-16 21:50:51', '2021-04-16 21:50:51'),
(159, 1, 'CFPS    SCC0', 'Integració social', '', 2000, '2008-04-13', NULL, 1, '2021-04-16 21:50:51', '2021-04-16 21:50:51'),
(160, 1, 'CFPS    SCD0', 'Promoció d\'igualtat de gènere', '', 2000, '2016-06-14', NULL, 1, '2021-04-16 21:50:51', '2021-04-16 21:50:51'),
(161, 1, 'CFPS    SCE0', 'Mediació comunicativa', '', 2000, '2018-03-15', NULL, 1, '2021-04-16 21:50:51', '2021-04-16 21:50:51'),
(162, 1, 'CFPS    SMA0', 'Educació i control ambiental', '', 2000, '2011-03-13', NULL, 1, '2021-04-16 21:50:51', '2021-04-16 21:50:51'),
(163, 1, 'CFPS    SMB0', 'Coordinació d\'emergències i protecció civil', '', 2000, '2030-08-17', NULL, 1, '2021-04-16 21:50:51', '2021-04-16 21:50:51'),
(164, 1, 'CFPS    TMA0', 'Automoció', '', 2000, '2020-02-09', NULL, 1, '2021-04-16 21:50:51', '2021-04-16 21:50:51'),
(165, 1, 'CFPS    TMA1', 'Automoció (Vehicles industrials)', '', 2000, '2025-01-11', NULL, 1, '2021-04-16 21:50:51', '2021-04-16 21:50:51'),
(166, 1, 'CFPS    TXA0', 'Disseny tècnic en tèxtil i pell', '', 2000, '2020-06-14', NULL, 1, '2021-04-16 21:50:51', '2021-04-16 21:50:51'),
(167, 1, 'CFPS    TXB0', 'Vestuari a mida i d\'espectacles', '', 2000, '2004-03-13', NULL, 1, '2021-04-16 21:50:51', '2021-04-16 21:50:51'),
(168, 1, 'CFPS    TXE0', 'Patronatge i moda', '', 2000, '2020-02-09', NULL, 1, '2021-04-16 21:50:51', '2021-04-16 21:50:51');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `enrolments`
--

CREATE TABLE `enrolments` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `term_id` bigint UNSIGNED NOT NULL,
  `career_id` bigint UNSIGNED NOT NULL,
  `dni` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` enum('pending','validated','unregistered') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `enrolments`
--

INSERT INTO `enrolments` (`id`, `user_id`, `term_id`, `career_id`, `dni`, `state`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 1, '1234567Z', 'unregistered', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `enrolment_ufs`
--

CREATE TABLE `enrolment_ufs` (
  `uf_id` bigint UNSIGNED NOT NULL,
  `enrolment_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `logs`
--

CREATE TABLE `logs` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `level` int NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `logs`
--

INSERT INTO `logs` (`id`, `user_id`, `level`, `message`, `created_at`, `updated_at`) VALUES
(1, 2, 200, '{\"message\":\"Ha iniciado sesi\\u00f3n\",\"extra\":{\"user_id\":2}}', '2021-04-16 17:05:31', '2021-04-16 17:05:31'),
(2, 1, 200, '{\"message\":\"Ha iniciado sesi\\u00f3n\",\"extra\":{\"user_id\":1}}', '2021-04-16 21:49:18', '2021-04-16 21:49:18'),
(3, 1, 200, '{\"message\":\"Ha creado un nuevo Curso\",\"extra\":{\"user_id\":1,\"term_id\":1}}', '2021-04-16 21:49:40', '2021-04-16 21:49:40'),
(4, 1, 200, '{\"message\":\"Ha creado un nuevo Ciclo\",\"extra\":{\"user_id\":1,\"career_id\":1}}', '2021-04-16 21:50:50', '2021-04-16 21:50:50'),
(5, 1, 200, '{\"message\":\"Ha creado un nuevo Ciclo\",\"extra\":{\"user_id\":1,\"career_id\":2}}', '2021-04-16 21:50:50', '2021-04-16 21:50:50'),
(6, 1, 200, '{\"message\":\"Ha creado un nuevo Ciclo\",\"extra\":{\"user_id\":1,\"career_id\":3}}', '2021-04-16 21:50:50', '2021-04-16 21:50:50'),
(7, 1, 200, '{\"message\":\"Ha creado un nuevo Ciclo\",\"extra\":{\"user_id\":1,\"career_id\":4}}', '2021-04-16 21:50:50', '2021-04-16 21:50:50'),
(8, 1, 200, '{\"message\":\"Ha creado un nuevo Ciclo\",\"extra\":{\"user_id\":1,\"career_id\":5}}', '2021-04-16 21:50:50', '2021-04-16 21:50:50'),
(9, 1, 200, '{\"message\":\"Ha creado un nuevo Ciclo\",\"extra\":{\"user_id\":1,\"career_id\":6}}', '2021-04-16 21:50:50', '2021-04-16 21:50:50'),
(10, 1, 200, '{\"message\":\"Ha creado un nuevo Ciclo\",\"extra\":{\"user_id\":1,\"career_id\":7}}', '2021-04-16 21:50:50', '2021-04-16 21:50:50'),
(11, 1, 200, '{\"message\":\"Ha creado un nuevo Ciclo\",\"extra\":{\"user_id\":1,\"career_id\":8}}', '2021-04-16 21:50:50', '2021-04-16 21:50:50'),
(12, 1, 200, '{\"message\":\"Ha creado un nuevo Ciclo\",\"extra\":{\"user_id\":1,\"career_id\":9}}', '2021-04-16 21:50:50', '2021-04-16 21:50:50'),
(13, 1, 200, '{\"message\":\"Ha creado un nuevo Ciclo\",\"extra\":{\"user_id\":1,\"career_id\":10}}', '2021-04-16 21:50:50', '2021-04-16 21:50:50'),
(14, 1, 200, '{\"message\":\"Ha creado un nuevo Ciclo\",\"extra\":{\"user_id\":1,\"career_id\":11}}', '2021-04-16 21:50:50', '2021-04-16 21:50:50'),
(15, 1, 200, '{\"message\":\"Ha creado un nuevo Ciclo\",\"extra\":{\"user_id\":1,\"career_id\":12}}', '2021-04-16 21:50:50', '2021-04-16 21:50:50'),
(16, 1, 200, '{\"message\":\"Ha creado un nuevo Ciclo\",\"extra\":{\"user_id\":1,\"career_id\":13}}', '2021-04-16 21:50:50', '2021-04-16 21:50:50'),
(17, 1, 200, '{\"message\":\"Ha creado un nuevo Ciclo\",\"extra\":{\"user_id\":1,\"career_id\":14}}', '2021-04-16 21:50:50', '2021-04-16 21:50:50'),
(18, 1, 200, '{\"message\":\"Ha creado un nuevo Ciclo\",\"extra\":{\"user_id\":1,\"career_id\":15}}', '2021-04-16 21:50:50', '2021-04-16 21:50:50'),
(19, 1, 200, '{\"message\":\"Ha creado un nuevo Ciclo\",\"extra\":{\"user_id\":1,\"career_id\":16}}', '2021-04-16 21:50:50', '2021-04-16 21:50:50'),
(20, 1, 200, '{\"message\":\"Ha creado un nuevo Ciclo\",\"extra\":{\"user_id\":1,\"career_id\":17}}', '2021-04-16 21:50:50', '2021-04-16 21:50:50'),
(21, 1, 200, '{\"message\":\"Ha creado un nuevo Ciclo\",\"extra\":{\"user_id\":1,\"career_id\":18}}', '2021-04-16 21:50:50', '2021-04-16 21:50:50'),
(22, 1, 200, '{\"message\":\"Ha creado un nuevo Ciclo\",\"extra\":{\"user_id\":1,\"career_id\":19}}', '2021-04-16 21:50:50', '2021-04-16 21:50:50'),
(23, 1, 200, '{\"message\":\"Ha creado un nuevo Ciclo\",\"extra\":{\"user_id\":1,\"career_id\":20}}', '2021-04-16 21:50:50', '2021-04-16 21:50:50'),
(24, 1, 200, '{\"message\":\"Ha creado un nuevo Ciclo\",\"extra\":{\"user_id\":1,\"career_id\":21}}', '2021-04-16 21:50:50', '2021-04-16 21:50:50'),
(25, 1, 200, '{\"message\":\"Ha creado un nuevo Ciclo\",\"extra\":{\"user_id\":1,\"career_id\":22}}', '2021-04-16 21:50:50', '2021-04-16 21:50:50'),
(26, 1, 200, '{\"message\":\"Ha creado un nuevo Ciclo\",\"extra\":{\"user_id\":1,\"career_id\":23}}', '2021-04-16 21:50:50', '2021-04-16 21:50:50'),
(27, 1, 200, '{\"message\":\"Ha creado un nuevo Ciclo\",\"extra\":{\"user_id\":1,\"career_id\":24}}', '2021-04-16 21:50:50', '2021-04-16 21:50:50'),
(28, 1, 200, '{\"message\":\"Ha creado un nuevo Ciclo\",\"extra\":{\"user_id\":1,\"career_id\":25}}', '2021-04-16 21:50:50', '2021-04-16 21:50:50'),
(29, 1, 200, '{\"message\":\"Ha creado un nuevo Ciclo\",\"extra\":{\"user_id\":1,\"career_id\":26}}', '2021-04-16 21:50:50', '2021-04-16 21:50:50'),
(30, 1, 200, '{\"message\":\"Ha creado un nuevo Ciclo\",\"extra\":{\"user_id\":1,\"career_id\":27}}', '2021-04-16 21:50:50', '2021-04-16 21:50:50'),
(31, 1, 200, '{\"message\":\"Ha creado un nuevo Ciclo\",\"extra\":{\"user_id\":1,\"career_id\":28}}', '2021-04-16 21:50:50', '2021-04-16 21:50:50'),
(32, 1, 200, '{\"message\":\"Ha creado un nuevo Ciclo\",\"extra\":{\"user_id\":1,\"career_id\":29}}', '2021-04-16 21:50:50', '2021-04-16 21:50:50'),
(33, 1, 200, '{\"message\":\"Ha creado un nuevo Ciclo\",\"extra\":{\"user_id\":1,\"career_id\":30}}', '2021-04-16 21:50:50', '2021-04-16 21:50:50'),
(34, 1, 200, '{\"message\":\"Ha creado un nuevo Ciclo\",\"extra\":{\"user_id\":1,\"career_id\":31}}', '2021-04-16 21:50:50', '2021-04-16 21:50:50'),
(35, 1, 200, '{\"message\":\"Ha creado un nuevo Ciclo\",\"extra\":{\"user_id\":1,\"career_id\":32}}', '2021-04-16 21:50:50', '2021-04-16 21:50:50'),
(36, 1, 200, '{\"message\":\"Ha creado un nuevo Ciclo\",\"extra\":{\"user_id\":1,\"career_id\":33}}', '2021-04-16 21:50:50', '2021-04-16 21:50:50'),
(37, 1, 200, '{\"message\":\"Ha creado un nuevo Ciclo\",\"extra\":{\"user_id\":1,\"career_id\":34}}', '2021-04-16 21:50:50', '2021-04-16 21:50:50'),
(38, 1, 200, '{\"message\":\"Ha creado un nuevo Ciclo\",\"extra\":{\"user_id\":1,\"career_id\":35}}', '2021-04-16 21:50:50', '2021-04-16 21:50:50'),
(39, 1, 200, '{\"message\":\"Ha creado un nuevo Ciclo\",\"extra\":{\"user_id\":1,\"career_id\":36}}', '2021-04-16 21:50:50', '2021-04-16 21:50:50'),
(40, 1, 200, '{\"message\":\"Ha creado un nuevo Ciclo\",\"extra\":{\"user_id\":1,\"career_id\":37}}', '2021-04-16 21:50:50', '2021-04-16 21:50:50'),
(41, 1, 200, '{\"message\":\"Ha creado un nuevo Ciclo\",\"extra\":{\"user_id\":1,\"career_id\":38}}', '2021-04-16 21:50:50', '2021-04-16 21:50:50'),
(42, 1, 200, '{\"message\":\"Ha creado un nuevo Ciclo\",\"extra\":{\"user_id\":1,\"career_id\":39}}', '2021-04-16 21:50:50', '2021-04-16 21:50:50'),
(43, 1, 200, '{\"message\":\"Ha creado un nuevo Ciclo\",\"extra\":{\"user_id\":1,\"career_id\":40}}', '2021-04-16 21:50:50', '2021-04-16 21:50:50'),
(44, 1, 200, '{\"message\":\"Ha creado un nuevo Ciclo\",\"extra\":{\"user_id\":1,\"career_id\":41}}', '2021-04-16 21:50:50', '2021-04-16 21:50:50'),
(45, 1, 200, '{\"message\":\"Ha creado un nuevo Ciclo\",\"extra\":{\"user_id\":1,\"career_id\":42}}', '2021-04-16 21:50:50', '2021-04-16 21:50:50'),
(46, 1, 200, '{\"message\":\"Ha creado un nuevo Ciclo\",\"extra\":{\"user_id\":1,\"career_id\":43}}', '2021-04-16 21:50:50', '2021-04-16 21:50:50'),
(47, 1, 200, '{\"message\":\"Ha creado un nuevo Ciclo\",\"extra\":{\"user_id\":1,\"career_id\":44}}', '2021-04-16 21:50:50', '2021-04-16 21:50:50'),
(48, 1, 200, '{\"message\":\"Ha creado un nuevo Ciclo\",\"extra\":{\"user_id\":1,\"career_id\":45}}', '2021-04-16 21:50:50', '2021-04-16 21:50:50'),
(49, 1, 200, '{\"message\":\"Ha creado un nuevo Ciclo\",\"extra\":{\"user_id\":1,\"career_id\":46}}', '2021-04-16 21:50:50', '2021-04-16 21:50:50'),
(50, 1, 200, '{\"message\":\"Ha creado un nuevo Ciclo\",\"extra\":{\"user_id\":1,\"career_id\":47}}', '2021-04-16 21:50:50', '2021-04-16 21:50:50'),
(51, 1, 200, '{\"message\":\"Ha creado un nuevo Ciclo\",\"extra\":{\"user_id\":1,\"career_id\":48}}', '2021-04-16 21:50:50', '2021-04-16 21:50:50'),
(52, 1, 200, '{\"message\":\"Ha creado un nuevo Ciclo\",\"extra\":{\"user_id\":1,\"career_id\":49}}', '2021-04-16 21:50:50', '2021-04-16 21:50:50'),
(53, 1, 200, '{\"message\":\"Ha creado un nuevo Ciclo\",\"extra\":{\"user_id\":1,\"career_id\":50}}', '2021-04-16 21:50:50', '2021-04-16 21:50:50'),
(54, 1, 200, '{\"message\":\"Ha creado un nuevo Ciclo\",\"extra\":{\"user_id\":1,\"career_id\":51}}', '2021-04-16 21:50:50', '2021-04-16 21:50:50'),
(55, 1, 200, '{\"message\":\"Ha creado un nuevo Ciclo\",\"extra\":{\"user_id\":1,\"career_id\":52}}', '2021-04-16 21:50:50', '2021-04-16 21:50:50'),
(56, 1, 200, '{\"message\":\"Ha creado un nuevo Ciclo\",\"extra\":{\"user_id\":1,\"career_id\":53}}', '2021-04-16 21:50:50', '2021-04-16 21:50:50'),
(57, 1, 200, '{\"message\":\"Ha creado un nuevo Ciclo\",\"extra\":{\"user_id\":1,\"career_id\":54}}', '2021-04-16 21:50:50', '2021-04-16 21:50:50'),
(58, 1, 200, '{\"message\":\"Ha creado un nuevo Ciclo\",\"extra\":{\"user_id\":1,\"career_id\":55}}', '2021-04-16 21:50:50', '2021-04-16 21:50:50'),
(59, 1, 200, '{\"message\":\"Ha creado un nuevo Ciclo\",\"extra\":{\"user_id\":1,\"career_id\":56}}', '2021-04-16 21:50:50', '2021-04-16 21:50:50'),
(60, 1, 200, '{\"message\":\"Ha creado un nuevo Ciclo\",\"extra\":{\"user_id\":1,\"career_id\":57}}', '2021-04-16 21:50:50', '2021-04-16 21:50:50'),
(61, 1, 200, '{\"message\":\"Ha creado un nuevo Ciclo\",\"extra\":{\"user_id\":1,\"career_id\":58}}', '2021-04-16 21:50:50', '2021-04-16 21:50:50'),
(62, 1, 200, '{\"message\":\"Ha creado un nuevo Ciclo\",\"extra\":{\"user_id\":1,\"career_id\":59}}', '2021-04-16 21:50:50', '2021-04-16 21:50:50'),
(63, 1, 200, '{\"message\":\"Ha creado un nuevo Ciclo\",\"extra\":{\"user_id\":1,\"career_id\":60}}', '2021-04-16 21:50:50', '2021-04-16 21:50:50'),
(64, 1, 200, '{\"message\":\"Ha creado un nuevo Ciclo\",\"extra\":{\"user_id\":1,\"career_id\":61}}', '2021-04-16 21:50:50', '2021-04-16 21:50:50'),
(65, 1, 200, '{\"message\":\"Ha creado un nuevo Ciclo\",\"extra\":{\"user_id\":1,\"career_id\":62}}', '2021-04-16 21:50:50', '2021-04-16 21:50:50'),
(66, 1, 200, '{\"message\":\"Ha creado un nuevo Ciclo\",\"extra\":{\"user_id\":1,\"career_id\":63}}', '2021-04-16 21:50:50', '2021-04-16 21:50:50'),
(67, 1, 200, '{\"message\":\"Ha creado un nuevo Ciclo\",\"extra\":{\"user_id\":1,\"career_id\":64}}', '2021-04-16 21:50:50', '2021-04-16 21:50:50'),
(68, 1, 200, '{\"message\":\"Ha creado un nuevo Ciclo\",\"extra\":{\"user_id\":1,\"career_id\":65}}', '2021-04-16 21:50:50', '2021-04-16 21:50:50'),
(69, 1, 200, '{\"message\":\"Ha creado un nuevo Ciclo\",\"extra\":{\"user_id\":1,\"career_id\":66}}', '2021-04-16 21:50:50', '2021-04-16 21:50:50'),
(70, 1, 200, '{\"message\":\"Ha creado un nuevo Ciclo\",\"extra\":{\"user_id\":1,\"career_id\":67}}', '2021-04-16 21:50:50', '2021-04-16 21:50:50'),
(71, 1, 200, '{\"message\":\"Ha creado un nuevo Ciclo\",\"extra\":{\"user_id\":1,\"career_id\":68}}', '2021-04-16 21:50:50', '2021-04-16 21:50:50'),
(72, 1, 200, '{\"message\":\"Ha creado un nuevo Ciclo\",\"extra\":{\"user_id\":1,\"career_id\":69}}', '2021-04-16 21:50:50', '2021-04-16 21:50:50'),
(73, 1, 200, '{\"message\":\"Ha creado un nuevo Ciclo\",\"extra\":{\"user_id\":1,\"career_id\":70}}', '2021-04-16 21:50:50', '2021-04-16 21:50:50'),
(74, 1, 200, '{\"message\":\"Ha creado un nuevo Ciclo\",\"extra\":{\"user_id\":1,\"career_id\":71}}', '2021-04-16 21:50:50', '2021-04-16 21:50:50'),
(75, 1, 200, '{\"message\":\"Ha creado un nuevo Ciclo\",\"extra\":{\"user_id\":1,\"career_id\":72}}', '2021-04-16 21:50:50', '2021-04-16 21:50:50'),
(76, 1, 200, '{\"message\":\"Ha creado un nuevo Ciclo\",\"extra\":{\"user_id\":1,\"career_id\":73}}', '2021-04-16 21:50:50', '2021-04-16 21:50:50'),
(77, 1, 200, '{\"message\":\"Ha creado un nuevo Ciclo\",\"extra\":{\"user_id\":1,\"career_id\":74}}', '2021-04-16 21:50:50', '2021-04-16 21:50:50'),
(78, 1, 200, '{\"message\":\"Ha creado un nuevo Ciclo\",\"extra\":{\"user_id\":1,\"career_id\":75}}', '2021-04-16 21:50:50', '2021-04-16 21:50:50'),
(79, 1, 200, '{\"message\":\"Ha creado un nuevo Ciclo\",\"extra\":{\"user_id\":1,\"career_id\":76}}', '2021-04-16 21:50:50', '2021-04-16 21:50:50'),
(80, 1, 200, '{\"message\":\"Ha creado un nuevo Ciclo\",\"extra\":{\"user_id\":1,\"career_id\":77}}', '2021-04-16 21:50:50', '2021-04-16 21:50:50'),
(81, 1, 200, '{\"message\":\"Ha creado un nuevo Ciclo\",\"extra\":{\"user_id\":1,\"career_id\":78}}', '2021-04-16 21:50:50', '2021-04-16 21:50:50'),
(82, 1, 200, '{\"message\":\"Ha creado un nuevo Ciclo\",\"extra\":{\"user_id\":1,\"career_id\":79}}', '2021-04-16 21:50:50', '2021-04-16 21:50:50'),
(83, 1, 200, '{\"message\":\"Ha creado un nuevo Ciclo\",\"extra\":{\"user_id\":1,\"career_id\":80}}', '2021-04-16 21:50:50', '2021-04-16 21:50:50'),
(84, 1, 200, '{\"message\":\"Ha creado un nuevo Ciclo\",\"extra\":{\"user_id\":1,\"career_id\":81}}', '2021-04-16 21:50:50', '2021-04-16 21:50:50'),
(85, 1, 200, '{\"message\":\"Ha creado un nuevo Ciclo\",\"extra\":{\"user_id\":1,\"career_id\":82}}', '2021-04-16 21:50:51', '2021-04-16 21:50:51'),
(86, 1, 200, '{\"message\":\"Ha creado un nuevo Ciclo\",\"extra\":{\"user_id\":1,\"career_id\":83}}', '2021-04-16 21:50:51', '2021-04-16 21:50:51'),
(87, 1, 200, '{\"message\":\"Ha creado un nuevo Ciclo\",\"extra\":{\"user_id\":1,\"career_id\":84}}', '2021-04-16 21:50:51', '2021-04-16 21:50:51'),
(88, 1, 200, '{\"message\":\"Ha creado un nuevo Ciclo\",\"extra\":{\"user_id\":1,\"career_id\":85}}', '2021-04-16 21:50:51', '2021-04-16 21:50:51'),
(89, 1, 200, '{\"message\":\"Ha creado un nuevo Ciclo\",\"extra\":{\"user_id\":1,\"career_id\":86}}', '2021-04-16 21:50:51', '2021-04-16 21:50:51'),
(90, 1, 200, '{\"message\":\"Ha creado un nuevo Ciclo\",\"extra\":{\"user_id\":1,\"career_id\":87}}', '2021-04-16 21:50:51', '2021-04-16 21:50:51'),
(91, 1, 200, '{\"message\":\"Ha creado un nuevo Ciclo\",\"extra\":{\"user_id\":1,\"career_id\":88}}', '2021-04-16 21:50:51', '2021-04-16 21:50:51'),
(92, 1, 200, '{\"message\":\"Ha creado un nuevo Ciclo\",\"extra\":{\"user_id\":1,\"career_id\":89}}', '2021-04-16 21:50:51', '2021-04-16 21:50:51'),
(93, 1, 200, '{\"message\":\"Ha creado un nuevo Ciclo\",\"extra\":{\"user_id\":1,\"career_id\":90}}', '2021-04-16 21:50:51', '2021-04-16 21:50:51'),
(94, 1, 200, '{\"message\":\"Ha creado un nuevo Ciclo\",\"extra\":{\"user_id\":1,\"career_id\":91}}', '2021-04-16 21:50:51', '2021-04-16 21:50:51'),
(95, 1, 200, '{\"message\":\"Ha creado un nuevo Ciclo\",\"extra\":{\"user_id\":1,\"career_id\":92}}', '2021-04-16 21:50:51', '2021-04-16 21:50:51'),
(96, 1, 200, '{\"message\":\"Ha creado un nuevo Ciclo\",\"extra\":{\"user_id\":1,\"career_id\":93}}', '2021-04-16 21:50:51', '2021-04-16 21:50:51'),
(97, 1, 200, '{\"message\":\"Ha creado un nuevo Ciclo\",\"extra\":{\"user_id\":1,\"career_id\":94}}', '2021-04-16 21:50:51', '2021-04-16 21:50:51'),
(98, 1, 200, '{\"message\":\"Ha creado un nuevo Ciclo\",\"extra\":{\"user_id\":1,\"career_id\":95}}', '2021-04-16 21:50:51', '2021-04-16 21:50:51'),
(99, 1, 200, '{\"message\":\"Ha creado un nuevo Ciclo\",\"extra\":{\"user_id\":1,\"career_id\":96}}', '2021-04-16 21:50:51', '2021-04-16 21:50:51'),
(100, 1, 200, '{\"message\":\"Ha creado un nuevo Ciclo\",\"extra\":{\"user_id\":1,\"career_id\":97}}', '2021-04-16 21:50:51', '2021-04-16 21:50:51'),
(101, 1, 200, '{\"message\":\"Ha creado un nuevo Ciclo\",\"extra\":{\"user_id\":1,\"career_id\":98}}', '2021-04-16 21:50:51', '2021-04-16 21:50:51'),
(102, 1, 200, '{\"message\":\"Ha creado un nuevo Ciclo\",\"extra\":{\"user_id\":1,\"career_id\":99}}', '2021-04-16 21:50:51', '2021-04-16 21:50:51'),
(103, 1, 200, '{\"message\":\"Ha creado un nuevo Ciclo\",\"extra\":{\"user_id\":1,\"career_id\":100}}', '2021-04-16 21:50:51', '2021-04-16 21:50:51'),
(104, 1, 200, '{\"message\":\"Ha creado un nuevo Ciclo\",\"extra\":{\"user_id\":1,\"career_id\":101}}', '2021-04-16 21:50:51', '2021-04-16 21:50:51'),
(105, 1, 200, '{\"message\":\"Ha creado un nuevo Ciclo\",\"extra\":{\"user_id\":1,\"career_id\":102}}', '2021-04-16 21:50:51', '2021-04-16 21:50:51'),
(106, 1, 200, '{\"message\":\"Ha creado un nuevo Ciclo\",\"extra\":{\"user_id\":1,\"career_id\":103}}', '2021-04-16 21:50:51', '2021-04-16 21:50:51'),
(107, 1, 200, '{\"message\":\"Ha creado un nuevo Ciclo\",\"extra\":{\"user_id\":1,\"career_id\":104}}', '2021-04-16 21:50:51', '2021-04-16 21:50:51'),
(108, 1, 200, '{\"message\":\"Ha creado un nuevo Ciclo\",\"extra\":{\"user_id\":1,\"career_id\":105}}', '2021-04-16 21:50:51', '2021-04-16 21:50:51'),
(109, 1, 200, '{\"message\":\"Ha creado un nuevo Ciclo\",\"extra\":{\"user_id\":1,\"career_id\":106}}', '2021-04-16 21:50:51', '2021-04-16 21:50:51'),
(110, 1, 200, '{\"message\":\"Ha creado un nuevo Ciclo\",\"extra\":{\"user_id\":1,\"career_id\":107}}', '2021-04-16 21:50:51', '2021-04-16 21:50:51'),
(111, 1, 200, '{\"message\":\"Ha creado un nuevo Ciclo\",\"extra\":{\"user_id\":1,\"career_id\":108}}', '2021-04-16 21:50:51', '2021-04-16 21:50:51'),
(112, 1, 200, '{\"message\":\"Ha creado un nuevo Ciclo\",\"extra\":{\"user_id\":1,\"career_id\":109}}', '2021-04-16 21:50:51', '2021-04-16 21:50:51'),
(113, 1, 200, '{\"message\":\"Ha creado un nuevo Ciclo\",\"extra\":{\"user_id\":1,\"career_id\":110}}', '2021-04-16 21:50:51', '2021-04-16 21:50:51'),
(114, 1, 200, '{\"message\":\"Ha creado un nuevo Ciclo\",\"extra\":{\"user_id\":1,\"career_id\":111}}', '2021-04-16 21:50:51', '2021-04-16 21:50:51'),
(115, 1, 200, '{\"message\":\"Ha creado un nuevo Ciclo\",\"extra\":{\"user_id\":1,\"career_id\":112}}', '2021-04-16 21:50:51', '2021-04-16 21:50:51'),
(116, 1, 200, '{\"message\":\"Ha creado un nuevo Ciclo\",\"extra\":{\"user_id\":1,\"career_id\":113}}', '2021-04-16 21:50:51', '2021-04-16 21:50:51'),
(117, 1, 200, '{\"message\":\"Ha creado un nuevo Ciclo\",\"extra\":{\"user_id\":1,\"career_id\":114}}', '2021-04-16 21:50:51', '2021-04-16 21:50:51'),
(118, 1, 200, '{\"message\":\"Ha creado un nuevo Ciclo\",\"extra\":{\"user_id\":1,\"career_id\":115}}', '2021-04-16 21:50:51', '2021-04-16 21:50:51'),
(119, 1, 200, '{\"message\":\"Ha creado un nuevo Ciclo\",\"extra\":{\"user_id\":1,\"career_id\":116}}', '2021-04-16 21:50:51', '2021-04-16 21:50:51'),
(120, 1, 200, '{\"message\":\"Ha creado un nuevo Ciclo\",\"extra\":{\"user_id\":1,\"career_id\":117}}', '2021-04-16 21:50:51', '2021-04-16 21:50:51'),
(121, 1, 200, '{\"message\":\"Ha creado un nuevo Ciclo\",\"extra\":{\"user_id\":1,\"career_id\":118}}', '2021-04-16 21:50:51', '2021-04-16 21:50:51'),
(122, 1, 200, '{\"message\":\"Ha creado un nuevo Ciclo\",\"extra\":{\"user_id\":1,\"career_id\":119}}', '2021-04-16 21:50:51', '2021-04-16 21:50:51'),
(123, 1, 200, '{\"message\":\"Ha creado un nuevo Ciclo\",\"extra\":{\"user_id\":1,\"career_id\":120}}', '2021-04-16 21:50:51', '2021-04-16 21:50:51'),
(124, 1, 200, '{\"message\":\"Ha creado un nuevo Ciclo\",\"extra\":{\"user_id\":1,\"career_id\":121}}', '2021-04-16 21:50:51', '2021-04-16 21:50:51'),
(125, 1, 200, '{\"message\":\"Ha creado un nuevo Ciclo\",\"extra\":{\"user_id\":1,\"career_id\":122}}', '2021-04-16 21:50:51', '2021-04-16 21:50:51'),
(126, 1, 200, '{\"message\":\"Ha creado un nuevo Ciclo\",\"extra\":{\"user_id\":1,\"career_id\":123}}', '2021-04-16 21:50:51', '2021-04-16 21:50:51'),
(127, 1, 200, '{\"message\":\"Ha creado un nuevo Ciclo\",\"extra\":{\"user_id\":1,\"career_id\":124}}', '2021-04-16 21:50:51', '2021-04-16 21:50:51'),
(128, 1, 200, '{\"message\":\"Ha creado un nuevo Ciclo\",\"extra\":{\"user_id\":1,\"career_id\":125}}', '2021-04-16 21:50:51', '2021-04-16 21:50:51'),
(129, 1, 200, '{\"message\":\"Ha creado un nuevo Ciclo\",\"extra\":{\"user_id\":1,\"career_id\":126}}', '2021-04-16 21:50:51', '2021-04-16 21:50:51'),
(130, 1, 200, '{\"message\":\"Ha creado un nuevo Ciclo\",\"extra\":{\"user_id\":1,\"career_id\":127}}', '2021-04-16 21:50:51', '2021-04-16 21:50:51'),
(131, 1, 200, '{\"message\":\"Ha creado un nuevo Ciclo\",\"extra\":{\"user_id\":1,\"career_id\":128}}', '2021-04-16 21:50:51', '2021-04-16 21:50:51'),
(132, 1, 200, '{\"message\":\"Ha creado un nuevo Ciclo\",\"extra\":{\"user_id\":1,\"career_id\":129}}', '2021-04-16 21:50:51', '2021-04-16 21:50:51'),
(133, 1, 200, '{\"message\":\"Ha creado un nuevo Ciclo\",\"extra\":{\"user_id\":1,\"career_id\":130}}', '2021-04-16 21:50:51', '2021-04-16 21:50:51'),
(134, 1, 200, '{\"message\":\"Ha creado un nuevo Ciclo\",\"extra\":{\"user_id\":1,\"career_id\":131}}', '2021-04-16 21:50:51', '2021-04-16 21:50:51'),
(135, 1, 200, '{\"message\":\"Ha creado un nuevo Ciclo\",\"extra\":{\"user_id\":1,\"career_id\":132}}', '2021-04-16 21:50:51', '2021-04-16 21:50:51'),
(136, 1, 200, '{\"message\":\"Ha creado un nuevo Ciclo\",\"extra\":{\"user_id\":1,\"career_id\":133}}', '2021-04-16 21:50:51', '2021-04-16 21:50:51'),
(137, 1, 200, '{\"message\":\"Ha creado un nuevo Ciclo\",\"extra\":{\"user_id\":1,\"career_id\":134}}', '2021-04-16 21:50:51', '2021-04-16 21:50:51'),
(138, 1, 200, '{\"message\":\"Ha creado un nuevo Ciclo\",\"extra\":{\"user_id\":1,\"career_id\":135}}', '2021-04-16 21:50:51', '2021-04-16 21:50:51'),
(139, 1, 200, '{\"message\":\"Ha creado un nuevo Ciclo\",\"extra\":{\"user_id\":1,\"career_id\":136}}', '2021-04-16 21:50:51', '2021-04-16 21:50:51'),
(140, 1, 200, '{\"message\":\"Ha creado un nuevo Ciclo\",\"extra\":{\"user_id\":1,\"career_id\":137}}', '2021-04-16 21:50:51', '2021-04-16 21:50:51'),
(141, 1, 200, '{\"message\":\"Ha creado un nuevo Ciclo\",\"extra\":{\"user_id\":1,\"career_id\":138}}', '2021-04-16 21:50:51', '2021-04-16 21:50:51'),
(142, 1, 200, '{\"message\":\"Ha creado un nuevo Ciclo\",\"extra\":{\"user_id\":1,\"career_id\":139}}', '2021-04-16 21:50:51', '2021-04-16 21:50:51'),
(143, 1, 200, '{\"message\":\"Ha creado un nuevo Ciclo\",\"extra\":{\"user_id\":1,\"career_id\":140}}', '2021-04-16 21:50:51', '2021-04-16 21:50:51'),
(144, 1, 200, '{\"message\":\"Ha creado un nuevo Ciclo\",\"extra\":{\"user_id\":1,\"career_id\":141}}', '2021-04-16 21:50:51', '2021-04-16 21:50:51'),
(145, 1, 200, '{\"message\":\"Ha creado un nuevo Ciclo\",\"extra\":{\"user_id\":1,\"career_id\":142}}', '2021-04-16 21:50:51', '2021-04-16 21:50:51'),
(146, 1, 200, '{\"message\":\"Ha creado un nuevo Ciclo\",\"extra\":{\"user_id\":1,\"career_id\":143}}', '2021-04-16 21:50:51', '2021-04-16 21:50:51'),
(147, 1, 200, '{\"message\":\"Ha creado un nuevo Ciclo\",\"extra\":{\"user_id\":1,\"career_id\":144}}', '2021-04-16 21:50:51', '2021-04-16 21:50:51'),
(148, 1, 200, '{\"message\":\"Ha creado un nuevo Ciclo\",\"extra\":{\"user_id\":1,\"career_id\":145}}', '2021-04-16 21:50:51', '2021-04-16 21:50:51'),
(149, 1, 200, '{\"message\":\"Ha creado un nuevo Ciclo\",\"extra\":{\"user_id\":1,\"career_id\":146}}', '2021-04-16 21:50:51', '2021-04-16 21:50:51'),
(150, 1, 200, '{\"message\":\"Ha creado un nuevo Ciclo\",\"extra\":{\"user_id\":1,\"career_id\":147}}', '2021-04-16 21:50:51', '2021-04-16 21:50:51'),
(151, 1, 200, '{\"message\":\"Ha creado un nuevo Ciclo\",\"extra\":{\"user_id\":1,\"career_id\":148}}', '2021-04-16 21:50:51', '2021-04-16 21:50:51'),
(152, 1, 200, '{\"message\":\"Ha creado un nuevo Ciclo\",\"extra\":{\"user_id\":1,\"career_id\":149}}', '2021-04-16 21:50:51', '2021-04-16 21:50:51'),
(153, 1, 200, '{\"message\":\"Ha creado un nuevo Ciclo\",\"extra\":{\"user_id\":1,\"career_id\":150}}', '2021-04-16 21:50:51', '2021-04-16 21:50:51'),
(154, 1, 200, '{\"message\":\"Ha creado un nuevo Ciclo\",\"extra\":{\"user_id\":1,\"career_id\":151}}', '2021-04-16 21:50:51', '2021-04-16 21:50:51'),
(155, 1, 200, '{\"message\":\"Ha creado un nuevo Ciclo\",\"extra\":{\"user_id\":1,\"career_id\":152}}', '2021-04-16 21:50:51', '2021-04-16 21:50:51'),
(156, 1, 200, '{\"message\":\"Ha creado un nuevo Ciclo\",\"extra\":{\"user_id\":1,\"career_id\":153}}', '2021-04-16 21:50:51', '2021-04-16 21:50:51'),
(157, 1, 200, '{\"message\":\"Ha creado un nuevo Ciclo\",\"extra\":{\"user_id\":1,\"career_id\":154}}', '2021-04-16 21:50:51', '2021-04-16 21:50:51'),
(158, 1, 200, '{\"message\":\"Ha creado un nuevo Ciclo\",\"extra\":{\"user_id\":1,\"career_id\":155}}', '2021-04-16 21:50:51', '2021-04-16 21:50:51'),
(159, 1, 200, '{\"message\":\"Ha creado un nuevo Ciclo\",\"extra\":{\"user_id\":1,\"career_id\":156}}', '2021-04-16 21:50:51', '2021-04-16 21:50:51'),
(160, 1, 200, '{\"message\":\"Ha creado un nuevo Ciclo\",\"extra\":{\"user_id\":1,\"career_id\":157}}', '2021-04-16 21:50:51', '2021-04-16 21:50:51'),
(161, 1, 200, '{\"message\":\"Ha creado un nuevo Ciclo\",\"extra\":{\"user_id\":1,\"career_id\":158}}', '2021-04-16 21:50:51', '2021-04-16 21:50:51'),
(162, 1, 200, '{\"message\":\"Ha creado un nuevo Ciclo\",\"extra\":{\"user_id\":1,\"career_id\":159}}', '2021-04-16 21:50:51', '2021-04-16 21:50:51'),
(163, 1, 200, '{\"message\":\"Ha creado un nuevo Ciclo\",\"extra\":{\"user_id\":1,\"career_id\":160}}', '2021-04-16 21:50:51', '2021-04-16 21:50:51'),
(164, 1, 200, '{\"message\":\"Ha creado un nuevo Ciclo\",\"extra\":{\"user_id\":1,\"career_id\":161}}', '2021-04-16 21:50:51', '2021-04-16 21:50:51'),
(165, 1, 200, '{\"message\":\"Ha creado un nuevo Ciclo\",\"extra\":{\"user_id\":1,\"career_id\":162}}', '2021-04-16 21:50:51', '2021-04-16 21:50:51'),
(166, 1, 200, '{\"message\":\"Ha creado un nuevo Ciclo\",\"extra\":{\"user_id\":1,\"career_id\":163}}', '2021-04-16 21:50:51', '2021-04-16 21:50:51'),
(167, 1, 200, '{\"message\":\"Ha creado un nuevo Ciclo\",\"extra\":{\"user_id\":1,\"career_id\":164}}', '2021-04-16 21:50:51', '2021-04-16 21:50:51'),
(168, 1, 200, '{\"message\":\"Ha creado un nuevo Ciclo\",\"extra\":{\"user_id\":1,\"career_id\":165}}', '2021-04-16 21:50:51', '2021-04-16 21:50:51'),
(169, 1, 200, '{\"message\":\"Ha creado un nuevo Ciclo\",\"extra\":{\"user_id\":1,\"career_id\":166}}', '2021-04-16 21:50:51', '2021-04-16 21:50:51'),
(170, 1, 200, '{\"message\":\"Ha creado un nuevo Ciclo\",\"extra\":{\"user_id\":1,\"career_id\":167}}', '2021-04-16 21:50:51', '2021-04-16 21:50:51'),
(171, 1, 200, '{\"message\":\"Ha creado un nuevo Ciclo\",\"extra\":{\"user_id\":1,\"career_id\":168}}', '2021-04-16 21:50:51', '2021-04-16 21:50:51'),
(172, 1, 200, '{\"message\":\"Ha cerrado sesi\\u00f3n\",\"extra\":{\"user_id\":1}}', '2021-04-16 21:58:24', '2021-04-16 21:58:24'),
(173, 2, 200, '{\"message\":\"Ha iniciado sesi\\u00f3n\",\"extra\":{\"user_id\":2}}', '2021-04-16 21:58:32', '2021-04-16 21:58:32'),
(174, 2, 200, '{\"message\":\"Ha iniciado sesi\\u00f3n\",\"extra\":{\"user_id\":2}}', '2021-04-17 19:44:59', '2021-04-17 19:44:59');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_03_04_155132_db_tables', 1),
(5, '2021_03_15_151615_update_users_table', 1),
(6, '2021_04_08_172133_update_uf_table', 1),
(7, '2021_04_09_163657_update_enrolments', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mps`
--

CREATE TABLE `mps` (
  `id` bigint UNSIGNED NOT NULL,
  `career_id` bigint UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `mps`
--

INSERT INTO `mps` (`id`, `career_id`, `code`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 1, 'MP01', 'AAAAA', 'aaaaa', NULL, NULL),
(2, 1, 'MP02', 'bbbbbbb', 'bbbbbb', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profile_reqs`
--

CREATE TABLE `profile_reqs` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `records`
--

CREATE TABLE `records` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `uf_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `requirements`
--

CREATE TABLE `requirements` (
  `id` bigint UNSIGNED NOT NULL,
  `profile_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `req_enrols`
--

CREATE TABLE `req_enrols` (
  `id` bigint UNSIGNED NOT NULL,
  `req_id` bigint UNSIGNED NOT NULL,
  `enrolment_id` bigint UNSIGNED NOT NULL,
  `state` enum('registered','unregistered') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `terms`
--

CREATE TABLE `terms` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `terms`
--

INSERT INTO `terms` (`id`, `name`, `description`, `start`, `end`, `active`, `created_at`, `updated_at`) VALUES
(1, 'Curso 2020-2021', 'Example term', '2021-04-01', '2021-04-30', 1, '2021-04-16 21:49:40', '2021-04-16 21:49:40');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ufs`
--

CREATE TABLE `ufs` (
  `id` bigint UNSIGNED NOT NULL,
  `mp_id` bigint UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `ufs`
--

INSERT INTO `ufs` (`id`, `mp_id`, `code`, `name`, `description`, `created_at`, `updated_at`, `active`) VALUES
(1, 1, 'UF01', 'lolxd', 'sdfsdf', NULL, NULL, 1),
(2, 1, 'UF2', 'sdfdsfsdfsdfs', 'sdfsdffd', NULL, NULL, 1),
(3, 2, 'UF01', 'Ejemplo', 'sijdjsd', NULL, NULL, 1),
(4, 2, 'UF02', 'Artessss', 'ssd', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `uploads`
--

CREATE TABLE `uploads` (
  `id` bigint UNSIGNED NOT NULL,
  `data` blob,
  `req_enrol_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'alumne',
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `token`, `created_at`, `updated_at`, `role`, `firstname`, `lastname1`, `lastname2`) VALUES
(1, 'admin', 'admin@test.com', NULL, '$2y$10$T3Hktd3p/p4DfCm5N5Lahe64i7mY3MraMvT3Z1ZXVvaQmbcgcElHK', NULL, '240be518fabd2724ddb6f04eeb1da5967448d7e831c08c8fa822809f74c720a9', '2021-04-16 17:01:32', '2021-04-16 17:01:32', 'admin', 'admin', 'example1', 'example2'),
(2, 'test', 'test@test.com', NULL, '$2y$10$JIX5eqHywCh5sn9rNzvuKuZZJbzN6YvIlWtanh2EvkK1tTv936GNC', NULL, 'ecd71870d1963316a97e3ac3408c9835ad8cf0f3c1bc703527c30265534f75ae', '2021-04-16 17:01:40', '2021-04-16 17:01:40', 'alumne', 'test', 'example1', 'example2');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `careers`
--
ALTER TABLE `careers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `careers_term_id_foreign` (`term_id`);

--
-- Indices de la tabla `enrolments`
--
ALTER TABLE `enrolments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `enrolments_user_id_foreign` (`user_id`),
  ADD KEY `enrolments_term_id_foreign` (`term_id`),
  ADD KEY `enrolments_career_id_foreign` (`career_id`);

--
-- Indices de la tabla `enrolment_ufs`
--
ALTER TABLE `enrolment_ufs`
  ADD KEY `enrolment_ufs_uf_id_foreign` (`uf_id`),
  ADD KEY `enrolment_ufs_enrolment_id_foreign` (`enrolment_id`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `logs_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `mps`
--
ALTER TABLE `mps`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mps_career_id_foreign` (`career_id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `profile_reqs`
--
ALTER TABLE `profile_reqs`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `records`
--
ALTER TABLE `records`
  ADD PRIMARY KEY (`id`),
  ADD KEY `records_user_id_foreign` (`user_id`),
  ADD KEY `records_uf_id_foreign` (`uf_id`);

--
-- Indices de la tabla `requirements`
--
ALTER TABLE `requirements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `requirements_profile_id_foreign` (`profile_id`);

--
-- Indices de la tabla `req_enrols`
--
ALTER TABLE `req_enrols`
  ADD PRIMARY KEY (`id`),
  ADD KEY `req_enrols_req_id_foreign` (`req_id`),
  ADD KEY `req_enrols_enrolment_id_foreign` (`enrolment_id`);

--
-- Indices de la tabla `terms`
--
ALTER TABLE `terms`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ufs`
--
ALTER TABLE `ufs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ufs_mp_id_foreign` (`mp_id`);

--
-- Indices de la tabla `uploads`
--
ALTER TABLE `uploads`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uploads_req_enrol_id_foreign` (`req_enrol_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_token_unique` (`token`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `careers`
--
ALTER TABLE `careers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=169;

--
-- AUTO_INCREMENT de la tabla `enrolments`
--
ALTER TABLE `enrolments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `logs`
--
ALTER TABLE `logs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=175;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `mps`
--
ALTER TABLE `mps`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `profile_reqs`
--
ALTER TABLE `profile_reqs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `records`
--
ALTER TABLE `records`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `requirements`
--
ALTER TABLE `requirements`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `req_enrols`
--
ALTER TABLE `req_enrols`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `terms`
--
ALTER TABLE `terms`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `ufs`
--
ALTER TABLE `ufs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `uploads`
--
ALTER TABLE `uploads`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `careers`
--
ALTER TABLE `careers`
  ADD CONSTRAINT `careers_term_id_foreign` FOREIGN KEY (`term_id`) REFERENCES `terms` (`id`);

--
-- Filtros para la tabla `enrolments`
--
ALTER TABLE `enrolments`
  ADD CONSTRAINT `enrolments_career_id_foreign` FOREIGN KEY (`career_id`) REFERENCES `careers` (`id`),
  ADD CONSTRAINT `enrolments_term_id_foreign` FOREIGN KEY (`term_id`) REFERENCES `terms` (`id`),
  ADD CONSTRAINT `enrolments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `enrolment_ufs`
--
ALTER TABLE `enrolment_ufs`
  ADD CONSTRAINT `enrolment_ufs_enrolment_id_foreign` FOREIGN KEY (`enrolment_id`) REFERENCES `enrolments` (`id`),
  ADD CONSTRAINT `enrolment_ufs_uf_id_foreign` FOREIGN KEY (`uf_id`) REFERENCES `ufs` (`id`);

--
-- Filtros para la tabla `logs`
--
ALTER TABLE `logs`
  ADD CONSTRAINT `logs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `mps`
--
ALTER TABLE `mps`
  ADD CONSTRAINT `mps_career_id_foreign` FOREIGN KEY (`career_id`) REFERENCES `careers` (`id`);

--
-- Filtros para la tabla `records`
--
ALTER TABLE `records`
  ADD CONSTRAINT `records_uf_id_foreign` FOREIGN KEY (`uf_id`) REFERENCES `ufs` (`id`),
  ADD CONSTRAINT `records_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `requirements`
--
ALTER TABLE `requirements`
  ADD CONSTRAINT `requirements_profile_id_foreign` FOREIGN KEY (`profile_id`) REFERENCES `profile_reqs` (`id`);

--
-- Filtros para la tabla `req_enrols`
--
ALTER TABLE `req_enrols`
  ADD CONSTRAINT `req_enrols_enrolment_id_foreign` FOREIGN KEY (`enrolment_id`) REFERENCES `enrolments` (`id`),
  ADD CONSTRAINT `req_enrols_req_id_foreign` FOREIGN KEY (`req_id`) REFERENCES `requirements` (`id`);

--
-- Filtros para la tabla `ufs`
--
ALTER TABLE `ufs`
  ADD CONSTRAINT `ufs_mp_id_foreign` FOREIGN KEY (`mp_id`) REFERENCES `mps` (`id`);

--
-- Filtros para la tabla `uploads`
--
ALTER TABLE `uploads`
  ADD CONSTRAINT `uploads_req_enrol_id_foreign` FOREIGN KEY (`req_enrol_id`) REFERENCES `req_enrols` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
