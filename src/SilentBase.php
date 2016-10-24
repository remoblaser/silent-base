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

        add_action('cmb2_admin_init', [$this, 'extendPlayerForm']);
        add_action('cmb2_admin_init', [$this, 'extendAwardForm']);
        add_action('cmb2_admin_init', [$this, 'extendSponsorForm']);
        add_action('cmb2_admin_init', [$this, 'buildHomeForm']);


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
    
    public function extendPlayerForm()
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

    public function extendAwardForm()
    {
        $awardForm = new CMBForm('award', 'Awardinfo', ['awards']);
        $awardForm->addText('rank', 'Platz');
        $awardForm->addText('game', 'Game');
    }

    public function extendSponsorForm()
    {
        $sponsorForm = new CMBForm('sponsor', 'Sponsoreninfo', ['sponsors']);
        $sponsorForm->addText('url', 'Website');
        $sponsorForm->addUploadField('logo', 'Logo');
    }

    public function buildHomeForm()
    {
        $pageForm = new CMBForm('page', 'Seitentexte', ['page'], ['key' => 'id', 'value' => [2]]);
        $pageForm->addRte('about_left', 'About us - Left');
        $pageForm->addRte('about_right', 'About us - Right');
        $pageForm->addRte('about_bottom', 'About us - Bottom');
        $pageForm->addRte('community', 'Text Community');
        $pageForm->addRte('sponsors', 'Text Sponsoren');
    }
}