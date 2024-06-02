# Hotel Booking Management System
This project is a Hotel Booking Management System that allows users to book hotels and rooms, with PayPal integration for payment processing. It includes functionality to create hotels, rooms, and manage bookings. Additionally, it provides an admin panel for system management, complete with caching, custom middleware, guards, and providers.

# Table of Contents
    Hotel Booking Management System
    Table of Contents
        1) About
        2) Features
        3) Getting Started
        4) Prerequisites
        5) Installation
        6) Usage
        7) Contributing
        8) License
        9) Contact

# 1) About
    The Hotel Booking Management System is designed to streamline the hotel booking process for both users and administrators. Users can search for hotels, view available rooms, and make     bookings, while administrators can manage hotels, rooms, bookings, and system settings through the admin panel.

# 2) Features
    1) Hotel Management: Create, update, and delete hotels with ease.
    2) Room Management: Add and manage rooms within hotels, including details such as maximum capacity, size, view, and number of beds.
    3) Booking Management: Allow users to book rooms, manage bookings, and view booking history.
    4) Admin Panel: A comprehensive admin panel for administrators to manage the entire system, including user management, hotel management, and booking management.
    5) PayPal Integration: Seamlessly integrate PayPal for secure and convenient payment processing.
    6) Caching: Utilize caching mechanisms to improve system performance and responsiveness.
    7) Custom Middleware: Implement custom middleware for authentication, authorization, and request processing.
    8) Guards and Providers: Utilize guards and providers for authentication and authorization control.

# 3) Getting Started
    Follow these instructions to set up the Hotel Booking Management System on your local machine.
  
# 4) Prerequisites
    1) PHP (>=8.0)
    2) Composer
    3) MySQL or other compatible database system
    4) PayPal Developer Account (for PayPal integration)

# 5 Installation
    1) Clone the repository to your local machine: git clone https://github.com/yourusername/hotel-booking-system.git
    2) Navigate to the project directory: cd hotel-booking-system
    3) Install dependencies using Composer: composer install
    4) Create a copy of the .env.example file and rename it to .env. Update the database:
       1) DB_CONNECTION=mysql
        2) DB_HOST=127.0.0.1
        3) DB_PORT=3306
        4) DB_DATABASE=your_database_name
        5) DB_USERNAME=your_database_username
        6) DB_PASSWORD=your_database_password
    5 Generate an application key: php artisan key:generate
    6) Run database migrations: php artisan migrate
    7) Start the development server: php artisan serve
    8) Access the application in your web browser at http://localhost:8000.

# 6) Usage
    1) User Interface: Users can browse hotels, view available rooms, make bookings, and manage their bookings through the user interface.
    2) Admin Panel: Administrators can access the admin panel at http://localhost:8000/admin to manage hotels, rooms, bookings, and system settings.

# 7) Contributing
    Contributions to the Hotel Booking Management System are welcome! Please follow the contribution guidelines for more information.

# 8) License
    This project is licensed under the MIT License.

# 9) Contact
