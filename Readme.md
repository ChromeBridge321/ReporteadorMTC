# PASOS PARA CONFIGURAR ENTORNO DE DESARROLLO PHP 7.1

1. Primero instalar el paquete de XAMPP "https://sourceforge.net/projects/xampp/files/XAMPP%20Windows/7.1.1/xampp-win32-7.1.1-0-VC14-installer.exe/download". Una vez que se instale, desmarcar la casilla de "ejecutar xampp".

2. Una vez instalado XAMPP, copiar los archivos "php_pdo_sqlsrv.dll" y "php_sqlsrv.dll" que se encuentrar en la carpeta drivers del proyecto y dirigirse a la carpeta de XAMPP `C:\xampp\php\ext` y pegar aquí estos dos archivos.

3. Entrar al siguiente enlace "https://learn.microsoft.com/es-es/sql/connect/odbc/windows/release-notes-odbc-sql-server-windows?view=sql-server-ver17#previous-releases" buscar e instalar la version 13 del controlador ODBC.

4. Una vez hecho esto, ejecutar XAMPP como administrador y en el apartado de "Apache" dar clic en "Config" y dar clic en "php.ini". En el apartado de "Windows Extensions" (puedes presionar CTRL + F y buscar este apartado) debes pegar lo siguiente:
```bash
extension=php_sqlsrv.dll
extension=php_pdo_sqlsrv.dll
```
5. Ahora deberás dirigirte a la siguiente ruta `C:\xampp\htdocs` y aquí deberás clonar el repositorio. Una vez hecho esto, inicia el servidor Apache de XAMPP y accede a la aplicación para probar que se pueda acceder a la base de datos.
   
   **URL del proyecto:** http://localhost/Reporteador_MTC/index.php

6. Accede a "Históricos" y verifica que el endpoint devuelva una respuesta de tipo JSON. Listo, tendrás ya el proyecto correctamente configurado.