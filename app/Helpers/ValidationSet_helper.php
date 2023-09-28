<?php

/**
 * Helper method to change value of form data
 */
function radioCheck($data, $value, $useOld = false)
{
    if ($useOld) {
        if ($data == $useOld) {
            return 'checked';
        }
    }

    if ($data == $value) {
        return 'checked';
    }
}


function activeCheck($val)
{
    if ($val) {
        return $val;
    }
    return '';
}

function oldCheck($field, $value)
{
    if (old($field)) {
        return old($field);
    } else {
        return $value;
    }
}

function validCheck($errMsg)
{
    if ($errMsg) {
        return 'invalid';
    }

    return 'valid';
}

function selectCheck($data, $value, $old = false)
{
    if ($data == $value) {
        return 'selected';
    }
    if ($data == $old) {
        return 'selected';
    }
}

function errorMsgCheck($errMsg)
{
    if ($errMsg) {
        return 'data-error="' . $errMsg . '"';
    }
}

// ================= Flashdata Session function

/**
 * Helper method to create flashdata session to display 
 * alert with showAlert() call in view
 * 
 * $info = id of the record can be edited or information deleted;
 *
 * @param string $info
 *
 * @return SetAlert|null
 */
function setAlert($info = false)
{
    // dd($id);
    if ($info) {
        if ($info == 'delete') {
            session()->setFlashdata('alert', 'Deleted!');
        } else {
            session()->setFlashdata('alert', 'Updated!');
        }
    } else {
        session()->setFlashdata('alert', 'Saved!');
    }
}

/**
 * Helper method to shown alert after setAlert() is executed
 * 
 * Examples:
 *      showAlert(session()->getFlashdata('alert'), 'TableName');
 *
 * @param mixed $sessionData
 * @param string $tableName
 *
 * @return ShowAlert|null
 */
function showAlert($sessionData)
{
    if ($sessionData) {
        return '<span class="flash-data" data-flashdata="' . $sessionData . '">';
    }
}

/**
 * Helper method to create flashdata session to display 
 * modal with showModalValidation() call in view
 * 
 * Examples:
 *    setModalValidation($id, '#add-data-modal', '#add-data-edit');
 *    $id = id of the record can be edited;
 *
 * @param string $editModalLink
 * @param string $addModalLink
 * @param integer $id
 *
 * @return SetModalValidation|null
 */
function setModalValidation($editModalLink = false, $addModalLink = false, $id = false)
{
    if ($id) {
        session()->setFlashdata('showModal', $editModalLink . $id);
    } else {
        session()->setFlashdata('showModal', $addModalLink);
    }
}

/**
 * Helper method to display the modal after setModalValidation()
 * is executed and display the modal on the page
 * 
 * Examples:
 *    showModalValidation(session()->getFlashdata('showModal'));
 *
 * @param mixed $sessionData
 *
 * @return ShowModalValidation|null
 */
function showModalValidation($sessionData)
{
    if ($sessionData) {
        return '<span class="flash-data-modal" data-flashdata="' . $sessionData . '"></span>';
    }
}

// function special_chars($d)
// {
//     return htmlspecialchars($d);
// }
