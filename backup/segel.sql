-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-11-2022 a las 19:26:53
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `segel`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL,
  `privilege` int(11) NOT NULL DEFAULT 0,
  `rol` int(11) NOT NULL DEFAULT 1,
  `nombre` varchar(300) DEFAULT NULL,
  `nodo` varchar(350) NOT NULL,
  `sucursal` varchar(300) NOT NULL,
  `sucursal_origen` int(11) NOT NULL,
  `correo` varchar(350) NOT NULL,
  `chat` int(11) NOT NULL,
  `acceso` text NOT NULL,
  `acceso_tools` text NOT NULL,
  `estado` int(11) DEFAULT NULL,
  `timeout` int(11) NOT NULL,
  `mail` int(11) NOT NULL DEFAULT 1,
  `api` int(11) NOT NULL,
  `avatar` mediumblob NOT NULL,
  `color_avatar` varchar(10) NOT NULL DEFAULT '#348fe2',
  `movil` varchar(15) NOT NULL,
  `fb` varchar(150) NOT NULL,
  `twitter` varchar(150) NOT NULL,
  `comision_cobro` decimal(12,2) NOT NULL,
  `token_api` text NOT NULL,
  `recover` text NOT NULL,
  `dia_acceso` varchar(20) NOT NULL DEFAULT '1,1,1,1,1,1,1',
  `inicio_acceso` varchar(10) NOT NULL DEFAULT '00:00',
  `fin_acceso` varchar(10) NOT NULL DEFAULT '23:59',
  `fecha_nacimiento` date DEFAULT NULL,
  `check_cumple_dia` tinyint(1) NOT NULL DEFAULT 0,
  `random` int(11) NOT NULL DEFAULT 0,
  `oldPassword` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `login`
--

INSERT INTO `login` (`id`, `username`, `password`, `privilege`, `rol`, `nombre`, `nodo`, `sucursal`, `sucursal_origen`, `correo`, `chat`, `acceso`, `acceso_tools`, `estado`, `timeout`, `mail`, `api`, `avatar`, `color_avatar`, `movil`, `fb`, `twitter`, `comision_cobro`, `token_api`, `recover`, `dia_acceso`, `inicio_acceso`, `fin_acceso`, `fecha_nacimiento`, `check_cumple_dia`, `random`, `oldPassword`) VALUES
INSERT INTO `login` (`id`, `username`, `password`, `privilege`, `rol`, `nombre`, `nodo`, `sucursal`, `sucursal_origen`, `correo`, `chat`, `acceso`, `acceso_tools`, `estado`, `timeout`, `mail`, `api`, `avatar`, `color_avatar`, `movil`, `fb`, `twitter`, `comision_cobro`, `token_api`, `recover`, `dia_acceso`, `inicio_acceso`, `fin_acceso`, `fecha_nacimiento`, `check_cumple_dia`, `random`, `oldPassword`) VALUES
(70, 'Elias', '5f140a775c678a5f4b71da2f24b2ac1f', 0, 2, 'Elías Xool', '', '%%', 1, 'elias.xool.96@gmail.com', 0, '', '', 1, 0, 1, 0, '', '#348fe2', '9993259344', '', '', '0.00', '', '', '1,1,1,1,1,1,1', '00:00', '23:59', NULL, 0, 0, ''),
(71, 'Manlio', '31177bfd22ed68a2527882f8a1a25959', 0, 2, 'Manlio Torres', '', '%%', 1, 'lt.lenin311@gmail.com', 0, '', '', 1, 0, 1, 0, '', '#348fe2', '9991399777', '', '', '0.00', '', '', '1,1,1,1,1,1,1', '00:00', '23:59', NULL, 0, 0, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login_permiso`
--

CREATE TABLE `login_permiso` (
  `id` int(11) NOT NULL,
  `id_permiso` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `tipo_acceso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `login_permiso`
--

INSERT INTO `login_permiso` (`id`, `id_permiso`, `id_usuario`, `tipo_acceso`) VALUES
(36, 1, 1, 3),
(37, 2, 1, 3),
(38, 4, 1, 3),
(39, 5, 1, 3),
(40, 10, 1, 3),
(45, 1, 70, 3),
(46, 2, 70, 3),
(47, 4, 70, 3),
(48, 5, 70, 3),
(49, 10, 70, 3),
(50, 1, 71, 3),
(51, 2, 71, 3),
(52, 4, 71, 3),
(53, 5, 71, 3),
(54, 10, 71, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `loglogin`
--

CREATE TABLE `loglogin` (
  `id` int(11) NOT NULL,
  `idadmin` varchar(24) NOT NULL,
  `fecha` datetime NOT NULL,
  `ipadmin` varchar(20) NOT NULL,
  `error` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `loglogin`
--

INSERT INTO `loglogin` (`id`, `idadmin`, `fecha`, `ipadmin`, `error`) VALUES
(1, '1', '2022-11-11 12:13:58', '::1', 'Acceso exitoso'),
(2, '1', '2022-11-11 12:14:09', '::1', 'Acceso exitoso');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `logsistema`
--

CREATE TABLE `logsistema` (
  `id` bigint(20) NOT NULL,
  `log` text NOT NULL,
  `fechalog` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `operador` int(11) NOT NULL,
  `idcliente` int(11) NOT NULL,
  `tipolog` int(11) NOT NULL,
  `tipo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permiso`
--

CREATE TABLE `permiso` (
  `id_permiso` int(11) NOT NULL,
  `modulo` varchar(50) NOT NULL COMMENT 'Nombre del modulo al que hace referencia el permiso',
  `descripcion` varchar(50) NOT NULL COMMENT 'Descripcion del permiso',
  `url` varchar(255) NOT NULL,
  `padre` int(11) NOT NULL DEFAULT 0 COMMENT 'Id del registro padre (permisoid de esta misma tabla',
  `imagen` varchar(45) NOT NULL COMMENT 'Nombre del archivo de imagen',
  `clase` varchar(45) NOT NULL COMMENT 'Nombre de la clase utilizada para esta opcion del menu, definida en la hoja de estilos.',
  `tipo` smallint(6) NOT NULL DEFAULT 1 COMMENT '1-Menu; 2-Opcion de Form',
  `orden` int(11) NOT NULL COMMENT 'Forma en que se ordenan las opciones cuando forman parte de un menu',
  `activo` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0-inactivo 1-activo 2-especial, 3 widget'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `permiso`
--

INSERT INTO `permiso` (`id_permiso`, `modulo`, `descripcion`, `url`, `padre`, `imagen`, `clase`, `tipo`, `orden`, `activo`) VALUES
(1, 'Home', '', '', 0, '', '', 2, 0, 1),
(2, 'Ajustes', 'Control de ajustes del sistema', 'Ajustes', 0, '', 'fa fa-cogs', 1, 1, 1),
(4, 'Permisos', 'Lista de permisos para usuarios', '', 2, '', '', 1, 0, 2),
(5, 'Personal', 'Control del personal al sistema', '', 2, '', '', 1, 0, 2),
(6, 'Base de datos', 'Control de la BD', '', 2, '', '', 1, 0, 2),
(7, 'Oficina', 'Control de las oficinas depende la zona', '', 2, '', '', 1, 0, 2),
(8, 'Logs', 'Control de log del sistema', '', 2, '', '', 1, 0, 2),
(9, 'Licencia', 'Licencia contratada del sistema', '', 2, '', '', 1, 0, 2),
(10, 'General', 'Datos generales de la empresa', '', 2, '', '', 1, 0, 2),
(12, 'Por definir', 'Control de widgets inicio', '', 0, '', '', 1, 0, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `id` int(11) NOT NULL,
  `rol` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `activo` int(11) NOT NULL COMMENT '0:activo 1: inactivo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id`, `rol`, `activo`) VALUES
(1, 'Administrador', 0),
(2, 'Programador', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol_permiso`
--

CREATE TABLE `rol_permiso` (
  `id` int(11) NOT NULL,
  `idrol` int(11) NOT NULL,
  `idpermiso` int(11) NOT NULL,
  `tipopermiso` int(11) NOT NULL,
  `estado` int(11) NOT NULL COMMENT '0 activo 1 inactivo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `rol_permiso`
--

INSERT INTO `rol_permiso` (`id`, `idrol`, `idpermiso`, `tipopermiso`, `estado`) VALUES
(1, 1, 1, 2, 0),
(2, 1, 2, 3, 0),
(3, 1, 3, 3, 0),
(4, 1, 4, 3, 0),
(5, 1, 5, 3, 0),
(6, 1, 6, 3, 0),
(7, 1, 7, 2, 0),
(8, 1, 15, 3, 0),
(9, 1, 16, 3, 0),
(10, 1, 17, 2, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sucursal`
--

CREATE TABLE `sucursal` (
  `id` int(11) NOT NULL,
  `sucursal` varchar(200) NOT NULL,
  `direccion` varchar(200) NOT NULL,
  `ubicacion` varchar(100) NOT NULL,
  `telefono` varchar(40) NOT NULL,
  `color_su` varchar(20) NOT NULL,
  `logo_principal` varchar(200) NOT NULL,
  `logo_facturas_recibos` varchar(200) NOT NULL,
  `rfc` varchar(600) NOT NULL,
  `alias` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `sucursal`
--

INSERT INTO `sucursal` (`id`, `sucursal`, `direccion`, `ubicacion`, `telefono`, `color_su`, `logo_principal`, `logo_facturas_recibos`, `rfc`, `alias`) VALUES
(1, 'SEGEL - MONTEJO', 'C. 55A 415, Francisco de Montejo II, 97203 Mérida, Yuc.', '21.02885218849601,-89.65383071811516', '999 999 6661', '#FF6600', 'public/images/logos_sucursales/logo_sistema_sucursal_1.png', 'public/images/logos_sucursales/logo_factura_sucursal_1.png', 'RFC: SEGEL', 'SEGEL ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblcolumnas`
--

CREATE TABLE `tblcolumnas` (
  `col` varchar(50) NOT NULL,
  `orden` int(11) NOT NULL,
  `visible` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tblcolumnas`
--

INSERT INTO `tblcolumnas` (`col`, `orden`, `visible`) VALUES
('id', 0, 'on'),
('nombre', 1, 'on'),
('ip', 2, 'on'),
('saldo', 25, ''),
('ipap', 17, ''),
('correo', 24, ''),
('telefono', 7, 'on'),
('movil', 6, 'on'),
('mac', 3, 'on'),
('instalado', 14, 'on'),
('cedula', 27, ''),
('codigo', 29, ''),
('direccion', 10, 'on'),
('plan', 15, 'on'),
('pasarela', 9, 'on'),
('pppuser', 28, ''),
('nodo', 8, 'on'),
('coordenadas', 18, ''),
('emisor', 26, ''),
('user_ubnt', 30, ''),
('status', 11, 'on'),
('total_cobrar', 31, ''),
('dia_pago', 5, 'on'),
('ultimo_vencimiento', 19, ''),
('proximo_pago', 12, 'on'),
('zona', 16, 'on'),
('facturas_no_pagadas', 23, ''),
('plan_voip', 22, ''),
('direccion_principal', 21, ''),
('ultimo_pago', 13, 'on'),
('fecha_suspendido', 20, ''),
('Netflix', 32, ''),
('tipo_estrato', 4, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblconfiguration`
--

CREATE TABLE `tblconfiguration` (
  `id` int(11) NOT NULL,
  `setting` text NOT NULL,
  `value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tblconfiguration`
--

INSERT INTO `tblconfiguration` (`id`, `setting`, `value`) VALUES
(1, 'nombre_empresa', 'SEGEL'),
(2, 'userlic', 'backup@gmail.com'),
(3, 'passlic', '9db9d8b651e33f05ba8f373df81cc0581608155552'),
(4, 'clientes_sistema', '25'),
(5, 'version_sistema', '6'),
(6, 'tokenlic', 'g8NhFJF/WGp0k/BDzRdZeQ==::MUIEAMdFUiW4_U0f0e8bRHpWMx7FbdYVUpVFEEeCNU_H8tA9d1y7EAwos9ZLwtUOiYpVbtLBuaWLg7JmudF9mCDjYicncyilrZN2PcjkBGLnPvtZ-O4yw-KTi2eRiPkjlimwXEAvC5PxsdsZFgtcROnJd4tqYroc7_BfkM87wbexw20LAJV4Xqn_wnCWhGjqCEFP92W_ktrMj4jm2L33fm7Xr0032jkf5PMFmSt_81ho6dr04kzwTbDWpx8xn3LVS5jAWbHIhAvNgyqy1G9fPI_eAb1aQ3Vcfx3MOWufwf0txFAUrZSfT2n3CbOZNAa5pfkg1GmN0eLsOBbok3sgYbPU7ebwDDHVEkLjmQODXVa0Q2g8ChwmPsPrr2AIzRw5SCiG6OD0u-FliN28gA10RTghnJ_Qc9jPsKWm-i4NP7brX_XmV4tfbj76CfbSRbUoyxaEEx_bwoNzFBoCxIkqhzmuy9k='),
(7, 'correo_backup', 'NetMWPass2020sis@gmail.com'),
(8, 'correo_soporte', 'soporte@gmail.com'),
(9, 'correo_factura', 'facturas@gmail.com'),
(10, 'moneda', '$'),
(11, 'ini_impuesto', '16'),
(12, 'nfacturalegal', '126109'),
(13, 'titulo_portal', ':-:-: Acceso Clientes Netium :-:-:'),
(14, 'pestana', 'Lugares de pago'),
(15, 'html_personalizado', '&lt;!DOCTYPE html&gt;\n&lt;html&gt;\n&lt;head&gt;\n	&lt;title&gt;&lt;/title&gt;\n&lt;/head&gt;\n&lt;body&gt;&lt;/body&gt;\n&lt;/html&gt;\n'),
(16, 'urltest', 'http://fast.com'),
(17, 'tamano_papel', 'A4'),
(18, 'orientacion_papel', ''),
(19, 'currency', 'MXN'),
(20, 'correo_host', 'p3plcpnl0544.prod.phx3.secureserver.net'),
(21, 'correo_port', '465'),
(22, 'correo_secure', 'ssl'),
(23, 'correo_aun', 'true'),
(24, 'correo_user', 'soporte@netium.com.mx'),
(25, 'correo_pass', ''),
(26, 'zona_horaria', 'America/Mexico_City'),
(27, 'correo_firma', '<html>\n<head>\n	<title></title>\n</head>\n<body>\n<p><img alt=\"\" src=\"https://drive.google.com/open?id=11fFP07tcT_vf5EquX9OyTmIosCv-0PxB\" /><img alt=\"\" src=\"http://netium.com.mx//img/firma-correo.jpg\" style=\"width: 650px; height: 150px;\" /></p>\n</body>\n</html>\n'),
(28, 'url_logo', 'http://172.29.1.1/admin/tools//img/logo-netium.png'),
(29, 'moneda_letra', 'Pesos Mexicanos'),
(30, 'ruc_empresa', 'RFC:SEGEL'),
(31, 'direccion_empresa', 'C. 55ᴬ 415, Francisco de Montejo II, 97203 Mérida, Yuc.'),
(32, 'telefono_empresa', '999 922 2222'),
(33, 'url_portal', 'http://app.netium.com.mx/cliente/login.php'),
(34, 'reconexion_cliente', '30'),
(35, 'mora_cliente', '0'),
(36, 'tamano_recibo', 'personalizado'),
(37, 'orientacion_recibo', ''),
(38, 'optlegal', '1'),
(39, 'npqr', '2488'),
(40, 'marca_factura', 'on'),
(41, 'custom_tamano', '80,200'),
(42, 'custom_recibo', '100,135'),
(43, 'pdf_generado', 'on'),
(44, 'keyapigoogle', 'AIzaSyAwtUrf9EpyekCZU6gLEBzX5KKTtAlnM40'),
(45, 'send_pagado', 'on'),
(46, 'correo_notificacion', 'ad@dsad,asdsaq@sadas'),
(47, 'sms_numero', 'asd@asdda'),
(48, 'notificacion_nodo', ''),
(49, 'revision', '40'),
(50, 'correo_reporte', 'adsd@asdasda'),
(51, 'salida_reporte', '<html><head>	<title></title></head><body><p><strong>Gracias por enviar la informaci&oacute;n de su pago. </strong></p><p>En un periodo no mayor a 1 &nbsp;hora, ser&aacute; revisado por nuestro personal contable, y en caso de estar correcta la informaci&oacute;n, el pago se abonar&aacute; a su cuenta en la plataforma correspondiente.</p><p>Saludos cordiales Tu Empresa.&nbsp;</p><p><span style=\"font-size:11px;\"><span style=\"font-family:arial,helvetica,sans-serif;\"><strong>Horario de Atenci&oacute;n: Lunes a viernes de 9:30 a 14:00 horas y de 15:30 a 18:00 horas. S&aacute;bado de 9:00 a 14:00 horas.</strong></span></span></p></body></html>'),
(52, 'coempresa', '4118'),
(53, 'valida_pago', 'on'),
(54, 'tipo_reconexion', '1'),
(55, 'facturacontinua', ''),
(56, 'afip_punto_venta', '0003'),
(57, 'afip_crt_homo', ''),
(58, 'afip_key_homo', ''),
(59, 'afip_crt_prod', ''),
(60, 'afip_key_prod', ''),
(61, 'afip_homo', ''),
(62, 'moneda_unidad', 'Céntimos'),
(63, 'send_recibo', ''),
(64, 'imgloginadmin', 'login-bg-1.jpg'),
(65, 'imglogincliente', 'login-bg-15.jpg'),
(66, 'cron_pantalla', '04:30'),
(67, 'cron_pago1', '08:30'),
(68, 'cron_pago2', '13:30'),
(69, 'cron_pago3', '17:00'),
(70, 'cron_corte', '02:30'),
(71, 'cron_factura', '03:30'),
(72, 'cron_backup', '11:55'),
(73, 'permiso_portal', 'a:12:{s:12:\"comprobantes\";s:2:\"on\";s:7:\"soporte\";s:2:\"on\";s:10:\"documentos\";s:2:\"on\";s:7:\"reporte\";s:2:\"on\";s:9:\"velocidad\";s:2:\"on\";s:7:\"trafico\";s:2:\"on\";s:6:\"banner\";s:2:\"on\";s:13:\"personalizado\";s:0:\"\";s:8:\"password\";s:2:\"on\";s:5:\"datos\";s:2:\"on\";s:9:\"autologin\";s:2:\"on\";s:14:\"widget_trafico\";s:2:\"on\";}'),
(74, 'newversion', '42'),
(75, 'lastupdate', '09/05/2021 07:00:06 am'),
(76, 'limite_mail', 'dia'),
(77, 'valor_limite_mail', '1000'),
(78, 'contador_mail', '0'),
(79, 'fecha_hora_mail', '06/01/2021'),
(80, 'sms_suspendido', ''),
(81, 'afip_csr_prod', ''),
(82, 'telegram', ''),
(83, 'afip_monotributo', ''),
(84, 'afip_a5', 'on'),
(85, 'cron_comprime_trafico', '0'),
(86, 'migrado', 'on'),
(87, 'vpnweb', ''),
(88, 'vpnssh', ''),
(89, 'tokenssh', ''),
(90, 'mora_texto', 'Mora factura vencida'),
(91, 'openfactura_debug', ''),
(92, 'openfactura_key', ''),
(93, 'template_login', '1'),
(94, 'template_portal', 'material'),
(95, 'template_color', 'blue'),
(96, 'onesignal', ''),
(97, 'onesignalid', ''),
(98, 'smart_url', ''),
(99, 'smart_api', ''),
(100, 'zendesk_correo', ''),
(101, 'zendesk_dominio', ''),
(102, 'zendesk_token', ''),
(103, 'correo_autentificacion', '0'),
(104, 'oauth_id', ''),
(105, 'oauth_secret', ''),
(106, 'oauth_token', ''),
(107, 'sms_alpagar', ''),
(108, 'openfactura_custom', ''),
(109, 'openfactura_pdf_tamano', 'LETTER'),
(110, 'openfactura_rut_emisor', ''),
(111, 'openfactura_giro_emisor', ''),
(112, 'openfactura_actividad_emisor', ''),
(113, 'openfactura_direccion_emisor', ''),
(114, 'openfactura_comuna_emisor', ''),
(115, 'openfactura_telefono_emisor', ''),
(116, 'openfactura_razon_emisor', ''),
(117, 'openfactura_siisucursal_emisor', ''),
(118, 'wlogeado', ''),
(119, 'reconexion_texto', 'Reconexión del servicio por Corte'),
(120, 'parametros_almacen', '0;warning;0;danger;0;success'),
(121, 'enable_pso', ''),
(122, 'parametros_almacen_accesorios', '0;warning;0;danger;0;success'),
(123, 'weebhook', 'ord_2qUavgyUSZMNm9hyr');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblsucursalesnodo`
--

CREATE TABLE `tblsucursalesnodo` (
  `id` int(11) NOT NULL,
  `idnodo` int(11) NOT NULL,
  `idsucursal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tblsucursalesnodo`
--

INSERT INTO `tblsucursalesnodo` (`id`, `idnodo`, `idsucursal`) VALUES
(30, 1, 2),
(31, 2, 2),
(32, 3, 2),
(33, 5, 2),
(104, 6, 3);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `login_permiso`
--
ALTER TABLE `login_permiso`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `loglogin`
--
ALTER TABLE `loglogin`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `logsistema`
--
ALTER TABLE `logsistema`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idcliente` (`idcliente`),
  ADD KEY `operador` (`operador`),
  ADD KEY `fechalog` (`fechalog`);

--
-- Indices de la tabla `permiso`
--
ALTER TABLE `permiso`
  ADD PRIMARY KEY (`id_permiso`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `rol_permiso`
--
ALTER TABLE `rol_permiso`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sucursal`
--
ALTER TABLE `sucursal`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tblconfiguration`
--
ALTER TABLE `tblconfiguration`
  ADD PRIMARY KEY (`id`),
  ADD KEY `setting` (`setting`(32));

--
-- Indices de la tabla `tblsucursalesnodo`
--
ALTER TABLE `tblsucursalesnodo`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT de la tabla `login_permiso`
--
ALTER TABLE `login_permiso`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT de la tabla `loglogin`
--
ALTER TABLE `loglogin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `logsistema`
--
ALTER TABLE `logsistema`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `permiso`
--
ALTER TABLE `permiso`
  MODIFY `id_permiso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `rol_permiso`
--
ALTER TABLE `rol_permiso`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `sucursal`
--
ALTER TABLE `sucursal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `tblconfiguration`
--
ALTER TABLE `tblconfiguration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT de la tabla `tblsucursalesnodo`
--
ALTER TABLE `tblsucursalesnodo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;