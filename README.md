## Install using docker

- `docker-compose build`
- `docker-compose up`

#### .env
- `cp .env.example .env` or `copy .env.example .env`

#### install

- `docker-compose exec dummy_rest_php composer install` 
- `docker-compose exec dummy_rest_php php artisan storage:link`
- `docker-compose exec dummy_rest_php php artisan key:generate`
- `docker-compose exec dummy_rest_php php artisan vendor:publish --provider="Tymon\JWTAuth\Providers\LaravelServiceProvider"`
- `docker-compose exec dummy_rest_php php artisan jwt:secret`
- `docker-compose exec dummy_rest_php php artisan migrate --seed`
- `docker-compose exec dummy_rest_php npm install`
- `docker-compose exec dummy_rest_php npm run dev`
- `open http://localhost:8045`

### Dummy API endpoints

```
/api/auth/login?email={email}&password={password} - login route, POST arguments: email(admin@test.com), password(admin123)

/api/auth/logout - Logout route, POST, no arguments required. 

/api/auth/refresh - refresh route, POST, no arguments required. 

/api/auth/user-profile  - basic user info, GET. 

/api/products?page={page} - list of products, GET, argument - 'page' - pagination, 6 products per page. 

/api/products/{id} - single product route, GET, argument - product id.
```
### Dummy API product filter arguments at /api/products
price_from, price_to - search by price range; from, to - search by created_at range.

1. page - ```/api/products?page={integer}``` - pagination. 6 rows per view, default - 1
2. title - ```/api/products?title={string}``` - search products by name
3. price_from ```/api/products?price_from={integer}``` - displaying products with prices above value
4. price_to ```/api/products?price_to={integer}``` - displaying products with prices below value
5. from ```/api/products?from={date, in format Y-m-d}``` - displaying products created after value
6. to ```/api/products?to={date, in format Y-m-d}``` - displaying products created before value

You can use all filters in one time. examples:
- Filter in date range, from 1 Dec, 2020 to 29 Dec 2020:
```http://localhost:8045/api/products?from=2020-12-01&to=2020-12-29```
- Filter in date range, from 1 Dec, 2020 to 29 Dec 2020 and with price from 10 000 to 15 000:
```http://localhost:8045/api/products?from=2020-12-01&to=2020-12-29&price_from=10000&price_to=15000```
- Find in that date range and price range, but with title "ducimus":
```http://localhost:8045/api/products?from=2020-12-01&to=2020-12-29&price_from=10000&price_to=15000&title=ducimus```


