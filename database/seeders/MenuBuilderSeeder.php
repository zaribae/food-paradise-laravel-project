<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuBuilderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin_menus = array(
            array('id' => '1', 'name' => 'main_menu', 'created_at' => '2024-06-13 21:56:00', 'updated_at' => '2024-06-13 21:56:00'),
            array('id' => '2', 'name' => 'footer_menu_short_link', 'created_at' => '2024-06-13 15:00:44', 'updated_at' => '2024-06-13 15:00:44'),
            array('id' => '3', 'name' => 'footer_menu_help_link', 'created_at' => '2024-06-13 15:01:16', 'updated_at' => '2024-06-13 15:01:16'),
            array('id' => '4', 'name' => 'footer_menu_bottom', 'created_at' => '2024-06-13 15:01:51', 'updated_at' => '2024-06-13 15:01:51')
        );

        $admin_menu_items = array(
            array('id' => '1', 'label' => 'Home', 'link' => '/', 'parent_id' => '0', 'sort' => '0', 'class' => NULL, 'menu_id' => '2', 'depth' => '0', 'created_at' => '2024-06-13 15:03:18', 'updated_at' => '2024-06-13 15:03:47'),
            array('id' => '2', 'label' => 'About Us', 'link' => '/about', 'parent_id' => '0', 'sort' => '1', 'class' => NULL, 'menu_id' => '2', 'depth' => '0', 'created_at' => '2024-06-13 15:03:46', 'updated_at' => '2024-06-13 15:15:10'),
            array('id' => '3', 'label' => 'Contact Us', 'link' => '/contact', 'parent_id' => '0', 'sort' => '2', 'class' => NULL, 'menu_id' => '2', 'depth' => '0', 'created_at' => '2024-06-13 15:04:09', 'updated_at' => '2024-06-13 15:15:10'),
            array('id' => '4', 'label' => 'Our Service', 'link' => '#', 'parent_id' => '0', 'sort' => '3', 'class' => NULL, 'menu_id' => '2', 'depth' => '0', 'created_at' => '2024-06-13 15:05:37', 'updated_at' => '2024-06-13 15:05:56'),
            array('id' => '5', 'label' => 'Gallery', 'link' => '#', 'parent_id' => '0', 'sort' => '4', 'class' => NULL, 'menu_id' => '2', 'depth' => '0', 'created_at' => '2024-06-13 15:05:54', 'updated_at' => '2024-06-13 15:14:38'),
            array('id' => '6', 'label' => 'Terms And Conditions', 'link' => '/terms-condition', 'parent_id' => '0', 'sort' => '2', 'class' => NULL, 'menu_id' => '3', 'depth' => '0', 'created_at' => '2024-06-13 15:52:45', 'updated_at' => '2024-06-13 15:55:45'),
            array('id' => '7', 'label' => 'Privacy Policy', 'link' => '/privacy-policy', 'parent_id' => '0', 'sort' => '3', 'class' => NULL, 'menu_id' => '3', 'depth' => '0', 'created_at' => '2024-06-13 15:53:13', 'updated_at' => '2024-06-13 15:55:45'),
            array('id' => '8', 'label' => 'Blogs', 'link' => '/blogs', 'parent_id' => '0', 'sort' => '0', 'class' => NULL, 'menu_id' => '3', 'depth' => '0', 'created_at' => '2024-06-13 15:53:27', 'updated_at' => '2024-06-13 15:55:24'),
            array('id' => '9', 'label' => 'Chefs', 'link' => '/chefs', 'parent_id' => '0', 'sort' => '1', 'class' => NULL, 'menu_id' => '3', 'depth' => '0', 'created_at' => '2024-06-13 15:53:39', 'updated_at' => '2024-06-13 15:55:45'),
            array('id' => '10', 'label' => 'FAQ', 'link' => '#', 'parent_id' => '0', 'sort' => '4', 'class' => NULL, 'menu_id' => '3', 'depth' => '0', 'created_at' => '2024-06-13 15:54:18', 'updated_at' => '2024-06-13 15:55:53'),
            array('id' => '11', 'label' => 'FAQ', 'link' => '#', 'parent_id' => '0', 'sort' => '0', 'class' => NULL, 'menu_id' => '4', 'depth' => '0', 'created_at' => '2024-06-13 15:58:53', 'updated_at' => '2024-06-13 16:00:32'),
            array('id' => '12', 'label' => 'Settings', 'link' => '/dashboard', 'parent_id' => '0', 'sort' => '1', 'class' => NULL, 'menu_id' => '4', 'depth' => '0', 'created_at' => '2024-06-13 16:00:31', 'updated_at' => '2024-06-13 16:00:42'),
            array('id' => '13', 'label' => 'Payment', 'link' => '#', 'parent_id' => '0', 'sort' => '2', 'class' => NULL, 'menu_id' => '4', 'depth' => '0', 'created_at' => '2024-06-13 16:00:41', 'updated_at' => '2024-06-13 16:01:00'),
            array('id' => '14', 'label' => 'Privacy Policy', 'link' => '/privacy-policy', 'parent_id' => '0', 'sort' => '4', 'class' => NULL, 'menu_id' => '4', 'depth' => '0', 'created_at' => '2024-06-13 16:00:59', 'updated_at' => '2024-06-13 16:00:59'),
            array('id' => '15', 'label' => 'Home', 'link' => '/home', 'parent_id' => '0', 'sort' => '0', 'class' => NULL, 'menu_id' => '1', 'depth' => '0', 'created_at' => '2024-06-13 16:05:54', 'updated_at' => '2024-06-13 16:06:08'),
            array('id' => '16', 'label' => 'About', 'link' => '/about', 'parent_id' => '0', 'sort' => '1', 'class' => NULL, 'menu_id' => '1', 'depth' => '0', 'created_at' => '2024-06-13 16:06:07', 'updated_at' => '2024-06-13 16:06:21'),
            array('id' => '17', 'label' => 'Menu', 'link' => '#', 'parent_id' => '0', 'sort' => '2', 'class' => NULL, 'menu_id' => '1', 'depth' => '0', 'created_at' => '2024-06-13 16:06:21', 'updated_at' => '2024-06-13 16:06:42'),
            array('id' => '18', 'label' => 'Chefs', 'link' => '/chefs', 'parent_id' => '0', 'sort' => '3', 'class' => NULL, 'menu_id' => '1', 'depth' => '0', 'created_at' => '2024-06-13 16:06:41', 'updated_at' => '2024-06-13 16:06:51'),
            array('id' => '19', 'label' => 'Blog', 'link' => '/blogs', 'parent_id' => '0', 'sort' => '11', 'class' => NULL, 'menu_id' => '1', 'depth' => '0', 'created_at' => '2024-06-13 16:07:09', 'updated_at' => '2024-06-13 16:12:02'),
            array('id' => '20', 'label' => 'Contact', 'link' => '/contact', 'parent_id' => '0', 'sort' => '12', 'class' => NULL, 'menu_id' => '1', 'depth' => '0', 'created_at' => '2024-06-13 16:07:21', 'updated_at' => '2024-06-13 16:12:02'),
            array('id' => '21', 'label' => 'Pages', 'link' => '#', 'parent_id' => '0', 'sort' => '4', 'class' => NULL, 'menu_id' => '1', 'depth' => '0', 'created_at' => '2024-06-13 16:07:39', 'updated_at' => '2024-06-13 16:07:47'),
            array('id' => '22', 'label' => 'Testimonial', 'link' => '/testimonials', 'parent_id' => '21', 'sort' => '7', 'class' => NULL, 'menu_id' => '1', 'depth' => '1', 'created_at' => '2024-06-13 16:08:15', 'updated_at' => '2024-06-13 16:11:12'),
            array('id' => '23', 'label' => 'Checkout', 'link' => '/checkout', 'parent_id' => '21', 'sort' => '5', 'class' => NULL, 'menu_id' => '1', 'depth' => '1', 'created_at' => '2024-06-13 16:09:07', 'updated_at' => '2024-06-13 16:10:08'),
            array('id' => '24', 'label' => 'Payment', 'link' => '#', 'parent_id' => '21', 'sort' => '6', 'class' => NULL, 'menu_id' => '1', 'depth' => '1', 'created_at' => '2024-06-13 16:10:07', 'updated_at' => '2024-06-13 16:11:01'),
            array('id' => '25', 'label' => 'Sign In', 'link' => '/login', 'parent_id' => '21', 'sort' => '8', 'class' => NULL, 'menu_id' => '1', 'depth' => '1', 'created_at' => '2024-06-13 16:10:59', 'updated_at' => '2024-06-13 16:11:12'),
            array('id' => '26', 'label' => 'Sign Out', 'link' => '/logout', 'parent_id' => '21', 'sort' => '10', 'class' => NULL, 'menu_id' => '1', 'depth' => '1', 'created_at' => '2024-06-13 16:11:20', 'updated_at' => '2024-06-13 16:12:02'),
            array('id' => '27', 'label' => 'Forgot Password', 'link' => '/forgot-password', 'parent_id' => '21', 'sort' => '9', 'class' => NULL, 'menu_id' => '1', 'depth' => '1', 'created_at' => '2024-06-13 16:11:52', 'updated_at' => '2024-06-13 16:27:17')
        );

        DB::table('admin_menus')->insert($admin_menus);
        DB::table('admin_menu_items')->insert($admin_menu_items);
    }
}
