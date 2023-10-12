<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // Menu Utama
        $dashboard = Menu::firstOrCreate(['name' => 'Dashboard', 'url' => '/dashboard', 'parent_id' => null]);
        $users = Menu::firstOrCreate(['name' => 'Users', 'url' => '/users', 'parent_id' => null]);
        $settings = Menu::firstOrCreate(['name' => 'Settings', 'url' => '/settings', 'parent_id' => null]);
        $product = Menu::firstOrCreate(['name' => 'Product', 'url' => '/product', 'parent_id' => null]);
        $finance = Menu::firstOrCreate(['name' => 'Finance', 'url' => '/finance', 'parent_id' => null]);
        $report = Menu::firstOrCreate(['name' => 'Report', 'url' => '/report', 'parent_id' => null]);
        $stock = Menu::firstOrCreate(['name' => 'Stock', 'url' => '/stock', 'parent_id' => null]);

        // Submenu Users
        $allUsers = Menu::firstOrCreate(['name' => 'All Users', 'url' => '/users/all', 'parent_id' => $users->id]);
        $addUser = Menu::firstOrCreate(['name' => 'Add User', 'url' => '/users/add', 'parent_id' => $users->id]);
        $rolesPermissions = Menu::firstOrCreate(['name' => 'Roles & Permissions', 'url' => '/users/roles', 'parent_id' => $users->id]);

        // Submenu Settings
        $generalSettings = Menu::firstOrCreate(['name' => 'General Settings', 'url' => '/settings/general', 'parent_id' => $settings->id]);
        $companyInfo = Menu::firstOrCreate(['name' => 'Company Info', 'url' => '/settings/company', 'parent_id' => $settings->id]);
        $localization = Menu::firstOrCreate(['name' => 'Localization', 'url' => '/settings/localization', 'parent_id' => $settings->id]);

        // Submenu Product
        $manageProducts = Menu::firstOrCreate(['name' => 'Manage Products', 'url' => '/product/manage', 'parent_id' => $product->id]);
        $categories = Menu::firstOrCreate(['name' => 'Categories', 'url' => '/product/categories', 'parent_id' => $product->id]);

        // Submenu Finance
        $invoices = Menu::firstOrCreate(['name' => 'Invoices', 'url' => '/finance/invoices', 'parent_id' => $finance->id]);
        $payments = Menu::firstOrCreate(['name' => 'Payments', 'url' => '/finance/payments', 'parent_id' => $finance->id]);

        // Submenu Report
        $salesReport = Menu::firstOrCreate(['name' => 'Sales Report', 'url' => '/report/sales', 'parent_id' => $report->id]);
        $financialReport = Menu::firstOrCreate(['name' => 'Financial Report', 'url' => '/report/financial', 'parent_id' => $report->id]);

        // Submenu Stock
        $inventory = Menu::firstOrCreate(['name' => 'Inventory', 'url' => '/stock/inventory', 'parent_id' => $stock->id]);
        $orders = Menu::firstOrCreate(['name' => 'Orders', 'url' => '/stock/orders', 'parent_id' => $stock->id]);
        $receipts = Menu::firstOrCreate(['name' => 'Receipts', 'url' => '/stock/receipts', 'parent_id' => $stock->id]);
        $adjustments = Menu::firstOrCreate(['name' => 'Adjustments', 'url' => '/stock/adjustments', 'parent_id' => $stock->id]);


        $menus = \App\Models\Menu::all();
        foreach ($menus as $menu) {
            $permissions = str_replace(' ', '_', strtolower($menu->name));
            $menu->update(['permissions' => $permissions]);
        }
    }
}
