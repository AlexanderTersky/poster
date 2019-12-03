<?php


namespace Wtolk\Poster\Connectors;

class VK extends Connector
{
    const CONNECTOR = 'vk';
    const WALLPOST = 'wallpost';

    /**
     * Add wallpost task
     * @param array $post
     * @throws \Exception
     */
    public function wallpost($post)
    {
        $post = self::prepare($post, [
            'message' => ['required'],
            'execute_at' => ['required', 'datetime']
        ]);

        $this->addTask($post, self::WALLPOST, self::CONNECTOR);
    }
}