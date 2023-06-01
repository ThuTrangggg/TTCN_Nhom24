<?php
function checkPrivilege() {
    $uri = $_SERVER['REQUEST_URI'];
    $privileges = array(
        "duan_codesua\.php$",
        "duan_them\.php$",
        "duan_sua\.php\?id=\d+$",
        "duan_xoa\.php\?id=\d+$"
    );
    $privileges = implode("|", $privileges);
    preg_match('/' . $privileges . '/', $uri, $matches);
    return !empty($matches);
}
?>