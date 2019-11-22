<?php

use Illuminate\Database\Seeder;
use App\MagicDoor\Models\Role;
use App\MagicDoor\Models\Permission;

class MagicDoorTablesSeeder extends Seeder
{
    //Permission list for Admin Panel
    private $userPermissionList = [
        'user-list',
        'user-show',
        'user-create',
        'user-edit',
        'user-delete',
    ];

    private $menuPermissionList = [
        'menu-list',
        'menu-show',
        'menu-create',
        'menu-edit',
        'menu-delete',
    ];

    private $rolePermissionList = [
        'role-list',
        'role-show',
        'role-create',
        'role-edit',
        'role-delete',
    ];

    private $permissionPermissionList = [
        'permission-list',
        'permission-show',
        'permission-create',
        'permission-edit',
        'permission-delete',
    ];

    private $customerPermissionList = [
        'customer-list',
        'customer-show',
        'customer-create',
        'customer-edit',
        'customer-delete',
    ];

    private $ticketPermissionList = [
        'ticket-list',
        'ticket-show',
        'ticket-create',
        'ticket-edit',
        'ticket-delete',
    ];


    //Permission List for customer-panel

    /**
     * Run the database seeds for Roles and Permissions.
     *
     * @return void
     */
    public function run()
    {
        //Create the main roles
        $roleAdminPanel = Role::create(['name' => 'admin-panel']); //Allows user access to the Admin Panel
        $roleCustomerPanel = Role::create(['name' => 'customer-panel']); //Allows user to access to the Customer Panel
        $roleSuperAdmin = Role::create(['name' => 'super-admin']); //Makes user a superAdmin
        $roleConfig = Role::create(['name' => 'config']); //Grants config permissions
        $roleUser = Role::create(['name' => 'user']); //Grants user permissions
        $roleMenu = Role::create(['name' => 'menu']); //Grants menu permissions
        $roleRole = Role::create(['name' => 'role']); //Grants role permissions
        $rolePermission = Role::create(['name' => 'permission']); //Grants permission permissions
        $roleCustomer = Role::create(['name' => 'customer']); //Grants customer Permissions
        $roleTicket = Role::create(['name' => 'ticket']); //Grants ticket Permissions
        $roleTicketCustomer = Role::create(['name' => 'customer-ticket']);

        //Create the permissions for every section
        $userPermissions = $this->createPermissions($this->userPermissionList);
        $menuPermissions = $this->createPermissions($this->menuPermissionList);
        $rolePermissions = $this->createPermissions($this->rolePermissionList);
        $permissionPermissions = $this->createPermissions($this->permissionPermissionList);
        $customerPermissions = $this->createPermissions($this->customerPermissionList);
        $ticketPermissions = $this->createPermissions($this->ticketPermissionList);
        $ticketCustomerPermissions = $ticketPermissions;

        //Assign permissions to roles
        $roleUser->syncPermissions ($userPermissions);
        $roleMenu->syncPermissions ($menuPermissions);
        $roleRole->syncPermissions ($rolePermissions);
        $rolePermission->syncPermissions ($permissionPermissions);
        $roleCustomer->syncPermissions ($customerPermissions);
        $roleTicket->syncPermissions ($ticketPermissions);
        $roleTicketCustomer->syncPermissions ($ticketCustomerPermissions);
    }

    /**
     * Given an array of permissions, create and return them
     * @param $values
     * @return array
     */
    public function createPermissions($values){
        $collection = array();
        foreach ($values as $v){
            $collection[] = Permission::create(['name' => $v]);
        }
        return $collection;
    }
}
