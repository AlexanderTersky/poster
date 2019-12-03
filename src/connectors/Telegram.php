<?php


namespace Wtolk\Poster\Connectors;

class Telegram extends Connector
{
    const CONNECTOR = 'telegram';
    const CHANNELPOST = 'channelpost';

    /**
     * Add chanelpost task
     * @param array $post
     * @throws \Exception
     */
    public function channelpost($post)
    {
        $post = self::prepare($post, [
            'message' => ['required'],
            'execute_at' => ['required', 'datetime']
        ]);

        $this->addTask($post, self::CHANNELPOST, self::CONNECTOR);
    }
}