<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class ConfigureFilamentResources extends Command
{
    protected $signature = 'filament:configure-resources';
    protected $description = 'Configure all Filament resources with role-based access and navigation groups';

    private $adminResources = [
        'UserResource' => ['group' => 'User Management', 'icon' => 'heroicon-o-users', 'sort' => 1],
        'MembershipPlanResource' => ['group' => 'Membership Management', 'icon' => 'heroicon-o-ticket', 'sort' => 1],
        'MembershipPaymentResource' => ['group' => 'Financial Management', 'icon' => 'heroicon-o-credit-card', 'sort' => 1],
        'TransactionResource' => ['group' => 'Financial Management', 'icon' => 'heroicon-o-currency-dollar', 'sort' => 2],
        'RevenueCategoryResource' => ['group' => 'Financial Management', 'icon' => 'heroicon-o-rectangle-stack', 'sort' => 3],
        'ProductResource' => ['group' => 'Store Management', 'icon' => 'heroicon-o-building-storefront', 'sort' => 1],
        'ProductBrandResource' => ['group' => 'Store Management', 'icon' => 'heroicon-o-tag', 'sort' => 2],
        'ProductCategoryResource' => ['group' => 'Store Management', 'icon' => 'heroicon-o-rectangle-stack', 'sort' => 3],
        'PromotionResource' => ['group' => 'Store Management', 'icon' => 'heroicon-o-megaphone', 'sort' => 4],
        'ScheduleResource' => ['group' => 'Schedule Management', 'icon' => 'heroicon-o-clipboard-document-list', 'sort' => 1],
        'ScheduleAssignmentResource' => ['group' => 'Schedule Management', 'icon' => 'heroicon-o-clipboard-document-check', 'sort' => 2],
        'WorkoutScheduleRequestResource' => ['group' => 'Schedule Management', 'icon' => 'heroicon-o-bell-alert', 'sort' => 3],
        'ServicesResource' => ['group' => 'Content Management', 'icon' => 'heroicon-o-hand-thumb-up', 'sort' => 1],
        'SliderImageResource' => ['group' => 'Content Management', 'icon' => 'heroicon-o-newspaper', 'sort' => 2],
        'OurTeamResource' => ['group' => 'Content Management', 'icon' => 'heroicon-o-user-group', 'sort' => 3],
        'BlogPostResource' => ['group' => null, 'icon' => 'heroicon-o-pencil-square', 'sort' => null],
        'BookingResource' => ['group' => null, 'icon' => 'heroicon-o-calendar-days', 'sort' => null],
        'GalleryResource' => ['group' => null, 'icon' => 'heroicon-o-camera', 'sort' => null],
    ];

    private $userPages = [
        'MyProfile' => ['icon' => 'heroicon-o-user-circle', 'group' => 'My Account', 'sort' => 1],
        'MyOrders' => ['icon' => 'heroicon-o-shopping-cart', 'group' => 'My Account', 'sort' => 2],
        'MyPayments' => ['icon' => 'heroicon-o-credit-card', 'group' => 'My Account', 'sort' => 3],
        'MySchedules' => ['icon' => 'heroicon-o-clipboard-document-check', 'group' => 'My Account', 'sort' => 4],
        'MyBookings' => ['icon' => 'heroicon-o-calendar-days', 'group' => 'My Account', 'sort' => 5],
        'MyWorkoutLogs' => ['icon' => 'heroicon-o-bolt', 'group' => 'My Account', 'sort' => 6],
    ];

    public function handle()
    {
        $this->info('Configuring Filament resources and pages...');
        $this->newLine();

        $resourcePath = app_path('Filament/Resources');
        $pagesPath = app_path('Filament/Pages');

        foreach ($this->adminResources as $resourceName => $config) {
            $this->configureAdminResource($resourcePath . '/' . $resourceName . '.php', $config);
        }

        $this->newLine();
        $this->info('Configuring user pages...');
        $this->newLine();

        foreach ($this->userPages as $pageName => $config) {
            $this->configureUserPage($pagesPath . '/' . $pageName . '.php', $config);
        }

        $this->newLine();
        $this->info('✓ All resources and pages configured successfully!');

        return Command::SUCCESS;
    }

    private function configureAdminResource($filePath, $config)
    {
        if (!File::exists($filePath)) {
            $this->warn("× Skipping {$filePath} (not found)");
            return;
        }

        $content = File::get($filePath);

        // Add AdminOnlyResource trait import if not exists
        if (!str_contains($content, 'use App\Filament\Traits\AdminOnlyResource;')) {
            $content = str_replace(
                "use Filament\Resources\Resource;",
                "use Filament\Resources\Resource;\nuse App\Filament\Traits\AdminOnlyResource;",
                $content
            );
        }

        // Add trait usage if not exists
        if (!str_contains($content, 'use AdminOnlyResource;')) {
            // Find class declaration and add trait after opening brace
            $pattern = '/(class\s+\w+\s+extends\s+Resource\s*\{)/';
            $replacement = "$1\n    use AdminOnlyResource;\n";
            $content = preg_replace($pattern, $replacement, $content);
        }

        // Configure navigation icon
        if ($config['icon'] && !str_contains($content, "protected static ?string \$navigationIcon")) {
            $pattern = '/(protected static \?string \$model = .*?;)/s';
            $replacement = "$1\n\n    protected static ?string \$navigationIcon = '{$config['icon']}';";
            $content = preg_replace($pattern, $replacement, $content);
        }

        // Configure navigation group
        if ($config['group'] && !str_contains($content, "protected static ?string \$navigationGroup")) {
            $pattern = '/(protected static \?string \$navigationIcon.*?;)/s';
            $replacement = "$1\n\n    protected static ?string \$navigationGroup = '{$config['group']}';";
            $content = preg_replace($pattern, $replacement, $content);
        }

        // Configure navigation sort
        if ($config['sort'] && !str_contains($content, "protected static ?int \$navigationSort")) {
            $pattern = '/(protected static \?string \$navigationGroup.*?;)/s';
            $replacement = "$1\n\n    protected static ?int \$navigationSort = {$config['sort']};";
            $content = preg_replace($pattern, $replacement, $content);
        }

        File::put($filePath, $content);
        $this->info("✓ Configured " . basename($filePath));
    }

    private function configureUserPage($filePath, $config)
    {
        if (!File::exists($filePath)) {
            $this->warn("× Skipping {$filePath} (not found)");
            return;
        }

        $content = File::get($filePath);

        // Add App\Enums\Role import if not exists
        if (!str_contains($content, 'use App\Enums\Role;')) {
            $content = str_replace(
                "use Filament\Pages\Page;",
                "use App\Enums\Role;\nuse Filament\Pages\Page;",
                $content
            );
        }

        // Configure navigation icon
        if ($config['icon'] && !str_contains($content, "protected static ?string \$navigationIcon")) {
            $pattern = '/(class\s+\w+\s+extends\s+Page\s*\{)/';
            $replacement = "$1\n    protected static ?string \$navigationIcon = '{$config['icon']}';";
            $content = preg_replace($pattern, $replacement, $content);
        }

        // Configure navigation group
        if ($config['group'] && !str_contains($content, "protected static ?string \$navigationGroup")) {
            $pattern = '/(protected static \?string \$navigationIcon.*?;)/s';
            $replacement = "$1\n\n    protected static ?string \$navigationGroup = '{$config['group']}';";
            $content = preg_replace($pattern, $replacement, $content);
        }

        // Configure navigation sort
        if ($config['sort'] && !str_contains($content, "protected static ?int \$navigationSort")) {
            $pattern = '/(protected static \?string \$navigationGroup.*?;)/s';
            $replacement = "$1\n\n    protected static ?int \$navigationSort = {$config['sort']};";
            $content = preg_replace($pattern, $replacement, $content);
        }

        // Add access control methods if not exists
        if (!str_contains($content, 'public static function shouldRegisterNavigation')) {
            $pattern = '/(protected static string \$view = .*?;)/s';
            $replacement = "$1\n\n    public static function shouldRegisterNavigation(): bool\n    {\n        return auth()->check() && auth()->user()->role !== Role::admin;\n    }\n\n    public static function canAccess(): bool\n    {\n        return auth()->check();\n    }";
            $content = preg_replace($pattern, $replacement, $content);
        }

        File::put($filePath, $content);
        $this->info("✓ Configured " . basename($filePath));
    }
}
