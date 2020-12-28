-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.4.11-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             11.0.0.5919
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para ibero
CREATE DATABASE IF NOT EXISTS `ibero` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `ibero`;

-- Volcando estructura para tabla ibero.catg_asignacion
CREATE TABLE IF NOT EXISTS `catg_asignacion` (
  `id` int(11) NOT NULL,
  `idAsignatura` int(11) NOT NULL,
  `idDocente` int(11) NOT NULL,
  `Estatus` int(11) NOT NULL,
  `Eliminado` int(11) NOT NULL DEFAULT 0,
  `fecha_cierre` date DEFAULT NULL,
  `fecha_actualizacion` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `idAsignatura_index` (`idAsignatura`),
  KEY `idDocente_index` (`idDocente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla ibero.catg_asignacion: ~18 rows (aproximadamente)
/*!40000 ALTER TABLE `catg_asignacion` DISABLE KEYS */;
INSERT INTO `catg_asignacion` (`id`, `idAsignatura`, `idDocente`, `Estatus`, `Eliminado`, `fecha_cierre`, `fecha_actualizacion`) VALUES
	(1, 1, 1, 0, 0, '2019-11-17', '2020-03-20 11:55:25'),
	(2, 2, 2, 0, 0, '2019-01-11', '2020-03-20 11:55:27'),
	(3, 63, 3, 0, 0, '2019-02-26', '2020-03-20 11:56:03'),
	(4, 4, 4, 0, 0, '2019-04-13', '2020-03-20 11:55:29'),
	(5, 5, 5, 0, 0, '2019-07-13', '2020-03-20 11:55:32'),
	(6, 7, 5, 0, 0, '2019-06-01', '2020-03-20 11:55:33'),
	(7, 9, 8, 0, 0, '2019-11-22', '2020-03-20 11:55:37'),
	(8, 10, 7, 0, 0, '2019-10-04', '2020-03-20 11:55:39'),
	(9, 11, 6, 0, 0, '2019-08-23', '2020-03-20 11:55:44'),
	(10, 16, 10, 0, 0, '2019-11-17', '2020-03-20 11:55:47'),
	(11, 17, 1, 0, 0, '2019-01-11', '2020-03-20 11:55:49'),
	(12, 18, 4, 0, 0, '2019-01-12', '2020-03-20 11:55:51'),
	(13, 19, 11, 0, 0, '2019-05-25', '2020-03-20 11:55:53'),
	(14, 22, 12, 0, 0, '2019-08-23', '2020-03-20 11:55:58'),
	(15, 23, 4, 0, 0, '2019-10-04', '2020-03-20 11:56:00'),
	(16, 24, 13, 0, 0, '2019-11-22', '2020-03-20 11:56:01'),
	(17, 20, 5, 0, 0, '2019-08-17', '2020-03-20 11:55:54'),
	(18, 21, 5, 0, 0, '2019-07-06', '2020-03-20 11:55:56');
/*!40000 ALTER TABLE `catg_asignacion` ENABLE KEYS */;

-- Volcando estructura para tabla ibero.catg_asignacion_docente
CREATE TABLE IF NOT EXISTS `catg_asignacion_docente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idGrupo` int(11) NOT NULL,
  `idAsignatura` int(11) NOT NULL,
  `idDocente` int(11) NOT NULL,
  `ProgramaEstudio` varchar(200) NOT NULL DEFAULT '',
  `Estatus` int(11) NOT NULL DEFAULT 0,
  `Eliminado` int(11) NOT NULL DEFAULT 0,
  `fecha_cierre` date DEFAULT NULL,
  `fecha_actualizacion` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`) USING BTREE,
  KEY `idAsignatura_index` (`idAsignatura`) USING BTREE,
  KEY `idDocente_index` (`idDocente`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- Volcando datos para la tabla ibero.catg_asignacion_docente: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `catg_asignacion_docente` DISABLE KEYS */;
INSERT INTO `catg_asignacion_docente` (`id`, `idGrupo`, `idAsignatura`, `idDocente`, `ProgramaEstudio`, `Estatus`, `Eliminado`, `fecha_cierre`, `fecha_actualizacion`) VALUES
	(1, 1, 1, 1, 'BDIbero.xlsx', 1, 0, NULL, '2020-04-14 02:07:43'),
	(2, 1, 2, 5, 'BDIbero.xlsx', 1, 0, NULL, '2020-04-17 14:06:55'),
	(3, 4, 47, 5, 'bd.sql', 1, 0, NULL, '2020-04-20 01:56:04');
/*!40000 ALTER TABLE `catg_asignacion_docente` ENABLE KEYS */;

-- Volcando estructura para tabla ibero.catg_asignatura
CREATE TABLE IF NOT EXISTS `catg_asignatura` (
  `idMateria` int(11) NOT NULL AUTO_INCREMENT,
  `idPosgrado` int(11) DEFAULT NULL,
  `Materia` varchar(255) DEFAULT NULL,
  `ProgramaEstudio` varchar(255) DEFAULT NULL,
  `Estatus` int(11) DEFAULT NULL,
  `Eliminado` int(11) DEFAULT NULL,
  PRIMARY KEY (`idMateria`)
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla ibero.catg_asignatura: ~63 rows (aproximadamente)
/*!40000 ALTER TABLE `catg_asignatura` DISABLE KEYS */;
INSERT INTO `catg_asignatura` (`idMateria`, `idPosgrado`, `Materia`, `ProgramaEstudio`, `Estatus`, `Eliminado`) VALUES
	(1, 1, 'Fundamentos de los Derechos Humanos y de Metodología de la Investigación', NULL, 0, 0),
	(2, 1, 'Filosofía del Derecho', NULL, 0, 0),
	(3, 1, 'Teoría de los Derechos Fundamentales', NULL, 0, 0),
	(4, 1, 'Historia del Constitucionalismo y Fundamentos de Metodología de la Investigación Jurídica', NULL, 0, 0),
	(5, 1, 'Teoría Constitucional, Derecho Constitucional y Derecho Procesal Constitucional', NULL, 0, 0),
	(6, 1, 'La Interpretación Constitucional y la Argumentación Jurídica', NULL, 0, 0),
	(7, 1, 'El Derecho Internacional de los Derechos Humanos y su Protección Universal', NULL, 0, 0),
	(8, 1, 'La Protección Jurisdiccional de los Derechos Humanos', NULL, 0, 0),
	(9, 1, 'Seminario sobre Temas Selectos de Derechos Humanos', NULL, 0, 0),
	(10, 1, 'La Justicia Constitucional, el Estado de Derecho y el Papel del Juez en el Estado Constitucional', NULL, 0, 0),
	(11, 1, 'Los Sistemas de Control Constitucional y sus Medios Jurisdiccionales', NULL, 0, 0),
	(12, 1, 'Seminario sobre Temas Selectos de Derecho Constitucional', NULL, 0, 0),
	(13, 1, 'Derecho Probatorio y su Aplicación en la Justicia Constitucional', NULL, 0, 0),
	(14, 1, 'Seminario de Estrategías para la Elaboración de Sentencias y Medios de Impugnación', NULL, 0, 0),
	(15, 1, 'Metodología de la Investigación y Seminario de Titulación', NULL, 0, 0),
	(16, 2, 'Fundamentos de Ciencia Política y de Metodología de la Investigación', NULL, 0, 0),
	(17, 2, 'Democracia, Estado De Derecho, Gobernanza y Representación Política', NULL, 0, 0),
	(18, 2, 'Sistemas Electorales y Partidos Políticos', NULL, 0, 0),
	(19, 2, 'Fundamentos de Derecho Electoral y de Metodología de la Investigación Jurídica', NULL, 0, 0),
	(20, 2, 'Teoría Constitucional, Derecho Constitucional y Derecho Procesal Constitucional', NULL, 0, 0),
	(21, 2, 'El Derecho Internacional de los Derechos Humanos y su Protección Universal', NULL, 0, 0),
	(22, 2, 'Las Elecciones y su Organización, sus Etapas, los Órganos Electorales y sus Funciones', NULL, 0, 0),
	(23, 2, 'La Función Jurisdiccional, los Medios de Impugnación y la Práctica Forense en Materia Electoral', NULL, 0, 0),
	(24, 2, 'Los Procedimientos Administrativos Sancionadores en Materia Electoral, el Modelo de Financiamiento y Fiscalización Electoral y los Delitos contra la Democracia', NULL, 0, 0),
	(25, 2, 'Derecho Probatorio y su Aplicación en la Justicia Constitucional', NULL, 0, 0),
	(26, 2, 'La Interpretación Constitucional y la Argumentación Jurídica', NULL, 0, 0),
	(27, 2, 'Seminario sobre Temas Selectos de Derecho Electoral', NULL, 0, 0),
	(28, 2, 'Seminario de Comunicación, Marketing Político y Redes Sociales', NULL, 0, 0),
	(29, 2, 'Seminario de Estrategias para la Elaboración de Sentencias y Medios de Impugnación', NULL, 0, 0),
	(30, 2, 'Metodología de la Investigación y Seminario de Titulación', NULL, 0, 0),
	(31, 3, 'Historia de los Derechos Humanos', NULL, 0, 0),
	(32, 3, 'Historia del Derecho, Teoría del Derecho y Filosofía del Derecho', NULL, 0, 0),
	(33, 3, 'Teoría General de los Derechos Fundamentales y los Sistemas Continentales establecidos para su protección', NULL, 0, 0),
	(34, 3, 'Seminario de Metodología de la Investigación. Técnicas Cualitativas', NULL, 0, 0),
	(35, 3, 'Historia del Constitucionalismo, Teoría de la Constitución y Derecho Constitucional', NULL, 0, 0),
	(36, 3, 'Teoría General del Derecho Procesal Constitucional y Teoría General de la Prueba en la Justicia Constitucional', NULL, 0, 0),
	(37, 3, 'La Interpretación Constitucional y la Argumentación Jurídica', NULL, 0, 0),
	(38, 3, 'Seminario de Metodologia de la Investigación. Técnicas Cuantitativas', NULL, 0, 0),
	(39, 3, 'El Sistema Internacional de los Derechos Humanos', NULL, 0, 0),
	(40, 3, 'La Protección Internacional de los Derechos Humanos', NULL, 0, 0),
	(41, 3, 'Seminario Sobre Temas Selectos de los Derechos Humanos', NULL, 0, 0),
	(42, 3, 'Seminario de Metodología de la Investigación. Uso y Aplicación de Modelos Estratégicos para el Empleo de Sistemas Mixtos de Investigación', NULL, 0, 0),
	(43, 3, 'La Justicia Constitucional, los Sistemas de Control Constitucional y sus Medios Jurisdiccionales', NULL, 0, 0),
	(44, 3, 'Tribunales Constitucionales, Cortes Supremas de Justicia, Judicialización de la Política y Politización de la Justicia', NULL, 0, 0),
	(45, 3, 'Seminario sobre Temas Selectos de Derecho Constitucional', NULL, 0, 0),
	(46, 3, 'Seminario de Metodología de la Investigación. Disertación Doctoral y Titulación', NULL, 0, 0),
	(47, 4, 'Historia y Filosofía Política', NULL, 0, 0),
	(48, 4, 'Teoría de la Democracia, Estado de Derecho y Buen Gobierno', NULL, 0, 0),
	(49, 4, 'Sistemas Políticos, Sistemas Electorales y Sistemas de Partidos Políticos en las Democracias Contemporáneas', NULL, 0, 0),
	(50, 4, 'Seminario de Metodología de la Investigación. Técnicas Cualitativas', NULL, 0, 0),
	(51, 4, 'Historia del Derecho, Teoría del Derecho y Filosofía del Derecho', NULL, 0, 0),
	(52, 4, 'Historia del Constitucionalismo, Teoría de la Constitución y Derecho Constitucional', NULL, 0, 0),
	(53, 4, 'Teoría General de los Derechos Fundamentales y los Sistemas Continentales establecidos para su protección', NULL, 0, 0),
	(54, 4, 'Seminario de Metodologia de la Investigación. Técnicas Cuantitativas', NULL, 0, 0),
	(55, 4, 'La Democracia Electoral, sus instituciones, sus fines y funciones, sus etapas y sus multiples implicaciones', NULL, 0, 0),
	(56, 4, 'La Justicia Electoral y su Sistema de Medios de Impugnación', NULL, 0, 0),
	(57, 4, 'El Régimen Administrativo Sancionador Electoral, el Sistema de Nulidades y los Delitos contra la Democracia', NULL, 0, 0),
	(58, 4, 'Seminario de Metodología de la Investigación. Uso y Aplicación de Modelos Estratégicos para el Empleo de Sistemas Mixtos de Investigación', NULL, 0, 0),
	(59, 4, 'Teoría General del Derecho Procesal Constitucional y Teoría General de la Prueba en la Justicia Constitucional', NULL, 0, 0),
	(60, 4, 'La Interpretación Constitucional y la Argumentación Jurídica', NULL, 0, 0),
	(61, 4, 'Seminario sobre Temas Selectos de Derecho Electoral', NULL, 0, 0),
	(62, 4, 'Seminario de Metodología de la Investigación. Disertación Doctoral y Titulación', NULL, 0, 0),
	(63, 1, 'Fundamentos de los Derechos Fundamentales', NULL, 0, 1);
/*!40000 ALTER TABLE `catg_asignatura` ENABLE KEYS */;

-- Volcando estructura para tabla ibero.catg_calificaciones
CREATE TABLE IF NOT EXISTS `catg_calificaciones` (
  `idCalificacion` int(11) NOT NULL,
  `idAsignatura` int(11) NOT NULL,
  `idAlumno` int(11) NOT NULL,
  `idDocente` int(11) NOT NULL,
  `Docente` varchar(45) DEFAULT NULL,
  `Alumno` varchar(45) DEFAULT NULL,
  `Calificacion` varchar(5) DEFAULT NULL,
  `Eliminado` int(11) DEFAULT 0,
  `fecha_cierre` date DEFAULT NULL,
  `fecha_actualizacion` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`idCalificacion`),
  KEY `idAsignatura_index` (`idAsignatura`),
  KEY `idAlumno_index` (`idAlumno`),
  KEY `idDocente_index` (`idDocente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla ibero.catg_calificaciones: ~395 rows (aproximadamente)
/*!40000 ALTER TABLE `catg_calificaciones` DISABLE KEYS */;
INSERT INTO `catg_calificaciones` (`idCalificacion`, `idAsignatura`, `idAlumno`, `idDocente`, `Docente`, `Alumno`, `Calificacion`, `Eliminado`, `fecha_cierre`, `fecha_actualizacion`) VALUES
	(1, 1, 1, 1, 'José Vicente Loredo Méndez ', 'Arias Ku Norberto', '9', 0, '2019-11-17', '2020-03-12 20:36:39'),
	(2, 1, 4, 1, 'José Vicente Loredo Méndez ', 'Argaiz Gutiérrez Azalea', 'NP', 0, '2019-11-17', '2020-03-12 20:36:39'),
	(3, 1, 2, 1, 'José Vicente Loredo Méndez ', 'Arias Flores Alan Gerardo', 'NP', 0, '2019-11-17', '2020-03-23 00:13:30'),
	(4, 1, 6, 1, 'José Vicente Loredo Méndez ', 'Correa Flores Alfonso', '9', 0, '2019-11-17', '2020-03-12 20:36:39'),
	(5, 1, 9, 1, 'José Vicente Loredo Méndez ', 'García Alvarado Eliaquín', '9', 0, '2019-11-17', '2020-03-12 20:36:39'),
	(6, 1, 11, 1, 'José Vicente Loredo Méndez ', 'López Canabal Felipe Ramón', '9', 0, '2019-11-17', '2020-03-12 20:36:39'),
	(7, 1, 17, 1, 'José Vicente Loredo Méndez ', 'Rosas Díaz Luis Enrique', '8', 0, '2019-11-17', '2020-03-12 20:36:39'),
	(8, 2, 1, 2, 'Julio Eduardo Ramos Talavera', 'Arias Ku Norberto', '10', 0, '2019-01-11', '2020-03-12 20:36:39'),
	(9, 2, 4, 2, 'Julio Eduardo Ramos Talavera', 'Argaiz Gutiérrez Azalea', '9', 0, '2019-01-11', '2020-03-12 20:36:39'),
	(10, 2, 2, 2, 'Julio Eduardo Ramos Talavera', 'Arias Flores Alan Gerardo', 'NP', 0, '2019-01-11', '2020-03-12 20:36:39'),
	(11, 2, 6, 2, 'Julio Eduardo Ramos Talavera', 'Correa Flores Alfonso', '9', 0, '2019-01-11', '2020-03-12 20:36:39'),
	(12, 2, 9, 2, 'Julio Eduardo Ramos Talavera', 'García Alvarado Eliaquín', '10', 0, '2019-01-11', '2020-03-12 20:36:39'),
	(13, 2, 11, 2, 'Julio Eduardo Ramos Talavera', 'López Canabal Felipe Ramón', '9', 0, '2019-01-11', '2020-03-12 20:36:39'),
	(14, 2, 17, 2, 'Julio Eduardo Ramos Talavera', 'Rosas Díaz Luis Enrique', '9', 0, '2019-01-11', '2020-03-12 20:36:39'),
	(15, 63, 1, 3, 'Lorena Pichardo Flores', 'Arias Ku Norberto', '10', 0, '2019-02-26', '2020-03-12 20:36:39'),
	(16, 63, 4, 3, 'Lorena Pichardo Flores', 'Argaiz Gutiérrez Azalea', '10', 0, '2019-02-26', '2020-03-12 20:36:39'),
	(17, 63, 2, 3, 'Lorena Pichardo Flores', 'Arias Flores Alan Gerardo', 'NP', 0, '2019-02-26', '2020-03-12 20:36:39'),
	(18, 63, 6, 3, 'Lorena Pichardo Flores', 'Correa Flores Alfonso', '10', 0, '2019-02-26', '2020-03-12 20:36:39'),
	(19, 63, 9, 3, 'Lorena Pichardo Flores', 'García Alvarado Eliaquín', '10', 0, '2019-02-26', '2020-03-12 20:36:39'),
	(20, 63, 11, 3, 'Lorena Pichardo Flores', 'López Canabal Felipe Ramón', '10', 0, '2019-02-26', '2020-03-12 20:36:39'),
	(21, 63, 17, 3, 'Lorena Pichardo Flores', 'Rosas Díaz Luis Enrique', '10', 0, '2019-02-26', '2020-03-12 20:36:39'),
	(22, 4, 1, 4, 'Oswald Lara Borges', 'Arias Ku Norberto', '10', 0, '2019-04-13', '2020-03-12 20:36:39'),
	(23, 4, 4, 4, 'Oswald Lara Borges', 'Argaiz Gutiérrez Azalea', '10', 0, '2019-04-13', '2020-03-12 20:36:39'),
	(24, 4, 7, 4, 'Oswald Lara Borges', 'Corona Espinosa Mauricio', '10', 0, '2019-04-13', '2020-03-12 20:36:39'),
	(25, 4, 6, 4, 'Oswald Lara Borges', 'Correa Flores Alfonso', 'NP', 0, '2019-04-13', '2020-03-12 20:36:39'),
	(26, 4, 9, 4, 'Oswald Lara Borges', 'García Alvarado Eliaquín', '10', 0, '2019-04-13', '2020-03-12 20:36:39'),
	(27, 4, 11, 4, 'Oswald Lara Borges', 'López Canabal Felipe Ramón', '10', 0, '2019-04-13', '2020-03-12 20:36:39'),
	(28, 4, 17, 4, 'Oswald Lara Borges', 'Rosas Díaz Luis Enrique', '10', 0, '2019-04-13', '2020-03-12 20:36:39'),
	(29, 5, 1, 5, 'Juan Rodrigo Labardini Flores', 'Arias Ku Norberto', '10', 0, '2019-07-13', '2020-03-12 20:36:39'),
	(30, 5, 4, 5, 'Juan Rodrigo Labardini Flores', 'Argaiz Gutiérrez Azalea', '9', 0, '2019-07-13', '2020-03-12 20:36:39'),
	(31, 5, 7, 5, 'Juan Rodrigo Labardini Flores', 'Corona Espinosa Mauricio', '10', 0, '2019-07-13', '2020-03-12 20:36:39'),
	(32, 5, 6, 5, 'Juan Rodrigo Labardini Flores', 'Correa Flores Alfonso', '9', 0, '2019-07-13', '2020-03-12 20:36:39'),
	(33, 5, 8, 5, 'Juan Rodrigo Labardini Flores', 'Estrada Murillo José Antonio', '10', 0, '2019-07-13', '2020-03-12 20:36:39'),
	(34, 5, 9, 5, 'Juan Rodrigo Labardini Flores', 'García Alvarado Eliaquín', '10', 0, '2019-07-13', '2020-03-12 20:36:39'),
	(35, 5, 11, 5, 'Juan Rodrigo Labardini Flores', 'López Canabal Felipe Ramón', '9', 0, '2019-07-13', '2020-03-12 20:36:39'),
	(36, 5, 13, 5, 'Juan Rodrigo Labardini Flores', 'Miranda Ortega Mérida Mayra', '9', 0, '2019-07-13', '2020-03-12 20:36:39'),
	(37, 5, 14, 5, 'Juan Rodrigo Labardini Flores', 'Peña Flores Ahída Rubí', '9', 0, '2019-07-13', '2020-03-12 20:36:39'),
	(38, 5, 17, 5, 'Juan Rodrigo Labardini Flores', 'Rosas Díaz Luis Enrique', '10', 0, '2019-07-13', '2020-03-12 20:36:39'),
	(39, 5, 16, 5, 'Juan Rodrigo Labardini Flores', 'Rojas Rivera María Antonieta', '9', 0, '2019-07-13', '2020-03-12 20:36:39'),
	(40, 7, 1, 5, 'Juan Rodrigo Labardini Flores', 'Arias Ku Norberto', '10', 0, '2019-06-01', '2020-03-12 20:36:39'),
	(41, 7, 4, 5, 'Juan Rodrigo Labardini Flores', 'Argaiz Gutiérrez Azalea', '9', 0, '2019-06-01', '2020-03-12 20:36:39'),
	(42, 7, 7, 5, 'Juan Rodrigo Labardini Flores', 'Corona Espinosa Mauricio', '9', 0, '2019-06-01', '2020-03-12 20:36:39'),
	(43, 7, 6, 5, 'Juan Rodrigo Labardini Flores', 'Correa Flores Alfonso', '9', 0, '2019-06-01', '2020-03-12 20:36:39'),
	(44, 7, 8, 5, 'Juan Rodrigo Labardini Flores', 'Estrada Murillo José Antonio', '9', 0, '2019-06-01', '2020-03-12 20:36:39'),
	(45, 7, 9, 5, 'Juan Rodrigo Labardini Flores', 'García Alvarado Eliaquín', '10', 0, '2019-06-01', '2020-03-12 20:36:39'),
	(46, 7, 11, 5, 'Juan Rodrigo Labardini Flores', 'López Canabal Felipe Ramón', '9', 0, '2019-06-01', '2020-03-12 20:36:39'),
	(47, 7, 17, 5, 'Juan Rodrigo Labardini Flores', 'Rosas Díaz Luis Enrique', '10', 0, '2019-06-01', '2020-03-12 20:36:39'),
	(48, 7, 16, 5, 'Juan Rodrigo Labardini Flores', 'Rojas Rivera María Antonieta', '10', 0, '2019-06-01', '2020-03-12 20:36:39'),
	(49, 9, 1, 8, 'Alberto Hernández Villa', 'Arias Ku Norberto', '9', 0, '2019-11-22', '2020-03-12 20:36:39'),
	(50, 9, 4, 8, 'Alberto Hernández Villa', 'Argaiz Gutiérrez Azalea', '8', 0, '2019-11-22', '2020-03-12 20:36:39'),
	(51, 9, 5, 8, 'Alberto Hernández Villa', 'Castilla de Alba Manuel', '10', 0, '2019-11-22', '2020-03-12 20:36:39'),
	(52, 9, 6, 8, 'Alberto Hernández Villa', 'Correa Flores Alfonso', '8', 0, '2019-11-22', '2020-03-12 20:36:39'),
	(53, 9, 7, 8, 'Alberto Hernández Villa', 'Corona Espinosa Mauricio', '8', 0, '2019-11-22', '2020-03-12 20:36:39'),
	(54, 9, 8, 8, 'Alberto Hernández Villa', 'Estrada Murillo José Antonio', '8', 0, '2019-11-22', '2020-03-12 20:36:39'),
	(55, 9, 9, 8, 'Alberto Hernández Villa', 'García Alvarado Eliaquín', '9', 0, '2019-11-22', '2020-03-12 20:36:39'),
	(56, 9, 10, 8, 'Alberto Hernández Villa', 'Gutu Jiménez Fabiola del Carmen', '8', 0, '2019-11-22', '2020-03-12 20:36:39'),
	(57, 9, 11, 8, 'Alberto Hernández Villa', 'López Canabal Felipe Ramón', '8', 0, '2019-11-22', '2020-03-12 20:36:39'),
	(58, 9, 12, 8, 'Alberto Hernández Villa', 'Miguel Gutiérrez Isidro', '8', 0, '2019-11-22', '2020-03-12 20:36:39'),
	(59, 9, 13, 8, 'Alberto Hernández Villa', 'Miranda Ortega Mérida Mayra', '9', 0, '2019-11-22', '2020-03-12 20:36:39'),
	(60, 9, 14, 8, 'Alberto Hernández Villa', 'Peña Flores Ahída Rubí', '8', 0, '2019-11-22', '2020-03-12 20:36:39'),
	(61, 9, 15, 8, 'Alberto Hernández Villa', 'Rodríguez Luna Rogelio', '8', 0, '2019-11-22', '2020-03-12 20:36:39'),
	(62, 9, 16, 8, 'Alberto Hernández Villa', 'Rojas Rivera María Antonieta', '8', 0, '2019-11-22', '2020-03-12 20:36:39'),
	(63, 9, 17, 8, 'Alberto Hernández Villa', 'Rosas Díaz Luis Enrique', '8', 0, '2019-11-22', '2020-03-12 20:36:39'),
	(64, 9, 19, 8, 'Alberto Hernández Villa', 'Ventura Frías Luis Javier', '8', 0, '2019-11-22', '2020-03-12 20:36:39'),
	(65, 10, 1, 7, 'Javier Palacios Xochipa', 'Arias Ku Norberto', '10', 0, '2019-10-04', '2020-03-12 20:36:39'),
	(66, 10, 4, 7, 'Javier Palacios Xochipa', 'Argaiz Gutiérrez Azalea', 'NP', 0, '2019-10-04', '2020-03-12 20:36:39'),
	(67, 10, 5, 7, 'Javier Palacios Xochipa', 'Castilla de Alba Manuel', '9', 0, '2019-10-04', '2020-03-12 20:36:39'),
	(68, 10, 6, 7, 'Javier Palacios Xochipa', 'Correa Flores Alfonso', '10', 0, '2019-10-04', '2020-03-12 20:36:39'),
	(69, 10, 7, 7, 'Javier Palacios Xochipa', 'Corona Espinosa Mauricio', '10', 0, '2019-10-04', '2020-03-12 20:36:39'),
	(70, 10, 8, 7, 'Javier Palacios Xochipa', 'Estrada Murillo José Antonio', '9', 0, '2019-10-04', '2020-03-12 20:36:39'),
	(71, 10, 9, 7, 'Javier Palacios Xochipa', 'García Alvarado Eliaquín', '10', 0, '2019-10-04', '2020-03-12 20:36:39'),
	(72, 10, 10, 7, 'Javier Palacios Xochipa', 'Gutu Jiménez Fabiola del Carmen', '8', 0, '2019-10-04', '2020-03-12 20:36:39'),
	(73, 10, 11, 7, 'Javier Palacios Xochipa', 'López Canabal Felipe Ramón', '9', 0, '2019-10-04', '2020-03-12 20:36:39'),
	(74, 10, 12, 7, 'Javier Palacios Xochipa', 'Miguel Gutiérrez Isidro', '9', 0, '2019-10-04', '2020-03-12 20:36:39'),
	(75, 10, 13, 7, 'Javier Palacios Xochipa', 'Miranda Ortega Mérida Mayra', '9', 0, '2019-10-04', '2020-03-12 20:36:39'),
	(76, 10, 14, 7, 'Javier Palacios Xochipa', 'Peña Flores Ahída Rubí', '10', 0, '2019-10-04', '2020-03-12 20:36:39'),
	(77, 10, 15, 7, 'Javier Palacios Xochipa', 'Rodríguez Luna Rogelio', '10', 0, '2019-10-04', '2020-03-12 20:36:39'),
	(78, 10, 16, 7, 'Javier Palacios Xochipa', 'Rojas Rivera María Antonieta', 'NP', 0, '2019-10-04', '2020-03-12 20:36:39'),
	(79, 10, 17, 7, 'Javier Palacios Xochipa', 'Rosas Díaz Luis Enrique', '8', 0, '2019-10-04', '2020-03-12 20:36:39'),
	(80, 10, 19, 7, 'Javier Palacios Xochipa', 'Ventura Frías Luis Javier', 'NP', 0, '2019-10-04', '2020-03-12 20:36:39'),
	(81, 11, 1, 6, 'Francisco Mixcoátl Antonio', 'Arias Ku Norberto', '8', 0, '2019-08-23', '2020-03-12 20:36:39'),
	(82, 11, 4, 6, 'Francisco Mixcoátl Antonio', 'Argaiz Gutiérrez Azalea', '8', 0, '2019-08-23', '2020-03-12 20:36:39'),
	(83, 11, 5, 6, 'Francisco Mixcoátl Antonio', 'Castilla de Alba Manuel', '10', 0, '2019-08-23', '2020-03-12 20:36:39'),
	(84, 11, 6, 6, 'Francisco Mixcoátl Antonio', 'Correa Flores Alfonso', '8', 0, '2019-08-23', '2020-03-12 20:36:39'),
	(85, 11, 7, 6, 'Francisco Mixcoátl Antonio', 'Corona Espinosa Mauricio', '8', 0, '2019-08-23', '2020-03-12 20:36:39'),
	(86, 11, 8, 6, 'Francisco Mixcoátl Antonio', 'Estrada Murillo José Antonio', '9', 0, '2019-08-23', '2020-03-12 20:36:39'),
	(87, 11, 9, 6, 'Francisco Mixcoátl Antonio', 'García Alvarado Eliaquín', '9', 0, '2019-08-23', '2020-03-12 20:36:39'),
	(88, 11, 10, 6, 'Francisco Mixcoátl Antonio', 'Gutu Jiménez Fabiola del Carmen', '8', 0, '2019-08-23', '2020-03-12 20:36:39'),
	(89, 11, 11, 6, 'Francisco Mixcoátl Antonio', 'López Canabal Felipe Ramón', '8', 0, '2019-08-23', '2020-03-12 20:36:39'),
	(90, 11, 12, 6, 'Francisco Mixcoátl Antonio', 'Miguel Gutiérrez Isidro', '8', 0, '2019-08-23', '2020-03-12 20:36:39'),
	(91, 11, 13, 6, 'Francisco Mixcoátl Antonio', 'Miranda Ortega Mérida Mayra', '8', 0, '2019-08-23', '2020-03-12 20:36:39'),
	(92, 11, 14, 6, 'Francisco Mixcoátl Antonio', 'Peña Flores Ahída Rubí', '9', 0, '2019-08-23', '2020-03-12 20:36:39'),
	(93, 11, 15, 6, 'Francisco Mixcoátl Antonio', 'Rodríguez Luna Rogelio', '9', 0, '2019-08-23', '2020-03-12 20:36:39'),
	(94, 11, 16, 6, 'Francisco Mixcoátl Antonio', 'Rojas Rivera María Antonieta', '8', 0, '2019-08-23', '2020-03-12 20:36:39'),
	(95, 11, 17, 6, 'Francisco Mixcoátl Antonio', 'Rosas Díaz Luis Enrique', '10', 0, '2019-08-23', '2020-03-12 20:36:39'),
	(96, 11, 19, 6, 'Francisco Mixcoátl Antonio', 'Ventura Frías Luis Javier', '9', 0, '2019-08-23', '2020-03-12 20:36:39'),
	(97, 16, 25, 10, 'Tonatiuh Anzures Escandón', 'Cabrera Gómez Diana Laura', '8', 0, '2019-11-17', '2020-03-12 20:36:39'),
	(98, 16, 28, 10, 'Tonatiuh Anzures Escandón', 'Estrada Chan David Manuel', '9', 0, '2019-11-17', '2020-03-12 20:36:39'),
	(99, 16, 38, 10, 'Tonatiuh Anzures Escandón', 'Madrigal López Jesús David', '9', 0, '2019-11-17', '2020-03-12 20:36:39'),
	(100, 16, 43, 10, 'Tonatiuh Anzures Escandón', 'Ortiz Gallegos Oscar Manuel', '8', 0, '2019-11-17', '2020-03-12 20:36:39'),
	(101, 16, 52, 10, 'Tonatiuh Anzures Escandón', 'Torruco Guzmán Lázaro', 'NP', 0, '2019-11-17', '2020-03-12 20:36:39'),
	(102, 16, 54, 10, 'Tonatiuh Anzures Escandón', 'Zurita Osorio Luis Enrique', '9', 0, '2019-11-17', '2020-03-12 20:36:39'),
	(103, 17, 25, 1, 'José Vicente Loredo Méndez  ', 'Cabrera Gómez Diana Laura', '9', 0, '2019-01-11', '2020-03-12 20:36:39'),
	(104, 17, 28, 1, 'José Vicente Loredo Méndez  ', 'Estrada Chan David Manuel', '10', 0, '2019-01-11', '2020-03-12 20:36:39'),
	(105, 17, 38, 1, 'José Vicente Loredo Méndez  ', 'Madrigal López Jesús David', '9', 0, '2019-01-11', '2020-03-12 20:36:39'),
	(106, 17, 43, 1, 'José Vicente Loredo Méndez  ', 'Ortiz Gallegos Oscar Manuel', '8', 0, '2019-01-11', '2020-03-12 20:36:39'),
	(107, 17, 52, 1, 'José Vicente Loredo Méndez  ', 'Torruco Guzmán Lázaro', 'NP', 0, '2019-01-11', '2020-03-12 20:36:39'),
	(108, 17, 54, 1, 'José Vicente Loredo Méndez  ', 'Zurita Osorio Luis Enrique', '10', 0, '2019-01-11', '2020-03-12 20:36:39'),
	(109, 18, 25, 4, 'Oswald Lara Borges', 'Cabrera Gómez Diana Laura', '10', 0, '2019-01-12', '2020-03-12 20:36:39'),
	(110, 18, 28, 4, 'Oswald Lara Borges', 'Estrada Chan David Manuel', '10', 0, '2019-01-12', '2020-03-12 20:36:39'),
	(111, 18, 38, 4, 'Oswald Lara Borges', 'Madrigal López Jesús David', '10', 0, '2019-01-12', '2020-03-12 20:36:39'),
	(112, 18, 43, 4, 'Oswald Lara Borges', 'Ortiz Gallegos Oscar Manuel', 'P', 0, '2019-01-12', '2020-03-12 20:36:39'),
	(113, 18, 51, 4, 'Oswald Lara Borges', 'Torres Carrillo Alfonso', '10', 0, '2019-01-12', '2020-03-12 20:36:39'),
	(114, 18, 52, 4, 'Oswald Lara Borges', 'Torruco Guzmán Lázaro', '10', 0, '2019-01-12', '2020-03-12 20:36:39'),
	(115, 18, 54, 4, 'Oswald Lara Borges', 'Zurita Osorio Luis Enrique', '10', 0, '2019-01-12', '2020-03-12 20:36:39'),
	(116, 19, 24, 11, 'Jesús Raciel García Ramírez ', 'Blancas Cortés Cupertino', '10', 0, '2019-05-25', '2020-03-12 20:36:39'),
	(117, 19, 25, 11, 'Jesús Raciel García Ramírez ', 'Cabrera Gómez Diana Laura', '10', 0, '2019-05-25', '2020-03-12 20:36:39'),
	(118, 19, 26, 11, 'Jesús Raciel García Ramírez ', 'Carmona Durán Ramón', '10', 0, '2019-05-25', '2020-03-12 20:36:39'),
	(119, 19, 28, 11, 'Jesús Raciel García Ramírez ', 'Estrada Chan David Manuel', '10', 0, '2019-05-25', '2020-03-12 20:36:39'),
	(120, 19, 36, 11, 'Jesús Raciel García Ramírez ', 'Karman Conde Jacqueline', '10', 0, '2019-05-25', '2020-03-12 20:36:39'),
	(121, 19, 38, 11, 'Jesús Raciel García Ramírez ', 'Madrigal López Jesús David', '10', 0, '2019-05-25', '2020-03-12 20:36:39'),
	(122, 19, 43, 11, 'Jesús Raciel García Ramírez ', 'Ortiz Gallegos Oscar Manuel', 'P', 0, '2019-05-25', '2020-03-12 20:36:39'),
	(123, 19, 45, 11, 'Jesús Raciel García Ramírez ', 'Rivera López Néstor Enrique', '10', 0, '2019-05-25', '2020-03-12 20:36:39'),
	(124, 19, 48, 11, 'Jesús Raciel García Ramírez ', 'Salas Vergara Nallely', '10', 0, '2019-05-25', '2020-03-12 20:36:39'),
	(125, 19, 52, 11, 'Jesús Raciel García Ramírez ', 'Torruco Guzmán Lázaro', '10', 0, '2019-05-25', '2020-03-12 20:36:39'),
	(126, 19, 54, 11, 'Jesús Raciel García Ramírez ', 'Zurita Osorio Luis Enrique', '10', 0, '2019-05-25', '2020-03-12 20:36:39'),
	(127, 19, 55, 11, 'Jesús Raciel García Ramírez ', 'Zurita Roble Keila Yohana', '10', 0, '2019-05-25', '2020-03-12 20:36:39'),
	(128, 22, 28, 12, 'Vera Carrera Jéssica Marisol', 'David Manuel Estrada Chan', '10', 0, '2019-08-23', '2020-03-12 20:36:39'),
	(129, 22, 25, 12, 'Vera Carrera Jéssica Marisol', 'Diana Cabrera Gómez', '10', 0, '2019-08-23', '2020-03-12 20:36:39'),
	(130, 22, 38, 12, 'Vera Carrera Jéssica Marisol', 'Jesús David Madrigal López', '10', 0, '2019-08-23', '2020-03-12 20:36:39'),
	(131, 22, 54, 12, 'Vera Carrera Jéssica Marisol', 'Luis Enrique Zurita Osorio', '9', 0, '2019-08-23', '2020-03-12 20:36:39'),
	(132, 22, 43, 12, 'Vera Carrera Jéssica Marisol', 'Oscar Manuel Ortiz Gallegos', '8', 0, '2019-08-23', '2020-03-12 20:36:39'),
	(133, 22, 52, 12, 'Vera Carrera Jéssica Marisol', 'Lázaro Torruco Guzmán', '8', 0, '2019-08-23', '2020-03-12 20:36:39'),
	(134, 22, 26, 12, 'Vera Carrera Jéssica Marisol', 'Ramón Cardona Duran', '8', 0, '2019-08-23', '2020-03-12 20:36:39'),
	(135, 22, 55, 12, 'Vera Carrera Jéssica Marisol', 'Keila Zurita Roble', '8', 0, '2019-08-23', '2020-03-12 20:36:39'),
	(136, 22, 36, 12, 'Vera Carrera Jéssica Marisol', 'Jacqueline Karman Conde', '8', 0, '2019-08-23', '2020-03-12 20:36:39'),
	(137, 22, 48, 12, 'Vera Carrera Jéssica Marisol', 'Nallely Salas Vergara', '9', 0, '2019-08-23', '2020-03-12 20:36:39'),
	(138, 22, 44, 12, 'Vera Carrera Jéssica Marisol', 'Adela Ramos Sánchez', '10', 0, '2019-08-23', '2020-03-12 20:36:39'),
	(139, 22, 29, 12, 'Vera Carrera Jéssica Marisol', 'Héctor Vera García', '8', 0, '2019-08-23', '2020-03-12 20:36:39'),
	(140, 22, 33, 12, 'Vera Carrera Jéssica Marisol', 'Shantal González Meneses', '9', 0, '2019-08-23', '2020-03-12 20:36:39'),
	(141, 22, 53, 12, 'Vera Carrera Jéssica Marisol', 'Krisna Judith Villado Mejía', '8', 0, '2019-08-23', '2020-03-12 20:36:39'),
	(142, 22, 39, 12, 'Vera Carrera Jéssica Marisol', 'Alejandro de Jesús Martínez Ledesma', '9', 0, '2019-08-23', '2020-03-12 20:36:39'),
	(143, 22, 34, 12, 'Vera Carrera Jéssica Marisol', 'Arturo Gutiérrez Zamora', '9', 0, '2019-08-23', '2020-03-12 20:36:39'),
	(144, 22, 41, 12, 'Vera Carrera Jéssica Marisol', 'Martha Leticia Mercado Ramírez', 'NP', 0, '2019-08-23', '2020-03-12 20:36:39'),
	(145, 22, 21, 12, 'Vera Carrera Jéssica Marisol', 'Oscar Álvarez Hernández', '9', 0, '2019-08-23', '2020-03-12 20:36:39'),
	(146, 23, 24, 4, 'Oswald Lara Borges', 'Blancas Cortés Cupertino', '9', 0, '2019-10-04', '2020-03-12 20:36:39'),
	(147, 23, 25, 4, 'Oswald Lara Borges', 'Cabrera Gómez Diana Laura', '10', 0, '2019-10-04', '2020-03-12 20:36:39'),
	(148, 23, 26, 4, 'Oswald Lara Borges', 'Cardona Durán Ramón', '9', 0, '2019-10-04', '2020-03-12 20:36:39'),
	(149, 23, 28, 4, 'Oswald Lara Borges', 'Estrada Chan David Manuel', '10', 0, '2019-10-04', '2020-03-12 20:36:39'),
	(150, 23, 29, 4, 'Oswald Lara Borges', 'García Vera Héctor', '9', 0, '2019-10-04', '2020-03-12 20:36:39'),
	(151, 23, 30, 4, 'Oswald Lara Borges', 'Gastélum Ruelas Juan Francisco', '10', 0, '2019-10-04', '2020-03-12 20:36:39'),
	(152, 23, 32, 4, 'Oswald Lara Borges', 'Góngora Moo Dany Alberto', '10', 0, '2019-10-04', '2020-03-12 20:36:39'),
	(153, 23, 33, 4, 'Oswald Lara Borges', 'González Meneses Shantal', '10', 0, '2019-10-04', '2020-03-12 20:36:39'),
	(154, 23, 34, 4, 'Oswald Lara Borges', 'Gutiérrez Zamora Arturo', '9', 0, '2019-10-04', '2020-03-12 20:36:39'),
	(155, 23, 36, 4, 'Oswald Lara Borges', 'Karman Conde Jacqueline', '10', 0, '2019-10-04', '2020-03-12 20:36:39'),
	(156, 23, 37, 4, 'Oswald Lara Borges', 'Lara Barragán Karla Casandra', '10', 0, '2019-10-04', '2020-03-12 20:36:39'),
	(157, 23, 38, 4, 'Oswald Lara Borges', 'Madrigal López Jesús David', '10', 0, '2019-10-04', '2020-03-12 20:36:39'),
	(158, 23, 39, 4, 'Oswald Lara Borges', 'Martínez Ledesma Alejandro de Jesús', '9', 0, '2019-10-04', '2020-03-12 20:36:39'),
	(159, 23, 40, 4, 'Oswald Lara Borges', 'Mauleón Pérez Fabiola', '10', 0, '2019-10-04', '2020-03-12 20:36:39'),
	(160, 23, 41, 4, 'Oswald Lara Borges', 'Mercado Ramírez Martha Leticia', '10', 0, '2019-10-04', '2020-03-12 20:36:39'),
	(161, 23, 43, 4, 'Oswald Lara Borges', 'Ortiz Gallegos Oscar Manuel', '10', 0, '2019-10-04', '2020-03-12 20:36:39'),
	(162, 23, 44, 4, 'Oswald Lara Borges', 'Ramos Sánchez Adela', '10', 0, '2019-10-04', '2020-03-12 20:36:39'),
	(163, 23, 45, 4, 'Oswald Lara Borges', 'Rivera López Néstor Enrique', '9', 0, '2019-10-04', '2020-03-12 20:36:39'),
	(164, 23, 47, 4, 'Oswald Lara Borges', 'Ruiz Berzunza Pedro Guadalupe', '10', 0, '2019-10-04', '2020-03-12 20:36:39'),
	(165, 23, 48, 4, 'Oswald Lara Borges', 'Salas Vergara Nallely', '10', 0, '2019-10-04', '2020-03-12 20:36:39'),
	(166, 23, 52, 4, 'Oswald Lara Borges', 'Torruco Guzmán Lázaro', '9', 0, '2019-10-04', '2020-03-12 20:36:39'),
	(167, 23, 53, 4, 'Oswald Lara Borges', 'Villado Mejía Krisna Judith', '10', 0, '2019-10-04', '2020-03-12 20:36:39'),
	(168, 23, 54, 4, 'Oswald Lara Borges', 'Zurita Osorio Luis Enrique', '10', 0, '2019-10-04', '2020-03-12 20:36:39'),
	(169, 23, 55, 4, 'Oswald Lara Borges', 'Zurita Roble Keila Yohana', '10', 0, '2019-10-04', '2020-03-12 20:36:39'),
	(170, 24, 20, 13, 'Leticia Varillas Mirón', 'Aguirre Navarro Cristina Lilián', '8', 0, '2019-11-22', '2020-03-12 20:36:39'),
	(171, 24, 21, 13, 'Leticia Varillas Mirón', 'Álvarez Hernández Óscar', 'NP', 0, '2019-11-22', '2020-03-12 20:36:39'),
	(172, 24, 23, 13, 'Leticia Varillas Mirón', 'Avendaño Alvarado Sara Alicia', '8', 0, '2019-11-22', '2020-03-12 20:36:39'),
	(173, 24, 24, 13, 'Leticia Varillas Mirón', 'Blancas Cortés Cupertino', 'NP', 0, '2019-11-22', '2020-03-12 20:36:39'),
	(174, 24, 25, 13, 'Leticia Varillas Mirón', 'Cabrera Gómez Diana Laura', '9', 0, '2019-11-22', '2020-03-12 20:36:39'),
	(175, 24, 26, 13, 'Leticia Varillas Mirón', 'Cardona Durán Ramón', '10', 0, '2019-11-22', '2020-03-12 20:36:39'),
	(176, 24, 28, 13, 'Leticia Varillas Mirón', 'Estrada Chan David Manuel', '9', 0, '2019-11-22', '2020-03-12 20:36:39'),
	(177, 24, 29, 13, 'Leticia Varillas Mirón', 'García Vera Héctor', 'NP', 0, '2019-11-22', '2020-03-12 20:36:39'),
	(178, 24, 31, 13, 'Leticia Varillas Mirón', 'Garrido Lastra Irving', '8', 0, '2019-11-22', '2020-03-12 20:36:39'),
	(179, 24, 32, 13, 'Leticia Varillas Mirón', 'Góngora Moo Dany Alberto', '9', 0, '2019-11-22', '2020-03-12 20:36:39'),
	(180, 24, 33, 13, 'Leticia Varillas Mirón', 'González Meneses Shantal', '8', 0, '2019-11-22', '2020-03-12 20:36:39'),
	(181, 24, 34, 13, 'Leticia Varillas Mirón', 'Gutiérrez Zamora Arturo', '8', 0, '2019-11-22', '2020-03-12 20:36:39'),
	(182, 24, 35, 13, 'Leticia Varillas Mirón', 'Guzmán Valdez María Rosa', '8', 0, '2019-11-22', '2020-03-12 20:36:39'),
	(183, 24, 36, 13, 'Leticia Varillas Mirón', 'Karman Conde Jacqueline', 'NP', 0, '2019-11-22', '2020-03-12 20:36:39'),
	(184, 24, 38, 13, 'Leticia Varillas Mirón', 'Madrigal López Jesús David', '10', 0, '2019-11-22', '2020-03-12 20:36:39'),
	(185, 24, 39, 13, 'Leticia Varillas Mirón', 'Martínez Ledesma Alejandro de Jesús', '9', 0, '2019-11-22', '2020-03-12 20:36:39'),
	(186, 24, 40, 13, 'Leticia Varillas Mirón', 'Mauleón Pérez Fabiola', '10', 0, '2019-11-22', '2020-03-12 20:36:39'),
	(187, 24, 41, 13, 'Leticia Varillas Mirón', 'Mercado Ramírez Martha Leticia', 'NP', 0, '2019-11-22', '2020-03-12 20:36:39'),
	(188, 24, 43, 13, 'Leticia Varillas Mirón', 'Ortiz Gallegos Oscar Manuel', 'NP', 0, '2019-11-22', '2020-03-12 20:36:39'),
	(189, 24, 44, 13, 'Leticia Varillas Mirón', 'Ramos Sánchez Adela', '8', 0, '2019-11-22', '2020-03-12 20:36:39'),
	(190, 24, 47, 13, 'Leticia Varillas Mirón', 'Ruiz Berzunza Pedro Guadalupe', '9', 0, '2019-11-22', '2020-03-12 20:36:39'),
	(191, 24, 48, 13, 'Leticia Varillas Mirón', 'Salas Vergara Nallely', '10', 0, '2019-11-22', '2020-03-12 20:36:39'),
	(192, 24, 49, 13, 'Leticia Varillas Mirón', 'Samaniego Alvarado', '7', 0, '2019-11-22', '2020-03-12 20:36:39'),
	(193, 24, 50, 13, 'Leticia Varillas Mirón', 'Serrato Aguilar Ricardo', '10', 0, '2019-11-22', '2020-03-12 20:36:39'),
	(194, 24, 52, 13, 'Leticia Varillas Mirón', 'Torruco Guzmán Lázaro', '8', 0, '2019-11-22', '2020-03-12 20:36:39'),
	(195, 24, 53, 13, 'Leticia Varillas Mirón', 'Villado Mejía Krisna Judith', 'NP', 0, '2019-11-22', '2020-03-12 20:36:39'),
	(196, 24, 54, 13, 'Leticia Varillas Mirón', 'Zurita Osorio Luis Enrique', '9', 0, '2019-11-22', '2020-03-12 20:36:39'),
	(197, 24, 55, 13, 'Leticia Varillas Mirón', 'Zurita Roble Keila Yohana', '8', 0, '2019-11-22', '2020-03-12 20:36:39'),
	(198, 20, 24, 5, 'Juan Rodrigo Labardini Flores', 'Blancas Cortés Cupertino', '9', 0, '2019-08-17', '2020-03-12 20:36:39'),
	(199, 20, 25, 5, 'Juan Rodrigo Labardini Flores', 'Cabrera Gómez Diana Laura', '10', 0, '2019-08-17', '2020-03-12 20:36:39'),
	(200, 20, 26, 5, 'Juan Rodrigo Labardini Flores', 'Cardona Durán Ramón', '9', 0, '2019-08-17', '2020-03-12 20:36:39'),
	(201, 20, 27, 5, 'Juan Rodrigo Labardini Flores', 'David Hernández Francisco de Jesús', '¿?', 0, '2019-08-17', '2020-03-12 20:36:39'),
	(202, 20, 28, 5, 'Juan Rodrigo Labardini Flores', 'Estrada Chan David Manuel', '10', 0, '2019-08-17', '2020-03-12 20:36:39'),
	(203, 20, 29, 5, 'Juan Rodrigo Labardini Flores', 'García Vera Héctor', '9', 0, '2019-08-17', '2020-03-12 20:36:39'),
	(204, 20, 30, 5, 'Juan Rodrigo Labardini Flores', 'Gastélum Ruelas Juan Francisco', '10', 0, '2019-08-17', '2020-03-12 20:36:39'),
	(205, 20, 33, 5, 'Juan Rodrigo Labardini Flores', 'González Meneses Shantal', '10', 0, '2019-08-17', '2020-03-12 20:36:39'),
	(206, 20, 34, 5, 'Juan Rodrigo Labardini Flores', 'Gutiérrez Zamora Arturo', '9', 0, '2019-08-17', '2020-03-12 20:36:39'),
	(207, 20, 36, 5, 'Juan Rodrigo Labardini Flores', 'Karman Conde Jacqueline', '10', 0, '2019-08-17', '2020-03-12 20:36:39'),
	(208, 20, 37, 5, 'Juan Rodrigo Labardini Flores', 'Lara Barragán Karla Casandra', '10', 0, '2019-08-17', '2020-03-12 20:36:39'),
	(209, 20, 38, 5, 'Juan Rodrigo Labardini Flores', 'Madrigal López Jesús David', '10', 0, '2019-08-17', '2020-03-12 20:36:39'),
	(210, 20, 39, 5, 'Juan Rodrigo Labardini Flores', 'Martínez Ledesma Alejandro de Jesús', '9', 0, '2019-08-17', '2020-03-12 20:36:39'),
	(211, 20, 41, 5, 'Juan Rodrigo Labardini Flores', 'Mercado Ramírez Martha Leticia', '10', 0, '2019-08-17', '2020-03-12 20:36:39'),
	(212, 20, 43, 5, 'Juan Rodrigo Labardini Flores', 'Ortiz Gallegos Oscar Manuel', '10', 0, '2019-08-17', '2020-03-12 20:36:39'),
	(213, 20, 44, 5, 'Juan Rodrigo Labardini Flores', 'Ramos Sánchez Adela', '10', 0, '2019-08-17', '2020-03-12 20:36:39'),
	(214, 20, 45, 5, 'Juan Rodrigo Labardini Flores', 'Rivera López Néstor Enrique', '9', 0, '2019-08-17', '2020-03-12 20:36:39'),
	(215, 20, 48, 5, 'Juan Rodrigo Labardini Flores', 'Salas Vergara Nallely', '10', 0, '2019-08-17', '2020-03-12 20:36:39'),
	(216, 20, 52, 5, 'Juan Rodrigo Labardini Flores', 'Torruco Guzmán Lázaro', '9', 0, '2019-08-17', '2020-03-12 20:36:39'),
	(217, 20, 53, 5, 'Juan Rodrigo Labardini Flores', 'Villado Mejía Krisna Judith', '10', 0, '2019-08-17', '2020-03-12 20:36:39'),
	(218, 20, 54, 5, 'Juan Rodrigo Labardini Flores', 'Zurita Osorio Luis Enrique', '10', 0, '2019-08-17', '2020-03-12 20:36:39'),
	(219, 20, 55, 5, 'Juan Rodrigo Labardini Flores', 'Zurita Roble Keila Yohana', '10', 0, '2019-08-17', '2020-03-12 20:36:39'),
	(220, 21, 24, 5, 'Juan Rodrigo Labardini Flores', 'Blancas Cortés Cupertino', '8', 0, '2019-07-06', '2020-03-12 20:36:39'),
	(221, 21, 25, 5, 'Juan Rodrigo Labardini Flores', 'Cabrera Gómez Diana Laura', '10', 0, '2019-07-06', '2020-03-12 20:36:39'),
	(222, 21, 26, 5, 'Juan Rodrigo Labardini Flores', 'Cardona Durán Ramón', '9', 0, '2019-07-06', '2020-03-12 20:36:39'),
	(223, 21, 28, 5, 'Juan Rodrigo Labardini Flores', 'Estrada Chan David Manuel', '10', 0, '2019-07-06', '2020-03-12 20:36:39'),
	(224, 21, 29, 5, 'Juan Rodrigo Labardini Flores', 'García Vera Héctor', '9', 0, '2019-07-06', '2020-03-12 20:36:39'),
	(225, 21, 30, 5, 'Juan Rodrigo Labardini Flores', 'Gastélum Ruelas Juan Francisco', '9', 0, '2019-07-06', '2020-03-12 20:36:39'),
	(226, 21, 33, 5, 'Juan Rodrigo Labardini Flores', 'González Meneses Shantal', '9', 0, '2019-07-06', '2020-03-12 20:36:39'),
	(227, 21, 36, 5, 'Juan Rodrigo Labardini Flores', 'Karman Conde Jacqueline', '10', 0, '2019-07-06', '2020-03-12 20:36:39'),
	(228, 21, 37, 5, 'Juan Rodrigo Labardini Flores', 'Lara Barragán Karla Casandra', '10', 0, '2019-07-06', '2020-03-12 20:36:39'),
	(229, 21, 38, 5, 'Juan Rodrigo Labardini Flores', 'Madrigal López Jesús David', '10', 0, '2019-07-06', '2020-03-12 20:36:39'),
	(230, 21, 39, 5, 'Juan Rodrigo Labardini Flores', 'Martínez Ledesma Alejandro de Jesús', '9', 0, '2019-07-06', '2020-03-12 20:36:39'),
	(231, 21, 41, 5, 'Juan Rodrigo Labardini Flores', 'Mercado Ramírez Martha Leticia', '10', 0, '2019-07-06', '2020-03-12 20:36:39'),
	(232, 21, 43, 5, 'Juan Rodrigo Labardini Flores', 'Ortiz Gallegos Oscar Manuel', '9', 0, '2019-07-06', '2020-03-12 20:36:39'),
	(233, 21, 44, 5, 'Juan Rodrigo Labardini Flores', 'Ramos Sánchez Adela', '10', 0, '2019-07-06', '2020-03-12 20:36:39'),
	(234, 21, 45, 5, 'Juan Rodrigo Labardini Flores', 'Rivera López Néstor Enrique', '9', 0, '2019-07-06', '2020-03-12 20:36:39'),
	(235, 21, 48, 5, 'Juan Rodrigo Labardini Flores', 'Salas Vergara Nallely', '10', 0, '2019-07-06', '2020-03-12 20:36:39'),
	(236, 21, 52, 5, 'Juan Rodrigo Labardini Flores', 'Torruco Guzmán Lázaro', '9', 0, '2019-07-06', '2020-03-12 20:36:39'),
	(237, 21, 53, 5, 'Juan Rodrigo Labardini Flores', 'Villado Mejía Krisna Judith', '10', 0, '2019-07-06', '2020-03-12 20:36:39'),
	(238, 21, 54, 5, 'Juan Rodrigo Labardini Flores', 'Zurita Osorio Luis Enrique', '10', 0, '2019-07-06', '2020-03-12 20:36:39'),
	(239, 21, 55, 5, 'Juan Rodrigo Labardini Flores', 'Zurita Roble Keila Yohana', '10', 0, '2019-07-06', '2020-03-12 20:36:39'),
	(240, 50, 0, 0, NULL, 'Arriaga Vega María Guadalupe', NULL, 0, NULL, '2020-03-12 20:36:39'),
	(241, 50, 0, 0, NULL, 'Ávila Ortíz Miguel', '9', 0, NULL, '2020-03-12 20:36:39'),
	(242, 50, 0, 0, NULL, 'Badillo Sandra Fabiola', '9', 0, NULL, '2020-03-12 20:36:39'),
	(243, 50, 0, 0, NULL, 'Brito Casales Helena', '10', 0, NULL, '2020-03-12 20:36:39'),
	(244, 50, 0, 0, NULL, 'Castañeda Rodríguez Sergio', '9', 0, NULL, '2020-03-12 20:36:39'),
	(245, 50, 0, 0, NULL, 'Cerda Zuñiga David', '10', 0, NULL, '2020-03-12 20:36:39'),
	(246, 50, 0, 0, NULL, 'Centeno Alamilla Wilbert', NULL, 0, NULL, '2020-03-12 20:36:39'),
	(247, 50, 0, 0, NULL, 'Coronado Hernández Luis Enrique', '9', 0, NULL, '2020-03-12 20:36:39'),
	(248, 50, 0, 0, NULL, 'Cruz Durán Carlos Enrique', NULL, 0, NULL, '2020-03-12 20:36:39'),
	(249, 50, 0, 0, NULL, 'Galván Barragán Teresa', NULL, 0, NULL, '2020-03-12 20:36:39'),
	(250, 50, 0, 0, NULL, 'García Ramírez Jesús Raciel', '9', 0, NULL, '2020-03-12 20:36:39'),
	(251, 50, 0, 0, NULL, 'Gutiérrez Cortés Aracely', '10', 0, NULL, '2020-03-12 20:36:39'),
	(252, 50, 0, 0, NULL, 'Hernández Cruz Juan César', '9', 0, NULL, '2020-03-12 20:36:39'),
	(253, 50, 0, 0, NULL, 'Herrera Quiñones Juan Rafael', '10', 0, NULL, '2020-03-12 20:36:39'),
	(254, 50, 0, 0, NULL, 'Lezama Martínez Mayre', NULL, 0, NULL, '2020-03-12 20:36:39'),
	(255, 50, 0, 0, NULL, 'Lima Romero Maribel', '9', 0, NULL, '2020-03-12 20:36:39'),
	(256, 50, 0, 0, NULL, 'Luna Islas Claudia Lilia', NULL, 0, NULL, '2020-03-12 20:36:39'),
	(257, 50, 0, 0, NULL, 'Morales Elizalde Daniel', '9', 0, NULL, '2020-03-12 20:36:39'),
	(258, 50, 0, 0, NULL, 'Muñoz Cortés Oswaldo', NULL, 0, NULL, '2020-03-12 20:36:39'),
	(259, 50, 0, 0, NULL, 'Núñez Nava Jesús', NULL, 0, NULL, '2020-03-12 20:36:39'),
	(260, 50, 0, 0, NULL, 'Pérez Carrillo Adrián Donato', NULL, 0, NULL, '2020-03-12 20:36:39'),
	(261, 50, 0, 0, NULL, 'Pérez Espitia Beatriz Teresa', '9', 0, NULL, '2020-03-12 20:36:39'),
	(262, 50, 0, 0, NULL, 'Pérez Galicia Jorge Efraín', '9', 0, NULL, '2020-03-12 20:36:39'),
	(263, 50, 0, 0, NULL, 'Piedras Martínez Elizabeth', '9', 0, NULL, '2020-03-12 20:36:39'),
	(264, 50, 0, 0, NULL, 'Poot Martínez Onésimo Tomás', NULL, 0, NULL, '2020-03-12 20:36:39'),
	(265, 50, 0, 0, NULL, 'Rodríguez Calderón David', '9', 0, NULL, '2020-03-12 20:36:39'),
	(266, 50, 0, 0, NULL, 'Rodríguez Gómez Víctor Hugo', '9', 0, NULL, '2020-03-12 20:36:39'),
	(267, 50, 0, 0, NULL, 'Román Montero Adolfo', '10', 0, NULL, '2020-03-12 20:36:39'),
	(268, 50, 0, 0, NULL, 'Ruiz Hernández Francisco Jesús', NULL, 0, NULL, '2020-03-12 20:36:39'),
	(269, 50, 0, 0, NULL, 'Salgado Pedraza Eduardo', '10', 0, NULL, '2020-03-12 20:36:39'),
	(270, 50, 0, 0, NULL, 'Sánchez Gómez Iram Yovan', NULL, 0, NULL, '2020-03-12 20:36:39'),
	(271, 50, 0, 0, NULL, 'Sánchez Hernández Rafael', NULL, 0, NULL, '2020-03-12 20:36:39'),
	(272, 50, 0, 0, NULL, 'Zapata Cabrera Alejandro Moctezuma', NULL, 0, NULL, '2020-03-12 20:36:39'),
	(273, 52, 0, 0, NULL, 'Arriaga Vega María Guadalupe', '8', 0, NULL, '2020-03-12 20:36:39'),
	(274, 52, 0, 0, NULL, 'Ávila Ortíz Miguel', '8', 0, NULL, '2020-03-12 20:36:39'),
	(275, 52, 0, 0, NULL, 'Badillo Sandra Fabiola', '9', 0, NULL, '2020-03-12 20:36:39'),
	(276, 52, 0, 0, NULL, 'Brito Casales Helena', '10', 0, NULL, '2020-03-12 20:36:39'),
	(277, 52, 0, 0, NULL, 'Castañeda Rodríguez Sergio', '9', 0, NULL, '2020-03-12 20:36:39'),
	(278, 52, 0, 0, NULL, 'Cerda Zuñiga David', '9', 0, NULL, '2020-03-12 20:36:39'),
	(279, 52, 0, 0, NULL, 'Centeno Alamilla Wilbert', '9', 0, NULL, '2020-03-12 20:36:39'),
	(280, 52, 0, 0, NULL, 'Coronado Hernández Luis Enrique', '10', 0, NULL, '2020-03-12 20:36:39'),
	(281, 52, 0, 0, NULL, 'Cruz Durán Carlos Enrique', '10', 0, NULL, '2020-03-12 20:36:39'),
	(282, 52, 0, 0, NULL, 'Galván Barragán Teresa', NULL, 0, NULL, '2020-03-12 20:36:39'),
	(283, 52, 0, 0, NULL, 'García Ramírez Jesús Raciel', '9', 0, NULL, '2020-03-12 20:36:39'),
	(284, 52, 0, 0, NULL, 'Gutiérrez Cortés Aracely', '9', 0, NULL, '2020-03-12 20:36:39'),
	(285, 52, 0, 0, NULL, 'Hernández Cruz Juan César', '9', 0, NULL, '2020-03-12 20:36:39'),
	(286, 52, 0, 0, NULL, 'Herrera Quiñones Juan Rafael', '9', 0, NULL, '2020-03-12 20:36:39'),
	(287, 52, 0, 0, NULL, 'Lezama Martínez Mayre', NULL, 0, NULL, '2020-03-12 20:36:39'),
	(288, 52, 0, 0, NULL, 'Lima Romero Maribel', '10', 0, NULL, '2020-03-12 20:36:39'),
	(289, 52, 0, 0, NULL, 'Luna Islas Claudia Lilia', NULL, 0, NULL, '2020-03-12 20:36:39'),
	(290, 52, 0, 0, NULL, 'Morales Elizalde Daniel', '8', 0, NULL, '2020-03-12 20:36:39'),
	(291, 52, 0, 0, NULL, 'Muñoz Cortés Oswaldo', NULL, 0, NULL, '2020-03-12 20:36:39'),
	(292, 52, 0, 0, NULL, 'Núñez Nava Jesús', '8', 0, NULL, '2020-03-12 20:36:39'),
	(293, 52, 0, 0, NULL, 'Pérez Carrillo Adrián Donato', NULL, 0, NULL, '2020-03-12 20:36:39'),
	(294, 52, 0, 0, NULL, 'Pérez Espitia Beatriz Teresa', '10', 0, NULL, '2020-03-12 20:36:39'),
	(295, 52, 0, 0, NULL, 'Pérez Galicia Jorge Efraín', '8', 0, NULL, '2020-03-12 20:36:39'),
	(296, 52, 0, 0, NULL, 'Piedras Martínez Elizabeth', '9', 0, NULL, '2020-03-12 20:36:39'),
	(297, 52, 0, 0, NULL, 'Poot Martínez Onésimo Tomás', NULL, 0, NULL, '2020-03-12 20:36:39'),
	(298, 52, 0, 0, NULL, 'Rodríguez Calderón David', '9', 0, NULL, '2020-03-12 20:36:39'),
	(299, 52, 0, 0, NULL, 'Rodríguez Gómez Víctor Hugo', '9', 0, NULL, '2020-03-12 20:36:39'),
	(300, 52, 0, 0, NULL, 'Román Montero Adolfo', '8', 0, NULL, '2020-03-12 20:36:39'),
	(301, 52, 0, 0, NULL, 'Ruiz Hernández Francisco Jesús', NULL, 0, NULL, '2020-03-12 20:36:39'),
	(302, 52, 0, 0, NULL, 'Salgado Pedraza Eduardo', NULL, 0, NULL, '2020-03-12 20:36:39'),
	(303, 52, 0, 0, NULL, 'Sánchez Gómez Iram Yovan', NULL, 0, NULL, '2020-03-12 20:36:39'),
	(304, 52, 0, 0, NULL, 'Sánchez Hernández Rafael', NULL, 0, NULL, '2020-03-12 20:36:39'),
	(305, 52, 0, 0, NULL, 'Zapata Cabrera Alejandro Moctezuma', NULL, 0, NULL, '2020-03-12 20:36:39'),
	(306, 49, 0, 0, NULL, 'Arriaga Vega María Guadalupe', '10', 0, NULL, '2020-03-12 20:36:39'),
	(307, 49, 0, 0, NULL, 'Ávila Ortíz Miguel', NULL, 0, NULL, '2020-03-12 20:36:39'),
	(308, 49, 0, 0, NULL, 'Badillo Sandra Fabiola', NULL, 0, NULL, '2020-03-12 20:36:39'),
	(309, 49, 0, 0, NULL, 'Brito Casales Helena', '10', 0, NULL, '2020-03-12 20:36:39'),
	(310, 49, 0, 0, NULL, 'Castañeda Rodríguez Sergio', NULL, 0, NULL, '2020-03-12 20:36:39'),
	(311, 49, 0, 0, NULL, 'Cerda Zuñiga David', 'NP', 0, NULL, '2020-03-12 20:36:39'),
	(312, 49, 0, 0, NULL, 'Centeno Alamilla Wilbert', '9', 0, NULL, '2020-03-12 20:36:39'),
	(313, 49, 0, 0, NULL, 'Coronado Hernández Luis Enrique', NULL, 0, NULL, '2020-03-12 20:36:39'),
	(314, 49, 0, 0, NULL, 'Cruz Durán Carlos Enrique', '10', 0, NULL, '2020-03-12 20:36:39'),
	(315, 49, 0, 0, NULL, 'Galván Barragán Teresa', NULL, 0, NULL, '2020-03-12 20:36:39'),
	(316, 49, 0, 0, NULL, 'García Ramírez Jesús Raciel', NULL, 0, NULL, '2020-03-12 20:36:39'),
	(317, 49, 0, 0, NULL, 'Gutiérrez Cortés Aracely', '9', 0, NULL, '2020-03-12 20:36:39'),
	(318, 49, 0, 0, NULL, 'Hernández Cruz Juan César', '8', 0, NULL, '2020-03-12 20:36:39'),
	(319, 49, 0, 0, NULL, 'Herrera Quiñones Juan Rafael', '10', 0, NULL, '2020-03-12 20:36:39'),
	(320, 49, 0, 0, NULL, 'Lezama Martínez Mayre', NULL, 0, NULL, '2020-03-12 20:36:39'),
	(321, 49, 0, 0, NULL, 'Lima Romero Maribel', '10', 0, NULL, '2020-03-12 20:36:39'),
	(322, 49, 0, 0, NULL, 'Luna Islas Claudia Lilia', NULL, 0, NULL, '2020-03-12 20:36:39'),
	(323, 49, 0, 0, NULL, 'Morales Elizalde Daniel', '8', 0, NULL, '2020-03-12 20:36:39'),
	(324, 49, 0, 0, NULL, 'Muñoz Cortés Oswaldo', NULL, 0, NULL, '2020-03-12 20:36:39'),
	(325, 49, 0, 0, NULL, 'Núñez Nava Jesús', '10', 0, NULL, '2020-03-12 20:36:39'),
	(326, 49, 0, 0, NULL, 'Pérez Carrillo Adrián Donato', NULL, 0, NULL, '2020-03-12 20:36:39'),
	(327, 49, 0, 0, NULL, 'Pérez Espitia Beatriz Teresa', '10', 0, NULL, '2020-03-12 20:36:39'),
	(328, 49, 0, 0, NULL, 'Pérez Galicia Jorge Efraín', '9', 0, NULL, '2020-03-12 20:36:39'),
	(329, 49, 0, 0, NULL, 'Piedras Martínez Elizabeth', NULL, 0, NULL, '2020-03-12 20:36:39'),
	(330, 49, 0, 0, NULL, 'Poot Martínez Onésimo Tomás', '10', 0, NULL, '2020-03-12 20:36:39'),
	(331, 49, 0, 0, NULL, 'Rodríguez Calderón David', NULL, 0, NULL, '2020-03-12 20:36:39'),
	(332, 49, 0, 0, NULL, 'Rodríguez Gómez Víctor Hugo', NULL, 0, NULL, '2020-03-12 20:36:39'),
	(333, 49, 0, 0, NULL, 'Román Montero Adolfo', 'NP', 0, NULL, '2020-03-12 20:36:39'),
	(334, 49, 0, 0, NULL, 'Ruiz Hernández Francisco Jesús', NULL, 0, NULL, '2020-03-12 20:36:39'),
	(335, 49, 0, 0, NULL, 'Salgado Pedraza Eduardo', '10', 0, NULL, '2020-03-12 20:36:39'),
	(336, 49, 0, 0, NULL, 'Sánchez Gómez Iram Yovan', NULL, 0, NULL, '2020-03-12 20:36:39'),
	(337, 49, 0, 0, NULL, 'Sánchez Hernández Rafael', NULL, 0, NULL, '2020-03-12 20:36:39'),
	(338, 49, 0, 0, NULL, 'Zapata Cabrera Alejandro Moctezuma', NULL, 0, NULL, '2020-03-12 20:36:39'),
	(339, 34, 57, 0, NULL, 'Ángel Cruz Carolina del', '9', 0, NULL, '2020-03-12 20:36:39'),
	(340, 34, 59, 0, NULL, 'Arazo Martínez Iván', '9', 0, NULL, '2020-03-12 20:36:39'),
	(341, 34, 60, 0, NULL, 'Ávila Silva Georgina', NULL, 0, NULL, '2020-03-12 20:36:39'),
	(342, 34, 61, 0, NULL, 'Bueno Torres Perla Lizette', '9', 0, NULL, '2020-03-12 20:36:39'),
	(343, 34, 63, 0, NULL, 'Colín Muñiz Luis Manuel', '9', 0, NULL, '2020-03-12 20:36:39'),
	(344, 34, 64, 0, NULL, 'Franco Salinas María Elena', NULL, 0, NULL, '2020-03-12 20:36:39'),
	(345, 34, 65, 0, NULL, 'García Jiménez María de la Luz', '10', 0, NULL, '2020-03-12 20:36:39'),
	(346, 34, 66, 0, NULL, 'García Mendoza Leopoldo José', NULL, 0, NULL, '2020-03-12 20:36:39'),
	(347, 34, 67, 0, NULL, 'Hernández Abogado Augusto', '9', 0, NULL, '2020-03-12 20:36:39'),
	(348, 34, 68, 0, NULL, 'Huizar Martínez Miguel Benjamín', '10', 0, NULL, '2020-03-12 20:36:39'),
	(349, 34, 69, 0, NULL, 'Lara Borges Oswald', '10', 0, NULL, '2020-03-12 20:36:39'),
	(350, 34, 70, 0, NULL, 'Ortiz Guerra Leoncio', '9', 0, NULL, '2020-03-12 20:36:39'),
	(351, 34, 71, 0, NULL, 'Pérez Lugo Francisco Javier', '10', 0, NULL, '2020-03-12 20:36:39'),
	(352, 34, 72, 0, NULL, 'Pérez Martínez Lucía', NULL, 0, NULL, '2020-03-12 20:36:39'),
	(353, 34, 73, 0, NULL, 'Ramírez Ladrón de Guevara Anel Berenice', NULL, 0, NULL, '2020-03-12 20:36:39'),
	(354, 34, 74, 0, NULL, 'Valencia Buendía Maricruz', NULL, 0, NULL, '2020-03-12 20:36:39'),
	(355, 34, 75, 0, NULL, 'Valle Monroy Bernardo', '10', 0, NULL, '2020-03-12 20:36:39'),
	(356, 34, 76, 0, NULL, 'Véliz Méndez Rodrigo', '9', 0, NULL, '2020-03-12 20:36:39'),
	(357, 34, 77, 0, NULL, 'Vera Martínez Miguel Ángel', '9', 0, NULL, '2020-03-12 20:36:39'),
	(358, 35, 57, 0, NULL, 'Ángel Cruz Carolina del', '9', 0, NULL, '2020-03-12 20:36:39'),
	(359, 35, 59, 0, NULL, 'Arazo Martínez Iván', '10', 0, NULL, '2020-03-12 20:36:39'),
	(360, 35, 60, 0, NULL, 'Ávila Silva Georgina', NULL, 0, NULL, '2020-03-12 20:36:39'),
	(361, 35, 61, 0, NULL, 'Bueno Torres Perla Lizette', '10', 0, NULL, '2020-03-12 20:36:39'),
	(362, 35, 63, 0, NULL, 'Colín Muñiz Luis Manuel', '10', 0, NULL, '2020-03-12 20:36:39'),
	(363, 35, 64, 0, NULL, 'Franco Salinas María Elena', NULL, 0, NULL, '2020-03-12 20:36:39'),
	(364, 35, 65, 0, NULL, 'García Jiménez María de la Luz', '9', 0, NULL, '2020-03-12 20:36:39'),
	(365, 35, 66, 0, NULL, 'García Mendoza Leopoldo José', NULL, 0, NULL, '2020-03-12 20:36:39'),
	(366, 35, 67, 0, NULL, 'Hernández Abogado Augusto', NULL, 0, NULL, '2020-03-12 20:36:39'),
	(367, 35, 68, 0, NULL, 'Huizar Martínez Miguel Benjamín', '10', 0, NULL, '2020-03-12 20:36:39'),
	(368, 35, 69, 0, NULL, 'Lara Borges Oswald', NULL, 0, NULL, '2020-03-12 20:36:39'),
	(369, 35, 70, 0, NULL, 'Ortiz Guerra Leoncio', '10', 0, NULL, '2020-03-12 20:36:39'),
	(370, 35, 71, 0, NULL, 'Pérez Lugo Francisco Javier', '9', 0, NULL, '2020-03-12 20:36:39'),
	(371, 35, 72, 0, NULL, 'Pérez Martínez Lucía', '10', 0, NULL, '2020-03-12 20:36:39'),
	(372, 35, 73, 0, NULL, 'Ramírez Ladrón de Guevara Anel Berenice', '10', 0, NULL, '2020-03-12 20:36:39'),
	(373, 35, 74, 0, NULL, 'Valencia Buendía Maricruz', '10', 0, NULL, '2020-03-12 20:36:39'),
	(374, 35, 75, 0, NULL, 'Valle Monroy Bernardo', '9', 0, NULL, '2020-03-12 20:36:39'),
	(375, 35, 76, 0, NULL, 'Véliz Méndez Rodrigo', NULL, 0, NULL, '2020-03-12 20:36:39'),
	(376, 35, 77, 0, NULL, 'Vera Martínez Miguel Ángel', NULL, 0, NULL, '2020-03-12 20:36:39'),
	(377, 31, 57, 0, NULL, 'Ángel Cruz Carolina del', '10', 0, NULL, '2020-03-12 20:36:39'),
	(378, 31, 59, 0, NULL, 'Arazo Martínez Iván', '8', 0, NULL, '2020-03-12 20:36:39'),
	(379, 31, 60, 0, NULL, 'Ávila Silva Georgina', NULL, 0, NULL, '2020-03-12 20:36:39'),
	(380, 31, 61, 0, NULL, 'Bueno Torres Perla Lizette', '10', 0, NULL, '2020-03-12 20:36:39'),
	(381, 31, 63, 0, NULL, 'Colín Muñiz Luis Manuel', NULL, 0, NULL, '2020-03-12 20:36:39'),
	(382, 31, 64, 0, NULL, 'Franco Salinas María Elena', '10', 0, NULL, '2020-03-12 20:36:39'),
	(383, 31, 65, 0, NULL, 'García Jiménez María de la Luz', '9', 0, NULL, '2020-03-12 20:36:39'),
	(384, 31, 66, 0, NULL, 'García Mendoza Leopoldo José', NULL, 0, NULL, '2020-03-12 20:36:39'),
	(385, 31, 67, 0, NULL, 'Hernández Abogado Augusto', NULL, 0, NULL, '2020-03-12 20:36:39'),
	(386, 31, 68, 0, NULL, 'Huizar Martínez Miguel Benjamín', '10', 0, NULL, '2020-03-12 20:36:39'),
	(387, 31, 69, 0, NULL, 'Lara Borges Oswald', NULL, 0, NULL, '2020-03-12 20:36:39'),
	(388, 31, 70, 0, NULL, 'Ortiz Guerra Leoncio', '10', 0, NULL, '2020-03-12 20:36:39'),
	(389, 31, 71, 0, NULL, 'Pérez Lugo Francisco Javier', '9', 0, NULL, '2020-03-12 20:36:39'),
	(390, 31, 72, 0, NULL, 'Pérez Martínez Lucía', '10', 0, NULL, '2020-03-12 20:36:39'),
	(391, 31, 73, 0, NULL, 'Ramírez Ladrón de Guevara Anel Berenice', '8', 0, NULL, '2020-03-12 20:36:39'),
	(392, 31, 74, 0, NULL, 'Valencia Buendía Maricruz', '10', 0, NULL, '2020-03-12 20:36:39'),
	(393, 31, 75, 0, NULL, 'Valle Monroy Bernardo', '10', 0, NULL, '2020-03-12 20:36:39'),
	(394, 31, 76, 0, NULL, 'Véliz Méndez Rodrigo', NULL, 0, NULL, '2020-03-12 20:36:39'),
	(395, 31, 77, 0, NULL, 'Vera Martínez Miguel Ángel', NULL, 0, NULL, '2020-03-12 20:36:39');
/*!40000 ALTER TABLE `catg_calificaciones` ENABLE KEYS */;

-- Volcando estructura para tabla ibero.catg_catedratico
CREATE TABLE IF NOT EXISTS `catg_catedratico` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` int(11) DEFAULT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `ap_paterno` varchar(255) DEFAULT NULL,
  `ap_materno` varchar(255) DEFAULT NULL,
  `nacionalidad` varchar(255) DEFAULT NULL,
  `curp` varchar(255) DEFAULT NULL,
  `fecha_nac` date DEFAULT NULL,
  `telefono` bigint(20) DEFAULT NULL,
  `telefono_fijo` bigint(20) DEFAULT NULL,
  `ext` bigint(20) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `calle` varchar(255) DEFAULT NULL,
  `num_ext` varchar(255) DEFAULT NULL,
  `num_int` varchar(255) DEFAULT NULL,
  `colonia` varchar(255) DEFAULT NULL,
  `municipio` varchar(255) DEFAULT NULL,
  `estado` varchar(255) DEFAULT NULL,
  `cod_postal` varchar(255) DEFAULT NULL,
  `pais` varchar(255) DEFAULT NULL,
  `lic` varchar(255) DEFAULT NULL,
  `lic_uni` varchar(255) DEFAULT NULL,
  `lic_pais` varchar(255) DEFAULT NULL,
  `lic_estatus` int(11) DEFAULT NULL,
  `lic_fecha` date DEFAULT NULL,
  `mtria` varchar(255) DEFAULT NULL,
  `mtria_uni` varchar(255) DEFAULT NULL,
  `mtria_pais` varchar(255) DEFAULT NULL,
  `mtria_estatus` int(11) DEFAULT NULL,
  `mtria_fecha` date DEFAULT NULL,
  `doc` varchar(255) DEFAULT NULL,
  `doc_uni` varchar(255) DEFAULT NULL,
  `doc_pais` varchar(255) DEFAULT NULL,
  `doc_estatus` int(11) DEFAULT NULL,
  `doc_fecha` date DEFAULT NULL,
  `emailInst` varchar(255) DEFAULT NULL,
  `pass` varchar(255) DEFAULT 'IDE2020',
  `sexo` int(11) DEFAULT NULL,
  `eliminado` int(11) DEFAULT 0,
  `fecha_modificacion` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla ibero.catg_catedratico: ~14 rows (aproximadamente)
/*!40000 ALTER TABLE `catg_catedratico` DISABLE KEYS */;
INSERT INTO `catg_catedratico` (`id`, `titulo`, `nombre`, `ap_paterno`, `ap_materno`, `nacionalidad`, `curp`, `fecha_nac`, `telefono`, `telefono_fijo`, `ext`, `email`, `calle`, `num_ext`, `num_int`, `colonia`, `municipio`, `estado`, `cod_postal`, `pais`, `lic`, `lic_uni`, `lic_pais`, `lic_estatus`, `lic_fecha`, `mtria`, `mtria_uni`, `mtria_pais`, `mtria_estatus`, `mtria_fecha`, `doc`, `doc_uni`, `doc_pais`, `doc_estatus`, `doc_fecha`, `emailInst`, `pass`, `sexo`, `eliminado`, `fecha_modificacion`) VALUES
	(1, NULL, 'José Vicente', 'Loredo', 'Méndez', NULL, NULL, NULL, 9932308537, NULL, NULL, 'joseloredomendez@ideiberoamerica.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'joseloredomendez@ideiberoamerica.com', 'IDE2020', 0, 0, '2020-03-23 12:41:58'),
	(2, NULL, 'Julio Eduardo', 'Ramos', 'Talavera', NULL, NULL, NULL, 99311111111, NULL, NULL, 'julioramostalavera@ideiberoamerica.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'julioramostalavera@ideiberoamerica.com', 'IDE2020', 0, 0, '2020-03-23 12:42:00'),
	(3, NULL, 'Lorena', 'Pichardo', 'Flores', NULL, NULL, NULL, 9931234567, NULL, NULL, 'lorenapichardoflores@ideiberoamerica.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'lorenapichardoflores@ideiberoamerica.com', 'IDE2020', 0, 0, '2020-03-23 12:42:01'),
	(4, NULL, 'Oswald', 'Lara', 'Borges', NULL, NULL, NULL, 9932308537, NULL, NULL, 'oswaldlaraborges@ideiberoamerica.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'oswaldlaraborges@ideiberoamerica.com', 'IDE2020', 0, 0, '2020-03-23 12:42:03'),
	(5, 2, 'Juan Rodrigo', 'Labardini', 'Flores', NULL, NULL, NULL, 0, NULL, NULL, 'juanlabardiniflores@ideiberoamerica.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'juanlabardiniflores@ideiberoamerica.com', 'IDE2020', 2, 0, '2020-04-19 23:41:04'),
	(6, NULL, 'Francisco', 'Mixcoátl', 'Antonio', NULL, NULL, NULL, 0, NULL, NULL, 'franciscomixcoatlantonio@ideiberoamerica.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'franciscomixcoatlantonio@ideiberoamerica.com', 'IDE2020', 0, 0, '2020-03-23 12:42:05'),
	(7, NULL, 'Javier', 'Palacios', 'Xochipa', NULL, NULL, NULL, 0, NULL, NULL, 'javierpalaciosxochipa@ideiberoamerica.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'javierpalaciosxochipa@ideiberoamerica.com', 'IDE2020', 0, 0, '2020-03-23 12:42:06'),
	(8, NULL, 'Alberto', 'Hernández', 'Villa', NULL, NULL, NULL, 0, NULL, NULL, 'albertohernandezvilla@ideiberoamerica.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'albertohernandezvilla@ideiberoamerica.com', 'IDE2020', 0, 0, '2020-03-23 12:42:08'),
	(9, NULL, 'Isidoro', 'Méndez', 'Reyes', NULL, NULL, NULL, 0, NULL, NULL, 'isidoromendezreyes@ideiberoamerica.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'isidoromendezreyes@ideiberoamerica.com', 'IDE2020', 0, 0, '2020-03-23 12:42:09'),
	(10, NULL, 'Tonatiuh', 'Anzures', 'Escandón', NULL, NULL, NULL, 0, NULL, NULL, 'tonatiuhanzuresescandon@ideiberoamerica.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'tonatiuhanzuresescandon@ideiberoamerica.com', 'IDE2020', 0, 0, '2020-03-23 12:42:10'),
	(11, NULL, 'Jesús Raciel', 'García', 'Ramírez', NULL, NULL, NULL, 0, NULL, NULL, 'jesusgarcíaramirez@ideiberoamerica.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'jesusgarcíaramirez@ideiberoamerica.com', 'IDE2020', 0, 0, '2020-03-23 12:42:12'),
	(12, NULL, 'Jéssica Marisol', 'Vera', 'Carrera', NULL, NULL, NULL, 0, NULL, NULL, 'marisolveracarrera@ideiberoamerica.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'marisolveracarrera@ideiberoamerica.com', 'IDE2020', 0, 0, '2020-03-23 12:42:13'),
	(13, NULL, 'Leticia', 'Varillas', 'Mirón', NULL, NULL, NULL, 0, NULL, NULL, 'leticiavarillasmiron@ideiberoamerica.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'leticiavarillasmiron@ideiberoamerica.com', 'IDE2020', 0, 0, '2020-03-23 12:42:15'),
	(14, NULL, 'José Alfredo', 'Ortega', 'Torres', NULL, NULL, NULL, 0, NULL, NULL, 'alfredoortegatorres@ideiberoamerica.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'alfredoortegatorres@ideiberoamerica.com', 'IDE2020', 0, 0, '2020-04-12 20:05:56');
/*!40000 ALTER TABLE `catg_catedratico` ENABLE KEYS */;

-- Volcando estructura para tabla ibero.catg_documentos
CREATE TABLE IF NOT EXISTS `catg_documentos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Orden` int(11) NOT NULL DEFAULT 0,
  `idPosgrado` int(11) NOT NULL DEFAULT 1,
  `TipoDoc` int(11) NOT NULL DEFAULT 0,
  `Documento` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla ibero.catg_documentos: ~50 rows (aproximadamente)
/*!40000 ALTER TABLE `catg_documentos` DISABLE KEYS */;
INSERT INTO `catg_documentos` (`id`, `Orden`, `idPosgrado`, `TipoDoc`, `Documento`) VALUES
	(1, 1, 1, 0, 'Acta de Nacimiento'),
	(2, 2, 1, 0, 'Identificación Oficial'),
	(3, 3, 1, 0, 'Curriculum Vitae'),
	(4, 4, 1, 0, 'CURP'),
	(5, 5, 1, 0, 'Cetificado de Estudios de Licenciatura'),
	(6, 6, 1, 0, 'Título de Licenciatura'),
	(7, 7, 1, 0, 'Cédula Profesional'),
	(8, 8, 1, 0, 'Fotografia'),
	(9, 1, 1, 1, 'Inscripción'),
	(10, 2, 1, 1, 'Mensualidad'),
	(11, 3, 1, 1, 'Inscripción y Mensualidad'),
	(13, 1, 2, 0, 'Acta de Nacimiento'),
	(14, 2, 2, 0, 'Identificación Oficial'),
	(15, 3, 2, 0, 'Curriculum Vitae'),
	(16, 4, 2, 0, 'CURP'),
	(17, 5, 2, 0, 'Cetificado de Estudios de Licenciatura'),
	(18, 6, 2, 0, 'Título de Licenciatura'),
	(19, 7, 2, 0, 'Cédula Profesional'),
	(20, 8, 2, 0, 'Fotografia'),
	(21, 1, 2, 1, 'Inscripción'),
	(22, 2, 2, 1, 'Mensualidad'),
	(23, 3, 2, 1, 'Inscripción y Mensualidad'),
	(24, 1, 3, 0, 'Acta de Nacimiento'),
	(25, 2, 3, 0, 'Identificación Oficial'),
	(26, 3, 3, 0, 'Curriculum Vitae'),
	(27, 4, 3, 0, 'CURP'),
	(28, 5, 3, 0, 'Cetificado de Estudios de Licenciatura'),
	(29, 6, 3, 0, 'Título de Licenciatura'),
	(30, 7, 3, 0, 'Cédula Profesional Licenciatura'),
	(31, 8, 3, 0, 'Certificado de Estudios de Maestría'),
	(32, 9, 3, 0, 'Título de Maestría '),
	(33, 11, 3, 0, 'Fotografia'),
	(34, 1, 3, 1, 'Inscripción'),
	(35, 2, 3, 1, 'Mensualidad'),
	(36, 3, 3, 1, 'Inscripción y Mensualidad'),
	(37, 1, 4, 0, 'Acta de Nacimiento'),
	(38, 2, 4, 0, 'Identificación Oficial'),
	(39, 3, 4, 0, 'Curriculum Vitae'),
	(40, 4, 4, 0, 'CURP'),
	(41, 5, 4, 0, 'Cetificado de Estudios de Licenciatura'),
	(42, 6, 4, 0, 'Título de Licenciatura'),
	(43, 7, 4, 0, 'Cédula Profesional Licenciatura'),
	(44, 8, 4, 0, 'Certificado de Estudios de Maestría'),
	(45, 9, 4, 0, 'Título de Maestría '),
	(46, 11, 4, 0, 'Fotografia'),
	(47, 2, 4, 1, 'Inscripción'),
	(48, 3, 4, 1, 'Mensualidad'),
	(49, 0, 4, 1, 'Inscripción y Mensualidad'),
	(50, 10, 3, 0, 'Cédula Profesional Maestría'),
	(51, 10, 4, 0, 'Cédula Profesional Maestría');
/*!40000 ALTER TABLE `catg_documentos` ENABLE KEYS */;

-- Volcando estructura para tabla ibero.catg_forma_pago
CREATE TABLE IF NOT EXISTS `catg_forma_pago` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `forma_pago` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla ibero.catg_forma_pago: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `catg_forma_pago` DISABLE KEYS */;
INSERT INTO `catg_forma_pago` (`id`, `forma_pago`) VALUES
	(1, 'Deposito'),
	(2, 'Transferencia Bancaria');
/*!40000 ALTER TABLE `catg_forma_pago` ENABLE KEYS */;

-- Volcando estructura para tabla ibero.catg_grupo
CREATE TABLE IF NOT EXISTS `catg_grupo` (
  `idGrupo` int(11) NOT NULL AUTO_INCREMENT,
  `idPosgrado` int(11) NOT NULL DEFAULT 0,
  `NombreGrupo` varchar(50) DEFAULT NULL,
  `Periodo` date DEFAULT NULL,
  `Estatus` int(11) DEFAULT 0,
  `Eliminado` int(11) DEFAULT 0,
  `Bloqueado` int(11) DEFAULT NULL,
  `FechaModificacion` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`idGrupo`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla ibero.catg_grupo: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `catg_grupo` DISABLE KEYS */;
INSERT INTO `catg_grupo` (`idGrupo`, `idPosgrado`, `NombreGrupo`, `Periodo`, `Estatus`, `Eliminado`, `Bloqueado`, `FechaModificacion`) VALUES
	(1, 1, 'Grupo Único MDCDH', '2020-03-21', 0, 0, 0, NULL),
	(2, 2, 'Grupo Único MDE', '2020-03-25', 0, 0, 0, '2020-04-12 20:06:35'),
	(3, 3, 'Grupo Único DDCDH', '2020-03-25', 0, 0, 0, NULL),
	(4, 4, 'Grupo Único DDE', '2020-03-25', 0, 0, 0, NULL);
/*!40000 ALTER TABLE `catg_grupo` ENABLE KEYS */;

-- Volcando estructura para tabla ibero.catg_grupo_detalle
CREATE TABLE IF NOT EXISTS `catg_grupo_detalle` (
  `idDetalle` int(11) NOT NULL AUTO_INCREMENT,
  `idGrupo` int(11) DEFAULT NULL,
  `idEstudiante` int(11) DEFAULT NULL,
  `Calificacion` int(11) DEFAULT NULL,
  `Estatus` int(11) DEFAULT 0,
  `Eliminado` int(11) DEFAULT 0,
  `Bloqueado` int(11) DEFAULT 0,
  `FechaModificacion` datetime DEFAULT NULL,
  PRIMARY KEY (`idDetalle`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- Volcando datos para la tabla ibero.catg_grupo_detalle: ~19 rows (aproximadamente)
/*!40000 ALTER TABLE `catg_grupo_detalle` DISABLE KEYS */;
INSERT INTO `catg_grupo_detalle` (`idDetalle`, `idGrupo`, `idEstudiante`, `Calificacion`, `Estatus`, `Eliminado`, `Bloqueado`, `FechaModificacion`) VALUES
	(1, 1, 1, NULL, 0, 0, 0, NULL),
	(2, 1, 2, NULL, 0, 0, 0, NULL),
	(3, 1, 3, NULL, 0, 0, 0, NULL),
	(4, 1, 4, NULL, 0, 0, 0, NULL),
	(5, 1, 5, NULL, 0, 0, 0, NULL),
	(6, 1, 6, NULL, 0, 0, 0, NULL),
	(7, 1, 7, NULL, 0, 0, 0, NULL),
	(8, 1, 8, NULL, 0, 0, 0, NULL),
	(9, 1, 9, NULL, 0, 0, 0, NULL),
	(10, 1, 10, NULL, 0, 0, 0, NULL),
	(11, 1, 11, NULL, 0, 0, 0, NULL),
	(12, 1, 12, NULL, 0, 0, 0, NULL),
	(13, 1, 13, NULL, 0, 0, 0, NULL),
	(14, 1, 14, NULL, 0, 0, 0, NULL),
	(15, 1, 15, NULL, 0, 0, 0, NULL),
	(16, 1, 16, NULL, 0, 0, 0, NULL),
	(17, 1, 17, NULL, 0, 0, 0, NULL),
	(18, 1, 18, NULL, 0, 0, 0, NULL),
	(19, 1, 19, NULL, 0, 0, 0, NULL);
/*!40000 ALTER TABLE `catg_grupo_detalle` ENABLE KEYS */;

-- Volcando estructura para tabla ibero.catg_lecturas
CREATE TABLE IF NOT EXISTS `catg_lecturas` (
  `idLectura` int(11) NOT NULL AUTO_INCREMENT,
  `idMateria` int(11) NOT NULL DEFAULT 0,
  `TituloLectura` varchar(150) DEFAULT NULL,
  `Descripcion` varchar(250) DEFAULT NULL,
  `Link` varchar(250) DEFAULT NULL,
  `Archivo` varchar(250) DEFAULT NULL,
  `Eliminado` int(11) NOT NULL DEFAULT 0,
  `Activa` int(11) NOT NULL DEFAULT 0,
  `FechaModificacion` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idLectura`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- Volcando datos para la tabla ibero.catg_lecturas: ~18 rows (aproximadamente)
/*!40000 ALTER TABLE `catg_lecturas` DISABLE KEYS */;
INSERT INTO `catg_lecturas` (`idLectura`, `idMateria`, `TituloLectura`, `Descripcion`, `Link`, `Archivo`, `Eliminado`, `Activa`, `FechaModificacion`) VALUES
	(1, 1, 'Nueva lectura', '', '', 'bd.sql', 0, 0, '2020-04-17 00:29:29'),
	(2, 2, '31', '', '', 'BDIbero.xlsx', 0, 0, '2020-04-17 00:29:44'),
	(3, 3, 'Nueva lectura', '1', '', 'heidisql.exe', 1, 0, '2020-04-18 01:28:47'),
	(4, 3, 'Nueva lectura', '2', '', NULL, 1, 0, '2020-04-18 01:33:17'),
	(5, 3, 'Nueva lectura', '3', '', NULL, 1, 0, '2020-04-18 01:35:20'),
	(6, 3, 'Nueva lectura', '4', '', 'gpl.txt', 0, 0, '2020-04-18 01:39:24'),
	(7, 3, 'Nueva lectura', '5', '', NULL, 0, 0, '2020-04-18 01:40:54'),
	(8, 3, 'Nueva lectura', '', 'https://iide-edu.com/campusvirtual/dist/general.php', NULL, 1, 0, '2020-04-18 14:15:39'),
	(9, 3, '31', '', '', NULL, 0, 0, '2020-04-18 14:21:15'),
	(10, 3, 'mk kj', '', '', NULL, 0, 0, '2020-04-18 14:22:27'),
	(11, 3, 'Nueva lectura', '', '', NULL, 0, 0, '2020-04-18 14:42:08'),
	(12, 3, 'lfkmf kf kf ', '', '', NULL, 0, 0, '2020-04-18 14:42:54'),
	(13, 3, 'LOS DERECHOS HUMANOS EN EL CIBERESPACIO	', '', '', NULL, 0, 0, '2020-04-18 15:02:12'),
	(14, 3, '5', '', '', NULL, 1, 0, '2020-04-18 20:54:18'),
	(15, 3, '4', 'dsvsdv s', '', NULL, 0, 0, '2020-04-18 21:32:05'),
	(16, 3, 'Nueva lectura', '', '', NULL, 1, 0, '2020-04-18 21:33:34'),
	(17, 3, 'Nueva lectura', '', '', NULL, 0, 0, '2020-04-18 21:34:06'),
	(18, 3, 'kj kj  4', '', '', NULL, 0, 0, '2020-04-18 22:41:09'),
	(19, 3, 'Nueva lectura', '', '', NULL, 0, 0, '2020-04-18 23:36:35');
/*!40000 ALTER TABLE `catg_lecturas` ENABLE KEYS */;

-- Volcando estructura para tabla ibero.catg_pago
CREATE TABLE IF NOT EXISTS `catg_pago` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idAlumno` int(11) DEFAULT NULL,
  `tipo_pago` int(11) DEFAULT NULL,
  `forma_pago` int(11) DEFAULT NULL,
  `totalidad` int(11) DEFAULT NULL COMMENT 'pago total, parcial y adeudo (total)',
  `fecha` date DEFAULT NULL,
  `fecha_recargo` date DEFAULT NULL,
  `pago` float DEFAULT NULL,
  `archivo` varchar(100) DEFAULT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `estatus` int(11) DEFAULT 0 COMMENT 'en tramitate o validado',
  `eliminado` int(11) DEFAULT 0,
  `fecha_creacion` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla ibero.catg_pago: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `catg_pago` DISABLE KEYS */;
INSERT INTO `catg_pago` (`id`, `idAlumno`, `tipo_pago`, `forma_pago`, `totalidad`, `fecha`, `fecha_recargo`, `pago`, `archivo`, `descripcion`, `estatus`, `eliminado`, `fecha_creacion`) VALUES
	(1, 1, 1, 1, 1, '2020-03-13', NULL, NULL, NULL, 'Primer pago', 1, 0, '2020-03-14 13:25:40'),
	(2, 2, 2, 2, 1, '2020-03-13', NULL, NULL, NULL, 'Tercer pago', 0, 0, '2020-03-14 13:25:40'),
	(3, 3, 3, 1, 2, '2020-03-13', '2020-03-13', NULL, NULL, 'Pago parcial', 0, 0, '2020-03-14 13:25:40');
/*!40000 ALTER TABLE `catg_pago` ENABLE KEYS */;

-- Volcando estructura para tabla ibero.catg_perfil
CREATE TABLE IF NOT EXISTS `catg_perfil` (
  `idPerfil` int(11) NOT NULL AUTO_INCREMENT,
  `NombrePerfil` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idPerfil`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla ibero.catg_perfil: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `catg_perfil` DISABLE KEYS */;
INSERT INTO `catg_perfil` (`idPerfil`, `NombrePerfil`) VALUES
	(0, 'Control Escolar'),
	(1, 'Alumno'),
	(2, 'Docente'),
	(10, 'Administador');
/*!40000 ALTER TABLE `catg_perfil` ENABLE KEYS */;

-- Volcando estructura para tabla ibero.catg_posgrado
CREATE TABLE IF NOT EXISTS `catg_posgrado` (
  `id` int(11) DEFAULT NULL,
  `nombre_posgrado` varchar(255) DEFAULT NULL,
  `abrev` varchar(255) DEFAULT NULL,
  `eliminado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla ibero.catg_posgrado: ~8 rows (aproximadamente)
/*!40000 ALTER TABLE `catg_posgrado` DISABLE KEYS */;
INSERT INTO `catg_posgrado` (`id`, `nombre_posgrado`, `abrev`, `eliminado`) VALUES
	(1, 'Maestría en Derecho Constitucional y Derechos Humanos', 'MDCDH', 0),
	(2, 'Maestría en Derecho Electoral', 'MDE', 0),
	(3, 'Doctorado en Derecho Constitucional y Derechos Humanos', 'DDCDH', 0),
	(4, 'Doctorado en Derecho Electoral', 'DDE', 0),
	(0, 'Sin Asignar', 'SA', 0),
	(5, 'Maestrías', 'M', 0),
	(6, 'Doctorados', 'D', 0),
	(7, 'Todos', 'TODOS', 0);
/*!40000 ALTER TABLE `catg_posgrado` ENABLE KEYS */;

-- Volcando estructura para tabla ibero.catg_retroalimentacion
CREATE TABLE IF NOT EXISTS `catg_retroalimentacion` (
  `idTarea` int(11) NOT NULL,
  `idMateria` int(11) NOT NULL DEFAULT 0,
  `TituloTarea` varchar(150) DEFAULT NULL,
  `Descripcion` varchar(250) DEFAULT NULL,
  `Link` varchar(250) DEFAULT NULL,
  `Eliminado` int(11) NOT NULL DEFAULT 0,
  `Activa` int(11) NOT NULL DEFAULT 0,
  `FechaModificacion` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- Volcando datos para la tabla ibero.catg_retroalimentacion: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `catg_retroalimentacion` DISABLE KEYS */;
/*!40000 ALTER TABLE `catg_retroalimentacion` ENABLE KEYS */;

-- Volcando estructura para tabla ibero.catg_sesiones
CREATE TABLE IF NOT EXISTS `catg_sesiones` (
  `idSesion` int(11) NOT NULL AUTO_INCREMENT,
  `idMateria` int(11) NOT NULL DEFAULT 0,
  `NombreSesion` varchar(150) NOT NULL DEFAULT '0',
  `FechaSesion` date DEFAULT NULL,
  `HoraInicio` time DEFAULT NULL,
  `HoraTermino` time DEFAULT NULL,
  `Link` varchar(150) DEFAULT NULL,
  `LinkDiferido` varchar(150) DEFAULT NULL,
  `Calificacion` float NOT NULL DEFAULT 0,
  `Eliminado` tinyint(4) NOT NULL DEFAULT 0,
  `fechaModificacion` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`idSesion`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla ibero.catg_sesiones: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `catg_sesiones` DISABLE KEYS */;
INSERT INTO `catg_sesiones` (`idSesion`, `idMateria`, `NombreSesion`, `FechaSesion`, `HoraInicio`, `HoraTermino`, `Link`, `LinkDiferido`, `Calificacion`, `Eliminado`, `fechaModificacion`) VALUES
	(1, 1, 'tyryre', '2020-04-14', '11:20:00', '00:00:00', 'http://localhost/iberoactualizado/campusvirtual/dist/general.php', '', 0, 0, '2020-04-14 23:17:01'),
	(2, 1, 'Segunda sesión', '2020-04-15', '14:50:00', '17:00:00', 'www.google.com', '', 0, 0, '2020-04-15 14:38:12'),
	(3, 2, 'Segunda sesión', '2020-04-02', '10:00:00', '22:00:00', 'www.google.com', '', 0, 0, '2020-04-17 00:52:59'),
	(4, 4, 'tyryre', '2020-04-01', '10:00:00', '11:00:00', 'www.google.com', '', 0, 0, '2020-04-17 11:22:47');
/*!40000 ALTER TABLE `catg_sesiones` ENABLE KEYS */;

-- Volcando estructura para tabla ibero.catg_sesionesgrabadas
CREATE TABLE IF NOT EXISTS `catg_sesionesgrabadas` (
  `idSesion` int(11) NOT NULL,
  `idMateria` int(11) NOT NULL DEFAULT 0,
  `NombreSesion` varchar(150) NOT NULL DEFAULT '0',
  `FechaSesion` date DEFAULT NULL,
  `HoraInicio` time DEFAULT NULL,
  `HoraTermino` time DEFAULT NULL,
  `Link` varchar(150) NOT NULL DEFAULT '0',
  `Calificacion` float NOT NULL DEFAULT 0,
  `Eliminado` tinyint(4) NOT NULL DEFAULT 0,
  `fechaModificacion` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- Volcando datos para la tabla ibero.catg_sesionesgrabadas: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `catg_sesionesgrabadas` DISABLE KEYS */;
/*!40000 ALTER TABLE `catg_sesionesgrabadas` ENABLE KEYS */;

-- Volcando estructura para tabla ibero.catg_tareas
CREATE TABLE IF NOT EXISTS `catg_tareas` (
  `idTarea` int(11) NOT NULL AUTO_INCREMENT,
  `idMateria` int(11) NOT NULL DEFAULT 0,
  `Tarea_tipo` int(11) NOT NULL DEFAULT 0,
  `TituloTarea` varchar(150) DEFAULT NULL,
  `Descripcion` varchar(250) DEFAULT NULL,
  `Link` varchar(250) DEFAULT NULL,
  `Archivo` varchar(250) DEFAULT NULL,
  `FechaEntrega` date DEFAULT NULL,
  `Eliminado` int(11) NOT NULL DEFAULT 0,
  `Activa` int(11) NOT NULL DEFAULT 0,
  `FechaModificacion` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idTarea`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- Volcando datos para la tabla ibero.catg_tareas: ~11 rows (aproximadamente)
/*!40000 ALTER TABLE `catg_tareas` DISABLE KEYS */;
INSERT INTO `catg_tareas` (`idTarea`, `idMateria`, `Tarea_tipo`, `TituloTarea`, `Descripcion`, `Link`, `Archivo`, `FechaEntrega`, `Eliminado`, `Activa`, `FechaModificacion`) VALUES
	(1, 1, 1, 'trabajo final31', 'dfiondifndf disf si', '3', 'kindpng_1660989.png', '2020-04-01', 0, 0, '2020-04-15 13:21:40'),
	(2, 1, 1, 'Nuevo trabajo prueba b', '4', 'https://mail.google.com/mail/u/0/?tab=rm&ogbl#inbox/FMfcgxwHMjjpzSxQvBjVMtksPbkWsWhS?projector=1&messagePartId=0.1', NULL, '2020-04-06', 0, 0, '2020-04-15 13:33:36'),
	(3, 1, 1, 'Trabajo', '', '', 'FORMATO DE RECETA DRA PAMELA M.pdf', '2020-04-16', 0, 0, '2020-04-15 13:52:34'),
	(4, 1, 1, 'Nuevo trabajo prueba', 'dfiondifndf disf si', 'https://mail.google.com/mail/u/0/?tab=rm&ogbl#inbox/FMfcgxwHMjjpzSxQvBjVMtksPbkWsWhS?projector=1&messagePartId=0.1', NULL, '2020-03-30', 0, 0, '2020-04-15 14:23:09'),
	(5, 1, 0, 'qe', '1', 'www.google.com', NULL, '2020-04-03', 0, 0, '2020-04-15 14:25:27'),
	(6, 1, 0, 'Nuevo trabajo prueba', '', '', NULL, '2020-04-02', 0, 0, '2020-04-15 14:25:45'),
	(7, 1, 1, '13', '', '', NULL, '2020-04-02', 0, 0, '2020-04-15 14:26:03'),
	(8, 1, 1, 'Nuevo trabajo prueba', 'eqw', 'https://mail.google.com/mail/u/0/?tab=rm&ogbl#inbox/FMfcgxwHMjjpzSxQvBjVMtksPbkWsWhS?projector=1&messagePartId=0.1', NULL, '2020-04-15', 0, 0, '2020-04-16 19:46:47'),
	(9, 1, 1, 'Nuevo trabajo prueba', '', '', NULL, '2020-04-03', 0, 0, '2020-04-17 13:20:04'),
	(10, 1, 1, 'knfken ek ew', '', '', NULL, '2020-04-16', 0, 0, '2020-04-17 13:20:14'),
	(11, 3, 0, 'Nuevo trabajo prueba', 'dfiondifndf disf si', '', NULL, '2020-04-16', 0, 0, '2020-04-20 22:28:30');
/*!40000 ALTER TABLE `catg_tareas` ENABLE KEYS */;

-- Volcando estructura para tabla ibero.catg_tareas_detalle
CREATE TABLE IF NOT EXISTS `catg_tareas_detalle` (
  `idTarea` int(11) NOT NULL AUTO_INCREMENT,
  `idSesion` int(11) NOT NULL DEFAULT 0,
  `Tarea_tipo` int(11) NOT NULL DEFAULT 0,
  `Archivo` varchar(250) DEFAULT NULL,
  `FechaEntrega` date DEFAULT NULL,
  `Eliminado` int(11) NOT NULL DEFAULT 0,
  `Activa` int(11) NOT NULL DEFAULT 0,
  `FechaAgrega` datetime NOT NULL DEFAULT current_timestamp(),
  `FechaModificacion` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`idTarea`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- Volcando datos para la tabla ibero.catg_tareas_detalle: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `catg_tareas_detalle` DISABLE KEYS */;
/*!40000 ALTER TABLE `catg_tareas_detalle` ENABLE KEYS */;

-- Volcando estructura para tabla ibero.catg_tipo_pago
CREATE TABLE IF NOT EXISTS `catg_tipo_pago` (
  `idtipopago` int(11) NOT NULL AUTO_INCREMENT,
  `Pago` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idtipopago`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla ibero.catg_tipo_pago: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `catg_tipo_pago` DISABLE KEYS */;
INSERT INTO `catg_tipo_pago` (`idtipopago`, `Pago`) VALUES
	(1, 'Mensual'),
	(2, 'Cuatrimestral'),
	(3, 'Semestral'),
	(4, 'Anual'),
	(5, 'Otros');
/*!40000 ALTER TABLE `catg_tipo_pago` ENABLE KEYS */;

-- Volcando estructura para tabla ibero.correo
CREATE TABLE IF NOT EXISTS `correo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL DEFAULT '0',
  `ap_paterno` varchar(50) NOT NULL DEFAULT '0',
  `ap_materno` varchar(50) NOT NULL DEFAULT '0',
  `sexo` varchar(50) NOT NULL DEFAULT '0',
  `correo` varchar(100) NOT NULL DEFAULT '0',
  `fecha_nacimiento` date DEFAULT NULL,
  `telefono` varchar(50) NOT NULL DEFAULT '0',
  `pass` varchar(50) NOT NULL DEFAULT '0',
  `fecha_inserccion` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla ibero.correo: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `correo` DISABLE KEYS */;
/*!40000 ALTER TABLE `correo` ENABLE KEYS */;

-- Volcando estructura para tabla ibero.documentos
CREATE TABLE IF NOT EXISTS `documentos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Correo` varchar(90) NOT NULL DEFAULT '0',
  `idArchivo` int(11) NOT NULL DEFAULT 0,
  `NombreArchivo` varchar(90) NOT NULL DEFAULT '0',
  `fechaCreacion` datetime NOT NULL DEFAULT current_timestamp(),
  `Eliminado` tinyint(4) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla ibero.documentos: ~7 rows (aproximadamente)
/*!40000 ALTER TABLE `documentos` DISABLE KEYS */;
INSERT INTO `documentos` (`id`, `Correo`, `idArchivo`, `NombreArchivo`, `fechaCreacion`, `Eliminado`) VALUES
	(1, 'ing.blancoross@gmail.com', 46, '46_BDIbero.xlsx', '2020-04-14 01:01:08', 0),
	(2, '', 25, '25_tarea.png', '2020-04-20 00:30:01', 0),
	(3, '', 26, '26_tarea.png', '2020-04-20 00:30:31', 0),
	(4, 'juanlabardiniflores@ideiberoamerica.com', 13, '13_FORMATO DE RECETA DRA PAMELA M.pdf', '2020-04-20 00:55:33', 1),
	(5, 'juanlabardiniflores@ideiberoamerica.com', 24, '24_analitica.png', '2020-04-20 00:56:14', 1),
	(6, 'juanlabardiniflores@ideiberoamerica.com', 16, '16_analitica.png', '2020-04-20 01:10:04', 1),
	(7, 'juanlabardiniflores@ideiberoamerica.com', 18, '18_open-file-icon.png', '2020-04-20 01:10:17', 1);
/*!40000 ALTER TABLE `documentos` ENABLE KEYS */;

-- Volcando estructura para tabla ibero.estatus
CREATE TABLE IF NOT EXISTS `estatus` (
  `id` int(11) DEFAULT NULL,
  `estatus` varchar(255) DEFAULT NULL,
  `eliminado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla ibero.estatus: ~6 rows (aproximadamente)
/*!40000 ALTER TABLE `estatus` DISABLE KEYS */;
INSERT INTO `estatus` (`id`, `estatus`, `eliminado`) VALUES
	(1, 'INSCRIPCIÓN', 0),
	(2, 'INSCRIPCIÓN INCOMPLETA', 0),
	(3, 'ADMITIDO', 0),
	(4, 'ESTUDIANTE', 0),
	(5, 'PAGO', 0),
	(6, 'RECIBO', 0);
/*!40000 ALTER TABLE `estatus` ENABLE KEYS */;

-- Volcando estructura para tabla ibero.login
CREATE TABLE IF NOT EXISTS `login` (
  `idUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `idAdmision` int(11) DEFAULT NULL,
  `idPosgrado` int(11) DEFAULT NULL,
  `Perfil` varchar(50) DEFAULT NULL,
  `Correo` varchar(100) DEFAULT NULL,
  `Pass` varchar(100) DEFAULT NULL,
  `Eliminado` int(11) DEFAULT NULL,
  `Bloqueado` int(11) DEFAULT NULL,
  `FechaModificacion` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`idUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla ibero.login: ~9 rows (aproximadamente)
/*!40000 ALTER TABLE `login` DISABLE KEYS */;
INSERT INTO `login` (`idUsuario`, `idAdmision`, `idPosgrado`, `Perfil`, `Correo`, `Pass`, `Eliminado`, `Bloqueado`, `FechaModificacion`) VALUES
	(1, 0, 0, 'Control Escolar', 'ing.blancoross@gmail.com', 'administracion', 0, 0, '2020-02-18 10:12:40'),
	(2, 0, 1, 'Docente', 'gustavoferrariwolfenson@ideiberoamerica.com', 'docente', 0, 0, '2020-02-18 10:18:37'),
	(3, 0, 1, 'Alumno', 'norbertoariasku@ideiberoamerica.com', 'alumno', 0, 0, '2020-02-18 10:18:59'),
	(4, 0, 1, 'Alumno', 'alumno2@gmail.com', 'alumno', 0, 0, '2020-02-18 10:18:59'),
	(5, 0, 1, 'Alumno', 'alumno3@gmail.com', 'alumno', 0, 0, '2020-02-18 10:18:59'),
	(6, 0, 2, 'Docente', 'docente2@gmail.com', 'docente', 0, 0, '2020-02-18 10:18:37'),
	(7, 0, 2, 'Alumno', 'alumno4@gmail.com', 'alumno', 0, 0, '2020-02-18 10:18:59'),
	(8, 0, 3, 'Alumno', 'alumno5@gmail.com', 'alumno', 0, 0, '2020-02-18 10:18:59'),
	(9, 0, 4, 'Alumno', 'alumno6@gmail.com', 'alumno', 0, 0, '2020-02-18 10:18:59');
/*!40000 ALTER TABLE `login` ENABLE KEYS */;

-- Volcando estructura para tabla ibero.mdcdh
CREATE TABLE IF NOT EXISTS `mdcdh` (
  `id` int(11) DEFAULT NULL,
  `fecha_inicial` varchar(255) DEFAULT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `ap_paterno` varchar(255) DEFAULT NULL,
  `ap_materno` varchar(255) DEFAULT NULL,
  `telefono` varchar(255) DEFAULT NULL,
  `email_particular` varchar(255) DEFAULT NULL,
  `sexo` varchar(255) DEFAULT NULL,
  `fecha_nac` varchar(255) DEFAULT NULL,
  `email_institucional` varchar(255) DEFAULT NULL,
  `pass` varchar(255) DEFAULT NULL,
  `curp` varchar(255) DEFAULT NULL,
  `calle` varchar(255) DEFAULT NULL,
  `num_int` varchar(255) DEFAULT NULL,
  `num_ext` varchar(255) DEFAULT NULL,
  `ciudad` varchar(255) DEFAULT NULL,
  `estado` varchar(255) DEFAULT NULL,
  `cod_postal` varchar(255) DEFAULT NULL,
  `periodo` varchar(255) DEFAULT NULL,
  `nacionalidad` varchar(255) DEFAULT NULL,
  `doc_acreditacion` varchar(255) DEFAULT NULL,
  `num_doc` varchar(255) DEFAULT NULL,
  `universidad` varchar(255) DEFAULT NULL,
  `pais_estudio` varchar(255) DEFAULT NULL,
  `estado_estudio` varchar(255) DEFAULT NULL,
  `tipo_titulo` varchar(255) DEFAULT NULL,
  `fecha_finalizacion` varchar(255) DEFAULT NULL,
  `doc_recibo` varchar(255) DEFAULT NULL,
  `doc_fotografia` varchar(255) DEFAULT NULL,
  `doc_acta` varchar(255) DEFAULT NULL,
  `doc_titulo` varchar(255) DEFAULT NULL,
  `doc_identificacion` varchar(255) DEFAULT NULL,
  `doc_cv` varchar(255) DEFAULT NULL,
  `doc_cert` varchar(255) DEFAULT NULL,
  `doc_cedula` varchar(255) DEFAULT NULL,
  `id_perfil` varchar(255) DEFAULT NULL,
  `id_posgrado` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `bloqueado` varchar(255) DEFAULT NULL,
  `eliminado` varchar(255) DEFAULT NULL,
  `ultimaActualizacion` varchar(255) DEFAULT NULL,
  `email_institucional_anterior` varchar(255) DEFAULT NULL,
  `pass_anterior` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla ibero.mdcdh: ~102 rows (aproximadamente)
/*!40000 ALTER TABLE `mdcdh` DISABLE KEYS */;
INSERT INTO `mdcdh` (`id`, `fecha_inicial`, `nombre`, `ap_paterno`, `ap_materno`, `telefono`, `email_particular`, `sexo`, `fecha_nac`, `email_institucional`, `pass`, `curp`, `calle`, `num_int`, `num_ext`, `ciudad`, `estado`, `cod_postal`, `periodo`, `nacionalidad`, `doc_acreditacion`, `num_doc`, `universidad`, `pais_estudio`, `estado_estudio`, `tipo_titulo`, `fecha_finalizacion`, `doc_recibo`, `doc_fotografia`, `doc_acta`, `doc_titulo`, `doc_identificacion`, `doc_cv`, `doc_cert`, `doc_cedula`, `id_perfil`, `id_posgrado`, `status`, `bloqueado`, `eliminado`, `ultimaActualizacion`, `email_institucional_anterior`, `pass_anterior`) VALUES
	(0, '43802.462975', 'Control Escolar', '', '', '0', 'ing.blancoross@gmail.com', 'MASCULINO', '43899', 'ing.blancoross@gmail.com', '', '', 'OSA MENOR', '15', '16', 'CENTRO', 'TABASCO', '86127', '2020', 'MEX', '', '', 'IUP', 'MEX', 'TAB', 'LICENCIATURA', '42803', '', '', '', '', '', '', '', '', '0', '0', '1', '0', '0', '43899.692037', 'ing.blancoross@gmail.com', 'IDE2020'),
	(1, '43802.462975', 'Norberto', 'Arias', 'Ku', '993 134 0914', '', 'MASCULINO', '30934', 'norbertoariasku@iide-edu.com', 'iide2020', '', 'OSA MENOR', '15', '16', 'CENTRO', 'TABASCO', '86127', '2020', 'MEX', '', '', 'IUP', 'MEX', 'TAB', 'LICENCIATURA', '42803', '', '', '', '', '', '', '', '', '1', '1', '1', '0', '0', '43899.692037', 'norbertoariasku@ideiberoamerica.com', 'IDE2020'),
	(2, '', 'Alan Gerardo', 'Arias', 'Flores', '', '', 'MASCULINO', '34237', 'alanariasflores@iide-edu.com', 'iide2020', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', 'TAB', 'LICENCIATURA', '', '', '', '', '', '', '', '', '', '1', '1', '1', '1', '0', '', 'alanariasflores@ideiberoamerica.com', 'IDE2020'),
	(3, '', 'Sandor', 'Arévalo', 'Zurita', '554 8422829', 'sandorarevalo@gmail.com', 'MASCULINO', '24871', 'sandorarevalozurita@iide-edu.com', 'iide2020', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', 'TAB', 'LICENCIATURA', '', '', '', '', '', '', '', '', '', '1', '1', '1', '0', '0', '', 'sandorarevalozurita@ideiberoamerica.com', 'IDE2020'),
	(4, '', 'Azalea', 'Argaiz', 'Gutiérrez', '991 234 5678', '', 'FEMENINO', '28841', 'azaleaargaizgutierrez@iide-edu.com', 'iide2020', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', 'TAB', 'LICENCIATURA', '', '', '', '', '', '', '', '', '', '1', '1', '1', '0', '0', '', 'azaleaargaizgutierrez@ideiberoamerica.com', 'IDE2020'),
	(5, '', 'Manuel', 'Castilla', 'de Alba', '461 220 2418', '', 'MASCULINO', '23316', 'manuelcastilladealba@iide-edu.com', 'iide2020', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', 'TAB', 'LICENCIATURA', '', '', '', '', '', '', '', '', '', '1', '1', '1', '0', '0', '', 'manuelcastilladealba@ideiberoamerica.com', 'IDE2020'),
	(6, '', 'Alfonso', 'Correa', 'Flores', '993 123 4567', '', 'MASCULINO', '22560', 'alfonsocorreaflores@iide-edu.com', 'iide2020', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', 'TAB', 'LICENCIATURA', '', '', '', '', '', '', '', '', '', '1', '1', '1', '1', '0', '', 'alfonsocorreaflores@ideiberoamerica.com', 'IDE2020'),
	(7, '', 'Mauricio', 'Corona', 'Espinosa', '443 257 3422', '', 'MASCULINO', '32363', 'mauriciocoronaespinosa@iide-edu.com', 'iide2020', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', 'TAB', 'LICENCIATURA', '', '', '', '', '', '', '', '', '', '1', '1', '1', '0', '0', '', 'mauriciocoronaespinosa@ideiberoamerica.com', 'IDE2020'),
	(8, '', 'José Antonio', 'Estrada', 'Murillo', '612 203 1854', '', 'MASCULINO', '34674', 'antonioestradamurillo@iide-edu.com', 'iide2020', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', 'TAB', 'LICENCIATURA', '', '', '', '', '', '', '', '', '', '1', '1', '1', '0', '0', '', 'antonioestradamurillo@ideiberoamerica.com', 'IDE2020'),
	(9, '', 'Eliaquín', 'García', 'Alvarado', '993 109 7768', '', 'MASCULINO', '30828', 'eliaquingarciaalvarado@iide-edu.com', 'iide2020', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', 'TAB', 'LICENCIATURA', '', '', '', '', '', '', '', '', '', '1', '1', '1', '0', '0', '', 'eliaquingarciaalvarado@ideiberoamerica.com', 'IDE2020'),
	(10, '', 'Fabiola del Carmen', 'Gutu', 'Jiménez', ' 993 387 2379', '', 'FEMENINO', '32380', 'fabiolagutujimenez@iide-edu.com', 'iide2020', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', 'TAB', 'LICENCIATURA', '', '', '', '', '', '', '', '', '', '1', '1', '1', '0', '0', '', 'fabiolagutujimenez@ideiberoamerica.com', 'IDE2020'),
	(11, '', 'Sonia Ivón', 'Huerta', 'Lazcano', '246 297 3006', 'ivonnhls@gmail.com', 'FEMENINO', '35460', 'soniahuertalazcano@iide-edu.com', 'iide2020', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', 'TAB', 'LICENCIATURA', '', '', '', '', '', '', '', '', '', '1', '', '1', '0', '0', '', 'soniahuertalazcano@ideiberoamerica.com', 'IDE2020'),
	(12, '', 'Felipe Ramón', 'López', 'Canabal', '993 143 8992', '', 'MASCULINO', '25081', 'felipelopezcanabal@iide-edu.com', 'iide2020', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', 'TAB', 'LICENCIATURA', '', '', '', '', '', '', '', '', '', '1', '1', '1', '0', '0', '', 'felipelopezcanabal@ideiberoamerica.com', 'IDE2020'),
	(13, '', 'Isidro', 'Miguel', 'Gutiérrez', '555 340 4600', '', 'MASCULINO', '28260', 'isidromiguelgutierrez@iide-edu.com', 'iide2020', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', 'TAB', 'LICENCIATURA', '', '', '', '', '', '', '', '', '', '1', '1', '1', '0', '0', '', 'isidromiguelgutierrez@ideiberoamerica.com', 'IDE2020'),
	(14, '', 'Mérida Mayra', 'Miranda', 'Ortega', '552 811 0985', '', 'FEMENINO', '26465', 'meridamirandaortega@iide-edu.com', 'iide2020', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', 'TAB', 'LICENCIATURA', '', '', '', '', '', '', '', '', '', '1', '1', '1', '0', '0', '', 'meridamirandaortega@ideiberoamerica.com', 'IDE2020'),
	(15, '', 'Ahída Rubí', 'Peña', 'Flores', '322 294 3048', '', 'FEMENINO', '32449', 'ahidapenaflores@iide-edu.com', 'iide2020', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', 'TAB', 'LICENCIATURA', '', '', '', '', '', '', '', '', '', '1', '1', '1', '0', '0', '', 'ahidapeñaflores@ideiberoamerica.com', 'IDE2020'),
	(16, '', 'Rogelio', 'Rodríguez', 'Luna', '612 117 4201', '', 'MASCULINO', '24235', 'rogeliorodriguezluna@iide-edu.com', 'iide2020', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', 'TAB', 'LICENCIATURA', '', '', '', '', '', '', '', '', '', '1', '1', '1', '0', '0', '', 'rogeliorodriguezluna@ideiberoamerica.com', 'IDE2020'),
	(17, '', 'María Antonieta', 'Rojas', 'Rivera', '443 221 1817', '', 'FEMENINO', '26120', 'mariarojasrivera@iide-edu.com', 'iide2020', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', 'TAB', 'LICENCIATURA', '', '', '', '', '', '', '', '', '', '1', '1', '1', '0', '0', '', 'mariarojasrivera@ideiberoamerica.com', 'IDE2020'),
	(18, '', 'Luis Enrique', 'Rosas', 'Díaz', '775 111 7944', '', 'MASCULINO', '34687', 'luisrosasdiaz@iide-edu.com', 'iide2020', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', 'TAB', 'LICENCIATURA', '', '', '', '', '', '', '', '', '', '1', '1', '1', '0', '0', '', 'luisrosasdiaz@ideiberoamerica.com', 'IDE2020'),
	(19, '', 'Ernesto Jaime', 'Ruiz', 'Pérez', '777 363 5944', '', 'MASCULINO', '', 'ernestoruizperez@iide-edu.com', 'iide2020', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', 'TAB', 'LICENCIATURA', '', '', '', '', '', '', '', '', '', '1', '1', '1', '1', '0', '', 'ernestoruizperez@ideiberoamerica.com', 'IDE2020'),
	(20, '', 'Luis Javier', 'Ventura', 'Frías', '993 231 6911', '', 'MASCULINO', '31545', 'javierventurafrias@iide-edu.com', 'iide2020', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', 'TAB', 'LICENCIATURA', '', '', '', '', '', '', '', '', '', '1', '1', '1', '0', '0', '', 'javierventurafrias@ideiberoamerica.com', 'IDE2020'),
	(21, '', 'Cristina Liliám', 'Aguirre ', 'Navarro ', '555 052 7177', '', 'FEMENINO', '', 'cristinaaguirrenavarro@iide-edu.com', 'iide2020', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', '', '', '', '', '', '', '', '', '', '', '', '1', '2', '1', '0', '0', '', 'cristinaaguirrenavarro@ideiberoamerica.com', 'IDE2020'),
	(22, '', 'Oscar', 'Álvarez ', 'Hernández', '993 126 1323', '', 'MASCULINO', '31060', 'oscaralvarezhernandez@iide-edu.com', 'iide2020', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', '', '', '', '', '', '', '', '', '', '', '', '1', '2', '1', '1', '0', '', 'oscaralvarezhernandez@ideiberoamerica.com', 'IDE2020'),
	(23, '', 'Rodolfo', 'Andrade ', 'del Fierro ', '', '', 'MASCULINO', '34051', 'rodolfoandradedelfierro@iide-edu.com', 'iide2020', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', '', '', '', '', '', '', '', '', '', '', '', '1', '2', '1', '1', '0', '', 'rodolfoandradedelfierro@ideiberoamerica.com', 'IDE2020'),
	(24, '', 'Sara Alicia', 'Avendaño', ' Alvarado ', '551 003 8916', '', 'FEMENINO', '', 'saraavendanoalvarado@iide-edu.com', 'iide2020', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', '', '', '', '', '', '', '', '', '', '', '', '1', '2', '1', '0', '0', '', 'saraavendañoalvarado@ideiberoamerica.com', 'IDE2020'),
	(25, '', 'Cupertino', 'Blancas', ' Cortés ', '443 338 4172', '', 'MASCULINO', '25829', 'cupertinoblancascortes@iide-edu.com', 'iide2020', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', '', '', '', '', '', '', '', '', '', '', '', '1', '2', '1', '0', '0', '', 'cupertinoblancascortes@ideiberoamerica', 'IDE2020'),
	(26, '', 'Diana Laura', 'Cabrera ', 'Gómez', '991 234 5678', '', 'FEMENINO', '35169', 'dianacabreragomez@iide-edu.com', 'iide2020', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', '', '', '', '', '', '', '', '', '', '', '', '1', '2', '1', '0', '0', '', 'dianacabreragomez@ideiberoamerica.com', 'IDE2020'),
	(27, '', 'Ramón', 'Cardona ', 'Durán ', '558 599 1682', '', 'MASCULINO', '31696', 'ramoncardonaduran@iide-edu.com', 'iide2020', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', '', '', '', '', '', '', '', '', '', '', '', '1', '2', '1', '0', '0', '', 'ramoncardonaduran@ideiberoamerica', 'IDE2020'),
	(28, '', 'Francisco de Jesús', 'David ', 'Hernández ', '993 308 4466', '', 'MASCULINO', '33838', 'franciscodavidhernandez@iide-edu.com', 'iide2020', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', '', '', '', '', '', '', '', '', '', '', '', '1', '2', '1', '1', '0', '', 'franciscodavidhernandez@ideiberoamerica', 'IDE2020'),
	(29, '', 'David Manuel', 'Estrada', ' Chan ', '993 129 9109', '', 'MASCULINO', '33657', 'davidestradachan@iide-edu.com', 'iide2020', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', '', '', '', '', '', '', '', '', '', '', '', '1', '2', '1', '0', '0', '', 'davidestradachan@ideiberoamerica', 'IDE2020'),
	(30, '', 'Héctor', 'Vera', 'García', '993 278 2637', '', 'MASCULINO', '27027', 'hectorveragarcia@iide-edu.com', 'iide2020', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', '', '', '', '', '', '', '', '', '', '', '', '1', '2', '1', '0', '0', '', 'hectorgarciavera@ideiberoamerica.com', 'IDE2020'),
	(31, '', 'Juan Francisco', 'Gastélum ', 'Ruelas ', '', '', 'MASCULINO', '', 'juangastelumruelas@iide-edu.com', 'iide2020', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', '', '', '', '', '', '', '', '', '', '', '', '1', '2', '1', '1', '0', '', 'juangastelumruelas@ideiberoamerica', 'IDE2020'),
	(32, '', 'Irving', 'Garrido ', 'Lastra ', '934 107 3177', '', 'MASCULINO', '', 'irvinggarridolastra@iide-edu.com', 'iide2020', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', '', '', '', '', '', '', '', '', '', '', '', '1', '2', '1', '0', '0', '', 'irvinggarridolastra@ideiberoamerica', 'IDE2020'),
	(33, '', 'Dany Alberto', 'Góngora', ' Moo ', '981 111 8580', '', 'MASCULINO', '30290', 'danygongoramoo@iide-edu.com', 'iide2020', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', '', '', '', '', '', '', '', '', '', '', '', '1', '2', '1', '0', '0', '', 'danygongoramoo@ideiberoamerica.com', 'IDE2020'),
	(34, '', 'Shantal', 'González ', 'Meneses', '553 903 5469', '', 'FEMENINO', '30961', 'shantalgonzalezmeneses@iide-edu.com', 'iide2020', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', '', '', '', '', '', '', '', '', '', '', '', '1', '2', '1', '0', '0', '', 'shantalgonzalesmeneses@ideiberoamerica.com', 'IDE2020'),
	(35, '', 'Arturo', 'Gutiérrez', ' Zamora', '747 225 0781', '', 'MASCULINO', '26337', 'arturogutierrezzamora@iide-edu.com', 'iide2020', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', '', '', '', '', '', '', '', '', '', '', '', '1', '2', '1', '0', '0', '', 'arturogutierrezzamora@ideiberoamerica.com', 'IDE2020'),
	(36, '', 'María Rosa', 'Guzmán', ' Valdez', '333 508 9949', '', 'FEMENINO', '28732', 'mariaguzmanvaldez@iide-edu.com', 'iide2020', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', '', '', '', '', '', '', '', '', '', '', '', '1', '2', '1', '0', '0', '', 'mariaguzmanvaldez@ideiberoamerica.com', 'IDE2020'),
	(37, '', 'Jacqueline', 'Karman ', 'Conde', '834 266 1791', '', 'FEMENINO', '33167', 'jacquelinekarmanconde@iide-edu.com', 'iide2020', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', '', '', '', '', '', '', '', '', '', '', '', '1', '2', '1', '0', '0', '', 'jaquelinekarmanconde@ideiberoamerica.com', 'IDE2020'),
	(38, '', 'Karla Casandra', 'Lara', ' Barragán ', '', '', 'FEMENINO', '32740', 'karlalarabarragan@iide-edu.com', 'iide2020', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', '', '', '', '', '', '', '', '', '', '', '', '1', '2', '1', '0', '0', '', 'karlalarabarragan@ideiberoamerica.com', 'IDE2020'),
	(39, '', 'Jesús David', 'Madrigal ', 'López ', '993 278 8508', '', 'MASCULINO', '31729', 'jesusmadrigallopez@iide-edu.com', 'iide2020', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', '', '', '', '', '', '', '', '', '', '', '', '1', '2', '1', '0', '0', '', 'jesusmadrigallopez@ideiberoamerica.com', 'IDE2020'),
	(40, '', 'Alejandro de Jesús', 'Martínez ', 'Ledesma ', '899 245 3905', '', 'MASCULINO', '33185', 'alejandromartinezledesma@iide-edu.com', 'iide2020', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', '', '', '', '', '', '', '', '', '', '', '', '1', '2', '1', '0', '0', '', 'alejandromartinezledesma@ideiberoamerica.com', 'IDE2020'),
	(41, '', 'Fabiola', 'Mauleón ', 'Pérez', '933 124 2796', '', 'FEMENINO', '32206', 'fabiolamauleonperez@iide-edu.com', 'iide2020', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', '', '', '', '', '', '', '', '', '', '', '', '1', '2', '1', '0', '0', '', 'fabiolamauleonperez@ideiberoamerica.com', 'IDE2020'),
	(42, '', 'Martha Leticia', 'Mercado ', 'Ramírez ', '555 340 4600', '', 'FEMENINO', '27626', 'marthamercadoramirez@iide-edu.com', 'iide2020', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', '', '', '', '', '', '', '', '', '', '', '', '1', '2', '1', '0', '0', '', 'marthamercadoramirez@ideiberoamerica.com', 'IDE2020'),
	(43, '', 'Yadira Yrazú', 'Orta ', 'Acosta ', '553 258 0291', '', 'FEMENINO', '', 'yadiraortaacosta@iide-edu.com', 'iide2020', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', '', '', '', '', '', '', '', '', '', '', '', '1', '2', '1', '0', '0', '', 'yadiraortaacosta@ideiberoamerica.com', 'IDE2020'),
	(44, '', 'Oscar Manuel', 'Ortiz ', 'Gallegos ', '833 388 0516', '', 'MASCULINO', '27786', 'oscarortizgallegos@iide-edu.com', 'iide2020', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', '', '', '', '', '', '', '', '', '', '', '', '1', '2', '1', '0', '0', '', 'oscarortizgallegos@ideiberoamerica.com', 'IDE2020'),
	(45, '', 'Adela', 'Ramos ', 'Sánchez ', '554 5754679', '', 'FEMENINO', '27744', 'adelaramossanchez@iide-edu.com', 'iide2020', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', '', '', '', '', '', '', '', '', '', '', '', '1', '2', '1', '0', '0', '', 'adelaramossanchez@ideiberoamerica.com', 'IDE2020'),
	(46, '', 'Néstor Enrique', 'Rivera ', 'López', '', '', 'MASCULINO', '31433', 'nestorriveralopez@iide-edu.com', 'iide2020', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', '', '', '', '', '', '', '', '', '', '', '', '1', '2', '1', '1', '0', '', 'nestorriveralopez@ideiberoamerica.com', 'IDE2020'),
	(47, '', 'César Augusto', 'Roldán', 'Flores ', '913 103 8620', '', 'MASCULINO', '', 'cesarroldanflores@iide-edu.com', 'iide2020', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', '', '', '', '', '', '', '', '', '', '', '', '1', '2', '1', '1', '0', '', 'cesarroldanflores@ideiberoamerica.com', 'IDE2020'),
	(48, '', 'Pedro Guadalupe', 'Ruiz ', 'Berzunza ', '961 353 5651', '', 'MASCULINO', '26591', 'pedroruizberzunza@iide-edu.com', 'iide2020', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', '', '', '', '', '', '', '', '', '', '', '', '1', '2', '1', '0', '0', '', 'pedroruizberzunza@ideiberoamerica.com', 'IDE2020'),
	(49, '', 'Nallely', 'Salas ', 'Vergara ', '744 259 8935', '', 'FEMENINO', '31990', 'nallelysalasvergara@iide-edu.com', 'iide2020', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', '', '', '', '', '', '', '', '', '', '', '', '1', '2', '1', '0', '0', '', 'nallelysalasvergara@ideiberoamerica.com', 'IDE2020'),
	(50, '', 'Raúl', 'Samaniego ', 'Alvarado ', '618 102 3942', '', 'MASCULINO', '', 'raulsamaniegoalvarado@iide-edu.com', 'iide2020', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', '', '', '', '', '', '', '', '', '', '', '', '1', '2', '1', '0', '0', '', 'raulsamaniegoalvarado@ideiberoamerica.com', 'IDE2020'),
	(51, '', 'Ricardo', 'Serrato ', 'Aguilar ', '442 258 0544', '', 'MASCULINO', '27853', 'ricardoserratoaguilar@iide-edu.com', 'iide2020', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', '', '', '', '', '', '', '', '', '', '', '', '1', '2', '1', '0', '0', '', 'ricardoserratoaguilar@ideiberoamerica.com', 'IDE2020'),
	(52, '', 'Alfonso', 'Torres ', 'Carrillo', '', '', 'MASCULINO', '31218', 'alfonsotorrescarrillo@iide-edu.com', 'iide2020', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', '', '', '', '', '', '', '', '', '', '', '', '1', '2', '1', '1', '0', '', 'alfonsotorrescarrillo@ideiberoamerica.com', 'IDE2020'),
	(53, '', 'Lázaro', 'Torruco ', 'Guzmán ', '993 385 9894', '', 'MASCULINO', '28615', 'lazarotorrucoguzman@iide-edu.com', 'iide2020', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', '', '', '', '', '', '', '', '', '', '', '', '1', '2', '1', '0', '0', '', 'lazarotorrucoguzman@ideiberoamerica.com', 'IDE2020'),
	(54, '', 'Krisna Judith', 'Villado ', 'Mejía', '899 318 4938', '', 'FEMENINO', '32192', 'krisnavilladomejia@iide-edu.com', 'iide2020', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', '', '', '', '', '', '', '', '', '', '', '', '1', '2', '1', '0', '0', '', 'krisnavilladomejia@ideiberoamerica.com', 'IDE2020'),
	(55, '', 'Luis Enrique', 'Zurita ', 'Osorio', '913 111 9528', '', 'MASCULINO', '24032', 'luiszuritaosorio@iide-edu.com', 'iide2020', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', '', '', '', '', '', '', '', '', '', '', '', '1', '2', '1', '1', '0', '', 'luiszuritaosorio@ideiberoamerica.com', 'IDE2020'),
	(56, '', 'Keila Yohana', 'Zurita', ' Roble', '916 187 4277', '', 'FEMENINO', '34526', 'keilazuritaroble@iide-edu.com', 'iide2020', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', '', '', '', '', '', '', '', '', '', '', '', '1', '2', '1', '0', '0', '', 'keilazuritaroble@ideiberoamerica.com', 'IDE2020'),
	(57, '', 'Karla Erandi', 'Zurita', 'Zamacona', '913 102 0064', '', 'FEMENINO', '', 'karlazuritazamacona@iide-edu.com', 'iide2020', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', '', '', '', '', '', '', '', '', '', '', '', '1', '2', '1', '0', '0', '', 'karlazuritazamacona@ideiberoamerica.com', 'IDE2020'),
	(58, '43802.462975', 'Quintín', 'Aran', 'Dovarganes', '228 304 5320', 'Quintin.Antar.Dovarganes@oplever.org.mx', 'MASCULINO', '', 'quintinarandovarganes@iide-edu.com', '', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', '', 'MAESTRIA', '', '', '', '', '', '', '', '', '', '1', '3', '1', '0', '0', '', 'quintinarandovarganes@ideiberoamerica.com', 'IDE2020'),
	(59, '', 'Iván', 'Arazo', 'Martínez', '551 632 3295', 'ivanarazomtz@gmail.com', 'MASCULINO', '30731', 'ivanarazomartinez@iide-edu.com', '', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', '', 'MAESTRIA', '', '', '', '', '', '', '', '', '', '1', '3', '1', '0', '0', '', 'ivanarazomartinez@ideiberoamerica.com', 'IDE2020'),
	(60, '', 'Georgina', 'Ávila', 'Silva', '614 161 5849', 'geoavila@hotmail.com', 'FEMENINO', '26961', 'georginaavilasilva@iide-edu.com', '', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', '', 'MAESTRIA', '', '', '', '', '', '', '', '', '', '1', '3', '1', '0', '0', '', 'georginaavilasilva@ideiberoamerica.com', 'IDE2020'),
	(61, '', 'Perla Lizette', 'Bueno', 'Torres', '667 228 0014', 'perlalbt@hotmail.com', 'FEMENINO', '33037', 'perlabuenotorres@iide-edu.com', '', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', '', 'MAESTRIA', '', '', '', '', '', '', '', '', '', '1', '3', '1', '0', '0', '', 'perlabuenotorres@ideiberoamerica.com', 'IDE2020'),
	(62, '', 'Luis Manuel', 'Colín', 'Muñiz', '559 197 5042', '', 'MASCULINO', '22068', 'luiscolinmuñiz@iide-edu.com', '', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', '', 'MAESTRIA', '', '', '', '', '', '', '', '', '', '1', '3', '1', '1', '0', '', 'luiscolinmuñiz@ideiberoamerica.com', 'IDE2020'),
	(63, '', 'Carolina', 'Del Ángel', 'Cruz', '551 849 6622', 'carolinadelangelcruz@gmail.com', 'FEMENINO', '27679', 'carolinadelangelcruz@iide-edu.com', '', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', '', 'MAESTRIA', '', '', '', '', '', '', '', '', '', '1', '3', '1', '0', '0', '', 'carolinadelangelcruz@ideiberoamerica.com', 'IDE2020'),
	(64, '', 'María Elena', 'Franco', 'Salinas', '551 843 7045', 'HELENAFASA2012@GMAIL.COM', 'FEMENINO', '28034', 'mariafrancosalinas@iide-edu.com', '', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', '', 'MAESTRIA', '', '', '', '', '', '', '', '', '', '1', '3', '1', '0', '0', '', 'mariafrancosalinas@ideiberoamerica.com', 'IDE2020'),
	(65, '', 'María de la Luz', 'García', 'Jiménez', '993 135 2228', 'malugarcia74@gmail.com', 'FEMENINO', '24957', 'mariagarciajimenez@iide-edu.com', '', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', '', 'MAESTRIA', '', '', '', '', '', '', '', '', '', '1', '3', '1', '0', '0', '', 'mariagarciajimenez@ideiberoamerica.com', 'IDE2020'),
	(66, '', 'Leopoldo José', 'García', 'Mendoza', '722 474 6923', 'leojos11@gmail.com', 'MASCULINO', '', 'leopoldogarciamendoza@iide-edu.com', '', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', '', 'MAESTRIA', '', '', '', '', '', '', '', '', '', '1', '3', '1', '0', '0', '', 'leopoldogarciamendoza@ideiberoamerica.com', 'IDE2020'),
	(67, '', 'Augusto', 'Hernández', 'Abogado', '771 216 5740', '', 'MASCULINO', '', 'augustohernandezabogado@iide-edu.com', '', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', '', 'MAESTRIA', '', '', '', '', '', '', '', '', '', '1', '3', '1', '1', '0', '', 'augustohernandezabogado@ideiberoamerica.com', 'IDE2020'),
	(68, '', 'Miguel Benjamín', 'Huizar', 'Martínez', '618 122 9511', 'mhuizar89@hotmail.com', 'MASCULINO', '21845', 'miguelhuizarmartinez@iide-edu.com', '', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', '', 'MAESTRIA', '', '', '', '', '', '', '', '', '', '1', '3', '1', '0', '0', '', 'miguelhuizarmartinez@ideiberoamerica.com', 'IDE2020'),
	(69, '', 'Leoncio', 'Ortiz', 'Guerra', '675 104 3940', 'leortiz21@hotmail.com', 'MASCULINO', '24067', 'leoncioortizguerra@iide-edu.com', '', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', '', 'MAESTRIA', '', '', '', '', '', '', '', '', '', '1', '3', '1', '0', '0', '', 'leoncioortizguerra@ideiberoamerica.com', 'IDE2020'),
	(70, '', 'Lucía', 'Pérez', 'Martínez', '553 208 2442', 'lucperezmtz@hotmail.com', 'FEMENINO', '24111', 'luciaperezmartinez@iide-edu.com', '', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', '', 'MAESTRIA', '', '', '', '', '', '', '', '', '', '1', '3', '1', '0', '0', '', 'luciaperezmartinez@ideiberoamerica.com', 'IDE2020'),
	(71, '', 'Anel Berenice', 'Ramírez', 'Ladrón de Guevara', '557 232 9273', '', 'FEMENINO', '26865', 'anelramirezladrondeguevara@iide-edu.com', '', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', '', 'MAESTRIA', '', '', '', '', '', '', '', '', '', '1', '3', '1', '1', '0', '', 'anelramirezladrondeguevara@ideiberoamerica.com', 'IDE2020'),
	(72, '', 'Maricruz', 'Valencia', 'Buendía', '722 380 7540', 'mvalenciabuendia@yahoo.com.mx', 'FEMENINO', '25515', 'maricruzvalenciabuendia@iide-edu.com', '', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', '', 'MAESTRIA', '', '', '', '', '', '', '', '', '', '1', '3', '1', '0', '0', '', 'maricruzvalenciabuendia@ideiberoamerica.com', 'IDE2020'),
	(73, '', 'Bernardo', 'Valle', 'Monroy', '551 353 1390', 'bvalle08@gmail.com', 'MASCULINO', '23743', 'bernardovallemonroy@iide-edu.com', '', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', '', 'MAESTRIA', '', '', '', '', '', '', '', '', '', '1', '3', '1', '0', '0', '', 'bernardovallemonroy@ideiberoamerica.com', 'IDE2020'),
	(74, '', 'Rodrigo', 'Véliz', 'Méndez', '876 023 0581', 'roypar2012@gmail.com', 'MASCULINO', '28004', 'rodrigovelizmendez@iide-edu.com', '', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', '', 'MAESTRIA', '', '', '', '', '', '', '', '', '', '1', '3', '1', '1', '0', '', 'rodrigovelizmendez@ideiberoamerica.com', 'IDE2020'),
	(75, '', 'Miguel Ángel', 'Vera', 'Martínez', '553 332 6047', 'miguel119@hotmail.com', 'MASCULINO', '27979', 'miguelveramartinez@iide-edu.com', '', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', '', 'MAESTRIA', '', '', '', '', '', '', '', '', '', '1', '3', '1', '0', '0', '', 'miguelveramartinez@ideiberoamerica.com', 'IDE2020'),
	(76, '', 'María Guadalupe', 'Arriaga', 'Vega', '722 127 6629', 'gpeadt@hotmail.com', 'MASCULINO', '23039', 'mariaarriagavega@iide-edu.com', '', '', 'OSA MENOR', '15', '16', 'CENTRO', 'TABASCO', '86127', '2020', 'MEX', '', '', 'IUP', 'MEX', 'TAB', 'MAESTRIA', '42803', '', '', '', '', '', '', '', '', '1', '4', '1', '0', '0', '43899.692037', 'mariaarriagavega@iideiberoamerica.com', 'IDE2020'),
	(77, '', 'Miguel', 'Ávila', 'Ortiz', '771 266 0866', 'lic.miguelao@gmail.com', 'MASCULINO', '', 'miguelavilaortiz@iide-edu.com', '', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', '', 'MAESTRIA', '', '', '', '', '', '', '', '', '', '1', '4', '1', '1', '0', '', 'miguelavilaortiz@iideiberoamerica.com', 'IDE2020'),
	(78, '', 'Elena', 'Brito', 'Casales', '777 344 1085', 'helenale45@hotmail.com', 'FEMENINO', '23621', 'helenabritocasales@iide-edu.com', '', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', '', 'MAESTRIA', '', '', '', '', '', '', '', '', '', '1', '4', '1', '0', '0', '', 'helenabritocasales@iideiberoamerica.com', 'IDE2020'),
	(79, '', 'Wilber', 'Centeno', 'Alamilla', '993 206 4862', 'wilcen18@hotmail.com', 'MASCULINO', '30577', 'wilbercentenoalamilla@iide-edu.com', '', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', '', 'MAESTRIA', '', '', '', '', '', '', '', '', '', '1', '4', '1', '0', '0', '', 'wilbercentenoalamilla@iideiberoamerica.com', 'IDE2020'),
	(80, '', 'David', 'Cerda', 'Zuñiga', '899 219 7164', 'davcer.ofi@gmail.com', 'MASCULINO', '31431', 'davidcerdazuñiga@iide-edu.com', '', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', '', 'MAESTRIA', '', '', '', '', '', '', '', '', '', '1', '4', '1', '0', '0', '', 'davidcerdazuñiga@iideiberoamerica.com', 'IDE2020'),
	(81, '', 'Enrique', 'Cruz', 'Durán', '961 129 5710', 'entrelolocalyloglobal@gmail.com', 'MASCULINO', '24246', 'carloscruzduran@iide-edu.com', '', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', '', 'MAESTRIA', '', '', '', '', '', '', '', '', '', '1', '4', '1', '1', '0', '', 'carloscruzduran@iideiberoamerica.com', 'IDE2020'),
	(82, '', 'Luis Fernando', 'Díaz', 'Carreón', '871 221 3698', 'lf_karate@yahoo.com.mx', 'MASCULINO', '', 'luisdiazcarreon@iide-edu.com', '', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', '', 'MAESTRIA', '', '', '', '', '', '', '', '', '', '1', '4', '1', '0', '0', '', 'luisdiazcarreon@iideiberoamerica.com', 'IDE2020'),
	(83, '', 'Teresa', 'Galván', 'Barragán', '767 107 9064', 'teresa.galvan@ine.mx', 'FEMENINO', '', 'teresagalvanbarragan@iide-edu.com', '', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', '', 'MAESTRIA', '', '', '', '', '', '', '', '', '', '1', '4', '1', '0', '0', '', 'teresagalvanbarragan@iideiberoamerica.com', 'IDE2020'),
	(84, '', 'Jesús Raciel', 'García', 'Ramírez', '771 207 3937', '', 'MASCULINO', '28794', 'jesusgarciaramirez@iide-edu.com', '', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', '', 'MAESTRIA', '', '', '', '', '', '', '', '', '', '1', '4', '1', '0', '0', '', 'jesusgarciaramirez@iideiberoamerica.com', 'IDE2020'),
	(85, '', 'Aracely', 'Gutiérrez', 'Cortés', '443 132 3788', 'araceli.gtz@hotmail.com', 'FEMENINO', '29980', 'aracelygutierrezcortes@iide-edu.com', '', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', '', 'MAESTRIA', '', '', '', '', '', '', '', '', '', '1', '4', '1', '0', '0', '', 'aracelygutierrezcortes@iideiberoamerica.com', 'IDE2020'),
	(86, '', 'Juan César', 'Hernández', 'Cruz', '983 154 4024', 'chycharo.911@hotmail.com', 'MASCULINO', '31222', 'juanhernandezcruz@iide-edu.com', '', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', '', 'MAESTRIA', '', '', '', '', '', '', '', '', '', '1', '4', '1', '0', '0', '', 'juanhernandezcruz@iideiberoamerica.com', 'IDE2020'),
	(87, '', 'Juan Rafael', 'Herrera', 'Quiñones', '618 169 8045', 'juanrafael.herrera@ine.mx', 'MASCULINO', '25135', 'juanherreraquiñones@iide-edu.com', '', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', '', 'MAESTRIA', '', '', '', '', '', '', '', '', '', '1', '4', '1', '0', '0', '', 'juanherreraquiñones@iideiberoamerica.com', 'IDE2020'),
	(88, '', 'Mayre', 'Lezama', 'Martínez', '271 210 0517', 'licmatylezama@gmail.com', 'FEMENINO', '32366', 'mayrelezamamartinez@iide-edu.com', '', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', '', 'MAESTRIA', '', '', '', '', '', '', '', '', '', '1', '4', '1', '0', '0', '', 'mayrelezamamartinez@iideiberoamerica.com', 'IDE2020'),
	(89, '', 'Maribel', 'Lima', 'Romero', '556 257 8575', 'maribel.lima1@gmail.com', 'FEMENINO', '31625', 'maribellimaromero@iide-edu.com', '', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', '', 'MAESTRIA', '', '', '', '', '', '', '', '', '', '1', '4', '1', '0', '0', '', 'maribellimaromero@iideiberoamerica.com', 'IDE2020'),
	(90, '', 'Claudia Lilia', 'Luna', 'Islas', '771 266 9852', 'clunaislas@gmail.com', 'FEMENINO', '', 'claudialunaislas@iide-edu.com', '', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', '', 'MAESTRIA', '', '', '', '', '', '', '', '', '', '1', '4', '1', '0', '0', '', 'claudialunaislas@iideiberoamerica.com', 'IDE2020'),
	(91, '', 'Daniel', 'Morales', 'Elizalde', '556 084 7091', 'dmelizalde20@hotmail.com', 'MASCULINO', '32162', 'danielmoraleselizalde@iide-edu.com', '', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', '', 'MAESTRIA', '', '', '', '', '', '', '', '', '', '1', '4', '1', '0', '0', '', 'danielmoraleselizalde@iideiberoamerica.com', 'IDE2020'),
	(92, '', 'Oswaldo', 'Muñoz', 'Cortés', '553 810 7811', 'oswaldosk2@yahoo.com.mx', 'MASCULINO', '', 'oswaldomuñozcortes@iide-edu.com', '', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', '', 'MAESTRIA', '', '', '', '', '', '', '', '', '', '1', '4', '1', '0', '0', '', 'oswaldomuñozcortes@iideiberoamerica.com', 'IDE2020'),
	(93, '', 'Jesús', 'Núñez', 'Nava', '933 329 4966', 'jesusnueznava@yahoo.es', 'MASCULINO', '23593', 'jesusnuñeznava@iide-edu.com', '', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', '', 'MAESTRIA', '', '', '', '', '', '', '', '', '', '1', '4', '1', '1', '0', '', 'jesusnuñeznava@iideiberoamerica.com', 'IDE2020'),
	(94, '', 'Beatriz Teresa', 'Pérez', 'Espitia', '644 462 3719', 'beatriz.perez@congresogto.gob.mx', 'FEMENINO', '23972', 'beatrizperezespitia@iide-edu.com', '', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', '', 'MAESTRIA', '', '', '', '', '', '', '', '', '', '1', '4', '1', '0', '0', '', 'beatrizperezespitia@iideiberoamerica.com', 'IDE2020'),
	(95, '', 'Jorge Efraín', 'Pérez', 'Galicia', '551 363 2702', 'egrojegroj@gmail.com', 'MASCULINO', '26379', 'jorgeperezgalicia@iide-edu.com', '', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', '', 'MAESTRIA', '', '', '', '', '', '', '', '', '', '1', '4', '1', '0', '0', '', 'jorgeperezgalicia@iideiberoamerica.com', 'IDE2020'),
	(96, '', 'Onésimo Tomás', 'Poot', 'Martínez', '983 138 6760', 'onepoot@hotmail.com', 'MASCULINO', '18935', 'onesimopootmartinez@iide-edu.com', '', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', '', 'MAESTRIA', '', '', '', '', '', '', '', '', '', '1', '4', '1', '1', '0', '', 'onesimopootmartinez@iideiberoamerica.com', 'IDE2020'),
	(97, '', 'Adolfo', 'Román', 'Montero', '554 771 2436', 'licadolform@yahoo.com.mx', 'MASCULINO', '29493', 'adolforomanmontero@iide-edu.com', '', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', '', 'MAESTRIA', '', '', '', '', '', '', '', '', '', '1', '4', '1', '1', '0', '', 'adolforomanmontero@iideiberoamerica.com', 'IDE2020'),
	(98, '', 'Francisco Jesús', 'Ruiz', 'Hernández', '664 123 0064', 'francisco.ruhe@gmail.com', 'MASCULINO', '', 'franciscoruizhernandez@iide-edu.com', '', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', '', 'MAESTRIA', '', '', '', '', '', '', '', '', '', '1', '4', '1', '0', '0', '', 'franciscoruizhernandez@iideiberoamerica.com', 'IDE2020'),
	(99, '', 'Eduardo', 'Salgado', 'Pedraza', '722 215 3519', 'salgadoe71@gmail.com', 'MASCULINO', '26275', 'eduardosalgadopedraza@iide-edu.com', '', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', '', 'MAESTRIA', '', '', '', '', '', '', '', '', '', '1', '4', '1', '0', '0', '', 'eduardosalgadopedraza@iideiberoamerica.com', 'IDE2020'),
	(100, '', 'Rafael', 'Sánchez', 'Hernández', '228 140 6408', 'rafas21@yahoo.com.mx', 'MASCULINO', '', 'rafaelsanchezhernandez@iide-edu.com', '', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', '', 'MAESTRIA', '', '', '', '', '', '', '', '', '', '1', '4', '1', '0', '0', '', 'rafaelsanchezhernandez@iideiberoamerica.com', 'IDE2020'),
	(101, '', 'Alejandro Moctezuma', 'Zapata', 'Cabrera', '961 177 3347', 'alejandrozapat@hotmail.com', 'MASCULINO', '', 'alejandrozapatacabrera@iide-edu.com', '', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', '', 'MAESTRIA', '', '', '', '', '', '', '', '', '', '1', '4', '1', '0', '0', '', 'alejandrozapatacabrera@iideiberoamerica.com', 'IDE2020');
/*!40000 ALTER TABLE `mdcdh` ENABLE KEYS */;

-- Volcando estructura para tabla ibero.sta_grupos
CREATE TABLE IF NOT EXISTS `sta_grupos` (
  `id` int(11) DEFAULT NULL,
  `Estatus` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla ibero.sta_grupos: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `sta_grupos` DISABLE KEYS */;
INSERT INTO `sta_grupos` (`id`, `Estatus`) VALUES
	(0, 'Activo'),
	(1, 'Inactivo');
/*!40000 ALTER TABLE `sta_grupos` ENABLE KEYS */;

-- Volcando estructura para tabla ibero.sta_materias
CREATE TABLE IF NOT EXISTS `sta_materias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Estatus` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla ibero.sta_materias: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `sta_materias` DISABLE KEYS */;
INSERT INTO `sta_materias` (`id`, `Estatus`) VALUES
	(0, 'Cursada'),
	(1, 'En Curso'),
	(2, 'Programada'),
	(3, 'Reactivación'),
	(4, 'Por Programar');
/*!40000 ALTER TABLE `sta_materias` ENABLE KEYS */;

-- Volcando estructura para tabla ibero.sta_pago
CREATE TABLE IF NOT EXISTS `sta_pago` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Estatus` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- Volcando datos para la tabla ibero.sta_pago: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `sta_pago` DISABLE KEYS */;
INSERT INTO `sta_pago` (`id`, `Estatus`) VALUES
	(1, 'Parcial'),
	(2, 'Total'),
	(3, 'Adeudo');
/*!40000 ALTER TABLE `sta_pago` ENABLE KEYS */;

-- Volcando estructura para tabla ibero.sta_pago_concepto
CREATE TABLE IF NOT EXISTS `sta_pago_concepto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Concepto` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla ibero.sta_pago_concepto: ~11 rows (aproximadamente)
/*!40000 ALTER TABLE `sta_pago_concepto` DISABLE KEYS */;
INSERT INTO `sta_pago_concepto` (`id`, `Concepto`) VALUES
	(1, 'Inscripción'),
	(2, 'Inscripción y Mensualidad'),
	(3, 'Reinscripción'),
	(4, 'Reinscripción y Mensualidad'),
	(5, 'Mensualidad'),
	(6, 'Pago de Servicios Escolares'),
	(7, 'Cuatrimestre'),
	(8, 'Semestre'),
	(9, 'Anualidad'),
	(10, 'Titulación'),
	(11, 'Pago de servicios escolares');
/*!40000 ALTER TABLE `sta_pago_concepto` ENABLE KEYS */;

-- Volcando estructura para tabla ibero.tareas
CREATE TABLE IF NOT EXISTS `tareas` (
  `idTareaDetalle` int(11) NOT NULL AUTO_INCREMENT,
  `idMateria` int(11) NOT NULL DEFAULT 0,
  `idUsuario` varchar(150) DEFAULT NULL,
  `Adjunto` varchar(150) DEFAULT NULL,
  `Descripcion` varchar(250) DEFAULT NULL,
  `Link` varchar(250) DEFAULT NULL,
  `Eliminado` int(11) NOT NULL DEFAULT 0,
  `Activa` int(11) NOT NULL DEFAULT 0,
  `FechaModificacion` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`idTareaDetalle`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- Volcando datos para la tabla ibero.tareas: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tareas` DISABLE KEYS */;
/*!40000 ALTER TABLE `tareas` ENABLE KEYS */;

-- Volcando estructura para tabla ibero.usuario
CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_inicio` datetime DEFAULT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `ap_paterno` varchar(255) DEFAULT NULL,
  `ap_materno` varchar(255) DEFAULT NULL,
  `telefono` varchar(50) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `sexo` varchar(255) DEFAULT NULL,
  `fecha_nac` date DEFAULT NULL,
  `emailInst` varchar(150) DEFAULT NULL,
  `calle` varchar(150) DEFAULT NULL,
  `num_int` varchar(50) DEFAULT NULL,
  `num_ext` varchar(50) DEFAULT NULL,
  `ciudad` varchar(150) DEFAULT NULL,
  `estado` varchar(100) DEFAULT NULL,
  `cod_postal` int(11) DEFAULT NULL,
  `periodo` varchar(50) DEFAULT NULL,
  `nacionalidad` varchar(50) DEFAULT NULL,
  `doc_acreditacion` int(11) DEFAULT NULL,
  `num_doc` varchar(50) DEFAULT NULL,
  `universidad` varchar(150) DEFAULT NULL,
  `pais_estudio` varchar(50) DEFAULT NULL,
  `estado_estudio` varchar(50) DEFAULT NULL,
  `tipo_titulo` varchar(150) DEFAULT NULL,
  `fecha_finalizacion` date DEFAULT NULL,
  `doc_recibo` varchar(100) DEFAULT NULL,
  `doc_fotografia` varchar(100) DEFAULT NULL,
  `doc_acta` varchar(100) DEFAULT NULL,
  `doc_titulo` varchar(100) DEFAULT NULL,
  `doc_identificacion` varchar(100) DEFAULT NULL,
  `doc_cv` varchar(100) DEFAULT NULL,
  `doc_cert` varchar(100) DEFAULT NULL,
  `doc_cedula` varchar(100) DEFAULT NULL,
  `id_posgrado` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `bloqueado` int(11) DEFAULT 0,
  `eliminado` int(11) DEFAULT 0,
  `ultimaActualizacion` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=138 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla ibero.usuario: ~137 rows (aproximadamente)
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` (`id`, `fecha_inicio`, `nombre`, `ap_paterno`, `ap_materno`, `telefono`, `email`, `sexo`, `fecha_nac`, `emailInst`, `calle`, `num_int`, `num_ext`, `ciudad`, `estado`, `cod_postal`, `periodo`, `nacionalidad`, `doc_acreditacion`, `num_doc`, `universidad`, `pais_estudio`, `estado_estudio`, `tipo_titulo`, `fecha_finalizacion`, `doc_recibo`, `doc_fotografia`, `doc_acta`, `doc_titulo`, `doc_identificacion`, `doc_cv`, `doc_cert`, `doc_cedula`, `id_posgrado`, `status`, `bloqueado`, `eliminado`, `ultimaActualizacion`) VALUES
	(1, '2019-12-03 11:06:41', 'Norberto', 'Arias', 'Ku', '7712660866', 'lic.miguelao@gmail.com', 'MASCULINO', '1990-03-09', 'norbertoariasku@ideiberoamerica.com', 'OSA MENOR', '15', '16', 'CENTRO', 'TABASCO', 86127, '2020', 'MEX', NULL, NULL, 'IUP', 'MEX', 'TAB', 'MAESTRIA', '2017-03-09', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 0, 0, '2020-03-09 16:36:32'),
	(2, '2019-12-02 15:23:25', 'ALEJANDRO MOCTEZUMA', 'ZAPATA CABRERA', '', '9611773347', 'alejandrozapat@hotmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, 1, 0, 0, '2020-01-28 15:46:10'),
	(3, '2019-11-27 12:54:06', 'CLAUDIA LILIA', 'LUNA ISLAS', '', '7712205773', 'clunaislas@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, 1, 0, 0, '2020-01-28 15:46:10'),
	(4, '2019-11-21 10:46:22', 'Raúl', 'Samaniego Alvarado', '', '6181023942', 'raulsamal@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 0, 0, '2020-01-28 15:46:10'),
	(5, '2019-11-20 15:55:04', 'Francisco Antonio', 'Aguilar Salmeron', '', '79218769', 'rebelion32@hotmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 1, 0, 0, '2020-01-28 15:46:10'),
	(6, '2019-11-14 17:20:37', 'Oswaldo', 'Muñoz Cortés', '', '5538107811', 'oswaldosk2@yahoo.com.mx', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, 1, 0, 0, '2020-01-28 15:46:10'),
	(7, '2019-11-13 15:18:41', 'SANDRA LUZ', 'GRAVE PRADO', '', '6951144141', 'sgrave9@hotmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 2, 0, 0, '2020-01-28 15:46:10'),
	(8, '2019-11-11 18:05:22', 'TERESA', 'GALVÁN BARRAGÁN', '', '7671079064', 'teresa.galvan@ine.mx', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, 1, 0, 0, '2020-01-28 15:46:10'),
	(9, '2019-11-11 10:15:41', 'Sara Alicia', 'Alvarado Avendaño', '', '5510038916', 'laps57_@hotmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 0, 0, '2020-01-28 15:46:10'),
	(10, '2019-11-08 17:40:27', 'Irvyng', 'Garrido Lastra', '', '9341073177', 'irvingglastra95@hotmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 0, 0, '2020-01-28 15:46:10'),
	(11, '2019-11-08 11:44:40', 'ROCIO GUADALUPE', 'ESPINO PLASCENCIA', '', '3312700091', 'rocio.espino@ine.mx', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 2, 0, 0, '2020-01-28 15:46:10'),
	(12, '2019-11-05 16:15:51', 'LEOPOLDO JOSE', 'GARCÍA MENDOZA', '', '7224746923', 'leojos11@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 1, 0, 0, '2020-01-28 15:46:10'),
	(13, '2019-11-05 15:40:42', 'Rafael', 'Sánchez Hernández', '', '2281406408', 'rafas21@yahoo.com.mx', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, 1, 0, 0, '2020-01-28 15:46:10'),
	(14, '2019-11-05 09:15:30', 'luis fernando', 'diaz carreon', '', '8712213698', 'lf_karate@yahoo.com.mx', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, 1, 0, 0, '2020-01-28 15:46:10'),
	(15, '2019-11-04 23:10:31', 'Marco Antonio', 'Martinez Casanova', '', '4921267981', 'axor2001@hotmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, 1, 0, 0, '2020-01-28 15:46:10'),
	(16, '2019-11-02 12:38:07', 'Francisco Jesús', 'Ruiz Hernández', '', '6641230064', 'francisco.ruhe@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, 1, 0, 0, '2020-01-28 15:46:10'),
	(17, '2019-10-23 10:49:54', 'CRISTINA LILIAM', 'AGUIRRE NAVARRO', '', '5550527177', 'cristina.aguirren@ine.mx', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 0, 0, '2020-01-28 15:46:10'),
	(18, '2019-10-11 18:20:26', 'DANNY ALBERTO', 'GONGORA MOO', '', '9811118580', 'danny-gongora@hotmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 0, 0, '2020-01-28 15:46:10'),
	(19, '2019-10-04 16:23:35', 'Vicenta', 'Molina Revuelta', '', '7471435533', 'vicenta.molina@iepcgro.mx', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, 1, 0, 0, '2020-01-28 15:46:10'),
	(20, '2019-10-03 13:54:51', 'fabiola', 'mauleón pérez', '', '9331242796', 'fabiola.mauleon@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 2, 0, 0, '2020-01-28 15:46:10'),
	(21, '2019-10-03 13:52:45', 'Onesimo', 'Tomas Poot', '', '9831386760', 'onepoot@hotmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, 2, 0, 0, '2020-01-28 15:46:10'),
	(22, '2019-10-03 13:46:27', 'PEDRO GUADALUPE', 'RUIZ BERZUNZA', '', '9613535651', 'rberzunza@hotmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 0, 0, '2020-01-28 15:46:10'),
	(23, '2019-10-02 17:20:18', 'MARIA ELENA', 'FRANCO SALINAS', '', '5518437045', 'HELENAFASA2012@GMAIL.COM', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 1, 0, 0, '2020-01-28 15:46:10'),
	(24, '2019-10-02 08:32:49', 'Fabiola Esmeralda', 'Morales Araujo', '', '3513172722', 'fabiola.morales@ine.mx', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 2, 0, 0, '2020-01-28 15:46:10'),
	(25, '2019-09-30 13:09:42', 'Helena', 'Brito', 'Casales', '7773441085', 'helena45@hotmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, 1, 0, 0, '2020-01-28 15:46:10'),
	(26, '2019-09-30 13:09:42', 'Helena', 'Brito', 'Casales', '7773441085', 'helena45@hotmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, 1, 0, 0, '2020-01-28 15:46:10'),
	(27, '2019-09-27 14:34:23', 'Gonzalo', 'Rodríguez Miranda', '', '9333275186', 'gonzalo.rodriguez@ine.mx', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, 2, 0, 0, '2020-01-28 15:46:10'),
	(28, '2019-09-26 13:40:28', 'María Rosa', 'Guzmán Valdez', '', '3335089949', 'guzmanrossana13@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 0, 0, '2020-01-28 15:46:10'),
	(29, '2019-09-26 12:15:11', 'Iram Yovan', 'Sanchez Gomez', '', '9191247941', 'iram.sanchez@ine.mx', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, 1, 0, 0, '2020-01-28 15:46:10'),
	(30, '2019-09-23 09:27:40', 'NETZER', 'VILLAFUERTE AGUAYO', '', '6461416227', 'netzer.villafuerte@ine.mx', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 2, 0, 0, '2020-01-28 15:46:10'),
	(31, '2019-09-18 21:59:08', 'RENE DE JESUS', 'PASTELIN BORGES', '', '2383904649', 'reneborges_42@hotmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 0, 0, '2020-01-28 15:46:10'),
	(32, '2019-09-17 17:34:51', 'RIGOBERTO', 'GALLEGOS CONTRERAS', '', '7443261180', 'lic-rigoberto2011@hotmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 2, 0, 0, '2020-01-28 15:46:10'),
	(33, '2019-09-09 09:40:16', 'Ricardo', 'Serrato Aguilar', '', '4422580544', 'ricardoseag@hotmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 0, 0, '2020-01-28 15:46:10'),
	(34, '2019-09-02 22:07:10', 'Adrián Donato', 'Pérez Carrilo', '', '9531256791', 'adrian.perez@ine.mx', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, 1, 0, 0, '2020-01-28 15:46:10'),
	(35, '2019-09-02 15:56:47', 'Gustavo Alberto', 'Pérez Javier', '', '9932308537', 'gustavo.alberto@c-developers.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 0, 0, '2020-01-28 15:46:10'),
	(36, '2019-08-28 22:07:43', 'Carlos Enrique', 'Cruz Durán', '', '9611295710', 'entrelolocalyloglobal@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, 1, 0, 0, '2020-01-28 15:46:10'),
	(37, '2019-08-23 10:27:47', 'Freddie', 'Aguilar Aguilar', '', '9512378943', 'fredoiz@hotmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 2, 0, 0, '2020-01-28 15:46:10'),
	(38, '2019-08-22 18:09:08', 'Maria Guadalupe', 'Arriaga Vega', '', '7222611594', 'gpeadt@hotmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, 2, 0, 0, '2020-01-28 15:46:10'),
	(39, '2019-08-22 14:20:20', 'Ernesto Jaime', 'Ruiz Perez', '', '7773635944', 'lapalabra1965@hotmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 2, 0, 0, '2020-01-28 15:46:10'),
	(40, '2019-08-22 12:53:32', 'Maricruz', 'Valencia Buendia', '', '7223807540', 'mvalenciabuendia@yahoo.com.mx', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 1, 0, 0, '2020-01-28 15:46:10'),
	(41, '2019-08-21 16:54:33', 'Elizabeth', 'Diaz Reyes', '', '5517425626', 'elizabeth.dr@hotmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 2, 0, 0, '2020-01-28 15:46:10'),
	(42, '2019-08-21 13:54:40', 'Isidro', 'Miguel Gutiérrez', '', '53404600', 'imiguel77@hotmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 0, 0, '2020-01-28 15:46:10'),
	(43, '2019-08-21 11:57:09', 'Arturo', 'Gutiérrez Zamora', '', '7472250781', 'lider_artur@hotmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 0, 0, '2020-01-28 15:46:10'),
	(44, '2019-08-20 14:33:57', 'Verónica', 'Hernández Carmona', '', '2411107173', 'veronaverone@hotmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 0, 0, '2020-01-28 15:46:10'),
	(45, '2019-08-20 13:50:14', 'Raul', 'Flores Bernal', '', '7222476089', 'raultribunal@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 2, 0, 0, '2020-01-28 15:46:10'),
	(46, '2019-08-20 10:33:22', 'Wilber', 'Centeno Alamilla', '', '9932064862', 'wilcen18@hotmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, 1, 0, 0, '2020-01-28 15:46:10'),
	(47, '2019-08-19 20:13:22', 'LUIS JAVIER', 'VENTURA FRIAS', '', '9932316911', 'luisx_ventura@hotmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 0, 0, '2020-01-28 15:46:10'),
	(48, '2019-08-18 13:45:11', 'FABIOLA DEL CARMEN', 'GUTU JIMENEZ', '', '9933872379', 'fjimenita@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 0, 0, '2020-01-28 15:46:10'),
	(49, '2019-08-14 09:23:08', 'Alvarez', 'Alvarez Hernandez 34', '', '9931261323', 'oscar.alvarez.hdz@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 0, 0, '2020-01-28 15:46:10'),
	(50, '2019-08-13 11:28:35', 'beatriz teresa', 'perez espitia', '', '6444623719', 'beatriz.perez@congresogto.gob.mx', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, 1, 0, 0, '2020-01-28 15:46:10'),
	(51, '2019-08-10 15:12:48', 'LUCIA', 'PEREZ MARTINEZ', '', '5532082442', 'lucperezmtz@hotmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 1, 0, 0, '2020-01-28 15:46:10'),
	(52, '2019-08-08 20:33:22', 'LEONCIO', 'ORTIZ GUERRA', '', '6751043940', 'leortiz21@hotmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 2, 0, 0, '2020-01-28 15:46:10'),
	(53, '2019-08-08 13:43:09', 'Zoad Jeanine', 'García González', '', '3781165133', 'zoad.garcia@ine.mx', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 2, 0, 0, '2020-01-28 15:46:10'),
	(54, '2019-08-07 20:45:25', 'Raúl', 'Reyes Trejo', '', '4427478219', 'lic.raul.reyes@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 1, 0, 0, '2020-01-28 15:46:10'),
	(55, '2019-08-07 12:11:47', 'Berenice Anel', 'Ramírez Ladrón de Guevara', '', '5572329273', 'beleguistubi@yahoo.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 1, 0, 0, '2020-01-28 15:46:10'),
	(56, '2019-08-05 12:30:48', 'Maribel', 'Lima Romero', '', '5562578575', 'maribel.lima1@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, 1, 0, 0, '2020-01-28 15:46:10'),
	(57, '2019-08-02 12:05:04', 'ivan', 'Arazo Martínez', '', '5516323295', 'ivanarazomtz@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 1, 0, 0, '2020-01-28 15:46:10'),
	(58, '2019-07-30 18:42:40', 'Mérida Mayra', 'Miranda Ortega', '', '5528110985', 'mery-ortega@hotmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 0, 0, '2020-01-28 15:46:10'),
	(59, '2019-07-28 22:22:58', 'Perla Lyzette', 'Bueno Torres', '', NULL, 'perlalbt@hotmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 1, 0, 0, '2020-01-28 15:46:10'),
	(60, '2019-07-12 13:57:03', 'ELIZABETH', 'PIEDRAS MARTINEZ', '', '2461025246', 'epp_epm@hotmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, 1, 0, 0, '2020-01-28 15:46:10'),
	(61, '2019-07-10 17:55:56', 'Ahída Rubí', 'Peña Flores', '', '3222943048', 'ahida_ruby@hotmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 2, 0, 0, '2020-01-28 15:46:10'),
	(62, '2019-07-02 12:25:31', 'JUAN RAFAEL', 'HERRERA QUIÑONES', '', '6188323130', 'juanrafael.herrera@ine.mx', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, 4, 0, 0, '2020-01-28 15:46:10'),
	(63, '2019-07-01 15:34:32', 'Gilberto', 'Campeche Ponce de León', '', '2461044025', 'campechegilberto75@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 1, 0, 0, '2020-01-28 15:46:10'),
	(64, '2019-06-28 14:31:10', 'Francisco Javier', 'Pérez', 'Lugo', NULL, 'javierpl8@live.com.mx', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 1, 0, 0, '2020-01-28 15:46:10'),
	(65, '2019-06-28 14:26:40', 'Luis Manuel', 'Colin Muñiz', 'Muñiz', '5591975042', 'luis_m_colin@yahoo.com.mx', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 1, 0, 0, '2020-01-28 15:46:10'),
	(66, '2019-06-27 21:21:06', 'Janet', 'Ramírez', 'Suárez', '5543562070', 'janeth.ramirez@iecm.mx', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, 1, 0, 0, '2020-01-28 15:46:10'),
	(67, '2019-06-27 19:34:21', 'Bernardo', 'Valle', 'Monroy', '5513531390', 'bvalle08@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 1, 0, 0, '2020-01-28 15:46:10'),
	(68, '2019-06-27 18:34:53', 'SHANTAL', 'GONZALEZ MENESES', '', '5539035469', 'shantal@live.com.mx', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 0, 0, '2020-01-28 15:46:10'),
	(69, '2019-06-27 18:27:22', 'ADOLFO', 'ROMAN MONTERO', '', '5547712436', 'licadolform@yahoo.com.mx', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, 1, 0, 0, '2020-01-28 15:46:10'),
	(70, '2019-06-27 17:59:44', 'Sergio', 'Castañeda Rodrìguez', '', '9983116806', 's13015348@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, 1, 0, 0, '2020-01-28 15:46:10'),
	(71, '2019-06-27 09:40:09', 'Alejandro de Jesús', 'Martínez Ledesma', '', '8992453905', 'martinezledesmaa@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 0, 0, '2020-01-28 15:46:10'),
	(72, '2019-06-26 09:05:37', 'Jorge Efraín', 'Pérez Galicia', '', '5513632702', 'egrojegroj@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, 1, 0, 0, '2020-01-28 15:46:10'),
	(73, '2019-06-24 14:37:33', 'DAVID', 'CERDA ZUÑIGA', '', '8992197164', 'davcer.ofi@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, 1, 0, 0, '2020-01-28 15:46:10'),
	(74, '2019-06-20 21:58:42', 'Daniel', 'Morales Elizalde', '', '5560847091', 'dmelizalde20@hotmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, 1, 0, 0, '2020-01-28 15:46:10'),
	(75, '2019-06-20 10:07:12', 'Eduardo', 'Salgado Pedraza', '', '7222153519', 'salgadoe71@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, 4, 0, 0, '2020-01-28 15:46:10'),
	(76, '2019-06-18 14:27:25', 'HECTOR', 'VERA GARCIA', '', '9932782637', 'veraabo9@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 2, 0, 0, '2020-01-28 15:46:10'),
	(77, '2019-06-15 19:30:15', 'Carolina', 'del Ángel Cruz', '', '5518496622', 'carolinadelangelcruz@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 1, 0, 0, '2020-01-28 15:46:10'),
	(78, '2019-06-15 16:12:05', 'ARACELI', 'GUTIÉRREZ CORTÉS', '', '4431323788', 'araceli.gtz@hotmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, 1, 0, 0, '2020-01-28 15:46:10'),
	(79, '2019-06-07 12:56:36', 'Martha Leticia', 'Mercado Ramírez', '', '53404600', 'marmerram@hotmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 0, 0, '2020-01-28 15:46:10'),
	(80, '2019-06-06 17:27:58', 'Laura Fabiola', 'Bringas Sánchez', '', '6188408334', 'laurabringas@hotmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 2, 0, 0, '2020-01-28 15:46:10'),
	(81, '2019-05-30 16:17:01', 'Maty', 'Lezama Martínez', '', '2712100517', 'licmatylezama@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, 2, 0, 0, '2020-01-28 15:46:10'),
	(82, '2019-05-28 11:50:21', 'José Antonio', 'Estrada Murillo', '', '6122031854', 'j.estrada09@hotmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 2, 0, 0, '2020-01-28 15:46:10'),
	(83, '2019-05-23 15:06:47', 'Marisol', 'Cervantes Aranda', '', '6121592359', 'maryysky77@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 2, 0, 0, '2020-01-28 15:46:10'),
	(84, '2019-05-22 15:01:16', 'Carlos Alberto', 'Gonzalez Talamantes', '', '6864051578', 'gonzaleztalamantes12@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 2, 0, 0, '2020-01-28 15:46:10'),
	(85, '2019-05-20 12:53:56', 'Gustavo Alberto', 'Pérez', '', '9932308537', 'rastafagus@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 4, 0, 0, '2020-01-28 15:46:10'),
	(86, '2019-05-15 13:40:18', 'AUGUSTO', 'HERNANDEZ ABOGADO', '', '7751173987', 'ahabogado@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 1, 0, 0, '2020-01-28 15:46:10'),
	(87, '2019-05-09 14:43:56', 'María Antonieta', 'Rojas Rivera', '', '4432211817', 'rojriv@hotmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 2, 0, 0, '2020-01-28 15:46:10'),
	(88, '2019-05-07 13:09:26', 'Juan Francisco', 'Enriquez Prado', '', '8714395005', 'jfranciscoenriquez@hotmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, 1, 0, 0, '2020-01-28 15:46:10'),
	(89, '2019-05-06 19:12:38', 'Cesar', 'Guerra Ruelas', '', '3121551793', 'cesarguerrarcolima@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 0, 0, '2020-01-28 15:46:10'),
	(90, '2019-05-03 10:34:12', 'Adela', 'Ramos Sánchez', '', '5545754679', 'ta15pc@yahoo.com.mx', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 0, 0, '2020-01-28 15:46:10'),
	(91, '2019-04-25 15:51:47', 'Jonathan', 'Alonso Hernández', '', '2225212139', 'alonso.hj@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 0, 0, '2020-01-28 15:46:10'),
	(92, '2019-04-25 10:48:50', 'miguel', 'centeno silva', '', '6441683229', 'elneofito2017@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 2, 0, 0, '2020-01-28 15:46:10'),
	(93, '2019-04-11 18:41:04', 'JORGE ARTURO', 'LOPEZ ROJAS', '', '4921602261', 'jorge.arturo.lr79@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 0, 0, '2020-01-28 15:46:10'),
	(94, '2019-04-11 16:09:28', 'KARLA CASANDRA', 'LARA BARRAGÁN', '', '5519321041', 'karla.lara@ine.mx', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 0, 0, '2020-01-28 15:46:10'),
	(95, '2019-04-10 17:42:45', 'Ramón', 'Cardona Durán', '', '5585991682', 'vangelisrcd@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 3, 0, 0, '2020-01-28 15:46:10'),
	(96, '2019-04-10 15:12:55', 'Everardo Demetrio', 'Pérez Gutiérrez', '', '7828880751', 'everardo.perez@ine.mx', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 0, 0, '2020-01-28 15:46:10'),
	(97, '2019-04-10 10:29:16', 'Violeta', 'Olmos Castro', '', '7221665906', 'violeta.olmos@ine.mx', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 2, 0, 0, '2020-01-28 15:46:10'),
	(98, '2019-04-09 12:17:37', 'GABRIELA', 'BLANCAS CHÁVEZ', '', '5615171876', 'gabriela.blancas@ine.mx', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 2, 0, 0, '2020-01-28 15:46:10'),
	(99, '2019-04-09 12:17:00', 'Edgar', 'Arenas Gorrostieta', '', '5540737124', 'edgargorostieta@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 0, 0, '2020-01-28 15:46:10'),
	(100, '2019-04-09 10:37:17', 'MARCO ANTONIO', 'GONZÁLEZ PALACIOS', '', '5514523747', 'marco.gonzalez@ine.mx', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 0, 0, '2020-01-28 15:46:10'),
	(101, '2019-04-08 18:49:00', 'KEILA YOHANA', 'ZURITA ROBLE', '', '9131095660', 'keilazurita1@hotmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 0, 0, '2020-01-28 15:46:10'),
	(102, '2019-04-08 14:15:00', 'Nallely', 'Salas Vergara', '', '7442598935', 'nallelyta_10@hotmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 0, 0, '2020-01-28 15:46:10'),
	(103, '2019-04-08 12:08:00', 'Luis Enrique', 'Rosas Díaz', '', '7751117944', 'aghostera@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 2, 0, 0, '2020-01-28 15:46:10'),
	(104, '2019-04-07 11:47:34', 'LUIS ENRIQUE', 'CORONADO HERNÁNDEZ', '', '8717869988', 'asesorjuridicoelectoral@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, 1, 0, 0, '2020-01-28 15:46:10'),
	(105, '2019-04-04 20:49:24', 'María Guadalupe', 'Espinoza Mondragon', '', '7229807839', 'lupita.1890@hotmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 0, 0, '2020-01-28 15:46:10'),
	(106, '2019-04-04 20:42:05', 'Martha Edith', 'Avila Contreras', '', '9932308537', 'edith_avila3131@live.com.mx', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 0, 0, '2020-01-28 15:46:10'),
	(107, '2019-04-04 20:34:02', 'Gustavo Alberto', 'perez javier', '', '9932308537', 'rastafagus@gmail.com88', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 1, 0, 0, '2020-01-28 15:46:10'),
	(108, '2019-04-03 15:13:10', 'cupertino', 'Blancas Cortez', '', '4433384172', 'cuper1809@hotmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 5, 0, 0, '2020-01-28 15:46:10'),
	(109, '2019-04-02 16:11:28', 'Sandra Fabiola', 'Badillo', '', '3221354066', 'fabiola.badillo2109@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, 2, 0, 0, '2020-01-28 15:46:10'),
	(110, '2019-04-02 14:19:35', 'NÉSTOR ENRIQUE', 'RIVERA LÓPEZ', '', '4491656156', 'nrivera@teeags.mx', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 0, 0, '2020-01-28 15:46:10'),
	(111, '2019-03-19 10:28:05', 'Jacqueline', 'Karman Conde', '', '8342661791', 'jaky_drive@hotmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 0, 0, '2020-01-28 15:46:10'),
	(112, '2019-03-13 10:02:39', 'Juan Francisco', 'Gastelum Ruelas', '', '3325184489', 'juangastelum2012@hotmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 0, 0, '2020-01-28 15:46:10'),
	(113, '2019-03-10 15:02:50', 'Georgina', 'Avila Silva', '', '6141615849', 'geoavila@hotmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 1, 0, 0, '2020-01-28 15:46:10'),
	(114, '2019-03-07 22:44:34', 'mario santiago', 'nuñez arboleda', '', '998670822', 'santursy12@hotmail.es', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 1, 0, 0, '2020-01-28 15:46:10'),
	(115, '2019-03-07 21:45:10', 'miguel benjamín', 'huizar martínez', '', '6181229511', 'mhuizar89@hotmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 1, 0, 0, '2020-01-28 15:46:10'),
	(116, '2019-03-01 13:21:17', 'Said', 'Rosas Aguilar', '', '7731334282', 'sayito.1.2.3@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 0, 0, '2020-01-28 15:46:10'),
	(117, '2019-02-24 13:19:03', 'DANIEL', 'ALVARADO BASTIDA', '', '5548225315', 'dalvaradob@yahoo.com.mx', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, 1, 0, 0, '2020-01-28 15:46:10'),
	(118, '2019-01-26 12:53:42', 'Blanca Eni', 'Moreno Roa', '', '9932132770', 'eniroamoreno@hotmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, 1, 0, 0, '2020-01-28 15:46:10'),
	(119, '2019-01-23 16:36:40', 'HIDALGO ARMANDO', 'VICTORIA MALDONADO', '', '9992424676', 'hidalgovictoria@hotmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, 1, 0, 0, '2020-01-28 15:46:10'),
	(120, '2019-01-22 16:59:59', 'Mauricio', 'Corona', '', '4432573422', 'coronamauricio88@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 0, 0, '2020-01-28 15:46:10'),
	(121, '2019-01-09 18:10:46', 'Alfonso', 'TORRES CARRILLO', '', '8342475638', 'alf_carrillo@hotmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 3, 0, 0, '2020-01-28 15:46:10'),
	(122, '2018-12-30 17:49:27', 'MIGUEL ANGEL', 'LOPEZ ARELLANO', '', '7773772486', 'maestriaelectoral2019@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 0, 0, '2020-01-28 15:46:10'),
	(123, '2018-12-30 17:31:36', 'MARIA BELEM', 'CASTILLO BENITEZ', '', '7351383502', 'mbelemcasb@yahoo.com.mx', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 0, 0, '2020-01-28 15:46:10'),
	(124, '2018-11-13 18:00:54', 'Lazaro', 'Torruco Guzman', '', '9931254280', 'xaxilja@hotmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 3, 0, 0, '2020-01-28 15:46:10'),
	(125, '2018-10-24 13:58:53', 'rodolfo', 'andrade el fierro', '', '8500231', 'rodolfoandrade123@icloud.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 3, 0, 0, '2020-01-28 15:46:10'),
	(126, '2018-10-18 11:09:34', 'Oscar Manuel', 'Ortiz Gallegos', '', '8333880516', 'oscarmanuelortiz@hotmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 3, 0, 0, '2020-01-28 15:46:10'),
	(127, '2018-10-16 15:34:52', 'Juan César', 'Hernández Cruz', '', '9831544024', 'chycharo.911@hotmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, 3, 0, 0, '2020-01-28 15:46:10'),
	(128, '2018-10-03 13:42:25', 'Oswald', 'Lara Borges', '', '5551072003', 'oswaldlaraborges@yahoo.com.mx', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 1, 0, 0, '2020-01-28 15:46:10'),
	(129, '2018-10-03 10:30:47', 'Enrique', 'Borges González', '', '9621254258', 'enrique_borges_g@hotmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 3, 0, 0, '2020-01-28 15:46:10'),
	(130, '2018-10-03 02:31:57', 'Rodrigo', 'Véliz Méndez', '', '6674689157', 'roypar2012@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 3, 0, 0, '2020-01-28 15:46:10'),
	(131, '2018-10-01 14:19:57', 'Luis Enrique', 'Rosas Díaz', '', '7751117944', 'enrico_rosas@hotmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 3, 0, 0, '2020-01-28 15:46:10'),
	(132, '2018-09-28 17:20:04', 'Miguel Angel', 'Vera Martínez', '', '5513326047', 'miguel119@hotmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 3, 0, 0, '2020-01-28 15:46:10'),
	(133, '2018-09-27 11:33:13', 'ROBERTO', 'GRANILLO AYALA', '', '2731256585', 'roberto.granillo@ine.mx', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, 6, 0, 0, '2020-01-28 15:46:10'),
	(134, '2018-09-26 20:16:56', 'Alan Gerardo', 'Arias Flores', '', '4493445429', 'arias.abogado93@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 3, 0, 0, '2020-01-28 15:46:10'),
	(135, '2018-09-26 11:11:48', 'MARÍA DE LA LUZ', 'GARCÍA JIMÉNEZ', '', '9931352228', 'malugarcia74@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 3, 0, 0, '2020-01-28 15:46:10'),
	(136, '2018-09-26 11:11:48', 'JESUS A', 'BLANCO', 'ROSS', '9931352228', 'ing.blancoross@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 3, 0, 0, '2020-02-11 15:51:45'),
	(137, '2020-03-09 12:44:46', 'Norberto', 'Arias', 'Ku', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '2020-03-09 12:44:51');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;

-- Volcando estructura para tabla ibero.usuario_activo
CREATE TABLE IF NOT EXISTS `usuario_activo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_inicial` varchar(255) DEFAULT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `ap_paterno` varchar(255) DEFAULT NULL,
  `ap_materno` varchar(255) DEFAULT NULL,
  `telefono` varchar(255) DEFAULT NULL,
  `email_particular` varchar(255) DEFAULT NULL,
  `sexo` varchar(255) DEFAULT NULL,
  `fecha_nac` varchar(255) DEFAULT NULL,
  `emailInst` varchar(255) DEFAULT NULL,
  `pass` varchar(255) DEFAULT NULL,
  `curp` varchar(255) DEFAULT NULL,
  `calle` varchar(255) DEFAULT NULL,
  `num_int` varchar(255) DEFAULT NULL,
  `num_ext` varchar(255) DEFAULT NULL,
  `ciudad` varchar(255) DEFAULT NULL,
  `estado` varchar(255) DEFAULT NULL,
  `cod_postal` varchar(255) DEFAULT NULL,
  `periodo` varchar(255) DEFAULT NULL,
  `nacionalidad` varchar(255) DEFAULT NULL,
  `doc_acreditacion` varchar(255) DEFAULT NULL,
  `num_doc` varchar(255) DEFAULT NULL,
  `universidad` varchar(255) DEFAULT NULL,
  `pais_estudio` varchar(255) DEFAULT NULL,
  `estado_estudio` varchar(255) DEFAULT NULL,
  `tipo_titulo` varchar(255) DEFAULT NULL,
  `fecha_finalizacion` varchar(255) DEFAULT NULL,
  `doc_recibo` varchar(255) DEFAULT NULL,
  `doc_fotografia` varchar(255) DEFAULT NULL,
  `doc_acta` varchar(255) DEFAULT NULL,
  `doc_titulo` varchar(255) DEFAULT NULL,
  `doc_identificacion` varchar(255) DEFAULT NULL,
  `doc_cv` varchar(255) DEFAULT NULL,
  `doc_cert` varchar(255) DEFAULT NULL,
  `doc_cedula` varchar(255) DEFAULT NULL,
  `id_perfil` varchar(255) DEFAULT NULL,
  `id_posgrado` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `bloqueado` varchar(255) DEFAULT NULL,
  `eliminado` varchar(255) DEFAULT NULL,
  `ultimaActualizacion` varchar(255) DEFAULT NULL,
  `email_institucional_anterior` varchar(255) DEFAULT NULL,
  `pass_anterior` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=102 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla ibero.usuario_activo: ~102 rows (aproximadamente)
/*!40000 ALTER TABLE `usuario_activo` DISABLE KEYS */;
INSERT INTO `usuario_activo` (`id`, `fecha_inicial`, `nombre`, `ap_paterno`, `ap_materno`, `telefono`, `email_particular`, `sexo`, `fecha_nac`, `emailInst`, `pass`, `curp`, `calle`, `num_int`, `num_ext`, `ciudad`, `estado`, `cod_postal`, `periodo`, `nacionalidad`, `doc_acreditacion`, `num_doc`, `universidad`, `pais_estudio`, `estado_estudio`, `tipo_titulo`, `fecha_finalizacion`, `doc_recibo`, `doc_fotografia`, `doc_acta`, `doc_titulo`, `doc_identificacion`, `doc_cv`, `doc_cert`, `doc_cedula`, `id_perfil`, `id_posgrado`, `status`, `bloqueado`, `eliminado`, `ultimaActualizacion`, `email_institucional_anterior`, `pass_anterior`) VALUES
	(0, '43802.462975', 'Control Escolar', '', '', '0', 'ing.blancoross@gmail.com', 'MASCULINO', '43899', 'ing.blancoross@gmail.com', 'iide2020', '', 'OSA MENOR', '15', '16', 'CENTRO', 'TABASCO', '86127', '2020', 'MEX', '', '', 'IUP', 'MEX', 'TAB', 'LICENCIATURA', '42803', '', '', '', '', '', '', '', '', '0', '0', '1', '0', '0', '43899.692037', 'ing.blancoross@gmail.com', 'IDE2020'),
	(1, '43802.462975', 'Norberto', 'Arias', 'Ku', '993 134 0914', '', 'MASCULINO', '30934', 'norbertoariasku@iide-edu.com', 'iide2020', '', 'OSA MENOR', '15', '16', 'CENTRO', 'TABASCO', '86127', '2020', 'MEX', '', '', 'IUP', 'MEX', 'TAB', 'LICENCIATURA', '42803', '', '', '', '', '', '', '', '', '1', '1', '1', '0', '0', '43899.692037', 'norbertoariasku@ideiberoamerica.com', 'IDE2020'),
	(2, '', 'Alan Gerardo', 'Arias', 'Flores', '', '', 'MASCULINO', '34237', 'alanariasflores@iide-edu.com', 'iide2020', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', 'TAB', 'LICENCIATURA', '', '', '', '', '', '', '', '', '', '1', '1', '1', '1', '0', '', 'alanariasflores@ideiberoamerica.com', 'IDE2020'),
	(3, '', 'Sandor', 'Arévalo', 'Zurita', '554 8422829', 'sandorarevalo@gmail.com', 'MASCULINO', '24871', 'sandorarevalozurita@iide-edu.com', 'iide2020', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', 'TAB', 'LICENCIATURA', '', '', '', '', '', '', '', '', '', '1', '1', '1', '0', '0', '', 'sandorarevalozurita@ideiberoamerica.com', 'IDE2020'),
	(4, '', 'Azalea', 'Argaiz', 'Gutiérrez', '991 234 5678', '', 'FEMENINO', '28841', 'azaleaargaizgutierrez@iide-edu.com', 'iide2020', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', 'TAB', 'LICENCIATURA', '', '', '', '', '', '', '', '', '', '1', '1', '1', '0', '0', '', 'azaleaargaizgutierrez@ideiberoamerica.com', 'IDE2020'),
	(5, '', 'Manuel', 'Castilla', 'de Alba', '461 220 2418', '', 'MASCULINO', '23316', 'manuelcastilladealba@iide-edu.com', 'iide2020', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', 'TAB', 'LICENCIATURA', '', '', '', '', '', '', '', '', '', '1', '1', '1', '0', '0', '', 'manuelcastilladealba@ideiberoamerica.com', 'IDE2020'),
	(6, '', 'Alfonso', 'Correa', 'Flores', '993 123 4567', '', 'MASCULINO', '22560', 'alfonsocorreaflores@iide-edu.com', 'iide2020', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', 'TAB', 'LICENCIATURA', '', '', '', '', '', '', '', '', '', '1', '1', '1', '1', '0', '', 'alfonsocorreaflores@ideiberoamerica.com', 'IDE2020'),
	(7, '', 'Mauricio', 'Corona', 'Espinosa', '443 257 3422', '', 'MASCULINO', '32363', 'mauriciocoronaespinosa@iide-edu.com', 'iide2020', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', 'TAB', 'LICENCIATURA', '', '', '', '', '', '', '', '', '', '1', '1', '1', '0', '0', '', 'mauriciocoronaespinosa@ideiberoamerica.com', 'IDE2020'),
	(8, '', 'José Antonio', 'Estrada', 'Murillo', '612 203 1854', '', 'MASCULINO', '34674', 'antonioestradamurillo@iide-edu.com', 'iide2020', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', 'TAB', 'LICENCIATURA', '', '', '', '', '', '', '', '', '', '1', '1', '1', '0', '0', '', 'antonioestradamurillo@ideiberoamerica.com', 'IDE2020'),
	(9, '', 'Eliaquín', 'García', 'Alvarado', '993 109 7768', '', 'MASCULINO', '30828', 'eliaquingarciaalvarado@iide-edu.com', 'iide2020', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', 'TAB', 'LICENCIATURA', '', '', '', '', '', '', '', '', '', '1', '1', '1', '0', '0', '', 'eliaquingarciaalvarado@ideiberoamerica.com', 'IDE2020'),
	(10, '', 'Fabiola del Carmen', 'Gutu', 'Jiménez', ' 993 387 2379', '', 'FEMENINO', '32380', 'fabiolagutujimenez@iide-edu.com', 'iide2020', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', 'TAB', 'LICENCIATURA', '', '', '', '', '', '', '', '', '', '1', '1', '1', '0', '0', '', 'fabiolagutujimenez@ideiberoamerica.com', 'IDE2020'),
	(11, '', 'Sonia Ivón', 'Huerta', 'Lazcano', '246 297 3006', 'ivonnhls@gmail.com', 'FEMENINO', '35460', 'soniahuertalazcano@iide-edu.com', 'iide2020', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', 'TAB', 'LICENCIATURA', '', '', '', '', '', '', '', '', '', '1', '', '1', '0', '0', '', 'soniahuertalazcano@ideiberoamerica.com', 'IDE2020'),
	(12, '', 'Felipe Ramón', 'López', 'Canabal', '993 143 8992', '', 'MASCULINO', '25081', 'felipelopezcanabal@iide-edu.com', 'iide2020', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', 'TAB', 'LICENCIATURA', '', '', '', '', '', '', '', '', '', '1', '1', '1', '0', '0', '', 'felipelopezcanabal@ideiberoamerica.com', 'IDE2020'),
	(13, '', 'Isidro', 'Miguel', 'Gutiérrez', '555 340 4600', '', 'MASCULINO', '28260', 'isidromiguelgutierrez@iide-edu.com', 'iide2020', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', 'TAB', 'LICENCIATURA', '', '', '', '', '', '', '', '', '', '1', '1', '1', '0', '0', '', 'isidromiguelgutierrez@ideiberoamerica.com', 'IDE2020'),
	(14, '', 'Mérida Mayra', 'Miranda', 'Ortega', '552 811 0985', '', 'FEMENINO', '26465', 'meridamirandaortega@iide-edu.com', 'iide2020', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', 'TAB', 'LICENCIATURA', '', '', '', '', '', '', '', '', '', '1', '1', '1', '0', '0', '', 'meridamirandaortega@ideiberoamerica.com', 'IDE2020'),
	(15, '', 'Ahída Rubí', 'Peña', 'Flores', '322 294 3048', '', 'FEMENINO', '32449', 'ahidapenaflores@iide-edu.com', 'iide2020', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', 'TAB', 'LICENCIATURA', '', '', '', '', '', '', '', '', '', '1', '1', '1', '0', '0', '', 'ahidapeñaflores@ideiberoamerica.com', 'IDE2020'),
	(16, '', 'Rogelio', 'Rodríguez', 'Luna', '612 117 4201', '', 'MASCULINO', '24235', 'rogeliorodriguezluna@iide-edu.com', 'iide2020', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', 'TAB', 'LICENCIATURA', '', '', '', '', '', '', '', '', '', '1', '1', '1', '0', '0', '', 'rogeliorodriguezluna@ideiberoamerica.com', 'IDE2020'),
	(17, '', 'María Antonieta', 'Rojas', 'Rivera', '443 221 1817', '', 'FEMENINO', '26120', 'mariarojasrivera@iide-edu.com', 'iide2020', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', 'TAB', 'LICENCIATURA', '', '', '', '', '', '', '', '', '', '1', '1', '1', '0', '0', '', 'mariarojasrivera@ideiberoamerica.com', 'IDE2020'),
	(18, '', 'Luis Enrique', 'Rosas', 'Díaz', '775 111 7944', '', 'MASCULINO', '34687', 'luisrosasdiaz@iide-edu.com', 'iide2020', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', 'TAB', 'LICENCIATURA', '', '', '', '', '', '', '', '', '', '1', '1', '1', '0', '0', '', 'luisrosasdiaz@ideiberoamerica.com', 'IDE2020'),
	(19, '', 'Ernesto Jaime', 'Ruiz', 'Pérez', '777 363 5944', '', 'MASCULINO', '', 'ernestoruizperez@iide-edu.com', 'iide2020', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', 'TAB', 'LICENCIATURA', '', '', '', '', '', '', '', '', '', '1', '1', '1', '1', '0', '', 'ernestoruizperez@ideiberoamerica.com', 'IDE2020'),
	(20, '', 'Luis Javier', 'Ventura', 'Frías', '993 231 6911', '', 'MASCULINO', '31545', 'javierventurafrias@iide-edu.com', 'iide2020', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', 'TAB', 'LICENCIATURA', '', '', '', '', '', '', '', '', '', '1', '1', '1', '0', '0', '', 'javierventurafrias@ideiberoamerica.com', 'IDE2020'),
	(21, '', 'Cristina Liliám', 'Aguirre ', 'Navarro ', '555 052 7177', '', 'FEMENINO', '', 'cristinaaguirrenavarro@iide-edu.com', 'iide2020', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', '', '', '', '', '', '', '', '', '', '', '', '1', '2', '1', '0', '0', '', 'cristinaaguirrenavarro@ideiberoamerica.com', 'IDE2020'),
	(22, '', 'Oscar', 'Álvarez ', 'Hernández', '993 126 1323', '', 'MASCULINO', '31060', 'oscaralvarezhernandez@iide-edu.com', 'iide2020', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', '', '', '', '', '', '', '', '', '', '', '', '1', '2', '1', '1', '0', '', 'oscaralvarezhernandez@ideiberoamerica.com', 'IDE2020'),
	(23, '', 'Rodolfo', 'Andrade ', 'del Fierro ', '', '', 'MASCULINO', '34051', 'rodolfoandradedelfierro@iide-edu.com', 'iide2020', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', '', '', '', '', '', '', '', '', '', '', '', '1', '2', '1', '1', '0', '', 'rodolfoandradedelfierro@ideiberoamerica.com', 'IDE2020'),
	(24, '', 'Sara Alicia', 'Avendaño', ' Alvarado ', '551 003 8916', '', 'FEMENINO', '', 'saraavendanoalvarado@iide-edu.com', 'iide2020', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', '', '', '', '', '', '', '', '', '', '', '', '1', '2', '1', '0', '0', '', 'saraavendañoalvarado@ideiberoamerica.com', 'IDE2020'),
	(25, '', 'Cupertino', 'Blancas', ' Cortés ', '443 338 4172', '', 'MASCULINO', '25829', 'cupertinoblancascortes@iide-edu.com', 'iide2020', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', '', '', '', '', '', '', '', '', '', '', '', '1', '2', '1', '0', '0', '', 'cupertinoblancascortes@ideiberoamerica', 'IDE2020'),
	(26, '', 'Diana Laura', 'Cabrera ', 'Gómez', '991 234 5678', '', 'FEMENINO', '35169', 'dianacabreragomez@iide-edu.com', 'iide2020', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', '', '', '', '', '', '', '', '', '', '', '', '1', '2', '1', '0', '0', '', 'dianacabreragomez@ideiberoamerica.com', 'IDE2020'),
	(27, '', 'Ramón', 'Cardona ', 'Durán ', '558 599 1682', '', 'MASCULINO', '31696', 'ramoncardonaduran@iide-edu.com', 'iide2020', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', '', '', '', '', '', '', '', '', '', '', '', '1', '2', '1', '0', '0', '', 'ramoncardonaduran@ideiberoamerica', 'IDE2020'),
	(28, '', 'Francisco de Jesús', 'David ', 'Hernández ', '993 308 4466', '', 'MASCULINO', '33838', 'franciscodavidhernandez@iide-edu.com', 'iide2020', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', '', '', '', '', '', '', '', '', '', '', '', '1', '2', '1', '1', '0', '', 'franciscodavidhernandez@ideiberoamerica', 'IDE2020'),
	(29, '', 'David Manuel', 'Estrada', ' Chan ', '993 129 9109', '', 'MASCULINO', '33657', 'davidestradachan@iide-edu.com', 'iide2020', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', '', '', '', '', '', '', '', '', '', '', '', '1', '2', '1', '0', '0', '', 'davidestradachan@ideiberoamerica', 'IDE2020'),
	(30, '', 'Héctor', 'Vera', 'García', '993 278 2637', '', 'MASCULINO', '27027', 'hectorveragarcia@iide-edu.com', 'iide2020', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', '', '', '', '', '', '', '', '', '', '', '', '1', '2', '1', '0', '0', '', 'hectorgarciavera@ideiberoamerica.com', 'IDE2020'),
	(31, '', 'Juan Francisco', 'Gastélum ', 'Ruelas ', '', '', 'MASCULINO', '', 'juangastelumruelas@iide-edu.com', 'iide2020', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', '', '', '', '', '', '', '', '', '', '', '', '1', '2', '1', '1', '0', '', 'juangastelumruelas@ideiberoamerica', 'IDE2020'),
	(32, '', 'Irving', 'Garrido ', 'Lastra ', '934 107 3177', '', 'MASCULINO', '', 'irvinggarridolastra@iide-edu.com', 'iide2020', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', '', '', '', '', '', '', '', '', '', '', '', '1', '2', '1', '0', '0', '', 'irvinggarridolastra@ideiberoamerica', 'IDE2020'),
	(33, '', 'Dany Alberto', 'Góngora', ' Moo ', '981 111 8580', '', 'MASCULINO', '30290', 'danygongoramoo@iide-edu.com', 'iide2020', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', '', '', '', '', '', '', '', '', '', '', '', '1', '2', '1', '0', '0', '', 'danygongoramoo@ideiberoamerica.com', 'IDE2020'),
	(34, '', 'Shantal', 'González ', 'Meneses', '553 903 5469', '', 'FEMENINO', '30961', 'shantalgonzalezmeneses@iide-edu.com', 'iide2020', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', '', '', '', '', '', '', '', '', '', '', '', '1', '2', '1', '0', '0', '', 'shantalgonzalesmeneses@ideiberoamerica.com', 'IDE2020'),
	(35, '', 'Arturo', 'Gutiérrez', ' Zamora', '747 225 0781', '', 'MASCULINO', '26337', 'arturogutierrezzamora@iide-edu.com', 'iide2020', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', '', '', '', '', '', '', '', '', '', '', '', '1', '2', '1', '0', '0', '', 'arturogutierrezzamora@ideiberoamerica.com', 'IDE2020'),
	(36, '', 'María Rosa', 'Guzmán', ' Valdez', '333 508 9949', '', 'FEMENINO', '28732', 'mariaguzmanvaldez@iide-edu.com', 'iide2020', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', '', '', '', '', '', '', '', '', '', '', '', '1', '2', '1', '0', '0', '', 'mariaguzmanvaldez@ideiberoamerica.com', 'IDE2020'),
	(37, '', 'Jacqueline', 'Karman ', 'Conde', '834 266 1791', '', 'FEMENINO', '33167', 'jacquelinekarmanconde@iide-edu.com', 'iide2020', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', '', '', '', '', '', '', '', '', '', '', '', '1', '2', '1', '0', '0', '', 'jaquelinekarmanconde@ideiberoamerica.com', 'IDE2020'),
	(38, '', 'Karla Casandra', 'Lara', ' Barragán ', '', '', 'FEMENINO', '32740', 'karlalarabarragan@iide-edu.com', 'iide2020', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', '', '', '', '', '', '', '', '', '', '', '', '1', '2', '1', '0', '0', '', 'karlalarabarragan@ideiberoamerica.com', 'IDE2020'),
	(39, '', 'Jesús David', 'Madrigal ', 'López ', '993 278 8508', '', 'MASCULINO', '31729', 'jesusmadrigallopez@iide-edu.com', 'iide2020', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', '', '', '', '', '', '', '', '', '', '', '', '1', '2', '1', '0', '0', '', 'jesusmadrigallopez@ideiberoamerica.com', 'IDE2020'),
	(40, '', 'Alejandro de Jesús', 'Martínez ', 'Ledesma ', '899 245 3905', '', 'MASCULINO', '33185', 'alejandromartinezledesma@iide-edu.com', 'iide2020', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', '', '', '', '', '', '', '', '', '', '', '', '1', '2', '1', '0', '0', '', 'alejandromartinezledesma@ideiberoamerica.com', 'IDE2020'),
	(41, '', 'Fabiola', 'Mauleón ', 'Pérez', '933 124 2796', '', 'FEMENINO', '32206', 'fabiolamauleonperez@iide-edu.com', 'iide2020', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', '', '', '', '', '', '', '', '', '', '', '', '1', '2', '1', '0', '0', '', 'fabiolamauleonperez@ideiberoamerica.com', 'IDE2020'),
	(42, '', 'Martha Leticia', 'Mercado ', 'Ramírez ', '555 340 4600', '', 'FEMENINO', '27626', 'marthamercadoramirez@iide-edu.com', 'iide2020', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', '', '', '', '', '', '', '', '', '', '', '', '1', '2', '1', '0', '0', '', 'marthamercadoramirez@ideiberoamerica.com', 'IDE2020'),
	(43, '', 'Yadira Yrazú', 'Orta ', 'Acosta ', '553 258 0291', '', 'FEMENINO', '', 'yadiraortaacosta@iide-edu.com', 'iide2020', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', '', '', '', '', '', '', '', '', '', '', '', '1', '2', '1', '0', '0', '', 'yadiraortaacosta@ideiberoamerica.com', 'IDE2020'),
	(44, '', 'Oscar Manuel', 'Ortiz ', 'Gallegos ', '833 388 0516', '', 'MASCULINO', '27786', 'oscarortizgallegos@iide-edu.com', 'iide2020', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', '', '', '', '', '', '', '', '', '', '', '', '1', '2', '1', '0', '0', '', 'oscarortizgallegos@ideiberoamerica.com', 'IDE2020'),
	(45, '', 'Adela', 'Ramos ', 'Sánchez ', '554 5754679', '', 'FEMENINO', '27744', 'adelaramossanchez@iide-edu.com', 'iide2020', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', '', '', '', '', '', '', '', '', '', '', '', '1', '2', '1', '0', '0', '', 'adelaramossanchez@ideiberoamerica.com', 'IDE2020'),
	(46, '', 'Néstor Enrique', 'Rivera ', 'López', '', '', 'MASCULINO', '31433', 'nestorriveralopez@iide-edu.com', 'iide2020', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', '', '', '', '', '', '', '', '', '', '', '', '1', '2', '1', '1', '0', '', 'nestorriveralopez@ideiberoamerica.com', 'IDE2020'),
	(47, '', 'César Augusto', 'Roldán', 'Flores ', '913 103 8620', '', 'MASCULINO', '', 'cesarroldanflores@iide-edu.com', 'iide2020', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', '', '', '', '', '', '', '', '', '', '', '', '1', '2', '1', '1', '0', '', 'cesarroldanflores@ideiberoamerica.com', 'IDE2020'),
	(48, '', 'Pedro Guadalupe', 'Ruiz ', 'Berzunza ', '961 353 5651', '', 'MASCULINO', '26591', 'pedroruizberzunza@iide-edu.com', 'iide2020', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', '', '', '', '', '', '', '', '', '', '', '', '1', '2', '1', '0', '0', '', 'pedroruizberzunza@ideiberoamerica.com', 'IDE2020'),
	(49, '', 'Nallely', 'Salas ', 'Vergara ', '744 259 8935', '', 'FEMENINO', '31990', 'nallelysalasvergara@iide-edu.com', 'iide2020', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', '', '', '', '', '', '', '', '', '', '', '', '1', '2', '1', '0', '0', '', 'nallelysalasvergara@ideiberoamerica.com', 'IDE2020'),
	(50, '', 'Raúl', 'Samaniego ', 'Alvarado ', '618 102 3942', '', 'MASCULINO', '', 'raulsamaniegoalvarado@iide-edu.com', 'iide2020', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', '', '', '', '', '', '', '', '', '', '', '', '1', '2', '1', '0', '0', '', 'raulsamaniegoalvarado@ideiberoamerica.com', 'IDE2020'),
	(51, '', 'Ricardo', 'Serrato ', 'Aguilar ', '442 258 0544', '', 'MASCULINO', '27853', 'ricardoserratoaguilar@iide-edu.com', 'iide2020', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', '', '', '', '', '', '', '', '', '', '', '', '1', '2', '1', '0', '0', '', 'ricardoserratoaguilar@ideiberoamerica.com', 'IDE2020'),
	(52, '', 'Alfonso', 'Torres ', 'Carrillo', '', '', 'MASCULINO', '31218', 'alfonsotorrescarrillo@iide-edu.com', 'iide2020', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', '', '', '', '', '', '', '', '', '', '', '', '1', '2', '1', '1', '0', '', 'alfonsotorrescarrillo@ideiberoamerica.com', 'IDE2020'),
	(53, '', 'Lázaro', 'Torruco ', 'Guzmán ', '993 385 9894', '', 'MASCULINO', '28615', 'lazarotorrucoguzman@iide-edu.com', 'iide2020', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', '', '', '', '', '', '', '', '', '', '', '', '1', '2', '1', '0', '0', '', 'lazarotorrucoguzman@ideiberoamerica.com', 'IDE2020'),
	(54, '', 'Krisna Judith', 'Villado ', 'Mejía', '899 318 4938', '', 'FEMENINO', '32192', 'krisnavilladomejia@iide-edu.com', 'iide2020', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', '', '', '', '', '', '', '', '', '', '', '', '1', '2', '1', '0', '0', '', 'krisnavilladomejia@ideiberoamerica.com', 'IDE2020'),
	(55, '', 'Luis Enrique', 'Zurita ', 'Osorio', '913 111 9528', '', 'MASCULINO', '24032', 'luiszuritaosorio@iide-edu.com', 'iide2020', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', '', '', '', '', '', '', '', '', '', '', '', '1', '2', '1', '1', '0', '', 'luiszuritaosorio@ideiberoamerica.com', 'IDE2020'),
	(56, '', 'Keila Yohana', 'Zurita', ' Roble', '916 187 4277', '', 'FEMENINO', '34526', 'keilazuritaroble@iide-edu.com', 'iide2020', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', '', '', '', '', '', '', '', '', '', '', '', '1', '2', '1', '0', '0', '', 'keilazuritaroble@ideiberoamerica.com', 'IDE2020'),
	(57, '', 'Karla Erandi', 'Zurita', 'Zamacona', '913 102 0064', '', 'FEMENINO', '', 'karlazuritazamacona@iide-edu.com', 'iide2020', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', '', '', '', '', '', '', '', '', '', '', '', '1', '2', '1', '0', '0', '', 'karlazuritazamacona@ideiberoamerica.com', 'IDE2020'),
	(58, '43802.462975', 'Quintín', 'Aran', 'Dovarganes', '228 304 5320', 'Quintin.Antar.Dovarganes@oplever.org.mx', 'MASCULINO', '', 'quintinarandovarganes@iide-edu.com', 'iide2020', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', '', 'MAESTRIA', '', '', '', '', '', '', '', '', '', '1', '3', '1', '0', '0', '', 'quintinarandovarganes@ideiberoamerica.com', 'IDE2020'),
	(59, '', 'Iván', 'Arazo', 'Martínez', '551 632 3295', 'ivanarazomtz@gmail.com', 'MASCULINO', '30731', 'ivanarazomartinez@iide-edu.com', 'iide2020', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', '', 'MAESTRIA', '', '', '', '', '', '', '', '', '', '1', '3', '1', '0', '0', '', 'ivanarazomartinez@ideiberoamerica.com', 'IDE2020'),
	(60, '', 'Georgina', 'Ávila', 'Silva', '614 161 5849', 'geoavila@hotmail.com', 'FEMENINO', '26961', 'georginaavilasilva@iide-edu.com', 'iide2020', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', '', 'MAESTRIA', '', '', '', '', '', '', '', '', '', '1', '3', '1', '0', '0', '', 'georginaavilasilva@ideiberoamerica.com', 'IDE2020'),
	(61, '', 'Perla Lizette', 'Bueno', 'Torres', '667 228 0014', 'perlalbt@hotmail.com', 'FEMENINO', '33037', 'perlabuenotorres@iide-edu.com', 'iide2020', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', '', 'MAESTRIA', '', '', '', '', '', '', '', '', '', '1', '3', '1', '0', '0', '', 'perlabuenotorres@ideiberoamerica.com', 'IDE2020'),
	(62, '', 'Luis Manuel', 'Colín', 'Muñiz', '559 197 5042', '', 'MASCULINO', '22068', 'luiscolinmuñiz@iide-edu.com', 'iide2020', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', '', 'MAESTRIA', '', '', '', '', '', '', '', '', '', '1', '3', '1', '1', '0', '', 'luiscolinmuñiz@ideiberoamerica.com', 'IDE2020'),
	(63, '', 'Carolina', 'Del Ángel', 'Cruz', '551 849 6622', 'carolinadelangelcruz@gmail.com', 'FEMENINO', '27679', 'carolinadelangelcruz@iide-edu.com', 'iide2020', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', '', 'MAESTRIA', '', '', '', '', '', '', '', '', '', '1', '3', '1', '0', '0', '', 'carolinadelangelcruz@ideiberoamerica.com', 'IDE2020'),
	(64, '', 'María Elena', 'Franco', 'Salinas', '551 843 7045', 'HELENAFASA2012@GMAIL.COM', 'FEMENINO', '28034', 'mariafrancosalinas@iide-edu.com', 'iide2020', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', '', 'MAESTRIA', '', '', '', '', '', '', '', '', '', '1', '3', '1', '0', '0', '', 'mariafrancosalinas@ideiberoamerica.com', 'IDE2020'),
	(65, '', 'María de la Luz', 'García', 'Jiménez', '993 135 2228', 'malugarcia74@gmail.com', 'FEMENINO', '24957', 'mariagarciajimenez@iide-edu.com', 'iide2020', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', '', 'MAESTRIA', '', '', '', '', '', '', '', '', '', '1', '3', '1', '0', '0', '', 'mariagarciajimenez@ideiberoamerica.com', 'IDE2020'),
	(66, '', 'Leopoldo José', 'García', 'Mendoza', '722 474 6923', 'leojos11@gmail.com', 'MASCULINO', '', 'leopoldogarciamendoza@iide-edu.com', 'iide2020', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', '', 'MAESTRIA', '', '', '', '', '', '', '', '', '', '1', '3', '1', '0', '0', '', 'leopoldogarciamendoza@ideiberoamerica.com', 'IDE2020'),
	(67, '', 'Augusto', 'Hernández', 'Abogado', '771 216 5740', '', 'MASCULINO', '', 'augustohernandezabogado@iide-edu.com', 'iide2020', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', '', 'MAESTRIA', '', '', '', '', '', '', '', '', '', '1', '3', '1', '1', '0', '', 'augustohernandezabogado@ideiberoamerica.com', 'IDE2020'),
	(68, '', 'Miguel Benjamín', 'Huizar', 'Martínez', '618 122 9511', 'mhuizar89@hotmail.com', 'MASCULINO', '21845', 'miguelhuizarmartinez@iide-edu.com', 'iide2020', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', '', 'MAESTRIA', '', '', '', '', '', '', '', '', '', '1', '3', '1', '0', '0', '', 'miguelhuizarmartinez@ideiberoamerica.com', 'IDE2020'),
	(69, '', 'Leoncio', 'Ortiz', 'Guerra', '675 104 3940', 'leortiz21@hotmail.com', 'MASCULINO', '24067', 'leoncioortizguerra@iide-edu.com', 'iide2020', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', '', 'MAESTRIA', '', '', '', '', '', '', '', '', '', '1', '3', '1', '0', '0', '', 'leoncioortizguerra@ideiberoamerica.com', 'IDE2020'),
	(70, '', 'Lucía', 'Pérez', 'Martínez', '553 208 2442', 'lucperezmtz@hotmail.com', 'FEMENINO', '24111', 'luciaperezmartinez@iide-edu.com', 'iide2020', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', '', 'MAESTRIA', '', '', '', '', '', '', '', '', '', '1', '3', '1', '0', '0', '', 'luciaperezmartinez@ideiberoamerica.com', 'IDE2020'),
	(71, '', 'Anel Berenice', 'Ramírez', 'Ladrón de Guevara', '557 232 9273', '', 'FEMENINO', '26865', 'anelramirezladrondeguevara@iide-edu.com', 'iide2020', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', '', 'MAESTRIA', '', '', '', '', '', '', '', '', '', '1', '3', '1', '1', '0', '', 'anelramirezladrondeguevara@ideiberoamerica.com', 'IDE2020'),
	(72, '', 'Maricruz', 'Valencia', 'Buendía', '722 380 7540', 'mvalenciabuendia@yahoo.com.mx', 'FEMENINO', '25515', 'maricruzvalenciabuendia@iide-edu.com', 'iide2020', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', '', 'MAESTRIA', '', '', '', '', '', '', '', '', '', '1', '3', '1', '0', '0', '', 'maricruzvalenciabuendia@ideiberoamerica.com', 'IDE2020'),
	(73, '', 'Bernardo', 'Valle', 'Monroy', '551 353 1390', 'bvalle08@gmail.com', 'MASCULINO', '23743', 'bernardovallemonroy@iide-edu.com', 'iide2020', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', '', 'MAESTRIA', '', '', '', '', '', '', '', '', '', '1', '3', '1', '0', '0', '', 'bernardovallemonroy@ideiberoamerica.com', 'IDE2020'),
	(74, '', 'Rodrigo', 'Véliz', 'Méndez', '876 023 0581', 'roypar2012@gmail.com', 'MASCULINO', '28004', 'rodrigovelizmendez@iide-edu.com', 'iide2020', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', '', 'MAESTRIA', '', '', '', '', '', '', '', '', '', '1', '3', '1', '1', '0', '', 'rodrigovelizmendez@ideiberoamerica.com', 'IDE2020'),
	(75, '', 'Miguel Ángel', 'Vera', 'Martínez', '553 332 6047', 'miguel119@hotmail.com', 'MASCULINO', '27979', 'miguelveramartinez@iide-edu.com', 'iide2020', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', '', 'MAESTRIA', '', '', '', '', '', '', '', '', '', '1', '3', '1', '0', '0', '', 'miguelveramartinez@ideiberoamerica.com', 'IDE2020'),
	(76, '', 'María Guadalupe', 'Arriaga', 'Vega', '722 127 6629', 'gpeadt@hotmail.com', 'MASCULINO', '23039', 'mariaarriagavega@iide-edu.com', 'iide2020', '', 'OSA MENOR', '15', '16', 'CENTRO', 'TABASCO', '86127', '2020', 'MEX', '', '', 'IUP', 'MEX', 'TAB', 'MAESTRIA', '42803', '', '', '', '', '', '', '', '', '1', '4', '1', '0', '0', '43899.692037', 'mariaarriagavega@iideiberoamerica.com', 'IDE2020'),
	(77, '', 'Miguel', 'Ávila', 'Ortiz', '771 266 0866', 'lic.miguelao@gmail.com', 'MASCULINO', '', 'miguelavilaortiz@iide-edu.com', 'iide2020', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', '', 'MAESTRIA', '', '', '', '', '', '', '', '', '', '1', '4', '1', '1', '0', '', 'miguelavilaortiz@iideiberoamerica.com', 'IDE2020'),
	(78, '', 'Elena', 'Brito', 'Casales', '777 344 1085', 'helenale45@hotmail.com', 'FEMENINO', '23621', 'helenabritocasales@iide-edu.com', 'iide2020', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', '', 'MAESTRIA', '', '', '', '', '', '', '', '', '', '1', '4', '1', '0', '0', '', 'helenabritocasales@iideiberoamerica.com', 'IDE2020'),
	(79, '', 'Wilber', 'Centeno', 'Alamilla', '993 206 4862', 'wilcen18@hotmail.com', 'MASCULINO', '30577', 'wilbercentenoalamilla@iide-edu.com', 'iide2020', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', '', 'MAESTRIA', '', '', '', '', '', '', '', '', '', '1', '4', '1', '0', '0', '', 'wilbercentenoalamilla@iideiberoamerica.com', 'IDE2020'),
	(80, '', 'David', 'Cerda', 'Zuñiga', '899 219 7164', 'davcer.ofi@gmail.com', 'MASCULINO', '31431', 'davidcerdazuñiga@iide-edu.com', 'iide2020', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', '', 'MAESTRIA', '', '', '', '', '', '', '', '', '', '1', '4', '1', '0', '0', '', 'davidcerdazuñiga@iideiberoamerica.com', 'IDE2020'),
	(81, '', 'Enrique', 'Cruz', 'Durán', '961 129 5710', 'entrelolocalyloglobal@gmail.com', 'MASCULINO', '24246', 'carloscruzduran@iide-edu.com', 'iide2020', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', '', 'MAESTRIA', '', '', '', '', '', '', '', '', '', '1', '4', '1', '1', '0', '', 'carloscruzduran@iideiberoamerica.com', 'IDE2020'),
	(82, '', 'Luis Fernando', 'Díaz', 'Carreón', '871 221 3698', 'lf_karate@yahoo.com.mx', 'MASCULINO', '', 'luisdiazcarreon@iide-edu.com', 'iide2020', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', '', 'MAESTRIA', '', '', '', '', '', '', '', '', '', '1', '4', '1', '0', '0', '', 'luisdiazcarreon@iideiberoamerica.com', 'IDE2020'),
	(83, '', 'Teresa', 'Galván', 'Barragán', '767 107 9064', 'teresa.galvan@ine.mx', 'FEMENINO', '', 'teresagalvanbarragan@iide-edu.com', 'iide2020', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', '', 'MAESTRIA', '', '', '', '', '', '', '', '', '', '1', '4', '1', '0', '0', '', 'teresagalvanbarragan@iideiberoamerica.com', 'IDE2020'),
	(84, '', 'Jesús Raciel', 'García', 'Ramírez', '771 207 3937', '', 'MASCULINO', '28794', 'jesusgarciaramirez@iide-edu.com', 'iide2020', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', '', 'MAESTRIA', '', '', '', '', '', '', '', '', '', '1', '4', '1', '0', '0', '', 'jesusgarciaramirez@iideiberoamerica.com', 'IDE2020'),
	(85, '', 'Aracely', 'Gutiérrez', 'Cortés', '443 132 3788', 'araceli.gtz@hotmail.com', 'FEMENINO', '29980', 'aracelygutierrezcortes@iide-edu.com', 'iide2020', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', '', 'MAESTRIA', '', '', '', '', '', '', '', '', '', '1', '4', '1', '0', '0', '', 'aracelygutierrezcortes@iideiberoamerica.com', 'IDE2020'),
	(86, '', 'Juan César', 'Hernández', 'Cruz', '983 154 4024', 'chycharo.911@hotmail.com', 'MASCULINO', '31222', 'juanhernandezcruz@iide-edu.com', 'iide2020', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', '', 'MAESTRIA', '', '', '', '', '', '', '', '', '', '1', '4', '1', '0', '0', '', 'juanhernandezcruz@iideiberoamerica.com', 'IDE2020'),
	(87, '', 'Juan Rafael', 'Herrera', 'Quiñones', '618 169 8045', 'juanrafael.herrera@ine.mx', 'MASCULINO', '25135', 'juanherreraquiñones@iide-edu.com', 'iide2020', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', '', 'MAESTRIA', '', '', '', '', '', '', '', '', '', '1', '4', '1', '0', '0', '', 'juanherreraquiñones@iideiberoamerica.com', 'IDE2020'),
	(88, '', 'Mayre', 'Lezama', 'Martínez', '271 210 0517', 'licmatylezama@gmail.com', 'FEMENINO', '32366', 'mayrelezamamartinez@iide-edu.com', 'iide2020', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', '', 'MAESTRIA', '', '', '', '', '', '', '', '', '', '1', '4', '1', '0', '0', '', 'mayrelezamamartinez@iideiberoamerica.com', 'IDE2020'),
	(89, '', 'Maribel', 'Lima', 'Romero', '556 257 8575', 'maribel.lima1@gmail.com', 'FEMENINO', '31625', 'maribellimaromero@iide-edu.com', 'iide2020', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', '', 'MAESTRIA', '', '', '', '', '', '', '', '', '', '1', '4', '1', '0', '0', '', 'maribellimaromero@iideiberoamerica.com', 'IDE2020'),
	(90, '', 'Claudia Lilia', 'Luna', 'Islas', '771 266 9852', 'clunaislas@gmail.com', 'FEMENINO', '', 'claudialunaislas@iide-edu.com', 'iide2020', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', '', 'MAESTRIA', '', '', '', '', '', '', '', '', '', '1', '4', '1', '0', '0', '', 'claudialunaislas@iideiberoamerica.com', 'IDE2020'),
	(91, '', 'Daniel', 'Morales', 'Elizalde', '556 084 7091', 'dmelizalde20@hotmail.com', 'MASCULINO', '32162', 'danielmoraleselizalde@iide-edu.com', 'iide2020', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', '', 'MAESTRIA', '', '', '', '', '', '', '', '', '', '1', '4', '1', '0', '0', '', 'danielmoraleselizalde@iideiberoamerica.com', 'IDE2020'),
	(92, '', 'Oswaldo', 'Muñoz', 'Cortés', '553 810 7811', 'oswaldosk2@yahoo.com.mx', 'MASCULINO', '', 'oswaldomuñozcortes@iide-edu.com', 'iide2020', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', '', 'MAESTRIA', '', '', '', '', '', '', '', '', '', '1', '4', '1', '0', '0', '', 'oswaldomuñozcortes@iideiberoamerica.com', 'IDE2020'),
	(93, '', 'Jesús', 'Núñez', 'Nava', '933 329 4966', 'jesusnueznava@yahoo.es', 'MASCULINO', '23593', 'jesusnuñeznava@iide-edu.com', 'iide2020', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', '', 'MAESTRIA', '', '', '', '', '', '', '', '', '', '1', '4', '1', '1', '0', '', 'jesusnuñeznava@iideiberoamerica.com', 'IDE2020'),
	(94, '', 'Beatriz Teresa', 'Pérez', 'Espitia', '644 462 3719', 'beatriz.perez@congresogto.gob.mx', 'FEMENINO', '23972', 'beatrizperezespitia@iide-edu.com', 'iide2020', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', '', 'MAESTRIA', '', '', '', '', '', '', '', '', '', '1', '4', '1', '0', '0', '', 'beatrizperezespitia@iideiberoamerica.com', 'IDE2020'),
	(95, '', 'Jorge Efraín', 'Pérez', 'Galicia', '551 363 2702', 'egrojegroj@gmail.com', 'MASCULINO', '26379', 'jorgeperezgalicia@iide-edu.com', 'iide2020', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', '', 'MAESTRIA', '', '', '', '', '', '', '', '', '', '1', '4', '1', '0', '0', '', 'jorgeperezgalicia@iideiberoamerica.com', 'IDE2020'),
	(96, '', 'Onésimo Tomás', 'Poot', 'Martínez', '983 138 6760', 'onepoot@hotmail.com', 'MASCULINO', '18935', 'onesimopootmartinez@iide-edu.com', 'iide2020', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', '', 'MAESTRIA', '', '', '', '', '', '', '', '', '', '1', '4', '1', '1', '0', '', 'onesimopootmartinez@iideiberoamerica.com', 'IDE2020'),
	(97, '', 'Adolfo', 'Román', 'Montero', '554 771 2436', 'licadolform@yahoo.com.mx', 'MASCULINO', '29493', 'adolforomanmontero@iide-edu.com', 'iide2020', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', '', 'MAESTRIA', '', '', '', '', '', '', '', '', '', '1', '4', '1', '1', '0', '', 'adolforomanmontero@iideiberoamerica.com', 'IDE2020'),
	(98, '', 'Francisco Jesús', 'Ruiz', 'Hernández', '664 123 0064', 'francisco.ruhe@gmail.com', 'MASCULINO', '', 'franciscoruizhernandez@iide-edu.com', 'iide2020', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', '', 'MAESTRIA', '', '', '', '', '', '', '', '', '', '1', '4', '1', '0', '0', '', 'franciscoruizhernandez@iideiberoamerica.com', 'IDE2020'),
	(99, '', 'Eduardo', 'Salgado', 'Pedraza', '722 215 3519', 'salgadoe71@gmail.com', 'MASCULINO', '26275', 'eduardosalgadopedraza@iide-edu.com', 'iide2020', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', '', 'MAESTRIA', '', '', '', '', '', '', '', '', '', '1', '4', '1', '0', '0', '', 'eduardosalgadopedraza@iideiberoamerica.com', 'IDE2020'),
	(100, '', 'Rafael', 'Sánchez', 'Hernández', '228 140 6408', 'rafas21@yahoo.com.mx', 'MASCULINO', '', 'rafaelsanchezhernandez@iide-edu.com', 'iide2020', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', '', 'MAESTRIA', '', '', '', '', '', '', '', '', '', '1', '4', '1', '0', '0', '', 'rafaelsanchezhernandez@iideiberoamerica.com', 'IDE2020'),
	(101, '', 'Alejandro Moctezuma', 'Zapata', 'Cabrera', '961 177 3347', 'alejandrozapat@hotmail.com', 'MASCULINO', '', 'alejandrozapatacabrera@iide-edu.com', 'iide2020', '', '', '0', '0', '', '', '0', '0', 'MEX', '', '', '', 'MEX', '', 'MAESTRIA', '', '', '', '', '', '', '', '', '', '1', '4', '1', '0', '0', '', 'alejandrozapatacabrera@iideiberoamerica.com', 'IDE2020');
/*!40000 ALTER TABLE `usuario_activo` ENABLE KEYS */;

-- Volcando estructura para tabla ibero.usuario_activo1
CREATE TABLE IF NOT EXISTS `usuario_activo1` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_inicial` datetime DEFAULT NULL,
  `nombre` varchar(75) DEFAULT NULL,
  `ap_paterno` varchar(75) DEFAULT NULL,
  `ap_materno` varchar(75) DEFAULT NULL,
  `telefono` bigint(20) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `sexo` varchar(12) DEFAULT NULL,
  `fecha_nac` date DEFAULT NULL,
  `emailInst` varchar(255) DEFAULT NULL,
  `pass` varchar(255) DEFAULT NULL,
  `calle` varchar(12) DEFAULT NULL,
  `num_int` varchar(50) NOT NULL,
  `num_ext` varchar(50) NOT NULL,
  `ciudad` varchar(50) DEFAULT NULL,
  `estado` varchar(50) DEFAULT NULL,
  `cod_postal` int(11) NOT NULL,
  `periodo` varchar(50) NOT NULL,
  `nacionalidad` varchar(50) DEFAULT NULL,
  `doc_acreditacion` varchar(255) DEFAULT NULL,
  `num_doc` varchar(255) DEFAULT NULL,
  `universidad` varchar(150) DEFAULT NULL,
  `pais_estudio` varchar(50) DEFAULT NULL,
  `estado_estudio` varchar(50) DEFAULT NULL,
  `tipo_titulo` varchar(80) DEFAULT NULL,
  `fecha_finalizacion` datetime DEFAULT NULL,
  `doc_recibo` varchar(255) DEFAULT NULL,
  `doc_fotografia` varchar(255) DEFAULT NULL,
  `doc_acta` varchar(255) DEFAULT NULL,
  `doc_titulo` varchar(255) DEFAULT NULL,
  `doc_identificacion` varchar(255) DEFAULT NULL,
  `doc_cv` varchar(255) DEFAULT NULL,
  `doc_cert` varchar(255) DEFAULT NULL,
  `doc_cedula` varchar(255) DEFAULT NULL,
  `id_perfil` int(11) DEFAULT 1,
  `id_posgrado` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `bloqueado` int(11) NOT NULL,
  `eliminado` int(11) NOT NULL,
  `ultimaActualizacion` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `telefono_index` (`telefono`),
  KEY `num_int_index` (`num_int`),
  KEY `num_ext_index` (`num_ext`),
  KEY `cod_postal_index` (`cod_postal`),
  KEY `periodo_index` (`periodo`),
  KEY `id_posgrado_index` (`id_posgrado`),
  KEY `status_index` (`status`),
  KEY `bloqueado_index` (`bloqueado`),
  KEY `eliminado_index` (`eliminado`),
  KEY `email` (`email`),
  KEY `emailInst` (`emailInst`)
) ENGINE=InnoDB AUTO_INCREMENT=78 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla ibero.usuario_activo1: ~78 rows (aproximadamente)
/*!40000 ALTER TABLE `usuario_activo1` DISABLE KEYS */;
INSERT INTO `usuario_activo1` (`id`, `fecha_inicial`, `nombre`, `ap_paterno`, `ap_materno`, `telefono`, `email`, `sexo`, `fecha_nac`, `emailInst`, `pass`, `calle`, `num_int`, `num_ext`, `ciudad`, `estado`, `cod_postal`, `periodo`, `nacionalidad`, `doc_acreditacion`, `num_doc`, `universidad`, `pais_estudio`, `estado_estudio`, `tipo_titulo`, `fecha_finalizacion`, `doc_recibo`, `doc_fotografia`, `doc_acta`, `doc_titulo`, `doc_identificacion`, `doc_cv`, `doc_cert`, `doc_cedula`, `id_perfil`, `id_posgrado`, `status`, `bloqueado`, `eliminado`, `ultimaActualizacion`) VALUES
	(0, '2019-12-03 11:06:41', 'Control Escolar', '', '', 0, 'ing.blancoross@gmail.com', 'MASCULINO', '2020-03-09', 'ing.blancoross@gmail.com', 'IDE2020', 'OSA MENOR', '15', '16', 'CENTRO', 'TABASCO', 86127, '2020', 'MEX', NULL, NULL, 'IUP', 'MEX', 'TAB', 'MAESTRIA', '2017-03-09 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 1, 0, 0, '2020-03-09 16:36:32'),
	(1, '2019-12-03 11:06:41', 'Norberto', 'Arias', 'Ku', 7712660866, 'norbertoariasku@ideiberoamerica.com', 'MASCULINO', '2020-03-09', 'norbertoariasku@ideiberoamerica.com', 'IDE2020', 'OSA MENOR', '15', '16', 'CENTRO', 'TABASCO', 86127, '2020', 'MEX', NULL, NULL, 'IUP', 'MEX', 'TAB', 'MAESTRIA', '2017-03-09 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, 0, 0, '2020-03-09 16:36:32'),
	(2, NULL, 'Alan Gerardo', 'Arias', 'Flores', 0, 'alanariasflores@ideiberoamerica.com', NULL, NULL, 'alanariasflores@ideiberoamerica.com', 'IDE2020', NULL, '0', '0', NULL, NULL, 0, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, 1, 0, NULL),
	(3, NULL, 'Sandor', 'Arévalo', 'Zurita', 0, 'sandorarevalozurita@ideiberoamerica.com', NULL, NULL, 'sandorarevalozurita@ideiberoamerica.com', 'IDE2020', NULL, '0', '0', NULL, NULL, 0, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, 0, 0, NULL),
	(4, NULL, 'Azalea', 'Argaiz', 'Gutiérrez', 0, 'azaleaargaizgutierrez@ideiberoamerica.com', NULL, NULL, 'azaleaargaizgutierrez@ideiberoamerica.com', 'IDE2020', NULL, '0', '0', NULL, NULL, 0, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, 0, 0, NULL),
	(5, NULL, 'Manuel', 'Castilla', 'de Alba', 0, 'manuelcastilladealba@ideiberoamerica.com', NULL, NULL, 'manuelcastilladealba@ideiberoamerica.com', 'IDE2020', NULL, '0', '0', NULL, NULL, 0, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, 0, 0, NULL),
	(6, NULL, 'Alfonso', 'Correa', 'Flores', 0, 'alfonsocorreaflores@ideiberoamerica.com', NULL, NULL, 'alfonsocorreaflores@ideiberoamerica.com', 'IDE2020', NULL, '0', '0', NULL, NULL, 0, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, 1, 0, NULL),
	(7, NULL, 'Mauricio', 'Corona', 'Espinosa', 0, 'mauriciocoronaespinosa@ideiberoamerica.com', NULL, NULL, 'mauriciocoronaespinosa@ideiberoamerica.com', 'IDE2020', NULL, '0', '0', NULL, NULL, 0, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, 0, 0, NULL),
	(8, NULL, 'José Antonio', 'Estrada', 'Murillo', 0, 'antonioestradamurillo@ideiberoamerica.com', NULL, NULL, 'antonioestradamurillo@ideiberoamerica.com', 'IDE2020', NULL, '0', '0', NULL, NULL, 0, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, 0, 0, NULL),
	(9, NULL, 'Eliaquín', 'García', 'Alvarado', 0, 'eliaquingarciaalvarado@ideiberoamerica.com', NULL, '2020-03-09', 'eliaquingarciaalvarado@ideiberoamerica.com', 'IDE2020', NULL, '0', '0', NULL, NULL, 0, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, 0, 0, NULL),
	(10, NULL, 'Fabiola del Carmen', 'Gutu', 'Jiménez', 0, 'fabiolagutujimenez@ideiberoamerica.com', NULL, NULL, 'fabiolagutujimenez@ideiberoamerica.com', 'IDE2020', NULL, '0', '0', NULL, NULL, 0, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, 0, 0, NULL),
	(11, NULL, 'Felipe Ramón', 'López', 'Canabal', 0, 'felipelopezcanabal@ideiberoamerica.com', NULL, NULL, 'felipelopezcanabal@ideiberoamerica.com', 'IDE2020', NULL, '0', '0', NULL, NULL, 0, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, 0, 0, NULL),
	(12, NULL, 'Isidro', 'Miguel', 'Gutiérrez', 0, 'isidromiguelgutierrez@ideiberoamerica.com', NULL, NULL, 'isidromiguelgutierrez@ideiberoamerica.com', 'IDE2020', NULL, '0', '0', NULL, NULL, 0, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, 0, 0, NULL),
	(13, NULL, 'Mérida Mayra', 'Miranda', 'Ortega', 0, 'meridamirandaortega@ideiberoamerica.com', NULL, NULL, 'meridamirandaortega@ideiberoamerica.com', 'IDE2020', NULL, '0', '0', NULL, NULL, 0, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, 0, 0, NULL),
	(14, NULL, 'Ahída Rubí', 'Peña', 'Flores', 0, 'ahidapeñaflores@ideiberoamerica.com', NULL, NULL, 'ahidapeñaflores@ideiberoamerica.com', 'IDE2020', NULL, '0', '0', NULL, NULL, 0, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, 0, 0, NULL),
	(15, NULL, 'Rogelio', 'Rodríguez', 'Luna', 0, 'rogeliorodriguezluna@ideiberoamerica.com', NULL, NULL, 'rogeliorodriguezluna@ideiberoamerica.com', 'IDE2020', NULL, '0', '0', NULL, NULL, 0, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, 0, 0, NULL),
	(16, NULL, 'María Antonieta', 'Rojas', 'Rivera', 0, 'mariarojasrivera@ideiberoamerica.com', NULL, NULL, 'mariarojasrivera@ideiberoamerica.com', 'IDE2020', NULL, '0', '0', NULL, NULL, 0, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, 0, 0, NULL),
	(17, NULL, 'Luis Enrique', 'Rosas', 'Díaz', 0, 'luisrosasdiaz@ideiberoamerica.com', NULL, NULL, 'luisrosasdiaz@ideiberoamerica.com', 'IDE2020', NULL, '0', '0', NULL, NULL, 0, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, 0, 0, NULL),
	(18, NULL, 'Ernesto Jaime', 'Ruiz', 'Pérez', 0, 'ernestoruizperez@ideiberoamerica.com', NULL, NULL, 'ernestoruizperez@ideiberoamerica.com', 'IDE2020', NULL, '0', '0', NULL, NULL, 0, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, 1, 0, NULL),
	(19, NULL, 'Luis Javier', 'Ventura', 'Frías', 0, 'javierventurafrias@ideiberoamerica.com', NULL, NULL, 'javierventurafrias@ideiberoamerica.com', 'IDE2020', NULL, '0', '0', NULL, NULL, 0, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, 0, 0, NULL),
	(20, NULL, 'Cristina Liliám', 'Aguirre', 'Navarro', 0, 'cristinaaguirrenavarro@ideiberoamerica.com', NULL, NULL, 'cristinaaguirrenavarro@ideiberoamerica.com', 'IDE2020', NULL, '0', '0', NULL, NULL, 0, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 2, 1, 0, 0, NULL),
	(21, NULL, 'Oscar', 'Álvarez', 'Hernández', 0, 'oscaralvarezhernandez@ideiberoamerica.com', NULL, NULL, 'oscaralvarezhernandez@ideiberoamerica.com', 'IDE2020', NULL, '0', '0', NULL, NULL, 0, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 2, 1, 1, 0, NULL),
	(22, NULL, 'Fierro Rodolfo', 'Andrade', 'del', 0, 'rodolfoandradedelfierro@ideiberoamerica.com', NULL, NULL, 'rodolfoandradedelfierro@ideiberoamerica.com', 'IDE2020', NULL, '0', '0', NULL, NULL, 0, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 2, 1, 1, 0, NULL),
	(23, NULL, 'Sara Alicia', 'Avendaño', 'Alvarado', 0, 'saraavendañoalvarado@ideiberoamerica.com', NULL, NULL, 'saraavendañoalvarado@ideiberoamerica.com', 'IDE2020', NULL, '0', '0', NULL, NULL, 0, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 2, 1, 0, 0, NULL),
	(24, NULL, 'Cupertino', 'Blancas', 'Cortés', 0, 'cupertinoblancascortes@ideiberoamerica', NULL, NULL, 'cupertinoblancascortes@ideiberoamerica', 'IDE2020', NULL, '0', '0', NULL, NULL, 0, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 2, 1, 0, 0, NULL),
	(25, NULL, 'Diana Laura', 'Cabrera', 'Gómez', 0, 'dianacabreragomez@ideiberoamerica.com', NULL, NULL, 'dianacabreragomez@ideiberoamerica.com', 'IDE2020', NULL, '0', '0', NULL, NULL, 0, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 2, 1, 0, 0, NULL),
	(26, NULL, 'Ramón', 'Cardona', 'Durán', 0, 'ramoncardonaduran@ideiberoamerica', NULL, NULL, 'ramoncardonaduran@ideiberoamerica', 'IDE2020', NULL, '0', '0', NULL, NULL, 0, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 2, 1, 0, 0, NULL),
	(27, NULL, 'Francisco de Jesús', 'David', 'Hernández', 0, 'franciscodavidhernandez@ideiberoamerica', NULL, NULL, 'franciscodavidhernandez@ideiberoamerica', 'IDE2020', NULL, '0', '0', NULL, NULL, 0, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 2, 1, 1, 0, NULL),
	(28, NULL, 'David Manuel', 'Estrada', 'Chan', 0, 'davidestradachan@ideiberoamerica', NULL, NULL, 'davidestradachan@ideiberoamerica', 'IDE2020', NULL, '0', '0', NULL, NULL, 0, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 2, 1, 0, 0, NULL),
	(29, NULL, 'Héctor', 'García', 'Vera', 0, 'hectorgarciavera@ideiberoamerica.com', NULL, NULL, 'hectorgarciavera@ideiberoamerica.com', 'IDE2020', NULL, '0', '0', NULL, NULL, 0, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 2, 1, 0, 0, NULL),
	(30, NULL, 'Juan Francisco', 'Gastélum', 'Ruelas', 0, 'juangastelumruelas@ideiberoamerica', NULL, NULL, 'juangastelumruelas@ideiberoamerica', 'IDE2020', NULL, '0', '0', NULL, NULL, 0, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 2, 1, 1, 0, NULL),
	(31, NULL, 'Irving', 'Garrido', 'Lastra', 0, 'irvinggarridolastra@ideiberoamerica', NULL, NULL, 'irvinggarridolastra@ideiberoamerica', 'IDE2020', NULL, '0', '0', NULL, NULL, 0, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 2, 1, 0, 0, NULL),
	(32, NULL, 'Dany Alberto', 'Góngora', 'Moo', 0, 'danygongoramoo@ideiberoamerica.com', NULL, NULL, 'danygongoramoo@ideiberoamerica.com', 'IDE2020', NULL, '0', '0', NULL, NULL, 0, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 2, 1, 0, 0, NULL),
	(33, NULL, 'Shantal', 'González', 'Meneses', 0, 'shantalgonzalesmeneses@ideiberoamerica.com', NULL, NULL, 'shantalgonzalesmeneses@ideiberoamerica.com', 'IDE2020', NULL, '0', '0', NULL, NULL, 0, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 2, 1, 0, 0, NULL),
	(34, NULL, 'Arturo', 'Gutiérrez', 'Zamora', 0, 'arturogutierrezzamora@ideiberoamerica.com', NULL, NULL, 'arturogutierrezzamora@ideiberoamerica.com', 'IDE2020', NULL, '0', '0', NULL, NULL, 0, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 2, 1, 0, 0, NULL),
	(35, NULL, 'María Rosa', 'Guzmán', 'Valdez', 0, 'mariaguzmanvaldez@ideiberoamerica.com', NULL, NULL, 'mariaguzmanvaldez@ideiberoamerica.com', 'IDE2020', NULL, '0', '0', NULL, NULL, 0, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 2, 1, 0, 0, NULL),
	(36, NULL, 'Jacqueline', 'Karman', 'Conde', 0, 'jaquelinekarmanconde@ideiberoamerica.com', NULL, NULL, 'jaquelinekarmanconde@ideiberoamerica.com', 'IDE2020', NULL, '0', '0', NULL, NULL, 0, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 2, 1, 0, 0, NULL),
	(37, NULL, 'Karla Casandra', 'Lara', 'Barragán', 0, 'karlalarabarragan@ideiberoamerica.com', NULL, NULL, 'karlalarabarragan@ideiberoamerica.com', 'IDE2020', NULL, '0', '0', NULL, NULL, 0, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 2, 1, 0, 0, NULL),
	(38, NULL, 'Jesús David', 'Madrigal', 'López', 0, 'jesusmadrigallopez@ideiberoamerica.com', NULL, NULL, 'jesusmadrigallopez@ideiberoamerica.com', 'IDE2020', NULL, '0', '0', NULL, NULL, 0, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 2, 1, 0, 0, NULL),
	(39, NULL, 'Alejandro de Jesús', 'Martínez', 'Ledesma', 0, 'alejandromartinezledesma@ideiberoamerica.com', NULL, NULL, 'alejandromartinezledesma@ideiberoamerica.com', 'IDE2020', NULL, '0', '0', NULL, NULL, 0, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 2, 1, 0, 0, NULL),
	(40, NULL, 'Fabiola', 'Mauleón', 'Pérez', 0, 'fabiolamauleonperez@ideiberoamerica.com', NULL, NULL, 'fabiolamauleonperez@ideiberoamerica.com', 'IDE2020', NULL, '0', '0', NULL, NULL, 0, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 2, 1, 0, 0, NULL),
	(41, NULL, 'Martha Leticia', 'Mercado', 'Ramírez', 0, 'marthamercadoramirez@ideiberoamerica.com', NULL, NULL, 'marthamercadoramirez@ideiberoamerica.com', 'IDE2020', NULL, '0', '0', NULL, NULL, 0, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 2, 1, 0, 0, NULL),
	(42, NULL, 'Yadira Yrazú', 'Orta', 'Acosta', 0, 'yadiraortaacosta@ideiberoamerica.com', NULL, NULL, 'yadiraortaacosta@ideiberoamerica.com', 'IDE2020', NULL, '0', '0', NULL, NULL, 0, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 2, 1, 0, 0, NULL),
	(43, NULL, 'Oscar Manuel', 'Ortiz', 'Gallegos', 0, 'oscarortizgallegos@ideiberoamerica.com', NULL, NULL, 'oscarortizgallegos@ideiberoamerica.com', 'IDE2020', NULL, '0', '0', NULL, NULL, 0, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 2, 1, 0, 0, NULL),
	(44, NULL, 'Adela', 'Ramos', 'Sánchez', 0, 'adelaramossanchez@ideiberoamerica.com', NULL, NULL, 'adelaramossanchez@ideiberoamerica.com', 'IDE2020', NULL, '0', '0', NULL, NULL, 0, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 2, 1, 0, 0, NULL),
	(45, NULL, 'Néstor Enrique', 'Rivera', 'López', 0, 'nestorriveralopez@ideiberoamerica.com', NULL, NULL, 'nestorriveralopez@ideiberoamerica.com', 'IDE2020', NULL, '0', '0', NULL, NULL, 0, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 2, 1, 1, 0, NULL),
	(46, NULL, 'César Augusto', 'Roldán', 'Flores', 0, 'cesarroldanflores@ideiberoamerica.com', NULL, NULL, 'cesarroldanflores@ideiberoamerica.com', 'IDE2020', NULL, '0', '0', NULL, NULL, 0, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 2, 1, 1, 0, NULL),
	(47, NULL, 'Pedro Guadalupe', 'Ruiz', 'Berzunza', 0, 'pedroruizberzunza@ideiberoamerica.com', NULL, NULL, 'pedroruizberzunza@ideiberoamerica.com', 'IDE2020', NULL, '0', '0', NULL, NULL, 0, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 2, 1, 0, 0, NULL),
	(48, NULL, 'Nallely', 'Salas', 'Vergara', 0, 'nallelysalasvergara@ideiberoamerica.com', NULL, NULL, 'nallelysalasvergara@ideiberoamerica.com', 'IDE2020', NULL, '0', '0', NULL, NULL, 0, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 2, 1, 0, 0, NULL),
	(49, NULL, 'Raúl', 'Samaniego', 'Alvarado', 0, 'raulsamaniegoalvarado@ideiberoamerica.com', NULL, NULL, 'raulsamaniegoalvarado@ideiberoamerica.com', 'IDE2020', NULL, '0', '0', NULL, NULL, 0, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 2, 1, 0, 0, NULL),
	(50, NULL, 'Ricardo', 'Serrato', 'Aguilar', 0, 'ricardoserratoaguilar@ideiberoamerica.com', NULL, NULL, 'ricardoserratoaguilar@ideiberoamerica.com', 'IDE2020', NULL, '0', '0', NULL, NULL, 0, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 2, 1, 0, 0, NULL),
	(51, NULL, 'Alfonso', 'Torres', 'Carrillo', 0, 'alfonsotorrescarrillo@ideiberoamerica.com', NULL, NULL, 'alfonsotorrescarrillo@ideiberoamerica.com', 'IDE2020', NULL, '0', '0', NULL, NULL, 0, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 2, 1, 1, 0, NULL),
	(52, NULL, 'Lázaro', 'Torruco', 'Guzmán', 0, 'lazarotorrucoguzman@ideiberoamerica.com', NULL, NULL, 'lazarotorrucoguzman@ideiberoamerica.com', 'IDE2020', NULL, '0', '0', NULL, NULL, 0, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 2, 1, 0, 0, NULL),
	(53, NULL, 'Krisna Judith', 'Villado', 'Mejía', 0, 'krisnavilladomejia@ideiberoamerica.com', NULL, NULL, 'krisnavilladomejia@ideiberoamerica.com', 'IDE2020', NULL, '0', '0', NULL, NULL, 0, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 2, 1, 0, 0, NULL),
	(54, NULL, 'Luis Enrique', 'Zurita', 'Osorio', 0, 'luiszuritaosorio@ideiberoamerica.com', NULL, NULL, 'luiszuritaosorio@ideiberoamerica.com', 'IDE2020', NULL, '0', '0', NULL, NULL, 0, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 2, 1, 1, 0, NULL),
	(55, NULL, 'Keila Yohana', 'Zurita', 'Roble', 0, 'keilazuritaroble@ideiberoamerica.com', NULL, NULL, 'keilazuritaroble@ideiberoamerica.com', 'IDE2020', NULL, '0', '0', NULL, NULL, 0, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 2, 1, 0, 0, NULL),
	(56, NULL, 'Karla Erandi', 'Zurita', 'Zamacona', 0, 'karlazuritazamacona@ideiberoamerica.com', NULL, NULL, 'karlazuritazamacona@ideiberoamerica.com', 'IDE2020', NULL, '0', '0', NULL, NULL, 0, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 2, 1, 0, 0, NULL),
	(57, NULL, 'Carolina del', 'Ángel', 'Cruz', 0, 'carolinadelangelcruz@ideiberoamerica.com', NULL, NULL, 'carolinadelangelcruz@ideiberoamerica.com', 'IDE2020', NULL, '0', '0', NULL, NULL, 0, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 3, 1, 0, 0, NULL),
	(58, NULL, 'Quintín', 'Aran', 'Dovarganes', 0, 'quintinarandovarganes@ideiberoamerica.com', NULL, NULL, 'quintinarandovarganes@ideiberoamerica.com', 'IDE2020', NULL, '0', '0', NULL, NULL, 0, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 3, 1, 0, 0, NULL),
	(59, NULL, 'Iván', 'Arazo', 'Martínez', 0, 'ivanarazomartinez@ideiberoamerica.com', NULL, NULL, 'ivanarazomartinez@ideiberoamerica.com', 'IDE2020', NULL, '0', '0', NULL, NULL, 0, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 3, 1, 0, 0, NULL),
	(60, NULL, 'Georgina', 'Ávila', 'Silva', 0, 'georginaavilasilva@ideiberoamerica.com', NULL, NULL, 'georginaavilasilva@ideiberoamerica.com', 'IDE2020', NULL, '0', '0', NULL, NULL, 0, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 3, 1, 0, 0, NULL),
	(61, NULL, 'Perla Lizette', 'Bueno', 'Torres', 0, 'perlabuenotorres@ideiberoamerica.com', NULL, NULL, 'perlabuenotorres@ideiberoamerica.com', 'IDE2020', NULL, '0', '0', NULL, NULL, 0, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 3, 1, 0, 0, NULL),
	(62, NULL, 'Jorge Alberto', 'Chan', 'Cob', 0, 'jorgechancob@ideiberoamerica.com', NULL, NULL, 'jorgechancob@ideiberoamerica.com', 'IDE2020', NULL, '0', '0', NULL, NULL, 0, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 3, 1, 1, 0, NULL),
	(63, NULL, 'Luis Manuel', 'Colín', 'Muñiz', 0, 'luiscolimuñiz@ideiberoamerica.com', NULL, NULL, 'luiscolimuñiz@ideiberoamerica.com', 'IDE2020', NULL, '0', '0', NULL, NULL, 0, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 3, 1, 1, 0, NULL),
	(64, NULL, 'María Elena', 'Franco', 'Salinas', 0, 'mariafrancosalinas@ideiberoamerica.com', NULL, NULL, 'mariafrancosalinas@ideiberoamerica.com', 'IDE2020', NULL, '0', '0', NULL, NULL, 0, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 3, 1, 0, 0, NULL),
	(65, NULL, 'María de la Luz', 'García', 'Jiménez', 0, 'mariagarciajimenez@ideiberoamerica.com', NULL, NULL, 'mariagarciajimenez@ideiberoamerica.com', 'IDE2020', NULL, '0', '0', NULL, NULL, 0, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 3, 1, 0, 0, NULL),
	(66, NULL, 'Leopoldo José', 'García', 'Mendoza', 0, 'leopoldogarciamendoza@ideiberoamerica.com', NULL, NULL, 'leopoldogarciamendoza@ideiberoamerica.com', 'IDE2020', NULL, '0', '0', NULL, NULL, 0, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 3, 1, 0, 0, NULL),
	(67, NULL, 'Augusto', 'Hernández', 'Abogado', 0, 'augustohernandezabogado@ideiberoamerica.com', NULL, NULL, 'augustohernandezabogado@ideiberoamerica.com', 'IDE2020', NULL, '0', '0', NULL, NULL, 0, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 3, 1, 1, 0, NULL),
	(68, NULL, 'Miguel Benjamín', 'Huizar', 'Martínez', 0, 'miguelhuizarmartinez@ideiberoamerica.com', NULL, NULL, 'miguelhuizarmartinez@ideiberoamerica.com', 'IDE2020', NULL, '0', '0', NULL, NULL, 0, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 3, 1, 0, 0, NULL),
	(69, NULL, 'Oswald', 'Lara', 'Borges', 0, 'oswaldlaraborges@ideiberoamerica.com', NULL, NULL, 'oswaldlaraborges@ideiberoamerica.com', 'IDE2020', NULL, '0', '0', NULL, NULL, 0, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 3, 1, 0, 0, NULL),
	(70, NULL, 'Leoncio', 'Ortiz', 'Guerra', 0, 'leoncioortizguerra@ideiberoamerica.com', NULL, NULL, 'leoncioortizguerra@ideiberoamerica.com', 'IDE2020', NULL, '0', '0', NULL, NULL, 0, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 3, 1, 0, 0, NULL),
	(71, NULL, 'Francisco Javier', 'Pérez', 'Lugo', 0, 'franciscoperezlugo@ideiberoamerica.com', NULL, NULL, 'franciscoperezlugo@ideiberoamerica.com', 'IDE2020', NULL, '0', '0', NULL, NULL, 0, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 3, 1, 1, 0, NULL),
	(72, NULL, 'Lucía', 'Pérez', 'Martínez', 0, 'luciaperezmartinez@ideiberoamerica.com', NULL, NULL, 'luciaperezmartinez@ideiberoamerica.com', 'IDE2020', NULL, '0', '0', NULL, NULL, 0, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 3, 1, 0, 0, NULL),
	(73, NULL, 'Anel Berenice', 'Ramírez', 'Ladrón de Guevara', 0, 'anelramirezladrondeguevara@ideiberoamerica.com', NULL, NULL, 'anelramirezladrondeguevara@ideiberoamerica.com', 'IDE2020', NULL, '0', '0', NULL, NULL, 0, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 3, 1, 1, 0, NULL),
	(74, NULL, 'Maricruz', 'Valencia', 'Buendía', 0, 'maricruzvalenciabuendia@ideiberoamerica.com', NULL, NULL, 'maricruzvalenciabuendia@ideiberoamerica.com', 'IDE2020', NULL, '0', '0', NULL, NULL, 0, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 3, 1, 0, 0, NULL),
	(75, NULL, 'Bernardo', 'Valle', 'Monroy', 0, 'bernardovallemonroy@ideiberoamerica.com', NULL, NULL, 'bernardovallemonroy@ideiberoamerica.com', 'IDE2020', NULL, '0', '0', NULL, NULL, 0, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 3, 1, 0, 0, NULL),
	(76, NULL, 'Rodrigo', 'Véliz', 'Méndez', 0, 'rodrigovelizmendez@ideiberoamerica.com', NULL, NULL, 'rodrigovelizmendez@ideiberoamerica.com', 'IDE2020', NULL, '0', '0', NULL, NULL, 0, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 3, 1, 1, 0, NULL),
	(77, NULL, 'Miguel Ángel', 'Vera', 'Martínez', 0, 'miguelveramartinez@ideiberoamerica.com', NULL, NULL, 'miguelveramartinez@ideiberoamerica.com', 'IDE2020', NULL, '0', '0', NULL, NULL, 0, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 3, 1, 0, 0, NULL);
/*!40000 ALTER TABLE `usuario_activo1` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
