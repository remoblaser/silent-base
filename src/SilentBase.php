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

        add_action('cmb2_admin_init', [$this, 'extendPlayerForm']);
        add_action('cmb2_admin_init', [$this, 'extendAwardForm']);
        add_action('cmb2_admin_init', [$this, 'extendSponsorForm']);

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

    public function extendPlayerForm()
    {
        $playerForm = new CMBForm('player', 'Spielerinfo', ['players']);
        $playerForm->addText('name', 'Name');
        $playerForm->addText('prename', 'Vorname');
        $playerForm->addText('nickname', 'Nickname');
        $playerForm->addText('roles', 'Rollen');
        $playerForm->addText('twitch', 'Twitch URL');
        $playerForm->addText('twitter', 'Twitter URL');
        $playerForm->addTextArea('description', 'Beschreibung');
        $playerForm->addUploadField('player_image', 'Bild');
        $playerForm->register();
    }

    public function extendAwardForm()
    {
        $playerForm = new CMBForm('award', 'Awardinfo', ['awards']);
        $playerForm->addText('event', 'Eventname');
        $playerForm->addText('rank', 'Platz');
        $playerForm->addText('game', 'Game');
    }

    public function extendSponsorForm()
    {
        
    }
}