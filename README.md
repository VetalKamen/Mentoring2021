# Mentoring2021
module_4 deploy guide:
1. Execute 'composer install' from the root directory
2. go to '\module_4' and find file 'config.example.php', then change username and password into this file to yours
3. rename config.example.php into -> config.php 
4. uncomment line 26-33 in the bootstrap.php file   
5. execute : 'php -S localhost:8000' from the root directory and enter 'http://localhost:8000/bootstrap.php' into browser
6. after that enter into field $dbname (in config.php) 'mydb';
7. comment line 26-33 in the bootstrap.php file and execute 'http://localhost:8000/module_4/index.php' into browser