-- ==========================================================
-- SISTEMA WEB PARA LA GESTIÓN DE SERVICIOS DE UN ESTUDIO FOTOGRÁFICO
-- Base de Datos: db_photostudio
-- ==========================================================

CREATE DATABASE IF NOT EXISTS `db_photostudio` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `db_photostudio`;

-- 1. Tabla de Usuarios (Administradores y Clientes)
CREATE TABLE IF NOT EXISTS `usuarios` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `nombre` VARCHAR(100) NOT NULL,
    `email` VARCHAR(120) NOT NULL UNIQUE,
    `password` VARCHAR(255) NOT NULL,
    `telefono` VARCHAR(20) DEFAULT NULL,
    `rol` ENUM('admin', 'fotografo', 'cliente') DEFAULT 'cliente',
    `creado_el` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- 2. Tabla de Categorías de Servicios
CREATE TABLE IF NOT EXISTS `categorias` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `nombre` VARCHAR(50) NOT NULL,
    `slug` VARCHAR(50) NOT NULL UNIQUE
) ENGINE=InnoDB;

-- 3. Tabla de Paquetes / Servicios
CREATE TABLE IF NOT EXISTS `servicios` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `categoria_id` INT,
    `nombre` VARCHAR(100) NOT NULL,
    `slug` VARCHAR(100) NOT NULL,
    `precio` DECIMAL(10, 2) NOT NULL,
    `duracion` VARCHAR(50),
    `descripcion` TEXT,
    `destacado` TINYINT(1) DEFAULT 0,
    FOREIGN KEY (`categoria_id`) REFERENCES `categorias`(`id`) ON DELETE SET NULL
) ENGINE=InnoDB;

-- 4. Tabla de Citas y Reservas
CREATE TABLE IF NOT EXISTS `reservas` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `folio` VARCHAR(20) NOT NULL UNIQUE,
    `usuario_id` INT DEFAULT NULL,
    `nombre_cliente` VARCHAR(100) NOT NULL,
    `email_cliente` VARCHAR(120) NOT NULL,
    `telefono_cliente` VARCHAR(20) NOT NULL,
    `servicio_nombre` VARCHAR(100) NOT NULL,
    `fecha_evento` DATE NOT NULL,
    `hora_evento` VARCHAR(20) NOT NULL,
    `locacion` VARCHAR(100) DEFAULT 'Estudio',
    `adicionales` TEXT DEFAULT NULL,
    `precio_total` DECIMAL(10, 2) NOT NULL DEFAULT 0.00,
    `anticipo_pagado` DECIMAL(10, 2) DEFAULT 0.00,
    `estado` ENUM('Pendiente', 'Confirmada', 'Completada', 'Cancelada') DEFAULT 'Pendiente',
    `notas` TEXT DEFAULT NULL,
    `creado_el` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (`usuario_id`) REFERENCES `usuarios`(`id`) ON DELETE SET NULL
) ENGINE=InnoDB;

-- 5. Tabla de Mensajes de Contacto
CREATE TABLE IF NOT EXISTS `mensajes_contacto` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `nombre` VARCHAR(100) NOT NULL,
    `email` VARCHAR(120) NOT NULL,
    `telefono` VARCHAR(20) DEFAULT NULL,
    `asunto` VARCHAR(100) NOT NULL,
    `mensaje` TEXT NOT NULL,
    `leido` TINYINT(1) DEFAULT 0,
    `fecha` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- ==========================================================
-- DATOS INICIALES DE EJEMPLO
-- ==========================================================

INSERT INTO `usuarios` (`nombre`, `email`, `password`, `telefono`, `rol`) VALUES
('Administrador Lumière', 'admin@lumierephoto.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '5512345678', 'admin'),
('Carlos Mendoza', 'cliente@gmail.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '5587654321', 'cliente');

INSERT INTO `categorias` (`nombre`, `slug`) VALUES
('Bodas & Nupcial', 'bodas'),
('XV Años', 'xv'),
('Retrato & Estudio', 'estudio'),
('Eventos Corporativos', 'eventos');
