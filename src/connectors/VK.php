<?php


namespace Wtolk\Poster\Connectors;

class VK extends Connector
{
    const CONNECTOR = 'vk';
    const WALLPOST = 'wallpost';

    public function wallpost($post)
    {
        $post = self::prepare($post, [
            'message' => ['required'],
            'execute_at' => ['required', 'datetime']
        ]);

        $this->addTask($post, self::WALLPOST, self::CONNECTOR);
    }
}