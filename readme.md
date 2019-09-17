# takayyz

## Requirements
| PHP         | Laravel     | PostgreSQL  | Node        | npm         | Vue.js      | Vue Router  | Vuex        |
|:-----------:|:-----------:|:-----------:|:-----------:|:-----------:|:-----------:|:-----------:|:-----------:|
| 7.2.22      | 5.8.35      | 10.10       | 10.15.0     | 6.4.1       | 2.5.21      | 3.0.2       | 3.0.1       |

## Installation
```
1. $git clone <リポジトリURL>
2. $composer install
3. $npm install
4. $cp .env.example .env
5. $php artisan key:generate
6. .env修正 //DB周り, (APP_NAME)
7. $php artisan migrate
8. $php artisan db:seed
```

If you get the following error after running **php artisan db:seed**:
```
ReflectionException: Class ClassNameSeeder does not exist
```

try to run below:
```
composer dump-autoload
```

Then run **php artisan db:seed** again.

---

## PostgreSQL
### postgre basic command
```
# DB一覧
$ \l

# DB選択
$ \c DB名

# TABLE一覧
$ \dt;

# TABLE構造表示
$ \d TABLE名

# psql終了
$ \q

# DB作成
$ create database DB名
```
【参照】
- [PostgreSQLの基本的なコマンド](https://qiita.com/H-A-L/items/fe8cb0e0ee0041ff3ceb)
---
