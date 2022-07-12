<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from d2kpqch85ox6qf.cloudfront.net/xhtml/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 14 Mar 2022 04:23:20 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>E-Pajak BatangHari</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('baru') }}/images/batanghari.png">
    <link href="{{ asset('baru') }}/vendor/jqvmap/css/jqvmap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="{{ asset('baru') }}/vendor/chartist/css/chartist.min.css">
	<!-- Vectormap -->
    <link href="{{ asset('baru') }}/vendor/jqvmap/css/jqvmap.min.css" rel="stylesheet">
    <link href="{{ asset('baru') }}/vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
    <link href="{{ asset('baru') }}/css/style.css" rel="stylesheet">
	<link href="{{ asset('baru') }}/vendor/owl-carousel/owl.carousel.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/111542a330.js" crossorigin="anonymous"></script>
	
</head>
<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <a href="{{ route('dashboard') }}" class="brand-logo">
                <img class="logo-abbr" src="{{ asset('baru') }}/images/batanghari.png" alt="">
                {{-- <img class="logo-compact" src="{{ asset('baru') }}/images/batanghari.png" alt=""> --}}
                {{-- <img class="brand-title" src="{{ asset('baru') }}/images/batanghari.png" alt=""> --}}
                <span class="brand-title" style="color: black">E-Pajak</span>
            </a>

            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
                            <div class="dashboard_bar">
                            </div>
                        </div>
                        <ul class="navbar-nav header-right">
                           @if (\Auth::user()->level == "admin")
                           <li class="nav-item dropdown notification_dropdown">
                            <a class="nav-link bell bell-link" href="javascript:void(0)">
                                <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M12.6001 4.3008V1.4C12.6001 0.627199 13.2273 0 14.0001 0C14.7715 0 15.4001 0.627199 15.4001 1.4V4.3008C17.4805 4.6004 19.4251 5.56639 20.9287 7.06999C22.7669 8.90819 23.8001 11.4016 23.8001 14V19.2696L24.9327 21.5348C25.4745 22.6198 25.4171 23.9078 24.7787 24.9396C24.1417 25.9714 23.0147 26.6 21.8023 26.6H15.4001C15.4001 27.3728 14.7715 28 14.0001 28C13.2273 28 12.6001 27.3728 12.6001 26.6H6.19791C4.98411 26.6 3.85714 25.9714 3.22014 24.9396C2.58174 23.9078 2.52433 22.6198 3.06753 21.5348L4.20011 19.2696V14C4.20011 11.4016 5.23194 8.90819 7.07013 7.06999C8.57513 5.56639 10.5183 4.6004 12.6001 4.3008ZM14.0001 6.99998C12.1423 6.99998 10.3629 7.73779 9.04973 9.05099C7.73653 10.3628 7.00011 12.1436 7.00011 14V19.6C7.00011 19.817 6.94833 20.0312 6.85173 20.2258C6.85173 20.2258 6.22871 21.4718 5.57072 22.7864C5.46292 23.0034 5.47412 23.2624 5.60152 23.4682C5.72892 23.674 5.95431 23.8 6.19791 23.8H21.8023C22.0445 23.8 22.2699 23.674 22.3973 23.4682C22.5247 23.2624 22.5359 23.0034 22.4281 22.7864C21.7701 21.4718 21.1471 20.2258 21.1471 20.2258C21.0505 20.0312 21.0001 19.817 21.0001 19.6V14C21.0001 12.1436 20.2623 10.3628 18.9491 9.05099C17.6359 7.73779 15.8565 6.99998 14.0001 6.99998Z" fill="#3E4954"/>
                                </svg>
                                <span class="badge light text-white bg-primary rounded-circle" id="jumlah"></span>
                            </a>
                        </li>
                        @elseif (\Auth::user()->level == "kades")
                        <li class="nav-item dropdown notification_dropdown">
                            <a class="nav-link bell bell-link" href="javascript:void(0)">
                                <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M12.6001 4.3008V1.4C12.6001 0.627199 13.2273 0 14.0001 0C14.7715 0 15.4001 0.627199 15.4001 1.4V4.3008C17.4805 4.6004 19.4251 5.56639 20.9287 7.06999C22.7669 8.90819 23.8001 11.4016 23.8001 14V19.2696L24.9327 21.5348C25.4745 22.6198 25.4171 23.9078 24.7787 24.9396C24.1417 25.9714 23.0147 26.6 21.8023 26.6H15.4001C15.4001 27.3728 14.7715 28 14.0001 28C13.2273 28 12.6001 27.3728 12.6001 26.6H6.19791C4.98411 26.6 3.85714 25.9714 3.22014 24.9396C2.58174 23.9078 2.52433 22.6198 3.06753 21.5348L4.20011 19.2696V14C4.20011 11.4016 5.23194 8.90819 7.07013 7.06999C8.57513 5.56639 10.5183 4.6004 12.6001 4.3008ZM14.0001 6.99998C12.1423 6.99998 10.3629 7.73779 9.04973 9.05099C7.73653 10.3628 7.00011 12.1436 7.00011 14V19.6C7.00011 19.817 6.94833 20.0312 6.85173 20.2258C6.85173 20.2258 6.22871 21.4718 5.57072 22.7864C5.46292 23.0034 5.47412 23.2624 5.60152 23.4682C5.72892 23.674 5.95431 23.8 6.19791 23.8H21.8023C22.0445 23.8 22.2699 23.674 22.3973 23.4682C22.5247 23.2624 22.5359 23.0034 22.4281 22.7864C21.7701 21.4718 21.1471 20.2258 21.1471 20.2258C21.0505 20.0312 21.0001 19.817 21.0001 19.6V14C21.0001 12.1436 20.2623 10.3628 18.9491 9.05099C17.6359 7.73779 15.8565 6.99998 14.0001 6.99998Z" fill="#3E4954"/>
                                </svg>
                                <span class="badge light text-white bg-primary rounded-circle" id="jumlah"></span>
                            </a>
                        </li>
                           @endif
                            <li class="nav-item dropdown header-profile">
                                <a class="nav-link" href="javascript:void(0)" role="button" data-toggle="dropdown">
									<div class="header-info">
										<span class="text-black">Hello,<strong>{{ \Auth::user()->name }}</strong></span>
									</div>
                                    <img src="{{ asset('baru') }}/images/profile/17.jpg" width="20" alt=""/>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="{{ route('logout') }}" class="dropdown-item ai-icon">
                                        <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
                                        <span class="ml-2">Logout </span>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <div class="deznav">
            <div class="deznav-scroll">
				<ul class="metismenu" id="menu">
                    <li><a href="{{ route('dashboard') }}" class="ai-icon" aria-expanded="false">
                    <i class="fa-solid fa-table-columns"></i>
                        <span class="nav-text">Dashboard</span>
                    </a>
                </li>
				@if (Auth::user()->level == 'user')
				<li><a href="{{ route('bayar') }}" class="ai-icon" aria-expanded="false">
                <i class="fa-solid fa-money-check-dollar"></i>
                    <span class="nav-text">Bayar Pajak</span>
                </a>
           		</li>
					<li><a href="{{ route('histori') }}" class="ai-icon" aria-expanded="false">
                    <i class="fa-solid fa-clock-rotate-left"></i>
						<span class="nav-text">History Pajak</span>
					</a>
					</li>
				@elseif (Auth::user()->level == 'admin')
                <li><a href="{{ route('pajak') }}" class="ai-icon" aria-expanded="false">
                    <i class="fa-regular fa-newspaper"></i>
                        <span class="nav-text">Data Pajak</span>
                    </a>
                    </li>
				<li><a href="{{ route('berita') }}" class="ai-icon" aria-expanded="false">
                <i class="fa-regular fa-newspaper"></i>
					<span class="nav-text">Berita</span>
				</a>
				</li>
				<li><a href="{{ route('pengumuman') }}" class="ai-icon" aria-expanded="false">
                <i class="fa-regular fa-bell"></i>
					<span class="nav-text">Pengumuman</span>
				</a>
				</li>
				<li><a href="{{ route('pembayaranpajak') }}" class="ai-icon" aria-expanded="false">
                <i class="fa-brands fa-cc-amazon-pay"></i>
					<span class="nav-text">Pembayaran Pajak</span>
				</a>
				</li>
                @elseif (Auth::user()->level == 'kades')
                <li>
                    <a href="{{ route('pembayaranpajak') }}" class="ai-icon" aria-expanded="false">
                    <i class="fa-brands fa-cc-amazon-pay"></i>
                        <span class="nav-text">Pembayaran Pajak</span>
                    </a>
                </li>
				@endif
                </ul>
			</div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->
		
		<!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <!-- row -->
			<div class="container-fluid">
				@yield('content')
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->
        @if (\Auth::user()->level == 'admin')
        <div class="chatbox">
			<div class="chatbox-close"></div>
			<div class="custom-tab-1">
				<div class="tab-content">
					<div class="tab-pane fade active show" id="chat" role="tabpanel">
						<div class="card mb-sm-3 mb-md-0 contacts_card dz-chat-user-box">
							<div class="card-header chat-list-header text-center">
								<a href="javascript:void(0)"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect fill="#000000" x="4" y="11" width="16" height="2" rx="1"/><rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-270.000000) translate(-12.000000, -12.000000) " x="4" y="11" width="16" height="2" rx="1"/></g></svg></a>
								<div>
									<h6 class="mb-1">Pembayaran Success</h6>
									<p class="mb-0" id="tanggal"></p>
								</div>
								<a href="javascript:void(0)"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><circle fill="#000000" cx="5" cy="12" r="2"/><circle fill="#000000" cx="12" cy="12" r="2"/><circle fill="#000000" cx="19" cy="12" r="2"/></g></svg></a>
							</div>
							<div class="card-body contacts_body p-0 dz-scroll  " id="DZ_W_Contacts_Body">
								<ul class="contacts" id="isi">
									
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
            @elseif (\Auth::user()->level == 'kades')
            <div class="chatbox">
                <div class="chatbox-close"></div>
                <div class="custom-tab-1">
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="chat" role="tabpanel">
                            <div class="card mb-sm-3 mb-md-0 contacts_card dz-chat-user-box">
                                <div class="card-header chat-list-header text-center">
                                    <a href="javascript:void(0)"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect fill="#000000" x="4" y="11" width="16" height="2" rx="1"/><rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-270.000000) translate(-12.000000, -12.000000) " x="4" y="11" width="16" height="2" rx="1"/></g></svg></a>
                                    <div>
                                        <h6 class="mb-1">Pembayaran Success</h6>
                                        <p class="mb-0" id="tanggal"></p>
                                    </div>
                                    <a href="javascript:void(0)"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><circle fill="#000000" cx="5" cy="12" r="2"/><circle fill="#000000" cx="12" cy="12" r="2"/><circle fill="#000000" cx="19" cy="12" r="2"/></g></svg></a>
                                </div>
                                <div class="card-body contacts_body p-0 dz-scroll  " id="DZ_W_Contacts_Body">
                                    <ul class="contacts" id="isi">
                                        
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
            <div class="copyright">
                <p>Copyright © Designed &amp; Developed by <a href="http://dexignzone.com/" target="_blank">DexignZone</a> 2021</p>
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->

		<!--**********************************
           Support ticket button start
        ***********************************-->

        <!--**********************************
           Support ticket button end
        ***********************************-->


    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js">
    </script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @yield('script')
	<script>
        $(document).ready(function(){
            setInterval(function(){
                    notification();
                    dataNotification();
                }, 2000);
        });
        function notification(){
            $.ajax({
                url: "{{ route('get-notification') }}",
                type: 'GET',
                success: function(data){
                    $('#tanggal').html(data.tanggal);
                    $('#jumlah').html(data.sum);
                }
            });
        }
        function dataNotification(){
            $.ajax({
                url: "{{ route('data-notification') }}",
                type: 'GET',
                success: function(data){
                    $('#isi').html(data);
                }
        })
        }
		@if (session('success'))
		const Toast = Swal.mixin({
			toast: true,
			position: 'top-end',
			showConfirmButton: false,
			timer: 3000,
			timerProgressBar: true,
			didOpen: (toast) => {
				toast.addEventListener('mouseenter', Swal.stopTimer)
				toast.addEventListener('mouseleave', Swal.resumeTimer)
			}
			})

			Toast.fire({
			icon: 'success',
			title: '{{ session('success') }}'
			})
		@endif
	</script>
    <script src="{{ asset('baru') }}/vendor/global/global.min.js"></script>
	<script src="{{ asset('baru') }}/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
	<script src="{{ asset('baru') }}/vendor/chart.js/Chart.bundle.min.js"></script>
    <script src="{{ asset('baru') }}/js/custom.min.js"></script>
	<script src="{{ asset('baru') }}/js/deznav-init.js"></script>
	<script src="{{ asset('baru') }}/vendor/owl-carousel/owl.carousel.js"></script>	
	<script src="{{ asset('baru') }}/vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('baru') }}/js/plugins-init/datatables.init.js"></script>	
	
	<!-- Chart piety plugin files -->
    <script src="{{ asset('baru') }}/vendor/peity/jquery.peity.min.js"></script>
	
	<!-- Apex Chart -->
	{{-- <script src="{{ asset('baru') }}/vendor/apexchart/apexchart.js"></script> --}}
	
	<!-- Dashboard 1 -->
	<script src="{{ asset('baru') }}/js/dashboard/dashboard-1.js"></script>
	
{{-- 
	<script>
		function carouselReview(){
			/*  testimonial one function by = owl.carousel.js */
			/*  testimonial one function by = owl.carousel.js */
			jQuery('.testimonial-one').owlCarousel({
				loop:true,
				margin:10,
				nav:false,
				center:true,
				dots: false,
				navText: ['<i class="fa fa-caret-left"></i>', '<i class="fa fa-caret-right"></i>'],
				responsive:{
					0:{
						items:2
					},
					400:{
						items:3
					},	
					700:{
						items:5
					},	
					991:{
						items:6
					},			
					
					1200:{
						items:4
					},
					1600:{
						items:5
					}
				}
			})	
		}
		
		jQuery(window).on('load',function(){
			setTimeout(function(){
				carouselReview();
			}, 1000); 
		});
	</script> --}}
</body>

<!-- Mirrored from d2kpqch85ox6qf.cloudfront.net/xhtml/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 14 Mar 2022 04:23:40 GMT -->
</html>