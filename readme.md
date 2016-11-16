## Sistema Renta De Libros

### Proyecto Web 4to Cuatri Unipoli

#### Requisitos y pasos a seguir para que esta madre jale

  1. Tener instalado [Git](https://git-scm.com/download/win), lo descargan del link y le dan siguiente, siguiente, etc...
  2. Instalan [Composer](https://getcomposer.org/Composer-Setup.exe) también porfa.
  3. Crear una base de datos llamada -> proyectoweb
  4. Crear un usuario, inician en la terminal como root y ejecutan (Copian y pegan) -> ** GRANT ALL PRIVILEGES ON proyectoweb.* TO 'proyectoweb'@'localhost' IDENTIFIED BY 'proyectoweb' WITH GRANT OPTION; **
  5. Recargan los privilegios del usuario con el comando -> FLUSH PRIVILEGES;
  6. Luego copian este repositorio: van a la carpeta de sus documentos o escritorio o la que quieran y le dan click derecho en un lugar solo y dan click donde dice Git Bash Here (si no aparece reinician la compu para que git agarre chido ;) )
  7. Ya que agarre chido, se va a abrir git con la ruta donde estan. ahi hay que poner -> git clone https://github.com/mazyvan/Proyecto-Web-de-4to-Cuatri (para clonar el repositorio)
  8. Si estan perros y les jala todo el rollo hasta aqui les debe crear una carpeta llamada -> Proyecto-Web-de-4to-Cuatri
  9. Sin salirse de Git escriben y dan enter -> cd Proyecto-Web-de-4to-Cuatri
  10. Despues escriben y luego enter -> composer install   (Se va a tardar un ratillo en sus compus chafas(8 , mientras van por papas o algo)
  11. Cuando termine ponen -> php artisan migrate (eso es para que artisan cree las tablas por ustedes por que somos webones)
  11. Cuando termine ponen -> php artisan serve
  12. No cierren la terminal Git y van a [MIT license](http://localhost:8000)
  13. Avedaaa :3

Para que deje de funcionar cierran la terminal o ponen dan Control C y siempre que quieran que corra tienen que estar en esa carpeta y usar php artisan serve
### license

[MIT license](http://opensource.org/licenses/MIT)
