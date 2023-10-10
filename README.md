## Installing RealRashid SweetAlert 2 
- **[put this in the master layout]**
@include('sweetalert::alert')

- **[put this in your app.php]**
'providers' => [
    // ...
    RealRashid\SweetAlert\SweetAlertServiceProvider::class,
];

- **[and run the below command to publish the package assets.]**
php artisan sweetalert:publish



## Spatie Laravel Permission
- **[put this in your app.php]**
'providers' => [
    // ...
    Spatie\Permission\PermissionServiceProvider::class,
];

- **[and run the below command to publish the package assets.]**
php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider"
php artisan optimize:clear
php artisan migrate

- **[put this in your User model]**
use HasRoles;