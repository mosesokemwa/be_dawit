# copy env file if it does not exist
if [ ! -f .env ]; then
    echo "Copying .env.example to .env"
    cp .env.example .env
fi


# Set application key if it is not set
if [ -z "$APP_KEY" ]; then
    echo "APP_KEY is not set"
    php artisan key:generate
fi

# Install composer dependencies
composer install

# run migrations
php artisan migrate

# seed the database
php artisan db:seed

# Run the application
php artisan serve

