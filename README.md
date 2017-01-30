# comment-system
Instructions
- update bootstrap/global.php with your database credentials - create database
- `cd public` and `bower install`
- `composer update` to install [CommentSecurityCheck](https://github.com/merhawifissehaye/comment-security-check) plugin which I have uploaded to packagist
- `use $yourselecteddatabase` and source `'seed.sql'` to import table structure and a few data
- Don't use wamp directly - instead run `php -S localhost:8000` and navigate to [http://localhost:8000](http://localhost:8000) on your browser
