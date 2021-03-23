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
/*
else
				if (data.clasificacion = Espumoso) {
					$('#productosModal').modal('show');
					$('#nombre').val(data.nombre);
					$('#clasificacion').val(data.clasificacion);
					$('#stock').val(data.stock);
					$('#costo').val(data.costo);
					$('.modal-title').text("Editar producto");
					$('#productos_id').val(productos_id);
					$('#productos_uploaded_image').html(data.productos_image);
				}else
				if (data.clasificacion = Tinto) {
					$('#productosModal').modal('show');
					$('#nombre').val(data.nombre);
					$('#clasificacion').val(data.clasificacion);
					$('#stock').val(data.stock);
					$('#costo').val(data.costo);
					$('.modal-title').text("Editar producto");
					$('#productos_id').val(productos_id);
					$('#productos_uploaded_image').html(data.productos_image);
				}else
				if (data.clasificacion = Rosado) {
					$('#productosModal').modal('show');
					$('#nombre').val(data.nombre);
					$('#clasificacion').val(data.clasificacion);
					$('#stock').val(data.stock);
					$('#costo').val(data.costo);
					$('.modal-title').text("Editar producto");
					$('#productos_id').val(productos_id);
					$('#productos_uploaded_image').html(data.productos_image);
				}else
				if (data.clasificacion = Champagne) {
					$('#productosModal').modal('show');
					$('#nombre').val(data.nombre);
					$('#clasificacion').val(data.clasificacion);
					$('#stock').val(data.stock);
					$('#costo').val(data.costo);
					$('.modal-title').text("Editar producto");
					$('#productos_id').val(productos_id);
					$('#productos_uploaded_image').html(data.productos_image);
				}else
				if (data.clasificacion = De_Postre) {
					$('#productosModal').modal('show');
					$('#nombre').val(data.nombre);
					$('#clasificacion').val(data.clasificacion);
					$('#stock').val(data.stock);
					$('#costo').val(data.costo);
					$('.modal-title').text("Editar producto");
					$('#productos_id').val(productos_id);
					$('#productos_uploaded_image').html(data.productos_image);
				}else
				if (data.clasificacion = Sin_Alcohol) {
					$('#productosModal').modal('show');
					$('#nombre').val(data.nombre);
					$('#clasificacion').val(data.clasificacion);
					$('#stock').val(data.stock);
					$('#costo').val(data.costo);
					$('.modal-title').text("Editar producto");
					$('#productos_id').val(productos_id);
					$('#productos_uploaded_image').html(data.productos_image);
				}else
				if (data.clasificacion = "Brandy") {
					$('#productosModal').modal('show');
					$('#nombre').val(data.nombre);
					$('#clasificacion').val(data.clasificacion);
					$('#stock').val(data.stock);
					$('#costo').val(data.costo);
					$('.modal-title').text("Editar producto");
					$('#productos_id').val(productos_id);
					$('#productos_uploaded_image').html(data.productos_image);
				}else
				if (data.clasificacion = "Tequila") {
					$('#productosModal').modal('show');
					$('#nombre').val(data.nombre);
					$('#clasificacion').val(data.clasificacion);
					$('#stock').val(data.stock);
					$('#costo').val(data.costo);
					$('.modal-title').text("Editar producto");
					$('#productos_id').val(productos_id);
					$('#productos_uploaded_image').html(data.productos_image);
				}else
				if (data.clasificacion = "Cognac") {
					$('#productosModal').modal('show');
					$('#nombre').val(data.nombre);
					$('#clasificacion').val(data.clasificacion);
					$('#stock').val(data.stock);
					$('#costo').val(data.costo);
					$('.modal-title').text("Editar producto");
					$('#productos_id').val(productos_id);
					$('#productos_uploaded_image').html(data.productos_image);
				}else
				if (data.clasificacion = "Ginebra") {
					$('#productosModal').modal('show');
					$('#nombre').val(data.nombre);
					$('#clasificacion').val(data.clasificacion);
					$('#stock').val(data.stock);
					$('#costo').val(data.costo);
					$('.modal-title').text("Editar producto");
					$('#productos_id').val(productos_id);
					$('#productos_uploaded_image').html(data.productos_image);
				}else
				if (data.clasificacion = "Mezcal") {
					$('#productosModal').modal('show');
					$('#nombre').val(data.nombre);
					$('#clasificacion').val(data.clasificacion);
					$('#stock').val(data.stock);
					$('#costo').val(data.costo);
					$('.modal-title').text("Editar producto");
					$('#productos_id').val(productos_id);
					$('#productos_uploaded_image').html(data.productos_image);
				}else
				if (data.clasificacion = "Ron") {
					$('#productosModal').modal('show');
					$('#nombre').val(data.nombre);
					$('#clasificacion').val(data.clasificacion);
					$('#stock').val(data.stock);
					$('#costo').val(data.costo);
					$('.modal-title').text("Editar producto");
					$('#productos_id').val(productos_id);
					$('#productos_uploaded_image').html(data.productos_image);
				}else
				if (data.clasificacion = "Whisky") {
					$('#productosModal').modal('show');
					$('#nombre').val(data.nombre);
					$('#clasificacion').val(data.clasificacion);
					$('#stock').val(data.stock);
					$('#costo').val(data.costo);
					$('.modal-title').text("Editar producto");
					$('#productos_id').val(productos_id);
					$('#productos_uploaded_image').html(data.productos_image);
				}else
				if (data.clasificacion = "Vodka") {
					$('#productosModal').modal('show');
					$('#nombre').val(data.nombre);
					$('#clasificacion').val(data.clasificacion);
					$('#stock').val(data.stock);
					$('#costo').val(data.costo);
					$('.modal-title').text("Editar producto");
					$('#productos_id').val(productos_id);
					$('#productos_uploaded_image').html(data.productos_image);
				}*/