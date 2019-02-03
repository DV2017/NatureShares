<h1>Nature Shares</h1>
<h3>Laravel 5.7 API WITH AUTHENTICATION</h3>
<p>This application makes use of simple authentication and authorization without Passport. The application can be tested with Postman.</p>

<h3>Steps to making this application work:</h3>
<ul>
    <li>Create database 'natureshares' in mysql with phpmyadmin</li>
    <li>In the command line: composer install</li>
    <li>php artisan migrate</li>
    <li>php artisan db:seed</li>
    <li>php artisan serve: at 127.0.0.1:8000</li>
</ul>

<h3>Testing in Postman</h3>
<ul>
    <li>POST: 127.0.0.1:8000/api/register</li>
    Headers:- Content-Type: application/json<br>
    Body (choose option 'form-data'):- <br>
        name: John Doe <br>
        email: j.doe@example.com, <br>
        password: password, <br>
        password_confirmation: password <br>
    <li>POST: 127.0.0.1:8000/api/login </li>
    Headers:- Content-Type: application/json<br>
    Body (choose option 'form-data'):- <br>
        email: j.doe@example.com, <br>
        password: password, <br>
    Note: The JSON response gives an api_token. Keep this at hand. This is needed to logout.
    <li>Retrieve data from the database using GET: 127.0.0.1:8000/api/lectures </li>
    Headers:- Authorization: Bearer api_token. (Insert the login api_token here.)<br>
    This will list all the data in the database table 'lectures'.<br>
    If there is an exception, a simple user friendly error message is returned as response.
    <li>Finally logout using POST: 127.0.0.1:8000/api/logout</li>
    Headers:- Authorization: Bearer api_token. (Insert the login api_token here.)
</ul>

NOTE: check the routes/api.php to get the table endpoints.

<p>That's it.</p>




