<?php
class Fan {
    const SLOW = 1;
    const MEDIUM = 2;
    const FAST = 3;

    private $speed;
    private $on;
    private $radius;
    private $color;

    public function __construct() {
        $this->speed = self::SLOW;
        $this->on = false;
        $this->radius = 5;
        $this->color = "blue";
    }

    public function toString() {
        if ($this->on) {
            return "speed: " . $this->speed . ", color: " . $this->color . ", radius: " . $this->radius . ", fan is on";
        } else {
            return "color: " . $this->color . ", radius: " . $this->radius . ", fan is off";
        }
    }

    public function getSpeed() {
        return $this->speed;
    }

    public function setSpeed($speed) {
        $this->speed = $speed;
    }

    public function isOn() {
        return $this->on;
    }

    public function setOn($on) {
        $this->on = $on;
    }

    public function getRadius() {
        return $this->radius;
    }

    public function setRadius($radius) {
        $this->radius = $radius;
    }

    public function getColor() {
        return $this->color;
    }

    public function setColor($color) {
        $this->color = $color;
    }
}
// Tạo đối tượng Fan 1
$fan1 = new Fan();
$fan1->setSpeed(Fan::FAST);
$fan1->setRadius(10);
$fan1->setColor("yellow");
$fan1->setOn(true);

// In thông tin quạt 1
echo $fan1->toString() . "\n";

// Tạo đối tượng Fan 2
$fan2 = new Fan();
$fan2->setSpeed(Fan::MEDIUM);
$fan2->setRadius(5);
$fan2->setColor("blue");
$fan2->setOn(false);

// In thông tin quạt 2
echo $fan2->toString() . "\n";
