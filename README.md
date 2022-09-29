## Steps to get this project running

- Extract `database/database.zip` and Upload `database/database.sql` directly in the database.
- Extract `assets.zip` folder.
- Inside `project` folder run `composer install`.
- Change `.env` values under `project\vendor\markury\src\.env`
- Inside `project` folder run `php artisan migrate --seed`.

## Credentials
### Admin Credentials
- url: https://domain.com/admin/login
- email: admin@gmail.com
- password: 1234

### User Credentials
- url: https://domain.com/user/login
- email: user@gmail.com
- password: 1234
