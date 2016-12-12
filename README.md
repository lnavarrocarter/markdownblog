#MarkdownBlog

Un sistema de publicación liviano, rápido, personalizable y basado en markdown, hecho en PHP.

##Introducción
¿Quieres un blog pero no quieres instalar un lento y complejo sitio de wordpress? ¿Estás cansado de tener que luchar con tantos temas y features, crear usuarios e instalar plugins? Entonces Markdownblog puede ayudarte. Buscamos creaŕ una plataforma de blog rápida y liviana, sin la lentitud de las bases de datos y que no tenga nada que envidiarle a un sitio de Wordpress desde fuera.
  
##¿Cómo funciona?

¡Es muy sencillo! Escribes tus entradas en formato Markdown, con cualquier editor de texto. Las guardas con una nomenclatura de archivo definida. Luego las subes mediante FTP a tu proveedor de alojamiento web y listo. El sistema detectará automáticamente la carpeta de posts, las examinará, transformará el Markdown a HTML y las servirá con su contenido en tu blog.

##¿Qué necesito saber para usar Markdownblog?</h2>
Para usar Markdownblog necesitas saber sólo 3 cosas:

1. Saber escribir en [lenguaje Markdown](http://markdown.es/) y tener un editor de texto apropiado

2. Saber cómo usar un cliente FTP

3. Saber cómo funciona un hosting web

##¿Cómo lo instalo?


##¿En qué mejoras se está trabajando?

- [ ] **Temas:** Estamos trabajando en el diseño de hojas de estilo que podrán dar al blog diferentes temas. Queremos pasar las que tenemos a LESS para que, por medio del uso de variables, puedan ser más customizables. Actualmente, contamos con un sólo tema llamado *Elementary*.
- [ ] **Integración con Disquss:** Estamos trabajando para poder integrar Disquss fácilmente al blog y sus entradas.
- [ ] **Archivo de Scripts:** Queremos hacer un parse de un archivo especial de Markdown llamado scripts.md, en el cual puedas escribir los scripts para tu sitio en formato Markdown, y que el blog los coloque automáticamente antes del cierre del `BODY`
- [ ] **Script de Instalación:** Estamos trabajando en un script de instalación para que el blog detecte cuando una instalación está fresca y pueda lanzar una aplicación que lo configure.