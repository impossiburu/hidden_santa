<?php

namespace Hokage\Santa;

use Hokage\Santa\Core\App;
use Hokage\Santa\Core\Middlewares\SanitizePost;
use Hokage\Santa\Core\Middlewares\VerifyCountOfMembers;
use Hokage\Santa\Core\Request;
use Hokage\Santa\Services\Santa;

require_once 'vendor/autoload.php';

$app = new App(
    handler: new Santa(),
    middlewares: [
        new SanitizePost(),
        new VerifyCountOfMembers(),
    ]
);

$members = array_key_exists('members', $_POST) ? $_POST['members'] : '';

$req = new Request($members);
$response = $app->run($req);

include('./src/resources/views/welcome.php');
