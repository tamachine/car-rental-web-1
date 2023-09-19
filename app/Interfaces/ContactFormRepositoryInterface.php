<?php

namespace App\Interfaces;

interface ContactFormRepositoryInterface 
{
    public function send($email): bool;           
}