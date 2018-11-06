<?php

namespace ItForFree\YiiExtensions\Yii2\Component\ReturnUrl;

use yii\base\Component;
use yii\helpers\Url;
use Yii;
use yii\web\Response;

/**
 * Сбросит $User->returnUrl в null, если пользователь ушёл со страницы авторизации
 * на любую другую страницу
 * (даже если он попал туда после редиректа системой контроля доступа).
 * 
 * Reset returnUrl for user (used in goBack()), 
 * if user leaved login page (even if user was redirected to login by AccessControl)
 */
class ReturnUrlResetter extends Component
{
    public function init()
    {
        parent::init();

        $this->updateReturnUrl();
    }
        
    protected function updateReturnUrl()
    {
        if (Yii::$app instanceof \yii\web\Application) {
            
            try { /* не во всех окружениях приложение  конфигурируется верно (например при вызове из консоли)
             * not all enviroments sets app params properly -- so we need checks accessability of yii core params */
                $Request = Yii::$app->request;
                $User = Yii::$app->getUser();
                $url = Url::to();
            } catch (\Exception $e) {
                Yii::warning('Problem in ReturnUrlResetter component: '
                    .  $e->getMessage(). "\n", 'return-url-resetter');
                return;
            }

            if (!$Request->isAjax
                && ($User->getReturnUrl() != Yii::$app->getHomeUrl())
                && !$this->isOnLoginUrl($url, $User->loginUrl)) {
                $Response = Yii::$app->getResponse();
                $Response->on(Response::EVENT_BEFORE_SEND , 
                    [$this, 'handleResponseEvent'],
                    compact('Request', 'User')
                );
            }
        }
    }
    
    /**
     * Проверит, состветствует ли переданный URL странице логина
     * 
     * @param string $currentUrl
     * @param array $loginUrls  список из $User->loginUrl
     * @return boolean
     */
    protected function isOnLoginUrl($currentUrl, $loginUrls)
    {
        return (in_array($currentUrl, $loginUrls) 
                || in_array(ltrim($currentUrl, '/'), $loginUrls));
    }
   
    protected function handleResponseEvent($event)
    {
        $Response = Yii::$app->getResponse();       
        $responseCode = $Response->getStatusCode();
        $User = $event->data['User'];
        
        if (($responseCode == 200)) {
            $User->setReturnUrl(null);
        } 
    }
}
