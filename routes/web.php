<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [App\Http\Controllers\FrontendController::class, 'loginUser']);
Route::get('forgotPasswordUser', [App\Http\Controllers\FrontendController::class, 'forgotPasswordUser']);
Route::get('regiterUser', [App\Http\Controllers\FrontendController::class, 'regiterUser']);
Route::get('successUser', [App\Http\Controllers\FrontendController::class, 'successUser']);
Route::get('indexUser', [App\Http\Controllers\FrontendController::class, 'indexUser']); // แสดงสถิติ
// Route::get('user/study', [App\Http\Controllers\FrontendController::class, 'userStudy']);
Route::get('user/study', [App\Http\Controllers\FrontendController::class, 'userStudy']);
Route::get('user/study/form', [App\Http\Controllers\FrontendController::class, 'userStudyForm']);
Route::get('user/study/edit', [App\Http\Controllers\FrontendController::class, 'userStudyEdit']);
Route::get('user/history', [App\Http\Controllers\FrontendController::class, 'userHistory']);

Route::get('user/training', [App\Http\Controllers\FrontendController::class, 'userTraining']);
Route::get('user/training/detail', [App\Http\Controllers\FrontendController::class, 'userTrainingDetail']);

Route::get('user/plan', [App\Http\Controllers\FrontendController::class, 'userPlan']);
Route::get('user/plan/form', [App\Http\Controllers\FrontendController::class, 'userPlanForm']);
Route::get('user/plan/edit', [App\Http\Controllers\FrontendController::class, 'userPlanEdit']);

Route::get('user/course', [App\Http\Controllers\FrontendController::class, 'userCourse']);



Route::get('indexCompany', [App\Http\Controllers\FrontendController::class, 'indexCompany']);
Route::get('company/job/form', [App\Http\Controllers\FrontendController::class, 'companyJobForm']);
Route::get('company/job/edit', [App\Http\Controllers\FrontendController::class, 'companyJobEdit']);
Route::get('company/job/detail', [App\Http\Controllers\FrontendController::class, 'companyJobDetail']);

Route::get('company/job/capacity', [App\Http\Controllers\FrontendController::class, 'companyJobCapa']);
Route::get('company/job/capacity/form', [App\Http\Controllers\FrontendController::class, 'companyJobCapaForm']);
Route::get('company/job/capacity/edit', [App\Http\Controllers\FrontendController::class, 'companyJobCapaEdit']);

Route::get('company/job/skills', [App\Http\Controllers\FrontendController::class, 'companyJobSkills']);
Route::get('company/job/skills/form', [App\Http\Controllers\FrontendController::class, 'companyJobSkillsForm']);
Route::get('company/job/skills/edit', [App\Http\Controllers\FrontendController::class, 'companyJobSkillsEdit']);

// Route::get('company/capacity', [App\Http\Controllers\FrontendController::class, 'companyCapacity']);
// Route::get('company/capacity/form', [App\Http\Controllers\FrontendController::class, 'companyCapacityForm']);
// Route::get('company/capacity/edit', [App\Http\Controllers\FrontendController::class, 'companyCapacityEdit']);

// Route::get('company/skills', [App\Http\Controllers\FrontendController::class, 'companySkills']);
// Route::get('company/skills/form', [App\Http\Controllers\FrontendController::class, 'companySkillsForm']);
// Route::get('company/skills/edit', [App\Http\Controllers\FrontendController::class, 'companySkillsEdit']);

// Route::get('company/skillsSub', [App\Http\Controllers\FrontendController::class, 'companySkillsSub']);
// Route::get('company/skillsSub/form', [App\Http\Controllers\FrontendController::class, 'companySkillsSubForm']);
// Route::get('company/skillsSub/edit', [App\Http\Controllers\FrontendController::class, 'companySkillsSubEdit']);

Route::get('company/user', [App\Http\Controllers\FrontendController::class, 'user']);
Route::get('company/user/form', [App\Http\Controllers\FrontendController::class, 'userForm']);
Route::get('company/user/edit', [App\Http\Controllers\FrontendController::class, 'userEdit']);

Route::get('company/user/file', [App\Http\Controllers\FrontendController::class, 'userFile']);

Route::get('company/cfUser', [App\Http\Controllers\FrontendController::class, 'cfUser']);
Route::get('company/user/detail', [App\Http\Controllers\FrontendController::class, 'cfUserDetail']);
Route::get('company/cfUserEdit', [App\Http\Controllers\FrontendController::class, 'cfUserEdit']);

Route::get('company/manage/skills', [App\Http\Controllers\FrontendController::class, 'manageSkills']);
Route::get('company/manage/skills/form', [App\Http\Controllers\FrontendController::class, 'manageSkillsForm']);
Route::get('company/manage/skills/edit', [App\Http\Controllers\FrontendController::class, 'manageSkillsEdit']);
Route::get('company/manage/skills/detail', [App\Http\Controllers\FrontendController::class, 'manageSkillsDetail']);

Route::get('company/plan/skills', [App\Http\Controllers\FrontendController::class, 'planSkills']);
Route::get('company/plan/skills/form', [App\Http\Controllers\FrontendController::class, 'planSkillsForm']);
Route::get('company/plan/skills/edit', [App\Http\Controllers\FrontendController::class, 'planSkillsEdit']);


Route::get('company/cf/skills', [App\Http\Controllers\FrontendController::class, 'cfSkills']);
Route::get('company/cf/skills/detail', [App\Http\Controllers\FrontendController::class, 'cfSkillsDetail']);

Route::get('company/cf/plan', [App\Http\Controllers\FrontendController::class, 'cfPlanSkills']);
Route::get('company/cf/plan/detail', [App\Http\Controllers\FrontendController::class, 'cfPlanSkillsDetail']);

Route::get('company/edit', [App\Http\Controllers\FrontendController::class, 'setting']);

Route::get('company/graph/job', [App\Http\Controllers\FrontendController::class, 'companyGraphJob']);
Route::get('company/graph/capacity', [App\Http\Controllers\FrontendController::class, 'companyGraphCapacity']);
Route::get('company/graph/sillks', [App\Http\Controllers\FrontendController::class, 'companyGraphSillks']);
Route::get('company/score/job', [App\Http\Controllers\FrontendController::class, 'companyScoreJob']);
Route::get('company/score/sillks', [App\Http\Controllers\FrontendController::class, 'companyscoreSillks']);

Route::get('company/department', [App\Http\Controllers\FrontendController::class, 'department']);
Route::get('company/department/form', [App\Http\Controllers\FrontendController::class, 'departmentForm']);
Route::get('company/department/edit', [App\Http\Controllers\FrontendController::class, 'departmentFormEdit']);

Route::get('company/departmentSub', [App\Http\Controllers\FrontendController::class, 'departmentSub']);
Route::get('company/departmentSub/form', [App\Http\Controllers\FrontendController::class, 'departmentSubForm']);
Route::get('company/departmentSub/edit', [App\Http\Controllers\FrontendController::class, 'departmentSubEdit']);

Route::get('company/position', [App\Http\Controllers\FrontendController::class, 'position']);
Route::get('company/position/form', [App\Http\Controllers\FrontendController::class, 'positionForm']);
Route::get('company/position/edit', [App\Http\Controllers\FrontendController::class, 'positionEdit']);

Route::get('search/course', [App\Http\Controllers\FrontendController::class, 'searchCourse']);



Route::get('loginCompany', [App\Http\Controllers\ManagerController::class, 'loginCompany']);
Route::get('regiterCompany', [App\Http\Controllers\ManagerController::class, 'regiterCompany']);
Route::get('success', [App\Http\Controllers\ManagerController::class, 'success']);
Route::get('manager/edit', [App\Http\Controllers\ManagerController::class, 'setting']);

Route::get('indexManager', [App\Http\Controllers\ManagerController::class, 'indexManager']);
Route::get('manager/score/sillks', [App\Http\Controllers\ManagerController::class, 'managerScoreSkillks']);
Route::get('manager/graph/job', [App\Http\Controllers\ManagerController::class, 'managerGraphJob']);
Route::get('manager/graph/skills', [App\Http\Controllers\ManagerController::class, 'managerGraphSkills']);

Route::get('manager/employee', [App\Http\Controllers\ManagerController::class, 'managerEmployee']);
Route::get('manager/employee/detail', [App\Http\Controllers\ManagerController::class, 'managerEmployeeDetail']);
// Route::get('manager/employee/form', [App\Http\Controllers\ManagerController::class, 'managerEmployeeForm']);
// Route::get('manager/employee/edit', [App\Http\Controllers\ManagerController::class, 'managerEmployeeEdit']);

Route::get('manager/cfEmployee', [App\Http\Controllers\ManagerController::class, 'managerEmployeeCf']);
Route::get('manager/cfEmployee/detail', [App\Http\Controllers\ManagerController::class, 'managerEmployeeCfDetail']);

Route::get('manager/manage/skills', [App\Http\Controllers\ManagerController::class, 'managerMangeSkills']);
Route::get('manager/manage/skills/detail', [App\Http\Controllers\ManagerController::class, 'managerMangeSkillsDetail']);

Route::get('manager/plan/skills', [App\Http\Controllers\ManagerController::class, 'managerPlanSkills']);
Route::get('manager/plan/skills/detail', [App\Http\Controllers\ManagerController::class, 'managerPlanSkillsDetail']);

Route::get('manager/search/course', [App\Http\Controllers\ManagerController::class, 'managerSearchCourse']);



Route::get('loginAdmin', [App\Http\Controllers\BackendController::class, 'adminUser']);
Route::get('forgotPassword', [App\Http\Controllers\BackendController::class, 'forgotPassword']);

Route::get('index', [App\Http\Controllers\BackendController::class, 'index']);
Route::get('regiter', [App\Http\Controllers\BackendController::class, 'regiter']);

Route::get('backend/job', [App\Http\Controllers\AdminJobController::class, 'job']);
Route::get('backend/job/form', [App\Http\Controllers\AdminJobController::class, 'jobForm']);
Route::post('backend/job/add', [App\Http\Controllers\AdminJobController::class, 'jobAdd']);
Route::get('backend/job/edit', [App\Http\Controllers\AdminJobController::class, 'jobEdit']);
Route::post('backend/job/update', [App\Http\Controllers\AdminJobController::class, 'jobUpdate']);
Route::get('backend/job/detail', [App\Http\Controllers\AdminJobController::class, 'jobDetail']);

Route::get('backend/job/capacity', [App\Http\Controllers\AdminJobController::class, 'jobCapacity']);
Route::get('backend/job/capacity/form', [App\Http\Controllers\AdminJobController::class, 'jobCapacityForm']);
Route::post('backend/job/capacity/add', [App\Http\Controllers\AdminJobController::class, 'jobCapacityAdd']);
Route::get('backend/job/capacity/edit', [App\Http\Controllers\AdminJobController::class, 'jobCapacityEdit']);
Route::post('backend/job/capacity/update', [App\Http\Controllers\AdminJobController::class, 'jobCapacityUpdate']);

Route::get('backend/job/skills', [App\Http\Controllers\AdminJobController::class, 'jobSkills']);
Route::get('backend/job/skills/form', [App\Http\Controllers\AdminJobController::class, 'jobSkillsForm']);
Route::get('backend/job/skills/edit', [App\Http\Controllers\AdminJobController::class, 'jobSkillsEdit']);

Route::get('backend/typeJob', [App\Http\Controllers\AdminJobController::class, 'typeJob']);
Route::get('backend/typeJob/form', [App\Http\Controllers\AdminJobController::class, 'typeJobForm']);
Route::post('backend/typeJob/add', [App\Http\Controllers\AdminJobController::class, 'typeJobAdd']);
Route::get('backend/typeJob/edit/{id}', [App\Http\Controllers\AdminJobController::class, 'typeJobEdit']);
// Route::get('backend/typeJob/edit', [App\Http\Controllers\AdminJobController::class, 'typeJobEdit']);
Route::post('backend/typeJob/update/{id}', [App\Http\Controllers\AdminJobController::class, 'typeJobUpdate']);
Route::get('backend/typeJob/delete/{id}', [App\Http\Controllers\AdminJobController::class, 'typeJobDel']);
Route::get('backend/typeJob/file', [App\Http\Controllers\AdminJobController::class, 'typeJobFile']);
Route::post('backend/typeJob/upload', [App\Http\Controllers\AdminJobController::class, 'typeJobUp']);
Route::get('backend/typeJob/download', [App\Http\Controllers\AdminJobController::class, 'exportTypeJob']);

Route::get('backend/lavelJob', [App\Http\Controllers\AdminJobController::class, 'lavelJob']);
Route::get('backend/lavelJob/form', [App\Http\Controllers\AdminJobController::class, 'lavelJobForm']);
Route::post('backend/lavelJob/add', [App\Http\Controllers\AdminJobController::class, 'lavelJobAdd']);
Route::get('backend/lavelJob/edit/{id}', [App\Http\Controllers\AdminJobController::class, 'lavelJobEdit']);
// Route::get('backend/lavelJob/edit', [App\Http\Controllers\AdminJobController::class, 'lavelJobEdit']);
Route::post('backend/lavelJob/update/{id}', [App\Http\Controllers\AdminJobController::class, 'lavelJobUpdate']);
Route::get('backend/lavelJob/delete/{id}', [App\Http\Controllers\AdminJobController::class, 'lavelJobDel']);
Route::get('backend/lavelJob/download', [App\Http\Controllers\AdminJobController::class, 'lavelJobExport']);

Route::get('backend/typeCourse', [App\Http\Controllers\AdminCourseController::class, 'typeCourse']);
Route::get('backend/typeCourse/form', [App\Http\Controllers\AdminCourseController::class, 'typeCourseForm']);
Route::post('backend/typeCourse/add', [App\Http\Controllers\AdminCourseController::class, 'typeCourseAdd']);
Route::get('backend/typeCourse/edit/{id}', [App\Http\Controllers\AdminCourseController::class, 'typeCourseEdit']);
// Route::get('backend/typeCourse/edit', [App\Http\Controllers\AdminCourseController::class, 'typeCourseEdit']);
Route::post('backend/typeCourse/update/{id}', [App\Http\Controllers\AdminCourseController::class, 'typeCourseUpdate']);
Route::get('backend/typeCourse/delete/{id}', [App\Http\Controllers\AdminCourseController::class, 'typeCourseDel']);
Route::get('backend/typeCourse/download', [App\Http\Controllers\AdminCourseController::class, 'typeCourseExport']);

Route::get('backend/capacity', [App\Http\Controllers\BackendController::class, 'capacity']);
Route::get('backend/capacity/form', [App\Http\Controllers\BackendController::class, 'capacityForm']);
Route::get('backend/capacity/edit', [App\Http\Controllers\BackendController::class, 'capacityEdit']);

Route::get('backend/skills', [App\Http\Controllers\BackendController::class, 'skills']);
Route::get('backend/skills/form', [App\Http\Controllers\BackendController::class, 'skillsForm']);
Route::get('backend/skills/edit', [App\Http\Controllers\BackendController::class, 'skillsEdit']);

Route::get('backend/skillsSub', [App\Http\Controllers\BackendController::class, 'skillsSub']);
Route::get('backend/skillsSub/form', [App\Http\Controllers\BackendController::class, 'skillsSubForm']);
Route::get('backend/skillsSub/edit', [App\Http\Controllers\BackendController::class, 'skillsSubEdit']);

Route::get('backend/course', [App\Http\Controllers\BackendController::class, 'course']);
Route::get('backend/course/form', [App\Http\Controllers\BackendController::class, 'courseForm']);
Route::get('backend/course/edit', [App\Http\Controllers\BackendController::class, 'courseEdit']);
Route::get('backend/course/form/file', [App\Http\Controllers\BackendController::class, 'courseFormFile']);

Route::get('backend/company', [App\Http\Controllers\AdminCompanyController::class, 'company']);
Route::get('backend/company/form', [App\Http\Controllers\AdminCompanyController::class, 'companyForm']);
Route::post('backend/company/add', [App\Http\Controllers\AdminCompanyController::class, 'companyAdd']);
Route::get('backend/company/edit/{id}', [App\Http\Controllers\AdminCompanyController::class, 'companyEdit']);
Route::get('backend/company/detail', [App\Http\Controllers\AdminCompanyController::class, 'companyDetail']);
Route::get('backend/company/file', [App\Http\Controllers\AdminCompanyController::class, 'companyFile']);
Route::get('backend/company/delate', [App\Http\Controllers\AdminCompanyController::class, 'companyDel']);
Route::post('backend/company/import', [App\Http\Controllers\AdminCompanyController::class, 'companyImport']);

Route::get('backend/companyCf', [App\Http\Controllers\AdminCompanyController::class, 'companyCf']);
Route::get('backend/companyCf/detail', [App\Http\Controllers\AdminCompanyController::class, 'companyCfDetail']);

Route::get('backend/mineral', [App\Http\Controllers\AdminCompanyController::class, 'mineral']);
Route::get('backend/mineral/form', [App\Http\Controllers\AdminCompanyController::class, 'mineralForm']);
Route::post('backend/mineral/add', [App\Http\Controllers\AdminCompanyController::class, 'mineralAdd']);
Route::get('backend/mineral/edit/{id}', [App\Http\Controllers\AdminCompanyController::class, 'mineralEdit']);
Route::post('backend/mineral/update/{id}', [App\Http\Controllers\AdminCompanyController::class, 'mineralUpdate']);
Route::get('backend/mineral/delete/{id}', [App\Http\Controllers\AdminCompanyController::class, 'mineralDel']);
Route::get('backend/mineral/export', [App\Http\Controllers\AdminCompanyController::class, 'exportMineral']);
Route::get('backend/mineral/file', [App\Http\Controllers\AdminCompanyController::class, 'mineralFile']);
Route::post('backend/people/import', [App\Http\Controllers\AdminCompanyController::class, 'mineralImport']);

Route::get('graph/job', [App\Http\Controllers\BackendController::class, 'graphJob']);
Route::get('graph/capacity', [App\Http\Controllers\BackendController::class, 'graphCapacity']);
Route::get('graph/sillks', [App\Http\Controllers\BackendController::class, 'graphSillks']);
Route::get('graph/course', [App\Http\Controllers\BackendController::class, 'graphCourse']);
Route::get('graph/hour', [App\Http\Controllers\BackendController::class, 'graphHour']);

Route::get('backend/testEdit/job', [App\Http\Controllers\BackendController::class, 'testEditJob']);
Route::get('backend/testEdit/job/form', [App\Http\Controllers\BackendController::class, 'testEditJobForm']);
Route::get('backend/testEdit/job/clean', [App\Http\Controllers\BackendController::class, 'testEditJobFormClean']);
Route::get('backend/testEdit/job/edit', [App\Http\Controllers\BackendController::class, 'testEditJobEdit']);

Route::get('backend/testEdit/capacity', [App\Http\Controllers\BackendController::class, 'testEditCapacity']);
Route::get('backend/testEdit/capacity/form', [App\Http\Controllers\BackendController::class, 'testEditCapacityForm']);
Route::get('backend/testEdit/capacity/clean', [App\Http\Controllers\BackendController::class, 'testEditCapacityClean']);
Route::get('backend/textEdit/capacity/edit', [App\Http\Controllers\BackendController::class, 'testEditCapacityEdti']);

Route::get('backend/testEdit/skills', [App\Http\Controllers\BackendController::class, 'testEditSkills']);
Route::get('backend/testEdit/skills/form', [App\Http\Controllers\BackendController::class, 'testEditSkillsForm']);
Route::get('backend/testEdit/skills/clean', [App\Http\Controllers\BackendController::class, 'testEditSkillsClean']);
Route::get('backend/testEdit/skills/edit', [App\Http\Controllers\BackendController::class, 'testEditSkillsEdit']);

Route::get('backend/testEdit/skillsSub', [App\Http\Controllers\BackendController::class, 'testEditSkillsSub']);
Route::get('backend/testEdit/skillsSub/form', [App\Http\Controllers\BackendController::class, 'testEditSkillsSubForm']);
Route::get('backend/testEdit/skillsSub/clean', [App\Http\Controllers\BackendController::class, 'testEditSkillsSubClean']);
Route::get('backend/testEdit/skillsSub/edit', [App\Http\Controllers\BackendController::class, 'testEditSkillsSubEdit']);

Route::get('backend/Admin', [App\Http\Controllers\BackendController::class, 'admin']);
Route::get('backend/admin/form', [App\Http\Controllers\BackendController::class, 'adminForm']);
Route::post('backend/admin/add', [App\Http\Controllers\BackendController::class, 'adminAdd']);
// Route::get('backend/admin/edit/{id}', [App\Http\Controllers\BackendController::class, 'adminEdit']);
Route::get('backend/admin/edit/', [App\Http\Controllers\BackendController::class, 'adminEdit']);
Route::post('backend/admin/update/{id}', [App\Http\Controllers\BackendController::class, 'adminUpdate']);
Route::get('backend/admin/delete/{id}', [App\Http\Controllers\BackendController::class, 'adminDelete']);

Route::get('backend/setting', [App\Http\Controllers\BackendController::class, 'adminStting']);
Route::post('backend/setting/update/{id}', [App\Http\Controllers\BackendController::class, 'adminSttingUpdate']);

Route::get('backend/people', [App\Http\Controllers\AdminEmployeeController::class, 'people']);
Route::get('backend/people/form', [App\Http\Controllers\AdminEmployeeController::class, 'peopleForm']);
Route::post('backend/people/add', [App\Http\Controllers\AdminEmployeeController::class, 'peopleAdd']);
Route::get('backend/people/edit/{id}', [App\Http\Controllers\AdminEmployeeController::class, 'peopleEdit']);
// Route::get('backend/people/edit/', [App\Http\Controllers\AdminEmployeeController::class, 'peopleEdit']);
Route::post('backend/people/update/{id}', [App\Http\Controllers\AdminEmployeeController::class, 'peopleUpdate']);
Route::get('backend/people/delete/{id}', [App\Http\Controllers\AdminEmployeeController::class, 'peopleDel']);
Route::get('backend/people/detail/{id}', [App\Http\Controllers\AdminEmployeeController::class, 'peopleDetail']);
// Route::get('backend/people/detail/', [App\Http\Controllers\AdminEmployeeController::class, 'peopleDetail']);
Route::get('backend/people/file', [App\Http\Controllers\AdminEmployeeController::class, 'peopleFile']);
Route::post('backend/people/upload', [App\Http\Controllers\AdminEmployeeController::class, 'peopleUp']);
Route::get('backend/people/download', [App\Http\Controllers\AdminEmployeeController::class, 'peopleExport']);

Route::get('backend/peopleCf', [App\Http\Controllers\AdminEmployeeController::class, 'peopleCf']);
Route::get('backend/peopleCf/detail', [App\Http\Controllers\AdminEmployeeController::class, 'peopleCfDetail']);

Route::get('backend/people/manageskills', [App\Http\Controllers\AdminEmployeeController::class, 'peopleManageskills']);
Route::get('backend/people/manageskills/form', [App\Http\Controllers\AdminEmployeeController::class, 'peopleManageskillsForm']);
Route::get('backend/people/manageskills/edit', [App\Http\Controllers\AdminEmployeeController::class, 'peopleManageskillsEdit']);
Route::get('backend/people/manageskills/detail', [App\Http\Controllers\AdminEmployeeController::class, 'peopleManageskillsdetail']);
Route::get('backend/people/manageskills/file', [App\Http\Controllers\AdminEmployeeController::class, 'peopleManageskillsFile']);

Route::get('backend/people/cfSkills', [App\Http\Controllers\AdminEmployeeController::class, 'peopleCfSkills']);
Route::get('backend/people/cfSkills/detail', [App\Http\Controllers\AdminEmployeeController::class, 'peopleCfSkillsDetail']);

Route::post('searchProvice', [App\Http\Controllers\BackendController::class, 'searchProvice']);
Route::post('searchAmphure', [App\Http\Controllers\BackendController::class, 'searchAmphure']);

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
