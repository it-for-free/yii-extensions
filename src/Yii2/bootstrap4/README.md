
# Boostrap 4


## LinkPager (pagination) 


Используйте для вывода ссылок пейджинации в файле представления:

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
-- LinkPager usage example in view file.
