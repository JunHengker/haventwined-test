<p align="center"><a href="https://haventwined.com" target="_blank"><img src="/public/assets/logo-haven.png" width="400" alt="Haventwined Logo"></a></p>

## About Haventwined

This repository is exclusively for the Haventwined skill assessment test. It contains a fully functional web company profile for Haventwined, including complete CRUD (Create, Read, Update, Delete) operations.

## Key Features

-   **Backend**: Powered by [Laravel](https://laravel.com), providing a robust and scalable framework.
-   **Frontend**: Utilizes [Inertia.js](https://inertiajs.com) and [Vue.js](https://vuejs.org) for a seamless single-page application experience.
-   **Database**: Managed with [MySQL](https://www.mysql.com) for reliable and efficient data storage.

## Installation Guide

Follow these steps to set up the project locally:

1. **Clone the repository**:

    ```sh
    git clone https://github.com/junHengker/haventwined-test.git
    cd haventwined-test
    ```

2. **Install dependencies**:

    ```sh
    composer install
    npm install
    ```

3. **Set up environment variables**:

    ```sh
    cp .env.example .env
    php artisan key:generate
    ```

4. **Configure the `.env` file**:
   Update the database credentials and other necessary configurations in the `.env` file.

5. **Run database migrations**:

    ```sh
    php artisan migrate
    ```

6. **Build the frontend assets**:

    ```sh
    npm run dev
    ```

7. **Serve the application**:

    ```sh
    php artisan serve
    ```

    The application will be accessible at your localhost.

## Learning Resources

To get started with the tech stack, refer to the following resources:

-   [Laravel Documentation](https://laravel.com/docs/12.x)
-   [Inertia.js Documentation](https://inertiajs.com/)
-   [Vue.js Documentation](https://vuejs.org/guide/introduction.html)
-   [MySQL Documentation](https://dev.mysql.com/doc/)

## License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
