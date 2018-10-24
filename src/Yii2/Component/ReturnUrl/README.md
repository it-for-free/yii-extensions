
# ReturnUrlResetter

## Цель работы (Purpose)
`ReturnUrlResetter` проведёт сброс ссылки возврата  для `$this->goBack('default/url')` в случае, 
если после переадресации на страницу входа пользователь самостоятельно покинул её, так что
вызов `$this->goBack('default/url')`  будет переводитьна страницу отличную от `default/url` только,
если пользователь не уходил со страницы входа, после переадресации на неё. 

`ReturnUrlResetter` resets `returnUrl` for user in case user leaved login page,
 on which he was redirected), after this call `$this->goBack('default/url')` 
will redirect on another from `default/url` only if user not leaved login page
after last redirect.


## Использование (Usage)

1. [Установите данный пакет (Install package) it-for-free/yii-extensions](README.md)
2. В вашем конфигурационном файле в секции `components `:
```php
'ReturnUrlResetter' => [
	'class' => 'common\components\test\ReturnUrlResetter'
]
```
-- add to your config file into `components` config section.

3. В вашем конфигурационном файле добавьте к корневую секцию `bootstrap` новый компонент:
```php 
'bootstrap' => ['ReturnUrlResetter']
```
-- add `ReturnUrlResetter` component to yii bootstrap list.

4. Готово (ready!)
