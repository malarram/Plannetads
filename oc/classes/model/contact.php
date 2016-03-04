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

    const TYPE_DIRECT = 'direct';
    const TYPE_AD    = 'ad';
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
            'contact_type' => array(array('not_empty')),
            'contact_name' => array(),
            'contact_email' => array(array('not_empty'), array('max_length', array(':value', 150))),
            'contact_subject' => array(array('not_empty'), array('max_length', array(':value', 255))),
            'contact_message' => array(array('not_empty')),
            'contact_attachment' => array(),
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