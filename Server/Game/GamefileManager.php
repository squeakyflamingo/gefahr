<?php
namespace Game;

use DOMDocument;

/**
 * Class GamefileManager
 * @package Game
 */
class GamefileManager
{
    /**
     * @var string
     */
    private $gamefileDirectory;

    /**
     * GamefileManager constructor.
     * @param string $gamefileDirectory
     */
    public function __construct(string $gamefileDirectory)
    {
        $this->gamefileDirectory = $gamefileDirectory;
    }

    /**
     * @param string $filename
     * @return bool
     */
    public function validateXml(string $filename): bool
    {
        $xml = new DOMDocument();
        return ($xml->load("{$this->gamefileDirectory}/{$filename}.xml") && $xml->schemaValidate(__DIR__ . '/schema.xsd'));
    }

    /**
     * @param string $filename
     * @return false|array
     */
    public function getArrayFromGamefile(string $filename)
    {
        if ($this->validateXml($filename)) {
            $xmlObject = simplexml_load_file("{$this->gamefileDirectory}/{$filename}.xml");

            return json_decode(json_encode($xmlObject), TRUE);
        }

        return false;
    }

    /**
     * @return array|false
     */
    public function getGamefileNames()
    {
        $names = scandir($this->gamefileDirectory);
        array_splice($names, 0, 2);

        return $names;
    }
}


