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
        $playerForm->addText('roles', 'Rollen');
        $playerForm->addText('twitch', 'Twitch Username');
        $playerForm->addText('twitter', 'Twitter Username');
        $playerForm->addText('facebook', 'Facebook Username');
        $playerForm->addTextArea('description', 'Beschreibung');
        $playerForm->addUploadField('player_image', 'Bild');

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