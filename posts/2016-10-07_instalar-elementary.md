# 7 Cosas Para Hacer Luego de Instalar Elementary OS Loki

**Elementary OS** ha probado ser una distro más que excelente. Sin embargo, aún necesita algunas pequeñas modificaciones para que puedas utilizarlo de buena forma.

### Instalar y Administrar Repositorios
Por defecto, Elementary OS Loki tiene desactivada la opción para añadir repositorios al sistema. Para solucionar esto, abrimos la Terminal con `Super`+`T` y ejecutamos:
```
sudo apt install software-properties-common
```
Luego de eso instalamos el visor de Software y Propiedades.
```
sudo apt install -y software-properties-gtk
```
Y lo ejecutamos:
```
sudo software-properties-gtk
```
Una ventana así debería aparecer:
    
![](https://dl.dropboxusercontent.com/u/22993669/img/propertiessoft.gif)

Allí podrás configurar los repositorios más visualmente si no te sientes cómodo con la terminal, además de ver tus controladores extra y otras opciones importantes.

### Instala Synaptics y Gdebi
Synaptics es un administrador de paquetes muy eficente que te permitirá llevar un control de todos los paquetes instalados en tu sistema y te permitirá instalar otros tantos. Gdebi es un instalador de paquetes en entorno gráfico, necesario para instalar los paquetes *.deb desde la vista de carpetas. Para instalar ambos paquetes, sólo debes ingresar en la terminal:
```
sudo apt install -y synaptic gdebi-core
```

### Instalar Soporte exFAT
Si eres un usuario que viaja de computadora en computadora, sobretodo con su disco duro externo, entonces necesitas instalar soporte para este sistema de archivos. El sistema exFAT es una versión mejorada de FAT32 (algo así como un FAT64) y funciona de manera muy eficiente tanto en Windows 10 y OS X. LAmentablemente, no viene por defecto instalado en Linux. Para ello, simplemente ejecutamos:
```
sudo apt install -y exfat-fuse exfat-utils
```

### Instalar Elementary Tweaks
ELementary es un sistema que ya es hermoso de por sí, sin embargo, existen aún muchas mejoras que se le pueden hacer. Particularmente, su gama de íconos no es muy amplia, por lo que se puede mejorar. Para ello, necesitamos una herramienta llamada Elementary Tweaks, que nos permitirá *twekear* algunas cosas del sistema. Para instalarla, debemos agregar un repositorio.
```
sudo add-apt-repository ppa:versable/elementary-update -y
sudo apt install update
sudo apt install -y elementary-tweaks
```

### Instalar Pack de Íconos Extra
Lamentablemente, Elementary sólo viene con una colección de íconos pequeña, solamente para sus aplicaciones nativas. Pero, si quieres mantener la armonía de diseño de tu OS y añadir íconos del mismo estilo para aplicaciones de terceros, entonces debes instalar este paquete de íconos hosteado en GitHub.
```
sudo add-apt-repository ppa:elementary-add-team/icons -y
sudo apt update
sudo apt install elementary-add-icon-theme
```

Luego, desde Elementary Tweaks, puedes elegir el pack.

![](https://dl.dropboxusercontent.com/u/22993669/img/tweaksicon.gif)

### Actualizar el Kernel
Muchas veces, las distros nuevas que van saliendo no trabajan con los últimos kernels, por lo que se pueden perder los beneficios que vienen con las actualizaciones constantes. En mi caso, por ejemplo, actualizar al último Kernel me sirvió para arreglar un problema de parpadeo ocasional de pantalla. Y es que el Kernel es la forma en cómo Linux se comunica con los componentes de tu computadora, es decir, es la base de tu sistema.

Como Elementary OS Loki es una distro derivativa de Ubuntu 16.04, no hay problema en que podamos utilizar el [repositorio de Kernels de Ubuntu](http://kernel.ubuntu.com/~kernel-ppa/mainline/) para actualizar el nuestro. 

Como la versión estable más avanzada del Kernel a la fecha es la 4.6.3 (Yakkety), colocaré los comandos en la terminal necesarios para hacer el proceso un poco más fácil. ATENCIÓN: actualizar el Kernel puede dejar tu sistema inutilizable. Debes seguir las instrucciones al pie de la letra.

Para sistemas de 64 bits:
```
mkdir Kernel && cd Kernel
wget http://kernel.ubuntu.com/~kernel-ppa/mainline/v4.6.3-yakkety/linux-headers-4.6.3-040603_4.6.3-040603.201606241434_all.deb
wget http://kernel.ubuntu.com/~kernel-ppa/mainline/v4.6.3-yakkety/linux-headers-4.6.3-040603-generic_4.6.3-040603.201606241434_amd64.deb
wget http://kernel.ubuntu.com/~kernel-ppa/mainline/v4.6.3-yakkety/linux-image-4.6.3-040603-generic_4.6.3-040603.201606241434_amd64.deb
sudo dpkg -i *.deb
```
Para sistemas de 32 bits:
```
mkdir Kernel && cd Kernel
wget http://kernel.ubuntu.com/~kernel-ppa/mainline/v4.6.3-yakkety/linux-headers-4.6.3-040603_4.6.3-040603.201606241434_all.deb
wget http://kernel.ubuntu.com/~kernel-ppa/mainline/v4.6.3-yakkety/linux-headers-4.6.3-040603-generic_4.6.3-040603.201606241434_i386.deb
wget http://kernel.ubuntu.com/~kernel-ppa/mainline/v4.6.3-yakkety/linux-image-4.6.3-040603-generic_4.6.3-040603.201606241434_i386.deb
sudo dpkg -i *.deb
```

Luego de eso, reinicia y tendrás el Kernel actualizado.

### Instala Aplicaciones de Terceros

En este [sitio web](https://quassy.github.io/elementary-apps/) hay un excelente catálogo de aplicaciones y recursos para Elementary OS. Personalmente, utilizo FeedReader, el Mod de Dropbox, Go For It, Mark My Words, Lollypop, Birdie y Taxi. Espero que con el tiempo vayan agregando más aplicaciones y soporte.

### ¡Es Todo!
¿Tienes alguna otra aplicación o configuración importante que no mencioné? Puedes comentar aquí abajo y ayudarme a mejorar esta entrada.