-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-12-2022 a las 00:19:17
-- Versión del servidor: 8.0.30
-- Versión de PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `consultorio_medico1`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `agregar_suc` (IN `direccion_suc` VARCHAR(50), IN `nombre_suc` VARCHAR(50), IN `telefono_suc` VARCHAR(10))   INSERT INTO `sucursal`( `direccion_suc`, `nombre_suc`, `telefono_suc`) VALUES (direccion_suc,nombre_suc,telefono_suc)$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cita`
--

CREATE TABLE `cita` (
  `id_cita` int NOT NULL,
  `id_doctor` int NOT NULL,
  `id_paciente` int NOT NULL,
  `hora_cita` time NOT NULL,
  `fecha_cita` date NOT NULL,
  `estado_cita` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

--
-- Volcado de datos para la tabla `cita`
--

INSERT INTO `cita` (`id_cita`, `id_doctor`, `id_paciente`, `hora_cita`, `fecha_cita`, `estado_cita`) VALUES
(1, 1, 7, '12:20:00', '2022-11-25', 0),
(5, 2, 9, '10:30:00', '2022-11-08', 0),
(6, 2, 8, '14:20:00', '2022-11-09', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consultorio`
--

CREATE TABLE `consultorio` (
  `id_consultorio` int NOT NULL,
  `num_consultorio` int NOT NULL,
  `ubicacion_consultorio` varchar(30) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

--
-- Volcado de datos para la tabla `consultorio`
--

INSERT INTO `consultorio` (`id_consultorio`, `num_consultorio`, `ubicacion_consultorio`) VALUES
(1, 33, 'Segundo Piso, Ala Oeste'),
(2, 5, 'Primer Piso, Ala sur'),
(3, 20, 'Tercer Piso, Ala Norte');

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `dash`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `dash` (
`COUNT(*)` bigint
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `doctor`
--

CREATE TABLE `doctor` (
  `id_doctor` int NOT NULL,
  `id_empleado` int NOT NULL,
  `id_consultorio` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

--
-- Volcado de datos para la tabla `doctor`
--

INSERT INTO `doctor` (`id_doctor`, `id_empleado`, `id_consultorio`) VALUES
(1, 2, 2),
(2, 4, 2),
(3, 2, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `id_empleado` int NOT NULL,
  `permiso_id` int NOT NULL,
  `nombre_empleado` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `apellido_paterno` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `apellido_materno` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `ocupacion_empleado` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `colonia_empleado` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `calle_empleado` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `numerocasa_empleado` int NOT NULL,
  `telefono_empleado` varchar(10) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `fecha_nac` date NOT NULL,
  `sexo` varchar(1) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `id_sucursal` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`id_empleado`, `permiso_id`, `nombre_empleado`, `apellido_paterno`, `apellido_materno`, `ocupacion_empleado`, `colonia_empleado`, `calle_empleado`, `numerocasa_empleado`, `telefono_empleado`, `fecha_nac`, `sexo`, `id_sucursal`) VALUES
(2, 1, 'Alejandro', 'Trujillo', 'Lindo', 'Doctor', 'Roma', 'Zeltas', 3333, '81125673', '2003-08-12', 'M', 1),
(4, 1, 'Emiliano', 'Fuentes', 'Martinez', 'Secretaria', 'Lomas model', 'Tenayuca', 9033, '81128212', '2022-11-17', 'M', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paciente`
--

CREATE TABLE `paciente` (
  `id_paciente` int NOT NULL,
  `nombre_paciente` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `apellido_paterno` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `apellido_materno` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `colonia_paciente` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `calle_paciente` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `telefono_paciente` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `fecha_nac` date NOT NULL,
  `sexo` varchar(1) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `id_sucursal` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

--
-- Volcado de datos para la tabla `paciente`
--

INSERT INTO `paciente` (`id_paciente`, `nombre_paciente`, `apellido_paterno`, `apellido_materno`, `colonia_paciente`, `calle_paciente`, `telefono_paciente`, `fecha_nac`, `sexo`, `id_sucursal`) VALUES
(7, 'Valeria', 'Juarez', 'Loera', 'Unidad Modelo', 'Tenayuca', '8117456792', '2022-11-15', 'M', 1),
(8, 'Alfredo', 'Adame', 'Hernandez', 'Linda Vista', 'Arcos 123', '8114973265', '2022-11-15', 'H', 1),
(9, 'Samantha', 'Mendieta', 'Suarez', 'San Carlos', 'Cosmos', '8135645904', '2022-11-01', 'M', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prueba_lab`
--

CREATE TABLE `prueba_lab` (
  `id_prueba` int NOT NULL,
  `tipo_prueba` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `nombre_prueba` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

--
-- Volcado de datos para la tabla `prueba_lab`
--

INSERT INTO `prueba_lab` (`id_prueba`, `tipo_prueba`, `nombre_prueba`) VALUES
(1, 'Sanguinea', 'Prueba de embarazo'),
(2, 'Sanguinea', 'Análisis de plaquetas'),
(3, 'Cardiaca', 'Electrocardiograma');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recetas`
--

CREATE TABLE `recetas` (
  `id_receta` int NOT NULL,
  `id_cita` int NOT NULL,
  `dosis_medicamento` text CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `frecuencia_medicamento` text CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `id_prueba` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

--
-- Volcado de datos para la tabla `recetas`
--

INSERT INTO `recetas` (`id_receta`, `id_cita`, `dosis_medicamento`, `frecuencia_medicamento`, `id_prueba`) VALUES
(3, 1, 'tomsd', 'Caada 8 gdsgfd', 2),
(4, 5, 'weqqqqqqqqqqqqqqqqq', 'qweqweqweqwe', 2),
(6, 6, 'Ir a COmparr', '3123123', 1),
(7, 5, 'dasd', 'dasd', 2),
(8, 1, 'dasd', 'dasd', 2),
(9, 5, '', '', 1),
(10, 5, '', '', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recibo`
--

CREATE TABLE `recibo` (
  `id_recibo` int NOT NULL,
  `id_cita` int NOT NULL,
  `costo` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `fecha_generacion` date NOT NULL,
  `hora_generacion` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

--
-- Volcado de datos para la tabla `recibo`
--

INSERT INTO `recibo` (`id_recibo`, `id_cita`, `costo`, `fecha_generacion`, `hora_generacion`) VALUES
(2, 1, '43234', '2022-11-09', '22:11:00'),
(5, 5, '32343234', '2022-11-09', '22:11:00'),
(6, 6, '322', '2030-11-22', '04:36:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sucursal`
--

CREATE TABLE `sucursal` (
  `id_sucursal` int NOT NULL,
  `direccion_suc` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `nombre_suc` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `telefono_suc` varchar(10) COLLATE utf8mb3_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

--
-- Volcado de datos para la tabla `sucursal`
--

INSERT INTO `sucursal` (`id_sucursal`, `direccion_suc`, `nombre_suc`, `telefono_suc`) VALUES
(1, 'Cadadadsa', 'Medicals ', '81');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_permiso`
--

CREATE TABLE `t_permiso` (
  `permiso_id` int NOT NULL,
  `nombre_permiso` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `desc_permiso` text CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

--
-- Volcado de datos para la tabla `t_permiso`
--

INSERT INTO `t_permiso` (`permiso_id`, `nombre_permiso`, `desc_permiso`) VALUES
(1, 'Administrador', 'Tendrá todos los privilegios'),
(2, 'Doctor', 'Tendrá acceso tanto a generar consultas y demás'),
(3, 'Secretaria', 'Solo se tendrá acceso a ciertas características');

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `v_citas`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `v_citas` (
`doctor` varchar(101)
,`estado_cita` tinyint(1)
,`fecha_cita` date
,`hora_cita` time
,`id_cita` int
,`paciente` varchar(101)
,`telefono_paciente` varchar(50)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `v_doctores`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `v_doctores` (
`id_doctor` int
,`nombre_doc` varchar(101)
,`nombre_suc` varchar(50)
,`sexo` varchar(1)
,`telefono_empleado` varchar(10)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `v_receta`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `v_receta` (
`direccion_suc` varchar(50)
,`Doctor` varchar(152)
,`dosis_medicamento` text
,`fecha_cita` date
,`frecuencia_medicamento` text
,`hora_cita` time
,`id_cita` int
,`id_doctor` int
,`id_empleado` int
,`id_paciente` int
,`id_prueba` int
,`id_receta` int
,`nombre_prueba` varchar(50)
,`nombre_suc` varchar(50)
,`paciente` varchar(152)
,`telefono_empleado` varchar(10)
,`telefono_paciente` varchar(50)
,`telefono_suc` varchar(10)
,`tipo_prueba` varchar(50)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `v_recibo`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `v_recibo` (
`costo` varchar(50)
,`direccion_suc` varchar(50)
,`fecha_generacion` date
,`hora_generacion` time
,`id_cita` int
,`id_recibo` int
,`nombre_suc` varchar(50)
,`paciente` varchar(152)
,`telefono_paciente` varchar(50)
,`telefono_suc` varchar(10)
);

-- --------------------------------------------------------

--
-- Estructura para la vista `dash`
--
DROP TABLE IF EXISTS `dash`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `dash`  AS SELECT count(0) AS `COUNT(*)` FROM `empleados``empleados`  ;

-- --------------------------------------------------------

--
-- Estructura para la vista `v_citas`
--
DROP TABLE IF EXISTS `v_citas`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_citas`  AS SELECT `cita`.`id_cita` AS `id_cita`, concat(`paciente`.`nombre_paciente`,' ',`paciente`.`apellido_paterno`) AS `paciente`, concat(`empleados`.`nombre_empleado`,' ',`empleados`.`apellido_paterno`) AS `doctor`, `cita`.`fecha_cita` AS `fecha_cita`, `cita`.`hora_cita` AS `hora_cita`, `cita`.`estado_cita` AS `estado_cita`, `paciente`.`telefono_paciente` AS `telefono_paciente` FROM (((`cita` join `paciente` on((`cita`.`id_paciente` = `paciente`.`id_paciente`))) join `doctor` on((`cita`.`id_doctor` = `doctor`.`id_doctor`))) join `empleados` on((`doctor`.`id_empleado` = `empleados`.`id_empleado`)))  ;

-- --------------------------------------------------------

--
-- Estructura para la vista `v_doctores`
--
DROP TABLE IF EXISTS `v_doctores`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_doctores`  AS SELECT `doctor`.`id_doctor` AS `id_doctor`, concat(`empleados`.`nombre_empleado`,' ',`empleados`.`apellido_paterno`) AS `nombre_doc`, `empleados`.`telefono_empleado` AS `telefono_empleado`, `empleados`.`sexo` AS `sexo`, `sucursal`.`nombre_suc` AS `nombre_suc` FROM ((`empleados` join `doctor` on((`empleados`.`id_empleado` = `doctor`.`id_empleado`))) join `sucursal` on((`empleados`.`id_sucursal` = `doctor`.`id_empleado`)))  ;

-- --------------------------------------------------------

--
-- Estructura para la vista `v_receta`
--
DROP TABLE IF EXISTS `v_receta`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_receta`  AS SELECT `recetas`.`id_receta` AS `id_receta`, `recetas`.`dosis_medicamento` AS `dosis_medicamento`, `cita`.`id_cita` AS `id_cita`, `recetas`.`frecuencia_medicamento` AS `frecuencia_medicamento`, `prueba_lab`.`id_prueba` AS `id_prueba`, `prueba_lab`.`nombre_prueba` AS `nombre_prueba`, `prueba_lab`.`tipo_prueba` AS `tipo_prueba`, `cita`.`id_doctor` AS `id_doctor`, `doctor`.`id_empleado` AS `id_empleado`, `cita`.`id_paciente` AS `id_paciente`, `cita`.`hora_cita` AS `hora_cita`, `cita`.`fecha_cita` AS `fecha_cita`, concat(`paciente`.`nombre_paciente`,' ',`paciente`.`apellido_paterno`,' ',`paciente`.`apellido_materno`) AS `paciente`, concat(`empleados`.`nombre_empleado`,' ',`empleados`.`apellido_paterno`,' ',`empleados`.`apellido_materno`) AS `Doctor`, `empleados`.`telefono_empleado` AS `telefono_empleado`, `paciente`.`telefono_paciente` AS `telefono_paciente`, `sucursal`.`nombre_suc` AS `nombre_suc`, `sucursal`.`direccion_suc` AS `direccion_suc`, `sucursal`.`telefono_suc` AS `telefono_suc` FROM ((((((`recetas` join `cita` on((`cita`.`id_cita` = `recetas`.`id_cita`))) join `paciente` on((`paciente`.`id_paciente` = `cita`.`id_paciente`))) join `doctor` on((`cita`.`id_doctor` = `doctor`.`id_doctor`))) join `empleados` on((`doctor`.`id_empleado` = `empleados`.`id_empleado`))) join `prueba_lab` on((`recetas`.`id_prueba` = `prueba_lab`.`id_prueba`))) join `sucursal` on((`sucursal`.`id_sucursal` = `paciente`.`id_sucursal`))) ORDER BY `recetas`.`id_receta` ASC  ;

-- --------------------------------------------------------

--
-- Estructura para la vista `v_recibo`
--
DROP TABLE IF EXISTS `v_recibo`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_recibo`  AS SELECT `recibo`.`id_recibo` AS `id_recibo`, `recibo`.`id_cita` AS `id_cita`, `recibo`.`costo` AS `costo`, `recibo`.`fecha_generacion` AS `fecha_generacion`, `recibo`.`hora_generacion` AS `hora_generacion`, concat(`paciente`.`nombre_paciente`,' ',`paciente`.`apellido_paterno`,' ',`paciente`.`apellido_materno`) AS `paciente`, `paciente`.`telefono_paciente` AS `telefono_paciente`, `sucursal`.`nombre_suc` AS `nombre_suc`, `sucursal`.`direccion_suc` AS `direccion_suc`, `sucursal`.`telefono_suc` AS `telefono_suc` FROM (((`recibo` join `cita` on((`recibo`.`id_cita` = `cita`.`id_cita`))) join `paciente` on((`cita`.`id_paciente` = `paciente`.`id_paciente`))) join `sucursal` on((`paciente`.`id_sucursal` = `sucursal`.`id_sucursal`)))  ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cita`
--
ALTER TABLE `cita`
  ADD PRIMARY KEY (`id_cita`),
  ADD KEY `id_doctor` (`id_doctor`),
  ADD KEY `id_paciente` (`id_paciente`);

--
-- Indices de la tabla `consultorio`
--
ALTER TABLE `consultorio`
  ADD PRIMARY KEY (`id_consultorio`);

--
-- Indices de la tabla `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`id_doctor`),
  ADD KEY `id_empleado` (`id_empleado`),
  ADD KEY `id_consultorio` (`id_consultorio`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`id_empleado`),
  ADD KEY `permiso_id` (`permiso_id`),
  ADD KEY `id_sucursal_emp` (`id_sucursal`) USING BTREE;

--
-- Indices de la tabla `paciente`
--
ALTER TABLE `paciente`
  ADD PRIMARY KEY (`id_paciente`),
  ADD KEY `id_sucursal` (`id_sucursal`);

--
-- Indices de la tabla `prueba_lab`
--
ALTER TABLE `prueba_lab`
  ADD PRIMARY KEY (`id_prueba`);

--
-- Indices de la tabla `recetas`
--
ALTER TABLE `recetas`
  ADD PRIMARY KEY (`id_receta`),
  ADD KEY `id_cita` (`id_cita`);

--
-- Indices de la tabla `recibo`
--
ALTER TABLE `recibo`
  ADD PRIMARY KEY (`id_recibo`),
  ADD KEY `id_cita` (`id_cita`);

--
-- Indices de la tabla `sucursal`
--
ALTER TABLE `sucursal`
  ADD PRIMARY KEY (`id_sucursal`);

--
-- Indices de la tabla `t_permiso`
--
ALTER TABLE `t_permiso`
  ADD PRIMARY KEY (`permiso_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cita`
--
ALTER TABLE `cita`
  MODIFY `id_cita` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `consultorio`
--
ALTER TABLE `consultorio`
  MODIFY `id_consultorio` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `doctor`
--
ALTER TABLE `doctor`
  MODIFY `id_doctor` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `id_empleado` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `paciente`
--
ALTER TABLE `paciente`
  MODIFY `id_paciente` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `prueba_lab`
--
ALTER TABLE `prueba_lab`
  MODIFY `id_prueba` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `recetas`
--
ALTER TABLE `recetas`
  MODIFY `id_receta` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `recibo`
--
ALTER TABLE `recibo`
  MODIFY `id_recibo` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `sucursal`
--
ALTER TABLE `sucursal`
  MODIFY `id_sucursal` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `t_permiso`
--
ALTER TABLE `t_permiso`
  MODIFY `permiso_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cita`
--
ALTER TABLE `cita`
  ADD CONSTRAINT `id_doctor` FOREIGN KEY (`id_doctor`) REFERENCES `doctor` (`id_doctor`) ON UPDATE CASCADE,
  ADD CONSTRAINT `id_paciente` FOREIGN KEY (`id_paciente`) REFERENCES `paciente` (`id_paciente`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `doctor`
--
ALTER TABLE `doctor`
  ADD CONSTRAINT `id_consultorio` FOREIGN KEY (`id_consultorio`) REFERENCES `consultorio` (`id_consultorio`) ON UPDATE CASCADE,
  ADD CONSTRAINT `id_empleado` FOREIGN KEY (`id_empleado`) REFERENCES `empleados` (`id_empleado`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD CONSTRAINT `id_sucursal_emp` FOREIGN KEY (`id_sucursal`) REFERENCES `sucursal_medicals_monterrey` (`id_sucursal`) ON UPDATE CASCADE,
  ADD CONSTRAINT `permiso_id` FOREIGN KEY (`permiso_id`) REFERENCES `t_permiso` (`permiso_id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `paciente`
--
ALTER TABLE `paciente`
  ADD CONSTRAINT `id_sucursal` FOREIGN KEY (`id_sucursal`) REFERENCES `sucursal` (`id_sucursal`) ON UPDATE CASCADE,
  ADD CONSTRAINT `id_sucursal_pac` FOREIGN KEY (`id_sucursal`) REFERENCES `sucursal_medicals_monterrey` (`id_sucursal`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `recetas`
--
ALTER TABLE `recetas`
  ADD CONSTRAINT `id_cita` FOREIGN KEY (`id_cita`) REFERENCES `cita` (`id_cita`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `recibo`
--
ALTER TABLE `recibo`
  ADD CONSTRAINT `recibo_ibfk_1` FOREIGN KEY (`id_recibo`) REFERENCES `cita` (`id_cita`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
