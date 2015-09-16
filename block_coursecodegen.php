<?php

class block_coursecodegen extends block_base {

	function init() {
		$this->title = get_string('coursecodegentitle', 'block_coursecodegen');
		$this->version = 20120720;
	}

	function get_content() {
		global $USER, $CFG, $COURSE;

		$context = get_context_instance(CONTEXT_COURSE, $COURSE->id);

		if ((has_capability('mod/coursecodegen:viewallkeys', $context)) or
			(has_capability('mod/coursecodegen:viewownkeys', $context)) or
			(has_capability('mod/coursecodegen:viewschoolkeys', $context)) or
			(has_capability('mod/coursecodegen:vieweconomics', $context)) or
			(has_capability('mod/coursecodegen:viewsinglekeys', $context)) or
			(has_capability('mod/coursecodegen:generatekeys', $context))) {

			$this->content = new stdClass;
			$this->content->footer = '';

			// print the link to create coursecode
			if (has_capability('mod/coursecodegen:generatekeys', $context)) {
				$this->content->text = '<a href="'.$CFG->wwwroot.'/mod/coursecodegen/index.php">'.get_string('createcoursecodes', 'block_coursecodegen').'</a><br />';
			}

			// print link to view coursecodes
			if ((has_capability('mod/coursecodegen:viewallkeys', $context)) or
				(has_capability('mod/coursecodegen:viewownkeys', $context)) or
				(has_capability('mod/coursecodegen:viewschoolkeys', $context))) {

				$this->content->text .= '<a href="'.$CFG->wwwroot.'/mod/coursecodegen/viewgroup.php">'.get_string('viewgroupcodes', 'block_coursecodegen').'</a><br />';
			}
			
				// print link to view economy
				if ((has_capability('mod/coursecodegen:vieweconomics', $context)) or
					(has_capability('mod/coursecodegen:viewowneconomy', $context))
				) {
					$this->content->text .= '<a href="'.$CFG->wwwroot.'/mod/coursecodegen/economy.php">'.get_string('vieweconomics', 'block_coursecodegen').'</a>';
				}
				
				
			// write the turforlag admin links
			if ((has_capability('mod/coursecodegen:vieweconomics', $context)) or
				(has_capability('mod/coursecodegen:viewsinglekeys', $context))) {
				$this->content->text .= "<br /><br />TUR Forlag admin:";


				// print link to view single codes
				if (has_capability('mod/coursecodegen:viewsinglekeys', $context)) {
					$this->content->text .= '<br /><a href="'.$CFG->wwwroot.'/mod/coursecodegen/viewsingle.php">'.get_string('viewsinglecodes', 'block_coursecodegen').'</a>';
				}

			}

			if ($this->content !== null) {
				return $this->content;
			}
		}
	}
}

?>