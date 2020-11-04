# Laravel + CoreUI: Adminpanel Boilerplate + Docker

It is a demo project for demonstrating what can be generated with new 2019 version of [QuickAdminPanel](https://2019.quickadminpanel.com) tool. This boilerplate was fully __generated__, without adding any custom line of code.

## What's inside

- Adminpanel based on [CoreUI theme](https://coreui.io/): with default one admin user (_admin@admin.com/password_) and two roles
- Users/Roles/permissions management function (based on our own code similar to Spatie Roles-Permissions)
- One demo CRUD for Products management - name/description/price
- Everything that is needed for CRUDs: model+migration+controller+requests+views

From that boilerplate you can manually create more CRUDs, assign permissions etc. Or use our [online generator](https://2019.quickadminpanel.com) for this.

## Screenshots

![Laravel + CoreUI screenshot 01](https://laraveldaily.com/wp-content/uploads/2019/04/Screen-Shot-2019-04-17-at-5.49.46-AM.png)

![Laravel + CoreUI screenshot 02](https://laraveldaily.com/wp-content/uploads/2019/04/Screen-Shot-2019-04-17-at-5.51.26-AM.png)

![Laravel + CoreUI screenshot 03](https://laraveldaily.com/wp-content/uploads/2019/04/Screen-Shot-2019-04-17-at-5.51.10-AM.png)

![Laravel + CoreUI screenshot 04](https://laraveldaily.com/wp-content/uploads/2019/04/Screen-Shot-2019-04-17-at-5.52.03-AM.png)

## How to use

- Clone the repository with __git clone__
- Copy __.env.example__ file to __.env__ and edit database credentials there
- Run __composer install__
- Run __php artisan key:generate__
- Run __php artisan migrate --seed__ (it has some seeded data for your testing)
- That's it: launch the main URL or go to __/login__ and login with default credentials __admin@admin.com__ - __password__

## License

Basically, feel free to use and re-use any way you want.

---

## More from our LaravelDaily Team

- Check out our adminpanel generator [QuickAdminPanel](https://quickadminpanel.com)
- Read our [Blog with Laravel Tutorials](https://laraveldaily.com)
- FREE E-book: [50 Laravel Quick Tips (and counting)](https://laraveldaily.com/free-e-book-40-laravel-quick-tips-and-counting/)
- Subscribe to our [YouTube channel Laravel Business](https://www.youtube.com/channel/UCTuplgOBi6tJIlesIboymGA)
- Enroll in our [Laravel Online Courses](https://laraveldaily.teachable.com/)

## Reference on setting up a docker container

- Check out [this article from DigitalOcean](https://www.digitalocean.com/community/tutorials/how-to-set-up-laravel-nginx-and-mysql-with-docker-compose)

## Enabling the environment for Cloud Run

- Check out [this reference](https://geshan.com.np/blog/2019/10/get-laravel-6-running-on-google-cloud-run-step-by-step-with-ci/)

## Running Artisan Commands & Initializing App

### Composer install packages

```
# Step 1: Install composer components
docker-compose exec app composer install

# Step 2: Update the Laravel Framework
docker-compose exec app composer update laravel/framework
```

### Configuring the cache and generating keys

```
# Generate Key:
docker-compose exec app php artisan key:generate

# Config the Cache:
docker-compose exec app php artisan config:cache
```

### Accessing the MySQL DB

```
docker-compose exec db bash

# Then run: mysql -u root -p
# The root password is in the docker-compose.yaml file in the db section
# Create a database then run the following SQL command:

GRANT ALL ON laravel.* TO 'laraveluser'@'%' IDENTIFIED BY 'your_laravel_db_password';
FLUSH PRIVILEGES;
EXIT;
```

### Running migrations & Seeding

```
docker-compose exec app php artisan migrate
docker-compose exec app php artisan db:seed
```
