<?php
function crossSiteScripting($value){
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}
?>