<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Traits\UseHelpers;

class LocationTab extends Component {
    use UseHelpers;

    public $id;
    public $title;
    public $heading;
    public $description;
    public $address;
    public $telephone;
    public $hours;
    public $email;
    public $image;
    public $directionsCta;

    private $googleMapsSearchLink = 'https://www.google.com/maps/search/';

    /**
     * Constructor to initialize component data
     * 
     * @param int $id
     */
    public function __construct($id) {
        $this->id = $id;
        $this->initializeFields();
    }

    /**
     * Initialize all necessary fields for the component
     */
    private function initializeFields() {
        $isHeadOffice = $this->getAcfFieldFromID('post_type_data_enable_head_office', $this->id);

        $this->title = get_the_title($this->id);
        $this->heading = $this->getAcfFieldFromID('hero_heading', $this->id) ?: $this->title;
        $this->description = $this->getAcfFieldFromID('hero_supporting_text', $this->id);
        $this->address = $this->getLocationAddress();
        $this->telephone = $this->getAcfFieldFromID('post_type_data_contact_phone', $this->id);
        $this->hours = $this->getAcfFieldFromID('post_type_data_contact_opening_hours', $this->id);
        $this->email = $this->getAcfFieldFromID('post_type_data_contact_email', $this->id);
        $this->image = $this->getAcfFieldFromID('hero_image', $this->id);
        $this->directionsCta = $this->buildDirectionsLink();

        if ($isHeadOffice) {
            $this->heading = 'Head Office (' . $this->heading . ')';
        }
    }

    /**
     * Get the location address, allowing for override if set
     *
     * @return string|null
     */
    public function getLocationAddress() {
        $isOverridden = $this->getAcfFieldFromID('post_type_data_location_toggle_override_google_address', $this->id);
        $overriddenAddress = $this->getAcfFieldFromID('post_type_data_location_override_google_address', $this->id);

        if ($isOverridden && $this->isNotEmpty($overriddenAddress)) {
            return $overriddenAddress;
        }

        // Fallback to Google Maps address
        $googleMaps = $this->getAcfFieldFromID('post_type_data_location_google_map_data', $this->id);
        return $this->pathOr(null, ['street_address'], $googleMaps);
    }

    /**
     * Creates a Google Maps directions CTA if latitude and longitude are set
     *
     * @return array|null
     */
    public function buildDirectionsLink() {
        $locationData = $this->getAcfFieldFromID('post_type_data_location', $this->id);
        if (!$locationData) {
            return null;
        }

        $googleMaps = $this->pathOr(null, ['google_maps_data'], $locationData);
        if (empty($googleMaps)) {
            return $this->buildGoogleMapsQuery($locationData);
        }

        $lat = $this->pathOr(null, ['latitude'], $googleMaps);
        $lng = $this->pathOr(null, ['longitude'], $googleMaps);

        if (empty($lat) || empty($lng)) {
            return null;
        }

        $placeId = $this->pathOr(null, ['placeId'], $googleMaps);
        $searchParams = [
            'api' => '1',
            'destination' => "$lat,$lng",
            'destination_place_id' => $placeId
        ];

        return $this->buildButtonFromLink(
            'https://www.google.com/maps/dir/?' . http_build_query($searchParams), 
            'Get Directions', 
            '_blank'
        );
    }

    /**
     * Build a Google Maps query link based on address
     *
     * @param array $locationData
     * @return array|null
     */
    protected function buildGoogleMapsQuery($locationData) {
        $address = $this->pathOr(null, ['override_google_address'], $locationData);
        if (empty($address)) {
            return null;
        }

        $sanitizedAddress = strip_tags($address);
        $sanitizedAddress = preg_replace('/[\r\n,]+/', '', $sanitizedAddress);
        $encodedAddress = urlencode($sanitizedAddress);

        return $this->buildButtonFromLink(
            $this->googleMapsSearchLink . $encodedAddress, 
            'Get Directions', 
            '_blank'
        );
    }

    /**
     * Render the location block component
     *
     * @return \Illuminate\View\View
     */
    public function render() {
        return $this->view('components.location-tab');
    }
}