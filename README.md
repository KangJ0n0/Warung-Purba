<h1 align="center">

Warung Purba

 </h1>


## About

Warung Purba is a web application designed to showcase local eateries ("warung") and their culinary offerings in Purbalingga, Indonesia. This platform allows users to explore various warungs, discover popular dishes, and get detailed information about each establishment, fostering a deeper appreciation for the local food culture.

## Features

-   Explore various warungs in Purbalingga
-   Discover popular local dishes
-   Get detailed information about each establishment

## Installation

To get a local copy up and running, follow these simple steps:

### Prerequisites

-   PHP 7.3 or higher
-   Composer
-   Node.js & npm

### Clone the repository

```sh
git clone https://github.com/KangJ0n0/warung-purba.git
cd warung-purba
```

### Install dependencies

```sh
composer install
npm install
```

### Setup environment

Copy the `.env.example` file to `.env` and configure your environment variables accordingly.

```sh
cp .env.example .env
php artisan key:generate
```

### Run migrations

```sh
php artisan migrate
```

### Serve the application

```sh
php artisan serve
```

Now you can access the application at `http://localhost:8000`.

## Usage

Navigate through the web app to explore different warungs, view detailed information about each establishment, and discover the popular dishes they offer.

## Contributing

Contributions are what make the open-source community such an amazing place to learn, inspire, and create. Any contributions you make are **greatly appreciated**.

1. Fork the Project
2. Create your Feature Branch (`git checkout -b feature/AmazingFeature`)
3. Commit your Changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the Branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

## License

Distributed under the MIT License. See `LICENSE` for more information.

## Contact

Afiftha Ravi - [afiftharavi@gmail.com](https://afif-ravi.vercel.app/)

Project Link: [https://github.com/KangJ0no/warung-purba](https://github.com/KangJ0n0/Warung-Purba)

## Acknowledgements

-   Local warungs and eateries in Purbalingga for their cooperation and support.
