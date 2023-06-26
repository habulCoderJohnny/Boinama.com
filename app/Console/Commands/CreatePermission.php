<?php

namespace App\Console\Commands;

use App\Models\Module;
use App\Models\Permission;
use Illuminate\Console\Command;
use Illuminate\Support\Str;

class CreatePermission extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'permission:init';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get all routes name from web.php and create permission for each route name';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $routesArray = getAllRoutesInArray();
        foreach ($routesArray as $key => $route) {
            $moduleId = $this->createModule($key);
            $this->createPermission($route, $moduleId);
        }
        $this->info('Permission created successfully.');
        return 0;

    }
    public function createModule($moduleName)
    {
        $moduleId = Module::updateOrCreate([
            'name' => str_replace("/", "", $moduleName),
            "slug" => Str::slug($moduleName),
        ]);

        return $moduleId->id;
    }
    public function createPermission($route, $moduleId)
    {
        foreach ($route as $key => $value) {
            Permission::updateOrCreate([
                'module_id' => $moduleId,
                'name' => $value['name'],
                'slug' => Str::slug($value['name']),
            ]);
        }
    }
}
