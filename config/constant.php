<?php 


return [
	'role_menu' => [
        'account',
        'dashboard',
        'notes',
        'activities',
        'leads',
        'leadsource',
        'leadstage',
        'dealstages',
        'deals',
        'tasks',
        'products',
        'pages',
        'customers',
        'users',
        'invoices',
        'payments',
        'activity_log',
        'database_backup',
        'email_template',
        'reports',
        'master_data',
        'bulk_import',
        'organizations',
    ],
    'payment_method' => [
        'cash',
        'card',
        'cheque',
        'imps',
        'neft',
        'rtgs',
        'upi'
    ],
    'payment_status' => [
        'pending',
        'paid',
        'failed'
    ],
    'payment_gateway' => [
        'razorpay' => 'Razor Pay',
        'ccavenue' => 'CCAvenue',
        'payumoney' => 'PayUmoney',
        'paybiz' => 'PayBiz',
        'citrus' => 'Citrus'
    ],
    'workflow_type' => [
        'New Customer Addition',
        'New Lead Addition',
        'New Deal Addition',
        'New Organization Addition',
        'Activity on all Leads',
        'Activity on all Deals',
        'Conversion from Lead to Deal',
        'Deal stage changed',
        'Invoice Creation',
        'Deal won/lose',
        'Payment Remainder',
        'Thanks mail for the payment received',
    ],
    'email_type' => [
        'new_registration',
        'forgot_password',
        'deal_conversion',
        'stage_completed',
        'success_deal',
        'loss_deal',
        'invoice_approval',
        'success_payment',
        'payment_remainder'
    ],
];