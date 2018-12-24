# Yii Image resizer

`Обрезка картинки на лету` при обращении из браузера.

Так как идет работа с изображением ниже приведен пример как осуществляется работа с данным модулем.

## Установка 

[Установите пакет it-for-free/yii-extensions с помощью composer (Install package it-for-free/yii-extensions via composer)](/README.md)

## Использование (Usage)

Пример использования во вью:

`<img src='/image?path=' . $model->img . '&format=100x100'>`

В примере выше видно что применён метод запроса `GET` с двумя параметрами

1. Параметр это путь к вашему изображению, обычно это путь к файлу хранимый в БД 
в нашем случае он выглядет как `$model->img` и выглядит так `photos/someimage.jpg`, 
остальной путь берётся и алиаса который определён в конфиге данного модуля как его 
определить будет показано ниже.

2. Параметр это формат обрезки картинки, у нас это выглядет так `&format=100x100`, 
форматов может быть несколько, посмотреть подробную документацию можно посмотреть 
[здесь](https://github.com/it-for-free/rusphp/blob/master/src/File/Image/README.md).


## Использование обёртки над yii/helpers/Html::img()

Общий вид функции `imgrsc()`:


```php
echo imgrsc($fullImgPath, $format, $options);
```


Функция `imgrsc()` принимает 2 обязательных параметра и один необязательный:
1. `$fullImgPath` путь к изображению.
2. `$format` требуемый формат изображения, смотри подробнее по
[ссылка](https://github.com/it-for-free/rusphp/blob/master/src/File/Image/README.md).
3. `$options` это родной необязательный параметр `yii/helpers/Html::img()`.

Пример реального вызова:

```php
echo imgrsc($model->img, '100x100');
```


## Конфигурирование модуля

Перед тем как конфигурировать модуль нужно задать алиас здесь он задан как `@uploadPath`

Задать алиас можно в файле `common/config/bootstrap.php`

пример:

```php
Yii::setAlias('@uploadPath', dirname(dirname(__DIR__)) . '/frontend/web/uploads');
```
       
Далее,  конфигурационном файле (например:`common/config/main.php`)
вашего приложения в секции `modules` пишем следующее:

```php
use ItForFree\YiiExtensions\Yii2\Module\Image\Image;
....
....

'modules' => [
    'image' => [
        'class' => Image::class,
        'baseUploadPath' => '@uploadPath'
    ], 
],                                                                                 
```
                                                                            
из конфигурации выше мы видим алиас о котором говорилось раньше `baseUploadPath`
это своиство модуля которое нужно для работы, а вот алиас `@uploadPath` 
должен быть путь по которому вы сохраняете изображения выше видно как он определен и куда ссылается.