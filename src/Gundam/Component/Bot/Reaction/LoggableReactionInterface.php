<?php
 /**
 * This file is part of the Certificationy web platform.
 * (c) Johann Saunier (johann_27@hotmail.fr)
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 **/

namespace Gundam\Component\Bot\Reaction;

use Psr\Log\LoggerInterface;

interface LoggableReactionInterface
{
    /**
     * @param LoggerInterface $logger
     *
     * @return mixed
     */
    public function setLogger(LoggerInterface $logger = null);
}
