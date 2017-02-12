# The Markdown Blog

Es un sistema de publicación web liviano, rápido, personalizable, basado en markdown, hecho en PHP y que guarda sus datos en una micro database en formato json.

Repositorios Utilizados:
* [JsonDB](https://github.com/mnavarrocarter/jsondb/): Una librería de Codeigniter para CRUDs a un archivo json.
* [Parsedown](https://github.com/erusev/parsedown): Una librería de PHP para parsear Markdown a HTML.
* [Codeigniter Breadcrums](https://github.com/nobuti/Codeigniter-breadcrumbs): Una librería para utilizar breadcrums en CodeIgniter.

## Introducción
¿Quieres un blog pero no quieres instalar un lento y complejo sitio de wordpress? ¿Estás cansado de tener que luchar con tantos temas y features, crear usuarios e instalar plugins? ¿Odias la lentitud de los CMS modernos? Entonces **The Markdown Blog** puede ayudarte. Buscamos creaŕ una plataforma de blog rápida, liviana, fácil de usar y de código abierto, pero que tenga carácterísticas de creación de contenido avanzadas.
  
## ¿Cómo funciona?

Los datos que utliza tu página web son guardados en un archivo json, con lo cual pueden ser accesados rápidamente via php (gracias a la librería **Jsondb** desarrollada por Matías Navarro para la manipulación de json's en forma de base de datos). Así, el archivo json pasa a funcionar como la base de datos del sistema. Al no tener una conexión a un servicio de base de datos ni cargar los complejos drivers para PHP de ninguno de ellos, **The Markdown Blog** es capaz de alcanzar velocidades increíbles de renderizado de páginas, realizando incluso múltiples consultas al archivo json por vista. 

##¿Qué necesito saber para instalar The Markdown Blog para mi uso personal?</h2>
Para instalar Markdownblog necesitas saber sólo 3 cosas:

1. Saber escribir en [lenguaje Markdown](http://markdown.es/) y tener un editor de texto apropiado

2. Saber cómo usar un cliente FTP

3. Saber cómo funciona un hosting web

## ¿Cómo lo instalo?
1. Descarga el [último release](https://github.com/mnavarrocarter/markdownblog/releases) estable. 
2. Súbelo a tu hosting web mediante ftp.
3. Configura el archivo `/app/config/config.php` cambiando la siguiente llave del array config:
```
$config['base_url'] = 'http://tu-propio-dominio.algo/';
```
4. En un navegador accede a http://tu-propio-dominio.algo/ y sigue los pasos de instalación para crear tu usuario y realizar los primeros ajustes.
5. ¡Listo!