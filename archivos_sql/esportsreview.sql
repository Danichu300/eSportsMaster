-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-05-2018 a las 13:08:48
-- Versión del servidor: 10.1.31-MariaDB
-- Versión de PHP: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `esportsreview`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentario`
--

CREATE TABLE `comentario` (
  `id_comentario` int(11) NOT NULL,
  `usuario` int(11) NOT NULL,
  `contenido` text NOT NULL,
  `videojuego` varchar(255) NOT NULL,
  `fecha_comentario` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `comentario`
--

INSERT INTO `comentario` (`id_comentario`, `usuario`, `contenido`, `videojuego`, `fecha_comentario`) VALUES
(1, 1, 'hola', 'csgo', '2018-04-17 06:54:50'),
(2, 1, 'prueba', 'csgo', '2018-04-17 06:57:49'),
(3, 1, 'asdadasd', 'csgo', '2018-04-17 06:59:08'),
(4, 1, 'asoidniasndiasnd', 'csgo', '2018-04-17 07:09:37'),
(5, 1, 'Prueba súper final', 'csgo', '2018-04-17 07:12:04'),
(8, 1, 'textamen textamen textamen textamen textamentextamen textamen textamen textamen textamentextamen textamen textamen textamen textamentextamen textamen textamen textamen textamentextamen textamen textamen textamen textamentextamen textamen textamen textamen textamentextamen textamen textamen textamen textamentextamen textamen textamen textamen textamentextamen textamen textamen textamen textamentextamen textamen textamen textamen textamen', 'csgo', '2018-04-17 07:40:20'),
(9, 1, 'asdnaskndsad', 'csgo', '2018-04-17 07:46:49'),
(10, 1, 'a ver si ya va ;)', 'csgo', '2018-04-17 07:48:08'),
(11, 1, 'puto amo xd', 'csgo', '2018-04-17 07:49:41'),
(13, 1, 'ay dioh mio xfaboh', 'csgo', '2018-04-17 09:27:37'),
(14, 1, 'Vale, todo sigue guay', 'csgo', '2018-04-18 11:14:28'),
(15, 1, 'ndsjkfnskjfsdf', 'csgo', '2018-04-23 14:07:01'),
(16, 1, 'ME ENCANTA QUE ME TROLEEN MIS PROPIOS COMENTARIOOOOOOOOOS !!!!! D:<', 'csgo', '2018-04-23 14:09:13'),
(17, 1, 'Oh dios mio sigue funcionando :D', 'csgo', '2018-04-27 11:22:10'),
(18, 1, 'Primer Comentario del Overwatch', 'overwatch', '2018-05-03 13:46:10'),
(19, 1, 'Primer comentario de HOTS', 'hots', '2018-05-04 08:05:26'),
(20, 1, 'Primer comentario del LoL', 'lol', '2018-05-04 10:54:00'),
(21, 1, 'Primer comentario del PUBG', 'pubg', '2018-05-04 12:09:24'),
(22, 1, 'Primer comentario del Rocket League.', 'rocket', '2018-05-07 13:56:21'),
(23, 1, 'Primer comentario del DOTA 2', 'dota', '2018-05-08 07:11:34');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipo`
--

CREATE TABLE `equipo` (
  `id_equipo` int(11) NOT NULL,
  `nombre_equipo` varchar(255) NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `videojuego` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `equipo`
--

INSERT INTO `equipo` (`id_equipo`, `nombre_equipo`, `logo`, `videojuego`) VALUES
(1, 'Equipo Chupifástico', NULL, 1),
(2, 'Chunguitos', NULL, 1),
(3, 'Dioses del Olimpo', NULL, 1),
(4, 'Nosemeocurrenada', NULL, 1),
(5, 'Los Pitufos', NULL, 1),
(6, 'MLG TEAM', NULL, 1),
(7, 'The Skipps', NULL, 1),
(11, 'Damn Son', NULL, 1),
(14, 'Equipo Genji', NULL, 2),
(15, 'D.Va. Dream', NULL, 2),
(16, 'Venganza de Thrall', NULL, 4),
(17, 'Traidores de Illidan', NULL, 4),
(18, 'StarCraft Commanders', NULL, 4),
(19, 'Salvación de Santuario', NULL, 4),
(20, 'Teemo Loves Destruction', NULL, 6),
(21, 'The Void Team', NULL, 6),
(22, 'Muerte Segura', NULL, 7),
(23, 'Segadores del Valle', NULL, 7),
(24, 'Rocket Team', NULL, 8),
(25, 'Wheel n Steel', NULL, 8),
(26, 'Mystic Summoners', NULL, 10),
(27, 'Cerebral Nexus', NULL, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipo_partido`
--

CREATE TABLE `equipo_partido` (
  `id_equipo` int(11) NOT NULL,
  `id_partido` int(11) NOT NULL,
  `resultado` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `equipo_partido`
--

INSERT INTO `equipo_partido` (`id_equipo`, `id_partido`, `resultado`) VALUES
(1, 2, 1),
(2, 2, 0),
(3, 3, 1),
(4, 3, 0),
(5, 4, 1),
(6, 4, 0),
(7, 5, 0),
(8, 5, 1),
(11, 8, 0),
(12, 8, 1),
(14, 9, 0),
(15, 9, 1),
(16, 11, 1),
(17, 11, 0),
(18, 12, 0),
(19, 12, 1),
(20, 13, 1),
(20, 14, 0),
(20, 15, 1),
(21, 13, 0),
(21, 14, 1),
(21, 15, 0),
(22, 16, 1),
(22, 17, 1),
(23, 16, 0),
(23, 17, 0),
(24, 18, 0),
(24, 19, 1),
(24, 20, 0),
(24, 21, 0),
(24, 22, 0),
(25, 18, 1),
(25, 19, 0),
(25, 20, 1),
(25, 21, 1),
(25, 22, 1),
(26, 21, 0),
(26, 22, 0),
(27, 21, 1),
(27, 22, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jugador`
--

CREATE TABLE `jugador` (
  `id_jugador` int(11) NOT NULL,
  `nombre_jugador` varchar(255) NOT NULL,
  `equipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `jugador`
--

INSERT INTO `jugador` (`id_jugador`, `nombre_jugador`, `equipo`) VALUES
(1, 'ChupiPlayer', 1),
(2, 'The Beast', 1),
(3, 'Da Player', 1),
(4, 'Genji', 14),
(5, 'Reaper', 14),
(6, 'Sombra', 14),
(7, 'Hanzo', 15),
(8, 'D.Va', 15),
(9, 'Thrall', 16),
(10, 'Rexxar', 16),
(11, 'Illidan Tempestira', 17),
(12, 'Arthas Menethil', 17),
(13, 'Comandante General', 18),
(14, 'Soldado Raso', 18),
(15, 'Caín', 19),
(16, 'Horadrim', 19),
(17, 'Teemo', 20),
(18, 'Malphite', 20),
(19, 'Sona', 20),
(20, 'Rengar', 20),
(21, 'Vayne', 20),
(22, 'Kassadin', 21),
(23, 'Malzahar', 21),
(24, 'Kai\'Sa', 21),
(25, 'Kha\'Zix', 21),
(26, 'Rek\'Sai', 21),
(27, 'Marauder', 24),
(28, 'Aftershock', 25),
(29, 'Luminan', 25),
(30, 'Rubber', 24),
(31, 'Quad', 24),
(32, 'Vulcan', 25),
(33, 'Zippie', 24),
(34, 'Twin MiLL II', 25),
(35, 'Beast', 24),
(36, 'Triton', 25),
(37, 'Killer', 22),
(38, 'Assasin', 22),
(39, 'Skull', 22),
(40, 'Ghost', 22),
(41, 'Dark', 22),
(42, 'RIP', 23),
(43, 'Skeleton', 23),
(44, 'Defeat', 23),
(45, 'Sad', 23),
(46, 'Zhork', 23),
(47, 'Tiny', 27),
(48, 'BloodSeeker', 26),
(49, 'CRYSTAL MAIDEN', 26),
(50, 'PUCK', 27),
(51, 'Templar Assassin', 26),
(52, 'Mirana', 27),
(53, 'Ember Spirit', 26),
(54, 'Troll Warlord', 27),
(55, 'NATURE\'S PROPHET', 26),
(56, 'STORM SPIRIT', 27);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticia`
--

CREATE TABLE `noticia` (
  `id_noticia` int(11) NOT NULL,
  `admin` int(11) NOT NULL,
  `titulo` tinytext NOT NULL,
  `contenido` text NOT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `videojuego` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `noticia`
--

INSERT INTO `noticia` (`id_noticia`, `admin`, `titulo`, `contenido`, `imagen`, `videojuego`) VALUES
(1, 1, 'hulaaaaa', 'patataaaaaaaaa', '', 'csgo'),
(2, 1, 'Oh dios mío soy un título :D', 'Ehhh tiooooo soy una descripciooon emmm no seee queee ponerrrrr dislaik :v', 'csbackground.jpg', 'csgo'),
(3, 1, 'Esta es una noticia para verificar que todo funciona', 'TOOOOOOOOOOOOODO funciona perfectamente, verdad? seeeeeeeeee nena seeeeeeeeee nena seeeeeeeeee nena seeeeeeeeee nena seeeeeeeeee nena seeeeeeeeee nena seeeeeeeeee nena seeeeeeeeee nena seeeeeeeeee nena seeeeeeeeee nena seeeeeeeeee nena seeeeeeeeee nena se', 'esport-tournaments.jpg', 'csgo'),
(4, 1, 'y maaaaas pruebas', 'pruebaaaaa pruebaaaaa pruebaaaaa pruebaaaaa pruebaaaaa pruebaaaaa pruebaaaaa pruebaaaaa pruebaaaaa pruebaaaaa pruebaaaaa pruebaaaaa pruebaaaaa pruebaaaaa pruebaaaaa pruebaaaaa pruebaaaaa pruebaaaaa pruebaaaaa pruebaaaaa pruebaaaaa pruebaaaaa pruebaaaaa pr', 'wip.jpg', 'csgo'),
(5, 1, 'última prueba', 'ultima pruebaaaaa ultima pruebaaaaa ultima pruebaaaaa ultima pruebaaaaa ultima pruebaaaaa ultima pruebaaaaa ultima pruebaaaaa ultima pruebaaaaa ultima pruebaaaaa ultima pruebaaaaa \r\nultima pruebaaaaa ultima pruebaaaaa ', 'overwatchlogo.jpg', 'csgo'),
(6, 1, 'Noticia Sensual', 'Holaaaaaaaaa', 'esport-tournaments.jpg', 'csgo'),
(7, 1, 'Primera Noticia del Overwatch', 'Primera Noticia del Overwaaaaaaaaaaaaaatch', 'overwatchlogo.jpg', 'overwatch'),
(8, 1, 'Primera Noticia del Heroes of the Storm', 'Primera Noticia HOTS', 'heroeslogo.jpg', 'hots'),
(9, 1, 'Primera Noticia del LoL', 'Primera noticia del lol', 'lollogo.jpg', 'lol'),
(10, 1, 'Primera Noticia del PUBG', 'Primera Noticia del PUBG', 'pubglogo.jpg', 'pubg'),
(11, 1, 'Primera Noticia Rocket', 'Primera noticia del rocket', 'rocketlogo.jpg', 'rocket'),
(12, 1, 'Primera Noticia del DOTA 2', 'Primera noticia del DOTA 2', 'dotalogo.jpg', 'dota');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `partido`
--

CREATE TABLE `partido` (
  `id_partido` int(11) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `videojuego` varchar(255) NOT NULL,
  `nombre_partido` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `partido`
--

INSERT INTO `partido` (`id_partido`, `fecha_inicio`, `fecha_fin`, `videojuego`, `nombre_partido`) VALUES
(1, '2018-05-07', '2018-05-08', 'csgo', 'Primer Partido'),
(2, '2018-04-24', '2018-04-25', 'csgo', 'Segundo Partido'),
(3, '2018-05-09', '2018-05-10', 'csgo', 'Tercer Partido'),
(4, '2018-04-27', '2018-04-28', 'csgo', 'Cuarto Partido'),
(5, '2018-05-11', '2018-05-12', 'csgo', 'Partidaso'),
(6, '2018-04-28', '2018-04-29', 'csgo', 'Sexto Partido'),
(7, '2018-05-13', '2018-05-14', 'csgo', 'Séptimo Partido'),
(8, '2018-05-22', '2018-05-30', 'overwatch', 'Hollywood Match'),
(9, '2018-05-23', '2018-05-25', 'overwatch', 'Colossal Match'),
(10, '2018-05-25', '2018-05-27', 'overwatch', 'RoadMatch'),
(11, '2018-06-04', '2018-06-12', 'hots', 'Strong Storm'),
(12, '2018-06-01', '2018-06-02', 'hots', 'Small Match'),
(13, '2018-06-12', '2018-06-14', 'lol', 'Season 1 Ranking'),
(14, '2018-06-17', '2018-06-18', 'lol', 'Season 2 Ranking'),
(15, '2018-06-19', '2018-06-20', 'lol', 'Season 3 Ranking'),
(16, '2018-06-15', '2018-06-16', 'pubg', 'Primera Guerra'),
(17, '2018-06-20', '2018-06-21', 'pubg', 'Guerra Final'),
(18, '2018-06-20', '2018-06-21', 'rocket', 'Rocketer first match'),
(19, '2018-06-25', '2018-06-26', 'rocket', 'Master rocket match'),
(20, '2018-06-27', '2018-06-28', 'rocket', 'Rocket Senior Final Match'),
(21, '2018-06-20', '2018-06-21', 'dota', 'DOTA 2 First Match'),
(22, '2018-06-21', '2018-06-22', 'dota', 'DOTA 2 Final Match'),
(23, '2018-06-15', '2018-06-15', 'dota', 'Partidaso Antonio');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `torneo`
--

CREATE TABLE `torneo` (
  `id_torneo` int(11) NOT NULL,
  `nombre_torneo` varchar(255) NOT NULL,
  `partido` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `torneo`
--

INSERT INTO `torneo` (`id_torneo`, `nombre_torneo`, `partido`) VALUES
(1, 'Primer Torneo', 2),
(3, 'Torneo prueba', 1),
(4, 'El Mejor Torneo', 5),
(5, 'Casino Tournament', 7),
(6, 'Colossal Tournament', 9),
(7, 'Big Storm Tournament', 11),
(8, 'Big Season Match', 15),
(9, 'SemiFinals Match', 14),
(10, 'Sobrevive si puedes', 17),
(11, 'Senior Rocketer Match', 20),
(12, 'DOTA 2 Tournament', 22),
(13, 'Torneo Danichu', 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `password` varchar(20) NOT NULL,
  `nombre_usuario` varchar(255) DEFAULT NULL,
  `admin` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `password`, `nombre_usuario`, `admin`) VALUES
(1, '123456', 'Danichu300', 1),
(2, 'asdf', 'user_Test', 0),
(3, 'anbhc', 'prueba_usuario', 0),
(4, 'usuario', 'usuario', 0),
(5, '456', '123789', 0),
(6, '1643', 'test', 0),
(7, '159', 'holaa', 0),
(8, '', 'holaa', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `videojuego`
--

CREATE TABLE `videojuego` (
  `id_videojuego` int(11) NOT NULL,
  `nombre_videojuego` varchar(255) NOT NULL,
  `descripcion` text NOT NULL,
  `mecanicas` text NOT NULL,
  `tacticas` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `videojuego`
--

INSERT INTO `videojuego` (`id_videojuego`, `nombre_videojuego`, `descripcion`, `mecanicas`, `tacticas`) VALUES
(1, 'Counter-Strike Global Offensive', 'Es un videojuego de disparos en primera persona desarrollado por Valve Corporation en cooperación con Hidden Path Entertainment, y es el cuarto juego de la saga Counter-Strike, sin contar Counter-Strike: Online. Fue lanzado al mercado el 21 de agosto de 2012 para las plataformas de Microsoft Windows, Mac OS X y Xbox 360, mientras que sufrió un retraso en Playstation 3. Posteriormente, la versión para Linux estuvo disponible al público el 22 de septiembre de 2014.', 'En esta nueva entrega de Counter Strike se le ha dado mucho interés al modo competitivo, incluyendo un buscador de partidas online, en donde se juega una partida 5 contra 5 al mejor de 30 rondas (15 de cada lado), es decir el que logre ganar 16 rondas gana la partida. En un principio solo estaban disponibles servidores europeos y estadounidenses, pero con el auge en Sudamérica han agregado servidores en Brasil para que no haya problemas con ping alto. La forma de emparejar a los contrincantes es mediante a un rango, que se obtiene al ganar 10 partidas, de esta manera el sistema evalúa el rendimiento en cada una y genera un rango que una vez obtenido se puede subir o bajar (siempre sobre la base de las habilidades propias y la cantidad de partidas perdidas o ganadas). Se puede hacer la búsqueda de partida en solitario o desde 2 a 4 personas mas, haciendo un total de 5 en el último caso, dejando la posibilidad de que \"una premade\" tenga total libertad para jugar en el mismo equipo sin problemas.', '- Posicionaos estratégicamente.\r\n- Cuidado con el ruido al correr.\r\n- Comunícate con tu equipo.\r\n- Respeta a tus compañeros.\r\n- Evita el fuego amigo.'),
(2, 'Overwatch', 'Overwatch es un videojuego de disparos en primera persona multijugador, desarrollado por Blizzard Entertainment. Fue lanzado al público el 24 de mayo del 2016, para las plataformas Playstation 4, Xbox One y Microsoft Windows. El juego fue anunciado el 7 de noviembre de 2014 durante la BlizzCon 2014, y su versión beta cerrada fue estrenada el 27 de octubre de 2015. Durante el primer semestre del año 2017, se anunció que Overwatch había conseguido alcanzar los 1.000 millones de dólares en beneficios.', 'Overwatch pone a los jugadores en equipos de seis personas, con cada persona escogiendo uno de varios héroes disponibles cada uno con movimientos y habilidades únicas. Los héroes están divididos en cuatro clases: Ataque, Defensa, Tanque y Soporte. Los jugadores de cada equipo trabajan juntos para atacar y defender puntos de control o para atacar/defender \"cargas\" (objetivos móviles que se mueven alrededor del mapa). Los jugadores con cada juego acumulan puntos que les otorga recompensas estéticas que no afectan el desempeño de juego.', '- Jugad en equipo: Ir sólo puede costaros la victoria.\r\n- El compañerismo es muy importante.\r\n- Si os aprendéis los mapas podéis sacar ventaja a vuestros rivales.\r\n- Dejad los botiquines de salud a quien de verdad los necesite.\r\n- Sed buenos vencedores a la vez que buenos perdedores.'),
(4, 'Heroes of the Storm', 'Heroes of the Storm es un videojuego multijugador masivo en línea. El juego ha sido lanzado en un evento Live Stream, el 06.06.2015. Algunos Códigos Gratuitos fueron distribuidos para las versiones Alpha y Beta. Los servidores están activos y funcionando. Véase la página de server status del juego en las páginas de Blizzard Entertainment para las plataformas de Microsoft Windows y OSX. La compañía Blizzard combina dentro en el videojuego a distintos Héroes de sus principales franquicias de videojuegos: Warcraft, Overwatch, Diablo, StarCraft y The Lost Vikings El videojuego es actualmente un free to play distribuido digitalmente, y se sustenta a través de microtransacciones. El juego fue probado por Blizzard desde agosto de 2013 y hasta ahora se ha negado a categorizarlo en los géneros MOBA o estrategia en tiempo real debido a que consideran que es algo diferente.', 'Heroes of the Storm es un juego que gira en torno a un modo de combate cooperativo en línea de cinco contra cinco jugadores, operados a través de la página Battle.net, el servicio de juegos en línea de Blizzard. Los jugadores pueden elegir entre cinco modos de juego, que incluyen jugar contra héroes controlados por la computadora o contra otros jugadores. Cuando los jugadores inician el juego, solo pueden usar de seis a diez héroes proporcionados por la rotación de héroes libre, una lista seleccionada de forma metódica que cambia cada semana, pero mediante el uso de oro, una fuente en el juego de riqueza, o a través de microtransacciones, se puede tener acceso permanente a un héroe. Hay Cincuenta y uno héroes actualmente en el juego divididos en cuatro categorías distintas.? De los once mapas publicados, ocho tienen las tres líneas estándares principales donde los jugadores pueden luchar, mientras dos Minas Encantadas y campos de batalla de la eternidad tiene dos carriles principales pero un área basada en objetivos separado y un mapa de una sola línea disponible solo en partidas personalizadas. Matar enemigos, ya sean unidades neutras o los héroes del equipo contrario, otorga puntos de experiencia, que se comparten con todo el equipo. Cuando se alcanza un cierto nivel de experiencia de un equipo, cada héroe en ese nivel se unen, la adquisición de las habilidades ligeramente aumentadas y ganando un punto de talento al llegar a los niveles 1, 4, 7, 10, 13, 16, y 20. Los puntos de talento permiten a los jugadores personalizar las habilidades de su héroe y en general dar lugar a un gran aumento en el poder, especialmente en los niveles 10 y 20. Este sistema de nivelación destaca la importancia del trabajo grupal, ya que la acción de un jugador puede afectar a todo el equipo. Los jugadores también pueden montar diferentes criaturas, como caballos y unicornios, para aumentar su velocidad de movimiento. Los jugadores se desmontan automáticamente cuando reciben daño o usan una habilidad. Los minions de los campos neutrales pueden ser derrotados para conseguir mercenarios que luchan para el jugador.', '- Trabajad en equipo.\r\n- Preparad una estrategia para sacar ventaja.\r\n- Si cumplís los objetivos del mapa, conseguiréis más ventaja.\r\n- Coged maestría con vuestro héroe favorito.\r\n- Cuanto más os maten, más tardaréis en revivir.'),
(6, 'League of Legends', 'League of Legends es un videojuego de género multiplayer online battle arena (MOBA) y deporte electrónico desarrollado por Riot Games para Microsoft Windows y OS X. En un principio los servidores estaban alojados en la empresa GOA y hace poco se anunció su venta a la empresa china Tencent Holdings Limited. El juego fue diseñado para el sistema operativo Microsoft Windows y lanzaron una beta para OS X dejando al poco tiempo el proyecto de lado. Esta beta ha sido mejorada por parte de usuarios del juego, haciendo posible jugar a una versión actualizada de League of Legends.\r\n\r\nEn octubre de 2012, contaba con 70 millones de jugadores registrados.? Para marzo de 2013 se registró un pico de 5 millones de jugadores conectados al mismo tiempo en todo el mundo. Es un juego de alta competitividad siendo uno de los juegos más populares de los deportes electrónicos (e-sports).', 'Los jugadores se enfrentan entre ellos dividiéndose en 2 equipos de 3 o 5 jugadores cada uno, dependiendo si el modo de juego es 3 vs 3 en el escenario El Bosque Retorcido o 5 vs 5 en los escenarios El Abismo de los Lamentos y La Grieta del Invocador, siendo este último mapa el más famoso y considerado el estándar en el juego competitivo. Antes de empezar la partida, los jugadores deben escoger un personaje (llamado «campeón») durante la fase de «selección de campeón», con el cual jugarán toda la partida hasta su conclusión. Desde marzo de 2018, hay 140 campeones disponibles, siendo el último añadido Kai\'Sa, La hija del vacío.', '- Ayudad al resto de compañeros.\r\n- Jugad defensivo: con cada muerte gana más ventaja el enemigo.\r\n- Mirad builds de profesionales para aprender.\r\n- Probad los diferentes personajes y aprended sus tácticas.\r\n- Respeta a tus compañeros de equipo y a tus rivales.'),
(7, 'PlayerUnknows BattleGrounds', 'PlayerUnknown\'s Battlegrounds (Estilizado como PUBG) es un videojuego de batalla en línea multijugador masivo desarrollado y publicado por Bluehole para Microsoft Windows, Xbox One, Android y iOS. El juego se basa en el estilo Battle Royale de los mods previamente desarrollado por Brendan \"PlayerUnknown\" Greene para otros juegos, pero ampliado independientemente bajo la dirección creativa de él mismo. En el juego, hasta cien jugadores saltan en paracaídas desde un avión a una isla, en donde tienen la libertad de moverse hacia un lugar determinado que ellos mismo elijan, y buscan armas, equipo para matar a otros jugadores mientras evitan ser asesinados. El área segura disponible del mundo del juego disminuye en tamaño durante la partida, dirigiendo a los jugadores sobrevivientes a áreas más reducidas y forzando enfrentamientos. El último jugador o equipo en pie gana la partida.', 'Cada partida comienza con los jugadores que saltan en paracaídas a una isla, hacia determinadas partes que ellos mismos eligen. La zona de juego es de aproximadamente 8 por 8 kilómetros en tamaño, estos comienzan sin artículos aparte de las opciones adaptables de la ropa que seleccionan antes de una partida; todo lo anterior desde un avión que sobrevuela aleatoriamente el mapa en línea recta. Una vez aterrizan, los jugadores pueden buscar edificios y otros sitios o estructuras para encontrar armas, vehículos, armaduras, ropa y otro equipamiento. Estos artículos se distribuyen por todo el mapa al comienzo de la partida, con ciertas zonas de alto riesgo, pero, con mejor equipamiento. Estos pasan a permanecer ocultos para evitar ser asesinados o cazar a otros jugadores mientras continúan buscando más equipamiento. Los jugadores asesinados pueden ser saqueados para adquirir su equipamiento. Durante el transcurso del juego un avión volará sobre varias partes del mapa jugable y dejará caer un paquete de botín que contiene elementos que normalmente no se pueden obtener durante la partida. El paquete también emite un humo rojo altamente visible, atrayendo a interesados cerca de él. Los jugadores pueden optar por jugar desde la perspectiva de primera o tercera persona, cada uno con sus propias ventajas y desventajas en el combate y la conciencia situacional.', '- No te fíes de nadie.\r\n- No bajes la guardia en ningún momento.\r\n- Sé sigiloso.\r\n- Escucha los pasos de tus enemigos.\r\n- Suministra bien tus recursos.'),
(8, 'Rocket League', 'Rocket League es un videojuego que combina el fútbol con los vehículos. Fue desarrollado por Psyonix y lanzado el 7 de julio del 2015. Se encuentra disponible en español, tiene modos de juego cooperativo, de un jugador y en línea. Está disponible para PC, para PlayStation 4 y, con posterioridad a su lanzamiento inicial, para Xbox One y Nintendo Switch.\r\n\r\nEs la secuela de Supersonic Acrobatic Rocket-Powered Battle-Cars, juego lanzado para Playstation 3 en 2008. Durante la fase de desarrollo, Rocket League llevaba como nombre tentativo Battle Cars 2.', 'El juego se asemeja al fútbol, pero utilizando vehículos en lugar de jugadores y una pelota de gran tamaño. En los partidos pueden participar desde 1 vs 1 hasta 4 vs 4 jugadores distribuidos en dos equipos, naranja y azul. Cada vehículo puede utilizar propulsión extra, tanto para acelerar como para desplazarse por el aire, siendo esta una característica fundamental del juego. Dicha propulsión puede recargarse mediante packs distribuidos en el campo de juego y que reaparecen continuamente. Los partidos duran 5 minutos, disputándose un tiempo extra indefinido en caso de empate.\r\n\r\nA medida que el usuario vaya ganando experiencia se le aumentará el nivel.', '- Ten en cuenta las físicas del juego.\r\n- Dominar el vuelo marca la diferencia.\r\n- No abuses de la propulsión extra.\r\n- Sé buen ganador a la vez que buen perdedor.\r\n- Ayuda a tus compañeros sin entorpecerles.'),
(10, 'DOTA 2', 'Dota 2 (abreviatura de Defense of the Ancients 2 y en Español Defensa de los Ancestros 2) es un videojuego perteneciente al género ARTS («estrategia de acción en tiempo real»), también conocido como MOBA, lanzado el 9 de julio de 2013. El juego fue desarrollado por la empresa Valve Corporation. El título fue anunciado oficialmente el 13 de octubre de 2010, en un artículo en el sitio web Game Informer; posteriormente, entró en su etapa Beta a principios del 2011, y finalmente se lanzó al público en general a través de Steam el 9 de julio de 2013 para Microsoft Windows, y el 18 de julio de 2013 para OS X y Linux, el 17 de junio de 2015 Valve lanzó la beta del juego usando el nuevo motor gráfico Source 2 [Dota 2 Reborn], cliente que será el único y definitivo poco después del The International 2015 según el anuncio se mantuvo fiel a su predecesor, a la vez que incrementó la calidad del producto final, además de ofrecer una experiencia envolvente y gratificante para los jugadores. Sin embargo Dota 2 es actualmente criticado por tener una dura curva de aprendizaje y una comunidad de las más hostiles en el ámbito de internet. Actualmente es el juego más jugado de Steam con más de 40.6 millones de jugadores únicos que se conectan casi en su totalidad con frecuencia diaria? y ha llegado a ser incluido en el Guinness World Records Gamer\'s Edition.4', 'Una partida de Dota 2, cuenta con una fortaleza para cada una de las dos facciones opuestas, Los Dire y Los Radiant , que contienen una estructura principal a la que se le denomina como Ancestro, que son defendidos por varios edificios más pequeños. Ambas bases opuestas están conectadas por tres caminos principales, a los que se suele referir también como líneas o carriles, estos se encuentran vigilados por una sucesión de tres torres defensivas, así como la aparición periódica (cada minuto) de grupos de unidades autónomas llamadas \"creeps\" que avanzarán por cada carril atacando a todas las unidades o estructuras enemigas con las que entren en rango de visión. Los creeps de cada línea que aparecen cada minuto lo harán más fuertes si un equipo destruye los barracones enemigos situados dentro de la fortaleza respectiva.y cuando destruyen los tres barracones los creeps se convierten en mega creeps', '- Con cada muerte, el enemigo se hace más fuerte.\r\n- Aprovechad las ventajas del mapa.\r\n- Dominar el poder de vuestro personaje puede ser decisivo para la victoria.\r\n- Atacar en grupo puede ayudaros a ganar enfrentamientos.\r\n- Administrad bien vuestro oro al adquirir equipo.');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`id_comentario`,`usuario`),
  ADD KEY `usuario` (`usuario`);

--
-- Indices de la tabla `equipo`
--
ALTER TABLE `equipo`
  ADD PRIMARY KEY (`id_equipo`),
  ADD KEY `videojuego` (`videojuego`);

--
-- Indices de la tabla `equipo_partido`
--
ALTER TABLE `equipo_partido`
  ADD PRIMARY KEY (`id_equipo`,`id_partido`),
  ADD KEY `id_equipo` (`id_equipo`,`id_partido`),
  ADD KEY `id_partido` (`id_partido`);

--
-- Indices de la tabla `jugador`
--
ALTER TABLE `jugador`
  ADD PRIMARY KEY (`id_jugador`),
  ADD KEY `equipo` (`equipo`);

--
-- Indices de la tabla `noticia`
--
ALTER TABLE `noticia`
  ADD PRIMARY KEY (`id_noticia`),
  ADD KEY `admin` (`admin`);

--
-- Indices de la tabla `partido`
--
ALTER TABLE `partido`
  ADD PRIMARY KEY (`id_partido`);

--
-- Indices de la tabla `torneo`
--
ALTER TABLE `torneo`
  ADD PRIMARY KEY (`id_torneo`),
  ADD KEY `partido` (`partido`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- Indices de la tabla `videojuego`
--
ALTER TABLE `videojuego`
  ADD PRIMARY KEY (`id_videojuego`,`nombre_videojuego`),
  ADD KEY `nombre_videojuego` (`nombre_videojuego`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comentario`
--
ALTER TABLE `comentario`
  MODIFY `id_comentario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `equipo`
--
ALTER TABLE `equipo`
  MODIFY `id_equipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `jugador`
--
ALTER TABLE `jugador`
  MODIFY `id_jugador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT de la tabla `noticia`
--
ALTER TABLE `noticia`
  MODIFY `id_noticia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `partido`
--
ALTER TABLE `partido`
  MODIFY `id_partido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `torneo`
--
ALTER TABLE `torneo`
  MODIFY `id_torneo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `videojuego`
--
ALTER TABLE `videojuego`
  MODIFY `id_videojuego` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD CONSTRAINT `comentario_ibfk_1` FOREIGN KEY (`usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `equipo`
--
ALTER TABLE `equipo`
  ADD CONSTRAINT `equipo_ibfk_1` FOREIGN KEY (`id_equipo`) REFERENCES `equipo_partido` (`id_equipo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `equipo_ibfk_2` FOREIGN KEY (`videojuego`) REFERENCES `videojuego` (`id_videojuego`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `equipo_partido`
--
ALTER TABLE `equipo_partido`
  ADD CONSTRAINT `equipo_partido_ibfk_1` FOREIGN KEY (`id_partido`) REFERENCES `partido` (`id_partido`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `jugador`
--
ALTER TABLE `jugador`
  ADD CONSTRAINT `jugador_ibfk_1` FOREIGN KEY (`equipo`) REFERENCES `equipo` (`id_equipo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `noticia`
--
ALTER TABLE `noticia`
  ADD CONSTRAINT `noticia_ibfk_1` FOREIGN KEY (`admin`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `torneo`
--
ALTER TABLE `torneo`
  ADD CONSTRAINT `torneo_ibfk_1` FOREIGN KEY (`partido`) REFERENCES `partido` (`id_partido`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
