<?php
/**
 * Created by PhpStorm.
 * User: ilhamarrouf
 * Date: 07/03/19
 * Time: 17.39
 */

use Carbon\Carbon;
use Illuminate\Support\Arr;
use Slim\Http\Response;
use Slim\Http\StatusCode;

if (! function_exists('app')) {
    /**
     * @return \Slim\App
     */
    function app()
    {
        global $app;

        return $app;
    }
}

if (! function_exists('container')) {
    /**
     * @return \Psr\Container\ContainerInterface
     */
    function container()
    {
        return app()->getContainer();
    }
}

if (! function_exists('request')) {
    /**
     * @param string $key
     * @param null $default
     *
     * @return mixed
     */
    function request(string $key = null, $default = null)
    {
        if ($key === null) {
            return container()->get('request');
        }

        return container()->get('request')->getParam($key, $default);
    }
}

if (! function_exists('response')) {
    /**
     * @param int $status
     * @param null $headers
     * @param null $body
     *
     * @return \Slim\Http\Response
     */
    function response($status = StatusCode::HTTP_OK, $headers = null, $body = null)
    {
        return new Response($status, $headers, $body);
    }
}

if (! function_exists('now')) {
    /**
     * @param null $tz
     *
     * @return Carbon
     */
    function now($tz = null)
    {
        return Carbon::now($tz);
    }
}

if (! function_exists('today')) {
    /**
     * @param null $tz
     *
     * @return Carbon
     */
    function today($tz = null)
    {
        return Carbon::today($tz);
    }
}

if (! function_exists('yesterday')) {
    /**
     * @param null $tz
     *
     * @return \Carbon\CarbonInterface
     */
    function yesterday($tz = null)
    {
        return Carbon::yesterday($tz);
    }
}

if (! function_exists('tomorrow')) {

    /**
     * @param null $tz
     *
     * @return \Carbon\CarbonInterface
     */
    function tomorrow($tz = null)
    {
        return Carbon::tomorrow($tz);
    }
}

if (! function_exists('config')) {
    /**
     * @param $key
     * @param null $default
     *
     * @return mixed
     */
    function config($key, $default = null)
    {
        return Arr::get(container()->get('settings'), $key, $default);
    }
}

if (! function_exists('logger')) {
    /**
     * @return mixed
     */
    function logger()
    {
        return container()->get('logger');
    }
}

if (! function_exists('view')) {
    /**
     * @param $template
     * @param array $data
     *
     * @return mixed
     */
    function view($template, $data = [])
    {
        return container()->get('view')->render(
            container()->get('response'), $template, $data
        );
    }
}

if (! function_exists('base_path')) {
    /**
     * @param $path
     *
     * @return string
     */
    function base_path($path = '')
    {
        return BASE_PATH.($path ? DIRECTORY_SEPARATOR.$path : $path);
    }
}

if (! function_exists('storage_path')) {
    /**
     * @param $path
     *
     * @return string
     */
    function storage_path($path = '')
    {
        return base_path('storage' . ($path ? DIRECTORY_SEPARATOR.$path : $path));
    }
}

if (! function_exists('public_path')) {
    /**
     * @param $path
     *
     * @return string
     */
    function public_path($path = '')
    {
        return base_path('public' . ($path ? DIRECTORY_SEPARATOR.$path : $path));
    }
}