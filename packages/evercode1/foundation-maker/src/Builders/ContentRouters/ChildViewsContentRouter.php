<?php

namespace Evercode1\FoundationMaker\Builders\ContentRouters;

use Evercode1\FoundationMaker\Builders\ContentRouters\ContentTraits\HasParentAndChildAndSlug;
use Evercode1\FoundationMaker\Templates\ViewTemplates\ViewTemplateAssembler;

class ChildViewsContentRouter
{
    use HasParentAndChildAndSlug;


    public function getContentFromTemplate($fileName, $tokens)
    {

        switch($fileName){

            case 'index' :

                if ($tokens['viewType'] == 'leftnav'){

                    return $this->routeTemplate($tokens, 'childIndexLeftNavTemplate');

                    break;

                }

                return $this->routeTemplate($tokens, 'indexTemplate');

                break;

            case 'create' :

                if ($tokens['viewType'] == 'leftnav'){

                    return $this->routeTemplate($tokens, 'childCreateLeftNavTemplate');

                    break;

                }

                return $this->routeTemplate($tokens, 'childCreateTemplate');

                break;

            case 'edit' :

                if ($tokens['viewType'] == 'leftnav'){

                    return $this->routeTemplate($tokens, 'childEditLeftNavTemplate');

                    break;

                }

                return $this->routeTemplate($tokens, 'childEditTemplate');

                break;

            case 'show' :

                if ($tokens['viewType'] == 'leftnav'){

                    return $this->routeTemplate($tokens, 'childShowLeftNavTemplate');

                    break;

                }


                return $this->routeTemplate($tokens, 'childShowTemplate');

                break;

            case 'component' :

                if ( $this->hasSlug($tokens)){

                    return $this->routeTemplate($tokens, 'childComponentSlugTemplate');

                    break;

                }

                return $this->routeTemplate($tokens, 'childComponentTemplate');

                break;


            case 'components' :

                return $this->routeTemplate($tokens, 'componentsTemplate');

                break;


            default:

                return 'Filename not recognized';



        }

    }

    private function routeTemplate($tokens, $templateName)
    {


        $builder = new ViewTemplateAssembler($tokens);

        return $builder->assembleTemplate($templateName);


    }


}