<?php

namespace Remoblaser\Plugin\Forms;

class CMBForm 
{
    protected $cmbBox;

    public function __construct($id, $name, $objectTypes)
    {
        $this->cmbBox = \new_cmb2_box(
                [
                    'id'            => $id . '_metabox',
                    'title'         => __( $name, 'rb' ),
                    'object_types'  => $objectTypes, // Post type
                    // 'show_on_cb' => 'yourprefix_show_if_front_page', // function should return a bool value
                    // 'context'    => 'normal',
                    // 'priority'   => 'high',
                    // 'show_names' => true, // Show field names on the left
                    // 'cmb_styles' => false, // false to disable the CMB stylesheet
                    // 'closed'     => true, // true to keep the metabox closed by default
                    // 'classes'    => 'extra-class', // Extra cmb2-wrap classes
                    // 'classes_cb' => 'yourprefix_add_some_classes', // Add classes through a callback.
                ]
        );
    }

    public function addText($id, $name, $desc = '')
    {
        $this->cmbBox->add_field([
            'name' => __($name, 'rb'),
            'desc' => $desc,
            'id' => $id . '_text_medium',
            'type' => 'text'
        ]);   
    }

    public function addTextArea($id, $name, $desc = '')
    {
        $this->cmbBox->add_field([
            'name' => __($name, 'rb'),
            'desc' => $desc,
            'id' => $id . '_textarea',
            'type' => 'textarea'
        ]);   
    }

    public function addUploadField($id, $name, $desc = '')
    {
        $this->cmbBox->add_field([
            'name' => __($name, 'rb'),
            'desc' => __($desc, 'rb'),
            'id' => $id . '_file_list',
            'type' => 'file',
            'preview_size' => [100, 100 ]
        ]);   
    }

    public function register()
    {

    }
}
