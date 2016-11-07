<?php

namespace Remoblaser\Plugin;

use Remoblaser\Plugin\Forms\CMBForm;

class SilentBase 
{
    public function init()
    {
        add_action('init', [$this, 'registerPlayerPostType']);
        add_action('init', [$this, 'registerTeamTaxonomy']);
        add_action('init', [$this, 'registerSponsorTaxonomy']);
        add_action('init', [$this, 'registerSponsorPostType']);
        add_action('init', [$this, 'registerAwardPostType']);
        add_action('init', [$this, 'registerEventTaxonomy']);
        add_action('init', [$this, 'registerManagementPostType']);

        add_action('cmb2_admin_init', [$this, 'buildPlayerForm']);
        add_action('cmb2_admin_init', [$this, 'buildAwardForm']);
        add_action('cmb2_admin_init', [$this, 'buildSponsorForm']);
        add_action('cmb2_admin_init', [$this, 'buildHomeForm']);
        add_action('cmb2_admin_init', [$this, 'buildEventForm']);
        add_action('cmb2_admin_init', [$this, 'buildManagementForm']);

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

    public function registerSponsorTaxonomy()
    {
        $taxonomy = require(__DIR__ . '/../config/sponsor-taxonomy.php');
        register_taxonomy('sponsortypes', 'sponsors',  $taxonomy);
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
    
    public function buildPlayerForm()
    {
        $playerForm = new CMBForm('player', 'Spielerinfo', ['players']);
        $playerForm->addText('name', 'Name');
        $playerForm->addText('prename', 'Vorname');
        $playerForm->addText('roles', 'Rollen');
        $playerForm->addText('twitch', 'Twitch URL');
        $playerForm->addText('twitter', 'Twitter URL');
        $playerForm->addTextArea('description', 'Beschreibung');
        $playerForm->addUploadField('player_image', 'Bild');
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
        $sponsorForm->addUploadField('logo', 'Logo');
    }

    public function buildHomeForm()
    {
        $pageForm = new CMBForm('page', 'Seitentexte', ['page'], null, ['key' => 'id', 'value' => [2]]);
        $pageForm->addRte('about_left', 'About us - Left');
        $pageForm->addRte('about_right', 'About us - Right');
        $pageForm->addRte('about_bottom', 'About us - Bottom');
        $pageForm->addRte('community', 'Text Community');
        $pageForm->addRte('sponsors', 'Text Sponsoren');
    }

    public function buildEventForm()
    {
        $evenForm = new CMBForm('event', 'Info', null, ['events']);
        $evenForm->addSelect('type', 'Typ', ['league'=>'Liga','cup'=>'Online Cup','lan'=>'LAN-Parties']);
    }

    public function buildManagementForm()
    {
        $playerForm = new CMBForm('manager', 'Manager Info', ['managers']);
        $playerForm->addText('name', 'Name');
        $playerForm->addText('prename', 'Vorname');
        $playerForm->addText('role', 'Rolle');
        $playerForm->addText('twitch', 'Twitch URL');
        $playerForm->addText('twitter', 'Twitter URL');
        $playerForm->addUploadField('icon', 'Icon');
    }
}