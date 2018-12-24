# IFF Yii-extensions
yii addons: classes, components, patches

Классы, компоненты и иные дополнения для yii (в т.ч. yii2)

## Установка (Install)

Установка с помощью composer:

```
composer require it-for-free/yii-extensions:~v0.0.1
```
(install via composer).

## Содержимое (Contents)

### Components (Компоненты)

* [ReturnUrlResetter](src/Yii2/Component/ReturnUrl/README.md) -- Сброс ссылки возврата $User->getReturnUrl() в случае, 
если после переадресации на страницу входа он самостоятельно покинул её 
(reset returnUrl for user in case user leaved login page,
 on which he was redirected


### Widgets (Виджеты)

* [AmCharts](src/Yii2/Widget/AmCharts/README.md) Chart widget (Виджет для популярной JS-библиотеки построения диаграмм)

### Patches (Дополнения/заплатки)

 Возможно или скорее всего со временем это появится в специализированных пакетах 
(may be this will be realesed later in origianl packages):
* [Bootstrap 4 (LinkPager)](src/Yii2/bootstrap4/README.md)


### Модули

* [Модуль динамического изменения размера изображения](src/Yii2/Module/README.md)