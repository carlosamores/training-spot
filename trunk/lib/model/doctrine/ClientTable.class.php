<?php

/**
 * ClientTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class ClientTable extends AbstractPersonTable
{
    /**
     * Returns an instance of this class.
     *
     * @return object ClientTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('Client');
    }
}