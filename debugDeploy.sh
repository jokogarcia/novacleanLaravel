composer install
npm install
cp .env.debug .env
php artisan key:generate
php artisan migrate:fresh
php artisan db:seed

