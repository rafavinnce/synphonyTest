<?php
namespace Acme\ApiBundle\Document;

use FOS\OAuthServerBundle\Document\Client as BaseClient;

class Client extends BaseClient
{
    protected $id;
}