<?php
/**
* This file is part of the PhpStorm.
* (c) johann (johann_27@hotmail.fr)
*
* For the full copyright and license information, please view the LICENSE
* file that was distributed with this source code.
**/

namespace Certificationy\Bundle\GithubBundle\Bot\Common\Action;

use Certificationy\Bundle\GithubBundle\Api\Client;
use Symfony\Component\EventDispatcher\Event;

class SwitchCommitStatusAction extends Event
{
    /**
     * @var \Certificationy\Bundle\GithubBundle\Api\Client
     */
    protected $client;

    /**
     * @var Array
     */
    protected $data;

    /**
     * @param Client $client
     */
    public function __construct(Client $client, Array $data)
    {
        $this->client = $client;
        $this->data = $data;
    }

    /**
     * @return \Certificationy\Bundle\GithubBundle\Api\Client
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * @return Array
     */
    public function getData()
    {
        return $this->data;
    }
} 