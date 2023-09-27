
Start app:
- download app/ folder
- open terminal
- open folder within terminal
- install and /open docker
- enter in terminal: ./vendor/bin/sail up
- connect app to data base
    - configure .env file ( hostname = [host.docker.internal], DB_DATABASE = [webscraper], DB_password = [password], DB_username=[root])
- open new terminal window, enter: sail artisan migrate
- open browser
- enter url: localhost/webscraper_ah
- you will get redirected to url: localhost/products
- view products
  
![Screenshot 2023-09-27 at 05 05 40](https://github.com/Ted-bot/webscraper/assets/14259953/226ca98f-cd17-4713-b966-9f2429b2d717)
