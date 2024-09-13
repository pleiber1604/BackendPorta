<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Instalación

El proceso de instalación :
- clonando el proyecto
    git clone https://github.com/pleiber1604/BackendPorta.git
- ubicarnos en la carpeta del proyecto
    cd nombre_proyecto
- instalando las dependencias del proyecto
     composer install
     npm install  
- Creando el archivo de variables de entorno
      cp .env.example .env
- creando API KEY
    php artisan key:generate
- Se deben agregar las credenciales de la base de datos en el archivo .env
      DB_CONNECTION=mysql
      DB_HOST=127.0.0.1
      DB_PORT=3307
      DB_DATABASE=laravel
      DB_USERNAME=root
      DB_PASSWORD=
- Ejecutar las migraciones
      php artisan migrate
- ejecutar seeders
      php artisan db:seed
- ejectutar el comando npm run dev o npm run build (este ultimo si se quieren ya los assets compilados)
- Ya con esto ejecutando php artisan serve pueden ejecturar el servidor de pruebas que levantala la aplicación o si desean pueden crear un virtual host para desplegarlo en el navegador

## Notas Importantes
- EL proyecto esta relizado con laravel + vue y vite en una unica arquitectura para facilitar su revisión, es decir, no se separo el front y back. Pueden ver los componentes en la carpeta resources/js del proyecto.
- Para el envío de correo se configuró como driver: log en el .env , para que envie los correos al archivo: storage/logs/laravel.log y de esa manera evitar tengan que apuntar a un smtp para el envío de correos. De tal manera que para verificar su envio se debe ir al ruta indicada.
- En los seeders ya se crean usuarios con fecha de last_login de mas de 30 días para probar el envio de correos a esos usuarios.
-  Para  las tareas programadas se utilizó una un job que crea una cola en la tabla jobs de la base de datos. Para dejar las cosas simples y no crear crons dependiendo del so coloco los comandos para generar la cola y consumirla repectivamente.
      php artisan app:enviar-correos
      php artisan queue:work
    


