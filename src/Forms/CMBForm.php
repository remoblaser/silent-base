<?php

namespace Remoblaser\Plugin\Forms;

class CMBForm 
{
    protected $cmbBox;

    public function __construct($id, $name, $objectTypes, $showOn = [])
    {
        $this->cmbBox = \new_cmb2_box([
            'id' => $id . '_metabox',
            'title' => __( $name, 'rb' ),
            'object_types' => $objectTypes, 
            'show_on' => $showOn
        ]);
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
}
