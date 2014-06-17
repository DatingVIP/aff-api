<?php
/**
 * Affiliates API helper
 *
 * @package DatingVIP
 * @subpackage api
 * @category lib
 * @author Boris Momčilović <boris@firstbeatmedia.com>
 * @copyright All rights reserved
 * @version 1.0
 */

namespace DatingVIP\API;

use DatingVIP\API\Client;
use DatingVIP\API\Command;
use DatingVIP\API\Response;

class Affiliates
{
	const CMD_SEND_CLICK = 'affiliates.sendclick';

/**
 * Instance of DatingVIP\API\Client
 *
 * @var Client
 * @access private
 */
    private $api;

/**
 * Default CoReg API constructor
 *
 * @param Client $api
 * @access public
 */
    public function __construct(Client $api)
    {
        $this->api = $api;
    }

/**
 * Send non-unique click event
 * (you are responsible of maintaining info if click is unique or not)
 *
 * Mandatory params:
 * - aff_id
 * - aff_pg
 * - _domain
 * Domain name you're targeting, eg: www.domain.com - domain name only, don't include protocol
 * There's no mistake - _domain is prefixed with underscore.
 *
 * Optional params:
 * - aff_cp
 * - aff_tr
 * - aff_kw
 * - aff_src
 * - aff_adg
 * - HTTP_REFERER
 *
 * @param array $data
 * @access public
 * @return Response
 */
	public function sendClick(array $data)
	{
		$data['_unique'] = 0;
        $command = new Command (self::CMD_SEND_CLICK, $data);
        return $this->api->execute ($command);
	}

/**
 * Send unique click event
 * (you are responsible of maintaining info if click is unique or not)
 *
 * Mandatory params:
 * - aff_id
 * - aff_pg
 * - _domain
 * Domain name you're targeting, eg: www.domain.com - domain name only, don't include protocol
 * There's no mistake - _domain is prefixed with underscore.
 *
 * Optional params:
 * - aff_cp
 * - aff_tr
 * - aff_kw
 * - aff_src
 * - aff_adg
 * - HTTP_REFERER
 *
 * @param array $data
 * @access public
 * @return Response
 */
	public function sendClickUnique(array $data)
	{
		$data['_unique'] = 1;
        $command = new Command (self::CMD_SEND_CLICK, $data);
        return $this->api->execute ($command);
	}

}
