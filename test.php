<?php
$arr = [
    'web',
    'hahah',
    1,
    2,
    3
];

usort($arr, function($a, $b) {
   return is_numeric($a) && is_numeric($b);
});
echo '<pre>';
echo var_dump($arr);
echo '</pre>';
