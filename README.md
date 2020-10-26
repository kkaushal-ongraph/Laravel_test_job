# Development Environment
    ```
        Ubuntu 20.04.1 LTS
    ```

# Requirement:
1. PHP version  7.4.11(Letest)  or grater
    ```
        php -v      //terminal use
    ```
2. Server Detail
    Server version: Apache/2.4.41 (Ubuntu)
    Server built:   2020-08-12T19:46:17
    
    -check your detail by
    ```
        /usr/sbin/apache2 -v    //terminal use
    ```
3. Mysql Version (mysql  Ver 8.0.21) or grater
    ```
        mysql -V        //terminal use
    ```


# Setup:
1. Clone Repo from Github.
2. Go to project folder and install dependency, Run:
    ```
        composer install        //terminal use
    ```
3. Create Database(Name as your choice).
4. Add Database Information to project .env file
    ```
        Path : project folder -> .env

        DB_DATABASE=job_blog    //your database name
        DB_USERNAME=root        //your mysql username
        DB_PASSWORD=root        //your mysql password(Leave blank if not)
    ```
5. Assign permission to storage folder.
    ```
        sudo chmod -R 777 storage/      //terminal use
    ```
6. Run migration
    ```
        sudo php artisan migrate        //terminal use
    ```
7. For testing add fake data to table, this will create 10 record for testing
    ```
        php artisan db:seed --class=ItemSeeder      //terminal use
    ```
8. Access your page by
    ```
        http://localhost/projectname/public/
    ```
