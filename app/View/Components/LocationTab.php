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

    public function __construct($id) {
        $this->id = $id;
        $this->title = get_the_title($id);
        $this->heading =  $this->getAcfFieldFromID('hero_heading', $id) ?: get_the_title($id);
        $this->description = $this->getAcfFieldFromID('hero_supporting_text', $id);
        $this->address = $this->getLocationAddress();
        $this->telephone = $this->getAcfFieldFromID('post_type_data_contact_phone', $id);
        $this->hours = $this->getAcfFieldFromID('post_type_data_contact_opening_hours', $id);
        $this->email = $this->getAcfFieldFromID('post_type_data_contact_email', $id);
        $this->image =  $this->getAcfFieldFromID('hero_image', $id);
        $this->directionsCta = $this->buildDirectionsLink();
    }

    /**
     * Get the location address, allowing for override if set
     *
     * @return string|null
     */
    public function getLocationAddress() {
        $isOverridden = $this->getAcfFieldFromID('post_type_data_location_toggle_override_google_address', $this->id);
        $overriddenAddress = $this->getAcfFieldFromID('post_type_data_location_override_google_address', $this->id);

        // Return overridden address if set and not empty
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
	 * @return Array|null
	 */
    public function buildDirectionsLink() {
        $googleMaps = $this->getAcfFieldFromID('post_type_data_location_google_map_data', $this->id);
        $lat = $this->pathOr(null, ['latitude'], $googleMaps);
        $lng = $this->pathOr(null, ['longitude'], $googleMaps);
        if(!$lat || !$lng) {
            return null;
        }
        $placeId = $this->pathOr(null, ['placeId'], $googleMaps);
        $searchParams = array(
            'api' => '1',
            'destination' => $lat . ',' . $lng,
            'destination_place_id' => $placeId
        );
        return self::buildButtonFromLink('https://www.google.com/maps/dir/?' . http_build_query($searchParams), 'Get Directions', '_blank');
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