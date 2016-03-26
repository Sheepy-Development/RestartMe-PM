<?php

namespace restartme\task;

use pocketmine\scheduler\PluginTask;
use restartme\RestartMe;

class RestartServerTask extends PluginTask{
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
            $this->plugin->subtractTime(1);
            if($this->plugin->getTime() <= $this->plugin->getConfig()->get("startCountdown")){
                $this->plugin->broadcastTime($this->plugin->getConfig()->get("countdownMessage"), $this->plugin->getConfig()->get("displayType"));
            }
            if($this->plugin->getTime() < 1){
                $this->plugin->initiateRestart(RestartMe::NORMAL);
            }
        }
    }
}