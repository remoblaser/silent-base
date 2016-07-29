<?php

namespace Remoblaser\Plugin;

class SilentBase 
{
    public function init()
    {
        add_action('init', [$this, 'registerPlayerPostType'] );
        add_action('init', [$this, 'registerTeamTaxonomy'] );
        add_action('init', [$this, 'registerSponsorPostType'] );
        add_action('init', [$this, 'registerAwardPostType'] );
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

    public function registerSponsorPostType()
    {
        $postType = require(__DIR__ . '/../config/sponsor-posttype.php');
        register_post_type('sponsors', $postType);
    }
}