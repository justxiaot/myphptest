<?php
$str = 'OezXcEiiBSKSxW0eoylIeEsqlk-DO2W89Kb42iwIM1P8oAd13sjH3Nmy2rsHVUqb0FYH7lVpEKdR5EBEiabqTu4ap7r_vwk03yV4Q80xmWxlAJZpFZu-qy5-hKhFVquEHxoQjbTqft97umo571xUgQ';
$pattern = '/^[\w-]+$/';
$result = preg_match($pattern,$str);
var_dump($result);