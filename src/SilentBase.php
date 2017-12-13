<?php

namespace Remoblaser\Plugin;

use Remoblaser\Plugin\Forms\CMBForm;

class SilentBase 
{
    public function init()
    {
        add_action('init', [$this, 'registerPlayerPostType']);
        add_action('init', [$this, 'registerTeamTaxonomy']);
        add_action('init', [$this, 'registerSponsorPostType']);
        add_action('init', [$this, 'registerAwardPostType']);
        add_action('init', [$this, 'registerEventTaxonomy']);
        add_action('init', [$this, 'registerManagementPostType']);
        add_action('init', [$this, 'registerWorkgroupTaxonomy']);

        add_action('cmb2_admin_init', [$this, 'buildTeamForm']);
        add_action('cmb2_admin_init', [$this, 'buildPlayerForm']);
        add_action('cmb2_admin_init', [$this, 'buildAwardForm']);
        add_action('cmb2_admin_init', [$this, 'buildSponsorForm']);
        add_action('cmb2_admin_init', [$this, 'buildEventForm']);
        add_action('cmb2_admin_init', [$this, 'buildCategoryForm']);
        add_action('cmb2_admin_init', [$this, 'buildManagementForm']);
        add_action('cmb2_admin_init', [$this, 'buildPostForm']);

        add_action('init', [$this, 'removeRte'],100);
    }

    public function removeRte()
    {
        remove_post_type_support('page', 'editor');
    }

    public function registerPlayerPostType()
    {
        $postType = require(__DIR__ . '/../config/player-posttype.php');
        register_post_type('players', $postType);
    }

    public function registerTeamTaxonomy()
    {
        $taxonomy = require(__DIR__ . '/../config/team-taxonomy.php');
        register_taxonomy('teams', 'players',  $taxonomy);
    }

    public function registerAwardPostType()
    {
        $postType = require(__DIR__ . '/../config/award-posttype.php');
        register_post_type('awards', $postType);
    }

    public function registerEventTaxonomy()
    {
        $taxonomy = require(__DIR__ . '/../config/event-taxonomy.php');
        register_taxonomy('events', 'awards',  $taxonomy);
    }

    public function registerSponsorPostType()
    {
        $postType = require(__DIR__ . '/../config/sponsor-posttype.php');
        register_post_type('sponsors', $postType);
    }

    public function registerManagementPostType()
    {
        $postType = require(__DIR__ . '/../config/management-posttype.php');
        register_post_type('managers', $postType);
    }

    public function registerWorkgroupTaxonomy()
    {
        $taxonomy = require(__DIR__ . '/../config/workgroup-taxonomy.php');
        register_taxonomy('workgroups', 'managers',  $taxonomy);
    }

    public function buildTeamForm()
    {
        $teamForm = new CMBForm('teams', 'Zusätzliches', null, ['teams']);
        $teamForm->addText('subtitle', 'Sub-Titel');
        $teamForm->addUploadField('teampic', 'Teambild');
        $teamForm->addUploadField('detail_page_bg', 'Detailseite Hintergrund');
        $teamForm->addSelect('game', 'Game', [
            'cs' => 'CS:GO',
            'lol' => 'League of Legends',
            'dota' => 'DotA 2', 
            'rl' => 'RocketLeague', 
            'hs' => 'Hearthstone', 
            'ow' => 'Overwatch',
            'pubg' => 'Playerunknown\'s Battlegrounds'
        ]);
    }

    public function buildPlayerForm()
    {
        $playerForm = new CMBForm('player', 'Spielerinfo', ['players']);
        $playerForm->addText('lastname', 'Name');
        $playerForm->addText('prename', 'Vorname');
        $playerForm->addText('order_num', 'Order Position');
        $playerForm->addText('roles', 'Rollen');
        $playerForm->addText('twitch', 'Twitch Username');
        $playerForm->addText('twitter', 'Twitter Username');
        $playerForm->addText('facebook', 'Facebook Username');
        $playerForm->addTextArea('description', 'Beschreibung');
        $playerForm->addUploadField('player_image', 'Bild');
        $playerForm->addSelect('country', 'Land', [
            'AF' => 'Afghanistan',
            'AX' => 'Aland Islands',
            'AL' => 'Albania',
            'DZ' => 'Algeria',
            'AS' => 'American Samoa',
            'AD' => 'Andorra',
            'AO' => 'Angola',
            'AI' => 'Anguilla',
            'AQ' => 'Antarctica',
            'AG' => 'Antigua And Barbuda',
            'AR' => 'Argentina',
            'AM' => 'Armenia',
            'AW' => 'Aruba',
            'AU' => 'Australia',
            'AT' => 'Austria',
            'AZ' => 'Azerbaijan',
            'BS' => 'Bahamas',
            'BH' => 'Bahrain',
            'BD' => 'Bangladesh',
            'BB' => 'Barbados',
            'BY' => 'Belarus',
            'BE' => 'Belgium',
            'BZ' => 'Belize',
            'BJ' => 'Benin',
            'BM' => 'Bermuda',
            'BT' => 'Bhutan',
            'BO' => 'Bolivia',
            'BA' => 'Bosnia And Herzegovina',
            'BW' => 'Botswana',
            'BV' => 'Bouvet Island',
            'BR' => 'Brazil',
            'IO' => 'British Indian Ocean Territory',
            'BN' => 'Brunei Darussalam',
            'BG' => 'Bulgaria',
            'BF' => 'Burkina Faso',
            'BI' => 'Burundi',
            'KH' => 'Cambodia',
            'CM' => 'Cameroon',
            'CA' => 'Canada',
            'CV' => 'Cape Verde',
            'KY' => 'Cayman Islands',
            'CF' => 'Central African Republic',
            'TD' => 'Chad',
            'CL' => 'Chile',
            'CN' => 'China',
            'CX' => 'Christmas Island',
            'CC' => 'Cocos (Keeling) Islands',
            'CO' => 'Colombia',
            'KM' => 'Comoros',
            'CG' => 'Congo',
            'CD' => 'Congo, Democratic Republic',
            'CK' => 'Cook Islands',
            'CR' => 'Costa Rica',
            'CI' => 'Cote D\'Ivoire',
            'HR' => 'Croatia',
            'CU' => 'Cuba',
            'CY' => 'Cyprus',
            'CZ' => 'Czech Republic',
            'DK' => 'Denmark',
            'DJ' => 'Djibouti',
            'DM' => 'Dominica',
            'DO' => 'Dominican Republic',
            'EC' => 'Ecuador',
            'EG' => 'Egypt',
            'SV' => 'El Salvador',
            'GQ' => 'Equatorial Guinea',
            'ER' => 'Eritrea',
            'EE' => 'Estonia',
            'ET' => 'Ethiopia',
            'FK' => 'Falkland Islands (Malvinas)',
            'FO' => 'Faroe Islands',
            'FJ' => 'Fiji',
            'FI' => 'Finland',
            'FR' => 'France',
            'GF' => 'French Guiana',
            'PF' => 'French Polynesia',
            'TF' => 'French Southern Territories',
            'GA' => 'Gabon',
            'GM' => 'Gambia',
            'GE' => 'Georgia',
            'DE' => 'Germany',
            'GH' => 'Ghana',
            'GI' => 'Gibraltar',
            'GR' => 'Greece',
            'GL' => 'Greenland',
            'GD' => 'Grenada',
            'GP' => 'Guadeloupe',
            'GU' => 'Guam',
            'GT' => 'Guatemala',
            'GG' => 'Guernsey',
            'GN' => 'Guinea',
            'GW' => 'Guinea-Bissau',
            'GY' => 'Guyana',
            'HT' => 'Haiti',
            'HM' => 'Heard Island & Mcdonald Islands',
            'VA' => 'Holy See (Vatican City State)',
            'HN' => 'Honduras',
            'HK' => 'Hong Kong',
            'HU' => 'Hungary',
            'IS' => 'Iceland',
            'IN' => 'India',
            'ID' => 'Indonesia',
            'IR' => 'Iran, Islamic Republic Of',
            'IQ' => 'Iraq',
            'IE' => 'Ireland',
            'IM' => 'Isle Of Man',
            'IL' => 'Israel',
            'IT' => 'Italy',
            'JM' => 'Jamaica',
            'JP' => 'Japan',
            'JE' => 'Jersey',
            'JO' => 'Jordan',
            'KZ' => 'Kazakhstan',
            'KE' => 'Kenya',
            'KI' => 'Kiribati',
            'KR' => 'Korea',
            'KW' => 'Kuwait',
            'KG' => 'Kyrgyzstan',
            'LA' => 'Lao People\'s Democratic Republic',
            'LV' => 'Latvia',
            'LB' => 'Lebanon',
            'LS' => 'Lesotho',
            'LR' => 'Liberia',
            'LY' => 'Libyan Arab Jamahiriya',
            'LI' => 'Liechtenstein',
            'LT' => 'Lithuania',
            'LU' => 'Luxembourg',
            'MO' => 'Macao',
            'MK' => 'Macedonia',
            'MG' => 'Madagascar',
            'MW' => 'Malawi',
            'MY' => 'Malaysia',
            'MV' => 'Maldives',
            'ML' => 'Mali',
            'MT' => 'Malta',
            'MH' => 'Marshall Islands',
            'MQ' => 'Martinique',
            'MR' => 'Mauritania',
            'MU' => 'Mauritius',
            'YT' => 'Mayotte',
            'MX' => 'Mexico',
            'FM' => 'Micronesia, Federated States Of',
            'MD' => 'Moldova',
            'MC' => 'Monaco',
            'MN' => 'Mongolia',
            'ME' => 'Montenegro',
            'MS' => 'Montserrat',
            'MA' => 'Morocco',
            'MZ' => 'Mozambique',
            'MM' => 'Myanmar',
            'NA' => 'Namibia',
            'NR' => 'Nauru',
            'NP' => 'Nepal',
            'NL' => 'Netherlands',
            'AN' => 'Netherlands Antilles',
            'NC' => 'New Caledonia',
            'NZ' => 'New Zealand',
            'NI' => 'Nicaragua',
            'NE' => 'Niger',
            'NG' => 'Nigeria',
            'NU' => 'Niue',
            'NF' => 'Norfolk Island',
            'MP' => 'Northern Mariana Islands',
            'NO' => 'Norway',
            'OM' => 'Oman',
            'PK' => 'Pakistan',
            'PW' => 'Palau',
            'PS' => 'Palestinian Territory, Occupied',
            'PA' => 'Panama',
            'PG' => 'Papua New Guinea',
            'PY' => 'Paraguay',
            'PE' => 'Peru',
            'PH' => 'Philippines',
            'PN' => 'Pitcairn',
            'PL' => 'Poland',
            'PT' => 'Portugal',
            'PR' => 'Puerto Rico',
            'QA' => 'Qatar',
            'RE' => 'Reunion',
            'RO' => 'Romania',
            'RU' => 'Russian Federation',
            'RW' => 'Rwanda',
            'BL' => 'Saint Barthelemy',
            'SH' => 'Saint Helena',
            'KN' => 'Saint Kitts And Nevis',
            'LC' => 'Saint Lucia',
            'MF' => 'Saint Martin',
            'PM' => 'Saint Pierre And Miquelon',
            'VC' => 'Saint Vincent And Grenadines',
            'WS' => 'Samoa',
            'SM' => 'San Marino',
            'ST' => 'Sao Tome And Principe',
            'SA' => 'Saudi Arabia',
            'SN' => 'Senegal',
            'RS' => 'Serbia',
            'SC' => 'Seychelles',
            'SL' => 'Sierra Leone',
            'SG' => 'Singapore',
            'SK' => 'Slovakia',
            'SI' => 'Slovenia',
            'SB' => 'Solomon Islands',
            'SO' => 'Somalia',
            'ZA' => 'South Africa',
            'GS' => 'South Georgia And Sandwich Isl.',
            'ES' => 'Spain',
            'LK' => 'Sri Lanka',
            'SD' => 'Sudan',
            'SR' => 'Suriname',
            'SJ' => 'Svalbard And Jan Mayen',
            'SZ' => 'Swaziland',
            'SE' => 'Sweden',
            'CH' => 'Switzerland',
            'SY' => 'Syrian Arab Republic',
            'TW' => 'Taiwan',
            'TJ' => 'Tajikistan',
            'TZ' => 'Tanzania',
            'TH' => 'Thailand',
            'TL' => 'Timor-Leste',
            'TG' => 'Togo',
            'TK' => 'Tokelau',
            'TO' => 'Tonga',
            'TT' => 'Trinidad And Tobago',
            'TN' => 'Tunisia',
            'TR' => 'Turkey',
            'TM' => 'Turkmenistan',
            'TC' => 'Turks And Caicos Islands',
            'TV' => 'Tuvalu',
            'UG' => 'Uganda',
            'UA' => 'Ukraine',
            'AE' => 'United Arab Emirates',
            'GB' => 'United Kingdom',
            'US' => 'United States',
            'UM' => 'United States Outlying Islands',
            'UY' => 'Uruguay',
            'UZ' => 'Uzbekistan',
            'VU' => 'Vanuatu',
            'VE' => 'Venezuela',
            'VN' => 'Viet Nam',
            'VG' => 'Virgin Islands, British',
            'VI' => 'Virgin Islands, U.S.',
            'WF' => 'Wallis And Futuna',
            'EH' => 'Western Sahara',
            'YE' => 'Yemen',
            'ZM' => 'Zambia',
            'ZW' => 'Zimbabwe',
        ]);
        $groupId = $playerForm->addGroup('awards', 'Erfolge', [
            'group_title' => __( 'Award {#}', 'cmb2' ),
            'add_button' => __( 'Neuer Award', 'cmb2' ),
            'remove_button' => __( 'Award Löschen', 'cmb2' ),
        ]);
        $playerForm->addGroupField($groupId, [
            'name' => 'Position',
            'id' => 'position',
            'type' => 'text'
        ]);
        $playerForm->addGroupField($groupId, [
            'name' => 'Eventname',
            'id' => 'event',
            'type' => 'text'
        ]);

        $groupId = $playerForm->addGroup('links', 'Links', [
            'group_title' => __( 'Link {#}', 'cmb2' ),
            'add_button' => __( 'Neuer Link', 'cmb2' ),
            'remove_button' => __( 'Link Löschen', 'cmb2' ),
        ]);
        $playerForm->addGroupField($groupId, [
            'name' => 'URL',
            'id' => 'url',
            'type' => 'text'
        ]);
        $playerForm->addGroupField($groupId, [
            'name' => 'Icon',
            'id' => 'icon',
            'type' => 'file',
            'preview_size' => [100, 100 ]
        ]);
    }

    public function buildAwardForm()
    {
        $awardForm = new CMBForm('award', 'Awardinfo', ['awards']);
        $awardForm->addText('rank', 'Platz');
        $awardForm->addText('game', 'Game');
    }

    public function buildSponsorForm()
    {
        $sponsorForm = new CMBForm('sponsor', 'Sponsoreninfo', ['sponsors']);
        $sponsorForm->addText('url', 'Website');
        $sponsorForm->addTextArea('description', 'Beschreibung');
        $sponsorForm->addText('twitter', 'Twitter Username');
        $sponsorForm->addText('facebook', 'Facebook Username');
        $sponsorForm->addUploadField('logo', 'Logo');
    }

    public function buildEventForm()
    {
        $eventForm = new CMBForm('event', 'Info', null, ['events']);
        $eventForm->addSelect('type', 'Typ', ['league'=>'Liga','cup'=>'Online Cup','lan'=>'LAN-Parties']);
    }

    public function buildManagementForm()
    {
        $managerForm = new CMBForm('manager', 'Manager Info', ['managers']);
        $managerForm->addText('lastname', 'Name');
        $managerForm->addText('prename', 'Vorname');
        $managerForm->addText('role', 'Rolle');
        $managerForm->addText('twitch', 'Twitch Username');
        $managerForm->addText('twitter', 'Twitter Username');
        $managerForm->addText('email', 'E-Mail');
        $managerForm->addText('sort', 'Sortierung');
        $managerForm->addUploadField('picture', 'Bild');
    }
    public function buildPostForm()
    {
        $postForm = new CMBForm('post', 'Zusätzliches', ['post']);
        $postForm->addTextArea('lead', 'Lead');
        $groupId = $postForm->addGroup('slides', 'Slides', [
            'group_title' => __( 'Slide {#}', 'cmb2' ),
            'add_button' => __( 'Neuer Slide', 'cmb2' ),
            'remove_button' => __( 'Slide Löschen', 'cmb2' ),
        ]);
        $postForm->addGroupField($groupId, [
            'name' => 'Bild',
            'id' => 'slide',
            'type' => 'file'
        ]);
    }

    public function buildCategoryForm()
    {
        $eventForm = new CMBForm('category', 'Zusätzliches', null, ['category']);
        $eventForm->addUploadField('icon', 'Icon');
    }
}