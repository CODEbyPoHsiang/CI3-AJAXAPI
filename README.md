# CodeIgniter3-CRUD-AJAX

1.下載專案到 xampp/htdocs/ 目錄下</br>

```
git clone https://github.com/CODEbyPoHsiang/CodeIgniter3-CRUD-AJAX
```
2.到資料夾底下 `CodeIgniter3-CRUD-AJAX`</br>

3.安裝 composer</br>
```
composer install
```
4.codeigniter 歡迎畫面
```
http://localhost/CodeIgniter3-CRUD-AJAX/   \\(本機網址/專案資料夾名稱/)
```
5.CRUD 網頁
```
http://localhost/CodeIgniter3-CRUD-AJAX/Member   \\(本機網址/專案資料夾名稱/crud控制器名稱)
```
---
Codiginter API 說明
---
利用REST_Controller 套件協助製作api

顯示全部資料 API (GET)
```
http://localhost/ci3crud/api
```
查看單一資料 API (GET)
```
http://localhost/ci3crud/api/{id}
```
新增一筆資料 API (POST)
```
http://localhost/ci3crud/api/new
```
編輯一筆資料 API (PUT)
```
http://localhost/ci3crud/api/edit/{id}
```
刪除一筆資料 API (DELETE)
```
http://localhost/ci3crud/api/delete/{id}
```
