<?php
namespace Game;

use DOMDocument;

class GamefileManager
{
    private $gamefileDirectory;

    public function __construct(string $gamefileDirectory)
    {
        $this->gamefileDirectory = $gamefileDirectory;
    }

    public function validateXml(string $filename)
    {
        $xml = new DOMDocument();
        return ($xml->load("{$this->gamefileDirectory}/{$filename}.xml") && $xml->schemaValidate(__DIR__ . '/schema.xsd'));
    }

    public function getArrayFromGamefile(string $filename)
    {
        if ($this->validateXml($filename)) {
            $xmlObject = simplexml_load_file("{$this->gamefileDirectory}/{$filename}.xml");

            return json_decode(json_encode($xmlObject), TRUE);
        }

        return false;
    }

    public function getGamefileNames()
    {
        $names = scandir($this->gamefileDirectory);
        array_splice($names, 0, 2);

        return $names;
    }
}


