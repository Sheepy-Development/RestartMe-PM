<?php

namespace restartme\event\plugin;

use pocketmine\event\plugin\PluginEvent;
use restartme\RestartMe;

class SetTimeEvent extends PluginEvent{
    /** @var \pocketmine\event\HandlerList */
    public static $handlerList = null;
    /** @var int */
    private $oldTime;
    /** @var int */
    private $newTime;
    /**
     * @param RestartMe $plugin
     * @param int $oldTime
     * @param int $newTime
     */
    public function __construct(RestartMe $plugin, $oldTime, $newTime){
        parent::__construct($plugin);
        $this->oldTime = (int) $oldTime;
        $this->newTime = (int) $newTime;
    }
    /**
     * @return int
     */
    public function getOldTime(){
        return $this->oldTime;
    }
    /**
     * @return int
     */
    public function getNewTime(){
        return $this->newTime;
    }
}