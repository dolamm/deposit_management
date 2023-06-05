echo "Installing Project..."
composer install
npm i
npm run build
php artisan migrate
php artisan db:seed