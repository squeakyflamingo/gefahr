@REM BE CAREFULL. You need to have SASS installed locally.
@REM  Alos you shouzld be versed in Javascript, SCSS and PHP to change something in this project.

start /b /d Server php -S localhost:8000
start /b /d Server\styling sass --watch src/.:.