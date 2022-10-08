================================================================================
La configuracion de la base de datos se encuentra dentro de la carpeta 
lib->conf
dentro de la carpeta conf encontraran 2 archivos
-> conf
-> connection

dentro del conf se encuetra la configuracion de la base de datos.
==================================================================================

dentro de la carpeta se deja la base de datos de MYSQL para generar la base de datos.
el nombre de la base de datos es prueba_tecnica_dev

=======================================================================================

se debe tener internet para poder usar la aplicacion puesto algunas librerias estan cargadas 
mediante la web 

===========================================================================================

en el documento se pidieron 2 consultas para saber el producto con mas stock y el mas vendido
dentro de modulo Ventas Productos en la parte de arriba estan el resultado de la busqueda

producto con mas stock =  SELECT prod_nombre, prod_stock FROM producto ORDER BY 2 desc LIMIT 1

producto mas vendido = 
SELECT vnt.id_prod,pr.prod_nombre, vnt.prod_ref, vnt.prod_prec, pr.prod_categoria, sum(vnt.vnt_cant_prod) as vntTotal 
FROM producto pr 
INNER JOIN ventas vnt ON pr.id_prod = vnt.id_prod 
GROUP BY vnt.id_prod 
ORDER BY 6 desc limit 1
 ============================================================================================

 