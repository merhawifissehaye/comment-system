# comment-system
Instructions
- update `bootstrap/global.php` with your database credentials - `create database ${databasename in global.php}`
- `cd public` and `bower install`
- `composer update` from the root dir to install [CommentSecurityCheck](https://github.com/merhawifissehaye/comment-security-check) plugin which I have uploaded to packagist
- login to your mysql client and run `use $yourselecteddatabase` and source `'seed.sql'` to import table structure and a few data
- Don't use wamp directly - instead run `php -S localhost:8000` and navigate to [http://localhost:8000](http://localhost:8000) on your browser. Alternatively you can use virtual hosts.
