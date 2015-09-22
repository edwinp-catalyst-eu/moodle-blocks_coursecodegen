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

class block_coursecodegen extends block_base {

	function init() {
		$this->title = get_string('coursecodegentitle', 'block_coursecodegen');
	}

	function get_content() {
		global $COURSE;

		$context = context_course::instance($COURSE->id);

        if (has_any_capability(
                array(
                    'mod/coursecodegen:viewallkeys',
                    'mod/coursecodegen:viewownkeys',
                    'mod/coursecodegen:viewschoolkeys',
                    'mod/coursecodegen:vieweconomics',
                    'mod/coursecodegen:viewsinglekeys',
                    'mod/coursecodegen:generatekeys'
                ), $context)) {

            $renderer = $this->page->get_renderer('block_coursecodegen');

			$this->content = new stdClass;
			$this->content->footer = '';
            $this->content->text = '';

            // print the link to create coursecodes
            if (has_capability('mod/coursecodegen:generatekeys', $context)) {
                $this->content->text .= $renderer->createcoursecodes();
            }

			// print link to view coursecodes
            if (has_any_capability(
                    array(
                        'mod/coursecodegen:viewallkeys',
                        'mod/coursecodegen:viewownkeys',
                        'mod/coursecodegen:viewschoolkeys'
                    ), $context)) {
                $this->content->text .= $renderer->viewcoursecodes();
            }

            // print link to view economy
            if (has_any_capability(
                    array(
                        'mod/coursecodegen:vieweconomics',
                        'mod/coursecodegen:viewowneconomy'
                    ), $context)) {
                $this->content->text .= $renderer->vieweconomy();
            }

			// write the turforlag admin links
            if (has_any_capability(
                    array(
                        'mod/coursecodegen:vieweconomics',
                        'mod/coursecodegen:viewsinglekeys'
                    ), $context)) {
                $this->content->text .= $renderer->turforlagadmin();

				// print link to view single codes
                if (has_capability('mod/coursecodegen:viewsinglekeys', $context)) {
                    $this->content->text .= $renderer->viewsinglecodes();
                }
            }

			if ($this->content !== null) {
				return $this->content;
			}
        }
    }
}
