<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Pluralizer;

class MakeRepository extends Command
{
    /**
     * Filesystem instance
     *
     * @var Filesystem
     */
    protected $files;

    /**
     * Create a new command instance.
     */
    public function __construct(Filesystem $files)
    {
        parent::__construct();

        $this->files = $files;
    }

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:repo {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a Repository';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $path = $this->getSourceFilePath();

        $this->makeDirectory(dirname($path));

        $contents = $this->getSourceFile();

        if (! $this->files->exists($path)) {
            $this->files->put($path, $contents);
            $this->info("File : {$path} created");
        } else {
            $this->info("File : {$path} already exits");
        }
    }

    /**
     * Return the Singular Capitalize Name
     */
    public function getSingularClassName($name): string
    {

        return ucwords(Pluralizer::singular($name));
    }

    /**
     **
     * Map the stub variables present in stub to its value
     *
     * @return array
     */
    public function getStubVariables()
    {
        $name = $this->argument('name');
        $namespace = 'App\Repositories';
        if (strpos($name, '/')) {
            $data = explode('/', $name);
            $name = $data[count($data) - 1];
            unset($data[count($data) - 1]);
            $namespace .= '\\'.implode('\\', $data);
        }

        return [
            'namespace' => $namespace,
            'class' => $name,
            'rootNamespace' => 'App\\',
        ];
    }

    /**
     * Get the stub path and the stub variables
     *
     * @return bool|mixed|string
     */
    public function getSourceFile()
    {
        return $this->getStubContents($this->getStub(), $this->getStubVariables());
    }

    protected function getDefaultNamespace($rootNamespace): string
    {
        return $rootNamespace.'/App/Repositories/';
    }

    protected function getStub(): string
    {
        return base_path().'/stubs/repositories.stub';
    }

    /**
     * Replace the stub variables(key) with the desire value
     */
    public function getStubContents($stub, array $stubVariables = []): string|array|bool
    {
        $contents = file_get_contents($stub);

        foreach ($stubVariables as $search => $replace) {
            $contents = str_replace('{{ '.$search.' }}', $replace, $contents);
        }

        return $contents;
    }

    /**
     * Get the full path of generate class
     *
     * @return string
     */
    public function getSourceFilePath()
    {
        return base_path('app/Repositories').'/'.$this->getSingularClassName($this->argument('name')).'.php';
    }

    /**
     * Build the directory for the class if necessary.
     *
     * @param  string  $path
     * @return string
     */
    protected function makeDirectory($path)
    {
        if (! $this->files->isDirectory($path)) {
            $this->files->makeDirectory($path, 0777, true, true);
        }

        return $path;
    }
}
