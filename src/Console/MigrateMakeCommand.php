<?php

namespace DevSquad\Extensions\Console;

use Illuminate\Database\Console\Migrations\MigrateMakeCommand as BaseCommand;

class MigrateMakeCommand extends BaseCommand
{

    const BLANK = '/stubs/migration_blank.stub';
    const CREATE = '/stubs/migration_create.stub';
    const UPDATE = '/stubs/migration_update.stub';

    protected function getStub($table, $create)
    {
        if (is_null($table)) {
            return __DIR__ . self::BLANK;
        }

        return __DIR__ . ($create ? self::CREATE : self::UPDATE);
    }
}
