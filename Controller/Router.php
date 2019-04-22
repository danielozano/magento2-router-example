<?php

namespace Danielozano\RouterExample\Controller;

use Danielozano\RouterExample\Model\Config;
use Magento\Framework\App\Action\Forward;
use Magento\Framework\App\ActionFactory;
use Magento\Framework\App\ActionInterface;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\App\RouterInterface;
use Magento\Framework\Url;

class Router implements RouterInterface
{
    /**
     * @var ActionFactory
     */
    protected $actionFactory;

    /**
     * @var Config
     */
    protected $config;

    /**
     * Router constructor.
     * @param ActionFactory $actionFactory
     * @param Config $config
     */
    public function __construct(
        ActionFactory $actionFactory,
        Config $config
    ) {
        $this->actionFactory = $actionFactory;
        $this->config = $config;
    }

    /**
     * Match application action by request
     *
     * @param RequestInterface $request
     * @return ActionInterface|null
     */
    public function match(RequestInterface $request)
    {
        /** @var string $identifier */
        $identifier = trim($request->getPathInfo(), '/');
        /** @var string $path */
        $path = $this->config->getRouterPath();

        if ($identifier === $path) {
            $request->setModuleName('router_example')->setControllerName('cat')->setActionName('view');
            $request->setAlias(Url::REWRITE_REQUEST_PATH_ALIAS, $identifier);
            return $this->actionFactory->create(Forward::class);
        }

        return null;
    }
}
