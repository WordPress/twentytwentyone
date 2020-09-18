/* global wp */

import ReactColorControl from './ReactColorControl';

// Register control type with Customizer.
wp.customize.controlConstructor['twentytwentyone-react-color'] = ReactColorControl;
