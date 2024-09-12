-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 04, 2023 at 08:25 PM
-- Server version: 8.0.32-0ubuntu0.20.04.2
-- PHP Version: 7.4.3-4ubuntu2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `LyriXchange`
--

--
-- Dumping data for table `canciones`
--

INSERT INTO 'canciones' ('id_cancion', 'id_usuario', 'nombre', 'artista', 'numero_valoraciones', 'servidor_fotos', 'letra', 'estrellas')
VALUES (1, 'usuario1@example.com', 'Canción 1', 'Artista 1', 0, 'https://servidorfotos.com/cancion1', 'Letra de la canción 1', 0);

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`rol`, `nombre`) VALUES
(1, 'admin'),
(2, 'user');

--
-- Dumping data for table `usuarios`
--

INSERT INTO' usuarios' ('correo', 'nombre', 'contraseña', 'sexo', 'fecha_nacimiento', 'pais', 'fecha_registro', 'tipo')
VALUES ('usuario1@example.com', 'Usuario 1', 'contraseña1', 'Masculino', '1990-01-01', 'España', '2022-01-01', 1);

--
-- Dumping data for table `valoraciones`
--

INSERT INTO `valoraciones` (`id_valoracion`,`id_cancion`,`id_usuario`, `estrellas`)
VALUES (1, 1, 'usuario1@example.com', 4);


COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;