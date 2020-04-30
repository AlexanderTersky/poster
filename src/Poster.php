<?php


namespace Wtolk\Poster;

use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;
use Ramsey\Uuid\Uuid;
use Wtolk\Poster\Connectors\VK;
use Wtolk\Poster\Connectors\OK;
use Wtolk\Poster\Connectors\Telegram;

class Poster
{
    private $vk;
    private $telegram;
    private $ok;

    /**
     * Set VK connector
     * @return VK
     */
    public function vk()
    {
        if (!$this->vk) {
            $this->vk = new VK();
        }
        return $this->vk;
    }

    /**
     * Set Telegram connector
     * @return Telegram
     */
    public function telegram()
    {
        if (!$this->telegram) {
            $this->telegram = new Telegram();
        }
        return $this->telegram;
    }

    /**
     * Set Ok connector
     * @return OK
     */
    public function ok()
    {
        if (!$this->ok) {
            $this->ok = new OK();
        }
        return $this->ok;
    }

    /**
     * Return array of tasks with uuid of tasks pack
     * @return array
     * @throws \Exception
     */
    public function toArray()
    {
        $output = [];
        try {
            $output['uuid'] = Uuid::uuid1()->toString();
        } catch (UnsatisfiedDependencyException $e) {
            $output['uuid'] = uniqid('', true);
        }
       $output['tasks'] = array_merge(
          $this->vk ? $this->vk->getTasks()->getTasks() : [],
          $this->telegram ? $this->telegram->getTasks() : [],
          $this->ok ? $this->ok->getTasks() : []
        );
        return $output;
    }

    /**
     * Return the JSON string of tasks with uuid of tasks pack
     * @return string
     * @throws \Exception
     */
    public function toJson()
    {
        return json_encode($this->toArray());
    }

    /**
     * Save the JSON string of tasks with uuid of pack into file
     * @param string $path
     * @throws \Exception
     */
    public function save($path)
    {
        file_put_contents($path, $this->toJson());
    }
}
