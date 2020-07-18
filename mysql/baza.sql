SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

CREATE TABLE IF NOT EXISTS `users` (
  `url` text CHARACTER SET utf8mb4,
  `hato_soz` text CHARACTER SET utf8mb4,
  `tuzailgan` text CHARACTER SET utf8mb4
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `users` (`url`, `hato_soz`, `tuzailgan`) VALUES
('http://ajax.uz/2/index.html', 'Ассалому', 'Акбарали');
