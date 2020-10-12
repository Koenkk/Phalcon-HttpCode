# Phalcon-HttpCode
Add exceptions to simplify controller actions within the Phalcon Framework.

## Introduction
The inspiration for this library comes from the Django Framework, where one can throw exceptions to return a certain HTTP response.

```python
def view(request):
    try:
        model = Model.objects.get(pk=1)
    except Model.DoesNotExist:
        raise Http404("Model not found.")

    # Perform action.
    # ...
```

Within the Phalcon Framework, you could accomplish the same:

```php
<?php

class ModelController extends Controller
{
    public function viewAction()
    {
        $model = Model::findByID(1);

        if (!$model) {
            $this->response->setStatusCode(404);

            return "Model not found.";
        }

        // Perform action.
        // ...
    }
}
```

However, this becomes cumbersome when multiple actions perform the same lookup steps and return the same response. You could improve this by refeactoring the lookup to a private method, but you still need to check its return value to determine the next action.

Exceptions will propagate, which will simplify the actions.

```php
<?php

use BasilFX\HttpCode\Http\Response;

class ModelController extends Controller
{
    private function getModel()
    {
        $model = Model::findByID(1);

        if (!$model) {
            throw new Response\Http404();
        }

        return $model;
    }

    public function viewAction()
    {
        $model = $this->getModel();

        // Perform action.
        // ...
    }
}
```

## Requirements
* PHP 7.2 or later.
* Phalcon Framework 4.0 or later.

## Installation
Install this dependency using `composer require basilfx/phalcon-httpcode`.

In your dependency injection setup, register the dispatcher. The dispatcher will re-throw any HttpCode exception. You can catch the `dispatch:beforeHttpCode` event to handle it your own way. You can also extend any status code and provide a `toResponse($response)` method to provide the result.

```php
<?php

use BasilFX\HttpCode\Mvc\Dispatcher;

$di->set("dispatcher", function () use ($di) {
    $dispatcher = new Dispatcher();

    $eventsManager = $di->getShared("eventsManager");
    $dispatcher->setEventsManager($eventsManager);

    return $dispatcher;
}, true);
```

You can still catch other exceptions using the `dispatcher:beforeException` event, but make sure you pass HttpCode exceptions.

```php
<?php

namespace My\Plugins;

use Phalcon\Dispatcher;
use Phalcon\Events\Event;
use Phalcon\Mvc\Dispatcher as MvcDispatcher;
use Phalcon\Mvc\User\Plugin;

use BasilFX\HttpCode\Http\Response;

class ExceptionPlugin extends Plugin
{
    public function beforeException(Event $event, MvcDispatcher $dispatcher, \Exception $exception)
    {
        if ($exception instanceof Response\HttpCode) {
            return;
        }

        // ...
    }
}
```

## License
See the `LICENSE` file (MIT license).
