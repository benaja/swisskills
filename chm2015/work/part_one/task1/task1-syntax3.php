<?php

/**
 * Swiss Competition 2015 - Trade 17 - Web Design
 *
 * PHP Errors: Syntax Error 3
 *
 * @todo In the code below there is a syntax error hidden.
 *       Find and fix it.
 */

class NoGrades_Exception expends Exception{}

class Student
{
    protected $student_id;
    protected $student_name;

    private $grades = [];

    public function __construct($id, $name)
    {
        $this->student_id = (int)$id;
        $this->student_name = (string)$name;
    }

    public function equals(Student $student)
    {
        return ($this->getId() == $student->getId());
    }

    public function addGrade($grade)
    {
        $grade = (int)$grade;
        if($grade >=1 && $grade <= 6) {
             $this->grades[] = $grade;

             return true;
        }

        return false;
    }

    public function hasPassed()
    {
        if (count($this->grades) === 0) {
            throw new NoGrades_Exception("The student $this has no grades.");
        }
        if ((array_sum($this->grades)/count($this->grades)) >= 4) return true;
        return false;
    }

    public function getId()
    {
        return $this->student_id;
    }

    public function getName()
    {
        return $this->student_name;
    }

    public function __toString()
    {
        return 'Student [id=' . $this->getId() .
            ', name=' . $this->getName() . ']';
    }
}

$student = new Student('123412', 'pb');
$student->addGrade(4);
$student->addGrade(5);
$passed = $student->hasPassed();
