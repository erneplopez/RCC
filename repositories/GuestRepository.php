<?php

interface GuestRepository{
    public function save($guest);
    public function findAll();
}