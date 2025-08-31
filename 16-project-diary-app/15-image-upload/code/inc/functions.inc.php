<?php

// Sanitize user-provided input
function e($value)
{
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}
