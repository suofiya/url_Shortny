SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

ALTER TABLE `settings` ADD `cstm-style` LONGTEXT NOT NULL AFTER `email`;
UPDATE `settings` SET `admin_user`='admin', `admin_pass`='$2y$10$ZVz0jEQTGiYAjfO0bbhtt.QuLXeze6Q5E/DU7P8WAQ/FwepEeJ8fq' `logo_url`='img/logo-light.png;img/logo-dark.png';

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
