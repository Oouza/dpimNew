 <!-- BEGIN: Mobile Menu -->
 <?php
    // use Auth;
    $status=Auth::user()->status;
?>
@if(empty($status))
<form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
@csrf
</form>
<script>
    var msg = 'log out';
    alert(msg);
    document.getElementById('logout-form').submit();
</script>
@endif
 <div class="mobile-menu md:hidden">
            <div class="mobile-menu-bar">
                <a href="" class="flex mr-auto">
                    <img alt="Midone - HTML Admin Template" class="w-6" src="{{ asset('dist/images/logo.svg') }}">
                </a>
                <a href="javascript:;" id="mobile-menu-toggler"> <i data-lucide="bar-chart-2" class="w-8 h-8 text-white transform -rotate-90"></i> </a>
            </div>
            <ul class="border-t border-white/[0.08] py-5 hidden">
            @if($status==4)
                <li>
                    <a href="{{url('/home')}}" class="menu">
                        <div class="menu__icon"> <i data-lucide="edit"></i> </div>
                        <div class="menu__title"> ตั้งค่าตำแหน่งงาน สมรรถนะ และทักษะในองค์กร </div>
                    </a>
                </li>

                <li>
                    <a href="javascript:;" class="menu">
                        <div class="menu__icon"> <i data-lucide="type"></i> </div>
                        <div class="menu__title">
                            จัดการข้อมูลแผนก 
                        <div class="menu__sub-icon "> <i data-lucide="chevron-down"></i> </div>
                        </div>
                    </a>
                    <ul <?php if ($activePage =="dataDepartment") {?> class="side-menu__sub-open" <?php }else{?> class=""<?php  } ?>>
                        <li>
                            <a href="{{url('company/department')}}" class="menu menu--active">
                                <div class="menu__icon"> <i data-lucide="type"></i> </div>
                                <div class="menu__title"> ข้อมูลแผนก </div>
                            </a>
                        </li>
                        <li>
                            <a href="{{url('company/departmentSub')}}" class="menu menu--active">
                                <div class="menu__icon"> <i data-lucide="type"></i> </div>
                                <div class="menu__title"> ข้อมูลแผนกย่อย </div>
                            </a>
                        </li>
                        <li>
                            <a href="{{url('company/position')}}" class="menu menu--active">
                                <div class="menu__icon"> <i data-lucide="type"></i> </div>
                                <div class="menu__title"> ข้อมูลตำแหน่ง </div>
                            </a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="javascript:;" class="menu">
                        <div class="menu__icon"> <i data-lucide="users"></i> </div>
                        <div class="menu__title">
                            จัดการข้อมูลบุคลากร 
                        <div class="menu__sub-icon "> <i data-lucide="chevron-down"></i> </div>
                        </div>
                    </a>
                    <ul <?php if ($activePage =="users") {?> class="side-menu__sub-open" <?php }else{?> class=""<?php  } ?>>
                        <li>
                            <a href="{{url('company/user')}}" class="menu menu--active">
                                <div class="menu__icon"> <i data-lucide="users"></i> </div>
                                <div class="menu__title"> จัดการข้อมูลบุคลากร </div>
                            </a>
                        </li>
                        <li>
                            <a href="{{url('company/cfUser')}}" class="menu menu--active">
                                <div class="menu__icon"> <i data-lucide="users"></i> </div>
                                <div class="menu__title"> ยืนยันบุคลากร </div>
                            </a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="javascript:;" class="menu">
                        <div class="menu__icon"> <i data-lucide="users"></i> </div>
                        <div class="menu__title">
                            จัดการทักษะบุคลากร 
                        <div class="menu__sub-icon "> <i data-lucide="chevron-down"></i> </div>
                        </div>
                    </a>
                    <ul <?php if ($activePage =="manage") {?> class="side-menu__sub-open" <?php }else{?> class=""<?php  } ?>>
                        <li>
                            <a href="{{url('company/manage/skills')}}" class="menu menu--active">
                                <div class="menu__icon"> <i data-lucide="users"></i> </div>
                                <div class="menu__title"> กำหนดเป้าหมายการพัฒนารายบุคคล </div>
                            </a>
                        </li>
                        <li>
                            <a href="{{url('company/plan/skills')}}" class="menu menu--active">
                                <div class="menu__icon"> <i data-lucide="users"></i> </div>
                                <div class="menu__title"> กำหนดและติดตามการพัฒนาตามแผน </div>
                            </a>
                        </li>
                        <li>
                            <a href="{{url('company/cf/plan')}}" class="menu menu--active">
                                <div class="menu__icon"> <i data-lucide="users"></i> </div>
                                <div class="menu__title"> ยืนยันข้อเสนอการฝึกอบรมจากบุคลากร </div>
                            </a>
                        </li>
                        <li>
                            <a href="{{url('company/cf/skills')}}" class="menu menu--active">
                                <div class="menu__icon"> <i data-lucide="users"></i> </div>
                                <div class="menu__title"> ยืนยันข้อมูลการฝึกอบรมที่เสนอโดยบุคลากร </div>
                            </a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="{{url('search/course')}}" class="menu">
                        <div class="menu__icon"> <i data-lucide="edit"></i> </div>
                        <div class="menu__title"> ค้นหาหลักสูตรฝึกอบรม </div>
                    </a>
                </li>

                <li>
                    <a href="javascript:;" class="menu">
                        <div class="menu__icon"> <i data-lucide="users"></i> </div>
                        <div class="menu__title">
                            กระดานสรุป 
                        <div class="menu__sub-icon "> <i data-lucide="chevron-down"></i> </div>
                        </div>
                    </a>
                    <ul <?php if ($activePage =="scoreboard") {?> class="side-menu__sub-open" <?php }else{?> class=""<?php  } ?>>
                        <li>
                            <a href="{{ url('company/graph/job' )}}" class="menu menu--active">
                                <div class="menu__icon"> <i data-lucide="users"></i> </div>
                                <div class="menu__title"> สรุประดับทักษะของบุคลากรรายตำแหน่ง </div>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('company/score/sillks') }}" class="menu menu--active">
                                <div class="menu__icon"> <i data-lucide="users"></i> </div>
                                <div class="menu__title"> สรุปผลการพัฒนาทักษะของบุคลากร </div>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('company/score/job' )}}" class="menu menu--active">
                                <div class="menu__icon"> <i data-lucide="users"></i> </div>
                                <div class="menu__title"> สรุปจำนวนบุคลากรรายกลุ่มตำแหน่งงาน </div>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('company/graph/sillks' )}}" class="menu menu--active">
                                <div class="menu__icon"> <i data-lucide="users"></i> </div>
                                <div class="menu__title"> สรุปจำนวนบุคลากรในระดับทักษะต่าง ๆ </div>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="{{url('company/edit')}}" class="menu">
                        <div class="menu__icon"> <i data-lucide="edit"></i> </div>
                        <div class="menu__title"> แก้ไขข้อมูลสถานประกอบการ </div>
                    </a>
                </li>
                @else
                <li>
                    <a href="{{url('company/edit')}}" class="menu">
                        <div class="menu__icon"> <i data-lucide="edit"></i> </div>
                        <div class="menu__title"> แก้ไขข้อมูลสถานประกอบการ </div>
                    </a>
                </li>
                @endif

            </ul>
        </div>
        <!-- END: Mobile Menu -->
        <div class="flex">
            <!-- BEGIN: Side Menu -->
            <nav class="side-nav">
                <a href="{{url('/home')}}" class="intro-x flex items-center pl-5 pt-4">
                    <img alt="Midone - HTML Admin Template" class="w-6" src="{{ asset('dist/images/logo.svg') }}">
                    <span class="hidden xl:block text-white text-lg ml-3"> Local Admin </span> 
                </a>
                <div class="side-nav__devider my-6"></div>
                <ul>
                    @if($status==4)
                    <!-- <li>
                        <a href="javascript:;" <?php if ($activePage =="index") {?> class="side-menu side-menu--active" <?php }else{?> class="side-menu"<?php  } ?>>
                            <div class="side-menu__icon"> <i data-lucide="home"></i> </div>
                            <div class="side-menu__title">
                                ตั้งค่าตำแหน่งงาน สมรรถนะ และทักษะในองค์กร 
                                <div class="side-menu__sub-icon "> <i data-lucide="chevron-down"></i> </div>
                            </div>
                        </a>
                        <ul <?php if ($activePage =="index") {?> class="side-menu__sub-open" <?php }else{?> class=""<?php  } ?>>
                            <li>
                                <a href="{{url('indexCompany')}}" <?php if ($active =="job") {?> class="side-menu side-menu--active" <?php }else{?> class="side-menu"<?php  } ?>
                                    data-page="acct">
                                    <div class="side-menu__icon"> <i data-lucide="home"></i> </div>
                                    <div class="side-menu__title"> กลุ่มตำแหน่งงาน </div>
                                </a>
                            </li>
                            <li>
                                <a href="{{url('company/capacity')}}" <?php if ($active =="capacity") {?> class="side-menu side-menu--active" <?php }else{?> class="side-menu"<?php  } ?>
                                    data-page="acct">
                                    <div class="side-menu__icon"> <i data-lucide="home"></i> </div>
                                    <div class="side-menu__title"> สมรรถนะ </div>
                                </a>
                            </li>
                            <li>
                                <a href="{{url('company/skills')}}" <?php if ($active =="skills") {?> class="side-menu side-menu--active" <?php }else{?> class="side-menu"<?php  } ?>
                                    data-page="acct">
                                    <div class="side-menu__icon"> <i data-lucide="home"></i> </div>
                                    <div class="side-menu__title"> ทักษะ </div>
                                </a>
                            </li>
                            <li>
                                <a href="{{url('company/skillsSub')}}" <?php if ($active =="skillsSub") {?> class="side-menu side-menu--active" <?php }else{?> class="side-menu"<?php  } ?>
                                    data-page="acct">
                                    <div class="side-menu__icon"> <i data-lucide="home"></i> </div>
                                    <div class="side-menu__title"> ทักษะ </div>
                                </a>
                            </li>
                        </ul>
                    </li> -->
                    <li>
                        <a href="{{url('/home')}}" <?php if ($activePage =="index") {?> class="side-menu side-menu--active" <?php }else{?> class="side-menu"<?php  } ?>
                            data-page="acct">
                            <div class="side-menu__icon"> <i data-lucide="home"></i> </div>
                            <div class="side-menu__title"> ตั้งค่าตำแหน่งงาน สมรรถนะ และทักษะในองค์กร </div>
                        </a>
                    </li>

                    <li>
                        <a href="javascript:;" <?php if ($activePage =="dataDepartment") {?> class="side-menu side-menu--active" <?php }else{?> class="side-menu"<?php  } ?>>
                            <div class="side-menu__icon"> <i data-lucide="home"></i> </div>
                            <div class="side-menu__title">
                                จัดการข้อมูลแผนก 
                                <div class="side-menu__sub-icon "> <i data-lucide="chevron-down"></i> </div>
                            </div>
                        </a>
                        <ul <?php if ($activePage =="dataDepartment") {?> class="side-menu__sub-open" <?php }else{?> class=""<?php  } ?>>
                            <li>
                                <a href="{{url('company/department')}}" <?php if ($active =="department") {?> class="side-menu side-menu--active" <?php }else{?> class="side-menu"<?php  } ?>
                                    data-page="acct">
                                    <div class="side-menu__icon"> <i data-lucide="home"></i> </div>
                                    <div class="side-menu__title"> ข้อมูลแผนก </div>
                                </a>
                            </li>
                            <li>
                                <a href="{{url('company/departmentSub')}}" <?php if ($active =="departmentSub") {?> class="side-menu side-menu--active" <?php }else{?> class="side-menu"<?php  } ?>
                                    data-page="acct">
                                    <div class="side-menu__icon"> <i data-lucide="home"></i> </div>
                                    <div class="side-menu__title"> ข้อมูลแผนกย่อย </div>
                                </a>
                            </li>
                            <li>
                                <a href="{{url('company/position')}}" <?php if ($active =="position") {?> class="side-menu side-menu--active" <?php }else{?> class="side-menu"<?php  } ?>
                                    data-page="acct">
                                    <div class="side-menu__icon"> <i data-lucide="home"></i> </div>
                                    <div class="side-menu__title"> ข้อมูลตำแหน่ง </div>
                                </a>
                            </li>
                        </ul>
                    </li>

                    
                    <li>
                        <a href="javascript:;" <?php if ($activePage =="users") {?> class="side-menu side-menu--active" <?php }else{?> class="side-menu"<?php  } ?>>
                            <div class="side-menu__icon"> <i data-lucide="home"></i> </div>
                            <div class="side-menu__title">
                                จัดการข้อมูลบุคลากร 
                                <div class="side-menu__sub-icon "> <i data-lucide="chevron-down"></i> </div>
                            </div>
                        </a>
                        <ul <?php if ($activePage =="users") {?> class="side-menu__sub-open" <?php }else{?> class=""<?php  } ?>>
                            <li>
                                <a href="{{url('company/user')}}" <?php if ($active =="mUser") {?> class="side-menu side-menu--active" <?php }else{?> class="side-menu"<?php  } ?>
                                    data-page="acct">
                                    <div class="side-menu__icon"> <i data-lucide="home"></i> </div>
                                    <div class="side-menu__title"> จัดการข้อมูลบุคลากร </div>
                                </a>
                            </li>
                            <li>
                                <a href="{{url('company/cfUser')}}" <?php if ($active =="cfUser") {?> class="side-menu side-menu--active" <?php }else{?> class="side-menu"<?php  } ?>
                                    data-page="acct">
                                    <div class="side-menu__icon"> <i data-lucide="home"></i> </div>
                                    <div class="side-menu__title"> ยืนยันบุคลากร </div>
                                </a>
                            </li>
                            <!-- <li>
                                <a href="{{url('company/cfUserEdit')}}" <?php if ($active =="cfUserEdit") {?> class="side-menu side-menu--active" <?php }else{?> class="side-menu"<?php  } ?>
                                    data-page="acct">
                                    <div class="side-menu__icon"> <i data-lucide="home"></i> </div>
                                    <div class="side-menu__title"> ยืนยันการแก้ไขข้อมูลของบุคลากร </div>
                                </a>
                            </li> -->
                        </ul>
                    </li>

                    <li>
                        <a href="javascript:;" <?php if ($activePage =="manage") {?> class="side-menu side-menu--active" <?php }else{?> class="side-menu"<?php  } ?>>
                            <div class="side-menu__icon"> <i data-lucide="home"></i> </div>
                            <div class="side-menu__title">
                                จัดการทักษะบุคลากร 
                                <div class="side-menu__sub-icon "> <i data-lucide="chevron-down"></i> </div>
                            </div>
                        </a>
                        <ul <?php if ($activePage =="manage") {?> class="side-menu__sub-open" <?php }else{?> class=""<?php  } ?>>
                            <li>
                                <a href="{{url('company/manage/skills')}}" <?php if ($active =="userSkills") {?> class="side-menu side-menu--active" <?php }else{?> class="side-menu"<?php  } ?>
                                    data-page="acct">
                                    <div class="side-menu__icon"> <i data-lucide="home"></i> </div>
                                    <div class="side-menu__title"> กำหนดเป้าหมายการพัฒนารายบุคคล </div>
                                </a>
                            </li>
                            <li>
                                <a href="{{url('company/plan/skills')}}" <?php if ($active =="planSkills") {?> class="side-menu side-menu--active" <?php }else{?> class="side-menu"<?php  } ?>
                                    data-page="acct">
                                    <div class="side-menu__icon"> <i data-lucide="home"></i> </div>
                                    <div class="side-menu__title"> กำหนดและติดตามการพัฒนาตามแผน </div>
                                </a>
                            </li>
                            <li>
                                <a href="{{url('company/cf/plan')}}" <?php if ($active =="cfPlanSkills") {?> class="side-menu side-menu--active" <?php }else{?> class="side-menu"<?php  } ?>
                                    data-page="acct">
                                    <div class="side-menu__icon"> <i data-lucide="home"></i> </div>
                                    <div class="side-menu__title"> ยืนยันข้อเสนอการฝึกอบรมจากบุคลากร </div>
                                </a>
                            </li>
                            <li>
                                <a href="{{url('company/cf/skills')}}" <?php if ($active =="cfSkills") {?> class="side-menu side-menu--active" <?php }else{?> class="side-menu"<?php  } ?>
                                    data-page="acct">
                                    <div class="side-menu__icon"> <i data-lucide="home"></i> </div>
                                    <div class="side-menu__title"> ยืนยันข้อมูลการฝึกอบรมที่เสนอโดยบุคลากร </div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <!-- <li>
                        <a href="{{url('company/manage/skills')}}" <?php if ($activePage =="manage") {?> class="side-menu side-menu--active" <?php }else{?> class="side-menu"<?php  } ?>
                            data-page="acct">
                            <div class="side-menu__icon"> <i data-lucide="home"></i> </div>
                            <div class="side-menu__title"> จัดการข้อมูลการพัฒนาบุคลากร </div>
                        </a>
                    </li> -->
                    <li>
                        <a href="{{url('search/course')}}" <?php if ($activePage =="searchCourse") {?> class="side-menu side-menu--active" <?php }else{?> class="side-menu"<?php  } ?>
                            data-page="acct">
                            <div class="side-menu__icon"> <i data-lucide="home"></i> </div>
                            <div class="side-menu__title"> ค้นหาหลักสูตรฝึกอบรม </div>
                        </a>
                    </li>
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
                                <a href="{{ url('company/graph/job' )}}" <?php if ($active =="job") {?> class="side-menu side-menu--active" <?php }else{?> class="side-menu"<?php  } ?>
                                    data-page="acct">
                                    <div class="side-menu__icon"> <i data-lucide="home"></i> </div>
                                    <div class="side-menu__title"> สรุประดับทักษะของบุคลากรรายตำแหน่ง </div>
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('company/score/sillks') }}" <?php if ($active =="skills") {?> class="side-menu side-menu--active" <?php }else{?> class="side-menu"<?php  } ?>
                                    data-page="acct">
                                    <div class="side-menu__icon"> <i data-lucide="home"></i> </div>
                                    <div class="side-menu__title"> สรุปผลการพัฒนาทักษะของบุคลากร </div>
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('company/score/job' )}}" <?php if ($active =="scorejob") {?> class="side-menu side-menu--active" <?php }else{?> class="side-menu"<?php  } ?>
                                    data-page="acct">
                                    <div class="side-menu__icon"> <i data-lucide="home"></i> </div>
                                    <div class="side-menu__title"> สรุปจำนวนบุคลากรรายกลุ่มตำแหน่งงาน </div>
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('company/graph/sillks' )}}" <?php if ($active =="graphillks") {?> class="side-menu side-menu--active" <?php }else{?> class="side-menu"<?php  } ?>
                                    data-page="acct">
                                    <div class="side-menu__icon"> <i data-lucide="home"></i> </div>
                                    <div class="side-menu__title"> สรุปจำนวนบุคลากรในระดับทักษะต่าง ๆ </div>
                                </a>
                            </li>
                            <!-- <li>
                                <a href="{{ url('company/graph/capacity' )}}" <?php if ($active =="capacity") {?> class="side-menu side-menu--active" <?php }else{?> class="side-menu"<?php  } ?>
                                    data-page="acct">
                                    <div class="side-menu__icon"> <i data-lucide="home"></i> </div>
                                    <div class="side-menu__title"> สรุปจำนวนบุคลากรในระดับสมรรถนะต่างๆ </div>
                                </a>
                            </li>                             -->
                        </ul>
                    </li>
                  
                    <li>
                        <a href="{{url('company/edit')}}" <?php if ($activePage =="setting") {?> class="side-menu side-menu--active" <?php }else{?> class="side-menu"<?php  } ?>
                            data-page="acct">
                            <div class="side-menu__icon"> <i data-lucide="home"></i> </div>
                            <div class="side-menu__title"> แก้ไขข้อมูลสถานประกอบการ </div>
                        </a>
                    </li>
                    @else
                    <li>
                        <a href="{{url('company/edit')}}" <?php if ($activePage =="setting") {?> class="side-menu side-menu--active" <?php }else{?> class="side-menu"<?php  } ?>
                            data-page="acct">
                            <div class="side-menu__icon"> <i data-lucide="home"></i> </div>
                            <div class="side-menu__title"> แก้ไขข้อมูลสถานประกอบการ </div>
                        </a>
                    </li>
                    @endif

                </ul>

            </nav>
            <!-- END: Side Menu -->