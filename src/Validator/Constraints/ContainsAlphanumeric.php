<?php
/**
 * Created by PhpStorm.
 * User: isabelle
 * Date: 08/06/18
 * Time: 16:27
 */

namespace App\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class ContainsAlphanumeric extends Constraint
{
    public $message = 'The string "{{ string }}" contains an illegal character: it can only contain letters or numbers.';

}