<?php

namespace Remoblaser\Plugin\Forms;

class CMBForm 
{
    protected $cmbBox;

    public function __construct($id, $name, $objectTypes, $taxonomies= [], $showOn = [])
    {
        if(count($taxonomies) > 0)
        {
            $this->cmbBox = \new_cmb2_box([
                'id' => $id . '_metabox',
                'title' => __( $name, 'rb' ),
                'object_types' => ['term'], 
                'taxonomies' => $taxonomies,
                'show_on' => $showOn
            ]);
        }
        else 
        {
            $this->cmbBox = \new_cmb2_box([
                'id' => $id . '_metabox',
                'title' => __( $name, 'rb' ),
                'object_types' => $objectTypes, 
                'show_on' => $showOn
            ]);
        }
    }

    public function addText($id, $name, $desc = '')
    {
        $this->cmbBox->add_field([
            'name' => __($name, 'rb'),
            'desc' => $desc,
            'id' => $id,
            'type' => 'text'
        ]);   
    }

    public function addTextArea($id, $name, $desc = '')
    {
        $this->cmbBox->add_field([
            'name' => __($name, 'rb'),
            'desc' => $desc,
            'id' => $id,
            'type' => 'textarea'
        ]);   
    }

    public function addRte($id, $name, $desc='')
    {
        $this->cmbBox->add_field([
            'name' => __($name, 'rb'),
            'desc' => $desc,
            'id' => $id,
            'type' => 'wysiwyg'
        ]);   
    }

    public function addUploadField($id, $name, $desc = '')
    {
        $this->cmbBox->add_field([
            'name' => __($name, 'rb'),
            'desc' => __($desc, 'rb'),
            'id' => $id,
            'type' => 'file',
            'preview_size' => [100, 100 ]
        ]);   
    }

    public function addSelect($id, $name, $entries, $desc='')
    {
         $this->cmbBox->add_field([
            'name' => __($name, 'rb'),
            'desc' => __($desc, 'rb'),
            'id' => $id,
            'type' => 'select',
            'options' => $entries
        ]);   
    }

    public function addGroup($id, $name, $options, $desc='')
    {
        return $this->cmbBox->add_field([
            'id' => $id,
            'type' => 'group',
            'description' => $desc,
            'options' => $options
        ]);
    }
    public function addGroupField($groupId, $field)
    {
        $this->cmbBox->add_group_field($groupId, $field);
    }
}
