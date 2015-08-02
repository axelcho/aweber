<?php
namespace AWeber;

/**
 * AWeberAPIBase
 *
 * Base object that all AWeberAPI objects inherit from.  Allows specific pieces
 * of functionality to be shared across any object in the API, such as the
 * ability to introspect the collections map.
 *
 * @package
 * @version $id$
 */
class AWeberAPIBase {

    /**
     * Maintains data about what children collections a given object type
     * contains.
     */
    static protected $_collectionMap = array(
        'account'              => array('lists', 'integrations'),
        'broadcast_campaign'   => array('links', 'messages', 'stats'),
        'followup_campaign'    => array('links', 'messages', 'stats'),
        'link'                 => array('clicks'),
        'list'                 => array('campaigns', 'custom_fields', 'subscribers',
            'web_forms', 'web_form_split_tests'),
        'web_form'             => array(),
        'web_form_split_test'  => array('components'),
    );

    /**
     * loadFromUrl
     *
     * Creates an object, either collection or entry, based on the given
     * URL.
     *
     * @param mixed $url    URL for this request
     * @access public
     * @return AWeberEntry or AWeberCollection
     */
    public function loadFromUrl($url) {
        $data = $this->adapter->request('GET', $url);
        return $this->readResponse($data, $url);
    }

    protected function _cleanUrl($url) {
        return str_replace($this->adapter->app->getBaseUri(), '', $url);
    }

    /**
     * readResponse
     *
     * Interprets a response, and creates the appropriate object from it.
     * @param mixed $response   Data returned from a request to the AWeberAPI
     * @param mixed $url        URL that this data was requested from
     * @access protected
     * @return mixed
     */
    protected function readResponse($response, $url) {
        $this->adapter->parseAsError($response);
        if (!empty($response['id'])) {
            return new AWeberEntry($response, $url, $this->adapter);
        } else if (array_key_exists('entries', $response)) {
            return new AWeberCollection($response, $url, $this->adapter);
        }
        return false;
    }
}
