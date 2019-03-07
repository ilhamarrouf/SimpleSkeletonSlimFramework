<?php
/**
 * Created by PhpStorm.
 * User: ilhamarrouf
 * Date: 07/03/19
 * Time: 22.50
 */

namespace App\Services;

use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Monolog\Processor\UidProcessor;

class LoggerService
{
    /**
     * @return Logger
     */
    public function __invoke()
    {
        $logger = new Logger(config('logger.name'));
        $logger->pushProcessor(new UidProcessor());

        try {
            $logger->pushHandler(
                new StreamHandler(config('logger.path'),
                    Logger::DEBUG)
            );
        } catch (\Exception $exception) {

        }

        return $logger;
    }
}