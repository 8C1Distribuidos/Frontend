CREATE TABLE IF NOT EXISTS `productos` (
  `image` varchar(150) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) NOT NULL,
  `clasificacion` varchar(150) NOT NULL,
  `stock` int(11) NOT NULL,
  `costo` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=74 ;

CREATE TABLE IF NOT EXISTS `catalogo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=74 ;

CREATE TABLE IF NOT EXISTS `clasificacion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) NOT NULL,
  `id_catalogo` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`id_catalogo`) REFERENCES catalogo(`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=74 ;

INSERT INTO `catalogo` VALUES (
  1,'vinos'
),( 2, 'Destilados');

INSERT INTO `clasificacion` VALUES (
  NULL, 'Brandy', 2
), (NULL, 'Ginegra', 2), (NULL, 'Mezcal',2),(NULL, 'Ron', 2), (NULL, 'Tequila',2),
(NULL, 'Vodka', 2), (NULL, 'Whiskey', 2), (NULL, 'Vino blanco', 1),
(NULL, 'Champagne',1), (NULL, 'Vino de postre', 1), (NULL, 'Vino espumoso',1 ), (NULL, 'Vino rosado', 1),
(NULL, 'Vino sin alcohol', 1), (NULL, 'Vino tinto',1);


