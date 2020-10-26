<?php
namespace Api;

/**
 * Class API
 * @package Api
 */
class API
{
    /**
     * @var string
     */
    private $buzzerStateFile;

    /**
     * @var string
     */
    private $clientConfigFile;

    /**
     * API constructor.
     * @param bool $fromApi
     */
    public function __construct(bool $fromApi = false)
    {
        if ($fromApi) {
            $this->buzzerStateFile = 'store/buzzerState.txt';
            $this->clientConfigFile = 'store/configForClients.txt';
        } else {
            $this->buzzerStateFile = 'api/store/buzzerState.txt';
            $this->clientConfigFile = 'api/store/configForClients.txt';
        }

        if (!file_exists($this->buzzerStateFile)) {
            $file = fopen($this->buzzerStateFile, "w");
            fwrite($file, "reset");
            fclose($file);
        }

        if (!file_exists($this->clientConfigFile)) {
            fclose(fopen($this->clientConfigFile, "w"));
        }
    }

    /**
     * @param string $value
     */
    public function setBuzzerState(string $value = 'reset'): void
    {
        file_put_contents($this->buzzerStateFile, $value);
    }

    /**
     * @return string
     */
    public function getBuzzerState(): string
    {
        return file_get_contents($this->buzzerStateFile);
    }

    /**
     * @param array $config
     */
    public function setConfigForClients(array $config): void
    {
        file_put_contents($this->clientConfigFile, json_encode($config));
    }

    /**
     * @return array
     */
    public function getConfigForClients(): array
    {
        return json_decode(file_get_contents($this->clientConfigFile), true);
    }
}

