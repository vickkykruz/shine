<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

		<meta name="csrf-token" content="{{ csrf_token() }}">
		<meta name="base-url" content="{{ url('/') }}">
		
        <title>{{ $title ?? 'Shine' }}</title>
		
		 <!-- Fonts -->
		<link rel="preconnect" href="https://fonts.googleapis.com" />
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
		<link
		  href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
		  rel="stylesheet"
		/>
		
		<!-- Icons. Uncomment required icon fonts -->
		<link rel="stylesheet" href="{{ asset('build/assets/vendor/fonts/boxicons.css') }}" />
		<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet">

		<!-- Core CSS -->
		<link rel="stylesheet" href="{{ asset('build/assets/vendor/css/core.css') }}" class="template-customizer-core-css" />
		<link rel="stylesheet" href="{{ asset('build/assets/vendor/css/theme-default.css') }}" class="template-customizer-theme-css" />
		<link rel="stylesheet" href="{{ asset('build/assets/dashboard/css/demo.css') }}" />

		<!-- Vendors CSS -->
		<link rel="stylesheet" href=".{{ asset('build/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />

		<link rel="stylesheet" href="{{ asset('build/assets/vendor/libs/apex-charts/apex-charts.css') }}" />
		
		<style>
        .timeline-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .timeline-header .userimage img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
        }
        .timeline-header .username {
            margin-left: 10px;
        }
        .timeline-likes .stats-right {
            text-align: right;
        }
        .timeline-likes .stats-icon {
            margin-right: 10px;
        }
        .timeline-comment-box {
            display: flex;
            margin-top: 15px;
        }
        .timeline-comment-box .user img {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            margin-right: 10px;
        }
		
		.image img {
		  width: 100px;
		  height: 100px;
		  object-fit: cover;
		}
		.stats > div {
		  margin-right: -5px;
		}
		
		.profile_button .btn {
		  flex: 1;
		}
		.profile_button .btn + .btn {
		  margin-left: 10px;
		}
		
		.articles, .followers, .rating{
		  font-size: .9rem;
		  color: #a1aab9;
		  font-weight:800;
		  margin: 0 5px;
		}
		.number1, .number2, .number3{
		  font-weight:500;
		}
		
		.stats-icon {
		  font-size: 10px;
		}
		
		@media screen and (max-width: 768px) {
			.aside {
				display: none;
			}
		}
    </style>
		
    </head>
    <body>
		
		<div class="layout-wrapper layout-content-navbar">
			<div class="layout-container">
				@livewire('nav.sidebar')
				
				<div class="layout-page">
					@livewire('nav.topbar')
					
					<div class="content-wrapper">
						{{ $slot }}
					</div>
					
				</div>
				
			</div>
			
			<!-- Overlay -->
			<div class="layout-overlay layout-menu-toggle"></div>
		</div>
		
		 <!-- Helpers -->
		<script src="{{ asset('build/assets/vendor/js/helpers.js') }}"></script>
		<script src="{{ asset('build/assets/dashboard/js/config.js') }}"></script>
		
		<!-- Core JS -->
		<!-- build:js assets/vendor/js/core.js -->
		<script src="{{ asset('build/assets/vendor/libs/jquery/jquery.js') }}"></script>
		<script src="{{ asset('build/assets/vendor/libs/popper/popper.js') }}"></script>
		<script src="{{ asset('build/assets/vendor/js/bootstrap.js') }}"></script>
		<script src="{{ asset('build/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>

		<script src="{{ asset('build/assets/vendor/js/menu.js') }}"></script>
		<!-- endbuild -->

		<!-- Vendors JS -->
		<script src="{{ asset('build/assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>

		<!-- Main JS -->
		<script src="{{ asset('build/assets/dashboard/js/main.js') }}"></script>

		<!-- Page JS -->
		<script src="{{ asset('build/assets/dashboard/js/dashboards-analytics.js') }}"></script>

		<!-- Place this tag in your head or just before your close body tag. -->
		<script async defer src="https://buttons.github.io/buttons.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js"></script>
    </body>
</html>
