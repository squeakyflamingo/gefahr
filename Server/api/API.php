<?php
namespace Api;

class API
{
    private $buzzerStateFile;
    private $clientConfigFile;

    public function __construct(bool $fromApi = false)
    {
        if ($fromApi) {
            $this->buzzerStateFile = 'store/buzzerState.txt';
            $this->clientConfigFile = 'store/configForClients.txt';
        } else {
            $this->buzzerStateFile = 'api/store/buzzerState.txt';
            $this->clientConfigFile = 'api/store/configForClients.txt';
        }
    }

    public function setBuzzerState(string $value = 'reset'): void
    {
        file_put_contents($this->buzzerStateFile, $value);
    }

    public function getBuzzerState(): string
    {
        return file_get_contents($this->buzzerStateFile);
    }

    public function setConfigForClients(array $config): void
    {
        file_put_contents($this->clientConfigFile, json_encode($config));
    }

    public function getConfigForClients(): array
    {
        return json_decode(file_get_contents($this->clientConfigFile), true);
    }
}

