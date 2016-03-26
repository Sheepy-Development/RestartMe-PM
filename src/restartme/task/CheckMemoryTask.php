<?php

namespace restartme\task;

use pocketmine\scheduler\PluginTask;
use restartme\utils\Utils;
use restartme\RestartMe;

class CheckMemoryTask extends PluginTask{
    /** @var RestartMe */
    private $plugin;
    /**
     * @param RestartMe $plugin
     */
    public function __construct(RestartMe $plugin){
        parent::__construct($plugin);
        $this->plugin = $plugin;
    }
    /**
     * @param int $currentTick
     */
    public function onRun($currentTick){
        if(!$this->plugin->isTimerPaused()){
            if(Utils::isOverloaded($this->plugin->getMemoryLimit())){
                $this->plugin->initiateRestart(RestartMe::OVERLOADED);
            }
        }
    }
}