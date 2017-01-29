<?php

namespace Website\Middleware;

use Phalcon\Mvc\Micro;
use Phalcon\Mvc\Micro\MiddlewareInterface;
use Phalcon\Mvc\User\Plugin;

/**
 * Class NotFoundMiddleware
 *
 * @package Website\Middleware
 */
class NotFoundMiddleware extends Plugin implements MiddlewareInterface
{
    /**
     * If the endpoint has not been found, redirect to the 404
     *
     * @return bool
     */
    public function beforeNotFound()
    {
        $this->response->setStatusCode(404, 'Not Found');
        echo $this->viewSimple->render(
            'notfound',
            [
                'language' => 'en_US',
                'cdnUrl'   => '',
                'docsRoot' => '',
                'languages_available' => '',
            ]
        );

        return false;
    }

    /**
     * Call me
     *
     * @param Micro $application
     *
     * @return bool
     */
    public function call(Micro $application)
    {
        return true;
    }
}
