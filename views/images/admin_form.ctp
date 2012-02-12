<?php
    /**
     * Shop suppliers add/edit
     *
     * This page is used to add/edit suppliers for your products.
     *
     * Copyright (c) 2009 Carl Sutton ( dogmatic69 )
     *
     * Licensed under The MIT License
     * Redistributions of files must retain the above copyright notice.
     *
     * @filesource
     * @copyright     Copyright (c) 2009 Carl Sutton ( dogmatic69 )
     * @link          http://infinitas-cms.org
     * @package       shop
     * @subpackage    shop.views.suppliers.form
     * @license       http://www.opensource.org/licenses/mit-license.php The MIT License
     * @since 0.8a
     */

    echo $this->Form->create('Image', array('type' => 'file'));
        echo $this->Infinitas->adminEditHead();
			$tabs = array(
				__d('contents', 'Content', true),
				__d('contents', 'Author', true),
				__d('cms', 'Other Data', true)
			);

			$content = array(
				$this->element('content_form', array('plugin' => 'Contents', 'intro' => false)) . $this->Form->input('active') .
					$this->Form->input('image', array('type' => 'file')),
				$this->element('author_form', array('plugin' => 'Contents')),
				implode('', array($this->Form->input('id'),
					$this->Form->hidden('ContentConfig.id'), $this->element('meta_form', array('plugin' => 'Contents'))))
			);

			echo $this->Design->tabs($tabs, $content);
    echo $this->Form->end();
?>