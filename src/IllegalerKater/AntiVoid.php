<?php

namespace IllegalerKater;

use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\math\Vector3;
use pocketmine\event\entity\EntityDamageEvent;
use pocketmine\event\player\PlayerMoveEvent;

class AntiVoid extends PluginBase implements Listener {
  
  public function onEnable() {
    $this->getServer()->getPluginManager()->registerEvents($this, $this);
  }
  
  public function onMove(PlayerMoveEvent $event) {
    if($event->getPlayer()->getY() < -1) {
      $event->getPlayer()->teleport($event->getPlayer()->getLevel->getSafeSpawn());
    }
  }
  
  public function onDamage(EntityDamageEvent $event) {
    if($event->getEntity() instanceof Player && $event->getEntity()->getY() < 0) {
      $event->setCancelled();
    }
  }
}
