-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-05-2023 a las 20:23:44
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `lyrixchange`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `canciones`
--

CREATE TABLE `canciones` (
  `id_cancion` int(11) NOT NULL,
  `id_usuario` varchar(30) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `artista` varchar(30) NOT NULL,
  `numero_valoraciones` int(11) NOT NULL,
  `servidor_fotos` varchar(40) DEFAULT NULL,
  `letra` varchar(2000) NOT NULL,
  `estrellas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `canciones`
--

INSERT INTO `canciones` (`id_cancion`, `id_usuario`, `nombre`, `artista`, `numero_valoraciones`, `servidor_fotos`, `letra`, `estrellas`) VALUES
(0, 'alvaro@ucm.es', 'The One and Only', 'H.E.A.T', 2, './imagenes/6457e722e82fa.jpg', 'Hey! Something I got to tell you\r\nIt’s hard to say but I need you to know\r\nIt’s time to write a new kind of story\r\nI try to explain the reason why I have to go\r\n\r\n’Cause there’s a time for love\r\nA time for change\r\nA time to mend\r\nBut I can’t pretend ‘cause I wanna be the one and only\r\n\r\nI guess we all need time\r\nI guess we all need space\r\nI guess I&#039;m needing mine\r\nThe one and only one\r\nI guess we live to find a way to draw the line\r\nOr the life will leave behind\r\n\r\n‘Cause I, I wanna be (I wanna be)\r\nYeah, I, I’m gonna be the one and only\r\n\r\nHey! A somewhere in the distance\r\nI know you might find someone, somewhere to go\r\nAnd I don&#039;t know ‘cause my head keeps spinning\r\nReaching for a new beginning\r\nFinally it&#039;s plain to see\r\n\r\nAnd there’s a time for love\r\nA time for change\r\nA time to mend\r\nBut I can’t pretend ‘cause I wanna be the one and only\r\n\r\nI guess we all need time\r\nI guess we all need space\r\nI guess I&#039;m needing mine\r\nThe one and only one\r\nI guess we live to find a way to draw the line\r\nOr the life will leave behind\r\n\r\n‘Cause I, I wanna be (I wanna be)\r\nYeah, I, I’m gonna be the one and only\r\n\r\nI guess we all need time\r\nI guess we all need space\r\nI guess I&#039;m needing mine\r\nThe one and only one\r\nI guess we live to find a way to draw the line\r\nOr the life will leave behind\r\n\r\n‘Cause I, I wanna be (I wanna be)\r\nYeah, I, I’m gonna be the one and only\r\n\r\nTell me yeah!\r\nThe one and only yeah!\r\nLet me know I just feel the pain, oh\r\nThe one and only one', 5),
(1683482897, 'noelia@ucm.es', 'Permiso o perdón', 'Viva Suecia', 2, './imagenes/6457e91173491.jpg', 'Es capital\r\nO lo contrario\r\nSaber que va a estallar\r\nY prolongarlo\r\nEntonces qué hay de ti\r\nFuera del podio\r\nLa misma sombra gris\r\nSembrando odio\r\nVas detrás\r\nDe todo lo que acaba fatal\r\nTambién te gusta que te den la razón\r\nVas a pedir permiso o perdón\r\nPermiso o perdón\r\nPermiso o perdón\r\nPermiso o perdón\r\nVas detrás\r\nDe todo lo que acaba fatal\r\nTambién te gusta que te den la razón\r\nVas a pedir permiso o perdón\r\nPermiso o perdón\r\nPermiso o perdón\r\nPermiso o perdón', 4),
(1683482964, 'noelia@ucm.es', 'Viento de cara', 'Supersubmarina', 1, './imagenes/6457e954d1201.jpeg', 'Te busco en el hueco que queda en mi alma\r\nTan frio y profundo que no encuentro nada\r\nQuisiera volverme invisible y colarme esta noche en tu cama\r\nMe acuesto a la sombra de un árbol sin ramas\r\nLas dudas y el miedo me sirven de almohada\r\nDormirme seria imposible\r\nLa hierba me escuece en la cara\r\n\r\nQue cada vez que te vuelva a mirar\r\nMe resulte mas facil morir\r\nQue obligarme a decir la verdad\r\n\r\nEl rayo que no cesa\r\nMar en calma\r\nFaro entre la niebla\r\nViento de cara\r\nViento de cara\r\n\r\nLa luna se asoma y parece de plata\r\nEl sol le hace frente al llegar la mañana\r\nQuisiera que fuera invencible\r\nY que nunca jamás se apagara\r\n\r\nQue cada vez que te vuelva a mirar\r\nMe resulte mas fácil morir\r\nQue obligarme a decir la verdad\r\n\r\nEl rayo que no cesa\r\nMar en calma\r\nFaro entre la niebla\r\nViento de cara\r\nViento de cara\r\n\r\nQue cada vez que te vuelva a mirar\r\nMe resulte más fácil morir\r\nQue obligarme a decir la verdad\r\n\r\nQue cada vez que te vuelva a mirar\r\nMe resulte más fácil morir\r\nQue obligarme a decir la verdad\r\n\r\nEl rayo que no cesa\r\nMar en calma\r\nFaro entre la niebla\r\nViento de cara\r\nViento de cara\r\nViento de cara\r\nViento de cara\r\nViento de cara\r\nViento de cara', 4),
(1683483577, 'pablo@ucm.es', 'Leitmotiv', 'Sexma', 1, './imagenes/6457ebb911d4a.jpg', 'Como un cuento de hadas que comienza sin final\r\nSiento a tu semilla retorcer mi realidad\r\nPor dentro tu simiente comienza a brotar\r\nComo una melodía que me ayuda a gritar\r\n\r\nHabitará y se expandirá absorbiendo los momentos de pena\r\nVuelve a nacer, a emerger, retorciéndose en la raíz de mis venas\r\n\r\nHoy te ofrezco mi mano, como a un hermano, dispuesto a morir Por ti,\r\nNo me abandones, sin condiciones, eres mi leitmotiv\r\n\r\nComo un guion sin texto que comienza a relatar\r\nLa historia de un ángel que no cesa de llorar\r\nSus alas no están rotas solo cansadas de volar\r\nPor no encontrar su norte ni a su otra mitad\r\n\r\nHabitará y se expandirá absorbiendo los momentos de pena\r\nVuelve a nacer, a emerger, retorciéndose en la raíz de mis venas\r\n\r\nHoy te ofrezco mi mano, como a un hermano, dispuesto a morir Por ti,\r\nNo me abandones, sin condiciones, eres mi leitmotiv', 5),
(1683483637, 'pablo@ucm.es', 'Nightrain', 'Guns n Roses', 1, './imagenes/6457ebf5e31cd.png', 'Loaded like a freight train\r\nFlyin&#039; like an aeroplane\r\nFeelin&#039; like a space brain\r\nOne more time tonight\r\nWell I&#039;m a west coast struttin&#039;\r\nOne bad mother\r\nGot a rattlesnake suitcase\r\nUnder my arm\r\nSaid I&#039;m a mean machine\r\nBeen drinkin&#039; gasoline\r\nAn honey you can make my motor hum\r\nI got one chance left\r\nIn a nine live cat\r\nI got a dog eat dog sly smile\r\nI got a Molotov cocktail with a match to go\r\nI smoke my cigarette with style\r\nAn I can tell you honey\r\nYou can make my money tonight\r\nWake up late honey put on your clothes\r\nTake your credit card to the liquor store\r\nThat&#039;s one for you and two for me by tonight\r\nI&#039;ll be\r\nLoaded like a freight train\r\nFlyin&#039; like an aeroplane\r\nFeelin&#039; like a space brain\r\nOne more time tonight\r\nI&#039;m on the night train\r\nBottoms up\r\nI&#039;m on the night train\r\nFill my cup\r\nI&#039;m on the night train\r\nReady to crash and burn\r\nI never learn\r\nI&#039;m on the night train\r\nI love that stuff\r\nI&#039;m on the night train\r\nI can never get enough\r\nI&#039;m on the night train\r\nNever to return - no\r\nLoaded like a freight train\r\nFlyin&#039; like an aeroplane\r\nSpeedin&#039; like a space brain\r\nOne more time tonight\r\nI&#039;m on the night train\r\nAn I&#039;m lookin&#039; for some\r\nI&#039;m on the night train\r\nSo&#039;s I can leave this slum\r\nI&#039;m on the night train\r\nAnd I&#039;m ready to crash an&#039; burn\r\nNight train\r\nBottoms up\r\nI&#039;m on the night train\r\nFill my cup\r\nI&#039;m on the night train\r\nWhoa yeah\r\nI&#039;m on the night train\r\nLove that stuff\r\nI&#039;m on the night train\r\nAn I can never get enough\r\nRidin&#039; the night train\r\nI guess, I\r\nI guess, I guess, I guess, I never learn\r\nOn the night train\r\nFloat me home\r\nOh I&#039;m on the night train\r\nRidin&#039; the night train\r\nNever to return\r\nNight train', 5),
(1683483685, 'pablo@ucm.es', 'Remembering sunday', 'All Time Low', 1, './imagenes/6457ec25175b0.jpg', 'He woke up from dreaming and put on his shoes\r\nStarted making his way past two in the morning\r\nHe hasn&#039;t been sober for days\r\nLeaning now into the breeze\r\nRemembering Sunday, he falls to his knees\r\nThey had breakfast together\r\nBut two eggs don&#039;t last\r\nLike the feeling of what he needs\r\nNow this place seems familiar to him\r\nShe pulled on his hand with a devilish grin\r\nShe led him upstairs, she led him upstairs\r\nLeft him dying to get in\r\nForgive me, I&#039;m trying to find\r\nMy calling, I&#039;m calling at night\r\nI don&#039;t mean to be a bother\r\nBut have you seen this girl?\r\nShe&#039;s been running through my dreams\r\nAnd it&#039;s driving me crazy, it seems\r\nI&#039;m going to ask her to marry me\r\nEven though she doesn&#039;t believe in love\r\nHe&#039;s determined to call her bluff\r\nWho could deny these butterflies?\r\nThey&#039;re filling his gut\r\nWaking the neighbors, unfamiliar faces\r\nHe pleads though he tries\r\nBut he&#039;s only denied\r\nNow he&#039;s dying to get inside\r\nForgive me, I&#039;m trying to find\r\nMy calling, I&#039;m calling at night\r\nI don&#039;t mean to be a bother\r\nBut have you seen this girl?\r\nShe&#039;s been running through my dreams\r\nAnd it&#039;s driving me crazy, it seems\r\nI&#039;m going to ask her to marry me\r\nThe neighbors said she moved away\r\nFunny how it rained all day\r\nI didn&#039;t think much of it then\r\nBut it&#039;s starting to all make sense\r\nOh, I can see now that all of these clouds\r\nAre following me in my desperate endeavor\r\nTo find my whoever, wherever she may be\r\nI&#039;m not coming back (forgive me)\r\nI&#039;ve done something so terrible\r\nI&#039;m terrified to speak (I&#039;m not calling, I&#039;m not calling)\r\nBut you&#039;d expect that from me\r\nI&#039;m mixed up, I&#039;ll be blunt, now the rain is just (You&#039;re driving me crazy, I&#039;m)\r\nWashing you out of my hair and out of my mind\r\nKeeping an eye on the world,\r\nFrom so many thousands of feet off the ground, I&#039;m over you now\r\nI&#039;m at home in the clouds, and', 3),
(2147483647, 'noelia@ucm.es', 'Time Bomb', 'All Time Low', 1, './imagenes/6457e85c17988.jpg', 'From the get-go, I knew this was hard to hold\r\nLike a crash, the whole thing spun out of control\r\nOh, on a wire, we were dancing\r\nTwo kids, no consequences\r\nPull the trigger without thinking\r\nThere&#039;s only one way down this road\r\n\r\nIt was like a time bomb set into motion\r\nWe knew that we were destined to explode\r\nAnd if I had to pull you out of the wreckage\r\nYou know I&#039;m never gonna let you go\r\nWe&#039;re like a time bomb\r\nGonna lose it\r\nLet&#039;s diffuse it\r\nBaby, we&#039;re like a time bomb\r\nBut I need it\r\nWouldn&#039;t have it any other way\r\n\r\nWell, there&#039;s no way out of this, so let&#039;s stay in\r\nEvery storm that comes also comes to an end\r\nOh, resistance is useless\r\nJust two kids stupid and fearless\r\nLike a bullet shooting the lovesick\r\nThere&#039;s only one way down this road\r\n\r\nIt was like a time bomb set into motion\r\nWe knew that we were destined to explode\r\nAnd if I had to pull you out of the wreckage\r\nYou know I&#039;m never gonna let you go\r\nWe&#039;re like a time bomb\r\nGonna lose it\r\nLet&#039;s diffuse it\r\nBaby, we&#039;re like a time bomb\r\nBut I need it\r\nWouldn&#039;t have it any other way\r\n\r\nGot my heart in your hands\r\nLike a time bomb ticking\r\nIt goes off; we start again\r\nWhen it breaks, we fix it\r\nGot your heart in my hands\r\nLike a time bomb ticking\r\nWe should know better\r\nBut we won&#039;t let go\r\n\r\nIt was like a time bomb set into motion\r\nWe knew that we were destined to explode\r\nAnd if I had to pull you out of the wreckage\r\nYou know I&#039;m never gonna let you let me go\r\nWe&#039;re like a time bomb\r\nGonna lose it\r\nLet&#039;s diffuse it\r\nBaby, we&#039;re like a time bomb\r\nBut I need it\r\nWouldn&#039;t have it any other way', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `rol` int(11) NOT NULL,
  `nombre` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`rol`, `nombre`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `correo` varchar(30) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `contraseña` varchar(60) NOT NULL,
  `sexo` varchar(25) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `pais` varchar(20) NOT NULL,
  `fecha_registro` date NOT NULL,
  `servidor_fotoperfil` varchar(40) DEFAULT NULL,
  `tipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`correo`, `nombre`, `contraseña`, `sexo`, `fecha_nacimiento`, `pais`, `fecha_registro`, `servidor_fotoperfil`, `tipo`) VALUES
('admin@admin.es', 'Admin', '$2y$10$uXz15P8v896cOOaFrcITD.hohGHbG3W0WtU6CyXpRrjDfCK1K8wYq', 'Prefiero no contestar', '2002-12-30', 'Admin', '2023-05-07', './imagenes/6457e57318b92.png', 1),
('alvaro@ucm.es', 'Alvaro', '$2y$10$Xij1w47xePlaLODxVCYBoO/5.FXvFUxuzKE5dvnqKN1FxA7UsL9Wu', 'Hombre', '2002-05-10', 'España', '2023-05-07', './imagenes/6457e6c323b26.png', 2),
('noelia@ucm.es', 'Noelia', '$2y$10$BsAbjbg6mPWbIM0Haz9Doe9LIdBM1AfFkr/CVI99UpnmgskpVYFaq', 'Mujer', '1999-06-08', 'Perú', '2023-05-07', './imagenes/6457e680e73fb.png', 2),
('pablo@ucm.es', 'Pablo', '$2y$10$klTmWbkUfcca.G33yVBEaO42d6qgP44DAmlBZ1x2YVhHXrfjs6RIm', 'Hombre', '2002-10-03', 'España', '2023-05-07', './imagenes/6457e62ecf8de.png', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `valoraciones`
--

CREATE TABLE `valoraciones` (
  `id_valoracion` int(11) NOT NULL,
  `id_cancion` int(11) NOT NULL,
  `id_usuario` varchar(30) NOT NULL,
  `estrellas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `valoraciones`
--

INSERT INTO `valoraciones` (`id_valoracion`, `id_cancion`, `id_usuario`, `estrellas`) VALUES
(1683482525, 0, 'noelia@ucm.es', 5),
(1683483189, 1683482897, 'pablo@ucm.es', 5),
(1683483426, 2147483647, 'pablo@ucm.es', 5),
(1683483435, 0, 'pablo@ucm.es', 4),
(1683483702, 1683482897, 'alvaro@ucm.es', 2),
(1683483713, 1683482964, 'alvaro@ucm.es', 4),
(1683483722, 1683483577, 'alvaro@ucm.es', 5),
(1683483738, 1683483685, 'alvaro@ucm.es', 3),
(1683483754, 1683483637, 'alvaro@ucm.es', 5);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `canciones`
--
ALTER TABLE `canciones`
  ADD PRIMARY KEY (`id_cancion`),
  ADD KEY `usuario` (`id_usuario`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`rol`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`correo`),
  ADD KEY `rol` (`tipo`);

--
-- Indices de la tabla `valoraciones`
--
ALTER TABLE `valoraciones`
  ADD PRIMARY KEY (`id_valoracion`),
  ADD KEY `id_cancion` (`id_cancion`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `canciones`
--
ALTER TABLE `canciones`
  ADD CONSTRAINT `usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`correo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `rol` FOREIGN KEY (`tipo`) REFERENCES `roles` (`rol`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `valoraciones`
--
ALTER TABLE `valoraciones`
  ADD CONSTRAINT `id_cancion` FOREIGN KEY (`id_cancion`) REFERENCES `canciones` (`id_cancion`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`correo`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
