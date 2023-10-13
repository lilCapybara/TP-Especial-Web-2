# TP-Especial-Web-2

Integrantes:

Cisneros Sebastián
scisneros@alumnos.exa.unicen.edu.ar

Ortega Sebastián Gastón
sortega@alumnos.exa.unicen.edu.ar


Tematica del TPE: Tienda de Campeones y skins de League of Legends.

La pagina a ralizar es una tienda en la que se pueden comprar Campeones (personajes) y skins (aspectos para el personaje) del videojuego League of legends.

Las compras realizadas son registradas en la tabla Transacciones y cada una es identificada mediante una transaction_id.

Mediante la clave champion_id relacionamos la tabla transacciones con la tabla campeones y,a su vez, es utilizada para relacionar la tabla campeones con la tabla skins.

Por otro lado. la tabla transactions se relaciona a las demas mediante las claves foraneas Skin_id, Champion_id y User_id.

Para la segunda entrega se agrego la funcionalidad del carrito de la compra y el login.

Como aun no se pedia hacer un registro de usuarios desde la pagina, insertamos manualmente 2 usuarios con sus respectivas contraseñas hasheadas para poder testear la pagina. Estos son:

Usuario: admin || Contraseña: 123456

usuario: normal || Contraseña: 654321

Ademas del diagrama en pdf, adjuntamos para mayor comodidad un archivo .jpeg del diagrama DER, puesto que en el pdf no puede verse bien sin hacer zoom.
