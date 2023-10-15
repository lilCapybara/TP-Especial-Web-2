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

Usuario: webadmin || Contraseña: admin  (Posee las autorizaciones necesarias para realizar ediciones en la pagina)

usuario: normal || Contraseña: 654321  (Solo puede ver la lista de campeones y skins y agregar items al carrito de la compra)

A continuacion se agrega un pdf con Las tablas de la base de datos, asi como el DER en formato jpeg.

[cba_cba_e-shop.pdf](https://github.com/lilCapybara/TP-Especial-Web-2/files/12908786/cba_cba_e-shop.pdf)

![DER](https://github.com/lilCapybara/TP-Especial-Web-2/assets/142858679/436068bc-bced-4c59-8dc3-84c4a88dbef2)
