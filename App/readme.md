ReporteadorMTC/
│
├── public/                # Carpeta accesible desde el navegador (raíz del servidor)
│   ├── index.php          # Punto de entrada principal
│   ├── css/               # Archivos CSS
│   ├── js/                # Archivos JavaScript
│   ├── img/               # Imágenes públicas
│   └── uploads/           # Archivos subidos por el usuario (si aplica)
│
├── app/                   # Lógica de la aplicación
│   ├── Controllers/       # Controladores (manejan las peticiones)
│   ├── Models/            # Modelos (acceso a la base de datos)
│   ├── Views/             # Vistas (HTML, plantillas, etc.)
│   ├── Helpers/           # Funciones auxiliares (formato, validaciones, etc.)
│   └── config.php         # Configuración principal (BD, rutas base, etc.)
│
├── core/                  # Clases base o componentes esenciales
│   ├── Router.php         # Manejo de rutas
│   ├── Controller.php     # Clase base para controladores
│   └── Database.php       # Clase de conexión a la base de datos
│
├── vendor/                # (Opcional) Librerías externas instaladas con Composer
│
├── storage/               # Archivos temporales, logs, caché, etc.
│   └── logs/
│
├── .env                   # Variables de entorno (config privada)
├── .gitignore             # Ignorar archivos si usas Git
└── README.md