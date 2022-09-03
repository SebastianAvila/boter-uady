-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-06-2022 a las 02:54:57
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_exam`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_admin`
--
CREATE DATABASE `db_exam`;
CREATE TABLE `tbl_admin` (
  `adminId` int(11) NOT NULL,
  `adminUser` varchar(50) NOT NULL,
  `adminPass` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_admin`
--

INSERT INTO `tbl_admin` (`adminId`, `adminUser`, `adminPass`) VALUES
(1, 'admin', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_ans`
--

CREATE TABLE `tbl_ans` (
  `id` int(11) NOT NULL,
  `quesNo` int(11) NOT NULL,
  `rightAns` int(11) NOT NULL DEFAULT 0,
  `ans` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_ans`
--

INSERT INTO `tbl_ans` (`id`, `quesNo`, `rightAns`, `ans`) VALUES
(37, 1, 1, 'aa'),
(38, 1, 0, 'ababa'),
(39, 1, 0, 'abab'),
(40, 1, 0, 'abbaba'),
(41, 2, 0, 'abbab'),
(42, 2, 0, 'abab'),
(43, 2, 0, 'abbaa'),
(44, 2, 1, 'aa'),
(45, 3, 1, 'aa'),
(46, 3, 0, 'aba'),
(47, 3, 0, 'ab'),
(48, 3, 0, 'abaaa'),
(49, 4, 0, 'a'),
(50, 4, 1, 'aab'),
(51, 4, 0, 'aba'),
(52, 4, 0, 'ba'),
(53, 5, 1, '(a+b)*ab(a*b)*'),
(54, 5, 0, 'ab'),
(55, 5, 0, 'a*abb*'),
(56, 5, 0, '(ab)*ab(ba)*'),
(57, 6, 0, '(aa)*'),
(58, 6, 1, 'b*(ab*a)*b*'),
(59, 6, 0, '(aba)*'),
(60, 6, 0, 'aa*'),
(61, 7, 1, '((a+b)(a+b))*'),
(62, 7, 0, '(a+b)(a+b)'),
(63, 7, 0, '(a+b)(a+b)*'),
(64, 7, 0, 'aa+bb'),
(65, 8, 0, 'ab'),
(66, 8, 0, '(ab)*'),
(67, 8, 0, 'aa*bb*'),
(68, 8, 1, 'a*b*'),
(69, 9, 0, 'aa*bb(bb)*'),
(70, 9, 0, 'abb'),
(71, 9, 1, 'a*(bb)*'),
(72, 9, 0, '(abb)*'),
(73, 10, 0, '{Palabras en ?={a,b} que empiezan con a o terminan con b}'),
(74, 10, 1, '{Palabras en ?={a,b} que empiezan con a y terminan con b}'),
(75, 10, 0, '{Palabras en ?={a,b} que tienen prefijo b}'),
(76, 10, 0, '{Palabras en ?={a,b} que tienen prefijo a}'),
(153, 11, 1, 'a'),
(154, 11, 0, 'b'),
(155, 11, 0, 'c'),
(156, 11, 0, 'd'),
(157, 12, 0, 'a'),
(158, 12, 0, 'b'),
(159, 12, 0, 'c'),
(160, 12, 1, 'd'),
(161, 13, 0, 'a'),
(162, 13, 0, 'b'),
(163, 13, 1, 'c'),
(164, 13, 0, 'd'),
(165, 14, 1, 'a'),
(166, 14, 0, 'b'),
(167, 14, 0, 'c'),
(168, 14, 0, 'd'),
(169, 15, 1, 'a'),
(170, 15, 0, 'b'),
(171, 15, 0, 'c'),
(172, 15, 0, 'd'),
(173, 16, 0, 'a'),
(174, 16, 0, 'b'),
(175, 16, 1, 'c'),
(176, 16, 0, 'd'),
(177, 17, 1, 'a'),
(178, 17, 0, 'b'),
(179, 17, 0, 'c'),
(180, 17, 0, 'd'),
(181, 18, 0, 'a'),
(182, 18, 0, 'b'),
(183, 18, 1, 'c'),
(184, 18, 0, 'd'),
(185, 19, 1, 'a'),
(186, 19, 0, 'b'),
(187, 19, 0, 'c'),
(188, 19, 0, 'd'),
(189, 20, 1, 'a'),
(190, 20, 0, 'b'),
(191, 20, 0, 'c'),
(192, 20, 0, 'd'),
(193, 21, 0, 'a'),
(194, 21, 1, 'b'),
(195, 21, 0, 'c'),
(196, 21, 0, 'd'),
(197, 22, 0, 'a'),
(198, 22, 0, 'b'),
(199, 22, 0, 'c'),
(200, 22, 1, 'd'),
(201, 23, 0, 'a'),
(202, 23, 0, 'b'),
(203, 23, 1, 'c'),
(204, 23, 0, 'd'),
(205, 24, 1, 'a'),
(206, 24, 0, 'b'),
(207, 24, 0, 'c'),
(208, 24, 0, 'd'),
(209, 25, 0, 'a'),
(210, 25, 0, 'b'),
(211, 25, 1, 'c'),
(212, 25, 0, 'd');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_ques`
--

CREATE TABLE `tbl_ques` (
  `quesNo` int(11) NOT NULL,
  `ques` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_ques`
--

INSERT INTO `tbl_ques` (`quesNo`, `ques`) VALUES
(1, '¿Cuál de las siguientes palabras es aceptada por la ER: ab*a?'),
(2, '¿Cuál de las siguientes palabras es aceptada por la ER: a(b*a)?'),
(3, '¿Cuál de las siguientes palabras es rechazada por la ER: a(ba*)?'),
(4, '¿Cuál de las siguientes palabras es rechazada por la ER: a*(b*a)?'),
(5, '¿Cuál de estas ER representa al Lenguaje = {Palabras en ?={a,b} que contienen la subcadena ab}?'),
(6, '¿Cuál de estas ER representa al Lenguaje = {Palabras en ?={a,b} que contienen un número par de a’s}? '),
(7, '¿Cuál de estas ER representa al Lenguaje = {Palabras en ?={a,b} que tienen longitud par}?'),
(8, '¿Cuál de estas ER representa al Lenguaje = {anbm|m, n ? 0} en ?={a,b}?'),
(9, '¿Cuál de estas ER representa al Lenguaje = {anb2m| n,m ? 0} en ?={a,b}?'),
(10, '¿Cuál de estas descripciones corresponde al Lenguaje Regular denotado por la ER a(a+b)*b?'),
(11, 'Prueba1'),
(12, 'Prueba2'),
(13, 'Prueba3'),
(14, 'Prueba4'),
(15, 'Prueba5'),
(16, 'Prueba6'),
(17, 'Prueba7'),
(18, 'Prueba8'),
(19, 'Prueba9'),
(20, 'Prueba10'),
(21, 'Prueba11'),
(22, 'Prueba12'),
(23, 'Prueba13'),
(24, 'Prueba14'),
(25, 'Prueba15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_user`
--

CREATE TABLE `tbl_user` (
  `userid` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(32) NOT NULL,
  `email` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_user`
--

INSERT INTO `tbl_user` (`userid`, `name`, `username`, `password`, `email`, `status`) VALUES
(25, 'Alejandro Canche', 'ACEmma25', 'b75bd008d5fecb1f50cf026532e8ae67', 'canche.emma25@gmail.com', 0),
(49, 'ACEmma', 'Emma', '202cb962ac59075b964b07152d234b70', 'alejandrocanche.emma@gmail.com', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`adminId`);

--
-- Indices de la tabla `tbl_ans`
--
ALTER TABLE `tbl_ans`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_ques`
--
ALTER TABLE `tbl_ques`
  ADD PRIMARY KEY (`quesNo`);

--
-- Indices de la tabla `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `adminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tbl_ans`
--
ALTER TABLE `tbl_ans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=213;

--
-- AUTO_INCREMENT de la tabla `tbl_ques`
--
ALTER TABLE `tbl_ques`
  MODIFY `quesNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
