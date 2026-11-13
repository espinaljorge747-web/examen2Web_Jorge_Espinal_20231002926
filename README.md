# **DISFARMA Honduras: Sistema de gestión interna**

Sistema web para la gestión interna de **Droguería y Distribuidora Farmacéutica San Rafael S. de R.L. (DISFARMA Honduras)**. Este sistema permite administrar el catálogo de medicamentos, la red de proveedores y la plantilla de personal desde una sola plataforma. Además, incluye autenticación de usuarios y un dashboard gerencial.

## **Tecnologías**

Tecnologías usadas: **Laravel** con PHP 8.2, **MySQL** a través de XAMPP, **Bootstrap 5.2.3** con la plantilla Modern Business de Start Bootstrap, **Bootstrap Icons** y **Blade** como motor de plantillas.

## **Funcionalidades**

**Autenticación:** permite iniciar sesión y registrarse con correo institucional **@disfarma.hn**. Las contraseñas se cifran con **Bcrypt**. La sesión se regenera al iniciar y cerrar sesión para proteger contra fijación de sesión. También hay opción de recordar sesión. Se definen rutas públicas para invitados y rutas protegidas para usuarios autenticados.

**Medicamentos:** se pueden crear, leer, actualizar y eliminar medicamentos. Cada medicamento tiene un **código SKU único**, una categoría que puede ser Antibióticos, Analgésicos, Sueros, Material Quirúrgico o Vitaminas, un precio, un costo, un inventario, un laboratorio, un número de lote y una fecha de vencimiento. Se puede subir una foto del empaque en formato JPG, PNG o WEBP, con un tamaño máximo de 5 MB. El inventario se muestra con colores: **verde** cuando hay más de 20 unidades, **amarillo** cuando hay entre 10 y 20 unidades y **rojo** cuando hay menos de 10 unidades. Se puede buscar por nombre o por código SKU.

**Proveedores:** se pueden crear, leer, actualizar y eliminar proveedores. Cada proveedor tiene un **RTN único de 14 dígitos** y un teléfono de 8 dígitos que comienza con 2, 3, 8 o 9. También se registra el límite de crédito y el plazo de pago, que puede ser 15, 30, 45 o 60 días. El proveedor puede estar activo o inactivo. Se puede buscar por nombre de empresa o por RTN.

**Empleados:** se pueden crear, leer, actualizar y eliminar empleados. Cada empleado tiene un **DNI único de 13 dígitos** y ocupa un cargo que puede ser Regente Farmacéutico, Asistente de Farmacia, Jefe de Bodega, Despachador o Cajero. Se registra el salario en Lempiras y la fecha de ingreso. Se puede buscar por nombre, apellido o DNI.

**Dashboard gerencial:** muestra cuatro indicadores que se calculan desde la base de datos. El primero es el **total de medicamentos** en el catálogo. El segundo es el número de **proveedores activos**. El tercero es el número de **empleados en nómina** que están activos. El cuarto es el **valor total del inventario**, que se obtiene sumando el inventario por precio.

## **Requisitos**

**PHP 8.2** o superior, **Composer**, **XAMPP** que incluye MySQL y phpMyAdmin, y **Git**.

## **Instalación**

**1. Clonar el repositorio:**

```bash
git clone https://github.com/espinaljorge747-web/examen2Web_Jorge_Espinal_20231002926.git
cd examen2Web_Jorge_Espinal_20231002926
```

**2. Datos de la base de datos:** `DB_DATABASE=farmacia_examen`, `DB_USERNAME=root` y `DB_PASSWORD` vacío.

**3. Crear la base de datos** `farmacia_examen` en phpMyAdmin.

**4. Ejecutar las migraciones y el seeder:**

```bash
php artisan migrate --seed
```

**5. Iniciar el servidor:**

```bash
php artisan serve
```

Abrir `http://127.0.0.1:8000` en el navegador.

## **Usuario de prueba**

**Correo:** `admin@disfarma.hn`
**Contraseña:** `admin123`
