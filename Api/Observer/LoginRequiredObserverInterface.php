<?php

/*
 * This file is part of the Magento2 Force Login Module package.
 *
 * (c) bitExpert AG
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace bitExpert\Magento2\CustomerForceLogin\Api\Observer;

use Magento\Framework\Event\ObserverInterface;

/**
 * Interface LoginRequiredObserverInterface
 * @package bitExpert\Magento2\CustomerForceLogin\Api\Observer
 */
interface LoginRequiredObserverInterface extends ObserverInterface
{
    const REGISTRY_CUSTOMER_SESSION_KEY = 'block_customer_session_customer_id';
}
