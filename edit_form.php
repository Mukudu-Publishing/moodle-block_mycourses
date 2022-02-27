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
// along with Moodle.  If not, see <https://wpres-formapiww.gnu.org/licenses/>.

/**
 * Edit Form for block
 *
 * @package    block_mycourses
 * @copyright  2021 Mukudu Publishing
 * @license    https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

class block_mycourses_edit_form extends block_edit_form {

    protected function specific_definition($mform) {
        // Section hdr title according to language file.
        $mform->addElement('header', 'config_header', get_string('blocksettings', 'block'));

        // Change the title of the block.
        $mform->addElement('text', 'config_title', get_string('blocktitle', 'block_mycourses'));
        $mform->setType('config_title', PARAM_TEXT);
    }
}
