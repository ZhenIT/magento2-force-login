<?php

/*
 * This file is part of the Magento2 Force Login Module package.
 *
 * (c) bitExpert AG
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace bitExpert\Magento2\CustomerForceLogin\Controller;

use bitExpert\Magento2\CustomerForceLogin\Api\Controller\LoginCheckInterface;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\UrlInterface;

/**
 * Class LoginCheck
 * @package bitExpert\Magento2\CustomerForceLogin\Controller
 */
class LoginCheck extends Action implements LoginCheckInterface
{
    /**
     * @var UrlInterface
     */
    protected $url;
    /**
     * @var string[]
     */
    protected $ignoreUrls;
    /**
     * @var string
     */
    protected $targetUrl;

    /**
     * Creates a new {@link \bitExpert\Magento2\CustomerForceLogin\Controller\LoginCheck}.
     *
     * @param Context $context
     * @param UrlInterface $url
     * @param string[] $ignoreUrls
     * @param string $targetUrl
     */
    public function __construct(Context $context, UrlInterface $url, array $ignoreUrls, $targetUrl)
    {
        $this->url = $url;
        $this->ignoreUrls = $ignoreUrls;
        $this->targetUrl = $targetUrl;
        parent::__construct($context);
    }

    /**
     * Manages redirect
     */
    public function execute()
    {
        $url = $this->url->getCurrentUrl();
        $path = \parse_url($url, PHP_URL_PATH);

        // check if current url is a match with one of the ignored urls
        foreach ($this->ignoreUrls as $ignoreUrl) {
            if (\preg_match(\sprintf('#%s#i', $ignoreUrl), $path)) {
                return;
            }
        }

        $this->_redirect($this->targetUrl)->sendResponse();
    }
}
