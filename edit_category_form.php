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
 * Defines the editing form for the category question type.
 *
 * @package    qtype
 * @subpackage category
 * @copyright  2020 Marcus Green

 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */


defined('MOODLE_INTERNAL') || die();


/**
 * category question editing form definition.
 *
 * @copyright  2020 Marcus Green

 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class qtype_category_edit_form extends question_edit_form {

    protected function definition_inner($mform) {
     // $repeatarray[] = $mform->createElement('hidden', 'optionid', 0);

      $repeatel = $mform->createElement('text', 'group', get_string('group', 'qtype_category'));
      $this->repeat_elements([$repeatel], 2, [],
      'notestclass', 'addtestclasses',1,'Add another group',true);

      $mform->setType('group', PARAM_INT);

    //  function repeat_elements($elementobjs, $repeats, $options, $repeathiddenname,
    //  $addfieldsname, $addfieldsno=5, $addstring=null, $addbuttoninside=false){

      // $this->repeat_elements($repeatarray, $repeatno,
      // $repeateloptions, 'option_repeats', 'option_add_fields', 3, null, true);
        // To add combined feedback (correct, partial and incorrect).
        $this->add_combined_feedback_fields(true);
        // Adds hinting features.
        $this->add_interactive_settings(true, true);
    }

    protected function data_preprocessing($question) {
        $question = parent::data_preprocessing($question);
        $question = $this->data_preprocessing_hints($question);

        return $question;
    }

    public function qtype() {
        return 'category';
    }
}