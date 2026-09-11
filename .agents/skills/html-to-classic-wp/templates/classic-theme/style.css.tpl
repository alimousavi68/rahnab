/*
Theme Name: {{THEME_NAME}}
Theme URI: {{THEME_URI}}
Author: {{AUTHOR}}
Author URI: {{AUTHOR_URI}}
Description: {{THEME_DESCRIPTION}}
Version: 1.0.0
Requires at least: 6.0
Tested up to: 6.7
Requires PHP: 7.4
License: GNU General Public License v2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
Text Domain: {{TEXT_DOMAIN}}
Tags: custom-background, custom-logo, custom-menu, featured-images, threaded-comments, translation-ready
*/

/* =WordPress Core Required Classes
-------------------------------------------------------------- */
.alignleft {
    float: left;
    margin: 0.5em 1.5em 1.5em 0;
}

.alignright {
    float: right;
    margin: 0.5em 0 1.5em 1.5em;
}

.aligncenter {
    display: block;
    margin-left: auto;
    margin-right: auto;
    clear: both;
}

.alignwide {
    max-width: 1200px;
    width: 100%;
    margin-left: auto;
    margin-right: auto;
}

.alignfull {
    width: 100vw;
    max-width: 100vw;
    margin-left: calc(50% - 50vw);
}

.wp-caption {
    margin-bottom: 1.5em;
    max-width: 100%;
}

.wp-caption img[class*="wp-image-"] {
    display: block;
    margin-left: auto;
    margin-right: auto;
}

.wp-caption .wp-caption-text {
    margin: 0.8075em 0;
    font-size: 0.875rem;
    text-align: center;
    color: #666;
}

/* Screen reader text for accessibility */
.screen-reader-text {
    border: 0;
    clip: rect(1px, 1px, 1px, 1px);
    clip-path: inset(50%);
    height: 1px;
    margin: -1px;
    overflow: hidden;
    padding: 0;
    position: absolute !important;
    width: 1px;
    word-wrap: normal !important;
}

.screen-reader-text:focus {
    background-color: #f1f1f1;
    border-radius: 3px;
    box-shadow: 0 0 2px 2px rgba(0, 0, 0, 0.6);
    clip: auto !important;
    clip-path: none;
    color: #21759b;
    display: block;
    font-size: 0.875rem;
    font-weight: bold;
    height: auto;
    left: 5px;
    line-height: normal;
    padding: 15px 23px 14px;
    text-decoration: none;
    top: 5px;
    width: auto;
    z-index: 100000;
}

/* =Converted Prototype Styles
-------------------------------------------------------------- */
{{PROTOTYPE_CUSTOM_CSS}}
