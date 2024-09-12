 # LyriXChange

LyriXChange is a web-based platform designed to share and manage lyrics. Users can upload, edit, and rate lyrics, providing an interactive and user-friendly environment for music lovers and creators. 


## Technologies used

- **Frontend**:
  - ![HTML5](https://img.shields.io/badge/-HTML5-E34F26?style=flat&logo=html5&logoColor=fff)
  - ![CSS3](https://img.shields.io/badge/-CSS3-1572B6?style=flat&logo=css3)
  - ![JavaScript](https://img.shields.io/badge/-JavaScript-F7DF1E?style=flat&logo=javascript&logoColor=000)
  - ![Bootstrap](https://img.shields.io/badge/-Bootstrap-563D7C?style=flat&logo=bootstrap&logoColor=fff)

- **Backend**:
  - ![PHP](https://img.shields.io/badge/-PHP-777BB4?style=flat&logo=php&logoColor=fff)

- **Base de Datos**:
  - ![MySQL](https://img.shields.io/badge/-MySQL-4479A1?style=flat&logo=mysql&logoColor=fff)

## Features

- **User Registration and Login**: Secure user authentication with password management.
- **Song Management**: Users can publish, edit, search, and delete songs.
- **Rating System**: Users can rate songs.
- **Admin Panel**: Manage users and song content from a dedicated admin panel.
- **Responsive Design**: The interface is optimized for both desktop and mobile devices.
- **Database Support**: Uses MySQL for data storage.

## Project Structure

- **index.php**: Main page of the platform.
- **login.php**: Handles user login functionality.
- **registro.php**: User registration functionality.
- **publicarCancion.php**: Allows users to publish new songs.
- **gestionarCanciones.php**: Admin page to manage songs.
- **gestionarUsuarios.php**: Admin page to manage users.
- **css/**: Contains all the stylesheets.
- **js/**: Contains JavaScript files for frontend behavior.
- **includes/**: Contains reusable PHP components.
- **mysql/**: Contains database-related files.
- **imagenes/**: Stores images used in the project.

## Installation

1. Clone the repository:
   ```bash
   git clone https://github.com/your-username/LyriXChange.git

2. Navigate to the project directory:
   ```bash
   cd LyriXChange
   
3. Install the necessary dependencies:

Ensure you have a local server (e.g., XAMPP, WAMP, or MAMP) running with PHP and MySQL support.
Import the SQL file from the mysql/ directory to your MySQL server to set up the database.
Update database credentials in the configuration files (includes/config.php).

4. Start your local server and open the application in your browser.
