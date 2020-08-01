# 20200731-php-guestbook
Exercise: https://github.com/becodeorg/atw-lamarr-3-20/tree/master/2.The-Hills/php/5.php-guestbook

## Permission denied proplem when using file_put_content
- In terminal, check what username and group name that Apache2 is using:
<br>`apachectl -S`
- Result could be:<br>
  ```
  User: name="www-data" id=33 not_used
  Group: name="www-data" id=33 not_used
  ```
- The file to put content in has the name `posts.json`, inside directory `resources`
  - Make sure file `posts.json` has permission `774` (owner and group can do everything, other can only read)
    <br> This step is important because if you don't do that, later when the owner and group are change to `www-data`, you can't read the content of the file anymore.
  - Change owner and group of the directory `resources` and everything in there
  ```
  sudo chown www-data:www-data resources/ -R
  ```
- Now the php server (apache2) can write into `posts.json`.