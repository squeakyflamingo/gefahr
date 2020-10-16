<?php
namespace Game;

use DOMDocument;

class XMLParser 
{
    private $gamefileDirectory;

    public function __construct(string $gamefileDirectory) 
    {
        $this->gamefileDirectory = $gamefileDirectory;
    }

    public function validateXml(string $filename)
    {
        $xml = new DOMDocument();
        return ($xml->load("{$this->gamefileDirectory}/{$filename}.xml") && $xml->schemaValidate(__DIR__.'/schema.xsd'));
    }

    public function loadXmlAsArray(string $filename)
    {
        if ($this->validateXml($filename)) {
            $xmlObject = simplexml_load_file("{$this->gamefileDirectory}/{$filename}.xml");
            $xmlJson = json_encode($xmlObject);
            $xmlArray = json_decode($xmlJson, TRUE);

            return $xmlArray;
        }
        
        return false;
    }
}

?>



