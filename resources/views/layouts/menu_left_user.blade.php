 <!-- BEGIN: Mobile Menu -->
 <?php
    // use Auth;
    $status=Auth::user()->status;
?>
 <div class="mobile-menu md:hidden">
            <div class="mobile-menu-bar">
                <a href="" class="flex mr-auto">
                    <img alt="Midone - HTML Admin Template" class="w-6" src="{{ asset('dist/images/logo.svg') }}">
                </a>
                <a href="javascript:;" id="mobile-menu-toggler"> <i data-lucide="bar-chart-2" class="w-8 h-8 text-white transform -rotate-90"></i> </a>
            </div>
            <ul class="border-t border-white/[0.08] py-5 hidden">
                <li>
                    <a href="javascript:;" class="menu">
                        <div class="menu__icon"> <i data-lucide="home"></i> </div>
                        <div class="menu__title">
                            หน้าแรก 
                        <div class="menu__sub-icon "> <i data-lucide="chevron-down"></i> </div>
                        </div>
                    </a>
                    <ul <?php if ($activePage =="index") {?> class="side-menu__sub-open" <?php }else{?> class=""<?php  } ?>>
                        <li>
                            <a href="{{url('/home')}}" class="menu menu--active">
                                <div class="menu__icon"> <i data-lucide="home"></i> </div>
                                <div class="menu__title"> แบนเนอร์ </div>
                            </a>
                        </li>
                        <li>
                            <a href="{{url('backend/aboutme')}}" class="menu menu--active">
                                <div class="menu__icon"> <i data-lucide="home"></i> </div>
                                <div class="menu__title"> เกี่ยวกับเรา </div>
                            </a>
                        </li>
                        <li>
                            <a href="{{url('backend/resume')}}" class="menu menu--active">
                                <div class="menu__icon"> <i data-lucide="home"></i> </div>
                                <div class="menu__title"> สร้างเรซูเม่ </div>
                            </a>
                        </li>
                        <li>
                            <a href="{{url('backend/joinUs')}}" class="menu menu--active">
                                <div class="menu__icon"> <i data-lucide="home"></i> </div>
                                <div class="menu__title"> มาร่วมงานกับเรา </div>
                            </a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="{{url('backend/news')}}" class="menu">
                        <div class="menu__icon"> <i data-lucide="edit"></i> </div>
                        <div class="menu__title"> ลูกค้าของเรา </div>
                    </a>
                </li>

                <li>
                    <a href="javascript:;" class="menu">
                        <div class="menu__icon"> <i data-lucide="type"></i> </div>
                        <div class="menu__title">
                            หมวดหมู่ 
                        <div class="menu__sub-icon "> <i data-lucide="chevron-down"></i> </div>
                        </div>
                    </a>
                    <ul <?php if ($activePage =="jobtype") {?> class="side-menu__sub-open" <?php }else{?> class=""<?php  } ?>>
                        <li>
                            <a href="{{url('backend/companytype')}}" class="menu menu--active">
                                <div class="menu__icon"> <i data-lucide="type"></i> </div>
                                <div class="menu__title"> ลักษณะธุรกิจ </div>
                            </a>
                        </li>
                        <li>
                            <a href="{{url('backend/jobmain')}}" class="menu menu--active">
                                <div class="menu__icon"> <i data-lucide="type"></i> </div>
                                <div class="menu__title"> หมวดงานหลัก </div>
                            </a>
                        </li>
                        <li>
                            <a href="{{url('backend/jobsub')}}" class="menu menu--active">
                                <div class="menu__icon"> <i data-lucide="type"></i> </div>
                                <div class="menu__title"> หมวดงานรอง </div>
                            </a>
                        </li>
                        <li>
                            <a href="{{url('backend/address')}}" class="menu menu--active">
                                <div class="menu__icon"> <i data-lucide="type"></i> </div>
                                <div class="menu__title"> สถานที่ตั้ง </div>
                            </a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="javascript:;" class="menu">
                        <div class="menu__icon"> <i data-lucide="users"></i> </div>
                        <div class="menu__title">
                            ตรวจสอบบริษัท 
                        <div class="menu__sub-icon "> <i data-lucide="chevron-down"></i> </div>
                        </div>
                    </a>
                    <ul <?php if ($activePage =="company") {?> class="side-menu__sub-open" <?php }else{?> class=""<?php  } ?>>
                        <li>
                            <a href="{{url('backend/company')}}" class="menu menu--active">
                                <div class="menu__icon"> <i data-lucide="users"></i> </div>
                                <div class="menu__title"> ยืนยันการสมัคร </div>
                            </a>
                        </li>
                        <li>
                            <a href="{{url('backend/firstCompany')}}" class="menu menu--active">
                                <div class="menu__icon"> <i data-lucide="users"></i> </div>
                                <div class="menu__title"> บริษัทชั้นนำ </div>
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
                <a href="{{url('indexUser')}}" class="intro-x flex items-center pl-5 pt-4">
                    <img alt="Midone - HTML Admin Template" class="w-6" src="{{ asset('dist/images/logo.svg') }}">
                    <span class="hidden xl:block text-white text-lg ml-3"> User </span> 
                </a>
                <div class="side-nav__devider my-6"></div>
                @if($status==8)
                <ul>     
                    <li>
                        <a href="{{url('indexUser')}}" <?php if ($activePage =="statistic") {?> class="side-menu side-menu--active" <?php }else{?> class="side-menu"<?php  } ?>
                            data-page="acct">
                            <div class="side-menu__icon"> <i data-lucide="home"></i> </div>
                            <div class="side-menu__title"> ติดตามการพัฒนาสมรรถนะและทักษะของบุคคล </div>
                        </a>
                    </li>

                    <li>
                        <a href="{{url('user/training')}}" <?php if ($activePage =="training") {?> class="side-menu side-menu--active" <?php }else{?> class="side-menu"<?php  } ?>
                            data-page="acct">
                            <div class="side-menu__icon"> <i data-lucide="home"></i> </div>
                            <div class="side-menu__title"> หลักสูตรการอบรม </div>
                        </a>
                    </li>
                    
                    <li>
                        <a href="{{url('user/study')}}" <?php if ($activePage =="study") {?> class="side-menu side-menu--active" <?php }else{?> class="side-menu"<?php  } ?>
                            data-page="acct">
                            <div class="side-menu__icon"> <i data-lucide="home"></i> </div>
                            <div class="side-menu__title"> ประวัติการพัฒนาทักษะ </div>
                        </a>
                    </li>

                    <li>
                        <a href="{{url('user/plan')}}" <?php if ($activePage =="plan") {?> class="side-menu side-menu--active" <?php }else{?> class="side-menu"<?php  } ?>
                            data-page="acct">
                            <div class="side-menu__icon"> <i data-lucide="home"></i> </div>
                            <div class="side-menu__title"> แผนการพัฒนาทักษะ </div>
                        </a>
                    </li>

                    <li>
                        <a href="{{url('user/history')}}" <?php if ($activePage =="history") {?> class="side-menu side-menu--active" <?php }else{?> class="side-menu"<?php  } ?>
                            data-page="acct">
                            <div class="side-menu__icon"> <i data-lucide="home"></i> </div>
                            <div class="side-menu__title"> ประวัติส่วนตัว </div>
                        </a>
                    </li>
                    
                    <!-- <li>
                        <a href="{{url('user/course')}}" <?php if ($activePage =="course") {?> class="side-menu side-menu--active" <?php }else{?> class="side-menu"<?php  } ?>
                            data-page="acct">
                            <div class="side-menu__icon"> <i data-lucide="home"></i> </div>
                            <div class="side-menu__title"> ค้นหาหลักสูตรฝึกอบรม </div>
                        </a>
                    </li> -->
                    
                </ul>
                @else
                <ul>
                    <li>
                        <a href="{{url('user/history')}}" <?php if ($activePage =="history") {?> class="side-menu side-menu--active" <?php }else{?> class="side-menu"<?php  } ?>
                            data-page="acct">
                            <div class="side-menu__icon"> <i data-lucide="home"></i> </div>
                            <div class="side-menu__title"> ประวัติส่วนตัว </div>
                        </a>
                    </li>
                </ul>
                @endif

            </nav>
            <!-- END: Side Menu -->