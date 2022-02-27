<?php
// This file is part of Moodle - https://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <https://www.gnu.org/licenses/>.

/**
 * New Activity Block Class
 *
 * @package    block_mycourses
 * @copyright  2021 Mukudu Publishing
 * @license    https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

class block_mycourses extends block_list {

    public function init() {
        $this->title = get_string('pluginname', 'block_mycourses');
    }

    public function applicable_formats() {
        return array(
            'my' => true,
        );
    }

    public function get_content() {
        // Check if content has already been generated.
        if ($this->content !== null) {
            return $this->content;
        }
        // Define the content object.
        $this->content = new stdClass;
        $this->content->footer = '';
        $this->content->items = array();
        $this->content->icons = array();

        //Get All the courses that this user is enrolled on.
        if ($mycourses = enrol_get_my_courses()) {
            foreach ($mycourses as $mycourse) {
                $this->content->items[] = $mycourse->fullname;
            }
        }

        // Message if the user is editing the page.
        if ($this->page->user_is_editing()) {
            $this->content->footer .= '<br/>' . html_writer::tag('div', get_string('editingmessage', 'block_mycourses'));
        }
    }

    public function specialization() {
        if (isset($this->config)) {
            if (!empty($this->config->title)) {
                $this->title = $this->config->title;
            }
        }
    }
}
