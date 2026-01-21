# もぎたて
## 環境構築
### Dockerビルド
1. git clone git@github.com:rh22120301/mogitate-test.git
2. cd mogitate-test
3. docker-compose up -d

### Laravel環境構築
1. cd src
2. composer install
3. cp .env.example .env
4. php artisan key:generate
6. php artisan migrate
7. php artisan db:seed
8. php artisan storage:link

### ER図
<img width="481" height="322" alt="mogitate" src="https://github.com/user-attachments/assets/54e6a304-66b0-4ac7-9fde-f8e565a82721" />

### 使用技術(実行環境)
PHP 8.1.34
mysql  Ver 8.0.44
Laravel Framework 8.83.8

### URL
開発環境：http://localhost/products
phpMyAdmin:：http://localhost:8080/
