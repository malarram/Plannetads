<?php

defined('SYSPATH') or die('No direct script access.');

/**
 * description...
 *
 * @author		Chema <chema@open-classifieds.com>
 * @package		OC
 * @copyright	(c) 2009-2013 Open Classifieds Team
 * @license		GPL v3
 * *
 */
class Model_Contact extends ORM {

    /**
     * Table name to use
     *
     * @access	protected
     * @var		string	$_table_name default [singular model name]
     */
    protected $_table_name = 'contacts';

    /**
     * Column to use as primary key
     *
     * @access	protected
     * @var		string	$_primary_key default [id]
     */
    protected $_primary_key = 'id_contact';

    /**
     * Rule definitions for validation
     *
     * @return array
     */
    public function rules() {
        return array(
            'id_contact' => array(array('numeric')),
            'contact_type' => array(array('not_empty'), array('max_length', array(':value', 145)),),
            'contact_name' => array(),
            'contact_email' => array(),
            'contact_subject' => array(),
            'contact_message' => array(array('not_empty'), array('max_length', array(':value', 145)),),
            'contact_attachment' => array(),
            'created_at' => array(),
            'status' => array(),
        );
    }

    /**
     * Label definitions for validation
     *
     * @return array
     */
    public function labels() {
        return array(
            'id_contact' => __('Id'),
            'contact_type' => __('Type'),
            'contact_name' => __('Name'),
            'contact_email' => __('Email'),
            'contact_subject' => __('Subject'),
            'contact_message' => __('Subject'),
            'contact_attachment' => __('Attachment'),
            'created_at' => __('Created'),
            'status' => __('Status'),
        );
    }

}

// END Model_Contact