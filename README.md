# Project Title ClickShare

This project is a web application built using Laravel, Alpine.js, Tailwind CSS, and Vite. It provides a robust and scalable foundation for building modern web applications with a focus on simplicity and performance. The application includes user authentication, role-based access control, and a responsive user interface.

## Prerequisites

Before you begin, ensure you have met the following requirements:
- You have installed [PHP](https://www.php.net/) >= 7.3
- You have installed [Composer](https://getcomposer.org/)
- You have installed [Node.js](https://nodejs.org/) and [npm](https://www.npmjs.com/)
- You have installed [Vite](https://vitejs.dev/)
- You have installed [Tailwind CSS](https://tailwindcss.com/)

## Installation

To install the project, follow these steps:

1. Clone the repository:
    ```sh
    git clone https://github.com/ahmedgalal2001/clickshare.git
    cd clickshare
    ```

2. Install PHP dependencies:
    ```sh
    composer install
    ```

3. Install JavaScript dependencies:
    ```sh
    npm install
    ```

4. Set up environment variables:
    ```sh
    cp .env.example .env
    php artisan key:generate
    ```

5. Run database migrations and seeders:
    ```sh
    php artisan migrate --seed
    ```

6. Build assets using Vite:
    ```sh
    npm run dev
    ```

## Usage

To run the project, follow these steps:

1. Start the development server:
    ```sh
    php artisan serve
    ```

2. Open your browser and navigate to `http://localhost:8000`

## Testing

To run tests, follow these steps:

1. Run the PHPUnit tests:
    ```sh
    php artisan test
    ```

## Additional Information

- This project uses [Alpine.js](https://alpinejs.dev/) for JavaScript interactions.
- This project uses [PostCSS](https://postcss.org/) for CSS processing.

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.
