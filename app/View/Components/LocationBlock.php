<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Traits\UseHelpers;

class LocationBlock extends Component {
    use UseHelpers;

    public $location;
    public $title;
    public $address;
    public $telephone;
    public $cta;

    public function __construct($location) {
        $this->location = $location;

        // Initialize title and address directly to avoid method calls in constructor
        $this->title = $this->getLocationTitle();
        $this->address = $this->getLocationAddress();
        $this->telephone = $this->getAcfFieldFromID('post_type_data_contact_phone', $this->location);

        // Initialize CTA
        $this->cta = [
            'enable_cta' => true,
            'cta' => [
                'type' => 'link',
                'label' => 'Contact Us',
                'url' => [
                    'url' => get_the_permalink( $this->location ),
                    'target' => '_self',
                    'title' => 'Contact Us'
                ],
                
            ]
        ];
    }

    /**
     * Get the location title, prefer ACF field if available
     *
     * @return string|null
     */
    public function getLocationTitle() {
        $acfTitle = $this->getAcfFieldFromID('hero_heading', $this->location);
        
        return $this->isNotEmpty($acfTitle) ? $acfTitle : get_the_title($this->location);
    }

    /**
     * Get the location address, allowing for override if set
     *
     * @return string|null
     */
    public function getLocationAddress() {
        $isOverridden = $this->getAcfFieldFromID('post_type_data_location_toggle_override_google_address', $this->location);
        $overriddenAddress = $this->getAcfFieldFromID('post_type_data_location_override_google_address', $this->location);

        // Return overridden address if set and not empty
        if ($isOverridden && $this->isNotEmpty($overriddenAddress)) {
            return $overriddenAddress;
        }

        // Fallback to Google Maps address
        $googleMaps = $this->getAcfFieldFromID('post_type_data_location_google_map_data', $this->location);
        return $this->pathOr(null, ['street_address'], $googleMaps);
    }

    /**
     * Render the location block component
     *
     * @return \Illuminate\View\View
     */
    public function render() {
        return view('components.location-block');
    }
}