<?php

namespace App\Interfaces;

interface NewsletterUserRepositoryInterface 
{
    public function submitted($email): bool;           
}