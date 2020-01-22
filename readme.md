# Laravel REST service
Implementation of assigned task for PHP Back End Engineer position, involving usage of most popular website development frameworks and techniques.

### Challenge description

Create a service, which returns product recommendations depending on current weather, with such requirements:
- Product data should be stored in database.
- Service should be implemented using REST API principles, handling requests and responses using JSON format.
- Integrate third party API to get the weather information in any Lithuanian city.

### Used technology
For implementing the task, technology stack is used that contains:
- PHP 7.3
- MySQL
- Laravel framework

### Setup guide
Download all the files from repository and place them into web server root folder. Next, create database inside MySQL environment for website and configure MySQL connection settings inside project .env file. Install composer and run these commands in command line, opened inside project location:
``` bash
# Install Dependencies
composer install

# Run Migrations
php artisan migrate

# Import Information
php artisan db:seed

# Test the project
php artisan serve
```

### Usage examples
REST request is made to recommended products endpoint with specified city as parameter, where such service functionality examples are shown below:

GET /api/products/recommended/:city

| Request| Response  |
| ------ | --------- |
| <pre> Parameters: <br> :city - Vilnius </pre>|<pre>{<br>  "city": "Vilnius",<br>  "current_weather": "clear",<br>  "recommended_products": [<br>    {<br>      "sku": "57e4ee",<br>      "name": "CadetBlue Shorts",<br>      "price": 74.57<br>    },<br>    {<br>      "sku": "fcb424",<br>      "name": "LightSteelBlue Hat",<br>      "price": 91.12<br>    },<br>    {<br>      "sku": "4e10bb",<br>      "name": "Wheat Umbrella",<br>      "price": 12.33<br>    },<br>    {<br>      "sku": "de4439",<br>      "name": "FloralWhite Sweatshirt",<br>      "price": 28.76<br>    }<br>  ]<br>}</pre>|
| <pre> Parameters: <br> :city - Kaunas</pre>|<pre>{<br>  "city": "kaunas",<br>  "current_weather": "clear",<br>  "recommended_products": [<br>    {<br>      "sku": "57e4ee",<br>      "name": "CadetBlue Shorts",<br>      "price": 74.57<br>    },<br>    {<br>      "sku": "fcb424",<br>      "name": "LightSteelBlue Hat",<br>      "price": 91.12<br>    },<br>    {<br>      "sku": "4e10bb",<br>      "name": "Wheat Umbrella",<br>      "price": 12.33<br>    },<br>    {<br>      "sku": "de4439",<br>      "name": "FloralWhite Sweatshirt",<br>      "price": 28.76<br>    }<br>  ]<br>}</pre>|
| <pre> Parameters: <br> :city - miestas</pre>|<pre>{<br>  "error": {<br>    "code": 404,<br>    "message": "Not Found"<br>  }<br>}</pre>|