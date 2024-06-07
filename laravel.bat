/// Start commands
php artisan key:generate --ansi


/// controller
php artisan make:controller NameController --resource


/// Components Commands
php artisan make:component Alert
php artisan make:component name
php artisan make:component newsletter --view


/// Database and Models
php artisan make:model Contact -m
php artisan make:model Contact -mc
php artisan make:model --factory --seed -m
make model, seed, factory
php artisan migrate



// Make Requests 
php artisan make:request Name

	
// factory and seeder
php artisan make:factory PostFactoriy -m=Post
php artisan make:seeder AdminSeeder




/// Laravel Lang 
php artisan lang:publish



/// Testing app

php artisan test
php artisan make:test UserTest
php artisan test --testsuite=Feature --stop-on-failure
php artisan test --profile 



/// Production Commands and File Commands
php artisan config:clear
php artisan storage:link
php artisan vendor:publish --tag=laravel-errors