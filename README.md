# IFF Yii-extensions
yii addons: classes, components, patches

Классы, компоненты и иные дополнения для yii (в т.ч. yii2)

## Установка (Useage)

Установка с помощью composer:

```
composer require it-for-free/yii-extensions:~v0.0.1
```
-- install via composer.

## Boostrap 4


### LinkPager (pagination) 

Usege example:

```php
use ItForFree\YiiExtensions\Yii2\bootstrap4\LinkPager;
?>

<div>
    <?php
    echo LinkPager::widget([
        'pagination' => $Pagination,
    ]);
    ?>
</div> 
```
-- используйте для вывода ссылок пейджинации.