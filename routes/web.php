<?php
use Illuminate\Support\Facades\Artisan;

Auth::routes();
Route::view("/", "welcome");
Route::view("template", "template");
Route::view("pdf", "pdf");

Route::get("storage_link", function(){ Artisan::call('storage:link'); });

Route::get("payrolls_approves", "PayrollApprovesController@index")->name("payrolls.approves.index");
Route::get("payrolls_approves/{payroll}", "PayrollApprovesController@store")->name("payrolls.approves.store");
Route::get("payrolls_approves/{payroll}/code", "PayrollApprovesController@update")->name("payrolls.approves.update");

Route::get("employee_profiles/{employee}", "EmployeeProfileController@index")->name("employee_profiles.index");

Route::get('dashboard', [
    "as" => "home",
    "uses" => "HomeController@index"
]);

     Route::get("payrolls", [
        "as" => "payrolls.reports",
        "uses" => "PayrollsReportsController@index",
    ]);

  Route::get("payrolls/export", [
        "as" => "payrolls.export",
        "uses" => "PayrollsReportsController@export"
    ]);
Route::prefix('settings')->group(function () {
    
    Route::post("groups/{group}/products", [
        "as" => "groups.products.store",
        "uses" => "GroupProductsController@store"
    ]);
    Route::get("group_products", [
        "as" => "group_products.index",
        "uses" => "GroupProductsController@index"
    ]);
    Route::patch("group_products/{id}", [
        "as" => "group_products.update",
        "uses" => "GroupProductsController@update"
    ]);
    Route::get("blocks/export", [
        "as" => "blocks.export",
        "uses" => "BlocksController@export"
    ]);
    Route::resource("blocks", "BlocksController");
    Route::get("groups/export", [
        "as" => "groups.export",
        "uses" => "GroupsController@export"
    ]);
    Route::resource("groups", "GroupsController");
    Route::get("users/export", [
        "as" => "users.export",
        "uses" => "UsersController@export"
    ]);
    Route::resource("users", "UsersController");
    Route::resource("roles", "RolesController");
    Route::get("products/exports", [
        "as" => "products.export",
        "uses" => "ProductsController@export"
    ]);
    Route::resource("products", "ProductsController");
    Route::get("batches","BatchesController@index");
    Route::resource("batches", "BatchesController");
    Route::post("batches/{batch}","BatchesController@update");
    Route::get("batches/export", [
        "as" => "batches.export",
        "uses" => "BatchesController@export"
    ]);
    Route::resource("batches", "BatchesController");
    Route::get("product_categories/export", [
        "as" => "product_categories.export",
        "uses" => "ProductCategoriesController@export",
    ]);
    Route::resource("product_categories", "ProductCategoriesController");
});
 Route::get("users/{user}/passwordchange", [
    "as" => "password.change",
     "uses" => "ResetPasswordController@change",
 ]);
  Route::get("changepassword", [
     "as" => "changepassword.index",
      "uses" => "ChangePasswordControllerr@index"
  ]);
  Route::resource("changepassword", "Auth\ChangePasswordController");
 Route::post("changepassword/{user}","Auth\ChangePasswordController@update");
 Route::resource("employees","EmployeesController");
 Route::get("employee/create", [
     "as" => "employee.create",
      "uses" => "EmployeesController@create"
  ]);
 Route::post("employee/store", [
     "as" => "employee.store",
      "uses" => "EmployeesController@store"
  ]);
  Route::post("employees/{employee}", [
     "as" => "employees.update",
      "uses" => "EmployeesController@update"
  ]);

   Route::get('import_employee','EmployeesController@import');
Route::post('/importemployee_parse', 'EmployeesController@parseImport')->name('importemployee_parse');

 Route::get('sample_file','EmployeesController@sample');

Route::post('/import_process', 'EmployeesController@processImport')->name('import_process');

    Route::get('employeemaster','employee\employeemaster@index');
    Route::get('addemployee','employee\employeemaster@addemployee');
    Route::post('employeestore','employee\employeemaster@store');
    //Route::get('editemployee/{employeeid}/edit','employee\employeemaster@edit');
    Route::get('editemployee/{id}','employee\employeemaster@edit');
    Route::post('employeeupdate/{id}','employee\employeemaster@update');
    Route::get('employeedelete/{id}','employee\employeemaster@destroy');
    Route::get('prlpayroll','employee\employeemaster@prlpayroll');
    Route::get('editemployeedetail/{id}','employee\employeemaster@editemployeedetail');
    Route::get('jobs','job\JobsController@index');
    Route::get('addjob','job\JobsController@create');
    Route::post('new_job','job\JobsController@store');
    Route::get('showjob/{id}','job\JobsController@show');
    Route::get('editjob/{id}','job\JobsController@edit');
    Route::post('update_job/{id}','job\JobsController@update');
    Route::get('deletejob/{id}','job\JobsController@destroy');
    Route::get('viewjobgroups','job\jobgroupsController@index');
    Route::get('createjobgroup','job\jobgroupsController@create');
    Route::post('addjobgroup','job\jobgroupsController@store');
    Route::get('showjobgroup/{id}','job\jobgroupsController@show');
    Route::get('editjobgroup/{id}','job\jobgroupsController@edit');
    Route::post('updatejobgroup/{id}','job\jobgroupsController@update');
    Route::get('deletejobgroup/{id}','job\jobgroupsController@destroy');
    Route::post('addbranch','branch\branchcontroller@store');
    Route::get('createbranch','branch\branchcontroller@create');
    Route::get('viewbranches','branch\branchcontroller@index');
    Route::get('editbranch/{id}','branch\branchcontroller@edit');
    Route::post('updatebranch/{id}','branch\branchcontroller@update');
    Route::get('deletebranch/{id}','branch\branchcontroller@destroy');
    Route::get('showbranch/{id}','branch\branchcontroller@show');
    Route::post('adddepartment','department\DepartmentsController@store');
    Route::get('createdepartment','department\DepartmentsController@create');
    Route::get('viewdepartments','department\DepartmentsController@index');
    Route::get('editdepartment/{id}','department\DepartmentsController@edit');
    Route::post('updatedepartment/{id}','department\DepartmentsController@update');
    Route::get('deletedepartment/{id}','department\DepartmentsController@destroy');
    Route::get('showdepartment/{id}','department\DepartmentsController@show');
    Route::post('addcompany','company\companiesController@store');
    Route::get('createcompany','company\companiesController@create');
    Route::get('viewcompany','company\companiesController@index');
    Route::get('editcompany/{id}','company\companiesController@edit');
    Route::post('updatecompany/{id}','company\companiesController@update');
    Route::get('showcompany/{id}','company\companiesController@show');
    Route::get('deletecompany/{id}','company\companiesController@destroy');
    Route::post('addsss','sss\SssController@store');
    Route::get('editsss/{id}','sss\SssController@edit');
    Route::get('createsss','sss\SssController@create');
     Route::get('viewsss','sss\SssController@index');
     Route::get('deletesss/{id}','sss\SssController@destroy');
     Route::post('updatesss/{id}','sss\SssController@update');
     Route::post('addhdmf','hdmf\Hdmfontroller@store');
    Route::get('edithdmf/{id}','hdmf\Hdmfontroller@edit');
    Route::get('createhdmf','hdmf\Hdmfontroller@create');
     Route::get('viewhdmf','hdmf\Hdmfontroller@index');
     Route::get('deletehdmf/{id}','hdmf\Hdmfontroller@destroy');
     Route::post('updatehdmf/{id}','hdmf\Hdmfontroller@update');
     Route::post('addhealth','health\HealthsController@store');
    Route::get('edithealth/{id}','health\HealthsController@edit');
    Route::get('createhealth','health\HealthsController@create');
     Route::get('viewhealth','health\HealthsController@index');
     Route::get('deletehealth/{id}','health\HealthsController@destroy');
     Route::post('updatehealth/{id}','health\HealthsController@update');
     Route::post('addtax','tax\TaxController@store');
    Route::get('edittax/{id}','tax\TaxController@edit');
    Route::get('createtax','tax\TaxController@create');
     Route::get('viewtax','tax\TaxController@index');
     Route::get('deletetax/{id}','tax\TaxController@destroy');
     Route::post('updatetax/{id}','tax\TaxController@update');
    Route::post('addsalary','salary\SalariesController@store');
    Route::get('createsalary','salary\SalariesController@create');
     Route::get('salaries','salary\SalariesController@index');
    Route::post('addpayrollperiod','payroll\payrollsController@store');
    Route::get('showpayroll/{id}','payroll\payrollsController@show');
    Route::get('editpayroll/{id}','payroll\payrollsController@edit');
    Route::post('updatepayroll/{id}','payroll\payrollsController@update');
    Route::get('deletepayroll/{id}','payroll\payrollsController@destroy');
    Route::get('createpayrollperiod','payroll\PayrollsController@create');
    Route::get('viewpayrollperiods','payroll\PayrollsController@index');
    Route::post('generate/{id}','payroll\payrollsController@generate');
    Route::post('void/{id}','payroll\payrollsController@void');
    Route::post('close/{id}','payroll\payrollsController@close');
    Route::post('open/{id}','payroll\payrollsController@open');

    Route::post('approvepayrolls/{id}','payroll\payrollsController@approvepayroll');
     Route::post('authorizepayroll/{id}','payroll\payrollsController@authorizepayroll');

    Route::get('processpayroll','payroll\PayrollsController@openpayroll');
    Route::get('approvepayroll','payroll\PayrollsController@toapprovepayroll');
    Route::get('authorizepayroll','payroll\PayrollsController@toauthorizepayroll');
    //qualifications
    Route::post('addqualification','qualification\qualificationscontroller@store');
    Route::get('showqualification/{id}','qualification\qualificationscontroller@show');
    Route::get('editqualification/{id}','qualification\qualificationscontroller@edit');
    Route::post('updatequalification/{id}','qualification\qualificationscontroller@update');
    Route::get('deletequalification/{id}','qualification\qualificationscontroller@destroy');
    Route::get('createqualification','qualification\qualificationscontroller@create');
    Route::get('viewqualifications','qualification\qualificationscontroller@index');
    //employee qualifications
    Route::post('addemployeequalification','qualification\employeequalificationscontroller@store');
    Route::get('showemployeequalification/{id}','qualification\employeequalificationscontroller@show');
    Route::get('editemployeequalification/{id}','qualification\employeequalificationscontroller@edit');
    Route::post('updateemployeequalification/{id}','qualification\employeequalificationscontroller@update');
    Route::get('deleteemployeequalification/{id}','qualification\employeequalificationscontroller@destroy');
    Route::get('createemployeequalification','qualification\employeequalificationscontroller@create');
    Route::get('viewemployeequalifications','qualification\employeequalificationscontroller@index');
    //qualification level
    Route::post('addqualificationlevel','qualification\qualificationlevelscontroller@store');
    Route::get('showqualificationlevel/{id}','qualification\qualificationlevelscontroller@show');
    Route::get('editqualificationlevel/{id}','qualification\qualificationlevelscontroller@edit');
    Route::post('updatequalificationlevel/{id}','qualification\qualificationlevelscontroller@update');
    Route::get('deletequalificationlevel/{id}','qualification\qualificationlevelscontroller@destroy');
    Route::get('createqualificationlevel','qualification\qualificationlevelscontroller@create');
    Route::get('viewqualificationlevels','qualification\qualificationlevelscontroller@index');
    //institution
    Route::post('addinstitution','institution\institutescontroller@store');
    Route::get('showinstitution/{id}','institution\institutescontroller@show');
    Route::get('editinstitution/{id}','institution\institutescontroller@edit');
    Route::post('updateinstitution/{id}','institution\institutescontroller@update');
    Route::get('deleteinstitution/{id}','institution\institutescontroller@destroy');
    Route::get('createinstitution','institution\institutescontroller@create');
    Route::get('viewinstitutions','institution\institutescontroller@index');

    //refereee
    Route::post('addReferee','Referee\RefereesController@store');
    Route::get('showReferee/{id}','Referee\RefereesController@show');
    Route::get('editReferee/{id}','Referee\RefereesController@edit');
    Route::post('updateReferee/{id}','Referee\RefereesController@update');
    Route::get('deleteReferee/{id}','Referee\RefereesController@destroy');
    Route::get('createReferee','Referee\RefereesController@create');
    Route::get('viewReferees','Referee\RefereesController@index');
//dependants
    Route::post('adddependant','dependant\dependantscontroller@store');
     Route::post('addemployeedependant','dependant\dependantscontroller@storeemployeedependant');
    Route::get('showdependant/{id}','dependant\dependantscontroller@show');
    Route::get('editdependant/{id}','dependant\dependantscontroller@edit');
    Route::post('updatedependant/{id}','dependant\dependantscontroller@update');
    Route::get('deletedependant/{id}','dependant\dependantscontroller@destroy');
    Route::get('createdependant','dependant\dependantscontroller@create');
    
    Route::get('createdependant/{id}','dependant\dependantscontroller@createemployeedependant');
    Route::get('viewdependants','dependant\dependantscontroller@index');
    //work Experience
    Route::post('addworkexperience','workexperience\workexperiencecontroller@store');
    Route::get('showworkexperience/{id}','workexperience\workexperiencecontroller@show');
    Route::get('editworkexperience/{id}','workexperience\workexperiencecontroller@edit');
    Route::post('updateworkexperience/{id}','workexperience\workexperiencecontroller@update');
    Route::get('deleteworkexperience/{id}','workexperience\workexperiencecontroller@destroy');
    Route::get('createworkexperience','workexperience\workexperiencecontroller@create');
    Route::get('viewworkexpiriences','workexperience\workexperiencecontroller@index');
    
    Route::get('testreport','report\reportcontroller@test');
    Route::get('testpdf','report\reportcontroller@testpdf');
     Route::post('employeebio','report\reportscontroller@employeebio');
     Route::get('reportform','report\reportscontroller@reportform');
     Route::get('payslipform','report\reportscontroller@payslipform');
     Route::get('payslip','report\reportscontroller@payslip');
     Route::get('payrollregisterform','report\reportscontroller@payrollregisterform');
     Route::post('payrollregister','report\reportscontroller@payrollregister');
     Route::get('payrollregisterformpdf','report\reportscontroller@payrollregisterformpdf');
     Route::post('payrollregisterpdf','report\reportscontroller@payrollregisterpdf');
     Route::post('printpayslip/{id}','report\reportscontroller@print');
     
     Route::get('form','form\FormController@create');
     Route::post('form','form\FormController@store');
     Route::get('formlist','form\FormController@index');
     Route::get('createimage/{id}','form\FormController@createimage');
     Route::post('updateimage','form\FormController@updateimage');
     //payrolls
    Route::post('addotherdeduction','otherdeduction\otherdeductionscontroller@store');
    Route::get('showotherdeduction/{id}','otherdeduction\otherdeductionscontroller@show');
    Route::get('editotherdeduction/{id}','otherdeduction\otherdeductionscontroller@edit');
    Route::post('updateotherdeduction/{id}','otherdeduction\otherdeductionscontroller@update');
    Route::get('deleteotherdeduction/{id}','otherdeduction\otherdeductionscontroller@destroy');
    Route::get('createotherdeduction','otherdeduction\otherdeductionscontroller@create');
    Route::get('viewotherdeductions','otherdeduction\otherdeductionscontroller@index');
     Route::get('deductionstypes','otherdeduction\deductions\deductionsController@index');
    Route::get('createdeductiontype','otherdeduction\deductions\deductionsController@create');
    Route::post('storedeductiontype','otherdeduction\deductions\deductionsController@store');
    Route::get('deletedeductiontype/{id}','otherdeduction\deductions\deductionsController@destroy');
    Route::post('updatdeductiontype/{id}','otherdeduction\deductions\deductionsController@update');
    Route::get('editdeductiontype/{id}','otherdeduction\deductions\deductionsController@edit');
    Route::post('addotherincome','otherincome\otherincomescontroller@store');
    Route::get('showotherincome/{id}','otherincome\otherincomescontroller@show');
    Route::get('editotherincome/{id}','otherincome\otherincomescontroller@edit');
    Route::post('updateotherincome/{id}','otherincome\otherincomescontroller@update');
    Route::get('deleteotherincome/{id}','otherincome\otherincomescontroller@destroy');
    Route::get('createotherincome','otherincome\otherincomescontroller@create');
    Route::get('viewotherincomes','otherincome\otherincomescontroller@index');
    Route::get('incomestypes','otherincome\incomes\incomesController@index');
    Route::get('createincometype','otherincome\incomes\incomesController@create');
    Route::post('storeincometype','otherincome\incomes\incomesController@store');
    Route::get('deleteincometype/{id}','otherincome\incomes\incomesController@destroy');
    Route::post('updatincometype/{id}','otherincome\incomes\incomesController@update');
    Route::get('editincometype/{id}','otherincome\incomes\incomesController@edit');
    //loan
     Route::post('addloan','loan\loanscontroller@store');
    Route::get('showloan/{id}','loan\loanscontroller@show');
    Route::get('editloan/{id}','loan\loanscontroller@edit');
    Route::post('updateloan/{id}','loan\loanscontroller@update');
    Route::get('deleteloan/{id}','loan\loanscontroller@destroy');
    Route::get('createloan','loan\loanscontroller@create');
    Route::get('viewloans','loan\loanscontroller@index');

//Timesheet

    Route::post('newtime','Timesheet\DailyTransactionController@store');
    Route::get('showDailyTran/{id}','Timesheet\DailyTransactionController@show');
    Route::get('editDailyTran/{id}','Timesheet\DailyTransactionController@edit');
    Route::post('updateDailyTran/{id}','Timesheet\DailyTransactionController@update');
    Route::get('deleteDailyTran/{id}','Timesheet\DailyTransactionController@destroy');
    Route::get('createDailyTran','Timesheet\DailyTransactionController@create');
    Route::get('viewDailyTrans','Timesheet\DailyTransactionController@index');

    //leave management Starts here 

    Route::get("leaves", [
    "as" => "leaves.index",
    "uses" => "Leave\LeavesController@index",
]);

        Route::get("leaves/create", [
    "as" => "leaves.create",
    "uses" => "Leave\LeavesController@create",
]);
    Route::post("leaves/store", [
    "as" => "leaves.store",
    "uses" => "Leave\LeavesController@store",
]);

            Route::get("leaves/{id}/show", [
    "as" => "leaves.show",
    "uses" => "Leave\LeavesController@show",
]);
     Route::get("leaves/{id}/edit", [
    "as" => "leaves.edit",
    "uses" => "Leave\LeavesController@edit",
]);

       Route::post("leaves/{id}/update", [
    "as" => "leaves.update",
    "uses" => "Leave\LeavesController@update",
]);
       Route::post("leaveupdate/{id}","Leave\LeavesController@update");

      Route::get('showleavetype/{id}','Leave\LeaveTypesController@show');
    Route::get('editleavetype/{id}','Leave\LeaveTypesController@edit');
    Route::post('updateleavetype/{id}','Leave\LeaveTypesController@update');
    Route::get('deleteleavetype/{id}','Leave\LeaveTypesController@destroy');
    Route::get('createleavetype','Leave\LeaveTypesController@create');
    Route::get('viewleavetypes','Leave\LeaveTypesController@index');
     Route::post('storeleavetype','Leave\LeaveTypesController@store');

         Route::get('showleavebalance/{id}','Leave\LeaveBalanceController@show');
    Route::get('editleavebalance/{id}','Leave\LeaveBalanceController@edit');
    Route::post('updateleavebalance/{id}','Leave\LeaveBalanceController@update');
    Route::get('deleteleavebalance/{id}','Leave\LeaveBalanceController@destroy');
    Route::get('createleavebalance','Leave\LeaveBalanceController@create');
    Route::get('viewleavebalances','Leave\LeaveBalanceController@index');
    Route::post('storeleavebalance','Leave\LeaveBalanceController@store');

        Route::get('showleaveapproval/{id}','Leave\LeaveApprovalLevelsController@show');
    Route::get('editleaveapproval/{id}','Leave\LeaveApprovalLevelsController@edit');
    Route::post('updateleaveapproval/{id}','Leave\LeaveApprovalLevelsController@update');
    Route::get('deleteleaveapproval/{id}','Leave\LeaveApprovalLevelsController@destroy');
    Route::get('createleaveapproval','Leave\LeaveApprovalLevelsController@create');
    Route::get('viewleaveapprovals','Leave\LeaveApprovalLevelsController@index');
    Route::post('storeleaveapproval','Leave\LeaveApprovalLevelsController@store');

    Route::get('showleaveapprovalaction/{id}','Leave\LeaveApprovalActionsController@show');
    Route::get('editleaveapprovalaction/{id}','Leave\LeaveApprovalActionsController@edit');
    Route::post('updateleaveapprovalaction/{id}','Leave\LeaveApprovalActionsController@update');
    Route::get('deleteleaveapprovalaction/{id}','Leave\LeaveApprovalActionsController@destroy');
    Route::get('createleaveapprovalaction','Leave\LeaveApprovalActionsController@create');
    Route::get('viewleaveapprovalactions','Leave\LeaveApprovalActionsController@index');
    Route::post('storeleaveapprovalaction','Leave\LeaveApprovalActionsController@store');

    Route::get('showleaveapprover/{id}','Leave\LeaveApproversController@show');
    Route::get('editleaveapprover/{id}','Leave\LeaveApproversController@edit');
    Route::post('updateleaveapprover/{id}','Leave\LeaveApproversController@update');
    Route::get('deleteleaveapprover/{id}','Leave\LeaveApproversController@destroy');
    Route::get('createleaveapprover','Leave\LeaveApproversController@create');
    Route::get('viewleaveapprovers','Leave\LeaveApproversController@index');
    Route::post('storeleaveapprover','Leave\LeaveApproversController@store');
     Route::post('storeleaveapprover','Leave\LeaveApproversController@store');
    Route::post('asignleaveapprover/{id}','Leave\LeaveApproversController@asign');
    Route::get('deactivateleaveapprover/{id}','Leave\LeaveApproversController@deactivate');


//Leave Approvals
    Route::get("approvals", [
    "as" => "approvals.index",
    "uses" => "Leave\LeaveApprovalsController@index",
]);

       Route::get("leaveapprovals", [
    "as" => "leave.approvals",
    "uses" => "Leave\LeaveApprovalsController@approvals",
]);
   
   //Payroll Reports

       Route::get("payrollregister","report\payroll\PayrollRegisterReportController@index");
       Route::post("payrollregistergenerate","report\payroll\PayrollRegisterReportController@generate");

       Route::get("payslipform","report\payroll\PayslipReportController@index");
       Route::post("payslipreport","report\payroll\PayslipReportController@print");

       Route::get("monthlytaxform","report\payroll\TaxReportController@index");
       Route::post("monthlytaxreport","report\payroll\TaxReportController@print");

        Route::get("monthlysssform","report\payroll\SSSReportController@index");
       Route::post("monthlysssreport","report\payroll\SSSReportController@print");

       Route::get("payrollsummeryform","report\payroll\PayrollRegisterReportController@payrollsummeryform");
       Route::post("payrollsummeryreport","report\payroll\PayrollRegisterReportController@payrollsummeryprint");


       //Leave Reports

        Route::get("leavebalance","report\Leave\LeaveReportController@leavebalanceform");
       Route::post("leavebalancereport","report\Leave\LeaveReportController@balanceprint");

        Route::get("leaveform","report\Leave\LeaveReportController@index");
       Route::post("leaveformreport","report\Leave\LeaveReportController@print");

       Route::get('findLeaveForm/{id}','report\Leave\LeaveReportController@findLeaveForm');
       Route::get('getLeaveBalance/{id}','Leave\LeavesController@getLeaveBalance');


       Route::post("approveleave/{id}","Leave\LeaveApprovalsController@approveleave");
       Route::post("rejectleave/{id}","Leave\LeaveApprovalsController@rejectleave");
       

       




    