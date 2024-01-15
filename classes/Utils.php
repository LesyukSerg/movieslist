<?php

    class Utils
    {
        public static function htmlEscape($data): string
        {
            return htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
        }
    }
