<?php

return array(
    // Documentation menu
    'documentation' => array(
        // Getting Started
        array(
            'heading' => 'Getting Started',
        ),

        // Overview
        array(
            'title' => 'Overview',
            'path' => 'documentation/getting-started/overview',
        ),

        // Build
        array(
            'title' => 'Build',
            'path' => 'documentation/getting-started/build',
        ),

        array(
            'title' => 'Multi-demo',
            'attributes' => array("data-kt-menu-trigger" => "click"),
            'classes' => array('item' => 'menu-accordion'),
            'sub' => array(
                'class' => 'menu-sub-accordion',
                'items' => array(
                    array(
                        'title' => 'Overview',
                        'path' => 'documentation/getting-started/multi-demo/overview',
                        'bullet' => '<span class="bullet bullet-dot"></span>',
                    ),
                    array(
                        'title' => 'Build',
                        'path' => 'documentation/getting-started/multi-demo/build',
                        'bullet' => '<span class="bullet bullet-dot"></span>',
                    ),
                ),
            ),
        ),

        // File Structure
        array(
            'title' => 'File Structure',
            'path' => 'documentation/getting-started/file-structure',
        ),

        // Customization
        array(
            'title' => 'Customization',
            'attributes' => array("data-kt-menu-trigger" => "click"),
            'classes' => array('item' => 'menu-accordion'),
            'sub' => array(
                'class' => 'menu-sub-accordion',
                'items' => array(
                    array(
                        'title' => 'SASS',
                        'path' => 'documentation/getting-started/customization/sass',
                        'bullet' => '<span class="bullet bullet-dot"></span>',
                    ),
                    array(
                        'title' => 'Javascript',
                        'path' => 'documentation/getting-started/customization/javascript',
                        'bullet' => '<span class="bullet bullet-dot"></span>',
                    ),
                ),
            ),
        ),

        // Dark skin
        array(
            'title' => 'Dark Mode Version',
            'path' => 'documentation/getting-started/dark-mode',
        ),

        // RTL
        array(
            'title' => 'RTL Version',
            'path' => 'documentation/getting-started/rtl',
        ),

        // Troubleshoot
        array(
            'title' => 'Troubleshoot',
            'path' => 'documentation/getting-started/troubleshoot',
        ),

        // Changelog
        array(
            'title' => 'Changelog <span class="badge badge-changelog badge-light-danger bg-hover-danger text-hover-white fw-bold fs-9 px-2 ms-2">v' . theme()->getVersion() . '</span>',
            'breadcrumb-title' => 'Changelog',
            'path' => 'documentation/getting-started/changelog',
        ),

        // References
        array(
            'title' => 'References',
            'path' => 'documentation/getting-started/references',
        ),


        // Separator
        array(
            'custom' => '<div class="h-30px"></div>',
        ),

        // Configuration
        array(
            'heading' => 'Configuration',
        ),

        // General
        array(
            'title' => 'General',
            'path' => 'documentation/configuration/general',
        ),

        // Menu
        array(
            'title' => 'Menu',
            'path' => 'documentation/configuration/menu',
        ),

        // Page
        array(
            'title' => 'Page',
            'path' => 'documentation/configuration/page',
        ),

        // Separator
        array(
            'custom' => '<div class="h-30px"></div>',
        ),

        // General
        array(
            'heading' => 'General',
        ),

        // DataTables
        array(
            'title' => 'DataTables',
            'classes' => array('item' => 'menu-accordion'),
            'attributes' => array("data-kt-menu-trigger" => "click"),
            'sub' => array(
                'class' => 'menu-sub-accordion',
                'items' => array(
                    array(
                        'title' => 'Overview',
                        'path' => 'documentation/general/datatables/overview',
                        'bullet' => '<span class="bullet bullet-dot"></span>',
                    ),
                ),
            ),
        ),

        // Remove demos
        array(
            'title' => 'Remove Demos',
            'path' => 'documentation/general/remove-demos',
        ),


        // Separator
        array(
            'custom' => '<div class="h-30px"></div>',
        ),

        // HTML Theme
        array(
            'heading' => 'HTML Theme',
        ),

        array(
            'title' => 'Components',
            'path' => '//preview.keenthemes.com/metronic8/demo1/documentation/base/utilities.html',
        ),

        array(
            'title' => 'Documentation',
            'path' => '//preview.keenthemes.com/metronic8/demo1/documentation/getting-started.html',
        ),
    ),

    // Main menu
    'main' => array(

        // الرئيسية
        array(
            'title' => 'الرئيسية',
            'path' => 'index',
            'icon' => theme()->getSvgIcon("demo1/media/icons/duotune/art/art002.svg", "svg-icon-2"),
        ),

        //// Modules
        array(
            'classes' => array('content' => 'pt-8 pb-2'),
            'permission' => array('users.show', 'users.create', 'users.edit', 'users.delete',
                'patients.show', 'patients.create', 'patients.edit', 'patients.delete',
                'permissions.show', 'permissions.create', 'permissions.edit', 'permissions.delete',
            ),
            'content' => '<span class="menu-section text-muted text-uppercase fs-8 ls-1">الاداره</span>',
        ),

        // رياض الأطفال
        array(
            'title' => 'رياض الأطفال',
            'permission' => array('kindergarten.show', 'kindergarten.create', 'kindergarten.edit', 'kindergarten.delete'),
            'icon' => array(
                'svg' => theme()->getSvgIcon("demo1/media/icons/duotune/general/gen055.svg", "svg-icon-2"),
                'font' => '<i class="bi bi-person fs-2"></i>',
            ),
            'classes' => array('item' => 'menu-accordion'),
            'badge' => '',
            'attributes' => array(
                "data-kt-menu-trigger" => "click",
            ),
            'sub' => array(
                'class' => 'menu-sub-accordion menu-active-bg',
                'items' => array(
                    array(
                        'title' => 'عرض',
                        'path' => 'kindergarden',
                        'classes' => array('item' => 'show-menu-bdg'),
                        'permission' => 'kindergarten.show',
                        'bullet' => '<span class="bullet bullet-dot"></span>',
                    ),
                    array(
                        'title' => 'إضافة',
                        'permission' => 'kindergarten.create',
                        'path' => 'kindergarden/create',
                        'bullet' => '<span class="bullet bullet-dot"></span>',
                    ),
                ),
            ),
        ),

        // المستويات
        array(
            'title' => 'المستويات والشعب',
            'permission' => array('orders.show', 'orders.create', 'orders.edit', 'orders.delete'),
            'icon' => array(
                'svg' => theme()->getSvgIcon("demo1/media/icons/duotune/general/gen055.svg", "svg-icon-2"),
                'font' => '<i class="bi bi-person fs-2"></i>',
            ),
            'classes' => array('item' => 'menu-accordion'),
            'badge' => '',
            'attributes' => array(
                "data-kt-menu-trigger" => "click",
            ),
            'sub' => array(
                'class' => 'menu-sub-accordion menu-active-bg',
                'items' => array(
                    array(
                        'title' => 'عرض المستويات الدراسية',
                        'path' => 'levels',
                        'classes' => array('item' => 'show-menu-bdg'),
                        'permission' => 'orders.create',
                        'bullet' => '<span class="bullet bullet-dot"></span>',
                    ),

                    array(
                        'title' => 'عرض الشعب الدراسية',
                        'path' => 'divisions',
                        'classes' => array('item' => 'show-menu-bdg'),
                        'permission' => 'orders.show',
                        'bullet' => '<span class="bullet bullet-dot"></span>',
                    ),
                    array(
                        'title' => 'اضافة شعبة جديدة',
                        'permission' => 'orders.create',
                        'path' => 'divisions/create',
                        'bullet' => '<span class="bullet bullet-dot"></span>',
                    ),
                    array(
                        'title' => 'الشعب الدراسية المحذوفة',
                        'permission' => 'orders.create',
                        'path' => 'trashed-division',
                        'bullet' => '<span class="bullet bullet-dot"></span>',
                    ),
                ),
            ),
        ),

        // الموظفين
        array(
            'title' => 'الموظفين',
            'permission' => array('employees.show', 'employees.create', 'employees.edit', 'employees.delete'),
            'icon' => array(
                'svg' => theme()->getSvgIcon("demo1/media/icons/duotune/general/gen055.svg", "svg-icon-2"),
                'font' => '<i class="bi bi-person fs-2"></i>',
            ),
            'classes' => array('item' => 'menu-accordion'),
            'badge' => '',
            'attributes' => array(
                "data-kt-menu-trigger" => "click",
            ),
            'sub' => array(
                'class' => 'menu-sub-accordion menu-active-bg',
                'items' => array(
                    array(
                        'title' => 'عرض',
                        'path' => 'employees',
                        'classes' => array('item' => 'show-menu-bdg'),
                        'permission' => 'orders.create',
                        'bullet' => '<span class="bullet bullet-dot"></span>',
                    ),
                    array(
                        'title' => 'إضافة',
                        'permission' => 'employees.create',
                        'path' => 'employees/create',
                        'bullet' => '<span class="bullet bullet-dot"></span>',
                    ),
                    array(
                        'title' => 'التسكين الوظيفي',
                        'permission' => 'employees.create',
                        'path' => 'jobplacement.create',
                        'bullet' => '<span class="bullet bullet-dot"></span>',
                    ),
                    array(
                        'title' => 'تبديل الشعب بين المربيات',
                        'permission' => 'employees.edit',
                        'path' => 'switch',
                        'bullet' => '<span class="bullet bullet-dot"></span>',
                    ),
                    array(
                        'title' => 'الموظفين المحذوفين',
                        'permission' => 'employees.delete',
                        'path' => 'trashed-employee',
                        'bullet' => '<span class="bullet bullet-dot"></span>',
                    ),

                ),
            ),
        ),

        // الأطفال وأولياء الأمور
        array(
            'title' => 'الأطفال وأولياء الأمور',
            'permission' => array('orders.show', 'orders.create', 'orders.edit', 'orders.delete'),
            'icon' => array(
                'svg' => theme()->getSvgIcon("demo1/media/icons/duotune/general/gen055.svg", "svg-icon-2"),
                'font' => '<i class="bi bi-person fs-2"></i>',
            ),
            'classes' => array('item' => 'menu-accordion'),
            'badge' => '',
            'attributes' => array(
                "data-kt-menu-trigger" => "click",
            ),
            'sub' => array(
                'class' => 'menu-sub-accordion menu-active-bg',
                'items' => array(
                    array(
                        'title' => 'عرض الأطفال',
                        'path' => 'childrens',
                        'classes' => array('item' => 'show-menu-bdg'),
                        'permission' => 'childrens.show',
                        'bullet' => '<span class="bullet bullet-dot"></span>',
                    ),
                    array(
                        'title' => 'إضافة طفل جديد',
                        'permission' => 'childrens.show',
                        'path' => 'childrens/create',
                        'bullet' => '<span class="bullet bullet-dot"></span>',
                    ),
                    array(
                        'title' => 'التسكين الصفي',
                        'permission' => 'childrens.create',
                        'path' => 'classplacement.create',
                        'bullet' => '<span class="bullet bullet-dot"></span>',
                    ),
                    array(
                        'title' => 'عرض أولياء الأمور',
                        'permission' => 'childrens.create',
                        'path' => 'fathers',
                        'bullet' => '<span class="bullet bullet-dot"></span>',
                    ),
                    array(
                        'title' => 'الأطفال المحذوفين والمجتازين ',
                        'permission' => 'childrens.delete',
                        'path' => 'trashed-children',
                        'bullet' => '<span class="bullet bullet-dot"></span>',
                    ),

                ),
            ),
        ),

        // الحضور والغياب
        array(
            'title' => 'الحضور والغياب',
            'permission' => array('orders.show', 'orders.create', 'orders.edit', 'orders.delete'),
            'icon' => array(
                'svg' => theme()->getSvgIcon("demo1/media/icons/duotune/general/gen055.svg", "svg-icon-2"),
                'font' => '<i class="bi bi-person fs-2"></i>',
            ),
            'classes' => array('item' => 'menu-accordion'),
            'badge' => '',
            'attributes' => array(
                "data-kt-menu-trigger" => "click",
            ),
            'sub' => array(
                'class' => 'menu-sub-accordion menu-active-bg',
                'items' => array(
                    array(
                        'title' => 'سجل الموظفين',
                        'path' => 'employee/attendance',
                        'classes' => array('item' => 'show-menu-bdg'),
                        'permission' => 'orders.create',
                        'bullet' => '<span class="bullet bullet-dot"></span>',
                    ),
                    array(
                        'title' => 'سجل الطلاب',
                        'permission' => 'orders.create',
                        'path' => 'children/cattendance',
                        'bullet' => '<span class="bullet bullet-dot"></span>',
                    ),

                ),
            ),
        ),

        // السائقين
        array(
            'title' => 'السائقين',
            'permission' => array('orders.show', 'orders.create', 'orders.edit', 'orders.delete'),
            'icon' => array(
                'svg' => theme()->getSvgIcon("demo1/media/icons/duotune/general/gen055.svg", "svg-icon-2"),
                'font' => '<i class="bi bi-person fs-2"></i>',
            ),
            'classes' => array('item' => 'menu-accordion'),
            'badge' => '',
            'attributes' => array(
                "data-kt-menu-trigger" => "click",
            ),
            'sub' => array(
                'class' => 'menu-sub-accordion menu-active-bg',
                'items' => array(
                    array(
                        'title' => 'عرض السائقين',
                        'path' => 'drivers',
                        'classes' => array('item' => 'show-menu-bdg'),
                        'permission' => 'orders.create',
                        'bullet' => '<span class="bullet bullet-dot"></span>',
                    ),

                    array(
                        'title' => 'اضافة سائقين',
                        'path' => 'drivers.create',
                        'classes' => array('item' => 'show-menu-bdg'),
                        'permission' => 'drivers.create',
                        'bullet' => '<span class="bullet bullet-dot"></span>',
                    ),
                    array(
                        'title'  => 'تسكين السائقين',
                        'permission' => 'orders.create',
                        'path'   => 'driverplacment',
                        'bullet' => '<span class="bullet bullet-dot"></span>',
                    ),

                    array(
                        'title'  => ' السائقين المحذوفين',
                        'permission' => 'orders.create',
                        'path'   => 'trashed-driver',
                        'bullet' => '<span class="bullet bullet-dot"></span>',
                    ),

                ),
            ),
        ),
         // الرسوم والاشتراكات
         array(
            'title' => 'الرسوم الدراسية والاشتراكات',
            'permission' => array('orders.show', 'orders.create', 'orders.edit', 'orders.delete'),
            'icon' => array(
                'svg' => theme()->getSvgIcon("demo1/media/icons/duotune/general/gen055.svg", "svg-icon-2"),
                'font' => '<i class="bi bi-person fs-2"></i>',
            ),
            'classes' => array('item' => 'menu-accordion'),
            'badge' => '',
            'attributes' => array(
                "data-kt-menu-trigger" => "click",
            ),
            'sub' => array(
                'class' => 'menu-sub-accordion menu-active-bg',
                'items' => array(
                    array(
                        'title' => 'الاشتراكات',
                        'path' => 'subscriptions',
                        'classes' => array('item' => 'show-menu-bdg'),
                        'permission' => 'childrens.show',
                        'bullet' => '<span class="bullet bullet-dot"></span>',
                    ),
                    array(
                        'title' => 'الاشتراكات السنوية',
                        'permission' => 'childrens.show',
                        'path' => 'year-sub',
                        'bullet' => '<span class="bullet bullet-dot"></span>',
                    ),
                    array(
                        'title' => ' اشتراكات الأطفال',
                        'permission' => 'childrens.create',
                        'path' => 'children-subscriptions',
                        'bullet' => '<span class="bullet bullet-dot"></span>',
                    ),
                    array(
                        'title' => 'تسديد الرسوم',
                        'permission' => 'childrens.create',
                        'path' => 'pay-fees',
                        'bullet' => '<span class="bullet bullet-dot"></span>',
                    ),
                    array(
                        'title' => 'دفعات الرسوم المحذوفة',
                        'permission' => 'childrens.create',
                        'path' => 'trashed-pay-fees',
                        'bullet' => '<span class="bullet bullet-dot"></span>',
                    ),
                    array(
                        'title' => 'الأقساط  الدراسية',
                        'permission' => 'childrens.create',
                        'path' => 'installments',
                        'bullet' => '<span class="bullet bullet-dot"></span>',
                    ),
                   

                ),
            ),
        ),


        
        // الثوابث
        array(
            'title' => 'الثوابث',
            'permission' => array('orders.show', 'orders.create', 'orders.edit', 'orders.delete'),
            'icon' => array(
                'svg' => theme()->getSvgIcon("demo1/media/icons/duotune/general/gen055.svg", "svg-icon-2"),
                'font' => '<i class="bi bi-person fs-2"></i>',
            ),
            'classes' => array('item' => 'menu-accordion'),
            'badge' => '',
            'attributes' => array(
                "data-kt-menu-trigger" => "click",
            ),
            'sub' => array(
                'class' => 'menu-sub-accordion menu-active-bg',
                'items' => array(
                    array(
                        'title' => 'عرض المستويات التعليمية',
                        'path' => 'educational-level',
                        'classes' => array('item' => 'show-menu-bdg'),
                        'permission' => 'childrens.show',
                        'bullet' => '<span class="bullet bullet-dot"></span>',
                    ),
                    array(
                        'title' => ' صلة القرابة لأولياء الامور',
                        'permission' => 'childrens.show',
                        'path' => 'father-relations',
                        'bullet' => '<span class="bullet bullet-dot"></span>',
                    ),
                    array(
                        'title' => ' التخصصات',
                        'permission' => 'childrens.create',
                        'path' => 'majors',
                        'bullet' => '<span class="bullet bullet-dot"></span>',
                    ),
                    array(
                        'title' => 'مهن أولياء الأمور',
                        'permission' => 'childrens.create',
                        'path' => 'father-jobs',
                        'bullet' => '<span class="bullet bullet-dot"></span>',
                    ),
                    array(
                        'title' => 'عرض المسميات الوظيفية ',
                        'permission' => 'childrens.delete',
                        'path' => 'job-titles',
                        'bullet' => '<span class="bullet bullet-dot"></span>',
                    ),

                ),
            ),
        ),

        // المستخدمين
        array(
            'title' => 'إدارة المستخدمين',
            'permission' => array('users.show', 'users.create', 'users.edit', 'users.delete', 'permissions.show', 'permissions.create', 'permissions.edit', 'permissions.delete'),
            'icon' => array(
                'svg' => theme()->getSvgIcon("demo1/media/icons/duotune/general/gen051.svg", "svg-icon-2"),
                'font' => '<i class="bi bi-person fs-2"></i>',
            ),
            'classes' => array('item' => 'menu-accordion'),
            'attributes' => array(
                "data-kt-menu-trigger" => "click",
            ),
            'sub' => array(
                'class' => 'menu-sub-accordion menu-active-bg',
                'items' => array(
                    array(
                        'title' => 'المستخدمين',
                        'permission' => array('users.show', 'users.create', 'users.edit', 'users.delete'),
                        'bullet' => '<span class="bullet bullet-dot"></span>',
                        'classes' => array('item' => 'menu-accordion'),
                        'attributes' => array(
                            "data-kt-menu-trigger" => "click",
                        ),
                        'sub' => array(
                            'class' => 'menu-sub-accordion menu-active-bg',
                            'items' => array(
                                array(
                                    'title' => 'عرض',
                                    'path' => 'user',
                                    'permission' => 'users.show',
                                    'bullet' => '<span class="bullet bullet-dot"></span>',
                                ),
                                array(
                                    'title' => 'إضافة',
                                    'path' => 'user/create',
                                    'permission' => 'users.create',
                                    'bullet' => '<span class="bullet bullet-dot"></span>',
                                ),
                            ),
                        ),
                    ),
                    array(
                        'title' => 'الصلاحيات',
                        'permission' => array('permissions.show', 'permissions.create', 'permissions.edit', 'permissions.delete'),
                        'bullet' => '<span class="bullet bullet-dot"></span>',
                        'classes' => array('item' => 'menu-accordion'),
                        'attributes' => array(
                            "data-kt-menu-trigger" => "click",
                        ),
                        'sub' => array(
                            'class' => 'menu-sub-accordion menu-active-bg',
                            'items' => array(
                                array(
                                    'title' => 'عرض',
                                    'permission' => 'permissions.show',
                                    'path' => 'role',
                                    'bullet' => '<span class="bullet bullet-dot"></span>',
                                ),
                                array(
                                    'title' => 'إضافة',
                                    'permission' => 'permissions.create',
                                    'path' => 'role/create',
                                    'bullet' => '<span class="bullet bullet-dot"></span>',
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),

        // Separator
        array(
            'content' => '<div class="separator mx-1 my-4"></div>',
            'permission' => array('profile.show', 'profile.edit'),

        ),

        //// Modules
        array(
            'classes' => array('content' => 'pt-2 pb-2'),
            'content' => '<span class="menu-section text-muted text-uppercase fs-8 ls-1">الحساب</span>',
            'permission' => array('profile.show', 'profile.edit'),
        ),

        // Account
        array(
            'title' => 'حسابي',
            'permission' => array('profile.show', 'profile.edit'),
            'icon' => array(
                'svg' => theme()->getSvgIcon("demo1/media/icons/duotune/communication/com006.svg", "svg-icon-2"),
                'font' => '<i class="bi bi-person fs-2"></i>',
            ),

            'classes' => array('item' => 'menu-accordion'),
            'attributes' => array(
                "data-kt-menu-trigger" => "click",
            ),
            'sub' => array(
                'class' => 'menu-sub-accordion menu-active-bg',
                'items' => array(
                    array(
                        'title' => 'عرض',
                        'path' => 'account/overview',
                        'permission' => array('profile.show'),
                        'bullet' => '<span class="bullet bullet-dot"></span>',
                    ),
                    array(
                        'title' => 'تعديل',
                        'path' => 'account/settings',
                        'permission' => array('profile.edit'),
                        'bullet' => '<span class="bullet bullet-dot"></span>',
                    ),
                ),
            ),
        ),

        // Separator
        array(
            'content' => '<div class="separator mx-1 my-4"></div>',
            'permission' => array('settings.show', 'settings.create', 'settings.edit', 'settings.delete', 'profile.show', 'profile.edit'),
        ),

        //// Modules
        array(
            'classes' => array('content' => 'pt-2 pb-2'),
            'permission' => array('settings.show', 'settings.create', 'settings.edit', 'settings.delete'),
            'content' => '<span class="menu-section text-muted text-uppercase fs-8 ls-1">النظام</span>',
        ),

        // System
        array(
            'title' => 'النظام',
            'permission' => array('settings.show', 'settings.create', 'settings.edit', 'settings.delete'),
            'icon' => array(
                'svg' => theme()->getSvgIcon("demo1/media/icons/duotune/general/gen025.svg", "svg-icon-2"),
                'font' => '<i class="bi bi-layers fs-3"></i>',
            ),
            'classes' => array('item' => 'menu-accordion'),
            'attributes' => array(
                "data-kt-menu-trigger" => "click",
            ),
            'sub' => array(
                'class' => 'menu-sub-accordion menu-active-bg',
                'items' => array(
                    array(
                        'title' => 'الإعدادات',
                        'permission' => 'settings.show',
                        'path' => '#',
                        'bullet' => '<span class="bullet bullet-dot"></span>',
                        'attributes' => array(
                            'link' => array(
                                "title" => "قريبا",
                                "data-bs-toggle" => "tooltip",
                                "data-bs-trigger" => "hover",
                                "data-bs-dismiss" => "click",
                                "data-bs-placement" => "right",
                            ),
                        ),
                    ),
                    array(
                        'title' => 'سجل التدقيق',
                        'permission' => 'settings.show',
                        'path' => 'log/audit',
                        'bullet' => '<span class="bullet bullet-dot"></span>',
                    ),
                    array(
                        'title' => 'سجل النظام',
                        'permission' => 'settings.show',
                        'path' => 'log/system',
                        'bullet' => '<span class="bullet bullet-dot"></span>',
                    ),
                ),
            ),
        ),


        // Changelog
//        array(
//            'title' => 'سجل التغييرات v'.theme()->getVersion(),
//            'icon'  => theme()->getSvgIcon("demo1/media/icons/duotune/general/gen005.svg", "svg-icon-2"),
//            'path'  => 'documentation/getting-started/changelog',
//        ),
    ),

    // Horizontal menu
    'horizontal' => array(
        // Dashboard
        array(
            'title' => 'الرئيسية',
            'path' => 'index',
            'classes' => array('item' => 'me-lg-1'),
        ),

        // Resources
        array(
            'title' => 'Resources',
            'classes' => array('item' => 'menu-lg-down-accordion me-lg-1', 'arrow' => 'd-lg-none'),
            'attributes' => array(
                'data-kt-menu-trigger' => "click",
                'data-kt-menu-placement' => "bottom-start",
            ),
            'sub' => array(
                'class' => 'menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-rounded-0 py-lg-4 w-lg-225px',
                'items' => array(
                    // Documentation
                    array(
                        'title' => 'Documentation',
                        'icon' => theme()->getSvgIcon("demo1/media/icons/duotune/abstract/abs027.svg", "svg-icon-2"),
                        'path' => 'documentation/getting-started/overview',
                    ),

                    // Changelog
                    array(
                        'title' => 'سجل التغييرات v' . theme()->getVersion(),
                        'icon' => theme()->getSvgIcon("demo1/media/icons/duotune/general/gen005.svg", "svg-icon-2"),
                        'path' => 'documentation/getting-started/changelog',
                    ),
                ),
            ),
        ),

        // Account
        array(
            'title' => 'حسابي',
            'classes' => array('item' => 'menu-lg-down-accordion me-lg-1', 'arrow' => 'd-lg-none'),
            'attributes' => array(
                'data-kt-menu-trigger' => "click",
                'data-kt-menu-placement' => "bottom-start",
            ),
            'sub' => array(
                'class' => 'menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-rounded-0 py-lg-4 w-lg-225px',
                'items' => array(
                    array(
                        'title' => 'عرض',
                        'path' => 'account/overview',
                        'bullet' => '<span class="bullet bullet-dot"></span>',
                    ),
                    array(
                        'title' => 'الإعدادات',
                        'path' => 'account/settings',
                        'bullet' => '<span class="bullet bullet-dot"></span>',
                    ),
                    array(
                        'title' => 'الأمان',
                        'path' => '#',
                        'bullet' => '<span class="bullet bullet-dot"></span>',
                        'attributes' => array(
                            'link' => array(
                                "title" => "Coming soon",
                                "data-bs-toggle" => "tooltip",
                                "data-bs-trigger" => "hover",
                                "data-bs-dismiss" => "click",
                                "data-bs-placement" => "right",
                            ),
                        ),
                    ),
                ),
            ),
        ),

        // System
        array(
            'title' => 'النظام',
            'classes' => array('item' => 'menu-lg-down-accordion me-lg-1', 'arrow' => 'd-lg-none'),
            'attributes' => array(
                'data-kt-menu-trigger' => "click",
                'data-kt-menu-placement' => "bottom-start",
            ),
            'sub' => array(
                'class' => 'menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-rounded-0 py-lg-4 w-lg-225px',
                'items' => array(
                    array(
                        'title' => 'الإعدادات',
                        'path' => '#',
                        'bullet' => '<span class="bullet bullet-dot"></span>',
                        'attributes' => array(
                            'link' => array(
                                "title" => "قريبا",
                                "data-bs-toggle" => "tooltip",
                                "data-bs-trigger" => "hover",
                                "data-bs-dismiss" => "click",
                                "data-bs-placement" => "right",
                            ),
                        ),
                    ),
                    array(
                        'title' => 'سجل التدقيق',
                        'path' => 'log/audit',
                        'bullet' => '<span class="bullet bullet-dot"></span>',
                    ),
                    array(
                        'title' => 'سجل النظام',
                        'path' => 'log/system',
                        'bullet' => '<span class="bullet bullet-dot"></span>',
                    ),
                ),
            ),
        ),
    ),
);
