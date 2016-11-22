<?php
/**
 * Created by PhpStorm.
 * User: anton
 * Date: 22.11.16
 * Time: 10:54
 */

namespace backend\components;


use yii\base\Exception;

class Parser
{
    private $tokens = [];

    private $rootDirectory;

    public function __construct($rootDirectory = null)
    {
        if (is_null($rootDirectory) || trim($rootDirectory) === "" || !is_dir($rootDirectory))
        {
            throw new Exception('Wrong root directory');
        }

        $this->rootDirectory = $rootDirectory;

        $this->process();
    }

    private function process()
    {
        $files = $this->getFiles($this->rootDirectory);

        foreach ($files as $file)
        {
            $fileContent = file_get_contents($file);

            $this->tokens = array_merge($this->tokens, $this->searchTokens($fileContent));
        }


    }

    private function getFiles($dir = "."){

        $files = array();

        if ($handle = opendir($dir)) {
            while (false !== ($item = readdir($handle))) {
                if (is_file("$dir/$item") && $this->getExtension("$dir/$item") === 'php') {
                    $files[] = "$dir/$item";
                }
                elseif (is_dir("$dir/$item") && ($item != ".") && ($item != "..")){
                    $files = array_merge($files, $this->getFiles("$dir/$item"));
                }
            }
            closedir($handle);
        }

        return $files;
    }

    private function searchTokens($content)
    {
        $pattern = '|Yii::t\(\'app\', \'(?<match>[A-Z_]*)\'\)|U';

        preg_match_all($pattern, $content, $matches);

        return $matches['match'];
    }

    private function getExtension($filename) {
        return end(explode(".", $filename));
    }

    public function getTokens()
    {
        return array_unique($this->tokens);
    }
}