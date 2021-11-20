/*=========================================================================================
  File Name: router.js
  Description: Routes for vue-router. Lazy loading is enabled.
  Object Strucutre:
                    path => router path
                    name => router name
                    component(lazy loading) => component to load
                    meta : {
                      rule => which user can have access (ACL)
                      breadcrumb => Add breadcrumb to specific page
                      pageTitle => Display title besides breadcrumb
                    }
  ----------------------------------------------------------------------------------------
  Item Name: Vuexy - Vuejs, HTML & Laravel Admin Dashboard Template
  Author: Pixinvent
  Author URL: http://www.themeforest.net/user/pixinvent
==========================================================================================*/


import Vue from 'vue'
import Router from 'vue-router'
import auth from "@/auth/authService";

import firebase from 'firebase/app'
import 'firebase/auth'
import expired from './layouts/components/navbar/components/ProfileDropDown';
import sidebar from './layouts/components/vertical-nav-menu/VerticalNavMenu';
import store from './store/store';
// import acl from './acl/acl';
import { AclRule } from 'vue-acl'

Vue.use(Router)

const router = new Router({
    mode: 'history',
    base: '/admin/',
    scrollBehavior () {
        return { x: 0, y: 0 }
    },
    computed:{ expired, sidebar, store },
    routes: [

        {
    // =============================================================================
    // MAIN LAYOUT ROUTES
    // =============================================================================
            path: '',
            component: () => import('./layouts/main/Main.vue'),
            children: [
        // =============================================================================
        // Theme Routes
        // =============================================================================
                {
                    path: '/',
                    redirect: '/login'
                },
                {
                    path: '/dashboard/analytics',
                    name: 'dashboard-analytics',
                    component: () => import('./views/DashboardAnalytics.vue'),
                    meta: {
                        rule: 'all',
                        requiresAuth: true
                    }
                },
                {
                    path: '/dashboard',
                    name: 'dashboard-ecommerce',
                    component: () => import('./views/DashboardECommerce.vue'),
                    meta: {
                        rule: 'all'
                    }
                },


        // =============================================================================
        // Application Routes
        // =============================================================================
                {
                    path: '/apps/todo',
                    redirect: '/apps/todo/all',
                    name: 'todo',
                },
                {
                    path: '/apps/todo/:filter',
                    component: () => import('./views/apps/todo/Todo.vue'),
                    meta: {
                        rule: 'editor',
                        parent: "todo",
                        no_scroll: true,
                    }
                },
                {
                    path: '/apps/chat',
                    name: 'chat',
                    component: () => import('./views/apps/chat/Chat.vue'),
                    meta: {
                        rule: 'editor',
                        no_scroll: true,
                    }
                },
                {
                    path: '/amenities/add',
                    name: 'amenities',
                    component: () => import('./views/amenities/add.vue'),
                    meta: {
                        rule: 'editor',
                        requiresAuth: true
                    }
                },
                {
                    path: '/search/ads',
                    name: 'search-ads',
                    component: () => import('./views/search-ads/index.vue'),
                    meta: {
                        rule: 'editor',
                        requiresAuth: true
                    }
                },
                {
                    path: '/categories/add',
                    name: 'categories',
                    component: () => import('./views/categories/add.vue'),
                    meta: {
                        rule: 'editor',
                        requiresAuth: true
                    }
                },
                {
                    path: '/blog',
                    name: 'blog',
                    component: () => import('./views/blog/list.vue'),
                    meta: {
                        rule: 'blogger',
                        requiresAuth: true
                    }
                },
                {
                    path: '/blog/create',
                    name: 'blog',
                    component: () => import('./views/blog/add.vue'),
                    meta: {
                        rule: 'blogger',
                        requiresAuth: true
                    }
                },
                {
                    path: '/blog/video',
                    name: 'blog-video',
                    component: () => import('./views/blog/video.vue'),
                    meta: {
                        rule: 'blogger',
                        requiresAuth: true
                    }
                },
                {
                    path: '/status',
                    name: 'status',
                    component: () => import('./views/status/index.vue'),
                    meta: {
                        rule: 'editor',
                        requiresAuth: true
                    }
                },
                {
                    path: '/status/add',
                    name: 'status',
                    component: () => import('./views/status/index.vue'),
                    meta: {
                        rule: 'editor',
                        requiresAuth: true
                    }
                },
                {
                    path: '/status/all',
                    name: 'all-status',
                    component: () => import('./views/status/AllStatus.vue'),
                    meta: {
                        rule: 'editor',
                        requiresAuth: true
                    }
                },
                {
                    path: '/pages',
                    name: 'status',
                    component: () => import('./views/status/index.vue'),
                    meta: {
                        rule: 'editor',
                        requiresAuth: true
                    }
                },
                {
                    path: '/pages/privacy',
                    name: 'Privacy',
                    component: () => import('./views/static-template/privacy.vue'),
                    meta: {
                        rule: 'editor',
                        requiresAuth: true
                    }
                },
                {
                    path: '/pages/return-policy',
                    name: 'Return Policy',
                    component: () => import('./views/static-template/return-policy.vue'),
                    meta: {
                        rule: 'editor',
                        requiresAuth: true
                    }
                },
                {
                    path: '/pages/cancel-policy',
                    name: 'Cancel Policy',
                    component: () => import('./views/static-template/cancel-pol.vue'),
                    meta: {
                        rule: 'editor',
                        requiresAuth: true
                    }
                },
                {
                    path: '/pages/terms',
                    name: 'Terms',
                    component: () => import('./views/static-template/terms.vue'),
                    meta: {
                        rule: 'editor',
                        requiresAuth: true
                    }
                },
                {
                    path: '/pages/disclaimer',
                    name: 'Disclaimer',
                    component: () => import('./views/static-template/disclaimer.vue'),
                    meta: {
                        rule: 'editor',
                        requiresAuth: true
                    }
                },
                {
                    path: '/pages/about',
                    name: 'About Us',
                    component: () => import('./views/static-template/about-us.vue'),
                    meta: {
                        rule: 'editor',
                        requiresAuth: true
                    }
                },
                {
                    path: '/pages/home',
                    name: 'Home',
                    component: () => import('./views/static-template/landing-page.vue'),
                    meta: {
                        rule: 'editor',
                        requiresAuth: true
                    }
                },
                {
                    path: '/users',
                    name: 'Users',
                    meta: {
                        rule: 'sadmin',
                        requiresAuth: true
                    },
                    component: () => import('./views/user/managers.vue')
                },
                {
                    path: '/users/manager',
                    name: 'Managers',
                    meta: {
                        rule: 'sadmin',
                        requiresAuth: true
                    },
                    component: () => import('./views/user/managers.vue')
                },
                {
                    path: '/users/guest',
                    name: 'Guest',
                    meta: {
                        rule: 'sadmin',
                        requiresAuth: true
                    },
                    component: () => import('./views/user/guest.vue')
                },
                {
                    path: '/users/editors',
                    name: 'Editors',
                    meta: {
                        rule: 'sadmin',
                        requiresAuth: true
                    },
                    component: () => import('./views/user/editors.vue')
                },
                {
                    path: '/users/cyber-partners',
                    name: 'Cyber Partner',
                    meta: {
                        rule: 'sadmin',
                        requiresAuth: true
                    },
                    component: () => import('./views/user/cyber-user.vue')
                },
                {
                    path: '/users/callers',
                    name: 'Callers',
                    meta: {
                        rule: 'sadmin',
                        requiresAuth: true
                    },
                    component: () => import('./views/user/callers.vue')
                },
                {
                    path: '/enquiry',
                    name: 'Enquiry',
                    meta: {
                        rule: 'manager',
                        requiresAuth: true
                    },
                    component: () => import('./views/enquiry/index.vue')
                },
                {
                    path: '/enquiry/all',
                    name: 'Caller Enquiry',
                    meta: {
                        rule: 'caller',
                        requiresAuth: true
                    },
                    component: () => import('./views/caller-enquiry/index.vue')
                },
                {
                    path: '/information/all',
                    name: 'Information Enquiry',
                    meta: {
                        rule: 'caller',
                        requiresAuth: true
                    },
                    component: () => import('./views/information-form/index.vue')
                },
                {
                    path: '/dynamic-enquiry',
                    name: 'Dynamic Enquiry',
                    meta: {
                        rule: 'sadmin',
                        requiresAuth: true
                    },
                    component: () => import('./views/super-admin/dynamic-enquiry.vue')
                },
                {
                    path: '/cyber-leads',
                    name: 'Cyber Leads',
                    meta: {
                        rule: 'caller',
                        requiresAuth: true
                    },
                    component: () => import('./views/caller-enquiry/cyber/cyber-leads.vue')
                },
                {
                    path: '/import-excel',
                    name: 'Import Excel',
                    meta: {
                        rule: 'sadmin',
                        requiresAuth: true
                    },
                    component: () => import('./views/caller-enquiry/import-excel.vue')
                },
                {
                    path: '/enquiries',
                    name: 'Enquiries',
                    meta: {
                        rule: 'sadmin',
                        requiresAuth: true
                    },
                    component: () => import('./views/caller-enquiry/index.vue')
                },
                {
                    path: '/click-enquiry',
                    name: 'Click Enquiry',
                    meta: {
                        rule: 'sadmin',
                        requiresAuth: true
                    },
                    component: () => import('./views/click-enquiry/index.vue')
                },
                {
                    path: '/enquiry/list',
                    name: 'Caller Enquiry',
                    meta: {
                        rule: 'sadmin',
                        requiresAuth: true
                    },
                    component: () => import('./views/caller-enquiry/index.vue')
                },
                {
                    path: '/cyber-leads/all',
                    name: 'Cyber Leads',
                    meta: {
                        rule: 'sadmin',
                        requiresAuth: true
                    },
                    component: () => import('./views/caller-enquiry/cyber/cyber-leads.vue')
                },
                {
                    path: '/import/excel',
                    name: 'Import Excel',
                    meta: {
                        rule: 'sadmin',
                        requiresAuth: true
                    },
                    component: () => import('./views/caller-enquiry/import-excel.vue')
                },
                {
                    path: '/reviews',
                    name: 'Reviews',
                    meta: {
                        rule: 'manager',
                        requiresAuth: true
                    },
                    component: () => import('./views/reviews/index.vue')
                },
                {
                    path: '/testimonials',
                    name: 'Testimonials',
                    meta: {
                        rule: 'sadmin',
                        requiresAuth: true
                    },
                    component: () => import('./views/testimonial/index.vue')
                },
                {
                    path: '/course',
                    name: 'Course',
                    meta: {
                        rule: 'editor',
                        requiresAuth: true
                    },
                    component: () => import('./views/courses/add-course.vue')
                },
                {
                    path: '/course/update/:courseId',
                    name: 'Course Update',
                    meta: {
                        rule: 'editor',
                        requiresAuth: true
                    },
                    component: () => import('./views/courses/add-course.vue')
                },
                {
                    path: '/exams',
                    name: 'exams',
                    meta: {
                        rule: 'editor',
                        requiresAuth: true
                    },
                    component: () => import('./views/exams/index.vue')
                },
                {
                    path: '/dynamic-page',
                    name: 'dynamic',
                    meta: {
                        rule: 'editor',
                        requiresAuth: true
                    },
                    component: () => import('./views/dynamic-page/index.vue')
                },
                {
                    path: '/property',
                    name: 'Property',
                    meta: {
                        rule: 'prop',
                        requiresAuth: true
                    },
                    component: () => import('./views/courses/add-course.vue')
                },
                {
                    path: '/property/add',
                    name: 'Property',
                    meta: {
                        rule: 'editor',
                        requiresAuth: true
                    },
                    component: () => import('./views/property/add.vue')
                },
                {
                    path: '/properties/add',
                    name: 'Add Property',
                    meta: {
                        rule: 'editor',
                        requiresAuth: true
                    },
                    component: () => import('./views/property/add.vue')
                },
                {
                    path: '/property/all',
                    name: 'Property-All',
                    meta: {
                        rule: 'prop',
                        requiresAuth: true
                    },
                    component: () => import('./views/property/list.vue')
                },
                {
                    path: '/property/view',
                    name: 'Property-View',
                    meta: {
                        rule: 'admin',
                        requiresAuth: true
                    },
                    component: () => import('./views/property/list.vue')
                },
                {
                    path: '/property/update/:PropId',
                    name: 'Property Update',
                    meta: {
                        rule: 'editor',
                        requiresAuth: true
                    },
                    component: () => import('./views/property/update.vue')
                },
                {
                    path: '/property/seo/:PropId',
                    name: 'Property Seo',
                    meta: {
                        rule: 'editor',
                        requiresAuth: true
                    },
                    component: () => import('./views/property/seo.vue')
                },
                {
                    path: '/blog/seo/:PropId',
                    name: 'Blog Seo',
                    meta: {
                        rule: 'blogger',
                        requiresAuth: true
                    },
                    component: () => import('./views/blog/seo.vue')
                },
                {
                    path: '/blog/update/:BlogId',
                    name: 'Update Blog',
                    meta: {
                        rule: 'blogger',
                        requiresAuth: true
                    },
                    component: () => import('./views/blog/update.vue')
                },
                {
                    path: '/bookings',
                    name: 'Bookings',
                    meta: {
                        rule: 'manager',
                        requiresAuth: true
                    },
                    component: () => import('./views/bookings/bookings.vue')
                },
                {
                    path: '/teachers/add',
                    name: 'Add-Teachers',
                    meta: {
                        rule: 'editor',
                        requiresAuth: true
                    },
                    component: () => import('./views/teachers/AddTeachers.vue')
                },
                {
                    path: '/teachers/update/:teacherId',
                    name: 'Update-Teachers',
                    meta: {
                        rule: 'editor',
                        requiresAuth: true
                    },
                    component: () => import('./views/teachers/AddTeachers.vue')
                },
                {
                    path: '/teachers/all',
                    name: 'All-Teachers',
                    meta: {
                        rule: 'editor',
                        requiresAuth: true
                    },
                    component: () => import('./views/teachers/Teachers.vue')
                },
                {
                    path: '/teacher',
                    name: 'Teacher',
                    meta: {
                        rule: 'editor',
                        requiresAuth: true
                    },
                    component: () => import('./views/courses/add-course.vue')
                },
                {
                    path: '/gallery/images',
                    name: 'Images Gallery',
                    meta: {
                        rule: 'editor',
                        requiresAuth: true
                    },
                    component: () => import('./views/gallery/images-gallery.vue')
                },
                {
                    path: '/placement',
                    name: 'Placement',
                    meta: {
                        rule: 'editor',
                        requiresAuth: true
                    },
                    component: () => import('./views/placement/placement.vue')
                },
                {
                    path: '/hostel',
                    name: 'Hostel',
                    meta: {
                        rule: 'editor',
                        requiresAuth: true
                    },
                    component: () => import('./views/hostel/hostel.vue')
                },
                {
                    path: '/course',
                    name: 'Course',
                    meta: {
                        rule: 'editor',
                        requiresAuth: true
                    },
                    component: () => import('./views/courses/add-course.vue')
                },
                {
                    path: '/course/add',
                    name: 'Add-Course',
                    meta: {
                        rule: 'editor',
                        requiresAuth: true
                    },
                    component: () => import('./views/courses/add-course.vue')
                },
                {
                    path: '/course/list',
                    name: 'Lists-Course',
                    meta: {
                        rule: 'editor',
                        requiresAuth: true
                    },
                    component: () => import('./views/courses/list.vue')
                },
                {
                    path: '/scholarship',
                    name: 'Lists-Scholarship',
                    meta: {
                        rule: 'editor',
                        requiresAuth: true
                    },
                    component: () => import('./views/scholarship/scholar.vue')
                },
                {
                    path: '/hostel/create',
                    name: 'Create Hostel',
                    meta: {
                        rule: 'editor',
                        requiresAuth: true
                    },
                    component: () => import('./views/hostels/create.vue')
                },
                {
                    path: '/hostel/list',
                    name: 'Hostels List',
                    meta: {
                        rule: 'editor',
                        requiresAuth: true
                    },
                    component: () => import('./views/hostels/list.vue')
                },
                {
                    path: '/hostel/update/:hostelId',
                    name: 'Hostels Upate',
                    meta: {
                        rule: 'editor',
                        requiresAuth: true
                    },
                    component: () => import('./views/hostels/update.vue')
                },
                {
                    path: '/header/menu',
                    name: 'Header Menu',
                    meta: {
                        rule: 'editor',
                        requiresAuth: true
                    },
                    component: () => import('./views/menu/index.vue')
                },
                {
                    path: '/footer/menu',
                    name: 'Footer Menu',
                    meta: {
                        rule: 'editor',
                        requiresAuth: true
                    },
                    component: () => import('./views/menu/footer/index.vue')
                },
                {
                    path: '/footer/menu',
                    name: 'Footer Menu',
                    meta: {
                        rule: 'editor',
                        requiresAuth: true
                    },
                    component: () => import('./views/menu/footer/index.vue')
                },
                {
                    path: '/upper_footer/menu',
                    name: 'Upper Footer Menu',
                    meta: {
                        rule: 'editor',
                        requiresAuth: true
                    },
                    component: () => import('./views/menu/upper_footer/index.vue')
                },
                {
                    path: '/banks/list',
                    name: 'bank-list',
                    meta: {
                        breadcrumb: [
                            { title: 'Home', url: '/' },
                            { title: 'Banks' },
                            { title: 'List', active: true },
                        ],
                        pageTitle: 'Banks',
                        rule: 'editor',
                        requiresAuth: true
                    },
                    component: () => import('./views/bank/list.vue')
                },
                {
                    path: '/apps/email',
                    redirect: '/apps/email/inbox',
                    name: 'email',
                },
                {
                    path: '/apps/email/:filter',
                    component: () => import('./views/apps/email/Email.vue'),
                    meta: {
                        rule: 'editor',
                        parent: 'email',
                        no_scroll: true,
                    }
                },
                {
                    path: '/apps/calendar/vue-simple-calendar',
                    name: 'calendar-simple-calendar',
                    component: () => import('./views/apps/calendar/SimpleCalendar.vue'),
                    meta: {
                        rule: 'editor',
                        no_scroll: true,
                    }
                },
                {
                    path: '/apps/eCommerce/shop',
                    name: 'ecommerce-shop',
                    component: () => import('./views/apps/eCommerce/ECommerceShop.vue'),
                    meta: {
                        breadcrumb: [
                            { title: 'Home', url: '/' },
                            { title: 'eCommerce'},
                            { title: 'Shop', active: true },
                        ],
                        pageTitle: 'Shop',
                        rule: 'editor'
                    }
                },
                {
                    path: '/apps/eCommerce/wish-list',
                    name: 'ecommerce-wish-list',
                    component: () => import('./views/apps/eCommerce/ECommerceWishList.vue'),
                    meta: {
                        breadcrumb: [
                            { title: 'Home', url: '/' },
                            { title: 'eCommerce', url:'/apps/eCommerce/shop'},
                            { title: 'Wish List', active: true },
                        ],
                        pageTitle: 'Wish List',
                        rule: 'editor'
                    }
                },
                {
                    path: '/apps/eCommerce/checkout',
                    name: 'ecommerce-checkout',
                    component: () => import('./views/apps/eCommerce/ECommerceCheckout.vue'),
                    meta: {
                        breadcrumb: [
                            { title: 'Home', url: '/' },
                            { title: 'eCommerce', url:'/apps/eCommerce/shop'},
                            { title: 'Checkout', active: true },
                        ],
                        pageTitle: 'Checkout',
                        rule: 'editor'
                    }
                },
                /*
                  Below route is for demo purpose
                  You can use this route in your app
                    {
                        path: '/apps/eCommerce/item/',
                        name: 'ecommerce-item-detail-view',
                        redirect: '/apps/eCommerce/shop',
                    }
                */
                {
                    path: '/apps/eCommerce/item/',
                    redirect: '/apps/eCommerce/item/5546604',
                },
                {
                    path: '/apps/eCommerce/item/:item_id',
                    name: 'ecommerce-item-detail-view',
                    component: () => import('./views/apps/eCommerce/ECommerceItemDetailView.vue'),
                    meta: {
                        breadcrumb: [
                            { title: 'Home', url: '/' },
                            { title: 'eCommerce'},
                            { title: 'Shop', url: {name: 'ecommerce-shop'} },
                            { title: 'Item Details', active: true },
                        ],
                        parent: "ecommerce-item-detail-view",
                        pageTitle: 'Item Details',
                        rule: 'editor'
                    }
                },
                {
                    path: '/apps/user/user-list',
                    name: 'app-user-list',
                    component: () => import('@/views/apps/user/user-list/UserList.vue'),
                    meta: {
                        breadcrumb: [
                            { title: 'Home', url: '/' },
                            { title: 'User' },
                            { title: 'List', active: true },
                        ],
                        pageTitle: 'User List',
                        rule: 'editor'
                    },
                },
                {
                    path: '/apps/user/user-view/:userId',
                    name: 'app-user-view',
                    component: () => import('@/views/apps/user/UserView.vue'),
                    meta: {
                        breadcrumb: [
                            { title: 'Home', url: '/' },
                            { title: 'User' },
                            { title: 'View', active: true },
                        ],
                        pageTitle: 'User View',
                        rule: 'editor'
                    },
                },
                {
                    path: '/apps/user/user-edit/:userId',
                    name: 'app-user-edit',
                    component: () => import('@/views/apps/user/user-edit/UserEdit.vue'),
                    meta: {
                        breadcrumb: [
                            { title: 'Home', url: '/' },
                            { title: 'User' },
                            { title: 'Edit', active: true },
                        ],
                        pageTitle: 'User Edit',
                        rule: 'editor'
                    },
                },
        // =============================================================================
        // UI ELEMENTS
        // =============================================================================
                {
                    path: '/ui-elements/data-list/list-view',
                    name: 'data-list-list-view',
                    component: () => import('@/views/ui-elements/data-list/list-view/DataListListView.vue'),
                    meta: {
                        breadcrumb: [
                            { title: 'Home', url: '/' },
                            { title: 'Data List'},
                            { title: 'List View', active: true },
                        ],
                        pageTitle: 'List View',
                        rule: 'editor'
                    },
                },
                {
                    path: '/ui-elements/data-list/thumb-view',
                    name: 'data-list-thumb-view',
                    component: () => import('@/views/ui-elements/data-list/thumb-view/DataListThumbView.vue'),
                    meta: {
                        breadcrumb: [
                            { title: 'Home', url: '/' },
                            { title: 'Data List'},
                            { title: 'Thumb View', active: true },
                        ],
                        pageTitle: 'Thumb View',
                        rule: 'editor'
                    },
                },
                {
                    path: '/ui-elements/grid/vuesax',
                    name: 'grid-vuesax',
                    component: () => import('@/views/ui-elements/grid/vuesax/GridVuesax.vue'),
                    meta: {
                        breadcrumb: [
                            { title: 'Home', url: '/' },
                            { title: 'Grid'},
                            { title: 'Vuesax', active: true },
                        ],
                        pageTitle: 'Grid',
                        rule: 'editor'
                    },
                },
                {
                    path: '/ui-elements/grid/tailwind',
                    name: 'grid-tailwind',
                    component: () => import('@/views/ui-elements/grid/tailwind/GridTailwind.vue'),
                    meta: {
                        breadcrumb: [
                            { title: 'Home', url: '/' },
                            { title: 'Grid'},
                            { title: 'Tailwind', active: true },
                        ],
                        pageTitle: 'Tailwind Grid',
                        rule: 'editor'
                    },
                },
                {
                    path: '/ui-elements/colors',
                    name: 'colors',
                    component: () => import('./views/ui-elements/colors/Colors.vue'),
                    meta: {
                        breadcrumb: [
                            { title: 'Home', url: '/' },
                            { title: 'Colors', active: true },
                        ],
                        pageTitle: 'Colors',
                        rule: 'editor'
                    },
                },
                {
                    path: '/ui-elements/card/basic',
                    name: 'basic-cards',
                    component: () => import('./views/ui-elements/card/CardBasic.vue'),
                    meta: {
                        breadcrumb: [
                            { title: 'Home', url: '/' },
                            { title: 'Card' },
                            { title: 'Basic Cards', active: true },
                        ],
                        pageTitle: 'Basic Cards',
                        rule: 'editor'
                    },
                },
                {
                    path: '/ui-elements/card/statistics',
                    name: 'statistics-cards',
                    component: () => import('./views/ui-elements/card/CardStatistics.vue'),
                    meta: {
                        breadcrumb: [
                            { title: 'Home', url: '/' },
                            { title: 'Card' },
                            { title: 'Statistics Cards', active: true },
                        ],
                        pageTitle: 'Statistics Card',
                        rule: 'editor'
                    },
                },
                {
                    path: '/ui-elements/card/analytics',
                    name: 'analytics-cards',
                    component: () => import('./views/ui-elements/card/CardAnalytics.vue'),
                    meta: {
                        breadcrumb: [
                            { title: 'Home', url: '/' },
                            { title: 'Card' },
                            { title: 'Analytics Card', active: true },
                        ],
                        pageTitle: 'Analytics Card',
                        rule: 'editor'
                    },
                },
                {
                    path: '/ui-elements/card/card-actions',
                    name: 'card-actions',
                    component: () => import('./views/ui-elements/card/CardActions.vue'),
                    meta: {
                        breadcrumb: [
                            { title: 'Home', url: '/' },
                            { title: 'Card' },
                            { title: 'Card Actions', active: true },
                        ],
                        pageTitle: 'Card Actions',
                        rule: 'editor'
                    },
                },
                {
                    path: '/ui-elements/card/card-colors',
                    name: 'card-colors',
                    component: () => import('./views/ui-elements/card/CardColors.vue'),
                    meta: {
                        breadcrumb: [
                            { title: 'Home', url: '/' },
                            { title: 'Card' },
                            { title: 'Card Colors', active: true },
                        ],
                        pageTitle: 'Card Colors',
                        rule: 'editor'
                    },
                },
                {
                    path: '/ui-elements/table',
                    name: 'table',
                    component: () => import('./views/ui-elements/table/Table.vue'),
                    meta: {
                        breadcrumb: [
                            { title: 'Home', url: '/' },
                            { title: 'Table', active: true },
                        ],
                        pageTitle: 'Table',
                        rule: 'editor'
                    },
                },
                {
                    path: '/ui-elements/ag-grid-table',
                    name: 'ag-grid-table',
                    component: () => import('./views/ui-elements/ag-grid-table/AgGridTable.vue'),
                    meta: {
                        breadcrumb: [
                            { title: 'Home', url: '/' },
                            { title: 'agGrid Table', active: true },
                        ],
                        pageTitle: 'agGrid Table',
                        rule: 'editor'
                    },
                },

        // =============================================================================
        // COMPONENT ROUTES
        // =============================================================================
                {
                    path: '/components/alert',
                    name: 'component-alert',
                    component: () => import('@/views/components/vuesax/alert/Alert.vue'),
                    meta: {
                        breadcrumb: [
                            { title: 'Home', url: '/' },
                            { title: 'Components' },
                            { title: 'Alert', active: true },
                        ],
                        pageTitle: 'Alert',
                        rule: 'editor'
                    },
                },
                {
                    path: '/components/avatar',
                    name: 'component-avatar',
                    component: () => import('@/views/components/vuesax/avatar/Avatar.vue'),
                    meta: {
                        breadcrumb: [
                            { title: 'Home', url: '/' },
                            { title: 'Components' },
                            { title: 'Avatar', active: true },
                        ],
                        pageTitle: 'Avatar',
                        rule: 'editor'
                    },
                },
                {
                    path: '/components/breadcrumb',
                    name: 'component-breadcrumb',
                    component: () => import('@/views/components/vuesax/breadcrumb/Breadcrumb.vue'),
                    meta: {
                        breadcrumb: [
                            { title: 'Home', url: '/' },
                            { title: 'Components' },
                            { title: 'Breadcrumb', active: true },
                        ],
                        pageTitle: 'Breadcrumb',
                        rule: 'editor'
                    },
                },
                {
                    path: '/components/button',
                    name: 'component-button',
                    component: () => import('@/views/components/vuesax/button/Button.vue'),
                    meta: {
                        breadcrumb: [
                            { title: 'Home', url: '/' },
                            { title: 'Components' },
                            { title: 'Button', active: true },
                        ],
                        pageTitle: 'Button',
                        rule: 'editor'
                    },
                },
                {
                    path: '/components/button-group',
                    name: 'component-button-group',
                    component: () => import('@/views/components/vuesax/button-group/ButtonGroup.vue'),
                    meta: {
                        breadcrumb: [
                            { title: 'Home', url: '/' },
                            { title: 'Components' },
                            { title: 'Button Group', active: true },
                        ],
                        pageTitle: 'Button Group',
                        rule: 'editor'
                    },
                },
                {
                    path: '/components/chip',
                    name: 'component-chip',
                    component: () => import('@/views/components/vuesax/chip/Chip.vue'),
                    meta: {
                        breadcrumb: [
                            { title: 'Home', url: '/' },
                            { title: 'Components' },
                            { title: 'Chip', active: true },
                        ],
                        pageTitle: 'Chip',
                        rule: 'editor'
                    },
                },
                {
                    path: '/components/collapse',
                    name: 'component-collapse',
                    component: () => import('@/views/components/vuesax/collapse/Collapse.vue'),
                    meta: {
                        breadcrumb: [
                            { title: 'Home', url: '/' },
                            { title: 'Components' },
                            { title: 'Collapse', active: true },
                        ],
                        pageTitle: 'Collapse',
                        rule: 'editor'
                    },
                },
                {
                    path: '/components/dialogs',
                    name: 'component-dialog',
                    component: () => import('@/views/components/vuesax/dialogs/Dialogs.vue'),
                    meta: {
                        breadcrumb: [
                            { title: 'Home', url: '/' },
                            { title: 'Components' },
                            { title: 'Dialogs', active: true },
                        ],
                        pageTitle: 'Dialogs',
                        rule: 'editor'
                    },
                },
                {
                    path: '/components/divider',
                    name: 'component-divider',
                    component: () => import('@/views/components/vuesax/divider/Divider.vue'),
                    meta: {
                        breadcrumb: [
                            { title: 'Home', url: '/' },
                            { title: 'Components' },
                            { title: 'Divider', active: true },
                        ],
                        pageTitle: 'Divider',
                        rule: 'editor'
                    },
                },
                {
                    path: '/components/dropdown',
                    name: 'component-drop-down',
                    component: () => import('@/views/components/vuesax/dropdown/Dropdown.vue'),
                    meta: {
                        breadcrumb: [
                            { title: 'Home', url: '/' },
                            { title: 'Components' },
                            { title: 'Dropdown', active: true },
                        ],
                        pageTitle: 'Dropdown',
                        rule: 'editor'
                    },
                },
                {
                    path: '/components/list',
                    name: 'component-list',
                    component: () => import('@/views/components/vuesax/list/List.vue'),
                    meta: {
                        breadcrumb: [
                            { title: 'Home', url: '/' },
                            { title: 'Components' },
                            { title: 'List', active: true },
                        ],
                        pageTitle: 'List',
                        rule: 'editor'
                    },
                },
                {
                    path: '/components/loading',
                    name: 'component-loading',
                    component: () => import('@/views/components/vuesax/loading/Loading.vue'),
                    meta: {
                        breadcrumb: [
                            { title: 'Home', url: '/' },
                            { title: 'Components' },
                            { title: 'Loading', active: true },
                        ],
                        pageTitle: 'Loading',
                        rule: 'editor'
                    },
                },
                {
                    path: '/components/navbar',
                    name: 'component-navbar',
                    component: () => import('@/views/components/vuesax/navbar/Navbar.vue'),
                    meta: {
                        breadcrumb: [
                            { title: 'Home', url: '/' },
                            { title: 'Components' },
                            { title: 'Navbar', active: true },
                        ],
                        pageTitle: 'Navbar',
                        rule: 'editor'
                    },
                },
                {
                    path: '/components/notifications',
                    name: 'component-notifications',
                    component: () => import('@/views/components/vuesax/notifications/Notifications.vue'),
                    meta: {
                        breadcrumb: [
                            { title: 'Home', url: '/' },
                            { title: 'Components' },
                            { title: 'Notifications', active: true },
                        ],
                        pageTitle: 'Notifications',
                        rule: 'editor'
                    },
                },
                {
                    path: '/components/pagination',
                    name: 'component-pagination',
                    component: () => import('@/views/components/vuesax/pagination/Pagination.vue'),
                    meta: {
                        breadcrumb: [
                            { title: 'Home', url: '/' },
                            { title: 'Components' },
                            { title: 'Pagination', active: true },
                        ],
                        pageTitle: 'Pagination',
                        rule: 'editor'
                    },
                },
                {
                    path: '/components/popup',
                    name: 'component-popup',
                    component: () => import('@/views/components/vuesax/popup/Popup.vue'),
                    meta: {
                        breadcrumb: [
                            { title: 'Home', url: '/' },
                            { title: 'Components' },
                            { title: 'Popup', active: true },
                        ],
                        pageTitle: 'Popup',
                        rule: 'editor'
                    },
                },
                {
                    path: '/components/progress',
                    name: 'component-progress',
                    component: () => import('@/views/components/vuesax/progress/Progress.vue'),
                    meta: {
                        breadcrumb: [
                            { title: 'Home', url: '/' },
                            { title: 'Components' },
                            { title: 'Progress', active: true },
                        ],
                        pageTitle: 'Progress',
                        rule: 'editor'
                    },
                },
                {
                    path: '/components/sidebar',
                    name: 'component-sidebar',
                    component: () => import('@/views/components/vuesax/sidebar/Sidebar.vue'),
                    meta: {
                        breadcrumb: [
                            { title: 'Home', url: '/' },
                            { title: 'Components' },
                            { title: 'Sidebar', active: true },
                        ],
                        pageTitle: 'Sidebar',
                        rule: 'editor'
                    },
                },
                {
                    path: '/components/slider',
                    name: 'component-slider',
                    component: () => import('@/views/components/vuesax/slider/Slider.vue'),
                    meta: {
                        breadcrumb: [
                            { title: 'Home', url: '/' },
                            { title: 'Components' },
                            { title: 'Slider', active: true },
                        ],
                        pageTitle: 'Slider',
                        rule: 'editor'
                    },
                },
                {
                    path: '/components/tabs',
                    name: 'component-tabs',
                    component: () => import('@/views/components/vuesax/tabs/Tabs.vue'),
                    meta: {
                        breadcrumb: [
                            { title: 'Home', url: '/' },
                            { title: 'Components' },
                            { title: 'Tabs', active: true },
                        ],
                        pageTitle: 'Tabs',
                        rule: 'editor'
                    },
                },
                {
                    path: '/components/tooltip',
                    name: 'component-tooltip',
                    component: () => import('@/views/components/vuesax/tooltip/Tooltip.vue'),
                    meta: {
                        breadcrumb: [
                            { title: 'Home', url: '/' },
                            { title: 'Components' },
                            { title: 'Tooltip', active: true },
                        ],
                        pageTitle: 'Tooltip',
                        rule: 'editor'
                    },
                },
                {
                    path: '/components/upload',
                    name: 'component-upload',
                    component: () => import('@/views/components/vuesax/upload/Upload.vue'),
                    meta: {
                        breadcrumb: [
                            { title: 'Home', url: '/' },
                            { title: 'Components' },
                            { title: 'Upload', active: true },
                        ],
                        pageTitle: 'Upload',
                        rule: 'editor'
                    },
                },


        // =============================================================================
        // FORMS
        // =============================================================================
            // =============================================================================
            // FORM ELEMENTS
            // =============================================================================
                {
                    path: '/forms/form-elements/select',
                    name: 'form-element-select',
                    component: () => import('./views/forms/form-elements/select/Select.vue'),
                    meta: {
                        breadcrumb: [
                            { title: 'Home', url: '/' },
                            { title: 'Form Elements' },
                            { title: 'Select', active: true },
                        ],
                        pageTitle: 'Select',
                        rule: 'editor'
                    },
                },
                {
                    path: '/forms/form-elements/switch',
                    name: 'form-element-switch',
                    component: () => import('./views/forms/form-elements/switch/Switch.vue'),
                    meta: {
                        breadcrumb: [
                            { title: 'Home', url: '/' },
                            { title: 'Form Elements' },
                            { title: 'Switch', active: true },
                        ],
                        pageTitle: 'Switch',
                        rule: 'editor'
                    },
                },
                {
                    path: '/forms/form-elements/checkbox',
                    name: 'form-element-checkbox',
                    component: () => import('./views/forms/form-elements/checkbox/Checkbox.vue'),
                    meta: {
                        breadcrumb: [
                            { title: 'Home', url: '/' },
                            { title: 'Form Elements' },
                            { title: 'Checkbox', active: true },
                        ],
                        pageTitle: 'Checkbox',
                        rule: 'editor'
                    },
                },
                {
                    path: '/forms/form-elements/radio',
                    name: 'form-element-radio',
                    component: () => import('./views/forms/form-elements/radio/Radio.vue'),
                    meta: {
                        breadcrumb: [
                            { title: 'Home', url: '/' },
                            { title: 'Form Elements' },
                            { title: 'Radio', active: true },
                        ],
                        pageTitle: 'Radio',
                        rule: 'editor'
                    },
                },
                {
                    path: '/forms/form-elements/input',
                    name: 'form-element-input',
                    component: () => import('./views/forms/form-elements/input/Input.vue'),
                    meta: {
                        breadcrumb: [
                            { title: 'Home', url: '/' },
                            { title: 'Form Elements' },
                            { title: 'Input', active: true },
                        ],
                        pageTitle: 'Input',
                        rule: 'editor'
                    },
                },
                {
                    path: '/forms/form-elements/number-input',
                    name: 'form-element-number-input',
                    component: () => import('./views/forms/form-elements/number-input/NumberInput.vue'),
                    meta: {
                        breadcrumb: [
                            { title: 'Home', url: '/' },
                            { title: 'Form Elements' },
                            { title: 'Number Input', active: true },
                        ],
                        pageTitle: 'Number Input',
                        rule: 'editor'
                    },
                },
                {
                    path: '/forms/form-elements/textarea',
                    name: 'form-element-textarea',
                    component: () => import('./views/forms/form-elements/textarea/Textarea.vue'),
                    meta: {
                        breadcrumb: [
                            { title: 'Home', url: '/' },
                            { title: 'Form Elements' },
                            { title: 'Textarea', active: true },
                        ],
                        pageTitle: 'Textarea',
                        rule: 'editor'
                    },
                },
        // -------------------------------------------------------------------------------------------------------------------------------------------
                {
                    path: '/forms/form-layouts',
                    name: 'forms-form-layouts',
                    component: () => import('@/views/forms/FormLayouts.vue'),
                    meta: {
                        breadcrumb: [
                            { title: 'Home', url: '/' },
                            { title: 'Forms' },
                            { title: 'Form Layouts', active: true },
                        ],
                        pageTitle: 'Form Layouts',
                        rule: 'editor'
                    },
                },
                {
                    path: '/forms/form-wizard',
                    name: 'extra-component-form-wizard',
                    component: () => import('@/views/forms/form-wizard/FormWizard.vue'),
                    meta: {
                        breadcrumb: [
                            { title: 'Home', url: '/' },
                            { title: 'Extra Components' },
                            { title: 'Form Wizard', active: true },
                        ],
                        pageTitle: 'Form Wizard',
                        rule: 'editor'
                    },
                },
                {
                    path: '/forms/form-validation',
                    name: 'extra-component-form-validation',
                    component: () => import('@/views/forms/form-validation/FormValidation.vue'),
                    meta: {
                        breadcrumb: [
                            { title: 'Home', url: '/' },
                            { title: 'Extra Components' },
                            { title: 'Form Validation', active: true },
                        ],
                        pageTitle: 'Form Validation',
                        rule: 'editor'
                    },
                },
                {
                  path: '/forms/form-input-group',
                  name: 'extra-component-form-input-group',
                  component: () => import('@/views/forms/form-input-group/FormInputGroup.vue'),
                  meta: {
                      breadcrumb: [
                          { title: 'Home', url: '/' },
                          { title: 'Extra Components' },
                          { title: 'Form Input Group', active: true },
                      ],
                      pageTitle: 'Form Input Group',
                      rule: 'editor'
                  },
                },

        // =============================================================================
        // Pages Routes
        // =============================================================================
                {
                    path: '/pages/profile',
                    name: 'page-profile',
                    component: () => import('@/views/pages/Profile.vue'),
                    meta: {
                        breadcrumb: [
                            { title: 'Home', url: '/' },
                            { title: 'Pages' },
                            { title: 'Profile', active: true },
                        ],
                        pageTitle: 'Profile',
                        rule: 'admin'
                    },
                },
                {
                    path: '/pages/user-settings',
                    name: 'page-user-settings',
                    component: () => import('@/views/pages/user-settings/UserSettings.vue'),
                    meta: {
                        breadcrumb: [
                            { title: 'Home', url: '/' },
                            { title: 'Pages' },
                            { title: 'User Settings', active: true },
                        ],
                        pageTitle: 'Settings',
                        rule: 'editor'
                    },
                },
                {
                    path: '/pages/faq',
                    name: 'page-faq',
                    component: () => import('@/views/pages/Faq.vue'),
                    meta: {
                        breadcrumb: [
                            { title: 'Home', url: '/' },
                            { title: 'Pages' },
                            { title: 'FAQ', active: true },
                        ],
                        pageTitle: 'FAQ',
                        rule: 'editor'
                    },
                },
                {
                    path: '/pages/knowledge-base',
                    name: 'page-knowledge-base',
                    component: () => import('@/views/pages/KnowledgeBase.vue'),
                    meta: {
                        breadcrumb: [
                            { title: 'Home', url: '/' },
                            { title: 'Pages' },
                            { title: 'KnowledgeBase', active: true },
                        ],
                        pageTitle: 'KnowledgeBase',
                        rule: 'editor'
                    },
                },
                {
                    path: '/pages/knowledge-base/category',
                    name: 'page-knowledge-base-category',
                    component: () => import('@/views/pages/KnowledgeBaseCategory.vue'),
                    meta: {
                        breadcrumb: [
                            { title: 'Home', url: '/' },
                            { title: 'Pages' },
                            { title: 'KnowledgeBase', url: '/pages/knowledge-base' },
                            { title: 'Category', active: true },
                        ],
                        parent: 'page-knowledge-base',
                        rule: 'editor'
                    },
                },
                {
                    path: '/pages/knowledge-base/category/question',
                    name: 'page-knowledge-base-category-question',
                    component: () => import('@/views/pages/KnowledgeBaseCategoryQuestion.vue'),
                    meta: {
                        breadcrumb: [
                            { title: 'Home', url: '/' },
                            { title: 'Pages' },
                            { title: 'KnowledgeBase', url: '/pages/knowledge-base' },
                            { title: 'Category', url: '/pages/knowledge-base/category' },
                            { title: 'Question', active: true },
                        ],
                        parent: 'page-knowledge-base',
                        rule: 'editor'
                    },
                },
                {
                    path: '/pages/search',
                    name: 'page-search',
                    component: () => import('@/views/pages/Search.vue'),
                    meta: {
                        breadcrumb: [
                            { title: 'Home', url: '/' },
                            { title: 'Pages' },
                            { title: 'Search', active: true },
                        ],
                        pageTitle: 'Search',
                        rule: 'editor'
                    },
                },
                {
                    path: '/pages/invoice',
                    name: 'page-invoice',
                    component: () => import('@/views/pages/Invoice.vue'),
                    meta: {
                        breadcrumb: [
                            { title: 'Home', url: '/' },
                            { title: 'Pages' },
                            { title: 'Invoice', active: true },
                        ],
                        pageTitle: 'Invoice',
                        rule: 'editor'
                    },
                },

        // =============================================================================
        // CHARTS & MAPS
        // =============================================================================
                {
                    path: '/charts-and-maps/charts/apex-charts',
                    name: 'extra-component-charts-apex-charts',
                    component: () => import('@/views/charts-and-maps/charts/apex-charts/ApexCharts.vue'),
                    meta: {
                        breadcrumb: [
                            { title: 'Home', url: '/' },
                            { title: 'Charts & Maps' },
                            { title: 'Apex Charts', active: true },
                        ],
                        pageTitle: 'Apex Charts',
                        rule: 'editor'
                    },
                },
                {
                    path: '/charts-and-maps/charts/echarts',
                    name: 'extra-component-charts-echarts',
                    component: () => import('@/views/charts-and-maps/charts/echarts/Echarts.vue'),
                    meta: {
                        breadcrumb: [
                            { title: 'Home', url: '/' },
                            { title: 'Charts & Maps' },
                            { title: 'echarts', active: true },
                        ],
                        pageTitle: 'echarts',
                        rule: 'editor'
                    },
                },
                {
                    path: '/charts-and-maps/maps/google-map',
                    name: 'extra-component-maps-google-map',
                    component: () => import('@/views/charts-and-maps/maps/google-map/GoogleMap.vue'),
                    meta: {
                        breadcrumb: [
                            { title: 'Home', url: '/' },
                            { title: 'Charts & Maps' },
                            { title: 'Google Map', active: true },
                        ],
                        pageTitle: 'Google Map',
                        rule: 'editor'
                    },
                },



        // =============================================================================
        // EXTENSIONS
        // =============================================================================
                {
                    path: '/extensions/select',
                    name: 'extra-component-select',
                    component: () => import('@/views/components/extra-components/select/Select.vue'),
                    meta: {
                        breadcrumb: [
                            { title: 'Home', url: '/' },
                            { title: 'Extra Components' },
                            { title: 'Select', active: true },
                        ],
                        pageTitle: 'Select',
                        rule: 'editor'
                    },
                },
                {
                    path: '/extensions/quill-editor',
                    name: 'extra-component-quill-editor',
                    component: () => import('@/views/components/extra-components/quill-editor/QuillEditor.vue'),
                    meta: {
                        breadcrumb: [
                            { title: 'Home', url: '/' },
                            { title: 'Extra Components' },
                            { title: 'Quill Editor', active: true },
                        ],
                        pageTitle: 'Quill Editor',
                        rule: 'editor'
                    },
                },
                {
                    path: '/extensions/drag-and-drop',
                    name: 'extra-component-drag-and-drop',
                    component: () => import('@/views/components/extra-components/drag-and-drop/DragAndDrop.vue'),
                    meta: {
                        breadcrumb: [
                            { title: 'Home', url: '/' },
                            { title: 'Extra Components' },
                            { title: 'Drag & Drop', active: true },
                        ],
                        pageTitle: 'Drag & Drop',
                        rule: 'editor'
                    },
                },
                {
                    path: '/extensions/datepicker',
                    name: 'extra-component-datepicker',
                    component: () => import('@/views/components/extra-components/datepicker/Datepicker.vue'),
                    meta: {
                        breadcrumb: [
                            { title: 'Home', url: '/' },
                            { title: 'Extra Components' },
                            { title: 'Datepicker', active: true },
                        ],
                        pageTitle: 'Datepicker',
                        rule: 'editor'
                    },
                },
                {
                    path: '/extensions/datetime-picker',
                    name: 'extra-component-datetime-picker',
                    component: () => import('@/views/components/extra-components/datetime-picker/DatetimePicker.vue'),
                    meta: {
                        breadcrumb: [
                            { title: 'Home', url: '/' },
                            { title: 'Extra Components' },
                            { title: 'Datetime Picker', active: true },
                        ],
                        pageTitle: 'Datetime Picker',
                        rule: 'editor'
                    },
                },
                {
                    path: '/extensions/access-control',
                    name: 'extra-component-access-control',
                    component: () => import('@/views/components/extra-components/access-control/AccessControl.vue'),
                    meta: {
                        breadcrumb: [
                            { title: 'Home', url: '/' },
                            { title: 'Extensions' },
                            { title: 'Access Control', active: true },
                        ],
                        pageTitle: 'Access Control',
                        rule: 'admin'
                    },
                },
                {
                    path: '/extensions/i18n',
                    name: 'extra-component-i18n',
                    component: () => import('@/views/components/extra-components/I18n.vue'),
                    meta: {
                        breadcrumb: [
                            { title: 'Home', url: '/' },
                            { title: 'Extensions' },
                            { title: 'I18n', active: true },
                        ],
                        pageTitle: 'I18n',
                        rule: 'editor'
                    },
                },
                {
                    path: '/extensions/carousel',
                    name: 'extra-component-carousel',
                    component: () => import('@/views/components/extra-components/carousel/Carousel.vue'),
                    meta: {
                        breadcrumb: [
                            { title: 'Home', url: '/' },
                            { title: 'Extensions' },
                            { title: 'Carousel', active: true },
                        ],
                        pageTitle: 'Carousel',
                        rule: 'editor'
                    },
                },
                {
                    path: '/extensions/clipboard',
                    name: 'extra-component-clipboard',
                    component: () => import('@/views/components/extra-components/clipboard/Clipboard.vue'),
                    meta: {
                        breadcrumb: [
                            { title: 'Home', url: '/' },
                            { title: 'Extensions' },
                            { title: 'Clipboard', active: true },
                        ],
                        pageTitle: 'Clipboard',
                        rule: 'editor'
                    },
                },
                {
                    path: '/extensions/context-menu',
                    name: 'extra-component-context-menu',
                    component: () => import('@/views/components/extra-components/context-menu/ContextMenu.vue'),
                    meta: {
                        breadcrumb: [
                            { title: 'Home', url: '/' },
                            { title: 'Extensions' },
                            { title: 'Context Menu', active: true },
                        ],
                        pageTitle: 'Context Menu',
                        rule: 'editor'
                    },
                },
                {
                    path: '/extensions/star-ratings',
                    name: 'extra-component-star-ratings',
                    component: () => import('@/views/components/extra-components/star-ratings/StarRatings.vue'),
                    meta: {
                        breadcrumb: [
                            { title: 'Home', url: '/' },
                            { title: 'Extensions' },
                            { title: 'Star Ratings', active: true },
                        ],
                        pageTitle: 'Star Ratings',
                        rule: 'editor'
                    },
                },
                {
                    path: '/extensions/autocomplete',
                    name: 'extra-component-autocomplete',
                    component: () => import('@/views/components/extra-components/autocomplete/Autocomplete.vue'),
                    meta: {
                        breadcrumb: [
                            { title: 'Home', url: '/' },
                            { title: 'Extensions' },
                            { title: 'Autocomplete', active: true },
                        ],
                        pageTitle: 'Autocomplete',
                        rule: 'editor'
                    },
                },
                {
                    path: '/extensions/tree',
                    name: 'extra-component-tree',
                    component: () => import('@/views/components/extra-components/tree/Tree.vue'),
                    meta: {
                        breadcrumb: [
                            { title: 'Home', url: '/' },
                            { title: 'Extensions' },
                            { title: 'Tree', active: true },
                        ],
                        pageTitle: 'Tree',
                        rule: 'editor'
                    },
                },
                {
                    path: '/import-export/import',
                    name: 'import-excel',
                    component: () => import('@/views/components/extra-components/import-export/Import.vue'),
                    meta: {
                        breadcrumb: [
                            { title: 'Home', url: '/' },
                            { title: 'Extensions' },
                            { title: 'Import/Export' },
                            { title: 'Import', active: true },
                        ],
                        pageTitle: 'Import Excel',
                        rule: 'editor'
                    },
                },
                {
                    path: '/import-export/export',
                    name: 'export-excel',
                    component: () => import('@/views/components/extra-components/import-export/Export.vue'),
                    meta: {
                        breadcrumb: [
                            { title: 'Home', url: '/' },
                            { title: 'Extensions' },
                            { title: 'Import/Export' },
                            { title: 'Export', active: true },
                        ],
                        pageTitle: 'Export Excel',
                        rule: 'editor'
                    },
                },
                {
                    path: '/import-export/export-selected',
                    name: 'export-excel-selected',
                    component: () => import('@/views/components/extra-components/import-export/ExportSelected.vue'),
                    meta: {
                        breadcrumb: [
                            { title: 'Home', url: '/' },
                            { title: 'Extensions' },
                            { title: 'Import/Export' },
                            { title: 'Export Selected', active: true },
                        ],
                        pageTitle: 'Export Excel',
                        rule: 'editor'
                    },
                },
            ],
        },
    // =============================================================================
    // FULL PAGE LAYOUTS
    // =============================================================================
        {
            path: '',
            component: () => import('@/layouts/full-page/FullPage.vue'),
            children: [
        // =============================================================================
        // PAGES
        // =============================================================================
                {
                    path: '/callback',
                    name: 'auth-callback',
                    component: () => import('@/views/Callback.vue'),
                    meta: {
                        rule: 'editor'
                    }
                },
                {
                    path: '/login',
                    name: 'page-login',
                    component: () => import('@/views/pages/login/Login.vue'),
                    meta: {
                        rule: 'all'
                    }
                },
                {
                    path: '/pages/register',
                    name: 'page-register',
                    component: () => import('@/views/pages/register/Register.vue'),
                    meta: {
                        rule: 'sadmin'
                    }
                },
                {
                    path: '/pages/forgot-password',
                    name: 'page-forgot-password',
                    component: () => import('@/views/pages/ForgotPassword.vue'),
                    meta: {
                        rule: 'editor'
                    }
                },
                {
                    path: '/pages/reset-password',
                    name: 'page-reset-password',
                    component: () => import('@/views/pages/ResetPassword.vue'),
                    meta: {
                        rule: 'editor'
                    }
                },
                {
                    path: '/pages/lock-screen',
                    name: 'page-lock-screen',
                    component: () => import('@/views/pages/LockScreen.vue'),
                    meta: {
                        rule: 'editor'
                    }
                },
                {
                    path: '/pages/comingsoon',
                    name: 'page-coming-soon',
                    component: () => import('@/views/pages/ComingSoon.vue'),
                    meta: {
                        rule: 'editor'
                    }
                },
                {
                    path: '/pages/error-404',
                    name: 'page-error-404',
                    component: () => import('@/views/pages/Error404.vue'),
                    meta: {
                        rule: 'editor'
                    }
                },
                {
                    path: '/pages/error-500',
                    name: 'page-error-500',
                    component: () => import('@/views/pages/Error500.vue'),
                    meta: {
                        rule: 'editor'
                    }
                },
                {
                    path: '/pages/not-authorized',
                    name: 'page-not-authorized',
                    component: () => import('@/views/pages/NotAuthorized.vue'),
                    meta: {
                        rule: 'editor'
                    }
                },
                {
                    path: '/pages/maintenance',
                    name: 'page-maintenance',
                    component: () => import('@/views/pages/Maintenance.vue'),
                    meta: {
                        rule: 'editor'
                    }
                },
            ]
        },
        // Redirect to 404 page, if no match found
        {
            path: '*',
            redirect: '/pages/error-404'
        }
    ],
})


router.afterEach(() => {
  // Remove initial loading
  const appLoading = document.getElementById('loading-bg')
    if (appLoading) {
        appLoading.style.display = "none";
    }
})


router.beforeEach((to, from, next) => {
    // you could define your own authentication logic with token
    // check route meta if it requires auth or not
    const accessRole = store.state.userRole;
    if(to.matched.some(record => record.meta.requiresAuth)) {
        if (!localStorage.getItem('usertoken')) {
            next({
                path: '/login',
                params: {nextUrl: to.fullPath}
            })
            // this.openModal()
        }
        // else if(to.matched.some(record => record.meta.rule)){
        //     if(to.meta.rule == accessRole) {
        //         next()
        //     }else{
        //         next()
        //     }
        // }
        else {
            next()
        }
    } else{
         next()
    }
});

export default router;
// {
//     components: { expired },
//     methods: {
//         openModal() { this.$refs.expired.show() }//executing the show method of child
//     }
// }
