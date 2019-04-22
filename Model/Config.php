<?php

namespace Danielozano\RouterExample\Model;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Store\Model\ScopeInterface;

class Config
{
    /**
     * System paths
     */
    const SYSTEM_CUSTOM_ROUTER_PATH = 'router_example/router/path';
    const SYSTEM_CUSTOM_ROUTER_GIPHY_KEY = 'router_example/router/giphy_key';

    /**
     * @var ScopeConfigInterface
     */
    protected $scopeConfig;

    /**
     * Config constructor.
     * @param ScopeConfigInterface $scopeConfig
     */
    public function __construct(
      ScopeConfigInterface $scopeConfig
    ) {
        $this->scopeConfig = $scopeConfig;
    }

    /**
     * @return string|null
     */
    public function getRouterPath()
    {
        return $this->scopeConfig->getValue(
            self::SYSTEM_CUSTOM_ROUTER_PATH,
            ScopeInterface::SCOPE_STORE
        ) ?? null;
    }

    /**
     * @return string
     */
    public function getGiphyApiKey()
    {
        return $this->scopeConfig->getValue(
            self::SYSTEM_CUSTOM_ROUTER_GIPHY_KEY,
            ScopeInterface::SCOPE_STORE
        ) ?? '';
    }
}
