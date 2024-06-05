# Gestión de Alquileres Turísticos

Este proyecto es una aplicación para una empresa gestora de alquileres turísticos. Permite gestionar ingresos y gastos de apartamentos, proporcionando funcionalidades para agregar, modificar y eliminar datos de apartamentos, ingresos y gastos. También incluye funcionalidades de autenticación de usuarios y cálculo de liquidación trimestral de IVA.

## Características

- Autenticación de usuarios
- Gestión de apartamentos (alta, baja, modificación)
- Gestión de ingresos (alta, baja, modificación, cálculo de IVA y total de factura)
- Gestión de gastos (alta, baja, modificación, cálculo de IVA y total de gasto)
- Registro de usuarios, fecha y hora de inicio y final de sesión
- Cálculo de liquidación trimestral de IVA
- Dashboard con estadísticas y resúmenes financieros

## Librerías Instaladas

- Laravel 10.x
- Laravel Breeze
- Carbon (para manipulación de fechas)
- Bootstrap (para el diseño de la interfaz)

## Requisitos Previos

- PHP >= 8.1
- Composer
- MySQL

## Instalación

### Clonar el Repositorio

```
git clone https://github.com/tu-usuario/tu-repositorio.git
cd tu-repositorio 
composer install
npm install
npm run dev
```

### Configurar el Archivo `.env`
Copia el archivo .env.example a .env y configura las variables de entorno, especialmente las relacionadas con la base de datos:

```
cp .env.example .env
```

### Generar la Clave de la Aplicación

```
php artisan key:generate

```

### Migrar la Base de Datos
```
php artisan migrate
```

## Iniciar el Servidor de Desarrollo
```
php artisan serve
```

### Uso
- Visita http://localhost:8000 en tu navegador.
- Regístrate o inicia sesión con una cuenta existente.
- Administra los apartamentos, ingresos y gastos desde el menú superior.
- Utiliza el formulario de selección de trimestre en el dashboard para calcular la liquidación trimestral de IVA.

## Estructura del Proyecto
- `app/Models`: Modelos de Eloquent para la base de datos
- `app/Http/Controllers`: Controladores de la aplicación
- `database/migrations`: Migraciones de la base de datos
- `resources/views`: Vistas Blade de la aplicación