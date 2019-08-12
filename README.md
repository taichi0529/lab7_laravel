# lab7_laravel

## Usage

### コンテナの立ち上げ

```bash
git clone git@github.com:taichi0529/lab7_laravel.git
cd lab7_laravel/docker
docker-compose up -d
```

### 初めてLaravelをインストールする場合

```bash
docker-compose exec php-apache composer create-project --prefer-dist laravel/laravel . "5.5.*"
``````

### 既にLaravelはインストール済みで必要なモジュールだけをインストールしたい場合

```bash
docker-compose exec php-apache composer install
cd ../src
cp .env.example .env
cd ../docker
docker-compose exec php-apache php artisan key:generate
```

### URL

http://localhost:8080/


## 画面遷移図

https://xd.adobe.com/view/f9358459-5f3e-4b15-5f09-2550a975abbc-8f04

これをつくるという体でAPIを作る練習をします。

## API設計図

https://app.swaggerhub.com/apis/taichi0529/laravel_class/1.0.0#/
