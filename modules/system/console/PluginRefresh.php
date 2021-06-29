<?php namespace System\Console;

use Illuminate\Console\Command;
use System\Classes\UpdateManager;
use System\Classes\PluginManager;
use Symfony\Component\Console\Input\InputArgument;
use InvalidArgumentException;

/**
 * PluginRefresh refreshes a plugin.
 *
 * This destroys all database tables for a specific plugin, then builds them up again.
 * It is a great way for developers to debug and develop new plugins.
 *
 * @package october\system
 * @author Alexey Bobkov, Samuel Georges
 */
class PluginRefresh extends Command
{
    /**
     * @var string name of console command
     */
    protected $name = 'plugin:refresh';

    /**
     * @var string description of the console command
     */
    protected $description = 'Removes and re-adds an existing plugin.';

    /**
     * handle executes the console command
     */
    public function handle()
    {
        $manager = PluginManager::instance();
        $name = $manager->normalizeIdentifier($this->argument('name'));

        // Lookup
        if (!$manager->hasPlugin($name)) {
            return $this->output->error("Unable to find plugin '${name}'");
        }

        // Rollback plugin migration
        $manager = UpdateManager::instance()->setNotesOutput($this->output);
        $manager->rollbackPlugin($name);

        // Rerun migration
        $this->output->writeln('<info>Reinstalling plugin...</info>');
        $manager->updatePlugin($name);
    }

    /**
     * getArguments get the console command arguments
     */
    protected function getArguments()
    {
        return [
            ['name', InputArgument::REQUIRED, 'The name of the plugin. Eg: AuthorName.PluginName'],
        ];
    }
}
