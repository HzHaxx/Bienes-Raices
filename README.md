# 🏡 **Bienes Raíces - CMS Inmobiliario**

Este proyecto es un sitio web completo para inmobiliarias, desarrollado como parte del curso de Udemy ["Desarrollo Web Completo con HTML5, CSS3, JS AJAX PHP y MySQL"](https://www.udemy.com/) impartido por **Juan Pablo De La Torre Valdez**. Ofrece una solución integral para la gestión de propiedades y contenido, con una sección pública y una privada para administración. 💻🔧

## 🚀 **Características del Proyecto**

- **🌐 Sección Pública**: Interfaz dinámica y adaptable para cualquier dispositivo, incluyendo **Dark Mode** para una mejor experiencia visual en ambientes de baja luz.
- **🔒 Sección Administrativa**: Sistema completo para gestionar propiedades, vendedores, blogs, y testimoniales con funcionalidades CRUD (Crear, Leer, Actualizar y Eliminar).
- **🔑 Sistema de Login**: Acceso privado para la administración segura del sitio.
- **📧 Formulario de Contacto Dinámico**: Fácil interacción para que los clientes puedan comunicarse.

## 🛠️ **Tecnologías Utilizadas**

- **Backend**: 
  - 🐘 PHP 8 (POO y MVC)
  - 🗄️ MySQL (Normalización, Relaciones, Joins)
  - 🎼 Composer y librerías adicionales
  
- **Frontend**:
  - 🎨 HTML5
  - 💅 SASS
  - 🚀 JavaScript Vanilla
  - 🔧 Gulp

- **Herramientas de Desarrollo y Testing**:
  - 🖥️ TablePlus
  - 📬 PostMan

## 📚 **Arquitectura del Proyecto**

El proyecto está basado en el patrón **MVC (Modelo-Vista-Controlador)** para una separación clara de responsabilidades y mejor mantenimiento del código.

- **Modelo**: Gestión de la base de datos y operaciones CRUD.
- **Vista**: Representación visual de los datos para los usuarios y administradores.
- **Controlador**: Lógica de la aplicación que interactúa con el modelo y actualiza la vista.

## ✨ **Características Adicionales**

- **🌗 Dark Mode**: Mejora la experiencia de usuario en entornos con poca luz.
- **🔄 Totalmente Responsive**: Adaptable a cualquier tipo de dispositivo (móvil, tablet, desktop).
- **🔧 Fácil de Mantener**: Código limpio y organizado con comentarios claros.

## 📦 **Requisitos del Sistema**

- **Servidor PHP 8+**
- **MySQL 5.7+**
- **Composer** (Para manejar dependencias)
- **Node.js** (Para Gulp y otras herramientas de frontend)

## 📝 **Instalación y Configuración**

1. Clona el repositorio:
    ```bash
    git clone https://github.com/HzHaxx/Bienes-Raices
    ```

2. Instala las dependencias con Npm y Composer:
    ```bash
    npm install
    composer install
    ```

3. Configura la base de datos:
    - Importa el archivo `.sql` en MySQL.
    - Configura las credenciales de tu base de datos en el archivo `config.php`.

4. Ejecuta Gulp para compilar el CSS, JS y las imágenes:
    ```bash
    gulp run dev
    ```

✨ **¡Gracias por visitar el proyecto!** Si te ha sido útil, no olvides darle una estrella ⭐ en GitHub.
