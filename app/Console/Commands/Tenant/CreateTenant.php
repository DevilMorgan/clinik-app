<?php

namespace App\Console\Commands\Tenant;

use App\Models\Tenant\Autorization\Module;
use App\Models\Tenant\Autorization\Role;
use App\Models\Tenant\CardType;
use App\Models\Tenant\User;
use Hyn\Tenancy\Database\Connection;
use Hyn\Tenancy\Environment;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use Hyn\Tenancy\Models\Hostname;
use Hyn\Tenancy\Models\Website;
use Hyn\Tenancy\Repositories\HostnameRepository;
use Hyn\Tenancy\Repositories\WebsiteRepository;

class CreateTenant extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tenant:create {fqdn} {name} {email} {password}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Given a unique tenant name, creates a new tenant in the system.';

    /**
     * @var Connection
     */
    private $connection;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // This will be the complete website name (tenantUser.mysite.com)
        $fqdn = sprintf('%s.%s', $this->argument('fqdn'),'clinik-app.test');
        //dd(env('APP_DOMAIN'));

        // The website object will save the tenant instance information
        // I recommend to use something random for security reasons
        $website = new Website;
        $website->uuid = Str::random(10);
        app(WebsiteRepository::class)->create($website);


        // The hostname object will save the tenant hosting information, and will be related to the previous created software.
        $hostname = new Hostname;
        $hostname->fqdn = $fqdn;
        $hostname = app(HostnameRepository::class)->create($hostname);

        app(HostnameRepository::class)->attach($hostname, $website);


        //(new RouteProvider(app()))->boot();
        app(Environment::class)->hostname($hostname);

        $user = User::query()->find(1)->first();

        //update
        $user->email = $this->argument('email');
        $user->name = $this->argument('name');

        $user->save();

        return Command::SUCCESS;
    }
}
