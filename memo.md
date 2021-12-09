# TODO
- admin panel
- 


php artisan websockets:serve [--port=3030]

php artisan websockets:serve --host=127.0.0.1 // 제한 기능, 기본은 0.0.0.0 로 제한 없음.

supervisor ?
https://beyondco.de/docs/laravel-websockets/basic-usage/starting


config/websockets.php
https://php.net/manual/en/context.ssl.php 


# Scout
## 기존 레코드 등록
php artisan scout:import "App\Models\Post"
## 기존 레코드 삭제
php artisan scout:flush "App\Models\Post"

searchable() 쿼리 결과 묶음으로 레코딩에 추가
