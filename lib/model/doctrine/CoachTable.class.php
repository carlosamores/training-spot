<?php

/**
 * CoachTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class CoachTable extends AbstractPersonTable
{
    /**
     * Returns an instance of this class.
     *
     * @return object CoachTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('Coach');
    }
}