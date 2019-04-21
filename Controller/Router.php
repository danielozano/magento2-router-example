<?php

namespace Danielozano\RouterExample\Controller;

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
     * Router constructor.
     * @param ActionFactory $actionFactory
     */
    public function __construct(ActionFactory $actionFactory)
    {
        $this->actionFactory = $actionFactory;
    }

    /**
     * Match application action by request
     *
     * @param RequestInterface $request
     * @return ActionInterface
     */
    public function match(RequestInterface $request)
    {
        $identifier = trim($request->getPathInfo(), '/');

        // todo: do it configurable in admin
        if ($identifier === 'testing') {
            $request->setModuleName('router_example')->setControllerName('cat')->setActionName('view');
            $request->setAlias(Url::REWRITE_REQUEST_PATH_ALIAS, $identifier);
        }

        return $this->actionFactory->create(Forward::class);
    }
}
