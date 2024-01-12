<?php

namespace App\Http\Telegraph;

use DefStudio\Telegraph\Handlers\WebhookHandler;

class WebHookOne  extends WebhookHandler
{
    public function start(){
        $this->chat->html('<strong>старт</strong>')->send();
    }
}
