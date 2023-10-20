<?php
declare(strict_types=1);
namespace App;
use Statickidz\GoogleTranslate;

class Application
{
private array $languages=[
"be",  "bg", "ca", "hr", "cs", "da", "nl", "et", "fi", "fr", "gl",
"de", "el", "hu", "is", "ga", "it", "lv", "lt", "mt", "no", "pl",
"ro", "ru", "sr", "sk", "sl", "es", "sv", "tr", "en"];
    private string $language;
    private array $options;
    public function __construct()
    {
        $this->options[]=new Joke();
        $this->options[]=new Activity();

    }

    public function run()
    {
        $keys=[];
        $this->language=readline("select language( " . implode(", ",$this->languages) . "):");
        if(!(in_array($this->language,$this->languages)))exit("wrong input\n");
        $translation=new GoogleTranslate();
        echo $translation->translate("en",$this->language,"choose from options below") . PHP_EOL;
        foreach ($this->options as $key=>$option){
            echo $key . " " . $translation->translate("en",$this->language,$option->getCall()) . PHP_EOL;
            $keys[]=$key;

        }
        $choice=(int)readline();
        if(!(in_array($choice,$keys)))exit("wrong input");
            echo $translation->translate("en",$this->language,$this->options[$choice]->getOutput());

    }
}
