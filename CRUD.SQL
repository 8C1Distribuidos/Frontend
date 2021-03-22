CREATE TABLE IF NOT EXISTS `productos` (
    `image` varchar(150) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) NOT NULL,
  `clasificacion` varchar(150) NOT NULL,
  `stock` int(11) NOT NULL,
  `costo` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=74 ;



INSERT INTO `productos` (`image`, `nombre`, `clasificacion`, `stock`,`costo` ) VALUES
('1.jpg','Lambrusco', 'Vino Tinto', '1', '100');
