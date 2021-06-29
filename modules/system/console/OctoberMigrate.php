<?php namespace System\Console;

use Illuminate\Console\Command;
use System\Classes\UpdateManager;
use Symfony\Component\Console\Input\InputOption;

/**
 * OctoberMigrate migrates the database up or down.
 *
 * This builds up all database tables that are registered for October CMS and all plugins.
 *
 * @package october\system
 * @author Alexey Bobkov, Samuel Georges
 */
class OctoberMigrate extends Command
{
    /**
     * @var string name of console command
     */
    protected $name = 'october:migrate';

    /**
     * @var string description of the console command
     */
    protected $description = 'Builds database tables for October CMS and all plugins.';

    /**
     * handle executes the console command
     */
    public function handle()
    {
        if ($this->option('rollback')) {
            return $this->handleRollback();
        }

        $this->output->writeln('<info>Migrating application and plugins...</info>');

        UpdateManager::instance()
            ->setNotesOutput($this->output)
            ->update()
        ;
    }

    /**
     * handleRollback performs a database rollback
     */
    protected function handleRollback()
    {
        if (!$this->confirm('This will DESTROY all database tables.')) {
            return;
        }

        UpdateManager::instance()
            ->setNotesOutput($this->output)
            ->uninstall()
        ;
    }

    /**
     * getOptions get the console command options
     */
    protected function getOptions()
    {
        return [
            ['rollback', null, InputOption::VALUE_NONE, 'Destroys all database tables and records.'],
        ];
    }
}
