<?php

namespace Danielozano\RouterExample\ViewModel;

use Danielozano\RouterExample\Model\Config;
use Magento\Framework\View\Element\Block\ArgumentInterface;

class CatGifViewModel implements  ArgumentInterface
{
    const GIPHY_API_ENDPOINT = 'https://api.giphy.com/v1/gifs/random';

    /**
     * @var Config
     */
    protected $config;

    /**
     * CatGifViewModel constructor.
     * @param Config $config
     */
    public function __construct(Config $config)
    {
        $this->config = $config;
    }

    /**
     * Ugly method for get random cat gif embed url
     *
     * @return string|null
     */
    public function getRandomGifEmbedUrl()
    {
        /** @var string $endpoint */
        $endpoint = self::GIPHY_API_ENDPOINT . "?api_key={$this->config->getGiphyApiKey()}&tag=cat&rating=G";
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $endpoint);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        /** @var string|bool $response */
        $response = curl_exec($curl);
        /** @var array $response */
        $response = @json_decode($response, true);

        if ($response && isset($response['data'])) {
            return $response["data"]["embed_url"];
        }

        return null;
    }
}
