<?php
    if(!empty(Auth::user()->status)){
        $status=Auth::user()->status;
    }else{        
    }
?>
<!-- BEGIN: Mobile Menu -->
 <div class="mobile-menu md:hidden">
            <div class="mobile-menu-bar">
                <a href="" class="flex mr-auto">
                    <img alt="Midone - HTML Admin Template" class="w-6" src="{{ asset('dist/images/logo.svg') }}">
                </a>
                <a href="javascript:;" id="mobile-menu-toggler"> <i data-lucide="bar-chart-2" class="w-8 h-8 text-white transform -rotate-90"></i> </a>
            </div>
            <ul class="border-t border-white/[0.08] py-5 hidden">
                <li>
                    <a href="javascript:;.html" class="menu menu--active">
                        <div class="menu__icon"> <i data-lucide="home"></i> </div>
                        <div class="menu__title"> Dashboard <i data-lucide="chevron-down" class="menu__sub-icon transform rotate-180"></i> </div>
                    </a>
                    <ul class="menu__sub-open">
                        <li>
                            <a href="index.html" class="menu menu--active">
                                <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                                <div class="menu__title"> Overview 1 </div>
                            </a>
                        </li>
                        <li>
                            <a href="side-menu-light-dashboard-overview-2.html" class="menu">
                                <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                                <div class="menu__title"> Overview 2 </div>
                            </a>
                        </li>
                        <li>
                            <a href="side-menu-light-dashboard-overview-3.html" class="menu">
                                <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                                <div class="menu__title"> Overview 3 </div>
                            </a>
                        </li>
                        <li>
                            <a href="side-menu-light-dashboard-overview-4.html" class="menu">
                                <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                                <div class="menu__title"> Overview 4 </div>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;" class="menu">
                        <div class="menu__icon"> <i data-lucide="box"></i> </div>
                        <div class="menu__title"> Menu Layout <i data-lucide="chevron-down" class="menu__sub-icon "></i> </div>
                    </a>
                    <ul class="">
                        <li>
                            <a href="index.html" class="menu menu--active">
                                <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                                <div class="menu__title"> Side Menu </div>
                            </a>
                        </li>
                        <li>
                            <a href="simple-menu-light-dashboard-overview-1.html" class="menu menu--active">
                                <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                                <div class="menu__title"> Simple Menu </div>
                            </a>
                        </li>
                        <li>
                            <a href="top-menu-light-dashboard-overview-1.html" class="menu menu--active">
                                <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                                <div class="menu__title"> Top Menu </div>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="side-menu-light-inbox.html" class="menu">
                        <div class="menu__icon"> <i data-lucide="inbox"></i> </div>
                        <div class="menu__title"> Inbox </div>
                    </a>
                </li>
                <li>
                    <a href="side-menu-light-file-manager.html" class="menu">
                        <div class="menu__icon"> <i data-lucide="hard-drive"></i> </div>
                        <div class="menu__title"> File Manager </div>
                    </a>
                </li>
                <li>
                    <a href="side-menu-light-point-of-sale.html" class="menu">
                        <div class="menu__icon"> <i data-lucide="credit-card"></i> </div>
                        <div class="menu__title"> Point of Sale </div>
                    </a>
                </li>
                <li>
                    <a href="side-menu-light-chat.html" class="menu">
                        <div class="menu__icon"> <i data-lucide="message-square"></i> </div>
                        <div class="menu__title"> Chat </div>
                    </a>
                </li>
                <li>
                    <a href="side-menu-light-post.html" class="menu">
                        <div class="menu__icon"> <i data-lucide="file-text"></i> </div>
                        <div class="menu__title"> Post </div>
                    </a>
                </li>
                <li>
                    <a href="side-menu-light-calendar.html" class="menu">
                        <div class="menu__icon"> <i data-lucide="calendar"></i> </div>
                        <div class="menu__title"> Calendar </div>
                    </a>
                </li>
                <li class="menu__devider my-6"></li>
                <li>
                    <a href="javascript:;" class="menu">
                        <div class="menu__icon"> <i data-lucide="edit"></i> </div>
                        <div class="menu__title"> Crud <i data-lucide="chevron-down" class="menu__sub-icon "></i> </div>
                    </a>
                    <ul class="">
                        <li>
                            <a href="side-menu-light-crud-data-list.html" class="menu">
                                <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                                <div class="menu__title"> Data List </div>
                            </a>
                        </li>
                        <li>
                            <a href="side-menu-light-crud-form.html" class="menu">
                                <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                                <div class="menu__title"> Form </div>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;" class="menu">
                        <div class="menu__icon"> <i data-lucide="users"></i> </div>
                        <div class="menu__title"> Users <i data-lucide="chevron-down" class="menu__sub-icon "></i> </div>
                    </a>
                    <ul class="">
                        <li>
                            <a href="side-menu-light-users-layout-1.html" class="menu">
                                <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                                <div class="menu__title"> Layout 1 </div>
                            </a>
                        </li>
                        <li>
                            <a href="side-menu-light-users-layout-2.html" class="menu">
                                <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                                <div class="menu__title"> Layout 2 </div>
                            </a>
                        </li>
                        <li>
                            <a href="side-menu-light-users-layout-3.html" class="menu">
                                <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                                <div class="menu__title"> Layout 3 </div>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;" class="menu">
                        <div class="menu__icon"> <i data-lucide="trello"></i> </div>
                        <div class="menu__title"> Profile <i data-lucide="chevron-down" class="menu__sub-icon "></i> </div>
                    </a>
                    <ul class="">
                        <li>
                            <a href="side-menu-light-profile-overview-1.html" class="menu">
                                <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                                <div class="menu__title"> Overview 1 </div>
                            </a>
                        </li>
                        <li>
                            <a href="side-menu-light-profile-overview-2.html" class="menu">
                                <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                                <div class="menu__title"> Overview 2 </div>
                            </a>
                        </li>
                        <li>
                            <a href="side-menu-light-profile-overview-3.html" class="menu">
                                <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                                <div class="menu__title"> Overview 3 </div>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;" class="menu">
                        <div class="menu__icon"> <i data-lucide="layout"></i> </div>
                        <div class="menu__title"> Pages <i data-lucide="chevron-down" class="menu__sub-icon "></i> </div>
                    </a>
                    <ul class="">
                        <li>
                            <a href="javascript:;" class="menu">
                                <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                                <div class="menu__title"> Wizards <i data-lucide="chevron-down" class="menu__sub-icon "></i> </div>
                            </a>
                            <ul class="">
                                <li>
                                    <a href="side-menu-light-wizard-layout-1.html" class="menu">
                                        <div class="menu__icon"> <i data-lucide="zap"></i> </div>
                                        <div class="menu__title">Layout 1</div>
                                    </a>
                                </li>
                                <li>
                                    <a href="side-menu-light-wizard-layout-2.html" class="menu">
                                        <div class="menu__icon"> <i data-lucide="zap"></i> </div>
                                        <div class="menu__title">Layout 2</div>
                                    </a>
                                </li>
                                <li>
                                    <a href="side-menu-light-wizard-layout-3.html" class="menu">
                                        <div class="menu__icon"> <i data-lucide="zap"></i> </div>
                                        <div class="menu__title">Layout 3</div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:;" class="menu">
                                <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                                <div class="menu__title"> Blog <i data-lucide="chevron-down" class="menu__sub-icon "></i> </div>
                            </a>
                            <ul class="">
                                <li>
                                    <a href="side-menu-light-blog-layout-1.html" class="menu">
                                        <div class="menu__icon"> <i data-lucide="zap"></i> </div>
                                        <div class="menu__title">Layout 1</div>
                                    </a>
                                </li>
                                <li>
                                    <a href="side-menu-light-blog-layout-2.html" class="menu">
                                        <div class="menu__icon"> <i data-lucide="zap"></i> </div>
                                        <div class="menu__title">Layout 2</div>
                                    </a>
                                </li>
                                <li>
                                    <a href="side-menu-light-blog-layout-3.html" class="menu">
                                        <div class="menu__icon"> <i data-lucide="zap"></i> </div>
                                        <div class="menu__title">Layout 3</div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:;" class="menu">
                                <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                                <div class="menu__title"> Pricing <i data-lucide="chevron-down" class="menu__sub-icon "></i> </div>
                            </a>
                            <ul class="">
                                <li>
                                    <a href="side-menu-light-pricing-layout-1.html" class="menu">
                                        <div class="menu__icon"> <i data-lucide="zap"></i> </div>
                                        <div class="menu__title">Layout 1</div>
                                    </a>
                                </li>
                                <li>
                                    <a href="side-menu-light-pricing-layout-2.html" class="menu">
                                        <div class="menu__icon"> <i data-lucide="zap"></i> </div>
                                        <div class="menu__title">Layout 2</div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:;" class="menu">
                                <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                                <div class="menu__title"> Invoice <i data-lucide="chevron-down" class="menu__sub-icon "></i> </div>
                            </a>
                            <ul class="">
                                <li>
                                    <a href="side-menu-light-invoice-layout-1.html" class="menu">
                                        <div class="menu__icon"> <i data-lucide="zap"></i> </div>
                                        <div class="menu__title">Layout 1</div>
                                    </a>
                                </li>
                                <li>
                                    <a href="side-menu-light-invoice-layout-2.html" class="menu">
                                        <div class="menu__icon"> <i data-lucide="zap"></i> </div>
                                        <div class="menu__title">Layout 2</div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:;" class="menu">
                                <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                                <div class="menu__title"> FAQ <i data-lucide="chevron-down" class="menu__sub-icon "></i> </div>
                            </a>
                            <ul class="">
                                <li>
                                    <a href="side-menu-light-faq-layout-1.html" class="menu">
                                        <div class="menu__icon"> <i data-lucide="zap"></i> </div>
                                        <div class="menu__title">Layout 1</div>
                                    </a>
                                </li>
                                <li>
                                    <a href="side-menu-light-faq-layout-2.html" class="menu">
                                        <div class="menu__icon"> <i data-lucide="zap"></i> </div>
                                        <div class="menu__title">Layout 2</div>
                                    </a>
                                </li>
                                <li>
                                    <a href="side-menu-light-faq-layout-3.html" class="menu">
                                        <div class="menu__icon"> <i data-lucide="zap"></i> </div>
                                        <div class="menu__title">Layout 3</div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="login-light-login.html" class="menu">
                                <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                                <div class="menu__title"> Login </div>
                            </a>
                        </li>
                        <li>
                            <a href="login-light-register.html" class="menu">
                                <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                                <div class="menu__title"> Register </div>
                            </a>
                        </li>
                        <li>
                            <a href="main-light-error-page.html" class="menu">
                                <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                                <div class="menu__title"> Error Page </div>
                            </a>
                        </li>
                        <li>
                            <a href="side-menu-light-update-profile.html" class="menu">
                                <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                                <div class="menu__title"> Update profile </div>
                            </a>
                        </li>
                        <li>
                            <a href="side-menu-light-change-password.html" class="menu">
                                <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                                <div class="menu__title"> Change Password </div>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="menu__devider my-6"></li>
                <li>
                    <a href="javascript:;" class="menu">
                        <div class="menu__icon"> <i data-lucide="inbox"></i> </div>
                        <div class="menu__title"> Components <i data-lucide="chevron-down" class="menu__sub-icon "></i> </div>
                    </a>
                    <ul class="">
                        <li>
                            <a href="javascript:;" class="menu">
                                <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                                <div class="menu__title"> Table <i data-lucide="chevron-down" class="menu__sub-icon "></i> </div>
                            </a>
                            <ul class="">
                                <li>
                                    <a href="side-menu-light-regular-table.html" class="menu">
                                        <div class="menu__icon"> <i data-lucide="zap"></i> </div>
                                        <div class="menu__title">Regular Table</div>
                                    </a>
                                </li>
                                <li>
                                    <a href="side-menu-light-tabulator.html" class="menu">
                                        <div class="menu__icon"> <i data-lucide="zap"></i> </div>
                                        <div class="menu__title">Tabulator</div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:;" class="menu">
                                <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                                <div class="menu__title"> Overlay <i data-lucide="chevron-down" class="menu__sub-icon "></i> </div>
                            </a>
                            <ul class="">
                                <li>
                                    <a href="side-menu-light-modal.html" class="menu">
                                        <div class="menu__icon"> <i data-lucide="zap"></i> </div>
                                        <div class="menu__title">Modal</div>
                                    </a>
                                </li>
                                <li>
                                    <a href="side-menu-light-slide-over.html" class="menu">
                                        <div class="menu__icon"> <i data-lucide="zap"></i> </div>
                                        <div class="menu__title">Slide Over</div>
                                    </a>
                                </li>
                                <li>
                                    <a href="side-menu-light-notification.html" class="menu">
                                        <div class="menu__icon"> <i data-lucide="zap"></i> </div>
                                        <div class="menu__title">Notification</div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="side-menu-light-tab.html" class="menu">
                                <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                                <div class="menu__title"> Tab </div>
                            </a>
                        </li>
                        <li>
                            <a href="side-menu-light-accordion.html" class="menu">
                                <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                                <div class="menu__title"> Accordion </div>
                            </a>
                        </li>
                        <li>
                            <a href="side-menu-light-button.html" class="menu">
                                <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                                <div class="menu__title"> Button </div>
                            </a>
                        </li>
                        <li>
                            <a href="side-menu-light-alert.html" class="menu">
                                <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                                <div class="menu__title"> Alert </div>
                            </a>
                        </li>
                        <li>
                            <a href="side-menu-light-progress-bar.html" class="menu">
                                <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                                <div class="menu__title"> Progress Bar </div>
                            </a>
                        </li>
                        <li>
                            <a href="side-menu-light-tooltip.html" class="menu">
                                <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                                <div class="menu__title"> Tooltip </div>
                            </a>
                        </li>
                        <li>
                            <a href="side-menu-light-dropdown.html" class="menu">
                                <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                                <div class="menu__title"> Dropdown </div>
                            </a>
                        </li>
                        <li>
                            <a href="side-menu-light-typography.html" class="menu">
                                <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                                <div class="menu__title"> Typography </div>
                            </a>
                        </li>
                        <li>
                            <a href="side-menu-light-icon.html" class="menu">
                                <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                                <div class="menu__title"> Icon </div>
                            </a>
                        </li>
                        <li>
                            <a href="side-menu-light-loading-icon.html" class="menu">
                                <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                                <div class="menu__title"> Loading Icon </div>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;" class="menu">
                        <div class="menu__icon"> <i data-lucide="sidebar"></i> </div>
                        <div class="menu__title"> Forms <i data-lucide="chevron-down" class="menu__sub-icon "></i> </div>
                    </a>
                    <ul class="">
                        <li>
                            <a href="side-menu-light-regular-form.html" class="menu">
                                <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                                <div class="menu__title"> Regular Form </div>
                            </a>
                        </li>
                        <li>
                            <a href="side-menu-light-datepicker.html" class="menu">
                                <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                                <div class="menu__title"> Datepicker </div>
                            </a>
                        </li>
                        <li>
                            <a href="side-menu-light-tom-select.html" class="menu">
                                <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                                <div class="menu__title"> Tom Select </div>
                            </a>
                        </li>
                        <li>
                            <a href="side-menu-light-file-upload.html" class="menu">
                                <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                                <div class="menu__title"> File Upload </div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:;" class="menu">
                                <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                                <div class="menu__title"> Wysiwyg Editor <i data-lucide="chevron-down" class="menu__sub-icon "></i> </div>
                            </a>
                            <ul class="">
                                <li>
                                    <a href="side-menu-light-wysiwyg-editor-classic.html" class="menu">
                                        <div class="menu__icon"> <i data-lucide="zap"></i> </div>
                                        <div class="menu__title">Classic</div>
                                    </a>
                                </li>
                                <li>
                                    <a href="side-menu-light-wysiwyg-editor-inline.html" class="menu">
                                        <div class="menu__icon"> <i data-lucide="zap"></i> </div>
                                        <div class="menu__title">Inline</div>
                                    </a>
                                </li>
                                <li>
                                    <a href="side-menu-light-wysiwyg-editor-balloon.html" class="menu">
                                        <div class="menu__icon"> <i data-lucide="zap"></i> </div>
                                        <div class="menu__title">Balloon</div>
                                    </a>
                                </li>
                                <li>
                                    <a href="side-menu-light-wysiwyg-editor-balloon-block.html" class="menu">
                                        <div class="menu__icon"> <i data-lucide="zap"></i> </div>
                                        <div class="menu__title">Balloon Block</div>
                                    </a>
                                </li>
                                <li>
                                    <a href="side-menu-light-wysiwyg-editor-document.html" class="menu">
                                        <div class="menu__icon"> <i data-lucide="zap"></i> </div>
                                        <div class="menu__title">Document</div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="side-menu-light-validation.html" class="menu">
                                <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                                <div class="menu__title"> Validation </div>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;" class="menu">
                        <div class="menu__icon"> <i data-lucide="hard-drive"></i> </div>
                        <div class="menu__title"> Widgets <i data-lucide="chevron-down" class="menu__sub-icon "></i> </div>
                    </a>
                    <ul class="">
                        <li>
                            <a href="side-menu-light-chart.html" class="menu">
                                <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                                <div class="menu__title"> Chart </div>
                            </a>
                        </li>
                        <li>
                            <a href="side-menu-light-slider.html" class="menu">
                                <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                                <div class="menu__title"> Slider </div>
                            </a>
                        </li>
                        <li>
                            <a href="side-menu-light-image-zoom.html" class="menu">
                                <div class="menu__icon"> <i data-lucide="activity"></i> </div>
                                <div class="menu__title"> Image Zoom </div>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- END: Mobile Menu -->
        <div class="flex">
            <!-- BEGIN: Side Menu -->
            <nav class="side-nav">
                <a href="" class="intro-x flex items-center pl-5 pt-4">
                    <img alt="Midone - HTML Admin Template" class="w-6" src="{{ asset('dist/images/logo.svg') }}">
                    <span class="hidden xl:block text-white text-lg ml-3"> DPIM Admin </span> 
                </a>
                <div class="side-nav__devider my-6"></div>
                <ul>
                <li>
                        <a href="javascript:;" <?php if ($activePage =="scoreboard") {?> class="side-menu side-menu--active" <?php }else{?> class="side-menu"<?php  } ?>>
                            <div class="side-menu__icon"> <i data-lucide="home"></i> </div>
                            <div class="side-menu__title">
                                กระดานสรุป 
                                <div class="side-menu__sub-icon "> <i data-lucide="chevron-down"></i> </div>
                            </div>
                        </a>
                        <ul <?php if ($activePage =="scoreboard") {?> class="side-menu__sub-open" <?php }else{?> class=""<?php  } ?>>
                            <li>
                                <a href="{{ url('/home' )}}" <?php if ($active =="sJob") {?> class="side-menu side-menu--active" <?php }else{?> class="side-menu"<?php  } ?>
                                    data-page="acct">
                                <!-- <a href="{{ url('/home' )}}" <?php if ($active =="sJob") {?> class="side-menu side-menu--active" <?php }else{?> class="side-menu"<?php  } ?>
                                    data-page="acct"> -->
                                    <div class="side-menu__icon"> <i data-lucide="home"></i> </div>
                                    <div class="side-menu__title"> สรุปจำนวนสถานประกอบการและบุคลากรที่ใช้ระบบ </div>
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('graph/capacity' )}}" <?php if ($active =="sCapacity") {?> class="side-menu side-menu--active" <?php }else{?> class="side-menu"<?php  } ?>
                                    data-page="acct">
                                    <div class="side-menu__icon"> <i data-lucide="home"></i> </div>
                                    <div class="side-menu__title"> สรุปจำนวนบุคลากรในระดับสมรรถนะต่างๆ </div>
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('graph/sillks') }}" <?php if ($active =="sSkills") {?> class="side-menu side-menu--active" <?php }else{?> class="side-menu"<?php  } ?>
                                    data-page="acct">
                                    <div class="side-menu__icon"> <i data-lucide="home"></i> </div>
                                    <div class="side-menu__title"> สรุปจำนวนบุคลากรในระดับทักษะต่างๆ </div>
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('graph/course') }}" <?php if ($active =="sCourse") {?> class="side-menu side-menu--active" <?php }else{?> class="side-menu"<?php  } ?>
                                    data-page="acct">
                                    <div class="side-menu__icon"> <i data-lucide="home"></i> </div>
                                    <div class="side-menu__title"> สรุปจำนวนหลักสูตรฝึกอบรม </div>
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('graph/hour') }}" <?php if ($active =="sHour") {?> class="side-menu side-menu--active" <?php }else{?> class="side-menu"<?php  } ?>
                                    data-page="acct">
                                    <div class="side-menu__icon"> <i data-lucide="home"></i> </div>
                                    <div class="side-menu__title"> สรุปชั่วโมงการพัฒนาทักษะของบุคลากร </div>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript:;" <?php if ($activePage =="index") {?> class="side-menu side-menu--active" <?php }else{?> class="side-menu"<?php  } ?>>
                            <div class="side-menu__icon"> <i data-lucide="home"></i> </div>
                            <div class="side-menu__title">
                                ตั้งค่าตำแหน่งงาน สมรรถนะ และทักษะในองค์กร 
                                <div class="side-menu__sub-icon "> <i data-lucide="chevron-down"></i> </div>
                            </div>
                        </a>
                        <ul <?php if ($activePage =="index") {?> class="side-menu__sub-open" <?php }else{?> class=""<?php  } ?>>
                            <li>
                                <a href="{{url('backend/job')}}" <?php if ($active =="job") {?> class="side-menu side-menu--active" <?php }else{?> class="side-menu"<?php  } ?>
                                    data-page="acct">
                                    <div class="side-menu__icon"> <i data-lucide="home"></i> </div>
                                    <div class="side-menu__title"> กลุ่มตำแหน่งงาน </div>
                                </a>
                            </li>
                            <li>
                                <a href="{{url('backend/capacity')}}" <?php if ($active =="capacity") {?> class="side-menu side-menu--active" <?php }else{?> class="side-menu"<?php  } ?>
                                    data-page="acct">
                                    <div class="side-menu__icon"> <i data-lucide="home"></i> </div>
                                    <div class="side-menu__title"> สมรรถนะ </div>
                                </a>
                            </li>
                            <li>
                                <a href="{{url('backend/skills')}}" <?php if ($active =="skills") {?> class="side-menu side-menu--active" <?php }else{?> class="side-menu"<?php  } ?>
                                    data-page="acct">
                                    <div class="side-menu__icon"> <i data-lucide="home"></i> </div>
                                    <div class="side-menu__title"> ทักษะ </div>
                                </a>
                            </li>
                            <li>
                                <a href="{{url('backend/skillsSub')}}" <?php if ($active =="skillsSub") {?> class="side-menu side-menu--active" <?php }else{?> class="side-menu"<?php  } ?>
                                    data-page="acct">
                                    <div class="side-menu__icon"> <i data-lucide="home"></i> </div>
                                    <div class="side-menu__title"> ทักษะย่อย </div>
                                </a>
                            </li>
                            <li>
                                <a href="{{url('backend/typeJob')}}" <?php if ($active =="typeJob") {?> class="side-menu side-menu--active" <?php }else{?> class="side-menu"<?php  } ?>
                                    data-page="acct">
                                    <div class="side-menu__icon"> <i data-lucide="home"></i> </div>
                                    <div class="side-menu__title"> ประเภทงาน </div>
                                </a>
                            </li>
                            <li>
                                <a href="{{url('backend/lavelJob')}}" <?php if ($active =="lavelJob") {?> class="side-menu side-menu--active" <?php }else{?> class="side-menu"<?php  } ?>
                                    data-page="acct">
                                    <div class="side-menu__icon"> <i data-lucide="home"></i> </div>
                                    <div class="side-menu__title"> ระดับงาน </div>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript:;" <?php if ($activePage =="testEdit") {?> class="side-menu side-menu--active" <?php }else{?> class="side-menu"<?php  } ?>>
                            <div class="side-menu__icon"> <i data-lucide="home"></i> </div>
                            <div class="side-menu__title">
                                หน้าตรวจสอบและแก้ไขข้อมูลกลุ่มตำแหน่งงาน
                                <div class="side-menu__sub-icon "> <i data-lucide="chevron-down"></i> </div>
                            </div>
                        </a>
                        <ul <?php if ($activePage =="testEdit") {?> class="side-menu__sub-open" <?php }else{?> class=""<?php  } ?>>
                            <li>
                                <a href="{{url('backend/testEdit/job')}}" <?php if ($active =="testEditJob") {?> class="side-menu side-menu--active" <?php }else{?> class="side-menu"<?php  } ?>
                                    data-page="acct">
                                    <div class="side-menu__icon"> <i data-lucide="home"></i> </div>
                                    <div class="side-menu__title"> ตำแหน่ง </div>
                                </a>
                            </li>
                            <li>
                                <a href="{{url('backend/testEdit/capacity')}}" <?php if ($active =="testEditCapacity") {?> class="side-menu side-menu--active" <?php }else{?> class="side-menu"<?php  } ?>
                                    data-page="acct">
                                    <div class="side-menu__icon"> <i data-lucide="home"></i> </div>
                                    <div class="side-menu__title"> สมรรถนะ </div>
                                </a>
                            </li>
                            <li>
                                <a href="{{url('backend/testEdit/skills')}}" <?php if ($active =="testEditSkills") {?> class="side-menu side-menu--active" <?php }else{?> class="side-menu"<?php  } ?>
                                    data-page="acct">
                                    <div class="side-menu__icon"> <i data-lucide="home"></i> </div>
                                    <div class="side-menu__title"> ทักษะ </div>
                                </a>
                            </li>
                            <li>
                                <a href="{{url('backend/testEdit/skillsSub')}}" <?php if ($active =="testEditSkillsSub") {?> class="side-menu side-menu--active" <?php }else{?> class="side-menu"<?php  } ?>
                                    data-page="acct">
                                    <div class="side-menu__icon"> <i data-lucide="home"></i> </div>
                                    <div class="side-menu__title"> ทักษะย่อย </div>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript:;" <?php if ($activePage =="course") {?> class="side-menu side-menu--active" <?php }else{?> class="side-menu"<?php  } ?>>
                            <div class="side-menu__icon"> <i data-lucide="home"></i> </div>
                            <div class="side-menu__title">
                                จัดการหลักสูตรพัฒนาบุคลากร 
                                <div class="side-menu__sub-icon "> <i data-lucide="chevron-down"></i> </div>
                            </div>
                        </a>
                        <ul <?php if ($activePage =="course") {?> class="side-menu__sub-open" <?php }else{?> class=""<?php  } ?>>
                            <li>
                                <a href="{{url('backend/course')}}" <?php if ($active =="totalCourse") {?> class="side-menu side-menu--active" <?php }else{?> class="side-menu"<?php  } ?>
                                    data-page="acct">
                                    <div class="side-menu__icon"> <i data-lucide="home"></i> </div>
                                    <div class="side-menu__title"> จัดการหลักสูตรพัฒนาบุคลากร </div>
                                </a>
                            </li>
                            <li>
                                <a href="{{url('backend/typeCourse')}}" <?php if ($active =="typeCourse") {?> class="side-menu side-menu--active" <?php }else{?> class="side-menu"<?php  } ?>
                                    data-page="acct">
                                    <div class="side-menu__icon"> <i data-lucide="home"></i> </div>
                                    <div class="side-menu__title"> ประเภทหลักสูตร </div>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript:;" <?php if ($activePage =="company") {?> class="side-menu side-menu--active" <?php }else{?> class="side-menu"<?php  } ?>>
                            <div class="side-menu__icon"> <i data-lucide="home"></i> </div>
                            <div class="side-menu__title">
                                จัดการข้อมูลสถานประกอบการ 
                                <div class="side-menu__sub-icon "> <i data-lucide="chevron-down"></i> </div>
                            </div>
                        </a>
                        <ul <?php if ($activePage =="company") {?> class="side-menu__sub-open" <?php }else{?> class=""<?php  } ?>>
                            <li>
                                <a href="{{url('backend/company')}}" <?php if ($active =="manage") {?> class="side-menu side-menu--active" <?php }else{?> class="side-menu"<?php  } ?>
                                    data-page="acct">
                                    <div class="side-menu__icon"> <i data-lucide="home"></i> </div>
                                    <div class="side-menu__title"> ข้อมูลสถานประกอบการ </div>
                                </a>
                            </li>
                            <li>
                                <a href="{{url('backend/companyCf')}}" <?php if ($active =="cf") {?> class="side-menu side-menu--active" <?php }else{?> class="side-menu"<?php  } ?>
                                    data-page="acct">
                                    <div class="side-menu__icon"> <i data-lucide="home"></i> </div>
                                    <div class="side-menu__title"> ยืนยันสถานประกอบการ </div>
                                </a>
                            </li>
                            <li>
                                <a href="{{url('backend/mineral')}}" <?php if ($active =="mineral") {?> class="side-menu side-menu--active" <?php }else{?> class="side-menu"<?php  } ?>
                                    data-page="acct">
                                    <div class="side-menu__icon"> <i data-lucide="home"></i> </div>
                                    <div class="side-menu__title"> เพิ่มชนิดแร่ </div>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript:;" <?php if ($activePage =="people") {?> class="side-menu side-menu--active" <?php }else{?> class="side-menu"<?php  } ?>>
                            <div class="side-menu__icon"> <i data-lucide="home"></i> </div>
                            <div class="side-menu__title">
                                จัดการข้อมูลบุคลากร 
                                <div class="side-menu__sub-icon "> <i data-lucide="chevron-down"></i> </div>
                            </div>
                        </a>
                        <ul <?php if ($activePage =="people") {?> class="side-menu__sub-open" <?php }else{?> class=""<?php  } ?>>
                            <li>
                                <a href="{{url('backend/people')}}" <?php if ($active =="managePeople") {?> class="side-menu side-menu--active" <?php }else{?> class="side-menu"<?php  } ?>
                                    data-page="acct">
                                    <div class="side-menu__icon"> <i data-lucide="home"></i> </div>
                                    <div class="side-menu__title"> จัดการข้อมูลบุคลากร </div>
                                </a>
                            </li>
                            <li>
                                <a href="{{url('backend/peopleCf')}}" <?php if ($active =="peopleCF") {?> class="side-menu side-menu--active" <?php }else{?> class="side-menu"<?php  } ?>
                                    data-page="acct">
                                    <div class="side-menu__icon"> <i data-lucide="home"></i> </div>
                                    <div class="side-menu__title"> ยืนยันบุคลากร </div>
                                </a>
                            </li>
                            <li>
                                <a href="{{url('backend/people/manageskills')}}" <?php if ($active =="peopleSkills") {?> class="side-menu side-menu--active" <?php }else{?> class="side-menu"<?php  } ?>
                                    data-page="acct">
                                    <div class="side-menu__icon"> <i data-lucide="home"></i> </div>
                                    <div class="side-menu__title"> จัดการประวัติการพัฒนาทักษะบุคลากร </div>
                                </a>
                            </li>
                            <!-- <li>
                                <a href="{{url('backend/people/cfSkills')}}" <?php if ($active =="peopleCfSkills") {?> class="side-menu side-menu--active" <?php }else{?> class="side-menu"<?php  } ?>
                                    data-page="acct">
                                    <div class="side-menu__icon"> <i data-lucide="home"></i> </div>
                                    <div class="side-menu__title"> ยืนยันการอบรมของบุคลากร </div>
                                </a>
                            </li> -->
                        </ul>
                    </li>       

                    @if(!empty($status))
                        @if($status==1)
                            <li>
                                <a href="{{url('backend/Admin')}}" <?php if ($activePage =="admin") {?> class="side-menu side-menu--active" <?php }else{?> class="side-menu"<?php  } ?>
                                    data-page="acct">
                                    <div class="side-menu__icon"> <i data-lucide="home"></i> </div>
                                    <div class="side-menu__title"> เพิ่มแอดมิน </div>
                                </a>
                            </li>
                        @endif
                    @else
                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>

                        <script>
                            var msg = 'log out';
                            alert(msg);
                            document.getElementById('logout-form').submit();
                        </script>
                    @endif

                    <li>
                        <a href="{{url('backend/setting')}}" <?php if ($activePage =="settingAdmin") {?> class="side-menu side-menu--active" <?php }else{?> class="side-menu"<?php  } ?>
                            data-page="acct">
                            <div class="side-menu__icon"> <i data-lucide="home"></i> </div>
                            <div class="side-menu__title"> ตั้งค่า </div>
                        </a>
                    </li>
                    
                </ul>
            </nav>
            <!-- END: Side Menu -->