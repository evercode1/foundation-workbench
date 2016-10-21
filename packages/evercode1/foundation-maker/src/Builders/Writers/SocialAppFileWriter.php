<?php

namespace Evercode1\FoundationMaker\Builders\Writers;

use Evercode1\FoundationMaker\Builders\ContentRouters\SocialAppContentRouter;

class SocialAppFileWriter
{

    public $fileWritePaths;
    public $fileAppendPaths;
    public $tokens = [];
    public $content;
    public $folders = [];

    public function __construct($fileWritePaths, $fileAppendPaths, Array $tokens)
    {

        $this->fileWritePaths = $fileWritePaths;
        $this->fileAppendPaths = $fileAppendPaths;
        $this->tokens = $tokens;
        $this->content = new SocialAppContentRouter();


    }

    public function writeAllSocialAppFiles()
    {

        $this->setFolders();

        $this->makeFolders();

        $this->writeEachFile($this->fileWritePaths, $this->content);

        $this->appendEachFile($this->fileAppendPaths, $this->content);

    }

    private function writeEachFile(array $fileWritePaths, SocialAppContentRouter $content)
    {

        foreach ($fileWritePaths as $fileName => $filePath) {



                    if ( ! is_array($fileName)) {

                        $txt = $content->getContentFromTemplate($fileName, $this->tokens);

                        $handle = fopen($filePath, "w");

                        fwrite($handle, $txt);

                        fclose($handle);
                    }

            }



    }

    private function appendEachFile(array $fileAppendPaths, SocialAppContentRouter $content)
    {

        foreach ($fileAppendPaths as $fileName => $filePath) {

            if ( ! is_array($fileName)) {

                $txt = $content->getContentFromTemplate($fileName, $this->tokens);

                $handle = fopen($filePath, "a");

                fwrite($handle, $txt);

                fclose($handle);
            }

        }
    }

    Private function setFolders()
    {


        $this->folders['authTraitDirectory'] = base_path('app/Http/AuthTraits');
        $this->folders['queryDirectory'] = base_path('app/Queries');
        $this->folders['gridQueriesDirectory'] = base_path('app/Queries/GridQueries');
        $this->folders['contractsDirectory'] = base_path('app/Queries/GridQueries/Contracts');
        $this->folders['traitsDirectory'] = base_path('app/Traits');
        $this->folders['adminViewDirectory'] = base_path('resources/views/admin');
        $this->folders['authViewDirectory'] = base_path('resources/views/auth');
        $this->folders['passwordsViewDirectory'] = base_path('resources/views/auth/passwords');
        $this->folders['marketingImageViewDirectory'] = base_path('resources/views/marketing-image');
        $this->folders['pagesViewDirectory'] = base_path('resources/views/pages');
        $this->folders['profileViewDirectory'] = base_path('resources/views/profile');
        $this->folders['settingsViewDirectory'] = base_path('resources/views/settings');
        $this->folders['userViewDirectory'] = base_path('resources/views/user');
        $this->folders['imgsDirectory'] = base_path('public/imgs');
        $this->folders['marketingDirectory'] = base_path('public/imgs/marketing');
        $this->folders['thumbnailMarketingDirectory'] = base_path('public/imgs/marketing/thumbnails');
        $this->folders['requestsDirectory'] = base_path('app/Http/Requests');



    }


    private function makeFolders()
    {


        foreach($this->folders as $name => $path){

            if (! file_exists($path)) {


                mkdir($path);

            }

        }


    }

}