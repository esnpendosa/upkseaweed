<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserManagementTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test admin can access User list page in Filament admin panel.
     */
    public function test_admin_can_access_user_list_page(): void
    {
        $admin = User::factory()->create([
            'email' => 'admin@upkseaweed.id',
            'role' => 'admin',
        ]);

        $response = $this->actingAs($admin)->get('/admin/users');

        $response->assertStatus(200);
    }

    /**
     * Test editor cannot access User list page in Filament admin panel.
     */
    public function test_editor_cannot_access_user_list_page(): void
    {
        $editor = User::factory()->create([
            'email' => 'editor@upkseaweed.id',
            'role' => 'editor',
        ]);

        $response = $this->actingAs($editor)->get('/admin/users');

        $response->assertStatus(403);
    }

    /**
     * Test admin can access settings page, but editor cannot.
     */
    public function test_settings_page_access_control(): void
    {
        $admin = User::factory()->create([
            'role' => 'admin',
        ]);
        $editor = User::factory()->create([
            'role' => 'editor',
        ]);

        // Admin access Settings index
        $adminResponse = $this->actingAs($admin)->get('/admin/settings');
        $adminResponse->assertStatus(200);

        // Editor access Settings index
        $editorResponse = $this->actingAs($editor)->get('/admin/settings');
        $editorResponse->assertStatus(403);
    }

    /**
     * Test admin policy prevents self-deletion.
     */
    public function test_admin_cannot_delete_themselves(): void
    {
        $admin = User::factory()->create([
            'role' => 'admin',
        ]);

        $policy = new \App\Policies\UserPolicy();

        $this->assertFalse($policy->delete($admin, $admin));
    }

    /**
     * Test admin can delete other users.
     */
    public function test_admin_can_delete_other_users(): void
    {
        $admin = User::factory()->create([
            'role' => 'admin',
        ]);
        $otherUser = User::factory()->create([
            'role' => 'editor',
        ]);

        $policy = new \App\Policies\UserPolicy();

        $this->assertTrue($policy->delete($admin, $otherUser));
    }
}
