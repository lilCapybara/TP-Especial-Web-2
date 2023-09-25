# TP-Especial-Web-2

Integrantes:

Cisneros Sebastián
scisneros@alumnos.exa.unicen.edu.ar

Ortega Sebastián Gastón
sortega@alumnos.exa.unicen.edu.ar


Tematica del TPE: Tienda de Campeones, skins y chromas de League of Legends.

La pagina a ralizar es una tienda en la que se pueden comprar Campeones (personajes), skins (aspectos para el personaje) y chromas (variaciones 
en el color de cada skin) del videojuego League of legends.
Las compras realizadas son registradas en la tabla Transacciones y cada una es identificada mediante una transaction_id.

Mediante la clave champion_id relacionamos la tabla transacciones con la tabla campeones y,a su vez, es utilizada para relacionar la tabla campeones con la tabla skins.

La skin_id permite relacionar la tabla skins con la tabla chromas, mientras que la clave chroma_id es utilizada solamente para diferenciar los distintos chromas entre si.

Ademas del diagrama en pdf, adjuntamos para mayor comodidad un archivo .jpeg del diagrama DER, puesto que en el pdf no puede verse bien sin hacer zoom.

[Diagrama.pdf](https://github.com/lilCapybara/TP-Especial-Web-2/files/12717685/Diagrama.pdf)
