<?php
/**
 * Created by PhpStorm.
 * User: ilhamarrouf
 * Date: 08/12/19
 * Time: 19.37
 */

namespace App\Logs;

class Log
{
    /**
     * Send note to developers with Telegram.
     *
     * @param $note
     */
    public static function telegram($note)
    {
        $token = env('TELEGRAM_BOT_TOKEN');
        $chatId = env('TELEGRAM_CHAT_ID');

        $message = '<b>' . env('APP_NAME') . '</b>' . PHP_EOL
            . '<b>' . env('APP_ENV') . '</b>' . PHP_EOL
            . '<i>Message:</i>' . PHP_EOL
            . '<code>' . $note . '</code>';

        try {
            $ids = explode(',', $chatId);

            foreach ($ids as $id) {
                container()->guzzle->get(
                    'https://api.telegram.org/bot'.$token.'/sendMessage?'
                    .http_build_query([
                        'text' => $message,
                        'chat_id' => $id,
                        'parse_mode' => 'html'
                    ])
                );
            }
        } catch (\Exception $e) {
            logger()->error('TelegramLog bad token/chat_id.');
        }
    }
}