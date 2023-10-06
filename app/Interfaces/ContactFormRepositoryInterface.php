<?php

namespace App\Interfaces;

interface ContactFormRepositoryInterface 
{
    public function types(): array; 
    public function send($email): bool;           
}