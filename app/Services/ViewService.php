<?php
/**
 * Created by PhpStorm.
 * User: ilhamarrouf
 * Date: 07/03/19
 * Time: 22.39
 */

namespace App\Services;

class ViewService
{
    /**
     * @return \Slim\Views\Twig
     */
    public function __invoke()
    {
        $view = new \Slim\Views\Twig(
            config('view.template_path'),
            config('view.twig')
        );
        $view->addExtension(new \Slim\Views\TwigExtension(
            container()->get('router'),
            container()->get('request')->getUri()
        ));

        return $view;
    }
}