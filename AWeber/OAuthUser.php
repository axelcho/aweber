<?php

namespace AWeber;


/**
 * OAuthUser
 *
 * Simple data class representing the user in an OAuth application.
 *
 * @package
 * @version $id$
 */
class OAuthUser
{

    public $authorizedToken = false;
    public $requestToken = false;
    public $verifier = false;
    public $tokenSecret = false;
    public $accessToken = false;

    /**
     * isAuthorized
     *
     * Checks if this user is authorized.
     *
     * @access public
     * @return bool     *
     */
    public function isAuthorized()
    {
        if (empty($this->authorizedToken) && empty($this->accessToken)) {
            return false;
        }
        return true;
    }

    /**
     * getHighestPriorityToken
     *
     * Returns highest priority token - used to define authorization
     * state for a given OAuthUser
     *
     * @access public
     * @return string
     */
    public function getHighestPriorityToken()
    {
        if (!empty($this->accessToken)) return $this->accessToken;
        if (!empty($this->authorizedToken)) return $this->authorizedToken;
        if (!empty($this->requestToken)) return $this->requestToken;

        // Return no token, new user
        return '';
    }
}