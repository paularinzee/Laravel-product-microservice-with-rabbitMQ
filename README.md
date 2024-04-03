# Install and Set Up Laravel Microservice with Docker Compose Part One

Setting up Laravel in the local environment with Docker using the LEMP stack that includes: Nginx, Postgres, PHP, and pgAdmin.



## How to Install and Run the Project

1. ``` git clone git@github.com:paularinzee/Laravel-product-microservice-with-rabbitMQ.git ```
2. ``` docker-compose exec product_app composer install ```
3. Copy ```.env.example``` to ```.env```
4. ``` You can get a free cloud RabbitMQ instance by signing up at: https://www.cloudamqp.com/ ```

5. ``` In your app’s .env file, set parameters using the Rabbbitmq host and AMQP details like this: ```
    RABBITMQ_HOST=seal-01.lmq.cloudamqp.com
    RABBITMQ_PORT=5672
    RABBITMQ_USER=pilojgeg
    RABBITMQ_PASSWORD=dDx1k4TSrmYfbXEPADtGgbMbE14mx8iq
    RABBITMQ_VHOST=pilojgeg

6. ```run: docker-compose build```
7. ```run: docker compose up -d```
8. ```run: docker-compose exec product_app php artisan migrate```

9. ```run: docker-compose exec product_app php artisan queue:work```
10. ``` To create a new product, you would send a POST request to the /products endpoint with the following keys ```
    title
    price
    inventory

    To retrieve a specific product, you would send a GET request to the /products/{id} endpoint, where {id} is the ID of the product.

    To delete a user, you would send a DELETE request to the /products/{id} endpoint.
11. ```visit: https://github.com/paularinzee/Laravel-order-microservice-with-rabbitMQ  ```
