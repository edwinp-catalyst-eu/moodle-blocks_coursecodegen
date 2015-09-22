<?php
// This file is part of Moodle - http://moodle.org/
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
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * @package    block_coursecodegen
 * @copyright  1999 onwards Martin Dougiamas (http://dougiamas.com)
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

class block_coursecodegen_renderer extends plugin_renderer_base {

    public function createcoursecodes() {
        global $CFG;

        $html  = html_writer::link($CFG->wwwroot . '/mod/coursecodegen/index.php',
                get_string('createcoursecodes', 'block_coursecodegen'));
        $html .= html_writer::empty_tag('br');

        return $html;
    }

    public function viewcoursecodes() {
        global $CFG;

        $html  = html_writer::link($CFG->wwwroot . '/mod/coursecodegen/viewgroup.php',
                get_string('viewgroupcodes', 'block_coursecodegen'));
        $html .= html_writer::empty_tag('br');

        return $html;
    }

    public function vieweconomy() {
        global $CFG;

        return html_writer::link($CFG->wwwroot . '/mod/coursecodegen/economy.php',
                get_string('vieweconomics', 'block_coursecodegen'));
    }

    public function turforlagadmin() {

        $html  = html_writer::empty_tag('br');
        $html .= html_writer::empty_tag('br');
        $html .= get_string('turforlagadmin', 'block_coursecodegen');

        return $html;
    }

    public function viewsinglecodes() {
        global $CFG;

        $html  = html_writer::empty_tag('br');
        $html .= html_writer::link($CFG->wwwroot . '/mod/coursecodegen/viewsingle.php',
                get_string('viewsinglecodes', 'block_coursecodegen'));

        return $html;
    }
}
