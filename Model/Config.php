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

    public function getRouterPath()
    {
        return $this->scopeConfig->getValue(self::SYSTEM_CUSTOM_ROUTER_PATH, ScopeInterface::SCOPE_STORE);
    }
}
