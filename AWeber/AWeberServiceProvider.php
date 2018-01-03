<?php

namespace AWeber;

/**
 * AWeberServiceProvider
 *
 * Provides specific AWeber information or implementing OAuth.
 *
 * @uses OAuthServiceProvider
 * @package
 * @version $id$
 */
class AWeberServiceProvider implements OAuthServiceProvider
{

    /**
     * @var String Location for API calls
     */
    public $baseUri = 'https://api.aweber.com/1.0';

    /**
     * @var String Location to request an access token
     */
    public $accessTokenUrl = 'https://auth.aweber.com/1.0/oauth/access_token';

    /**
     * @var String Location to authorize an Application
     */
    public $authorizeUrl = 'https://auth.aweber.com/1.0/oauth/authorize';

    /**
     * @var String Location to request a request token
     */
    public $requestTokenUrl = 'https://auth.aweber.com/1.0/oauth/request_token';


    public function getBaseUri()
    {
        return $this->baseUri;
    }

    public function removeBaseUri($url)
    {
        return str_replace($this->getBaseUri(), '', $url);
    }

    public function getAccessTokenUrl()
    {
        return $this->accessTokenUrl;
    }

    public function getAuthorizeUrl()
    {
        return $this->authorizeUrl;
    }

    public function getRequestTokenUrl()
    {
        return $this->requestTokenUrl;
    }

    public function getAuthTokenFromUrl()
    {
        return '';
    }

    public function getUserData()
    {
        return '';
    }

}
