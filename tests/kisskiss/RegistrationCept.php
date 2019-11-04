<?php


class RegistrationCept
{
    public function _before(KisskissTester $I)
    {
    }

    public function tryTest(KisskissTester $I)
    {
        $I->amOnPage('/');
    }
}