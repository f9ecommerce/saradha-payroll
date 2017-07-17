start D:\wamp64\wampmanager.exe
cd D:\wamp64\www\saradha-payroll
D:
PING 1.1.1.1 -n 1 -w 10000 >NUL
start "" http://localhost:8000
php artisan serve
