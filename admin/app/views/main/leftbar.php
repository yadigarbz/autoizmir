<div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">
    <!-- BEGIN: Left Aside -->
    <button class="m-aside-left-close  m-aside-left-close--skin-light " id="m_aside_left_close_btn">
        <i class="la la-close"></i>
    </button>
    <div id="m_aside_left" class="m-grid__item	m-aside-left  m-aside-left--skin-light ">
        <div id="m_ver_menu" class="m-aside-menu  m-aside-menu--skin-light m-aside-menu--submenu-skin-light " data-menu-vertical="true" data-menu-scrollable="true" data-menu-dropdown-timeout="500" >
        <ul class="m-menu__nav  m-menu__nav--dropdown-submenu-arrow ">
            <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  data-menu-submenu-toggle="hover">
                <a  href="#" class="m-menu__link m-menu__toggle">
                    <i class="m-menu__link-icon flaticon-layers"></i>
                    <span class="m-menu__link-text">
                                            İlanlar
                                        </span>
                    <i class="m-menu__ver-arrow la la-angle-right"></i>
                </a>
                <div class="m-menu__submenu ">
                    <span class="m-menu__arrow"></span>
                    <ul class="m-menu__subnav">
                        <li class="m-menu__item  m-menu__item--parent" aria-haspopup="true" >
                                                <span class="m-menu__link">
                                                    <span class="m-menu__link-text">
                                                        İlan İşlemleri
                                                    </span>
                                                </span>
                        </li>
                        <li class="m-menu__item " aria-haspopup="true"  data-redirect="true">
                            <a  href="inner.html" class="m-menu__link ">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                    <span></span>
                                </i>
                                <span class="m-menu__link-text">
                                    Yeni İlan Ekle
                                </span>
                            </a>
                        </li>
                        <li class="m-menu__item " aria-haspopup="true"  data-redirect="true">
                            <a  href="<?php echo $base ?>cars/list/active" class="m-menu__link ">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                    <span></span>
                                </i>
                                <span class="m-menu__link-text">
                                    Aktif İlanlar
                                </span>
                            </a>
                        </li>
                        <li class="m-menu__item " aria-haspopup="true"  data-redirect="true">
                            <a  href="<?php echo $base ?>cars/list/pasive" class="m-menu__link ">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                    <span></span>
                                </i>
                                <span class="m-menu__link-text">
                                    Pasif İlanlar
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  data-menu-submenu-toggle="hover" data-redirect="true">
                <a  href="inner.html" class="m-menu__link m-menu__toggle">
                    <i class="m-menu__link-icon flaticon-clipboard"></i>
                    <span class="m-menu__link-text">
                        Tanımlamalar
                    </span>
                    <i class="m-menu__ver-arrow la la-angle-right"></i>
                </a>
                <div class="m-menu__submenu ">
                    <span class="m-menu__arrow"></span>
                    <ul class="m-menu__subnav">
                        <li class="m-menu__item  m-menu__item--parent" aria-haspopup="true"  data-redirect="true">
                            <span class="m-menu__link">
                                <span class="m-menu__link-text">
                                    Tanımlamalar
                                </span>
                            </span>
                        </li>
                        <li class="m-menu__item" aria-haspopup="true"  data-redirect="true">
                            <a  href="<?php echo $base ?>definations/vehicle_types/list" class="m-menu__link">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i>
                                <span class="m-menu__link-text">
                                    Araç Tipleri
                                </span>
                            </a>
                        </li>
                        <li class="m-menu__item" aria-haspopup="true"  data-redirect="true">
                            <a  href="<?php echo $base ?>definations/vehicle_mfcs/list" class="m-menu__link">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i>
                                <span class="m-menu__link-text">
                                    Araç Markaları
                                </span>
                            </a>
                        </li>
                        <li class="m-menu__item" aria-haspopup="true"  data-redirect="true">
                            <a  href="<?php echo $base ?>definations/vehicle_mdls/list" class="m-menu__link">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i>
                                <span class="m-menu__link-text">
                                    Araç Modelleri
                                </span>
                            </a>
                        </li>
                        <li class="m-menu__item" aria-haspopup="true"  data-redirect="true">
                            <a  href="<?php echo $base ?>definations/vehicle_vrss/list" class="m-menu__link">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i>
                                <span class="m-menu__link-text">
                                    Araç Versiyonları
                                </span>
                            </a>
                        </li>
                        <li class="m-menu__item" aria-haspopup="true"  data-redirect="true">
                            <a  href="<?php echo $base ?>definations/fuel_types/list" class="m-menu__link">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i>
                                <span class="m-menu__link-text">
                                    Yakıt Tipleri
                                </span>
                            </a>
                        </li>
                        <li class="m-menu__item" aria-haspopup="true"  data-redirect="true">
                            <a  href="<?php echo $base ?>definations/engine_types/list" class="m-menu__link">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i>
                                <span class="m-menu__link-text">
                                    Motor Tipleri
                                </span>
                            </a>
                        </li>
                        <li class="m-menu__item" aria-haspopup="true"  data-redirect="true">
                            <a  href="<?php echo $base ?>definations/tsms_types/list" class="m-menu__link">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i>
                                <span class="m-menu__link-text">
                                    Vites Tipleri
                                </span>
                            </a>
                        </li>
                        <li class="m-menu__item" aria-haspopup="true"  data-redirect="true">
                            <a  href="<?php echo $base ?>definations/colors/list" class="m-menu__link">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i>
                                <span class="m-menu__link-text">
                                    Renkler
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  data-menu-submenu-toggle="hover" data-redirect="true">
                <a  href="inner.html" class="m-menu__link m-menu__toggle">
                    <i class="m-menu__link-icon flaticon-suitcase"></i>
                    <span class="m-menu__link-text">
                                            Finance
                                        </span>
                    <i class="m-menu__ver-arrow la la-angle-right"></i>
                </a>
                <div class="m-menu__submenu ">
                    <span class="m-menu__arrow"></span>
                    <ul class="m-menu__subnav">
                        <li class="m-menu__item  m-menu__item--parent" aria-haspopup="true"  data-redirect="true">
                                                <span class="m-menu__link">
                                                    <span class="m-menu__link-text">
                                                        Finance
                                                    </span>
                                                </span>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  data-menu-submenu-toggle="hover" data-redirect="true">
                <a  href="#" class="m-menu__link m-menu__toggle">
                    <i class="m-menu__link-icon flaticon-graphic-1"></i>
                    <span class="m-menu__link-title">
                                            <span class="m-menu__link-wrap">
                                                <span class="m-menu__link-text">
                                                    Support
                                                </span>
                                                <span class="m-menu__link-badge">
                                                    <span class="m-badge m-badge--danger">
                                                        23
                                                    </span>
                                                </span>
                                            </span>
                                        </span>
                    <i class="m-menu__ver-arrow la la-angle-right"></i>
                </a>
                <div class="m-menu__submenu ">
                    <span class="m-menu__arrow"></span>
                    <ul class="m-menu__subnav">
                        <li class="m-menu__item  m-menu__item--parent" aria-haspopup="true"  data-redirect="true">
                                                <span class="m-menu__link">
                                                    <span class="m-menu__link-title">
                                                        <span class="m-menu__link-wrap">
                                                            <span class="m-menu__link-text">
                                                                Support
                                                            </span>
                                                            <span class="m-menu__link-badge">
                                                                <span class="m-badge m-badge--danger">
                                                                    23
                                                                </span>
                                                            </span>
                                                        </span>
                                                    </span>
                                                </span>
                        </li>
                        <li class="m-menu__item " aria-haspopup="true"  data-redirect="true">
                            <a  href="inner.html" class="m-menu__link ">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                    <span></span>
                                </i>
                                <span class="m-menu__link-text">
                                                        Reports
                                                    </span>
                            </a>
                        </li>
                        <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  data-menu-submenu-toggle="hover" data-redirect="true">
                            <a  href="#" class="m-menu__link m-menu__toggle">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                    <span></span>
                                </i>
                                <span class="m-menu__link-text">
                                                        Cases
                                                    </span>
                                <i class="m-menu__ver-arrow la la-angle-right"></i>
                            </a>
                            <div class="m-menu__submenu ">
                                <span class="m-menu__arrow"></span>
                                <ul class="m-menu__subnav">
                                    <li class="m-menu__item " aria-haspopup="true"  data-redirect="true">
                                        <a  href="inner.html" class="m-menu__link ">
                                            <i class="m-menu__link-icon flaticon-computer"></i>
                                            <span class="m-menu__link-title">
                                                                    <span class="m-menu__link-wrap">
                                                                        <span class="m-menu__link-text">
                                                                            Pending
                                                                        </span>
                                                                        <span class="m-menu__link-badge">
                                                                            <span class="m-badge m-badge--warning">
                                                                                10
                                                                            </span>
                                                                        </span>
                                                                    </span>
                                                                </span>
                                        </a>
                                    </li>
                                    <li class="m-menu__item " aria-haspopup="true"  data-redirect="true">
                                        <a  href="inner.html" class="m-menu__link ">
                                            <i class="m-menu__link-icon flaticon-signs-2"></i>
                                            <span class="m-menu__link-title">
                                                                    <span class="m-menu__link-wrap">
                                                                        <span class="m-menu__link-text">
                                                                            Urgent
                                                                        </span>
                                                                        <span class="m-menu__link-badge">
                                                                            <span class="m-badge m-badge--danger">
                                                                                6
                                                                            </span>
                                                                        </span>
                                                                    </span>
                                                                </span>
                                        </a>
                                    </li>
                                    <li class="m-menu__item " aria-haspopup="true"  data-redirect="true">
                                        <a  href="inner.html" class="m-menu__link ">
                                            <i class="m-menu__link-icon flaticon-clipboard"></i>
                                            <span class="m-menu__link-title">
                                                                    <span class="m-menu__link-wrap">
                                                                        <span class="m-menu__link-text">
                                                                            Done
                                                                        </span>
                                                                        <span class="m-menu__link-badge">
                                                                            <span class="m-badge m-badge--success">
                                                                                2
                                                                            </span>
                                                                        </span>
                                                                    </span>
                                                                </span>
                                        </a>
                                    </li>
                                    <li class="m-menu__item " aria-haspopup="true"  data-redirect="true">
                                        <a  href="inner.html" class="m-menu__link ">
                                            <i class="m-menu__link-icon flaticon-multimedia-2"></i>
                                            <span class="m-menu__link-title">
                                                                    <span class="m-menu__link-wrap">
                                                                        <span class="m-menu__link-text">
                                                                            Archive
                                                                        </span>
                                                                        <span class="m-menu__link-badge">
                                                                            <span class="m-badge m-badge--info m-badge--wide">
                                                                                245
                                                                            </span>
                                                                        </span>
                                                                    </span>
                                                                </span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="m-menu__item " aria-haspopup="true"  data-redirect="true">
                            <a  href="inner.html" class="m-menu__link ">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                    <span></span>
                                </i>
                                <span class="m-menu__link-text">
                                                        Clients
                                                    </span>
                            </a>
                        </li>
                        <li class="m-menu__item " aria-haspopup="true"  data-redirect="true">
                            <a  href="inner.html" class="m-menu__link ">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                    <span></span>
                                </i>
                                <span class="m-menu__link-text">
                                                        Audit
                                                    </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  data-menu-submenu-toggle="hover" data-redirect="true">
                <a  href="inner.html" class="m-menu__link m-menu__toggle">
                    <i class="m-menu__link-icon flaticon-light"></i>
                    <span class="m-menu__link-text">
                                            Administration
                                        </span>
                    <i class="m-menu__ver-arrow la la-angle-right"></i>
                </a>
                <div class="m-menu__submenu ">
                    <span class="m-menu__arrow"></span>
                    <ul class="m-menu__subnav">
                        <li class="m-menu__item  m-menu__item--parent" aria-haspopup="true"  data-redirect="true">
                                                <span class="m-menu__link">
                                                    <span class="m-menu__link-text">
                                                        Administration
                                                    </span>
                                                </span>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  data-menu-submenu-toggle="hover" data-redirect="true">
                <a  href="inner.html" class="m-menu__link m-menu__toggle">
                    <i class="m-menu__link-icon flaticon-share"></i>
                    <span class="m-menu__link-text">
                                            Management
                                        </span>
                    <i class="m-menu__ver-arrow la la-angle-right"></i>
                </a>
                <div class="m-menu__submenu ">
                    <span class="m-menu__arrow"></span>
                    <ul class="m-menu__subnav">
                        <li class="m-menu__item  m-menu__item--parent" aria-haspopup="true"  data-redirect="true">
                                                <span class="m-menu__link">
                                                    <span class="m-menu__link-text">
                                                        Management
                                                    </span>
                                                </span>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="m-menu__section">
                <h4 class="m-menu__section-text">
                    Reports
                </h4>
                <i class="m-menu__section-icon flaticon-more-v3"></i>
            </li>
            <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  data-menu-submenu-toggle="hover" data-redirect="true">
                <a  href="inner.html" class="m-menu__link m-menu__toggle">
                    <i class="m-menu__link-icon flaticon-graphic"></i>
                    <span class="m-menu__link-text">
                                            Accounting
                                        </span>
                    <i class="m-menu__ver-arrow la la-angle-right"></i>
                </a>
                <div class="m-menu__submenu ">
                    <span class="m-menu__arrow"></span>
                    <ul class="m-menu__subnav">
                        <li class="m-menu__item  m-menu__item--parent" aria-haspopup="true"  data-redirect="true">
                                                <span class="m-menu__link">
                                                    <span class="m-menu__link-text">
                                                        Accounting
                                                    </span>
                                                </span>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  data-menu-submenu-toggle="hover" data-redirect="true">
                <a  href="inner.html" class="m-menu__link m-menu__toggle">
                    <i class="m-menu__link-icon flaticon-pie-chart"></i>
                    <span class="m-menu__link-title">
                                            <span class="m-menu__link-wrap">
                                                <span class="m-menu__link-text">
                                                    Products
                                                </span>
                                                <span class="m-menu__link-badge">
                                                    <span class="m-badge m-badge--accent m-badge--wide m-badge--rounded">
                                                        new
                                                    </span>
                                                </span>
                                            </span>
                                        </span>
                    <i class="m-menu__ver-arrow la la-angle-right"></i>
                </a>
                <div class="m-menu__submenu ">
                    <span class="m-menu__arrow"></span>
                    <ul class="m-menu__subnav">
                        <li class="m-menu__item  m-menu__item--parent" aria-haspopup="true"  data-redirect="true">
                                                <span class="m-menu__link">
                                                    <span class="m-menu__link-title">
                                                        <span class="m-menu__link-wrap">
                                                            <span class="m-menu__link-text">
                                                                Products
                                                            </span>
                                                            <span class="m-menu__link-badge">
                                                                <span class="m-badge m-badge--accent m-badge--wide m-badge--rounded">
                                                                    new
                                                                </span>
                                                            </span>
                                                        </span>
                                                    </span>
                                                </span>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  data-menu-submenu-toggle="hover" data-redirect="true">
                <a  href="inner.html" class="m-menu__link m-menu__toggle">
                    <i class="m-menu__link-icon flaticon-technology"></i>
                    <span class="m-menu__link-text">
                                            IPO
                                        </span>
                    <i class="m-menu__ver-arrow la la-angle-right"></i>
                </a>
                <div class="m-menu__submenu ">
                    <span class="m-menu__arrow"></span>
                    <ul class="m-menu__subnav">
                        <li class="m-menu__item  m-menu__item--parent" aria-haspopup="true"  data-redirect="true">
                                                <span class="m-menu__link">
                                                    <span class="m-menu__link-text">
                                                        IPO
                                                    </span>
                                                </span>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="m-menu__item  m-menu__item--submenu m-menu__item--bottom-1" aria-haspopup="true"  data-menu-submenu-toggle="hover">
                <a  href="#" class="m-menu__link m-menu__toggle">
                    <i class="m-menu__link-icon flaticon-info"></i>
                    <span class="m-menu__link-text">
                                            Help
                                        </span>
                    <i class="m-menu__ver-arrow la la-angle-right"></i>
                </a>
                <div class="m-menu__submenu m-menu__submenu--up">
                    <span class="m-menu__arrow"></span>
                    <ul class="m-menu__subnav">
                        <li class="m-menu__item  m-menu__item--parent m-menu__item--bottom-1" aria-haspopup="true" >
                                                <span class="m-menu__link">
                                                    <span class="m-menu__link-text">
                                                        Help
                                                    </span>
                                                </span>
                        </li>
                        <li class="m-menu__item " aria-haspopup="true"  data-redirect="true">
                            <a  href="inner.html" class="m-menu__link ">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                    <span></span>
                                </i>
                                <span class="m-menu__link-text">
                                                        Support
                                                    </span>
                            </a>
                        </li>
                        <li class="m-menu__item " aria-haspopup="true"  data-redirect="true">
                            <a  href="inner.html" class="m-menu__link ">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                    <span></span>
                                </i>
                                <span class="m-menu__link-text">
                                                        Blog
                                                    </span>
                            </a>
                        </li>
                        <li class="m-menu__item " aria-haspopup="true"  data-redirect="true">
                            <a  href="inner.html" class="m-menu__link ">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                    <span></span>
                                </i>
                                <span class="m-menu__link-text">
                                                        Documentation
                                                    </span>
                            </a>
                        </li>
                        <li class="m-menu__item " aria-haspopup="true"  data-redirect="true">
                            <a  href="inner.html" class="m-menu__link ">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                    <span></span>
                                </i>
                                <span class="m-menu__link-text">
                                                        Pricing
                                                    </span>
                            </a>
                        </li>
                        <li class="m-menu__item " aria-haspopup="true"  data-redirect="true">
                            <a  href="inner.html" class="m-menu__link ">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                    <span></span>
                                </i>
                                <span class="m-menu__link-text">
                                                        Terms
                                                    </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
    </div>
