<?php

namespace Evercode1\FoundationMaker\Builders\Social;

use Evercode1\FoundationMaker\Tokens\Tokens;
use Evercode1\FoundationMaker\Builders\Writers\SocialAppFileWriter;

class SocialAppBuilder
{

    public $initialValues = [];

    public $fileWritePaths = [];

    public $fileAppendPaths = [];

    public $tokens = [];


    public function makeSocialAppFiles($input)
    {
        $this->setConfig($input);

        $this->writeSocialAppFiles();

        return true;


    }

    private function writeSocialAppFiles()
    {

        $writer = new SocialAppFileWriter($this->fileWritePaths,
                                          $this->fileAppendPaths,
                                          $this->tokens);

        $writer->writeAllSocialAppFiles();


    }

    private function setConfig($input)
    {

        $this->setInput($input);

        $this->setTokens();

        $this->setFilePaths();

    }

    private function setFilePaths()
    {

        // Auth Controllers

        $this->fileWritePaths['AuthController'] = base_path() . '/app/Http/Controllers/Auth/AuthController.php';
        $this->fileWritePaths['ForgotPasswordController'] = base_path() . '/app/Http/Controllers/Auth/ForgotPasswordController.php';
        $this->fileWritePaths['LoginController'] = base_path() . '/app/Http/Controllers/Auth/LoginController.php';
        $this->fileWritePaths['RegisterController'] = base_path() . '/app/Http/Controllers/Auth/RegisterController.php';
        $this->fileWritePaths['ResetPasswordController'] = base_path() . '/app/Http/Controllers/Auth/ResetPasswordController.php';

        // Auth Traits

        $this->fileWritePaths['FindsOrCreatesUsers'] = base_path() . '/app/Http/AuthTraits/Social/FindsOrCreatesUsers.php';
        $this->fileWritePaths['ManagesSocialAuth'] = base_path() . '/app/Http/AuthTraits/Social/ManagesSocialAuth.php';
        $this->fileWritePaths['RoutesSocialUser'] = base_path() . '/app/Http/AuthTraits/Social/RoutesSocialUser.php';
        $this->fileWritePaths['SetsAuthUser'] = base_path() . '/app/Http/AuthTraits/Social/SetsAuthUser.php';
        $this->fileWritePaths['SyncsSocialUsers'] = base_path() . '/app/Http/AuthTraits/Social/SyncsSocialUsers.php';
        $this->fileWritePaths['VerifiesSocialUsers'] = base_path() . '/app/Http/AuthTraits/Social/VerifiesSocialUsers.php';

        $this->fileWritePaths['OwnsRecord'] = base_path() . '/app/Http/AuthTraits/OwnsRecord.php';




        // component

        $this->fileWritePaths['MarketingImageGrid'] = base_path() . '/resources/assets/js/components/MarketingImageGrid.vue';

        // components

        $this->fileAppendPaths['Components'] = base_path() . '/resources/assets/js/components.js';


        // Config File

        $this->fileWritePaths['ImageDefaults'] = base_path() . '/config/image-defaults.php';
        $this->fileWritePaths['Services'] = base_path() . '/config/services.php';

        // controllers

        $this->fileWritePaths['AdminController'] = base_path() . '/app/Http/Controllers/AdminController.php';
        $this->fileWritePaths['ApiController'] = base_path() . '/app/Http/Controllers/ApiController.php';
        $this->fileWritePaths['MarketingImageController'] = base_path() . '/app/Http/Controllers/MarketingImageController.php';
        $this->fileWritePaths['PagesController'] = base_path() . '/app/Http/Controllers/PagesController.php';
        $this->fileWritePaths['ProfileController'] = base_path() . '/app/Http/Controllers/ProfileController.php';
        $this->fileWritePaths['SettingsController'] = base_path() . '/app/Http/Controllers/SettingsController.php';
        $this->fileWritePaths['UserController'] = base_path() . '/app/Http/Controllers/UserController.php';


        // .env

        $this->fileAppendPaths['routes'] = base_path() . '/.env';

        // Exceptions

        $this->fileWritePaths['AlreadySynced'] = base_path() . '/app/Exceptions/AlreadySyncedException.php';
        $this->fileWritePaths['ConnectionNotAccepted'] = base_path() . '/app/Exceptions/ConnectionNotAcceptedException.php';
        $this->fileWritePaths['CredentialsDoNotMatch'] = base_path() . '/app/Exceptions/CredentialsDoNotMatchException.php';
        $this->fileWritePaths['EmailAlreadyInSystem'] = base_path() . '/app/Exceptions/EmailAlreadyInSystemException.php';
        $this->fileWritePaths['EmailNotProvided'] = base_path() . '/app/Exceptions/EmailNotProvidedException.php';
        $this->fileWritePaths['NoActiveAccount'] = base_path() . '/app/Exceptions/NoActiveAccountException.php';
        $this->fileWritePaths['TransactionFailed'] = base_path() . '/app/Exceptions/TransactionFailedException.php';
        $this->fileWritePaths['Unauthorized'] = base_path() . '/app/Exceptions/UnauthorizedException.php';

        // Handler

        $this->fileWritePaths['Handler'] = base_path() . '/app/Exceptions/Handler.php';

        // Kernel

        $this->fileWritePaths['Kernel'] = base_path() . '/app/Http/Kernel.php';
        
        // Middleware

        $this->fileWritePaths['AllowIfAdmin'] = base_path() . '/app/Http/Middleware/AllowIfAdmin.php';

        // Migrations

        $this->fileWritePaths['CreateMarketingImages'] = base_path() . '/database/migrations/' . date('Y_m_d_His') . '_create_marketing_images_table'. '.php';
        $this->fileWritePaths['CreateProfiles'] = base_path() . '/database/migrations/' . date('Y_m_d_His') . '_create_profiles_table'. '.php';
        $this->fileWritePaths['CreateSocialProviders'] = base_path() . '/database/migrations/' . date('Y_m_d_His') . '_create_social_providers_table'. '.php';
        $this->fileWritePaths['ModifyUsersTable'] = base_path() . '/database/migrations/' . date('Y_m_d_His') . '_add_is_subscribed_and_status_id_and_is_admin_to_users_table'. '.php';
        
        // Models

        $this->fileWritePaths['MarketingImage'] = base_path() . '/app/MarketingImage.php';
        $this->fileWritePaths['Profile'] = base_path() . '/app/Profile.php';
        $this->fileWritePaths['SocialProvider'] = base_path() . '/app/SocialProvider.php';
        $this->fileWritePaths['SuperModel'] = base_path() . '/app/SuperModel.php';
        $this->fileWritePaths['User'] = base_path() . '/app/User.php';

        // Queries

        $this->fileWritePaths['DataQuery'] = base_path() . '/Queries/GridQueries/Contracts/DataQuery.php';
        $this->fileWritePaths['GridQuery'] = base_path() . '/Queries/GridQueries/GridQuery.php';
        $this->fileWritePaths['MarketingImageQuery'] = base_path() . '/Queries/GridQueries/MarketingImageQuery.php';


        // Requests

        $this->fileWritePaths['CreateImageRequest'] = base_path() . '/app/Http/Requests/CreateImageRequest.php';
        $this->fileWritePaths['EditImageRequest'] = base_path() . '/app/Http/Requests/EditImageRequest.php';
        $this->fileWritePaths['UserRequest'] = base_path() . '/app/Http/Requests/UserRequest.php';

        // Routes

        $this->fileWritePaths['routes'] = base_path() . '/routes/web.php';

        // Traits

        $this->fileWritePaths['HasModelTrait'] = base_path() . '/app/Traits/HasModelTrait.php';
        $this->fileWritePaths['ManagesImages'] = base_path() . '/app/Traits/ManagesImages.php';
        $this->fileWritePaths['ShowsImages'] = base_path() . '/app/Traits/ShowsImages.php';

        // Views

        // admin

        $this->fileAppendPaths['AdminGrid'] = base_path() . '/resources/views/admin/grid.blade.php';
        $this->fileAppendPaths['AdminIndex'] = base_path() . '/resources/views/admin/index.blade.php';

        // auth

        $this->fileAppendPaths['Login'] = base_path() . '/resources/views/auth/login.blade.php';
        $this->fileAppendPaths['Register'] = base_path() . '/resources/views/auth/register.blade.php';

        // errors

        $this->fileAppendPaths['Errors404'] = base_path() . '/resources/views/errors/404.blade.php';
        $this->fileAppendPaths['ErrorsAlreadySynced'] = base_path() . '/resources/views/errors/already-synced.blade.php';
        $this->fileAppendPaths['ErrorsConnectionNotAccepted'] = base_path() . '/resources/views/errors/connection-not-accepted.blade.php';
        $this->fileAppendPaths['ErrorsCredentialsDoNotMatch'] = base_path() . '/resources/views/errors/credentials-do-not-match.blade.php';
        $this->fileAppendPaths['ErrorsEmailAlreadyInSystem'] = base_path() . '/resources/views/errors/email-already-in-system.blade.php';
        $this->fileAppendPaths['ErrorsEmailNotProvided'] = base_path() . '/resources/views/errors/email-not-provided.blade.php';
        $this->fileAppendPaths['ErrorsNoActiveAccount'] = base_path() . '/resources/views/errors/no-active-account.blade.php';
        $this->fileAppendPaths['ErrorsTransactionFailed'] = base_path() . '/resources/views/errors/transaction-failed.blade.php';
        $this->fileAppendPaths['ErrorsUnauthorized'] = base_path() . '/resources/views/errors/unauthorized.blade.php';

        // marketing-image

        $this->fileAppendPaths['MarketingImageIndex'] = base_path() . '/resources/views/marketing-image/index.blade.php';
        $this->fileAppendPaths['MarketingImageCreate'] = base_path() . '/resources/views/marketing-image/create.blade.php';
        $this->fileAppendPaths['MarketingImageEdit'] = base_path() . '/resources/views/marketing-image/edit.blade.php';
        $this->fileAppendPaths['MarketingImageShow'] = base_path() . '/resources/views/marketing-image/show.blade.php';

        // pages

        $this->fileAppendPaths['PagesIndex'] = base_path() . '/resources/views/pages/index.blade.php';
        $this->fileAppendPaths['PagesPrivacy'] = base_path() . '/resources/views/pages/privacy.blade.php';
        $this->fileAppendPaths['PagesSlider'] = base_path() . '/resources/views/pages/slider.blade.php';
        $this->fileAppendPaths['PagesTermsOfService'] = base_path() . '/resources/views/pages/terms-of-service.blade.php';

        // passwords

        $this->fileAppendPaths['Email'] = base_path() . '/resources/views/auth/passwords/email.blade.php';
        $this->fileAppendPaths['Reset'] = base_path() . '/resources/views/auth/passwords/reset.blade.php';

        // profile

        $this->fileAppendPaths['ProfileIndex'] = base_path() . '/resources/views/profile/index.blade.php';
        $this->fileAppendPaths['ProfileCreate'] = base_path() . '/resources/views/profile/create.blade.php';
        $this->fileAppendPaths['ProfileEdit'] = base_path() . '/resources/views/profile/edit.blade.php';
        $this->fileAppendPaths['ProfileShow'] = base_path() . '/resources/views/profile/show.blade.php';

        // settings

        $this->fileAppendPaths['SettingsEdit'] = base_path() . '/resources/views/settings/edit.blade.php';


        // user

        $this->fileAppendPaths['UserIndex'] = base_path() . '/resources/views/user/index.blade.php';
        $this->fileAppendPaths['UserEdit'] = base_path() . '/resources/views/user/edit.blade.php';
        $this->fileAppendPaths['UserShow'] = base_path() . '/resources/views/user/show.blade.php';



    }

    private function setTokens()
    {

        $tokenBuilder = new Tokens($this->initialValues);

        $this->tokens = $tokenBuilder->tokens;

    }

    /**
     * @param $input
     */

    private function setInput($input)
    {
        // these dummy values are needed to instantiate the Token class.
        // We do not use them to create the app.

        $this->initialValues['model'] = 'model';

        $this->initialValues['slug'] = false;

        $this->initialValues['parent'] = isset($input['ParentName']) ? $input['ParentName'] : false;

        $this->initialValues['child'] = isset($input['ChildName']) ? $input['ChildName'] : false;
    }


}