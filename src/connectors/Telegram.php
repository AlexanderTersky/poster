<?php


namespace Wtolk\Poster\Connectors;

class Telegram extends Connector
{
    const CONNECTOR = 'telegram';
    const CHANNELPOST = 'channelpost';

    public function channelpost($post)
    {
        $post = self::prepare($post, [
            'message' => ['required'],
            'execute_at' => ['required', 'datetime']
        ]);

        $this->addTask($post, self::CHANNELPOST, self::CONNECTOR);
    }
}