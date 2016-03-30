<?php

defined('SYSPATH') or die('No direct script access.');

/**
 * description...
 *
 * @author		Chema <chema@open-classifieds.com>
 * @package		OC
 * @copyright	(c) 2009-2013 Open Classifieds Team
 * @license		GPL v3
 *
 */
class Model_Attachment extends ORM {

    /**
     * Table name to use
     *
     * @access	protected
     * @var		string	$_table_name default [singular model name]
     */
    protected $_table_name = 'attachments';

    const ATTACHMENT_IMAGE = 'IMAGE';
    const ATTACHMENT_VIDEO = 'VIDEO';

    /**
     * Column to use as primary key
     *
     * @access	protected
     * @var		string	$_primary_key default [id_ad]
     */
    protected $_primary_key = 'atch_id';
    protected $_belongs_to = array(
        'user' => array('foreign_key' => 'atch_created_by'),
        'ad' => array('foreign_key' => 'id_ad'),
    );

    /**
     * Rule definitions for validation
     *
     * @return array
     */
    public function rules() {
        $rules = array(
            'atch_id' => array(array('numeric')),
            'id_ad' => array(array('not_empty'), array('numeric')),
            'atch_created_by' => array(array('numeric')),
            'atch_type' => array(array('not_empty')),
            'atch_path' => array(array('not_empty'))
        );

        return $rules;
    }

    /**
     * Label definitions for validation
     *
     * @return array
     */
    public function labels() {
        return array(
            'id_ad' => 'Attachment ID',
            'id_ad' => 'Ad ID',
            'atch_created_by' => __('User'),
            'atch_type' => __('Attachment Type'),
            'atch_path' => __('Attachment Path')
        );
    }

    /**
     * Gets all images
     * @return [array] [array with image names]
     */
    public function get_videos() {
        $videos = array();

        if ($this->loaded() AND $this->count_all() > 0) {
            foreach ($this as $i => $row) {
                if ($row['atch_type'] == self::ATTACHMENT_VIDEO) {
                    $videos[$i] = $row['atch_path'];
                }
            }
        }

        return $videos;
    }

    /**
     * save_image upload images with given path
     *
     * @param array image
     * @return bool
     */
    public function save_video($video,$id_ad) {
        $this->atch_path = $video;
        $this->id_ad = $id_ad;
        $this->atch_type = self::ATTACHMENT_VIDEO;
        $this->atch_created_ip = ip2long(Request::$client_ip);
        try {
            $this->save();
            return TRUE;
        } catch (Exception $e) {
            return FALSE;
        }
    }

}

// END Model_ad
