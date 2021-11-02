<?php

class Plan
{
    private int $id;
    private string $name;
    private int $screens;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setNameBASIC(string $name): void
    {
        if($name === "BASIC" || $name === 0){
            $this->name = "BASIC";
        }
    }

    public function setNamePREMIUM(string $name):void
    {
        if($name === "PREMIUM" || $name === 1){
            $this->name = "PREMIUM";
        }
    }


    public function getScreens(): int
    {
        return $this->screens;
    }

    public function setScreensSD(int $screen):void{
        if($screen === "SD" || $screen === 0){
            $this->screens = "SD";
        }
    }

    public function setScreensHD(int $screen):void{
        if($screen === "HD" || $screen === 1){
            $this->screens = "HD";
        }
    }

    public function setScreens4K(int $screen):void{
        if($screen === "4K" || $screen === 2){
            $this->screens = "4K";
        }
    }
}