
Folder Permission and get path:
chmod 777 -R light_cafe
cd light_cafe
sudo su

mysqldump -u root -p lightcafe> /home/rofiqul/dumps/lightcafe.sql;
php artisan migrate:fresh --seed
sudo npm run watch


php artisan migrate --path=/database/migrations/2021_10_03_062356_create_f_a_q_s_table.php

git checkout -b local_feb_15 origin/intranet


php artisan migrate:fresh --seed
sudo composer dump-autoload
php artisan make:request AddUserDeliveryAddressRequest
php artisan db:seed --class=UserDeliveryAddressSeeder