# marine-traffic-api

For the beginning you have to clone the repository

    https://github.com/vaggelisk/marine-traffic-api.git
    
and then add an   `.env` file similar to  `.env.local` 
about the connection with database etc

Then it need to install the extra vendors from the 
 folder of the project with  

    php8.0 <your_folder>/composer.phar install
    
    
and 

    php8.0 bin/console doctrine:database:create
    php8.0 bin/console doctrine:schema:create
    
    php8.0 bin console doctrine:migrations:migrate
    
and lastly to serve the API application

    php8.0 -S 127.0.0.1:8002 public/index.php
    
    
The main files of the API are:

  - Entity/Vessel.php
  
    where is almost the whole API
 
  - Controller/VesselController.php
  
    where is the functionality of stopping tracking after tenth
    tracks with the same ip in one hour
 
  - EventListener/LogRequestEventListener.php
    
    where is the functionality of store the requests 
    in a file. The file is `var/log/<ENV_MODE>/<date>.log`
  
 
 
It works all the functionality you asked and you can check 
it with Postman application.

    POST 127.0.0.1:8002/api/vessels

with Body

```
{
    "mmsi": 247039301,
    "status": 1,
    "stationId": 81,
    "speed": 180,
    "lon": 15.4415,
    "lat": 42.75178,
    "course": 144,
    "heading": 144,
    "rot": "",
    "timestamp": "now",
    "clientIp": ""
}
```
     
or

    GET 127.0.0.1:8002/api/vessels
    
You can also check search and filters 

    GET 127.0.0.1:8002/api/vessels?mmsi=247039300

or lon and lat range filter

    GET 127.0.0.1:8002/api/vessels?lat[gte]=42.75178
    
There are a lot of details that could be achieved 
in case I had more time.


For anything else I'm available to answer to your questions.